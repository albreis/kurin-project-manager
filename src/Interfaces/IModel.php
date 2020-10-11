<?php namespace Albreis\Kurin\Interfaces;

use DateTime;

interface IModel {  
  public function getCreatedAt(?object $object = NULL): ?DateTime;
  public function getUpdatedAt(?object $object = NULL): ?DateTime;
  public function getDeletedAt(?object $object = NULL): ?DateTime;
  public function getCreatedBy(?object $object = NULL): ?string;
  public function getUpdatedBy(?object $object = NULL): ?string;
  public function getDeletedBy(?object $object = NULL): ?string;
}