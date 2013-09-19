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
    	<li <?php echo menu_active('contacts','contact_details')?>><a href="contacts/admin/contact_details/form/1">ที่อยู่บริษัท</a></li>
		<li <?php echo menu_active('contacts','contacts')?>><a href="contacts/admin/contacts">กล่องข้อความ</a></li>
    </ul>
	<br class="clear">
</div>
