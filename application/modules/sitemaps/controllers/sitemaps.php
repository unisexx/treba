<?php
class Sitemaps extends Public_Controller{
    
    function __construct(){
        parent::__construct();
    }
    
    function index(){
        $data['abouts'] = new About();
        $data['abouts']->order_by('id','desc')->get();
        
        $data['categories'] = new Category();
        $data['categories']->where('parents = 1')->order_by('id','asc')->get();
        $this->template->build('index',$data);
    }
}
?>
