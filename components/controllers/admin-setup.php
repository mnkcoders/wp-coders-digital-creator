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
    protected final function install_action( array $args = array()){
        
        //var_dump($this);
        
        $db = new \CODERS\Framework\Query($this->endPoint());
        
        $schema = array(
            'items' => array(
                'id' => array( 'type' => 'incremental','size'=>8,'index'=>true,'required'=>true),
                'name' => array( 'type' => 'text','size'=>32,'required'=>true),
                'type' => array( 'type' => 'text','size'=>24,'required'=>true,'default'=>'general'),
                'date_created' => array( 'type' => 'date_time'),
                'date_updated' => array( 'type' => 'date_time','default'=>'CURRENT_TIMESTAMP'),
            ),
        );
        
        $db->__install($schema);
        
        //
        return true;
        
    }
    protected final function uninstall_action( array $args = array()){
        
        $db = new \CODERS\Framework\Query($this->endPoint());
        $schema = array(
            'items'
        );
        $db->__uninstall($schema);
        
        return true;
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