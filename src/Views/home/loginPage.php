<?php
session_start();
if (isset($_SESSION["user"])){
    session_destroy();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Infostud Grupa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
          crossorigin="anonymous">
    <link rel="shortcut icon" type="image/png" href="<?= URLROOT."public/img/logo.png" ?>"/>
    <link rel="stylesheet" href="<?= URLROOT."public/css/main.css" ?>">
</head>
<body style="background-image: url('<?= URLROOT."public/img/bg2.jpg" ?>')">
<div class="container-fluid d-flex flex-column align-items-center login vh-100">
    <img class="img-fluid mb-3" src='<?= URLROOT."public/img/infostud.png" ?>' alt="Infostud Header">
    <form id="loginForm" action="">
        <input type="text" name="email" id="email" class="form-control" aria-describedby="emailHelp" placeholder="Email adresa">
        <p id="emailMessage" class="text-danger"></p>
        <input type="password" class="form-control"  name="password" id="password" placeholder="Lozinka">
        <p id="passwordMessage" class="text-danger"></p>
        <button type="submit" class="btn btn-primary">Uloguj se</button>
    </form>
</div>

</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script type="module" src="<?php echo URLROOT; ?>/public/js/scripts/homeApp.js"></script>
</html>