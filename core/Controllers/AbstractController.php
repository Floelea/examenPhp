<?php   


namespace Controllers;



abstract class AbstractController{

    protected object $defaultModel;
    protected  $defaultModelName;

    public function __construct(){

        $this->defaultModel = new $this->defaultModelName();


    }

    public function redirect(? array $url=null):Response{

        return \App\Response::redirect($url);

    }


    public function render(string $nomTemplate,array $donnees){

        return \App\View::render($nomTemplate,$donnees);

    }

}








?>