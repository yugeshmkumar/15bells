<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ContactUs;

/**
 * ContactbackendSearch represents the model behind the search form about `common\models\ContactUs`.
 */
class ContactbackendSearch extends ContactUs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mail_id'], 'integer'],
            [['role_name', 'day_noon', 'builder_name', 'designation', 'full_name', 'email', 'contact_number', 'message', 'is_active', 'created_at'], 'safe'],
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

         $emp = \common\models\CompanyEmpb::find()->where(['userid'=>Yii::$app->user->identity->id])->one();

        $query = ContactUs::find()->where(['comp_emp_id'=>$emp->id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'mail_id' => $this->mail_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'role_name', $this->role_name])
            ->andFilterWhere(['like', 'day_noon', $this->day_noon])
            ->andFilterWhere(['like', 'builder_name', $this->builder_name])
            ->andFilterWhere(['like', 'designation', $this->designation])
            ->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'contact_number', $this->contact_number])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'is_active', $this->is_active]);

        return $dataProvider;
    }
}
