<?php
/**
 * Created by PhpStorm.
 * User: cejixo3
 * Date: 14.03.16
 * Time: 2:55
 */

namespace common\components\git;

use common\interfaces\git\ILoadData;

/**
 * Class CommitMessage
 * @package common\components\git
 */
class CommitMessage implements ILoadData
{

    protected $hash;
    protected $subject;
    protected $commitTime;
    protected $authorName;
    protected $authorEmail;

    protected static $attributeMap = [
        self::HASH => 'hash',
        self::SUBJECT => 'subject',
        self::AUTHOR => 'authorName',
        self::AUTHOR_EMAIL => 'authorEmail',
        self::AUTHOR_DATE => 'commitTime',
    ];

    public function __construct($commitInfo)
    {
        foreach (self::$attributeMap as $node => $property) {
            preg_match("/<" . $node . ">(.*?)<\/" . $node . ">/", $commitInfo, $matches);
            $this->{$property} = $matches[1];
        }
    }


    /**
     * @return string
     */
    public function getHash()
    {
        return $this->hash;
    }

    /**
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * @return string
     */
    public function getCommitTime()
    {
        return (int)$this->commitTime;
    }

    /**
     * @return string
     */
    public function getAuthorName()
    {
        return $this->authorName;
    }

    /**
     * @return string
     */
    public function getAuthorEmail()
    {
        return $this->authorEmail;
    }
}