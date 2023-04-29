<?php require_once('../include/header.php'); ?>

<h1 class="my-5 text-center">Add a song</h1>

<div class="container mt-3 border border-gray bg-light rounded shadow">
    <form method="post" class="p-3 text-center">
        <div class="form-group p-1">
            <label for="artist" class="form-label">Artist name :</label>
            <input type="text" class="form-control" id="artist" aria-describedby="text" placeholder="The name of the artist" name="artist">
        </div>
        <hr>
        <div class="form-group p-1">
            <label for="image" class="form-label">Upload artist image :</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <hr>

        <div class="form-group p-1">
            <label for="song" class="form-label">Song name :</label>
            <input type="text" class="form-control" id="song" aria-describedby="text" placeholder="The name of the song" name="song">
        </div>
        <hr>

        <div class="form-group p-1">
            <label for="genre" class="form-label">Genre of music :</label>
            <select class="form-select" name="genre" id="genre">
                <option value="Rock">Rock</option>
                <option value="Pop">Pop</option>
                <option value="Hip-Hop">Hip-Hop</option>
                <option value="Electronic">Electronic</option>
                <option value="R&B">R&B</option>
                <option value="Country">Country</option>
                <option value="Jazz">Jazz</option>
                <option value="Blues">Blues</option>
                <option value="Classical">Classical</option>
                <option value="Reggae">Reggae</option>
                <option value="World Music">World Music</option>
                <option value="Folk">Folk</option>
                <option value="Indie">Indie</option>
                <option value="Metal">Metal</option>
                <option value="Punk">Punk</option>
                <option value="Funk">Funk</option>
                <option value="Gospel">Gospel</option>
                <option value="Latin">Latin</option>
                <option value="New Age">New Age</option>
            </select>
        </div>

        <hr>
        <div class="form-group p-1">
            <label for="lyrics" class="form-label">Lyrics :</label>
            <textarea class="form-control" id="lyrics" name="lyrics" rows="6" placeholder="Enter the lyrics of the song" style="resize:none;"></textarea>
        </div>
        <hr>

        <button type="submit" class="btn btn-primary text-center">Submit</button>

    </form>
</div>









<?php require_once('../include/footer.php'); ?>