<?php
class Music_chart_category extends ORM {

    var $table = 'music_chart_categories';
    
    var $has_many = array("music_chart");

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>