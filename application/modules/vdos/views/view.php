<ul class="breadcrumb">
    <li><a href="home">หน้าแรก</a> <span class="divider">/</span></li>
    <li><a href="vdos">ซีรีย์เกาหลีซับไทยออนไลน์</a> <span class="divider">/</span></li>
    <li class="active"><?=$category->name?></li>
</ul>
<h1><?=$category->name?></h1>
<?=addThis()?>
    <div align="center">
        <?=get_facebook_thumbnail($category->detail)?>
        <?=$category->detail?>
    </div>
<?=fanpage_button();?>
<h2>ดูซีรีย์เรื่อง <?=$category->name?> ออนไลน์</h2>
<table class="table table-striped table-bordered table-condensed ep-list">
  <thead>
    <tr>
      <th>ตอนที่</th>
      <th>วิว</th>
      <th>วันที่</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach($epsode as $ep):?>
        <tr>
          <td><span class="label label-info"><a href="vdos/series_online/ดูซีรีย์เกาหลี-<?=clean_url($category->name)?>-<?=$ep->title?>-ซับไทย-ออนไลน์-<?=$ep->id?>"><?=$ep->title?></a></span>
          <td><?=$ep->counter;?></td>
          <td><?=$ep->created?></td>
        </tr>
      <?php endforeach;?>
  </tbody>
</table>
<?php echo modules::run('vdos/related_series'); ?>
<?=facebook_comment();?>