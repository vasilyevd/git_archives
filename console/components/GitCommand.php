<?php
/**
 * Created by PhpStorm.
 * User: cejixo3
 * Date: 14.03.16
 * Time: 1:42
 */

namespace console\components;


/**
 * Class GitCommand
 * @package console\components
 */
class GitCommand
{
    /**
     * @var array
     */
    protected $options = [];

    /**
     * @var array
     */
    protected $bufferOut = [];

    /**
     * @param mixed $option
     * @return $this
     */
    public function addOption($option)
    {
        if (!is_string($option) && is_callable($option)) {
            $option = $option();
        }
        if (!is_null($option)) {
            $this->options[] = $option;
        }
        return $this;
    }


    /**
     * @return  $this
     */
    public function execute()
    {
        exec('git ' . implode(' ', $this->options), $this->bufferOut);
        return $this;
    }

    /**
     * @return array
     */
    public function getBuffer()
    {
        return $this->bufferOut;
    }


    /**
     * @return string
     */
    public function getBufferAsString()
    {
        return implode(PHP_EOL, $this->bufferOut);
    }
}