<?php namespace CODERS\DigitalCreator;

defined('ABSPATH') or die;
/**
 * 
 */
final class SetupAdminController extends \CODERS\Framework\Request{
    
    /**
     * @param string $endpoint
     */
    protected final function __construct( $endpoint , $route =  '' ) {
        
        parent::__construct($endpoint, $route );
    }
    /**
     * @param array $args
     * @return boolean
     */
    protected final function default_action(array $args = array()) {
        
        $view = $this->importView('setup');
        
        if( !is_null($view)){
            
            $view->setLayout('setup')->show();
            
            return true;
        }
        
        return false;
    }


    protected final function error_action( array $args = array()){
        var_dump($this->list());
        var_dump($this->action(TRUE));
        var_dump($args);
        return FALSE;
    }
}