<script src="<?php echo $strHostName;?>/js/health_steup_insert_retrive.js" type="text/javascript"></script>
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
		xmlhttp.open("GET", url, true);
        xmlhttp.send();
		alert ("Folder created successfully.");
        redirectURL(window.location.href);
		document.getElementById("foldername").value="";
				
    }
	
	
	
function GetForm() {
        var MailCount=document.getElementById("txtMailCount").value;
		var mailsid=0;
		for (i=1;i < MailCount; i++ )
		{
			if (document.getElementById("chkTick"+i).checked==true)
			{
				mailsid=mailsid+","+document.getElementById("txtmailid"+i).value;
				//alert (mailsid);
			}
		}
	
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
<script type="text/javascript" language="javascript">
function DeleteMail()
{
	
	var MailCount=document.getElementById("txtMailCount").value;
	var mailsid=0;
	for (i=1;i < MailCount; i++ )
	{
		if (document.getElementById("chkTick"+i).checked==true)
		{
			mailsid=mailsid+","+document.getElementById("txtmailid"+i).value;
			//alert (mailsid);
		}
	}

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
	
	var MailCount=document.getElementById("txtMailCount").value;
	
	var datacountid=""; var totallength="";
	
	for (i=1;i < MailCount; i++ )
	{
		var chkmailid=document.getElementById("txtmailid"+i).value;
    		// alert (chkmailid);
	
	
		
			///alert (document.getElementById("chkTick"+i).checked);
			datacountid=datacountid+","+document.getElementById("chkTick"+i).value;
			document.getElementById("totalDataCountLimit").value=datacountid;
			totallength=datacountid.split(',').length;
			document.getElementById("totalLimit").value=totallength;
		
			if(totallength > 1)
			{
	
				if (confirm("Are you sure you want to move to "+foldername+" this record ?"))
					{
					var MailCount=document.getElementById("txtMailCount").value;
					var mail_type="";
				
					var mailsid="0";
							for (i=1;i < MailCount; i++ )
							{
								if (document.getElementById("chkTick"+i).checked==true)
								{
									mail_type=document.getElementById("txtMailType"+i).value;
									mailsid=mailsid+","+document.getElementById("txtmailid"+i).value+"@@@"+mail_type;
									
								}
							}
					
					
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
										if (foldername=="Delete")
										{
											// alert("Records deleted succesfully");
										}
										else
										{
											// alert("Records moved succesfully to "+ foldername );
										}
										redirectURL(window.location.href);
										
									}
							}
						//alert ("<?php echo $strHostName; ?>/includes/move_mails.inc.php?type=Nutritionist&mailsid="+mailsid+"&folderid="+folderid+"&foldername="+foldername);
						xmlhttp.open("GET","<?php echo $strHostName; ?>/includes/move_mails.inc.php?type=Nutritionist&mailsid="+mailsid+"&folderid="+folderid+"&foldername="+foldername, true);
						xmlhttp.send();
					}
				
				}
			}
		
		   
	
}

function Nut_Mail_Delete_By_Id()
{
	
	var MailCount=document.getElementById("txtMailCount").value;
 
	var datacountid=""; var totallength="";
	for (i=1;i < MailCount; i++ )
	{
		
		if (document.getElementById("chkTick"+i).checked==true)
		{
			datacountid=datacountid+","+document.getElementById("chkTick"+i).value;
		//	alert (datacountid);
			document.getElementById("totalDataCountLimit").value=datacountid;
			totallength=datacountid.split(',').length;
			//alert (totallength);
			document.getElementById("totalLimit").value=totallength;
		
			if(totallength > 1){
	
			if (confirm("Are you sure you want to delete this record ?"))
			{
			var MailCount=document.getElementById("txtMailCount").value;
			var mailsid=0;
			for (i=1;i < MailCount; i++ )
			{
				if (document.getElementById("chkTick"+i).checked==true)
				{
					mailsid=mailsid+","+document.getElementById("txtmailid"+i).value;
					///alert (mailsid);
				}
				else
				{
					alert ("Please select atleast one record to delete.");
					return false;
				}
			}
		
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
					// alert(message);
					 document.getElementById("tr_mail_"+i).style.display='none';
					 redirectURL(window.location.href);
				}
			}
			xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Nut_Mails&cid="+mailsid,true);
			xmlhttp.send();
			
				}
			}
		}
		
		else if (document.getElementById("chkTick"+i).checked==false)
		{
			alert ("Please select atleast one folder to delete.");
			return false;
		}
		
	}
	
}


function UnselecMain(source)
{
	if (source.checked==false)
	{
		 document.getElementById("chkAll").checked=false;
	}
	 
}	 

