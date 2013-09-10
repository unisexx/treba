<script type="text/javascript" src="media/js/highchart/highcharts.js"></script>
<script type="text/javascript" src="media/js/highchart/modules/exporting.js"></script>
<script type="text/javascript">
var chart;
$(document).ready(function() {
   chart = new Highcharts.Chart({
      chart: {
         renderTo: 'chart',
         defaultSeriesType: 'column'
      },
      title: {
         text: 'สถิติการเพิ่มบทความแต่ละประเถทแบ่งตามกลุ่มงาน'
      },
      xAxis: {
         categories: [
            'ข่าวประชาสัมพันธ์', 
            'ข่าวประกาศ', 
            'สื่อเผยแพร่', 
            'ปฎิทินกิจกรรม', 
            'ภาพกิจกรรม',
			'ความรู้วิชาการ'
         ]
      },
      yAxis: {
         min: 0,
         title: {
            text: 'จำนวนบทความ'
         }
      },
      legend: {
         layout: 'vertical',
         backgroundColor: '#FFFFFF',
         floating: false,
         shadow: true
      },
      tooltip: {
         formatter: function() {
            return '<div style="text-align:center; line-height:18px;"><b>'+ this.series.name +'</b><br/>'+
               this.x +': '+ this.y +' บทความ</div>';
         }
      },
      plotOptions: {
         column: {
            pointPadding: 0.2,
            borderWidth: 0
         }
      },
           series: [
		 <?php 
		 $comma = '';
		 foreach($groups as $group): 
		 echo $comma;
		 ?>
		{
         name: '<?php echo lang_decode($group->name,'th') ?>',
         data: [<?php echo $group->information->count() ?>
		 , <?php echo $group->notice->count() ?>
		 , <?php echo $group->mediapublic->count() ?>
		 , <?php echo $group->calendar->count() ?>
		 , <?php echo $group->category->where('module','galleries')->count() ?>
			, <?php echo $group->academic->count() ?>
		 ]
   		}
		<?php 
		$comma = ',';
		endforeach; 
		?>
		]
   });
});	
</script>
<h1>สถิติการเพิ่มบทความแต่ละประเถทแบ่งตามกลุ่มงาน</h1>
<div id="chart" style="width: 100%; height: 600px; margin: 0 auto"></div>