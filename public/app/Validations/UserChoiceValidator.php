<?php

namespace App\Validations;

use App\Exceptions\UserChoiceValidationException;

class UserChoiceValidator
{
    private array $data;
    private array $errors = [];
    private array $rules;

    public function __construct(array $data, array $rules = [])
    {
        $this->data = $data;
        $this->rules = $rules;
    }

    public function passes(): void
    {
        foreach ($this->rules as $key => $rules)
        {
            foreach ($rules as $rule){
                [$name, $attribute] = explode(':', $rule);
                /** dynamically calls a private function (for example) 'validateRequired()' / validateMin:3  */
                $ruleName = 'validate' . ucfirst($name);

                if(!$ruleName){
                    $_SESSION['status'] = 'Invalid validation rule'; /** checks if method exists */
                }
                $this->{$ruleName}($key, $attribute);
            }

        }

        if(count($this->errors) > 0){
            throw new UserChoiceValidationException();
        }
    }


    private function validateRequired(string $key): void
    {
        if(empty(trim($this->data[$key]))){
            $this->errors[$key][] = "{$key} field is required";
        }
    }

    private function validateMin(string $key, int $attribute): void
    {
        if(strlen($this->data[$key]) < $attribute){
            $this->errors[$key][] = "{$key} must be at least {$attribute} characters long";
        }
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}