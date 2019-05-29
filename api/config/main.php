<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-api',
        ],
        'user' => [
            'identityClass' => 'common\models\Adminuser', //认证类 代表用户是adminuser中的
            'enableAutoLogin' => true, //允许自动登录
            'enableSession'=>false, //新加
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
//        'session' => [
//            // this is the name of the session cookie used for login on the backend
//            'name' => 'advanced-api',
//        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing' => true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class'=>'yii\rest\UrlRule',
                    'controller'=>'adminuser',
                    'extraPatterns'=>[
                        'POST login' => 'login'
                    ],
                ],
                [
                    'class'=>'yii\rest\UrlRule',
                    'controller'=>'top10',
                    'pluralize'=>false,
                    'except'=>['delete','create']
                ],
                [
                    'class'=>'yii\rest\UrlRule',
                    'controller'=>'article',
                    'extraPatterns'=>[
                        'POST search' => 'search'
                    ],
                    'ruleConfig'=>[
                        'class'=>'yii\web\urlRule',
                        'defaults'=>[
                            'expand'=>'createdBy'
                        ]
                    ]
                ]
            ],
        ],

    ],
    'params' => $params,
];
