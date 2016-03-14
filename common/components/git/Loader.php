<?php
/**
 * Created by PhpStorm.
 * User: cejixo3
 * Date: 14.03.16
 * Time: 2:50
 */

namespace common\components\git;

use common\interfaces\git\ILoadData;
use common\models\Authors;
use common\models\Commits;

/**
 * Class Loader
 * @package common\components\git
 */
class Loader
{

    public static function processToModel(ILoadData $data)
    {

        /**
         * Create author
         */
        $author = Authors::find()->where(['email' => $data->getAuthorEmail()])->one();
        if ($author === null) {
            $author = new Authors();
            $author->setAttributes([
                'name' => $data->getAuthorName(),
                'email' => $data->getAuthorEmail(),
            ]);
            $author->save();
        }
        /**
         * Create hash
         */
        if (!$author->hasErrors()) {

            if (Commits::find()->where(['hash' => $data->getHash()])->count() === 0) {
                $commit = new Commits();
                $commit->setAttributes([
                    'hash' => $data->getHash(),
                    'subject' => $data->getSubject(),
                    'commit_time' => $data->getCommitTime(),
                    'author_id' => $author->getId(),
                ]);
                $commit->save();
            }
        }
    }
}