<?php

function tt($value){
    echo '<pre>';
    print_r($value);
    echo '</pre>';
    exit();
}
$images = $_FILES["images"];

$normalizeImages = [];

foreach ($images as $key_name => $value) {
    foreach ($value as $key => $item) {
        $normalizeImages[$key][$key_name] = $item;
    }

}

foreach ($normalizeImages as $image) {
    $types = ["image/jpeg", "image/png"];

    if (!in_array($image["type"], $types)) {
        continue;
    }

    $fileSize = $image["size"] / 1000000;
    $maxSize =1; //mb

    if ($fileSize > $maxSize) {
        continue;
    }

    if (!is_dir('../uploads')) {
        mkdir('../uploads', 0777, true);
    }

    $extension = pathinfo($image["name"], PATHINFO_EXTENSION);

    $filesName = time() . ".$extension";

    move_uploaded_file($image["tmp_name"], "../uploads/" . $filesName);

}

