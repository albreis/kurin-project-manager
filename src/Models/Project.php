<?php

namespace Albreis\KurinProjectManager\Models;

use Albreis\KurinProjectManager\Interfaces\Models\IProject;
use Albreis\Kurin\Model;

/** @package Albreis\Kurin\Models */
class Project extends Model implements IProject
{

  protected ?string $name = null;
  protected ?string $description = null;

  public function getDescription(): ?string { 
    return $this->description;
  }

  public function getName(): ?string
  {
    return $this->name;
  }
  
}
