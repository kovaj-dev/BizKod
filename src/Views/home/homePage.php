<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Infostud</title>
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
session_start();
if (isset($_SESSION["user"])) : ?>
<div class="container-fluid d-flex flex-column">
<?php if (isset($teams)): ?>
        <h1 class="page-title">Rasporedi Infostud Timova</h1>
    <div class="container d-flex flex-row flex-wrap justify-content-center teams mb-5">
    <?php foreach ($teams as $team): ?>
    <div class="card m-2">
        <a href="">
            <img src="<?php echo URLROOT . 'public/img/teams/' . $team->slika; ?>" class="card-img-top" alt="<?php echo $team->slika; ?>">
            <div class="card-body">
                <h5 class="card-title text-dark"><?php echo $team->naziv; ?></h5>
            </div>
        </a>
    </div>
    <?php endforeach; ?>
    </div>
<?php endif; ?>
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
</html>