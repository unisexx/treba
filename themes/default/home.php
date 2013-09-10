<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<base href="<?php echo base_url(); ?>" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<title><?php echo $template['title']; ?></title> 
		<link rel="stylesheet" href="media/css/reset.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="media/css/default.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="media/css/pagination.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="themes/default/media/css/stylesheet.css" type="text/css" media="screen" charset="utf-8" /> 
		<script src="media/js/jquery-1.4.2.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="media/js/jquery.corner.js"></script>
		<script type="text/javascript" src="media/js/cufon/cufon-yui.js"></script>
		<script type="text/javascript" src="media/js/cufon/supermarket_400.font.js"></script>
		<script type="text/javascript">
			Cufon.replace('#sidebar h1,.title h1, h2, h3, h4, h5, h6, #menu li,.calendar_icon', { hover: true });
		</script>
		<script type="text/javascript" src="themes/default/media/js/default.js"></script>
		<?php echo $template['metadata']; ?>
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-16496558-2']);
		  _gaq.push(['_trackPageview']);
		
		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
	</head>
	<body> 
	<div id="wrapper">
		<div id="header">
			<?php include("_header.php") ?>
			<div id="logo">
				<a href="home"><h1><span>monofolio.com</span></h1></a>
			</div>
			<div id="menu">
				<?php include("_menu.php") ?>
			</div>
		</div>
		<div id="feature">
			<div></div>
		</div>
		<div id="content">
			<div id="main">
				<?php echo $template['body'] ?>
				<?php echo modules::run('contents/inc_home') ?>
			</div>
			<div id="sidebar">
				<?php include("_sidebar.php") ?>
				<?php echo modules::run('contents/inc_sidebar') ?>
			</div>
			<div class="clear"></div>
		</div>
		<div id="footer"><?php include("_footer.php") ?></div>
	</div><!--wrapper-->
	</body>
</html>