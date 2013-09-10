<?php
class categories extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->template->set_layout('lightbox');
	}
	
	function index($module = FALSE)
	{
		$data['module'] = $module;
		$categories = new Category();
		$data['categories'] = $categories->where("module = '$module' and parents <> 0")->order_by('orderlist','asc')->get_page();
		$this->template->build('admin/category_index',$data);
	}
	
	function form($module,$id=FALSE)
	{	
			$categories = new Category();
			$categories->where("module = '$module' and parents = 0")->get();
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
			$category->from_array($_POST);
			$category->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect('categories/admin/categories/'.$_POST['module']);
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
		redirect('categories/admin/categories/'.$module);
	}
	
	function save_orderlist($id=FALSE){
		if($_POST)
		{
				foreach($_POST['orderlist'] as $key => $item)
				{
					if($item)
					{
						$category = new Category(@$_POST['orderid'][$key]);
						$category->from_array(array('orderlist' => $item));
						$category->save();
					}
				}
			set_notify('success', lang('save_data_complete'));
		}
		redirect('categories/admin/categories/'.$_POST['module']);
	}
}
?>