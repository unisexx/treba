<?php
	Class Weblinks extends Public_Controller
	{
		function __construct()
		{
			parent::__construct();
		}	
		
		function index($category_id=FALSE)
		{
			$this->template->set_layout('layout_blank');
			if($category_id){
				$data['categories'] = new Category($category_id);
				$this->template->build('weblinks_category_view',$data);
			}else{
				$data['categories'] = new Category();
				$data['categories']->where("module = 'weblinks' and parents <> 0")->get_page();
				$data['categories']->weblink->get();
				$this->template->build('weblinks_index',$data);
			}
		}
		
		function inc_home(){
			$data['categories'] = new Category();
			$data['categories']->where("module = 'weblinks' and parents <> 0")->get_page();
			$data['categories']->weblink->get();
			$this->load->view('inc_home',$data);
		}
	}
	
?>