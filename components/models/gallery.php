<?php namespace CODERS\DigitalCreator;

defined('ABSPATH') or die;
/**
 * Subscriptor Account Manager
 */
class GalleryModel extends \CODERS\Framework\Model{
    
    protected final function __construct($route, array $data = array()) {

        $this->define('id', self::TYPE_TEXT, array( 'size'=>32))
                ->define('name',self::TYPE_TEXT,array('size'=>64))
                ->define('type',self::TYPE_TEXT,array('size'=>24))
                ->define('size',self::TYPE_NUMBER,array('value'=>0))
                ->define('storage',self::TYPE_TEXT,array('size'=>32))
                ->define('parent',self::TYPE_TEXT,array('size'=>32))
                ->define('date_created',self::TYPE_DATETIME)
                ->define('date_updated',self::TYPE_DATETIME);
        
        parent::__construct($route, $data);
    }

    /**
     * @return array
     */
    protected final function listItems(){
        //return $this->load($this->__model());
        return $this->fill();
    }
    
    protected final function getUrl(){
        $url = \CodersApp::storage($this->value('storage'),true);
        return sprintf('%s%s', $url,  $this->value('id'));
    }
    /**
     * @return boolean
     */
    protected final function isImage(){
        switch( $this->value('type') ){
            //images and media
            case 'image/jpg':
            case 'image/jpeg':
            case 'image/png':
            case 'image/gif':
            case 'image/bmp':
                return TRUE;
            default:
                return false;
        }
    }
}