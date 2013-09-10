<?php
class Banners extends Admin_Controller
{
    
    function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
        $data['banners'] = new Banner();
        $data['banners']->order_by('end_date asc')->get_page();
        $this->template->append_metadata(js_checkbox('approve'));
        $this->template->build('admin/index',$data);
    }
    
    function form($id=FALSE)
    {
        $data['banner'] = new Banner($id);
        $this->template->append_metadata(js_datepicker());
        $this->template->build('admin/form',$data);
    }
    
    function save($id=FALSE)
    {
        if($_POST)
        {
            $banner = new Banner($id);
			$_POST['status'] = "approve";
            $_POST['start_date'] = Date2DB($_POST['start_date']);
            $_POST['end_date'] = Date2DB($_POST['end_date']);
            $banner->from_array($_POST);
            $banner->save();
            set_notify('success', lang('save_data_complete'));
        }
        redirect('banners/admin/banners');
    }
    
    function delete($id=FALSE)
    {
        if($id)
        {
            $banner = new Banner($id);
            $banner->delete();
            set_notify('success', lang('delete_data_complete'));
        }
        redirect('banners/admin/banners');
    }

    function approve($id)
    {
        if($_POST)
        {
            $banner = new Banner($id);
            $_POST['approve_id'] = $this->session->userdata('id');
            $banner->from_array($_POST);
            $banner->save();
        }

    }
    
    function save_orderlist($id=FALSE){
        if($_POST)
        {
                foreach($_POST['orderlist'] as $key => $item)
                {
                    if($item)
                    {
                        $banner = new Banner(@$_POST['orderid'][$key]);
                        $banner->from_array(array('orderlist' => $item));
                        $banner->save();
                    }
                }
            set_notify('success', lang('save_data_complete'));
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
}
?>