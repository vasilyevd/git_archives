<?php

namespace frontend\modules\history\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\history\models\CommitHistory;

/**
 * CommitHistorySearch represents the model behind the search form about `frontend\modules\history\models\CommitHistory`.
 */
class CommitHistorySearch extends CommitHistory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'commit_time', 'author_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['hash', 'subject'], 'safe'],
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
        $query = CommitHistory::find();

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
            'commit_time' => $this->commit_time,
            'author_id' => $this->author_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'hash', $this->hash])
            ->andFilterWhere(['like', 'subject', $this->subject]);

        return $dataProvider;
    }
}
