//****************** Social Button ******************/
// facebook sdk connect
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// google plus
(function() {
var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
po.src = 'http://apis.google.com/js/plusone.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
})();

//twitter
!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");
/****************** [END] Social Button ******************/







/****************** Jquery NewsTicker ข่าวประกาศหน้าแรก ******************/
(function($) {
/*
 * A basic news ticker.
 *
 * @name     newsticker (or newsTicker)
 * @param    delay      Delay (in milliseconds) between iterations. Default 4 seconds (4000ms)
 * @author   Sam Collett (http://www.texotela.co.uk)
 * @example  $("#news").newsticker(); // or $("#news").newsTicker(5000);
 *
 */
$.fn.newsTicker = $.fn.newsticker = function(delay)
{
	delay = delay || 10000;
	initTicker = function(el)
	{
		stopTicker(el);
		el.items = $("li", el);
		// hide all items (except first one)
		el.items.not(":eq(0)").hide().end();
		// current item
		el.currentitem = 0;
		startTicker(el);
	};
	startTicker = function(el)
	{
		el.tickfn = setInterval(function() { doTick(el) }, delay)
	};
	stopTicker = function(el)
	{
		clearInterval(el.tickfn);
	};
	pauseTicker = function(el)
	{
		el.pause = true;
	};
	resumeTicker = function(el)
	{
		el.pause = false;
	};
	doTick = function(el)
	{
		// don't run if paused
		if(el.pause) return;
		// pause until animation has finished
		el.pause = true;
		// hide current item
		$(el.items[el.currentitem]).fadeOut("slow",
			function()
			{
				$(this).hide();
				// move to next item and show
				el.currentitem = ++el.currentitem % (el.items.size());
				$(el.items[el.currentitem]).fadeIn("slow",
					function()
					{
						el.pause = false;
					}
				);
			}
		);
	};
	this.each(
		function()
		{
			if(this.nodeName.toLowerCase()!= "ul") return;
			initTicker(this);
		}
	)
	.addClass("newsticker")
	.hover(
		function()
		{
			// pause if hovered over
			pauseTicker(this);
		},
		function()
		{
			// resume when not hovered over
			resumeTicker(this);
		}
	);
	return this;
};
})(jQuery);
/****************** [END] Jquery NewsTicker ข่าวประกาศหน้าแรก ******************/








/****************** like facebook with callback กดไลค์แล้วโชว์ลิ้งค์โหลดในเว็บบอร์ด ******************/
(function($){  
$.fn.fbjlike = function(options) {  
	
  //Set the default values, use comma to separate the settings 
  var defaults = {  
	appID: '136698876474938',
	userID: '100000675258786',
	siteTitle: '',
	siteName: '',
	siteImage: '',
	href:false,
	mode: 'insert',
	buttonWidth: 450,
	buttonHeight: 60,
	showfaces: true,
	font: 'lucida grande',
	layout: 'box_count',	//box_count|button_count|standard
	action: 'like',		// like|recommend
	send:false,
	comments:false,
	numPosts:10,
	colorscheme: 'light',
	lang: 'th_TH',
	hideafterlike:false,
	googleanalytics:false,	//true|false
	googleanalytics_obj: 'pageTracker',	//pageTracker|_gaq
	onlike: function(){return true;},
	onunlike: function(){return true;}
}

var options =  $.extend(defaults, options);  
	
  return this.each(function() {  
  var o = options;  
  var obj = $(this);
  if(!o.href)
  	var dynUrl = document.location;
  else
  	var dynUrl = o.href;
  var dynTitle = document.title;
  
  // Add Meta Tags for additional data - options
  if(o.appID!='')$('head').append('<meta property="fb:app_id" content="'+o.appID+'"/>');
  if(o.userID!='')$('head').append('<meta property="fb:admins" content="'+o.userID+'"/>');
  if(o.siteTitle!='')$('head').append('<meta property="og:title" content="'+o.siteTitle+'"/>');
  if(o.siteName!='')$('head').append('<meta property="og:site_name" content="'+o.siteName+'"/>');
  if(o.siteImage!='')$('head').append('<meta property="og:image" content="'+o.siteImage+'"/>');
  
  // Add #fb-root div - mandatory - do not remove
  //$('body').append('<div id="fb-root"></div>');
  $('#fb-like iframe').css('height','35px !important');
  
  // (function() {
    // var e = document.createElement('script');
    // e.async = true;
    // e.src = document.location.protocol + '//connect.facebook.net/'+o.lang+'/all.js';
    // $('#fb-root').append(e);
  // }());
	
  // setup FB Developers App Link - do not touch
  window.fbAsyncInit = function() {
    FB.init({appId: o.appID, status: true, cookie: true, xfbml: true});
    FB.Event.subscribe('edge.create', function(response) {
		  if(o.hideafterlike)$(obj).hide();
		  if(o.googleanalytics){
				if(o.googleanalytics_obj!='_gaq'){
					pageTracker._trackEvent('facebook', 'liked', dynTitle);
				} else {
		  		_gaq.push(['_trackEvent','facebook', 'liked', dynTitle]);
		  	}
		  }
		  o.onlike.call(response);
		});
    FB.Event.subscribe('edge.remove', function(response) {
		  if(o.googleanalytics){
				if(o.googleanalytics_obj!='_gaq'){
					pageTracker._trackEvent('facebook', 'unliked', dynTitle);
				} else {
		  		_gaq.push(['_trackEvent','facebook', 'unliked', dynTitle]);
		  	}
		  }
		  o.onunlike.call(response);
		});
  };
  var tSend = '';
  if(o.send)tSend = ' send="true"';
  var thtml = '<fb:like href="'+dynUrl+'" width="'+o.buttonWidth+'" height="'+o.buttonHeight+'" show_faces="'+o.showfaces+'" font="'+o.font+'" layout="'+o.layout+'" action="'+o.action+'" colorscheme="'+o.colorscheme+'"'+tSend+'/>';
  
	if(o.comments){
  	thtml += '<'+'div style="clear:both;"></div><fb:comments href="'+dynUrl+'" num_posts="'+o.numPosts+'" width="'+o.buttonWidth+'"></fb:comments>';
  }
  if(o.mode=='append')$(obj).append(thtml);
  else $(obj).html(thtml);
	
  });  
}  
})(jQuery);
/****************** [END] like facebook with callback กดไลค์แล้วโชว์ลิ้งค์โหลดในเว็บบอร์ด ******************/



