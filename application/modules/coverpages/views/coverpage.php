<?php
 
  function calc_brightness($color) {
    $rgb = hex2RGB($color);
    return sqrt(
       $rgb["red"] * $rgb["red"] * .299 +
       $rgb["green"] * $rgb["green"] * .587 +
       $rgb["blue"] * $rgb["blue"] * .114);          
  }
 
  //http://www.php.net/manual/en/function.hexdec.php#99478
  function hex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
      $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
      $rgbArray = array();
      if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
          $colorVal = hexdec($hexStr);
          $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
          $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
          $rgbArray['blue'] = 0xFF & $colorVal;
      } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
          $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
          $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
          $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
      } else {
          return false; //Invalid hex color code
      }
      return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array
  }  
 
 	$brightness = calc_brightness($coverpage->background);
    $fore_color = ($brightness < 130) ? "#FFFFFF" : "#000000";
?>
 
<!doctype html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>สำนักงานส่งเสริมและสนับสนุนวิชาการ ๑</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" ></script>
	<script type="text/javascript" src="../../media/js/cufon/cufon-yui.js"></script>
	<script type="text/javascript" src="../../media/js/cufon/supermarket_400.font.js"></script>
  <style type="text/css">
    a{color:<?=$fore_color?>;}
    .block img{margin:40px 0 0 0;}
    .block a{font-weight: bold; font-size: 25px; text-decoration: underline;}
  </style>
  <script type="text/javascript">
	$(document).ready(function(){
		Cufon.replace('a');
	});
</script>
</head>
<body style="background:<?=$coverpage->background?>; color:<?=$fore_color?>;">
  <div class="block">
  	<center>
  		<img src="../../<?=$coverpage->image?>">
  		<br /><br />
  		<a href="/new/home">เข้าสู่เว็บไซต์สำนักงานส่งเสริมและสนับสนุนวิชาการ ๑</a>
  	</center>
  </div>
</body>
</html>