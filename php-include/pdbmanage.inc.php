<?php

$pdbmanage_img["title"] = "Manage Photo";
$pdbmanage_img = array_merge($defaultinternal, $pdbmanage_img);
$carrot = substr($_SERVER['REQUEST_URI'], 13);


$current_photo_row = R::find("people","identification = ?", [$carrot]);
$photo_key = each($current_photo_row)[0];
$current_photo_id = $current_photo_row[$photo_key]["id"];
$current_photo_url = $current_photo_row[$photo_key]["watermark"];
$current_photo_thumb_url = $current_photo_row[$photo_key]["small"];
$current_photo_description = $current_photo_row[$photo_key]["description"];
$current_photo_tags = $current_photo_row[$photo_key]["tags"];
$pdbmanage_img["image_url"] = $current_photo_url;
$pdbmanage_img["image_id"] = $carrot;
$pdbmanage_img["description"] = $current_photo_description;
$pdbmanage_img["tags"] = $current_photo_tags;
$pdbmanage_img["thumb_url"] = $current_photo_thumb_url;
$pdbmanage_img["water"] = $current_photo_url;
$pdbmanage_img["idid"] = $current_photo_id;
$pdbmanage_img["gall"] = "people";
