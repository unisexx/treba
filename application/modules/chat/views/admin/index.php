<h1>Chat Online</h1>
<?php echo $msgs->pagination()?>
<table class="list">
    <tr>
        <th>ชื่อ</th>
        <th>ข้อความ</th>
        <th width="90"></th>
    </tr>
    <?php foreach($msgs as $msg): ?>
    <tr <?php echo cycle()?>>
        <td><?php echo $msg->author;?></td>
        <td><?php echo $msg->msg;?></td>
        <td>
            <a class="btn" href="chat/admin/chat/delete/<?php echo $msg->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
        </td>
        </tr>
    <?php endforeach; ?>
        
    </table>
<?php echo $msgs->pagination()?>