<?php
class Overview extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['groups'] = new Group;
		$data['groups']->get();
		$this->template->build('overview',$data);
		
	}
}
?>