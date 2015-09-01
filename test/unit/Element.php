<?php
/**
 * RocketPHP (http://rocketphp.io)
 *
 * @package   RocketPHP
 * @link      https://github.com/rocketphp/html
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace RocketPHPTest\HTML;

use RocketPHP\HTML\Element;

/**
 * @group RocketPHP_HTML
 */ 
class Element_UnitTest
extends HTMLTestCase
{

    public function testConstructorCreatesHtmlElement()
    {
        $p = new Element('p'); 
        $this->assertInstanceOf('RocketPHP\HTML\Element', $p);
    }

    public function testOutputIsValidHtml()
    {
        $p = new Element('p'); 
        $output = $p->output();
        $this->assertSame('<p></p>', $output);
    }    

    public function testCallReturnsElement()
    {
        $p = new Element('p'); 
        $p2 = $p->p();
        $this->assertInstanceOf('RocketPHP\HTML\Element', $p2);  
    }

    public function testSetAttributesViaConstructor()
    {
        $p = new Element('p', ['id="foo" class="bar"']);  
        $this->assertSame('<p id="foo" class="bar"></p>', $p->output());
    }

    public function testSetTextViaConstructor()
    {
        $p = new Element('p', ['Hello world!']);  
        $this->assertSame('<p>Hello world!</p>', $p->output());
    }

    public function testCanSetText()
    {
        $p = new Element('p'); 
        $p->text('Hello world'); 
        $this->assertSame('<p>Hello world</p>', $p->output());
    }

    public function testSetAttrProperty()
    {
        $p = new Element('p'); 
        $p->attr = 'id="foo" class="bar"';
        $this->assertSame('<p id="foo" class="bar"></p>', $p->output());  
    }

    public function testCreateVoidElements()
    {
        $meta = new Element('meta', ['name="description" content="test description"']);  
        $link = new Element('link', ['rel="icon" href="http://www.example.com/favicon.ico" type="image/x-icon"']);  
        $base = new Element('base', ['href="http://www.example.com/"']);  
        $input = new Element('input', ['name="test" value=""']);  
        $br = new Element('br');  
        $this->assertSame('<meta name="description" content="test description">', $meta->output());  
        $this->assertSame('<link rel="icon" href="http://www.example.com/favicon.ico" type="image/x-icon">', $link->output()); 
        $this->assertSame('<base href="http://www.example.com/">', $base->output()); 
        $this->assertSame('<input name="test" value="">', $input->output()); 
        $this->assertSame('<br>', $br->output()); 
    }

    /**
     * @expectedException        BadMethodCallException
     * @expectedExceptionMessage Failed to set unknown element property
     */
    public function testSetPropertyThrowsExceptionIfUnknownProperty()
    {
        $p = new Element('p'); 
        $p->something = 'id="red"';
    }

    /**
     * @dataProvider             badElementAttributeValues
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Expected null|string for element attr property
     */
    public function testSetPropertyThrowsExceptionIfInvalidAttributes($badValue)
    {
        $p = new Element('p'); 
        $p->attr = $badValue;
    }
}