<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Documenttypenew;

/**
 * DocumenttypenewSearch represents the model behind the search form about `common\models\Documenttypenew`.
 */
class DocumenttypenewSearch extends Documenttypenew
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['documenttypeID', 'documentConfigID', 'user_login_as'], 'integer'],
            [['documentTypeName'], 'safe'],
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
        $query = Documenttypenew::find();

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
            'documenttypeID' => $this->documenttypeID,
            'documentConfigID' => $this->documentConfigID,
            'user_login_as' => $this->user_login_as,
        ]);

        $query->andFilterWhere(['like', 'documentTypeName', $this->documentTypeName]);

        return $dataProvider;
    }
}
