jQuery(document).ready(function(){
	$("#iconbar li").hover(
		function(){
			$(this).find("span").attr({
				"style": 'display:inline'
			});
			$(this).find("span").animate({opacity: 1, top: "-60"}, {queue:false, duration:400});
		}, 
		function(){
			$(this).find("span").animate({opacity: 0, top: "-50"}, {queue:false, duration:400}, "linear",
				function(){
					$(this).find("span").attr({"style": 'display:none'});			
				}
			);
		});
});