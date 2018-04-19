<?php
$land["title"] = "$sitename - Landscape Drawing";
$land["metadata"] = "Landscape drawing by Jojen Willis";
$land = array_merge($defaultpage, $land);
$land["page_text"][0]["main"][0]["title"][0]["words"] = "Landscape Drawing";
$land["page_text"][0]["main"][0]["paragraph"][0]["content"] = "I enjoy sketching landscapes of the places I’ve been. I particularly favour sweeping hills and landscapes covered in trees. All the drawings shown below are available for purchase. You can either buy a copy of the drawing for £10 or the original for £50. All drawings are A4 unless otherwise stated. If you’re interested please drop me an email using the contact form.";
$photo_table = R::find("land");
$incremental = 0;
foreach ($photo_table as $key => $value) {
	$small_url = $photo_table[$key]["small"];
	$photo_id = $photo_table[$key]["identification"];
	$land["images"][0]["card"][$incremental]["image"][0]["url"] = $small_url;
	$land["images"][0]["card"][$incremental]["url2"] = "landscape/" .$photo_id;
	$incremental = $incremental + 1;
}
