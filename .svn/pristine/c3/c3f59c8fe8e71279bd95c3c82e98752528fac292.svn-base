<?php

namespace app\models\article\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\article\Articles;

/**
 * ArticleSearch represents the model behind the search form about `app\models\article\Articles`.
 */
class ArticleSearch extends Articles
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['a_id', 'auid', 'created_at', 'publish_time', 'a_status', 'c_id', 'review', 'is_hot', 'a_sort'], 'integer'],
            [['subject', 'content', 'author', 'a_s_key', 'a_s_desc', 'a_s_title', 'tags'], 'safe'],
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
        $query = Articles::find();

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
            'a_id' => $this->a_id,
            'auid' => $this->auid,
            'created_at' => $this->created_at,
            'publish_time' => $this->publish_time,
            'a_status' => $this->a_status,
            'c_id' => $this->c_id,
            'review' => $this->review,
            'is_hot' => $this->is_hot,
            'a_sort' => $this->a_sort,
        ]);

        $query->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'author', $this->author])
            ->andFilterWhere(['like', 'a_s_key', $this->a_s_key])
            ->andFilterWhere(['like', 'a_s_desc', $this->a_s_desc])
            ->andFilterWhere(['like', 'a_s_title', $this->a_s_title])
            ->andFilterWhere(['like', 'tags', $this->tags]);

        return $dataProvider;
    }
}
