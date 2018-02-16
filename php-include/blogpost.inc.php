<?php
$blogpost["title"] = "$sitename - Blog";
$blogpost = array_merge($defaultpage, $blogpost);
$article_uri = substr($_SERVER['REQUEST_URI'], 6);
$dbblogpost = R::find("blog", "uri = ?", [$article_uri]);
$key_array = array_keys($dbblogpost);
$key = $key_array[0];
$blogpost["blog_title"] = $dbblogpost[$key]["title"];
$blogpost["blog_date"] = $dbblogpost[$key]["date"];
$blogpost["blog_post"] = $dbblogpost[$key]["entry"].$lipsum.$lipsum;
