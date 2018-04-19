<?php
$home["title"] = $sitename;
$home["metadata"] = "Human-in-Nature showcases the artwork and photography of Jojen Willis, specialising in nature, city and landscape";
$home = array_merge($defaultpage, $home);
$home["navbar"][0]["current"][0]["raisin"] = "(current)";
$home["header"][0]["title"] = "";
$home["page_text"][0]["main"][0]["title"][0]["words"] = "About Human-in-Nature";
$home["page_text"][0]["main"][0]["paragraph"][0]["content"] = "You may notice this site is a bit of a mishmash of stuff from wildlife and city photography to sketches of landscapes, people and other animals. It may also seem totally logical to you but in case it needs explaining here it is.
Human-in-Nature is both referring to myself in nature and other humans; it is an examination of our relationship with nature through the medium of photography, sketching and writing.";
$home["page_text"][0]["button"][0]["url"] = "/about";
$home["page_text"][0]["button"][0]["name"] = "Read More";
$home = array_merge($card, $home);
