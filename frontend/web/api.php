<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/11 0011
 * Time: 10:30
 */

defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'prod');

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../vendor/yiisoft/yii2/Yii.php';
require __DIR__ . '/../../common/config/bootstrap.php';
require __DIR__ . '/../../api/config/bootstrap.php';
//require __DIR__ . '/../../common/config/const.php';

$config = yii\helpers\ArrayHelper::merge(
    require __DIR__ . '/../../common/config/main.php',
    require __DIR__ . '/../../common/config/main-local.php',
    require __DIR__ . '/../../api/config/main.php',
    require __DIR__ . '/../../api/config/main-local.php'
);

(new yii\web\Application($config))->run();
