<?php 
echo '<?xml version="1.0" encoding="utf-8"?>' . "\n";
?>
<rss version="2.0"
    xmlns:dc="http://purl.org/dc/elements/1.1/"
    xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
    xmlns:admin="http://webns.net/mvcb/"
    xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
    xmlns:content="http://purl.org/rss/1.0/modules/content/"    
    >
    <channel>
    <title><?php echo $feed_name; ?></title>
    <link><?php echo $feed_url; ?></link>    
    <description><?php echo $page_description; ?></description>
    <dc:language><?php echo $page_language; ?></dc:language>
    <dc:creator><?php echo $creator_email; ?></dc:creator>
    <dc:rights>Copyright <?php echo gmdate("Y", time()); ?></dc:rights>
    <admin:generatorAgent rdf:resource="http://www.codeigniter.com/" />
	<?php
        foreach($posts as $post):
			$end = ($post->category->end == 'end')?' [จบเรื่องแล้วจ้า ^^]':'';
	?>    
        <item>
          <title><?php echo xml_convert('ดูซีรีย์เกาหลี '.$post->category->name.' - '.$post->title.' ซับไทยออนไลน์ '.$end); ?></title>
          <link><?php echo site_url("vdos/series_online/ดูซีรีย์เกาหลี-".clean_url($post->category->name)."-".$post->title."-ซับไทย-ออนไลน์-".$post->id) ?></link>
          <guid><?php echo site_url("vdos/series_online/ดูซีรีย์เกาหลี-".clean_url($post->category->name)."-".$post->title."-ซับไทย-ออนไลน์-".$post->id) ?></guid>
          <description><?php echo xml_convert($post->category->detail); ?></description> 
          <author><![CDATA[kpoplover.com]]></author>
          <category><![CDATA[Kpop Music Video]]></category>
          <pubDate><![CDATA[<?php echo gmdate(DATE_RSS, strtotime($post->created)); ?>]]></pubDate>     
        </item>        
   <?php endforeach; ?>    
    </channel>
</rss>