<div class="page-header">
    <h1><?= t('Are you sure you want to remove all selected tasks?') ?></h>
</div>

<form action="<?= $this->url->href('TaskBulkRemoveController', 'remove_selected_tasks', ['project_id' => $project['id'],'plugin'=>'BulkRemove']) ?>" method="post">
    <?= $this->form->csrf() ?>
    <?= $this->form->hidden('task_ids', $values) ?>
    <?= $this->helper->app->component('submit-buttons', array(
            'submitLabel' => isset($params['submitLabel']) ? $params['submitLabel'] : t('Yes'),
            'orLabel'     => t('or'),
            'cancelLabel' => t('No'),
            'color'       => isset($params['color']) ? $params['color'] : 'blue',
            'tabindex'    => isset($params['tabindex']) ? $params['tabindex'] : null,
            'disabled'    => isset($params['disabled']) ? true : false,
        )); ?>
</form>
