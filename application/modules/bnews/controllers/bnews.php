<?php
class Bnews extends Public_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    
    function index(){
        $data['bnews'] = new Bnew();
        $data['bnews']->order_by('id','asc')->get_page();
        $this->template->build('index',$data);
    }
    
    function inc_home(){
        $data['bnews'] = new Bnew();
        $data['bnews']->order_by('id','asc')->get(6);
        $this->load->view('inc_home',$data);
    }
    
    function view($id){
        $data['bnew'] = new Bnew($id);
        $this->template->build('view',$data);
    }
}
?>