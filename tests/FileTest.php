<?php

namespace Tsc\CatStorageSystem\Tests;

use DateTime;
use PHPUnit\Framework\TestCase;
use Tsc\CatStorageSystem\Directory;
use Tsc\CatStorageSystem\File;

class FileTest extends TestCase
{
    protected File $file;

    protected function setUp(): void
    {
        $this->file = new File();
    }

    /** @test */
    public function setName_fn_returns_file_object()
    {
        // declares variable that parses a string into the function setName()
        $fileName = $this->file->setName('cat_1.gif');

        // checks if the variable is a File type
        $this->assertSame($this->file, $fileName);
    }

    /** @test */
    public function getName_fn_returns_what_is_parsed_in_setName()
    {
        // parses a string into the function setName()
        $this->file->setName('cat_1.gif');

        // checks if the getName() function gets the same name that was parsed into the setName() function
        $this->assertEquals('cat_1.gif', $this->file->getName());
    }

    /** @test */
    public function setSize_fn_returns_file_object()
    {
        // declares variable that parses a int into the function setSize()
        $fileSize = $this->file->setSize(33);

        // checks if the variable is a File type
        $this->assertSame($this->file, $fileSize);
    }

    /** @test */
    public function getSize_fn_returns_what_is_parsed_in_setSize()
    {
        // parses an int into the function setSize()
        $this->file->setSize(33);

        // checks if the getSize() function gets the same number that was parsed into the setSize() function
        $this->assertEquals(33, $this->file->getSize());
    }

    /** @test */
    public function setCreatedTime_fn_returns_datetime_object()
    {
        // declares variable that parses a DateTime into the function setCreatedTime()
        $fileCreated = $this->file->setCreatedTime(new DateTime());

        // checks if the variable is a File type
        $this->assertSame($this->file, $fileCreated);
    }

    /** @test */
    public function getCreatedTime_fn_returns_what_is_parsed_in_setCreatedTime()
    {
        // declares a variable that creates a new DateTime object
        $fileCreated = new DateTime();

        // parses the variable into the setCreatedTime() function
        $this->file->setCreatedTime($fileCreated);

        // checks if the getCreatedTime() function gets the same DateTime object that was parsed
        // into the setCreatedTime() function
        $this->assertEquals($fileCreated, $this->file->getCreatedTime());
    }

    /** @test */
    public function setModifiedTime_fn_returns_datetime_object()
    {
        // declares variable that parses a DateTime into the function setModifiedTime()
        $fileModified = $this->file->setModifiedTime(new DateTime());

        // checks if the variable is a File type
        $this->assertSame($this->file, $fileModified);
    }

    /** @test */
    public function getModifiedTime_fn_returns_what_is_parsed_in_setModifiedTime()
    {
        // declares a variable that creates a new DateTime object
        $fileModified = new DateTime();

        // parses the variable into the setModifiedTime() function
        $this->file->setModifiedTime($fileModified);

        // checks if the getModifiedTime() function gets the same DateTime object that was parsed
        // into the setModifiedTime() function
        $this->assertEquals($fileModified, $this->file->getModifiedTime());
    }

    /** @test */
    public function setParentDirectory_fn_returns_directory_object()
    {
        // declares variable that parses a Directory into the function setParentDirectory()
        $parent = $this->file->setParentDirectory(new Directory());

        // checks if the variable is a File type
        $this->assertSame($this->file, $parent);
    }

    /** @test */
    public function getParentDirectory_fn_returns_what_is_parsed_in_setParentDirectory()
    {
        // declares a variable that creates a new Directory object
        $parent = new Directory();

        // parses the variable into the setParentDirectory() function
        $this->file->setParentDirectory($parent);

        // checks if the getParentDirectory() function gets the same Directory object that was parsed
        // into the setParentDirectory() function
        $this->assertEquals($parent, $this->file->getParentDirectory());
    }

    /** @test  */
    public function getPath_fn_returns_the_path_of_the_file_that_has_been_input()
    {
        // declares a variable that creates a new Directory object and parses in a strings into the setPath()
        // and setName() functions
        $parent = (new Directory())->setPath('\my\name\is')->setName('jake');

        // parses the variable into the setParentDirectory() function
        $this->file->setParentDirectory($parent);

        // checks if the getPath() function gets the same string that was parsed
        // into the setParentDirectory() function
        $this->assertEquals('\my\name\is\jake', $this->file->getPath());

    }
}