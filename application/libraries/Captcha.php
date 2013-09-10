<?php

class Captcha{
	
	public $size;
	public $session;
	public $chars = 'abcdefghijkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ23456789';

	function randStr(){
		$string = NULL;
		for ($i = 0; $i < $this->size; $i++){
			$pos = rand(0, strlen($this->chars)-1);
			$string .= $this->chars{$pos};
		}
		$CI =& get_instance();
		$CI->session->set_userdata($this->session,$string);
		return $string;
	}

	function display(){
		 $width = 26*$this->size; 
		 $height = 50; 
		 $string = $this->randStr(); 
		 $im = ImageCreate($width, $height); 
		 $imBG = imagecreatefromjpeg(dirname(__FILE__) . "/captcha/images/captcha.jpg");
		 $bg = imagecolorallocate($im, 255, 255, 255); 
		 $black = imagecolorallocate($im, 0, 0, 0); 
		 $grey = imagecolorallocate($im, 170, 170, 170); 
		 imagerectangle($im,0, 0, $width-1, $height-1, $grey); 
		 $font = imageloadfont(dirname(__FILE__) . "/captcha/font/anonymous.gdf");
		 imagestring($im, $font , $this->size, 5, $string, $black);
		 imagecopymerge($im, $imBG, 0, 0, 0, 0, 256, 256, 55);
		 imagepng($im); 
		 imagedestroy($im); 
	}
}
?>