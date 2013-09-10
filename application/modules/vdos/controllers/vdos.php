<?php
Class Vdos extends Public_Controller
	{
		function __construct()
		{
			parent::__construct();
		}	
		
        function index(){
            $category = new Category();
            $data['categories'] = $category->select("categories.name,categories.end,categories.id,categories.slug,categories.image,(SELECT MAX(vdos.id) from vdos where category_id = categories.id)as vdoid")->where("module = 'vdos' and status = 'approve'")->order_by('vdoid','desc')->get_page(18);
            $this->template->title('ซีรีย์เกาหลี - Kpoplover');
            $this->template->build('index',$data);
			//$this->output->cache(5);
        }
        
		function inc_home($id=FALSE)
		{
			$category = new Category();
            $data['categories'] = $category->select("categories.name,categories.end,categories.id,categories.slug,categories.image,(SELECT MAX(vdos.id) from vdos where category_id = categories.id)as vdoid")->where("module = 'vdos' and status = 'approve'")->order_by('vdoid','desc')->get_page(6);
			$this->load->view('inc_home',$data);
		}
        
        function view($slug){
            $data['category'] = new Category();
            $data['category']->where("slug = '".$slug."'")->get(1);
            $data['category']->counter();
            $data['epsode'] = $data['category']->vdo->order_by('orderlist','asc')->get();
			
			$this->template->title('ซีรีย์เกาหลี '.$data['category']->name.' ซับไทย ออนไลน์ - Kpoplover');
            meta_description(word_limiter(strip_tags($data['category']->detail),10));
            $this->template->build('view',$data);
            //$this->output->cache(5);
        }
        
        function series_online($id){
            $id = end(explode("-", rawurlencode($id)));
            $data['vdo'] = new Vdo($id);
            $data['vdo']->counter();
			
			$this->template->title('ซีรีย์เกาหลี '.$data['vdo']->category->name.' - '.$data['vdo']->title.' ซับไทย ออนไลน์ - Kpoplover');
            meta_description(word_limiter(strip_tags($data['vdo']->category->detail),10));
            $this->template->build('watch_online',$data);
            //$this->output->cache(60);
        }
		
		function last_update(){
			$vdo = new Vdo();
			$data['vdos'] = $vdo->where_related("category","status = 'approve'")->order_by('id','desc')->limit(10)->get();
			$this->load->view('last_update',$data);
		}
        
        function onair(){
            $category = new Category();
            $data['categories'] = $category->where("module = 'vdos' and status = 'approve' and end = 'not'")->order_by('id','desc')->limit(10)->get();
            $this->load->view('onair',$data);
        }
        
        function ended(){
            $category = new Category();
            $data['categories'] = $category->where("module = 'vdos' and status = 'approve' and end = 'end'")->order_by('id','desc')->limit(10)->get();
            $this->load->view('end',$data);
        }
        
        function related_series(){
            $category = new Category();
            $data['categories'] = $category->where("module = 'vdos' and status = 'approve'")->order_by("id","random")->limit(3)->get();
            $this->load->view('related',$data);
        }
        
        function sidebar_tab(){
            $vdo = new Vdo();
            $data['vdos'] = $vdo->where_related("category","status = 'approve'")->order_by('id','desc')->limit(10)->get();
            
            $category_onair = new Category();
            $data['ocategories'] = $category_onair->where("module = 'vdos' and status = 'approve' and end = 'not'")->order_by('id','desc')->limit(10)->get();
            
            $category_end = new Category();
            $data['ecategories'] = $category_end->where("module = 'vdos' and status = 'approve' and end = 'end'")->order_by('id','desc')->limit(10)->get();
            
            $this->load->view('sidebar_tab',$data);
        }
        
        function inc_footer(){
            $vdo = new Vdo();
            $data['vdos'] = $vdo->where_related("category","status = 'approve'")->order_by('id','desc')->limit(10)->get();
            $this->load->view('inc_footer',$data);
        }
        
        function deadlink(){
            if($_POST){
                $dead_link = new Dead_link();
                $count = $dead_link->where("vdo_id = ".$_POST['vdo_id'])->get()->result_count();
                if($count == 0){
                    $_POST['ip'] = $_SERVER['REMOTE_ADDR'];
                    $dead_link = new Dead_link();
                    $dead_link->from_array($_POST);
                    $dead_link->save();
                }
            }
        }
        
        function send_mail($post){
            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'noreply.kpoplover@gmail.com',
                'smtp_pass' => 'Des@gn;9',
                'mailtype'  => 'html', 
                'charset'   => 'utf-8'
            );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");
            
            $this->email->from('noreply.kpoplover@gmail.com', 'noreply.kpoplover');
            $this->email->to('unisexx@gmail.com');
            $this->email->subject('แจ้งลิ้งค์เสีย - kpoplover.com');
            $this->email->message('type : '.$post['type'].'<br>'.$post['url']);
            $result = $this->email->send();
        }
	}
?>