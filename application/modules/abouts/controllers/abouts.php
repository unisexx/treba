<?php
class Abouts extends Public_Controller{
	
	function __construct(){
		parent::__construct();
	}
	
	function inc_home(){
	    $data['abouts'] = new About();
        $data['abouts']->order_by('orderlist','asc')->get();
	    $this->load->view('inc_home',$data);
	}
    
    function inc_header(){
        $data['abouts'] = new About();
        $data['abouts']->order_by('orderlist','asc')->get();
        $this->load->view('inc_header',$data);
    }
    
    function index(){
        $data['abouts'] = new About();
        $data['abouts']->order_by('orderlist','asc')->get();
        $this->template->build('index',$data);
    }
    
    function view($id){
        $data['about'] = new About($id);
        $this->template->build('view',$data);
    }
}
?>
