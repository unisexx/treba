<?php
class categories extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->template->set_layout('lightbox');
		$categories = new Category();
		$data['categories'] = $categories->where("module = 'newsletters' and parents <> 0")->order_by('id','desc')->get_page();
		$this->template->append_metadata(js_lightbox());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/category_index',$data);
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$categories = new Category($id);
			$categories->from_array($_POST);
			$categories->save();
		}
		echo $_POST['status'];
	}
	
	function form($id=FALSE)
	{	
			$categories = new Category();
			$categories->where("module = 'newsletters' and parents = 0")->get();
			$data['parent'] = $categories->get_clone();
			$categories->clear();
			$data['category'] = $categories->get_by_id($id);
			$this->template->build('admin/category_form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			$category = new Category($id);
			$_POST['name'] = lang_encode($_POST['name']);
			$category->from_array($_POST);
			$category->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect('newsletters/admin/categories/member_index');
	}
	
	function delete($id)
	{
		if($id)
		{
			$category = new Category($id);
			$module = $category->module;
			$category->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('newsletters/admin/categories/member_index');
	}
	
	function member_index(){
		$data['user'] = new User();
		$data['email_list'] = new Newsletters_email_list();
		$data['categories'] = new Category();
		if(@$_GET['search'])$data['categories']->where("name like '%".$_GET['search']."%'");
		$data['categories'] = $data['categories']->where("module = 'newsletters' and parents <> 0")->order_by('id','desc')->get_page();
		$this->template->build('admin/category_member_index',$data);
	}
	
	function member_view($id=NULL){
		$users = new User();
		$data['category'] = new Category($id);
		if($id)
		{
			$data['users'] = $users->where("newsletter like '%".$id."%'")->get_page();
		}
		else
		{
			$data['users'] = $users->where("newsletter <> ''")->get_page();
		}
		$this->template->build('admin/category_member_view',$data);
	}
	
	function email_list_view($id=NULL){
		$email_lists = new Newsletters_email_list();
		$data['category'] = new Category($id);
		if($id)
		{
			$data['email_lists'] = $email_lists->where("newsletter like '%".$id."%'")->get_page();
		}
		else
		{
			$data['email_lists'] = $email_lists->where("newsletter <> ''")->get_page();
		}
		$this->template->build('admin/category_email_list_view',$data);
	}
	
	
}
?>