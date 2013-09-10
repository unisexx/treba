<?php
class Banner extends ORM {

    var $table = 'banners';

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>