<?php
require "modules/redbean/rb.php";
require "secure.php";

R::setup('mysql:host=localhost;dbname=ecology',
        $database_user, $database_pass);


$gal1 = R::dispense("gal1");
$gal1["small"] = "www.placehold.it/300x200";
$gal1["watermark"] = "www.placehold.it/900x600";
$gal1["identification"] = "bahhhh";

$id = R::store($gal1);
