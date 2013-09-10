<?php

if(!function_exists('lang_encode'))
{
	function lang_encode($data)
	{
		if(is_array($data))
		{
			$result = array();
			foreach($data as $key => $value)
			{
				if (is_string($value))
				{
			 		static $jsonReplaces = array(array("\\", "/", "\n", "\t", "\r", "\b", "\f", '"'), array('\\\\', '\\/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"'));
			 		$value = str_replace($jsonReplaces[0], $jsonReplaces[1], $value);
			 	}
				$result[] = '"'.trim($key).'":"'.($value).'"';	
			} 
			return '{'.implode(',', $result).'}';
		}
	}
}

if(!function_exists('lang_decode'))
{
	function lang_decode($data,$select_lang = FALSE)
	{
		$CI =& get_instance();
		$lang = $select_lang ? $select_lang : $CI->session->userdata('lang');
		$obj = json_decode($data);
		$result = (is_object($obj)) ? @($obj->$lang ? htmlspecialchars_decode(str_replace("<n/>", "\n",$obj->$lang)) : htmlspecialchars_decode(str_replace("<n/>", "\n",$obj->en))) : $data;	
		return $result;
	}
}

function link_filter($string)
{
    $CI =& get_instance();
    $CI->load->helper('text');
    $link = new Webboard_bad_word(2);
    $link = explode("\n",$link->badword);
    return word_censor($string,$link,'<span style=display:none;></span>');
}

function censor($string)
{
    $CI =& get_instance();
    $CI->load->helper('text');
    $word = new Webboard_bad_word(1);
    $word = explode("\n",$word->badword);
    
    $wordchange = "<img src=\"media/tiny_mce/plugins/emotions/img/cry.gif\">"; //ข้อความที่ต้องการให้เปลี่ยนเป็น

    for ( $i = 0 ; $i < sizeof( $word ) ; $i++ )
    {
         $string = str_replace( $word[$i] , $wordchange , $string );
    };
     
    return $string;
    
    //return word_censor($string,$word,'<img src="media/tiny_mce/plugins/emotions/img/cry.gif">');
}

if (!function_exists('json_encode'))
{
 function json_encode($a=false)
 {
 if (is_null($a)) return 'null';
 if ($a === false) return 'false';
 if ($a === true) return 'true';
 if (is_scalar($a))
 {
 if (is_float($a))
 {
 // Always use "." for floats.
 return floatval(str_replace(",", ".", strval($a)));
 }

 if (is_string($a))
 {
 static $jsonReplaces = array(array("\\", "/", "\n", "\t", "\r", "\b", "\f", '"'), array('\\\\', '\\/', '\\n', '\\t', '\\r', '\\b', '\\f', '\"'));
 return '"' . str_replace($jsonReplaces[0], $jsonReplaces[1], $a) . '"';
 }
 else
 return '"'.$a.'"';
 }
 $isList = true;
 for ($i = 0, reset($a); $i < count($a); $i++, next($a))
 {
 if (key($a) !== $i)
 {
 $isList = false;
 break;
 }
 }
 $result = array();
 if ($isList)
 {
 foreach ($a as $v) $result[] = json_encode($v);
 return '[' . join(',', $result) . ']';
 }
 else
 {
 foreach ($a as $k => $v) $result[] = json_encode($k).':'.json_encode($v);
 return '{' . join(',', $result) . '}';
 }
 }
}

if (!function_exists('json_decode')) {
    function json_decode($json) {
      $comment = false;
      $out     = '$x=';
      for ($i=0; $i<strlen($json); $i++) {
        if (!$comment) {
          if (($json[$i] == '{') || ($json[$i] == '[')) {
            $out .= 'array(';
          }
          elseif (($json[$i] == '}') || ($json[$i] == ']')) {
            $out .= ')';
          }
          elseif ($json[$i] == ':') {
            $out .= '=>';
          }
          elseif ($json[$i] == ',') {
            $out .= ',';
          }
          elseif ($json[$i] == '"') {
            $out .= '"';
          }
          elseif (!preg_match('/\s/', $json[$i])) {
            return null;
          }
        }
        else $out .= $json[$i] == '$' ? '\$' : $json[$i];
        if ($json[$i] == '"' && $json[($i-1)] != '\\') $comment = !$comment;
      }
      eval($out. ';');
      return $x;
    }
  }
?>