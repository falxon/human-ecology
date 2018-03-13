<?php

$dbmanage["title"] = "Manage Photos";
$dbmanage = array_merge($defaultinternal, $dbmanage);
$dbmanage["page_text"][0]["main"][0]["title"][0]["words"] = "Manage Photos";
$dbmanage["page_text"][0]["main"][0]["paragraph"][0]["content"] = "Use this page to search for a specific photo ID, or click on any of the images below to modify the image's data.";
$dbmanage["page_text"][0]["main"][0]["search"][0]["name"] = "Search";
$dbmanage["images"][0]["title"][0]["tit"] = "Wildlife";

$photo_table = R::find("photo");
$incremental = 0;
foreach ($photo_table as $key => $value) {
	$small_url = $photo_table[$key]["small"];
	$photo_id = $photo_table[$key]["identification"];
	$dbmanage["images"][0]["card"][$incremental]["image"][0]["url"] = $small_url;
	$dbmanage["images"][0]["card"][$incremental]["url2"] = "/manage/wildlife/" .$photo_id;
	$incremental = $incremental + 1;
}

$dbmanage["images"][1]["title"][0]["tit"] = "City";

$city_table = R::find("city");
$incremental2 = 0;
foreach ($city_table as $key => $value) {
	$small_url = $city_table[$key]["small"];
	$photo_id = $city_table[$key]["identification"];
	$dbmanage["images"][1]["card"][$incremental2]["image"][0]["url"] = $small_url;
	$dbmanage["images"][1]["card"][$incremental2]["url2"] = "/manage/city/" .$photo_id;
	$incremental2 = $incremental2 + 1;
}

$dbmanage["images"][2]["title"][0]["tit"] = "People";

$people_table = R::find("people");
$incremental3 = 0;
foreach ($people_table as $key => $value) {
	$small_url = $people_table[$key]["small"];
	$photo_id = $people_table[$key]["identification"];
	$dbmanage["images"][2]["card"][$incremental3]["image"][0]["url"] = $small_url;
	$dbmanage["images"][2]["card"][$incremental3]["url2"] = "/manage/people/" .$photo_id;
	$incremental3 = $incremental3 + 1;
}
