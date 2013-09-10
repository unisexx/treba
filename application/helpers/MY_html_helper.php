<?php 

if(!function_exists('cycle'))
{
	function cycle()
	{
		static $i;	
		
		if (func_num_args() == 0)
		{
			$args = array('even','odd');
		}
		else
		{
			$args = func_get_args();
		}
		return 'class="'.$args[($i++ % count($args))].'"';
	}
}
if(!function_exists('menu_active'))
{
	function menu_active($module,$controller = FALSE,$class='active')
	{
		$CI =& get_instance();
		if($controller)
		{
			return ($CI->router->fetch_module() == $module && $CI->router->fetch_class() == $controller) ? 'class='.$class : '';	
		}
		else
		{
			return ($CI->router->fetch_module() == $module) ? 'class='.$class : '';	
		}
	}
}

if(!function_exists('menu_active2'))
{
    function menu_active2($module,$controller = FALSE,$class='active')
    {
        $CI =& get_instance();
        if($controller)
        {
            return ($CI->router->fetch_module() == $module && $CI->router->fetch_class() == $controller) ? 'class='.$class : '';    
        }
        else
        {
            return ($CI->router->fetch_module() == $module) ? 'class='.$class : ''; 
        }
    }
}

if(!function_exists('page_active'))
{
	function page_active($page,$uri=4,$class='active')
	{
		$CI =& get_instance();
		return ($CI->uri->segment($uri)==$page) ? 'class='.$class : '';
	}
}

if(!function_exists('option_publish'))
{
	function option_publish()
	{
		return array('on' => 'ON', 'off' => 'OFF');
	}
}

if(!function_exists('get_option'))
{
	function get_option($value,$text,$table,$condition = NULL,$lang = NULL)
	{
		$CI =& get_instance();
		$query = $CI->db->query("select * from $table $condition");
		foreach($query->result() as $item) $option[$item->{$value}] = lang_decode($item->{$text},$lang);
		return $option;
	}
}

if(!function_exists('fix_file'))
{
    function fix_file(&$files)
    {
        $names = array( 'name' => 1, 'type' => 1, 'tmp_name' => 1, 'error' => 1, 'size' => 1);
    
        foreach ($files as $key => $part) {
            // only deal with valid keys and multiple files
            $key = (string) $key;
            if (isset($names[$key]) && is_array($part)) {
                foreach ($part as $position => $value) {
                    $files[$position][$key] = $value;
                }
                // remove old key reference
                unset($files[$key]);
            }
        }
    }
}

if(!function_exists('avatar'))
{
    function avatar($img=FALSE,$size = NULL)
    {
        return ($img)?'uploads/users/'.$size.$img:'media/images/noavatar.gif';
    }
}


function avatar($userid){
    $CI =& get_instance();
    $user = new User($userid);
    if($user->image == ""){
        return "media/images/noavatar.gif";
    }else{
        return $user->image;
    }
}

if(!function_exists('thumb'))
{
    function thumb($imgUrl,$width,$height,$zoom_and_crop,$param = NULL){
    	if(strpos($imgUrl, "http://") !== false or strpos($imgUrl, "https://") !== false){
    		return "<img ".$param." src=".site_url("themes/front/timthumb.php?src=".$imgUrl."&zc=".$zoom_and_crop."&w=".$width."&h=".$height)." width=".$width." height=".$height.">";
    	}else{
    		return "<img ".$param." src=".site_url("themes/front/timthumb.php?src=".site_url($imgUrl)."&zc=".$zoom_and_crop."&w=".$width."&h=".$height)."  width=".$width." height=".$height.">";
    	}
        
    }
}

function webboard_group($post,$type){
    $CI =& get_instance();
    $webboard_post_level = new Webboard_post_level();
    $webboard_post_level->where('post <',$post)->order_by('post','desc')->limit(1)->get();
    if($webboard_post_level->exists())
    {
        if($type == "name")
        {
            return $webboard_post_level->name;
        }
        else
        {
            return $webboard_post_level->image;
        }
    }
    else
    {
        $webboard_post_level->get_by_name('Starter');
        if($type == "name")
        {
            return $webboard_post_level->name;
        }
        else
        {
            return $webboard_post_level->image;
        }
    }
    
}

function stripUploadString($uploadString){
	$fileName = explode("/", $uploadString);
	$last_key = key(array_slice($fileName, -1, 1, TRUE));
	return $fileName[$last_key];
}

function getYouTubeIdFromURL($url) 
{
  $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i';
  preg_match($pattern, $url, $matches);

  return isset($matches[1]) ? $matches[1] : false;
}

function YoutubeIframeConverter($iframeCode,$type=false,$param=false){
  $regexstr = '~(?:(?:<iframe [^>]*src=")?|(?:(?:<object .*>)?(?:<param .*</param>)*(?:<embed [^>]*src=")?)?)?(?:https?:\/\/(?:[\w]+\.)*(?:youtu\.be/| youtube\.com| youtube-nocookie\.com)(?:\S*[^\w\-\s])?([\w\-]{11})[^\s]*)"?(?:[^>]*>)?(?:</iframe>|</embed></object>)?~ix';
  if($type == "thumb"){
      $return = thumb("http://img.youtube.com/vi/$1/0.jpg", 120, 68, 1, $param).'<input type="hidden" name="youtube_id" value="$1">';
  }else{
      $return = '$1';
  }
  return preg_replace($regexstr, $return, $iframeCode);
}

