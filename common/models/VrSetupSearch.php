<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\VrSetup;

/**
 * VrSetupSearch represents the model behind the search form about `common\models\VrSetup`.
 */
class VrSetupSearch extends VrSetup
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'propertyID', 'moderatorID', 'isactive'], 'integer'],
            [['auction_type', 'fromdatetime', 'todatetime', 'status', 'secret_code', 'created_at', 'updated_at'], 'safe'],
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
        $query = VrSetup::find()->where(['isactive'=>1])->orderBy('id desc');

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
            'id' => $this->id,
            'propertyID' => $this->propertyID,
            'moderatorID' => $this->moderatorID,
            'fromdatetime' => $this->fromdatetime,
            'todatetime' => $this->todatetime,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'isactive' => $this->isactive,
        ]);

        $query->andFilterWhere(['like', 'auction_type', $this->auction_type])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'secret_code', $this->secret_code]);

        return $dataProvider;
    }


    public function searches($params)
    {


        $user_id = Yii::$app->user->identity->id;
       
        $query = VrSetup::find()->orderBy('id desc')->where(['approverID'=>$user_id]);
        //$query = VrSetup::find()->where(['isactive'=>1])->orderBy('id desc');

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
            'id' => $this->id,
            'propertyID' => $this->propertyID,
            'moderatorID' => $this->moderatorID,
            'fromdatetime' => $this->fromdatetime,
            'todatetime' => $this->todatetime,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'isactive' => $this->isactive,
        ]);

        $query->andFilterWhere(['like', 'auction_type', $this->auction_type])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'secret_code', $this->secret_code]);

        return $dataProvider;
    }




	 public function searchformoderator($params,$moderatorID,$status)
    {
        // $query = VrSetup::find()->where(['moderatorID'=>$moderatorID,'status'=>$status])->orderBy('id desc');
        $query = VrSetup::find()->where(['moderatorID'=>$moderatorID])->orderBy('id desc');

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
            'id' => $this->id,
            'propertyID' => $this->propertyID,
            'moderatorID' => $this->moderatorID,
            'fromdatetime' => $this->fromdatetime,
            'todatetime' => $this->todatetime,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'isactive' => $this->isactive,
        ]);

        $query->andFilterWhere(['like', 'auction_type', $this->auction_type])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'secret_code', $this->secret_code]);

        return $dataProvider;
    }
}
