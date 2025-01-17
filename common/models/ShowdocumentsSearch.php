<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Showdocuments;

/**
 * ShowdocumentsSearch represents the model behind the search form about `common\models\Showdocuments`.
 */
class ShowdocumentsSearch extends Showdocuments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'userid', 'propertyID', 'isactive'], 'integer'],
            [['userroleID', 'created_at'], 'safe'],
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
    public function search($params,$pid)
    {
        $query = Showdocuments::find()->where(['propertyID'=>$pid]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'userid' => $this->userid,
            'propertyID' => $this->propertyID,
            'created_at' => $this->created_at,
            'isactive' => $this->isactive,
        ]);

        $query->andFilterWhere(['like', 'userroleID', $this->userroleID]);

        return $dataProvider;
    }
}
