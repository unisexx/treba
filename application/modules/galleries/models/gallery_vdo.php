<?php
class Gallery_vdo extends ORM {

	var $table = '( select id,image from galleries union (select id,cover_pic as image from vdos) )as gallery_vdbo ';	
	

	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>