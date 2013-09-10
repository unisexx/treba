<?php
class Users extends Public_Controller{
	
	function __construct(){
		parent::__construct();
        $this->template->set_layout('_blank');
	}
	
	function register(){
		$this->template->build('register');
	}
	
	function signup()
	{
		if($_POST)
		{
			$captcha = $this->session->userdata('captcha');
			if(($_POST['captcha'] == $captcha) && !empty($captcha)){
				$_POST['user_type_id'] = 3; // สมาชิกทั่วไป
			    $_POST['password'] = md5(sha1($_POST['password']."secret"));
				$user = new User();
				$user->from_array($_POST);
				//$user->last_login = date('Y-m-d H:i:s');
				$user->save();
				set_notify('success', 'สมัครสมาชิกเรียบร้อย');
			}else{
				set_notify('error','กรอกรหัสไม่ถูกต้อง');
				redirect($_SERVER['HTTP_REFERER']);
			}
			redirect('home');
		}
	}
	
	function facebook_login(){
		if($_POST){ //ส่งค่ามาจาก ajax หลังจากกดปุ่ม facebook-login
			$user = new User();
            $user->where('facebook_id = '.$_POST['facebook_id'])->get();
            if($user->exists()) // ภ้ามี user นี้ใน database //ให้  set_userdata
            {
                $this->session->set_userdata('id',$user->id);
                $this->session->set_userdata('level',$user->level_id);
                $this->session->set_userdata('user_type',$user->user_type_id);
                $this->session->set_userdata('facebook_id',$user->facebook_id);
                set_notify('success', 'ยินดีต้อนรับเข้าสู่ระบบ');
                $this->output->set_output("refresh");
            }
            else // ถ้ายังไม่มีข้อมูล user ใน database ให้ทำเป็นสมัครสมาชิก
            {
                // print_r($_POST);
                $_POST['user_type_id'] = 3; // สมาชิกทั่วไป
                $_POST['level_id'] = 2;
                // $_POST['image'] = 'http://graph.facebook.com/'.$_POST['facebook_id'].'/picture?type=large';
                $user = new User();
                $user->from_array($_POST);
                $user->save();
                
                $user = new User();
                $user->where('facebook_id = '.$_POST['facebook_id'])->get();
            
                $this->session->set_userdata('id',$user->id);
                $this->session->set_userdata('level',$user->level_id);
                $this->session->set_userdata('user_type',$user->user_type_id);
                $this->session->set_userdata('facebook_id',$user->facebook_id);
                set_notify('success', 'ยินดีต้อนรับเข้าสู่ระบบ');
                $this->output->set_output("refresh");
            }
		}
	}
	
    function check_username(){
        $user = new User();
        $user->get_by_username($_GET['username']);
		($user->username)?$this->output->set_output("false"):$this->output->set_output("true");
    }
    
	function check_email()
	{
		$user = new User();
		$user->get_by_email($_GET['email']);
		($user->email)?$this->output->set_output("false"):$this->output->set_output("true");
	}
	
	function check_captcha()
	{
		if($this->session->userdata('captcha')==$_GET['captcha'])
		{
			$this->output->set_output("true");
		}
		else
		{
			$this->output->set_output("false");
		}
	}
	
	function login_frm()
	{
		$this->template->build('login_frm');
	}
	
	function login()
	{
		if($_POST)
		{
			if(login($_POST['username'], $_POST['password']))
			{
				set_notify('success', 'ยินดีต้อนรับเข้าสู่ระบบค่ะ');
				redirect($_SERVER['HTTP_REFERER']);
			}
			else
			{
				set_notify('error', 'ชื่อผู้ใช้หรือรหัสผ่านผิดพลาดค่ะ');
				redirect($_SERVER['HTTP_REFERER']);
			}	
		}
		else
		{
			set_notify('error', 'กรุณาทำการล็อคอินค่ะ');
			redirect($_SERVER['HTTP_REFERER']);
		}
	}
	
