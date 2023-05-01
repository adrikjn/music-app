<?php require_once('../include/header.php'); ?>
<?php
$request = "SELECT * FROM artist";
$resultat = $pdo->prepare($request);
$resultat->execute();

$artist = $resultat->fetchAll(PDO::FETCH_ASSOC);
?>
<h1 class="text-center my-5">Database Songs Management</h1>
<div class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Artist Name</th>
                <th scope="col">Image</th>
                <th scope="col">Song</th>
                <th scope="col">Genre</th>
                <th scope="col">Date</th>
                <th scope="col">Lyrics</th>
                <th scope="col">Options</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($artist as $a) : ?>
                <tr>
                    <td><?= $a['id_artist']; ?></td>
                    <td><?= $a['artist']; ?></td>
                    <td><?= $a['image']; ?></td>
                    <td><?= $a['song']; ?></td>
                    <td><?= $a['genre']; ?></td>
                    <td><?= $a['date']; ?></td>
                    <td><?= $a['lyrics']; ?></td>
                    <td>
                        <a href="infoSong.php?id=<?= $a['id_artist']; ?>"><i class="fa-solid fa-eye text-info"></i></a>
                        <a href="editSong.php?id=<?= $a['id_artist']; ?>"><i class="fa-solid fa-pen-to-square text-success"></i></a>
                        <a href="deleteSong.php?id=<?= $a['id_artist']; ?>"><i class="fa-solid fa-trash text-danger"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>



<?php require_once('../include/footer.php'); ?>