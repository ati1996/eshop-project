<!--top header box-->

<div id="top_header">
	<img src="image/online-shopping-center_header.jpg" height="250" width="1300" >
</div>

<!--middel heaser box-->

<div id="middel_header">
	<ul >
		<li>
			<a href="index.php" >صفحه اصلی</a>
		</li>
		<li>
			<a href="#">تماس با ما</a>
		</li>
		<li>
			<a href="#">ارتباط با ما</a>
		</li>
		<li>
			<a href="#">پشتیبانی</a> 
		</li>
		<li>
			<a href="admin/login.php">ورود مدیر</a> 
		</li>
	</ul>
		
</div>

<!--down header box-->
	
<div id="down_header">
	<marquee direction="right">
		<?php
		$sql="SELECT * FROM `news` ORDER BY `news`.`id` DESC ";
		$result=$connect->query($sql);
		foreach($result as $rows)
		{
		?>
			<a href="indexs-news.php?id=<?=$rows["id"] ?>">
				<?=$rows["title"] ?>	
			</a>
			&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<?php
		}
		?>
	</marquee>
</div>