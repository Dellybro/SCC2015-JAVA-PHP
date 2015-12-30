<?php


$rss = new DOMDocument();

$rss->load("http://wordpress.org/news/feed");

$feed = array();

foreach($rss->getElementsByTagName('item') as $item){
	echo "<p>" . $item->getElementsByTagName('title')->item(0)->nodeValue . "</p>";
	echo "<p>" . $item->getElementsByTagName('link')->item(0)->nodeValue . "</p>";
	echo "<p>" . $item->getElementsByTagName('pubDate')->item(0)->nodeValue . "</p>";
}