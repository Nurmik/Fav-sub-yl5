<?php
require 'connection.php';

$image = mysqli_real_escape_string($mysqli, $_POST['image']);
$name = mysqli_real_escape_string($mysqli, $_POST['name']);
$description = mysqli_real_escape_string($mysqli, $_POST['description']);
$topic1 = mysqli_real_escape_string($mysqli, $_POST['topic1']);
$topic2 = mysqli_real_escape_string($mysqli, $_POST['topic2']);

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Snus</title>
</head>
<body>
<div class="container">
    <div align="right">
        <a href="https://tund.tak17nurmberg.itmajakas.ee/">API</a>
        <a>│</a>
        <a href="https://tund.tak17nurmberg.itmajakas.ee/form.php">Form</a>
    </div>
    <div class="col-8" align="centre">
        <div class="card" style="align-content: center">
            <img src="<?php echo $image ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?php echo 'Name : ' . $name . '<br>'; ?></h5>
                <p class="card-text"><?php echo 'Description : ' . $description . '<br>'; ?></p>
                <p class="card-text"><?php echo 'Topic 1 : ' . $topic1 . '<br>'; ?></p>
                <p class="card-text"><?php echo 'Topic 2 : ' . $topic2 . '<br>'; ?></p>
            </div>
        </div>
        <br>
        </form>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>
