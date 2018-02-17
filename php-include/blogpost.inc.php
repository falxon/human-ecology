<?php
//require_once 'Michelf/Markdown.inc.php';
//require 'vendor/autoload.php';
use Michelf\Markdown;

$blogpost["title"] = "$sitename - Blog";
$blogpost = array_merge($defaultpage, $blogpost);
$article_uri = substr($_SERVER['REQUEST_URI'], 6);
$dbblogpost = R::find("blog", "uri = ?", [$article_uri]);
$key_array = array_keys($dbblogpost);
$key = $key_array[0];
$md_entry = $dbblogpost[$key]["entry"];
$html_entry = Markdown::defaultTransform($md_entry);

$blogpost["blog_title"] = $dbblogpost[$key]["title"];
$blogpost["blog_date"] = $dbblogpost[$key]["date"];
$blogpost["blog_post"] = $html_entry;
