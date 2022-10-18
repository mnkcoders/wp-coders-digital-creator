<?php namespace CODERS\DigitalCreator;

defined('ABSPATH') or die;

final class AdminController extends \CODERS\Framework\Request{
    
    /**
     * @param string $endpoint
     */
    protected final function __construct( $endpoint , $route =  '' ) {
        
        parent::__construct($endpoint, $route );
    }
    
    protected final function error_action( array $args = array()){
        var_dump($this->list());
        var_dump($this->action(TRUE));
        var_dump($args);
        return FALSE;
    }
}