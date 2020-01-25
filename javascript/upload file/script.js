window.addEventListener("load",function(e)
{					   
	var submit=document.getElementById("submit");
	submit.addEventListener("click",handlerupload);
});

var handlerupload=function(e) // میتوان به این شکل هم تابع را نعریف کرد
{
	e.preventDefault();
	var fileinput=document.getElementById("file");
	var data=  new FormData(); //فایل ها را یکی یکی در شی ای به نام دیتا که از کلاس فرم دیتا است ذخیره میکنیم
	//alert(fileinput.files.length);
	for(var i=0;i<fileinput.files.length;i++) // تعداد فایل های آپلودی را میدهد fileinput.files.length
		{
			data.append("files[]"),fileinput.files[i];
		}
	var request=new XMLHttpRequest(); // باید در ابتدا نوع مرورگر را بررسی کنیم
	request.upload.addEventListener("progress",function(event){
		if(event.lengthComputable) // یعنی قابل محاسبه است یا نه برای جلوگیری از ارور  lengthcomputable
			{
				var percent=event.loaded/event.total;
				var result=percent*100;
				var r=document.getElementById("result");
				r.innerHTML=result+"%";
			}
	});
	request.upload.addEventListener("load",function(event){});  // یعمی در شروع آپلود 
	request.upload.addEventListener("error",function(event){
		alert ("there is error");
	});
	request.open("POST","upload.php");
	request.setRequestHeader("Cache-Control","no-cache");
	request.send(data);
}