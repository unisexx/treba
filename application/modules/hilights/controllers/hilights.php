<?php
class Hilights extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function inc_home()
	{
        $data['hilights'] = new Hilight();
        $data['hilights']->order_by('id','desc')->get();
		$this->load->view('inc_home_aviaslider',$data);
	}
}
?>