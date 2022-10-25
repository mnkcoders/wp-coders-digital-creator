<?php namespace CODERS\DigitalCreator;

defined('ABSPATH') or die;
/**
 * 
 */
final class GalleryAdminController extends \CODERS\Framework\Response{
    
    /**
     * @param string $endpoint
     */
    protected final function __construct( $endpoint , $route =  '' ) {
        
        $this->require('models.file')
                ->require('provider')
                ->require('providers.file')
                ->require('providers.uploader')
                ->require('.models.content');
        
        parent::__construct($endpoint, $route );
    }
    /**
     * @param array $args
     * @return boolean
     */
    protected final function default_action(array $args = array()) {
        
        $view = $this->importView('gallery');
        if( !is_null($view)){
            $gallery = $this->importModel('content');
            if( isset($args['uploaded'])){
                $view->importMessages( is_array($args['uploaded']) ?
                        implode(', ', $args['uploaded']) :
                            $args['uploaded'] );
            }
            //var_dump($gallery->storage());
            //var_dump($gallery->load());
            $view->setModel($gallery)->show();
            return true;
        }
        
        return false;
    }
    
    protected final function file_action( array $args = array()){
        
        
        return true;
    }
    
    protected final function save_action( array $args = array() ){
            $data= array(
              'name' => 'kuns-summer-export.gif',
              'type' => 'image/gif',
              'error' =>  0,
              'id' => '8a05d4bd125934c52ddb80ae963342b5',
              'size' => 12948,
              'storage' => 'digital-creator.gallery'
            );
            $file = \CODERS\Framework\Models\File::new($data);
            $file->save();
            return true;
    }

    /**
     * @param array $args
     * @return boolean
     */
    protected final function upload_action( array $args = array()){
        
        //$uploader = $this->importProvider('uploader', array('storage'=>'digital-creator.gallery'));
        $uploader = \CODERS\Framework\Provider::create('uploader',array(
            'storage'=>'digital-creator.gallery',
            //'parent' => array_key_exists('parent', $args) && strlen($args['parent']) ? $args['parent'] : '',
            ));
            //var_dump($uploader);
        if( !is_null($uploader)){
            
            $parent = array_key_exists('parent', $args) && strlen($args['parent']) ? $args['parent'] : '';
            $list = $uploader->upload('upload')->each( function( $data ) use($parent){
                //var_dump($fileMeta);
                $data['parent'] = $parent;
                //$file = \CODERS\Framework\Models\File::new($data);
                $content = \CODERS\DigitalCreator\ContentModel::new($data);
                $content->save();
                return $content;
                //return \CODERS\Framework\Providers\File::new( $fileMeta );
            });
            //var_dump($list);
            $uploaded = array();
            foreach( $list as $id => $resource ){
                $uploaded[] = $resource->value('name');
            }
            $args['uploaded'] = $uploaded;
        }
        
        return $this->default_action($args);
    }


    protected final function error_action( array $args = array()){
        var_dump($this->list());
        var_dump($this->action(TRUE));
        var_dump($args);
        return FALSE;
    }
}