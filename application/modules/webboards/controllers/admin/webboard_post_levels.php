<?php
    
	Class Webboard_post_levels extends Admin_Controller
	{
		function __construct(){
			parent::__construct();	
		}
		
		function index()
		{
			$webboard_post_levels = new Webboard_post_level();
			$data['webboard_post_levels'] = $webboard_post_levels->order_by('id','asc')->get_page();
			$this->template->build('admin/webboard_post_level_index',$data);
		}
		
		function form($id=False){
			$data['webboard_post_level'] = new Webboard_post_level($id);
			$this->template->build('admin/webboard_post_level_form',$data);
		}
		
		function save($id=FALSE){
			if($_POST){
				$webboard_post_level = new Webboard_post_level($id);
				$_POST['user_id'] = $this->session->userdata('id');
				if($_FILES['image']['name'])
				{
					$webboard_post_level->delete_file('uploads/webboards/','avatar');
					$_POST['image'] = $webboard_post_level->upload($_FILES['image'],'uploads/webboards/');
				}
				$webboard_post_level->from_array($_POST);
				$webboard_post_level->save();
				set_notify('success', lang('save_data_complete'));
			}
			redirect('webboards/admin/webboard_post_levels');
		}
		
		function delete($id=FALSE){
			if($id)
			{
				$webboard_post_level = new Webboard_post_level($id);
				$webboard_post_level->delete();
				set_notify('success', lang('delete_data_complete'));
			}
			redirect('webboards/admin/webboard_post_levels');
		}
	}

?>