<script type="text/javascript" src="<?php echo $strHostName?>/js/health_steup_validation.js"></script>
<script type="text/javascript" src="<?php echo $strHostName?>/js/health_steup_insert_retrive.js"></script>


<?php include "includes/dashboard_mainlinks.inc.php";?>
<?php
if(isset($_GET['mail_id']))
{
	$mail_id=$converter->decode($_GET['mail_id']);
}


if(isset($_GET['mail_type']))
{
	$mail_type=$converter->decode($_GET['mail_type']);
	 ///Alert($mail_type);
}



if(isset($_GET['status'])){
		$status=$_GET['status'];
	}
	else
	{
		$status="";
	}

	if(isset($_GET['folderid']))
	{
		$folderid =$converter->decode($_GET['folderid']);
	}
	else
	{
		$folderid="0";
	}

	
	//Alert($folderid);

	if(isset($_SESSION['UserNutID']))
	{
		$userid=$_SESSION['UserNutID'];
	}


?>
<script type="text/javascript">
function ValidateFolder()
{
	 var foldername=document.getElementById("foldername").value;
	 if(foldername=="")
 	{
		alert("Please Fill Folder Name To Create");
		return false;
	}	
	AddFolder();
}

function AddFolder() {
        var foldername=document.getElementById("foldername").value;
        var parentidhidd=document.getElementById("parentidhidd").value;
        if(foldername==""){
            alert("Please Fill Folder Name To Create");
            return false;
        }
        if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {// code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
					
        xmlhttp.onreadystatechange=function() {
			//alert(xmlhttp.status);
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                var message = xmlhttp.responseText;
				//alert(message);
                // (message.indexOf("true") >= 0)
                if(message.indexOf("true") >= 0){
                    alert("Folder Already Exist");
                    return false;
                }else{
                    $('#runtimeadd').append(message);
					var  i = document.getElementById("ivalue").value;
					i=parseFloat(i);
					document.getElementById("ivalue").value=(i+1);
					//$('#foldername').value = "";
                }
                //$("#videosDv").append(addStr);
            }
        }
                                      
        url = "<?php echo $strHostName; ?>/includes/addnutfolder.inc.php?foldername="+foldername+"&parentidhidd="+parentidhidd;
		///alert (url);
		xmlhttp.open("GET", url, true);
        xmlhttp.send();
		alert ("Folder created successfully.");
        redirectURL(window.location.href);
		document.getElementById("foldername").value="";
				
    }
	
	
	
function GetForm() {
        var mailsid=0;
		mailsid=mailsid+","+document.getElementById("txtComposeID").value;
		
	    if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
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
                document.getElementById("saveform").innerHTML = xmlhttp.responseText;
            }
        }
		
        xmlhttp.open("GET","<?php echo $strHostName; ?>/includes/addnutfolderevent.inc.php?mailsid="+mailsid,true);
        xmlhttp.send();
    }
	




		
</script>
<script type="text/javascript">


function DeleteMail()
{
	
	
	var mailsid=0;
	mailsid=mailsid+","+document.getElementById("txtComposeID").value;
	
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
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
		}
	}

	//xmlhttp.open("GET","<?php echo $strHostName; ?>/includes/search_profile.inc.php?mailsid="+mailsid, true);
	//xmlhttp.send();
	
}
	
	
	
function MoveTo(foldername, folderid)
{
	 var newfolderid=document.getElementById("txtNewFolderID").value;
	
  		if (confirm("Are you sure you want to move to "+foldername+" this record ?"))
			{
			
			
			var mail_type="";
			
			var mailsid="0";
			mail_type=document.getElementById("txtMailType").value;
			mailsid=mailsid+","+document.getElementById("txtComposeID").value+"@@@"+mail_type;
			
			if (window.XMLHttpRequest)
			{
				// code for IE7+, Firefox, Chrome, Opera, Safari
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
					///alert (message);
					if (foldername=="Delete")
					{
						// alert("Records deleted succesfully");
					}
					else
					{
						 //alert("Records moved succesfully to "+ foldername );
					}
					
					redirectURL(hostname+"/page_doctor.php?dir=nutritionist/inbox&status="+foldername+"&folderid="+folderid);
					
				}
			}
					xmlhttp.open("GET","<?php echo $strHostName; ?>/includes/move_mails.inc.php?type=Nutritionist&mailsid="+mailsid+"&folderid="+folderid+"&foldername="+foldername, true);
					xmlhttp.send();
		}
			

	
}



