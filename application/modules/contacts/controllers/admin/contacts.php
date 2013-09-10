<?php
class contacts extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['contacts'] = new contact();
		$data['contacts']->order_by('id','desc')->get_page();
		$this->template->build('admin/index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['contact'] = new contact($id);
		$this->template->build('admin/form',$data);
	}

	function delete($id=FALSE)
	{
		if($id)
		{
			$contact = new Contact($id);
			$contact->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	

}
?>