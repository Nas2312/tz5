<?php
session_start();

function require_login() {
    if (!isset($_SESSION['user_id'])) {
        header('Location: login.php');
        exit;
    }
}

function require_logout() {
    if (isset($_SESSION['user_id'])) {
        header('Location: index.php');
        exit;
    }
}
