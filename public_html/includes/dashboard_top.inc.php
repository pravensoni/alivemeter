<?php if($_SESSION['UserType']!="Doctor" && $_SESSION['UserType']!="Nutritionist" && $_SESSION['UserType']!="MD"){ 
$inbox_id=$get_retrive->RetriveUserInboxID($_SESSION['UserID']);

$user_id=$_SESSION['UserID'];
$today_date=date('Y-m-d');
?>

<script type="text/javascript">
function ShowAlerts()
{
	document.getElementById('DvAlertDiv').style.display = ''; 
}
function HideAlerts()
{
	 document.getElementById('DvAlertDiv').style.display = 'none'; 
}


</script>

<section>
  <div class="top_ou">
    <div class="top_in" style="border: solid 0px #000066;">
      <div class="top">
        <div class="cal_12">
          <div class="DvFloat" style="padding-top: 2px;">
            <a href="<?php echo $strHostName;?>/page.php?dir=health/dashboard"><div class="health_greenbg_title_h" style="width:84%;"> <span style="text-align: center; text-transform: uppercase; font-size: 21px;" class="f_dwhite">Health Dashboard</span> </div></a>
            <div class="wealth_bluebg_title" style="display:none;"> <span style="text-align: center; text-transform: uppercase; font-size: 21px;" class="f_blue">Wealth</span> </div>
            <div class="hw_whitebg_title">
              <div class="contact_green_icon"><a href="<?php echo $strHostName;?>/page.php?dir=inbox/view_mails&status=inbox&folderid=<?php echo $converter->encode($inbox_id)?>"  style="border:solid 0xp red;"><img src="<?php echo $strHostName;?>/images/contact_greenblue_icon.png" alt="" title="" border="0"></a></div>
              <div class="contact_blue_icon"> <a href="<?php echo $strHostName;?>/page.php?dir=health/videochat"><img src="<?php echo $strHostName;?>/images/contact_video_icon.png" alt="" title="" border="0"></a></div>
              <div class="contact_bell_icon">
              	<a style="cursor:pointer;" onmouseover="javascript:ShowAlerts();" onmouseout="javascript:HideAlerts();"><img src="<?php echo $strHostName;?>/images/contact_bell_icon.png" alt="" title="" border="0"></a>
                <div class="inbox_popup_mainbox" style="display:none;" id="DvAlertDiv">
                	<div class="inbox_popup_bgtop"></div>
                    <div class="inbox_popup_bgmiddle">
                    	<div style="width: 430px; float: left; border: solid 0px #000033;">
                        	<div class="DvFloat" style="border: solid 0px #FF0000;">
                            	<div class="inbox_contentbox" style="padding-left: 11px;">Welcome to Alivemeter.  </div>
                            </div>
                            
                            
                            <?php
								 
								 $medication_count = GetValue("SELECT Count(*) as col FROM ".Medication." WHERE start_date <='".$today_date."' and end_date >='".$today_date."' and intake_reminder='on' and user_id=".$user_id." and isdeleted=0", "col");
								 
								 
								 
								
							?>
                            <?php if ($medication_count!="0") { ?>
                            <div class="DvFloat" style="padding: 4px 4px 0px 4px;">
                            	<div class="inbox_contentbox">
                                	Medication Alert:<br />
                                   	
                                    <?php
										$today_date=date('Y-m-d');
										
										 $query_m = "SELECT * FROM ".Medication." WHERE start_date <='".$today_date."' and end_date >='".$today_date."' and intake_reminder='on'  and isdeleted=0 and user_id=".$user_id."";
										///echo $query_m;
										$result_m = mysql_query($query_m);
										if($result_m != "") {
											$rowcount_m = mysql_num_rows($result_m);
											if($rowcount_m > 0) {
												while($row_m = mysql_fetch_assoc($result_m)) {
													extract($row_m);
													
									?>
                                   
                                   Medicine Intake &ndash; <?php echo $row_m['medicine']?>, <?php echo $row_m['dosage']?> mg 
								   
								 
                                   <?php if($row_m['feq_mor_hour']=="0")
										{
											echo "";
										}
										else 
										{
											echo ",  ".$row_m['feq_mor_hour'].".";
										}
										
								   ?>	
                                   
                                   
                                     <?php if($row_m['feq_mor_min']=="null" || $row_m['feq_mor_min']=="Min")
										{
											echo "";
										}
										else 
										{
											echo $row_m['feq_mor_min']." AM"."";
										}
										
								   ?>
                                   
                                   
								   
								   
								   <?php if($row_m['feq_af_hour']=="0")
										{
											echo "";
										}
										else 
										{
											echo ",  ".$row_m['feq_af_hour'].".";
										}
										
								   ?>	
                                   
                                   
                                     <?php if($row_m['feq_af_min']=="null" || $row_m['feq_af_min']=="Min")
										{
											echo "";
										}
										else 
										{
											echo $row_m['feq_af_min']." PM"."";
										}
										
								   ?>				
								   
								 
                                   
                                   <?php if($row_m['feq_eve_hour']=="0")
										{
											echo "";
										}
										else 
										{
											echo ",  ".$row_m['feq_eve_hour'].".";
										}
										
								   ?>	
                                    <?php if($row_m['feq_eve_min']=="null" || $row_m['feq_eve_min']=="Min")
										{
											echo "";
										}
										else 
										{
											echo $row_m['feq_eve_min']." PM"."";
										}
										
								   ?>	
                                   
                                   
                                   
                                   <?php if($row_m['feq_ngt_hour']=="0")
										{
											echo "";
										}
										else 
										{
											echo ",  ".$row_m['feq_ngt_hour'].".";
										}
										
								   ?>	
                                    <?php if($row_m['feq_ngt_min']=="null" || $row_m['feq_ngt_min']=="Min")
										{
											echo "";
										}
										else 
										{
											echo $row_m['feq_ngt_min']." PM"."";
										}
										
								   ?>	
                                   
                                  			
								   <br />
							   
                                 
                                  <?php }}} ?>
                                   
                                    
                                    
                                   
                                </div>
                            </div>
                            <?php } ?>
                            
                            
                            <?php
							$today_date=date('Y-m-d');
										$currentmonth=date('m');
										$currentdate=date('d');
								 $medication_purchase_count = GetValue("SELECT Count(*) as col FROM ".Medication." WHERE purchase_day='".$currentdate."' and purchase_month='".$currentmonth."' and purchase_reminder='on'  and isdeleted=0 and user_id=".$user_id."", "col");
								  ///echo $medication_count;
							?>
                            <?php if ($medication_purchase_count!="0") { ?>
                          <div class="DvFloat" style="padding: 0px 4px 0px 4px;">
                            	<div class="inbox_contentbox">   
                            <?php
										$today_date=date('Y-m-d');
										$currentmonth=date('m');
										$currentdate=date('d');
										
										 $query_p = "SELECT * FROM ".Medication." WHERE purchase_day='".$currentdate."' and purchase_month='".$currentmonth."' and purchase_reminder='on'  and isdeleted=0 and user_id=".$user_id."";
										 /// echo $query;
										$result_p = mysql_query($query_p);
										if($result_p != "") {
											$rowcount_p = mysql_num_rows($result_p);
											if($rowcount_p > 0) {
												while($row_p = mysql_fetch_assoc($result_p)) {
													extract($row_p);
									?>
                                   
                                  Purchase reminder &ndash; <?php echo $row_p['medicine']?> <?php echo $row_p['dosage']?> mg
                                  <br />
                                   <?php }}} ?>
                                 </div>
                                 </div>  
                             <?php } ?>
                            
                            
                             <?php
		$imm_count = GetValue("SELECT Count(*) as col FROM ".Immunization." WHERE reminder_date='".$today_date."' and isdeleted=0 and user_id=".$user_id."", "col");
								  ///echo $medication_count;
							?>
                            <?php if ($imm_count!="0") { ?>
                             	<div class="DvFloat" style="padding: 0px 4px 0px 4px;">
                            	<div class="inbox_contentbox">
                                	Immunization Alert:<br />
                                    Vaccine &ndash; 
                                     <?php
										$today_date=date('Y-m-d');
										$currentmonth=date('m');
										$currentdate=date('d');
										
										 $query_i = "SELECT * FROM ".Immunization." WHERE reminder_date='".$today_date."' and isdeleted=0 and user_id=".$user_id."";
										 /// echo $query;
										$result_i = mysql_query($query_i);
										if($result_i != "") {
											$rowcount_i = mysql_num_rows($result_i);
											if($rowcount_i > 0) {
												while($row_i = mysql_fetch_assoc($result_i)) {
													extract($row_i);
									?>
                                   
                                   <?php echo $row_i['immunization_name']?> 
                                  <br /> 
                                   <?php }}} ?>
                                    
                                </div>
                            </div>
                             <?php } ?>
                            
                            
                             <?php
								 $hosp_count = GetValue("SELECT Count(*) as col FROM ".Hospital." WHERE reminder_date='".$today_date."' and isdeleted=0 and user_id=".$user_id."" , "col");
								  ///echo $medication_count;
							?>
                            <?php if ($hosp_count!="0") { ?>
                                    <div class="DvFloat" style="padding: 0px 4px 0px 4px;">
                                        <div class="inbox_contentbox">
                                            Hospitalization Alert:<br />
                                        
                                             <?php
                                                $today_date=date('Y-m-d');
                                                $currentmonth=date('m');
                                                $currentdate=date('d');
                                                
                                                 $query_h = "SELECT * FROM ".Hospital." WHERE reminder_date='".$today_date."' and isdeleted=0 and user_id=".$user_id."";
                                                 /// echo $query;
                                                $result_h = mysql_query($query_h);
                                                if($result_h != "") {
                                                    $rowcount_h = mysql_num_rows($result_h);
                                                    if($rowcount_h > 0) {
                                                        while($row_h = mysql_fetch_assoc($result_h)) {
                                                            extract($row_h);
                                            ?>
                                           
                                           Next Visit Date : <?php echo date('d-M-Y',strtotime($row_h['next_date']))?> 
                                           
                                          <br /> 
                                           <?php }}} ?>
                                            
                                        </div>
                                    </div>
                             <?php } ?>
                              
                              
                              
                              
                              
                          <?php
										$today_date=date('Y-m-d');
										$doc_mail_count=GetValue("select Count(*) as col from tbl_doctor_comment where patient_id=".$user_id." and created_date like '%".$today_date."%' and type='Patient'", "col");
										
										// echo "select Count(*) as col from tbl_doctor_comment where patient_id=".$user_id." and created_date like '%".$today_date."%'";
										
									?>
                           <?php if ($doc_mail_count!="0") { ?>
                            <div class="DvFloat" style="padding: 0px 4px 0px 4px;">
                            	<div class="inbox_contentbox">
                                	  You got <?php echo $doc_mail_count;?> email(s) from doctors. 
                                 </div>
                            </div>
                             <?php } ?>
                             
                             
                             
                              <?php
										$today_date=date('Y-m-d');
										$md_mail_count=GetValue("select Count(*) as col from tbl_md_comment where patient_id=".$user_id." and created_date like '%".$today_date."%' and type='Patient'", "col");
										
										///echo "select Count(*) as col from tbl_doctor_comment where patient_id=".$user_id." and created_date like '%".$today_date."%'";
										
									?>
                           <?php if ($md_mail_count!="0") { ?>
                            <div class="DvFloat" style="padding: 0px 4px 0px 4px;">
                            	<div class="inbox_contentbox">
                                	  You got <?php echo $md_mail_count;?> email(s) from MD. 
                                 </div>
                            </div>
                             <?php } ?>
                             
                             
                             
                              <?php
										$today_date=date('Y-m-d');
										$video_count=GetValue("select Count(*) as col FROM  ".Md_Appoint." where isdeleted=0 and patient_id=$user_id and app_date='".$today_date."' and compose_id in (select mail_id from tbl_compose where accept=1)", "col");
										
										
										
									?>
                           <?php if ($video_count!="0") { ?>
                             <div class="DvFloat inbox_contentbox" style="padding: 4px;"><div style="width: 58%; border: solid 0px red; float: left; padding-left: 6px;">Your today's video appointment at:</div>
                             <div style="width: 35%; float: left; border: solid 0px #151515;">
                             	<div class="DvFloat" style="padding: 0px 4px 0px 4px;" >
                            	 <?php
						$query = "SELECT * FROM  ".Md_Appoint." where isdeleted=0 and patient_id=$user_id and app_date='".$today_date."' and compose_id in (select mail_id from tbl_compose where accept=1)";
						
						/// echo $query;
$i=1;
						$result = mysql_query($query);							
						if($result != "") {	
							$rowcount  = mysql_num_rows($result);
							if($rowcount > 0) {
								while($row = mysql_fetch_assoc($result)) {
								
									extract($row);
									$complaint=GetValue("select subject as col from tbl_compose where mail_id=".$row['compose_id'], "col");
									$md_name=GetValue("select doctor_name as col from tbl_doctor where doctor_id=".$row['md_id'], "col");
									
									$now_time=date('H:i:s');


									$from_time = date('G:i',  strtotime($row['time_from'].' - 5 minute'));
									$to_time = date('G:i',  strtotime($row['time_to'].' + 5 minute'));
									
									$app_f_time = ($row['time_from']);
									$app_t_time = ($row['time_to']);
										
									if($row['time_slot']=="PM")
									{
										
										
										$app_f_time = ($row['time_from']+(12.00));
										$app_t_time = ($row['time_to']+(12.00));
										$app_t_time =  number_format("".$app_t_time."",2);
										
										
										
										$to_time = ($app_t_time+0.05);
										$to_time =  number_format("".$to_time."",2);
										
										
										
										$from_time = ($app_f_time);
										$from_time =  number_format("".$from_time."",2);
										
									
									}
												
																		 
						?> 
                               
                                	 
                                      From: <?php echo date('g:i',  strtotime($row['time_from']));?> to <?php echo date('g:i',  strtotime($row['time_to']));?>
                                 <br />
                                <?php }}} ?>    
                                 
                            </div>
                            </div>
                             </div>
                            
                             <?php } ?>
                             
                             
                             
                               <?php
										$today_date=date('Y-m-d');
										$nut_mail_count=GetValue("select Count(*) as col from tbl_nutritionist_comments where patient_id=".$user_id." and created_date like '%".$today_date."%'", "col");
										
										///echo "select Count(*) as col from tbl_doctor_comment where patient_id=".$user_id." and created_date like '%".$today_date."%'";
										
									?>
                           <?php if ($nut_mail_count!="0") { ?>
                            <div class="DvFloat" style="padding: 0px 4px 0px 4px;">
                            	<div class="inbox_contentbox">
                                	  You got <?php echo $nut_mail_count;?> email(s) from your nutritionist. 
                                 </div>
                            </div>
                             <?php } ?>
                             
                             
                             
                            <?php
										$today_date=date('Y-m-d');
										$cal_count=GetValue("select Count(*) as col from tbl_daily_food where user_id=".$user_id." and date = '".$today_date."'", "col");
										$exe_count=GetValue("select Count(*) as col from tbl_daily_exercise where user_id=".$user_id." and date ='".$today_date."'", "col");
									
										
									?>
                           <?php if ($cal_count=="0" || $exe_count=="0") { ?>
                            <div class="DvFloat" style="padding: 0px 4px 0px 4px;">
                            	<div class="inbox_contentbox">
                                	 Please update your calorie counter.
                                 </div>
                            </div>
                             <?php } ?>
                             
                             
                             
                             
                             
                             
                             
                             
                               <?php
										$today_date=date('Y-m-d');
										$nut_plan_count=GetValue("select Count(*) as col from tbl_diet_plan where patient_id=".$user_id." and selected_date like '%".$today_date."%'", "col");
										
										///echo "select Count(*) as col from tbl_doctor_comment where patient_id=".$user_id." and created_date like '%".$today_date."%'";
										
									?>
                           <?php if ($nut_plan_count!="0") { ?>
                            <div class="DvFloat" style="padding: 0px 4px 0px 4px;">
                            	<div class="inbox_contentbox">
                                	  <!--You got today's diet plan from your nutritionist.-->
                                      You have received today&rsquo;s diet plan from your nutritionist.
                                 </div>
                            </div>
                             <?php } ?>
                             
                             
                            
                            
                        </div>
                    </div>
                    <div class="inbox_popup_bgbottom"></div>
                </div>              
              </div>
              <?php
			  
	$total_count=($medication_count+$medication_purchase_count+$imm_count+$hosp_count+$doc_mail_count+$md_mail_count+$video_count+$nut_mail_count+$nut_plan_count);
			  ?>
              
              <div class="small_red_bg"><?php echo $total_count;?></div>
            </div>
          </div>
        </div>
        <div class="b_crumb" style="line-height: 20px; margin: 0px 20px; padding: 0px 0 0 0;">&nbsp;</div>
      </div>
    </div>
  </div>
</section>
<?php } ?>