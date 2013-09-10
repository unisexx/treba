<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml" xml:lang="th" lang="th" dir="ltr">
<head>
	<base href="<?php echo base_url(); ?>" />
	<meta content='text/html; charset=UTF-8' http-equiv='Content-Type'/>
	<meta content='kpoplover' name='author'/>
	<meta content='kpoplover' name='copyright'/>
	<meta content='kpoplover' name='Organization-Name'/>
	<meta content='TH' name='Organization-Country-Code'/>
	<meta content='Thailand' name='Country'/>
	<meta property="fb:app_id" content="136698876474938">
	<meta property="fb:admins" content="100000675258786">
	<link rel="shortcut icon" href="<?=base_url()?>/favicon.ico">
	<link rel="canonical" href="http://www.kpoplover.com<?=@$_SERVER['PATH_INFO']?>" />
	<title><?php echo $template['title'] ?></title>
	<? include "_css.php";?>
	<?php echo $template['metadata'] ?>
	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
	<? include "_header.php";?>
    <div class="container">
        <div class="row">
            <div class="span9">
                <?php echo $template["body"] ?>
                <?php echo modules::run('banners/inc_home_footer');?>
            </div>
            <div class="span3">
                <?include "_sidebar.php";?>
            </div>
        </div>
    </div>
    <? include "_footer.php";?>
    <? include "_script.php";?>
</body>
</html>