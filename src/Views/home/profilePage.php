<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
          crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="<?= URLROOT."public/img/logo.png" ?>"/>
    <link rel="stylesheet" href="<?= URLROOT."public/css/main.css" ?>">
</head>
<body style="background-color: #F0F0F0">

<header id="header">
    <?php require_once ROOT . "/Views/includes/navbar.php"; ?>
</header>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION["user"])) : ?>

    <div class="container d-flex flex-column align-items-center profile mb-5">
        <h1 class="page-title">Tvoj profil</h1>
        <?php if (isset($userInfo)): ?>
        <div class="profile-image mb-4">
            <img src="<?php echo URLROOT . '/public/img/workers/' . $userInfo->fotografija; ?>" alt="Tvoja profilna slika">
        </div>
        <div class="profile-data">
            <span class="info-title">Email:</span> <span class="info-data"><?php echo $userInfo->email; ?></span> <br>
            <span class="info-title">Ime i prezime:</span> <span class="info-data"><?php echo $userInfo->ime . ' ' . $userInfo->prezime; ?></span> <br>
            <span class="info-title">Kancelarija:</span> <span class="info-data"><?php echo $userInfo->kancelarija . ', ' . $userInfo->grad; ?></span> <br>
            <span class="info-title">Tim:</span> <span class="info-data"><?php echo $userInfo->tim; ?></span> <br>
        </div>
        <?php endif; ?>
        <div class="drop-form accordion mt-4" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left text-light w-100" type="submit" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            PROMENI LOZINKU
                        </button>
                    </h2>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                    <div class="card-body">
                        <form id="passwordForm" action="">
                            <input type="password" class="form-control mb-3" name="oldpass" id="oldpass" placeholder="Trenutna lozinka">
                            <p id="oldMessage" style="color: red; font-weight: bold;"></p>
                            <input type="password" class="form-control mb-3" name="newpass" id="newpass" placeholder="Nova lozinka">
                            <p id="newMessage" style="color: red; font-weight: bold;"></p>
                            <input type="password" class="form-control mb-3" name="confirmpass" id="confirmpass" placeholder="Potvrdi novu lozinku">
                            <p id="confirmMessage" style="color: red; font-weight: bold;"></p>
                            <button type="submit" class="btn btn-primary save">Sačuvaj</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php else: ?>
    <?php
    header('Location: /bizkod/');
    ?>
<?php endif;  ?>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script type="module" src="<?php echo URLROOT; ?>/public/js/scripts/profileApp.js"></script>
</html>