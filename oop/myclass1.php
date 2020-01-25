<?php
class myclass1
{
	private $_name;
	private $_family;
	private $_email;
/*	public function setname($name)
	{
		$this->_name=$name;
	}
	public function getname()
	{
		return $this->_name;
	}*/
	public function __set($name,$value)
	{
		$name="_".$name;
		if(property_exists($this,$name))
		{
			$this->$name=$value;
		}
		else
		{
			trigger_error("مورد یافت نشد");
		}
	}
	public function __get($name)
	{
		$name="_".$name;
		if(property_exists($this,$name))
		{
			return $this->$name;
		}
		else
		{
			trigger_error("this property not exists");
		}
	}
	public function __toString()
	{
		return "$this->_name : $this->_family : $this->_email";
	}
	
}



?>