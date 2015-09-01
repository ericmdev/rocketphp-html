<?php namespace RocketPHPTest\HTML;

/**
 * @group RocketPHP_HTML
 */ 
class ParentNodeTrait_UnitTest
extends HTMLTestCase
{

    public function setUp()
    {
        $this->mock = new MockParentNode();
    }

    public function tearDown()
    { 
    }

    public function testChildrenInitiallyReturnsEmptyNodesArray()
    {
        $result = $this->mock->children();
        // $this->assertNull($result);
        $this->assertInternalType('array', $result);
        $this->assertEmpty($result);
    }   

    public function testCallCreatesDeclaration()
    {
        $result = $this->mock->doctype('html');
        $this->assertInstanceOf('RocketPHP\HTML\Declaration', $result);
        $this->assertSame("<!DOCTYPE html>\n", $result->output());
    } 

    public function testCallCreatesNormalElement()
    {
        $result = $this->mock->p('id="paris"');
        $this->assertInstanceOf('RocketPHP\HTML\Element', $result);
        $this->assertSame('<p id="paris"></p>', $result->output());
    } 

    public function testCallCreatesVoidElement()
    {
        $result = $this->mock->meta('charset="utf-8"');
        $this->assertInstanceOf('RocketPHP\HTML\Element', $result);
        $this->assertSame('<meta charset="utf-8">', $result->output());
    } 

    /**
     * @dataProvider             badParentNodeArgsValues
     * @expectedException        InvalidArgumentException
     * @expectedExceptionMessage Expected string for node args
     */
    public function testCallInvalidArgs($badValue)
    {  
        $result = $this->mock->p($badValue);
    }
}