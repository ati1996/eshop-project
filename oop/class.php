<?php
class father
{
	protected $name="ali";
	private $family="alavi";
	public function __construct()
	{
		
	}
}

class child extends father
{
	function print_s()
	{
		return $this->name;
	}
		
}


?>