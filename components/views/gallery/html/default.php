<?php defined('ABSPATH') or die; ?>
<div class="content">
    <?php print $this->open_form('uploader','.gallery.upload','post','multipart/form-data') ?>
        <?php print $this->input_hidden('MAX_FILE_SIZE' , array('value'=> 10 * 255 * 255)) ?>
        <label for="id_upload" class="button-primary"><?php print $this->label('select_upload') ?></label>
        <?php print $this->input_file('upload[]', array('multiple'=>'true','class'=>'hidden')) ?>
        <?php print $this->submit_upload('action_upload') ?>
    <?php $this->close_form ?>
    <ul class="items">
    <?php foreach( $this->list_items() as $item ) : ?>
        <li class="item">
            <span class="content">
            <?php if( $item->is_image ) : ?>
            <img src="<?php print $item->url ?>" alt="<?php print $item->name ?>" />
            <?php else : ?>
            <strong><?php print $item->name; ?></strong>
            </span>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
    </ul>
</div>