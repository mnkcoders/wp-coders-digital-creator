<?php defined('ABSPATH') or die; ?>
<div class="content">
    <?php print $this->open_form('item') ?>
    <p><?php print $this->input_item ?></p>
    <p><?php print $this->input_level ?></p>
    <?php print $this->close_form() ?>
    <?php print $this->html('button',array('class'=>'sender','value'=>'default'),'Send Default AJAX request') ?>
    <?php print $this->html('button',array('class'=>'sender','value'=>'item'),'Send Item AJAX request') ?>
    <?php print $this->html('button',array('class'=>'sender','value'=>'request'),'Send Input AJAX ') ?>
</div>