 <?php
$daily_date=date('Y-m-d');
$today_date=date('Y-m-d');
$current_weight="0";
$current_waist="0";
$current_arms="0";
$current_hips="0";



if(isset($_GET['patient_id'])){
	//$patient_id=$converter->decode($_GET['patient_id']);

	if(is_numeric($_GET['patient_id']))
	{
		$patient_id=$_GET['patient_id'];
	}
	else
	{
		$patient_id=$converter->decode($_GET['patient_id']);

	}
	/// for setting sesstion for user in iframe
	
	
}
else
{
	$patient_id=$_SESSION['UserID'];

}

//echo $_GET['patient_id'];
$actual_physical=GetValue("SELECT sum(min) as col FROM  ".Exercise." where user_id=".$_SESSION['UserID']." and date='$daily_date' ", "col"); 
$target_physical=GetValue("SELECT sum(workouts*minutes) as col FROM  tbl_calorie_consumed where user_id=".$_SESSION['UserID'], "col"); 

//Alert ($actual_physical);


if($actual_physical=="")
{
	$actual_physical="0";
}

if($target_physical=="")
{
	$target_physical="0";
}


$physical_date= GetValue("SELECT date as col FROM  ".Exercise." where user_id=".$_SESSION['UserID']." and date='$daily_date' limit 1", "col"); 
if($physical_date=="")
{
	$physical_date=date('d-M-Y');
}


//$actual_cal_consumed=GetValue("SELECT sum(calorie_consumed_day) as col FROM  tbl_calorie_consumed where user_id=".$_SESSION['UserID']." and date='$daily_date'", "col"); 
//Alert ($actual_cal_consumed);



$diet_count = GetValue("SELECT sum(energy*qty) as col FROM  ".Food." where user_id=".$_SESSION['UserID']." and date='$daily_date' ", "col"); 
$excercise_count = GetValue("SELECT sum(eng_cal) as col FROM  ".Exercise." where user_id=".$_SESSION['UserID']." and date='$daily_date' ", "col"); 
///echo "SELECT sum(energy*qty) as col FROM  ".Food." where user_id=".$_SESSION['UserID']." and date='$daily_date'";
//Alert ($diet_count);
//Alert ($excercise_count);

$net_count=$diet_count-$excercise_count;
$actual_cal_consumed=$diet_count;
$actual_cal_burned=$excercise_count;


///$actual_cal_consumed=number_format($actual_cal_consumed,0);

if($actual_cal_consumed=="")
{
	$actual_cal_consumed="0";

}

if($actual_cal_burned=="")
{
	$actual_cal_burned="0";
}






$target_cal_burned=GetValue("SELECT calorie_consumed_day as col FROM  tbl_calorie_consumed where user_id=".$_SESSION['UserID'], "col"); 

if($target_cal_burned=="")
{
	$target_cal_burned="0";
}

///$target_cal_burned=number_format($target_cal_burned,0);


$target_date=GetValue("SELECT updated_date as col FROM  tbl_calorie where user_id=".$_SESSION['UserID'], "col"); 

if($target_date=="")
{
	$target_date=date('d-M-Y');
}
	


$current_goal= GetValue("SELECT goal_wgt as col FROM  ".Calorie." where user_id=".$_SESSION['UserID']."", "col"); 
$target_goal=GetValue("SELECT calorie_consumed_day as col FROM  ".Calorie_Consumed." where user_id=".$_SESSION['UserID']."", "col"); 
$goal=$target_goal;

//$actual_cal_consumed=$goal-$net_count;

$target_cal_consumed=GetValue("SELECT net_calorie_consumed as col FROM  tbl_calorie_consumed where user_id=".$_SESSION['UserID'], "col"); 
if($target_cal_consumed=="")
{
	$target_cal_consumed="0";
}
//$target_cal_consumed=number_format($target_cal_consumed,0);


$last_word_end = strlen($target_cal_consumed) - 1;
$last_word_end = substr($target_cal_consumed,$last_word_end, 1);

if($last_word_end  > 0)
{
	$last_word_end =10-$last_word_end;					
	$target_cal_consumed=$target_cal_consumed+$last_word_end;
}

///$target_cal_consumed=number_format($target_cal_consumed,0);

$calorie_balance_actual=($actual_cal_consumed-$actual_cal_burned);

$calorie_balance_target=($target_cal_consumed-$target_cal_burned);


$last_word_end = strlen($calorie_balance_target) - 1;
	$last_word_end = substr($calorie_balance_target,$last_word_end, 1);
	
	if($last_word_end  > 0)
	{
		$last_word_end =10-$last_word_end;					
		$calorie_balance_target=$calorie_balance_target+$last_word_end;
	}



$target_weight= GetValue("SELECT goal_wgt as col FROM  ".Calorie." where user_id=".$_SESSION['UserID']." order by calorie_id desc limit 1", "col"); 
$current_weight= GetValue("SELECT curr_wgt as col FROM  ".Calorie_Det." where user_id=".$_SESSION['UserID']." and weight_date='".$today_date."' limit 1", "col"); 
if($target_weight=="")
{
	$target_weight="0";
}

if($current_weight=="")
{
	$current_weight= GetValue("SELECT curr_wgt as col FROM  ".Calorie_Det." where user_id=".$_SESSION['UserID']." and curr_wgt<> '' order by id desc limit 1", "col"); 
	if($current_weight=="")
	{
		$current_weight="0";
	}
}

