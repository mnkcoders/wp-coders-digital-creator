<?php defined('ABSPATH') or die; ?>
<div class="content">
    
    <h1><?php print \CodersApp::__('digital-creator') ?></h1>
    <?php print $this->open_form('item') ?>
    <p><label for=id_name><?php print $this->label_name ?></label> <?php print $this->input_name ?></p>
    <p><label for="id_level"><?php print $this->label_level ?></label><?php print $this->input_level ?></p>
    <p><?php print $this->submit_action( 'submit_save' ,array('value'=>'save')); ?></p>
    <p><?php print $this->submit_action( 'submit_remove' ,array('value'=>'remove')); ?></p>
    <?php print $this->close_form() ?>
    <?php print $this->html('button',array('class'=>'sender','value'=>'default'),'Send Default AJAX request') ?>
    <?php print $this->html('button',array('class'=>'sender','value'=>'item'),'Send Item AJAX request') ?>
    <?php print $this->html('button',array('class'=>'sender','value'=>'request'),'Send Input AJAX ') ?>
</div>