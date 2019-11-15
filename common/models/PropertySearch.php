<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Property;

/**
 * PropertySearch represents the model behind the search form about `common\models\Property`.
 */
class PropertySearch extends Property
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'userid', 'roleid', 'projectypeid', 'visibility_flags', 'marketing_flags', 'property_status_flags', 'isactive'], 'integer'],
            [['propertydescr', 'property_for', 'location', 'locality', 'city', 'state', 'address', 'country', 'property_features', 'building_no', 'building_name', 'totalrooms', 'totalfloors', 'floorno', 'totalbalconies', 'furnishedstatus', 'on_road', 'walls_made', 'office_space_shared', 'personal_washrooms', 'pantry_available', 'total_area', 'built_up_area', 'carpet_area', 'expected_price', 'price_per_sqft', 'maintaince_cost', 'maintaince_by', 'include_stamp_reg_charges', 'brokers_response', 'available_from_month', 'available_from_year', 'last_updated', 'ratings', 'count_views', 'featured_image', 'featured_thumbnails_id', 'marketing_cost', 'registry_cost', 'electricity_charges', 'maintainces_charges', 'deposite_amount', 'rules_regulations', 'notice_period', 'created_at', 'updated_at'], 'safe'],
            [['longitude', 'latitude'], 'number'],
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
        $query = Property::find();

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
            'userid' => $this->userid,
            'roleid' => $this->roleid,
            'projectypeid' => $this->projectypeid,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'last_updated' => $this->last_updated,
            'visibility_flags' => $this->visibility_flags,
            'marketing_flags' => $this->marketing_flags,
            'property_status_flags' => $this->property_status_flags,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'isactive' => $this->isactive,
        ]);

        $query->andFilterWhere(['like', 'propertydescr', $this->propertydescr])
            ->andFilterWhere(['like', 'property_for', $this->property_for])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'locality', $this->locality])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'property_features', $this->property_features])
            ->andFilterWhere(['like', 'building_no', $this->building_no])
            ->andFilterWhere(['like', 'building_name', $this->building_name])
            ->andFilterWhere(['like', 'totalrooms', $this->totalrooms])
            ->andFilterWhere(['like', 'totalfloors', $this->totalfloors])
            ->andFilterWhere(['like', 'floorno', $this->floorno])
            ->andFilterWhere(['like', 'totalbalconies', $this->totalbalconies])
            ->andFilterWhere(['like', 'furnishedstatus', $this->furnishedstatus])
            ->andFilterWhere(['like', 'on_road', $this->on_road])
            ->andFilterWhere(['like', 'walls_made', $this->walls_made])
            ->andFilterWhere(['like', 'office_space_shared', $this->office_space_shared])
            ->andFilterWhere(['like', 'personal_washrooms', $this->personal_washrooms])
            ->andFilterWhere(['like', 'pantry_available', $this->pantry_available])
            ->andFilterWhere(['like', 'total_area', $this->total_area])
            ->andFilterWhere(['like', 'built_up_area', $this->built_up_area])
            ->andFilterWhere(['like', 'carpet_area', $this->carpet_area])
            ->andFilterWhere(['like', 'expected_price', $this->expected_price])
            ->andFilterWhere(['like', 'price_per_sqft', $this->price_per_sqft])
            ->andFilterWhere(['like', 'maintaince_cost', $this->maintaince_cost])
            ->andFilterWhere(['like', 'maintaince_by', $this->maintaince_by])
            ->andFilterWhere(['like', 'include_stamp_reg_charges', $this->include_stamp_reg_charges])
            ->andFilterWhere(['like', 'brokers_response', $this->brokers_response])
            ->andFilterWhere(['like', 'available_from_month', $this->available_from_month])
            ->andFilterWhere(['like', 'available_from_year', $this->available_from_year])
            ->andFilterWhere(['like', 'ratings', $this->ratings])
            ->andFilterWhere(['like', 'count_views', $this->count_views])
            ->andFilterWhere(['like', 'featured_image', $this->featured_image])
            ->andFilterWhere(['like', 'featured_thumbnails_id', $this->featured_thumbnails_id])
            ->andFilterWhere(['like', 'marketing_cost', $this->marketing_cost])
            ->andFilterWhere(['like', 'registry_cost', $this->registry_cost])
            ->andFilterWhere(['like', 'electricity_charges', $this->electricity_charges])
            ->andFilterWhere(['like', 'maintainces_charges', $this->maintainces_charges])
            ->andFilterWhere(['like', 'deposite_amount', $this->deposite_amount])
            ->andFilterWhere(['like', 'rules_regulations', $this->rules_regulations])
            ->andFilterWhere(['like', 'notice_period', $this->notice_period]);

        return $dataProvider;
    }
	 public function searchuser($params)
    {
        $query = Property::find()->where(['userid'=>Yii::$app->user->identity->id]);

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
            'userid' => $this->userid,
            'roleid' => $this->roleid,
            'projectypeid' => $this->projectypeid,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'last_updated' => $this->last_updated,
            'visibility_flags' => $this->visibility_flags,
            'marketing_flags' => $this->marketing_flags,
            'property_status_flags' => $this->property_status_flags,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'isactive' => $this->isactive,
        ]);

        $query->andFilterWhere(['like', 'propertydescr', $this->propertydescr])
            ->andFilterWhere(['like', 'property_for', $this->property_for])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'locality', $this->locality])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'country', $this->country])
            ->andFilterWhere(['like', 'property_features', $this->property_features])
            ->andFilterWhere(['like', 'building_no', $this->building_no])
            ->andFilterWhere(['like', 'building_name', $this->building_name])
            ->andFilterWhere(['like', 'totalrooms', $this->totalrooms])
            ->andFilterWhere(['like', 'totalfloors', $this->totalfloors])
            ->andFilterWhere(['like', 'floorno', $this->floorno])
            ->andFilterWhere(['like', 'totalbalconies', $this->totalbalconies])
            ->andFilterWhere(['like', 'furnishedstatus', $this->furnishedstatus])
            ->andFilterWhere(['like', 'on_road', $this->on_road])
            ->andFilterWhere(['like', 'walls_made', $this->walls_made])
            ->andFilterWhere(['like', 'office_space_shared', $this->office_space_shared])
            ->andFilterWhere(['like', 'personal_washrooms', $this->personal_washrooms])
            ->andFilterWhere(['like', 'pantry_available', $this->pantry_available])
            ->andFilterWhere(['like', 'total_area', $this->total_area])
            ->andFilterWhere(['like', 'built_up_area', $this->built_up_area])
            ->andFilterWhere(['like', 'carpet_area', $this->carpet_area])
            ->andFilterWhere(['like', 'expected_price', $this->expected_price])
            ->andFilterWhere(['like', 'price_per_sqft', $this->price_per_sqft])
            ->andFilterWhere(['like', 'maintaince_cost', $this->maintaince_cost])
            ->andFilterWhere(['like', 'maintaince_by', $this->maintaince_by])
            ->andFilterWhere(['like', 'include_stamp_reg_charges', $this->include_stamp_reg_charges])
            ->andFilterWhere(['like', 'brokers_response', $this->brokers_response])
            ->andFilterWhere(['like', 'available_from_month', $this->available_from_month])
            ->andFilterWhere(['like', 'available_from_year', $this->available_from_year])
            ->andFilterWhere(['like', 'ratings', $this->ratings])
            ->andFilterWhere(['like', 'count_views', $this->count_views])
            ->andFilterWhere(['like', 'featured_image', $this->featured_image])
            ->andFilterWhere(['like', 'featured_thumbnails_id', $this->featured_thumbnails_id])
            ->andFilterWhere(['like', 'marketing_cost', $this->marketing_cost])
            ->andFilterWhere(['like', 'registry_cost', $this->registry_cost])
            ->andFilterWhere(['like', 'electricity_charges', $this->electricity_charges])
            ->andFilterWhere(['like', 'maintainces_charges', $this->maintainces_charges])
            ->andFilterWhere(['like', 'deposite_amount', $this->deposite_amount])
            ->andFilterWhere(['like', 'rules_regulations', $this->rules_regulations])
            ->andFilterWhere(['like', 'notice_period', $this->notice_period]);

        return $dataProvider;
    }
}
