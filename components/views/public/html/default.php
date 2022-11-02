<?php defined('ABSPATH') or die ?>

<ul class="gallery">
    <?php foreach( $this->list_items() as $item ) : ?>
        <li class="item">
            <a class="content" href="<?php print $this->action('.', array('id' => $item->id), true) ?>" target="_self">
                <?php if ($item->is_image()) : ?>
                    <img src="<?php print $item->url ?>" alt="<?php print $item->name ?>" />
                <?php else : ?>
                    <strong><?php print $item->name; ?></strong>
                <?php endif; ?>
            </a>
        </li>
    </li>
    <?php endforeach; ?>
</ul>