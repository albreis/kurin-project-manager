<?php namespace Albreis\Kurin\Traits;

use Exception;

trait Response {

  public static function json($value) {
    return json_encode($value);
  }

}