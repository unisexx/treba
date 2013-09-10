<?php
	
Class Webboard_bad_words extends Admin_Controller{
		
	function __construct(){
		parent::__construct();
	}
	
	function index()
	{
		//bad words
		$id_badword = 1;
		$data['webboard_bad_words'] = new Webboard_bad_word($id_badword);
		//bad link
		$id_badlink = 2;
		$data['webboard_bad_links'] = new Webboard_bad_word($id_badlink);
		
		$this->template->build('admin/webboard_bad_word_index',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$webboard_bad_word = new Webboard_bad_word($id);
			$_POST['user_id'] = $this->session->userdata('id');
			$webboard_bad_word->from_array($_POST);
			$webboard_bad_word->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect('webboards/admin/webboard_bad_words');
	}
	
}