<?php
    $today  =   explode("-",date("Y-m-d H:i:s"));
    $year   =   $today[0];
    $month  =   $today[1];
    $date   =   $today[2];
    $is_today = false;
    if($_GET["year"] == $year && $_GET["month"] == $month)$is_today=true;

    $pre_month  =   date("t",mktime(0,0,1,$_GET["month"]-1,1,$_GET["year"]));
    $start_date =   date("w",mktime(0,0,1,$_GET["month"]  ,1,$_GET["year"]));
    $end_date   =   date("t",mktime(0,0,1,$_GET["month"]  ,1,$_GET["year"]));

    $now_date = 1-$start_date;
    $weeks = ($start_date+$end_date)/7;

?>
    <table id="calender_date">
        <?php for($j=0;$j<$weeks;$j++){?>
            <tr>
                <?php for($i=0;$i<7;$i++){?>
                    <td class="td_date" id=<?php echo($_GET["date"]==$now_date && $is_today) ? ( "today" ) : ( "" );?>>
                    <?php if($i==0||$i==6):?><span class="vacation"><?php endif;?>
                        <?php if(!($now_date>0 && $now_date<=$end_date)):?><i><?php endif;?>
                                <?php
                                    if($now_date<=0){
                                        echo $pre_month+$now_date;
                                    }
                                    else if ($now_date>0 && $now_date<=$end_date) {
                                        echo $now_date;
                                    }
                                    else if ($now_date>$end_date) {
                                        echo $now_date-$end_date;
                                    }
                                ?>
                        <?php if(!($now_date>0 && $now_date<=$end_date)):?></i><?php endif;?>
                    <?php if($i==0||$i==6):?></span><?php endif;?>
                    </td>
                <?php $now_date++;}?>
            </tr>
        <?php }?>
    </table>
