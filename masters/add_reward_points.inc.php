<script language="javascript" type="text/javascript">
function Validation() {

 
	if(document.getElementById("txtCouponsCode").value == "") {
		alert("Please Enter Coupons Code...");
		document.getElementById("txtCouponsCode").focus();
		return false;
	}
	if(document.getElementById("txtTotalCoupons").value == "") {
		alert("Please Enter Total Coupons...");
		document.getElementById("txtTotalCoupons").focus();
		return false;
	}
	if (document.getElementById("fulUpload").value =="" && document.getElementById("txtImg").value =="")
		{
		alert("Please choose Picture.");
		return false;
		}
	if(document.getElementById("txtDescription").value == "") {
		alert("Please Enter Description...");
		document.getElementById("txtDescription").focus();
		return false;
	}
	if(document.getElementById("txtReedemPoints").value == "") {
		alert("Please Enter Reedem Points...");
		document.getElementById("txtReedemPoints").focus();
		return false;
	}
	 
}
</script>

<?php
$id=""; $reward_points_id=""; $coupons_code="";  $total_coupons =""; $image=""; $description=""; $reedem_points=""; $file="";  $isdeleted=""; $isactive="1"; 

?>
	<?php
		if(isset($_GET['cid'])) {
			$id = $converter->decode($_GET['cid']);
		}

	if(isset($_POST['btnSubmit'])) {
		$coupons_code = trim(str_replace("'", "''", $_POST['txtCouponsCode']));
		$total_coupons = trim(str_replace("'", "''", $_POST['txtTotalCoupons']));
		$image = $_FILES['fulUpload']['name'];
		$file=trim(str_replace("'", "", $_POST['txtImg']));
		if($image !="")
		 {
		 	uploadFile('fulUpload','top_stories/','');
		 }
		 else
		 {
		 	if($_POST['image']!="")
			{
				$image =$_POST['image'];
			}
			else
			{
				$image="noimage.gif";
			}
			
		 }
		$description = trim(str_replace("'", "''", $_POST['txtDescription']));
		$reedem_points = trim(str_replace("'", "''", $_POST['txtReedemPoints']));

		if(isset($_POST['chkIsDeleted']))
		{
			$isdeleted = $_POST['chkIsDeleted'];
		}
		if($isdeleted == "on") {
			$isdeleted = 1;
		} else {
			$isdeleted = 0;
		}

		if(isset($_POST['chkIsActive']))
		{
			$isactive = $_POST['chkIsActive'];
		}
		if($isactive == "on") {
			$isactive = 1;
		} else {
			$isactive = 0;
		}
		
		
		
				
		 $data = array(
			'coupons_code' => $coupons_code,
			'total_coupons' => $total_coupons,
			'image' => $image,
			'description' => $description,
			'reedem_points' => $reedem_points,
			'isdeleted' => $isdeleted,
			'isactive'=>$isactive,
					
		);


		if($id == "" || $id==0) {
			$id = $db->insert_array(Reward_Points, $data);
					
			if (!$id) { 
				$db->print_last_error(false);
			} else {
				AlertandRedirect("New Reward Points are added successfully", "page.php?dir=master/reward_points/add");
			}
		} else {
			$rows = $db->update_array(Reward_Points, $data, "reward_points_id = $id");
			if (!$rows) {
				$db->print_last_error(false);
			} else {
				if ($rows > 0) {
					AlertandRedirect('Reward Points are edited successfully',  "page.php?dir=master/reward_points/view");
				}
			}
		}
	} 
	else
	{
		$query = "SELECT * FROM ".Reward_Points." WHERE reward_points_id = $id";
		//echo $query;
		$result = mysql_query($query);
		if($result != "") {
			$rowcount = mysql_num_rows($result);
			if($rowcount > 0) {
				while($row = mysql_fetch_assoc($result)) {
					extract($row);
					
				}
			}
		}
		$mode = "edit";
	}
	
