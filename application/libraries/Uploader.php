<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// Include the main class
require_once(APPPATH.'libraries/class.upload.php');

// Extend it
class Uploader extends upload {

    function __construct() { 
        log_message('debug', get_class($this).' Class Initialized');
    }
    
}
// END Imaging Class

/* End of file Imaging.php */
/* Location: ./system/application/libraries/Imaging.php */ 