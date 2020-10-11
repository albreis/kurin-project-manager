<?php namespace Albreis\Kurin\Traits;

trait Validate {

  /**
   * @param string $value 
   * @param bool $excludePrivate 
   * @return null|string 
   */
  public static function ip(string $value, bool $excludePrivate = false): ?string
  {
    if ($excludePrivate) {
        return filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE);
    }
    return filter_var($value, FILTER_VALIDATE_IP);
  }

  /**
   * @param string $value 
   * @return null|int 
   */
  public static function int(string $value): ?int
  {
    return filter_var($value, FILTER_VALIDATE_INT);
  }

  /**
   * @param string $value 
   * @return null|bool 
   */
  public static function bool(string $value): ?bool
  {
    return filter_var($value, FILTER_VALIDATE_BOOLEAN);
  }
  
  /**
   * @param string $value 
   * @return null|string 
   */
  public static function email(string $value): ?string 
  {
    return filter_var($value, FILTER_VALIDATE_EMAIL);
  }

  /**
   * @param string $value 
   * @return null|string 
   */
  public static function url(string $value): ?string 
  {
    return filter_var($value, FILTER_VALIDATE_URL);
  }
}