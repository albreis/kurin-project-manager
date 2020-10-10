<?php namespace Albreis\Kurin\Interfaces\Database;

use PDO;

/** @package Albreis\Kurin\Interfaces\Database */
interface IConnector {
  
  /**
   * @param null|array $options 
   * @return PDO 
   */
  public function connect(?array $options = []): PDO;
}