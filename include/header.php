<?php require_once('settings.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.2.3/lux/bootstrap.min.css" integrity="sha512-+TCHrZDlJaieLxYGAxpR5QgMae/jFXNkrc6sxxYsIVuo/28nknKtf9Qv+J2PqqPXj0vtZo9AKW/SMWXe8i/o6w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Musico</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Musico</a>
            <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= BASE; ?>">Latest songs
                            <!-- Selectionner seulement 3 WHERE la date DESC LIMIT 3 -->
                            <span class="visually-hidden">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= BASE . 'public/catalogue.php'; ?>">Catalogue</a>
                        <!-- Step 1 : apparaitre la liste ici -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Subscribe</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?= BASE . "public/blog.php"; ?>">Blog</a>
                            <!-- voir exo blog -->
                            <a class="dropdown-item" href="<?= BASE . "public/contact.php"; ?>">Contact</a>
                            <!-- FOrmulaire de contact -->
                            <a class="dropdown-item" href="#">About us</a>
                            <!-- 0 php -->
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Subscribe</a>
                            <!-- redirection subscribe generer php -->
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Admin</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?= BASE . "admin/addSong.php"; ?>">Add a Song</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?= BASE . "admin/adminSongs.php"; ?>">Database Action</a>
                        </div>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-sm-2" type="search" placeholder="Search">
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
  <?php 
    if(isset($_SESSION['messages']))
    {
      foreach($_SESSION['messages'] as $type => $messages)
      {
        foreach($messages as $message)
        {
        ?>
          <div class="w-50 text-center mx-auto rounded alert alert-<?= $type; ?>"><?= $message; ?></div>

        <?php  
        }
      }
      unset($_SESSION['messages']);
    }

  ?>


</div>
</body>

</html>