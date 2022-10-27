<?php defined('ABSPATH') or die; ?>
<div class="content">
    <?php if( $this->count_projects > 0 ) : ?>
        <?php foreach( $this->list_projects as $project ): ?>
        <div class="card <?php print $project->name ?>">
        <?php var_dump($project); ?>
        </div>
        <?php endforeach; ?>
    <?php else : ?>
    <?php print $this->action_project_new('new project',array(),'button button-primary project'); ?> 
    <?php print $this->action('.project.new','new project',array(),'button button-primary project'); ?> 
    <?php endif; ?>
</div>