<?php

namespace Tsc\CatStorageSystem;

use \DateTimeInterface;

class Directory implements DirectoryInterface
{
    //public $directory;
    public $directoryName;
    public $directoryCreated;
    public $directoryPath;

/*    public function __construct($directory)
    {
        $this->directory = $directory;

        $this->setName($directory);


        if (is_dir($directory) == true)
        {
            $this->updateCreatedTime($directory);
        }


        $this->setPath($directory = getcwd());
    }

    public function updateCreatedTime($directory)
    {
        $this->directory = $directory;
        try
        {
            $this->setCreatedTime(DateTime::createFromFormat('U', filectime($directory)));
        }
        catch (Exception $e)
        {

        }
        return $this;
    }*/


    public function getName()
    {
        return $this->directoryName;
    }

    public function setName($directoryName)
    {
        $this->directoryName = $directoryName;
        return $this;
    }

    public function getCreatedTime()
    {
        return $this->directoryCreated;
    }

    public function setCreatedTime(DateTimeInterface $directoryCreated)
    {
        $this->directoryCreated = $directoryCreated;
        return $this;
    }

    public function getPath()
    {
        return $this->directoryPath;
    }

    public function setPath($directoryPath)
    {
        $this->directoryPath = $directoryPath;
        return $this;
    }
}






