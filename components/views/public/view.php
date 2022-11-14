<?php namespace CODERS\DigitalCreator;

defined('ABSPATH') or die;
/**
 * 
 */
final class PublicView extends \CODERS\Framework\View{
    
    protected final function __construct($route) {
        
        parent::__construct($route);

        $this->addStyle('digital-creator-style', $this->contentUrl( 'public.css' ), 'text/css')
                ->addScript('digital-creator',$this->contentUrl('public.js'));
        
    }
    
    protected final function renderContent() {
        
        print '<!-- sidebar-menu --><div id="sidebar-menu" class="container theme sidebar">';
        $this->__display('menu');
        print '</div><!-- sidebar-menu -->';
        
        return parent::renderContent();
    }
    
}



