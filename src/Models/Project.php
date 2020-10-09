<?php

namespace Albreis\Kurin\Models;

class Project implements \Albreis\Kurin\Interfaces\IProject
{
  use \Albreis\Kurin\Traits\DBConnection;

  public string $name;
  public ?string $description;
  public array $tasks;

  public function getName(): string { 
    return $this->name;
  }

  public function setName(string $name) {
    $this->name = $name;
  }

  public function getDescription(): string {
    return $this->description;
  }

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
