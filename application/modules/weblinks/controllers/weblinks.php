<?php
class Weblinks extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function inc_weblink(){
		$data['broker_weblinks'] = new Weblink();
        $data['broker_weblinks']->where('category_id = 452')->get(30); //สำหรับอาชีพนายหน้า
        
        $data['consumer_weblinks'] = new Weblink();
        $data['consumer_weblinks']->where('category_id = 453')->get(30); //สำหรับผู้บริโภคทั่วไป
        
        $this->load->view('inc_weblink',$data);
	}
    
    function inc_banner(){
        $data['banner_weblinks'] = new Weblink();
        $data['banner_weblinks']->where('category_id = 454')->get(30); //สำหรับผู้บริโภคทั่วไป
        $this->load->view('inc_banner',$data);
    }
}
?>