function selectAll(source)
{
	//alert("dff");
	var checkboxes =document.getElementsByName("chkTick");
	for(var i=0, n=checkboxes.length;i<n;i++) 
	{
		checkboxes[i].checked = source.checked;
		
  	}
	 
}	 

				
</script>

<?php
if(isset($_POST['btnSubmitSave'])) {
  /* $selfolder = is_array($_POST['selfolder']) ? implode(',', $_POST['selfolder']) : $_POST['selfolder'];
   $parentidhidd = str_replace("'", "''", $_POST['parentidhidd']);
   $mailid = str_replace("'", "''", $_POST['mailid']);
   $parentid=$_SESSION['UserNutID'];
   
   
   $date = date("Y-m-d  h:i:s");
    $tblid = str_replace("'", "''", $_POST['tblid']);
    $data = array(
        'parentid' => $parentid,
        'folderid' => "0,".$selfolder,
        'mailid' => "$mailid",
        'date' => $date,
        'isdeleted' => 0
    );
    if (!$tblid) {
        $id = $db->insert_array(Nut_WishList, $data);
        //AlertandRedirect("Celebrity is saved successfully",$strHostName."/page.php?dir=".$_GET['dir']."&cid=".$_GET['cid']."&cname=".$_GET['cname']);
    } else {
        $id = $db->update_array(Nut_WishList, $data, "id = " . $tblid);
        // AlertandRedirect("Celebrity is saved successfully",$strHostName."/page.php?dir=".$_GET['dir']."&cid=".$_GET['cid']."&cname=".$_GET['cname']);
    }*/
}


?>

 