/****************** tinymce.js ******************/
tinyMCE.init({
	mode : "textareas",
    editor_selector : "editor[pm]",
	relative_urls : false,
	// General options
	theme : "advanced",
	skin : "cirkuit",
	plugins : "pdw,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,paste,contextmenu,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",
	
	//file_browser_callback: 'openKCFinder',
	init_instance_callback : "fixTinyMCETabIssue",
	
	// Theme options
	theme_advanced_buttons1 : "pdw_toggle,fontsizeselect,forecolor,|,backcolor,|,emotions,image,media,bold,italic,strikethrough,|,bullist,numlist,|,justifyleft,justifycenter,justifyright,|,link,unlink,|,spellchecker", 
    theme_advanced_buttons2 : "formatselect,code,paste,pastetext,pasteword,removeformat,|,backcolor,|,underline,justifyfull,sup,|,outdent,indent,|,hr,charmap,|,media,|,search,replace,|,fullscreen,|,undo,redo", 
    theme_advanced_buttons3 : "tablecontrols,|,visualaid,template,pagebreak,preview,emotions", 
	theme_advanced_toolbar_location : "top", 
    theme_advanced_toolbar_align : "left", 
    theme_advanced_statusbar_location : "bottom", 
    theme_advanced_resizing : true, 
 	height : "300", 
    width: "300", 
	// Example content CSS (should be your site CSS)
	// content_css : "css/content.css",
	accessibility_warnings : false,
	pdw_toggle_on : 1,
    pdw_toggle_toolbars : "2,3",            
	force_br_newlines : true,
	force_p_newlines : false
    //forced_root_block : '' // Needed for 3.x
});


