<?php
session_start(['cookie_lifetime' => 86400]);
$password_flag = 0;

require 'modules/mustache/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();
require "modules/redbean/rb.php";
require "secure.php";

R::setup('mysql:host=localhost;dbname=ecology',
        $database_user, $database_pass);

$m = new Mustache_Engine(array(
'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__).'/templates')
));

$lipsum = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";

$defaultpage["site_name"] = "Human Ecology";
$defaultpage["navbar"][0]["url"] = "/home";
$defaultpage["navbar"][0]["name"] = "Home";
$defaultpage["navbar"][1]["url"] = "/about";
$defaultpage["navbar"][1]["name"] = "About";
$defaultpage["navbar"][2]["url"] = "/photo";
$defaultpage["navbar"][2]["name"] = "Photography";
$defaultpage["navbar"][3]["url"] = "/pets";
$defaultpage["navbar"][3]["name"] = "Pet Drawing";
$defaultpage["navbar"][4]["url"] = "/contact";
$defaultpage["navbar"][4]["name"] = "Contact Me";

$defaultinternal["site_name"] = "Human Ecology";
$defaultinternal["navbar"][0]["url"] = "/home";
$defaultinternal["navbar"][0]["name"] = "Home";
$defaultinternal["navbar"][1]["url"] = "/control";
$defaultinternal["navbar"][1]["name"] = "Control Panel";
$defaultinternal["navbar"][2]["url"] = "/add-photo";
$defaultinternal["navbar"][2]["name"] = "Add Photo";
$defaultinternal["navbar"][3]["url"] = "/logout";
$defaultinternal["navbar"][3]["name"] = "Log out";



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









$pets["title"] = "Pet Drawing";
$pets = array_merge($defaultpage, $pets);
$pets["page_text"][0]["main"][0]["title"][0]["words"] = "Pet Drawing";
$pets["page_text"][0]["main"][0]["paragraph"][0]["content"] = $lipsum;





$login["title"] = "Login";
$login = array_merge($defaultpage, $login);
$login["card"][0]["card_title"] = "Login to upload and manage photos and other information";
$login["card"][0]["button"][0]["button_name"] = "Login";

$dbentry["title"] = "Add photos";
$dbentry = array_merge($defaultinternal, $dbentry);
$dbentry["page_text"][0]["main"][0]["title"][0]["words"] = "Add photos";
$dbentry["page_text"][0]["main"][0]["paragraph"][0]["content"] = "Use this form to add new photos to the site. You must provide a thumbnail version and a larger, watermarked version.";
$dbentry["card"][0]["card_title"] = "";
$dbentry["card"][0]["button"][0]["button_name"] = "Submit";

$control["title"] = "Control Panel";
$control = array_merge($defaultinternal, $control);

$logout["title"] = "Logging Out";
$logout = array_merge($defaultinternal, $logout);
$logout["page_text"][0]["main"][0]["title"][0]["words"] = "You are being logged out";


$currentpage = $_SERVER['REQUEST_URI'];

if($currentpage=="/home" || $currentpage == "/"){
	include "php-include/home.inc.php";
	$bodyModel = $home;
	$template = "home";
} elseif ($currentpage=="/about"){
	include "php-include/about.inc.php";
	$bodyModel = $about;
	$template = "home";
} elseif ($currentpage=="/photo"){
	include "php-include/photo.inc.php";
	$bodyModel = $photo;
	$template = "gallery";
} elseif ($currentpage=="/pets"){
	$bodyModel = $pets;
	$template = "gallery";
} elseif (preg_match("/\d+/",$currentpage)){
	include "php-include/image.inc.php";
	$bodyModel = $image;
	$template = "image";
} elseif ($currentpage=="/contact"){
	include "php-include/contact.inc.php";
	$bodyModel = $contact;
	$template = "form";
} elseif ($currentpage=="/buy"){
	include "php-include/buy.inc.php";
	$bodyModel = $buy;
	$template = "form";
} elseif ($currentpage=="/login"){
	if(isset($_POST["password"])){
    $login = R::load("login", 1);
    if(password_verify ($_POST["password"], $login["phash"])){
			$_SESSION["password"] = 1;
      header("Location: /control");
    } else {
			$_SESSION["passsword"] = 0;
      header("Location: /login");
    }
  }
	$bodyModel = $login;
	$template = "login";
} elseif ($currentpage=="/control"){
	if (isset($_SESSION["password"])){
		if ($_SESSION["password"]==1){
			$bodyModel = $control;
			$template = "home";
		}
	} else {
		$_SESSION["passsword"] = 0;
		header("Location: /login");
	}
} elseif ($currentpage=="/add-photo"){
	if (isset($_SESSION["password"])){
		if ($_SESSION["password"]==1){
			if (isset($_POST["gallery-select"])&&
			isset($_POST["watermarked"])&&
			isset($_POST["thumb"])){
				if ($_POST["gallery-select"]=="Photography"){
					$idarray = R::getAll("SELECT MAX(identification) FROM photo");
					$id_number = $idarray[0]["MAX(identification)"];
					$photo = R::dispense("photo");
					$photo["small"] = $_POST["thumb"];
					$photo["watermark"] = $_POST["watermarked"];
					$photo["identification"] = $id_number + 1;
					R::store($photo);
				}
				elseif ($_POST["gallery-select"]=="Drawing"){

				}

			}
			$bodyModel = $dbentry;
			$template = "dbentry";
		}
	} else {
		$_SESSION["passsword"] = 0;
		header("Location: /login");
	}
} elseif ($currentpage=="/logout"){
	$_SESSION["password"] = 0;
	session_destroy();
	$bodyModel = $logout;
	$template = "home";
	header("Location: /login");
} else {
	$bodyModel = $error;
	$template = "home";
}


$page = $m->loadTemplate($template);
echo $page->render($bodyModel);
