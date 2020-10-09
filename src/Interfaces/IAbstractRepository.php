<?php namespace Albreis\Kurin\Interfaces;

use PDOStatement;

interface IAbstractRepository {

  /**
   * get all projects
   * 
   */
  public function getAll(): array;

  /**
   * set ordering by
   * 
   * @param string $field
   * @param string $pos
   */
  public function setOrderBy(string $field, string $pos);

  
  /**
   * get ordering by
   */
  public function getOrderBy(): array;

  /**
   * @param string $sql 
   * @param array $params 
   * @return PDOStatement 
   */
  public function query(string $sql, array $params = []): PDOStatement;
  
  /**
   * @param string $sql 
   * @param array $params 
   * @return array 
   */
  public function listQuery(string $sql, array $params = []): array;
}