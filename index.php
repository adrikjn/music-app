<?php require_once('include/header.php'); ?>
<?php 

$request = "SELECT artist, song, image,date FROM artist ORDER BY date DESC LIMIT 3";
$resultat = $pdo->prepare($request);
$resultat->execute();
$artists = $resultat->fetchAll(PDO::FETCH_ASSOC);
?>
    
    <h1 class="my-5 text-center">Latest Songs!</h1>

    
<div class="container">
    <div class="row d-flex justify-content-between bg-dark p-3">
        <?php foreach($artists as $a): ?>
            <div class="col-4">
            <div class="card mb-3 rounded">
                <h3 class="card-header"><?= $a['artist']; ?></h3>
                <div class="card-body">
                    <h5 class="card-title"><?= $a['song']; ?></h5>
                </div>
                    <img src="<?= $a['image']; ?>" alt="">
                <div class="card-footer text-muted">
                    <p><?= $a['date']; ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once('include/footer.php'); ?>




