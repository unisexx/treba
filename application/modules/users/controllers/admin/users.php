<?php

class Users extends Admin_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$data['users'] = new User;
		if(!empty($_POST['search']))$data['users']->where("username like '%".$_POST['search']."%'");
		$data['users']->where('level_id',2);
		$this->template->build('admin/users/index',$data);
	}
	
	public function form($id = NULL)
	{	
		$data['user'] = new User($id);
		$this->template->build('admin/users/form',$data);
	}
	
	public function save($id = NULL)
	{
		if($_POST)
		{
			$user = new User($id);
			$_POST['password'] = md5(sha1($_POST['password']."secret"));
			$user->from_array($_POST);
			$user->save();
			set_notify('success', lang('save_data_complete'));	
		}
		redirect('users/admin/users');
	}
	
	public function delete($id)
	{
		if($id)
		{
			$user = new User($id);
			$user->delete();	
			set_notify('success', lang('delete_data_complete'));	
		}
		redirect('users/admin/users');
	}
	
}

?>