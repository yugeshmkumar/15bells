<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\LeadsSales;

/**
 * LeadsSalesSearch represents the model behind the search form about `common\models\LeadsSales`.
 */
class LeadsSalesSearch extends LeadsSales
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'product_id', 'role_id', 'isactive'], 'integer'],
            [['email', 'location', 'name', 'countrycode', 'number', 'created_at', 'updated_at','tags'], 'safe'],
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
	 
	 public function searchbystatusndproduct_forhead($params,$statusid,$pr)
    {    $emp = \common\models\CompanyEmpb::find()->where(['userid'=>Yii::$app->user->identity->id])->one();
	
        $query = LeadsSales::find()->join('LEFT OUTER JOIN','leadcurrentstatus_sales','leadcurrentstatus_sales.leadid = leads_sales.id')
		
		->where('leadcurrentstatus_sales.statusid =:sid and leadcurrentstatus_sales.isactive =:actv and leadcurrentstatus_sales.productid =:prd',array(':sid'=>$statusid ,':actv'=>1,':prd'=>$pr));


		 $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            'role_id' => $this->role_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'isactive' => $this->isactive,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'countrycode', $this->countrycode])
		    ->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'number', $this->number]);

        return $dataProvider;
    }
	 public function searchbystatusndproduct($params,$statusid,$pr)
    {    $emp = \common\models\CompanyEmpb::find()->where(['userid'=>Yii::$app->user->identity->id])->one();
	
        $query = LeadsSales::find()->join('LEFT OUTER JOIN','leadcurrentstatus_sales','leadcurrentstatus_sales.leadid = leads_sales.id')
		->join('LEFT OUTER JOIN','leadassignment_sales','leadassignment_sales.leadid = leads_sales.id')
		->where('leadcurrentstatus_sales.statusid =:sid and leadcurrentstatus_sales.isactive =:actv and leadcurrentstatus_sales.productid =:prd and leadassignment_sales.assigned_toID =:loginuserid',array(':sid'=>$statusid ,':actv'=>1,':prd'=>$pr,':loginuserid'=>$emp->id));


		 $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            'role_id' => $this->role_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'isactive' => $this->isactive,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'countrycode', $this->countrycode])
		    ->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'number', $this->number]);

        return $dataProvider;
    }
		 public function searchbystatus_forhead($params,$statusid)
    {    $emp = \common\models\CompanyEmpb::find()->where(['userid'=>Yii::$app->user->identity->id])->one();
	
        $query = LeadsSales::find()->join('LEFT OUTER JOIN','leadcurrentstatus_sales','leadcurrentstatus_sales.leadid = leads_sales.id')
		
		->where('leadcurrentstatus_sales.statusid =:sid and leadcurrentstatus_sales.isactive =:actv',array(':sid'=>$statusid ,':actv'=>1));


		 $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            'role_id' => $this->role_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'isactive' => $this->isactive,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'countrycode', $this->countrycode])
			->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'number', $this->number]);

        return $dataProvider;
    }




	 public function searchbystatus($params,$statusid)
    {    $emp = \common\models\CompanyEmpb::find()->where(['userid'=>Yii::$app->user->identity->id])->one();
	
        $query = LeadsSales::find()->join('LEFT OUTER JOIN','leadcurrentstatus_sales','leadcurrentstatus_sales.leadid = leads_sales.id')
		->join('LEFT OUTER JOIN','leadassignment_sales','leadassignment_sales.leadid = leads_sales.id')
                ->join('LEFT OUTER JOIN','save_search','save_search.id = leads_sales.product_id')                

		->where('leadcurrentstatus_sales.statusid =:sid and leadcurrentstatus_sales.isactive =:actv and leadassignment_sales.assigned_toID =:loginuserid',array(':sid'=>$statusid ,':actv'=>1,':loginuserid'=>$emp->id))->orderBy(['leads_sales.id' => SORT_DESC]);


		 $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            'role_id' => $this->role_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'isactive' => $this->isactive,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'countrycode', $this->countrycode])
			->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'number', $this->number]);

        return $dataProvider;
    }



 public function searchbysupplystatus($params,$statusid)
    {    $emp = \common\models\CompanyEmpb::find()->where(['userid'=>Yii::$app->user->identity->id])->one();
	
        $query = LeadsSales::find()->join('LEFT OUTER JOIN','leadcurrentstatus_sales','leadcurrentstatus_sales.leadid = leads_sales.id')
		->join('LEFT OUTER JOIN','leadassignment_sales','leadassignment_sales.leadid = leads_sales.id')
                ->join('LEFT OUTER JOIN','save_search','save_search.id = leads_sales.product_id')                

		->where('leadcurrentstatus_sales.statusid =:sid and leadcurrentstatus_sales.isactive =:actv and leadassignment_sales.assigned_toID =:loginuserid',array(':sid'=>$statusid ,':actv'=>1,':loginuserid'=>$emp->id))->orderBy(['leads_sales.id' => SORT_DESC]);


		 $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            'role_id' => $this->role_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'isactive' => $this->isactive,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'countrycode', $this->countrycode])
			->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'number', $this->number]);

        return $dataProvider;
    }




	 public function searchbylead($params,$id)
    {
        $query = LeadsSales::find()->where(['id'=>$id]);

		 $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            'role_id' => $this->role_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'isactive' => $this->isactive,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'countrycode', $this->countrycode])
			->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'number', $this->number]);

        return $dataProvider;
    }
	
	
    public function search($params)
    {
        $query = LeadsSales::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'product_id' => $this->product_id,
            'role_id' => $this->role_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'isactive' => $this->isactive,
        ]);

        $query->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'countrycode', $this->countrycode])
			->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'number', $this->number]);

        return $dataProvider;
    }
	
	public function findactions($statusid)
	{
		$LeadsSalestatusconfig = \common\models\Leadsstatusconfig::find()
		->where(['statusid'=>$statusid])->all();
	}
	
}
