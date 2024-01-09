<?php

namespace Core;

class Authenticator
{
    public function attempt($email,$password){
        $db = App::resolve(Database::class);
        $user = $db->find('select * from user where email = :email',[
            'email' => $email
        ]);
        if($user){
            $validPassword = password_verify($password,$user['password']);
            if($validPassword){
                $this->login([
                    "email" => $email
                ]);
                return true;
            }
        }
        return false;
    }
    public function login($user): void
    {
        $_SESSION['user'] = [
            'email' => $user['email']
        ];
        session_regenerate_id(true);
    }

    public function logout(): void
    {
        $_SESSION = [];

        session_destroy();
        $params = session_get_cookie_params();
        setcookie('PHPSESSID','',time() - 3600,$params['path'],$params['domain'],$params['secure'],$params['httponly']);
    }

}
