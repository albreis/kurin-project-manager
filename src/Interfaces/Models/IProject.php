<?php namespace Albreis\KurinProjectManager\Interfaces\Models;

interface IProject {
  
  public function getName(): ?string;
  
  public function getDescription(): ?string;

}