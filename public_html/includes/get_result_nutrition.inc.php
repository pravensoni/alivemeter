<?php include 'common.inc.php'?>
<link href="<?php echo $strHostName;?>/style/main.css" rel="stylesheet" type="text/css">
<link href="<?php echo $strHostName;?>/style/reset.css" rel="stylesheet" type="text/css">
<link href="<?php echo $strHostName;?>/style/fonts.css" rel="stylesheet" type="text/css">
<link href="<?php echo $strHostName;?>/style/bxslider1.css" rel="stylesheet" type="text/css">
<link href="<?php echo $strHostName;?>/style/jupiter.css" rel="stylesheet" type="text/css">
<link href="<?php echo $strHostName;?>/css/main_new.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="<?php echo $strHostName;?>/css/style.css" />
<link href="<?php echo $strHostName;?>/style/bhupali.css" rel="stylesheet" type="text/css">
<link href="<?php echo $strHostName;?>/style/paging_md.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="<?php echo $strHostName?>/js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo $strHostName?>/js/ddaccordion.js"></script>
<script type="text/javascript" src="<?php echo $strHostName?>/js/common.js"></script>
<script type="text/javascript" src="<?php echo $strHostName?>/js/health_steup_validation.js"></script>
<script type="text/javascript" src="<?php echo $strHostName?>/js/health_steup_insert_retrive.js"></script>
<script type="text/javascript" src="<?php echo $strHostName?>/js/calories_steup3_validation.js"></script>
<script type="text/javascript">
ddaccordion.init({
headerclass: "mypetsA", 
contentclass: "thepetA",
collapseprev: true, 
defaultexpanded: [],
animatedefault: false,
persiststate: false, 
toggleclass: ["", "openpet"], 
togglehtml: ["none", "", ""], 
animatespeed: "fast", 
oninit:function(headers, expandedindices){ 
	 for (var i=0; i<expandedindices.length; i++){
		var expandedindex=expandedindices[i] 
		headers[expandedindex].style.backgroundColor=''
		headers[expandedindex].style.color='#666666'
	 }
}
})
</script>
<script type="text/javascript" src="<?php echo $strHostName;?>/js/cal.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
	$(".trigger").click(function(){
	$(".panel").toggle("fast");
	$(this).toggleClass("active");
	return false;
	});
	});
