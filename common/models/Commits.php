<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "commits".
 *
 * @property integer $id
 * @property string $hash
 * @property string $subject
 * @property integer $commit_time
 * @property integer $author_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 */
class Commits extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'commits';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject'], 'string'],
            [['commit_time', 'author_id', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['hash'], 'string', 'max' => 40],
            [['hash'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'hash' => Yii::t('app', 'Hash'),
            'subject' => Yii::t('app', 'Subject'),
            'commit_time' => Yii::t('app', 'Commit Time'),
            'author_id' => Yii::t('app', 'Author ID'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * @inheritdoc
     * @return CommitsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CommitsQuery(get_called_class());
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Authors::className(), ['id' => 'author_id']);
    }
}
