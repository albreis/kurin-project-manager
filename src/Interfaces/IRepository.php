<?php namespace Albreis\Kurin\Interfaces;

interface IRepository {
  public function query(string $sql, array $params = []): array;
}