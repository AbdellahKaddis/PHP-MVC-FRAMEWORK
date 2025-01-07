<?php
namespace app\models;
use app\core\Model;
use app\core\Application;
class LoginForm extends Model
{
    public string $email = "";
    public string $password = "";
    public function rules():array
    {
        return [
            "email" => [self::RULE_RQUIRED,self::RULE_EMAIL],
            "password" => [self::RULE_RQUIRED],
        ];
    }
    public function login()
    {
        $user = User::findOne(["email" => $this->email]);
        if(!$user)
        {
            $this->addError("email","User does not exist with this email");
            return false;
        }
        if(!password_verify($this->password,$user->password))
        {
            $this->addError("password","Password is incorrect");
            return false;
        }
        return Application::$app->login($user);
    }
    public function labels():array
    {
        return [
            "email" => "Your Email",
            "password" => "Password"
        ];
    }
}