<?php namespace CODERS\DigitalCreator;

defined('ABSPATH') or die;

final class AdminController extends \CODERS\Framework\Response{
    
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
        
        $view = $this->importView('dashboard');
        if( !is_null($view)){
            $view->setLayout('default')->show();
            return true;
        }
        else{
            $args['error'] = __('Invalid view [admin]','digital_creator');
        }
        return $this->error_action( $args );
    }
    /**
     * @param array $args
     * @return boolean
     */
    protected final function error_action( array $args = array()){
        var_dump($this->list());
        var_dump($this->action(TRUE));
        var_dump($args);
        return FALSE;
    }
}