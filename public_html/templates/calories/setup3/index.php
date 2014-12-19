<script type="text/javascript" src="<?php echo $strHostName?>/js/calories_steup3_validation.js"></script>
<script type="text/javascript" src="<?php echo $strHostName?>/js/health_steup_validation.js"></script>
<script type="text/javascript" src="<?php echo $strHostName?>/js/health_steup_insert_retrive.js"></script>

<script type="text/javascript">
function ShowTab(type)
{
	if(type=="calorie")
	{
		document.getElementById("DvCalorieTab").style.display="";
		document.getElementById("DvWaterConsumptionTab").style.display="none";
		document.getElementById("DvExcerciseTab").style.display="none";
	}
	if(type=="water")
	{
		document.getElementById("DvCalorieTab").style.display="none";
		document.getElementById("DvWaterConsumptionTab").style.display="";
		document.getElementById("DvExcerciseTab").style.display="none";
	}
	if(type=="burnt")
	{
		document.getElementById("DvCalorieTab").style.display="none";
		document.getElementById("DvWaterConsumptionTab").style.display="none";
		document.getElementById("DvExcerciseTab").style.display="";
	}
}


</script>

<?php include "includes/dashboard_top.inc.php";?>
<section>
  <div class="cal_full_size">
    <div class="cal_12 m_outo">
     <?php include "includes/dashboard_links.inc.php";?>
      <div class="dvFloat">
        <div class="dvWrapper">
          <div style="padding:35px 0px 35px 0px">
             <div class="calorie_div_left">
             	<?php include "includes/calorie_setup_left.inc.php";?>
            </div>
            

<?php
	$water_cal="0";
	$Food_Cal=GetValue("select sum(energy) as col from tbl_daily_food where user_id=".$_SESSION['UserID'],"col");
	$Exc_Cal=GetValue("select sum(eng_cal) as col from tbl_daily_exercise where user_id=".$_SESSION['UserID'],"col");
	$GOAL_Cal=GetValue("select sum(eng_cal) as col from tbl_daily_exercise where user_id=".$_SESSION['UserID'],"col");
	$NET=$Food_Cal+$Exc_Cal;
	$day=date('D');
	$month=date('F');
	$date=date('d Y'); 
	$daily_date=date('Y-m-d');
	
	$ate_cal=GetValue("select sum(qty*energy) as col from tbl_daily_food where user_id=".$_SESSION['UserID']." and date='$daily_date' ","col");
	if($ate_cal=="")
	{
		$ate_cal="0";
	}
	
	$ate_cal=number_format($ate_cal,0);
	
	$water_cal=GetValue("select sum(no_of_glass) as col from tbl_daily_water where user_id=".$_SESSION['UserID']." and date='$daily_date' ","col");
	
	if($water_cal=="" || $water_cal=="undefined")
	{
		$water_cal="0";
	}
	
	$water_cal=number_format($water_cal,0);
	
	$burnt_cal=GetValue("select sum(eng_cal) as col from tbl_daily_exercise where user_id=".$_SESSION['UserID']." and date='$daily_date' ","col");
	if($burnt_cal=="")
	{
		$burnt_cal="0";
	}
	
	$burnt_cal=number_format($burnt_cal,0);
?>
             <div class="calorie_div_right">
             <div class="DvFloat" style="margin-top: -35px; width: 713px;  margin-bottom: 55px;"><?php include "includes/dashboard_sublinks.inc.php";?></div>
              <div class="DvFloat">
              <!--<div class="DvFloat"><div style="width: 51%; float: right; text-align: right; padding: 5px 0px; margin-right: -13px;"><img src="images/shair_icon.gif" alt="" title="" border="0" style="border: solid 0px #000000;"></div></div>-->
                <?php include "includes/my_progress.inc.php";?>
                <div class="DvFloat" style="padding:30px 0px; border-bottom:solid 1px #c5c5c5">
                  <div class="DvFloat"><span class="Daily_Summary_title">Your Daily Summary</span></div>
                 	<?php include "includes/daily_summary.inc.php";?>
                </div>
                
                <div style="padding:30px 0px 30px 50px; border-bottom:solid 1px #c5c5c5; text-align:center; float:left; width:650px;">
                  
                  <div style="float:left; text-align:center; width:200px; padding-left:60px;" id="DvCalorieTab">
                    <div class="DvFloat" style="padding-top:7px;"><span class="Daily_Summary_title">What did you have</span></div>
                  </div>
                  
                  <div style="float:left; text-align:center; width:250px; display:none;  padding-left:58px;" id="DvWaterConsumptionTab">
                    <div class="DvFloat" style="padding-top:7px;"><span class="Daily_Summary_title">Your water consumption?</span></div>
                  </div>
                  <div style="float:left; text-align:center; width:350px; display:none;" id="DvExcerciseTab">
                    <div class="DvFloat" style="padding-top:7px;"><span class="Daily_Summary_title">How much calories you burnt today?</span></div>
                  </div>
                  
                  
                   <div style="float:right; text-align:left; padding-left:10px;"></div>
                  <input class="one" type="text" name="ToPickupdate"  id="ToPickupdate"  readonly="readonly" value="<?php echo $day;?> <?php echo $month;?>,<?php echo $date;?>" style="text-transform:uppercase; color:#666"/>
                </div>
                
                <div  style="padding:10px 0px 0px 0px; border-bottom:solid 0px #c5c5c5; width:580px; float:left;">
                  <div class="TabDv">
                    <div  style="padding:0px 5px 0px;">
                      <ul id="tabstabs" class="shadetabs" style="border-top:solid 0px #c5c5c5;border-bottom:solid 1px #c5c5c5; height:125px;padding:20px 0px 0 60px;">
                        <li onclick="javscript:ShowTab('calorie');"><a href="#" rel="tabs1" class="tab-1"><span class="tab-img1"></span>
                          <div style=" font-size:20px;  color:#7ca500; text-align:center" >
                         <span id="DvFoodCal"><?php echo $ate_cal;?></span>
                           Cal</div>
                          </a></li>
                          
                        <li onclick="javscript:ShowTab('water');"><a href="#" rel="tabs2"  class="tab-3"><span class="tab-img3"></span>
                          <div style=" font-size:20px;  color:#7ca500; text-align:center">
                          			<span id="dvDailyWater"><?php echo $water_cal;?></span> Glasses
                          </div>
                          </a></li>
                          
                          
                       <li onclick="javscript:ShowTab('burnt'); SetFrameHeightE();"><a href="#" rel="tabs3" class="tab-2"><span class="tab-img2"></span>
                          <div style=" font-size:20px;  color:#7ca500; text-align:center" >
                        	<span id="DvBurntCal"><?php echo $burnt_cal;?></span>
                           Cal</div>
                          </a></li>
                      </ul>
                    </div>
                    <div class="TabContentDetails" style="margin-bottom:0px; border:solid 0px red; height:auto;" id="dvNutrition">
                     	<?php include 'includes/nutrition.inc.php' ?>
                        
                     </div>
                     <div id="tabs2" class="tabcontent tab-3" style="border:solid 0px red; width:700px;">
                       	<?php include 'includes/daily_water.inc.php' ?>
  					</div>
                     <div id="tabs3" class="tabcontent tab-2" style="border:solid 0px red; width:700px;">
                       	
                         <?php include "includes/excercise_daily_tracking.inc.php"; ?>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  </div>
</section>

