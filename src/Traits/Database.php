<?php namespace Albreis\Kurin\Traits;

use Albreis\Kurin\Database\Connector;
use Albreis\Kurin\Database\Query;

trait Database
{
  
    /**
     * @param Connector $connector 
     * @return Query 
     */
    public static function connect(Connector $connector): Query
    {        
        return new Query($connector);
    }
    
}