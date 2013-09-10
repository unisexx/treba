<?php
class Music_chart_db extends ORM {

    var $table = 'music_chart_dbs';

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>