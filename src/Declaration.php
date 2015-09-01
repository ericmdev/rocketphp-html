<?php
/**
 * RocketPHP (http://rocketphp.io)
 *
 * @package   RocketPHP
 * @link      https://github.com/rocketphp/html
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace RocketPHP\HTML;

/**
 * Declaration 
 *
 * Creates a declaration node.
 */
class Declaration
extends Node_Abstract
{
    /** 
     * @var string Output
     */
    protected $_output;

    /**
     * Constructor
     *
     * @param string      $name  Name
     * @param null|string $value Data
     */
    public function __construct($name, $data = null)
    { 
        switch ($name) {
            case 'doctype':
                $data = isset($data) ? $data : 'html';
                $this->_output = "<!DOCTYPE $data>\n"; 
                break;
            case 'comment':
                $data = isset($data) ? $data : '';
                $this->_output = "<!-- $data -->\n"; 
                break;
            default:
                throw new BadMethodCallException(
                    "Unknown HTML declaration", 
                    1
                );
                break;
        }
    } 

    /**
     * Return text output
     *
     * @return string HTML
     */ 
    public function output() 
    {
        return $this->_output;
    }

}