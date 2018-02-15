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
$defaultpage["navbar"][4]["url"] = "/blog";
$defaultpage["navbar"][4]["name"] = "Blog";
$defaultpage["navbar"][5]["url"] = "/contact";
$defaultpage["navbar"][5]["name"] = "Contact Me";

$defaultinternal["site_name"] = "Human Ecology";
$defaultinternal["navbar"][0]["url"] = "/home";
$defaultinternal["navbar"][0]["name"] = "Home";
$defaultinternal["navbar"][1]["url"] = "/control";
$defaultinternal["navbar"][1]["name"] = "Control Panel";
$defaultinternal["navbar"][2]["url"] = "/add-photo";
$defaultinternal["navbar"][2]["name"] = "Add Photo";
$defaultinternal["navbar"][3]["url"] = "/manage";
$defaultinternal["navbar"][3]["name"] = "Manage Photos";
$defaultinternal["navbar"][4]["url"] = "/man-blog";
$defaultinternal["navbar"][4]["name"] = "Manage Blog";
$defaultinternal["navbar"][5]["url"] = "/logout";
$defaultinternal["navbar"][5]["name"] = "Log out";

$error["title"] = "404 Error";
$error = array_merge ($defaultpage, $error);



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
  include "php-include/pets.inc.php";
	$bodyModel = $pets;
	$template = "gallery";
} elseif (preg_match("/\/\d+/A",$currentpage)){
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
  include "php-include/login.inc.php";
	if(isset($_POST["password"])){
    $login = R::load("login", 1);
    if(password_verify ($_POST["password"], $login["phash"])){
			$_SESSION["password"] = 1;
      header("Location: /control");
    } else {
			$_SESSION["password"] = 0;
      header("Location: /login");
    }
  }
	$bodyModel = $login;
	$template = "login";
} elseif ($currentpage=="/control"){
  include "php-include/control.inc.php";
	if (isset($_SESSION["password"])){
		if ($_SESSION["password"]==1){
			$bodyModel = $control;
			$template = "home";
		}
    else {
  		$_SESSION["password"] = 0;
  		header("Location: /login");
  	}
	} else {
		$_SESSION["password"] = 0;
		header("Location: /login");
	}
} elseif ($currentpage=="/add-photo"){
  include "php-include/dbentry.inc.php";
	if (isset($_SESSION["password"])){
		if ($_SESSION["password"]==1){
			if (isset($_POST["gallery-select"])&& isset($_POST["watermarked"])&&
			isset($_POST["thumb"])){
				if ($_POST["gallery-select"]=="Photography"){
					$idarray = R::getAll("SELECT MAX(identification) FROM photo");
					$id_number = $idarray[0]["MAX(identification)"];
					$photo = R::dispense("photo");
					$photo["small"] = $_POST["thumb"];
					$photo["watermark"] = $_POST["watermarked"];
					$photo["identification"] = $id_number + 1;
					$photo["description"] = $_POST["description"];
					$photo["tags"] = $_POST["tags"];
					R::store($photo);
				}
			}
			$bodyModel = $dbentry;
			$template = "dbentry";
		}
    else {
  		$_SESSION["password"] = 0;
  		header("Location: /login");
  	}
	} else {
		$_SESSION["password"] = 0;
		header("Location: /login");
	}
} elseif (preg_match("/(manage\/)\d+/", $currentpage)){
  include "php-include/dbmanageimg.inc.php";
    if (isset($_SESSION["password"])){
      if ($_SESSION["password"]==1){
        $bodyModel = $dbmanage_img;
        $template = "dbmanageimg";
      }
      else {
    		$_SESSION["password"] = 0;
    		header("Location: /login");
    	}
  }
  else {
		$_SESSION["password"] = 0;
		header("Location: /login");
	}
} elseif ($currentpage=="/manage"){
  include "php-include/dbmanage.inc.php";
    if (isset($_SESSION["password"])){
      if ($_SESSION["password"]==1){
        if (isset($_POST["idid"])&& isset($_POST["thumbnail1"])&& isset($_POST["water"])&& isset($_POST["tags1"])&& isset($_POST["description1"])){
          $bean_id = $_POST["idid"];
          $photo_bean = R::load("photo", $bean_id);
          $photo_bean["small"] = $_POST["thumbnail1"];
          $photo_bean["watermark"] = $_POST["water"];
          $photo_bean["tags"] = $_POST["tags1"];
          $photo_bean["description"] = $_POST["description1"];
          R::store($photo_bean);
        }
        if (isset($_POST["delete"])&& isset($_POST["idied"])){
          if ($_POST["delete"] == "yes"){
            $bean_id = $_POST["idied"];
            $bean_to_delete = R::load("photo", $bean_id);
            R::trash($bean_to_delete);
          }
        }
        if (isset($_POST["search"])){
          $searched_photo = $_POST['search'];
          header("Location: /$searched_photo");
        }
        $bodyModel = $dbmanage;
        $template = "gallery";
      }
      else {
    		$_SESSION["password"] = 0;
    		header("Location: /login");
    	}
    }
    else {
  		$_SESSION["password"] = 0;
  		header("Location: /login");
  	}
  } elseif ($currentpage=="/man-blog"){
    include "php-include/man-blog.inc.php";
      if (isset($_SESSION["password"])){
        if ($_SESSION["password"]==1){
          $bodyModel = $manage_blog;
          $template = "blogmanage";
        }
        else {
          $_SESSION["password"] = 0;
          header("Location: /login");
        }
      }
      else {
        $_SESSION["password"] = 0;
        header("Location: /login");
      }
  } elseif ($currentpage=="/logout"){
  include "php-include/logout.inc.php";
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
