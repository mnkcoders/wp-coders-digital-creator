<?php namespace CODERS\DigitalCreator;

defined('ABSPATH') or die;
/**
 * Subscriptor Account Manager
 */
class ContentModel extends \CODERS\Framework\Model{
    
    const STORAGE = 'gallery';
    
    protected final function __construct(array $data = array()) {

        $this->define('id', self::TYPE_TEXT, array( 'size'=>32))
                ->define('name',self::TYPE_TEXT,array('size'=>64))
                ->define('type',self::TYPE_TEXT,array('size'=>24))
                ->define('size',self::TYPE_NUMBER,array('value'=>0))
                ->define('storage',self::TYPE_TEXT,array('size'=>32))
                ->define('parent',self::TYPE_TEXT,array('size'=>32,'value'=>''))
                ->define('date_created',self::TYPE_DATETIME)
                ->define('date_updated',self::TYPE_DATETIME);
        
        parent::__construct( $data);
    }
    /**
     * @return string
     */
    public final function storage(){
        return $this->endpoint() . '.' . self::STORAGE;
    }
    /**
     * @return string
     */
    protected final function getParent(){
        return $this->value('parent');
    }
    /**
     * @return boolean
     */
    protected final function isChild(){
        return strlen($this->value('parent')) > 0;
    }
    /**
     * @return string
     */
    protected final function getId(){
        return $this->value('id');
    }
    /**
     * @return number
     */
    protected final function countItems(){
        return count( $this->listItems( ) );
    }
    /**
     * @return array
     */
    protected final function listItems( $showall = false ){
        $filters = $showall ? array() : array('parent'=>$this->getId());
        return $this->fill( strval($this) , $filters );
    }
    
    protected final function getUrl(){
        $url = \CodersApp::storage($this->value('storage'),true);
        return sprintf('%s%s', $url,  $this->value('id'));
    }
    /**
     * @return boolean
     */
    protected final function isItem(){
        return strlen( $this->value('id') ) > 0;
    }
    /**
     * 
     */
    public final function file(){
        return null;
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
    /**
     * @return string
     */
    protected final function getContentClass(){
        return $this->isImage() ? 'image' : 'file';
    }


    /**
     * @return boolean
     */
    public final function save(){
        $ts = $this->__ts();
        $db = $this->db();
        $table = self::__model();
        $result = $db->select($table , 'COUNT(*) AS `ids`' , array('id'=>$this->id) );
        if( count($result) && $result[0]['ids'] > 0 ){
            $this->change('date_updated',$ts,true);
            //var_dump($this->updated());
            return $db->update($table, $this->updated(), array('id'=>$this->id)) > 0;
        }
        else{
            $this->change('date_updated',$ts)->change('date_created',$ts );
            //var_dump($this->values());
            return $db->insert($table, $this->values()) > 0;
        }
        return false;
    }
    
    
    public static final function new( array $data = array()){
        $content = new ContentModel($data);
        return $content;
    }
}



