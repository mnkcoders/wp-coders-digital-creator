<?php namespace CODERS\DigitalCreator;

defined('ABSPATH') or die;

final class SubscriberView extends \CODERS\Framework\View{
    
    protected function __construct($endpoint) {
        
        parent::__construct($endpoint);
        
    }
    
    protected final function getAdminPageTitle() {
        
        if( strlen(  $this->name ) > 0 ){
            return parent::getAdminPageTitle() . ' - ' . $this->name;
        }
        
        return parent::getAdminPageTitle();
    }
}

