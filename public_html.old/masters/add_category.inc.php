<script language="javascript" type="text/javascript">
function Validation() {

 
	if(document.getElementById("txtCategoryName").value == "") {
		alert("Please Enter Category Title...");
		document.getElementById("txtCategoryName").focus();
		return false;
	}
	
	 
}
</script>

<?php
$id="";  $category_name =""; $isdeleted=""; $isactive="1"; $createdate=date('d-m-Y h:i:s'); 
$updatedate=date('d-m-Y h:i:s'); 

?>
	<?php
		if(isset($_GET['cid'])) {
			$id = $converter->decode($_GET['cid']);
		
		}
		
		 if(isset($_SESSION['UserID']))
		 {
			$user_id=$_SESSION['UserID'];
		 }
		 else
		 {
			$user_id=0;
		 }
	 

	if(isset($_POST['btnSubmit'])) {
		$category_name = trim(str_replace("'", "''", $_POST['txtCategoryName']));

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
		
		$createdate=date('d-m-Y h:i:s');				
		$updatedate=date('d-m-Y h:i:s');
		
				
		 $data = array(
			'category_name' => $category_name,
			'isdeleted' => $isdeleted,
			'isactive'=>$isactive,
			'createdate' => $createdate,
			'updatedate' => $updatedate,
			
		);


		if($id == "" || $id==0) {
			$id = $db->insert_array(Category, $data);
					
			if (!$id) { 
				$db->print_last_error(false);
			} else {
				AlertandRedirect("New Category is added successfully", "page.php?dir=master/category/add");
			}
		} else {
			$rows = $db->update_array(Category, $data, "category_id = $id");
			if (!$rows) {
				$db->print_last_error(false);
			} else {
				if ($rows > 0) {
					AlertandRedirect('Category is edited successfully',  "page.php?dir=master/category/view");
				}
			}
		}
	} 
	else
	{
		$query = "SELECT * FROM ".Category." WHERE category_id = $id";
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
                      	 <h2 class="Tab_Title">Add Category</h2>
                     </label>
                    </div>
                    <div class="formcontrol2"> &nbsp; </div>
                  </div>
                  <div class="dvFloat formpadding1">
                    <div class="formlabel1">
                      <label class="formlabel1">Title<span class="redtxt">*</span> </label>
                    </div>
                    <div class="formcontrol2">
                      <input type="text" name="txtCategoryName" id="txtCategoryName" value="<?php echo $category_name;?>" />
                       <input id="txt_CategoryID" name="txt_CategoryID" value="" type="hidden"/>
                    </div>
                  </div>
                  
                  <div class="dvFloat formpadding1">
                    <div class="formlabel1">
                      &nbsp;
                    </div>
                    <div class="formcontrol2">
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
               