function dailymotion($dailymotionurl){
   $id = strtok(basename($dailymotionurl), '_');
   return '<iframe frameborder="0" width="640" height="390" src="http://www.dailymotion.com/embed/video/'.$id.'"></iframe><div class="alert"><a href="http://www.dailymotion.com/video/'.$id.'" target="_blank" class="btn btn-info"><i class="icon-exclamation-sign"></i> เปิด Dailymotion แล้วจอดำคลิกที่นี่จ้า</a></div>';
}

function mthai($mthaiurl){
    $vdoid = substr($mthaiurl,40,10);
    return '<object id="mthai_player" width="640" height="390" data="http://video.mthai.com/Flash_player/flowplayer/flowplayer-3.1.5.swf" type="application/x-shockwave-flash" ><param name="allowFullScreen" value="true" ></param><param name="movie" value="http://video.mthai.com/Flash_player/flowplayer/flowplayer-3.1.5.swf"></param><param name="flashvars" value="config=http://video.mthai.com/get_config_event.php?id='.$vdoid.'"></param><param name="allowscriptaccess" value="always"></param><embed src="http://video.mthai.com/Flash_player/flowplayer/flowplayer-3.1.5.swf" type="application/x-shockwave-flash" allowscriptaccess="always" flashvars="config=http://video.mthai.com/get_config_event.php?id='.$vdoid.'" allowfullscreen="true" width="640" height="390"></object>';
}

function kodhit($kodhiturl){
	//return '<a class="btn btn-mini" href="'.$kodhiturl.'" target="_blank">ดูแบบตอนเดียวคลิกที่นี่</a><br><br>';
	return '<iframe frameborder="0" width="640" height="390"  src="http://r14---sn-30a7en76.googlevideo.com/videoplayback?id=5ae52c2e0c2ca3ac&itag=22&source=picasa&ip=0.0.0.0&ipbits=0&expire=1368349209&sparams=id,itag,source,ip,ipbits,expire&signature=9A0BD431F7137E50CCAF8189DE8418F45B3E1E42.D3E36628B6DF21BED25E37AA42374054A2C86601&key=lh1&ms=nxu&newshard=yes&mv=m&mt=1365757393&cms_redirect=yes"></iframe>';
}

function youtube($youtubeurl){
    //parse_str( parse_url( $youtubeurl, PHP_URL_QUERY ), $my_array_of_vars );
    //preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=embed/)[^&\n]+|(?<=v=)[^&\‌​n]+|(?<=youtu.be/)[^&\n]+#", $youtubeurl, $matches);
    
    $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/ ]{11})/i';
  	preg_match($pattern, $youtubeurl, $matches);
  	return isset($matches[1]) ? '<iframe width="640" height="390" src="http://www.youtube.com/embed/'.$matches[1].'" frameborder="0" allowfullscreen></iframe>' : false;
	
	//return '<iframe width="560" height="315" src="http://www.youtube.com/embed/'.$matches[0].'" frameborder="0" allowfullscreen></iframe>';
}

if(!function_exists('filterUrl'))
{
    function filterUrl($url){
    	$parse = parse_url($url);
    	return $parse['host'];
    }
}

function get_vdo($s){
    if (strpos($s,'<iframe') !== false) { //ถ้าเป็น iframe ให้แสดงผลออกมาเลย
        echo $s;
    }else{
        //$s = "links : http://aa.link.com link 2 http://fea.link.com http://feafd.nlin.com all link";
        while (preg_match('#(https?://[^\s]+)(.*)$#i',$s,$m)) {
             $links[] = $m[1]; $s = $m[2]; 
        }
        
        foreach($links as $key=>$item){ //กรอง url
        //echo filterUrl($item);
        	if(filterUrl($item) == 'www.youtube.com'){
        		echo youtube($item);
        	}else if(filterUrl($item) == 'www.dailymotion.com'){
        		echo dailymotion($item);
            }else if(filterUrl($item) == 'video.mthai.com'){
                echo mthai($item);
			}else if(filterUrl($item) == 'www.kodhit.com'){
                echo kodhit($item);
        	}else{
        	    // echo '<iframe frameborder="0" width="640" height="390" src="'.$item.'"></iframe>';
        	    // echo '<video width="640" height="390" controls><source src="'.$item.'" type="video/mp4"></video><br><a class="btn btn-mini pull-right" href="'.$item.'" target="_blank">ดาวน์โหลดซีรีย์เกาหลีตอนนี้</a><br clear="all"><br>';
				echo '<video controls="controls" width="640" height="360">
	<source src="'.$item.'" type="video/mp4" />
	<object type="application/x-shockwave-flash" data="http://flashfox.googlecode.com/svn/trunk/flashfox.swf" width="640" height="360">
		<param name="movie" value="http://flashfox.googlecode.com/svn/trunk/flashfox.swf" />
		<param name="allowFullScreen" value="true" />
		<param name="wmode" value="transparent" />
		<param name="flashVars" value="controls=true&amp;src='.$item.'" />
		<span title="No video playback capabilities, please download the video below"></span>
	</object>
</video>
<p>
	ถ้าดูคลิปข้างบนไม่ได้หรือกระตุกให้เข้าเว็บด้วย <a href="https://www.google.com/intl/en/chrome/browser/" target="_blank" rel="nofollow"><b>google chrome</b></a><br>
	<strong>ดาวน์โหลดซีรีย์เกาหลีตอนนี้:</strong> <a target="_blank" href="'.$item.'">คลิกที่นี่</a>
</p>';
        	}
        }
    }
}

