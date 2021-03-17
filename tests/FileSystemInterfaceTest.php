<?php

namespace Tsc\CatStorageSystem\Tests;

use PHPUnit\Framework\TestCase;
use Tsc\CatStorageSystem\GlobalFileSystemWrapperInterface;

class FileSystemInterfaceTest extends TestCase {

    public function test_it_creates_a_new_instance() {

        $stub = $this->createMock(GlobalFileSystemWrapperInterface::class);
        $this->assertTrue($stub instanceof GlobalFileSystemWrapperInterface);
    }
}
