<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/21
 * Time: 11:39
 */

namespace app\modules\admin\controllers;


use app\models\LoginForm;
use app\models\User;

class SignController extends  BaseController
{

    public $layout=false;
    public function  actionIn(){
        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);

    }
}