<?php namespace CODERS\DigitalCreator;

defined('ABSPATH') or die;
/**
 * 
 */
final class GalleryAdminController extends \CODERS\Framework\Request{
    
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
        
        $view = $this->importView('gallery');
        if( !is_null($view)){
            $view->setModel($this->importModel('gallery'))->show();
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