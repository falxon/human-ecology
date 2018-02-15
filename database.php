<?php
require "modules/redbean/rb.php";
require "secure.php";

R::setup('mysql:host=localhost;dbname=ecology',
        $database_user, $database_pass);


/*
$photo = R::dispense("photo");
$photo["small"] = "www.placehold.it/300x200";
$photo["watermark"] = "www.placehold.it/900x600";
$photo["identification"] = 18467;
$photo["description"] = "blahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblah";
$photo["tags"] = "wolf";

$id = R::store($photo);

$login = R::dispense("login");
$login["phash"] = "$2y$10$F/MevCENXrCS1c/Luo97fOQaKN7v8xqLpGQ1xz8ZSr4e5P0/azLBK";
$loginid = R::store($login);

$user = R::dispense("user");
$user["sessionid"] = "jk";
$user_id = R::store($user);
*/
