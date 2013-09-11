<?php
class Links extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['links'] = new Link();
		// if(@$_GET['search'])$data['links']->where("title like '%".$_GET['search']."%'");
		// if(@$_GET['status'])$data['links']->where('status',$_GET['status']);
		// if(@$_GET['category_id'])$data['links']->where("category_id = ".$_GET['category_id']);
		$data['links']->order_by('id','desc')->get_page();
		$this->template->append_metadata(js_lightbox());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['link'] = new Link($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$link = new Link($id);
            $_POST['slug'] = clean_url($_POST['title']);
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			$link->from_array($_POST);
			$link->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect($_POST['referer']);
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$link = new Link($id);
			$_POST['approve_id'] = $this->session->userdata('id');
			$link->approve_date = date("Y-m-d H:i:s");
			$link->from_array($_POST);
			$link->save();
			echo approve_comment($link);
		}

	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$link = new link($id);
			$link->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
}
?>