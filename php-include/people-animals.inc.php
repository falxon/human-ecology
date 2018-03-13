<?php
$pa["title"] = "$sitename - People (and Other Animals)";
$pa = array_merge($defaultpage, $pa);
$pa["page_text"][0]["main"][0]["title"][0]["words"] = "People (and Other Animals)";
$pa["page_text"][0]["main"][0]["paragraph"][0]["content"] = "Often I come across people who catch my eye; perhaps people who have a unique smile or something indescribable and I know I must draw them. Below are some people who caught my eye and some animals that had a similar effect on me.";
$pa["page_text"][0]["main"][0]["paragraph"][1]["content"] = "All the drawings shown are available for purchase. You can either buy a copy of the drawing for £10 or the original for £50. All drawings are A4 unless otherwise stated. If you’re interested please drop me an email using the contact form.";
$pa["page_text"][0]["main"][0]["paragraph"][2]["content"] = "All human subjects consent to being drawn and the sketches being sold.";
$photo_table = R::find("drawpeople");
$incremental = 0;
foreach ($photo_table as $key => $value) {
	$small_url = $photo_table[$key]["small"];
	$photo_id = $photo_table[$key]["identification"];
	$pa["images"][0]["card"][$incremental]["image"][0]["url"] = $small_url;
	$pa["images"][0]["card"][$incremental]["url2"] = "people-animals/" .$photo_id;
	$incremental = $incremental + 1;
}
