<style type="text/css">
#horri_menu{
	border-bottom:2px solid #0080C0;
}
#horri_menu ul li{
	float:left;
	padding:5px;
	background:#f4f4f4;
	border-right:1px solid #ddd;
}
#horri_menu ul li.active{
	background:#0080C0;
}
#horri_menu ul li.active a{
	color:#fff;
}
</style>
<div id="horri_menu">
    <ul>
    	<li <?php echo menu_active('newsletters','newsletters')?>><a href="newsletters/admin/newsletters">บันทึกจดหมายข่าว</a></li>
		<!-- <li <?php echo menu_active('newsletters','categories')?>><a href="newsletters/admin/categories/member_index">สมาชิกในกลุ่มข่าว</a></li> -->
		<li <?php echo menu_active('newsletters','newsletters_email_lists')?>><a href="newsletters/admin/newsletters_email_lists">อีเมล์ที่รับข่าวสาร</a></li>
    </ul>
	<br class="clear">
</div>