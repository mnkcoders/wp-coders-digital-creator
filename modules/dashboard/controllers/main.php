<?php namespace CODERS\DigitalCreator\DashBoard;

defined('ABSPATH') or die;

final class MainController extends \CODERS\Framework\Request{
    
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
    
    protected final function nomodel_action( array $args = array()){
        $view = $this->importView('main');
        if( $view !== FALSE ){
            $view->show();
            return true;
        }
        
        return $this->error_action();
    }

    /**
     * @param array $args
     * @return boolean
     */
    protected  final function default_action(array $args = array()) {
        
        $model = $this->importModel('item');
        $view = $this->importView('main');

        if($model !== FALSE ){
            if( $view !== false ){
                $view->setModel($model)->show();
                return TRUE;
            }
            else{
                $this->error_action( $args );
            }
        }
        else{
            $this->error_action( $args );
        }
        
        return FALSE;
    }
}