<?php

$image = $_FILES["image"];





// валидация
$types = ["image/jpeg", "image/png"];

if (!in_array($image["type"], $types)) {
    die('Incorrect file type');
}

$fileSize = $image["size"] / 1000000;
$maxSize =1; //mb

if ($fileSize > $maxSize) {
    ie('Incorrect file size');
}

if (!is_dir('../uploads')) {
    mkdir('../uploads', 0777, true);
}

$extension = pathinfo($image["name"], PATHINFO_EXTENSION);

$filesName = time() . ".$extension";

move_uploaded_file($image["tmp_name"], "../uploads/" . $filesName);