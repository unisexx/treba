/**
 * @author Yotsakon
 */
tinyMCE.init({
	mode : "textareas",
    editor_selector : "editor",
	relative_urls : false,
	// General options
	theme : "advanced",
	skin : "cirkuit",
	plugins : "pdw,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",
	file_browser_callback: 'openKCFinder',
	// Theme options
	theme_advanced_buttons1 : "pdw_toggle,formatselect,fontsizeselect,forecolor,|,bold,italic,strikethrough,|,bullist,numlist,|,justifyleft,justifycenter,justifyright,|,link,unlink,|,spellchecker,|,image", 
    theme_advanced_buttons2 : "code,paste,pastetext,pasteword,removeformat,|,backcolor,|,underline,justifyfull,sup,|,outdent,indent,|,hr,charmap,|,media,|,search,replace,|,fullscreen,|,undo,redo", 
    theme_advanced_buttons3 : "tablecontrols,|,visualaid,template,pagebreak,preview,emotions", 
	theme_advanced_toolbar_location : "top", 
    theme_advanced_toolbar_align : "left", 
    theme_advanced_statusbar_location : "bottom", 
    theme_advanced_resizing : true, 
 	height : "300", 
    width: "600", 
	// Example content CSS (should be your site CSS)
	content_css : "css/content.css",
	accessibility_warnings : false,
	pdw_toggle_on : 1,
    pdw_toggle_toolbars : "2,3",            
	force_br_newlines : true,
	force_p_newlines : false,
    forced_root_block : '' // Needed for 3.x
});

tinyMCE.init({
	mode : "textareas",
    editor_selector : "editor[blog]",
	relative_urls : false,
	// General options
	theme : "advanced",
	skin : "cirkuit",
	plugins : "pdw,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",
	
	// Theme options
	theme_advanced_buttons1 : "pdw_toggle,formatselect,fontsizeselect,forecolor,|,bold,italic,strikethrough,|,bullist,numlist,|,justifyleft,justifycenter,justifyright,|,link,unlink,|,spellchecker,|,image", 
    theme_advanced_buttons2 : "code,paste,pastetext,pasteword,removeformat,|,backcolor,|,underline,justifyfull,sup,|,outdent,indent,|,hr,charmap,|,media,|,search,replace,|,fullscreen,|,undo,redo", 
    theme_advanced_buttons3 : "tablecontrols,|,visualaid,template,pagebreak,preview,emotions", 
	theme_advanced_toolbar_location : "top", 
    theme_advanced_toolbar_align : "left", 
    theme_advanced_statusbar_location : "bottom", 
    theme_advanced_resizing : true, 
 	height : "300", 
    width: "646", 
	// Example content CSS (should be your site CSS)
	content_css : "css/content.css",
	accessibility_warnings : false,
	pdw_toggle_on : 1,
    pdw_toggle_toolbars : "2,3",            
	force_br_newlines : true,
	force_p_newlines : false,
    forced_root_block : '' // Needed for 3.x
});

tinyMCE.init({
	mode : "textareas",
    editor_selector : "editor[calendar]",
	relative_urls : false,
	// General options
	theme : "advanced",
	skin : "cirkuit",
	plugins : "pdw,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",
	
	// Theme options
	theme_advanced_buttons1 : "pdw_toggle,formatselect,fontsizeselect,forecolor,|,bold,italic,strikethrough,|,bullist,numlist,|,justifyleft,justifycenter,justifyright,spellchecker,|,image", 
    theme_advanced_buttons2 : "code,paste,pastetext,pasteword,removeformat,|,backcolor,|,underline,justifyfull,sup,|,outdent,indent,|,hr,charmap,|,media,|,link,unlink", 
    theme_advanced_buttons3 : "search,replace,|,tablecontrols,|,visualaid,template,pagebreak,preview,emotions", 
	theme_advanced_toolbar_location : "top", 
    theme_advanced_toolbar_align : "left", 
    theme_advanced_statusbar_location : "bottom", 
    theme_advanced_resizing : true, 
 	height : "300", 
    width: "450", 
	// Example content CSS (should be your site CSS)
	content_css : "css/content.css",
	accessibility_warnings : false,
	pdw_toggle_on : 1,
    pdw_toggle_toolbars : "2,3",            
	force_br_newlines : true,
	force_p_newlines : false,
    forced_root_block : '' // Needed for 3.x
});

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
	content_css : "css/content.css",
	accessibility_warnings : false,
	pdw_toggle_on : 1,
    pdw_toggle_toolbars : "2,3",            
	force_br_newlines : true,
	force_p_newlines : false
    //forced_root_block : '' // Needed for 3.x
});

tinyMCE.init({
	mode : "textareas",
    editor_selector : "editor[sig]",
	relative_urls : false,
	// General options
	theme : "advanced",
	skin : "cirkuit",
	plugins : "pdw,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",
	file_browser_callback: 'openKCFinder',
	// Theme options
	theme_advanced_buttons1 : "pdw_toggle,formatselect,fontsizeselect,forecolor,|,bold,italic,strikethrough,|,bullist,numlist,|,justifyleft,justifycenter,justifyright,|,link,unlink,|,spellchecker", 
    theme_advanced_buttons2 : "code,paste,pastetext,pasteword,removeformat,|,backcolor,|,underline,justifyfull,sup,|,outdent,indent,|,hr,charmap,|,media,|,search,replace,|,fullscreen,|,undo,redo", 
    theme_advanced_buttons3 : "tablecontrols,|,visualaid,template,pagebreak,preview,emotions", 
	theme_advanced_toolbar_location : "top", 
    theme_advanced_toolbar_align : "left", 
    theme_advanced_statusbar_location : "bottom", 
    theme_advanced_resizing : true, 
 	height : "200", 
    width: "615", 
	// Example content CSS (should be your site CSS)
	content_css : "css/content.css",
	accessibility_warnings : false,
	pdw_toggle_on : 1,
    pdw_toggle_toolbars : "2,3",            
	force_br_newlines : true,
	force_p_newlines : false,
    forced_root_block : '' // Needed for 3.x
});

tinyMCE.init({
	mode : "textareas",
    editor_selector : "editor[webboard]",
	relative_urls : false,
	// General options
	theme : "advanced",
	skin : "cirkuit",
	plugins : "pdw,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",
	file_browser_callback: 'openKCFinder',
	// Theme options
	theme_advanced_buttons1 : "pdw_toggle,formatselect,fontsizeselect,forecolor,|,bold,italic,strikethrough,|,bullist,numlist,|,justifyleft,justifycenter,justifyright,|,link,unlink,|,spellchecker", 
    theme_advanced_buttons2 : "code,paste,pastetext,pasteword,removeformat,|,backcolor,|,underline,justifyfull,sup,|,outdent,indent,|,hr,charmap,|,media,|,search,replace,|,fullscreen,|,undo,redo", 
    theme_advanced_buttons3 : "tablecontrols,|,visualaid,template,pagebreak,preview,emotions", 
	theme_advanced_toolbar_location : "top", 
    theme_advanced_toolbar_align : "left", 
    theme_advanced_statusbar_location : "bottom", 
    theme_advanced_resizing : true, 
 	height : "300", 
    width: "775", 
	// Example content CSS (should be your site CSS)
	content_css : "css/content.css",
	accessibility_warnings : false,
	pdw_toggle_on : 1,
    pdw_toggle_toolbars : "2,3",            
	force_br_newlines : true,
	force_p_newlines : false,
    forced_root_block : '' // Needed for 3.x
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
