<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
session_start();
if (isset($_SESSION["user"])) : ?>

<?php if (isset($teams)): ?>
    <?php foreach ($teams as $team): ?>
    <div class="card" style="width: 18rem;">
        <a href="/bizkod/schedule/<?php echo $team->id; ?>" class="teamSchedule">
            <img src="<?php echo URLROOT . 'public/img/teams/' . $team->slika; ?>" class="card-img-top" alt="<?php echo $team->slika; ?>">
            <div class="card-body">
                <h5 class="card-title"><?php echo $team->naziv; ?></h5>
            </div>
        </a>
    </div>
    <?php endforeach; ?>
<?php endif; ?>


<?php else: ?>
    <?php
        header('Location: /bizkod/');
    ?>
<?php endif;  ?>
</body>
</html>