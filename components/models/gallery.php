<?php namespace CODERS\DigitalCreator;

defined('ABSPATH') or die;
/**
 * Subscriptor Account Manager
 */
class GalleryModel extends \CODERS\Framework\Model{
    
    protected final function __construct($route, array $data = array()) {

        parent::__construct($route, $data);
    }

    /**
     * @return array
     */
    protected final function listItems(){
        $model = $this->endpoint().'.item';
        return array(
            parent::create($model,array('name'=>'item-1','level' => 'a')),
            parent::create($model,array('name'=>'item-2','level' => 'b')),
            parent::create($model,array('name'=>'item-3','level' => 'b')),
            parent::create($model,array('name'=>'item-4','level' => 'c')),
        );
    }
}