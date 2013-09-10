<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<base href="<?php echo base_url()?>" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Warispa</title>
		<script type="text/javascript" src="media/js/swfobject.js"></script>
		<script type="text/javascript" src="media/js/CU3ER.js"></script>
		<script type="text/javascript">
		  // add your FlashVars
		  var vars = { xml_location : 'media/xml/config.xml', images : 'uploads/image/slideshow/slide1.jpg' };
		  // add Flash embedding parameters, etc. wmode, bgcolor...
		  var params = { bgcolor : '#ffffff' };
		  // Flash object attributes id and name
		  var attributes = { id:'CU3ER', name:'CU3ER' };
		  // dynamic embed of Flash, set the location of expressInstall if needed
			swfobject.embedSWF('media/swf/CU3ER.swf', "CU3ER", 940, 300, "10.0.0", "media/swf/expressinstall.swf", vars, params, attributes );
		  // initialize CU3ER class containing Javascript controls and events for CU3ER
		  var CU3ER_object = new CU3ER("CU3ER");
		</script>
		<!-- CU3ER content JavaScript part ends here   -->
	</head>
	<body>
		<div id="CU3ER" style="margin:0 auto;margin-top:200px;">
		      <!-- modify this content to provide users without Flash or enabled Javascript with alternative content information -->
		      <p>Click to get Flash Player<br /><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player" /></a></p>
		      <p>or try to enable JavaScript and reload the page
		      </p>
		  </div>
	</body>
</html>