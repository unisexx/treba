<?php
class Webboard_categories extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['categories'] = new Webboard_category();
		$data['categories']->order_by('orderlist','asc')->get_page();
		$this->template->append_metadata(js_lightbox());
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/category_index',$data);
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$categories = new Webboard_category($id);
			$categories->from_array($_POST);
			$categories->save();
		}
		echo $_POST['status'];
	}
	
	function form($id=FALSE)
	{	
			$categories = new Webboard_category();
			$categories->get();
			$data['parent'] = $categories->get_clone();
			$categories->clear();
			$data['category'] = $categories->get_by_id($id);
			$this->template->build('admin/category_form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST)
		{
			if(isset($_POST['orderlist'])){
				foreach($_POST['orderlist'] as $key => $item)
				{
					if($item)
					{
						$category = new Webboard_category(@$_POST['orderid'][$key]);
						$category->from_array(array('orderlist' => $item));
						$category->save();
					}
				}
				set_notify('success', lang('save_data_complete'));
			}else{
				$category = new Webboard_category($id);
                $_POST['slug'] = clean_url($_POST['name']);
				$category->from_array($_POST);
				$category->save();
				set_notify('success', lang('save_data_complete'));
			}
		}
		redirect('webboards/admin/webboard_categories');
	}
	
	function delete($id)
	{
		if($id)
		{
			$category = new Webboard_category($id);
			$module = $category->module;
			$category->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('webboards/admin/webboard_categories');
	}
	
}
?>