<?php

class Auth
{
	
	private $CI;
	
	function __construct()
	{
		$this->CI =& get_instance();	
	}
	
	function login($email,$password)
	{
		$sql = 'select * from users where email = ? and password = ?';
		$id = $this->CI->db->GetOne($sql,array($email,$password));	
		//$id = $this->CI->user_model->check_login($username,$password);	
		if($id)
		{
			$this->CI->session->set_userdata('id',$id);
			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
	
	function logout()
	{
		$this->CI->session->unset_userdata('id');
	}
	
	function is_login($type = '')
	{
		if($type == 'admin')
		{
			return (auth_data('level_id') == 1) ? TRUE : FALSE;	
		}
		else
		{
			return ($this->CI->session->userdata('id')) ? TRUE : FALSE;	
		}
		
	}
	
}

?>