function fixTinyMCETabIssue(inst) {
    inst.onKeyDown.add(function(inst, e) {
        // Firefox uses the e.which event for keypress
        // While IE and others use e.keyCode, so we look for both
        if (e.keyCode) code = e.keyCode;
        else if (e.which) code = e.which;
        if(code == 9 && !e.altKey && !e.ctrlKey) {
            // toggle between Indent and Outdent command, depending on if SHIFT is pressed
            if (e.shiftKey) inst.execCommand('Outdent');
            else inst.execCommand("mceInsertContent", false, "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
            // prevent tab key from leaving editor in some browsers
            if(e.preventDefault) {
                e.preventDefault();
            }
            return false;
        }
    });
}

function openKCFinder(field_name, url, type, win){
    tinyMCE.activeEditor.windowManager.open({
        file: 'media/kcfinder/browse.php?opener=tinymce&type=' + type+ '&dir=' + type + '/public',
        title: 'File Manager',
        width: 700,
        height: 500,
        resizable: "yes",
        inline: true,
        close_previous: "no",
        popup_css: false
    }, {
        window: win,
        input: field_name
    });
    return false;
}

function openKCFinderImage(field,width,height) {
    window.KCFinder = {
        callBack: function(url) {
            window.KCFinder = null;
			$('#'+field+'_img').html('<img src="' + url + '" width="'+width+'" height="'+height+'" />');
			$('[name='+field+']').val(url);
        }
    };
    window.open('media/kcfinder/browse.php?type=image&dir=images/public', 'kcfinder_textbox',
        'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
        'resizable=1, scrollbars=0, width=800, height=600'
    );
}

function openKCFinderFile(field) {
    window.KCFinder = {
        callBack: function(url) {
            window.KCFinder = null;
			$('#'+field+'_file').html(url);
			$('[name='+field+']').val(url);
        }
    };
    window.open('media/kcfinder/browse.php?type=file&dir=field/public', 'kcfinder_textbox',
        'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
        'resizable=1, scrollbars=0, width=800, height=600'
    );
}

function removeImage(field){
	$('#'+field+'_img').html('');
	$('[name='+field+']').val('');
}

function removeFile(field){
	$('#'+field+'_file').html('');
	$('[name='+field+']').val('');
}
/****************** [END] tinymce.js ******************/







/****************** youtube api function ดึงค่าจำนวนวิว,ผู้อัพโหลดจาก youtube มาแสดง ******************/
function getYouTubeInfo(youtubeId,element) {
    $.ajax({
        url: "http://gdata.youtube.com/feeds/api/videos/"+youtubeId+"?v=2&alt=json",
        dataType: "jsonp",
        success: function (data) { parseresults(data,element); }
    });
}

function parseresults(data,element) {
    //var title = data.entry.title.$t;
    //var description = data.entry.media$group.media$description.$t;
    var viewcount = data.entry.yt$statistics.viewCount;
    var author = data.entry.author[0].name.$t;
    //var thumb = data.entry.media$group.media$thumbnail[1].url;
    //$('#title').html(title);
    //$('#description').html('<b>Description</b>: ' + description);
    //$('#extrainfo').html('<b>Author</b>: ' + author + '<br/><b>Views</b>: ' + viewcount);
    //element.find(".vdo").html('<img src=' + thumb + ' height="76" width="129">');
    //element.find(".title").html(title);
    //element.find(".description").html(description);
    element.find(".author").html(author);
    element.find(".viewcount").html(numberWithCommas(viewcount) + " ครั้ง");
}
/****************** [END] youtube api function ดึงค่าจำนวนวิว,ผู้อัพโหลดจาก youtube มาแสดง ******************/





/****************** ใส่เครื่องหมายคอมม่าร์ในจำนวนคนดูเอ็มวี ******************/
function numberWithCommas(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}
/****************** [END] ใส่เครื่องหมายคอมม่าร์ในจำนวนคนดูเอ็มวี ******************/




/****************** google custom search ******************/
// Google Custom search Put the following javascript before the closing </head> tag.
(function() {
    var cx = '008951094756729902779:oeasgig1gyi';
var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
    '//www.google.com/cse/cse.js?cx=' + cx;
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
})();
/****************** [END] google custom search ******************/

  
  

/****************** ระบบส่งเมล์เมื่อมีผู้ตอบคอมเม้นเฟสบุค ******************/
// Facebook comments-box email notifications
function fbcen_gdocs(a){FB.Event.subscribe("comment.create",function(b){var d=b.href;var c="";if($(".fbcomments").length>0){c=$('.fbcomments[href="'+d+'"]').attr("title")}else{c=$('.fb-comments[href="'+d+'"]').attr("data-title")}if(c==undefined){c=$('meta[property="og:title"]').attr("content")}if(c==undefined){c=$("title").html()}FB.api({method:"fql.multiquery",queries:{comment:'SELECT xid, object_id, post_id, fromid, time, text, id, username, reply_xid, post_fbid FROM comment WHERE object_id IN (SELECT comments_fbid FROM link_stat WHERE url ="'+d+'") ORDER BY time desc LIMIT 1',user:"SELECT id, name, url, pic_square FROM profile WHERE id IN (SELECT fromid FROM #comment)"}},function(i){comment=i[0].fql_result_set;user=i[1].fql_result_set;var h=new Date(comment[0].time*1000);var l=h.getDate();var j=h.getMonth();j++;var f=h.getFullYear();var g="";var m=h.getHours();if(m<12){g="AM"}else{g="PM"}if(m==0){m=12}if(m>12){m=m-12}var k=h.getMinutes();h=l+"."+j+"."+f+" at "+m+":"+k+" "+g;var e=d+"?fb_comment_id=fbc_"+comment[0].id+"_"+comment[0].object_id;$.post("https://docs.google.com/spreadsheet/formResponse?formkey="+a+"",{"entry.0.single":h,"entry.1.single":c,"entry.2.single":d,"entry.3.single":user[0].name,"entry.4.single":comment[0].text,"entry.5.single":e,"entry.6.single":"http://developers.facebook.com/tools/comments"})})})};
/****************** [END] ระบบส่งเมล์เมื่อมีผู้ตอบคอมเม้นเฟสบุค ******************/




/****************** Facebook Login ******************/
window.fbAsyncInit = function() {
    FB.init({
		appId      : '136698876474938', // App ID
		channelURL : '//www.kpoplover.com/channel.html', // Channel File
		status     : true, // check login status
		cookie     : true, // enable cookies to allow the server to access the session
		oauth      : true, // enable OAuth 2.0
		xfbml      : true  // parse XFBML
    });
    
    // เช็ค สถานะ user
    FB.Event.subscribe('auth.authResponseChange', function(response){
		if (response.status === 'connected'){ //SUCCESS
			// document.getElementById("message").innerHTML +=  "<br>Connected to Facebook";
		}else if(response.status === 'not_authorized'){ //FAILED
			// document.getElementById("message").innerHTML +=  "<br>Failed to Connect";
		}else{ //UNKNOWN ERROR
	        // document.getElementById("message").innerHTML +=  "<br>Logged Out";
	    }
    }); 

    // Additional initialization code here (ระบบบันทึกคอมเม้นเฟสบุคใน google drive)
    fbcen_gdocs('dFVOdGFMaWIxYzU0OTZJWDgwdTVmTXc6MQ');
};

// ฟังก์ชัน login
function Login(){
	FB.login(function(response) {
	if (response.authResponse){
		getUserInfo();
	}else{
		console.log('User cancelled login or did not fully authorize.');
	}},{scope: 'email,user_photos,user_videos'});
}

// ฟังก์ชัน ดึงรายละเอียดของ user
function getUserInfo() {
	FB.api('/me', function(response) {
 
//       var str="<b>Name</b> : "+response.name+"<br>";
//           str +="<b>Link: </b>"+response.link+"<br>";
//           str +="<b>Username:</b> "+response.username+"<br>";
//           str +="<b>id: </b>"+response.id+"<br>";
//           str +="<b>Email:</b> "+response.email+"<br>";
//           str +="<input type='button' value='Get Photo' onclick='getPhoto();'/>";
//           str +="<input type='button' value='Logout' onclick='Logout();'/>";
//           document.getElementById("status").innerHTML=str;
// 			
		  // getPhoto();
		
		var facebook_id = response.id;
		var facebook_name = response.name
		var facebook_link = response.link
		var email = response.email
		var username = response.username
		
		FB.api('/me/picture?type=large', function(response){
			
			// ส่งค่าไป check login ใน โมดูล users
			$.post('users/facebook_login',{
				'facebook_id' : facebook_id,
			    'facebook_name' : facebook_name,
			    'facebook_link' : facebook_link,
			    'email' : email,
			    'username' : username,
			    'image' : response.data.url
			},function(data){
				if (data == "refresh"){
			      window.location.reload(); // This is not jQuery but simple plain ol' JS
			    }
			});
			
		});
		
	});
}

// ฟังก์ชัน ดึงรูปภาพของ user
function getPhoto(){
	FB.api('/me/picture?type=normal', function(response){
 		var str="<br/><b>Pic</b> : <img src='"+response.data.url+"'/>";
		document.getElementById("status").innerHTML+=str;
	});
}

// ฟังก์ชัน ล็อกเอาท์
function Logout(){
	FB.logout(function(){document.location.reload();});
}

/****************** [END] Facebook Login ******************/





$(document).ready(function(){
	$.ajaxSetup({ cache: false });
	
	// Load the SDK Asynchronously
	  // (function(d){
	     // var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
	     // js = d.createElement('script'); js.id = id; js.async = true;
	     // js.src = '//connect.facebook.net/th_TH/all.js';
	     // d.getElementsByTagName('head')[0].appendChild(js);
	   // }(document));
   
	//Cufon.replace('h1,h3,h4,h5,h6');
	
	$('[rel=tooltip]').tooltip();
	$('[rel=popover]').popover();
	
	// fb-traffic-pop
	$().facebookTrafficPop({
	    'timeout':'30', 
	    'title':'มาเป็นแฟนกันนะคะ ^-^',
	    'message':'ชอบติดตามข่าวสาร ฟังเพลง ดูซีรีย์ กดไลค์เลยจ้า <br>- กดไลค์อีกครั้งแล้วจะไม่แสดงอีกต่อไปค่ะ',
	    'url':'https://www.facebook.com/pages/kpoplover/379223069327',
	    'lang':'en',
	    'wait':'120',
	    'opacity':'0.80',
	    'advancedClose':false,
	    'closeable':false,
	    'showfaces':true
    });
            
	
	// set thumbnail equal height
	var currentTallest = 0,
	currentRowStart = 0,
	rowDivs = new Array(),
	$el,
	topPosition = 0;
     
	$('.caption').each(function() {
    
       $el = $(this);
       topPostion = $el.position().top;
       
       if (currentRowStart != topPostion) {
    
         // we just came to a new row.  Set all the heights on the completed row
         for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
           rowDivs[currentDiv].height(currentTallest);
         }
    
         // set the variables for the new row
         rowDivs.length = 0; // empty the array
         currentRowStart = topPostion;
         currentTallest = $el.height();
         rowDivs.push($el);
    
       } else {
    
         // another div on the current row.  Add it to the list and check if it's taller
         rowDivs.push($el);
         currentTallest = (currentTallest < $el.height()) ? ($el.height()) : (currentTallest);
    
      }
       
      // do the last row
       for (currentDiv = 0 ; currentDiv < rowDivs.length ; currentDiv++) {
         rowDivs[currentDiv].height(currentTallest);
       }
       
     });
	 
	
	if ( $('#addthis-wrapper')[0] ) { 
		$('#addthis-wrapper').height($(".addthis").height());
		var position = $('.addthis').position();
		$('.addthis').affix({
		    offset: {top: position.top-44}
		});
	}
	
	$("#FBSlideLikeBox_left,#FBSlideLikeBox_left2").mouseenter(function(){
		$(this).stop().animate({left: 0}, "normal");
    }).mouseleave(function()
    {
		$(this).stop().animate({left: -292}, "normal");
    });
	
	// $("#login").live("click",function(){
        // $("#frm_login").submit();
    // });
    
    $(".facebook-sharer").click(function() {
        var newwindow = window.open($(this).prop('href'), '', 'height=350,width=640');
        if (window.focus) {
            newwindow.focus();
        }
        return false;
    });
    
    $("#dead_link").click(function(){
        $.post('vdos/deadlink',{
            'vdo_id':$("#vdo_id").val(),
            'url':$("#url").val(),
            'type':$("#type").val()
        });
        
        $(this).hide();
        alert('ขอบคุณสำหรับการแจ้งข้อมูลค่ะ ทางทีมงานจะตรวจสอบแล้วทำการแก้ไขโดยเร็วที่สุดค่ะ')
    });
    
    $('#relate-quiz').click(function(){
        var quiz_id = $('input.quiz-id').val();
        $('input[name=webboard_quiz_id]').val(quiz_id);
        $('input[name=webboard_answer_id]').val("0");
    });
    
    $('.relate-ans').click(function(){
        var quiz_id = $('input.quiz-id').val();
        var ans_id = $(this).next('input.ans-id').val();
        $('input[name=webboard_quiz_id]').val(quiz_id);
        $('input[name=webboard_answer_id]').val(ans_id);
    });
    
    // $('.c_list').easyTicker({
        // direction: 'up',
        // visible: 5,
        // interval: 3500
    // });
    
    $(".newTicker").newsTicker();
    // $(".newTicker li a").each(function(){
        // var randomColor2 = Math.floor(Math.random()*16777215).toString(16);
        // $(this).css("text-shadow", "2px 2px 3px #"+randomColor2);
    // });
        
    $('.tab-content li:even,.c_list li:even').css('background',"#f9f9f9");
    // $('.c_list li:even').css('background',"#FFE5E0");
    // $('.tab-content li:even').css('background',"#E4FAFC");
    // $('.webboard_inchome div div.span4:even').css('background',"#FFFBD4");
    // $('.webboard_inchome ul:eq(1) li:even').css('background',"#E8F9D2");
    // $('.webboard_inchome ul:eq(0) li:even').css('background',"#FFF0D7");
    
    $('#seriesTab a').click(function (e) {
      e.preventDefault();
      $(this).tab('show');
    })
    
    $(window).scroll(function() {
    if($(this).scrollTop() != 0) {
            //$('#toTop').fadeIn();
            $('#footer-back-to-top').removeClass('offscreen');
        } else {
            //$('#toTop').fadeOut();
            $('#footer-back-to-top').addClass('offscreen');
        }
    });
    
    $('#footer-back-to-top').click(function() {
        $('body,html').animate({scrollTop:0},800);
    }); 
    
    $("input[name=youtube_id]").each(function(){
        var youtubeId = $(this).val();
        var element = $(this).closest('div.clearfix');
        getYouTubeInfo(youtubeId,element);
    });
    

    $('div.post:first').css('line-height','30px');
    $('div.post:first a').hide();
    $('<div class="blockquote"><b><i class="icon-download-alt"></i> เนื้อหาถูกซ่อน จะโชว์ก็ต่อเมื่อคุณ <span style="color:red">+</span>like ความเห็นนี้ </b></div>').insertAfter('div.post:first a');
    
	$('#fbjlike').fbjlike({
	    onlike:function(response){
	        $('div.post:first a').fadeIn();
	        $('div.post:first .blockquote,#fbjlike').hide();
	        $.cookie('liked','liked');
	    },
	    lang:'th_TH'
	});
  
	$("#board-submit").click(function() {
        var editorContent = tinyMCE.get('detail').getContent();
        if (editorContent == '' || editorContent == null)
        {
            // Add error message if not already present
            if (!$('#editor-error-message').length)
            {
                $('<span id="editor-error-message">กรุณากรอกข้อความด้วยค่ะ</span>').insertAfter($(tinyMCE.get('detail').getContainer()));
            }
            return false;
        }
        else
        {
            // Remove error message
            if ($('#editor-error-message'))
                $('#editor-error-message').remove();
        }
       
    })
       
    // สลับ object เป็น embed เพื่อดูใน android ในห้อง mv
	var youtubeEmbed = $('.mvcontent embed').attr('src');
	youtubeEmbed = youtubeEmbed ? youtubeEmbed.split('/') : '';
	$('.mvcontent object').after('<iframe width="640px" height="390px" src="http://www.youtube.com/embed/'+youtubeEmbed[4]+'" frameborder="0" allowfullscreen></iframe>');
	$('.mvcontent object').remove();
    
    // youtube lazyload
    $("a.youtube-lazy-link").one('click',function(){
      var anchor = $(this);
      anchor.html(anchor.html().replace('<!--','').replace('-->',''));
      anchor.removeAttr('href');
      anchor.find('.youtube-lazy-link-div').remove();
      return false;
	});
    
    $("#regisform").validate({
	rules: 
	{
		username: 
		{ 
			required: true,
			minlength: 4,
            remote: "users/check_username"
		},
		email: 
		{ 
			required: true,
			email: true,
			remote: "users/check_email"
		},
		password: 
		{
			required: true,
			minlength: 4
		},
		_password:
		{
			equalTo: "#inputPass"
		},
		captcha:
		{
			required: true,
			remote: "users/check_captcha"
		}
	},
	messages:
	{
		username: 
		{ 
			required: "กรุณากรอกชื่อล็อกอิน",
			minlength: "กรุณากรอกรหัสผ่านอย่างน้อย 4 ตัวอักษร",
            remote: "ยูสเซอร์เนมนี้ไม่สามารถใช้งานได้"
		},
		email: 
		{ 
			required: "กรุณากรอกอีเมล์",
			email: "กรุณากรอกอีเมล์ให้ถูกต้อง",
			remote: "อีเมล์นี้ไม่สามารถใช้งานได้"
		},
		password: 
		{
			required: "กรุณากรอกรหัสผ่าน",
			minlength: "กรุณากรอกรหัสผ่านอย่างน้อย 4 ตัวอักษร"
		},
		_password:
		{
			equalTo: "กรุณากรอกรหัสผ่านให้ตรงกันทั้ง 2 ช่อง"
		},
		captcha:
		{
			required: "กรุณากรอกตัวอักษรตัวที่เห็นในภาพ",
			remote: "กรุณากรอกตัวอักษรให้ตรงกับภาพ"
		}
	}
	});
	
	$("#forget").validate({
    rules: 
    {
        email: 
        { 
            required: true,
            email: true
            //remote: "users/check_email"
        },
        captcha:
        {
            required: true,
            remote: "users/check_captcha"
        }
    },
    messages:
    {
        email: 
        { 
            required: "กรุณากรอกอีเมล์",
            email: "กรุณากรอกอีเมล์ให้ถูกต้อง"
            //remote: "อีเมล์นี้ไม่สามารถใช้งานได้"
        },
        captcha:
        {
            required: "กรุณากรอกตัวอักษรตัวที่เห็นในภาพ",
            remote: "กรุณากรอกตัวอักษรให้ตรงกับภาพ"
        }
    }
    });
    
    $("#repass").validate({
    rules: 
    {
        password: 
        {
            required: true,
            minlength: 4
        },
        _password:
        {
            equalTo: "#inputPass"
        },
        captcha:
        {
            required: true,
            remote: "users/check_captcha"
        }
    },
    messages:
    {
        password: 
        {
            required: "กรุณากรอกรหัสผ่าน",
            minlength: "กรุณากรอกรหัสผ่านอย่างน้อย 4 ตัวอักษร"
        },
        _password:
        {
            equalTo: "กรุณากรอกรหัสผ่านให้ตรงกันทั้ง 2 ช่อง"
        },
        captcha:
        {
            required: "กรุณากรอกตัวอักษรตัวที่เห็นในภาพ",
            remote: "กรุณากรอกตัวอักษรให้ตรงกับภาพ"
        }
    }
    });
    
    $("#frm-post").validate({
        rules: 
        {
            title: {required: true },
            author: { required: true },
            captcha: { required: true, remote: "users/check_captcha" }
        },
        messages:
        {
            title: { required: "กรุณากรอกหัวข้อค่ะ" },
            author: { required: "กรุณากรอกชื่อค่ะ" },
            captcha: { required: "กรุณากรอกตัวอักษรตัวที่เห็นในภาพค่ะ", remote: "กรุณากรอกตัวอักษรให้ตรงกับภาพค่ะ" }
        }
    });
    
    $("#contact-frm").validate({
        rules: 
        {
            detail: { required: true },
            captcha: { required: true, remote: "users/check_captcha" }
        },
        messages:
        {
            detail: { required: "กรุณากรอกรายละเอียดค่ะ" },
            captcha: { required: "กรุณากรอกตัวอักษรตัวที่เห็นในภาพค่ะ", remote: "กรุณากรอกตัวอักษรให้ตรงกับภาพค่ะ" }
        }
    });
    
    // var loginValidate = $("#frm-chat-login").validate({
        // rules: 
        // {
            // author: { required: true, remote: "chat/check_author_exit" },
            // captcha: { required: true, remote: "users/check_captcha" }
        // },
        // messages:
        // {
            // author: { required: "กรุณากรอกชื่อค่ะ", remote: "ชื่อนี้ไม่สามารถใช้งานได้" },
            // captcha: { required: "กรุณากรอกตัวอักษรตัวที่เห็นในภาพค่ะ", remote: "กรุณากรอกตัวอักษรให้ตรงกับภาพค่ะ" }
        // },
         // submitHandler: function(form){$.post('chat/login',$(form).serialize(),ChatUpdate)}
    // });

    // Post message
    // $('#frm-chat-line').submit(function(){
        // if ($('#input-msg').val()) {  
            // $.post('chat/post', $(this).serialize(),ChatUpdate);
            // $('#input-msg').val('');
        // }
        // return false;
    // });
    
    // Chat logout
    // $('#chat-btn-logout').click(function(){
        // $.get('chat/logout', ChatUpdate);
        // return false;
    // });
    
});

