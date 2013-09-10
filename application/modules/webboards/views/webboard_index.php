<ul class="breadcrumb">
    <li><a href="home">หน้าแรก</a> <span class="divider">/</span></li>
    <li class="active">เว็บบอร์ด</li>
</ul>
<h1>เว็บบอร์ด</h1>
<table id="webboardTable" class="webboard-tb table table-striped">
	<tbody>
		<?php foreach($categories as $category): ?>
		 <tr>
          <td class="icon"><img src="media/images/webboard/ico_folder.png"></td>
          <td><a href="webboards/category/<?php echo $category->slug?>" class="topicpost"><?php echo $category->name?></a><br><?php echo $category->description;?></td>
          <td><?php echo $category->webboard_quiz->result_count()?> กระทู้<br><?php echo $category->webboard_answer->result_count() ?> ตอบ</td>
          <td>กระทู้ล่าสุด <br><span class="f10"><?php echo mysql_to_th($category->webboard_quiz->order_by("id", "desc")->limit(1)->get()->created,'S',TRUE)?></span><br>
            <?php if($category->webboard_quiz->user->id): ?>                                       
                                                    โดย <a href="users/profile/<?php echo $category->webboard_quiz->user->id?>" class="name"><?php echo $category->webboard_quiz->user->username?></a>
            <?php else: ?>
                                                    โดย <a href="javascript:;" class="name"><?php echo $category->webboard_quiz->author?></a>
            <?php endif; ?>
          </td>
        </tr>
		<?php endforeach; ?>
	</tbody>
</table>