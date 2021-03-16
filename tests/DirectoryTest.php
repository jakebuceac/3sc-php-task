<?php


namespace Tsc\CatStorageSystem\Tests;


use PHPUnit\Framework\TestCase;
use Tsc\CatStorageSystem\Directory;

class DirectoryTest extends TestCase
{
    protected Directory $directory;

    protected function setUp(): void
    {
        $this->directory = new Directory();
    }

}