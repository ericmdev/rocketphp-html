<?php namespace RocketPHPTest\HTML;
use RocketPHP\HTML\Node_Abstract;
use RocketPHP\HTML\ParentNodeTrait;

class MockParentNode
extends Node_Abstract
{
    use ParentNodeTrait;
}