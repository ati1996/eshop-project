var button=document.getElementById("result");

button.addEventListener("click",handle);

function handle(e)
{
	var finalresult="";
	for(var i=1;i<6;i++)
	{
		var useranswer=document.getElementsByName(i.toString());
		for(var j=0;j<4;j++)
		{
			if(useranswer[j].checked)
			{
				var temp=j+1;
				finalresult+=i+"_"+temp+",";
				break;
			}
		}
			
	}
	$.ajax({
		type : "POST",
		url : "check.php",
		data : "result="+finalresult,
		success : function(data){
			$("#javab").html(data);
		}
	});
	
}