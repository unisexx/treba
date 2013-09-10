<?php
Class Music_charts extends Public_Controller
    {
        function __construct()
        {
            parent::__construct();
        }   
        
        function index(){
            $data['chart_categories'] = new Music_chart_category();
            $data['chart_categories']->where("status = 'approve'")->order_by('id','desc')->get_page();
            $this->template->title('ชาร์ตเพลงเกาหลีใหม่อัพเดทล่าสุด  - K-pop music chart');
            $this->template->build('index',$data);
			//$this->output->cache(60);
        }
        
        // function inc_home(){
            // $data['chart_category'] = new Music_chart_category();
            // $data['chart_category']->where("status = 'approve'")->order_by('id','desc')->get(1);
// 			
			// $data['music_charts'] = new Music_chart();
			// $data['music_charts']->where('music_chart_category_id = '.$data['chart_category']->id)->order_by('id','asc')->get(10);
            // $this->load->view('inc_home',$data);
        // }
        
        function inc_sidebar(){
            $data['chart_category'] = new Music_chart_category();
            $data['chart_category']->where("status = 'approve'")->order_by('id','desc')->get(1);
            
            $data['music_charts'] = new Music_chart();
            $data['music_charts']->where('music_chart_category_id = '.$data['chart_category']->id)->order_by('no','asc')->get(5);
            $this->load->view('inc_sidebar',$data);
        }
        
        function week($slug){
            $data['chart_category'] = new Music_chart_category();
            $data['chart_category']->where("slug = '".$slug."' and status = 'approve'")->get(1);
            $data['chart_category']->counter();
            
            $data['music_charts'] = new Music_chart();
            $data['music_charts']->where('music_chart_category_id = '.$data['chart_category']->id)->order_by('no','asc')->get();
			$this->template->title('K-pop music chart '.$data['chart_category']->title.' - Kpoplover ชาร์ตเพลงเกาหลีใหม่อัพเดทล่าสุด');
            meta_description('K-pop music chart '.$data['chart_category']->title.' - Kpoplover ชาร์ตเพลงเกาหลีใหม่อัพเดทล่าสุด');
            $this->template->build('week',$data);
            
            //$this->output->cache(60);
        }
		
		function watch($week=false,$number=false,$slug=false,$id){
			$data['music_chart'] = new Music_chart($id);
            $data['music_chart']->counter();
			$this->template->title($data['music_chart']->artist.' - '.$data['music_chart']->m_title.' - Kpoplover ชาร์ตเพลงเกาหลีใหม่อัพเดทล่าสุด');
            $this->template->append_metadata( meta($data['music_chart']->artist.' - '.$data['music_chart']->m_title.' - อันดับที่ '.$data['music_chart']->no.' ประจำสัปดาห์ที่ '.$data['music_chart']->music_chart_category->title));
            meta_description($data['music_chart']->artist.' - '.$data['music_chart']->m_title.' - อันดับที่ '.$data['music_chart']->no.' ประจำสัปดาห์ที่ '.$data['music_chart']->music_chart_category->title);
			$this->template->build('watch',$data);
            
            //$this->output->cache(60);
		}
    }
?>