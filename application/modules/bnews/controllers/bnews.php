<?php
class Bnews extends Public_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    
    function inc_home(){
        $data['bnews'] = new Bnew();
        $data['bnews']->order_by('id','asc')->get(6);
        $this->load->view('inc_home',$data);
    }
}
?>