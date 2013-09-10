<?php 
if ( ! function_exists('mysql_to_th'))
{
	function mysql_to_th($datetime = '',$format = 'S' ,$time = FALSE)
	{
		if($datetime == '0000-00-00' || $datetime=='')return false;
		if($format == 'F')
		{
			$month_th = array( 1 =>'มกราคม',2 => 'กุมภาพันธ์',3=>'มีนาคม',4=>'เมษายน',5=>'พฤษภาคม',6=>'มิถุนายน',7=>'กรกฏาคม',8=>'สิงหาคม',9=>'กันยายน',10=>'ตุลาคม',11=>'พฤศจิกายน',12=>'ธันวาคม');
		}
		else
		{
			$month_th = array( 1 =>'ม.ค.',2 => 'ก.พ.',3=>'มี.ค.',4=>'เม.ย',5=>'พ.ค.',6=>'มิ.ย',7=>'ก.ค.',8=>'ส.ค.',9=>'ก.ย.',10=>'ต.ค.',11=>'พ.ย.',12=>'ธ.ค.');
		}
		
		$datetime = mysql_to_unix($datetime);
		
		$r = date('d', $datetime).' '.$month_th[date('n', $datetime)].' '.(date('Y', $datetime) + 543); 

		if($time)
		{
				$r .= ' - '.date('H', $datetime).':'.date('i', $datetime);
		}
	
		return $r;
	}
}

function DB2Date($Dt){ 
	if(($Dt!=NULL)&&($Dt != '0000-00-00')){
		@list($date,$time) = explode(" ",$Dt);
		list($y,$m,$d) = explode("-",$date);
		return $d."/".$m."/".($y+543);
	}else{
		$Dt = "";
		return $Dt; 
	}
}

function Date2DB($Dt){
	if(($Dt!="")&&($Dt != '0000-00-00')){
		@list($date,$time) = explode(" ",$Dt);
		list($d,$m,$y) = explode("/",$date);
		return ($y-543)."-".$m."-".$d;
	}else{ return $Dt; }
}

function month_th($month)
{
	$month_array = array('มกราคม','กุมภาพันธุ์','มีนาคม','เมษายน','พฤษภาคม','มิถุนายน','กรกฏาคม','สิงหาคม','กันยายน','ตุลาคม','พฤศจิกายน','ธันวาคม');
	return $month_array[$month-1];
}

function year_th($year)
{
	return $year + 543;
}

if ( ! function_exists('mysql_to_relative'))
{
	function mysql_to_relative($timestamp){
		$timestamp = mysql_to_unix($timestamp);
		$difference = time() - $timestamp;
		$periods = array("วินาที", "นาที", "ชั่วโมง", "วัน", "สัปดาห์",
		"เดือน", "ปี", "สิบปี");
		$lengths = array("60","60","24","7","4.35","12","10");
		
		if ($difference > 0) 
		{ // this was in the past
			$ending = "ที่ผ่านมา";
		} 
		else 
		{ // this was in the future
			$difference = -$difference;
			$ending = "to go";
		}
		for($j = 0; $difference >= $lengths[$j]; $j++)
		{
			$difference /= $lengths[$j];
		}
		$difference = round($difference);
		$text = "$difference $periods[$j]$ending";
		return $text;
	}
}

   function datediff($datefrom,$dateto = FALSE)
	{
        $startDate = mysql_to_unix($datefrom);
        $lastDate = ($dateto)?mysql_to_unix($dateto):now();
        $differnce = $startDate - $lastDate;
        $differnce = ($differnce / (60*60*24)); 
        return (int)$differnce;
    }
	  
	function timeDiff($firstTime,$lastTime)
	{
	// convert to unix timestamps
	$firstTime=strtotime($firstTime);
	$lastTime=strtotime($lastTime);
	
	// perform subtraction to get the difference (in seconds) between times
	$timeDiff=$lastTime-$firstTime;
	$timeDiff= ($timeDiff / (60*60*24));
	// return the difference
	return (int)$timeDiff;
	}
	
	//Usage :
	//echo timeDiff("2002-04-16 10:00:00","2002-03-16 18:56:32");
	
	function datetime2date($datetime){
	    $date = explode(" ", $datetime);
        return $date[0];
	}
?>