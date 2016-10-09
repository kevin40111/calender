<?php
	
	if($_GET['request_method']=='get_today'){
		get_today();
	}
	else{

	}


	function get_today(){
		$var = "This day";
		echo $var;

	}
?>