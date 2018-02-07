<?php
require 'modules/mustache/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();
require "modules/redbean/rb.php";

$m = new Mustache_Engine(array(
'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__).'/templates')
));

$lipsum = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

$defaultpage["site_name"] = "Human Ecology";
$defaultpage["navbar"][0]["url"] = "/home";
$defaultpage["navbar"][0]["name"] = "Home";
$defaultpage["navbar"][1]["url"] = "/about";
$defaultpage["navbar"][1]["name"] = "About";
$defaultpage["navbar"][2]["url"] = "/gal1";
$defaultpage["navbar"][2]["name"] = "Gallery 1";
$defaultpage["navbar"][3]["url"] = "/gal2";
$defaultpage["navbar"][3]["name"] = "Gallery 2";
$defaultpage["navbar"][4]["url"] = "/contact";
$defaultpage["navbar"][4]["name"] = "Contact Me";

$card["card"][0]["image"][0]["url"] = "http://placehold.it/300x200";
$card["card"][0]["imageid"][0]["id"] = "bf873t48";
$card["card"][0]["title"] = "Random picture";
$card["card"][0]["text"] = "Blah";
$card["card"][0]["button"][0]["url"] = "";
$card["card"][0]["button"][0]["text"] = "See More";
$card["card"][1]["image"][0]["url"] = "http://placehold.it/300x200";
$card["card"][1]["imageid"][0]["id"] = "bf873t48";
$card["card"][1]["title"] = "Random picture";
$card["card"][1]["text"] = "Blah";
$card["card"][1]["button"][0]["url"] = "";
$card["card"][1]["button"][0]["text"] = "See More";
$card["card"][2]["image"][0]["url"] = "http://placehold.it/300x200";
$card["card"][2]["imageid"][0]["id"] = "bf873t48";
$card["card"][2]["title"] = "Random picture";
$card["card"][2]["text"] = "Blah";
$card["card"][2]["button"][0]["url"] = "";
$card["card"][2]["button"][0]["text"] = "See More";

$home["title"] = "Home";
$home = array_merge($defaultpage, $home);
$home["navbar"][0]["current"][0]["raisin"] = "(current)";
$home["header"][0]["title"] = "";
$home["page_text"][0]["main"][0]["title"][0]["words"] = "About Human Ecology";
$home["page_text"][0]["main"][0]["paragraph"][0]["content"] = "blahblahblahblahbala";
$home["page_text"][0]["button"][0]["name"] = "Read More";
$home = array_merge($card, $home);

$about["title"] = "About";
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


$gal1["title"] = "Gallery 1";
$gal1 = array_merge($defaultpage, $gal1);
$gal1["page_text"][0]["main"][0]["title"][0]["words"] = "Gallery 1";
$gal1["page_text"][0]["main"][0]["paragraph"][0]["content"] = $lipsum;
$gal1["card"][0]["image"][0]["url"] = "http://placehold.it/300x200";
$gal1["card"][0]["url2"] = "/image";

$image["title"] = "Image";
$image = array_merge($defaultpage, $image);
$image = array_merge($card, $image);




$currentpage = $_SERVER['REQUEST_URI'];

if($currentpage=="/home" || $currentpage == "/"){
	$bodyModel = $home;
	$template = "home";
} elseif ($currentpage=="/about"){
	$bodyModel = $about;
	$template = "home";
} elseif ($currentpage=="/gal1"){
	$bodyModel = $gal1;
	$template = "gallery";
} elseif ($currentpage=="/image"){
	$bodyModel = $image;
	$template = "image";
} else {
	$bodyModel = $error;
	$template = "home";
}


$page = $m->loadTemplate($template);
echo $page->render($bodyModel);
