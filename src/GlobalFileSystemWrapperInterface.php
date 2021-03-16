<?php

namespace Tsc\CatStorageSystem;

interface GlobalFileSystemWrapperInterface
{
    /**
     * @param $source
     * @param $dest
     * @return bool
     */
    public function copy($source, $dest): bool;

    /**
     * @param $oldName
     * @param $newName
     * @return bool
     */
    public function rename($oldName, $newName): bool;

    /**
     * @param $fileName
     * @return bool
     */
    public function unlink($fileName): bool;

    /**
     * @param $pathName
     * @param $mode
     * @param $recursive
     * @return bool
     */
    public function mkdir($pathName, $mode, $recursive): bool;

    /**
     * @param $dirname
     * @return string
     */
    public function rmdir($dirname): string;

    /**
     * @param $fileName
     * @return bool
     */
    public function isDir($fileName): bool;

}