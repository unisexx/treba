<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
	<head>
		<base href="<?php echo base_url(); ?>" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
		<title><?php echo $template['title']; ?></title>
		<link rel="stylesheet" href="media/css/reset.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="media/css/default.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="media/css/pagination.css" type="text/css" media="screen" charset="utf-8" />
		<link rel="stylesheet" href="themes/admin/media/css/stylesheet.css" type="text/css" media="screen" charset="utf-8" /> 
		
		<script src="media/js/jquery-1.4.2.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="media/js/jquery.corner.js"></script>
		<script type="text/javascript" src="themes/admin/media/js/default.js"></script>
		<style>
			html,body{
				background:#eee;
				height:auto;
			}
			#frm_login{
				margin:0 auto;
				margin-top:10%;
				width:350px;
				padding:10px;
				border:2px solid #888;
				background:#f9f9f9;
			}
			table.form tr th{
				width:120px;
			}
		</style>
		<?php echo $template['metadata']; ?>
	</head>
	<body>
		<div id="header">&nbsp;</div> 
		<div id="container"><?php echo $template['body']; ?></div> 
		<div id="footer"></div> 
	</body>
</html>