?>
<form class="form-horizontal" method="post" enctype="multipart/form-data"  onSubmit="javascript:return Validation()">
	<div  style="width:99%; border:solid 0px red;">
                 <div class="dvFloat formpadding1" style="padding-top:20px">
                    <div class="formlabel1">
                      <label class="formlabel1" style="padding-left:0px; padding-bottom:15px;">
                      	 <h2 class="Tab_Title">Add Rewards Points</h2>
                     </label>
                    </div>
                    <div class="formcontrol2"> &nbsp; </div>
                  </div>
                  <div class="dvFloat formpadding1">
                    <div class="formlabel1">
                      <label class="formlabel1">Coupons Code<span class="redtxt">*</span> </label>
                    </div>
                    <div class="formcontrol2" style="padding-top:8px;">
                      <input type="text" name="txtCouponsCode" id="txtCouponsCode" value="<?php echo $coupons_code;?>" />
                    </div>
                    <div class="dvFloat">
                    <div class="formlabel1">
                      <label class="formlabel1">Total Coupons<span class="redtxt">*</span> </label>
                    </div>
                    <div class="formcontrol2" style="padding-top:8px;">
                      <input type="text" name="txtTotalCoupons" id="txtTotalCoupons" value="<?php echo $total_coupons;?>" />
                    </div>
                    </div>
                    <div class="formlabel1">
                      <label class="formlabel1">Image<span class="redtxt">*</span> </label>
                    </div>
                    <div class="formcontrol2" style="padding-top:8px;">
                      <input type="file" name="fulUpload" id="fulUpload" style="width:35%; float:left;"   />
                      <input type="hidden" name="txtImg" id="txtImg" value="<?php echo $image;?>">
                      <?php if($image !="") { ?>
                 		&nbsp;<a target="_blank" href="<?php echo $strHostName;?>/top_stories/<?php echo $image?>"><img src="<?php echo $strHostName;?>/top_stories/<?php echo $image?>"style="width:50px; height:50px; border:solid 1px #CCCCCC;"/></a>&nbsp; <a href="javascript:RemoveFile('txtFile');"></a>
                     <?php } ?>
                    </div>
                    <div class="dvFloat">
                    <div class="formlabel1">
                      <label class="formlabel1">Description<span class="redtxt">*</span> </label>
                    </div>
                     <div class="formcontrol2" style="padding-top:8px;" >
                      <textarea name="txtDescription" id="txtDescription" style="width:230px;"><?php echo $description;?></textarea>
                    </div>
                    </div>
                    <div class="formlabel1" >
                      <label class="formlabel1">Reedem Points<span class="redtxt">*</span> </label>
                    </div>
                    <div class="formcontrol2" style="padding-top:8px;">
                      <input type="text" name="txtReedemPoints" id="txtReedemPoints" value="<?php echo $reedem_points;?>" />
                    </div>
                  </div>
                  
                  <div class="dvFloat formpadding1">
                    <div class="formlabel1">
                      &nbsp;
                    </div>
                    <div class="formcontrol2" style="padding-top:8px;">
                      <div class="dvFL" style="font-size:13px;">
                        	<input type="checkbox" id="chkIsActive" name="chkIsActive" <?php if($isactive == 1) { echo "checked"; } ?> style="width:40px;"/>&nbsp;Check here, if want to <strong>"Active"</strong> this record.
                        </div>
                       <div class="dvFL" style="font-size:13px;">
                        	<input type="checkbox" id="chkIsDeleted" name="chkIsDeleted" <?php if($isdeleted == 1) { echo "checked"; } ?> style="width:40px;"/>&nbsp;Check here, if want to <strong>"Delete"</strong> this record.
                        </div>
                        
                    </div>
                  </div>
                  
                  
                 
                  <div class="dvFloat formpadding1"  style="padding:10px 0px 25px 0px">
                    <div class="formlabel1"> &nbsp; </div>
                    <div class="formcontrol2">
                    	
                    	
                      <div style=" width:84px; height:30px; float:left;padding-right:10px;"> 
                      	 <input type="submit" id="btnSubmit" name="btnSubmit" value="Submit" class="button4"/>
                      </div>
                     	  
                   </div>
                  </div>
                 	
                 </div>
</form>
               


