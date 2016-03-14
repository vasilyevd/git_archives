<?php

/**
 * Created by PhpStorm.
 * User: cejixo3
 * Date: 14.03.16
 * Time: 0:58
 */
namespace console\controllers\git;

use common\components\git\CommitMessage;
use common\components\git\Loader;
use console\components\GitCommand;
use yii\console\Controller;

/**
 * Class Log
 * @package console\controllers
 */
class Log extends Controller
{
    /**
     * @var
     */
    public $directory;

    /**
     * @return array
     */
    public function options()
    {
        return ['directory'];
    }

    /**
     * @return array
     */
    public function optionAliases()
    {
        return ['d' => 'directory'];
    }

    /**
     *
     */
    public function actionShow()
    {
        $command = (new GitCommand())
            ->addOption('--no-pager')
            ->addOption(function () {
                return ($this->directory && is_dir($this->directory) ?
                    ' --git-dir=' . $this->directory :
                    null);
            })
            ->addOption('log')
            ->addOption('--pretty=format:"<commit-hash>%H</commit-hash><commit-author>%an</commit-author><commit-author-email>%ae</commit-author-email><commit-author-date>%ad</commit-author-date><commit-subject>%s</commit-subject>"')
            ->addOption('--date=raw');
        $result = $command->execute();
        foreach ($result->getBuffer() as $record) {
            if (!is_null($record)) {
                Loader::processToModel(new CommitMessage($record));
            }
        }
        echo 'Done' . PHP_EOL;
    }
}