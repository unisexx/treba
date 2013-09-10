<?php
Class Music_videos extends Public_Controller
    {
        function __construct()
        {
            parent::__construct();
        }   
        
        function index(){
            $data['mvs'] = new Music_video();
            $data['mvs']->where('status','approve')->order_by('id','desc')->get_page(30);
            $this->template->title('MV เกาหลีใหม่ล่าสุด - Kpoplover');
            $this->template->build('index',$data);
			//$this->output->cache(5);
        }
        
        function view($slug){
            $data['mv'] = new Music_video();
            $data['mv']->where("slug = '".$slug."'")->get(1);
            $data['mv']->counter();
            $this->template->title($data['mv']->title.' - Kpoplover มิวสิกวิดีโอเกาหลี');
            meta_description($data['mv']->title.' - Kpoplover มิวสิกวิดีโอเกาหลี');
            $this->template->build('view',$data);
            
            //$this->output->cache(60);
        }
        
        function inc_home(){
            $data['mvs'] = new Music_video();
            $data['mvs']->where('status','approve')->order_by('id','desc')->get_page(6);
            $this->load->view('inc_home',$data);
        }
    }
?>