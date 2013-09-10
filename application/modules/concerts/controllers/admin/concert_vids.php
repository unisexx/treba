<?php
class Concert_vids extends Admin_Controller{
	
	function __construct(){
		parent::__construct();	
	}
	
	function index($id=FALSE)
	{		
		$data['categories'] = new Concert_category($id);
		$vdos = new Concert_vid();
		if(@$_POST['category_id'])$id=$_POST['category_id'];
		$data['vdos'] = $vdos->where('concert_category_id',$id)->order_by('id','asc')->get_page();
		$this->template->append_metadata(js_lightbox());
		$this->template->build('admin/vdo_index',$data);
	}
	
	function form($cat_id,$id=FALSE)
	{
		$data['categories'] = new Concert_category($cat_id);
		$data['vdos'] = new Concert_vid($id);
		$this->template->build('admin/vdo_form',$data);
	}
	
	function save($id=false)
	{	
		if($_POST)
		{
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			foreach($_POST['vdo_script'] as $key => $item){
				if($item){
					$vdo = new Concert_vid();					 									
					$vdo->from_array(array('id'=>$_POST['id'][$key],'vdo_script' => $item,'title'=> $_POST['title'][$key],'category_id' => $_POST['category_id'], 'user_id' => $_POST['user_id']));
					$vdo->save();
				}
			}
			set_notify('success', lang('save_data_complete'));
		}
		redirect('vdos/admin/vdos/index/'.$_POST['category_id']);
	}
	
	function delete($cat_id,$id=FALSE)
	{
		if($id)
		{
			$vdo = new Concert_vid($id);
			$vdo->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('vdos/admin/vdos/index/'.$cat_id);
	}
	
	function getThumb(){
		if($_POST){
			echo YoutubeIframe2Thumb($_POST['iframe']);
		}
	}
	
	function save_orderlist($id=FALSE){
		if($_POST)
		{
				foreach($_POST['orderlist'] as $key => $item)
				{
					if($item)
					{
						$vdo = new Concert_vid(@$_POST['orderid'][$key]);
						$vdo->from_array(array('orderlist' => $item));
						$vdo->save();
					}
				}
			set_notify('success', lang('save_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
	function findUrlFromExternalPage(){
		if($_POST){
			$dom = file_get_html($_POST['url']);
			foreach ($dom->find('iframe') as $elm)
			echo $elm->src." ";
		}
	}
	
	function uncategory(){
		$data['vdos'] = new Concert_vid();
		$data['vdos']->where('category_id IS NULL')->order_by('id','asc')->get_page();
		$this->template->build('admin/uncategory_index',$data);
	}
	
	function uncategory_form($id){
		$data['vdo'] = new Concert_vid($id);
		$this->template->build('admin/uncategory_form',$data);
	}
	
	function uncategory_save($id=false)
	{	
		if($_POST)
		{
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			
			$vdo = new Concert_vid($id);
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			$vdo->from_array($_POST);
			$vdo->save();
			
			set_notify('success', lang('save_data_complete'));
		}
		redirect('vdos/admin/vdos/uncategory');
	}
	
	function uncategory_delete($id=FALSE)
	{
		if($id)
		{
			$vdo = new Concert_vid($id);
			$vdo->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('vdos/admin/vdos/uncategory/');
	}

}
?>