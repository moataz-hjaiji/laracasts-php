<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{

    protected array $errors;
    public function validate($email,$password): bool
    {
        $this->errors = [];
        if(!Validator::isEmail($email)){
            $this->errors['email'] = "Please provide a valid email address.";
        }
        if(!Validator::isString($password,7,255)){
            $this->errors['password'] = "Please provide a valid password.";
        }
        return empty($this->errors);
    }
    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
    public function error($field,$message)
    {
        $this->errors[$field]= $message;
    }
}
