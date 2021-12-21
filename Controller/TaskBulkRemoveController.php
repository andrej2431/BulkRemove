<?php

namespace Kanboard\Plugin\BulkRemove\Controller;

use Kanboard\Controller\BaseController;


class TaskBulkRemoveController extends BaseController
{
    public function show(array $values = [], array $errors = [])
    {

        $project = $this->getProject();

        if (empty($values)) {
            $values['task_ids'] = $this->request->getStringParam('task_ids');
        }

        $this->response->html($this->template->render('BulkRemove:task_bulk_remove/show', [
            'project' => $project,
            'values' => $values,
        ]));
    }
    public function remove_selected_tasks()
    {   
        $project = $this->getProject();
        $values = $this->request->getValues();
        $taskIDs = explode(',', $values['task_ids']);

        foreach ($taskIDs as $taskID) {
            $task = $this->taskFinderModel->getById($taskID);
            if ($this->helper->projectRole->canRemoveTask($task)){
                $this->taskModel->remove($taskID);
            }
            
        }

        $this->response->redirect($this->helper->url->to('TaskListController', 'show', ['project_id' => $project['id']]), true);

    }
}