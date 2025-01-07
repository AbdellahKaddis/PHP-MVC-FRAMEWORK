<?php
namespace app\core;
use app\core\middlewares\AuthMiddleware;
class Controller 
{
    public string $layout = "main";
    public string $action = "";
    protected  $middlewares = [];
    public function render($view,$params=[])
    {
        return Application::$app->router->renderView($view,$params);
    }
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function getMiddlewares()
    {
        return $this->middlewares;
    }
    public function registerMiddleware(AuthMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }
}