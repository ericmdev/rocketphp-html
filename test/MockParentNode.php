<?php
/**
 * RocketPHP (http://rocketphp.io)
 *
 * @package   RocketPHP
 * @link      https://github.com/rocketphp/html
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace RocketPHPTest\HTML;

use RocketPHP\HTML\Node_Abstract;

use RocketPHP\HTML\ParentNodeTrait;

class MockParentNode
extends Node_Abstract
{
    use ParentNodeTrait;
}