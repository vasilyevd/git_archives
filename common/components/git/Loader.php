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

/**
 * Class Loader
 * @package common\components\git
 */
class Loader
{

    public static function processToModel(ILoadData $data)
    {
        var_dump($data);
        die;
        /*$author = Authors::find()->where(['name' => $data->getAuthorEmail()])->one();
        if ($author === null) {
            $author = new Authors();
            $author->setAttributes([
                'name' => $data->getAuthorName(),
                'email' => $data->getAuthorEmail(),
            ]);
            $author->save();
        }*/

    }
}