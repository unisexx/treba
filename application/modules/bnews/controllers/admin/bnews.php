<?php
class Bnews extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['bnews'] = new Bnew();
		// if(@$_GET['search'])$data['bnews']->where("title like '%".$_GET['search']."%'");
		// if(@$_GET['status'])$data['bnews']->where('status',$_GET['status']);
		// if(@$_GET['category_id'])$data['bnews']->where("category_id = ".$_GET['category_id']);
		$data['bnews']->order_by('id','desc')->get_page();
		$this->template->append_metadata(js_lightbox());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['bnew'] = new bnew($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$bnew = new bnew($id);
            $_POST['slug'] = clean_url($_POST['title']['th']);
            $_POST['title'] = lang_encode($_POST['title']);
            $_POST['detail'] = lang_encode($_POST['detail']);
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			if($_FILES['image']['name'])
			{
				if($id)$bnew->delete_file($bnew->id,'uploads/bnew/thumbnail','image');
				$bnew->image = $bnew->upload($_FILES['image'],'uploads/bnew/');
			}
			$bnew->from_array($_POST);
			$bnew->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect($_POST['referer']);
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$bnew = new bnew($id);
			$_POST['approve_id'] = $this->session->userdata('id');
			$bnew->approve_date = date("Y-m-d H:i:s");
			$bnew->from_array($_POST);
			$bnew->save();
			echo approve_comment($bnew);
		}

	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$bnew = new bnew($id);
			$bnew->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
}
?>