$current_data_date= GetValue("SELECT updated_date as col FROM  ".Calorie_Det." where user_id=".$_SESSION['UserID']."  and curr_wgt=".$current_weight." limit 1", "col"); 


if($current_data_date=="")
{
	$current_data_date=date('d-M-Y');
}
	

$target_waist= GetValue("SELECT goal_waist as col FROM  ".Calorie_Det." where user_id=".$_SESSION['UserID']."  and ismain=1 limit 1", "col"); 
$current_waist= GetValue("SELECT current_waist as col FROM  ".Calorie_Det." where user_id=".$_SESSION['UserID']."  and waist_date='".$today_date."' limit 1", "col");

if($target_waist=="")
{
	$target_waist="0";
}

if($current_waist=="")
{
	$current_waist= GetValue("SELECT current_waist as col FROM  ".Calorie_Det." where user_id=".$_SESSION['UserID']." and current_waist<> '' order by id desc limit 1", "col");
	if($current_waist=="")
	{
		$current_waist="0";
	}
}
$current_data_date= GetValue("SELECT updated_date as col FROM  ".Calorie_Det." where user_id=".$_SESSION['UserID']."  and current_waist=".$current_waist." limit 1", "col");

if($current_data_date=="")
{
	$current_data_date=date('d-M-Y');
}
	


$target_arms= GetValue("SELECT goal_arms as col FROM  ".Calorie_Det." where user_id=".$_SESSION['UserID']."  and ismain=1 limit 1", "col"); 

$current_arms= GetValue("SELECT current_arm as col FROM  ".Calorie_Det." where user_id=".$_SESSION['UserID']."  and arms_date='".$today_date."' limit 1", "col"); 
if($target_arms=="")
{
	$target_arms="0";
}
if($current_arms=="")
{
	$current_arms= GetValue("SELECT current_arm as col FROM  ".Calorie_Det." where user_id=".$_SESSION['UserID']." and current_arm <>'' order by id desc limit 1", "col"); 
	if($current_arms=="")
	{
		$current_arms="0";
	}
}
$current_data_date= GetValue("SELECT updated_date as col FROM  ".Calorie_Det." where user_id=".$_SESSION['UserID']."  and current_arm=".$current_arms." limit 1", "col");


if($current_data_date=="")
{
	$current_data_date=date('d-M-Y');
}
	



$target_hips= GetValue("SELECT goal_hips as col FROM  ".Calorie_Det." where user_id=".$_SESSION['UserID']."  and ismain=1 limit 1", "col"); 
$current_hips= GetValue("SELECT current_hips as col FROM  ".Calorie_Det." where user_id=".$_SESSION['UserID']." and hips_date='".$today_date."' limit 1", "col"); 

if($target_hips=="")
{
	$target_hips="0";
}
if($current_hips=="")
{
	$current_hips= GetValue("SELECT current_hips as col FROM  ".Calorie_Det." where user_id=".$_SESSION['UserID']." and current_hips <>'' order by id desc limit 1", "col"); 
	if($current_hips=="")
	{
		$current_hips="0";
	}
}
$current_data_date= GetValue("SELECT updated_date as col FROM  ".Calorie_Det." where user_id=".$_SESSION['UserID']."  and current_hips=".$current_hips." limit 1", "col");

if($current_data_date=="")
{
	$current_data_date=date('d-M-Y');
}
	


$today_date=date('Y-m-d');


$actual_sleep=GetValue("SELECT life_style_sleep as col FROM  tbl_life_style where user_id=".$_SESSION['UserID']." and isdeleted=0 and life_style_date='".$today_date."' order by life_style_date", "col"); 




$target_sleep=GetValue("SELECT life_style_sleep_goal as col FROM  tbl_life_style where user_id=".$_SESSION['UserID']." and isdeleted=0 order by life_style_id desc limit 1", "col"); 
//echo "SELECT life_style_sleep_goal as col FROM  tbl_life_style where user_id=".$_SESSION['UserID']." and isdeleted=0 order by life_style_id desc limit 1";

$target_sleep=round($target_sleep,2);

////Alert($target_sleep);

if($target_sleep=="")
{
	$target_sleep="0";
}



if($actual_sleep=="")
{
	$actual_sleep="0";
}



$actual_cal_consumed=number_format($actual_cal_consumed,0);
$target_cal_consumed=number_format($target_cal_consumed,0);


$actual_cal_burned=number_format($actual_cal_burned,0);
$target_cal_burned=number_format($target_cal_burned,0);


$calorie_balance_target=number_format($calorie_balance_target,0);
$calorie_balance_actual=number_format($calorie_balance_actual,0);

$current_weight=number_format($current_weight,0);
$target_weight=number_format($target_weight,0);

?>
<script type="text/javascript">
$(function () {
	$('#Cal_Burned_Chart').highcharts({
		chart: {type: 'bar',height:'41',margin: 0,backgroundColor:'transparent',},
		title:{text:''},	
		xAxis: {labels: {enabled: true},title: {enabled: true,}},
		yAxis: {gridLineWidth: 0,min: 0,title: {text: '',align: ''},labels: {overflow: 'justify'}},
		plotOptions: {bar: {pointWidth:12,dataLabels: {enabled: true},  enableMouseTracking: false}},            
		series: [{showInLegend: false,color: '#99cc00',data: [<?php echo str_replace(",","",$actual_cal_burned)?>,<?php echo  str_replace(",","",$target_cal_burned)?>]}]
	});
});

