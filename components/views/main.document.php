<?php namespace CODERS\Framework\Views;

defined('ABSPATH') or die;

/**
 * 
 */
class MainDocument extends DocumentRender{
    /**
     * 
     * @param \CodersApp $app
     */
    protected function __construct(\CodersApp $app) {
        
        $this->registerStyle('materialize-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css')
                ->registerScript('materialize-cdn', 'https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js')
                ->registerScript('vuejs-cdn', 'https://cdn.jsdelivr.net/npm/vue@2.6.7/dist/vue.js')
                ->registerGoogleFont('Material+Icons')
                ->registerClass(array('materialize'));
        
        parent::__construct($app);

    }
    
    function display() {

        return parent::display();
    }
}