<?php

namespace app\modules\api;

/**
 * api module definition class
 */
class Api extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\api\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->modules=[
            "article"=>"app\modules\api\modules\article\Article"
        ];
        parent::init();

        // custom initialization code goes here
    }
}
