<?php

namespace bigm\log;

class Module extends \yii\base\Module
{
    public $controllerNamespace = 'bigm\log\controllers';
    public $defaultRoute        = 'log';
    public function init()
    {
        parent::init();
    }
}
