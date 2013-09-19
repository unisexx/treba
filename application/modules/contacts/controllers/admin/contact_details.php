<?php
class Contact_Details extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function form($id=FALSE)
	{
		$data['contact'] = new Contact_detail($id);
		$this->template->build('admin/detail_form',$data);
	}

	function save($id=false){
		if($_POST){
            $contact = new Contact_detail($id);
            $_POST['slug'] = clean_url($_POST['title']['th']);
            $_POST['title'] = lang_encode($_POST['title']);
            $_POST['detail'] = lang_encode($_POST['detail']);
            if(!$id)$_POST['user_id'] = $this->session->userdata('id');
            $contact->from_array($_POST);
            $contact->save();
            set_notify('success', lang('save_data_complete'));
        }
        redirect($_SERVER['HTTP_REFERER']);
	}
}
?>