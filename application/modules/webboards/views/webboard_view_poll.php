<?php foreach($webboard_quizs as $row): ?>
<div class="poll-text"><?php echo $row->name ?></div>
<div class="poll-bar"><div class="poll-foreground" style="width:<?php echo $row->percent ?>%;"></div></div>
<div class="poll-percent"><!--<span style="float:left;"><?php echo $rs['num'] ?> คน</span>--><?php echo $row->percent ?>%</div>
<?php endforeach; ?>