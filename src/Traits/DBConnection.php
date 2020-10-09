<?php namespace Albreis\Kurin\Traits;

use PDO;
use PDOException;
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
  public function connect() {
    $this->db = new PDO($this->dsn, $this->username, $this->password, $this->options);
    $this->db->setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }

  /**
   * @param string $sql 
   * @param array $params 
   * @return array 
   */
  public function query(string $sql, array $params = []): PDOStatement 
  {     
    try {
      $this->db->beginTransaction();
      $stmt  = $this->db->prepare($sql, [\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL]);
      foreach($params as $key => $value) {
        if(is_numeric($value)) {
          $stmt->bindValue(":{$key}", $value, PDO::PARAM_INT);
        } else {
          $stmt->bindValue(":{$key}", $value);
        }
      }
      $stmt->execute();
      $this->db->commit();
    } catch(PDOException $e) {
      $this->db->rollback();
    }
    return $stmt;
  }

  /**
   * @param string $sql 
   * @param array $params 
   * @return array 
   */
  public function listQuery(string $sql, array $params = []): array 
  {    
    try {
      $this->db->beginTransaction();
      $stmt  = $this->db->prepare($sql, [PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL]);
      foreach($params as $key => $value) {
        if(is_numeric($value)) {
          $stmt->bindValue(":{$key}", $value, PDO::PARAM_INT);
        } else {
          $stmt->bindValue(":{$key}", $value);
        }
      }
      $stmt->execute();
      $this->db->commit();
    } catch(PDOException $e) {
      $this->db->rollback();
    }

    $result = [];

    while($row = $stmt->fetchObject($this->model)) {
      $result[] = $row;
    }

    return $result;
  }
}