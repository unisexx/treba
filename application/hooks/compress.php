<?php
function compress(){
    $CI =& get_instance();
    $buffer = $CI->output->get_output();
    
    $search = array(
        '/\>[^\S ]+/s', 
        '/[^\S ]+\</s', 
         '/(\s)+/s' // shorten multiple whitespace sequences
      );
    $replace = array(
         '>',
         '<',
         '\\1'
      );
    
    $buffer = preg_replace($search, $replace, $buffer);
    
    $CI->output->set_output($buffer);
    $CI->output->_display();
}
?>