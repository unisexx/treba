<?php
class polls extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$data['polls'] = new poll();
		if(isset($_POST['search']))$data['polls']->where('title like \'%'.$_POST['search'].'%\'');
		$data['polls']->order_by('id','desc')->get_page();
		$this->template->append_metadata(js_checkbox());
		$this->template->build('admin/poll_index',$data);
	}
	
	function form($id = FALSE)
	{
		$data['poll'] = new poll($id);
		$this->template->build('admin/poll_form',$data);
	}
	
	function save($id = FALSE)
	{
		if($_POST)
		{
			$poll = new poll($id);
			if($id)$poll->user_id = $this->session->userdata('id');
			$poll->title = $_POST['title'];
			$poll->save();
			$id = $poll->id;
			foreach($_POST['name'] as $key => $item)
			{
				if($item)
				{
					$polldetail = new Polldetail(@$_POST['detail_id'][$key]);
					$polldetail->from_array(array('name' => $item,'poll_id'=> $id));
					$polldetail->save();
				}
			}
			set_notify('success', lang('save_data_complete'));
		}
		redirect('polls/admin/polls/form/'.$id);
	}
	
	function approve($id)
	{
		if($_POST)
		{
			$poll = new poll($id);
			$poll->from_array($_POST);
			$poll->save();
			$poll->clear();
			$poll->where('id <>', $id)->get();
			$poll->update_all('active',0);
		}
	}
	
	function delete($id)
	{
		if($id)
		{
			$poll = new Poll($id);
			foreach($poll->polldetail as $item) $item->delete();
			$poll->delete();
			set_notify('success', lang('delete_data_complete'));
		} 
		redirect('polls/admin/polls');		
	}
	
	function delete_ans($id = FALSE)
	{
		if($id)
		{
			$polldetail = new Polldetail($id);
			$parent = $polldetail->poll_id;
			$polldetail->delete();
			set_notify('success', lang('delete_data_complete'));
		} 
		redirect('polls/admin/polls/form/'.$parent);		
	}
	

}
?>