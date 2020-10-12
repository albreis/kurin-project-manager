<?php

namespace Albreis\Kurin\Models;

use Albreis\Kurin\Interfaces\Models\IProject;
use Albreis\Kurin\Model;

/** @package Albreis\Kurin\Models */
class Project extends Model implements IProject
{

  public string $name;
  public ?string $description = null;

  public function getDescription(): ?string { 
    return $this->description;
  }

  public function getName(): ?string
  {
    return $this->name;
  }
  
}
