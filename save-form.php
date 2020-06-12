<?php
require 'connection.php';


$name = mysqli_real_escape_string($mysqli, $_REQUEST['name']);
$description = mysqli_real_escape_string($mysqli, $_REQUEST['description']);
$flavor = mysqli_real_escape_string($mysqli, $_REQUEST['flavor']);
$price = mysqli_real_escape_string($mysqli, $_REQUEST['price']);

$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$imageURL = 'https://tund.tak17nurmberg.itmajakas.ee/upload/' . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

if (isset($_POST['submit']) && isset($_FILES['image'])) {
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    $sql = "INSERT INTO snus(name, description, image, flavor, price) VALUES ('$name', '$description', '$imageURL', '$flavor', '$price')";
}

if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["image"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

if (mysqli_query($mysqli, $sql)) {
    $referer = $_SERVER['HTTP_REFERER'];
    header("Location: $referer");
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($mysqli);
}

// Close connection
mysqli_close($mysqli);