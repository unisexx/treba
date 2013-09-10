<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// ------------------------------------------------------------------------

/**
 * js_datepicker
 *
 * return media file for datepicker
 *
 * @access	public
 * @param	string
 * @return	str
 */	
if ( ! function_exists('js_datepicker'))
{	
	function js_datepicker($selector=".datepicker")
	{		
		$js = '<link rel="stylesheet" href="media/js/date_input/date_input.css" type="text/css" media="screen" />';
		$js .= '<script type="text/javascript" src="media/js/date_input/jquery.date_input.min.js"></script>';
		$js .= '<script type="text/javascript" src="media/js/date_input/jquery.date_input.th_TH.js"></script>';
		$js .= '<script type="text/javascript">
					$(function(){
						$("input.datepicker").date_input(); 
					});
				</script>';
		return $js; 
	}
}

// --------------------------------------------------------------------

/**
 * set_notify
 *
 * set notify Bar
 *
 * @access	public
 * @param	string
 * @param	string
 * @return	str
 */	
if(!function_exists('set_notify'))
{
	function set_notify($type,$msg)
	{
		$config = array(
			'notify' => TRUE,
			'type' => $type,
			'msg' => $msg
		);
		$CI =& get_instance();
		$CI->session->set_flashdata($config);
	}
}

// --------------------------------------------------------------------

/**
 * js_notify
 *
 * Display notify Bar
 *
 * @access	public
 * @return	str
 */	
if(!function_exists('notify'))
{
	function js_notify()
	{
		$CI =& get_instance();
		if($CI->session->flashdata('notify'))
		{
			$js = '<link rel="stylesheet" href="media/js/notifyBar/jquery.notifyBar.css" type="text/css" media="screen" />';
		    $js .= '<script type="text/javascript" src="media/js/notifyBar/jquery.notifyBar.js"></script>';
		    $js .= '<script type="text/javascript">
		    				$(function () {
						  		$.notifyBar({
						  			cls:"'.$CI->session->flashdata('type').'",
						    		html: "'.$CI->session->flashdata('msg').'",
						    		delay: 2000,
						    		animationSpeed: "normal"
						  		});  
							});
						</script>';
			return $js; 
		}
	}
}

// --------------------------------------------------------------------

/**
 * js_lightbox
 *
 * Display Lightbox
 *
 * @access	public
 * @return	str
 */	
if(!function_exists('js_lightbox'))
{
	function js_lightbox()
	{
		$js = '<link rel="stylesheet" href="media/js/prettyPhoto_3.1.4/css/prettyPhoto.css" type="text/css" media="screen" />';
		$js .= '<script type="text/javascript" src="media/js/prettyPhoto_3.1.4/js/jquery.prettyPhoto.js"></script>';
		    $js .= '<script type="text/javascript">
		    				$(function () {
						  		$("[rel^=lightbox]").prettyPhoto({theme:\'facebook\',hideflash: true});
							});
						</script>';
			return $js; 
		
	}
}

// --------------------------------------------------------------------
if(!function_exists('js_checkbox'))
{
	function js_checkbox($mode=FALSE)
	{
		$js="";
		if($mode=="approve")
		{
			$CI =& get_instance();
			$js = '$("input:checkbox").click(function(){
					var value = this.checked ? "draft" : "approve";
					var name = $(this).attr("name");
					var jsonOptions= {};
					jsonOptions[name]= value;
					if(value=="draft")
					{	
						var target = $(this).parent().parent().find(".success").parent();
					}
					else
					{
						var target = $(this).parent().parent().find(".error").parent();
					}

	
					$.post("'.$CI->router->fetch_module().'/admin/'.$CI->router->fetch_class().'/approve/" + this.value,jsonOptions,function(data){
						target.html(data);
					}); 

					});';
		}
		return '<link rel="stylesheet" href="media/js/checkbox/jquery.checkbox.css" />
			<script type="text/javascript" src="media/js/checkbox/jquery.checkbox.min.js"></script>
			<script>
				$(function(){
					$("input:checkbox,input:radio").checkbox({empty:"media/js/checkbox/empty.png"});
					'.$js.'
				});
			</script>';
	}
}

// --------------------------------------------------------------------

/**
 * uppic_mce
 *
 * Upload images from uppic.me to TinyMCE
 *
 * @access	public
 * @return	str
 */	
if(!function_exists('uppic_mce'))
{
	function uppic_mce()
	{
		$js = '<style type="text/css">
#upic_uploader{}
#upic_uploadprogress{}
.progressWrapper{margin-top:5px;}
.progressContainer{border-bottom:1px dotted #ddd;padding:2px;}
.progressName{text-align:left;color:black;margin-left:2px;float:left;}
.progressBarStatus{color:#666;text-align:right;margin:1px 1px 0 0;font-size:9px;}
.red{border:solid 1px #B50000;background-color:#FFEBEB;}
.green{border:solid 1px #DDF0DD;background-color:#EBFFEB;}
.blue{border:solid 1px #CEE2F2;background-color:#F0F5FF;}
.progressBarInProgress,.progressBarComplete,.progressBarError{clear:both;font-size:0;width:0%;height:2px;background-color:blue;margin-top:4px;}
.progressBarComplete{width:100%;background-color:green;visibility:hidden;}
.progressBarError{width:100%;background-color:red;visibility:hidden;}
</style>';

		$js .= '<script type="text/javascript" src="http://upic.me/js/embedupload.js"></script>
								<script type="text/javascript">
								upic_type = "htmlfull";
								upic_buttoncss += "color:#000000;";
								function upic_custom(urlshow, urlfull, urlthumb) {
								tinyMCE.get(\'detail\').execCommand("mceInsertContent",false,\'<img src="\' +urlfull+ \'" />\');
								}
								</script>';
		return $js; 
	}
}

/* End of file media_helper.php */
/* Location: ./application/helpers/media_helper.php */

// --------------------------------------------------------------------

if(!function_exists('disqus_comment')){
	function disqus_comment(){
		$js = "<!-- Disgus -->
    <script type='text/javascript'>
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'kpoploverth'; // required: replace example with your forum shortname

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function () {
        var s = document.createElement('script'); s.async = true;
        s.type = 'text/javascript';
        s.src = 'http://' + disqus_shortname + '.disqus.com/count.js';
        (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
    }());
    </script><div id='disqus_thread'></div>
        <script type='text/javascript'>
            /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
            var disqus_shortname = 'kpoploverth'; // required: replace example with your forum shortname

            /* * * DON'T EDIT BELOW THIS LINE * * */
            (function() {
                var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
                dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
                (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
            })();
        </script>
        <noscript>Please enable JavaScript to view the <a href='http://disqus.com/?ref_noscript'>comments powered by Disqus.</a></noscript>
        <a href='http://disqus.com' class='dsq-brlink'>comments powered by <span class='logo-disqus'>Disqus</span></a>";
        return $js;
	}
}

if(!function_exists('facebook_comment')){
    function facebook_comment(){
        $js = '<p style="font-weight:bold; font-size:14px; color:#3B5998; margin-top:20px;">แสดงความคิดเห็นได้ที่นี่ค่ะ ^^</p><div class="fb-comments" migrated="1" publish_feed="true" data-title="my article title" data-href="http://www.kpoplover.com'.$_SERVER['PATH_INFO'].'" data-num-posts="10" data-width="700"></div>';
        return $js;
    }
}
