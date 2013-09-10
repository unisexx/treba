/**
 * @author Yotsakon
 */
(function($) {
	
// Insert to current cursor
$.fn.insertAtCaret = function (myValue) {
        return this.each(function(){
                //IE support
                if (document.selection) {
                        this.focus();
                        sel = document.selection.createRange();
                        sel.text = myValue;
                        this.focus();
                }
                //MOZILLA/NETSCAPE support
                else if (this.selectionStart || this.selectionStart == '0') {
                        var startPos = this.selectionStart;
                        var endPos = this.selectionEnd;
                        var scrollTop = this.scrollTop;
                        this.value = this.value.substring(0, startPos)
                                      + myValue
                              + this.value.substring(endPos, this.value.length);
                        this.focus();
                        this.selectionStart = startPos + myValue.length;
                        this.selectionEnd = startPos + myValue.length;
                        this.scrollTop = scrollTop;
                } else {
                        this.value += myValue;
                        this.focus();
                }
        });

};

// Default input value
$.fn.inputHint = function( defaultValue ){
	$(this).focus(function(){
		if (this.value == this.defaultValue){ this.value = ''; }
		if(this.value != this.defaultValue){ this.select(); }
    });
	$(this).blur(function(){
		if ($.trim(this.value) == ''){ this.value = (this.defaultValue ? this.defaultValue : ''); }
	});
}


$.fn.checkValid = function(url,field){
	var available = '<b style="color:green;">ใช้ได้</b>';
	var unavailable = '<b style="color:red;">ใช้ไม่ได้</b>';
    $(this).after('&nbsp;<span></span>');
	var msg = $(this).next('span');
	var form = $(this).parents('form:first');
	var btnSubmit = form.find("input[type='submit']");
	$(this).keyup(function(){
		$.ajax({
			url: url,
			data: 'field=' + field + '&data=' + $(this).val(),
			beforeSend: function(){ msg.html('<img src="images/etc/ajax-loader.gif" />'); },
			success: function show(data){  
				if(data == 'available'){ 
					msg.html(available);
				}else{
   					msg.html(unavailable);
				} 
			}
		});
	});
	$(this).blur(function(){  
		if (this.value == '') { msg.html(''); }
	});
}

$.fn.hilight = function(options) {
	debug(this);
 	// build main options before element iteration
 	var opts = $.extend({}, $.fn.hilight.defaults, options);
 	// iterate and reformat each matched element
 	return this.each(function() {
   		$this = $(this);
   		// build element specific options
   		var o = $.meta ? $.extend({}, opts, $this.data()) : opts;
   		// update element styles
   		$this.css({
  			backgroundColor: o.background,
  			color: o.foreground
   		});
   		var markup = $this.html();
   		// call our format function
   		markup = $.fn.hilight.format(markup);
   		$this.html(markup);
 	});
};
//
// private function for debugging
//
function debug($obj) {
	if (window.console && window.console.log) window.console.log('hilight selection count: ' + $obj.size());
};
//
// define and expose our format function
//
$.fn.hilight.format = function(txt) {
 	return '<strong>' + txt + '</strong>';
};
//
// plugin defaults
//
$.fn.hilight.defaults = {
	foreground: 'red',
 	background: 'yellow'
};

$.fn.mouseOver = function(img){
	$(this).mouseover(function(){
		$(this).attr('src',img);
	});
}

})(jQuery);