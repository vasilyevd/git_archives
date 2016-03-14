<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[AuthorsTable]].
 *
 * @see Authors
 */
class AuthorsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return AuthorsTable[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return AuthorsTable|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}