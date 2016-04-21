<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\article\ArticleChannels */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-channels-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'c_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'c_desc')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'pid')->listBox( \yii\helpers\ArrayHelper::map(\app\models\article\ArticleChannels::getAllArticleChannel($model?$model->c_id:0),"c_id","c_code"));?>

    <?= $form->field($model, 'c_status')->radioList(["1"=>"是",0=>"否"]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
