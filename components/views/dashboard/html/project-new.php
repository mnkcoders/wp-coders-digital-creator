<?php defined('ABSPATH') or die; ?>

<?php print $this->open_form('project','.project.create','post') ?>

<?php print $this->input_text('name') ?>
<?php print $this->input_number('image') ?>
<?php print $this->input_text('content') ?>
<?php wp_editor($this->description, 'description'); ?>


<?php print $this->close_form() ?>