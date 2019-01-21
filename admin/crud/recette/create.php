<?php
require_once '../../../model/database.php';

$categories = getAllEntities("categorie");

require_once '../../layout/header.php';
?>

    <h1>Ajout d'une photo</h1>

    <form action="create_query.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Titre</label>
            <input type="text" name="titre" class="form-control" placeholder="Titre" required>
        </div>
        <div class="form-group">
            <label>Catégorie</label>
            <select name="categorie_id" class="form-control">
                <?php foreach ($categories as $categorie) : ?>
                    <option value="<?php echo $categorie["id"]; ?>">
                        <?php echo $categorie["libelle"]; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Image</label>
            <input type="file" name="image" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label>Description courte</label>
            <input type="text" name="description_courte" class="form-control" placeholder="Description courte" required>
        </div>
        <div class="form-group">
            <label>Nombre de couverts</label>
            <input type="number" name="couverts" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Temps de preparation</label>
            <input type="time" name="temps_prepa" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Temps de cuisson</label>
            <input type="time" name="temps_cuisson" class="form-control" required>
        </div>
        <div class="form-group form-check">
            <input type="checkbox" name="publie" class="form-check-input" required>
            <label>Publié ?</label>
        </div>
        <button type="submit" class="btn btn-success">
            <i class="fa fa-check"></i>
            Ajouter
        </button>
    </form>

<?php require_once '../../layout/footer.php'; ?>