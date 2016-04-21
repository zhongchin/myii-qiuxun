<?php

namespace app\models\article;

use Composer\Command\SelfUpdateCommand;
use Yii;
use yii\db\Query;

/**
 * This is the model class for table "{{%qx_article_channels}}".
 *
 * @property integer $c_id
 * @property string $c_name
 * @property string $c_code
 * @property string $c_desc
 * @property integer $c_status
 * @property integer $pid
 * @property integer $level
 * @property string $path
 */
class ArticleChannels extends \yii\db\ActiveRecord
{

    public static  $settingIndexChannel="qx_setting_index_channel";
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%qx_article_channels}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_name', 'c_code'], 'required'],
            [['c_status', 'pid', 'level'], 'integer'],
            ['c_name','unique'],
            ["c_status","required"],
            [['c_name', 'c_code'], 'string', 'max' => 20],
            [['c_desc', 'path'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'c_id' => '频道id',
            'c_name' => '频道英文编号',
            'c_code' => '频道中文名称',
            'c_desc' => '频道描述',
            'c_status' => '频道状态',
            'pid' => '频道父分类',
            'level' => '频道等级',
            'path' => '分类path',
        ];
    }

    /**
     * 获取首页的文章频道
     * @param int $limit
     * @return array
     */

    public function getIndexArticleChannel($limit=10){
         $query= new Query();
         $query->from(self::tableName()." AS a")
             ->rightJoin(self::$settingIndexChannel." AS b","a.c_id=b.c_id");
         $query->where(["a.c_status"=>1]);
         $query->orderBy(["b.display_order"=>SORT_ASC]);
         $query->limit($limit)->offset(0);
        return $query->all();

    }


    public static function getAllArticleChannel($cId=0){
        $query=self::find()->where(["c_status"=>1]);

        if($cId){
            $query->where(["!=","c_id",$cId]);
        }
        $menus= $query->select("c_id,c_code")->asArray()->all();
        return $menus;
    }
}
