<?php include "../includes/common.inc.php";?>
<?php
	$page=1;$page_count=100;$newpagenumber="2";$retrive_Array=array();$get_array=array();
	if(isset($_GET['page'])){
		$page=$_GET['page'];
	}
	else
	{
		$page=1;
	}
	
	if(isset($_GET['type'])){
		$type=($_GET['type']);
	}
	else
	{
		$type="";
	}

	if(isset($_SESSION['UserID']))
	{
		$user_id=$_SESSION['UserID'];
	}

	$retrive_Array=$get_retrive->GetDoctor($page_count,0,$type);
	$nume=$get_retrive->Get_Doctor_Count();

	
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
	$pagingLink = getPagingLinkBackEndFrontEnd($nume,$page_count,'dir=master/doctor/add',$newpagenumber,$strHostName."/page.php");
	
	
	$mtype= $converter->decode($_GET['type']);
	

?>


<table cellpadding="0" cellspacing="0"  style="width:100%" >
	  <tr>
		<td class="tbl_head" style="width:150px;"><?php echo $type;?> Name </td>
		<td class="tbl_head">Hospital Name </td>
		<td class="tbl_head">Specialization</td>
        <td class="tbl_head">Email ID</td>
        <td class="tbl_head">Password</td>
        <td class="tbl_head" style="display:none;">Clients Count</td>
		<td class="tbl_head">Actions</td>
	  </tr>
        
      
	  <?php  while($get_array = mysql_fetch_array( $retrive_Array )){
	  		$hosp_name=GetValue("select hospital_name as col from tbl_hospital_master where hospital_id=".$get_array['hospital_name'], "col");
			$specialization=GetValue("select specialization_name as col from tbl_specialization where specialization_id=".$get_array['specialization'], "col");
	  ?>
	 
      <tr id="tr_doctor_<?php echo $get_array['doctor_id']*121?>">
		<td class="tdborder" style="padding-left:20px;"><?php echo $get_array['doctor_name']?> </td>
		<td class="tdborder" style="padding-left:20px;"><?php echo $hosp_name;?></td>
        <td class="tdborder" style="padding-left:20px;"><?php echo $specialization;?></td>
        <td class="tdborder" style="padding-left:20px;"><?php echo $get_array['email'];?></td>
        <td class="tdborder" style="padding-left:20px;"><?php echo $get_array['password'];?></td>
         <td class="tdborder" style="padding-left:20px; display:none;"><?php echo $get_array['user_count'];?></td>
		<td class="tdborder" style="padding-left:20px;">
		<table cellpadding="0" cellspacing="0"  style="width:100%" >
			<tr>
			 
			  <td class="SubTd1"><a style="cursor:pointer;" onclick="javascript:Doctor_Retrive_By_Id('<?php echo  $converter->encode($get_array['doctor_id'])?>')"><img src="images/register_steps/edit_icon.jpg" alt=""></a></td>
			  <td class="SubTd2" style="display:none"><a  style="cursor:pointer;" onclick="javascript:Doctor_Delete_By_Id('<?php echo $converter->encode($get_array['doctor_id'])?>','<?php echo $get_array['doctor_id']*121?>')"><img src="images/register_steps/delete_icon.jpg" alt=""></a></td>
			</tr>
		  </table></td>

	  </tr>
     
	  <?php  } ?>
     
	 <?php if($nume=="0" || $nume=="") { ?>
      <tr>
		<td colspan="6" style="border:solid 0px red; display:none; text-align:center; color:red; ">
			Sorry! This list is empty.
		</td>
	  </tr>
      <?php } ?>
      <tr>
		<td colspan="6" style="border:solid 1px red; display:none;">
			 <?php echo $pagingLink ?>
		</td>
	  </tr>
</table>
