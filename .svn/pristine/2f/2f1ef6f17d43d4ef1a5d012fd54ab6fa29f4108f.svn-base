<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/20
 * Time: 17:47
 */

namespace app\controllers;


use yii\web\Controller;

class BaseController extends Controller
{

    /**
     * 获取session
     * @param $key
     * @return mixed
     */
    public function getSession($key){
        return \Yii::$app->session->get($key);
    }

    /**
     * 设置session
     * @param $key
     * @param $value
     */
    public function setSession($key,$value){
        \Yii::$app->session->set($key,$value);
    }

    /**
     *
     * 获取登录用户
     * @return mixed
     * qx_user[
     *   uid
     *
     *
     * ]
     *
     */
    public function getLoginUser(){
        return  $this->getSession("qx_user");
    }

}