<?php

/** This file is part of KCFinder project
  *
  *      @desc Base configuration file
  *   @package KCFinder
  *   @version 2.2
  *    @author Pavel Tzonkov <pavelc@users.sourceforge.net>
  * @copyright 2010 KCFinder Project
  *   @license http://www.opensource.org/licenses/gpl-2.0.php GPLv2
  *   @license http://www.opensource.org/licenses/lgpl-2.1.php LGPLv2
  *      @link http://kcfinder.sunhater.com
  */

// IMPORTANT!!! Do not remove uncommented settings in this file even if
// you are using session configuration.
// See http://kcfinder.sunhater.com/install for setting descriptions

$_CONFIG = array(

    'disabled' => FALSE,
    'readonly' => FALSE,
    'denyZipDownload' => true,

    'theme' => "oxygen",

    'uploadURL' => "../../uploads",
    'uploadDir' => "../../uploads",

    'dirPerms' => 0755,
    'filePerms' => 0644,

    'deniedExts' => "exe com msi bat php cgi pl",

    'types' => array(

        // CKEditor & FCKEditor types
        'files'   =>  "",
        'flash'   =>  "swf",
        'images'  =>  "*img",
		
		// Custom types 
		'pdf'  =>  "pdf xls xlsx doc docx",
		'mediafiles'  =>  "mp3 mp4 flv",
		'mediapublics'  =>  "",
		'english_zones'  =>  "",
		'mediapublics_image'  =>  "*img",
		'academics'  =>  "",
		'academics_image'  =>  "*img",
		'newsletter_attachment' =>  "",
		'coverpage' =>  "",
		'document' =>  "",
		'stat' =>  "",
		'galleries' => "",
		'info' => "",
		'province' =>"",
		'pm' =>"",
		'organization' => "",
		'vdo' => "",
        
		// TinyMCE types
        'file'    =>  "",
        'media'   =>  "swf flv avi mpg mpeg qt mov wmv asf rm mp3",
        'image'   =>  "*img",
    ),

    'mime_magic' => "",

    'maxImageWidth' => 0,
    'maxImageHeight' => 0,

    'thumbWidth' => 100,
    'thumbHeight' => 100,

    'thumbsDir' => ".thumbs",

    'jpegQuality' => 90,

    'cookieDomain' => "",
    'cookiePath' => "",
    'cookiePrefix' => 'KCFINDER_',

    // THE FOLLOWING SETTINGS CANNOT BE OVERRIDED WITH SESSION CONFIGURATION

    '_check4htaccess' => true,
    '_tinyMCEPath' => "../tiny_mce",

    '_sessionVar' => &$_SESSION['KCFINDER'],
    //'_sessionLifetime' => 30,
    //'_sessionDir' => "/full/directory/path",

    //'_sessionDomain' => ".mysite.com",
    //'_sessionPath' => "/",
);

?>