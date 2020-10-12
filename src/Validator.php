<?php namespace Albreis\Kurin;

use Albreis\Kurin\Interfaces\IValidator;

/** @package Albreis\Kurin */
abstract class Validator implements IValidator {

  private ?object $object;
  private ?array $validObjects;
  private ?array $invalidObjects;
  private ?array $errors = [];
  
  /**
   * @param object $object 
   * @return void 
   */
  public function __construct(?object $object = null){
    $this->object = $object;
  }

  public function getErrors(): ?array
  {
    return $this->errors;
  }

  public function addObject(object $object) {
    $this->objects[] = $object;
    return $this;
  }
  public function addObjects(array $objects) {
    $this->objects = array_merge($this->objects, $objects);
    return $this;
  }

}