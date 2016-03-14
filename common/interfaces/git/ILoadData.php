<?php
/**
 * Created by PhpStorm.
 * User: cejixo3
 * Date: 14.03.16
 * Time: 2:51
 */

namespace common\interfaces\git;

/**
 * Class ILoadData
 * @package common\interfaces\git
 */
interface ILoadData
{
    CONST HASH = 'commit-hash';
    CONST SUBJECT = 'commit-subject';
    CONST AUTHOR = 'commit-author';
    CONST AUTHOR_EMAIL = 'commit-author-email';
    CONST AUTHOR_DATE = 'commit-author-date';

    /**
     * @return string
     */
    public function getHash();

    /**
     * @return string
     */
    public function getSubject();

    /**
     * @return string
     */
    public function getCommitTime();

    /**
     * @return string
     */
    public function getAuthorName();

    /**
     * @return string
     */
    public function getAuthorEmail();
}