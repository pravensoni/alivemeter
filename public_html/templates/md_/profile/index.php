<?php
if(isset($_SESSION['UserMDID']))
{
	$user_id=$_SESSION['UserMDID'];
}
else
{
	$user_id="0";
}


if(isset($_SESSION['UserType']))
{
	$user_type=$_SESSION['UserType'];
}
else
{
	$user_type="0";
}

$last_visit = GetValue("SELECT time as col FROM tbl_user_track  WHERE user_id = ".$_SESSION['UserMDID']." and user_type = '".$_SESSION['UserType']."' order by id desc limit 1", "col");

$patient_count = $db->select("SELECT * FROM tbl_patients where doctor_id=".$_SESSION['UserMDID']." and isaccepted=1"); 
$patient_count = $db->row_count;

?>
<section>
  <div class="top_ou">
    <div class="top_in">
      <div class="top">
        <div class="cal_12" style="padding-top: 45px; padding-bottom: 20px;">
            <div class="cal_12" style="border-bottom: solid 0px #CCCCCC;padding-bottom:20px;">
            	<div class="adviceonline_md">
                	<div class="DvFloat">
                    	<div class="DvFloat">
                        	<div class="photoareabg">
                              <div class="nutritionistphoto">
                              	<img src="images/nutritionist_photo.png" alt="" title="" border="0">
                              </div>
                            </div>
                            <div class="nutritionistright">
                            	<div class="DvFloat">
                                	<div class="DvFloat f_grey" style="font-size: 18px;">Welcome! <?php echo $_SESSION['UserDocName'];?></div>
                                    <div class="f_grey welcomedv">
                                    	<div class="DvFloat">
                                            <div style="width: 25%; float: left;"><span style="font-weight: bold;">Your Last visit:</span></div>
                                            <div style="width: 25%; float: left;"><?php echo date('d-M-Y h:i:s',strtotime($last_visit)); ?></div>
                                            <div style="width: 25%; float: left;"><span style="font-weight: bold;">Time Spent:</span></div>
                                            <div style="width: 25%; float: left;">27.01.2014</div>
                                        </div>
                                        <div class="DvFloat" style="padding-top: 14px;">
                                            <div style="width: 25%; float: left;"><span style="font-weight: bold;">Total Clients:</span></div>
                                            <div style="width: 25%; float: left;"><?php echo $patient_count;?></div>
                                            <div style="width: 25%; float: left;"><span style="font-weight: bold;">&nbsp;</span></div>
                                            <div style="width: 25%; float: left;">&nbsp;</div>
                                        </div>
                                        <div class="DvFloat" style="padding-top: 14px;">Please click on the get queries tab below to start getting patient queries.</div>
                                        <div class="DvFloat" style="padding: 20px 0px;"><div style="width:312px; height:30px; float:left;"> 
                                        <a href="<?php echo $strHostName;?>/page_doctor.php?dir=md/client" class="button" style="text-align:center; padding: 0px 25px 0px 20px;">CLICK HERE TO GET QUERIES</a></div></div>
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
  </div>
</section>
