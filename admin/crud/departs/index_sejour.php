<?php
require_once '../../../model/database.php';

$sejour_id = $_GET["sejour_id"];
$sejour = getOneSejour($sejour_id);
$departs = getAllDepartsBySejour($sejour_id);

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

    <h1>Gestion des départs et des prix</h1>
    <h2>Séjour : <?= $sejour["titre"] ; ?></h2>


    <form action="create.php" method="POST">
        <input type="hidden" name="sejour_id" value="<?php echo $sejour_id; ?>">
        <button type="submit" class="btn btn-primary">
            <i class="fa fa-plus"></i>
            Ajouter
        </button>
    </form>

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
            <th>Date de départ</th>
            <th>Date de retour</th>
            <th>Prix</th>
            <th class="actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($departs as $depart) : ?>
            <tr>
                <td><?php echo $depart['date_depart']; ?></td>
                <td><?php echo $depart['date_retour']; ?></td>
                <td><?php echo $depart['prix']; ?></td>
                <td class="actions">
                    <form action="update.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $depart['id']; ?>">
                        <input type="hidden" name="sejour_id" value="<?php echo $sejour['id']; ?>">
                        <button type="submit" class="btn btn-warning">
                            <i class="fa fa-edit"></i>
                            Modifier
                        </button>
                    </form>
                    <form action="delete_query.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $depart['id']; ?>">
                        <input type="hidden" name="sejour_id" value="<?php echo $sejour['id']; ?>">
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