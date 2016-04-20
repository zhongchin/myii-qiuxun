<?php

namespace app\models\article\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\article\ArticleChannels;

/**
 * ArticleChannelSearch represents the model behind the search form about `app\models\article\ArticleChannels`.
 */
class ArticleChannelSearch extends ArticleChannels
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['c_id', 'c_status', 'pid', 'level'], 'integer'],
            [['c_name', 'c_code', 'c_desc', 'path'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ArticleChannels::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'c_id' => $this->c_id,
            'c_status' => $this->c_status,
            'pid' => $this->pid,
            'level' => $this->level,
        ]);

        $query->andFilterWhere(['like', 'c_name', $this->c_name])
            ->andFilterWhere(['like', 'c_code', $this->c_code])
            ->andFilterWhere(['like', 'c_desc', $this->c_desc])
            ->andFilterWhere(['like', 'path', $this->path]);

        return $dataProvider;
    }
}
