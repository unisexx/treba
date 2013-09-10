<?php
class Newsletters_email_lists extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['newsletters_email_lists'] = new Newsletters_email_list();
		if(@$_GET['search'])$data['newsletters_email_lists']->where("email like '%".$_GET['search']."%'");
		$data['newsletters_email_lists']->order_by('status desc,id desc')->get_page(30);
		$this->template->append_metadata(js_checkbox('approve'));
		$this->template->build('admin/emaillist_index',$data);
	}
	
	function form($id=FALSE)
	{
		$data['email'] = new Newsletters_email_list($id);
		
		$categories = new Category();
			$data['categories'] = $categories->where("module = 'newsletters' and parents <> 0 and status = 'approve'")->order_by('id','desc')->get_page();
			
		$this->template->build('admin/emaillist_form',$data);
	}
	
	function save($id=FALSE)
	{
		if($_POST){
			$newsletters_email_list = new Newsletters_email_list($id);
			
            if($_POST['email_list'] != ""){
                $email = explode("\n",$_POST['email_list']);
                foreach($email as $item){
                    $newsletters_email_list = new Newsletters_email_list();
                    $newsletters_email_list->from_array(array('email'=>$item));
                    $newsletters_email_list->save();
                }
            }
              
            if($_POST['email'] != ""){
				$_POST['status'] = 'approve';
				$newsletters_email_list->from_array($_POST);
				$newsletters_email_list->save();
				set_notify('success', lang('save_data_complete'));
            }
		}
		redirect('newsletters/admin/newsletters_email_lists/form');
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$newsletters_email_list = new Newsletters_email_list($id);
			$newsletters_email_list->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('newsletters/admin/newsletters_email_lists');
	}
	
    function check_email()
    {
        $user = new Newsletters_email_list();
        $user->get_by_email($_GET['email']);($user->email)?$this->output->set_output("false"):$this->output->set_output("true");
        
    }
	
	function approve($id)
	{
		if($_POST)
		{
			$new = new Newsletters_email_list($id);
			$new->from_array($_POST);
			$new->save();
		}
	}
	
	function find_email_from_url(){
		if($_POST){
			error_reporting(0);
			$the_url = isset($_POST['url']) ? htmlspecialchars($_POST['url']) : '';
			if (isset($_POST['url']) && !empty($_POST['url'])) {
			  // fetch data from specified url
			  $text = file_get_contents($_POST['url']);
			}
			// parse emails
			if (!empty($text)) {
			  $res = preg_match_all(
			    "/[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}/i",
			    $text,
			    $matches
			  );
			
			  if ($res) {
			    foreach(array_unique($matches[0]) as $email) {
                  //$this->output->set_output($email);
					echo @$email;
			    }
			  }
			  else {
                $this->output->set_output("No emails found.");
			  }
			}
		}
	}
}
?>