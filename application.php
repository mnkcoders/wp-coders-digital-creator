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
                ->import('models.calendar')
                ->import('view')
                ->import('provider')
                ->import('providers.file')
                ->import('providers.uploader');
        
        parent::__construct( );
    }
    protected final function setupAdminMenu() {
        $menu = parent::setupFrameworkMenu();
        $menu['name'] = __('Digital Creator','digital_creator');
        $menu['title'] = __('Digital Creator','digital_creator');
        $menu['icon'] = 'dashicons-art';
        $menu['slug'] = $this->endPoint();
        $menu['children'] = array(
            $this->setupAdminGallery(),
            $this->setupAdminSettings(),
        );

        return $menu;
    }
    /**
     * @return array
     */
    private final function setupAdminSettings(){
        $menu = parent::setupFrameworkMenu();
        $menu['parent'] = $this->endPoint();
        $menu['name'] = __('Setup','digital_creator');
        $menu['title'] = __('Setup','digital_creator');
        $menu['slug'] = 'setup';
        return $menu;
    }
    /**
     * @return array
     */
    private final function setupAdminGallery(){
        $menu = parent::setupFrameworkMenu();
        $menu['parent'] = $this->endPoint();
        $menu['name'] = __('Gallery','digital_creator');
        $menu['title'] = __('Gallery','digital_creator');
        $menu['slug'] = 'gallery';
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


