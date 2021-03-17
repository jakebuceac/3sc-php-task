<?php

namespace Tsc\CatStorageSystem;

use DirectoryIterator;
use Exception;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;

class FileSystem implements FileSystemInterface
{
    protected GlobalFileSystemWrapperInterface $globalFileSystemWrapper;

    public function __construct($globalFileSystemWrapper)
    {
        $this->globalFileSystemWrapper = $globalFileSystemWrapper;
    }

    public static function get(): FileSystem
    {
        // returns an instance of the FileSystem Class
        return new self(new GlobalFileSystemWrapper());
    }


    public function createFile(FileInterface $file, DirectoryInterface $parent): FileInterface
    {
        // creates a copy of a File object
        $newFile = clone $file;

        // Sets the parent directory
        $newFile->setParentDirectory($parent);

        // calls the copy function from the globalFileSystemWrapper
        // creates a copy of the file that is parsed in
        if (!$this->globalFileSystemWrapper->copy(
            $file->getFullPath(),
            $newFile->getFullPath()))
        {
            throw new Exception('An error occurred when creating the file');
        }

        // returns the new file
        return $newFile;
    }

    public function renameFile(FileInterface $file, string $newName): FileInterface
    {
        // creates a copy of a File object
        $changedFile = clone $file;

        // calls the setName() function and sets it to the new name
        $changedFile->setName($newName);

        // calls the rename function from the globalFileSystemWrapper
        // renaming the file that have been parsed in
        $renamedFile = $this->globalFileSystemWrapper->rename(
            $file->getFullPath(),
            $changedFile->getFullPath()
        );

        // checks if the file was successfully renamed
        if (!$renamedFile)
        {
            throw new Exception('An error occurred when renaming the file');
        }

        // returns the renamed file
        return $changedFile;
    }

    public function deleteFile(FileInterface $file): bool
    {
        // calls the unlink function from the globalFileSystemWrapper
        // returns a bool value depending if it successfully deleted the file
        return $this->globalFileSystemWrapper->unlink(
            $file->getFullPath()
        );
    }

    public function createDirectory(DirectoryInterface $directory): DirectoryInterface
    {
        // creates a copy of the directory object
        $newDirectory = clone $directory;

        // calls the mkdir function from the globalFileSystemWrapper
        // creates a new directory with the name parsed in
        if (!$this->globalFileSystemWrapper->mkdir(
            $newDirectory,
            0700,
            true))
        {
            throw new Exception('An error occurred when creating the directory');
        }

        // returns the new directory
        return $newDirectory;

    }

    public function deleteDirectory(DirectoryInterface $directory): bool
    {
        return $this->globalFileSystemWrapper->rmdir(
            $directory->getFullPath()
        );
    }

    public function renameDirectory(DirectoryInterface $directory, $newName): DirectoryInterface
    {
        // creates a copy of a File object
        $changedDirectory = clone $directory;

        // calls the setName() function and sets it to the new name
        $changedDirectory->setName($newName);

        // calls the rename function from the globalFileSystemWrapper
        // renaming the directory that have been parsed in
        $renamedDirectory = $this->globalFileSystemWrapper->rename(
            $directory->getFullPath(),
            $changedDirectory->getFullPath()
        );

        // checks if the directory was successfully renamed
        if (!$renamedDirectory)
        {
            throw new Exception('An error occurred when renaming the file');
        }

        // returns the renamed directory
        return $changedDirectory;
    }

    public function getDirectoryCount(DirectoryInterface $directory): int
    {
        // declares that count
        $counter = 0;

        // gets the path of the directory
        $iterator = new DirectoryIterator($directory->getFullPath());

        // loops through a directory and increases the count when it finds a subdirectory
        foreach ($iterator as $item) {
            if ($item->isDir() && ! $item->isDot()) {
                $counter++;
            }
        }

        // returns the count
        return $counter;
    }

    public function getFileCount(DirectoryInterface $directory, bool $recursive = false): int
    {
        // declares that count
        $counter = 0;

        // gets the path of the directory
        $dir = new DirectoryIterator($directory->getFullPath());

        // loops through a directory and increases the count when it finds a file
        foreach ($dir as $fileInfo)
        {
            if ($fileInfo->isFile() && ! $fileInfo->isDot())
                $counter++;
        }

        // returns the count
        return $counter;
    }

    public function getDirectorySize(DirectoryInterface $directory): int
    {
        $size = 0;
        $directory = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory->getFullPath()));
        foreach ($directory as $file){
            $size += $file->getSize();
    }
       return $size;
    }

    public function getDirectories(DirectoryInterface $directory): array
    {
        $directories = [];
        $dir = new DirectoryIterator($directory->getFullPath());
        foreach ($dir as $dirInfo)
        {
            if ($dirInfo->isDir() && ! $dirInfo->isDot())
            {
                $directories[] = (new Directory())->setName($dirInfo);
            }
        }
        return $directories;

    }

    public function getFiles(DirectoryInterface $directory): array
    {
        $files = [];
        $dir = new DirectoryIterator($directory->getPath() . '\\' . $directory->getName());
        foreach ($dir as $fileInfo)
        {
            if ($fileInfo->isFile() && ! $fileInfo->isDot())
            {
                $files[] = (new File())->setName($fileInfo);
            }
        }
        return $files;

    }

}