// ChatUpdate();
// function ChatUpdate()
// {
    // // Check user status
    // $.get('chat/status',function(status){
        // if(status == true){
            // $('#chat-tool-frm-msg').show();
            // $('#chat-tool-frm-login').hide();
        // }else{
            // $('#chat-tool-frm-login').show();
            // $('#chat-tool-frm-msg').hide();
        // }   
    // });
//     
    // // Check user online
    // $.get('chat/online',function(online){
        // $('#chat-user-online').html(online);
    // });
//     
    // // Update message
    // $.get('chat/update/' + $('#chat-msg-line li:last').attr('rel'),function(data){
        // if(data){       
            // $('#chat-msg-line').html(data);
            // $('#chat-msg-box').animate({scrollTop: $('#chat-msg-line').height()}, 1);
        // }
    // });
// } 
// 
// function ChatInsertEmoticon(bbcode)
// {
    // $('#input-msg').insertAtCaret(bbcode);
    // return false;
// }


/* 
 * jQuery - Easy Ticker plugin - v1.0
 * http://www.aakashweb.com/
 * Copyright 2012, Aakash Chakravarthy
 * Released under the MIT License.
 */

// (function($){
	// $.fn.easyTicker = function(options) {
// 	
	// var defaults = {
		// direction: 'up',
   		// easing: 'swing',
		// speed: 'slow',
		// interval: 2000,
		// height: 'auto',
		// visible: 0,
		// mousePause: 1,
		// controls:{
			// up: '',
			// down: '',
			// toggle: ''
		// }
	// };
