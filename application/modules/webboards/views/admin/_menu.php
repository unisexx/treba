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
    	<li <?php echo menu_active2('webboards','webboard_status_configs')?>><a href="webboards/admin/webboard_status_configs">ตั้งค่าทั่วไป</a></li>
		<li <?php echo menu_active2('webboards','webboard_post_levels')?>><a href="webboards/admin/webboard_post_levels">จัดการกลุ่มผู้ใช้</a></li>
        <li <?php echo menu_active2('webboards','webboard_categories')?>><a href="webboards/admin/webboard_categories">จัดการกระดานข่าว</a></li>
        <li <?php echo menu_active2('webboards','webboard_quizs')?>><a href="webboards/admin/webboard_quizs">จัดการกระทู้</a></li>
		<li <?php echo menu_active2('webboards','webboard_relate_dels')?>><a href="webboards/admin/webboard_relate_dels">แจ้งลบความเห็น</a></li>
		<li <?php echo menu_active2('webboards','webboard_bad_words')?>><a href="webboards/admin/webboard_bad_words">กรองคำหยาบ/กรองลิ้งค์</a></li>
    </ul>
	<br class="clear">
</div>
