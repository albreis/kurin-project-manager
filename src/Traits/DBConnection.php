<?php namespace Albreis\Kurin\Traits;

use PDO;

trait DBConnection {
  
  private $dsn = 'mysql:host=162.241.2.93;dbname=albreis2_kurin';
  private $username = 'albreis2_kurin';
  private $password = 'C!V3wMrgN[NY';
  private $options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
  ); 
  protected $db;

  public function connect() {
    $this->db = new PDO($this->dsn, $this->username, $this->password, $this->options);
  }
}