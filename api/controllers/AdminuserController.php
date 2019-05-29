<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/29 0029
 * Time: 14:06
 */

namespace api\controllers;

use Yii;
use api\models\ApiLoginForm;
use yii\rest\ActiveController;

class AdminuserController extends ActiveController
{
    public $modelClass = 'common\models\Adminuser';

    public function actionLogin()
    {
        $model = new ApiLoginForm();
//        $model->username = $_POST['username'];
//        $model->password = $_POST['password'];
        $model->load(Yii::$app->getRequest()->getBodyParams(),'');

        if ($model->login()) {
            return ['access_token' => $model->login()];
        } else {
            $model->validate();
            return $model;
        }

    }
}