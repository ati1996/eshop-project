<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> eshop admin panel</title>
<style type="text/css">
	 /*-------------- RESET STYLE ------------------ */
	html, body, div, span, applet, object, iframe,
	h1, h2, h3, h4, h5, h6, p, blockquote, pre,
	a, abbr, acronym, address, big, cite, code,
	del, dfn, em, font, img, ins, kbd, q, s, samp,
	small, strike, strong, sub, sup, tt, var,
	b, u, i, center,
	dl, dt, dd, ol, ul, li,
	fieldset, form, label, legend,
	table, caption, tbody, tfoot, thead, tr, th, td {
		margin: 0;
		padding: 0;
		border: 0;
		outline: 0;
		background: transparent;
	}
	body
	{
		background-image: url("pic/229485.jpg");		
		background-attachment: fixed;
		
	}
	
	#top
	{
		background-color:#484848;
		height: 50px;
		width: 1270px; 
		border-radius: 5px;
		padding: 15px;
		font-family: bhoma;
		font-size: 24px;
		color: beige;
		margin: auto;
		margin-top: 20px;	
	}
	#top_wellcom
	{
		margin-top: -15px;
	}
	#top_exit
	{
		float: left;
	}
	#img_admin
	{
		float: right;
		margin: -5px 10px 0px 10px;
	}
	@font-face
	{
		font-family: bhoma;
		src: url("font/bhoma.ttf");
	}
	#img-exit
	{
		float: left;
		margin: -5px 10px 0px 10px;
	}
	#content
	{
		width: 1300px;
		height: auto;;
		margin: auto;
		margin-top: 50px;
		font-family: bhoma;
		
	}
	#rmenu
	{	
		width: 250px;
		height: 550px;
		float: right;
		border-radius: 10px;
		background-color: #D9D9D9;
	}
	#lmenu
	{
		width: 930px;
		height: 475px;
		background-color:#B0B0B0;
		color: #272727;
		float: right;
		margin-right: 40px;
		border-radius: 10px;
		padding: 40px;
		
	}
	#rmenu-ul
	{
		float: right;
		direction: rtl;
		margin-right: 50px;
		margin-top: 15px;
		color: #272727;
		padding-left: 50px;
		list-style: none;
		list-style-image: url("pic/bullet_blue.png");
		
	}
	#rmenu-ul li
	{
		padding-bottom: 14px;
	}
	#rmenu-ul a
	{
		text-decoration: none;
		color: #272727;
	}
	#rmenu-ul a:hover
	{
		color: #585858;
	}
	

		
</style>
	
<script type="text/javascript">
	function exit()
	{
		var x=confirm(" واقعا می خوایی بری ؟  :(");
		if(x==true)
			{
				window.location.href="logout.php";
			}
		else
			{
				
			}
	}
	
	
</script>
</head>

<body>
	<?php
	include("../funcs/connect.php");
	if($_SESSION["admin_login"])
	{
		if(isset($_GET["user"]))
		{
			$sql="SELECT * FROM `admin` WHERE username='".$_GET["user"]."'";
			$result=$connect->query($sql);
			foreach($result as $rows)
			{	
	?>
					<div id=top align=right>  
						<img src="pic/icons8-administrator-male-100.png" width="60px" id="img_admin">
						<span id="top_wellcom">
						سلام مدیر   <?php echo $rows["fname"]." ".$rows["lname"]; ?>
						</span>
						&nbsp; &nbsp; &nbsp;
						<span id="top_wellcom">
						زمان آخرین ورود شما :   <?php echo "&nbsp".$rows["last-date-login"]."&nbsp &nbsp".$rows["last-time-login"]; ?>
						</span>
						<span id="top_exit"> خروج </span>
						<a href="#" onClick="exit();">
							<img  id="img-exit" src="pic/icons8-external-link-500.png" width="60px" height="60px" alt="exit" >
						</a>
					</div>	
	<?php			
			}
	?>	
	
			<div id="content">
				<div id="rmenu">
					<ul id="rmenu-ul">
						<li><a href="cat/cat-manage.php" target="frame">مدیریت دسته ها</a></li>
						<li><a href="product/manage-product.php" target="frame">مدیریت محصول ها</a></li>
						<li><a href="product/insert-product.php" target="frame">افزودن محصول ها</a></li>
						<li><a href="order/manage-order.php" target="frame">مدیریت سفارش ها</a></li>
						<li><a href="comment/manage-comment.php" target="frame">مدیریت نظر ها</a></li>
						<li><a href="users/manage-users.php" target="frame">مدیریت کاربر ها</a></li>
						<li><a href="users/insert-users.php" target="frame">افزودن کاربر ها</a></li>
						<li><a href="friends-link/manage-link.php" target="frame">مدیریت پیوند ها</a></li>
						<li><a href="news/manage-news.php" target="frame">مدیریت اخبار</a></li>
						<li><a href="news/insert-news.php" target="frame">افزودن اخبار</a></li>
						<li><a href="account/manage-account.php" target="frame">مدیریت حساب مدیر</a></li>
						<li><a href="../index.php" target="_blank">نمایش فروشگاه</a></li>
					</ul>
					
				</div>
				<div id="lmenu">
					<iframe width="930px" height="460px;" name="frame" >
			
					</iframe>
				</div>	
			</div>
		
	<?php	
		}
	}
	else
	{
		header("location:login.php");
	}
	?>
</body>
</html>