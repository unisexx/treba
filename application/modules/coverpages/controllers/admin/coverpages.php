<?php
class Coverpages extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index(){
		$coverpages = new Coverpage();
		$data['coverpages'] = $coverpages->get_page();
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/cover_index',$data);
	}
	
	function form($id=false){
		$data['coverpage'] = new Coverpage($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/cover_form',$data);
	}
	
	function save($id=false){
		if($_POST){
			$coverpage = new Coverpage($id);
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			$_POST['start_date'] = Date2DB($_POST['start_date']);
			$_POST['end_date'] = Date2DB($_POST['end_date']);
			$coverpage->from_array($_POST);
			$coverpage->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect($_POST['referer']);
	}
	
	function delete($id){
		if($id)
		{
			$coverpage = new Coverpage($id);
			$coverpage->delete();
			set_notify('success', lang('delete_data_complete'));
		} 
		redirect('coverpages/admin/coverpages');
	}
	
	function approve($id)
	{
		if($_POST)
		{
			//$this->db->query("update coverpages set status = '".$id."'")->result();
			$coverpages = new Coverpage();
			$coverpages->get();
			foreach($coverpages as $item){
				$coverpage = new Coverpage($item->id);
				$coverpage->from_array($_POST);
				$coverpage->save();
			}
		}
	}
	
	function approve2($id)
	{
		if($_POST)
		{
			$coverpage = new Coverpage($id);
			$coverpage->from_array($_POST);
			$coverpage->save();
			$coverpage->clear();
			$coverpage->where('id <>', $id)->get();
			$coverpage->update_all('active',0);
		}
	}
	
}
?>