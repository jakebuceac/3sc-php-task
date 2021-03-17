<?php

namespace Tsc\CatStorageSystem;

use \DateTimeInterface;

interface FileInterface
{
  /**
   * @return string
   */
  public function getName(): string;

    /**
     * @param string $fileName
     *
     * @return $this
     */
  public function setName(string $fileName): FileInterface;

  /**
   * @return int
   */
  public function getSize(): int;

    /**
     * @param int $fileSize
     *
     * @return $this
     */
  public function setSize(int $fileSize): FileInterface;

  /**
   * @return DateTimeInterface
   */
  public function getCreatedTime(): DateTimeInterface;

  /**
   * @param DateTimeInterface $fileCreated
   *
   * @return $this
   */
  public function setCreatedTime(DateTimeInterface $fileCreated): FileInterface;

  /**
   * @return DateTimeInterface
   */
  public function getModifiedTime(): DateTimeInterface;

  /**
   * @param DateTimeInterface $fileModified
   *
   * @return $this
   */
  public function setModifiedTime(DateTimeInterface $fileModified): FileInterface;

  /**
   * @return DirectoryInterface
   */
  public function getParentDirectory(): DirectoryInterface;

  /**
   * @param DirectoryInterface $fileParent
   *
   * @return $this
   */
  public function setParentDirectory(DirectoryInterface $fileParent): FileInterface;

  /**
   * @return string
   */
  public function getPath(): string;

    /**
     * @return string
     */
    public function getFullPath(): string;
}
