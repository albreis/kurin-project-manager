<?php namespace Albreis\KurinProjectManager\Validators;

use Albreis\Kurin\Validator;
use Albreis\KurinProjectManager\Interfaces\Validators\IProjectValidator;
use DateTime;

/** @package Albreis\Kurin\Validators */
class ProjectValidator extends Validator implements IProjectValidator {

    public function validate(?object $object = null): bool { 
      $this->object = $object;
      return $this->validateCreatedAt() && 
             $this->validateUpdatedAt() &&
             $this->validateDeletedAt() &&
             $this->validateCreatedBy() &&
             $this->validateUpdatedBy() &&
             $this->validateDeletedBy() &&
             $this->validateName() &&
             $this->validateDescription();
    }

    public function validateCreatedAt(): bool { 
      return $this->object->getCreatedAt() instanceof DateTime;
    }

    public function validateUpdatedAt(): bool { 
      return $this->object->getCreatedAt() == null || 
              $this->object->getCreatedAt() instanceof DateTime;
    }

    public function validateDeletedAt(): bool { 
      return $this->object->getCreatedAt() == null || 
              $this->object->getCreatedAt() instanceof DateTime;
    }

    public function validateCreatedBy(): bool { 
      return $this->object->getCreatedBy() == null || 
              is_numeric($this->object->getCreatedBy());
    }

    public function validateUpdatedBy(): bool { 
      return $this->object->getUpdatedBy() == null || 
              is_numeric($this->object->getUpdatedBy());
    }

    public function validateDeletedBy(): bool { 
      return $this->object->getDeletedBy() == null || 
              is_numeric($this->object->getDeletedBy());
    }

    public function validateName(): bool { 
      return is_string($this->object->getName());
    }

    public function validateDescription(): bool { 
      return $this->object->getDescription() == null || 
              is_string($this->object->getDescription());
    }

}