<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Shortlistproperty;
use common\models\CompanyEmp;

/**
 * RequestDocumentShowSearch represents the model behind the search form about `common\models\RequestDocumentShow`.
 */
class ShortlistpropertySearch extends RequestDocumentShow
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'property_id'], 'integer'],
            [['created_date'], 'safe'],
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
   


     public function searches($params)
    {
        $user_id = Yii::$app->user->identity->id;
        $querys = CompanyEmp::find()->where(['userid'=>$user_id])->one();
        $assigned_id = $querys->id;
        $query = Shortlistproperty::find()->orderBy('id desc')->where(['assigned_id'=>$assigned_id]);
        //$query = RequestDocumentShow::find()->where(['user_id' => $user_id])->andwhere(['status'=>1]);

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
            'user_id' => $this->user_id,
            'property_id' => $this->property_id,
            
            'created_date' => $this->created_date,
        ]);

        

        return $dataProvider;
    }





 
}
