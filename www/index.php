<?php
session_start();
if ($_SESSION['user']) { // forward to home if user is logged in
    header("location: upload.php");
} else {
    header("location: login.php");
}
?>