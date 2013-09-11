<?php
class Category extends ORM {

    var $table = 'categories';
	
	var $has_one = array("user");
	
	var $has_many = array("member","weblink");

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
	
	function get_option($where=NULL,$lang='th')
	{
		$where = ($where == "")?'':'AND '.$where;
		
		$query = "SELECT id,name
					FROM $this->table
					WHERE module = '".plural($this->parent['model'])."'
					AND parents <> 0 
					$where 
					ORDER BY id asc";
		//$query = $this->query($query)->all_to_assoc('id','name');
		//return $query;\\
		$CI =& get_instance();
		$query = $CI->db->query($query);
		foreach($query->result() as $item) $option[$item->id] = lang_decode($item->name,$lang);
		return $option;
	}
	
	function path($current = TRUE)
	{
		($current)?$equal = '=':$equal = '';
		$query = "select * from $this->table 
				  where lft <$equal (select lft from $this->table where id = $this->id) 
				  and rgt >$equal (select lft from $this->table where id = $this->id) 
				  and module = '".$this->parent['model']."'  order by lft asc";
		$query = $this->query($query)->all_to_array();
		return $query;
	}
	
	function breadcrumb($link = FALSE)
	{
		$crumb = "";
		$delimiter = "";
		$data = $this->path();
		foreach($data as $key => $item)
		{
			$crumb .= ($link)?$delimiter.anchor($link.$item['id'],$item['name']):$delimiter.$item['name'];
			$delimiter=" » ";
		}
		return $crumb;
	}
	
	
}
?>