<?php
	$data =  json_decode($_POST["data"]);

	echo  $_POST["data"].date("t",mktime(0,0,0,$data->month,1,$data->year));
?>