<?php include "../includes/common.inc.php";?>
<?php
	$page=1;$page_count=5;$newpagenumber="2";$retrive_Array=array();$get_array=array();
	if(isset($_GET['page'])){
		$page=$_GET['page'];
	}
	else
	{
		$page=1;
	}
	if(isset($_SESSION['UserID']))
	{
		$user_id=$_SESSION['UserID'];
	}
	$retrive_Array=$get_retrive->Get_Sugar_Profile($page_count,0,$user_id);
	$nume=$get_retrive->Get_Sugar_Profile_Count($user_id);
	
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
	$pagingLink = getPagingLinkBackEndFrontEnd_ajax($nume,$page_count,'',$newpagenumber, "Sugar_Profile");
?>
<table cellpadding="0" cellspacing="0"  style="width:100%" >
                              <tr>
                                  <td class="tbl_head">Date</td>
                                  <td class="tbl_head">Fasting Blood Sugar</td>
                                  <td class="tbl_head">Post Parandial (PPBS)</td>
                                  <td class="tbl_head">Urine Blood Sugar</td>
                                  <td class="tbl_head">Random Blood Sugar</td>
                                  <td class="tbl_head">Actions</td>
                               </tr>
                              <?php  while($get_array = mysql_fetch_array( $retrive_Array )){?>
                               <tr id="tr_sugar_profile_<?php echo $get_array['sugar_profile_id']*121?>">
                                  <td class="tdborder" style="padding-left:20px;"><?php echo date('d-M-Y',strtotime($get_array['fasting_blood_sugar_date']));?></td>
                                  <td class="tdborder" style="padding-left:20px;"><?php echo str_replace("\\","",$get_array['fasting_blood_sugar_result']);?></td>
                                  <td class="tdborder" style="padding-left:20px;"><?php echo str_replace("\\","",$get_array['post_parandial_result']);?></td>
                                  <td class="tdborder" style="padding-left:20px;"><?php echo str_replace("\\","",$get_array['urine_blood_result']);?></td>
                                  <td class="tdborder" style="padding-left:20px;"><?php echo str_replace("\\","",$get_array['random_blood_sugar_result']);?></td>
                              <td class="tdborder" style="padding-left:20px;"><table cellpadding="0" cellspacing="0"  style="width:100%" >
                                    <tr>
			  <td class="SubTd" style="display:none;"><a class="fancybox-manual-c" style="cursor: pointer;"><img src="images/register_steps/view_icon.jpg" alt=""></a></td>
			  <td class="SubTd1">
              
              <a style="cursor:pointer;" id="editbtn_Sugar<?php echo $get_array['sugar_profile_id']*121?>" onclick="javascript:Sugar_Profile_Retrive_By_Id('<?php echo  $converter->encode($get_array['sugar_profile_id'])?>', '<?php echo  $get_array['sugar_profile_id']*121?>')"><img src="images/register_steps/edit_icon.jpg" alt=""></a>
                               
                               <a style="cursor:pointer; display:none;" id="rededitbtn_Sugar<?php echo $get_array['sugar_profile_id']*121?>" onclick="javascript:Sugar_Profile_Retrive_By_Id('<?php echo  $converter->encode($get_array['sugar_profile_id'])?>','<?php echo  $get_array['sugar_profile_id']*121?>')"><img src="images/register_steps/edit_icon_red.png" alt=""></a>
                               
              	
                
                </td>
			  <td class="SubTd2"><a style="cursor:pointer;" onclick="javascript:Sugar_Profile_Delete_By_Id('<?php echo  $converter->encode($get_array['sugar_profile_id'])?>','<?php echo $get_array['sugar_profile_id']*121?>')"><img src="images/register_steps/delete_icon.jpg" alt=""></a></td>
			</tr>
                                  </table>
                                  </td>
                              </tr>
                               <?php  } ?>
                             <?php if($nume=="0") { ?>
      <tr>
		<td colspan="6" style="text-align:center; color: #009999; font-size:14px; font-weight: bold;">
			<p style="padding:30px 0 0px 0;">No current data! Organize all your medical records here...</p>
		</td>
  </tr>
     <?php } ?>
       <?php if ($page_count < $nume) { ?>
	  <tr>
		<td colspan="6" style="display:''; text-align:center; padding:5px 0;">
			<?php echo $pagingLink ?>
		</td>
	  </tr>
     <?php } ?>
                            </table>