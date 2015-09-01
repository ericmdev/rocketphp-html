<?php
/**
 * RocketPHP (http://rocketphp.io)
 *
 * @package   RocketPHP
 * @link      https://github.com/rocketphp/html
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace RocketPHPTest\HTML;

use RocketPHP\HTML\HTML;

/**
 * @group RocketPHP_HTML
 */ 
class HTML_Functional
extends \PHPUnit_Framework_TestCase
{
    public function testGenerateHead()
    {

        $h = new HTML();
        $h->doctype('html');
        $html = $h->html('lang="en"');
        $head = $html->head();
        $base = $head->base('href="http://www.example.com/"');  
        $meta = $head->meta('charset="utf-8"');
        $head->script('src="/js/app.js"');

        $result = "<!DOCTYPE html>\n";
        $result .= '<html lang="en">';
        $result .= '<head>';
        $result .= '<base href="http://www.example.com/">';
        $result .= '<meta charset="utf-8">';
        $result .= '<script src="/js/app.js"></script>';
        $result .= '</head>';
        $result .= '</html>';
        $this->assertSame($result, $h->__toString());
    }

    public function testGenerateArticle()
    {
        $h = new HTML();
        $article = $h->article('id="paris" class="city"');
        $div = $article->div('class="row"');
        $h1 = $div->h1('Paris');
        $h2 = $div->h2('France');
        $h3 = $div->h3('Capital');
        $p = $div->p();
        $p->text('1');
        $p->br();
        $p->text('paragraph.');
        $p2 = $div->p('2 paragraph.');
        $div->p('3 paragraph.');
        $h4 = $div->h4('More information');
        $div->p('4 paragraph.');
        $p3 = $div->p('5 paragraph.');
        $p4 = $div->p('6 paragraph.');

        $result = '<article id="paris" class="city">';
        $result .= '<div class="row">';
        $result .= '<h1>Paris</h1>';
        $result .= '<h2>France</h2>';
        $result .= '<h3>Capital</h3>';
        $result .= '<p>1<br>paragraph.</p>';
        $result .= '<p>2 paragraph.</p>';
        $result .= '<p>3 paragraph.</p>';
        $result .= '<h4>More information</h4>';
        $result .= '<p>4 paragraph.</p>';
        $result .= '<p>5 paragraph.</p>';
        $result .= '<p>6 paragraph.</p>';
        $result .= '</div>';
        $result .= '</article>';

        $this->assertSame('<h4>More information</h4>', $h4->__toString());
        $this->assertInstanceOf('RocketPHP\\HTML\\Element', $p4);
        $this->assertSame('<p>6 paragraph.</p>', $p4->__toString());
        $this->assertSame($result, $h->__toString());
    }

    public function testGenerateList()
    {

        $h = new HTML();
        $ol = $h->ol('id="green"');
        $li = $ol->li('Some list text.');
        $li = $ol->li('class="card"');

        $result = '<ol id="green">';
        $result .= '<li>Some list text.</li>';
        $result .= '<li class="card"></li>';
        $result .= '</ol>';
        $this->assertSame($result, $h->__toString());

    }
}