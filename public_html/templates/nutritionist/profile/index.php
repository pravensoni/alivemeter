<?php
if(!isset($_SESSION['UserNutID']))
{
	Alertandredirect("Sorry! Session is expired.", 'index.php');
}
?>
<?php
if(isset($_SESSION['UserNutID']))
{
	$user_id=$_SESSION['UserNutID'];
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

$last_visit = GetValue("SELECT time as col FROM tbl_user_track  WHERE user_id = ".$_SESSION['UserNutID']." and user_type = '".$_SESSION['UserType']."' order by id desc limit 1,1", "col");

if($last_visit=="" || $last_visit=="0")
{
	$last_visit=date('d-M-Y h:i:s');
}


$patient_count = $db->select("SELECT * FROM  ".Users." a where isactive=1 and isdeleted=0 and parent_id=0 and  user_id in (select user_id from tbl_nutritionist_main where nutritionist_id=".$_SESSION['UserNutID'].")"); 
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
                                          
                                        </div>
                                        <div class="DvFloat" style="padding-top: 14px;">
                                            <div style="width: 25%; float: left;"><span style="font-weight: bold;">Total Clients:</span></div>
                                            <div style="width: 25%; float: left;"><?php echo $patient_count;?></div>
                                            <div style="width: 25%; float: left;"><span style="font-weight: bold;">&nbsp;</span></div>
                                            <div style="width: 25%; float: left;">&nbsp;</div>
                                        </div>
                                        <div class="DvFloat" style="padding-top: 14px;">Please click on the get queries tab below to start getting patient queries.</div>
                                        <div class="DvFloat" style="padding: 20px 0px;"><div style="width:320px; height:30px; float:left;"> 
                                        <a href="<?php echo $strHostName;?>/page_doctor.php?dir=nutritionist/client_details" class="button" style="text-align:center; padding: 0px 25px 0px 20px;"><!--CLICK HERE TO GET QUERIES-->click here to see list of clients</a></div></div>
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
