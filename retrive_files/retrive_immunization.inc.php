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
	$retrive_Array=$get_retrive->Get_Immunization($page_count,0,$user_id);
	$nume=$get_retrive->Get_Immunization_Count($user_id);
	
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
	$pagingLink = getPagingLinkBackEndFrontEnd_ajax($nume,$page_count,'',$newpagenumber, "Immunization");
?>
 <?php if($_SESSION['UserType']=="Doctor" || $_SESSION['UserType']=="MD" || $_SESSION['UserType']=="Nutritionist"){ ?>
 <style>
 .tdborder
 {
 	padding:10px 5px;
	vertical-align: middle;
	border-bottom:solid 1px #e4e4e4;
 }
 </style>
 <?php } ?>
<table cellpadding="0" cellspacing="0"  style="width:100%" >
                      <tr>
                        <td class="tbl_head" >Name</td>
                        <td class="tbl_head">Administered Date </td>
                       <?php if($_SESSION['UserType']!="Doctor" && $_SESSION['UserType']!="MD" && $_SESSION['UserType']!="Nutritionist"){ ?>
                           <td class="tbl_head">Actions</td>
                       <?php } ?>
                      </tr>
                       <?php  while($get_array = mysql_fetch_array( $retrive_Array )){?>
                           <tr id="tr_immunization_<?php echo $get_array['immunization_id']*121?>">
                            <td class="tdborder" style="padding-left:10px;"><?php echo str_replace("\\","",$get_array['immunization_name']);?></td>
                            <td class="tdborder" style="padding-left:10px;"><?php echo date('d-M-Y',strtotime($get_array['administered_date']))?> </td>
                            <?php if($_SESSION['UserType']!="Doctor" && $_SESSION['UserType']!="MD" && $_SESSION['UserType']!="Nutritionist"){ ?>
                            <td class="tdborder" style="padding-left:10px;"><table cellpadding="0" cellspacing="0"  style="width:100%" >
                               <tr>
                                  <td class="SubTd" style="display:none;"><a class="fancybox-manual-c" style="cursor: pointer;"><img src="images/register_steps/view_icon.jpg" alt=""></a></td>
                                  <td class="SubTd1">
                                    <?php if($_SESSION['UserType']!="Doctor" && $_SESSION['UserType']!="MD" && $_SESSION['UserType']!="Nutritionist"){ ?>
                                     <a style="cursor:pointer;" id="editbtn_immu<?php echo $get_array['immunization_id']*121?>" onclick="javascript:Immunization_Retrive_By_Id('<?php echo  $converter->encode($get_array['immunization_id'])?>','<?php echo  $get_array['immunization_id']*121?>')"><img src="images/register_steps/edit_icon.jpg" alt=""></a>
                              
                               <a style="cursor:pointer; display:none;" id="rededitbtn_immu<?php echo $get_array['immunization_id']*121?>" onclick="javascript:Immunization_Retrive_By_Id('<?php echo  $converter->encode($get_array['immunization_id'])?>','<?php echo  $get_array['immunization_id']*121?>')"><img src="images/register_steps/edit_icon_red.png" alt=""></a>
              						 <?php } else { ?>
                              <a style="cursor:pointer; display:none;" id="editbtn_immu<?php echo $get_array['immunization_id']*121?>" onclick="javascript:Immunization_Retrive_By_Id('<?php echo  $converter->encode($get_array['immunization_id'])?>','<?php echo  $get_array['immunization_id']*121?>')"><img src="images/register_steps/view_icon.jpg" alt=""></a>
                               <?php } ?>
                                    
                                    </td>
                                  <?php if($_SESSION['UserType']!="Doctor" && $_SESSION['UserType']!="MD" && $_SESSION['UserType']!="Nutritionist"){ ?>
                                   <td class="SubTd2"><a  href="#" onclick="javascript:Immunization_Delete_By_Id('<?php echo  $converter->encode($get_array['immunization_id'])?>','<?php echo $get_array['immunization_id']*121?>')"><img src="images/register_steps/delete_icon.jpg" alt=""></a></td>
                                     <?php } ?>
                                </tr>
                              </table></td>
                              <?php } ?>
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