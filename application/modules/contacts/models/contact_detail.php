<?php
class Contact_detail extends ORM
{
    public $table = 'contact_details';
    
    public $has_one = array('user');
    
    public function __construct($id = NULL)
    {
        parent::__construct($id);
    }
    
}
?>