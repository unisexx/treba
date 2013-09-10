<?php

class Close extends Public_Controller
{
	function __construct()
	{	
		parent::__construct();
		$this->template->set_layout('webboard');
	}
	
	function index()
	{
		$data['webboard_status_config'] = new webboard_status_config(1);
		$this->template->build('webboard_close',$data);
	}
	
	function inc_home()
	{
		$webboard_quizs = new Webboard_quiz();
		$data['webboard_quizs'] = $webboard_quizs->order_by("id", "desc")->limit(8, 0)->get();
		$this->load->view('inc_index',$data);
	}
	
}

?>