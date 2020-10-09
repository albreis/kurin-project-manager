<?php namespace Albreis\Kurin\Traits;

use PDO;
use PDOStatement;

trait DBConnection {
  
  private $dsn = 'mysql:host=162.241.2.93;dbname=albreis2_kurin';
  private $username = 'albreis2_kurin';
  private $password = 'C!V3wMrgN[NY';
  private $options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
  ); 
  protected $db;
  
  /** @return void  */
  public function __construct() {
    $this->db = new PDO($this->dsn, $this->username, $this->password, $this->options);
  }

  /**
   * @param string $sql 
   * @param array $params 
   * @return array 
   */
  public function query(string $sql, array $params = []): PDOStatement 
  {    
    $stmt  = $this->db->prepare($sql, [\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL]);
    $stmt->execute($params);
    return $stmt;
  }

  /**
   * @param string $sql 
   * @param array $params 
   * @return array 
   */
  public function listQuery(string $sql, array $params = []): array 
  {    
    $stmt  = $this->db->prepare($sql, [\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL]);
    $stmt->execute($params);

    while($row = $stmt->fetchObject($this->model)) {
      $result[] = $row;
    }

    return $result;
  }
}