<?php
Class Kpop_news extends Public_Controller
    {
        function __construct()
        {
            parent::__construct();
        }   
        
        function index(){
            $data['news'] = new Kpop_new();
            $data['news']->where("status = 'approve'")->order_by('id','desc')->get_page(10);
            $this->template->title('ข่าวเกาหลีอัพเดทล่าสุด - Kpoplover');
            $this->template->build('index',$data);
			//$this->output->cache(5);
        }
        
        function view($slug){
			if (is_numeric ($slug)){
				$data['new'] = new Kpop_new($slug);
			}else{
				$data['new'] = new Kpop_new();
				$data['new']->where("slug = '".$slug."'")->get(1);
			}
			$data['new']->counter();
            
            $data['ralates'] = new Kpop_new();
            $data['ralates']->where("status = 'approve' and id <> ".$data['new']->id)->order_by('id','desc')->get(4);
            
            $this->template->title($data['new']->title.' - Kpoplover ข่าวเกาหลี');
            meta_description(word_limiter(strip_tags($data['new']->detail),10));
            $this->template->build('view',$data);
            
            //$this->output->cache(60);
        }
        
        function inc_home(){
            $data['newsHead'] = new Kpop_new();
            $data['newsHead']->where("status = 'approve'")->order_by('id','desc')->get_page(1);
            
            $data['news'] = new Kpop_new();
            $data['news']->where("status = 'approve'")->order_by('id','desc')->limit(6,1)->get();
            $this->load->view('inc_home',$data);
        }
    }
?>