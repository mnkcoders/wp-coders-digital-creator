<?php defined('ABSPATH') or die; ?>
<?php if ($this->count_projects > 0) : ?>
    <?php foreach ($this->list_projects as $project): ?>
        <div class="card <?php print $project->name ?>">
            <?php var_dump($project); ?>
        </div>
    <?php endforeach; ?>
<?php else : ?>
<div class="container center trans">
    <a href="<?php print $this->action('.project.new', array(), true) ?>" target="_self" class="button button-primary" ><?php print $this->__('new_project', 'digital_creator') ?></a>
</div>
<?php endif; ?>


