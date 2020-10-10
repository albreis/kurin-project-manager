<?php namespace Albreis\Kurin\Database;

use PDO;
use PDOException;
use PDOStatement;

class Query {

    private PDO $db;
    private ?string $model = 'stdClass';

    public function __construct(Connector $connector) {
      $this->db = $connector->connect();
    }

    public function setModel(string $model = null) {
      $this->model = $model;
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
    public function queryOne(string $sql, array $params = []): object 
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
  
      $result = $stmt->fetchObject($this->model);
  
      return $result;
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