	function inc_login()
	{
		if(is_login())
		{
			$data['user'] = new User($this->session->userdata('id'));
			$this->load->view('inc_member',$data);
		}
		else
		{
			$this->load->view('inc_loginlink');
		}
	}
	
	function logout()
	{
		logout();
		set_notify('error', 'ออกจากระบบเรียบร้อยแล้วค่ะ');
		redirect($_SERVER['HTTP_REFERER']);
	}
	
    function forget_pass_form(){
        
    }
    
	function forget_pass(){
	    $this->template->build('forget_pass');
	}
    
    function forget_pass_save(){
        if($_POST){
            $captcha = $this->session->userdata('captcha');
            if(($_POST['captcha'] == $captcha) && !empty($captcha)){
                $auth_key = md5(rand());
                $user = new User();
                $user->where('email', $_POST['email'])->update(array('auth_key'=>$auth_key));
                $this->send_mail($auth_key,$_POST['email']);
                set_notify('success', 'ระบบได้ทำการส่งเมล์ยืนยันการเปลี่ยนรหัสเรียบร้อยแล้วค่ะ');
            }else{
                set_notify('error','กรอกรหัสไม่ถูกต้อง');
                redirect($_SERVER['HTTP_REFERER']);
            }
        }
        redirect('home');
    }
    
    function repass($auth_key){
        if($auth_key != ""){
            $user = new User();
            $data['user'] = $user->where("auth_key = '".$auth_key."'")->get();
            if($user->exists()){
                $this->template->build('repass',$data);
            }else{
                set_notify('error', 'คุณไม่อนุญาติให้เข้าใช้งาน');
                redirect('home');
            }
        }else{
            set_notify('error', 'คุณไม่อนุญาติให้เข้าใช้งาน');
            redirect('home');
        }
    }
    
    function repass_save(){
        if($_POST){
            $user = new User();
            $_POST['password'] = md5(sha1($_POST['password']."secret"));
            $user->where('auth_key', $_POST['auth_key'])->update(array(
                'password'=>$_POST['password'],
                'auth_key'=>''
            ));
            set_notify('success', 'ทำการเปลี่ยนรหัสเรียบร้อย');
        }
        redirect('home');
    }
	
	function send_mail($auth_key,$email){
		
		$config = Array(
		    'protocol' => 'smtp',
		    'smtp_host' => 'ssl://smtp.googlemail.com',
		    'smtp_port' => 465,
		    'smtp_user' => 'noreply.kpoplover@gmail.com',
		    'smtp_pass' => 'Des@gn;9',
		    'mailtype'  => 'html', 
		    'charset'   => 'utf-8'
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		
		// Set to, from, message, etc.
		$this->email->from('noreply.kpoplover@gmail.com', 'noreply.kpoplover');
		$this->email->to($email); //ส่งถึงใคร
		$this->email->subject('ยืนยันการเปลี่ยนรหัสผ่านใหม่ - kpoplover.com'); //หัวข้อของอีเมล
		$this->email->message('สวัสดีครับ<br><br>หากคุณต้องการเปลี่ยนรหัสผ่านใหม่กรุณาคลิกตามลิ้งค์ที่ปรากฏ<br><br>http://www.kpoplover.com/users/repass/'.$auth_key); //เนื้อหาของอีเมล
		
		$result = $this->email->send();
		//echo $this->email->print_debugger();
	}
    
    function account_setting(){
        if(is_login()){
            $data['user'] = new User($this->session->userdata('id'));
            $this->template->build('account_setting',$data);
        }else{
            redirect("home");
        }
    }
    
    function account_setting_save(){
        if($_POST){
            $user = new User();
            $_POST['id'] = $this->session->userdata('id');
            $_POST['signature'] = $_POST['detail'];
            $user->from_array($_POST);
            $user->save();
            set_notify('success', 'บันทึกข้อมูลเรียบร้อย');
        }
        redirect($_SERVER['HTTP_REFERER']);
    }
}
?>