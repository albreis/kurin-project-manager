<?php

namespace Albreis\Kurin\Models;

use Albreis\Kurin\Interfaces\Models\IProject;

/** @package Albreis\Kurin\Models */
class Project extends AbstractModel implements IProject
{

  public string $name;
  public ?string $description;
  public array $tasks;

  /** @return string  */
  public function getName(): string { 
    return $this->name;
  }

  /**
   * @param string $name 
   * @return void 
   */
  public function setName(string $name) {
    $this->name = $name;
  }

  /** @return string  */
  public function getDescription(): string {
    return $this->description;
  }

  /**
   * @param string $description 
   * @return void 
   */
  public function setDescription(string $description) { 
    $this->description = $description;
  }

  public function setDone() {}

  public function setOpen() { }

  public function setDeleted() { }

  public function doneAllTasks() { }

  public function openAllTasks() { }

  public function deleteAllTasks() { }
  
}
