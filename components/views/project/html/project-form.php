<?php defined('ABSPATH') or die; ?>

<div class="">
    <?php print $this->open_form('project','.project.create','post') ?>

    <p><?php print $this->input_text('name') ?></p>
    <p><?php print $this->input_number('image') ?></p>
    <p><?php print $this->input_text('content') ?></p>
    <?php wp_editor($this->description, 'description'); ?>
    <p><hr/></p>
    <a href="<?php print $this->action('.project') ?>" target="_self" class="button"><?php print $this->__('back') ?></a>
    <?php print $this->submit_project_new('create_project',array('class'=>'button button-primary right')) ?>
    <?php print $this->close_form() ?>
</div>