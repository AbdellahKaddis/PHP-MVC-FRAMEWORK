<?php
namespace app\core\form;
class Form
{

    public string $attribute;
    public  $model;


    public function __construct($model,$attribute)
    {

        $this->model = $model;
        $this->attribute = $attribute;
    }

    public static function begin($action,$method)
    {
        echo sprintf('<form action = "%s" method = "%s">',$action,$method);
        return new Form(null,"");
    }
    public static function end()
    {
        echo '</form>';
    }
    public function field( $model,string $attribute)
    {
        return new Field($model,$attribute);
    }
}