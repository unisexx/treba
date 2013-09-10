<?php
class Banners extends Public_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    
    function inc_home_sidebar()
    {
        $data['banners'] = new Banner();
        $data['banners']->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve' and position = 'sidebar'")->order_by('orderlist','asc')->get();
        $this->load->view('inc_home_sidebar',$data);
    }
    
    function inc_home_footer(){
        $data['banners'] = new Banner();
        $data['banners']->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve' and position = 'footer'")->order_by('orderlist','asc')->get();
        
        $data['banner125'] = new Banner();
        $data['banner125']->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve' and position = 'footer125x125'")->order_by('orderlist','asc')->get();
		
		$data['banner468'] = new Banner();
        $data['banner468']->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve' and position = 'footer468x60'")->order_by('orderlist','asc')->get();
        
        $data['bannertxts'] = new Banner();
        $data['bannertxts']->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve' and position = 'footertext'")->order_by('orderlist','asc')->get();
        
        $this->load->view('inc_home_footer',$data);
    }
	
	function inc_top(){
		$data['banner_top'] = new Banner();
        $data['banner_top']->where("start_date <= date(sysdate()) and (end_date >= date(sysdate()) or end_date = date('0000-00-00')) and status = 'approve' and position = 'top'")->order_by('id','random')->get();
        $this->load->view('inc_top',$data);
	}
}
?>