<?php 
namespace RocketPHPTest\HTML;
use RocketPHP\HTML\HTML;
/**
 * @group RocketPHP_HTML
 */ 
class HTML_UnitTest
extends HTMLTestCase
{
    public function setUp()
    {
    }

    public function tearDown()
    { 
    }

    public function testConstructor()
    {
        $h = new HTML(); 
        $this->assertInstanceOf('RocketPHP\\HTML\\HTML', $h);
    }

    public function testHTMLIsInitiallyEmptyString()
    {
        $h = new HTML(); 
        $this->assertSame('', $h->__toString()); 
    }

    public function testHTMLOutputIsInitiallyEmptyString()
    {
        $h = new HTML(); 
        $this->assertSame('', $h->output());
        return $h;
    }

    public function testCallReturnsElement()
    {
        $h = new HTML; 
        $p = $h->p();
        $this->assertInstanceOf('RocketPHP\\HTML\\Element', $p);
    }

    /**
     * @dataProvider             badHTMLConstructorNameValues
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Expected string for node name
     */
    public function testConstructorInvalidName($badValue)
    {  
        $h = new HTML($badValue);
    }

    /**
     * @dataProvider             badHTMLConstructorArgsValues
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Expected string for node args
     */
    public function testConstructorInvalidArgs($badValue)
    {  
        $h = new HTML('p', $badValue);
    }
}