<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\article\Articles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articles-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'c_id')->dropDownList(
        \yii\helpers\ArrayHelper::map(\app\models\article\ArticleChannels::findAll(["c_status"=>1]),"c_id","c_code")
    ) ?>

    <?= $form->field($model, 'is_hot')->radioList(["1"=>"是","0"=>"否"]) ?>

    <?= $form->field($model, 'a_sort')->textInput(["type"=>"number","min"=>0]) ?>

    <?= $form->field($model, 'a_s_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'a_s_desc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'a_s_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tags')->textInput(['maxlength' => true])->label("文章标签,多个用,分割") ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
