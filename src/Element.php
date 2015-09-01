<?php
/**
 * RocketPHP (http://rocketphp.io)
 *
 * @package   RocketPHP
 * @link      https://github.com/rocketphp/html
 * @license   http://opensource.org/licenses/MIT MIT
 */

namespace RocketPHP\HTML; 

use InvalidArgumentException;
use BadMethodCallException;

/**
 * Element
 *
 * Creates an element node.
 */
class Element
extends Node_Abstract
implements ElementInterface
{
    use ParentNodeTrait;

    const NORMAL = 0;
    const VOID = 1;

    /** 
     * Kind (NORMAL|VOID)
     * @access protected 
     * @var    string
     */
    protected $_kind; 

    /** 
     * Tagname
     * @access protected 
     * @var    string
     */
    protected $_tagname;

    /** 
     * Attributes
     * @access protected 
     * @var    string
     */
    protected $_attr;

    /**
     * Constructor
     *
     * @param string $tagname Tagname
     * @param string $args    Arguments
     */
    public function __construct($tagname, array $args = null) 
    {   
        parent::__construct();

        $this->_tagname = $tagname; 

        if (strpos(HTML::VOID_ELEMENTS.',', "$tagname,") !== false)
            $this->_kind = self::VOID;  
        else
            $this->_kind = self::NORMAL;

        if ($args) {
            $count = count($args);
            if ($count === 2) {
                $this->text($args[0]);
                $this->_attr = $args[1];
            } elseif($count === 1) {
                if (preg_match("/(.*)=\"(.*)\"/", $args[0]) === 1)
                    $this->_attr = $args[0];
                else
                    $this->text($args[0]);
            }
        }

    }

    /**
     * Set attributes
     *
     * @param  string $name  Property name
     * @param  string $value Property value
     * @throws InvalidArgumentException If attr is not string
     * @throws BadMethodCallException   If unknown element property
     */
    public function __set($name, $value) 
    {   
        switch ($name) {
            case 'attr':
                if(!is_string($value) || $value === '')
                    throw new InvalidArgumentException(
                        "Expected null|string for element attr property.", 
                        1
                    );
                else
                    $this->_attr = $value;
                break;
            default:
                throw new BadMethodCallException(
                    "Failed to set unknown element property: $name.", 
                    1
                );
                break;
        }
    }

    /**
     * Get attributes
     *
     * @param  string $name Property name
     * @return string
     * @throws BadMethodCallException If unknown element property
     */
    public function __get($name) 
    {   
        if($name === 'attr')
            return $this->_attr;
        else
            throw new BadMethodCallException(
                "Failed to get unknown element property.", 
                1
            );
    }

    /**
     * Sets child text node
     *
     * @param  string $text   Text
     * @param  bool   $escape Escape text option
     * @return Element
     */
    public function text($text, $escape = false) 
    {    
        $node = new Text($text, $escape);
        $this->setNode($node);
        return $this;
    }

    /**
     * Returns HTML output inc. child nodes
     *
     * @return string
     */
    public function output() 
    {
        $output = '<'.$this->_tagname.'';
        if ($this->_attr) {
            $output .= ' '.$this->_attr;
        }
        $output .= '>';

        if ($this->_kind === self::NORMAL) {
            if ($this->hasChildren()) {
                $output .= parent::output();
            }
            $output .= '</'.$this->_tagname.'>';
        }
        return $output; 
    } 
}