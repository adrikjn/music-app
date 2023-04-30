<?php require_once('../include/header.php'); ?>
<?php 
    if(!empty($_POST)){
        $error = [];
        if(empty($_POST['artist'])){
            $error['artist'] = 'Artist name is required';
        }
        if(empty($_POST['image'])){
            $error['image'] = 'Artist image is required';
        }
        if(empty($_POST['song'])){
            $error['song'] = 'Song name is required';
        }
        if(empty($_POST['genre'])){
            $error['genre'] = 'Music genre is required';
        }
        if(empty($_POST['lyrics'])){
            $error['lyrics'] = 'Lyrics are required';
        }
        if(!$error){
            $request = "INSERT INTO artist (artist, image, song, genre,date, lyrics) VALUES(:artist, :image, :song, :genre, NOW(), :lyrics)";
            $data = [
                ':artist' => $_POST['artist'],
                ':image' => $_POST['image'],
                ':song' => $_POST['song'],
                ':genre' => $_POST['genre'],
                ':lyrics' => $_POST['lyrics']
            ];
            $result = $pdo->prepare($request);
            $result->execute($data);

            $_SESSION['messages']['success'][] = 'The song has been added';
            header('Location: adminSongs.php');
            exit();
        }
    }

?>


<h1 class="my-5 text-center">Add a song</h1>

<div class="container mt-3 border border-gray bg-light rounded shadow">
    <form method="post" class="p-3 text-center">
        <div class="form-group p-1">
            <label for="artist" class="form-label">Artist name :</label>
            <small class="text-danger fw-bold fs-6"><?='*' . ($error['artist'] ?? ''); ?></small>
            <input type="text" class="form-control" id="artist" aria-describedby="text" placeholder="The name of the artist" name="artist" value="<?= $_POST['artist'] ?? ''; ?>">
        </div>
        <hr>
        <div class="form-group p-1">
            <label for="image" class="form-label">Upload artist image :</label>
            <small class="text-danger fw-bold fs-6"><?= '*' . ($error['image'] ?? ''); ?></small>
            <input type="file" class="form-control" id="image" name="image" value="<?= $_POST['image'] ?? ''; ?>">
        </div>
        <hr>

        <div class="form-group p-1">
            <label for="song" class="form-label">Song name :</label>
            <small class="text-danger fw-bold fs-6"><?= '*' . ($error['song'] ?? ''); ?></small>
            <input type="text" class="form-control" id="song" aria-describedby="text" placeholder="The name of the song" name="song" value="<?= $_POST['song'] ?? ''; ?>">
        </div>
        <hr>

        <div class="form-group p-1">
            <label for="genre" class="form-label">Genre of music :</label>
            <small class="text-danger fw-bold fs-6"><?= '*' . ($error['genre'] ?? ''); ?></small>
            <select class="form-select" name="genre" id="genre">
                <option class="text-center" value="">---Select a genre---</option>
                <option <?= (isset($_POST['genre']) && $_POST['genre'] == 'Rock' ? "selected" : ""); ?> value="Rock">Rock</option>
                <option <?= (isset($_POST['genre']) && $_POST['genre'] == 'Pop' ? "selected" : ""); ?> value="Pop">Pop</option>
                <option <?= (isset($_POST['genre']) && $_POST['genre'] == 'Hip-Hop' ? "selected" : ""); ?> value="Hip-Hop">Hip-Hop</option>
                <option <?= (isset($_POST['genre']) && $_POST['genre'] == 'Electronic' ? "selected" : ""); ?> value="Electronic">Electronic</option>
                <option <?= (isset($_POST['genre']) && $_POST['genre'] == 'R&B' ? "selected" : ""); ?> value="R&B">R&B</option>
                <option <?= (isset($_POST['genre']) && $_POST['genre'] == 'Country' ? "selected" : ""); ?> value="Country">Country</option>
                <option <?= (isset($_POST['genre']) && $_POST['genre'] == 'Jazz' ? "selected" : ""); ?> value="Jazz">Jazz</option>
                <option <?= (isset($_POST['genre']) && $_POST['genre'] == 'Blues' ? "selected" : ""); ?> value="Blues">Blues</option>
                <option <?= (isset($_POST['genre']) && $_POST['genre'] == 'Classical' ? "selected" : ""); ?> value="Classical">Classical</option>
                <option <?= (isset($_POST['genre']) && $_POST['genre'] == 'Reggae' ? "selected" : ""); ?> value="Reggae">Reggae</option>
                <option <?= (isset($_POST['genre']) && $_POST['genre'] == 'World Music' ? "selected" : ""); ?> value="World Music">World Music</option>
                <option <?= (isset($_POST['genre']) && $_POST['genre'] == 'Folk' ? "selected" : ""); ?> value="Folk">Folk</option>
                <option <?= (isset($_POST['genre']) && $_POST['genre'] == 'Indie' ? "selected" : ""); ?> value="Indie">Indie</option>
                <option <?= (isset($_POST['genre']) && $_POST['genre'] == 'Metal' ? "selected" : ""); ?> value="Metal">Metal</option>
                <option <?= (isset($_POST['genre']) && $_POST['genre'] == 'Punk' ? "selected" : ""); ?> value="Punk">Punk</option>
                <option <?= (isset($_POST['genre']) && $_POST['genre'] == 'Funk' ? "selected" : ""); ?> value="Funk">Funk</option>
                <option <?= (isset($_POST['genre']) && $_POST['genre'] == 'Gospel' ? "selected" : ""); ?> value="Gospel">Gospel</option>
                <option <?= (isset($_POST['genre']) && $_POST['genre'] == 'Latin' ? "selected" : ""); ?> value="Latin">Latin</option>
                <option <?= (isset($_POST['genre']) && $_POST['genre'] == 'New Age' ? "selected" : ""); ?> value="New Age">New Age</option>
            </select>
        </div>

        <hr>
        <div class="form-group p-1">
            <label for="lyrics" class="form-label">Lyrics :</label>
            <small class="text-danger fw-bold fs-6"><?='*' .($error['lyrics'] ?? ''); ?></small>
            <textarea class="form-control" id="lyrics" name="lyrics" rows="6" placeholder="Enter the lyrics of the song" style="resize:none;"><?= $_POST['lyrics'] ?? '' ?></textarea>
        </div>
        <hr>

        <button type="submit" class="btn btn-primary my-3 text-center">Add a Song</button>

    </form>
</div>


<?php require_once('../include/footer.php'); ?>