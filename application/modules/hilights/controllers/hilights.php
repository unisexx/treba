<?php
class Hilights extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function inc_home()
	{
		// $data['hilights'] = new Hilight();
		// $data['hilights']->where("status = 'approve'")->order_by('id','random')->limit(5)->get();
		// $data['hilights'] = new Kpop_new();
        // $data['hilights']->where("status = 'approve'")->order_by('id','desc')->get_page(5);
        $vdo = new Vdo();
        $data['hilights'] = $vdo->where_related("category","status = 'approve'")->order_by('id','desc')->limit(5)->get();
		$this->load->view('inc_home2',$data);
	}
}
?>