<?php
class Polls extends Public_Controller {

	function __construct()
	{
		parent::__construct();	
	}
	
	function index()
	{
		$data['polls'] = new Poll();
		$data['polls']->get_page(10);
		$this->template->build('poll_index',$data);	
	}
	
	function view($id = FALSE)
	{
		$data['polls'] = new Poll();
		$data['polls']->sql("select polldetails.*,round((count(pollresults.poll_id)/(select count(poll_id) from pollresults where poll_id = $id)*100),2) percent,count(pollresults.id) num
from polldetails left join pollresults
on polldetails.id = pollresults.polldetail_id
where polldetails.poll_id = $id
group by pollresults.polldetail_id
order by id asc")->get_page();
		//$data['polls']->checked

		$this->load->view('poll_view',$data);
	}
	
	function inc_left()
	{

		$data['poll'] = new Poll();
		$data['poll']->where('active',1)->get();
		$this->load->view('poll_inc',$data);	
	}
	
	function vote()
	{
		$pollresult = new Pollresult();
		$pollresult->ip = $this->input->ip_address();
		$pollresult->poll_id = $_GET['id'];
		$pollresult->polldetail_id = $_GET['id_ans'];
		$pollresult->save();

		$this->view($_GET['id']);
	}
	
	
}