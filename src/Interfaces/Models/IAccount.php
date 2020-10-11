<?php namespace Albreis\Kurin\Interfaces\Models;

use Albreis\Kurin\Models\User;

interface IAccount {
  public function getId(): int;
  public function getUserId(): int;
  public function getUser(): User;
}