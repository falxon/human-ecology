<?php

$ldbmanage_img["title"] = "Manage Photo";
$ldbmanage_img = array_merge($defaultinternal, $ldbmanage_img);
$carrot = substr($_SERVER['REQUEST_URI'], 18);


$current_photo_row = R::find("land","identification = ?", [$carrot]);
$photo_key = each($current_photo_row)[0];
$current_photo_id = $current_photo_row[$photo_key]["id"];
$current_photo_url = $current_photo_row[$photo_key]["watermark"];
$current_photo_thumb_url = $current_photo_row[$photo_key]["small"];
$current_photo_description = $current_photo_row[$photo_key]["description"];
$current_photo_tags = $current_photo_row[$photo_key]["tags"];
$ldbmanage_img["image_url"] = $current_photo_url;
$ldbmanage_img["image_id"] = $carrot;
$ldbmanage_img["description"] = $current_photo_description;
$ldbmanage_img["tags"] = $current_photo_tags;
$ldbmanage_img["thumb_url"] = $current_photo_thumb_url;
$ldbmanage_img["water"] = $current_photo_url;
$ldbmanage_img["idid"] = $current_photo_id;
$ldbmanage_img["gall"] = "landscape";
