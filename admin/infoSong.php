<?php require_once('../include/header.php'); ?>
<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $request = "SELECT * FROM artist WHERE id_artist = :id_artist";
    $resultat = $pdo->prepare($request);
    $resultat->execute(['id_artist' => $id]);
    $artist = $resultat->fetchAll(PDO::FETCH_ASSOC);
}
?>
<h1 class="my-5 text-center">More information :</h1>

<div class="container">
    <?php foreach($artist as $a) : ?>
    <div class="card mb-3">
        <h3 class="card-header"><?= $a['artist']; ?></h3>
        <div class="card-body">
            <h5 class="card-title"><?= $a['song']; ?></h5>
            <h6 class="card-subtitle text-muted"><?= $a['genre']; ?></h6>
        </div>
        <img src="<?= $a['image']; ?>" alt="">
        <div class="card-body">
            <p class="card-text"><?= $a['lyrics']; ?></p>
            <a href="#" class="card-link">See more..</a>
        </div>
        <div class="card-footer text-muted">
            <?= $a['date']; ?>
        </div>
    </div>
    <?php endforeach; ?>
</div>







<?php require_once('../include/footer.php'); ?>