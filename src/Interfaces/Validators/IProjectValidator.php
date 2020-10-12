<?php namespace Albreis\Kurin\Interfaces\Validators;

use Albreis\Kurin\Models\Project;

/** @package Albreis\Kurin\Interfaces\Validators */
interface IProjectValidator {

  /** @return bool  */
  public function validateName(): bool;
  
  /** @return bool  */
  public function validateDescription(): bool;
}