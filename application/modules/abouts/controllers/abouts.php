<?php
class Abouts extends Public_Controller{
	
	function __construct(){
		parent::__construct();
		$this->template->set_theme('tpso1');
		$this->template->set_layout('about');
	}
	
	function index($id){
		$data['about'] = new About($id);
		$this->template->build('about_index',$data);
	}
}
?>
