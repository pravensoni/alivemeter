 <script type="text/javascript" src="<?php echo $strHostName;?>/js/datepickr.js"></script>
		
<script type="text/javascript">
function ChangeUserFoodDate()
{	
	var seldate=document.getElementById("ToPickupdate").value;
	var patient_id=document.getElementById("txtGetpatient_id").value;
	var parent_id=document.getElementById("txtGetparent_id").value;
	var compose_id=document.getElementById("txtGetcompose_id").value;
	 
	window.location.href=hostname+"/page_doctor.php?dir=nutritionist/details&patient_id="+patient_id+"&compose_id="+compose_id+"&parent_id="+parent_id+"&seldate="+seldate;
}

</script>
<?php 

	if(isset($_GET['patient_id'])){
		$patient_id=$converter->decode($_GET['patient_id']);
		/// for setting sesstion for user in iframe
		$_SESSION['UserID']=$patient_id;
	}
	else
	{
		$patient_id=0;
	}
	$j=1;

	$retrive_Array=array();$get_array=array();
	$retrive_Array_1=array();$get_array_1=array();
	$retrive_Array_2=array();$get_array_2=array();
	$retrive_Array_3=array();$get_array_3=array();
	$strDate='';
	
$date=date('Y-m-d');
if(isset($_GET['seldate']))
{
	$date=date('Y-m-d', strtotime($_GET['seldate']));
	
}


	if(isset($_GET['patient_id'])){
		$Newpatient_id=$_GET['patient_id'];
		 
	}
	else
	{
		$Newpatient_id=0;
	}

	if(isset($_GET['compose_id'])){
		$compose_id=$_GET['compose_id'];
		 
	}
	else
	{
		$compose_id=0;
	}

	if(isset($_GET['parent_id'])){
		$parent_id=$_GET['parent_id'];
		 
	}
	else
	{
		$parent_id=0;
	}

$retrive_Array=$get_retrive->getReceipe($patient_id,'Breakfast',$date);
$retrive_Array_1=$get_retrive->getReceipe($patient_id,'Lunch',$date);
$retrive_Array_2=$get_retrive->getReceipe($patient_id,'Snacks',$date);
$retrive_Array_3=$get_retrive->getReceipe($patient_id,'Dinner',$date);


