<?php
class Tickers extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['tickers'] = new Ticker();
		$data['tickers']->order_by('orderlist','asc')->get_page();
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['ticker'] = new Ticker($id);
		$this->template->append_metadata(js_datepicker());
		$this->template->build('admin/form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$ticker = new Ticker($id);
			$_POST['status'] = 'approve';
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			
			$ticker->from_array($_POST);
			$ticker->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect($_POST['referer']);
	}
	
	function save_orderlist($id=FALSE){
		if($_POST)
		{
				foreach($_POST['orderlist'] as $key => $item)
				{
					if($item)
					{
						$vdo = new Ticker(@$_POST['orderid'][$key]);
						$vdo->from_array(array('orderlist' => $item));
						$vdo->save();
					}
				}
			set_notify('success', lang('save_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$ticker = new Ticker($id);
			$_POST['approve_id'] = $this->session->userdata('id');
			$ticker->from_array($_POST);
			$ticker->save();
		}
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$ticker = new Ticker($id);
			$ticker->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
}
?>