<?php
class Hilights extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['hilights'] = new Hilight();
		if(@$_GET['status'])$data['hilights']->where('status',$_GET['status']);
		$data['hilights']->order_by('id','desc')->get_page();
		$this->template->append_metadata(js_lightbox());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/hilight_index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['hilight'] = new Hilight($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/hilight_form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$hilight = new Hilight($id);
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			if($_FILES['image']['name'])
			{
				if($hilight->id){
					$hilight->delete_file($hilight->id,'uploads/hilight','image');
				}
				$_POST['image'] = $hilight->upload($_FILES['image'],'uploads/hilight/',713,219);
			}
			$hilight->from_array($_POST);
			$hilight->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect('hilights/admin/hilights');
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$hilight = new Hilight($id);
			$hilight->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('hilights/admin/hilights');
	}

	function approve($id)
	{
		if($_POST)
		{
			$hilight = new Hilight($id);
			$_POST['approve_id'] = $this->session->userdata('id');
			$hilight->approve_date = date("Y-m-d H:i:s");
			$hilight->from_array($_POST);
			$hilight->save();
			echo approve_comment($hilight);
		}

	}
	

}
?>