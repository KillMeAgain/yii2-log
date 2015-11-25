Yii2日志记录
========
Installation
------------
###Install From the Archive
Download the latest release from here [releases](https://github.com/KillMeAgain/yii2-log/releases), then extract it to your project.
In your application config, add the path alias for this extension.

```php
return [
    ...
    'aliases' => [
        '@bigm/log' => 'path/to/your/extracted',
        // for example: '@bigm/log' => '@app/vendor/yiisoft/yii2-log',
        ...
    ]
];
```
Usage
-----

Once the extension is installed, simply modify your application configuration as follows:

```php
return [
    'modules' => [
        'log' => [
            'class' => 'bigm\log\Module',
            ...
        ]
        ...
    ],
    ...
    'components' => [
            ...
            'mylog' => [
                'class' => 'bigm\log\Log',
            ]
        ],
];
```
execute the migration here:
```
yii migrate --migrationPath=@bigm/log/migrations
```
You can then access Yii2-log through the following URL:

```
http://localhost/path/to/index.php?r=log
```
When you need add a log use this code:
```
<?php
use Yii;
...
Yii::$app->mylog->info($message);
Yii::$app->mylog->error($message);
Yii::$app->mylog->warning($message);
Yii::$app->mylog->debug($message);
or
Yii::$app->mylog->log($message,'TAG','LEVEL');
...
```
