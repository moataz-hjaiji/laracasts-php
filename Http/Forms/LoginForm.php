<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{

    protected array $errors;
    public function __construct(public array $attributes)
    {
        $this->errors = [];
        if(!Validator::isEmail($this->attributes['email'])){
            $this->errors['email'] = "Please provide a valid email address.";
        }
        if(!Validator::isString($this->attributes['password'],100,255)){
            $this->errors['password'] = "Please provide a valid password.";
        }
    }

    /**
     * @throws \Exception
     */
    public static function validate($attributes)
    {
        $instance = new static($attributes);


        return $instance->failed() ? $instance->throw() : $instance;
    }

    /**
     * @throws ValidationException
     */
    public function throw()
    {
        ValidationException::throw($this->errors,$this->attributes);
    }
    public  function failed(): bool
    {
        return !empty($this->errors);
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
    public function error($field,$message): LoginForm
    {
        $this->errors[$field]= $message;
        return $this;
    }

    private function errors(): array
    {
        return $this->errors;
    }
}
