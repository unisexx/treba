<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<base href="<?php echo base_url(); ?>" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<title><?php echo $template['title']; ?></title> 
        <link rel="shortcut icon" type="image/x-icon" href="http://www.zulex.co.th/favicon.ico">
		<link rel="stylesheet" href="media/css/reset.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="media/css/default.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="media/css/pagination.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="themes/admin/media/css/stylesheet.css" type="text/css" media="screen" charset="utf-8" /> 
		<link type="text/css" href="media/css/icons.css" rel="stylesheet" />
		<script src="media/js/jquery-1.4.2.min.js" type="text/javascript"></script>
		<!-- <script src="media/js/jquery-ui-1.8.20/js/jquery-ui-1.8.20.custom.min.js" type="text/javascript"></script> -->
		<script type="text/javascript" src="media/js/jquery.corner.js"></script>
		<script type="text/javascript" src="media/js/jquery.popupWindow.js"></script>
		<script type="text/javascript" src="themes/admin/media/js/default.js"></script>
        
        <script src="media/js/jquery.bgiframe.min.js" type="text/javascript"></script>
		<script src="media/js/jquery.multiSelect.js" type="text/javascript"></script>
        <link href="media/css/jquery.multiSelect.css" rel="stylesheet" type="text/css" />
		<?php echo $template['metadata']; ?>
	</head>
	<body>
	<div id="header"><?php include_once('_header.inc.php'); ?></div> 
		<div id="container">
			<div id="menu"><?php include_once '_menu.inc.php'; ?></div> 
			<div id="content"><div class="inner"><?php echo $template['body']; ?></div></div> 
			<div style="clear:both;"></div>
		</div> 
		<div id="footer"></div> 
	</body>
</html>