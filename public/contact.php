<?php require_once('../include/header.php'); ?>

<?php
if (!empty($_POST)) {
    $error = [];
    if (empty($_POST['fullname'])) {
        $error['fullname'] = "Your name is required";
    }
    if (empty($_POST['email'])) {
        $error['email'] = "Your email is required";
    }
    if (empty($_POST['message'])) {
        $error['message'] = "Your message is required";
    }
    if (!$error) {
        $request = "INSERT INTO contact(date_post, name, email,message) VALUES(NOW(),:name, :email, :message)";
        $data = [
            ':name' => $_POST['fullname'],
            ':email' => $_POST['email'],
            ':message' => $_POST['message']
        ];
        $result = $pdo->prepare($request);
        $result->execute($data);

        $_SESSION['messages']['success'][] = 'The comment has been sent correctly';
        header("Location: ../index.php");
    }
}


?>

<h1 class="text-center my-5">Contact us</h1>

<div class="container">
    <form method="post" class="text-center">
        <div class="form-group w-50 mx-auto">
            <label for="fullname" class="form-label mt-4">Full name :</label>
            <small class="text-danger fw-bold fs-6"><?= '*' . ($error['fullname'] ?? ''); ?></small>
            <input type="text" class="form-control" id="fullname" aria-describedby="emailHelp" placeholder="LASTNAME Firstname" name="fullname" value="<?= $_POST['fullname'] ?? ''; ?>">


        </div>
        <div class="form-group w-50 mx-auto">
            <label for="email" class="form-label mt-4">Email address : </label>
            <small class="text-danger fw-bold fs-6"><?= '*' . ($error['email'] ?? ''); ?></small>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="<?= $_POST['email'] ?? ''; ?>">
            <small id="emailHelp" class="form-text text-warning">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group w-50 mx-auto my-3 mt-4">
            <label for="message" class="form-label ">Your message : </label>
            <small class="text-danger fw-bold fs-6"><?= '*' . ($error['message'] ?? ''); ?></small>
            <textarea class="form-control" id="message" rows="5" data-lt-tmp-id="lt-982246" spellcheck="false" data-gramm="false" style="resize:none;" placeholder="Tell us your needs" name="message"><?= $_POST['message'] ?? ''; ?></textarea>
        </div>

        <div>
            <button type="submit" class="btn btn-primary my-3">Submit</button>
        </div>
    </form>
</div>


<?php require_once('../include/footer.php'); ?>