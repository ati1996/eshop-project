var form={
	email: document.getElementById("email"),
	pass1: document.getElementById("pass1"),
	pass2: document.getElementById("pass2"),
	etebar: document.getElementById("etebar"),
	chemail: document.getElementById("chemail"),
	chpass2: document.getElementById("chpass2")
};

form.email.addEventListener("keyup",checkemail); // چک کردن درستی ایمیل
form.pass1.addEventListener("keypress",notspace); // حساب نکردن کاراکتر فاصله در پسورد
form.pass2.addEventListener("keypress",notspace); // حساب نکردن کاراکتر فاصله در پسورد
form.pass2.addEventListener("keyup",checkpass2); // چک کردن درستی تکرار رمز عبور
form.pass1.addEventListener("keyup",checkpass1); // اعتبار سنجی رمز عبور از نظر قوی بودن 

/////////////

var reemail=/[a-z0-9]+\@+[a-z]+\.+[a-z]/;
function checkemail(e)
{
	
	if(!reemail.test(form.email.value))
		{
			form.chemail.textContent="your email is worng";
			form.chemail.style.color="red";
		}
	else
		{
			form.chemail.textContent="your email is correct";
			form.chemail.style.color="green";
		}
	e.preventDefault();
}

////////////

function notspace(e)
{
	if(e.charCode==32)
		{
			e.preventDefault();
		}
}

/////////////

function checkpass2(e)
{

	if(form.pass1.value == form.pass2.value)
		{
			form.chpass2.textContent="password cadrs is equal";
			form.chpass2.style.color="green";
		}
	else
		{
			form.chpass2.textContent="password cadrs is not equal";
			form.chpass2.style.color="red";
		}
}

/////////////

var strtext=["weak","avrege","strong"];
var strcolor=["red","yellow","green"];

function checkpass1(e)
{
	var pass=form.pass1.value;
	
	var weak=pass.match(/[a-z]/g); // نتیجه true یا false است
	weak=(weak && weak.length || 0);  // نتیجه صفر یا یک میشود 
	
	var avrege=pass.match(/\d/g);  // d یعنی اعداد 
	avrege=(avrege && avrege.length || 0);
	
	var strong=pass.match(/w/g); // W یعنی کاراکتر های خاص
	strong=(strong && strong.length || 0);
	
	var emtiyaz=pass.length + weak + (avrege*2) + (strong*3);
	emtiyaz=Math.min(Math.floor(emtiyaz/10),2); // نتیجه 1 یا 2 یا 3 میشود 
	
	form.etebar.textContent=strtext[emtiyaz];
	form.etebar.style.color=strcolor[emtiyaz];
}
