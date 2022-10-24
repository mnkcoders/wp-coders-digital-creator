<?php namespace CODERS\DigitalCreator;

defined('ABSPATH') or die;
/**
 * Subscriptor Account Manager
 */
class SubscriberModel extends \CODERS\Framework\Model{
    
    const STATUS_CREATED = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_EXPIRED = 2;
    const STATUS_BANNED = 5;
    
    protected final function __construct($route, array $data = array()) {
        
        $this->define('id', self::TYPE_TEXT, array('size'=>32))
                ->define('name',self::TYPE_EMAIL, array('size'=>32))
                ->define('email',self::TYPE_EMAIL, array('size'=>64))
                ->define('role',self::TYPE_TEXT, array('size'=>16))
                ->define('status', self::TYPE_NUMBER)
                ->defineTimeStamps();
        
        parent::__construct($route, $data);
    }
    
    
    protected final function listSubscriptionHistory(){
        return array();
    }

    /**
     * @return array
     */
    protected final function listStatus(){
        return array(
            self::STATUS_CREATED => __('Created','digital_creator'),
            self::STATUS_ACTIVE => __('Active','digital_creator'),
            self::STATUS_EXPIRED => __('Expired','digital_creator'),
            self::STATUS_BANNED => __('Banned','digital_creator'),
        );
    }
}