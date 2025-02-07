<?php
namespace app\core\middlewares;
use  app\core\exception\ForbidenException;
use app\core\Application;
class AuthMiddleware extends BaseMiddleware
{
    public array $actions;
    public function __construct($actions = [])
    {
        $this->actions = $actions;
    }
    public function execute()
    {
        if(Application::isGuest())
        {
            if(empty($this->actions) || in_array(Application::$app->controller->action,$this->actions))
            {
                throw new ForbidenException();
            }
        }
    }
}