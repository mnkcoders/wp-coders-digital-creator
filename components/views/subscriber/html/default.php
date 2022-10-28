<?php defined('ABSPATH') or die; ?>
<div class="content">

    <ul class="list">
    <?php foreach( $this->list_subscribers() as $subscriber ) : ?>
        <li><?php print $subscriber->name ?></li>
    <?php endforeach; ?>
    </ul>
</div>