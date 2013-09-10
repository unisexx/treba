<?php
class Master_Controller extends MX_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function captcha()
	{
		$this->load->library('captcha');
		$captcha = new Captcha();
		$captcha->size = 4;
		$captcha->chars = '0123456789';
		$captcha->session = "captcha";
		$captcha->display();
	}
}
?>