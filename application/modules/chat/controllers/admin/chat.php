<?php
class Chat extends Admin_Controller
{
    
    function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
        $data['msgs'] = new Msg();
        $data['msgs']->order_by('id','desc')->get_page();
        $this->template->build('admin/index',$data);
    }
    
    function delete($id=FALSE)
    {
        if($id)
        {
            $msg = new Msg($id);
            $msg->delete();
            set_notify('success', lang('delete_data_complete'));
        }
        redirect('chat/admin/chat');
    }

}
?>