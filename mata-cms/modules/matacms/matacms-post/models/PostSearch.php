<?php

/**
 * @link http://www.matacms.com/
 * @copyright Copyright (c) 2015 Qi Interactive Limited
 * @license http://www.matacms.com/license/
 */

namespace matacms\post\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use matacms\post\models\Post;

/**
 * PostSearch represents the model behind the search form about `matacms\post\models\Post`.
 */
class PostSearch extends Post {


    public function rules() {
        return [
            [['Title', 'Body', 'URI', 'Priority', 'Category_One', 'Category_Two', 'PublicationDate'], 'safe'],
            [['Title', 'Lead', 'Body'], 'string'],
            [['Author'], 'string', 'max' => 128],
            [['URI'], 'string', 'max' => 255]
        ];
    }

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
        $query = Post::find();

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
            ->andFilterWhere(['like', 'Body', $this->Body])
            ->andFilterWhere(['like', 'Category_One', $this->Category_One])
            ->andFilterWhere(['like', 'Category_Two', $this->Category_Two])
            ->andFilterWhere(['like', 'Priority', $this->Priority])
            ->andFilterWhere(['<=', 'PublicationDate', $this->PublicationDate])
            ->andFilterWhere(['>=', 'PublicationDateEnd', $this->PublicationDate]);

        return $dataProvider;
    }

}