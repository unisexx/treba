<?php
class Lines extends Admin_Controller
{
    
    function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
        $data['lines'] = new Line();
        
        if(@$_GET['search'])$data['lines']->where("title like '%".$_GET['search']."%'");
        
        $data['lines']->order_by('sticker_code','desc')->get_page();
        $this->template->append_metadata(js_checkbox('approve'));
        $this->template->build('admin/index',$data);
    }
    
    function form($id=false){
        $data['line'] = new Line($id);
        $this->template->build('admin/form',$data);
    }
    
    function save($id=false){
        if($_POST){
            $line = new Line($id);
            $_POST['slug'] = clean_url($_POST['title']);
            $_POST['status'] = 'approve';
            $line->from_array($_POST);
            $line->save();
            set_notify('success', lang('save_data_complete'));
        }
        redirect($_POST['referer']);
    }
    
    function delete($id=FALSE)
    {
        if($id)
        {
            $line = new Line($id);
            $line->delete();
            set_notify('success', lang('delete_data_complete'));
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    function approve($id)
    {
        if($_POST)
        {
            $line = new Line($id);
            $line->from_array($_POST);
            $line->save();
        }
    }

}
?>