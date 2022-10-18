<?php namespace CODERS\DigitalCreator\DashBoard;

defined('ABSPATH') or die;

final class MainView extends \CODERS\Framework\View{
    
    protected function __construct($endpoint) {
        
        parent::__construct($endpoint);

        $this->addScript('jquery')
                ->addScript('dashboard-script',
                        $this->contentUrl( 'dashboard-script.js' ) , '' ,
                        array(
                            'url' => admin_url('admin-ajax.php'),
                            'nonce' => \DigitalCreator::nonce(),
                        ));
        
    }
}

