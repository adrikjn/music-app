<?php require_once('../include/header.php'); ?>
<?php

if (!empty($_POST)) {

    $_POST['name'] = htmlspecialchars($_POST['name']);
    $_POST['message'] = htmlspecialchars($_POST['message']);

    $resultat = $pdo->prepare("INSERT INTO blog(name,date_posting,message) VALUES(:name, NOW(), :message)");
    $data = [
        ':name' => $_POST['name'],
        ':message' => $_POST['message']
    ];
    $resultat->execute($data);
}




?>

<h1 class="text-center my-5">BLOG</h1>
<div class="container">
    <form method="post" class="text-center border border-primary w-50 mx-auto shadow p-3">
        <div><label for="name">Your name :</label></div>
        <div><input type="text" id="name" name="name" class="mb-3"></div>

        <div>
            <label for="message">Your message :</label>
        </div>
        <div>
            <textarea name="message" id="message" style="resize:none;"></textarea>
        </div>

        <div><input type="submit" class="my-3"></div>

    </form>
</div>

<?php
$resultat = $pdo->query("SELECT name, message, DATE_FORMAT(date_posting, '%d/%m/%Y') AS datefr, DATE_FORMAT(date_posting, '%H-%i-%s') AS heurefr FROM blog ORDER BY date_posting DESC");
$messages = $resultat->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="container my-5">
    <h2><?= $resultat->rowCount() . " commentaires"; ?></h2>;
    <div>
        <?php foreach ($messages as $message) : ?>
            <h2><?= 'By ' . $message['name']; ?></h2>
            <p><?= $message['message']; ?></p>
            <p><?= 'Sent at ' . $message['heurefr'] . ' the ' . $message['datefr']; ?></p>
            <hr>
        <?php endforeach; ?>
    </div>
</div>

<?php require_once('../include/footer.php'); ?>