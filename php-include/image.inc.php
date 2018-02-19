<?php
$image["title"] = "Image";
$image = array_merge($defaultpage, $image);
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

$image["card"][0]["image"][0]["url"] = "http://placehold.it/320x215";
$image["card"][0]["image"][0]["url2"] = "/";
$image["card"][1]["image"][0]["url"] = "http://placehold.it/320x216";
$image["card"][1]["image"][0]["url2"] = "/";
$image["card"][2]["image"][0]["url"] = "http://placehold.it/320x217";
$image["card"][2]["image"][0]["url2"] = "/";


foreach ($current_photo_tags_sep[0] as $key => $value) {
  $value = trim($value);
  $all_tagged = R::find("photo", "tags LIKE ?", ["%$value%"]);
  $num = 0;
    foreach (array_keys($all_tagged) as $key => $value) {
      if ($current_photo_id != $value) {
        $ident_num = $all_tagged[$value]["identification"];
        $card_thumb = $all_tagged[$value]["small"];
        $image["card"][$num]["image"][0]["url"] = $card_thumb;
        $image["card"][$num]["image"][0]["url2"] = "/$ident_num";
        $num = ($num + 1);
        if ($num >= 2) {
          break 2;
        }
     }
    }

}
