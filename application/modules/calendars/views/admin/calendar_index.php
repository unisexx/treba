<!-- Calendar -->
			<link rel='stylesheet' type='text/css' href='media/js/fullcalendar-1.4.3/redmond/theme.css' />
			<link rel='stylesheet' type='text/css' href='media/js/fullcalendar-1.4.3/fullcalendar-my.css' />
			<script type='text/javascript' src='media/js/fullcalendar-1.4.3/fullcalendar.js'></script>
			<script type='text/javascript' src='media/js/ui.core.js'></script>
			<script type='text/javascript' src='media/js/ui.draggable.js'></script>
			<script type='text/javascript' src='media/js/ui.resizable.js'></script>
<!-- !Calendar -->
<script>
        	$(function(){	
			
				$.fullCalendar.parseDate( 'a' );		
				$('#calendar').fullCalendar({
					header: {
						left: 'today',
						center: 'title',
						right: 'prev,next'
					},
					theme: true,
					editable: true,
					eventDrop: function(event, start) {
						$.post('<?php echo base_url()?>calendars/admin/calendars/events_move',{id:event.id,start:start,end:start});
					},
					eventResize: function(event, end){
						$.post('<?php echo base_url()?>calendars/admin/calendars/events_move',{id:event.id,end:end});
					}, 
					dayClick: function(date) { 
						var month = (date.getMonth() + 1).toString();
						var dom = date.getDate().toString();
						if (month.length == 1) month = "0" + month;
						if (dom.length == 1) dom = "0" + dom;
						window.location = '<?php echo base_url()?>calendars/admin/calendars/form?date=' + date.getFullYear() + "-" + month + "-" + dom;
					},
						
					eventMouseover: function(){
						$(this).css('background-color', 'red');
					},
					eventClick: function(event){
						window.location = '<?php echo base_url()?>calendars/admin/calendars/form/' + event.id;
					},
					events: "<?php echo base_url()?>calendars/admin/calendars/events",
					loading: function(bool) {
					if (bool) $('#loading').show();
						else $('#loading').hide();
					}
				});
            });
        </script>
<div class="block">
<h1>ปฎิทินกิจกกรม</h1>
<?php if(permission('calendars', 'create')):?>
<a href="calendars/admin/calendars/form" class="btn">เพิ่มตารางนัดหมาย</a>
<?php endif;?>

	<div style="clear:left;display:inline-block;width:100%">
		<div style="height:30px;">&nbsp;
		<div id='loading' style='display:none;text-align:center;'><img src="media/images/ajax-loader.gif" /></div>
	</div>
	<div id='calendar'></div>
	<div style="clear:both;"></div>
</div>