// 	
	// // Initialize the variables
	// var options = $.extend(defaults, options), 
		// timer = 0,
		// tClass = 'et-run',
		// winFocus = 0,
		// vBody = $('body'),
		// cUp = $(options.controls.up),
		// cDown = $(options.controls.down),
		// cToggle = $(options.controls.toggle);
// 	
	// // The initializing function
	// var init = function(obj, target){
// 		
		// target.children().css('margin', 0).children().css('margin', 0);
// 		
		// obj.css({
			// position : 'relative',
			// height : (options.height == 'auto') ? objHeight(obj, target) : options.height,
			// overflow : 'hidden'
		// });
// 		
		// target.css({
			// 'position' : 'absolute',
			// 'margin' : 0
		// }).children().css('margin', 0);
// 		
		// if(options.visible != 0 && options.height == 'auto'){
			// adjHeight(obj, target);
		// }
// 
		// // Set the class to the "toggle" control and set the timer.
		// cToggle.addClass(tClass);
		// setTimer(obj, target);
	// }
// 	
	// // Core function to move the element up and down.
	// var move = function(obj, target, type){
// 		
		// if(!obj.is(':visible')) return;
// 		
		// if(type == 'up'){
			// var sel = ':first-child',
				// eq = '-=',
				// appType = 'appendTo';
		// }else{
			// var sel = ':last-child',
				// eq = '+=',
				// appType = 'prependTo';
		// }