$(function () {
	$('#Cal_Consumed_Chart').highcharts({
		chart: {type: 'bar',height:'41',margin: 0,backgroundColor:'transparent',},
		title:{text:''},
		xAxis: {labels: {enabled: true},title: {enabled: true,}},
		yAxis: {gridLineWidth: 0,min: 0,title: {text: '',align: ''},labels: {overflow: 'justify'}},
		plotOptions: {bar: {pointWidth:12,dataLabels: {enabled: true},  enableMouseTracking: false}},            
		series: [{showInLegend: false,color: '#99cc00',data: [<?php echo  str_replace(",","",$actual_cal_consumed)?>, <?php echo  str_replace(",","",$target_cal_consumed)?>]}]
	});
});

$(function () {
	$('#Cal_Physical_Chart').highcharts({
		chart: {type: 'bar',height:'54',margin: 0,backgroundColor:'transparent',},
		title:{text:''},
		xAxis: {labels: {enabled: true},title: {enabled: true,}},
		yAxis: {gridLineWidth: 0,min: 0,title: {text: '',align: ''},labels: {overflow: 'justify'}},
		plotOptions: {bar: {pointWidth:12,dataLabels: {enabled: true},  enableMouseTracking: false}},            
		series: [{showInLegend: false,color: '#99cc00',data: [<?php echo  str_replace(",","",$actual_physical)?>, <?php echo  str_replace(",","",$target_physical)?>]}]
	});
});
$(function () {
	$('#Cal_Weight_Chart').highcharts({
		chart: {type: 'bar',height:'54',margin: 0,backgroundColor:'transparent',},
		title:{text:''},
		xAxis: {labels: {enabled: true},title: {enabled: true,}},
		yAxis: {gridLineWidth: 0,min: 0,title: {text: '',align: ''},labels: {overflow: 'justify'}},
		plotOptions: {bar: {pointWidth:12,dataLabels: {enabled: true},  enableMouseTracking: false}},            
		series: [{showInLegend: false,color: '#99cc00',data: [<?php echo  str_replace(",","",$current_weight)?>, <?php echo  str_replace(",","",$target_weight)?>]}]
	});
});



$(function () {
	$('#Cal_Sleep_Chart').highcharts({
		chart: {type: 'bar',height:'41',margin: 0,backgroundColor:'transparent',},
		title:{text:''},
		xAxis: {labels: {enabled: true},title: {enabled: true,}},
		yAxis: {gridLineWidth: 0,min: 0,title: {text: '',align: ''},labels: {overflow: 'justify'}},
		plotOptions: {bar: {pointWidth:12,dataLabels: {enabled: true},  enableMouseTracking: false}},            
		series: [{showInLegend: false,color: '#99cc00',data: [<?php echo  str_replace(",","",$actual_sleep)?>, <?php echo  str_replace(",","",$target_sleep)?>]}]
	});
});



$(function () {
	$('#Cal_Waist_Chart').highcharts({
		chart: {type: 'bar',height:'54',margin: 0,backgroundColor:'transparent',},
		title:{text:''},
		xAxis: {labels: {enabled: true},title: {enabled: true,}},
		yAxis: {gridLineWidth: 0,min: 0,title: {text: '',align: ''},labels: {overflow: 'justify'}},
		plotOptions: {bar: {pointWidth:12,dataLabels: {enabled: true},  enableMouseTracking: false}},            
		series: [{showInLegend: false,color: '#99cc00',data: [<?php echo  str_replace(",","",$current_waist)?>, <?php echo  str_replace(",","",$target_waist)?>]}]
	});
});

$(function () {
	$('#Cal_Hips_Chart').highcharts({
		chart: {type: 'bar',height:'54',margin: 0,backgroundColor:'transparent',},
		title:{text:''},
		xAxis: {labels: {enabled: true},title: {enabled: true,}},
		yAxis: {gridLineWidth: 0,min: 0,title: {text: '',align: ''},labels: {overflow: 'justify'}},
		plotOptions: {bar: {pointWidth:12,dataLabels: {enabled: true},  enableMouseTracking: false}},            
		series: [{showInLegend: false,color: '#99cc00',data: [<?php echo  str_replace(",","",$current_hips)?>, <?php echo  str_replace(",","",$target_hips)?>]}]
	});
});

