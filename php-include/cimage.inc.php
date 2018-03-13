<?php
$cimage["title"] = "$sitename";
$cimage = array_merge($defaultpage, $cimage);
$carrot = substr($_SERVER['REQUEST_URI'], 6);
$gallery = "city";
//$all_carrots = (R::getAll("SELECT $carrot"));
//print_r (R::getAll("SELECT watermark FROM photo WHERE identification = $carrot"));
$current_photo_row = R::find("city","identification = ?", [$carrot]);
$photo_key = each($current_photo_row)[0];
$current_photo_id = $current_photo_row[$photo_key]["id"];
$current_photo_url = $current_photo_row[$photo_key]["watermark"];
$current_photo_description = $current_photo_row[$photo_key]["description"];
$current_photo_tags = $current_photo_row[$photo_key]["tags"];
$cimage["image_url"] = $current_photo_url;
$cimage["image_id"] = $carrot;
$cimage["description"] = $current_photo_description;
$cimage["tags"] = $current_photo_tags;
$cimage["image_gallery"] = $gallery;
//print_r($current_photo_row);
//$photo_table = (R::find("photo"));
//print_r($photo_table);

preg_match_all("/[^,]+/", $current_photo_tags, $current_photo_tags_sep);

$pimage["card"][0]["image"][0]["url"] = "http://placehold.it/320x215";
$cimage["card"][0]["image"][0]["url2"] = "/";
$cimage["card"][1]["image"][0]["url"] = "http://placehold.it/320x216";
$cimage["card"][1]["image"][0]["url2"] = "/";
$cimage["card"][2]["image"][0]["url"] = "http://placehold.it/320x217";
$cimage["card"][2]["image"][0]["url2"] = "/";


foreach ($current_photo_tags_sep[0] as $key => $value) {
  $value = trim($value);
  $all_tagged = R::find("city", "tags LIKE ?", ["%$value%"]);
  $num = 0;
    foreach (array_keys($all_tagged) as $key => $value) {
      if ($current_photo_id != $value) {
        $ident_num = $all_tagged[$value]["identification"];
        $card_thumb = $all_tagged[$value]["small"];
        $cimage["card"][$num]["image"][0]["url"] = $card_thumb;
        $cimage["card"][$num]["image"][0]["url2"] = "/$ident_num";
        $num = ($num + 1);
        if ($num >= 2) {
          break 2;
        }
     }
    }

}
