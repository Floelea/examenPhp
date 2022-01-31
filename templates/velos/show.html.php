<div class="mb-5">

            <h1>    <?=  $velo->getName() ?></h1>
            <h5>    <?=  $velo->getDescription() ?></h5>
            <img src="  <?=  $velo->getImage() ?>" style="width:300px;"alt="">
            <h4> <?=  $velo->getPrice() ?> <sup>€</sup></h4>

            
        <form action="?type=velo&action=delete" method="post">

                    <button type="submit" name="id" value="<?= $velo->getId()  ?>" class="btn btn-danger">Supprimer ce vélo</button>

        </form>    

        <a href="?type=velo&action=edit&id=<?=   $velo->getId()  ?>" class="btn btn-success ms-3">Modifier</a>
</div>


<h4>Saisir un commentaire</h4>

<form action="?type=avis&action=new" method="post" class="mb-5">

        <div class="form-group">
                <label class="col-form-label mt-4" for="inputDefault">Renseignez votre nom</label>
                <input type="text" name="nameAvis" class="form-control" placeholder="Nom" id="inputDefault">
        </div>

        <div class="form-group mb-3">
                <label class="col-form-label mt-4" for="inputDefault">Votre Commentaire</label>
                <input type="text" name="contentAvis" class="form-control" placeholder="Commentaire" id="inputDefault">
        </div>



        <button type="submit" class="btn btn-primary" name="veloId" value="<?=   $velo->getId()   ?>">Valider</button>


</form>

<h4 class="mb-5">Vos commentaires</h4>

            
            <?php   foreach ($avis as $avi) {   ?>

            <div class="mb-5">
            <h3>  <?=   $avi->getAuthor()  ?>   </h3>
            <p>     <?=   $avi->getContent()  ?>   </p>
                
            <div class="d-flex">
                    <form action="?type=avis&action=delete" method="post">

                                <button type="submit" name="id" value="<?=   $avi->getId()  ?>" class="btn btn-danger">Supprimer</button>

                    </form>

                    <a href="?type=avis&action=edit&id=<?=   $avi->getId()  ?>" class="btn btn-success ms-3">Modifier</a>
            </div>
            </div>    
            <?php    }    ?>

    


