<?php


namespace Tsc\CatStorageSystem;


class GlobalFileSystemWrapper implements GlobalFileSystemWrapperInterface
{

    public function copy($source, $dest): bool
    {
        return copy($source, $dest);
    }

    public function rename($oldName, $newName): bool
    {
        return rename($oldName, $newName);
    }

    public function unlink($fileName): bool
    {
        return unlink($fileName);
    }

    public function mkdir($pathName, $mode, $recursive): bool
    {
        return mkdir($pathName, $mode, $recursive);
    }

    public function rmdir($dirname): string
    {
        return mkdir($dirname);
    }

    public function isDir($fileName): bool
    {
        return is_dir($fileName);
    }
}