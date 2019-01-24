<?php
require_once '../../../model/database.php';

$id = $_POST['id'];
$sejour_id = $_POST['sejour_id'];
$sejour = getOneSejour($sejour_id);
$depart = getOneEntity( depart, $id);

require_once '../../layout/header.php';
?>

    <h1>Modification d'un départ</h1>
    <h2>Séjour : <?= $sejour["titre"] ; ?></h2>

    <form action="update_query.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label>Départ</label>
            <input type="date" name="depart" value="<?php echo $depart["date_depart"]; ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Prix</label>
            <input type="number" name="prix" value="<?php echo $depart["prix"]; ?>" class="form-control" required>
        </div>
        <input type="hidden" name="sejour_id" value="<?php echo $sejour["id"]; ?>">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <button type="submit" class="btn btn-success">
            <i class="fa fa-check"></i>
            Modifier
        </button>
    </form>

<?php require_once '../../layout/footer.php'; ?>