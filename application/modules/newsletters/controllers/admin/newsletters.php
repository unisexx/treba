<?php
class Newsletters extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index(){
		$data['newsletters'] = new Newsletter();
		if(@$_GET['search'])$data['newsletters']->where("title like '%".$_GET['search']."%'");
		if(@$_GET['category_id'])$data['newsletters']->where("category_id = ".$_GET['category_id']);
		$data['newsletters']->order_by('id','desc')->get_page();
		$this->template->append_metadata(js_lightbox());
		$this->template->build('admin/newsletter_index',$data);
	}
	
	function form($id=FALSE){
		$data['newsletters'] = new Newsletter($id);
		$this->template->build('admin/newsletter_form',$data);
	}
	
	/*
	function save($id=FALSE){
		$this->load->library('email');
		if($_POST)
		{
			$newsletter = new Newsletter($id);
			$_POST['user_id'] = $this->session->userdata('id');
			$newsletter->from_array($_POST);
			$newsletter->save();
			
			$users = new User();
			$users->where("newsletter like '%".$newsletter->category_id."%'")->get();
			foreach($users as $user)$email[] = $user->email;
			
			$newsletters_email_lists = new Newsletters_email_list();
			$newsletters_email_lists->where("newsletter like '%".$newsletter->category_id."%'")->get();
			
			foreach($newsletters_email_lists as $newsletters_email_list)$email2[] = $newsletters_email_list->email;
			
			$config['mailtype'] = 'html';
			$this->email->initialize($config);

			$this->email->from('thaigcd.morph.go.th@gmail.com', 'สำนักโรคติดต่อทั่วไป');
			
			$this->email->to($email);
			$this->email->bcc($email2); 
			
			$this->email->subject($newsletter->title);
			$this->email->message($newsletter->detail);
			if($_FILES['attachment']['name'])
			{
				$_POST['attachment'] = $newsletter->upload($_FILES['attachment'],'uploads/newsletter_attachment/');
				$this->email->attach('uploads/newsletter_attachment/'.$_POST['attachment']);
			}
			$this->email->send();
			// $this->email->print_debugger();
			
			set_notify('success', 'ส่งเมล์ถึงสมาชิกเรียบร้อย');
		}
		redirect('newsletters/admin/newsletters');
	}
	 */
	
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$newsletter = new Newsletter($id);
			$newsletter->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('newsletters/admin/newsletters');
	}
	

	function save($id=FALSE){
		
		if($_POST)
		{
			$newsletter = new Newsletter($id);
			$_POST['user_id'] = $this->session->userdata('id');
			$newsletter->from_array($_POST);
			$newsletter->save();
			
			if($_POST['sendmail'] == 1){
				// หา email nonmember
				$newsletters_email_lists = new Newsletters_email_list();
				$newsletters_email_lists->get();
				foreach($newsletters_email_lists as $newsletters_email_list)$email_nonmember[] = $newsletters_email_list->email;
				
				
				// ###### PHPMailer #### 
					require_once("PHPMailer_v5.1/class.phpmailer.php");  	// ประกาศใช้ class phpmailer กรุณาตรวจสอบ ว่าประกาศถูก path
					$mail = new PHPMailer();
					$mail->IsSMTP();
					$mail->Host = 'ssl://smtp.googlemail.com';
					$mail->Port = 465;
					$mail->Username = 'kpoplover.info@gmail.com';
					$mail->Password = 'm00nlight';
					$mail->SMTPAuth = true;
					$mail->CharSet = "utf-8";
					$mail->From = "kpoplover.info@gmail.com";		//  account e-mail ของเราที่ใช้ในการส่งอีเมล
					$mail->FromName = "ทีมงาน kpoplover.com";
					//$mail->AddAddress("unisexx@mail.com");	  		// Email ปลายทางที่เราต้องการส่ง
					$mail->IsHTML(true);								// ถ้า E-mail นี้ มีข้อความในการส่งเป็น tag html ต้องแก้ไข เป็น true
					$mail->Subject = $newsletter->title;        		// หัวข้อที่จะส่ง
					$mail->Body = $newsletter->detail;					// ข้อความ ที่จะส่ง
					$mail->SMTPDebug = false;
					$mail->do_debug = 0;
					
	
					if($_FILES['attachment']['name'])
					{
						$_POST['attachment'] = $newsletter->upload($_FILES['attachment'],'uploads/newsletter_attachment/');
						$mail->AddAttachment('uploads/newsletter_attachment/'.$_POST['attachment']);
					}
	
					
					foreach($email_nonmember as $email){
						$mail->AddAddress($email);
						$mail->send();
						
						// if (!$mail->send())
							// {																			
								// echo "Mailer Error: " . $mail->ErrorInfo;
								// exit;						
							// }
						
						$mail->ClearAddresses();
						//echo "$email1 <br>";
					}
			}
			set_notify('success', lang('save_data_complete'));
		}
		redirect('newsletters/admin/newsletters');
	}

}
?>