// 	
		// var selChild = $(target).children(sel);
		// var height = selChild.outerHeight();
// 	
		// $(target).stop(true, true).animate({
			// 'top': eq + height + "px"
		// }, options.speed, options.easing, function(){
			// selChild.hide()[appType](target).fadeIn();
			// $(target).css('top', 0);
			// if(options.visible != 0 && options.height == 'auto'){
				// adjHeight(obj, target);
			// }
		// });
	// }
// 	
	// // Activates the timer.
	// var setTimer = function(obj, target){
		// if(cToggle.length == 0 || cToggle.hasClass(tClass)){
			// timer = setInterval(function(){
				// if (vBody.attr('data-focus') != 1){ return; }
				// move(obj, target, options.direction);
			// }, options.interval);
		// }
	// }
// 	
	// // Stops the timer
	// var stopTimer = function(obj){
		// clearInterval(timer);
	// }
// 	
	// // Adjust the wrapper height and show the visible elements only.
	// var adjHeight = function(obj, target){
		// var wrapHeight = 0;
		// $(target).children(':lt(' + options.visible + ')').each(function(){
			// wrapHeight += $(this).outerHeight();
		// });
// 		
		// obj.stop(true, true).animate({height: wrapHeight}, options.speed);
	// }
// 	
	// // Get the maximum height of the children.
	// var objHeight = function(obj, target){
		// var height = 0;
