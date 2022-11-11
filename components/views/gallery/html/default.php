<?php defined('ABSPATH') or die; ?>

    <?php if( $this->is_item() ) : ?>
        <p><a class="button" href="<?php print $this->action('.', $this->is_child() ?
                array('id'=>$this->parent) :
                        array(),true) ?>" target="_self"><?php print $this->__('parent','digital_creator') ?></a></p>
        <div class="container header center trans">
            <?php if( $this->is_image() ) : ?>
            <img src="<?php print $this->url ?>" alt="<?php print $this->name ?>" />
            <?php endif; ?>
        </div>
    <?php endif; ?> 

    <div class="uploader container trans center">
        <?php print $this->open_form('uploader','.gallery.upload','post','multipart/form-data') ?>
            <input type="hidden" name="MAX_FILE_SIZE" value="<?php print $this->get_max_file_size ?>" />
            <label for="id_upload" class="button-primary"><?php print $this->label('select_upload') ?></label>
            <?php print $this->input_file('upload[]', array('multiple'=>'true','class'=>'hidden')) ?>
            <?php if( $this->is_item() ) : ?>
            <input type="hidden" name="parent" value="<?php print $this->id ?>" />
            <?php endif; ?>
            <?php print $this->submit_upload('action_upload') ?>
        <?php print $this->close_form() ?>
    </div>

    <ul class="items">
        <?php if( $this->count_items() ) : ?>
            <?php foreach( $this->list_items() as $item ) : ?>
                <li class="item <?php print $item->content_class ?>">
                    <a class="content" href="<?php print $this->action('.',array('id'=>$item->id),true) ?>" target="_self">
                    <?php if( $item->is_image() ) : ?>
                    <img src="<?php print $item->url ?>" alt="<?php print $item->name ?>" />
                    <?php else : ?>
                    <span><?php print $item->name; ?></span>
                    <?php endif; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        <?php else : ?>
                <li class="empty">
                    <p><?php print $this->__('gallery_empty','digital_creator') ?></p>
                </li>
        <?php endif; ?>
    </ul>
