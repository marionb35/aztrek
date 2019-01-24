<?php
require_once '../../../model/database.php';

$sejours = getAllSejours();

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


    <h1>Gestion des départs et des prix par séjour</h1>
<!--<hr>-->

<?php if ($error_msg) : ?>
    <div class="alert alert-danger">
        <i class="fa fa-times"></i>
        <?php echo $error_msg; ?>
    </div>
<?php endif; ?>

<table class="table table-striped table-bordered table-condensed">
    <thead class="thead-light">
        <tr>
            <th>Séjour</th>
            <th>Durée</th>
            <th>A partir de</th>
            <th class="actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($sejours as $sejour) : ?>
            <tr>
                <td><?php echo $sejour['titre']; ?></td>
                <td><?php echo $sejour['duree']; ?></td>
                <td><?php echo $sejour['min_prix']; ?></td>
                <td class="actions">
                    <a href="index_sejour.php?sejour_id=<?php echo $sejour['id']; ?>" class="btn btn-warning">
                        <i class="fa fa-edit"></i>
                        Modifier
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php require_once '../../layout/footer.php'; ?>