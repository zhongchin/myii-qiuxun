<?php

namespace app\modules\admin\modules\article\controllers;

use app\modules\admin\controllers\BaseController;
use app\modules\admin\modules\article\Article;
use Yii;
use app\models\article\ArticleChannels;
use app\models\article\search\ArticleChannelSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticleChannelController implements the CRUD actions for ArticleChannels model.
 */
class ArticleChannelController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all ArticleChannels models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleChannelSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ArticleChannels model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ArticleChannels model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ArticleChannels();
        $request=Yii::$app->request;
        $post=$request->post();


        if ($model->load($post)) {

            if($model->pid){
                $parentModel=ArticleChannels::find()->where(["c_id"=>$model->pid])->one();
                $parentPath=$parentModel->path;
                $model->path=$parentPath?$parentPath."-".$model->pid:"0-".$model->pid;
                $model->level=$parentModel->level+1;
            }else{
                $model->level=1;
            }
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->c_id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ArticleChannels model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $request=Yii::$app->request;
        $post=$request->post();

        if ($model->load($post)) {
            if($model->pid){
                $parentModel=ArticleChannels::find()->where(["c_id"=>$model->pid])->one();
                $parentPath=$parentModel->path;
                 $model->path=$parentPath?$parentPath."-".$model->pid:"0-".$model->pid;
                $model->level=$parentModel->level+1;
            }else{
                $model->level=0;
            }
            if($model->save()){
                return $this->redirect(['view', 'id' => $model->c_id]);
            }


        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ArticleChannels model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ArticleChannels model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ArticleChannels the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ArticleChannels::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
