<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
          crossorigin="anonymous">
</head>
<body>
<div class="container-fluid d-flex justify-content-center align-items-center vh-100">
    <form id="loginForm" action="" class="w-50">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="text" name="email" id="email" class="form-control" aria-describedby="emailHelp" placeholder="enter your email">
        </div>
        <p id="emailMessage" class="text-danger"></p>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control"  name="password" id="password" placeholder="enter your password">
        </div>
        <p id="passwordMessage" class="text-danger"></p>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script type="module" src="<?php echo URLROOT; ?>/public/js/scripts/homeApp.js"></script>
</html>