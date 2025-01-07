<?php
namespace app\models;
use app\core\UserModel;
class User extends UserModel
{
    const STATUS_ACTIVE = 0;
    const STATUS_INACTIVE = 1;
    const STATUS_DELETED = 2;
    public int $id ;
    public string $firstname = "";
    public string $lastname = "";
    public string $email = "";
    public int $status = self::STATUS_INACTIVE;
    public string $password = "";
    public string $confirmPassword = "";
    public string $created_at  = "";

    public function save()
    {
        $this->status = self::STATUS_INACTIVE;
        $this->password = password_hash($this->password,PASSWORD_DEFAULT);
        return parent::save();
    }
    public function rules():array
    {
        return [
            "firstname" => [self::RULE_RQUIRED],
            "lastname" => [self::RULE_RQUIRED],
            "email" => [self::RULE_RQUIRED,self::RULE_EMAIL,[self::RULE_UNIQUE,"class" => self::class]],
            "password" => [self::RULE_RQUIRED,[self::RULE_MIN,"min" => 8],[self::RULE_MAX,"max" => 24]],
            "confirmPassword" => [self::RULE_RQUIRED,[self::RULE_MATCH,"match" => "password"]]
        ];
    }
    public static function tableName():string
    {
        return "users";
    }
    public function attributes():array
    {
        return ["firstname","lastname","email","password","status"];
    }
    public function labels():array
    {
        return ["firstname" => "First name","lastname" => "Last name","email" => "Email","password" => "Password","confirmPassword" => "Confirm Password"];
    }
    public static function primaryKey():string
    {
        return "id";
    }
    public function getDisplayName():string{
        return $this->firstname." ".$this->lastname;
    }
}