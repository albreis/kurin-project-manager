<?php namespace Albreis\Kurin;

use Albreis\Kurin\Interfaces\IManager;

/** @package Albreis\Kurin */
abstract class Manager implements IManager {
  public $name;

  public function getName(): ?string 
  {
    return $this->name;
  }
}