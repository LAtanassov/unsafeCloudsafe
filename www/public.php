<?php include 'templates/header.php'; ?>

<?php
session_start();
if (!$_SESSION['username']) {
    header("location: index.php");
}
?>

<?php include 'templates/navigation.php'; ?>

    <div class="container">
        <h3>public data</h3>
        <div class="table-responsive">
            <table class="table">
                <tr>
                    <th>#</th>
                    <th>user</th>
                    <th>file name</th>
                    <th>keyword</th>
                    <th>type</th>
                    <th>size</th>
                    <th>download</th>
                </tr>
                <?php
                mysql_connect("localhost", "root", "root") or die (mysql_error());
                mysql_select_db("cloud") or die ("Cannot connect to database");

                $result = mysql_query("SELECT * FROM data JOIN user ON data.fuid = user.uid WHERE ispublic =1");

                while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
                    echo '<tr>' .
                            '<td>' . $row["did"] . '</td>' .
                            '<td>' . $row["username"] . '</td>' .
                            '<td>' . $row["name"] . '</td>' .
                            '<td>' . $row["keyword"] . '</td>' .
                            '<td>' . $row["type"] . '</td>' .
                            '<td>' . $row["size"] . ' B</td>' .
                            '<td><a class="btn btn-default" href="download.php?file_id=' . $row["did"] . '"><span class="glyphicon glyphicon-save" aria-hidden="true"></a></td>' .
                        '</tr>';
                }


                ?>
            </table>
        </div>

    </div>

<?php include 'templates/footer.php'; ?>