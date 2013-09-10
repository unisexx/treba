<?php
class Webboard_relate_dels extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$webboard_relate_dels = new Webboard_relate_del();
		$data['webboard_relate_dels'] = $webboard_relate_dels->order_by('id','desc')->get_page(20);
		$this->template->append_metadata(js_lightbox());
		$this->template->build('admin/webboard_relate_del_index',$data);
	}
	
	function delete($id=FALSE)
	{
		if($id)
		{
			$webboard_relate_del = new Webboard_relate_del($id);
			if($webboard_relate_del->webboard_answer_id == 0){
				$webboard_quiz = new Webboard_quiz($webboard_relate_del->webboard_quiz_id);
				$webboard_quiz->webboard_answer->delete_all();
				$webboard_quiz->delete();
			}else{
				$webboard_answer = new Webboard_answer($webboard_relate_del->webboard_answer_id);
				$webboard_answer->delete();
			}
			$webboard_relate_del->delete();			
			set_notify('success', lang('delete_data_complete'));
		}
		redirect('webboards/admin/webboard_relate_dels');
	}
	
	function form(){
		$this->template->set_layout('lightbox');
		
	}
}
?>