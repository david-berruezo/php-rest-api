<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 14/11/2019
 * Time: 6:57
 */

ini_set('display_errors',0);

require_once("MobileRestHandler.php");


class RestController{

    public function __construct()
    {
        $view = "";
        if(isset($_GET["view"]))
            $view = $_GET["view"];
        $this->evaluate($view);
    }

    private function evaluate($view){
        switch($view){
            case "all":
                // to handle REST Url /mobile/list/
                $mobileRestHandler = new MobileRestHandler();
                $mobileRestHandler->getAllMobiles();
                break;
            case "single":
                // to handle REST Url /mobile/list/<id>/
                $mobileRestHandler = new MobileRestHandler();
                $mobileRestHandler->getMobile($_GET["id"]);
                break;
            case "" :
                //404 - not found;
                break;
        }
    }
}

$aplication = new RestController();

?>