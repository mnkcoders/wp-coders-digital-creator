<?php defined('ABSPATH') or die;
/**
 * 
 */
class DigitalCreator extends CodersApp{
    /**
     * 
     */
    protected final function __construct(  ) {
        
        $this->require('model')
                ->require('models.calendar')
                ->require('view')
                ->require('provider')
                ->require('providers.file')
                ->require('providers.uploader');
        
        parent::__construct( );
        
        $this->registerAdminScripts();
    }
    /**
     * 
     */
    private final function registerAdminScripts() {
        if(is_admin()){
            add_action( 'admin_enqueue_scripts' , function(){
                
                //wp_enqueue_script( 'digital-creator-admin-script', plugin_dir_url( __FILE__ ) . 'contents/admin.js', array(), '1.0' );
                wp_enqueue_style( 'digital-creator-admin-css', plugin_dir_url( __FILE__ ) . 'contents/admin.css' );
            });
        }
    }


    protected final function setupAdminMenu() {
        $menu = parent::setupFrameworkMenu();
        $menu['name'] = __('Digital Creator','digital_creator');
        $menu['title'] = __('Digital Creator','digital_creator');
        $menu['icon'] = 'dashicons-art';
        $menu['slug'] = $this->endPoint();
        $menu['children'] = array(
            //$this->setupAdminProjects(),
            $this->setupAdminGallery(),
            $this->setupAdminSubscriber(),
            $this->setupAdminSettings(),
        );

        return $menu;
    }
    /**
     * @return array
     */
    private final function setupAdminProjects(){
        $menu = parent::setupFrameworkMenu();
        $menu['parent'] = $this->endPoint();
        $menu['name'] = __('Projects','digital_creator');
        $menu['title'] = __('Projects','digital_creator');
        $menu['slug'] = 'project';
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
     * @return array
     */
    private final function setupAdminSubscriber(){
        $menu = parent::setupFrameworkMenu();
        $menu['parent'] = $this->endPoint();
        $menu['name'] = __('Subscribers','digital_creator');
        $menu['title'] = __('Subscribers','digital_creator');
        $menu['slug'] = 'subscriber';
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
    /**
     * @return \CodersApp
     */
    protected final function install() {
        
        $db = new \CODERS\Framework\Query($this->endPoint());
        
        $schema = array(
            /*'project' => array(
                'id' => array( 'type' => 'text' ,'size'=>32),
                'name' => array('type'=>'text', 'size'=> 32),
                'description' => array('type'=>'longtext'),
                'image' => array('type'=>'number'),
                'date_created' => array( 'type' => 'date_time','default'=>'CURRENT_TIMESTAMP'),
                'date_updated' => array( 'type' => 'date_time'),
            ),*/
            'content' => array(
                'id' => array( 'type' => 'text','size'=>32,'index'=>true),
                'name' => array( 'type' => 'text','size'=>64,'required'=>true),
                'type' => array( 'type' => 'text','size'=>16,'required'=>true),
                'size' => array( 'type' => 'number','size'=>8,'required'=>true,'default'=>'0'),
                'storage' => array( 'type' => 'text','size'=>24,'required'=>true),
                'parent' => array( 'type' => 'text' , 'size' => 32, 'default' => '' ),
                //'title' => array( 'type'=>'text','size'=>48,'default'=>''),
                //'description' => array( 'type'=>'longtext','default'=>''),
                'layout' => array('type'=>'text','size'=>24,'default'=>'gallery'),
                'date_created' => array( 'type' => 'date_time','default'=>'CURRENT_TIMESTAMP'),
                'date_updated' => array( 'type' => 'date_time'),
            ),
            'subscriber' => array(
                'id' => array('type'=>'text','size'=>32,'index'=>true),
                //'name' => array('type'=>'text','size'=>32),
                //'email' => array('type'=>'text','size'=>64),
                'role' => array('type'=>'text','size'=>24),
                'date_created' => array( 'type' => 'date_time','default'=>'CURRENT_TIMESTAMP'),
                'date_updated' => array( 'type' => 'date_time'),
            ),
            'tags' => array(
                'content_id' => array('type'=>'text','size'=>32),
                'tag' => array('type'=>'text','size'=>16),
            ),
        );
        
        $db->__install($schema);
        
        return parent::install();
    }
}


