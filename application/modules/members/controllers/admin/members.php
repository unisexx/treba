<?php
class Members extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['members'] = new member();
		if(@$_GET['code'])$data['members']->where("code like '%".$_GET['code']."%'");
		if(@$_GET['company'])$data['members']->where("company like '%".$_GET['company']."%'");
		// if(@$_GET['category_id'])$data['members']->where("category_id = ".$_GET['category_id']);
		$data['members']->order_by('id','desc')->get_page();
		$this->template->append_metadata(js_lightbox());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['member'] = new member($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$member = new member($id);
            $_POST['slug'] = clean_url($_POST['company']['th']);
            $_POST['company'] = lang_encode($_POST['company']);
            $_POST['name'] = lang_encode($_POST['name']);
            $_POST['address'] = lang_encode($_POST['address']);
            $_POST['record'] = lang_encode($_POST['record']);
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			if($_FILES['image']['name'])
			{
				if($id)$member->delete_file($member->id,'uploads/member/thumbnail','image');
				$member->image = $member->upload($_FILES['image'],'uploads/member/');
			}
			$member->from_array($_POST);
			$member->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect($_POST['referer']);
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$member = new member($id);
			$_POST['approve_id'] = $this->session->userdata('id');
			$member->approve_date = date("Y-m-d H:i:s");
			$member->from_array($_POST);
			$member->save();
			echo approve_comment($member);
		}

	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$member = new member($id);
			$member->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
}
?>