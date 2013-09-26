<?php
class Contacts extends Public_Controller{
	
	function __construct(){
		parent::__construct();
	}
	
	function index(){
		$id = 1;
		$data['contact'] = new Contact_detail($id);
		$this->template->build('index',$data);
	}
    
    function save(){
        if($_POST){
            // $captcha = $this->session->userdata('captcha');
            // if(($_POST['captcha'] == $captcha) && !empty($captcha)){
                $contact = new Contact();
                $_POST['ip'] = $_SERVER['REMOTE_ADDR'];
                $contact->from_array($_POST);
                $contact->save();
                set_notify('success', 'ส่งข้อความเรียบร้อยแล้วค่ะ');
            // }else{
                // set_notify('error','กรอกรหัสไม่ถูกต้อง');
            // }
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
}
?>