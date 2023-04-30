<?php require_once('../include/header.php'); ?>

<?php
$request = "SELECT * FROM artist";
$resultat = $pdo->prepare($request);
$resultat->execute();

$artists = $resultat->fetchAll(PDO::FETCH_ASSOC);

// ! AFFICHAGE DE L'IMAGE N'A PAS MARCHER REVOIR PLUS TARD
?>


<h1 class="text-center my-5">All Songs</h1>

<div class="container">
    <div class="row d-flex justify-content-between">
        <?php foreach($artists as $a): ?>
            <div class="col-4">
            <div class="card mb-3">
                <h3 class="card-header"><?= $a['artist']; ?></h3>
                <div class="card-body">
                    <h5 class="card-title"><?= $a['song']; ?></h5>
                    <h6 class="card-subtitle text-muted"><?= $a['genre']; ?></h6>
                </div>
                    <img src="<?= $a['image']; ?>" alt="">
                <div class="card-body">
                    <p class="card-text"><?= $a['lyrics']; ?></p>
                    <a href="#" class="card-link">Voir plus..</a>
                </div>
                <div class="card-footer text-muted">
                    <p><?= $a['date']; ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>




<?php 
debug($a['image']);
?>












<?php require_once('../include/footer.php'); ?>