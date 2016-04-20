<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/20
 * Time: 14:25
 */

namespace app\modules\admin\controllers;


use app\models\permission\AdminMenu;

class BaseController extends \app\controllers\BaseController
{
    public $leftMenus;

    public function beforeAction($action){
            $this->leftMenus=$this->getLeftMenu();
            return parent::beforeAction($action);
    }

    public function getLeftMenu(){
        $adminMenu= new AdminMenu();
        return $adminMenu->getAdminMenu(0);
    }




}