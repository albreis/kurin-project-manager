<?php

namespace Albreis\Kurin\Models;

/** @package Albreis\Kurin\Models */
class Task extends \Albreis\Kurin\Models\AbstractModel implements \Albreis\Kurin\Interfaces\ITask
{

  public string $name;
  public ?string $description;

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
  
}
