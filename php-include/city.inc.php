<?php
$city["title"] = "$sitename - City Photography";
$city["metadata"] = "Human-in-Nature - City Photography of photographer Jojen Willis";
$city = array_merge($defaultpage, $city);
$city["page_text"][0]["main"][0]["title"][0]["words"] = "City Photography";

$photo_table = R::find("city");
$incremental = 0;
foreach ($photo_table as $key => $value) {
	$small_url = $photo_table[$key]["small"];
	$photo_id = $photo_table[$key]["identification"];
	$city["images"][0]["card"][$incremental]["image"][0]["url"] = $small_url;
	$city["images"][0]["card"][$incremental]["url2"] = "city/" .$photo_id;
	$incremental = $incremental + 1;
}
