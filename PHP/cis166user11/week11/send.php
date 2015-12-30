<?php


$post = array();

$post[] = array('City'=>'Phoenix', 'State'=>'Arizona');

header("content-type:application/json");
foreach($post as $index=>$item){
	if(is_array($item)){
		foreach($item as $key=>$value){
			echo '<' . $key . '>';
			if(is_array($value)){
				foreach($value as $tag=>$val){
					echo '<' . $tag . '>';
					echo htmlentities($val);
					echo '</'.$tag.'>';
				}
			}
			echo '</'.$key.'>';
		}
	}
	echo '</'.$index.'>';
}