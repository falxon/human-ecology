<?php

$padbmanage_img["title"] = "Manage Photo";
$padbmanage_img = array_merge($defaultinternal, $padbmanage_img);
$carrot = substr($_SERVER['REQUEST_URI'], 23);


$current_photo_row = R::find("drawpeople","identification = ?", [$carrot]);
$photo_key = each($current_photo_row)[0];
$current_photo_id = $current_photo_row[$photo_key]["id"];
$current_photo_url = $current_photo_row[$photo_key]["watermark"];
$current_photo_thumb_url = $current_photo_row[$photo_key]["small"];
$current_photo_description = $current_photo_row[$photo_key]["description"];
$current_photo_tags = $current_photo_row[$photo_key]["tags"];
$padbmanage_img["image_url"] = $current_photo_url;
$padbmanage_img["image_id"] = $carrot;
$padbmanage_img["description"] = $current_photo_description;
$padbmanage_img["tags"] = $current_photo_tags;
$padbmanage_img["thumb_url"] = $current_photo_thumb_url;
$padbmanage_img["water"] = $current_photo_url;
$padbmanage_img["idid"] = $current_photo_id;
$padbmanage_img["gall"] = "people-animals";
