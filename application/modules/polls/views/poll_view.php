<?php foreach($polls as $poll): ?>
<div class="poll-text"><?php echo $poll->name ?></div>
<div class="poll-bar"><div class="poll-foreground" style="width:<?php echo $poll->percent ?>%;"></div></div>
<div class="poll-percent"><span style="float:left;"><?php echo $poll->num ?> คน</span><?php echo $poll->percent ?>%</div>
<?php endforeach; ?>