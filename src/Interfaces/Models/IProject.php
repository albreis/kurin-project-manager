<?php namespace Albreis\Kurin\Interfaces\Models;

interface IProject {
  
  public function getName(): ?string;
  
  public function getDescription(): ?string;

}