<?php include 'common.inc.php'?>
<?php

	$month="0";$year="0"; $diet_count="0";
	if(isset($_GET['month_1']))
	{
		$month=$_GET['month_1'];
	}
	if(isset($_GET['year_1']))
	{
		$year=$_GET['year_1'];
	}
    $date=date($year.'/'.$month.'/01');
    $timestamp = strtotime($date);
	$MonthName = date('F', $timestamp);
	$MonthNo= date('m', $timestamp);
	$YearName = date('Y', $timestamp);
	$Day = date('d', $timestamp);
	$DayName = date('D', $timestamp);
	$bg = "#fff";
	$color = "#000000";
	$strMonthName=$MonthName;
	$daysinmonth=cal_days_in_month(01,$MonthNo,$YearName);
	$daysinmonth=$daysinmonth+1;
	 
	 
	 
	 
$user_id="0";
if(isset($_SESSION['UserID'])){
	$user_id=$_SESSION['UserID'];
}
		
				
	 
?>
<div class="dvWrapper" >
 
  <div  style="background-color:#FFFFFF; float:left">
	<div class="DvFloat" style="padding: 20px 0px; border-bottom: solid 0px #c5c5c5;">
	  <div class="DvFloat">
		<div style="width: 22px; float: left; height: 22px;">
			<a style="cursor:pointer;" onclick="javascript:Retrive_Calender_Months('Prev','User')">
				<img src="<?php echo $strHostName?>/images/prev_md_paging.png" />
			</a>
		</div>

		<div style="width: 924px; float: left; text-align: center; font-size: 28px;font-family: 'myriad_web_proregular'; font-weight: bold;" class="f_grey"><?php echo $strMonthName . " - " . $YearName ?></div>
		
		<div style="width: 22px; float: left; height: 22px;">
			<a style="cursor:pointer;" onclick="javascript:Retrive_Calender_Months('Next','User')">
				<img src="<?php echo $strHostName?>/images/next_md_paging.png" />
			</a>
		</div>
	  </div>
	</div>
  </div>
  
  <div style="float:left; width:966px; height:auto; border:solid 1px #bababa">
	<div class="dvFloat">
	<?php for($i=1;$i<2;$i++){?>
		 <?php for($iDay=1;$iDay < 8;$iDay++){?>
		 <?php $date = $YearName."/".$MonthNo."/".$iDay?>
		  <div class="Calender_box_Head"><?php  echo date('l', strtotime($date));?> </div>
		  <?php }?>
          
	<?php } ?>
   
	</div>
	 <div class="dvFloat"> 
	<?php for($i=1;$i<$daysinmonth;$i++){?>
   <?php 
   		$daily_date=$YearName."-".$MonthNo."-".$i;
   ?>
		<a href="<?php echo $strHostName;?>/page.php?dir=calendar/daily_tracking&alived=<?php echo $i;?>&alivem=<?php echo $MonthNo;?>&alivey=<?php echo $YearName;?>">
			  <div class="Calender_box1" style="background-color:<?php if($daily_date==date('Y-m-d')){ echo "#e0e0e0";}?>;">
				<div class="dvgreen_calender"><?php echo $i?></div>
				<br>
				<table cellpadding="0" cellspacing="0" style="width:100%;line-height:17px;">
				  <?php
					$query = "SELECT * FROM tbl_customized_data where user_id=".$user_id;
					//echo $query;
					$result = mysql_query($query);
					if($result != "") {
						$rowcount = mysql_num_rows($result);
						///echo $rowcount;
						if($rowcount > 0) {
							
							while($row = mysql_fetch_assoc($result)) {
								extract($row);
								$dataid=$row['dataid'];
							
								
							
					?>
    
						   <?php if ($dataid=="1") { ?>
                          <tr>
                            <td class="Calender_left">Water</td>
                            <td class="Calender_right">
                                 <?php
                                    $water_count = GetValue("SELECT sum(no_of_glass) as col FROM  tbl_daily_water where user_id=".$_SESSION['UserID']." and date='$daily_date' ", "col"); 
                                    if($water_count=="")
                                    {
                                        echo "0";
                                    }
                                    else
                                    {
                                        echo $water_count;
                                    }
                                ?> 
                             glasses</td>
                          </tr>
                          <?php } ?>
                          
                          <?php if ($dataid=="2") { ?>
                              <tr>
                                <td class="Calender_left" style="padding-top:0px;">Diet </td>
                                <td class="Calender_right">
                                <?php
                                $diet_count = GetValue("SELECT sum(energy*qty) as col FROM  ".Food." where user_id=".$_SESSION['UserID']." and date='$daily_date' ", "col"); 
                                if($diet_count=="")
                                {
                                    echo "0";
                                }
                                else
                                {
                                    echo $diet_count;
                                }
                                ?> cal 
                                
                                </td>
                              </tr>
                          <?php } ?>
                          
                          <?php if ($dataid=="3") { ?>
                          <tr>
                            <td class="Calender_left">Sleep</td>
                            <td class="Calender_right">
                            <?php
                            $sleep_count = GetValue("SELECT sum(life_style_sleep) as col FROM  ".Life_Style." where user_id=".$_SESSION['UserID']." and life_style_date='$daily_date' ", "col"); 
                            if($sleep_count=="")
                            {
                                echo "0";
                            }
                            else
                            {
                                echo $sleep_count;
                            }
                            ?> hrs</td>
                          </tr>
                          <?php } ?>
                          
                           <?php if ($dataid=="4") { ?>
                          <tr>
                            <td class="Calender_left">Excercise</td>
                            <td class="Calender_right">
                            <?php
                            $excercise_count = GetValue("SELECT sum(min) as col FROM  ".Exercise." where user_id=".$_SESSION['UserID']." and date='$daily_date' ", "col"); 
                            if($excercise_count=="")
                            {
                                echo "0";
                            }
                            else
                            {
                                echo $excercise_count;
                            }
                            ?> 
                             min</td>
                          </tr>
                          <?php } ?>
                          
                           <?php if ($dataid=="5") { ?>
                           <tr>
                            <td class="Calender_left">Weight</td>
                            <td class="Calender_right">
                            <?php
                            $weight = GetValue("SELECT curr_wgt as col FROM tbl_calorie_det where user_id=".$_SESSION['UserID']." and weight_date='$daily_date' ", "col"); 
                            if($weight=="")
                            {
                                echo "0";
                            }
                            else
                            {
                                echo $weight;
                            }
                            ?> 
                             Kg</td>
                          </tr>
                          <?php } ?>
                          
                           <?php if ($dataid=="6") { ?>
                          <tr>
                            <td class="Calender_left">Blood Pressure</td>
                            <td class="Calender_right">
                            <?php
                            $blood_pressure_systolic = GetValue("SELECT blood_pressure_systolic as col FROM tbl_blood_pressure where user_id=".$_SESSION['UserID']." and del_track_date='$daily_date' ", "col"); 
							
							$blood_pressure_diatolic = GetValue("SELECT blood_pressure_diatolic as col FROM tbl_blood_pressure where user_id=".$_SESSION['UserID']." and del_track_date='$daily_date' ", "col"); 
							
                            
							$bp_count=$blood_pressure_systolic."/".$blood_pressure_diatolic;
							
							if($blood_pressure_systolic=="" || $blood_pressure_diatolic=="")
                            {
                                echo "0";
                            }
                            else
                            {
                                echo $bp_count;
                            }
                            ?> 
                             </td>
                          </tr>
                          <?php } ?>
                          
                           <?php if ($dataid=="7") { ?>
                          <tr>
                            <td class="Calender_left">Sugar Profile</td>
                            <td class="Calender_right">
                            <?php
                            $excercise_count = GetValue("SELECT sum(fasting_blood_sugar_result) as col FROM  tbl_sugar_profile where user_id=".$_SESSION['UserID']." and fasting_blood_sugar_date='$daily_date' ", "col"); 
                            if($excercise_count=="")
                            {
                                echo "0";
                            }
                            else
                            {
                                echo $excercise_count;
                            }
                            ?> 
                             </td>
                          </tr>
                          <?php } ?>
                          
                           <?php if ($dataid=="8") { ?>
                          <tr>
                            <td class="Calender_left">Lipid Profile</td>
                            <td class="Calender_right">
                            <?php
                            $lipid_count = GetValue("SELECT sum(triglyceride_blood_sugar_result) as col FROM  tbl_lipid_profile where user_id=".$_SESSION['UserID']." and triglyceride_blood_sugar_date='$daily_date' ", "col"); 
                            if($lipid_count=="")
                            {
                                echo "0";
                            }
                            else
                            {
                                echo $lipid_count;
                            }
                            ?> 
                             </td>
                          </tr>
                          <?php } ?>
                          
                         
                  

				  <?php }}} ?>
				</table>
			  </div>
		</a>
	
	  
   
   <?php } ?>
	</div>
  </div>
</div>

