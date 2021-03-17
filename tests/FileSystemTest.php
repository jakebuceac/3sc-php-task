<?php


namespace Tsc\CatStorageSystem\Tests;


use PHPUnit\Framework\TestCase;
use Tsc\CatStorageSystem\Directory;
use Tsc\CatStorageSystem\File;
use Tsc\CatStorageSystem\FileSystem;
use Tsc\CatStorageSystem\GlobalFileSystemWrapper;

class FileSystemTest extends TestCase
{
    public $globalFileSystemWrapper;

    public function setUp(): void
    {
        // names the functions that are in GlobalFileSystemWrapper.php
        $functionNames = ['copy', 'rename', 'unlink', 'mkdir', 'rmdir', 'isDir'];

        // creates a mock of the GlobalFileSystemWrapper class
        $globalFileSystemWrapper = $this->createMock(GlobalFileSystemWrapper::class);

        // loops through the functionNames array making each method return true
        foreach ($functionNames as $methodNames) {
            $globalFileSystemWrapper->expects($this->any())->method($methodNames)->will($this->returnValue(true));
        }

        $this->globalFileSystemWrapper = $globalFileSystemWrapper;
    }

    /** @test */
    public function createFile_fn_copies_and_returns_a_file()
    {
        // creates the mock and objects FileSystem, File and Directory
        $fileSystem = new FileSystem($this->globalFileSystemWrapper);
        $parent = new Directory();
        $file = new File();

        // sets the directory path
        $parent->setPath(__DIR__)->setName('test_folder');

        // parses the variable into the setParentDirectory() function
        $file->setParentDirectory($parent);

        // sets the file name
        $fileName = $file->setName('test.gif');

        // creates the file
        $file = $fileSystem->createFile($fileName, $parent);

        // checks if the file has been created
        $this->assertEquals($parent->getFullPath(), $file->getPath());

    }

    /** @test */
    public function renameFile_fn_returns_new_name_of_existing_file()
    {
        // creates the mock and objects FileSystem, File and Directory
        $fileSystem = new FileSystem($this->globalFileSystemWrapper);
        $file = new File();
        $parent = new Directory();

        // sets the directory path
        $parent->setPath(__DIR__)->setName('test_folder');

        // parses the variable into the setParentDirectory() function
        $file->setParentDirectory($parent);

        // sets the file name
        $file->setName('jake.gif');

        // renames the file
        $file = $fileSystem->renameFile($file, 'test.gif');

        // checks if the file has been changed
        $this->assertEquals('test.gif', $file->getName());
    }

    /** @test */
    public function deleteFile_fn_deletes_an_existing_file()
    {
        // creates the mock and objects FileSystem, File and Directory
        $fileSystem = new FileSystem($this->globalFileSystemWrapper);
        $file = new File();
        $parent = new Directory();

        // sets the directory path
        $parent->setPath(__DIR__)->setName('test_folder');

        // parses the variable into the setParentDirectory() function
        $file->setParentDirectory($parent);

        // sets the file name
        $file->setName('test.gif');

        // checks if the file was deleted
        $this->assertEquals(true, $fileSystem->deleteFile($file));
    }

    /** @test */
    public function createDirectory_fn_creates_and_returns_a_new_directory()
    {

        // creates the mock and objects FileSystem and Directory
        $fileSystem = new FileSystem($this->globalFileSystemWrapper);
        $parent = new Directory();

        // sets the directory path
        $parent->setPath('test\path')->setName('test_folder');

        // creates the directory
        $newDirectory = $fileSystem->createDirectory($parent);

        // checks if the directory has been created
        $this->assertEquals('test\path\test_folder', $newDirectory->getFullPath());
    }

    /** @test */
    public function deleteDirectory_fn_deletes_an_existing_directory()
    {
        // creates the mock and objects FileSystem and Directory
        $fileSystem = new FileSystem($this->globalFileSystemWrapper);
        $parent = new Directory();

        // sets the directory path
        $parent->setPath('test\path')->setName('test_folder');

        // checks if the directory was deleted
        $this->assertEquals(true, $fileSystem->deleteDirectory($parent));
    }

    /** @test */
    public function renameDirectory_fn_returns_new_name_for_existing_directory()
    {
        // creates the mock and objects FileSystem and Directory
        $fileSystem = new FileSystem($this->globalFileSystemWrapper);
        $parent = new Directory();

        // sets the directory path
        $parent->setPath(__DIR__)->setName('test_folder');

        // renames the directory
        $renamedDirectory = $fileSystem->renameDirectory($parent, 'new_test_folder');

        // checks if the directory has been changed
        $this->assertEquals('new_test_folder', $renamedDirectory->getName());
    }

    /** @test */
    public function getDirectoryCount_fn_gets_and_returns_the_number_of_directories()
    {
        // creates the mock and objects FileSystem and Directory
        $fileSystem = new FileSystem($this->globalFileSystemWrapper);
        $parent = new Directory();

        // sets the directory path
        $parent->setPath('C:\Users\bucea\PhpstormProjects\3sc-php-task-master')->setName('images');

        // gets the number of directories counted
        $count = $fileSystem->getDirectoryCount($parent);

        // checks the count
        $this->assertEquals(2, $count);
    }

    /** @test */
    public function getFileCount_fn_gets_and_returns_the_number_of_files()
    {
        // creates the mock and objects FileSystem and Directory
        $fileSystem = new FileSystem($this->globalFileSystemWrapper);
        $parent = new Directory();

        // sets the directory path
        $parent->setPath('C:\Users\bucea\PhpstormProjects\3sc-php-task-master')->setName('images');

        // gets the number of files counted
        $count = $fileSystem->getFileCount($parent);

        // checks the count
        $this->assertEquals(3, $count);
    }

    /** @test */
    public function getDirectorySize_fn_returns_the_correct_size()
    {
        // creates the mock and objects FileSystem and Directory
        $fileSystem = new FileSystem($this->globalFileSystemWrapper);
        $parent = new Directory();

        // sets the directory path
        $parent->setPath('C:\Users\bucea\PhpstormProjects\3sc-php-task-master')->setName('images');

        // calculates the size of directory
        $size = $fileSystem->getDirectorySize($parent);

        // checks the size
        $this->assertEquals(23326956, $size);
    }

    /** @test */
    public function getDirectories_fn_returns_an_array_with_the_correct_directories_in()
    {
        // creates the mock and objects FileSystem, Files and Directory
        $fileSystem = new FileSystem($this->globalFileSystemWrapper);
        $parent = new Directory();

        // sets the directory path
        $parent->setPath('C:\Users\bucea\PhpstormProjects\3sc-php-task-master')->setName('images');

        // gets the directories
        $directories = $fileSystem->getDirectories($parent);

        // checks the number of elements that were parsed in
        $this->assertEquals(2, count($directories));
    }

    /** @test */
    public function getFiles_fn_returns_an_array_with_correct_files_in()
    {
        // creates the mock and objects FileSystem, Files and Directory
        $fileSystem = new FileSystem($this->globalFileSystemWrapper);
        $parent = new Directory();

        // sets the directory path
        $parent->setPath('C:\Users\bucea\PhpstormProjects\3sc-php-task-master')->setName('images');

        // gets the files
        $directories = $fileSystem->getFiles($parent);

        // checks the number of elements that were parsed in
        $this->assertEquals(3, count($directories));
    }
}