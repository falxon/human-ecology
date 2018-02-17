<?php

$blog["title"] = "$sitename - Blog";
$blog = array_merge($defaultpage, $blog);
$posts = R::findAll( 'blog' , ' ORDER BY date DESC LIMIT 10 ' );

foreach ($posts as $key => $value) {
  echo '<div markdown="1">';
  echo $value;
  echo "<br/>";
  echo "<br/>";
  echo "</div>";
}
