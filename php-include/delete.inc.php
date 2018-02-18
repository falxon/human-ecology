<?php

$delete["title"] = "Delete this Post";
$delete = array_merge($defaultinternal, $delete);
$delete["centred_text"][0]["content"] = "Are you sure you want to delete this blog post?";
$delete["centred_text"][0]["submit"][0]["action"] = "/control";
$delete["centred_text"][0]["submit"][0]["value"] = "Yes";
$delete["centred_text"][0]["submit"][0]["post_to_delete"] = substr($_SERVER["REQUEST_URI"], 6, -7);
