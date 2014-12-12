<?php
if(!isset($_SESSION['UserNutID']))
{
	Alertandredirect("Sorry! Session is expired.", 'index.php');
}
?>
<script type="text/javascript" src="<?php echo $strHostName?>/js/health_steup_validation.js"></script>
<script type="text/javascript" src="<?php echo $strHostName?>/js/health_steup_insert_retrive.js"></script>
<script type="text/javascript" src="<?php echo $strHostName;?>/lib/jquery-1.10.1.min.js"></script>

<script type="text/javascript">

function ResetValues()
{
	document.getElementById("txt_UserName").value="";
	document.getElementById("txt_ProfileId").value=""
}

//Edit the counter/limiter value as your wish
var count = "159";
//Example: var count = "175";
function limiter(){
var tex = document.myform.comment.value;
var len = tex.length;
if(len > count){
tex = tex.substring(0,count);
document.myform.comment.value =tex;
return false;
}
document.myform.limit.value = count-len;
}



function Send_SMS(memberid)
{
	document.getElementById("txtMemberIDSMS").value=memberid;
	Popup.showModal('dvpopup-senssms',null,null,{'screenColor':'#333333','screenOpacity':.6});
}


function SendUserSMS()
{
	//alert ("dfdf");
	
	if(document.getElementById("comment").value=="")
	{
		alert ("Please enter message.");
		document.getElementById("comment").focus();
		return false;
	}
	
	nut_sms=document.getElementById("comment").value;
	member_id=document.getElementById("txtMemberIDSMS").value;
	//nut_id=document.getElementById("txtNutritionistLogID").value;
	
	if (window.XMLHttpRequest)
	{// for IE7+, Firefox, Chrome, Opera, Safaricodes
		xmlhttp = new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
			{
				message = xmlhttp.responseText;
				alert ("SMS sent successfully.");
		
	document.getElementById("comment").value="";
	
	redirectURL(window.location.href);
				if(message!="") {
				///	alert ("duplicate date!");
					//parent.document.getElementById("dvDailyWater").innerHTML=message;
				}
				
			}
	}
	
	///alert (hostname+"/includes/send_nut_sms.inc.php?nut_sms="+nut_sms+"&member_id="+member_id);
	
	 xmlhttp.open("GET",hostname+"/includes/send_nut_sms.inc.php?nut_sms="+nut_sms+"&member_id="+member_id, true);
	 xmlhttp.send();
	 
	
}


function maxLength(el) {    
    if (!('maxLength' in el)) {
        var max = el.attributes.maxLength.value;
        el.onkeypress = function () {
            if (this.value.length >= max) return false;
        };
    }
}

maxLength(document.getElementById("comment"));



</script>

<?php
$cond=""; $name=""; $mobile=""; $email=""; $profile_id=""; 
	
	
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



	
	if(isset($_POST['txt_UserName']) || isset($_GET['name']))
	{
		if(isset($_POST['txt_UserName'])) 
		{
			$name=trim(str_replace("'", "''", $_POST['txt_UserName']));
			
		}
		if(isset($_GET['name'])) 
		{
			$name=$_GET['name'];
		}
		if($name!="")
		{
			$cond=$cond." and name like '%".$name."%'";
		}
	}
	
	
	if(isset($_POST['txt_MobileNo']) || isset($_GET['mobile']))
	{
		if(isset($_POST['txt_MobileNo'])) 
		{
			$mobile=trim(str_replace("'", "''", $_POST['txt_MobileNo']));
			
			
		}
		if(isset($_GET['mobile'])) 
		{
			$mobile=$_GET['mobile'];
		}
		
		if($mobile!="")
		{
			$cond=$cond." and mobile like '%".$mobile."%'";
		}
	}
	
	if(isset($_POST['txt_EmailId']) || isset($_GET['email']))
	{
		if(isset($_POST['txt_EmailId'])) 
		{
			$email=trim(str_replace("'", "''", $_POST['txt_EmailId']));
		
		}
		if(isset($_GET['email'])) 
		{
			$email=$_GET['email'];
		}
		
		
		
		if($email!=""){
			$cond=$cond." and user_email like '%".$email."%'";
		}
	}
	
	if(isset($_POST['txt_ProfileId'])  || isset($_GET['profile_id']))
	{
		if(isset($_POST['txt_ProfileId'])) 
		{
			$profile_id=trim(str_replace("'", "''", $_POST['txt_ProfileId']));
			
		}
		if(isset($_GET['profile_id'])) 
		{
			$profile_id=$_GET['profile_id'];
		}
		
		
		if($profile_id!=""){
			$cond=$cond." and user_profile_id like '%".$profile_id."%'";
		}
	}


