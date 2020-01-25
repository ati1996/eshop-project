function load()
{
	document.getElementById("result").innerHTML="<img src=image.gif />";   // please wait image
	var name=document.getElementById("txt");
	var xmlhttp;
	if(window.XMLHttpRequest)
		{
			xmlhttp=new XMLHttpRequest();
		}
	else
		{
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	xmlhttp.onreadystatechange=function()
		{
			if(xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					document.getElementById("result").innerHTML=xmlhttp.responseText;
				}
		}
	xmlhttp.open("GET","panel.php?name="+name.value,true);
	xmlhttp.send();

}