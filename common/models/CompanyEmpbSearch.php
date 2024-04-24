<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CompanyEmpb;

/**
 * CompanyEmpbSearch represents the model behind the search form about `\common\models\CompanyEmpb`.
 */
class CompanyEmpbSearch extends CompanyEmpb
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'userid', 'companyid', 'userprofile_exID', 'userprofileID', 'role_id', 'employee_typeID', 'department_ID', 'managerID', 'isactive'], 'integer'],
            [['employee_email', 'employee_number', 'designation', 'created_at', 'updated_at','name'], 'safe'],
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
        $query = CompanyEmpb::find()->where(['employee_typeID'=>1]);

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
            'userid' => $this->userid,
			
            'companyid' => $this->companyid,
            'userprofile_exID' => $this->userprofile_exID,
            'userprofileID' => $this->userprofileID,
            'role_id' => $this->role_id,
            'employee_typeID' => $this->employee_typeID,
            'department_ID' => $this->department_ID,
            'managerID' => $this->managerID,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'isactive' => $this->isactive,
        ]);

        $query->andFilterWhere(['like', 'employee_email', $this->employee_email])
		    ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'employee_number', $this->employee_number])
            ->andFilterWhere(['like', 'designation', $this->designation]);

        return $dataProvider;
    }
}
