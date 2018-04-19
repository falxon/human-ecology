<?php
use Michelf\Markdown;

$blog["title"] = "$sitename - Blog";
$blog["metadata"] = "Human-in-Nature - blog posts and writing by Photographer and Artist Jojen Willis";
$blog = array_merge($defaultpage, $blog);
$posts = R::findAll( 'blog' , ' ORDER BY date DESC ' );
$inc = 0;


  foreach ($posts as $key => $value) {
    $md_entry = $value["entry"];
    if (strlen($md_entry) > 200) {
      $shortened_md_entrin = substr($md_entry, 0, 200);
      $untrimmed_shortened_md_entry = $shortened_md_entrin."...";
      $shortened_md_entry = rtrim($untrimmed_shortened_md_entry);
    }
    else {
      $shortened_md_entry = $md_entry;
    }
    $html_entry = Markdown::defaultTransform($shortened_md_entry);
    $blog["post"][$inc]["post_title"][0]["title"] = $value["title"];
    $blog["post"][$inc]["post_content"][0]["content"] = $html_entry;
    $blog["post"][$inc]["button"][0]["url"] = "/blog/".$value["uri"];
    $blog["post"][$inc]["button"][0]["text"] = "Read More";
    $inc = ($inc + 1);
    //if ($inc == 0) {
      //$blog["card"][0]["sidebar"][0]["title"] = "Archive";
  //  }
    if ($inc >= 5) {
      break;
    }

  }

  $no = 0;
    foreach ($posts as $key => $value) {
      $blog["link"][0]["link_item"][$no]["name"] = $value["title"];
      $blog["link"][0]["link_item"][$no]["url"] = "/blog/".$value["uri"];
      $no = ($no + 1);
    }
