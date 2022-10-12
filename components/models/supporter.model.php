<?php namespace CODERS\Framework\Models;

defined('ABSPATH') or die;
/**
 * Subscriptor Account Manager
 */
class SupporterModel extends \CODERS\Framework\Dictionary implements \CODERS\Framework\IModel{
    
    public function __toString() {
        
        return parent::__toString();
    }
    
    public function get($var, $default = null) {
        
        return $default;
    }

    public function has($var): boolean {
        return FALSE;
    }

    public function toArray(): array {
        
        return array();
    }

}