<?php
$photo["title"] = "Photography";
$photo = array_merge($defaultpage, $photo);
$photo["page_text"][0]["main"][0]["title"][0]["words"] = "Photography";
$photo["page_text"][0]["main"][0]["paragraph"][0]["content"] = $lipsum;
$photo_table = R::find("photo");
$incremental = 0;
foreach ($photo_table as $key => $value) {
	$small_url = $photo_table[$key]["small"];
	$photo_id = $photo_table[$key]["identification"];
	$photo["card"][$incremental]["image"][0]["url"] = $small_url;
	$photo["card"][$incremental]["url2"] = "/" .$photo_id;
	$incremental = $incremental + 1;
}
