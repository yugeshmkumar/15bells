<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Leads;

/**
 * LeadsSearch represents the model behind the search form about `common\models\Leads`.
 */
class LeadsSearch extends Leads
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
	
        $query = Leads::find()->join('LEFT OUTER JOIN','leadcurrentstatus','leadcurrentstatus.leadid = leads.id')
		
		->where('leadcurrentstatus.statusid =:sid and leadcurrentstatus.isactive =:actv and leadcurrentstatus.productid =:prd',array(':sid'=>$statusid ,':actv'=>1,':prd'=>$pr));


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
	
        $query = Leads::find()->join('LEFT OUTER JOIN','leadcurrentstatus','leadcurrentstatus.leadid = leads.id')
		->join('LEFT OUTER JOIN','leadassignment','leadassignment.leadid = leads.id')
		->where('leadcurrentstatus.statusid =:sid and leadcurrentstatus.isactive =:actv and leadcurrentstatus.productid =:prd and leadassignment.assigned_toID =:loginuserid',array(':sid'=>$statusid ,':actv'=>1,':prd'=>$pr,':loginuserid'=>$emp->id));


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
	
        $query = Leads::find()->join('LEFT OUTER JOIN','leadcurrentstatus','leadcurrentstatus.leadid = leads.id')
		
		->where('leadcurrentstatus.statusid =:sid and leadcurrentstatus.isactive =:actv',array(':sid'=>$statusid ,':actv'=>1));


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

    {   

 $emp = \common\models\CompanyEmpb::find()->where(['userid'=>Yii::$app->user->identity->id])->one();
	
        $query = Leads::find()->join('LEFT OUTER JOIN','leadcurrentstatus','leadcurrentstatus.leadid = leads.id')
		->join('LEFT OUTER JOIN','leadassignment','leadassignment.leadid = leads.id')
				->where('leadcurrentstatus.statusid =:sid and leadcurrentstatus.isactive =:actv and leadassignment.assigned_toID =:loginuserid and leads.move_to_alloted =:move' ,array(':sid'=>$statusid ,':actv'=>1,':loginuserid'=>$emp->id,':move'=>1));



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
    
    
    public function searchbystatusalloted($params,$statusid)

    {   

 $emp = \common\models\CompanyEmpb::find()->where(['userid'=>Yii::$app->user->identity->id])->one();
	
        $query = Leads::find()->join('LEFT OUTER JOIN','leadcurrentstatus','leadcurrentstatus.leadid = leads.id')
		->join('LEFT OUTER JOIN','leadassignment','leadassignment.leadid = leads.id')
				->where('leadcurrentstatus.statusid =:sid and leadcurrentstatus.isactive =:actv and leadassignment.assigned_toID =:loginuserid and leads.move_to_alloted =:move' ,array(':sid'=>$statusid ,':actv'=>1,':loginuserid'=>$emp->id,':move'=>2));



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
        $query = Leads::find()->where(['id'=>$id]);

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
        $query = Leads::find();

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
		$leadstatusconfig = \common\models\Leadstatusconfig::find()
		->where(['statusid'=>$statusid])->all();
	}
	
}
