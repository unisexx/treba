<?php
class Vdos extends Admin_Controller{
	
	function __construct(){
		parent::__construct();	
	}
	
	function index($id=FALSE)
	{		
		$data['categories'] = new Category($id);
		$vdos = new Vdo();
		if(@$_POST['category_id'])$id=$_POST['category_id'];
		$data['vdos'] = $vdos->where('category_id',$id)->order_by('orderlist','asc')->get_page();
		$this->template->append_metadata(js_lightbox());
		$this->template->build('admin/vdo_index',$data);
	}
	
	function form($cat_id,$id=FALSE)
	{
		$data['categories'] = new Category($cat_id);
		$data['vdos'] = new Vdo($id);
		$this->template->build('admin/vdo_form',$data);
	}
	
	function save($id=false)
	{	
		if($_POST)
		{
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			foreach($_POST['vdo_script'] as $key => $item){
				if($item){
					$vdo = new Vdo();					 									
					$vdo->from_array(array('id'=>$_POST['id'][$key],'vdo_script' => $item,'title'=> $_POST['title'][$key],'category_id' => $_POST['category_id'], 'user_id' => $_POST['user_id']));
					$vdo->save();
				}
			}
			set_notify('success', lang('save_data_complete'));
		}
		redirect($_POST['referer']);
	}
	
	function delete($cat_id,$id=FALSE)
	{
		if($id)
		{
			$vdo = new Vdo($id);
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
						$vdo = new Vdo(@$_POST['orderid'][$key]);
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
		    error_reporting(0);
			$dom = file_get_html($_POST['url']);
			foreach ($dom->find('iframe') as $elm)
            
            if (stripos($elm, "//www.facebook.com") !== false or stripos($elm, "//ad.yieldads.com")) {
                echo "";
            }else{
                echo $elm->src." ";
            }
            
			//echo $elm->src." ";
            // $this->output->set_output($elm->src." ");
		}
	}
	
	function uncategory(){
		$data['vdos'] = new Vdo();
		$data['vdos']->where('category_id IS NULL')->order_by('id','asc')->get_page();
		$this->template->build('admin/uncategory_index',$data);
	}
	
	function uncategory_form($id){
		$data['vdo'] = new Vdo($id);
		$data['categories'] = new Category();
		$data['categories']->where('end <> "end"')->get();
		$this->template->build('admin/uncategory_form',$data);
	}
	
	function uncategory_save($id=false)
	{	
		if($_POST)
		{
			if(!$id)$_POST['user_id'] = $this->session->userdata('id');
			
			$vdo = new Vdo($id);
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
			$vdo = new Vdo($id);
			$vdo->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('vdos/admin/vdos/uncategory/');
	}
    
    function dead_link(){
        $data['deadlinks'] = new Dead_link();
        if(!empty($_POST['search']))$data['deadlinks']->where("url like '%".$_POST['search']."%'");
        $data['deadlinks']->order_by('id','desc')->get_page();
        $this->template->build('admin/deadlink_index',$data);
    }
    
    function dead_link_delete($id){
        if($id){
            $deadlink = new Dead_link($id);
            $deadlink->delete();
            set_notify('success', lang('delete_data_complete'));
        }
        redirect('vdos/admin/vdos/dead_link/');
    }
    
    function dead_link_group_delete(){
        if($_POST){
            foreach($_POST['chkdel'] as $key=>$item){
                $deadlink = new Dead_link($item);
                $deadlink->delete();
            }
            set_notify('success', lang('delete_data_complete'));
        }
        redirect('vdos/admin/vdos/dead_link/');
    }

	function tmp(){
		$data['tmps'] = new Vdos_tmp();
		if(!empty($_POST['search']))$data['tmps']->where("title like '%".$_POST['search']."%'");
		$data['tmps']->order_by('id','desc')->get_page();
		$this->template->build('admin/vid_tmp',$data);
	}
	
	function tmp_delete($id){
		if($id){
            $tmp = new Vdos_tmp($id);
            $tmp->delete();
            set_notify('success', lang('delete_data_complete'));
        }
        redirect('vdos/admin/vdos/tmp/');
	}

	function edit_all(){
		$data['categories'] = new Category();
		if(@$_GET['category_id']){$data['categories']->where("id = ".$_GET['category_id']);}
		$data['categories']->get();
		$this->template->build('admin/edit_all',$data);
	}
    
    function edit_all_save(){
        if($_POST){
            foreach($_POST['id'] as $key => $item){
                if($item){
                    $vdo = new Vdo();                                                       
                    $vdo->from_array(array(
                        'id'=>$item,
                        'title'=>$_POST['title'][$key],
                        'vdo_script' => $_POST['vdo_script'][$key],
                        'url' => $_POST['url'][$key]
                    ));
                    $vdo->save();
                }
            }
            set_notify('success', lang('save_data_complete'));
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
}
?>