function Nut_Mail_Delete_By_Id()
{
	if (confirm("Are you sure you want to delete this record ?"))
	{
	
		var newfolderid=document.getElementById("txtNewFolderID").value;	
		mailsid=mailsid+","+document.getElementById("txtComposeID").value;
			
			
	
			var message="";
			var day="";
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
					 redirectURL(hostname+"/page_doctor.php?dir=nutritionist/inbox&status=trash&folderid="+newfolderid);
				}
			}
			xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Nut_Mails&cid="+mailsid,true);
			xmlhttp.send();
	
		}
	}

</script>
<section>
  <div class="top_ou">
    <div class="cal_12 m_outo">
      <div class="dvFloat">
        <div class="dvWrapper">
          <div style="float:left; padding:0px 0px 50px 0px; border:solid 0px red;">
            <div class="adviceonline_md">
             	<?php include "includes/nut_inbox_left.inc.php";?>
                <div class="Inbox_td_right" style="border: solid 0px #FF0000; padding-top:50px;">
                      <div class="DvFloat">
                        <table width="100%" border="0" cellpadding="0" cellspacing="0">
                          <tr>
                            
                            <td colspan="3" style=""><table width="30%" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                  <td style="padding:0px 5px 0px 0px;vertical-align:top"><div style="float:left; background-color:#666666; color:#FFFFFF; padding:5px 15px">
                                 <a onclick="javascript:MoveTo('Delete', '<?php echo $converter->encode("999999");?>');" style="text-align:center; font-size:14px;text-transform:none;font-family: 'myriad_web_proregular'; color:#FFFFFF; cursor:pointer;">Delete</a>
                                  </div></td>
                                  <td style="padding:0px 5px; vertical-align:top">
									
										<div style="float:left; width:90px; border:solid 0px red;">
											<div style="float:left; width:90px; border:solid 0px red;">
											  <ul id="dd_nav1">
										  <li> <a href="#" style="background-color:#666666; font-weight:normal; padding:5px 10px; width:70px"> Move to&nbsp;<span class="ar">&#9660;</span> </a>
											<ul style="width: 90px; background-color: #666;line-height:25px">
											<li style="border-bottom: solid 0px #aac457;"><a style="cursor:pointer;"  onclick="javascript:MoveTo('Trash', '<?php echo $converter->encode($get_retrive->RetriveNutTrashID($_SESSION['UserNutID']));?>');">Trash</a></li>
										   
											   <?php $FolderArray=$get_retrive->GetNutFolders($_SESSION['UserNutID']) ;  ?>	  
								  <?php  while($folder = mysql_fetch_array( $FolderArray )){?>
									<li style="border-bottom: solid 0px #aac457;"><a style="cursor:pointer;"  onclick="javascript:MoveTo('<?php echo $folder['name']?>', '<?php echo $converter->encode($folder['id']);?>');"><?php echo $folder['name']?></a></li>
									
								  <?php }?>
											</ul>
										  </li>
										</ul>
										  </div>
										</div>
								   
								</td>
                                  <td style="padding:0px 5px; vertical-align:top">
								<div style="float:left; background-color:#666666; padding:4px 10px 2px 10px;width:90px;"> 
									 <input type="submit" name="savnbtn" id="savnbtn5" value="Create Folder" onClick="javascript:SetScroll(); Popup.showModal('dvAdd1',null,null,{'screenColor':'#000','screenOpacity':.5});
										GetForm()" style="text-align:center; font-size:14px;text-transform:none;font-family: 'myriad_web_proregular'; color:#FFFFFF; background-color: #666; border:0px; padding:0px; cursor:pointer;"/>
									
								</div>
							   </td>
                                </tr>
                              </table></td>
                            <td style="vertical-align:top; text-align:right"></td>
                          </tr>
                         
                          <tr>
                            <td colspan="2">
                            	<div class="DvFloat">
                                	<div style="text-align: center; padding: 25px 0px 0px 0px; width: 770px; float: left; border-bottom: solid 1px #e1e1e1;">
                                    	<div class="pagination_md" style="display:none;">
                                        	<div style="width: 22px; float: left; border: solid 0px #0066FF; padding: 0px; margin:-5px 0px 0px 0px;"><a href="#"><img src="images/prev_md_paging.png" alt="" title="" border="0" /></a></div>
                                            <div style="width: 726px; float: left; border: solid 0px #006600;">&nbsp;</div>
                                            <div style="width: 22px;  float: left; border: solid 0px #0066FF; padding: 0px; margin:-5px 0px 0px 0px;"><a href="#"><img src="images/next_md_paging.png" alt="" title="" border="0" /></a></div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                          </tr>
                          <tr>
                            <td colspan="2">
                            	<?php if($mail_type=="Nutritionist"){ ?>
                                <div class="DvFloat">
                                	 <?php
									$query = "SELECT * FROM  ".Nutritionist." where isactive=1 and isdeleted=0 and mail_id=".$mail_id;
									//echo $query;
									$result = mysql_query($query);							
									if($result != "") {	
										$rowcount  = mysql_num_rows($result);
										if($rowcount > 0) {
											while($row = mysql_fetch_assoc($result)) {
												extract($row);

												$NewFolderID=$get_retrive->RetriveNutSentID($userid);
												$NewFolderID=$converter->encode($NewFolderID);
									?> 
                                    <div class="DvFloat" style="padding-top: 10px; border: solid 0px #003366;">
                                    	<div class="DvFloat">
                                            <div class="inbox_detail_left f_grey">From:</div>
                                            <div class="inbox_detail_right">
                                            	<?php 
													echo $user_name=GetValue("select name as col from tbl_users where user_id=".$row['user_id'], "col");
												?>
                                                <input type="hidden" name="txtReplyTo" id="txtReplyTo" value="<?php echo $row['user_id'];?>" />

												<input type="hidden" name="txtNutritionistID" id="txtNutritionistID" value="<?php echo $row['nutrition_id'];?>" />

												<input type="hidden" name="txtComposeID" id="txtComposeID" value="<?php echo $row['mail_id'];?>" />

												<input type="hidden" name="txtSubject" id="txtSubject" value="<?php echo $row['subject'];?>" />

												<input type="hidden" name="txtNewFolderID" id="txtNewFolderID" value="<?php echo $NewFolderID;?>" />

												 <input type="hidden" id="txtMailType" name="txtMailType" value="<?php echo $row['mail_type'];?>" style="width:150px;"/>

												<input type="hidden" name="txtComposeID" id="txtComposeID" value="<?php echo $row['mail_id'];?>" />
												
                                            </div>
                                        </div>
                                        <div class="DvFloat" style="padding-top: 10px;">
                                            <div class="inbox_detail_left f_grey">To:</div>
                                            <div class="inbox_detail_right">
                                            	<?php echo $_SESSION['UserDocName']?> &lt;<?php echo $_SESSION['UserDocEmail'];?>&gt;
                                            </div>
                                        </div>
                                        <div class="DvFloat" style="padding-top: 10px;">
                                            <div class="inbox_detail_left f_grey">Date:</div>
                                            <div class="inbox_detail_right"><?php echo date('d-M-Y h:i:s', strtotime($row['created_date']))?></div>
                                        </div>
                                        <div class="DvFloat" style="padding-top: 10px;">
                                            <div class="inbox_detail_left f_grey">Subject:</div>
                                            <div class="inbox_detail_right"><?php echo $row['subject'];?></div>
                                        </div>
                                    </div>
                                    <div class="DvFloat" style="padding: 10px 0px 20px 0px; border-bottom: solid 1px #e1e1e1; font-size: 13px; line-height: 20px; color: #666666; text-align: justify;">
                                    	 <div class="inbox_detail_left f_grey">Message:</div>
                                            <div class="inbox_detail_right"><?php echo $row['message'];?></div>
										
                                    </div>
                                    <?php }}} ?>
                                    <?php 
										$comment_reply_id="";$comment_reply="";
										$query = "SELECT * FROM  ".Nut_Comment." where isactive=1 and isdeleted=0 and compose_id=".$mail_id;
										//echo $query;
										$result = mysql_query($query);							
										if($result != "") {	
											$rowcount  = mysql_num_rows($result);
											if($rowcount > 0) {
												while($row = mysql_fetch_assoc($result)) {
													$comment_reply_id=$row['comment_id'];
													$comment_reply=$row['comment'];
													
												}
											}
										}
									?>
                                    
                                    
                                    
									<input type="hidden" name="txtCommentID" id="txtCommentID" value="<?php echo $comment_reply_id;?>" />
                                    <div class="DvFloat" style="padding: 23px 0px 0px 0px; border-bottom: solid 0px #e1e1e1; font-size: 13px; line-height: 16px; color: #666666;">
                                    	<div class="DvFloat">Reply</div>
                                        <div class="DvFloat" style="padding: 20px 0px 8px 0px; border: solid 0px #000000;">
                                        <div style="width: 400px; float: left;">
                                        	 <div class="DvFloat">
                                            <form name="myform" METHOD="POST">
                          <div style="float:left; width:100%"> <textarea  name="comment" id="comment"><?php echo $comment_reply?></textarea>
                          </div>
						
                        </form>
                                            </div>
											<?php if($comment_reply_id==""  || $comment_reply_id=="0"){ ?>
                                        <div class="DvFloat" style="padding: 10px 0px 0px 0px; border: solid 0px #e1e1e1; font-size: 12px; line-height: 16px; color: #666666;">
                                    	<div style=" width: 95px; height:30px; float:left;"> <a class="buttoncancle">cancel</a></div>
                                        <div style=" width:95px; height:30px; float:left; margin-left: 10px;"> <a class="buttongreen" onclick="javascript:SendReply();" style="cursor:pointer;">SUBMIT</a></div>
                                    </div>
									<?php } ?>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                
                                <?php } else  { ?>
                                  <div class="DvFloat">
                                	 <?php
									$query = "SELECT * FROM  tbl_nutritionist_comments where isactive=1 and isdeleted=0 and comment_id=".$mail_id;
									//echo $query;
									$result = mysql_query($query);							
									if($result != "") {	
										$rowcount  = mysql_num_rows($result);
										if($rowcount > 0) {
											while($row = mysql_fetch_assoc($result)) {
												extract($row);

												$NewFolderID=$get_retrive->RetriveNutSentID($userid);
												$NewFolderID=$converter->encode($NewFolderID);
									?> 
                                    <div class="DvFloat" style="padding-top: 10px; border: solid 0px #003366;">
                                    	<div class="DvFloat">
                                            <div class="inbox_detail_left f_grey">From:</div>
                                            <div class="inbox_detail_right">
                                            	<?php echo $_SESSION['UserDocName']?> &lt;<?php echo $_SESSION['UserDocEmail'];?>&gt;
                                                
												
                                                <input type="hidden" name="txtReplyTo" id="txtReplyTo" value="<?php echo $row['patient_id'];?>" />

												<input type="hidden" name="txtNutritionistID" id="txtNutritionistID" value="<?php echo $row['nutritionist_id'];?>" />

												<input type="hidden" name="txtComposeID" id="txtComposeID" value="<?php echo $row['comment_id'];?>" />

												<input type="hidden" name="txtSubject" id="txtSubject" value="<?php echo $row['subject'];?>" />

												<input type="hidden" name="txtNewFolderID" id="txtNewFolderID" value="<?php echo $NewFolderID;?>" />

												 <input type="hidden" id="txtMailType" name="txtMailType" value="Nutritionist_Reply" style="width:150px;"/>

												
												
                                            </div>
                                        </div>
                                        <div class="DvFloat" style="padding-top: 10px;">
                                            <div class="inbox_detail_left f_grey">To:</div>
                                            <div class="inbox_detail_right">
                                            	<?php 
													echo $user_name=GetValue("select name as col from tbl_users where user_id=".$row['patient_id'], "col");
												?>
                                            </div>
                                        </div>
                                        <div class="DvFloat" style="padding-top: 10px;">
                                            <div class="inbox_detail_left f_grey">Date:</div>
                                            <div class="inbox_detail_right"><?php echo date('d-M-Y h:i:s', strtotime($row['created_date']))?></div>
                                        </div>
                                        <div class="DvFloat" style="padding-top: 10px;">
                                            <div class="inbox_detail_left f_grey">Subject:</div>
                                            <div class="inbox_detail_right"><?php echo $row['subject'];?></div>
                                        </div>
                                    </div>
                                    <div class="DvFloat" style="padding: 10px 0px 20px 0px; border-bottom: solid 1px #e1e1e1; font-size: 13px; line-height: 20px; color: #666666; text-align: justify;">
                                    	 <div class="inbox_detail_left f_grey">Message:</div>
                                            <div class="inbox_detail_right"><?php echo $row['comment'];?></div>
										
                                    </div>
                                    <?php }}} ?>
                                    </div>
                                <?php } ?>
                            </td>
                          </tr>
                        </table>
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

<center>
    <div id="dvAdd1" style="width: 100%; position: absolute;display: none;top: 0px;">
      <div id="saveform" style="width: 100%;top: 0px; position: absolute;"></div>
    </div>
</center>