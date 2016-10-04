<!DOCTYPE html>
<html>
<head>
	<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js"></script>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>calender</title>

	
<script type="text/javascript">
		var year=1991,month=1,date=1;

		function post_php_time() {
		  var xhttp = new XMLHttpRequest();
		  xhttp.onreadystatechange = function() {
		    if (this.readyState == 4 && this.status == 200) {
		    	console.log(this.responseText);
		    }
		  };
		  xhttp.open("POST", "index.php", true);
		  xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		  xhttp.send(json_submit());
		}

		function setupSelectBox(){
		
			for(var i=1;i<=12;i++)
			{	
			
			var month = document.createElement("option");
			month.id = "month"+i;
			month.setAttribute("value", i);
    		var txt =  document.createTextNode(i.toString());
    		month.appendChild(txt);
    		if(i==1)month.setAttribute("selected","selected");

			$('#month').append(month);
			}
			
			var month_object = document.getElementsByTagName("option");
			return month_object;
		}

		function json_submit(){
			var time = {
					    year : year,
					    month : month
					  };
			var send_data = JSON.stringify(time);
			
			send_data = "data="+ send_data;
			return send_data;
		}

	$(document).ready(function(){
		month_option = setupSelectBox();

		function get_year(){
			year = parseInt($("#year_input").val());	
		}
		
		//choice year
		$("#year_input").keyup(function(event){
			if(event.keyCode == 13){
				get_year();
				post_php_time();
			}
		});
		//choice month
		$("#month").change(function(){
			month = parseInt($("#month").val());
			get_year()
			post_php_time();
		});

		//choice month next/preview
		$("span").click(function() {
			if(this.id=="nex_month"){
			month++;			
			}
			else if(this.id=="pre_month"){
			month--;
			}
		

			month_option[month-1].selected=true;
			
			post_php_time();
		});
	
		
		var count = 2;
		
		count = count-4;
		for(var i=1;i<=6;i++)
		{	
			var tr = document.createElement("tr");
			for(var j=1;j<=7;j++)
			{	
				var txt =  document.createTextNode(count.toString());
				var td = document.createElement("td");

				if(count>0){
					if(j==6||j==7){
							var sp = document.createElement("span");
							sp.style.color="red";
							sp.appendChild(txt);
							td.appendChild(sp);
					}
					else{
						td.appendChild(txt);
					}
				}

				tr.appendChild(td);
				count++;
			}
			$('#calender').append(tr);
		}
	});



</script>

</head>

<style type="text/css">
	.calender{
		border: 1px solid;
		text-align: center;
	}
	.content{
		width: 450px;
		margin: auto;
	}
	li{    
		vertical-align: middle;
		display: inline-block;
	}
	td{
		padding: 5px;
		border: 1px solid;
	}
	

</style>

<body>
	<div class="content">
	<ul>
			<li>
				<span id= "pre_month" class="glyphicon glyphicon-menu-left";></span>
			</li>
					<li>
						<table class = "calender" id="calender">
						<tr>
							<td>
								<input type="button" value="今天" onclick="showdata()">	
							</td>
							<td colspan="6">
								<b>今天9月20日</b>
							</td>
						</tr>
						<tr>
							<td colspan="4">
								<input id='year_input' value="1992" type="text" style="width:50px">年
							</td>
							<td colspan="3"><select id="month"></select>月</td>
						</tr>
						<tr style="background-color:#d9d9d9;">
							<td>星期一</td>
							<td>星期二</td>
							<td>星期三</td>
							<td>星期四</td>
							<td>星期五</td>
							<td><span style="color:red";>星期六</span></td>
							<td><span style="color:red";>星期天</span></td>
						</tr>
						</table>
					</li>
			<li>
				<span id= "nex_month" class="glyphicon glyphicon-menu-right" ;></span>
			</li>
	</ul>
	</div>

</body>

</html>
