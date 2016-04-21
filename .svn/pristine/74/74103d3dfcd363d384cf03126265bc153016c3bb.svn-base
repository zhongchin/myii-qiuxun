<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\article\search\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', '文章');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-index container">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', '创建文章'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'a_id',
            'subject',
            'content:ntext',
            'auid',
            'author',
            // 'created_at',
            // 'publish_time:datetime',
            // 'a_status',
            // 'c_id',
            // 'review',
            // 'is_hot',
            // 'a_sort',
            // 'a_s_key',
            // 'a_s_desc',
            // 'a_s_title',
            // 'tags',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
