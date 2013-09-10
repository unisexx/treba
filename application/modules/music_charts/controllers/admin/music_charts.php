<?php
Class Music_charts extends Admin_Controller
    {
        function __construct()
        {
            parent::__construct();
        }
        
        function index(){
            $data['categories'] = new Music_chart_category();
            $data['categories']->order_by('id','desc')->get_page();
            $this->template->append_metadata(js_checkbox('approve'));
            $this->template->build('admin/index',$data);
        }
        
        function form($id=false){
            $data['category'] = new Music_chart_category($id);
            
            $data['music_dbs'] = new Music_chart_db();
            $data['music_dbs']->order_by('artist','asc')->get();
            
            if($id){
                $data['musics'] = new Music_chart();
                $data['musics']->where('music_chart_category_id = '.$id)->order_by('no','asc')->get();
            }
            $this->template->build('admin/form',$data);
        }
        
        function save($id=false){
            if($_POST){
                $category = new Music_chart_category($id);
                $_POST['slug'] = clean_url($_POST['title']);
                $category->from_array($_POST);
                $category->save();
                
                foreach($_POST['no'] as $key=>$item){
                    if($item){
                        $music = new Music_chart(@$_POST['music_id'][$key]);   
                        $music->no = $item;
                        if($id != ""){
                            $music->music_chart_category_id = $category->id;
                        }
                        $music->music_chart_db_id = $_POST['music_chart_db_id'][$key];
                        $music->save();
                    }
                }
                set_notify('success', lang('save_data_complete'));
            }
            redirect('music_charts/admin/music_charts');
        }

        function delete($id=false){
            if($id)
            {
                $category = new Music_chart_category($id);
                foreach($category->music_chart as $item) $item->delete();
                $category->delete();
                set_notify('success', lang('delete_data_complete'));
            }
            redirect('music_charts/admin/music_charts');
        }
        
        function music_db(){
            $data['music_dbs'] = new Music_chart_db();
            $data['music_dbs']->order_by('id','desc')->get_page();
            $this->template->build('admin/music_chart_db',$data);
        }
        
        function music_db_form($id=false){
            $data['music'] = new Music_chart_db($id);
            $this->template->build('admin/music_chart_db_form',$data);
        }
        
        function music_db_save($id=false){
            if($_POST)
            {
                $music = new Music_chart_db($id);
                $music->from_array($_POST);
                $music->save();
                set_notify('success', lang('save_data_complete'));
            }
            redirect($_POST['referer']);
        }
        
        function music_db_delete($id=false){
            if($id){
                $music = new Music_chart_db($id);
                $music->delete();
                set_notify('success', lang('delete_data_complete'));
            }
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        function approve($id)
        {
            if($_POST)
            {
                $new = new Music_chart_category($id);
                $new->from_array($_POST);
                $new->save();
            }
        }
    }
?>