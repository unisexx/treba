<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <base href="<?php echo base_url(); ?>" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="<?=base_url()?>/favicon.ico">
    <title><?php echo $template['title'] ?></title>
    <? include "_css.php";?>
    <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
    <?php echo $template['metadata'] ?>
</head>

<body style="margin:0;padding:0;">
    <?php echo $template["body"] ?>
    <? include "_script.php";?>
</body>