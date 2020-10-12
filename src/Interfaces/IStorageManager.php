<?php namespace Albreis\Kurin\Interfaces;

interface IStorageManager {

  /**
   * @param bool $return 
   * @return null|object 
   */
  public function store(object $object, bool $return = true): ?int;
  
  /**
   * @param bool $return 
   * @return null|int 
   */
  public function storeAll(bool $return = true): ?array;

  /**
   * @param object $object 
   * @return mixed 
   */
  public function addObject(object $object);

  /**
   * @param array $objects 
   * @return mixed 
   */
  public function addObjects(array $objects);

}