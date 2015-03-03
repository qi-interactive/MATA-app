<?php

namespace matacms\modules\news\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use matacms\modules\news\models\News;

/**
 * PostSearch represents the model behind the search form about `matacms\post\models\Post`.
 */
class NewsSearch extends News {
    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['Id'], 'integer'],
            [['Title', 'Author', 'Lead', 'Body', 'URI'], 'safe'],
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
        $query = News::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'Id' => $this->Id,
        ]);

        $query->andFilterWhere(['like', 'Title', $this->Title])
            ->andFilterWhere(['like', 'Author', $this->Author])
            ->andFilterWhere(['like', 'Lead', $this->Lead])
            ->andFilterWhere(['like', 'Body', $this->Body])
            ->andFilterWhere(['like', 'URI', $this->URI]);

        return $dataProvider;
    }
}