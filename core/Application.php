<?php
namespace app\core;

class Application
{
    public static string $ROOT_DIR;

    public string $userClass;
    public Router $router;
    public Request $request;
    public Response $response;
    public Database $db;
    public static Application $app;
    public ?Controller $controller=null;
    public Session $session;
    public $user;
    public string $layout = "main";
    public function __construct($rootPath,array $config)
    {
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request,$this->response);
        static::$ROOT_DIR = $rootPath;
        static::$app=$this;
        $this->session = new Session();
        $this->db = new Database($config["db"]);

        $this->userClass = $config["userClass"];
        $primaryValue = $this->session->get("user");
        if($primaryValue)
        {
            $primaryKey = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$primaryKey => $primaryValue]);
        }else{
            $this->user = null;
        }

    }
    public function setController(Controller $controller)
    {
        $this->controller = $controller;
    }
    public function getController()
    {
        return $this->controller;
    }

    public function run()
    {
        try{
            echo $this->router->resolve();
        }catch(\Exception $e)
        {
            $this->response->setStatusCode($e->getCode());
            echo $this->router->renderView("_error",[
                "exception" => $e
            ]);
        }
    }
    public function login($user)
    {
        $this->user = $user;

        $primaryKey = $user->primaryKey();
        $primaryValue = $user->{$primaryKey};
        $this->session->set("user",$primaryValue);
        return true;
    }
    public function logout()
    {
        $this->user = null;
        $this->session->remove("user");
    }
    public static function isGuest()
    {
        return !self::$app->user;
    }
}