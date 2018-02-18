<?php

$edit["title"] = "Edit Blog Post";
$edit = array_merge($defaultinternal, $edit);
$uri = $_SERVER['REQUEST_URI'];
$entry_uri = substr ($uri, 6, -5);
$current_entry = R::find("blog", "uri = ?", [$entry_uri]);
$ad = (array_keys($current_entry));
$id = $ad[0];
$edit["card"][0]["post_title"] = $current_entry[$id]["title"];
$edit["card"][0]["post_for_edit"] = $current_entry[$id]["entry"];
$edit["card"][0]["button"][0]["button_name"] = "Submit";
$edit["card"][0]["entry_id"] = $id;
