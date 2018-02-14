<?php

$dbmanage_img["title"] = "Manage Photo";
$dbmanage_img = array_merge($defaultinternal, $dbmanage_img);
$carrot = substr($_SERVER['REQUEST_URI'], 8);


$current_photo_row = R::find("photo","identification = ?", [$carrot]);
$photo_key = each($current_photo_row)[0];
$current_photo_id = $current_photo_row[$photo_key]["id"];
$current_photo_url = $current_photo_row[$photo_key]["watermark"];
$current_photo_thumb_url = $current_photo_row[$photo_key]["small"];
$current_photo_description = $current_photo_row[$photo_key]["description"];
$current_photo_tags = $current_photo_row[$photo_key]["tags"];
$dbmanage_img["image_url"] = $current_photo_url;
$dbmanage_img["image_id"] = $carrot;
$dbmanage_img["description"] = $current_photo_description;
$dbmanage_img["tags"] = $current_photo_tags;
$dbmanage_img["thumb_url"] = $current_photo_thumb_url;
$dbmanage_img["water"] = $current_photo_url;
$dbmanage_img["idid"] = $current_photo_id;
