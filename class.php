<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	class person
	{
		public $fname="atefeh";
		public $birthday;
	/*	public function __construct($user_name,$user_birthday)
		{
			$this->fname=$user_name;
			$this->birthday=$user_birthday;
		}*/
		public function hello()
		{
			return "hi user".$this->fname."<br/>";
		}
		public function bye()
		{
			return "<br/>"."bye user".$this->fname."<br/>";
		}
		public function age()
		{
			$a=strtotime($this->birthday);
			$age=time()-$a;
			return "your age : ".floor($age/(24*60*60*365));
		}
	}
	class vares extends person
	{
		public $id;
	}
	class static_class
	{
		public $fname;
		public static $lname=40;
		public static function func1()
		{
			return  self::$lname;
		}
	}
	?>
</body>
</html>