$(function () {
	$('#Cal_Arms_Chart').highcharts({
		chart: {type: 'bar',height:'54',margin: 0,backgroundColor:'transparent',},
		title:{text:''},
		xAxis: {labels: {enabled: true},title: {enabled: true,}},
		yAxis: {gridLineWidth: 0,min: 0,title: {text: '',align: ''},labels: {overflow: 'justify'}},
		plotOptions: {bar: {pointWidth:12,dataLabels: {enabled: true},  enableMouseTracking: false}},            
		series: [{showInLegend: false,color: '#99cc00',data: [<?php echo  str_replace(",","",$current_arms)?>, <?php echo  str_replace(",","",$target_arms)?>]}]
	});
});
function ChangeSize()
{
	
	document.getElementById("Cal_Weight_Chart").style.display="none";
	document.getElementById("Cal_Waist_Chart").style.display="none";
	document.getElementById("Cal_Hips_Chart").style.display="none";
	document.getElementById("Cal_Arms_Chart").style.display="none";

	if (document.getElementById("ddlWeight").value == "Weight")
	{
		document.getElementById("DvTargetWeight").style.display='';
		document.getElementById("DvActualWeight").style.display="";
		document.getElementById("Cal_Weight_Chart").style.display="";
		document.getElementById("DvTargetWaist").style.display="none";
		document.getElementById("DvActualWaist").style.display="none";
		document.getElementById("DvTargetArms").style.display="none";
		document.getElementById("DvActualArms").style.display="none";
		document.getElementById("DvTargetHips").style.display="none";
		document.getElementById("DvActualHips").style.display="none";
	}
	else if (document.getElementById("ddlWeight").value == "Waist")
	{
		document.getElementById("DvTargetWeight").style.display='none';
		document.getElementById("DvActualWeight").style.display="none";
		document.getElementById("DvTargetWaist").style.display="";
		document.getElementById("DvActualWaist").style.display="";
		document.getElementById("DvTargetArms").style.display="none";
		document.getElementById("DvActualArms").style.display="none";
		document.getElementById("DvTargetHips").style.display="none";
		document.getElementById("DvActualHips").style.display="none";

		document.getElementById("Cal_Waist_Chart").style.display="";
	 
	}
	else if (document.getElementById("ddlWeight").value == "Arms")
	{
		document.getElementById("DvTargetWeight").style.display="none";
		document.getElementById("DvActualWeight").style.display="none";
		document.getElementById("DvTargetWaist").style.display="none";
		document.getElementById("DvActualWaist").style.display="none";
		document.getElementById("DvTargetArms").style.display="";
		document.getElementById("DvActualArms").style.display="";
		document.getElementById("DvTargetHips").style.display="none";
		document.getElementById("DvActualHips").style.display="none";		 
	document.getElementById("Cal_Arms_Chart").style.display="";
	}
	else if (document.getElementById("ddlWeight").value == "Hips")
	{
		document.getElementById("DvTargetWeight").style.display='none';
		document.getElementById("DvActualWeight").style.display="none";
		document.getElementById("DvTargetWaist").style.display="none";
		document.getElementById("DvActualWaist").style.display="none";
		document.getElementById("DvTargetArms").style.display="none";
		document.getElementById("DvActualArms").style.display="none";
		document.getElementById("DvTargetHips").style.display="";
		document.getElementById("DvActualHips").style.display="";		
	document.getElementById("Cal_Hips_Chart").style.display="";
	
	}
	
}
</script>

