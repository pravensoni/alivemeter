<script type="text/javascript">
function showlink(iid)
{
	document.getElementById("DvVideoWindow").style.display="";
	
	var linkvalue=document.getElementById("txtVideoLink"+iid).value;
	///alert (linkvalue);
	
	//document.getElementById("DvVideoWindow").src=document.getElementById("txtVideoLink"+iid).value;
document.getElementById("StartDiv"+iid).href=document.getElementById("txtVideoLink"+iid).value;
	document.getElementById("StartDiv"+iid).style.display="none";
	document.getElementById("EndDiv"+iid).style.display="";
	
}



function Hidelink(iid)
{
	document.getElementById("StartDiv"+iid).style.display="";
	document.getElementById("EndDiv"+iid).style.display="none";
	document.getElementById("DvVideoWindow").style.display="none";
	document.getElementById("DvVideoWindow").src="";
}
</script>
<?php

$user_id="0";
if(isset($_SESSION['UserMDID']))
{
	$user_id=$_SESSION['UserMDID'];
}
else if (isset($_GET['UserMDID']))
{
	$user_id=$_GET['UserMDID'];
}
	
//Alert($user_id);	
	
if(isset($_GET['alived']) || isset($_GET['alivem']) || isset($_GET['alivey']))
{
	$date=$_GET['alivey']."-".$_GET['alivem']."-".$_GET['alived'];
	//Alert ($date);
}
else
{
	$date=date("Y-m-d");
	//Alert ($date);
}

$retrive_Array_1=Array();$retrive_Array=Array();$get_array=Array();$get_array_1=Array();
?>


