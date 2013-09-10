$(document).ready(function(){	
	$(".corner").corner();
	$(".corner-top").corner("top");
	$(".corner-bottom").corner("bottom");
	$.post("home/feed");
});
  
  
  