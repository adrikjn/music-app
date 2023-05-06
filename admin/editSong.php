<?php require_once('../include/header.php'); ?>
<?php
// ! Pas compris la partie ou l'on crée :  $id = $_GET['id'];  $artist = $_POST; 'id_artist' => $artist['id_artist'] <input type="hidden" name="id_artist" value="<?= $id ?? ""; 
// ! $_SESSION
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $request = "SELECT * FROM artist WHERE id_artist = :id_artist";
    $resultat = $pdo->prepare($request);
    $resultat->execute(['id_artist' => $_GET['id']]);
    $artist = $resultat->fetch(PDO::FETCH_ASSOC);
}

if (!empty($_POST)) {
    $error = [];

    foreach ($_POST as $indice => $input) {
        if (empty($input)) {
            if($indice == 'image'){
                $image = $_POST['old_img'];
            }else {
                $error[$indice] = 'le champ ' . $indice . ' est obligatoire';
            }
        }
    }

    $artist = $_POST;

    if (!$error) {
        $request = "UPDATE artist SET artist = :artist, image = :image, song = :song, genre = :genre, lyrics = :lyrics WHERE id_artist = :id_artist";

        if(!empty($_POST['image'])){
            $image = $_POST['image'];
        }

        $data = [
            'artist' => $_POST['artist'],
            'image' => $image,
            'song' => $_POST['song'],
            'genre' => $_POST['genre'],
            'lyrics' => $_POST['lyrics'],
            'id_artist' => $artist['id_artist']
        ];
        $resultat = $pdo->prepare($request);
        $resultat->execute($data);
        header('Location: adminSongs.php');
        exit();
    }
}
?>

<h1 class="text-center my-5">Edit informations from the songs</h1>

<div class="container mt-3 border border-gray bg-light rounded shadow">
    <form method="post" class="p-3 text-center">
        <input type="hidden" name="old_img" value="<?= $artist['image'] ?? ""; ?>">
        <input type="hidden" name="id_artist" value="<?= $id ?? ""; ?>">
        <div class="form-group p-1">
            <label for="artist" class="form-label">Artist name :</label>
            <small class="text-danger fw-bold fs-6"><?= '*' . ($error['artist'] ?? ''); ?></small>
            <input type="text" class="form-control" id="artist" aria-describedby="text" placeholder="The name of the artist" name="artist" value="<?= $artist['artist'] ?? ''; ?>">
        </div>
        <hr>
        <div class="form-group p-1">
            <label for="image" class="form-label">Upload artist image :</label>
            <small class="text-danger fw-bold fs-6"><?= '*' . ($error['image'] ?? ''); ?></small>
            <input type="file" class="form-control" id="image" name="image" value="<?= $artist['image'] ?? ''; ?>">
        </div>
        <hr>

        <div class="form-group p-1">
            <label for="song" class="form-label">Song name :</label>
            <small class="text-danger fw-bold fs-6"><?= '*' . ($error['song'] ?? ''); ?></small>
            <input type="text" class="form-control" id="song" aria-describedby="text" placeholder="The name of the song" name="song" value="<?= $artist['song'] ?? ''; ?>">
        </div>
        <hr>

        <div class="form-group p-1">
            <label for="genre" class="form-label">Genre of music :</label>
            <small class="text-danger fw-bold fs-6"><?= '*' . ($error['genre'] ?? ''); ?></small>
            <select class="form-select" name="genre" id="genre">
                <option class="text-center" value="">---Select a genre---</option>
                <option <?= (isset($artist['genre']) && $artist['genre'] == 'Rock' ? "selected" : ""); ?> value="Rock">Rock</option>
                <option <?= (isset($artist['genre']) && $artist['genre'] == 'Pop' ? "selected" : ""); ?> value="Pop">Pop</option>
                <option <?= (isset($artist['genre']) && $artist['genre'] == 'Hip-Hop' ? "selected" : ""); ?> value="Hip-Hop">Hip-Hop</option>
                <option <?= (isset($artist['genre']) && $artist['genre'] == 'Electronic' ? "selected" : ""); ?> value="Electronic">Electronic</option>
                <option <?= (isset($artist['genre']) && $artist['genre'] == 'R&B' ? "selected" : ""); ?> value="R&B">R&B</option>
                <option <?= (isset($artist['genre']) && $artist['genre'] == 'Country' ? "selected" : ""); ?> value="Country">Country</option>
                <option <?= (isset($artist['genre']) && $artist['genre'] == 'Jazz' ? "selected" : ""); ?> value="Jazz">Jazz</option>
                <option <?= (isset($artist['genre']) && $artist['genre'] == 'Blues' ? "selected" : ""); ?> value="Blues">Blues</option>
                <option <?= (isset($artist['genre']) && $artist['genre'] == 'Classical' ? "selected" : ""); ?> value="Classical">Classical</option>
                <option <?= (isset($artist['genre']) && $artist['genre'] == 'Reggae' ? "selected" : ""); ?> value="Reggae">Reggae</option>
                <option <?= (isset($artist['genre']) && $artist['genre'] == 'World Music' ? "selected" : ""); ?> value="World Music">World Music</option>
                <option <?= (isset($artist['genre']) && $artist['genre'] == 'Folk' ? "selected" : ""); ?> value="Folk">Folk</option>
                <option <?= (isset($artist['genre']) && $artist['genre'] == 'Indie' ? "selected" : ""); ?> value="Indie">Indie</option>
                <option <?= (isset($artist['genre']) && $artist['genre'] == 'Metal' ? "selected" : ""); ?> value="Metal">Metal</option>
                <option <?= (isset($artist['genre']) && $artist['genre'] == 'Punk' ? "selected" : ""); ?> value="Punk">Punk</option>
                <option <?= (isset($artist['genre']) && $artist['genre'] == 'Funk' ? "selected" : ""); ?> value="Funk">Funk</option>
                <option <?= (isset($artist['genre']) && $artist['genre'] == 'Gospel' ? "selected" : ""); ?> value="Gospel">Gospel</option>
                <option <?= (isset($artist['genre']) && $artist['genre'] == 'Latin' ? "selected" : ""); ?> value="Latin">Latin</option>
                <option <?= (isset($artist['genre']) && $artist['genre'] == 'New Age' ? "selected" : ""); ?> value="New Age">New Age</option>
            </select>
        </div>

        <hr>
        <div class="form-group p-1">
            <label for="lyrics" class="form-label">Lyrics :</label>
            <small class="text-danger fw-bold fs-6"><?= '*' . ($error['lyrics'] ?? ''); ?></small>
            <textarea class="form-control" id="lyrics" name="lyrics" rows="6" placeholder="Enter the lyrics of the song" style="resize:none;"><?= $artist['lyrics'] ?? '' ?></textarea>
        </div>
        <hr>

        <button type="submit" class="btn btn-primary my-3 text-center">Edit the song</button>

    </form>
</div>

<?php require_once('../include/footer.php'); ?>