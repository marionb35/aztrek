<?php require_once '../../layout/header.php';
require_once '../../../model/database.php';

$sejour_id = $_POST["sejour_id"];
$sejour = getOneSejour($sejour_id);

?>

<h1>Ajout d'un départ</h1>
    <h2>Séjour : <?= $sejour["titre"] ; ?></h2>

<form action="create_query.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label>Départ</label>
        <input type="date" name="depart" class="form-control" placeholder="Depart" required>
    </div>
    <div class="form-group">
        <label>Prix</label>
        <input type="number" name="prix" class="form-control" required>
    </div>
    <input type="hidden" name="sejour_id" value="<?php echo $sejour_id; ?>">
    <button type="submit" class="btn btn-success">
        <i class="fa fa-check"></i>
        Ajouter
    </button>
</form>

<?php require_once '../../layout/footer.php'; ?>