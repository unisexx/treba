<?php
Class Abouts extends Admin_Controller{
	
	function __construct(){
		parent::__construct();	
	}
	
	function form($id=FALSE){
		$data['about'] = new About($id);
		$this->template->build('admin/about_form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST){
			$about = new About($id);
			$_POST['user_id'] = $this->session->userdata('id');
			$about->from_array($_POST);
			$about->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect('abouts/admin/abouts/form/'.$_POST['id']);
	}
	
}
?>