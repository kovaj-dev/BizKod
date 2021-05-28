<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Moj tim</title>
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
    <div class="container-fluid d-flex flex-column justify-content-center align-items-center">
        <h1 class="page-title">Moj tim</h1>
        <?php if (isset($team)): ?>
        <?php foreach ($team as $member): ?>
                <div class="card mb-3 w-100" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-3">
                            <img src="<?php echo URLROOT . '/public/img/workers/' . $member->slika; ?>"
                                 alt="<?php $member->slika . $member->ime . $member->prezime; ?>"
                                 style="width: 6rem;">
                        </div>
                        <div class="col-9 d-flex justify-content-center align-items-center">
                            <div class="card-body">
                                <h5 class="card-title text-center"><?php echo $member->ime . ' ' . $member->prezime; ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
        <?php endforeach; ?>
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
</html>