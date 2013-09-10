<?php
class Tickers extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function inc_home(){
		$data['tickers'] = new Ticker();
		$data['tickers']->where("status = 'approve'")->order_by('id','random')->get();
        $this->template->title('ประกาศ - Kpoplover');
		$this->load->view('inc_home',$data);
	}
    
    function view($id){
        $data['ticker'] = new Ticker($id);
		$data['ticker']->counter();
        $this->template->title($data['ticker']->title .' - Kpoplover ประกาศ');
        $this->template->build('view',$data);
        //$this->output->cache(1440);
    }
}
?>