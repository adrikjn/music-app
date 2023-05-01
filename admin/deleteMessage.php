<?php 
require_once('../include/settings.php');
if(isset($_GET['id'])){
    $request = "DELETE FROM contact WHERE id_contact = :id_contact";
    $resultat = $pdo->prepare($request);
    $resultat->execute(['id_contact' => $_GET['id']]);

    $_SESSION["messages"]['danger'][] = 'The message has been removed';
    header('Location: adminContact.php');
    exit();
}
?>