<div class="DvFloat">
              <div class="DvFloat" style="padding-top:10px;">
                <div style="width: 49%; float: left;"><span class="f_green" style="font-size: 18px; font-weight: bold;">Calorie Counter</span></div>
                <div style="width: 51%; float: left; text-align: right;"><!--<img src="images/shair_icon.gif" alt="" title="" border="0" style="border: solid 0px #000000;">--></div>
              </div>
              <div class="DvFloat" style="padding: 15px 0px; border-bottom: solid 1px #c5c5c5;">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td style="width: 33px; background-color: #fff; padding: 10px 0px 5px 0px; text-align: center;">&nbsp;</td>
                    <td class="nutri_sep"></td>
                    <td style="width: 159px; background-color: #fff; padding: 0px 0px 5px 15px; text-align: left; font-size: 14px; color: #656565; vertical-align: middle;">&nbsp;</td>
                    <td class="nutri_sep"></td>
                    <td style="width: 141px; background-color: #f0f0f0; border-top: solid 1px #666666; border-left: solid 1px #666666; border-right: solid 1px #666666; background-color: #656565; color: #FFFFFF; font-size: 11px; text-transform: uppercase; text-align: center;">TARGET</td>
                    <td class="nutri_sep"></td>
                    <td style="width: 121px; background-color: #f0f0f0; border-top: solid 1px #666666; border-left: solid 1px #666666; border-right: solid 1px #666666; background-color: #656565; color: #FFFFFF; font-size: 11px; text-transform: uppercase; text-align: center;">ACTUALS</td>
                    <td class="nutri_sep"></td>
                    <td style="width: 321px; background-color: #fff;">&nbsp;</td>
                  </tr>
                  <tr>
                    <td class="nutri_caloriecount_box1 comment_hover" style="border:solid 0px green;">
                    	
                        
                        
                      
                            
                            
                            
                          
                           			 
                                  <?php 
                                         $retrive_Array_1=$get_retrive->GetCalCounter_Date($patient_id,$daily_date); {
                                         $cal_burn_cmt=GetValue("select comment as col from tbl_nutritionist_cal_comm where patient_id=".$patient_id." and record_date='".$daily_date."'", "col"); 
                                    ?>
                                      <span style="margin-top:-76px; display: <?php if($cal_burn_cmt=="") { echo "none";} else { "";}?>;">
                                    <div class="DvFloat" style="padding:10px; width:98%; height:55px;">
                                        <?php if($cal_burn_cmt=="")	{ echo "No Comments Available."; } else { echo $cal_burn_cmt; }?>
                                    </div>
                                       </span>
                                    <?php } ?>
                                    
                                      <div class="DvFloat" style="padding:10px; width:98%; text-align:right; display:none;">
                                      		<a onclick="">View all</a>
                                      </div>
                                    
                        
                            
                            <?php if($cal_burn_cmt=="")	{ ?>
                             
									<img src="images/nutritionist/grey_chat_icon.png" alt="" title="" border="0">
							  
                             <?php } else { ?>
                        			 <a href="#" class="" style="border:solid 0px red;">
									<img src="images/nutritionist/green_chat_icon.png" alt="" title="" border="0">
							  </a> 
                        	 <?php }  ?>
                   
                    </td>
                    <td class="nutri_sep"></td>
                    <td class="nutri_caloriecount_box2">Calories Burned </td>
                    <td class="nutri_sep"></td>
                    <td class="nutri_caloriecount_box3">
                    <table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td style="width: 65%; text-align: center; line-height: 14px;"><span style="font-size: 16px;"><?php echo $target_cal_burned;?></span><br>
                            <span style="font-size: 10px;">Calories</span></td>
                          <td style="width: 35%; text-align: center; vertical-align:top"><img src="images/nutritionist/calories_burned_icon.png" alt="" title="" border="0"></td>
                        </tr>
                      </table></td>
                    <td class="nutri_sep"></td>
                    <td class="nutri_caloriecount_box4" style="text-align: center; line-height: 14px;"><span style="font-size: 16px; text-align: center; "><?php echo $actual_cal_burned;?></span><br>
                      <span style="font-size: 10px;">Calories</span></td>
                    <td class="nutri_sep"></td>
                    <td class="nutri_caloriecount_box5" style="border: solid 0px #0033FF;">
                        <div style="width: 315px; height: 41px; float: left; background-image: url(<?php echo $strHostName;?>/images/nutritionist/grey_line.png); background-repeat: repeat; padding: 0px; border: solid 0px #000000;" id="Cal_Burned_Chart">
						 </div>
                      </td>
                  </tr>
                  <tr>
                    <td colspan="8" style="background-color: #FFFFFF; height: 4px;"></td>
                  </tr>
                  <tr>
                  
                  <td class="nutri_caloriecount_box1 comment_hover" style="border:solid 0px green;">
                    		
                         
                            
                           			 
                                  <?php 
						   		$retrive_Array_1=$get_retrive->GetCalCounter_Date($patient_id,$daily_date); {
						  		 
								 //$cal_burn_cmt=GetValue("select comment as col from tbl_nutritionist_cal_comm where patient_id=".$patient_id." and record_date='".$daily_date."'", "col"); 
								$cons_comment=GetValue("select cons_comment as col from tbl_nutritionist_cal_comm where patient_id=".$patient_id." and record_date='".$daily_date."'", "col"); 
						    ?>
                        	 <span style="margin-top:-76px; display: <?php if($cons_comment=="") { echo "none";} else { "";}?>;">   
                            <div class="DvFloat" style="padding:10px; width:98%;">
                           		<?php if($cons_comment=="")	{ echo "No Comments Available."; } else { echo $cons_comment; }?>
                           </div>
                    		  </span>
							<?php } ?>
                          
                            
							 <?php if($cons_comment=="")	{ ?>
                             
									<img src="images/nutritionist/grey_chat_icon.png" alt="" title="" border="0">
							  
                             <?php } else { ?>
                        			 <a href="#" class="" style="border:solid 0px red;">
									<img src="images/nutritionist/green_chat_icon.png" alt="" title="" border="0">
							  </a> 
                        	 <?php }  ?>
                     </td>
                    
                    
                    
                   
                    <td class="nutri_sep"></td>
                    <td class="nutri_caloriecount_box2">Calories Consumed </td>
                    <td class="nutri_sep"></td>
                    <td class="nutri_caloriecount_box3"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td style="width: 65%; text-align: center; line-height: 14px;"><span style="font-size: 16px;">
						  
						  
						  <?php echo $target_cal_consumed;?></span><br>
                            <span style="font-size: 10px;">Calories</span></td>
                          <td style="width: 35%; text-align: center; vertical-align:top"><img src="images/nutritionist/calories_consumed_icon.png" alt="" title="" border="0"></td>
                        </tr>
                      </table></td>
                    <td class="nutri_sep"></td>
                    <td class="nutri_caloriecount_box4" style="text-align: center; line-height: 14px;"><span style="font-size: 16px; text-align: center; "><?php echo $actual_cal_consumed;?></span><br>
                      <span style="font-size: 10px;">Calories</span></td>
                    <td class="nutri_sep"></td>
                    <td class="nutri_caloriecount_box5">
                   
                        <div style="width: 315px; height: 41px; float: left; background-image: url(<?php echo $strHostName;?>/images/nutritionist/grey_line.png); background-repeat: repeat; padding: 0px; border: solid 0px #000000;" id="Cal_Consumed_Chart">
						 </div>
                      </td>
                  </tr>
                  <tr>
                    <td colspan="8" style="background-color: #FFFFFF; height: 4px;"></td>
                  </tr>
                  
                  <tr>
                  
                  <td class="nutri_caloriecount_box1 comment_hover" style="border:solid 0px green;">
                    		<a href="#" class="" style="border:solid 0px red; cursor:text">
							<img src="images/nutritionist/grey_chat_icon.png" alt="" title="" border="0">
							
                           </a> 
                            
                           
                     </td>
                    
                    
                    
                    
                    
                   
                    <td class="nutri_sep"></td>
                    <td class="nutri_caloriecount_box2">Calories Balance </td>
                    <td class="nutri_sep"></td>
                    <td class="nutri_caloriecount_box3"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td style="width: 65%; text-align: center; line-height: 14px;"><span style="font-size: 16px;">
						   
						  <?php echo $calorie_balance_target;?></span><br>
                            <span style="font-size: 10px;">
                            			<?php if($target_cal_consumed > $target_cal_burned) { ?>
                            				 Calorie surplus
                            			<?php } else { ?>
                                        	Calorie deficit
                                        <?php } ?>
                            
                            
                            </span></td>
                          <td style="width: 35%; text-align: center; vertical-align:top">&nbsp;<!--<img src="images/nutritionist/calories_consumed_icon.png" alt="" title="" border="0">--></td>
                        </tr>
                      </table></td>
                    <td class="nutri_sep"></td>
                    <td class="nutri_caloriecount_box4" style="text-align: center; line-height: 14px;"><span style="font-size: 16px; text-align: center; "><?php echo  $calorie_balance_actual;?></span><br>
                      <span style="font-size: 10px;">
                      				<?php if($actual_cal_consumed > $actual_cal_burned) { ?>
                            				 Calorie surplus
                            			<?php } else { ?>
                                        	Calorie deficit
                                        <?php } ?>
                            
                      
                      </span></td>
                    <td class="nutri_sep"></td>
                    <td class="nutri_caloriecount_box5">
                   
                        <div style="width: 315px; height: 38px; float: left;  display:none; background-image: url(<?php echo $strHostName;?>/images/nutritionist/grey_line.png); background-repeat: repeat; padding: 0px; border: solid 0px #000000;" id="Cal_Consumed_Chart">
						 </div>
                      </td>
                  </tr>
                  <tr>
                    <td colspan="8" style="background-color: #FFFFFF; height: 4px;"></td>
                  </tr>
                  <tr>
                  
                     <td class="nutri_caloriecount_box1 comment_hover" style="border:solid 0px green;">
                    	
                            
                           
                           			 
                                 <?php 
						   		$retrive_Array_1=$get_retrive->GetCalCounter_Date($patient_id,$daily_date); {
						  		$physical_comment=GetValue("select physical_comment as col from tbl_nutritionist_cal_comm where patient_id=".$patient_id." and record_date='".$daily_date."'", "col"); 
						    ?>
                              <span style="margin-top:-76px; display: <?php if($physical_comment=="") { echo "none";} else { "";}?>;">   
                        	<div class="DvFloat" style="padding:10px; width:98%;">
                           		<?php if($physical_comment=="")	{ echo "No Comments Available."; } else { echo $physical_comment; }?>
                           </div>
                    		</span>
							<?php } ?>
                            
                             <?php if($physical_comment=="")	{ ?>
                             
									<img src="images/nutritionist/grey_chat_icon.png" alt="" title="" border="0">
							  
                             <?php } else { ?>
                        			 <a href="#" class="" style="border:solid 0px red;">
									<img src="images/nutritionist/green_chat_icon.png" alt="" title="" border="0">
							  </a> 
                        	 <?php }  ?>
                     </td>
                     
                     
                    
                    <td class="nutri_sep"></td>
                    <td class="nutri_caloriecount_box2">Physical Activity </td>
                    <td class="nutri_sep"></td>
                    <td class="nutri_caloriecount_box3"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                        <td style="padding: 0px; width: 141px;">
                            <table width="108%" cellpadding="0" cellspacing="0" border="0">
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="width: 65%; text-align: center; line-height: 10px;">
                                                    <span style="font-size: 16px;">
                                                            
                                                            <?php 
                                                                $total_minutes=$target_physical;
                                                                $hours =  floor($total_minutes/60); 
                                                                $mins =   floor($total_minutes % 60); 
                                                                
                                                                echo  "".$hours.":".$mins.""; 
                                                            ?>
                                                            
                                                          </span><br>
                                                    <span style="font-size: 10px;">HH:MM</span><br />
                                                </td>
                                                <td style="width: 35%; text-align: center; vertical-align:top"><img src="images/nutritionist/physical_activity_icon.png" alt="" title="" border="0"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                                            <tr>
                                    <td colspan="2" style="text-align: center; line-height: 10px; border-top:solid 1px #acacac; padding:0px; font-size:10px;"><span style="font-size: 10px;">Weekly</span></td>
                                    <td style="text-align:center; border-top:solid 1px #acacac; padding:2px 0px; font-size:10px;"><span style="font-size: 10px;">&nbsp;</span></td>
                                    </tr></table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        

                          <!--<td style="width: 65%; text-align: center; line-height: 14px;">
                          	<span style="font-size: 16px;">
                          	
                            <?php /*?><?php 
								$total_minutes=$target_physical;
								$hours =  floor($total_minutes/60); 
								$mins =   floor($total_minutes % 60); 
								
								echo  "".$hours.":".$mins.""; 
							?><?php */?>
                            
                            
                          </span><br>
                             <span style="font-size: 10px;">HH:MM</span><br />
                             <span style="font-size: 10px;">Weekly</span>
                            </td>
                          <td style="width: 35%; text-align: center; vertical-align:top"><img src="images/nutritionist/physical_activity_icon.png" alt="" title="" border="0"></td>-->
                        </tr>
                      </table></td>
                    <td class="nutri_sep"></td>
                    <td class="nutri_caloriecount_box4" style="text-align: center; line-height: 14px; padding-right: 0px;">
                    	<table width="100%" cellpadding="0" cellspacing="0" border="0">
                        	<tr>
                            	<td style=" text-align: center; line-height: 10px; padding-bottom: 5px;">
                                	<span style="font-size: 16px; text-align: center; ">
					  <?php
                      			$total_minutes_a=$actual_physical;
								$hours_a =  floor($total_minutes_a/60); 
								$mins_a =   floor($total_minutes_a % 60); 
								
								echo  "".$hours_a.":".$mins_a.""; 
					?>
                    </span><br><span style="font-size: 10px;">HH:MM</span><br />
                      			</td>
                             </tr>
                             <tr>
                                <td style="text-align: center; line-height: 10px; border-top:solid 1px #acacac; padding:3px 0px; font-size:10px; width: 125%; "><span style="font-size: 10px;"><?php echo date('d-M-Y',strtotime($physical_date));?></span>
                                </td>
                       		 </tr>
                       </table>
                      </td>
                    <td class="nutri_sep"></td>
                    <td class="nutri_caloriecount_box5">
                    	  <div style="width: 315px; height: 56px; float: left; background-image: url(<?php echo $strHostName;?>/images/nutritionist/grey_line.png); background-repeat: repeat; padding: 0px; border: solid 0px #000000;" id="Cal_Physical_Chart">
						 </div>
                      </td>
                  </tr>
                  <tr>
                    <td colspan="8" style="background-color: #FFFFFF; height: 4px;"></td>
                  </tr>
                  
                  
                   <tr>
                    
                     <td class="nutri_caloriecount_box1 comment_hover" style="border:solid 0px green;">
                    		
                            
                             <span style="margin-top:-76px; display:none;">
                           			 
                              <div class="DvFloat" style="padding:10px; width:98%;">
										<?php echo "No Comments Available."; ?>
								   </div>
                            </span>
                            <?php if($physical_comment=="")	{ ?>
                             
									<img src="images/nutritionist/grey_chat_icon.png" alt="" title="" border="0">
							  
                             <?php } else { ?>
                        			 <a href="#" class="" style="border:solid 0px red; cursor:text;">
									<img src="images/nutritionist/grey_chat_icon.png" alt="" title="" border="0">
							  </a> 
                        	 <?php }  ?>
                     </td>
                     
                     
                    
                    <td class="nutri_sep"></td>
                    <td class="nutri_caloriecount_box2">Sleep Duration</td>
                    <td class="nutri_sep"></td>
                    <td class="nutri_caloriecount_box3"><table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td style="width: 65%; text-align: center; line-height: 14px;"><span style="font-size: 16px;">
                          	
                            
                            <?php 
								$total_minutes_s=$target_sleep;
								
								//$hours_s =  floor($total_minutes_s/60); 
								//$mins_s =   floor($total_minutes_s % 60); 
								
								echo  "".$total_minutes_s.""; 
							?>
                            
                            
                          </span><br>
                            <span style="font-size: 10px;">HH:MM</span></td>
                          <td style="width: 35%; text-align: center; vertical-align:top; padding-top: 4px;"><img src="images/nutritionist/sleep.png" alt="" title="" border="0"></td>
                        </tr>
                      </table></td>
                    <td class="nutri_sep"></td>
                    <td class="nutri_caloriecount_box4" style="text-align: center; line-height: 14px;"><span style="font-size: 16px; text-align: center; ">
					  <?php
                      			$total_minutes_as=$actual_sleep;
								//$hours_as =  floor($total_minutes_as/60); 
								//$mins_as =   floor($total_minutes_as % 60); 
								
								echo  "".$total_minutes_as.""; 
					?>
                    </span><br>
                      <span style="font-size: 10px;">HH:MM</span></td>
                    <td class="nutri_sep"></td>
                    <td class="nutri_caloriecount_box5">
                    	  <div style="width: 315px; height: 41px; float: left; background-image: url(<?php echo $strHostName;?>/images/nutritionist/grey_line.png); background-repeat: repeat; padding: 0px; border: solid 0px #000000;" id="Cal_Sleep_Chart">
						 </div>
                      </td>
                  </tr>
                  <tr>
                    <td colspan="8" style="background-color: #FFFFFF; height: 4px;"></td>
                  </tr>
                  
                  
                  <tr>
                   <td class="nutri_caloriecount_box1 comment_hover" style="border:solid 0px green;">
                    		
                           
                             
                           			 
                                <?php 
						   		$retrive_Array_1=$get_retrive->GetCalCounter_Date($patient_id,$daily_date); {
						  		$size_comment=GetValue("select size_comment as col from tbl_nutritionist_cal_comm where patient_id=".$patient_id." and record_date='".$daily_date."'", "col"); 
						    ?>
                            <span style="margin-top:-76px;  display: <?php if($size_comment=="") { echo "none";} else { "";}?>;">
                        	<div class="DvFloat" style="padding:10px; width:98%;">
                           		<?php if($size_comment=="")	{ echo "No Comments Available."; } else { echo $size_comment; }?>
                           </div>
                            </span>
                    		<?php } ?>
                           
                            
                            <?php if($size_comment=="")	{ ?>
                             
									<img src="images/nutritionist/grey_chat_icon.png" alt="" title="" border="0">
							  
                             <?php } else { ?>
                        			 <a href="#" class="" style="border:solid 0px red;">
									<img src="images/nutritionist/green_chat_icon.png" alt="" title="" border="0">
							  </a> 
                        	 <?php }  ?>
                     </td>
                     
                     
                    
                    
                    
                    
                    <td class="nutri_sep"></td>
                    <td class="nutri_caloriecount_box2"><select id="ddlWeight" name="ddlWeight" tabindex="1" class="existing_event" style="width: 100px;" onChange="javascript:ChangeSize();">
                     	<option value="Weight">Weight</option>	
                        <option value="Waist">Waist</option>
                        <option value="Hips">Hips</option>
                        <option value="Arms">Arms</option>
                      </select>
                    </td>
                    <td class="nutri_sep"></td>
                    <td class="nutri_caloriecount_box3" style="padding-bottom: 0px; margin-bottom: 0px;">
                    	<table width="100%" border="0" cellpadding="0" cellspacing="0">
                        	<tr>
                            	<td style="padding: 0px; width: 141px;">
                                	<table width="105%" cellpadding="0" cellspacing="0" border="0">
                                    	<tr>
                                        	<td>
                                            	<table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                	<tr>
                                                    	<td style="width: 65%; text-align: center; line-height: 12px;">
                                                        <span style="font-size: 16px; text-align: center;"  id="DvTargetWeight"><?php echo $target_weight?> Kg.</span>
                                                        <span style="font-size: 16px; text-align: center;"  id="DvTargetWaist"><?php echo $target_waist?></span>
                                                        <span style="font-size: 16px; text-align: center;"  id="DvTargetHips"><?php echo $target_hips?></span>
                                                        <span style="font-size: 16px; text-align: center;"  id="DvTargetArms"><?php echo $target_arms?></span>
                                                        <br><span style="font-size: 10px;">&nbsp;</span></td>
                            							<td style="width: 35%; text-align: center; vertical-align:top"><img src="images/nutritionist/weight_icon.png" alt="" title="" border="0"></td>
                            						</tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                        	<td style=" border-top:solid 1px #acacac;">
                                            	<table width="100%" border="0" cellpadding="0" cellspacing="0">
                                                	<tr>
                                                    	<td colspan="2" style="text-align:center; padding-top:0px; font-size:10px; line-height: 16px;"><?php echo date('d-M-Y',strtotime($target_date));?></td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                    	
                    <!--<table width="100%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td style="width: 65%; text-align: center; line-height: 14px;">
                          			<span style="font-size: 16px; text-align: center;"  id="DvTargetWeight"><?php echo $target_weight?> Kg.</span>
                                    <span style="font-size: 16px; text-align: center;"  id="DvTargetWaist"><?php echo $target_waist?></span>
                                    <span style="font-size: 16px; text-align: center;"  id="DvTargetHips"><?php echo $target_hips?></span>
                                    <span style="font-size: 16px; text-align: center;"  id="DvTargetArms"><?php echo $target_arms?></span>
                                    
                            <br><span style="font-size: 10px;">&nbsp;</span></td>
                          <td style="width: 35%; text-align: center; vertical-align:top"><img src="images/nutritionist/weight_icon.png" alt="" title="" border="0"></td>
                        </tr>
                        <tr>
                        	<td colspan="2" style="text-align:center; border-top:solid 1px #acacac; padding-top:9px; font-size:10px;"><?php echo date('d-M-Y',strtotime($target_date));?></td>
                        </tr>
                      </table>-->
                    </td>
                    <td class="nutri_sep"></td>
                    <td class="nutri_caloriecount_box4" style="text-align: center; line-height: 12px; padding-right: 0px;">
                    			<span style="font-size: 16px; text-align: center;" id="DvActualWeight"><?php echo $current_weight?> Kg.</span>
                                <span style="font-size: 16px; text-align: center;" id="DvActualWaist"><?php echo $current_waist?></span>
                                <span style="font-size: 16px; text-align: center;" id="DvActualHips"><?php echo $current_hips?></span>
                                <span style="font-size: 16px; text-align: center;" id="DvActualArms"><?php echo $current_arms?></span>
                        <br>       
                      <span style="font-size: 10px;line-height: 14px;">Current size</span>
                      		<p style="padding:0px; border-top:solid 1px #acacac; font-size:10px;line-height: 16px;"><?php echo date('d-M-Y',strtotime($current_data_date));?></p>
                      </td>
                    <td class="nutri_sep"></td>
                    <td style="width: 312px;">

					 <div style="width: 315px; height: 54px; float: left; background-image: url(<?php echo $strHostName;?>/images/nutritionist/grey_line.png); background-repeat: repeat; padding: 0px; border: solid 0px #000000;display:none;" id="Cal_Weight_Chart">
						 </div>

						  <div style="width: 315px; height: 54px; float: left; background-image: url(<?php echo $strHostName;?>/images/nutritionist/grey_line.png); background-repeat: repeat; padding: 0px; border: solid 0px #000000;display:none;" id="Cal_Waist_Chart">
						 </div>

						  <div style="width: 315px; height: 54px; float: left; background-image: url(<?php echo $strHostName;?>/images/nutritionist/grey_line.png); background-repeat: repeat; padding: 0px; border: solid 0px #000000;display:none;" id="Cal_Hips_Chart">
						 </div>

						  <div style="width: 315px; height: 54px; float: left; background-image: url(<?php echo $strHostName;?>/images/nutritionist/grey_line.png); background-repeat: repeat; padding: 0px; border: solid 0px #000000;display:none;" id="Cal_Arms_Chart">
						 </div>
                    </td>
                  </tr>
                  
                  
                  
                  
                </table>
              </div>
            </div>

<script>
	ChangeSize();
</script>
