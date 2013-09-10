<?php
class Kpop_news extends Admin_Controller
{
    
    function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
        $data['news'] = new Kpop_new();
        $data['news']->order_by('id','desc')->get_page();
		$this->template->append_metadata(js_checkbox('approve'));
        $this->template->build('admin/index',$data);
    }
	
	function form($id=false){
		$data['new'] = new Kpop_new($id);
		$this->template->build('admin/form',$data);
	}
    
	function save($id=false){
	    if($_POST){
    		$new = new Kpop_new($id);
            $_POST['slug'] = clean_url($_POST['title']);
    		$new->from_array($_POST);
    		$new->save();
    		set_notify('success', lang('save_data_complete'));
        }
		redirect('kpop_news/admin/kpop_news');
	}
	
    function delete($id=FALSE)
    {
        if($id)
        {
            $new = new Kpop_new($id);
            $new->delete();
            set_notify('success', lang('delete_data_complete'));
        }
        redirect('kpop_news/admin/kpop_news');
    }
	
	function approve($id)
	{
		if($_POST)
		{
			$new = new Kpop_new($id);
			$new->from_array($_POST);
			$new->save();
		}
	}

}
?>