<?php declare(strict_types=1);

namespace Albreis\Kurin;

use Albreis\Kurin\Interfaces\IProducer;
use DateTime;
use DateTimeZone;

/** @package Albreis\Kurin */
abstract class Producer implements IProducer {

  protected $model;
  protected object $latest;
  protected array $objects;
  protected DateTimeZone $timezone;

  public function __construct() {
    $this->timezone = new DateTimeZone('UTC');
  }

  public function setTimezone(DateTimeZone $timezone) {
    $this->timezone = $timezone;
    return $this;
  }

  /** @return object  */
  public function create(): object { 
    $this->latest = new $this->model;
    $this->setCreatedAt($this->latest, new DateTime('now', $this->timezone));
    $this->objects[] = $this->latest;
    return $this->latest;
  }

  /**
   * @param object $object 
   * @param DateTime $date 
   * @return void 
   */
  public function setCreatedAt(object $object, DateTime $date){
    $object->setCreatedAt($date);
  }

  /**
   * @param object $object 
   * @param object $creator 
   * @return void 
   */
  public function setCreatedBy(object $object, object $creator){

  }
}