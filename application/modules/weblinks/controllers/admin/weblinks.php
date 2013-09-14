<?php
class Weblinks extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['weblinks'] = new Weblink();
		$data['weblinks']->order_by('id','desc')->get_page();
		$this->template->append_metadata(js_lightbox());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['weblink'] = new Weblink($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$weblink = new Weblink($id);
            // $_POST['slug'] = clean_url($_POST['title']);
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			if($_FILES['image']['name'])
			{
				if($id)$weblink->delete_file($weblink->id,'uploads/weblink/thumbnail','image');
				$weblink->image = $weblink->upload($_FILES['image'],'uploads/weblink/');
			}
			$weblink->from_array($_POST);
			$weblink->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect($_POST['referer']);
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$weblink = new Weblink($id);
			$_POST['approve_id'] = $this->session->userdata('id');
			$weblink->approve_date = date("Y-m-d H:i:s");
			$weblink->from_array($_POST);
			$weblink->save();
			echo approve_comment($weblink);
		}

	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$weblink = new Weblink($id);
			$weblink->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
}
?>