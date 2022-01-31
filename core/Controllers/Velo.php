<?php     

namespace Controllers;

class Velo extends AbstractController{

    protected $defaultModelName = \Models\Velo::class;


    /**
     * Permet d'afficher la page ou se trouve tous les vélos
     */
    public function index(){

        $velos = $this->defaultModel->findAll();

        return $this->render("velos/index",[

                                            "pageTitle"=>"Nos vélos",
                                            "velos"=>$velos
        ]);

    }

    /**
     * Permet d'afficher la page d'un vélo par son ID
     */
    public function show(){

        $id = null;

        if(!empty($_GET['id']) && ctype_digit($_GET['id'])){

            $id = $_GET['id'];

        }

        if(!$id){

            die("pas d'id");

        }

        $velo = $this->defaultModel->findById($id);

        
        $modelAvis = new \Models\Avis();

        $avis = $modelAvis->findAllByVeloId($id);

        

        return $this->render("velos/show",[

                                            "pageTitle"=>$velo->getName(),
                                            "velo"=>$velo,
                                            "avis"=>$avis

        ]);

    }

    /**
     * Permet de créer un nouveau vélo et de revenir a l'index
     */
    public function new(){

        $nomVelo = null;
        $descriptionVelo = null;
        $photoVelo = null;
        $prixVelo = null;

                if(!empty($_POST['nomVelo']) && !empty($_POST['descriptionVelo']) && !empty($_POST['photoVelo']) && !empty($_POST['prixVelo'])){

                            $nomVelo = htmlspecialchars($_POST['nomVelo']);
                            $descriptionVelo = htmlspecialchars($_POST['descriptionVelo']);
                            $photoVelo = htmlspecialchars($_POST['photoVelo']);
                            $prixVelo = htmlspecialchars($_POST['prixVelo']);


                    }


                if($nomVelo && $descriptionVelo && $photoVelo && $prixVelo){

                            $velo = new \Models\Velo();
                            $velo->setName($nomVelo);
                            $velo->setDescription($descriptionVelo);
                            $velo->setImage($photoVelo);
                            $velo->setPrice($prixVelo);
                            $this->defaultModel->save($velo);

                            return $this->redirect([

                                                    "type"=>"velo",
                                                    "action"=>"index"
                            ]);




                }

        
        return $this->render("velos/create",[

                                            "pageTitle"=>"Creation d'un velo"
        ]);
    }

    /**
     * Permet de supprimer un vélo a partir de son ID et de revenir a l'index
     */
    public function delete(){

        $id = null;

        if(!empty($_POST['id']) && ctype_digit($_POST['id'])){

            $id=$_POST['id'];
        }

        if(!$id){

            die("Vous n'avez pas passé d'id");
        }


        $velo = $this->defaultModel->findById($id);

        $this->defaultModel->remove($velo);

        return $this->redirect([

                                "type"=>"velo",
                                "action"=>"index"
        ]);

    }

}


?>