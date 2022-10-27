<?php namespace CODERS\DigitalCreator;

defined('ABSPATH') or die;
/**
 * Subscriptor Account Manager
 */
class ProjectModel extends \CODERS\Framework\Model{
    
    protected final function __construct($route, array $data = array()) {
        
        $this->define('id', self::TYPE_TEXT)
                ->define('name',self::TYPE_TEXT)
                ->define('description',self::TYPE_TEXTAREA)
                ->define('image',self::TYPE_NUMBER)
                ->define('content',self::TYPE_TEXT)
                ->defineTimeStamps();
        
        parent::__construct($route, $data);
    }
    
    /**
     * @return array
     */
    protected final function listOptions(){
        return array(
            'A'=> 'a',
            'B' => 'b',
            'C' => 'c');
    }
}