<?php
$image["title"] = "Image";
$image = array_merge($defaultpage, $image);
$image = array_merge($card, $image);
$carrot = substr($_SERVER['REQUEST_URI'], 1);
$all_carrots = (R::getAll("SELECT $carrot"));
//print_r (R::getAll("SELECT watermark FROM photo WHERE identification = $carrot"));
$current_photo_row = R::find("photo","identification = ?", [$carrot]);
$current_photo_url = $current_photo_row[1]["watermark"];
$image["image_url"] = $current_photo_url;
$image["image_id"] = $carrot;
$image["description"] = $lipsum;
