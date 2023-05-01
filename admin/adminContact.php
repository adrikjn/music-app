<?php require_once('../include/header.php'); ?>
<?php
$request = 'SELECT * FROM contact';
$resultat = $pdo->prepare($request);
$resultat->execute();

$messages = $resultat->fetchAll(PDO::FETCH_ASSOC);
?>
<h1 class="text-center my-5">Processing Messages</h1>

<div class="container">
    <table class="table table-hover">
        <thead>
            <tr class="table-primary text-center">
                <th scope="row">Message number</th>
                <th scope="row">sent when</th>
                <th scope="row">username</th>
                <th scope="row">email</th>
                <th scope="row">message</th>
                <th scope="row">delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($messages as $message) : ?>
                <tr class="text-center">
                    <th><?= $message['id_contact']; ?></th>
                    <td><?= $message['date_post']; ?></td>
                    <td><?= $message['name']; ?></td>
                    <td><?= $message['email']; ?></td>
                    <td><?= $message['message']; ?></td>
                    <td><a href="deleteMessage.php?id=<?= $message['id_contact']; ?>"><i class="fa-sharp fa-solid fa-xmark text-danger"></i></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php require_once('../include/footer.php'); ?>