<?php
class Chat extends Public_Controller
{
	function __construct()
	{
		parent::__construct();
	}
	
	function index()
	{
		$this->template->build('index');
	}
    
    function inc_home(){
        $this->load->view('inc_home');
    }
	
	function post()
	{
		$chatonline = new Chatonline($this->session->userdata('chatonline_id'));
		if($chatonline->id)
		{
			$msg = new Msg;
			$msg->msg = strip_tags($this->input->post('msg'));
			$msg->user_id = $chatonline->user_id ? $chatonline->user_id : NULL;
			$msg->author = $chatonline->user_id ? $chatonline->user->username : $chatonline->author; 
			$msg->save();
		}
		echo $chatonline->id;		
	}
	
	function update($id = NULL)
	{
		$msg = new Msg;
		
		if(!$id || $id != $msg->select_max('id')->get()->id)
		{
			($msg->count() > 20) ? $msg->limit(20,$msg->count() - 20) : $msg->limit(20);
			foreach($msg->order_by('created asc')->get() as $m)
			{
				$html = '<li rel="'.$m->id.'">';
				$html .= '<div class="chat-line-image">';
				$html .= ($m->user->image != "") ? thumb($m->user->image,40,40,1) : thumb("media/images/noavatar.gif",40,40,1);
				$html .= '</div>';
				$html .= '<div class="chat-line-content">';
				$html .= '<span class="chat-line-content-display">'.$m->author.'</span>: ';
				$html .= $this->emoticon($m->msg);
				$html .= '<p class="chat-line-content-date">โพสเมื่อ '.mysql_to_relative($m->created).'</p>';
				$html .= '</div>';
				$html .= '<div class="clear"></div></li>';
				echo $html;
			}	
		}
	}
	
	function login()
	{
		if($_POST)
		{
			$chatonline = new Chatonline;
			$chatonline->from_array($_POST);
			$today = mktime(date("H")+7,date("i"),date("s"),date("m"),date("d"),date("Y")) ; 
			$chatonline->last_online = date("Y-m-d H:i:s",$today);
			$chatonline->save();
			if($chatonline->id) $this->session->set_userdata('chatonline_id',$chatonline->id);
		}
	}
	
	function status()
	{
		$chatonline = new Chatonline($this->session->userdata('chatonline_id'));
		if($chatonline->id)
		{
			$today = mktime(date("H")+7,date("i"),date("s"),date("m"),date("d"),date("Y")) ; 
			$chatonline->last_online = date('Y-m-d H:i:s',$today);
			$chatonline->save();	
		}
		echo ($chatonline->id) ? TRUE : FALSE;
	}
	
	function online()
	{
		$chatonline = new Chatonline;
		$chatonline->where("last_online < SUBTIME(NOW(),'0:0:30')")->get()->delete_all();
		echo '<li class="online-user-total">จำนวนผู้ออนไลน์ '.$chatonline->count().' คน</li>';
		foreach($chatonline->get() as $item)
		{
			$img = ($item->user->image != "") ? thumb($item->user->image,32,32,1) : thumb("media/images/noavatar.gif",32,32,1);
			$author = $item->user_id ? $item->user->username : $item->author;
			echo '<li><div class="online-user-image">'.$img.'</div><div class="online-user-name">'.$author.'</div><br clear="all"></li>';
		} 
	}
	
	function logout()
	{
		$chatonline = new Chatonline($this->session->userdata('chatonline_id'));
		$chatonline->delete();
		$this->session->set_userdata('chatonline_id',NULL);
	}	
	
	function emoticon($data = NULL)
	{
		for($i=1;$i<21;$i++){ $emoticon[] = ':'.sprintf("%03d",$i); $emoimage[] = '<img src="media/images/emoticon/'.sprintf('%03d',$i).'.gif" width="19" height="19"/>'; }
		return str_replace($emoticon, $emoimage, $data);
	}
	
	function emoticon_list()
	{
		for($i=1;$i<21;$i++)
		{ 
			echo '<a href="javascript:;" onclick="javascript:ChatInsertEmoticon(\':'.sprintf('%03d',$i).'\');"><img src="media/images/emoticon/'.sprintf('%03d',$i).'.gif" width="19" height="19"/></a>'; 
		}
	}
	
	function check_author_exit()
	{
		$chatonline = new Chatonline;
		$chatonline->where('author',$_GET['author'])->or_where_related_user('username',$_GET['author']);
		$chatonline->get();
		echo ($chatonline->author) ? 'false' : 'true';
	}
}
?>