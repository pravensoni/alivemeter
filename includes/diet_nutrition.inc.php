<script type="text/javascript" src="<?php echo $strHostName?>/js/calories_steup3_validation.js"></script>
<script src="<?php echo $strHostName; ?>/js/jquery-1.9.1.js"></script>
<script src="<?php echo $strHostName; ?>/js/jquery.ui.core.js"></script>
<script src="<?php echo $strHostName; ?>/js/jquery.ui.widget.js"></script>
<script src="<?php echo $strHostName; ?>/js/jquery.ui.position.js"></script>
<script src="<?php echo $strHostName; ?>/js/jquery.ui.menu.js"></script>
<script src="<?php echo $strHostName; ?>/js/jquery.ui.autocomplete.js"></script>
<link href="<?php echo $strHostName; ?>/css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
<style>
.ui-autocomplete-loading {
    background: white url('<?php echo $strHostName?>/images/ui-anim_basic_16x16.gif') right center no-repeat;
}
</style>
<script>
function OnBlurQty()
{
	var cal=document.getElementById("txtFoodCal").innerHTML;
	var qty=document.getElementById("txtFoodQty").value;
	if (isNaN(cal)==false)
	{
		document.getElementById("txtTotalCal").value= (cal*qty);
	}
}
$(function() {
    $("#txtFoodSearch").autocomplete({
		
        source: $("#txtHostName").val()+"/search_autocomplete_nut.php?type=ReceipeNew",
        minLength: 2,
        select: function( event, ui ) {
            if(ui.item.id=="0" || ui.item.id=="")
            {
                 
            }
            else
            {
                //SetRecipeId(ui.item.id);
				 
				document.getElementById("txtReceiptId").value=ui.item.id;
				var name_portion = ui.item.id.split('###');
				document.getElementById("txtReceiptId").value= name_portion[0];
				document.getElementById("txtFoodPortion").innerHTML= name_portion[1];
				document.getElementById("txtFoodPortion2").value= name_portion[1];
				document.getElementById("txtFoodCal").innerHTML= name_portion[2];
				document.getElementById("txtFoodCal2").value= name_portion[2];
				
				
				
				

            }
        }
        
    });
});
 
 
function CheckDuplication2() {
		var obj = document.getElementById("ToPickupdate").value;
		//alert (obj);
		var message = "";
		if(obj.value != "") {
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
					message = message.split('<?php echo $strSeparator; ?>');
					if(message[1] == "true") {
						alert('Duplication Error Message\n\nSelected date already exists in the following records.');
						document.getElementById("ToPickupdate").focus();
						document.getElementById("ToPickupdate").select();
						return false;
					}
					else
					{
						Add_Diet_Food();
					}
				}
			}
			xmlhttp.open("GET","<?php echo $strHostName; ?>/includes/check_duplication.inc.php?tbl=Diet_Plan&value="+obj.value, true);
			xmlhttp.send();
		}
	}
</script>


<?php
$patient_id="0"; $nutritionist_id="0"; 


if(isset($_GET['patient_id']))
{
	$patient_id=$converter->decode($_GET['patient_id']);
}

if(isset($_SESSION['UserNutID']))
{
	$nutritionist_id=$_SESSION['UserNutID'];
}
else
{
	$nutritionist_id="0";
}

$date=date('Y-m-d');	
$selected_date=date('Y-m-d');
$food_count=GetValue("select count(*) as col from tbl_diet_food_plan where patient_id=".$patient_id." and selected_date='".$selected_date."'", "col");

?>
<input type="hidden" id="txtHostName" name="txtHostName" value="<?php echo $strHostName?>" />
<input type="hidden" id="txtReceiptId" name="txtReceiptId" value="0" />
<input type="hidden" id="txtNutId" name="txtNutId" value="<?php echo $nutritionist_id;?>" />
<input type="hidden" id="txtPatientId" name="txtPatientId" value="<?php echo $patient_id;?>" />
<input type="hidden" value="<?php echo $date;?>" id="txtFoodDate" name="txtFoodDate" />
<input type="hidden" name="ToPickupdate"  id="ToPickupdate" size="50" value="<?php echo $date;?>" style="text-transform:uppercase; color:#666; width:150px;" />

