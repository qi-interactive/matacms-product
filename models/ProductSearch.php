<?php

/**
 * @link http://www.matacms.com/
 * @copyright Copyright (c) 2015 Qi Interactive Limited
 * @license http://www.matacms.com/license/
 */

namespace matacms\product\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use matacms\product\models\Product;

/**
 * ProductSearch represents the model behind the search form about `matacms\product\models\Product`.
 */
class ProductSearch extends Product {
    
    public function rules()
    {
        return [
            [['Id'], 'integer'],
            [['Name', 'text', 'URI'], 'safe'],
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
        $query = Product::find();

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

        $query->andFilterWhere(['like', 'Name', $this->Name])
            ->andFilterWhere(['like', 'Text', $this->Text])
            ->andFilterWhere(['like', 'URI', $this->URI]);

        return $dataProvider;
    }

}
