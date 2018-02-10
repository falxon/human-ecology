<?php
require "modules/redbean/rb.php";
require "secure.php";

R::setup('mysql:host=localhost;dbname=ecology',
        $database_user, $database_pass);

/*
$gal1 = R::dispense("gal1");
$gal1["small"] = "www.placehold.it/300x200";
$gal1["watermark"] = "www.placehold.it/900x600";
$gal1["identification"] = "bahhhh";

$id = R::store($gal1);

$login = R::dispense("login");
$login["phash"] = "$2y$10$3svhflKo4Sm8a5aEpQ3spe9EUiJTKRvPuMhJJjVEESqpRVs9k2fO6";
$loginid = R::store($login); */

$user = R::dispense("user");
$user["sessionid"] = "jk";
$user_id = R::store($user);
