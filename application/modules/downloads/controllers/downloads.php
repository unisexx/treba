<?php
class Downloads extends Public_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    
    function index(){
        $data['downloads'] = new Download();
        $data['downloads']->order_by('id','desc')->get_page();
        $this->template->build('index',$data);
    }
    
    function download($id){
        $download = new Download($id);
        $download->counter();
        $data = file_get_contents('uploads/download/'.urldecode($download->file));
        $name = basename($download->file);
        force_download($name, $data);
    }
}
?>