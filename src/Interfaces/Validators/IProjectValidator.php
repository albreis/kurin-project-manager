<?php namespace Albreis\KurinProjectManager\Interfaces\Validators;

use Albreis\Kurin\Interfaces\IValidator;

/** @package Albreis\Kurin\Interfaces\Validators */
interface IProjectValidator extends IValidator {

  /** @return bool  */
  public function validateName(): bool;
  
  /** @return bool  */
  public function validateDescription(): bool;
}