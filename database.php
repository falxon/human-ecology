<?php
require "modules/redbean/rb.php";
require "secure.php";

R::setup('mysql:host=ecology.db;dbname=ecology',
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


$people = R::dispense("people");
$people["small"] = "www.placehold.it/300x200";
$people["watermark"] = "www.placehold.it/900x600";
$people["identification"] = 68407;
$people["description"] = "blahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblah";
$people["tags"] = "wolf";

R::store($people);

$city = R::dispense("city");
$city["small"] = "www.placehold.it/300x200";
$city["watermark"] = "www.placehold.it/900x600";
$city["identification"] = 88484;
$city["description"] = "blahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblahblah";
$people["tags"] = "wolf";

R::store($city);


$land = R::dispense("land");
$land["small"] = "http://www.placehold.it/300x200";
$land["watermark"] = "http://www.placehold.it/900x600";
$land["identification"] = 15364;
$land["description"] = "blahblahblah blahblahblahblah";
$land["tags"] = "wolf";

R::store($land);

$dppl = R::dispense("drawpeople");
$dppl["small"] = "http://www.placehold.it/300x200";
$dppl["watermark"] = "http://www.placehold.it/900x600";
$dppl["identification"] = 33421;
$dppl["description"] = "blahblahblah blahblahblahblah";
$dppl["tags"] = "wolf";

R::store($dppl);
*/
