<?php defined('ABSPATH') or die;
/**
 * 
 */
class DigitalCreator extends CodersApp{
    /**
     * 
     */
    protected final function __construct(  ) {
        
        $this->import('model')
                ->import('view');
        
        parent::__construct( );

        //var_dump(strval($this));
        //var_dump($this->endPoint());
        //var_dump($this->path(strval($this)  ) );
    }
    protected final function setupAdminMenu() {
        $menu = parent::setupAdminMenu();
        $menu['name'] = __('Digital Creator','digital_creator');
        $menu['title'] = __('Digital Creator','digital_creator');
        $menu['icon'] = 'dashicons-art';
        return $menu;
    }
    /**
     * @param array $input
     * @return array
     */
    protected final function default_ajax ( ){
        parent::__registerTs();
        return array(
            'ts' => date('YmdHis'),
            'nonce' => wp_create_nonce(__FILE__),
            'message' => 'hello!!',
            'elapsed' => CodersApp::__elapsed()
        );
    }
    
    protected final function item_ajax(){
        $item = \CODERS\Framework\Model::create('digital-creator.item');
        parent::__registerTs();
        return array(
            'ts' => date('YmdHis'),
            'nonce' => wp_create_nonce(__FILE__),
            'item' => $item !== false ? $item->values() : '--empty--',
            'elapsed' => CodersApp::__elapsed()
        );
    }

    /**
     * @return array
     */
    protected final function request_ajax(){
        $request = CODERS\Framework\Request::import($this->endPoint(),'ajax.default');
        parent::__registerTs();
        return array(
            'ts' => date('YmdHis'),
            'nonce' => wp_create_nonce(__FILE__),
            'request_id' => strval($request),
            'elapsed' => CodersApp::__elapsed()
        );
    }

    /**
     * @return string
     */
    public static final function nonce(){
        return wp_create_nonce(__FILE__);
    }
}


