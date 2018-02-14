<?php
$image["title"] = "Image";
$image = array_merge($defaultpage, $image);
$image = array_merge($card, $image);
$carrot = substr($_SERVER['REQUEST_URI'], 1);
//$all_carrots = (R::getAll("SELECT $carrot"));
//print_r (R::getAll("SELECT watermark FROM photo WHERE identification = $carrot"));
$current_photo_row = R::find("photo","identification = ?", [$carrot]);
$photo_key = each($current_photo_row)[0];
$current_photo_id = $current_photo_row[$photo_key]["id"];
$current_photo_url = $current_photo_row[$photo_key]["watermark"];
$current_photo_description = $current_photo_row[$photo_key]["description"];
$current_photo_tags = $current_photo_row[$photo_key]["tags"];
$image["image_url"] = $current_photo_url;
$image["image_id"] = $carrot;
$image["description"] = $current_photo_description;
$image["tags"] = $current_photo_tags;
//print_r($current_photo_row);
//$photo_table = (R::find("photo"));
//print_r($photo_table);

preg_match_all("/[^,]+/", $current_photo_tags, $current_photo_tags_sep);

//print_r ($current_photo_tags_sep);
foreach ($current_photo_tags_sep[0] as $key => $value) {
  $value = trim($value);
  $all_tagged = R::find("photo", "tags LIKE ?", ["%$value%"]);
    foreach (array_keys($all_tagged) as $key => $value) {
      if ($current_photo_id != $value) {
       print_r ($all_tagged[$value]["small"]);
     }
    }

}
