<?php

namespace Tsc\CatStorageSystem;

use \DateTimeInterface;

interface DirectoryInterface
{
    /**
     * @return string
     */
    public function getName();

    /**
     * @param string $directoryName
     *
     * @return $this
     */
    public function setName($directoryName);

    /**
     * @return DateTimeInterface
     */
    public function getCreatedTime();

    /**
     * @param DateTimeInterface $directoryCreated
     *
     * @return $this
     */
    public function setCreatedTime(DateTimeInterface $directoryCreated);

    /**
     * @return string
     */
    public function getPath();

    /**
     * @param string $directoryPath
     *
     * @return $this
     */
    public function setPath($directoryPath);

    /**
     * @return string
     */
    public function getFullPath();
}