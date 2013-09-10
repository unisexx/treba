<?php
    
	Class Webboard_status_configs extends Admin_Controller
	{
		function __construct(){
			parent::__construct();	
		}
		
		function index()
		{
			$id = 1;
			$data['webboard_status_configs'] = new Webboard_status_config($id);
			//$data['webboard_status_configs']->group_id = json_decode($data['webboard_status_configs']->group_id);
			//$data['groups'] = new Group();
			//$data['groups']->order_by('id','asc')->get_page();
			$this->template->build('admin/webboard_status_config_form',$data);
		}
		
		function save($id=FALSE){
			if($_POST){
				$webboard_status_config = new Webboard_status_config($id);
				$_POST['user_id'] = $this->session->userdata('id');
				$webboard_status_config->from_array($_POST);
				//$webboard_status_config->group_id = json_encode($_POST['group_id']);
				$webboard_status_config->save();
				set_notify('success', lang('save_data_complete'));
			}
			redirect('webboards/admin/webboard_status_configs');
		}
	}

?>