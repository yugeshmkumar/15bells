<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\MyProperty;

/**
 * MyPropertySearch represents the model behind the search form about `common\models\MyProperty`.
 */
class MyPropertySearch extends MyProperty
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'client_id', 'floors', 'tenure', 'stampDuty_registration'], 'integer'],
            [['site_name', 'site_address', 'super_area', 'carpet_area', 'auto_cad_drawing', 'possession', 'commercial_approved', 'agreement', 'rent', 'maintenance', 'last_date_rent', 'fit_out_period', 'electricity_load', 'clarityOn_meter_submeter', 'power_backup', 'property_tax', 'spaceForGenset_ac_watertank', 'car_parking', 'motor_waterSupply', 'working_hour_restrict', 'created_date', 'is_active'], 'safe'],
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
        $query = MyProperty::find();

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
            'id' => $this->id,
            'client_id' => $this->client_id,
            'floors' => $this->floors,
            'tenure' => $this->tenure,
            'last_date_rent' => $this->last_date_rent,
            'stampDuty_registration' => $this->stampDuty_registration,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'site_name', $this->site_name])
            ->andFilterWhere(['like', 'site_address', $this->site_address])
            ->andFilterWhere(['like', 'super_area', $this->super_area])
            ->andFilterWhere(['like', 'carpet_area', $this->carpet_area])
            ->andFilterWhere(['like', 'auto_cad_drawing', $this->auto_cad_drawing])
            ->andFilterWhere(['like', 'possession', $this->possession])
            ->andFilterWhere(['like', 'commercial_approved', $this->commercial_approved])
            ->andFilterWhere(['like', 'agreement', $this->agreement])
            ->andFilterWhere(['like', 'rent', $this->rent])
            ->andFilterWhere(['like', 'maintenance', $this->maintenance])
            ->andFilterWhere(['like', 'fit_out_period', $this->fit_out_period])
            ->andFilterWhere(['like', 'electricity_load', $this->electricity_load])
            ->andFilterWhere(['like', 'clarityOn_meter_submeter', $this->clarityOn_meter_submeter])
            ->andFilterWhere(['like', 'power_backup', $this->power_backup])
            ->andFilterWhere(['like', 'property_tax', $this->property_tax])
            ->andFilterWhere(['like', 'spaceForGenset_ac_watertank', $this->spaceForGenset_ac_watertank])
            ->andFilterWhere(['like', 'car_parking', $this->car_parking])
            ->andFilterWhere(['like', 'motor_waterSupply', $this->motor_waterSupply])
            ->andFilterWhere(['like', 'working_hour_restrict', $this->working_hour_restrict])
            ->andFilterWhere(['like', 'is_active', $this->is_active]);

        return $dataProvider;
    }
}
