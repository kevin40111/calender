<!DOCTYPE html>
<html>
<head>
	<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.12.4.min.js"></script>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="ui_css.css">
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>calender</title>




<script type="text/javascript">
var year=1991,month=1;
//callajax("get_today");

function callajax() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    	document.getElementById("return_date").innerHTML = "";
     	document.getElementById("return_date").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET",set_method(), true);
  xhttp.send();
}

function set_today(){
    var Today=new Date();
    year  = Today.getFullYear();
    month = Today.getMonth()+1;
    date  = Today.getDate();
    var showtoday = year+ " 年 "+ month+ " 月 " + date + " 日";
    document.getElementById("year_input").value = year;
    document.getElementsByTagName("option")[month-1].selected = true;
    document.getElementById("show_this_day").innerHTML = showtoday;
    callajax();
}

function set_method(request_method){
		request_method  = "caleder.php?";
		request_method += "year=" +year.toString()+"&";
		request_method += "month="+month.toString()+"&";
		request_method += "date=" +date;
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
        callajax();
}


function month_selected(){
     month = document.getElementById("month_select").value;
     callajax();
}


</script>
</head>
<body onload=set_today()>
    <div class="content">
        <div class="block block_left">
            <span id= "pre_month" class="month_pick glyphicon glyphicon-menu-left"; onclick = "span_month_keyup(this.id)"></span>
        </div>
        <div class="block block_center">
            <table class = "calender">
                <tr>
                    <td>
                        <input class="btn btn-default" type="button" value="今天" onclick="set_today()">
                    </td>
                    <td colspan="6">
                        <b id="show_this_day">今天日期</b>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <input id='year_input' class="btn btn-default" value="1991" type="text" onkeyup="year_keyup()" style="width:70px">年
                    </td>
                    <td colspan="3">
                    <select class="btn btn-default" id="month_select" onchange="month_selected()">
                        <?php for($i=1;$i<=12;$i++):?>
                            <option value="<?php echo $i?>"><?php echo $i?></option>
                        <?php endfor;?>
                    </select>月</td>
                </tr>
                <tr style="background-color:#d9d9d9;">
                    <td><span class ="vacation" >日</span></td>
                    <td>一</td>
                    <td>二</td>
                    <td>三</td>
                    <td>四</td>
                    <td>五</td>
                    <td><span class ="vacation" >六</span></td>
                </tr>
            </table>
            <div id="return_date"></div>
        </div>
        <div class="block block_right">
            <span id= "nex_month" class="month_pick glyphicon glyphicon-menu-right" onclick = "span_month_keyup(this.id)"></span>
        </div>
        <div class="clear"></div>
    </div>
</body>
</html>
