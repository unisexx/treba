<?php
class Administrators extends Admin_Controller
{
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$data['users'] = new User;
		$data['users']->where('level_id',1);
		$this->template->build('admin/admins/index',$data);
	}
	
	public function form($id = NULL)
	{	
		$data['user'] = new User($id);
		$data['user_types'] = new User_type();
		$data['user_types']->order_by('id','asc')->get();
		//media
		$this->template->append_metadata('<script type="text/javascript" src="themes/zulex/js/jquery.validate.min.js"></script>');
		$this->template->build('admin/admins/form',$data);
	}
	
	public function save($id = NULL)
	{
		if($_POST)
		{
			$_POST['password'] = md5(sha1($_POST['password']."secret"));
			$user = new User($id);
			$user->from_array($_POST);
			$user->level_id = 1;
			$user->save();
			set_notify('success', lang('save_data_complete'));	
		}
		redirect('users/admin/administrators');
	}
	
	public function delete($id)
	{
		if($id)
		{
			$user = new User($id);
			$user->delete();	
			set_notify('success', lang('delete_data_complete'));	
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
}

?>