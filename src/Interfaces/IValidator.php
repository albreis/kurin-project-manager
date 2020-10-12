<?php namespace Albreis\Kurin\Interfaces;

/** @package Albreis\Kurin\Interfaces */
interface IValidator {
  public function validate(?object $object = null): bool;
  public function validateCreatedAt(): bool;
  public function validateUpdatedAt(): bool;
  public function validateDeletedAt(): bool;
  public function validateCreatedBy(): bool;
  public function validateUpdatedBy(): bool;
  public function validateDeletedBy(): bool;
  public function getErrors(): ?array;
  public function addObject(object $object);
  public function addObjects(array $objects);
}