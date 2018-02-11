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
$defaultpage["navbar"][3]["url"] = "/drawing";
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

$home["title"] = "Human Ecology";
$home = array_merge($defaultpage, $home);
$home["navbar"][0]["current"][0]["raisin"] = "(current)";
$home["header"][0]["title"] = "";
$home["page_text"][0]["main"][0]["title"][0]["words"] = "About Human Ecology";
$home["page_text"][0]["main"][0]["paragraph"][0]["content"] = "blhblahblahblahbala";
$home["page_text"][0]["button"][0]["name"] = "Read More";
$home = array_merge($card, $home);

$about["title"] = "Human Ecology - About";
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


$photo["title"] = "Gallery 1";
$photo = array_merge($defaultpage, $photo);
$photo["page_text"][0]["main"][0]["title"][0]["words"] = "Gallery 1";
$photo["page_text"][0]["main"][0]["paragraph"][0]["content"] = $lipsum;
$photo["card"][0]["image"][0]["url"] = "http://placehold.it/300x200";
$photo["card"][0]["url2"] = "/image";

$image["title"] = "Image";
$image = array_merge($defaultpage, $image);
$image = array_merge($card, $image);
$image["image_url"] = "http://placehold.it/750x500";
$image["url"] = "/buy";
$image["description"] = $lipsum;

$contact["title"] = "Contact me";
$contact = array_merge($defaultpage, $contact);
$contact["page_text"][0]["main"][0]["title"][0]["words"] = "Contact me";
$contact["page_text"][0]["main"][0]["paragraph"][0]["content"] = $lipsum;
$contact["card"][0]["card_title"] = "Contact Form";
$contact["card"][0]["button"][0]["button_name"] = "Submit";

$buy["title"] = "Buy Photo";
$buy = array_merge($defaultpage, $buy);
$buy["page_text"][0]["main"][0]["title"][0]["words"] = "Buy a photograph";
$buy["page_text"][0]["main"][0]["paragraph"][0]["content"] = $lipsum;
$buy["card"][0]["image_id"][0]["name"] = "Image ID";
$buy["card"][0]["org"][0]["name"] = "Organisation or Company";
$buy["card"][0]["button"][0]["button_name"] = "Submit";

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
	$bodyModel = $home;
	$template = "home";
} elseif ($currentpage=="/about"){
	$bodyModel = $about;
	$template = "home";
} elseif ($currentpage=="/photo"){
	$bodyModel = $photo;
	$template = "gallery";
} elseif ($currentpage=="/image"){
	$bodyModel = $image;
	$template = "image";
} elseif ($currentpage=="/contact"){
	$bodyModel = $contact;
	$template = "form";
} elseif ($currentpage=="/buy"){
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
