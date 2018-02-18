<?php
session_start(['cookie_lifetime' => 86400]);
$password_flag = 0;

require 'modules/mustache/src/Mustache/Autoloader.php';
Mustache_Autoloader::register();
require "modules/redbean/rb.php";
require "secure.php";
require 'Michelf/Markdown.inc.php';




R::setup('mysql:host=localhost;dbname=ecology',
        $database_user, $database_pass);

$m = new Mustache_Engine(array(
'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__).'/templates')
));
$sitename = "Human in Nature";
$lipsum = "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.";


$defaultpage["site_name"] = "$sitename";
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

$defaultinternal["site_name"] = "$sitename";
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
  if(isset($_POST["name"])&& isset($_POST["email"])&& isset($_POST["subject"])&& isset($_POST["message"])){
    $to = "JojenRW@outlook.com";
		$name = $_POST["name"];
		$email = $_POST["email"];
    $subject = $_POST["subject"];
    $imgiden = "about " .$_POST['image_id'];
    $org = "from " .$_POST['organisation'];
		$headers = 'From: JojenRW@outlook.com' . "\r\n" .
    		"Reply-To:".$_POST["email"];
        "\r\nContent-Type: text/html; charset=UTF-8\r\n";
		$message = "Message from $email $org $imgiden\n" .$_POST["message"];
    if(mail($to, $subject, $message, $headers)){
      echo "es werkt";
  		//$home["email_sent"][0]["type"] = "success";
  		//$home["email_sent"][0]["message"] = "Your message has been sent. Diana Beaven Physiotherapist will get back to you shortly.";
    }/*else{
      $home["email_sent"][0]["type"] = "warning";
  		$home["email_sent"][0]["message"] = "Unfortunately, your message has not been sent due to an error. Apologies for any inconvenience caused - we are working on this issue and hope to resolve it shortly.";
    }*/
  }
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
} elseif ($currentpage=="/blog"){
  include "php-include/blog.inc.php";
  $bodyModel = $blog;
  $template = "blog";
} elseif (preg_match("/\/blog\/.+\/edit/D", $currentpage)){
  include "php-include/edit.inc.php";
  if (isset($_SESSION["password"])){
    if ($_SESSION["password"]==1) {


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
  $bodyModel = $edit;
  $template = "edit";
} elseif (preg_match("/(\/blog\/)\S+/", $currentpage)){
  include "php-include/blogpost.inc.php";
  if (isset($_SESSION["password"])){
    if ($_SESSION["password"]==1) {
      $blogpost = array_merge($defaultinternal, $blogpost);
      $blogpost["edit"][0]["url"] = $_SERVER['REQUEST_URI']."/edit";
      $blogpost["edit"][0]["url2"] = $_SERVER['REQUEST_URI']."/delete";
    }
    else {
      $blogpost = array_merge($defaultpage, $blogpost);
    }
  }
  else {
    $blogpost = array_merge($defaultpage, $blogpost);
  }
  $bodyModel = $blogpost;
  $template = "blogpost";
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
      if (isset($_POST["blog-entry"])){
        $no_spaces = preg_replace("/\s/", "-", $_POST["title"]);
        $uri = mb_strtolower($no_spaces, 'UTF-8');
        $blogbean = R::dispense("blog");
        $blogbean["title"] = $_POST["title"];
        $blogbean["entry"] = $_POST["blog-entry"];
        $blogbean["date"] = date("d-m-Y");
        $blogbean["uri"] = $uri;
        $post_stored_id = R::store($blogbean);
        $blogwas = R::load("blog", $post_stored_id);
        $blogwas["uri"] = $uri."-".$post_stored_id;
        R::store($blogwas);
        $control["alert"][0]["type"] = "success";
        $control["alert"][0]["message"] = "Your blog entry has been posted";
      }
      if (isset($_POST["blog-entry-edit"])){
        $entry_id = $_POST["entry_id"];
        $blog_edit = R::load("blog", $entry_id);
        $blog_edit["title"] = $_POST["title-edit"];
        $blog_edit["entry"] = $_POST["blog-entry-edit"];
        R::store($blog_edit);
        $control["alert"][0]["type"] = "success";
        $control["alert"][0]["message"] = "Your blog entry has been edited";
      }
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
          $photo["alert"][0]["type"] = "success";
          $photo["alert"][0]["message"] = "Your photo has been added";
        }
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
          $dbmanage["alert"][0]["type"] = "success";
          $dbmanage["alert"][0]["message"] = "Your photo has been edited";
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
