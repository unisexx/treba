<?php
class Downloads extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['downloads'] = new Download();
		// if(@$_GET['search'])$data['downloads']->where("title like '%".$_GET['search']."%'");
		// if(@$_GET['status'])$data['downloads']->where('status',$_GET['status']);
		// if(@$_GET['category_id'])$data['downloads']->where("category_id = ".$_GET['category_id']);
		$data['downloads']->order_by('id','desc')->get_page();
		$this->template->append_metadata(js_lightbox());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['download'] = new Download($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$download = new Download($id);
            $_POST['slug'] = clean_url($_POST['title']);
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			if($_FILES['file']['name'])
			{
				$download->file = $download->upload($_FILES['file'],'uploads/download/');
			}
			$download->from_array($_POST);
			$download->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect($_POST['referer']);
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$download = new Download($id);
			$_POST['approve_id'] = $this->session->userdata('id');
			$download->approve_date = date("Y-m-d H:i:s");
			$download->from_array($_POST);
			$download->save();
			echo approve_comment($download);
		}

	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$download = new Download($id);
			$download->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
    
    function download($id){
        if($id){
            $download = new Download($id);
            $data = file_get_contents('uploads/download/'.urldecode($download->file));
            $name = basename($download->file);
            force_download($name, $data); 
        }
    }
}
?>