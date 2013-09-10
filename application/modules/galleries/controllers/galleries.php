<?php
Class Galleries extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}	
	
	function index($id=FALSE)
	{
		$data['categories'] = new Category();
		$data['categories']->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and module = 'galleries' and parents <> 0 and status = 'approve'")->order_by('id','desc')->get();
		
		$data['vdo_categories'] = new Category();
		$data['vdo_categories']->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and module = 'vdos' and parents <> 0 and status = 'approve'")->order_by("id","desc")->get();
		
		$this->template->build('gallery_index',$data);
	}
	
	function view($id)
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
	
	function ajax_vdo_load($id){
		$data['vdo'] = new Vdo($id);
		$this->load->view('vdo_load',$data);
	}
	
	function inc_home($id=FALSE)
	{
		$data['categories'] = new Category();
		$data['categories']->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and module = 'galleries' and parents <> 0 and status='approve'")->order_by('id','random')->get();
		
		$data['gallery'] = $data['categories']->gallery->order_by("id","random")->get(1);
		$this->load->view('inc_home',$data);
	}
	
	function inc_district(){
		$data['galleries'] = new Gallery_vdo();
		$data['galleries']->get();
		// echo $data['galleries']->check_last_query();
		$this->load->view('inc_district',$data);
	}
	
	function ajax_district_load(){
		if($_GET){
			$gallery = new Gallery();
			$gallery->where("id = ".$_GET['id']." and image = '".$_GET['image']."'")->get();
			if($gallery->result_count() == 1){
				echo thumb($gallery->image,595,395,0)."<span style='width: 565px;
position: absolute;
display: block;
bottom: 0;
left: 0;
z-index: 2;
padding: 14px 15px;
font-size: 11.5px;
line-height: 1.5em;
cursor: pointer;
background: black;
opacity:0.8;
filter:alpha(opacity=80);
color: white;'>".$gallery->title."</span>";
			}else{
				$vdo = new Vdo();
				$vdo->where("id = ".$_GET['id']." and cover_pic = '".$_GET['image']."'")->get();
				echo '<style type="text/css">.vdoFrame iframe{width: 595px !important; height: 395px !important;}</style><div class="vdoFrame">'.$vdo->vdo_script.'</div>';
			}
		}
	}
	
	function inc_index_index($id=false){
		$data['galleries'] = $this->db->query("select galleries.id,galleries.category_id,galleries.image,galleries.title from galleries left join categories on galleries.category_id = categories.id where start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and module = 'galleries' and parents <> 0 and status = 'approve' and index_show = 'yes' ORDER BY RAND() LIMIT 4")->result();
		$this->load->view('inc_index',$data);
	}

	function inc_stat_index($id=false){
		$data['galleries'] = $this->db->query("select galleries.id,galleries.category_id,galleries.image,galleries.title from galleries left join categories on galleries.category_id = categories.id where start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and module = 'galleries' and parents <> 0 and status = 'approve' and stat_show = 'yes' ORDER BY RAND() LIMIT 4")->result();
		$this->load->view('inc_index',$data);
	}

	function inc_district_index($id=false){
		$data['galleries'] = $this->db->query("select galleries.id,galleries.category_id,galleries.image,galleries.title from galleries left join categories on galleries.category_id = categories.id where start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and module = 'galleries' and parents <> 0 and status = 'approve' and tumbon_show = 'yes' ORDER BY RAND() LIMIT 4")->result();
		$this->load->view('inc_index',$data);
	}
	
	function inc_pms_index($id=false){
		$data['galleries'] = $this->db->query("select galleries.id,galleries.category_id,galleries.image,galleries.title from galleries left join categories on galleries.category_id = categories.id where start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and module = 'galleries' and parents <> 0 and status = 'approve' and pormor_show = 'yes' ORDER BY RAND() LIMIT 4")->result();
		$this->load->view('inc_index',$data);
	}
}
?>