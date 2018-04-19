<?php
$wildlife["title"] = "$sitename - Wildlife Photography";
$wildlife["metadata"] = "Wildlife Photography by Jojen Willis";
$wildlife = array_merge($defaultpage, $wildlife);
$wildlife["page_text"][0]["main"][0]["title"][0]["words"] = "Wildlife Photography";

$photo_table = R::find("photo");
$incremental = 0;
foreach ($photo_table as $key => $value) {
	$small_url = $photo_table[$key]["small"];
	$photo_id = $photo_table[$key]["identification"];
	$wildlife["images"][0]["card"][$incremental]["image"][0]["url"] = $small_url;
	$wildlife["images"][0]["card"][$incremental]["url2"] = "wildlife/" .$photo_id;
	$incremental = $incremental + 1;
}
