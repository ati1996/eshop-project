/*var prev=document.getElementById("prev");
var next=document.getElementById("next");
var slider=document.getElementById("slider");

var i=1;

next.onclick=function()
{
	switch(i)
		{
			case 1 :
				slider.innerHTML="<img src=1.jpg width=100% height=100%>";
				break;
			case 2 :
				slider.innerHTML="<img src=2.jpg width=100% height=100%>";
				break;
			case 3 :
				slider.innerHTML="<img src=3.jpg width=100% height=100%>";
				break;
			case 4 :
				slider.innerHTML="<img src=4.jpg width=100% height=100%>";
				i=0;
				break;
		}
	i++;
}

prev.onclick=function()
{
		switch(i)
		{
			case 1 :
				slider.innerHTML="<img src=1.jpg width=100% height=100%>";
				i=5;
				break;
			case 2 :
				slider.innerHTML="<img src=2.jpg width=100% height=100%>";
				break;
			case 3 :
				slider.innerHTML="<img src=3.jpg width=100% height=100%>";
				break;
			case 4 :
				slider.innerHTML="<img src=4.jpg width=100% height=100%>";
				break;
		}
	i--;
}*/


var i=1;
var slider=document.getElementById("slider");
var caption=document.getElementById("caption");


setInterval(function()
		   {
	switch(i)
		{
			case 1 :
				slider.innerHTML="<img src=1.jpg width=100% height=100%>";
				caption.innerHTML="<h1 style=color:#ff0;> description about 1 image </h1>";
				break;
			case 2 :
				slider.innerHTML="<img src=2.jpg width=100% height=100%>";
				caption.innerHTML="<h1 style=color:#f0f;> description about 2 image </h1>";
				break;
			case 3 :
				slider.innerHTML="<img src=3.jpg width=100% height=100%>";
				caption.innerHTML="<h1 style=color:#0ff;> description about 3 image </h1>";
				break;
			case 4 :
				slider.innerHTML="<img src=4.jpg width=100% height=100%>";
				caption.innerHTML="<h1 style=color:#00f;> description about 4 image </h1>";
				i=0;
				break;
		}
	i++;
},2000);