</script>
<style type="text/css">
.mypetsA {width:20px;color: #666666;
font-weight:bold; background:#f0f0f0 url(../images/calorie_setup/brkfast_side_arrow.png) no-repeat; background-position:99% 50%; border:solid 0px red; height:45px; z-index:1000;position:relative;}
.openpet {color:#666;background:#f0f0f0 url(../images/calorie_setup/brkfast_arrow.png) no-repeat; background-position:99% 50%; border:solid 0px green; height:45px; z-index:1000;}
.thepetA {color:#666666;padding:5px 0px;}
b {font-weight:bold}
</style>
<link rel="stylesheet" type="text/css" href="<?php echo $strHostName?>/style/calorie_tabcontent1.css" />

<?php


$total_cal="0";$total_carb="0";$total_fat="0";$total_prot="0";$total_sod="0";$total_sugar="0";
$total_food_cal="0"; $total_food_carb="0"; $total_food_fat="0"; $total_food_prot="0"; $total_food_sod="0"; $total_food_sugar="0"; 

//Alert (isset($_GET['alivey']));
$date=$_GET['date'];
//$todate=date("Y-m-d");
	
	
//Alert ($date);


$Rec_daily_updates=0;
$Receipe_id=0;
$type=$_GET['type'];

if($type=="BreakFast")
{
$Receipe_id=$_GET['Receipe_id'];
}
if($type=="Lunch")
{
$Receipe_id=$_GET['LReceipe_id'];
}

if($type=="Snacks")
{
$Receipe_id=$_GET['SReceipe_id'];
}

if($type=="Dinner")
{
$Receipe_id=$_GET['DReceipe_id'];
}

if(isset($_SESSION['UserID']))
{
	$user_id=$_SESSION['UserID'];
}
else
{
	$user_id=0;
}

//Alert ($Receipe_id);
$Rec_daily_updates=$Receipe_id;

if($Receipe_id!="0" && $Receipe_id!="")
{
	$receipes = explode(",", $Receipe_id);
	foreach($receipes as $receipe) {
		///Checks
		if($receipe > 0){
			$ReceipeCount=GetValue("select count(*) as col from tbl_daily_food where user_id=".$user_id." and receipe_id=".$receipe." and date='".$date."' and type='".$type."'", "col");
			 
			if ($ReceipeCount<=0)
			{
				$sql="insert into tbl_daily_food (receipe_id, user_id, date, type, qty, energy, carbo, protein, total_fat, fibre, sodium, pufa, mufa, transfat, potassium, vt_a, vt_b1, vt_b2, vt_b3, vt_b6, vt_c, vt_e, iron, calcium, zinc, phosphorous, sugar)
	SELECT $receipe , $user_id, '$date',  '$type', 1, sum(energy), 
	sum(carbo), sum(protein), sum(total_fat), sum(fibre), sum(sodium), sum(pufa),
	sum(mufa), sum(transfat), sum(potassium), sum(vt_a), sum(vt_b1), sum(vt_b2),
	sum(vt_b3), sum(vt_b6), sum(vt_c), sum(vt_e), sum(iron), sum(calcium), sum(zinc), sum(phosphorous), sum(sugar)
	FROM tbl_recipe_det
	WHERE parent_id =$receipe
	Group by Parent_id";	
				mysql_query($sql);
				echo $recipe;
				$sql="Select * from tbl_user_food_history t where t.user_id = $user_id ";
				mysql_query($sql);
				if(mysql_num_rows($sql) > 0){
					echo "User has stored some food items";
				}
				else{
					echo "No food items stored";
				}
				//echo $sql;
			}
		}
		
	}
	
}



$keywords="0";
//Alert ($date);
	
	//$query = "SELECT * FROM tbl_daily_food WHERE  user_id=".$user_id." and date=CURDATE() and type='".$type."'";

$query = "SELECT * FROM tbl_daily_food WHERE  user_id=".$user_id." and date='".$date."' and type='".$type."' order by id desc";
$result = mysql_query($query);
if($result != "") {
$rowcount = mysql_num_rows($result);
	if($rowcount > 0) {	
		while($row = mysql_fetch_assoc($result)) {
		$name=GetValue("select name as col from tbl_recipe where id=".$row['receipe_id'], "col");	
		$portion=GetValue("select portion as col from tbl_recipe where id=".$row['receipe_id'], "col");		
	$keywords="0";

	$query_key = "SELECT  distinct a.ingredientname FROM tbl_raw a inner join tbl_recipe_det b on a.id=b.key_id where parent_id=".$row['receipe_id'];
	$result_key = mysql_query($query_key);
	if($result_key != "") {
	$rowcount_key = mysql_num_rows($result_key);
		if($rowcount_key > 0) {	
			while($row_key = mysql_fetch_assoc($result_key)) {
				$keywords=$keywords.", ".$row_key['ingredientname'];
			}
		}
	}

	if($keywords!="" && $keywords!="0")
	{
		$keywords=substr($keywords,2);
	}
	else
	{
		$keywords="";
	}

//Alert ($rowcount);

?>

<script>
function UpdateQty(row)
	{		
		
		var food_id=document.getElementById("txtFoodID"+row).value;
		var food_qty=document.getElementById("txtQty"+row).value;
		var type=document.getElementById("txtType"+row).value;
		var receipe_id=document.getElementById("txtReceipeID"+row).value;
		var todate=document.getElementById("txtToDate").value;
		//alert (food_id);
		//alert (food_qty);
		//alert (type);
		//alert (receipe_id);
		//alert (todate);
		
		pageURL=hostname+"/includes/update_food_qty.inc.php?food_id="+food_id+"&type="+type+"&food_qty="+food_qty+"&todate="+todate+"&receipe_id="+receipe_id;
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
				if(type=="BreakFast")
				{
					document.location.href=hostname+"/includes/get_result_nutrition.inc.php?food_id="+food_id+"&type="+type+"&food_qty="+food_qty+"&date="+todate+"&Receipe_id="+receipe_id;
				}
				if(type=="Lunch")
				{
					document.location.href=hostname+"/includes/get_result_nutrition.inc.php?food_id="+food_id+"&type="+type+"&food_qty="+food_qty+"&date="+todate+"&LReceipe_id="+receipe_id;
				}
				if(type=="Snacks")
				{
					document.location.href=hostname+"/includes/get_result_nutrition.inc.php?food_id="+food_id+"&type="+type+"&food_qty="+food_qty+"&date="+todate+"&SReceipe_id="+receipe_id;
				}
				if(type=="Dinner")
				{
					document.location.href=hostname+"/includes/get_result_nutrition.inc.php?food_id="+food_id+"&type="+type+"&food_qty="+food_qty+"&date="+todate+"&DReceipe_id="+receipe_id;
				}
				//GetDailyUpdates();
				
			}
			///GetDailyUpdates();
		}
		
		xmlhttp.open("GET",pageURL,true);
		xmlhttp.send();
}

</script>
  <input type="hidden"  value="<?php echo $date?>" id="txtToDate" name="txtToDate" style="width:90px;"/>
          
 <div class="DvFloat" style="padding:0px 0px 1px 0px; border-top:solid 0px #c5c5c5" id="tr_food_<?php echo $row['id']*121?>"> 

	<div class="DvFloat" style="padding:0px 0px 0px 0px; border-bottom:solid 0px red">
	  <table cellpadding="0" cellspacing="0" style="width:100%;">
		
        <tr>
		  <td class="Brkfast_td" style="padding:0px;"><img src="<?php echo $strHostName?>/images/calorie_setup/left_arrow_brkfst.jpg" alt="" /></td>
		  <td class="Brkfast_td" style="width:240px; font-weight:normal"><?php echo $name;?></td>
		  <td class="Brkfast_td">
          <input type="text"  value="<?php echo $row['qty']?>" id="txtQty<?php echo $row['id']*121?>" name="txtQty<?php echo $row['id']*121?>" placeholder="Qty" style="width:60px;"/>
           <input type="text"  value="<?php echo $row['energy']?>" id="txtQty1<?php echo $row['id']*121?>" name="txtQty1<?php echo $row['id']*121?>" placeholder="Qty" style="width:50px; border:0px; padding:0px; background:none; box-shadow:none; font-size:10px; text-align:left; padding-top:10px; padding-left:5px; display:none;"/>
         
          <input type="hidden"  value="<?php echo $row['receipe_id']?>" id="txtReceipeID<?php echo $row['id']*121?>" name="txtReceipeID<?php echo $row['id']*121?>"  style="width:63px;"/>
           <input type="hidden"  value="<?php echo $row['id']*121?>" id="txtFoodID<?php echo $row['id']*121?>" name="txtFoodID<?php echo $row['id']*121?>"  style="width:63px;"/>
           <input type="hidden"  value="<?php echo $type?>" id="txtType<?php echo $row['id']*121?>" name="txtType<?php echo $row['id']*121?>" style="width:63px;"/>
         
          
          </td>
		  
          <td class="Brkfast_td"><input type="text"  value="<?php echo $portion;?>" id="txtBreakfast_portion<?php echo $row['id']*121?>" name="txtBreakfast_portion<?php echo $row['id']*121?>" placeholder="Portion" disabled="disabled" style="width:63px"/>
          </td>
          
          <td class="Brkfast_td"><input type="text"  value="<?php echo $row['energy']* $row['qty'];?>" id="txtBreakfast_calorie<?php echo $row['id']*121?>" name="txtBreakfast_calorie<?php echo $row['id']*121?>" placeholder="Calorie" disabled="disabled" style="width:63px"/>
          </td>
          
		 
          <td class="Brkfast_td" style="text-align:center;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a  onclick="javascript:UpdateQty('<?php echo $row["id"]*121?>');" style="cursor:pointer;"><img src="<?php echo $strHostName?>/images/update.png"  alt="" align="absmiddle" style="width:15px; height:15px;" /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          
           <td class="Brkfast_td">&nbsp;&nbsp;&nbsp;&nbsp; <a onclick="javascript:Food_Delete_By_Id('<?php echo  $converter->encode($row['id'])?>','<?php echo $row['id']*121?>','<?php echo $row['type']?>','<?php echo $date?>')" style="cursor:pointer;"><img src="<?php echo $strHostName?>/images/calorie_setup/delete.png"  alt="" align="absmiddle" /></a></td>
           
           
		  <td class="Brkfast_td">&nbsp;</td>
          		  <td class="Brkfast_td">&nbsp;</td>
          <td class="Brkfast_td"><h3 class="mypetsA" ></h3></td>
		</tr>
        
       
	  </table>
	</div>
 
  <div class="thepetA">
	<div class="DvFloat" style="padding:0px 0px 0px 0px; border-top:solid 0px #c5c5c5; margin-top:20px; text-align: center;">
	  <table cellpadding="0" cellspacing="0" style="width:100%;">
		<tr>
		  <td class="whitebox_Td1" style="text-align: center;">CALORIES</td>
		  <td class="WhiteSpace_Td1"></td>
		  <td class="whitebox_Td1" style="text-align: center;">CARBS</td>
		  <td class="WhiteSpace_Td1"></td>
		  <td class="whitebox_Td1" style="text-align: center;">FAT</td>
		  <td class="WhiteSpace_Td1"></td>
		  <td class="whitebox_Td1" style="text-align: center;">PROTEIN</td>
		  <td class="WhiteSpace_Td1"></td>
		  <td class="whitebox_Td1" style="text-align: center;">SODIUM</td>
		  <td class="WhiteSpace_Td1"></td>
		  <td class="whitebox_Td1" style="text-align: center;">SUGAR</td>
		  <!--<td class="WhiteSpace_Td1"></td>-->
		</tr>
		<tr>
		  <td class="LightGreybox_Td">
		  		<?php echo round($row['energy']* $row['qty'],0)?>
                <input type="hidden" name="txtEnergy<?php echo $row['id']*121?>" id="txtEnergy<?php echo $row['id']*121?>" value="<?php echo $row['energy']?>" style="width:70px;" />
                <input type="hidden" name="txtEnergy_1<?php echo $row['id']*121?>" id="txtEnergy_1<?php echo $row['id']*121?>" value="<?php echo $row['energy']?>" style="width:70px;" />
           </td>
		  <td class="WhiteSpace_Td1"></td>
		  <td class="LightGreybox_Td"><?php echo round($row['carbo']* $row['qty'],0)?>
          		<input type="hidden" name="txtCarbo<?php echo $row['id']*121?>" id="txtCarbo<?php echo $row['id']*121?>" value="" style="width:70px;" />
                <input type="hidden" name="txtCarbo_1<?php echo $row['id']*121?>" id="txtCarbo_1<?php echo $row['id']*121?>" value="" style="width:70px;" />
          </td>
		  <td class="WhiteSpace_Td1"></td>
		  <td class="LightGreybox_Td"><?php echo round($row['total_fat']* $row['qty'],0)?>
        		<input type="hidden" name="txtFat<?php echo $row['id']*121?>" id="txtFat<?php echo $row['id']*121?>" value="" style="width:70px;" />
                <input type="hidden" name="txtFat_1<?php echo $row['id']*121?>" id="txtFat_1<?php echo $row['id']*121?>" value="" style="width:70px;" />
          </td>
		  <td class="WhiteSpace_Td1"></td>
		  <td class="LightGreybox_Td"><?php echo round($row['protein']* $row['qty'],0)?>
          		<input type="hidden" name="txtProtein<?php echo $row['id']*121?>" id="txtProtein<?php echo $row['id']*121?>" value="" style="width:70px;" />
                <input type="hidden" name="txtProtein_1<?php echo $row['id']*121?>" id="txtProtein_1<?php echo $row['id']*121?>" value="" style="width:70px;" />
          </td>
		  <td class="WhiteSpace_Td1"></td>
		  <td class="LightGreybox_Td"><?php echo round($row['sodium']* $row['qty'],0)?>
          		<input type="hidden" name="txtSodium<?php echo $row['id']*121?>" id="txtSodium<?php echo $row['id']*121?>" value="" style="width:70px;" />
                <input type="hidden" name="txtSodium_1<?php echo $row['id']*121?>" id="txtSodium_1<?php echo $row['id']*121?>" value="" style="width:70px;" />
          </td>
		  <td class="WhiteSpace_Td1"></td>
		  <td class="LightGreybox_Td"><?php echo round($row['sugar']* $row['qty'],0)?>
          	<input type="hidden" name="txtSugar<?php echo $row['id']*121?>" id="txtSugar<?php echo $row['id']*121?>" value="" style="width:70px;" />
                <input type="hidden" name="txtSugar_1<?php echo $row['id']*121?>" id="txtSugar_1<?php echo $row['id']*121?>" value="" style="width:70px;" />
          </td>
		  <!--<td class="WhiteSpace_Td1"></td>-->
		</tr>
		<tr>
		  <td colspan="14" style="height:8px;padding:0px"></td>
		</tr>
		<tr id="DvMicro<?php echo $row['id']*121?>">
			<?php $total_cal=$total_cal + ($row['energy']* $row['qty']) ?>
			<?php $total_carb=$total_carb + ($row['carbo']* $row['qty']) ?>
			<?php $total_fat=$total_fat + ($row['total_fat']* $row['qty']) ?>
			<?php $total_prot=$total_prot + ($row['protein']* $row['qty']) ?>
			<?php $total_sod=$total_sod + ($row['sodium']* $row['qty']) ?>
			<?php $total_sugar=$total_sugar + ($row['sugar']* $row['qty']) ?>
            
            
          
            

		  <td class="FullLightGreybox_Td" colspan="14"><b>MICRO NUTRIENTS:</b> Potassium(mg): <?php echo round($row['potassium']*$row['qty'],0)?>,  Vitamin A (carotene-mcg): <b><?php echo round($row['vt_a']*$row['qty'],0)?></b>, Vitamin B1 (mg): <b><?php echo round($row['vt_b1']*$row['qty'],0)?></b>, Vitamin B2 (mg): <b><?php echo round($row['vt_b2']*$row['qty'],0)?></b> Vitamin B3 (mg): <b><?php echo round($row['vt_b3']*$row['qty'],0)?></b>, Vitamin C (mg): <b><?php echo round($row['vt_c']*$row['qty'],0)?></b>, Calcium (mg): <b><?php echo round($row['calcium']*$row['qty'],0)?></b>, Zinc (mg): <b><?php echo round($row['zinc']*$row['qty'],0)?></b>, Phosphorous  (mg): <b><?php echo round($row['phosphorous']*$row['qty'],0)?></b> 
		  
			<br/><br/>

			<b>INGREDIENTS:</b> <?php echo $keywords?>
		  </td>

		</tr>

		
	  </table>
	</div>
  </div>
</div>
<?php }  ?>
  <?php } else { ?>
  
  	<div class="DvFloat" style="color:#009899; text-align:center; padding:15px 0; border-top:solid 1px #c5c5c5">Add food records here...</div>
    
    <?php } } ?>


<div class="DvFloat" style="padding:30px 0px 0px 0px; border-top:solid 1px #c5c5c5">
  <table cellpadding="0" cellspacing="0" style="width:100%;">
	<tr>
	  <td class="whitebox_Td">CALORIES</td>
	  <td class="WhiteSpace_Td"></td>
	  <td class="whitebox_Td">CARBS</td>
	  <td class="WhiteSpace_Td"></td>
	  <td class="whitebox_Td">FAT</td>
	  <td class="WhiteSpace_Td"></td>
	  <td class="whitebox_Td">PROTEIN</td>
	  <td class="WhiteSpace_Td"></td>
	  <td class="whitebox_Td">SODIUM</td>
	  <td class="WhiteSpace_Td"></td>
	  <td class="whitebox_Td">SUGAR</td>
	  <!--<td class="WhiteSpace_Td"></td>-->
	</tr>
	<tr>	
	  <td class="Greybox_Td"><?php echo round($total_cal,0)?></td>
	  <td class="WhiteSpace_Td"></td>
	  <td class="Greybox_Td"><?php echo round($total_carb,0)?></td>
	  <td class="WhiteSpace_Td"></td>
	  <td class="Greybox_Td"><?php echo round($total_fat,0)?></td>
	  <td class="WhiteSpace_Td"></td>
	  <td class="Greybox_Td"><?php echo round($total_prot,0)?></td>
	  <td class="WhiteSpace_Td"></td>
	  <td class="Greybox_Td"><?php echo round($total_sod,0)?></td>
	  <td class="WhiteSpace_Td"></td>
	  <td class="Greybox_Td"><?php echo round($total_sugar,0)?></td>
	  <!--<td class="WhiteSpace_Td"></td>-->
	</tr>
 
	<tr style="display:none;">
	  <td class="FullGreybox_Td" colspan="11"><b>MICRO NUTRIENTS:</b> Potassium(mg): 288,  Vitamin A (carotene-mcg): <b>51.6</b>, Vitamin B1 (mg): <b>0.2</b>, Vitamin B2 (mg): <b>0.1 </b> Vitamin B3 (mg): <b>1</b>, Vitamin C (mg): <b>0.4</b>, Calcium (mg): <b>22.4</b>, Zinc (mg): <b>0.7</b>, Phosphorous  (mg): <b>132.4</b> </td>
	</tr>
  </table>
</div>

                  

<?php
if($Rec_daily_updates !="" && $Rec_daily_updates!="0" || isset($_GET['delete_type']))
{ ?>
	<script>
		
		 //alert (document.getElementById("txtToDate").value);
		 GetDailyUpdates(document.getElementById("txtToDate").value);
		  
	</script>
<?php }
 

?>



