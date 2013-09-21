<?php
class Banners extends Public_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    
    function inc_home()
    {
        $id = 1;
        $data['banner'] = new Banner($id);
        $this->load->view('inc_home',$data);
    }
}
?>