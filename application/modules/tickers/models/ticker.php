<?php
class Ticker extends ORM {

    var $table = 'tickers';
	
	//var $has_one = array('user');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>