<?php namespace Albreis\Kurin\Database;

use PDO;

/** @package Albreis\Kurin\Database */
class MySQL extends Connector {
  
  private $options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
  );

  /**
   * @param mixed $dsn 
   * @param mixed $user 
   * @param mixed $pass 
   * @param array $options 
   * @return PDO 
   */
  public function connect(?array $options = []): PDO {
    $connection = new PDO('mysql:host=' . DATABASE_HOST . ';dbname=' . DATABASE_DB, DATABASE_USER, DATABASE_PASS, array_merge($this->options, $options));
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $connection;
  }
}