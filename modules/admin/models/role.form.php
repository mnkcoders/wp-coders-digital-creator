<?php namespace \CODERS\DigitalCreator\Models;
/**
 * 
 */
final class RoleForm extends \CODERS\Framework\Models\FormModel{
    /**
     * @return array
     */
    public function toArray(){
        
        return $this->listValues();
    }
}