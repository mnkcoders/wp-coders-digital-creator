<?php namespace CODERS\DigitalCreator;

defined('ABSPATH') or die;
/**
 * Subscriptor Account Manager
 */
class ItemModel extends \CODERS\Framework\Model{
    
    protected final function __construct($route, array $data = array()) {
        
        $this->define('name', self::TYPE_TEXT, array( 'label' => __('Item'),  'placeholder'=>__('Item Name'),'value'=>'Default'))
                ->define('level',self::TYPE_DROPDOWN,array('options'=>'options','label'=>__('Level')));
        
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