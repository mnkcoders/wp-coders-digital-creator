<?php namespace CODERS\DigitalCreator;

defined('ABSPATH') or die;
/**
 * 
 */
final class GalleryAdminController extends \CODERS\Framework\Request{
    
    /**
     * @param string $endpoint
     */
    protected final function __construct( $endpoint , $route =  '' ) {
        
        parent::__construct($endpoint, $route );
    }
    /**
     * @param array $args
     * @return boolean
     */
    protected final function default_action(array $args = array()) {
        
        $view = $this->importView('gallery');
        if( !is_null($view)){
            $view->setModel($this->importModel('gallery'))->show();
            return true;
        }
        
        return false;
    }
    protected final function file_action( array $args = array()){
        
        
        return true;
    }

    /**
     * @param array $args
     * @return boolean
     */
    protected final function upload_action( array $args = array()){
        
        $uploader = $this->importProvider('uploader', array('storage'=>'digital-creator.gallery'));

        if( !is_null($uploader)){
            $list = $uploader->upload('upload')->each( function( $meta ){
                return \CODERS\Framework\Providers\File::new( $meta );
            });
            if( count( $list )){
                var_dump($list);
            }
        }

        $form = sprintf('<input type="hidden" name="MAX_FILE_SIZE" value="%s" /><input type="file" name="upload[]" multiple="true" /><input type="submit"/>',
                10*255*255);

        printf( '<form action="%s" method="post" encType="multipart/form-data" name="uploader">%s</form>' ,
                $_SERVER['PHP_SELF'] .'?page=digital-creator-gallery&action=upload' ,
                $form);

        return true;
    }


    protected final function error_action( array $args = array()){
        var_dump($this->list());
        var_dump($this->action(TRUE));
        var_dump($args);
        return FALSE;
    }
}