<?php

$dbmanage["title"] = "Manage Photos";
$dbmanage = array_merge($defaultinternal, $dbmanage);
$dbmanage["page_text"][0]["main"][0]["title"][0]["words"] = "Manage Photos";
$dbmanage["page_text"][0]["main"][0]["paragraph"][0]["content"] = $lipsum;
$photo_table = R::find("photo");
$incremental = 0;
foreach ($photo_table as $key => $value) {
	$small_url = $photo_table[$key]["small"];
	$photo_id = $photo_table[$key]["identification"];
	$dbmanage["card"][$incremental]["image"][0]["url"] = $small_url;
	$dbmanage["card"][$incremental]["url2"] = "/manage/" .$photo_id;
	$incremental = $incremental + 1;
}
