<?php namespace Albreis\Kurin\Interfaces;

use DateTime;

/** @package Albreis\Kurin\Interfaces */
interface IProducer {

  /** @return object  */
  public function create(): object;

  /**
   * @param object $object 
   * @param DateTime $date 
   * @return mixed 
   */
  public function setCreatedAt(object $object, DateTime $date);

  /**
   * @param object $object 
   * @param object $creator 
   * @return mixed 
   */
  public function setCreatedBy(object $object, object $creator);

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
  
}