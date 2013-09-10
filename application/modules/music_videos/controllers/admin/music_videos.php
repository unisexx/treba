<?php
class Music_videos extends Admin_Controller
{
    
    function __construct()
    {
        parent::__construct();
    }
    
    function index()
    {
        $data['mvs'] = new Music_video();
        $data['mvs']->order_by('id','desc')->get_page();
		$this->template->append_metadata(js_checkbox('approve'));
        $this->template->build('admin/index',$data);
    }
	
	function form($id=false){
		$data['mv'] = new Music_video($id);
		$this->template->build('admin/form',$data);
	}
    
	function save($id=false){
		if($_POST){
		    $_POST['status'] = 'approve';
			$new = new Music_video($id);
            $_POST['slug'] = clean_url($_POST['title']);
			$new->from_array($_POST);
			$new->save();
			set_notify('success', lang('save_data_complete'));
		}
		redirect('music_videos/admin/music_videos');
	}
	
    function delete($id=FALSE)
    {
        if($id)
        {
            $mv = new Music_video($id);
            $mv->delete();
            set_notify('success', lang('delete_data_complete'));
        }
        redirect('music_videos/admin/music_videos');
    }
	
	function approve($id)
	{
		if($_POST)
		{
			$new = new Music_video($id);
			$new->from_array($_POST);
			$new->save();
		}
	}

}
?>