<?php
class Public_Controller extends Master_Controller
{
	function __construct()
	{
		parent::__construct();
		
		header('Content-type: text/html; charset=UTF-8');
		$this->template->title('อัพเดทข่าวเกาหลี เพลงเกาหลี ซีรีย์เกาหลีใหม่ล่าสุด - Kpoplover');
		$this->template->set_theme('front');
    	$this->template->set_layout('layout');
		
		// Set js
		$this->lang->load('admin');
		// $this->template->append_metadata(js_notify());
		// $this->template->append_metadata(js_lightbox());
		
		// Set Keywords , Description
		meta_description();
		$this->template->append_metadata( meta('keywords','เกาหลี,ซีรีย์,ซีรีย์เกาหลี,ข่าวเกาหลี,เพลงเกาหลี,ซับไทย,ออนไลน์,series,korea,music,mv,kpop,k-pop,Inkigayo,Mnet,Music Core,บันเทิงเกาหลี,ดาราเกาหลี,นักร้องเกาหลี,หนังเกาหลี,ศิลปินเกาหลี,วาไรตี้เกาหลี'));
        
        //$this->output->cache(5);
	}
}
?>