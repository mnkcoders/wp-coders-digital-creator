<?php defined('ABSPATH') or die; ?>
<div class="content">
    <ul class="items">
    <?php foreach( $this->list_items() as $item ) : ?>
        <li class="item">
            <strong><?php print $item->name; ?></strong>
            <em><?php print $item->level; ?></em>
        </li>
    <?php endforeach; ?>
    </ul>
</div>