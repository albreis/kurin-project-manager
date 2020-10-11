<?php namespace Albreis\Kurin\Traits;

use DateTime;

trait ObjectManager {
  

  /**
   * @param null|object $object 
   * @return null|DateTime 
   */
  public function setCreatedAt(DateTime $date, ?object $object = null)
  {
    if($object) {
      return $object->created_at = $date;
    }
    return $this->created_at = $date;
  }

  /**
   * @param null|object $object 
   * @return null|DateTime 
   */
  public function setUpdatedAt(DateTime $date, ?object $object = null)
  {
    if($object) {
      return $object->updated_at = $date;
    }
    return $this->updated_at = $date;
  }

  /**
   * @param null|object $object 
   * @return null|DateTime 
   */
  public function setDeletedAt(?object $object = null, DateTime $date)
  {
    if($object) {
      return $object->deleted_at = $date;
    }
    return $this->deleted_at = $date;
  }

  /**
   * @param null|object $object 
   * @return void 
   */
  public function setUpdatedBy(?object $object = null, ?object $modifier = null) 
  {
    if($object) {
      return $object->updated_by = $modifier;
    }
    return $this->updated_by = $modifier;
  }

  /**
   * @param null|object $object 
   * @return void 
   */
  public function setDeletedBy(?object $object = null, ?object $modifier = null) 
  {
    if($object) {
      return $object->deleted_at = $modifier;
    }
    return $this->deleted_at = $modifier;
  }
}