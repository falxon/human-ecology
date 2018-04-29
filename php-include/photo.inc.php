<?php
$photo["title"] = "Photography";
$photo = array_merge($defaultpage, $photo);
$photo["metadata"] = "Photography by Jojen Willis";
$photo["page_text"][0]["main"][0]["title"][0]["words"] = "Photography";
$photo["page_text"][0]["main"][0]["paragraph"][0]["content"] = "I’ve split my photographs into three categories: Wildlife Photography, City Photography and People. Have a scroll through the different sections and see what you think. If you’d like to buy any photos I charge £50 for a copy to distribute how you like provided you use it with my name. If you would like to buy the full rights to a photo please contact me with the name of the photo and we can discuss pricing.";
$photo["page_text"][0]["main"][1]["title_small"][0]["words"] = "Wildlife Photography";
$photo["page_text"][0]["main"][1]["image"][0]["img2"][0]["url"] = "https://image.ibb.co/dP06xH/Tree_bumblebee.jpg";
$photo["page_text"][0]["main"][1]["image"][0]["img_text"][0]["content"] = "Wildlife has always been a big passion of mine and because of that I see my wildlife photography as maintaining my child-like wonder of our natural habitat and in particular spaces which seem untouched by humans. This of course is a very naive view of our environment as almost every square inch of the UK is heavily maintained by humans but I like to try and create a world through my lense which seems untainted by humans.";
$photo["page_text"][0]["main"][1]["image"][0]["img_text"][0]["button2"][0]["uri"] = "wildlife";
$photo["page_text"][0]["main"][1]["image"][0]["img_text"][0]["button2"][0]["name"] = "See More";
$photo["page_text"][0]["main"][2]["title_small"][0]["words"] = "City Photography";
$photo["page_text"][0]["main"][2]["image"][0]["img2"][0]["url"] = "https://image.ibb.co/k2S6P7/Burnt_out_car.jpg";
$photo["page_text"][0]["main"][2]["image"][0]["img_text"][0]["content"] = "Contrastingly my main focus in city photography is to show what humans do and become when so cut-off from nature. My aim is not to demonise us but to show how important  our connection with nature is and how difficult our lives can become when we leave it behind.";
$photo["page_text"][0]["main"][2]["image"][0]["img_text"][0]["button2"][0]["uri"] = "city";
$photo["page_text"][0]["main"][2]["image"][0]["img_text"][0]["button2"][0]["name"] = "See More";
$photo["page_text"][0]["main"][3]["title_small"][0]["words"] = "People";
$photo["page_text"][0]["main"][3]["image"][0]["img2"][0]["url"] = "https://image.ibb.co/idu7XS/Hilltop_Celebration.jpg";
$photo["page_text"][0]["main"][3]["image"][0]["img_text"][0]["content"] = "Photographing people is a very new thing for me but lately I’ve really taken to it. It began with me photographing my friends so I could spend more time drawing them and it became a project in itself. This section mostly consists of my friends allowing me to photograph them while they go about their usual activities.
If you would like to hire me for a photoshoot I charge £100 per shoot (however long it takes) plus travel expenses if outside of London. Email me on JojenRW@outlook.com or go to the ‘contact me’ tab to discuss your ideas with me.";
$photo["page_text"][0]["main"][3]["image"][0]["img_text"][0]["button2"][0]["uri"] = "people";
$photo["page_text"][0]["main"][3]["image"][0]["img_text"][0]["button2"][0]["name"] = "See More";

/*
$photo_table = R::find("photo");
$incremental = 0;
foreach ($photo_table as $key => $value) {
	$small_url = $photo_table[$key]["small"];
	$photo_id = $photo_table[$key]["identification"];
	$photo["card"][$incremental]["image"][0]["url"] = $small_url;
	$photo["card"][$incremental]["url2"] = "/" .$photo_id;
	$incremental = $incremental + 1;
}*/
