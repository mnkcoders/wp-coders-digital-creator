<?php namespace CODERS\DigitalCreator;

defined('ABSPATH') or die;

final class GalleryView extends \CODERS\Framework\View{
    
    protected function __construct($endpoint) {
        
        parent::__construct($endpoint);
    }
    
    protected final function getAdminPageTitle() {
        
        if( $this->hasModel() && $this->model()->is_item()){
            
            return parent::getAdminPageTitle() . ' - ' . $this->model()->name;
        }
        
        return parent::getAdminPageTitle();
    }
    /**
     * @return number
     */
    protected final function getMaxFileSize(){
        return 10 * 255 * 255;
    }
}

