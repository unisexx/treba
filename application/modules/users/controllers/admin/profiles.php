<?php

class Profiles extends Admin_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$data['user'] = new User(user('id'));
		$this->template->build('admin/profiles/index',$data);
	}
	
	public function save()
	{
		if($_POST)
		{
			$user = new User(user('id'));
			$user->from_array($_POST);
			$user->save();
			set_notify('success', lang('save_data_complete'));	
		}
		redirect('users/admin/profiles');
	}
	
}

?>