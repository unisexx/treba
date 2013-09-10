<?php
class Dashboards extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('ga');
		error_reporting(0);
	}
	
	function index()
	{
		$this->ga->authen('unisexx@gmail.com','m00nlight','ga:26146247');
		if($_GET)
		{
			$now=Date2DB($_GET['date']);
		}
		else
		{
			$now=date("Y-m-d");
		}
	
		$lastmonth=date('Y-m-d', strtotime('-29 days',mysql_to_unix($now)));

		//Summery: visitors, unique visit, pageview, time on site, new visits, bounce rates
		$data['summery']=$this->ga->getSummery($lastmonth,$now);
		
		//All time summery: visitors, page views
		$data['allTimeSummery']=$this->ga->getAllTimeSummery();
		
		//Last 10 days visitors (for graph)
		$data['visits']=$this->ga->getVisits($lastmonth,$now,30);
		
		//Top 10 search engine keywords
		$data['topKeywords']=$this->ga->getTopKeyword($lastmonth,$now,10);
		
		//Top 10 visitor countries
		$data['topCountries']=$this->ga->getTopCountry($lastmonth,$now,10);
		
		//Top 10 page views
		$data['topPages']=$this->ga->getTopPage($lastmonth,$now,10);
		
		//Top 10 referrer websites
		$data['topReferrer']=$this->ga->getTopReferrer($lastmonth,$now,10);
		
		//Top 10 visitor browsers
		$data['topBrowsers']=$this->ga->getTopBrowser($lastmonth,$now,10);
		
		//Top 10 visitor operating systems
		$data['topOs']=$this->ga->getTopOs($lastmonth,$now,10);
		$this->template->append_metadata(js_datepicker());
		$this->template->build("index",$data);
	}
}
?>