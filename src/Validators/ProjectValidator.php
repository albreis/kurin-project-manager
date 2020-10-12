<?php namespace Albreis\Kurin\Validators;

use Albreis\Kurin\Interfaces\Validators\IProjectValidator;
use Albreis\Kurin\Validator;

/** @package Albreis\Kurin\Validators */
class ProjectValidator extends Validator implements IProjectValidator {

    public function validate(): bool { 
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
      return true;
    }

    public function validateUpdatedAt(): bool { 
      return true;
    }

    public function validateDeletedAt(): bool { 
      return true;
    }

    public function validateCreatedBy(): bool { 
      return true;
    }

    public function validateUpdatedBy(): bool { 
      return true;
    }

    public function validateDeletedBy(): bool { 
      return true;
    }

    public function validateName(): bool { 
      return true;
    }

    public function validateDescription(): bool { 
      return true;
    }

}