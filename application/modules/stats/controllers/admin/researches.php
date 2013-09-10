<?php
class Researches extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index(){
		$data['researchs'] = new Research();
		$data['researchs']->order_by('id','desc')->get_page();
		$this->template->append_metadata(js_lightbox());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build("admin/research_index",$data);
	}
	
	function form($id=false){
		$data['research'] = new Research($id);
		$data['attachs'] = new Attach_file();
		$data['attachs']->where("content_id = ".$id." and module = 'researches'")->get();
		$this->template->append_metadata(js_datepicker());
		$this->template->build("admin/research_form",$data);
	}
	
	function save($id=false){
		if($_POST){
			$research = new Research($id);
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			$_POST['start_date'] = Date2DB($_POST['start_date']);
			$_POST['end_date'] = Date2DB($_POST['end_date']);
			$research->from_array($_POST);
			$research->save();
			$id = $research->id;
			$research->clear();
			
			foreach($_POST['file'] as $key=>$item){
				if($item){
					$attach = new Attach_file();
					$attach->from_array(array('content_id' => $id,'module'=>'researches','file_name'=>$_POST['file_name'][$key],'file'=>$item));
					$attach->save();
				}
			}
			set_notify('success', lang('save_data_complete'));
		}
		redirect($_POST['referer']);
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$research = new Research($id);
			$_POST['approve_id'] = $this->session->userdata('id');
			$research->from_array($_POST);
			$research->save();
		}

	}

	function delete($id=FALSE)
		{
			if($id)
			{
				$research = new Research($id);
				$research->delete();
				$attach = new Attach_file();
				$attach->where("content_id = ".$id)->get();
				foreach($attach as $item) $item->delete();
				set_notify('success', lang('delete_data_complete'));
			}
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
?>