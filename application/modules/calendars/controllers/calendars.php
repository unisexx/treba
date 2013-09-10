<?php
class Calendars extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index($id=FALSE)
	{
		$data['id'] = $id;
		// if($id)
		// {
			// $data['group'] = new group($id);
			// $this->template->set_layout('group_layout');
		// }
		$this->template->build('calendar_index',$data);
	}
	
	function view($id,$group_id=FALSE)
	{
		$type = array("e-blue" => "ประชุม","e-red" => "สัมมา","e-green" => "อบรม","e-violet" => "อื่นๆ");
		$data['calendar'] = new Calendar($id);
		// if($group_id)
		// {
			// $data['group'] = new group($data['calendar']->user->group_id);
			// //$this->template->set_layout('group_layout');
		// }
		$data['calendar']->counter();
		$data['type'] = $type[$data['calendar']->className];
		$this->template->build('calendar_view',$data);
	}
	
	function events($group_id=FALSE)
	{
		$calendar = New Calendar();
		if($group_id) $calendar->where('group_id',$group_id);
		$events = $calendar->get()->all_to_array();
		echo json_encode($events);
	}	
	
	function inc_home($group_id=FALSE)
	{
		$prefs['template'] = '
   		{table_open}<table class="table-calendar">{/table_open}
   			
			{heading_row_start}<tr class="heading">{/heading_row_start}
   				{heading_previous_cell}<th><a href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
   				{heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
   				{heading_next_cell}<th><a href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}
   			{heading_row_end}</tr>{/heading_row_end}
   			
			{week_row_start}<tr class="week">{/week_row_start}
   				{week_day_cell}<td>{week_day}</td>{/week_day_cell}
   			{week_row_end}</tr>{/week_row_end}
   		
			{cal_row_start}<tr>{/cal_row_start}
   				{cal_cell_start}<td>{/cal_cell_start}
   					{cal_cell_content}<a href="{content}">{day}</a>{/cal_cell_content}
   					{cal_cell_content_today}<div class="highlight"><a href="{content}">{day}</a></div>{/cal_cell_content_today}
   					{cal_cell_no_content}{day}{/cal_cell_no_content}
   					{cal_cell_no_content_today}<div class="highlight">{day}</div>{/cal_cell_no_content_today}
   					{cal_cell_blank}&nbsp;{/cal_cell_blank}
   				{cal_cell_end}</td>{/cal_cell_end}
   			{cal_row_end}</tr>{/cal_row_end}
   		
		{table_close}</table>{/table_close}
		';
		
		$this->lang->load('calendar', 'thai');
		$this->load->library('calendar', $prefs);
		
		//$items = $this->db->getarray('select id,day(start) as c_date from calendars where year(start) = ? and month(start) = ?',array(date('Y'),date('m')));
		$calendars = new Calendar();
		// $calendars->select('calendars.id,day(start) as c_date')->where('year(start) = '.date('Y').' and month(start) = '.date('m'))->where_related_user('group_id',$group_id)->get();
		$calendars->select('calendars.id,day(start) as c_date')->where('year(start) = '.date('Y').' and month(start) = '.date('m'))->get();
		// foreach($calendars as $calendar){$data[$calendar->c_date] = base_url().'calendars/view/'.$calendar->id;}
		foreach($calendars as $calendar){$data[$calendar->c_date] = base_url().'calendars/view_date/'.date('Y').'/'.date('m').'/'.$calendar->c_date;}
		$data['calendar'] = $this->calendar->generate(date('Y'), date('m'), @$data, TRUE);
		// $data['group_id'] = $group_id;
		$this->load->view('calendar_side',$data);
	}

	function view_date($year,$month,$day){
		$data['type'] = array("e-blue" => "ประชุม","e-red" => "สัมมา","e-green" => "อบรม","e-violet" => "อื่นๆ");
		$data['calendars'] = new Calendar();
		$date = $year.'-'.$month.'-'.$day;
		$data['calendars']->where("start <= '".$date."' and end >= '".$date."'")->get();
		$this->template->build('calendar_day_view',$data);
	}
}
?>