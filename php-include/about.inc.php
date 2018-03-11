<?php
$about["title"] = "$sitename - About";
$about = array_merge($defaultpage, $about);
$about["navbar"][1]["current"][0]["raisin"] = "(current)";
$about["page_text"][0]["main"][0]["title"][0]["words"] = "About Human Ecology";
$about["page_text"][0]["main"][0]["paragraph"][0]["content"] = $lipsum;
$about["page_text"][0]["main"][0]["paragraph"][1]["content"] = $lipsum;
$about["page_text"][0]["main"][1]["title_small"][0]["words"] = "Smaller Title";
$about["page_text"][0]["main"][1]["paragraph"][0]["content"] = $lipsum;
$about["page_text"][0]["main"][1]["image"][0]["img"][0]["url"] = "http://placehold.it/300x400";
$about["page_text"][0]["main"][1]["image"][0]["img"][1]["url"] = "http://placehold.it/300x400";
$about["page_text"][0]["main"][1]["image"][0]["img"][2]["url"] = "http://placehold.it/300x400";
$about["page_text"][0]["main"][2]["paragraph"][0]["content"] = $lipsum;
$about["page_text"][0]["main"][2]["image"][0]["centering"] = "justify-content-center";
$about["page_text"][0]["main"][2]["image"][0]["img"][0]["url"] = "http://placehold.it/300x400";
$about["page_text"][0]["main"][2]["image"][0]["img"][1]["url"] = "http://placehold.it/300x400";
$about = array_merge($card, $about);