function get_img_from_detail($html,$width,$height,$zoom,$param=false){
    preg_match('/src="([^"]*)"/i',$html, $result); 
    return thumb(substr($result[0],5,-1),$width,$height,$zoom,$param);
}

/*
function get_img_from_detail2($html,$width,$height,$zoom,$param=false){
    preg_match('/src="([^"]*)"/i',$html, $result); 
    return "<img src='".substr($result[0],5,-1)."' width='".$width."' height='".$height."' ".$param.">";
}
*/

function get_facebook_thumbnail($html){
    preg_match('/src="([^"]*)"/i',$html, $result); 
    if(@substr($result[0],5,-1) != ""){
        $facebookThumb = '<link rel="image_src" href="'.substr($result[0],5,-1).'" />';
    }else{
        $facebookThumb = '<link rel="image_src" href="https://fbcdn-profile-a.akamaihd.net/hprofile-ak-prn1/174760_379223069327_5773565_n.jpg" />';
    }
    return $facebookThumb;
}

function get_facebook_thumbnail_from_youtube_iframe($iframeCode){
  $regexstr = '~(?:(?:<iframe [^>]*src=")?|(?:(?:<object .*>)?(?:<param .*</param>)*(?:<embed [^>]*src=")?)?)?(?:https?:\/\/(?:[\w]+\.)*(?:youtu\.be/| youtube\.com| youtube-nocookie\.com)(?:\S*[^\w\-\s])?([\w\-]{11})[^\s]*)"?(?:[^>]*>)?(?:</iframe>|</embed></object>)?~ix';
  $thumb = '<link rel="image_src" href="http://img.youtube.com/vi/$1/0.jpg">';
  return preg_replace($regexstr, $thumb, $iframeCode);
}

function addThis(){
    return '<div id="addthis-wrapper"><div class="addthis">
<iframe src="https://www.facebook.com/plugins/like.php?app_id=136698876474938&href=http://www.kpoplover.com'.$_SERVER['PATH_INFO'].'&send=true&layout=button_count&width=90&show_faces=false&action=like&colorscheme=light&font&height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:90px; height:21px;" allowTransparency="true"></iframe>
<a class="facebook-sharer" href="https://www.facebook.com/sharer/sharer.php?u=http://www.kpoplover.com'.$_SERVER['PATH_INFO'].'" title="Share" target="_blank"><img width="60px" height="20px" src="http://c.s1sf.com/vi/0/di/fb_share_button.png" alt="Facebook Share Button" style="vertical-align: top; margin-right:8px;"></a>
<g:plusone size="medium"></g:plusone>
<a href="http://www.kpoplover.com'.$_SERVER['PATH_INFO'].'" class="twitter-share-button" data-url="http://www.kpoplover.com'.$_SERVER['PATH_INFO'].'" data-via="your_screen_name" data-lang="en" data-related="anywhereTheJavascriptAPI">Tweet</a>
</div></div><br><br>';
}

function fanpage_button(){
    return '<p style="font-weight:bold; font-size:14px; margin:10px 0;">ติดตามข่าวสารอัพเดท เพลง เอ็มวี ซีรีย์ล่าสุดผ่าน facebook กดไลค์ไว้ไม่ตกข่าวจ้า ^^</p><iframe src="https://www.facebook.com/plugins/like.php?app_id=136698876474938&href=https://www.facebook.com/pages/kpoplover/379223069327&send=true&layout=standard&width=700&show_faces=true&action=like&colorscheme=light&font&height=60" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:700px; height:60px; margin:0; padding:0;" allowTransparency="true"></iframe>';
}

function meta_description($description=false){
    $CI =& get_instance();
    if($description){
        $CI->template->append_metadata( meta('description',$description));
    }else{
        $CI->template->append_metadata( meta('description','อัพเดทข่าวสาร ความเคลื่อนไหว k-pop ข่าวบันเทิงเกาหลี เพลงเกาหลี ซีรีย์เกาหลี มิวสิควีดีโอเกาหลี ชาร์ตเพลงเกาหลี นักร้องเกาหลี ศิลปินเกาหลี วาไรตี้เกาหลี ใหม่ล่าสุด'));
    }
}
?>