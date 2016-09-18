<?php
session_start();
if ($_SESSION['username']) {
    header("location: upload.php");
} else {

    header("location: login.php");
}
?>