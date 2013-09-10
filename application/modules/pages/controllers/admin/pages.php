<?php
class Pages extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    
    function index(){
        $data['pages'] = new Page();
        $data['pages']->order_by('id','desc')->get_page();
        $this->template->append_metadata(js_checkbox('approve'));
        $this->template->build('admin/index',$data);
    }
    
    function form($id=FALSE){
        $data['page'] = new Page($id);
        $this->template->build('admin/form',$data);
    }
    
    function save($id=false){
        if($_POST){
            $_POST['status'] = 'approve';
            $_POST['user_id'] = user_login()->id;
            
            $page = new Page($id);
            $page->from_array($_POST);
            $page->save();
            set_notify('success', lang('save_data_complete'));
        }
        redirect('pages/admin/pages');
    }
    
    function delete($id=FALSE)
    {
        if($id)
        {
            $page = new Page($id);
            $page->delete();
            set_notify('success', lang('delete_data_complete'));
        }
        redirect('pages/admin/pages');
    }
    
    function approve($id)
    {
        if($_POST)
        {
            $page = new Page($id);
            $page->from_array($_POST);
            $page->save();
        }
    }
}
?>