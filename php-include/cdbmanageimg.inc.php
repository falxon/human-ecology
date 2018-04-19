<?php

$cdbmanage_img["title"] = "Manage Photo";
$cdbmanage_img["metadata"] = "Human-in-Nature showcases the artwork and photography of Jojen Willis, specialising in nature, city and landscape";
$cdbmanage_img = array_merge($defaultinternal, $cdbmanage_img);
$carrot = substr($_SERVER['REQUEST_URI'], 13);


$current_photo_row = R::find("city","identification = ?", [$carrot]);
$photo_key = each($current_photo_row)[0];
$current_photo_id = $current_photo_row[$photo_key]["id"];
$current_photo_url = $current_photo_row[$photo_key]["watermark"];
$current_photo_thumb_url = $current_photo_row[$photo_key]["small"];
$current_photo_description = $current_photo_row[$photo_key]["description"];
$current_photo_tags = $current_photo_row[$photo_key]["tags"];
$cdbmanage_img["image_url"] = $current_photo_url;
$cdbmanage_img["image_id"] = $carrot;
$cdbmanage_img["description"] = $current_photo_description;
$cdbmanage_img["tags"] = $current_photo_tags;
$cdbmanage_img["thumb_url"] = $current_photo_thumb_url;
$cdbmanage_img["water"] = $current_photo_url;
$cdbmanage_img["idid"] = $current_photo_id;
$cdbmanage_img["gall"] = "city";