<section>
  <div class="top_ou">
    <div class="top_in">
      <div class="top">
        <div class="cal_12" style="padding-top: 45px; padding-bottom:60px;">
            <div class="cal_12" style="border: solid 0px #0066CC;">
				<div style="text-align: right; width: 98%;float:left;padding-bottom:20px;">
					<div style="float:right;padding:10px;background:#009999;">
						<a href="<?php echo $strHostName?>/page_doctor.php?dir=md/timings&UserMDID=<?php echo $user_id;?>" style="color:white;text-align:center">Back to Calender</a>
					</div>
				</div>
            	<div class="adviceonline_md">
                 <h1 class="f_red" style="text-align: left; font-size: 20px; margin-bottom: 7px; text-transform:uppercase">Video Query Timings of <?php echo date('d-M-Y',strtotime($date))?></h1>
				  <div style="text-align: left; width: 100%;float:left;padding-bottom:20px;">
					 <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                             <td class="lightInboxbg21" style="border-bottom:solid 4px #fff;width:80px;">Day</td>
                             <td class="lightInboxbg21" style="border-bottom:solid 4px #fff;width:90px;">Date</td>
                             <td class="lightInboxbg21" style="border-bottom:solid 4px #fff;width:110px;">Time</td>
							 <td class="lightInboxbg21" style="border-bottom:solid 4px #fff; width:150px;">Title</td>
                             <td class="lightInboxbg21" style="border-bottom:solid 4px #fff;width:110px;">Hospital Name</td>
							 <td class="lightInboxbg21" style="border-bottom:solid 4px #fff;width:110px;">Patient Name</td>	
							 <td class="lightInboxbg21" style="border-bottom:solid 4px #fff;width:150px;">Notes</td>	
                             <td class="lightInboxbg21" style="border-bottom:solid 4px #fff;width:150px;">Confirmation</td>	
                            <td class="lightInboxbg21" style="border-bottom:solid 4px #fff;width:150px;">Video Link</td>
                          </tr>
						<?php $retrive_Array=$get_retrive->Get_Md_Video_App($user_id,'Video_Query',$date);?>
						<?php while($get_array = mysql_fetch_array( $retrive_Array )){
						$i=1;
						 $patient_reply=GetValue("select accept as col from tbl_compose where mail_id=".$get_array['compose_id']." and video_query_requirement='Yes'","col");
						 if($patient_reply=="2")
						 {
						 	$patient_reply="--";
						 }
						 if($patient_reply=="1")
						 {
						 	$patient_reply="Yes";
						 }
						 if($patient_reply=="0")
						 {
						 	$patient_reply="No";
						 }
						 
						 $now_time=date('H:i:s');


						$from_time = date('G:i',  strtotime($get_array['time_from'].' - 5 minute'));
						$to_time = date('G:i',  strtotime($get_array['time_to'].' + 5 minute'));
						
						$app_f_time = ($get_array['time_from']);
						$app_t_time = ($get_array['time_to']);
									
									
						 if($get_array['time_slot']=="PM")
									{
										
										
										$app_f_time = ($get_array['time_from']+(12.00));
										$app_t_time = ($get_array['time_to']+(12.00));
										$app_t_time =  number_format("".$app_t_time."",2);
										
										
										
										$to_time = ($app_t_time+0.05);
										$to_time =  number_format("".$to_time."",2);
										
										
										
										$from_time = ($app_f_time);
										$from_time =  number_format("".$from_time."",2);
									
									}
									
									
						?>
						<tr>
                            <td class="lightInboxbg5"><?php echo date("l",strtotime($get_array['app_date']));?></td>
                            <td class="lightInboxbg5"><?php echo date('d-M-Y',strtotime($get_array['app_date']))?></td>
                            <td class="lightInboxbg5"><?php echo $get_array['time_from']?> to <?php echo $get_array['time_to']?></td>
							<td class="lightInboxbg5"><?php echo $get_array['app_name']?></td>
                            <td class="lightInboxbg5"><?php echo $get_array['Hospital_Name']?></td>
							<td class="lightInboxbg5"><?php echo $get_array['Paitent_Name']?></td>
							<td class="lightInboxbg5"><?php echo $get_array['notes']?></td>
                            <td class="lightInboxbg5" style="text-align:left;"><?php echo $patient_reply;?></td>
                            <td class="lightInboxbg5" style="text-align:left;">
                            	 
                                	 <input type="hidden" name="txtVideoLink<?php echo $i;?>" id="txtVideoLink<?php echo $i;?>"  value="<?php echo $get_array['videolink'];?>" />
									<?php if($get_array['videolink']=="")  { ?>
										<span>No Link</span>
                                    <?php } else { ?>
                                   	<?php if( (date('G:i', strtotime($now_time))>= date('G:i',  strtotime($from_time))) && (date('G:i',  strtotime($now_time))<= date('G:i',  strtotime($to_time)))) {?>	
									
                                    <a id="StartDiv<?php echo $i;?>" style="cursor:pointer;" target="_blank" href="<?php echo $get_array['videolink'];?>">Click Here to Start Videochat.</a>
                                     <!--<a onclick="javascript:showlink('<?php echo $i;?>');" id="StartDiv<?php echo $i;?>" style="cursor:pointer;" target="_blank">Click Here to Start Videochat.</a>-->
                                     <a onclick="javascript:Hidelink('<?php echo $i;?>');" id="EndDiv<?php echo $i;?>" style="display:none; cursor:pointer;">Click here to start video chat.</a>
                                  <?php } else { ?>  
                                    <a href="#">Click here to start video chat.</a>
                                   <?php } ?> 
                                   
                                   
                                   
									<?php } ?>
                                	
                                </td>
                          </tr>
                             <?php $i=$i+1;?>
                         <?php } ?>
                         
                         </table>
                         <div>
                              		
                                 	 <iframe src="" width="955" height="450" frameborder="0" style="display:none; text-align:center; border: solid 5px #99cc01; background-color:#000;" id="DvVideoWindow">
                                        </iframe>
                                   
                              </div>
					</div>
				</div>
				<div class="adviceonline_md">
                 <h1 class="f_red" style="text-align: left; font-size: 20px; margin-bottom: 7px; text-transform:uppercase">Other Timings of <?php echo date('d-M-Y',strtotime($date))?></h1>
				  <div style="text-align: left; width: 100%;float:left">
						  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                            <tr>
                              <td class="lightInboxbg21" style="border-bottom:solid 4px #fff;width:80px;">Day</td>
                             <td class="lightInboxbg21" style="border-bottom:solid 4px #fff;width:90px;">Date</td>
                             <td class="lightInboxbg21" style="border-bottom:solid 4px #fff;width:110px;">Time</td>
							 <td class="lightInboxbg21" style="border-bottom:solid 4px #fff;">Title</td>
                             <td class="lightInboxbg21" style="border-bottom:solid 4px #fff;width:110px;">Hospital Name</td>
							 <td class="lightInboxbg21" style="border-bottom:solid 4px #fff;width:200px;">Notes</td>	
                            
                           
                          </tr>

                             
                         <?php $retrive_Array_1=$get_retrive->Get_Md_Video_App($user_id,'Other_App',$date);?>
						<?php while($get_array_1 = mysql_fetch_array( $retrive_Array_1 )){?>
						<tr>
                            <td class="lightInboxbg5"><?php echo date("l",strtotime($get_array_1['app_date']));?></td>
                            <td class="lightInboxbg5"><?php echo date('d-M-Y',strtotime($get_array_1['app_date']))?></td>
                            <td class="lightInboxbg5"><?php echo $get_array_1['time_from']?> to <?php echo $get_array_1['time_to']?></td>
							<td class="lightInboxbg5"><?php echo $get_array_1['app_name']?></td>
                            <td class="lightInboxbg5"><?php echo $get_array_1['Hospital_Name']?></td>
							<td class="lightInboxbg5"><?php echo $get_array_1['notes']?></td>
                          </tr>
                           
                         <?php } ?>
                         
                         </table>
				  </div>
                  
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
