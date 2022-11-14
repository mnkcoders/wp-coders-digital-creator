<?php defined('ABSPATH') or die ?>
<?php if ($this->is_item()) : ?>
    <p><a class="button" href="<?php
        print $this->action('.', $this->is_child() ?
                                array('id' => $this->parent) :
                                array(), true)
        ?>" target="_self"><?php print $this->__('parent', 'digital_creator') ?></a></p>
    <div class="container header center trans">
    <?php if ($this->is_image()) : ?>
        <img src="<?php print $this->url ?>" alt="<?php print $this->name ?>" />
    <?php endif; ?>
    </div>
<?php endif; ?> 
<ul class="items">
    <?php foreach( $this->list_items() as $item ) : ?>
        <li class="item <?php print $item->content_class ?>">
            <a class="content" href="<?php print $this->action('.', array('id' => $item->id)) ?>" target="_self">
                <?php if ($item->is_image()) : ?>
                    <img src="<?php print $item->url ?>" alt="<?php print $item->name ?>" />
                <?php else : ?>
                    <span><?php print $item->name; ?></span>
                <?php endif; ?>
            </a>
        </li>
    </li>
    <?php endforeach; ?>
</ul>
    
    
