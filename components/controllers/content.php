<?php namespace CODERS\DigitalCreator;

defined('ABSPATH') or die;
/**
 * 
 */
final class ContentController extends \CODERS\Framework\Response{
    
    /**
     * @param string $endpoint
     */
    protected final function __construct( $endpoint , $route =  '' ) {
        
        $this->require('model');
        
        parent::__construct($endpoint, $route );
    }
    protected final function response($action = ''){
        //parent::response($action);
        if( strlen($action) === 0 || $action === 'default' ){
            return $this->default_action();
        }
        
        $resource = $action;
        
        $content = $this->importModel('content')->from( array( 'id'=>$resource ) );

        
    }
}


