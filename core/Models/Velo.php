<?php  

namespace Models;

class Velo extends AbstractModel{

    protected string $nomDeLaTable = "velos";

    private $id;
    public function getId(){
        return $this->id;
    }

    private $name;
    public function getName(){
        return $this->name;
    }
    public function setName($name){
        $this->name=$name;
    }

    private $description;
    public function getDescription(){
        return $this->description;
    }
    public function setDescription($description){
        $this->description=$description;
    }

    private $image;
    public function getImage(){
        return $this->image;
    }
    public function setImage($image){
        $this->image=$image;
    }

    private $price;
    public function getPrice(){
        return $this->price;
    }
    public function setPrice($price){
        $this->price=$price;
    }

    /**
     * @param Velo $velo
     * @return void
     */
    public function save(Velo $velo){

        $requete = $this->pdo->prepare("INSERT INTO {$this->nomDeLaTable} 
        (name, description, image, price) VALUES (:name, :description, :image, :price)");

        $requete->execute([

            "name" =>$velo->name,
            "description"=>$velo->description,
            "image"=>$velo->image,
            "price"=>$velo->price
        ]);

    }
    /**
     * @param Velo $velo
     */
    public function change(Velo $velo){

        $requete = $this->pdo->prepare("UPDATE {$this->nomDeLaTable} SET name = :name, description = :description, image = :image, price = :price where id = :idModifie");
    
            $requete->execute([
    
                "name"=>$velo->name,
                "description"=>$velo->description,
                "image"=>$velo->image,
                "price"=>$velo->price,
                "idModifie"=>$velo->id
            ]);
    
    
    }

}