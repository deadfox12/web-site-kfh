<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\VehicleAccessory;

/**
 * VehicleAccessorySearch represents the model behind the search form of `app\models\VehicleAccessory`.
 */
class VehicleAccessorySearch extends VehicleAccessory
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['vehicle_id', 'accessory_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = VehicleAccessory::find();

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
            'vehicle_id' => $this->vehicle_id,
            'accessory_id' => $this->accessory_id,
        ]);

        return $dataProvider;
    }
}
