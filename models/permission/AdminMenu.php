<?php

namespace app\models\permission;

use Yii;
use yii\db\Query;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%qx_admin_menus}}".
 *
 * @property integer $m_id
 * @property string $m_name
 * @property string $m_code
 * @property string $m_url
 * @property integer $parentid
 * @property integer $m_sort
 * @property integer $m_status
 */
class AdminMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%qx_admin_menus}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['m_name', 'm_code', 'm_sort', 'm_status'], 'required'],
            [['parentid', 'm_sort', 'm_status'], 'integer'],
            [['m_name', 'm_code'], 'string', 'max' => 20],
            [['m_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'm_id' => Yii::t('app', 'M ID'),
            'm_name' => Yii::t('app', 'M Name'),
            'm_code' => Yii::t('app', 'M Code'),
            'm_url' => Yii::t('app', 'M Url'),
            'parentid' => Yii::t('app', 'Parentid'),
            'm_sort' => Yii::t('app', 'M Sort'),
            'm_status' => Yii::t('app', 'M Status'),
        ];
    }

    /**
     * 获取菜单
     * @param int $pid
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getAdminMenu($pid=0){
        $menus=self::find()->where(["parentid"=>$pid,"m_status"=>1])->asArray()->all();
        if(count($menus)>0){
            foreach($menus as $k=>$menu){
                 $menus[$k]["child"]=self::getAdminMenu($menu["m_id"]);
            }
        }
        return $menus;
    }

    public static function getAllMenus($mId=0){

        $query=self::find()->where(["m_status"=>1]);

        if($mId){
            $query->andWhere(["m_id!="=>$mId]);
        }
        $menus= $query->select("m_id,m_code")->asArray()->all();
        return $menus;
    }

}
