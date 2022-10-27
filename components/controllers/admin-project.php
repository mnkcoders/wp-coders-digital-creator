<?php namespace CODERS\DigitalCreator;

defined('ABSPATH') or die;

final class ProjectAdminController extends \CODERS\Framework\Response{
    
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
        
        $view = $this->importView('project');
        if( !is_null($view)){
            $view->setModel($this->importModel('project'))
                    ->setLayout('default')
                    ->show();
            return true;
        }
        else{
            $args['error'] = __('Invalid view [admin]','digital_creator');
        }
        return $this->error_action( $args );
    }
    /**
     * 
     * @param array $args
     * @return boolean
     */
    protected final function new_action( array $args = array( ) ){
        
        $view = $this->importView('project');
        
        if( !is_null($view)){
            $view->setLayout('project-form')->show();
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