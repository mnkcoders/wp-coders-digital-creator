<?php namespace CODERS\DigitalCreator;

defined('ABSPATH') or die;
/**
 * 
 */
final class SetupAdminController extends \CODERS\Framework\Response{
    
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
        
        $db = new \CODERS\Framework\Query($this->endPoint());
        
        $schema = array(
            'projects' => array(
                'id' => array( 'type' => 'text' ,'size'=>32),
                'name' => array('type'=>'text', 'size'=> 32),
                'description' => array('type'=>'longtext'),
                'image' => array('type'=>'number'),
                'date_created' => array( 'type' => 'date_time','default'=>'CURRENT_TIMESTAMP'),
                'date_updated' => array( 'type' => 'date_time'),
            ),
            'gallery' => array(
                'id' => array( 'type' => 'text','size'=>32,'index'=>true),
                'name' => array( 'type' => 'text','size'=>64,'required'=>true),
                'type' => array( 'type' => 'text','size'=>16,'required'=>true),
                'size' => array( 'type' => 'number','size'=>8,'required'=>true,'default'=>'0'),
                'storage' => array( 'type' => 'text','size'=>24,'required'=>true),
                'parent' => array( 'type' => 'text' , 'size' => 32, 'default' => '' ),
                'date_created' => array( 'type' => 'date_time','default'=>'CURRENT_TIMESTAMP'),
                'date_updated' => array( 'type' => 'date_time'),
            ),
        );
        
        $db->__install($schema);
        
        //
        return true;
        
    }
    protected final function uninstall_action( array $args = array()){
        
        $db = new \CODERS\Framework\Query($this->endPoint());
        $schema = array(
            'projects','gallery','subscribers'
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