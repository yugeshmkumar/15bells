<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Documentdata;

/**
 * DocumentdataSearch represents the model behind the search form about `common\models\Documentdata`.
 */
class DocumentdataSearch extends Documentdata
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['documentDataID', 'documentConfigID', 'BusID', 'employeeID'], 'integer'],
            [['documentFileName', 'documentDescription'], 'safe'],
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
        $query = Documentdata::find()->where('BusID !=:ag', array(':ag'=>''));;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        } 

        $query->andFilterWhere([
            'documentDataID' => $this->documentDataID,
            'documentConfigID' => $this->documentConfigID,
            'BusID' => $this->BusID,
            'employeeID' => $this->employeeID,
        ]);

        $query->andFilterWhere(['like', 'documentFileName', $this->documentFileName])
            ->andFilterWhere(['like', 'documentDescription', $this->documentDescription]);

        return $dataProvider;
    }
    public function searchone($params)
    {
        $query = Documentdata::find()->where('employeeID !=:ag', array(':ag'=>''));;

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'documentDataID' => $this->documentDataID,
            'documentConfigID' => $this->documentConfigID,
            'BusID' => $this->BusID,
            'employeeID' => $this->employeeID,
        ]);

        $query->andFilterWhere(['like', 'documentFileName', $this->documentFileName])
            ->andFilterWhere(['like', 'documentDescription', $this->documentDescription]);

        return $dataProvider;
    }
     public function searchforbus($params,$busnumber)
    {
        $query = Documentdata::find()->where('documentConfigID =:rt1  and BusID =:ya and BusID !=:ag', array(':rt1'=>1,':ag'=>'',':ya'=>"$busnumber"));

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'documentDataID' => $this->documentDataID,
            'documentConfigID' => $this->documentConfigID,
            'BusID' => $this->BusID,
            'employeeID' => $this->employeeID,
        ]);

        $query->andFilterWhere(['like', 'documentFileName', $this->documentFileName])
            ->andFilterWhere(['like', 'documentDescription', $this->documentDescription]);

        return $dataProvider;
       
    }
     public function searchforemployee($params,$employee)
    {
       $query = Documentdata::find()->where('documentConfigID =:rt1 and employeeID !=:bh and employeeID =:ag', array(':rt1'=>2 , ':bh'=>'',':ag'=>"$employee"));

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'documentDataID' => $this->documentDataID,
            'documentConfigID' => $this->documentConfigID,
            'BusID' => $this->BusID,
            'employeeID' => $this->employeeID,
        ]);

        $query->andFilterWhere(['like', 'documentFileName', $this->documentFileName])
            ->andFilterWhere(['like', 'documentDescription', $this->documentDescription]);

        return $dataProvider;
    }
}
