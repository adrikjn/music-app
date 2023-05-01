<?php 
require_once('../include/settings.php');
if(isset($_GET['id'])){
    $request = "DELETE FROM artist WHERE id_artist = :id_artist";
    $resultat = $pdo->prepare($request);
    $resultat->execute(['id_artist' => $_GET['id']]);

    $_SESSION["messages"]['danger'][] = 'The song has been removed';
    header('Location: adminSongs.php');
    exit();
}


?>