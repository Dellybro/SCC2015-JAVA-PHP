<?php

include("Book.php");

class Model{
	public function getBook($title){
		$allbooks = $this->getBookList();

		return $allbooks[$title];
	}
	public function getBookList(){
		return array(
			"HarryP1" => new Book("HarryP1", "J.K. Rowling", "My First F Book"),
			"HarryP2" => new Book("HarryP2", "J.K. Rowling", "My Second F Book"),
			"HarryP3" => new Book("HarryP3", "J.K. Rowling", "My Fourth F Book"),
			"HarryP4" => new Book("HarryP4", "J.K. Rowling", "My Third F Book")
		);
	}

}