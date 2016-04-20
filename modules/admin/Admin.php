<?php

namespace app\modules\admin;
use app\models\permission\AdminMenu;

/**
 * admin module definition class
 */
class Admin extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $layout="main.php";
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {

        parent::init();
        $this->modules=[
            'article' => [
                'class' => 'app\modules\admin\modules\article\Article',
            ],
        ];

        // custom initialization code goes here
    }

}