<div class="DvFloat" style="padding:10px 0px; border-bottom:solid 0px #c5c5c5">
  <div class="DvFloat">
    <div class="nutri_right_box1 f_grey">Food</div>
    <div class="nutri_right_box2 f_grey" style="width:380px;">Recipe</div>
	<div class="nutri_right_box3 f_grey" style="width:103px;">Calories</div>
    <div class="nutri_right_box3 f_grey">Time</div>
</div>
<div class="DvFloat" style="padding:10px 0px; border-bottom:solid 0px #c5c5c5">

    <div class="nutri_right_box1 f_grey" style="border:solid 0px red;">
        <div class="DvFloat">
             <div style="float:left; padding:0px 10px 0px 0px; font-weight: normal;">
                 <select id="txtType" name="txtType" tabindex="1" class="" style="width:110px; height:32px;" onchange="javascript:Add_Option_Time();">
                 	<option value="0">Select</option>
                    <option value="Breakfast">Breakfast</option>
                    <option value="Lunch">Lunch</option>
                    <option value="Snacks">Snacks</option>
                    <option value="Dinner">Dinner</option>
                 </select>
                  <input class="one" type="hidden" name="diet_selected_date"  id="diet_selected_date"  readonly="readonly" value="<?php echo $selected_date;?>" style="text-transform:uppercase; color:#666"/>
            </div>
            
        </div>
    </div>
                                                            
      <div class="nutri_right_box1 f_grey" style="border:solid 0px red; width:290px;">
       <input type="text" value="" id="txtFoodSearch" name="txtFoodSearch" style="color:#999;width:280px; height:18px;" placeholder="What should the client have today?"><!--What did you have today-->
	   <div style="padding-top:35px; font-style:normal;">
		   Portion: <span id="txtFoodPortion" name="txtFoodPortion"></span>&nbsp;&nbsp;
           <input type="hidden" name="txtFoodPortion2" id="txtFoodPortion2" value="" />
           
		   Calorie: <span id="txtFoodCal" name="txtFoodCal"></span>&nbsp;&nbsp;
           <input type="hidden" name="txtFoodCal2" id="txtFoodCal2" value=""  />
	   </div>
      </div> 
	<div class="nutri_right_box1 f_grey" style="border:solid 0px red; width:80px;">
       <input type="text" value="" id="txtFoodQty" name="txtFoodQty" style="color:#999;width:50px; height:18px;" placeholder="Qty" onchange="javascript:OnBlurQty();">
	</div>                                                      
   <div class="nutri_right_box1 f_grey" style="border:solid 0px red; width:95px;">
       <input type="text" value="" id="txtTotalCal" name="txtTotalCal" style="color:#999;width:50px; height:18px;" placeholder="Calorie" disabled>
	</div> 
    <div class="nutri_right_box1 f_grey" style="border:solid 0px red;">
        <div class="DvFloat">
             <div style="float:left; padding:0px 10px 0px 0px; font-weight: normal;">
                 <select id="txtTimeHH" name="txtTimeHH" tabindex="1" class="" style="width:50px; height:32px;">
                 	<option value="0">HH</option>                   
                 </select>
            </div>
            <div style="float:left; padding:0px 0px 0px 0px; font-weight: normal;">
                <select id="txtTimeMin" name="txtTimeMin" tabindex="1" class="" style="width:50px; height:32px;">
                	<option value="0">MM</option>                   
                </select>
            </div>
        </div>
    </div>
            
      <div class="nutri_right_box1 f_grey" style="border:solid 0px red;">
      		<a class="buttonsearch" style="text-align:center; width:50px; cursor:pointer; background-color:#666666;" onclick="javascript:CheckDuplication2();">Add</a>
      </div>      
      
      <input type="hidden" name="txtDietNutTotal" id="txtDietNutTotal" value="<?php echo $food_count;?>" />
   
  </div>
  
  
  <div class="dvFloat">


<div class="DvFloat" style="padding:10px 0px 0px 0px;" id="dvDietFood"> 
 
</div>

</div>
</div>

