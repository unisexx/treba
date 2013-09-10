<?php
class Informations extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function inc_home(){
		$data['informations'] = new Information();
		$data['informations']->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and index_show = 'yes' and status = 'approve'")->limit(7)->order_by("id","desc")->get();
		$data['infos'] = new Information();
		$data['infos']->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and index_show = 'yes' and status = 'approve'")->limit(5,7)->order_by("id","desc")->get();
		$this->load->view('inc_home',$data);
	}
	
	function inc_index(){
		$data['informations'] = new Information();
		(@$_GET['titlesearch'])?$data['informations']->like('title',$_GET['titlesearch']):'';
		$data['informations']->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and index_show = 'yes' and status = 'approve'")->order_by("id","desc")->get_page();
		$this->template->build('informations_index',$data);
	}
	
	function view($id = NULL)
	{
		$data['information'] = new Information($id);
		$this->template->build('informations_view',$data);
	}
	
	function inc_district(){
		$data['informations'] = new Information();
		$data['informations']->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and tumbon_show = 'yes' and status = 'approve'")->order_by("id","desc")->limit(6)->get();
		$data['infos'] = new Information();
		$data['infos']->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and tumbon_show = 'yes' and status = 'approve'")->limit(8,6)->order_by("id","desc")->get();
		$this->load->view('inc_district',$data);
	}
	
	function inc_pms(){
		$data['informations'] = new Information();
		$data['informations']->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and pormor_show = 'yes' and status = 'approve'")->order_by("id","desc")->limit(6)->get();
		$data['infos'] = new Information();
		$data['infos']->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and pormor_show = 'yes' and status = 'approve'")->limit(8,6)->order_by("id","desc")->get();
		$this->load->view('inc_district',$data);
	}
	
	function inc_stat(){
		$data['informations'] = new Information();
		$data['informations']->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and stat_show = 'yes' and status = 'approve'")->order_by("id","desc")->limit(6)->get();
		$data['infos'] = new Information();
		$data['infos']->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and stat_show = 'yes' and status = 'approve'")->limit(8,6)->order_by("id","desc")->get();
		$this->load->view('inc_district',$data);
	}
}
?>