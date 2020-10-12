<?php namespace Albreis\Kurin;

use Albreis\Kurin\Interfaces\IValidator;

/** @package Albreis\Kurin */
abstract class Validator implements IValidator {

  private object $object;
  private ?array $errors = [];
  
  /**
   * @param object $object 
   * @return void 
   */
  public function __construct(object $object){
    $this->object = $object;
  }

  public function getErrors(): ?array
  {
    return $this->errors;
  }

}