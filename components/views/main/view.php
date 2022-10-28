<?php namespace CODERS\DigitalCreator;

defined('ABSPATH') or die;
/**
 * 
 */
final class MainView extends \CODERS\Framework\View{
    
    protected final function __construct($route) {
        
        parent::__construct($route);

        $this->addStyle('digital-creator-style', $this->contentUrl( 'public.css' ), 'text/css');
        
    }
    
}



