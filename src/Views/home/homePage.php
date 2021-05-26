<?php
session_start();
if (isset($_SESSION["user"])){
    echo "pozdrav " . $_SESSION["user"]["email"];
}
