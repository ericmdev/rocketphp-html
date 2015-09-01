<?php namespace RocketPHPTest\HTML;
use stdClass;
/** 
 * HTML Test Case
 *
 */ 
abstract class HTMLTestCase
extends \PHPUnit_Framework_TestCase
{

    public function badHTMLConstructorNameValues()
    {
        return [
            [''],
            [-1],
            [1],
            [1.5],
            [true],
            [false],
            [array()],
            [new stdClass()]
        ];
    }

    public function badHTMLConstructorArgsValues()
    {
        return [
            [''],
            [-1],
            [1],
            [1.5],
            [true],
            [false],
            [array()],
            [new stdClass()]
        ];
    }

    public function badParentNodeArgsValues()
    {
        return [
            [null],
            [''],
            [-1],
            [1],
            [1.5],
            [true],
            [false],
            [array()],
            [new stdClass()]
        ];
    }

    public function badElementAttributeValues()
    {
        return [
            [null],
            [''],
            [-1],
            [1],
            [1.5],
            [true],
            [false],
            [array()],
            [new stdClass()]
        ];
    }

}