<?php
	$page=1;$page_count=25;$newpagenumber="2";$retrive_Array=array();$get_array=array();
	if(isset($_GET['page'])){
		$page=$_GET['page'];
	}
	else
	{
		$page=1;
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

	
	$retrive_Array=$get_retrive->GetNutMails($page_count,0,$folderid,$userid);
	

	
	$nume=$get_retrive->GetMails_NutCount($folderid,$userid);

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
	
	
	$pagingLink = getPagingLinkBackEndFrontEnd($nume,$page_count,'dir='.$_GET['dir'].'&status='.$_GET['status'].'&folderid='.$_GET['folderid'],$newpagenumber,$strHostName."/page_doctor.php");
	
	
?>

 <div class="Inbox_td_right">
               
                <table width="750px" border="0" cellpadding="0" cellspacing="0">
					<?php if($nume > 0 ){ ?>
                  <tr>
					 <td class="Inboxbg1" style="padding-top:10px;vertical-align:top; width:50px;"><input type="checkbox" id="chkAll" name="chkAll" value="" onclick="javascript:selectAll(this);"/>
					</td>
					 <td class="Inboxbg2" colspan="2" style="border:solid 0px red; width:650px;">
						<table width="150px;" border="0" cellpadding="0" cellspacing="0">
							<tr>                         
							  <td style="padding:0px 5px;vertical-align:top">
								 
									 <!--<div style="float:left; background-color:#666666; color:#FFFFFF; padding:5px 15px"> <a onclick="javascript:MoveTo('Delete', '<?php echo $converter->encode("999999");?>');" style="text-align:center; font-size:14px;text-transform:none;font-family: 'myriad_web_proregular'; color:#FFFFFF; cursor:pointer;">Delete</a></div>-->


									<div style="float:left; background-color:#666666; color:#FFFFFF; padding:5px 15px"> 
                                   <?php if($status=="trash") { ?>
                                       <a onclick="javascript:MoveTo('Delete', '<?php echo $converter->encode("999999");?>');" style="text-align:center; font-size:14px;text-transform:none;font-family: 'myriad_web_proregular'; color:#FFFFFF; cursor:pointer;">Delete</a>
                                   <?php } else { ?>
                                   		<a style="text-align:center; font-size:14px;text-transform:none;font-family: 'myriad_web_proregular'; color:#FFFFFF; cursor:pointer;"  onclick="javascript:MoveTo('Trash', '<?php echo $converter->encode($get_retrive->RetriveNutTrashID($_SESSION['UserNutID']));?>');">Delete</a>
                                   <?php } ?>
                                   </div>
                            
								
							  </td>
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
                      </table>
					 </td>
                    
                  
                  </tr>
					<?php } ?>
                  
                  <tr>
                    <td class="f_white" colspan="6" style="height: 5px;padding:15px 0px 0px 0px"></td>
                  </tr>
                  
                   <?php $i=0;
						$i=$i+1;
						while($get_array = mysql_fetch_array( $retrive_Array )){?>
                             <tr id="tr_mail_<?php echo $i;?>" style="display:'';">
                                <td class="lightInboxbg1">
                                
                                 <input type="checkbox" name="chkTick" id="chkTick<?php echo $i?>" style="float:left; text-align:left; width:25px; margin-top:8px;"  onchange="javascript:UnselecMain(this);">
                                 
                                <input type="hidden" id="txtMailType<?php echo $i?>" name="txtMailType<?php echo $i?>" value="<?php echo $get_array['mail_type'];?>" style="width:150px;"/>

                        <input type="hidden" id="txtmailid<?php echo $i?>" name="txtmailid<?php echo $i?>" value="<?php echo $get_array['mail_id']?>" style="width:20px;"/>
                                </td>
                                
                                <?php
								 if ($get_array['mail_type']=="Nutritionist_Reply")
								{
									//$mail_id=GetValue("select mail_id as col from tbl_compose_nutritionist where comment_id=".$get_array['mail_id'], "col");	
									$complaint=GetValue("select subject as col from tbl_nutritionist_comments where comment_id=".$get_array['mail_id'], "col");
									$complaint=str_replace("\\","",$complaint);
								}
								else
								{
									$complaint=$get_array['complaint'];
									$complaint=str_replace("\\","",$complaint);
								}
								?>
                                
                                  <td class="lightInboxbg21" style="width:100px;">
							<a href="<?php echo $strHostName;?>/page_doctor.php?dir=inbox/detailed_mail&mail_id=<?php echo  $converter->encode($get_array['mail_id']);?>&mail_type=<?php echo  $converter->encode($get_array['mail_type']);?>">
							<?php echo truncate($complaint, 100);?></a>
					   </td>
                                
                                    
                                    <td class="lightInboxbg3"> 
                                       <a target="_blank" href="<?php echo $strHostName;?>/page_doctor.php?dir=nutritionist/details&patient_id=<?php echo $converter->encode($get_array['user_id']);?>&compose_id=<?php echo $converter->encode($get_array['mail_id']);?>&parent_id=<?php echo $converter->encode($get_array['user_id']);?>">
                                       
                                        <?php  
                                            echo $patient_name=GetValue("select name as col from tbl_users where user_id=".$get_array['user_id'], "col");
                                        ?>
                                        </a> 
                                    </td>
                            
                                
                                
                                
                                <td class="lightInboxbg4"><?php echo date('d-M-Y h:i:s',strtotime($get_array['created_date']))?> </td>
                               
                              </tr>
                             <tr>
                                <td class="f_white" colspan="6" style="height: 5px;"></td>
                             </tr>
                   <?php $i=$i+1; } ?>
                   
                    <input type="hidden" name="txtStatus" id="txtStatus" value="<?php echo $_GET['status']?>"  />
                   <input type="hidden" id="txtMailCount" name="txtMailCount" value="<?php echo $i?>"/>
                    <input type="hidden" name="totalDataCountLimit" id="totalDataCountLimit" value="" />
          <input type="hidden" name="totalLimit" id="totalLimit" value="" />
                 </table>
              </div>

              <?php if ($nume=="0" || $nume=="") { ?>
	<div style="float:left; padding:25px 0; text-align:center; width:80%; color:red;">Sorry! No mails are availble!</div>
<?php } ?>
				   <?php if ($page_count < $nume) { ?>
                     <div class="DvFloat">
                                    <div style="text-align: center; padding: 10px 0px; width: 967px; float: left; border: solid 0px #000000;">
                                      <div class="pagination_md">
                                      <?php echo $pagingLink ?>
                                        <div style="width: 22px; float: left; border: solid 0px #0066FF; padding: 0px; margin:-5px 0px 0px 0px; display:none;"><a href="#"><img src="images/prev_md_paging.png" alt="" title="" border="0" /></a></div>
                                        <div style="width: 740px; float: left; border: solid 0px #006600; display:none;"><span class="selected">1</span> <a href="#">2</a> <a href="#">3</a> <a href="#">4</a> <a href="#">5</a> <a href="#">6</a> <a href="#">7</a> </div>
                                        <div style="width: 22px;  float: left; border: solid 0px #0066FF; padding: 0px; margin:-5px 0px 0px 0px; display:none;"><a href="#"><img src="images/next_md_paging.png" alt="" title="" border="0" /></a></div>
                                      </div>
                                    </div>
                                  </div>
                    <?php } ?>
              
<center>
    <div id="dvAdd1" style="width: 100%; position: absolute;display: none;top: 0px;">
      <div id="saveform" style="width: 100%;top: 0px; position: absolute;"></div>
    </div>
</center>