<?php

namespace Tsc\CatStorageSystem\Tests;

use DateTime;
use PHPUnit\Framework\TestCase;
use Tsc\CatStorageSystem\Directory;
use Tsc\CatStorageSystem\File;

class FileTest extends TestCase
{
    /** @test */
    public function setName_fn_returns_file_object()
    {
        $file = new File();
        // declares variable that parses a string into the function setName()
        $fileName = $file->setName('cat_1.gif');

        // checks if the variable is a File type
        $this->assertSame($file, $fileName);
    }

    /** @test */
    public function getName_fn_returns_what_is_parsed_in_setName()
    {
        $file = new File();
        // parses a string into the function setName()
        $file->setName('cat_1.gif');

        // checks if the getName() function gets the same name that was parsed into the setName() function
        $this->assertEquals('cat_1.gif', $file->getName());
    }

    /** @test */
    public function setSize_fn_returns_file_object()
    {
        $file = new File();
        // declares variable that parses a int into the function setSize()
        $fileSize = $file->setSize(33);

        // checks if the variable is a File type
        $this->assertSame($file, $fileSize);
    }

    /** @test */
    public function getSize_fn_returns_what_is_parsed_in_setSize()
    {
        $file = new File();
        // parses an int into the function setSize()
        $file->setSize(33);

        // checks if the getSize() function gets the same number that was parsed into the setSize() function
        $this->assertEquals(33, $file->getSize());
    }

    /** @test */
    public function setCreatedTime_fn_returns_file_object()
    {
        $file = new File();
        // declares variable that parses a DateTime into the function setCreatedTime()
        $fileCreated = $file->setCreatedTime(new DateTime());

        // checks if the variable is a File type
        $this->assertSame($file, $fileCreated);
    }

    /** @test */
    public function getCreatedTime_fn_returns_what_is_parsed_in_setCreatedTime()
    {
        $file = new File();
        // declares a variable that creates a new DateTime object
        $fileCreated = new DateTime();

        // parses the variable into the setCreatedTime() function
        $file->setCreatedTime($fileCreated);

        // checks if the getCreatedTime() function gets the same DateTime object that was parsed
        // into the setCreatedTime() function
        $this->assertEquals($fileCreated, $file->getCreatedTime());
    }

    /** @test */
    public function setModifiedTime_fn_returns_file_object()
    {
        $file = new File();
        // declares variable that parses a DateTime into the function setModifiedTime()
        $fileModified = $file->setModifiedTime(new DateTime());

        // checks if the variable is a File type
        $this->assertSame($file, $fileModified);
    }

    /** @test */
    public function getModifiedTime_fn_returns_what_is_parsed_in_setModifiedTime()
    {
        $file = new File();
        // declares a variable that creates a new DateTime object
        $fileModified = new DateTime();

        // parses the variable into the setModifiedTime() function
        $file->setModifiedTime($fileModified);

        // checks if the getModifiedTime() function gets the same DateTime object that was parsed
        // into the setModifiedTime() function
        $this->assertEquals($fileModified, $file->getModifiedTime());
    }

    /** @test */
    public function setParentDirectory_fn_returns_file_object()
    {
        $file = new File();
        // declares variable that parses a Directory into the function setParentDirectory()
        $parent = $file->setParentDirectory(new Directory());

        // checks if the variable is a File type
        $this->assertSame($file, $parent);
    }

    /** @test */
    public function getParentDirectory_fn_returns_what_is_parsed_in_setParentDirectory()
    {
        $file = new File();
        // declares a variable that creates a new Directory object
        $parent = new Directory();

        // parses the variable into the setParentDirectory() function
        $file->setParentDirectory($parent);

        // checks if the getParentDirectory() function gets the same Directory object that was parsed
        // into the setParentDirectory() function
        $this->assertEquals($parent, $file->getParentDirectory());
    }

    /** @test  */
    public function getPath_fn_returns_the_path_of_the_file_that_has_been_input()
    {
        $file = new File();
        // declares a variable that creates a new Directory object and parses in a strings into the setPath()
        // and setName() functions
        $parent = (new Directory())->setPath('\my\name\is')->setName('jake');

        // parses the variable into the setParentDirectory() function
        $file->setParentDirectory($parent);

        // checks if the getPath() function gets the same string that was parsed
        // into the setParentDirectory() function
        $this->assertEquals('\my\name\is\jake', $file->getPath());
    }
}