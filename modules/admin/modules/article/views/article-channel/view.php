<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\article\ArticleChannels */

$this->title = $model->c_code;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', '文章频道'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-channels-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', '更新'), ['update', 'id' => $model->c_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', '删除'), ['delete', 'id' => $model->c_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'c_id',
            'c_name',
            'c_code',
            'c_desc',
            [
                "attribute"=>"c_status",
                "value"=>$model->c_status?"开启":"关闭"
            ],
            [
                "attribute"=>'pid',
                "value"=>$model->pid==0?"没有父频道":\app\models\article\ArticleChannels::find()->where(["c_id"=>$model->pid])->one()->c_code
            ],
            'level',
            'path',
        ],
    ]) ?>

</div>
