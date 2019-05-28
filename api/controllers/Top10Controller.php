<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/28 0028
 * Time: 16:03
 */

namespace api\controllers;


use yii\db\Query;
use yii\rest\Controller;

class Top10Controller extends Controller   //这里不对应数据库的表  不用继承ActiveController
{
    public function actionIndex(){
        $top10=(new Query())
            ->select('created_by,count(id) as createcount')
            ->from('article')
            ->groupBy('created_by')
            ->orderBy('createcount')
            ->limit(10)
            ->all();
        return $top10;
    }
}