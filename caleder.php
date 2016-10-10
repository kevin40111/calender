<?php
	
	if($_GET['request_method']=='get_today'){
		get_today();
	}
	else{
		return_table($_GET['year'],$_GET['month'],0);
	}


	function get_today(){
	$today 	=	explode("-",date("Y-m-d"));
	$year	=	$today[0];
	$month	=	$today[1];
	$date	=	$today[2];

	return_table($year,$month,$date);
	}

	function return_table($year,$month,$date){
	$first_date =	date("w",mktime(0,0,0,$month,1,$year));
	$pre_month 	=	date("t",mktime(0,0,0,$month-1,1,$year));
	$end_date 	=	date("t",mktime(0,0,0,$month,1,$year));
	$calender	=	"";

		if((int)$first_date==0)$first_date=7;
		$now_date=2-(int)$first_date;
		for($i=0;$i<6;$i++){
			$calender=$calender."<tr>";
			for($j=1;$j<=7;$j++){
				//顯示前個月
				if($now_date<1)$calender = $calender."<td><i>".($pre_month+$now_date)."</i></td>";						
				//顯示這個月
				if($now_date>=1&&$now_date<=$end_date)
				if($j==7||$j==6)$calender = $calender."<td><span class='vacation'>".$now_date."</sapn></td>";					
				else $calender = $calender."<td>".$now_date."</td>";	
				//顯示下個月
				if($now_date>$end_date)$calender = $calender."<td><i>".($now_date-$end_date)."</i></td>";
				$now_date++;
			}
			$calender=$calender."</tr>";
			if($now_date>(int)$end_date){
				echo $calender;
				break;		
			}
		}

	}



?>