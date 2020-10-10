<?php namespace Albreis\Kurin\Traits;

trait Request {
  public static function uri() {
    return $_SERVER['REQUEST_URI'];
  }
}