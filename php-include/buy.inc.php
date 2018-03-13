<?php
$buy["title"] = "Buy Photo";
$buy = array_merge($defaultpage, $buy);
$buy["page_text"][0]["main"][0]["title"][0]["words"] = "Buy a photograph";
$buy["page_text"][0]["main"][0]["paragraph"][0]["content"] = $lipsum;
$buy["card"][0]["image_gallery"][0]["name"] = "Image Gallery";
$buy["card"][0]["image_gallery"][0]["img_gal"] = $_POST["image_gallery"];
$buy["card"][0]["image_id"][0]["name"] = "Image ID";
$buy["card"][0]["image_id"][0]["img_ident"] = $_POST["image_id"];
$buy["card"][0]["org"][0]["name"] = "Organisation or Company";
$buy["card"][0]["button"][0]["button_name"] = "Submit";
