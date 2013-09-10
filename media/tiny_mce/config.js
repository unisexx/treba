function tiny(elements){
	tinyMCE.init({
		mode: "exact",
		elements: elements,
		theme: "advanced",
		skin: "cirkuit",
		plugins: "pdw,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,advlist",
		
		file_browser_callback: 'openKCFinder',
		init_instance_callback : "fixTinyMCETabIssue",
		
		theme_advanced_buttons1: "pdw_toggle,formatselect,fontsizeselect,forecolor,|,bold,italic,strikethrough,|,bullist,numlist,|,justifyleft,justifycenter,justifyright,|,link,unlink,|,spellchecker,|,image",
		theme_advanced_buttons2: "code,paste,pastetext,pasteword,removeformat,|,backcolor,|,underline,justifyfull,sup,|,outdent,indent,|,hr,charmap,|,media,|,search,replace,|,fullscreen,|,undo,redo",
		theme_advanced_buttons3: "tablecontrols,|,visualaid,template,pagebreak,preview,emotions",
		
		theme_advanced_toolbar_location: "top",
		theme_advanced_toolbar_align: "left",
		theme_advanced_statusbar_location: "bottom",
		theme_advanced_resizing: true,
		
		height: "300",
		width: "600",
		relative_urls : false,
		accessibility_warnings: false,
		pdw_toggle_on: 1,
		pdw_toggle_toolbars: "2,3",
		force_br_newlines: true,
		force_p_newlines: false,
		//forced_root_block: ''
	});
}

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

function openKCFinder(field_name, url, type, win) {
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

function browser(element,type) {
    window.KCFinder = {
        callBack: function(url) {
            window.KCFinder = null;
			var path = url.match(/(uploads.*)/);
			element.val(path[0]);
        }
    };
    window.open('media/kcfinder/browse.php?type='+type+'&dir='+type+'/public',
        'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
        'directories=0, resizable=1, scrollbars=0, width=800, height=600'
    );
}