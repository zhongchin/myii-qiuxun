<?php

namespace app\modules\api\modules\article\controllers;

use app\models\article\ArticleChannels;
use app\models\article\Articles;
use app\models\tools\ApiTool;
use app\modules\api\Api;
use app\modules\api\controllers\BaseController;
use Yii;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticleController implements the CRUD actions for Articles model.
 */
class ArticleController extends BaseController
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
     * Lists all Articles models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 首页显示的内容频道
     * @param int $count
     */
    public function actionIndexChannel($count=10){

        $articleChannel=new ArticleChannels();
        $channels=$articleChannel->getIndexArticleChannel($count);
        if(count($channels)<=0){
            ApiTool::encodeMsg(ApiTool::CODE_NO_DATA);
        }
        ApiTool::encodeMsg(ApiTool::CODE_OK,$channels);
    }

    /**
     * 频道文章
     */
    public function actionChannelArticle(){
        $request=Yii::$app->request;
        if($request->isPost){
            $channel=$request->post("channel");
            $num=$request->post("num",10);
            $offset=$request->post("offset",0);
            if(!$channel){
                ApiTool::encodeMsg(ApiTool::CODE_PARAM_MISS);
            }
            $article= new Articles();
            $articles=$article->getArticlesByChannel($channel,$num,$offset);
            if(count($articles)>=1){
                ApiTool::encodeMsg(ApiTool::CODE_OK,$articles);
            }
            ApiTool::encodeMsg(ApiTool::CODE_NO_DATA);
        }
        ApiTool::encodeMsg(ApiTool::CODE_ILLEGAL_REQUEST);


    }

    /**
     * 文章详情
     */
    public function actionArticleDetail(){
        $request=Yii::$app->request;
         if($request->isPost){
           $aid= $request->post("aid");
           $article= new Articles();
           $articleModel=$article->find()->where(["a_id"=>$aid])->asArray()->one();
             if(count($articleModel)>0){
                 ApiTool::encodeMsg(ApiTool::CODE_OK,$articleModel);
             }
             ApiTool::encodeMsg(ApiTool::CODE_NO_DATA);
         }
        ApiTool::encodeMsg(ApiTool::CODE_ILLEGAL_REQUEST);
    }


    /**
     * Finds the Articles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Articles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Articles::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
