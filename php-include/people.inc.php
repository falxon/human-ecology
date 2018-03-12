<?php
$people["title"] = "$sitename - People";
$people = array_merge($defaultpage, $people);
$people["page_text"][0]["main"][0]["title"][0]["words"] = "People";

$photo_table = R::find("people");
$incremental = 0;
foreach ($photo_table as $key => $value) {
	$small_url = $photo_table[$key]["small"];
	$photo_id = $photo_table[$key]["identification"];
	$people["card"][$incremental]["image"][0]["url"] = $small_url;
	$people["card"][$incremental]["url2"] = "/" .$photo_id;
	$incremental = $incremental + 1;
}
