<?php
require_once '../../../model/database.php';

$id = $_GET['id'];
$sejour = getOneEntity("sejour", $id);
$liste_pays = getAllEntities("pays");
$liste_difficulte = getAllEntities("difficulte");


require_once '../../layout/header.php';
?>


<h1>Modification d'un séjour</h1>

<form action="update_query.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Titre</label>
        <input type="text" name="titre" value="<?php echo $sejour["titre"]; ?>" class="form-control" placeholder="Titre" required>
    </div>
    <div class="form-group">
        <label>Pays</label>
        <select name="pays_id" class="form-control">
            <?php foreach ($liste_pays as $pays) : ?>
                <?php $selected = ($pays["id"] == $sejour["pays_id"]) ? "selected" : ""; ?>
                <option value="<?php echo $pays["id"]; ?>" <?php echo $selected; ?>>
                    <?php echo $pays["libelle"]; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Difficulté</label>
        <select name="difficulte_id" class="form-control">
            <?php foreach ($liste_difficulte as $difficulte) : ?>
                <?php $selected = ($difficulte["id"] == $sejour["difficulte_id"]) ? "selected" : ""; ?>
                <option value="<?php echo $difficulte["id"]; ?>" <?php echo $selected; ?>>
                    <?php echo $difficulte["libelle"]; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Image</label>
        <input type="file" name="image" class="form-control">
        <?php if ($sejour["image"]) : ?>
            <img src="../../../uploads/<?php echo $sejour["image"]; ?>" class="img-thumbnail">
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label>Carte</label>
        <input type="file" name="carte" class="form-control">
        <?php if ($sejour["carte"]) : ?>
            <img src="../../../uploads/<?php echo $sejour["carte"]; ?>" class="img-thumbnail">
        <?php endif; ?>
    </div>
    <div class="form-group">
        <label>Description longue</label>
        <textarea name="description_longue" class="form-control"><?php echo $sejour["description_longue"]; ?></textarea>
    </div>
    <div class="form-group">
        <label>Description courte</label>
        <input type="text" name="description_courte" value="<?php echo $sejour["description_courte"]; ?>" class="form-control" placeholder="Description courte" required>
    </div>
    <div class="form-group">
        <label>Durée</label>
        <input type="number" name="duree" class="form-control" value="<?php echo $sejour["duree"]; ?>" required>
    </div>
    <div class="form-group">
        <label>Nb de places</label>
        <input type="number" name="nb_places" class="form-control" value="<?php echo $sejour["nb_places"]; ?>" required>
    </div>
    <div class="form-group form-check">
        <?php $check_promo = ($sejour["promo"] == 1) ? "checked" : "" ; ?>
        <input type="checkbox" name="promo" <?php echo $check_promo; ?> class="form-check-input">
        <label>Promo</label>
    </div>
    <div class="form-group form-check">
        <?php $check_coeur = ($sejour["coup_de_coeur"] == 1) ? "checked" : "" ; ?>
        <input type="checkbox" name="coup_de_coeur" class="form-check-input" <?php echo $check_coeur; ?>>
        <label>Coup de coeur</label>
    </div>
    <input type="hidden" name="id" value="<?php echo $id; ?>"> 
    <button type="submit" class="btn btn-success">
        <i class="fa fa-check"></i>
        Modifier
    </button>
</form>

<?php require_once '../../layout/footer.php'; ?>