// 		
		// var tempDisp = obj.css('display');
		// obj.css('display', 'block');
// 				
		// $(target).children().each(function(){
			// height += $(this).outerHeight();
		// });
// 		
		// obj.css('display', tempDisp);
		// return height;
	// }
// 	
	// // Hack to check window status
	// function onBlur(){ vBody.attr('data-focus', 0); };
	// function onFocus(){ vBody.attr('data-focus', 1); };
// 	
	// if (false) { // check for Internet Explorer
		// document.onfocusin = onFocus;
		// document.onfocusout = onBlur;
	// }else{
		// $(window).bind('focus mouseover', onFocus);
		// $(window).bind('blur', onBlur);
	// }
// 
	// return this.each(function(){
		// var obj = $(this);
		// var tar = obj.children(':first-child');
// 		
		// // Initialize the content
		// init(obj, tar);
// 		
		// // Bind the mousePause action
		// if(options.mousePause == 1){
			// obj.mouseover(function(){
				// stopTimer(obj);
			// }).mouseleave(function(){
				// setTimer(obj, tar);
			// });
		// }
// 		
		// // Controls action
		// cToggle.live('click', function(){
			// if($(this).hasClass(tClass)){
				// stopTimer(obj);
				// $(this).removeClass(tClass);
			// }else{
				// $(this).addClass(tClass);
				// setTimer(obj, tar);
			// }
		// });
