<?php
class Calendars extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->template->build('admin/calendar_index');
	}
	
	function events_move()
	{
		//$this->db->debug = TRUE;
		$calendar = New Calendar($_POST['id']);
		if($_POST['start'])
		{
			list($y,$m,$d) = explode('-', $calendar->start);
			$_POST['start'] =  date("Y-m-d", mktime(0, 0, 0, $m, $d + $_POST['start'], $y));
		}
		if($_POST['end'])
		{
			list($y,$m,$d) = explode('-', $calendar->end);
			$_POST['end'] =  date("Y-m-d", mktime(0, 0, 0, $m, $d + $_POST['end'], $y));
		}
		$calendar->from_array($_POST);
		$calendar->save();
	}
	
	function events()
	{
		$calendar = New Calendar();
		$events = $calendar->get()->all_to_array();
		echo json_encode($events);
		//echo json_encode($events);
	}	
	
	function form($id = FALSE)
	{
		$data['calendar'] = New Calendar($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/calendar_form',$data);
	}
	
	function save($id = FALSE)
	{
		if($_POST)
		{
			$calendar = New Calendar($id);
			$_POST['user_id'] = $this->session->userdata('id');
			$_POST['start'] = Date2DB($_POST['start']);
			$_POST['end'] = ($_POST['end']) ? Date2DB($_POST['end']) : $_POST['start'];
			$calendar->from_array($_POST);
			$calendar->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect('calendars/admin/calendars');
	}
	
	function delete($id)
	{
		if($id)
		{
			$calendar = New Calendar($id);
			$calendar->delete();
			set_notify('success', lang('delete_data_complete'));
		} 
		redirect('calendars/admin/calendars');		
	}
}
?>