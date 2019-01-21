<?php
require_once '../../../model/database.php';

$recipes = getAllRecettes();

$error_msg = null;
if (isset($_GET['errcode'])) {
    $errcode = $_GET['errcode'];
    switch ($errcode) {
        case 23000:
            $error_msg = "Erreur lors de la suppression !";
            break;
        default:
            $error_msg = "Une erreur est survenue !";
            break;
    }
}

require_once '../../layout/header.php';
?>

<h1>Gestion des recettes</h1>

<a href="create.php" class="btn btn-primary">
    <i class="fa fa-plus"></i>
    Ajouter
</a>

<hr>

<?php if ($error_msg) : ?>
    <div class="alert alert-danger">
        <i class="fa fa-times"></i>
        <?php echo $error_msg; ?>
    </div>
<?php endif; ?>

<table class="table table-striped table-bordered table-condensed">
    <thead class="thead-light">
        <tr>
            <th>Titre</th>
            <th>Image</th>
            <th>Catégorie</th>
            <th>Auteur</th>
            <th>Date de création</th>
            <th class="actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($recipes as $recipe) : ?>
            <tr>
                <td><?php echo $recipe['titre']; ?></td>
                <td>
                    <img src="../../../uploads/<?php echo $recipe['image']; ?>" class="img-thumbnail">
                </td>
                <td><?php echo $recipe['categorie']; ?></td>
                <td><?php echo $recipe['pseudo']; ?></td>
                <td><?php echo $recipe['date_creation_format']; ?></td>
                <td class="actions">
                    <a href="update.php?id=<?php echo $recipe['id']; ?>" class="btn btn-warning">
                        <i class="fa fa-edit"></i>
                        Modifier
                    </a>
                    <form action="delete_query.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $recipe['id']; ?>">
                        <button type="submit" class="btn btn-danger">
                            <i class="fa fa-trash"></i>
                            Supprimer
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php require_once '../../layout/footer.php'; ?>