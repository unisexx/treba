<?php
class Stats extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->template->set_theme('tpso1');
		$this->template->set_layout('stat');
	}
	
	function index(){
		$this->template->set_layout('stat_index');
		$this->template->build('stat_index');
	}
	
	function inc_leftMenu(){
		$categories = new Category();
		$categories->where("module = 'researches' and parents <> 0")->order_by('id','asc')->get();
		foreach($categories as $category){
			echo "<li><a href='stats/category/".$category->id."'>".$category->name."</a></li>";
		}
	}
	
	function category($id){
		$data['researches'] = new Research();
		$data['researches']->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve' and category_id = ".$id)->order_by('id','desc')->get_page();
		$this->template->build("research_index",$data);
	}
	
	function view($id){
		$data['research'] = new Research($id);
		$data['attachs'] = new Attach_file();
		$data['attachs']->where("content_id = ".$id." and module = 'researches'")->get();
		$this->template->build("research_view",$data);
	}
	
	function research_download($id){
		$attach = new Attach_file($id);
		$attach->counter();
		$this->load->helper('download');
		$data = file_get_contents($attach->file);
		$name = basename($attach->file);
		force_download($name, $data);
	}
	
	function stat_index(){
		$data['stats'] = new Stat();
		$data['stats']->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve'")->order_by('id','desc')->get_page();
		$this->template->build('stat_list',$data);
	}
	
	function stat_download($id){
		$stat = new Stat($id);
		$stat->counter();
		$this->load->helper('download');
		$data = file_get_contents($stat->file);
		$name = basename($stat->file);
		force_download($name, $data);
	}

	function gallery_list(){
		$data['categories'] = new Category();
		$data['categories']->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and module = 'galleries' and parents <> 0 and status = 'approve' and stat_show = 'yes'")->order_by('id','desc')->get();
		$this->template->build('gallery_index',$data);
	}

	function vdo_list(){
		$data['vdo_categories'] = new Category();
		$data['vdo_categories']->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and module = 'vdos' and parents <> 0 and status = 'approve' and stat_show = 'yes'")->order_by("id","desc")->get();
		$this->template->build('vdo_index',$data);
	}
	
	function view2($id)
	{
		$data['catagory_id'] = $id;
		$data['galleries'] = new Gallery();
		$data['galleries']->where("category_id = '$id'")->order_by('orderlist','asc')->get_page();
		$this->template->build('gallery_view',$data);
	}
	
	function vdo($id){
		$data['vdos'] = new Vdo();
		$data['vdos']->where("category_id = ".$id)->order_by('id','desc')->get_page();
		$this->template->build('vdo_view',$data);
	}
	
	function information_list(){
		$data['informations'] = new Information();
		(@$_GET['titlesearch'])?$data['informations']->like('title',$_GET['titlesearch']):'';
		$data['informations']->where("stat_show = 'yes'")->order_by("id","desc")->get_page();
		$this->template->build('informations_index',$data);
	}
}
?>