?>
<div class="dvWrapper" style=" border: solid 0px #003366; padding-top:0px;">
 <div class="DvFloat" style="padding:0px 0px; margin:10px 0px;">
	<div style="float:left;width:84px; padding:8px 0;">
	 	 Choose Date: 
	</div>
	<div style="float:left;width:142px;">
		<input type="text" name="ToPickupdate"  id="ToPickupdate" size="50" value="<?php echo $date;?>" style="text-transform:uppercase; color:#666; width:150px;" />

		<input type="hidden" name="txtGetpatient_id"  id="txtGetpatient_id" size="50" value="<?php echo $Newpatient_id;?>" style="text-transform:uppercase; color:#666; width:150px;" />

		<input type="hidden" name="txtGetcompose_id"  id="txtGetcompose_id" size="50" value="<?php echo $compose_id;?>" style="text-transform:uppercase; color:#666; width:150px;" />

		<input type="hidden" name="txtGetparent_id"  id="txtGetparent_id" size="50" value="<?php echo $parent_id;?>" style="text-transform:uppercase; color:#666; width:150px;" />
	 </div>
	<div style="float:left;width:100px; margin:0 25px;">
	 	 <a href="javascript:ChangeUserFoodDate();" class="button1" style="padding:3px; text-align:center; height:23px; margin-top:0px; width:105px;">Search</a>
	</div>
    
 </div>                                      

  <div style="width: 70%; float: left; border: solid 0px #009900; padding-left: 250px;">
	<div class="DvFloat" style="padding:0px 0px;">
	  <ul id="nutri_fc_tab" class="calorie_tab">
		<li><a href="#" rel="tabs1" class="selected">Breakfast</a></li>
		<li><a href="#" rel="tabs2">Lunch </a></li>
		<li><a href="#" rel="tabs3">Snacks </a></li>
		<li><a href="#" rel="tabs4">Dinner</a></li>
		
	  </ul>
	</div>
	<div style="border: 0px solid gray; width: 692px; float: left; margin-bottom: 1em; padding: 10px 0px 10px 0px; margin-left: -100px; background-color: #FFFFFF; color: #666666;">
	  <div id="tabs1">
		 <div style="width:692px; border:solid 0px red;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td style="width: 470px; background-color: #c8cccc; padding: 5px 0px 5px 12px; font-size: 14px;">Food</td>
				<td style="width: 50px; background-color: #c8cccc; text-align: left;">Qty</td>
				<td style="width: 80px; background-color: #c8cccc; text-align: left;">Portion</td>
			  </tr>			
			 <?php  while($get_array = mysql_fetch_array( $retrive_Array )){?>
			  <tr>
				<td style="width: 470px; background-color: #f0f0f0; padding: 5px 0px 5px 12px; font-size: 14px;"><?php echo $get_array['receipe_name']?> </td>
				<td style="width: 50px; background-color: #f0f0f0; text-align: left;"><?php echo $get_array['qunty']?></td>
				<td style="width: 80px; background-color: #f0f0f0; text-align: left;"><?php echo $get_array['portion']?></td>
			  </tr>
			  <?php } ?>
			  
			</table>
		 </div>
	  </div>
	  <div id="tabs2" class="calorie_tabcontent">
						  <div style="width:692px; border:solid 0px red;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td style="width: 470px; background-color: #c8cccc; padding: 5px 0px 5px 12px; font-size: 14px;">Food</td>
				<td style="width: 50px; background-color: #c8cccc; text-align: left;">Qty</td>
				<td style="width: 80px; background-color: #c8cccc; text-align: left;">Portion</td>
			  </tr>			
			 <?php  while($get_array_1 = mysql_fetch_array( $retrive_Array_1 )){?>
			  <tr>
				<td style="width: 470px; background-color: #f0f0f0; padding: 5px 0px 5px 12px; font-size: 14px;"><?php echo $get_array_1['receipe_name']?> </td>
				<td style="width: 50px; background-color: #f0f0f0; text-align: left;"><?php echo $get_array_1['qunty']?></td>
				<td style="width: 80px; background-color: #f0f0f0; text-align: left;"><?php echo $get_array_1['portion']?></td>
			  </tr>
			  <?php } ?>
			  
			</table>
		 </div>
	  </div>
	  <div id="tabs3" class="calorie_tabcontent">
						 <div style="width:692px; border:solid 0px red;">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td style="width: 470px; background-color: #c8cccc; padding: 5px 0px 5px 12px; font-size: 14px;">Food</td>
				<td style="width: 50px; background-color: #c8cccc; text-align: left;">Qty</td>
				<td style="width: 80px; background-color: #c8cccc; text-align: left;">Portion</td>
			  </tr>			
			 <?php  while($get_array_2 = mysql_fetch_array( $retrive_Array_2 )){?>
			  <tr>
				<td style="width: 470px; background-color: #f0f0f0; padding: 5px 0px 5px 12px; font-size: 14px;"><?php echo $get_array_2['receipe_name']?> </td>
				<td style="width: 50px; background-color: #f0f0f0; text-align: left;"><?php echo $get_array_2['qunty']?></td>
				<td style="width: 80px; background-color: #f0f0f0; text-align: left;"><?php echo $get_array_2['portion']?></td>
			  </tr>
			  <?php } ?>
			  
			</table>
		 </div>
	  </div>
	  <div id="tabs4" class="calorie_tabcontent">
						 <div style="width:692px; border:solid 0px red;">
		 <table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td style="width: 470px; background-color: #c8cccc; padding: 5px 0px 5px 12px; font-size: 14px;">Food</td>
				<td style="width: 50px; background-color: #c8cccc; text-align: left;">Qty</td>
				<td style="width: 80px; background-color: #c8cccc; text-align: left;">Portion</td>
			  </tr>			
			 <?php  while($get_array_3 = mysql_fetch_array( $retrive_Array_3 )){?>
			  <tr>
				<td style="width: 470px; background-color: #f0f0f0; padding: 5px 0px 5px 12px; font-size: 14px;"><?php echo $get_array_3['receipe_name']?> </td>
				<td style="width: 50px; background-color: #f0f0f0; text-align: left;"><?php echo $get_array_3['qunty']?></td>
				<td style="width: 80px; background-color: #f0f0f0; text-align: left;"><?php echo $get_array_3['portion']?></td>
			  </tr>
			  <?php } ?>
			  
			</table>
		 </div>
	  </div>
	  
	  
	  
	  
	</div>
  </div>
</div>
<script type="text/javascript">
	new datepickr('ToPickupdate', {
		'dateFormat': 'Y-m-d',
	});

</script>