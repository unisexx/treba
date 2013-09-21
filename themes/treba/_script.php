<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="media/js/jcarousel/lib/jquery.jcarousel.min.js"></script>
<script type="text/javascript">
jQuery(document).ready(function() {
    jQuery('.first-and-second-carousel').jcarousel();
    
    jQuery('.inc_banner').jcarousel({
        auto: 5,
        scroll: 6,
        wrap: 'circular'
    });
});
</script>