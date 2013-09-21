<?php
class Banners extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    
    function form($id=FALSE)
    {
        $data['banner'] = new Banner($id);
        $this->template->build('admin/form',$data);
    }

    function save($id=false){
        if($_POST){
            $banner = new Banner($id);
            $banner->from_array($_POST);
            $banner->save();
            set_notify('success', lang('save_data_complete'));
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
}
?>