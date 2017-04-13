<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] <= 0) {
    exit('<h1 class="text-center">You are not allowed, please <a href="./Login.php">login</a></h1>');
}
