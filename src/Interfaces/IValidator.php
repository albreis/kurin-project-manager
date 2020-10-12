<?php namespace Albreis\Kurin\Interfaces;

/** @package Albreis\Kurin\Interfaces */
interface IValidator {
  public function validate(): bool;
  public function validateCreatedAt(): bool;
  public function validateUpdatedAt(): bool;
  public function validateDeletedAt(): bool;
  public function validateCreatedBy(): bool;
  public function validateUpdatedBy(): bool;
  public function validateDeletedBy(): bool;
  public function getErrors(): ?array;
}