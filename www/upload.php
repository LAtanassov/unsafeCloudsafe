<?php include 'templates/header.php'; ?>

<?php
session_start();
if (!$_SESSION['username']) { // forward to home if user is logged in
    header("location: index.php");
}
if ($_GET['msg'] == 'upload_failed') { ?>
    <script>alert("upload failed. please try again.");</script>
<?php } elseif ($_GET['msg'] == 'upload_success') {  ?>
    <script>alert("upload successful.");</script>
<?php } ?>

<?php include 'templates/navigation.php'; ?>

    <div class="container">
        <div class="col-md-offset-4 col-md-4">
            <h2>upload</h2>
            <form action="be_upload.php" method="POST" enctype="multipart/form-data" class="form-horizontal">
                <div class="form-group">
                    <label for="keyword" class="col-sm-2 control-label">keyword</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="keyword" name="keyword" placeholder="keyword">
                    </div>
                </div>
                <div class="form-group">
                    <label for="file" class="col-sm-2 control-label">file</label>
                    <div class="col-sm-10">
                        <input type="file" id="file" name="file">
                    </div>
                </div>
                <div class="form-group">
                    <label for="public" class="col-sm-2 control-label">public</label>
                    <div class="col-sm-10">
                        <input type="checkbox" id="public" name="public">
                    </div>
                </div>
                <button type="submit" class="btn btn-default">upload</button>

            </form>

        </div>
    </div>

<?php include 'templates/footer.php'; ?>