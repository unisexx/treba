<?php
class Rss extends Public_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper('xml');  
        $this->load->helper('text');  
	}
	
	function news()
	{
		$data['feed_name'] = 'ข่าวเกาหลีอัพเดทล่าสุด - kpoplover';  
        $data['encoding'] = 'utf-8';  
        $data['feed_url'] = 'http://www.kpoplover.com';  
        $data['page_description'] = 'อัพเดทข่าวเกาหลี เพลงเกาหลี ซีรีย์เกาหลี';  
        $data['page_language'] = 'en-en';  
        $data['creator_email'] = 'unisexx@gmail.com';  
        $data['posts'] = new Kpop_new();
		$data['posts']->where("status = 'approve'")->order_by('id','desc')->get_page();
        header("Content-Type: application/rss+xml"); 
        $this->load->view('rss', $data);
	}
	
	function mv(){
		$data['feed_name'] = 'K-POP music video อัพเดทล่าสุด - kpoplover';  
        $data['encoding'] = 'utf-8';  
        $data['feed_url'] = 'http://www.kpoplover.com';  
        $data['page_description'] = 'อัพเดทข่าวเกาหลี เพลงเกาหลี ซีรีย์เกาหลี';  
        $data['page_language'] = 'en-en';  
        $data['creator_email'] = 'unisexx@gmail.com';  
        $data['posts'] = new Music_video();
		$data['posts']->where('status = "approve"')->order_by('id','desc')->get_page();
        header("Content-Type: application/rss+xml"); 
        $this->load->view('mv', $data);
	}
	
	function series(){
		$data['feed_name'] = 'ซีรีย์เกาหลีซับไทยอัพเดทล่าสุด - kpoplover';  
        $data['encoding'] = 'utf-8';  
        $data['feed_url'] = 'http://www.kpoplover.com';  
        $data['page_description'] = 'อัพเดทข่าวเกาหลี เพลงเกาหลี ซีรีย์เกาหลี';  
        $data['page_language'] = 'en-en';  
        $data['creator_email'] = 'unisexx@gmail.com';
        $data['posts'] = new Vdo();
		$data['posts']->where('category_id IS NOT NULL')->order_by('id','desc')->get_page();
        header("Content-Type: application/rss+xml"); 
        $this->load->view('series', $data);
	}
    
    function concerts(){
        $data['feed_name'] = 'อัพเดทคอนเสิร์ต K-pop ทุกสัปดาห์ - kpoplover';  
        $data['encoding'] = 'utf-8';
        $data['feed_url'] = 'http://www.kpoplover.com';
        $data['page_description'] = 'อัพเดทข่าวเกาหลี เพลงเกาหลี ซีรีย์เกาหลี';  
        $data['page_language'] = 'en-en';  
        $data['creator_email'] = 'unisexx@gmail.com';
		
		$concert_category = new concert_category();
		$concert_category->order_by('id','desc')->get(1);
		
        $data['posts'] = new Concert_vid();
        $data['posts']->where('concert_category_id = '.$concert_category->id)->order_by('id','desc')->get();
		
        header("Content-Type: application/rss+xml"); 
        $this->load->view('concert', $data);
    }

    function chart(){
        $data['feed_name'] = '100 อันดับชาร์ตเพลงเกาหลี K-pop อัพเดท - kpoplover';  
        $data['encoding'] = 'utf-8';
        $data['feed_url'] = 'http://www.kpoplover.com';
        $data['page_description'] = 'อัพเดทข่าวเกาหลี เพลงเกาหลี ซีรีย์เกาหลี';  
        $data['page_language'] = 'en-en';  
        $data['creator_email'] = 'unisexx@gmail.com';
        
        $data['posts'] = new Music_chart_category();
		$data['posts']->where("status = 'approve'")->order_by('id','desc')->get();
        header("Content-Type: application/rss+xml"); 
        $this->load->view('chart', $data);
    }

    function webboard(){
        $data['feed_name'] = 'เว็บบอร์ด - kpoplover';  
        $data['encoding'] = 'utf-8';
        $data['feed_url'] = 'http://www.kpoplover.com';
        $data['page_description'] = 'อัพเดทข่าวเกาหลี เพลงเกาหลี ซีรีย์เกาหลี';  
        $data['page_language'] = 'en-en';  
        $data['creator_email'] = 'unisexx@gmail.com';
        
        $data['posts'] = new Webboard_quiz();
        $data['posts']->where("webboard_category_id <> 11 and webboard_category_id <> 1")->order_by('id','desc')->get();
        header("Content-Type: application/rss+xml"); 
        $this->load->view('webboard', $data);
    }
}