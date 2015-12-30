<?php


class Book{

	public $title, $author, $desc;

	public function __construct($title, $author, $desc){
		$this->title = $title;
		$this->author = $author;
		$this->desc = $desc;
	}

}

?>