$page=1;$page_count=25;$newpagenumber="2";$retrive_Array=array();$get_array=array();
  $retrive_Array=$get_retrive->GetNutPatients($page_count, $cond);
  $nume=$get_retrive->GetNutPatients_Count($cond);
  $nume_mem=$get_retrive->GetNutPatientsMem_Count($cond);
  $total_meb=$nume+$nume_mem;
?>
<section>
  <div class="top_ou">
    <div class="top_in">
      <div class="top">
        <div class="cal_12" style="padding-top: 15px;">
          <h1 class="f_red" style="text-align: left; font-size: 18px;">CLIENT PROFILE</h1>
          <div class="cal_12" style="border: solid 0px #0066CC;">
            <form enctype="multipart/form-data" method="post">
            <div class="DvFloat">
              <div style="float:left; width:350px; border:solid 0px red;">
                <div class="DvFloat">
                  <div style="float: left; padding-top: 6px; width:75px;" class="f_grey">User Name</div>
                  <div style="float: left; padding-left: 10px;">
                    <input type="text" name="txt_UserName" id="txt_UserName" value="<?php echo $name;?>" style="width: 200px;" />
                  </div>
                </div>
                
                
              </div>
              <div style="float:left; width:350px; border:solid 0px red;">
              <div class="DvFloat" style="padding-top: 0px; text-align: left;">
                  <div style="float: left; padding-top: 6px; width:75px; text-align: left;" class="f_grey">User Id</div>
                  <div style="float: left; padding-left: 10px;">
                    <input type="text" name="txt_ProfileId" id="txt_ProfileId" value="<?php echo $profile_id;?>" style="width: 200px;" />
                  </div>
                </div>
                <div class="DvFloat" style="display:none;">
                  <div style="float: left; padding-top: 6px; padding-left: 10px;width:75px;" class="f_grey">Mobile No</div>
                  <div style="float: left; padding-left: 10px;">
                    <input type="text" name="txt_MobileNo" id="txt_MobileNo" value="<?php echo $mobile;?>" style="width: 200px;" />
                  </div>
                </div>
               <div class="DvFloat" style="display:none;">
                  <div style="float: left; padding-top: 6px; padding-left: 10px; width:75px;" class="f_grey">Email Id</div>
                  <div style="float: left; padding-left: 10px;">
                    <input type="text" name="txt_EmailId" id="txt_EmailId" value="<?php echo $email;?>" style="width: 200px;" />
                  </div>
                </div>
                
              <div class="DvFloat">
                <div style="float: left; padding-bottom: 10px; padding-top: 10px; padding-left: 85px;  width: 210px; border: solid 0px #99FF00;">
                  <div style=" width:80px; height:20px; float:left"><a onclick="javascript:ResetValues();" name="btnReset" id="btnReset" class="buttonreset"  style="text-align:center; cursor:pointer; width:50px; height:20px;">Reset</a></div>
                  <div style=" width:80px; height:20px; float:left;"><input type="submit" name="btnSearch" id="btnSearch" class="buttonreset" value="Search" style="text-align:center"/></div>
                </div>
              </div>
              </div>
              
              
            </div>
            </form>
            <div class="adviceonline_md">
              <div class="DvFloat">
                <div class="DvFloat" style="border-bottom: solid 0px #e1e1e1; border-top: solid 1px #e1e1e1; margin-top: 16px; padding: 5px 0px;">
                  <div style="width: 30%; float: left; padding-top: 10px;" class="f_grey"><span style="font-weight: bold; font-size: 15px;">Total Records Found :</span> <span class="f_red" style="font-size: 15px; font-weight: bold;"><?php echo $nume;?></span></div>
                   <div style="width: 30%; float: left; padding-top: 10px; display:'';" class="f_grey"><span style="font-weight: bold; font-size: 15px;">Total align members :</span> <span class="f_red" style="font-size: 15px; font-weight: bold;"><?php echo $nume_mem;?></span></div>
                   
                   <div style="width: 30%; float: left; padding-top: 10px; display:'';" class="f_grey"><span style="font-weight: bold; font-size: 15px;">Total Records with align members :</span> <span class="f_red" style="font-size: 15px; font-weight: bold;"><?php echo $total_meb;?></span></div>
                   
                  <div style="width: 40%; float: right; padding-top: 10px; text-align: right; display:none;" class="f_grey">
                    <div style="float: left; padding-right: 5px; text-align: right; width: 315px; padding-top: 6px;"><span style="font-weight: bold;">Page Size</span></div>
                    <div style="float: right; padding-left: 5px;">
                      <select id="cmb_Date" name="cmb_Date" class="existing_event" tabindex="1" style="width: 2px;">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option selected>10</option>
                        <option>11</option>
                        <option>12</option>
                      </select>
                    </div>
                  </div>
                </div>
                
                <div class="DvFloat">
                  <table width="100%" border="0" cellpadding="0" cellspacing="0" style="padding-bottom:20px;">
                    <tr>
                      <td class="greeybg4">User ID</td>
                      <td class="greeybg2">Name</td>
                      
                      <td class="greeybg4">Gender</td>
					  <td class="greeybg4">Member Count</td>
                      <td class="greeybg4">Send SMS</td>
                     
                      <td class="greeybg7">Action</td>
                    </tr>
                    <tr>
                      <td class="f_white" colspan="6" style="height: 5px;"></td>
                    </tr>
                      <?php 
					  
	
						if($nume !="0")
						{
							$newpagenumber=($nume/$page_count);
							if($newpagenumber==""){$newpagenumber="0";}else{$newpagenumber=$newpagenumber+1;}
							$newpagenumber=round($newpagenumber);
							if($page > $newpagenumber)
							{
								$newpagenumber=1;
							}
							else
							{
								$newpagenumber="";
							}
						}
						$pagingLink = getPagingLinkBackEndFrontEnd($nume,$page_count,'dir=nutritionist/client_details&name='.$name.'&mobile='.$mobile.'&email='.$email.'&profile_id='.$profile_id.'',$newpagenumber,$strHostName."/page_doctor.php");
						
					  ?>
                      <?php  while($get_array = mysql_fetch_array( $retrive_Array )){
					  	$compose_id=GetValue("select compose_id as col from ".Nut_Patients." where patient_id=".$get_array['user_id'], "col");

						$member_count=GetValue("select count(*) as col from ".Users." where parent_id=".$get_array['user_id']." and isactive=1 and isdeleted=0", "col");
					  ?>
                       <tr>
                                  <td class="lightgreeybg4"><?php echo $get_array['user_profile_id']; ?></td>
                                  <td class="lightgreeybg2"><a href="<?php echo $strHostName;?>/page_doctor.php?dir=nutritionist/details&patient_id=<?php echo $converter->encode($get_array['user_id'])?>&compose_id=<?php echo $converter->encode($compose_id);?>&parent_id=<?php echo $converter->encode($get_array['user_id']);?>"><?php echo $get_array['name']; ?></a> </td>
                                
                                  <td class="lightgreeybg4"><?php echo $get_array['gender']; ?> </td>
                                  
								  <td class="lightgreeybg4"><?php echo $member_count; ?> </td>
                                
                                 <td class="lightgreeybg4">
                                 	
<div class="dvFloat" style="border:solid 0px red; float:left; text-align:left; margin-bottom:0px; margin-right:3px; padding-left:8px;">
	<a onClick="javascript:SetScroll(); Send_SMS('<?php echo $get_array['user_id']; ?>');" style="cursor:pointer; font-size:13px; text-transform:none" >Send SMS</a>
    
</div>


                                 </td>
                                
                                  <td class="lightgreeybg7"><a href="<?php echo $strHostName;?>/page_doctor.php?dir=nutritionist/details&patient_id=<?php echo $converter->encode($get_array['user_id'])?>&compose_id=<?php echo $converter->encode($compose_id);?>&parent_id=<?php echo $converter->encode($get_array['user_id']);?>"><img src="images/nutritionist_action_icon.jpg" alt="" title="" border="0"></a></td>
                                </tr>
                    
                    <tr>
                      <td class="f_white" colspan="6" style="height: 5px;"></td>
                    </tr>
                      <?php  } ?>
                     
                     <?php if ($nume=="0" || $nume=="") { ?>
                     	<tr>
                      <td class="f_white" colspan="6" style="height: 5px; color:red; text-align:center; padding-top:15px;">Sorry! No clients are available.</td>
                    </tr>
                     <?php } ?>
                     
                 </table>
                </div>
                <?php if ($page_count < $nume) { ?>
                <div class="DvFloat" style="padding:0px 0 20px 0;">
                  <div style="text-align: center; padding: 10px 0px; width: 967px; float: left; border: solid 0px #000000;">
                    <div class="pagination_md">
                      <div style="width: 22px; float: left; border: solid 0px #0066FF; padding: 0px; margin:-5px 0px 0px 0px; display:none;"><a href="#"><img src="images/prev_md_paging.png" alt="" title="" border="0" /></a></div>
                      <div style="width: 917px; float: left; border: solid 0px #006600;">
                      	<?php echo $pagingLink ?>
                       </div>
                      <div style="width: 22px;  float: left; border: solid 0px #0066FF; padding: 0px; margin:-5px 0px 0px 0px; display:none;"><a href="#"><img src="images/next_md_paging.png" alt="" title="" border="0" /></a></div>
                    </div>
                  </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<div id="dvpopup-senssms" style="text-align: center; width: 623px; display: none; position:absolute; margin-top:65px; margin-left:350px; background-color:#fff; padding:10px;">
      
             <div style="margin: 0px 0px 0px 600px; position: absolute; text-align:right; float: right"> <a href="javascript:Popup.hide('dvpopup-senssms');" target="_parent" style="text-decoration: none; color: #fff; border: solid 0px #993300;"> <img src="images/close.png" alt="" title="" border="0" /> </a> 
            </div>
              
              <div class="dvFloat">
              		
                    <div class="dvFloat" style="padding:4px; background-color:#99cc00; color:#fff; text-align:left;">
                    	Sens SMS 
                    </div>
                    
                     <div class="dvFloat" style="padding:4px; text-align:left; margin-top:15px;">
                    	<div style="float:left; width:30%;">Message</div>
                        <div style="float:left; width:50%;">
                       
                       <form name="myform" METHOD=POST>
<textarea name="comment" id="comment"  wrap="physical" rows="3" cols="40" onkeyup="limiter()"></textarea><br>

<script type="text/javascript">
document.write("<span style='line-height:30px;'>Character left :</span> <input type='text' name='limit' size='4' style='border:0px; background:none; box-shadow:none; width:220px; float:right;' readonly value="+count+">");
</script>

 <input type="hidden" name="txtMemberIDSMS" id="txtMemberIDSMS" value="" />
 
 
</form>


                       
                      </div>
                        
                  </div>
                
                              
                    
                  
                    
                     <div class="dvFloat" style="padding:4px; text-align:left;">
                    	<div style="float:left; width:30%;">&nbsp;</div>
                        <div style="float:left; width:50%;"> <a class="button2" style="width:80px; cursor: pointer;" onclick="javascript:SendUserSMS();">Send</a></div>
                        
                    </div>
                
              
              </div>
              
              
            </div>