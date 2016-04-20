<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\article\Articles */

$this->title = Yii::t('app', Yii::t("admin",'Create Articles'));
$this->params['breadcrumbs'][] = ['label' => Yii::t('admin', 'Articles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="articles-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
