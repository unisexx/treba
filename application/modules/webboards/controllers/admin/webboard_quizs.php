<?php
	
Class Webboard_quizs extends Admin_Controller{
		
	function __construct(){
		parent::__construct();
	}
		
	function index()
	{
		$webboard_quizs = new Webboard_quiz();
		if(!empty($_GET['webboard_category_id']))$webboard_quizs->where('webboard_category_id',$_GET['webboard_category_id']);
		$data['webboard_quizs'] = $webboard_quizs->order_by('id','desc')->get_page(20);
		
		$this->template->append_metadata(js_lightbox());
		$this->template->build('admin/webboard_index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['webboard_quizs'] = new Webboard_quiz($id);
		$this->template->build('admin/webboard_new_topic_form',$data);
	}
	
	function save($id=FALSE){
		if($_POST){
			$webboard_quiz = new Webboard_quiz($id);
			if(isset($webboard_quiz->user_id)){
				$_POST['user_id'] = $webboard_quiz->user_id;
			}else{
				$_POST['user_id'] = $this->session->userdata('id');
			}
			$webboard_quiz->from_array($_POST);
			$webboard_quiz->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect('webboards/admin/webboard_quizs');
	}
	
	function delete($id=FALSE){
		if($id)
		{
			$webboard_quiz = new Webboard_quiz($id);
			$webboard_quiz->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('webboards/admin/webboard_quizs');
	}
}
?>