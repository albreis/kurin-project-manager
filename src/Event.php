<?php namespace Albreis\Kurin;

use Albreis\Kurin\Interfaces\IEvent;

/** @package Albreis\Kurin */
abstract class Event implements IEvent {

  private $message;

  /**
   * @param string $message 
   * @return mixed 
   */
  public function setMessage(string $message) {
    $this->message = $message;
    return $this;
  }

  /** @return string  */
  public function getMessage(): string {
    return $this->message;
  }
}