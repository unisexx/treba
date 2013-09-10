<?php
Class Pages extends Public_Controller
    {
        function __construct()
        {
            parent::__construct();
            $this->template->set_layout('_blank');
        }   
        
        function index(){
            $data['pages'] = new Page();
            $data['pages']->where("status = 'approve'")->order_by('id','desc')->get_page();
            $this->template->build('index',$data);
        }
        
        function view($id){
            $data['page'] = new Page($id);
            $this->template->build('view',$data);
        }
        
    }
?>