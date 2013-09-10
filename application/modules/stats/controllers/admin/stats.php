<?php
class Stats extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index(){
		$data['stats'] = new Stat();
		$data['stats']->order_by("id","desc")->get_page();
		$this->template->append_metadata(js_lightbox());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build("admin/stat_index",$data);
	}
	
	function form($id=false){
		$data['stat'] = new Stat($id);
		$data['attachs'] = new Attach_file();
		$data['attachs']->where("content_id = ".$id." and module = 'stats'")->get();
		$this->template->append_metadata(js_datepicker());
		$this->template->build("admin/stat_form",$data);
	}
	
	function save($id=false){
		if($_POST){
			$stat = new Stat($id);
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			$_POST['start_date'] = Date2DB($_POST['start_date']);
			$_POST['end_date'] = Date2DB($_POST['end_date']);
			$stat->from_array($_POST);
			$stat->save();
			
			$id = $stat->id;
			$stat->clear();
			
			foreach($_POST['file'] as $key=>$item){
				if($item){
					$attach = new Attach_file();
					$attach->from_array(array('content_id' => $id,'module'=>'stats','file_name'=>$_POST['file_name'][$key],'file'=>$item));
					$attach->save();
				}
			}
			
			set_notify('success', lang('save_data_complete'));
		}
		redirect($_POST['referer']);
	}
	
	function delete($id=false){
		if($id)
		{
			$stat = new Stat($id);
			$stat->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$stat = new Stat($id);
			$_POST['approve_id'] = $this->session->userdata('id');
			$stat->from_array($_POST);
			$stat->save();
		}
	}
	
	function delFile(){
		if($_POST){
			$attach = new Attach_file($_POST['id']);
			$attach->delete();
		}
	}
}
?>