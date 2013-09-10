<div id="boxwebboard" class="corner">
        <a href="webboards" class="moreright">more</a>
      	<div class="topic"><img src="<?php echo topic("topic_webboard.png") ?>" width="200" height="25" /></div>
        <div class="box">
            <ul>
            	<?php foreach($webboard_quizs as $webboard_quiz):?>
					<li>
						<a href="webboards/view_topic/<?php echo $webboard_quiz->id?>"><?php echo $webboard_quiz->title?></a> <span class="TxtGray2 f11">โดย <a href="users/profile/<?php echo $webboard_quiz->user->id?>" style="color:#006699;"><?php echo $webboard_quiz->user->display?></a> [<?php echo $webboard_quiz->webboard_answer->result_count()?>/<?php echo $webboard_quiz->counter?>] </span>
					</li>
				<?php endforeach;?>
            </ul>    
	</div>
</div>