<?php
class Permissions extends Admin_Controller
{
	
	public $module = array(
		'administrators' => array('label' => 'ผู้ดูแล', 'permission' => array('read','create','update','delete')),
		'dashboards' => array('label' => 'สถิติโดยรวม', 'permission' => array('read')),
		'coverpages' => array('label' => 'หน้าแรก', 'permission' => array('read','create','update','delete')),
		'new_informations' => array('label' => 'ข่าวประชาสัมพันธ์', 'permission' => array('read','create','update','delete')),
		'informations' => array('label' => 'ข่าวสารอัพเดท', 'permission' => array('read','create','update','delete')),
		'calendars' => array('label' => 'ปฎิทินกิจกรรม', 'permission' => array('read','create','update','delete')),
		'newsletters' => array('label' => 'จดหมายข่าว', 'permission' => array('read','create','update','delete')),
		'galleries' => array('label' => 'ภาพกิจกรรม', 'permission' => array('read','create','update','delete')),
		'vdos' => array('label' => 'วิดิทัศน์', 'permission' => array('read','create','update','delete')),
		'notices' => array('label' => 'จัดซื้อ/จัดจ้าง', 'permission' => array('read','create','update','delete')),
		'polls' => array('label' => 'แบบสำรวจความคิดเห็น', 'permission' => array('read','create','update','delete')),
		'webboards' => array('label' => 'กระดานสนทนา', 'permission' => array('read','create','update','delete')),
		'weblinks' => array('label' => 'เว็บลิ้งค์', 'permission' => array('read','create','update','delete')),
		'abouts' => array('label' => 'เกี่ยวกับเรา', 'permission' => array('read','update')),
		'contacts' => array('label' => 'ติดต่อเรา', 'permission' => array('read','delete')),
		'district_infos' => array('label' => 'ตำบลต้นแบบ', 'permission' => array('read','update')),
		'pms' => array('label' => 'เครือข่าย พม.', 'permission' => array('read','create','update','delete')),
		'stats' => array('label' => 'วิชาการและสถิติ', 'permission' => array('read','create','update','delete')),
		'permissions' => array('label' => 'สิทธิ์การใช้งาน', 'permission' => array('read','create','update','delete')),
	);
	
	public $crud = array(
		'read' => 'ดู',
		'create' => 'เพิ่ม',
		'update' => 'แก้ไข',
		'delete' => 'ลบ',
		'download' => 'ดาวน์โหลด'
	);
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$data['user_types'] = new User_type();
		$data['user_types']->order_by('id','asc')->get_page();
		$this->template->build('admin/permission_index',$data);
	}
	
	public function form($id=FALSE){
		$data['user_type'] = new User_type($id);
		$data['rs_perm'] = $this->permission_row($id);
		$data['module'] = $this->module;
		$data['crud'] = $this->crud;
		$this->template->build('admin/permission_form',$data);
	}
	
	public function permission_row($user_type_id)
	{
		if($user_type_id)
		{
			$perms = new Permission();
			$perms = $perms->where("user_type_id = ".$user_type_id)->get();
			foreach($perms as $item)
			{
				$perm[$item->module] = array(
					'read' => $item->read,
					'create' => $item->create,
					'update' => $item->update,
					'delete' => $item->delete,
					'download' => $item->download
				);
			}
			return @$perm;
		}
		else return NULL;
	}
	
	public function save($id=FALSE){
		if($_POST){
			$user_type = new User_type($id);
			$user_type->from_array($_POST);
			$user_type->save();
			foreach($user_type->permission as $item) $item->delete();
			if(isset($_POST['checkbox'])){
				foreach($_POST['checkbox'] as $module => $item)
				{
					$data['user_type_id'] = $user_type->id;
					$data['module'] = $module;
					foreach($item as $perm => $val) $data[$perm] =  $val;
					$permission = new Permission();
					$permission->from_array($data);
					$permission->save();
					$data = array();
				}	
			}
			set_notify('success', lang('save_data_complete'));
		}
		redirect('permissions/admin/permissions');
	}
	
	public function delete($id){
		if($id){
			$user_type = new User_type($id);
			foreach($user_type->permission as $item) $item->delete();
			$user_type->delete();
			set_notify('success', lang('delete_data_complete'));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}
	
}
?>