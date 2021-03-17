<?php


namespace Tsc\CatStorageSystem\Tests;


use DateTime;
use PHPUnit\Framework\TestCase;
use Tsc\CatStorageSystem\Directory;

class DirectoryTest extends TestCase
{
    /** @test */
    public function setName_fn_returns_directory_object()
    {
        $directory = new Directory();
        // declares variable that parses a string into the function setName()
        $directoryName = $directory->setName('folder');

        // checks if the variable is a Directory type
        $this->assertSame($directory, $directoryName);
    }

    /** @test */
    public function getName_fn_returns_what_is_parsed_in_setName()
    {
        $directory = new Directory();
        // parses a string into the function setName()
        $directory->setName('folder');

        // checks if the getName() function gets the same name that was parsed into the setName() function
        $this->assertEquals('folder', $directory->getName());
    }

    /** @test */
    public function setCreatedTime_fn_returns_datetime_object()
    {
        $directory = new Directory();
        // declares variable that parses a DateTime into the function setCreatedTime()
        $fileCreated = $directory->setCreatedTime(new DateTime());

        // checks if the variable is a File type
        $this->assertSame($directory, $fileCreated);
    }

    /** @test */
    public function getCreatedTime_fn_returns_what_is_parsed_in_setCreatedTime()
    {
        $directory = new Directory();
        // declares a variable that creates a new DateTime object
        $fileCreated = new DateTime();

        // parses the variable into the setCreatedTime() function
        $directory->setCreatedTime($fileCreated);

        // checks if the getCreatedTime() function gets the same DateTime object that was parsed
        // into the setCreatedTime() function
        $this->assertEquals($fileCreated, $directory->getCreatedTime());
    }

    /** @test */
    public function setPath_fn_returns_directory_object()
    {
        $directory = new Directory();
        // declares variable that parses a string into the function setPath()
        $directoryName = $directory->setPath('\my\folder');

        // checks if the variable is a Directory type
        $this->assertSame($directory, $directoryName);
    }

    /** @test */
    public function getPath_fn_returns_what_is_parsed_in_setPath()
    {
        $directory = new Directory();
        // parses a string into the function setPath()
        $directory->setPath('\my\folder');

        // checks if the getPath() function gets the same name that was parsed into the setPath() function
        $this->assertEquals('\my\folder', $directory->getPath());
    }

}