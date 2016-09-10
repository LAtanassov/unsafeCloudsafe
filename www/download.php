<?php

if (isset($_GET['file_id'])) {

    $id = intval($_GET['file_id']);
    mysql_connect("localhost", "root", "root") or die (mysql_error());
    mysql_select_db("cloud") or die ("Cannot connect to database");

    $query = "SELECT * FROM data WHERE did = $id";
    $result = mysql_query($query);

    if ($result) {

        $row = mysql_fetch_assoc($result);

        $type = $row['type'];
        $size = $row['size'];
        $name = $row['name'];
        $data = $row['content'];

        header("Content-Type: $type");
        header("Content-Length: $size");
        header("Content-Disposition: attachment; filename=\"$name\"");
        echo $data;

        // Free the mysqli resources
        mysql_free_result($result);
    } else {
        echo "Error! Query failed";
    }

} else {
    echo 'Error! No ID was passed.';
}


?>