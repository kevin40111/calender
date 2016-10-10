<!DOCTYPE html>
<html>
<head>
	<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js"></script>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>calender</title>

	
<script type="text/javascript">
var year=1991,month=1;
callajax("get_today");
function callajax(request_method) {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	document.getElementById("calender").innerHTML = "";
     	document.getElementById("calender").innerHTML = this.responseText;
   	
    }
  };
  xhttp.open("GET",set_method(request_method), true);
  xhttp.send();
}

function set_today(){
	var Today=new Date();
	var showtoday = Today.getFullYear()+ " 年 " + (Today.getMonth()+1) + " 月 " + Today.getDate() + " 日";
	document.getElementById("show_this_day").innerHTML = showtoday;

}

function set_method(request_method){
	var request_method;
	if(request_method=="get_today"){
		request_method = "caleder.php?request_method=get_today";
	}
	else{
		request_method = "caleder.php?request_method=set_date&";
		request_method = request_method+"year="+year.toString()+"&";
		request_method = request_method+"month="+month.toString();
	}
	return request_method;
}

function year_keyup(){
	if(event.keyCode == 13){
		var input_data = document.getElementById('year_input').value;
		year = parseInt(input_data);

		if(!isNaN(input_data)&&year>0){
			callajax("set_method");
			
		}
		else{
			alert("input errot");
		}
	}
}

function span_month_keyup(clicked_id){
	switch(clicked_id) {
			case "pre_month":
				month--;
				if(month==0){
					year--;
					month=12;
				}
				break;
			case "nex_month":
				month++;
				if(month==13){
					year++;
					month=1;
				}
				break;
			default:
				year=1991;
				month=1;
				break;
		}

		document.getElementsByTagName("option")[month-1].selected = true;
		document.getElementById('year_input').value = year;
		callajax("set_method");
}

function month_selected(){
	var value = document.getElementById("month_select").value;
	month  = value;
}


</script>

</head>

<style type="text/css">
	.vacation{
		color:red;

	}

	.calender{
		border: 1px solid;
		text-align: center;
	}

	
	.content{
		font-size: 20px;
		width: 800px;
		margin: auto;
	}
	li{    
		vertical-align: middle;
		display: inline-block;
	}
	td{
		width:80px;
		padding: 5px;
		border: 1px solid;
	}
	
	i{
		color:rgba(128, 128, 128, 0.56);
	}
	.vacation{
		color: red;

	}

</style>

<body onload=set_today()>
	<div class="content">
	<ul>
			<li>
				<span id= "pre_month" class="glyphicon glyphicon-menu-left"; onclick = "span_month_keyup(this.id)"></span>
			</li>
					<li>
						<table class = "calender">
						<tr>
							<td>
								<input type="button" value="今天" onclick="callajax('get_today')">	
							</td>
							<td colspan="6">
								<b id="show_this_day">今天日期</b>
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<input id='year_input' value="1991" type="text" onkeyup="year_keyup()" style="width:70px">年
							</td>
							<td colspan="3">
							<select id="month_select" onchange="month_selected()">
								<option vakue=1>1</option>
								<option vakue=2>2</option>
								<option vakue=3>3</option>
								<option vakue=4>4</option>
								<option vakue=5>5</option>
								<option vakue=6>6</option>
								<option vakue=7>7</option>
								<option vakue=8>8</option>
								<option vakue=9>9</option>
								<option vakue=10>10</option>
								<option vakue=11>11</option>
								<option vakue=12>12</option>				
							</select>月</td>
						</tr>
						<tr style="background-color:#d9d9d9;">
							<td>一</td>
							<td>二</td>
							<td>三</td>
							<td>四</td>
							<td>五</td>
							<td><span class ="vacation" >六</span></td>
							<td><span class ="vacation" >日</span></td>
						</tr>
						<table class = "calender" id="calender">
						</table>
					</li>
			<li>
				<span id= "nex_month" class="glyphicon glyphicon-menu-right" onclick = "span_month_keyup(this.id)"></span>
			</li>
	</ul>
	</div>
</body>
</html>
