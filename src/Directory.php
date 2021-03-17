<?php

namespace Tsc\CatStorageSystem;

use \DateTimeInterface;

class Directory implements DirectoryInterface
{
    public $directoryName;
    public $directoryCreated;
    public $directoryPath;


    public function getName(): string
    {
        return $this->directoryName;
    }

    public function setName($directoryName): Directory
    {
        $this->directoryName = $directoryName;
        return $this;
    }

    public function getCreatedTime(): DateTimeInterface
    {
        return $this->directoryCreated;
    }

    public function setCreatedTime(DateTimeInterface $directoryCreated): Directory
    {
        $this->directoryCreated = $directoryCreated;
        return $this;
    }

    public function getPath(): string
    {
        return $this->directoryPath;
    }

    public function setPath($directoryPath): Directory
    {
        $this->directoryPath = $directoryPath;
        return $this;
    }

    public function getFullPath(): string
    {
        return $this->getPath() . '\\' . $this->getName();
    }
}






