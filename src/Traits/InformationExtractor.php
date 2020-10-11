<?php namespace Albreis\Kurin\Traits;

use DateTime;

trait InformationExtractor { 

  /**
   * @param null|object $object 
   * @return null|DateTime 
   */
  public function getCreatedAt(?object $object = null): ?DateTime
  {
    if($object) {
      return $object->created_at;
    }
    return $this->created_at;;
  }

  /**
   * @param null|object $object 
   * @return null|DateTime 
   */
  public function getUpdatedAt(?object $object = null): ?DateTime
  {
    return null;
  }

  /**
   * @param null|object $object 
   * @return null|DateTime 
   */
  public function getDeletedAt(?object $object = null): ?DateTime
  {
    return null;
  }

  /**
   * @param null|object $object 
   * @return void 
   */
  public function getCreatedBy(?object $object = null): ?string 
  {
    return null;
  }

  /**
   * @param null|object $object 
   * @return void 
   */
  public function getUpdatedBy(?object $object = null): ?string 
  {
    return null;
  }

  /**
   * @param null|object $object 
   * @return void 
   */
  public function getDeletedBy(?object $object = null): ?string 
  {
    return null;
  }
}