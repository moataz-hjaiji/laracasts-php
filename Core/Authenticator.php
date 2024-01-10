<?php

namespace Core;

class Authenticator
{
    public function attempt($email,$password): bool
    {
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
        Session::destroy();
    }

}
