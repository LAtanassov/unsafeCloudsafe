<?php

session_start();

if (!$_SESSION['username']) {
    header("location: index.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_FILES['file']['size'] > 0) {
    $uid = $_SESSION['uid'];
    $fileName = $_FILES['file']['name'];
    $tmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileType = $_FILES['file']['type'];
    $isPublic = $_POST['public'] == 'on' ? true : false;

    $fp = fopen($tmpName, 'r');
    $content = fread($fp, filesize($tmpName));
    $content = addslashes($content);
    fclose($fp);

    if (!get_magic_quotes_gpc()) {
        $fileName = addslashes($fileName);
    }

    mysql_connect("localhost", "root", "root") or die (mysql_error());
    mysql_select_db("cloud") or die ("Cannot connect to database");

    $query = "INSERT INTO data (fuid, name, ispublic, type, size, content ) " .
        "VALUES ('$uid', '$fileName', '$isPublic','$fileType', '$fileSize', '$content')";

    $result = mysql_query($query);

    if ($result) {
        header("location: upload.php?msg=upload_success");

    } else {
        header("location: upload.php?msg=upload_failed");

    }

}

?>