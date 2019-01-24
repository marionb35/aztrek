
<div class="overlay-image overlay cadre_pays">
                    <a href="sejour.php?id=<?= $sejour["id"]; ?>">
                        <img class="image" src="uploads/<?= $sejour['image'] ; ?>" alt="<?= $sejour['titre'] ; ?>" />
                        <div class="normal">
                            <div class="text"><?= $sejour["titre"] ; ?></div>
                            <div class="jours"><?= $sejour["duree"] ; ?></div>
                            <div class="difficulte">
                                <div class="chaussures">
                                    <?php for ($i =1; $i <=5; $i++) : ?>
                                        <?php if ($i <= $sejour["difficulte"]) : ?>
                                            <img src="uploads/chaussure_pleine.png" alt="">
                                        <?php else: ?>
                                            <img src="uploads/chaussure_vide.png" alt="">
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        </div>
                    </a>
</div>