<?php defined('ABSPATH') or die;
/**
 * 
 */
class PublicView extends CODERS\Framework\Views\Renderer{
    /**
     * @param string $endpoint
     * @param string $module
     */
    protected function __construct( $endpoint , $module ) {
        
        $this->addStyle('materialize-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css')
                ->addScript('materialize-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js')
                ->addScript('vuejs-cdn', 'https://cdn.jsdelivr.net/npm/vue@2.6.7/dist/vue.js')
                ->addFont('Material+Icons')
                ->addClass(array('materialize'));
        
        parent::__construct($endpoint,$module);
    }
}