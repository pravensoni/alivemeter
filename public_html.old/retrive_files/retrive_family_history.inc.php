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
	$retrive_Array=$get_retrive->Get_Family_History($page_count,0,$user_id);
	$nume=$get_retrive->Get_Family_History_Count($user_id);
	
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
	$pagingLink = getPagingLinkBackEndFrontEnd_ajax($nume,$page_count,'',$newpagenumber, "Family_History");
?>

<table cellpadding="0" cellspacing="0"  style="width:100%" >
                      <tr>
                        <td class="tbl_head" >Relation</td>
                        <td class="tbl_head">Medical Condition</td>
                        <td class="tbl_head">Actions</td>
                      </tr>
                       <?php  while($get_array = mysql_fetch_array( $retrive_Array )){?>
                        <tr id="tr_family_history_<?php echo $get_array['family_history_id']*121?>">
                        <td class="tdborder" style="padding-left:20px;">
							<?php echo str_replace("\\","",$get_array['relation_id']);?>		
                             <?php 
							 	//echo $relation=GetValue("select relation_name as col from tbl_relation where relation_id=".$get_array['relation_id'], "col");
							 ?>       
                        </td>
                        <td class="tdborder" style="padding-left:20px;"><?php echo str_replace("\\","",$get_array['medical_condition']);?> </td>
                        <td class="tdborder" style="padding-left:20px;"><table cellpadding="0" cellspacing="0"  style="width:100%" >
                           <tr>
                                  <td class="SubTd" style="display:none;"><a class="fancybox-manual-c" style="cursor: pointer;"><img src="images/register_steps/view_icon.jpg" alt=""></a></td>
                                  <td class="SubTd1">
                                 
                                    <a style="cursor:pointer;" id="editbtn_fam<?php echo $get_array['family_history_id']*121?>" onclick="javascript:Family_History_Retrive_By_Id('<?php echo  $converter->encode($get_array['family_history_id'])?>','<?php echo  $get_array['family_history_id']*121?>')"><img src="images/register_steps/edit_icon.jpg" alt=""></a>
                               
                               <a style="cursor:pointer; display:none;" id="rededitbtn_fam<?php echo $get_array['family_history_id']*121?>" onclick="javascript:Family_History_Retrive_By_Id('<?php echo  $converter->encode($get_array['family_history_id'])?>','<?php echo  $get_array['family_history_id']*121?>')"><img src="images/register_steps/edit_icon_red.png" alt=""></a>
                                  </td>
                                  <td class="SubTd2"><a  href="#" onclick="javascript:Family_History_Delete_By_Id('<?php echo  $converter->encode($get_array['family_history_id'])?>','<?php echo $get_array['family_history_id']*121?>')"><img src="images/register_steps/delete_icon.jpg" alt=""></a></td>
                                </tr>
                          </table></td>
                      </tr>
                      
                      <?php  } ?>
                      <?php if($nume=="0") { ?>
      <tr>
		<td colspan="3" style="text-align:center; color: #009999; font-size:14px; font-weight: bold;">
			<p style="padding:30px 0 0px 0;">No current data! Organize all your medical records here...</p>
		</td>
  </tr>
     <?php } ?>
        <?php if ($page_count < $nume) { ?>
	  <tr>
		<td colspan="3" style="display:''; text-align:center; padding:5px 0;">
			<?php echo $pagingLink ?>
		</td>
	  </tr>
     <?php } ?>
                      
                    </table>