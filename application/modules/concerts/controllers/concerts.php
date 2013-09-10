<?php
Class Concerts extends Public_Controller
	{
		function __construct()
		{
			parent::__construct();
		}	
		
        function index(){
            $data['categories'] = new Concert_category();
            $data['categories']->where("status = 'approve'")->order_by('orderlist','desc')->get_page();
            $this->template->title('คอนเสิร์ตเกาหลี - Kpoplover');
			$this->template->build('categories_list',$data);
			//$this->output->cache(60);
        }
        
		function inc_home($id=FALSE)
		{
			$category = new Concert_category();
            $data['category'] = $category->where("status = 'approve'")->order_by('orderlist','desc')->get(1);
			
			$data['categories'] = new Concert_category();
            $data['categories']->where("status = 'approve'")->order_by('orderlist','desc')->limit(5,1)->get();
			$this->load->view('inc_home',$data);
		}
		
        function week($id){
            $data['category'] = new Concert_category($id);
			$data['category']->counter();
            $data['vids'] = new Concert_vid();
            $data['vids']->where("concert_category_id = ".$id)->order_by('id','asc')->get();
			$this->template->title('MBC Music Core '. end(explode(" ",$data['category']->concert_vid->title)) .' - Kpoplover คอนเสิร์ตเกาหลี');
            $this->template->build('week',$data);
            //$this->output->cache(60);
        }
		
		function watch_all($id){
			$data['category'] = new Concert_category($id);
            $data['vids'] = new Concert_vid();
            $data['vids']->where("concert_category_id = ".$id)->get();
			$this->template->title('MBC Music Core '. end(explode(" ",$data['category']->concert_vid->title)) .' - Kpoplover คอนเสิร์ตเกาหลี');
			$this->template->build('watch_all',$data);
            //$this->output->cache(60);
		}
		
		function watch($slug){
			$data['vid'] = new Concert_vid();
			$data['vid']->where("slug = '".$slug."'")->order_by('id','desc')->get(1);
			$data['vid']->counter();
			$this->template->title($data['vid']->title .' - Kpoplover คอนเสิร์ตเกาหลี');
            $this->template->append_metadata( meta($data['vid']->title));
            meta_description($data['vid']->title .' - Kpoplover คอนเสิร์ตเกาหลี');
            $this->template->build('watch',$data);
            //$this->output->cache(60);
		}
	}
?>