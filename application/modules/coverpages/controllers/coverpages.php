<?php
class Coverpages extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index($id){
		$data['coverpage'] = new Coverpage($id);
		$this->load->view('coverpage',$data);
	}
}
?>