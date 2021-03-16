<?php

namespace Tsc\CatStorageSystem;

use DateTimeInterface;


class File implements FileInterface
{
    //public $file;
    public $fileName;
    public $fileSize;
    public $fileCreated;
    public $fileModified;
    public $fileParent;

    /*public function __construct($file)
    {
        $this->file = $file;

        if (file_exists($file))
        {
            $this->setName(basename($file));
            $this->setSize(filesize($file));
            try {9
                $this->setCreatedTime(DateTime::createFromFormat('U', filectime($file)));
            } catch (Exception $e) {
                echo 'hit';
            }
            try {
                $this->setModifiedTime(DateTime::createFromFormat('U', filemtime($file)));
            } catch (Exception $e) {
            }

            $this->setParentDirectory($file = new Directory(dirname($file)));
        } else
            {
                throw new Exception('No such file or directory found');
            }
    }*/


    public function getName(): string
    {
        return $this->fileName;
    }

    public function setName(string $fileName): File
    {
       $this->fileName = $fileName;
       return $this;
    }

    public function getSize(): int
    {
        return $this->fileSize;
    }

    public function setSize(int $fileSize): File
    {
        $this->fileSize = $fileSize;
        return $this;
    }

    public function getCreatedTime(): DateTimeInterface
    {
        return $this->fileCreated;
    }

    public function setCreatedTime(DateTimeInterface $fileCreated): File
    {
        $this->fileCreated = $fileCreated;
        return $this;
    }

    public function getModifiedTime(): DateTimeInterface
    {

        return $this->fileModified;
    }

    public function setModifiedTime(DateTimeInterface $fileModified): File
    {
        $this->fileModified = $fileModified;
        return $this;
    }

    public function getParentDirectory(): DirectoryInterface
    {
        return $this->fileParent;
    }

    public function setParentDirectory(DirectoryInterface $fileParent): File
    {
        $this->fileParent = $fileParent;
        return $this;
    }

    public function getPath(): string
    {
        return $this->fileParent->getPath() . "\\" . $this->fileParent->getName();
    }
}





