<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\article\ArticleChannels */

$this->title = Yii::t('app', '修改 {modelClass}: ', [
    'modelClass' => 'Article Channels',
]) . $model->c_code;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Article Channels'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->c_id, 'url' => ['view', 'id' => $model->c_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="article-channels-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