// 		
		// cUp.live('click', function(){
			// move(obj, tar, 'up');
		// });
// 		
		// cDown.live('click', function(){
			// move(obj, tar, 'down');
		// });
// 		
	// });
// };
// })(jQuery);


/**
 * utilities.js author Yotsakon
 */
//(function($) {
	
// Insert to current cursor
// $.fn.insertAtCaret = function (myValue) {
        // return this.each(function(){
                //IE support
                // if (document.selection) {
                        // this.focus();
                        // sel = document.selection.createRange();
                        // sel.text = myValue;
                        // this.focus();
                // }
                //MOZILLA/NETSCAPE support
                // else if (this.selectionStart || this.selectionStart == '0') {
                        // var startPos = this.selectionStart;
                        // var endPos = this.selectionEnd;
                        // var scrollTop = this.scrollTop;
                        // this.value = this.value.substring(0, startPos)
                                      // + myValue
                              // + this.value.substring(endPos, this.value.length);
                        // this.focus();
                        // this.selectionStart = startPos + myValue.length;
                        // this.selectionEnd = startPos + myValue.length;
                        // this.scrollTop = scrollTop;
                // } else {
                        // this.value += myValue;
                        // this.focus();
                // }
        // });
// 
// };

// Default input value
// $.fn.inputHint = function( defaultValue ){
	// $(this).focus(function(){
		// if (this.value == this.defaultValue){ this.value = ''; }
		// if(this.value != this.defaultValue){ this.select(); }
    // });
	// $(this).blur(function(){
		// if ($.trim(this.value) == ''){ this.value = (this.defaultValue ? this.defaultValue : ''); }
	// });
// }
// 
// 
// $.fn.checkValid = function(url,field){
	// var available = '<b style="color:green;">ใช้ได้</b>';
	// var unavailable = '<b style="color:red;">ใช้ไม่ได้</b>';
    // $(this).after('&nbsp;<span></span>');
	// var msg = $(this).next('span');
	// var form = $(this).parents('form:first');
	// var btnSubmit = form.find("input[type='submit']");
	// $(this).keyup(function(){
		// $.ajax({
			// url: url,
			// data: 'field=' + field + '&data=' + $(this).val(),
			// beforeSend: function(){ msg.html('<img src="images/etc/ajax-loader.gif" />'); },
			// success: function show(data){  
				// if(data == 'available'){ 
					// msg.html(available);
				// }else{
   					// msg.html(unavailable);
				// } 
			// }
		// });
	// });
	// $(this).blur(function(){  
		// if (this.value == '') { msg.html(''); }
	// });
// }
// 
// $.fn.hilight = function(options) {
	// debug(this);
 	// build main options before element iteration
 	// var opts = $.extend({}, $.fn.hilight.defaults, options);
 	// iterate and reformat each matched element
 	// return this.each(function() {
   		// $this = $(this);
   		// build element specific options
   		// var o = $.meta ? $.extend({}, opts, $this.data()) : opts;
   		// update element styles
   		// $this.css({
  			// backgroundColor: o.background,
  			// color: o.foreground
   		// });
   		// var markup = $this.html();
   		// call our format function
   		// markup = $.fn.hilight.format(markup);
   		// $this.html(markup);
 	// });
// };
//
// private function for debugging
//
// function debug($obj) {
	// if (window.console && window.console.log) window.console.log('hilight selection count: ' + $obj.size());
// };
//
// define and expose our format function
//
// $.fn.hilight.format = function(txt) {
 	// return '<strong>' + txt + '</strong>';
// };
//
// plugin defaults
//
// $.fn.hilight.defaults = {
	// foreground: 'red',
 	// background: 'yellow'
// };
// 
// $.fn.mouseOver = function(img){
	// $(this).mouseover(function(){
		// $(this).attr('src',img);
	// });
// }
// 
// })(jQuery);

/*
	jquery.fbjlike.js - http://socialmediaautomat.com/jquery-fbjlike-js.php
	based on: jQuery OneFBLike v1.1 - http://onerutter.com/open-source/jquery-facebook-like-plugin.html
	Copyright (c) 2010 Jake Rutter modified 2011 by Stephan Helbig
	This plugin available for use in all personal or commercial projects under both MIT and GPL licenses.
*/