<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $template['title']; ?></title>
<?php include_once('_css.php')?>
<?php include_once('_script.php')?>
<style type="text/css">
    #menuabout{top:17px !important;}
    #FB{top:40px !important;}
</style>
</head>

<body>
<div id="wrap">
    <div class="main">
  <div id="col1">
            <?php include_once('_header.php');?>
        <div class="clr"></div>      
        <div id="col_1a">
            <?php include_once('_left.php');?>
        </div>
    
       
        <div id="col_2a">
            <?php echo $template['body'] ?>
            <div class="breadcrumbs"><span class="text_breadcrumbs">ประวัติสมาคม</span></div>
            <div id="content">xxxxxxxxxxxxxxxxx xxxxxxxxxxxx xxxxxxxxxxxx x xx xxxxxxxxxxxxxxxxxxx xxxxxx xxxx</div>
            
        </div>
      </div>
  </div>

</div>
    <div class="clr"></div>
    <?php include_one('_footer.php');?>
</div>

</body>
</html>
