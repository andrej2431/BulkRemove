<?php

namespace Kanboard\Plugin\BulkRemove;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{
    public function initialize()
    {
        $this->template->setTemplateOverride('task_list/header', 'BulkRemove:task_list/header');
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }


    public function getPluginName()
    {
        return 'BulkRemove';
    }

    public function getPluginDescription()
    {
        return t('Adds the functionality to remove tasks in bulk');
    }

    public function getPluginAuthor()
    {
        return 'AndrejThomasDobrev';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/andrej2431/BulkRemove';
    }
}

