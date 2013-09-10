<?php
class Contact extends ORM {

    var $table = 'contacts';

	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>