<?php include "../includes/common.inc.php"?>
<?php include "includes/links.inc.php"?>
<link href="ckeditor/_samples/sample.css" rel="stylesheet" type="text/css" />
<style type="text/css" title="currentStyle">
			@import "media/css/demo_page.css";
			@import "media/css/demo_table_jui.css";
			@import "media/smoothness/jquery-ui-1.8.4.custom.css";
		</style>
		<script type="text/javascript" charset="utf-8" src="media/js/jquery.js"></script>
		<script type="text/javascript" charset="utf-8" src="media/js/jquery.dataTables.js"></script>
		<script type="text/javascript" charset="utf-8" src="media/js/FixedColumns.js"></script>
		<script type="text/javascript" charset="utf-8">
			$(document).ready( function () {
				var oTable = $('#example').dataTable( {
					"bJQueryUI": true,
					"sScrollY": "300px",
					"sScrollX": "200%",
					"sScrollXInner": "250%",
					"bScrollCollapse": true,
					"bPaginate": false
				} );
				new FixedColumns( oTable );
			} );
		</script>
<script language="javascript" type="text/javascript">
function CheckDuplication(id) {
		var obj = document.getElementById("txtName");
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
						alert('Duplication Error Message\n\nName entered already exists in the following records.');
						document.getElementById("txtName").focus();
						document.getElementById("txtName").select();
					}
				}
			}
			xmlhttp.open("GET","<?php echo $strHostName; ?>/manage/includes/checkduplication.inc.php?id="+id+"&tbl=Cities&value="+obj.value, true);
			xmlhttp.send();
		}
	}
	
	
	
	function Validate() {
		if(document.getElementById("txtName").value == "") {
			alert("Please Enter Name....");
			document.getElementById("txtName").focus();
			return false;
		}
	}
	
	



</script>

<style>
#grid th
{
	text-align:center;
}

#grid td
{
	text-align:center;
}

.keytable { border-collapse:separate; border-top: 0px solid blue; }
.keytable th {
        margin:0px;
        border:1px solid grey;
        border-top-width:0px;
		border-right-width:0px;
        white-space:nowrap;
		padding:4px;
    }
    .dvKey {
        width: 600px;
        overflow-x:scroll;  
        margin-left:299px;
        overflow-y:visible;
		border:solid 0px red;
		margin-top:20px;
    }
    .headcol {
        position:absolute;
        width:310px;
        left:20px;
        top:auto;
    }
</style>

<script type="text/javascript">
function ChangeName()
{	
	if(document.getElementById("ddlKeyIng").value == "Bajra") {
		document.getElementById("txtQuantity").value="40";
		document.getElementById("txtEnergy").value="361";
		document.getElementById("txtCarbohydrate").value="67.5";
		document.getElementById("txtProtein").value="11.6";
		document.getElementById("txtTotalFat").value="5";
		document.getElementById("txtFibre").value="0";
		document.getElementById("txtSodium").value="0";
		document.getElementById("txtPufa").value="0";
		document.getElementById("txtMufa").value="0";
		document.getElementById("txtTransfat").value="0";
		document.getElementById("txtPotassium").value="0";
		document.getElementById("txtVitaminA").value="132";
		document.getElementById("txtVitaminB1").value="0.33";
		document.getElementById("txtVitaminB2").value="0.25";
		document.getElementById("txtVitaminB3").value="2.3";
		document.getElementById("txtVitaminB6").value="0";
		document.getElementById("txtVitaminC").value="0";
		document.getElementById("txtVitaminE").value="0";
		document.getElementById("txtIron").value="8";
		document.getElementById("txtCalcium").value="42";
		document.getElementById("txtZinc").value="0";
		document.getElementById("txtPhosphorous").value="296";
		document.getElementById("txtSugar").value="0";
	}
	
	if(document.getElementById("ddlKeyIng").value == "Barley") {
		document.getElementById("txtQuantity").value="40";
		document.getElementById("txtEnergy").value="336";
		document.getElementById("txtCarbohydrate").value="69.6";
		document.getElementById("txtProtein").value="11.5";
		document.getElementById("txtTotalFat").value="1.3";
		document.getElementById("txtFibre").value="0";
		document.getElementById("txtSodium").value="0";
		document.getElementById("txtPufa").value="0";
		document.getElementById("txtMufa").value="0";
		document.getElementById("txtTransfat").value="0";
		document.getElementById("txtPotassium").value="0";
		document.getElementById("txtVitaminA").value="10";
		document.getElementById("txtVitaminB1").value="0.47";
		document.getElementById("txtVitaminB2").value="0.2";
		document.getElementById("txtVitaminB3").value="5.4";
		document.getElementById("txtVitaminB6").value="0";
		document.getElementById("txtVitaminC").value="0";
		document.getElementById("txtVitaminE").value="0";
		document.getElementById("txtIron").value="1.67";
		document.getElementById("txtCalcium").value="26";
		document.getElementById("txtZinc").value="0";
		document.getElementById("txtPhosphorous").value="296";
		document.getElementById("txtSugar").value="0";
	}
	
	
	if(document.getElementById("ddlKeyIng").value == "Italian millet") {
		document.getElementById("txtQuantity").value="40";
		document.getElementById("txtEnergy").value="331";
		document.getElementById("txtCarbohydrate").value="60.9";
		document.getElementById("txtProtein").value="12.3";
		document.getElementById("txtTotalFat").value="4.3";
		document.getElementById("txtFibre").value="0";
		document.getElementById("txtSodium").value="0";
		document.getElementById("txtPufa").value="0";
		document.getElementById("txtMufa").value="0";
		document.getElementById("txtTransfat").value="0";
		document.getElementById("txtPotassium").value="0";
		document.getElementById("txtVitaminA").value="32";
		document.getElementById("txtVitaminB1").value="0.59";
		document.getElementById("txtVitaminB2").value="0.11";
		document.getElementById("txtVitaminB3").value="3.2";
		document.getElementById("txtVitaminB6").value="0";
		document.getElementById("txtVitaminC").value="0";
		document.getElementById("txtVitaminE").value="0";
		document.getElementById("txtIron").value="2.8";
		document.getElementById("txtCalcium").value="31";
		document.getElementById("txtZinc").value="0";
		document.getElementById("txtPhosphorous").value="290";
		document.getElementById("txtSugar").value="0";
	}
	
	
	
	if(document.getElementById("ddlKeyIng").value == "Jowar") {
		document.getElementById("txtQuantity").value="40";
		document.getElementById("txtEnergy").value="349";
		document.getElementById("txtCarbohydrate").value="72.6";
		document.getElementById("txtProtein").value="10.4";
		document.getElementById("txtTotalFat").value="1.9";
		document.getElementById("txtFibre").value="0";
		document.getElementById("txtSodium").value="0";
		document.getElementById("txtPufa").value="0";
		document.getElementById("txtMufa").value="0";
		document.getElementById("txtTransfat").value="0";
		document.getElementById("txtPotassium").value="0";
		document.getElementById("txtVitaminA").value="47";
		document.getElementById("txtVitaminB1").value="0.37";
		document.getElementById("txtVitaminB2").value="0.13";
		document.getElementById("txtVitaminB3").value="3.1";
		document.getElementById("txtVitaminB6").value="0.21";
		document.getElementById("txtVitaminC").value="0";
		document.getElementById("txtVitaminE").value="0";
		document.getElementById("txtIron").value="4.1";
		document.getElementById("txtCalcium").value="25";
		document.getElementById("txtZinc").value="0";
		document.getElementById("txtPhosphorous").value="222";
		document.getElementById("txtSugar").value="0";
	}
	
}


function ChangeName1()
{	
	if(document.getElementById("ddlKeyIng1").value == "Bajra") {
		document.getElementById("txtQuantity1").value="40";
		document.getElementById("txtEnergy1").value="361";
		document.getElementById("txtCarbohydrate1").value="67.5";
		document.getElementById("txtProtein1").value="11.6";
		document.getElementById("txtTotalFat1").value="5";
		document.getElementById("txtFibre1").value="0";
		document.getElementById("txtSodium1").value="0";
		document.getElementById("txtPufa1").value="0";
		document.getElementById("txtMufa1").value="0";
		document.getElementById("txtTransfat1").value="0";
		document.getElementById("txtPotassium1").value="0";
		document.getElementById("txtVitaminA1").value="132";
		document.getElementById("txtVitaminB11").value="0.33";
		document.getElementById("txtVitaminB21").value="0.25";
		document.getElementById("txtVitaminB31").value="2.3";
		document.getElementById("txtVitaminB61").value="0";
		document.getElementById("txtVitaminC1").value="0";
		document.getElementById("txtVitaminE1").value="0";
		document.getElementById("txtIron1").value="8";
		document.getElementById("txtCalcium1").value="42";
		document.getElementById("txtZinc1").value="0";
		document.getElementById("txtPhosphorous1").value="296";
		document.getElementById("txtSugar1").value="0";
	}
	
	if(document.getElementById("ddlKeyIng1").value == "Barley") {
		document.getElementById("txtQuantity1").value="40";
		document.getElementById("txtEnergy1").value="336";
		document.getElementById("txtCarbohydrate1").value="69.6";
		document.getElementById("txtProtein1").value="11.5";
		document.getElementById("txtTotalFat1").value="1.3";
		document.getElementById("txtFibre1").value="0";
		document.getElementById("txtSodium1").value="0";
		document.getElementById("txtPufa1").value="0";
		document.getElementById("txtMufa1").value="0";
		document.getElementById("txtTransfat1").value="0";
		document.getElementById("txtPotassium1").value="0";
		document.getElementById("txtVitaminA1").value="10";
		document.getElementById("txtVitaminB11").value="0.47";
		document.getElementById("txtVitaminB21").value="0.2";
		document.getElementById("txtVitaminB31").value="5.4";
		document.getElementById("txtVitaminB61").value="0";
		document.getElementById("txtVitaminC1").value="0";
		document.getElementById("txtVitaminE1").value="0";
		document.getElementById("txtIron1").value="1.67";
		document.getElementById("txtCalcium1").value="26";
		document.getElementById("txtZinc1").value="0";
		document.getElementById("txtPhosphorous1").value="296";
		document.getElementById("txtSugar1").value="0";
	}
	
	if(document.getElementById("ddlKeyIng1").value == "Italian millet") {
		document.getElementById("txtQuantity1").value="40";
		document.getElementById("txtEnergy1").value="331";
		document.getElementById("txtCarbohydrate1").value="60.9";
		document.getElementById("txtProtein1").value="12.3";
		document.getElementById("txtTotalFat1").value="4.3";
		document.getElementById("txtFibre1").value="0";
		document.getElementById("txtSodium1").value="0";
		document.getElementById("txtPufa1").value="0";
		document.getElementById("txtMufa1").value="0";
		document.getElementById("txtTransfat1").value="0";
		document.getElementById("txtPotassium1").value="0";
		document.getElementById("txtVitaminA").value="32";
		document.getElementById("txtVitaminB1").value="0.59";
		document.getElementById("txtVitaminB21").value="0.11";
		document.getElementById("txtVitaminB31").value="3.2";
		document.getElementById("txtVitaminB61").value="0";
		document.getElementById("txtVitaminC1").value="0";
		document.getElementById("txtVitaminE1").value="0";
		document.getElementById("txtIron1").value="2.8";
		document.getElementById("txtCalcium1").value="31";
		document.getElementById("txtZinc1").value="0";
		document.getElementById("txtPhosphorous1").value="290";
		document.getElementById("txtSugar1").value="0";
	}
	
	
	
	if(document.getElementById("ddlKeyIng1").value == "Jowar") {
		document.getElementById("txtQuantity1").value="40";
		document.getElementById("txtEnergy1").value="349";
		document.getElementById("txtCarbohydrate1").value="72.6";
		document.getElementById("txtProtein1").value="10.4";
		document.getElementById("txtTotalFat1").value="1.9";
		document.getElementById("txtFibre1").value="0";
		document.getElementById("txtSodium1").value="0";
		document.getElementById("txtPufa1").value="0";
		document.getElementById("txtMufa1").value="0";
		document.getElementById("txtTransfat1").value="0";
		document.getElementById("txtPotassium1").value="0";
		document.getElementById("txtVitaminA1").value="47";
		document.getElementById("txtVitaminB11").value="0.37";
		document.getElementById("txtVitaminB21").value="0.13";
		document.getElementById("txtVitaminB31").value="3.1";
		document.getElementById("txtVitaminB61").value="0.21";
		document.getElementById("txtVitaminC1").value="0";
		document.getElementById("txtVitaminE1").value="0";
		document.getElementById("txtIron1").value="4.1";
		document.getElementById("txtCalcium1").value="25";
		document.getElementById("txtZinc1").value="0";
		document.getElementById("txtPhosphorous1").value="222";
		document.getElementById("txtSugar1").value="0";
	}
}	

function ChangeName2()
{	
	if(document.getElementById("ddlKeyIng2").value == "Bajra") {
		document.getElementById("txtQuantity2").value="40";
		document.getElementById("txtEnergy2").value="361";
		document.getElementById("txtCarbohydrate2").value="67.5";
		document.getElementById("txtProtein2").value="11.6";
		document.getElementById("txtTotalFat2").value="5";
		document.getElementById("txtFibre2").value="0";
		document.getElementById("txtSodium2").value="0";
		document.getElementById("txtPufa2").value="0";
		document.getElementById("txtMufa2").value="0";
		document.getElementById("txtTransfat2").value="0";
		document.getElementById("txtPotassium2").value="0";
		document.getElementById("txtVitaminA2").value="132";
		document.getElementById("txtVitaminB12").value="0.33";
		document.getElementById("txtVitaminB22").value="0.25";
		document.getElementById("txtVitaminB32").value="2.3";
		document.getElementById("txtVitaminB62").value="0";
		document.getElementById("txtVitaminC2").value="0";
		document.getElementById("txtVitaminE2").value="0";
		document.getElementById("txtIron2").value="8";
		document.getElementById("txtCalcium2").value="42";
		document.getElementById("txtZinc2").value="0";
		document.getElementById("txtPhosphorous2").value="296";
		document.getElementById("txtSugar2").value="0";
	}
	
	if(document.getElementById("ddlKeyIng2").value == "Barley") {
		document.getElementById("txtQuantity2").value="40";
		document.getElementById("txtEnergy2").value="336";
		document.getElementById("txtCarbohydrate2").value="69.6";
		document.getElementById("txtProtein2").value="11.5";
		document.getElementById("txtTotalFat2").value="1.3";
		document.getElementById("txtFibre2").value="0";
		document.getElementById("txtSodium2").value="0";
		document.getElementById("txtPufa2").value="0";
		document.getElementById("txtMufa2").value="0";
		document.getElementById("txtTransfat2").value="0";
		document.getElementById("txtPotassium2").value="0";
		document.getElementById("txtVitaminA2").value="10";
		document.getElementById("txtVitaminB12").value="0.47";
		document.getElementById("txtVitaminB22").value="0.2";
		document.getElementById("txtVitaminB32").value="5.4";
		document.getElementById("txtVitaminB62").value="0";
		document.getElementById("txtVitaminC2").value="0";
		document.getElementById("txtVitaminE2").value="0";
		document.getElementById("txtIron2").value="1.67";
		document.getElementById("txtCalcium2").value="26";
		document.getElementById("txtZinc2").value="0";
		document.getElementById("txtPhosphorous2").value="296";
		document.getElementById("txtSugar2").value="0";
	}
	
	if(document.getElementById("ddlKeyIng2").value == "Italian millet") {
		document.getElementById("txtQuantity2").value="40";
		document.getElementById("txtEnergy2").value="331";
		document.getElementById("txtCarbohydrate2").value="60.9";
		document.getElementById("txtProtein2").value="12.3";
		document.getElementById("txtTotalFat2").value="4.3";
		document.getElementById("txtFibre2").value="0";
		document.getElementById("txtSodium2").value="0";
		document.getElementById("txtPufa2").value="0";
		document.getElementById("txtMufa2").value="0";
		document.getElementById("txtTransfat2").value="0";
		document.getElementById("txtPotassium2").value="0";
		document.getElementById("txtVitaminA").value="32";
		document.getElementById("txtVitaminB1").value="0.59";
		document.getElementById("txtVitaminB22").value="0.11";
		document.getElementById("txtVitaminB32").value="3.2";
		document.getElementById("txtVitaminB62").value="0";
		document.getElementById("txtVitaminC2").value="0";
		document.getElementById("txtVitaminE2").value="0";
		document.getElementById("txtIron2").value="2.8";
		document.getElementById("txtCalcium2").value="31";
		document.getElementById("txtZinc2").value="0";
		document.getElementById("txtPhosphorous2").value="290";
		document.getElementById("txtSugar2").value="0";
	}
	
	
	
	if(document.getElementById("ddlKeyIng2").value == "Jowar") {
		document.getElementById("txtQuantity2").value="40";
		document.getElementById("txtEnergy2").value="349";
		document.getElementById("txtCarbohydrate2").value="72.6";
		document.getElementById("txtProtein2").value="10.4";
		document.getElementById("txtTotalFat2").value="1.9";
		document.getElementById("txtFibre2").value="0";
		document.getElementById("txtSodium2").value="0";
		document.getElementById("txtPufa2").value="0";
		document.getElementById("txtMufa2").value="0";
		document.getElementById("txtTransfat2").value="0";
		document.getElementById("txtPotassium2").value="0";
		document.getElementById("txtVitaminA2").value="47";
		document.getElementById("txtVitaminB12").value="0.37";
		document.getElementById("txtVitaminB22").value="0.13";
		document.getElementById("txtVitaminB32").value="3.1";
		document.getElementById("txtVitaminB62").value="0.21";
		document.getElementById("txtVitaminC2").value="0";
		document.getElementById("txtVitaminE2").value="0";
		document.getElementById("txtIron2").value="4.1";
		document.getElementById("txtCalcium2").value="25";
		document.getElementById("txtZinc2").value="0";
		document.getElementById("txtPhosphorous2").value="222";
		document.getElementById("txtSugar2").value="0";
	}
	
}
		

</script>


</head>
<?php 
$keyingid=""; 

?>

<body>
<!-- div -->
<?php include "includes/header.inc.php"?>
<!-- / div -->
<!-- nav -->
<?php include "includes/left.inc.php"?>
<!-- / nav -->
<section id="content">
  <section class="main padder">
     <div class="clearfix" style="padding:15px 0;">
      <h4><strong><i class="icon-food"></i>&nbsp; Add Recipe</strong></h4>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <section class="panel">
          <div class="panel-body">
            <form id="form1" name="form1" method="post" enctype="multipart/form-data">
                           	<table width="100%" cellpadding="0" cellspacing="0" border="0" style="display: none;">
                            	<tr>
                                	<td>Recipe Date :</td>
                                    <td><input type="text" id="txtRecipeDate" name="txtRecipeDate" style="width: 50%" value="" class="datepicker" /></td>
                                  <td>Recipe Number :</td>
                                    <td><input type="text" id="txtRecipeNo" name="txtRecipeNo" style="width: 50%" value=""/></td>
                                </tr>
                                <tr>
                                	<td>Recipe Name :</td>
                                    <td><input type="text" id="txtRecipeName" name="txtRecipeName" style="width: 50%" value=""/></td>
                                  <td>Recipe Alternate Name :</td>
                                    <td><input type="text" id="txtRecipeAName" name="txtRecipeAName" style="width: 50%" value=""/></td>
                                </tr>
                            
                               <tr>
                                	<td>Portion :</td>
                                    <td><input type="text" id="txtPortion" name="txtPortion" style="width: 50%" value=""/></td>
                                    <td>Food Ingredients :</td>
                                    <td><input type="text" id="txtFood" name="txtFood" style="width: 50%" value=""/></td>
                                </tr>
                            <tr>
                                	<td>Other Benefits :</td>
                                    <td><input type="text" id="txtOther" name="txtOther" style="width: 50%" value=""/></td>
                                    
                                </tr>
                            
                            </table>
                            
                            <table width="100%" cellpadding="0" cellspacing="0" border="0">
                            	<tr>
                                	<td style="vertical-align: top; padding-top: 10px; width: 13%;">Recipe Name :</td>
                                    <td style="vertical-align: top; padding-top: 10px; width: 15%;"><input type="text" id="txtRecipeNo" name="txtRecipeNo" style="width: 85%" value=""/></td>
                                    <td style="vertical-align: top; padding-top: 10px; width: 10%;"><span style="display: none;">Recipe Number :</span>Portion:</td>
                                    <td style="vertical-align: top; padding-top: 10px; width: 15%;"><span style="display: none;"><input type="text" id="txtRecipeName" name="txtRecipeName" style="width: 85%" value=""/></span><input type="text" id="txtPortion" name="txtPortion" style="width:  85%" value=""/></td>
                                    <td style="vertical-align: top; padding-top: 10px; width: 9%;"><span style="display: none;">Recipe Alternate Name :</span></td>
                                    <td style="vertical-align: top; padding-top: 10px; width: 15%;"><span style="display: none;"><input type="text" id="txtRecipeAName" name="txtRecipeAName" style="width: 85%" value=""/></span></td>
                                </tr>
                                <!--<tr>
                                	<td>Recipe Name :</td>
                                    <td><input type="text" id="txtRecipeName" name="txtRecipeName" style="width: 50%" value=""/></td>
                                    <td>Recipe Alternate Name :</td>
                                    <td><input type="text" id="txtRecipeAName" name="txtRecipeAName" style="width: 50%" value=""/></td>
                                </tr>-->
                            
                               <tr>
                               	 <td style="padding-top: 10px; vertical-align: top;">Recipe Alternate Name : </td>
                                    <td style="padding-top: 10px; vertical-align: top;"><textarea name="txtRecipeAName" id="txtRecipeAName" style="width: 85%;" rows="4"></textarea></td>
                                    <td style="padding-top: 10px; vertical-align: top;">Food Ingredients :</td>
                                    <td style="padding-top: 10px; vertical-align: top;"><textarea name="txtFood" id="txtFood" style="width: 85%;" rows="4"></textarea></td>
                                    <td style="padding-top: 10px; vertical-align: top;">Other Benefits :</td>
                                    <td style="padding-top: 10px; vertical-align: top;"><textarea name="txtOther" id="txtOther" style="width: 85%;" rows="4"></textarea></td>
                                </tr>

                            </table>
                            
                            
                                                        <table border="1" cellspacing="0" cellpadding="0" style="margin-top:30px; text-align:center; font-size: 14px; border: solid 1px #bbbbbb; background-color: #caf7f1; margin-left:-12px; width:1230px;">
                              <tr>
                                <td style="text-align: left; padding: 10px; vertical-align: top; border: solid 0px #0099FF; font-size: 14px; font-weight: bold;">
                                	<a href="#" class="active" onClick="javascript:return Add()" id="dvAdd"><i class="icon-plus-sign icon-large text-success text-active"></i></a> Add Ingredients &nbsp;&nbsp; 
                                </td>
                          	  </tr>
                            </table>
                            

<div id="demo">
<table cellpadding="0" cellspacing="0" border="0" class="display" id="example">
	<thead>
		<tr>
			<th>Rendering engine</th>
			<th>Browser</th>
			<th>Platform(s)</th>
			<th>Engine version</th>
			<th>CSS grade</th>
			<th>Rendering engine</th>
			<th>Browser</th>
			<th>Platform(s)</th>
			<th>Engine version</th>
			<th>CSS grade</th>
			<th>Rendering engine</th>
			<th>Browser</th>
			<th>Platform(s)</th>
			<th>Engine version</th>
			<th>CSS grade</th>
			<th>CSS grade</th>
			<th>CSS grade</th>
			<th>CSS grade</th>
			<th>CSS grade</th>
			<th>CSS grade</th>
			<th>CSS grade</th>
			<th>CSS grade</th>
			<th>CSS grade</th>
			<th>CSS grade</th>
			<th>CSS grade</th>
		</tr>
	</thead>
	 
	<tbody>
		<tr class="gradeX">
			<td>Trident1</td>
			<td>Internet2</td>
			<td>Win3</td>
			<td>Trident4</td>
			<td>Trident5</td>
			<td>Trident6</td>
			<td>Internet7</td>
			<td>Win8</td>
			<td>Trident9</td>
			<td>Trident10</td>
			<td>Trident11</td>
			<td>Internet12</td>
			<td>Win13</td>
			<td>Trident14</td>
			<td>Trident15</td>
			<td>Trident16</td>
			<td>Trident17</td>
			<td>Trident18</td>
			<td>Trident19</td>
			<td>Trident20</td>
			<td>Trident21</td>
			<td>Trident22</td>
			<td>Trident23</td>
			<td>CSS grade 24</td>
			<td>CSS grade 25</td>
		</tr>
		 <tr class="gradeX">
			<td>Trident1</td>
			<td>Internet2</td>
			<td>Win3</td>
			<td>Trident4</td>
			<td>Trident5</td>
			<td>Trident6</td>
			<td>Internet7</td>
			<td>Win8</td>
			<td>Trident9</td>
			<td>Trident10</td>
			<td>Trident11</td>
			<td>Internet12</td>
			<td>Win13</td>
			<td>Trident14</td>
			<td>Trident15</td>
			<td>Trident16</td>
			<td>Trident17</td>
			<td>Trident18</td>
			<td>Trident19</td>
			<td>Trident20</td>
			<td>Trident21</td>
			<td>Trident22</td>
			<td>Trident23</td>
			<td>CSS grade 24</td>
			<td>CSS grade 25</td>
		</tr>
		<tr class="gradeX">
			<td>Trident1</td>
			<td>Internet2</td>
			<td>Win3</td>
			<td>Trident4</td>
			<td>Trident5</td>
			<td>Trident6</td>
			<td>Internet7</td>
			<td>Win8</td>
			<td>Trident9</td>
			<td>Trident10</td>
			<td>Trident11</td>
			<td>Internet12</td>
			<td>Win13</td>
			<td>Trident14</td>
			<td>Trident15</td>
			<td>Trident16</td>
			<td>Trident17</td>
			<td>Trident18</td>
			<td>Trident19</td>
			<td>Trident20</td>
			<td>Trident21</td>
			<td>Trident22</td>
			<td>Trident23</td>
			<td>CSS grade 24</td>
			<td>CSS grade 25</td>
		</tr>
		<tr class="gradeX">
			<td>Trident1</td>
			<td>Internet2</td>
			<td>Win3</td>
			<td>Trident4</td>
			<td>Trident5</td>
			<td>Trident6</td>
			<td>Internet7</td>
			<td>Win8</td>
			<td>Trident9</td>
			<td>Trident10</td>
			<td>Trident11</td>
			<td>Internet12</td>
			<td>Win13</td>
			<td>Trident14</td>
			<td>Trident15</td>
			<td>Trident16</td>
			<td>Trident17</td>
			<td>Trident18</td>
			<td>Trident19</td>
			<td>Trident20</td>
			<td>Trident21</td>
			<td>Trident22</td>
			<td>Trident23</td>
			<td>CSS grade 24</td>
			<td>CSS grade 25</td>
		</tr>
		<tr class="gradeX">
			<td>Trident1</td>
			<td>Internet2</td>
			<td>Win3</td>
			<td>Trident4</td>
			<td>Trident5</td>
			<td>Trident6</td>
			<td>Internet7</td>
			<td>Win8</td>
			<td>Trident9</td>
			<td>Trident10</td>
			<td>Trident11</td>
			<td>Internet12</td>
			<td>Win13</td>
			<td>Trident14</td>
			<td>Trident15</td>
			<td>Trident16</td>
			<td>Trident17</td>
			<td>Trident18</td>
			<td>Trident19</td>
			<td>Trident20</td>
			<td>Trident21</td>
			<td>Trident22</td>
			<td>Trident23</td>
			<td>CSS grade 24</td>
			<td>CSS grade 25</td>
		</tr>
	</tbody>
</table>



							<div class="dvKey" > 
	<table class="keytable">
    <tr>
		<td class="headcol" style="border-top:solid 1px grey;background:#caf7f1">Key Ingredients</td>
		<td style="border-top:solid 1px grey;background:#caf7f1">Qty<br />(gm/ml)</td>
		<td style="border-top:solid 1px grey;background:#caf7f1">Energy<br />(kcal)</td>
		<td style="border-top:solid 1px grey;background:#caf7f1">Carbo<br />hydrate<br />(g)</td>
		<td style="border-top:solid 1px grey;background:#caf7f1">Protein<br />(g)</td>
		<td style=" border-top:solid 1px grey;background:#caf7f1">Total Fat<br />(g)</td>
		<td style=" border-top:solid 1px grey;background:#caf7f1">Fibre<br />(g)</td>
		<td style=" border-top:solid 1px grey;background:#caf7f1">Sodium<br />(mg)</td>
		<td style=" border-top:solid 1px grey;background:#caf7f1">Pufa<br /></td>
		<td style=" border-top:solid 1px grey;background:#caf7f1">Mufa</td>
		<td style=" border-top:solid 1px grey;background:#caf7f1">Transfat</td>
		<td style="border-top:solid 1px grey;background:#caf7f1">Potassium<br />(mg)</td>
		<td style=" border-top:solid 1px grey;background:#caf7f1">Vitamin <br />A<br />(carotene-mcg)  </td>
		<td style=" border-top:solid 1px grey;background:#caf7f1">Vitamin <br />B1<br />(mg)</td>
		<td style=" border-top:solid 1px grey;background:#caf7f1">Vitamin <br />B2<br />(mg)</td>
		<td style=" border-top:solid 1px grey;background:#caf7f1">Vitamin <br />B3<br />(mg)</td>
		<td style=" border-top:solid 1px grey;background:#caf7f1">Vitamin <br />B6<br />(mg)</td>
		<td style=" border-top:solid 1px grey;background:#caf7f1">Vitamin <br />C<br />(mg)</td>
		<td style=" border-top:solid 1px grey;background:#caf7f1">Vitamin <br />E </td>
		<td style=" border-top:solid 1px grey;background:#caf7f1">Iron<br />(mg)</td>
		<td style=" border-top:solid 1px grey;background:#caf7f1">Calcium <br />(mg)</td>
		<td style=" border-top:solid 1px grey;background:#caf7f1">Zinc<br />(mg)</td>
		<td style=" border-top:solid 1px grey;background:#caf7f1">Phosphorous <br />(mg)</td>
		<td style="border-top:solid 1px grey;background:#caf7f1">Sugar</td>
	</tr>
    <tr>
		<td class="headcol">
			  <select id="ddlKeyIng" name="ddlKeyIng" style="width:300px;" onChange="javascript:return ChangeName()" data-rel="chosen"><option value="0">Select</option>
			  </select>
		</td>
		<td>
		  <input type="text" name="txtQuantity" id="txtQuantity" value="" style="width: 25px;" />                                
		</td>
		<td>
			<input type="text" name="txtEnergy" id="txtEnergy" value="" style="width: 25px;"  /> 
		</td>
		<td >
			<input type="text" name="txtCarbohydrate" id="txtCarbohydrate" value="" style="width: 25px;"  />
		</td>
		<td >
			<input type="text" name="txtProtein" id="txtProtein" value=""  style="width: 25px;"  />
		</td>
		<td >
			<input type="text" name="txtTotalFat" id="txtTotalFat" value="" style="width: 25px;"  />                                
		</td>
		<td >
			<input type="text" name="txtFibre" id="txtFibre" value="" style="width: 25px;"  />                                
		</td>
		<td >
			<input type="text" name="txtSodium" id="txtSodium" value="" style="width: 25px;" />                                
		</td>
		<td >
			<input type="text" name="txtPufa" id="txtPufa" value="" style="width: 25px;"  />                                
		</td>
		<td >
			<input type="text" name="txtMufa" id="txtMufa" value="" style="width: 25px;"  />                                
		</td>
		<td >
			<input type="text" name="txtTransfat" id="txtTransfat" value="" style="width: 25px;"  />                                
		</td>
		<td  >
			<input type="text" name="txtPotassium" id="txtPotassium" value="" style="width: 25px;"  />                                
		</td>
		<td >
			<input type="text" name="txtVitaminA" id="txtVitaminA" value="" style="width: 25px;"  />                                
		</td>
		<td >
			<input type="text" name="txtVitaminB1" id="txtVitaminB1" value="" style="width: 25px;"  />                                
		</td>
		<td >
			<input type="text" name="txtVitaminB2" id="txtVitaminB2" value="" style="width: 25px;"  />                                
		</td>
		<td >
			<input type="text" name="txtVitaminB3" id="txtVitaminB3" value="" style="width: 25px;"  />                                
		</td>
		<td>
			<input type="text" name="txtVitaminB6" id="txtVitaminB6" value="" style="width: 25px;"  />                                
		</td>
		<td >
			<input type="text" name="txtVitaminC" id="txtVitaminC" value="" style="width: 25px;"  />                                
		</td>
		<td >
			<input type="text" name="txtVitaminE" id="txtVitaminE" value="" style="width: 25px;"  />                                
		</td>
		<td >
			<input type="text" name="txtIron" id="txtIron" value="" style="width: 25px;"  />                                
		</td>
		<td >
			<input type="text" name="txtCalcium" id="txtCalcium" value="" style="width: 25px;"  />                                
		</td>
		<td >
			<input type="text" name="txtZinc" id="txtZinc" value="" style="width: 25px;" />                                
		</td>
		<td >
			<input type="text" name="txtPhosphorous" id="txtPhosphorous" value="" style="width: 25px;"  />                                
		</td>
		<td >
			<input type="text" name="txtSugar" id="txtSugar" value=""  style="width: 25px;" />                                
		</td>
			
	</tr>
     
     
</table>
							</div>
							<table border="1" cellspacing="0" cellpadding="0" style="margin-top:30px; text-align:center; font-size: 11px; border: solid 1px #bbbbbb; margin-right:0px; margin-left:-12px;overflow:auto;width:500px;">
                               
                              <tr>
								 <th style=" text-align: center; padding: 10px 4px; vertical-align: top; font-family: Arial, Helvetica, sans-serif; font-size: 10px; border-bottom:0px">Key Ingredients </th>
                                <th style="text-align: center; padding: 10px 4px; vertical-align: top; font-family: Arial, Helvetica, sans-serif; font-size: 10px; border-bottom:0px;">Qty<br />(gm/ml)</th>
                                <th style="text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Energy<br />(kcal)</th>
                                <th style="text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Carbo<br />hydrate<br />(g)</th>
                                <th style="text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Protein<br />(g)</th>
                                <th style=" text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Total Fat<br />(g)</th>
                                <th style=" text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Fibre<br />(g)</th>
                                <th style=" text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Sodium<br />(mg)</th>
                                <th style=" text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Pufa<br /></th>
                                <th style=" text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Mufa</th>
                                <th style=" text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Transfat</th>
                                <th style="text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Potassium<br />(mg)</th>
                                <th style=" text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Vitamin <br />A<br />(carotene-mcg)  </th>
                                <th style=" text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Vitamin <br />B1<br />(mg)</th>
                                <th style=" text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Vitamin <br />B2<br />(mg)</th>
                                <th style=" text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Vitamin <br />B3<br />(mg)</th>
                                <th style=" text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Vitamin <br />B6<br />(mg)</th>
                                <th style=" text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Vitamin <br />C<br />(mg)</th>
                                <th style=" text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Vitamin <br />E </th>
                                <th style=" text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Iron<br />(mg)</th>
                                <th style=" text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Calcium <br />(mg)</th>
                                <th style=" text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Zinc<br />(mg)</th>
                                <th style=" text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Phosphorous <br />(mg)</th>
                                    <th style="border-right:solid 0px #bbbbbb;  text-align: center; padding: 10px 4px; vertical-align: top;  border-bottom:0px;">Sugar</th>
                          </tr>           
						  </table>

                            <table border="1" cellspacing="0" cellpadding="0" style="margin-top:30px; text-align:center; font-size: 11px; border: solid 1px #bbbbbb; margin-right:0px; margin-left:-12px;">
                              <tr>
                                <td colspan="23" style="text-align: left; vertical-align: top;">
                                	<table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    	<tr style=" background-color:#e4fdf9; height:45px;">
                                        	<td style="width:120px; text-align: left; padding: 15px 0 10px 10px; vertical-align: top; border: solid 0px #0099FF; font-size: 12px; font-weight: bold;">
                                            	Key Ingredients 
                                            </td>
                                            <td style="padding: 12px 30px 8px 0px; text-align: left; width: 900px;">
                                            	<select id="ddlKeyIng" name="ddlKeyIng" style="width:300px;" onChange="javascript:return ChangeName()" data-rel="chosen">
                                        <option value="0">Select</option>
                                        <?php
                                            $query = "SELECT * FROM ".Raw." WHERE isdeleted = 0";
                                            $result = mysql_query($query);
                                            if($result != "") {
                                                $rowcount = mysql_num_rows($result);
                                                if($rowcount > 0) {
                                                    while($row = mysql_fetch_assoc($result)) {
                                                    $id = $row['id'];
                                                    $name = $row['ingredientname'];
                                        ?>
                                        <option value="<?php echo $name; ?>" <?php if ($keyingid == $id) { echo "selected"; } ?> ><?php echo $name; ?></option>
                                        <?php
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                    		</td>
                                            <td style="padding: 8px 5px 8px 0px; text-align: right;">
                                                <a href="#" class="active" style="font-size:15px; color:#22baa8"><i class="icon-remove-sign icon-large text-success text-active"></i></a>
                                    		</td>
                                        </tr>
                                    </table>
                                </td>
                          	  </tr>
                              <tr>
                                <th style="width:60px; text-align: center; padding: 10px 4px; vertical-align: top; font-family: Arial, Helvetica, sans-serif; font-size: 10px; border-bottom:0px;">Qty<br />(gm/ml)</th>
                                <th style="width:70px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Energy<br />(kcal)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Carbo<br />hydrate<br />(g)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Protein<br />(g)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Total Fat<br />(g)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Fibre<br />(g)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Sodium<br />(mg)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Pufa<br /></th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Mufa</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Transfat</th>
                                <th style="width:70px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Potassium<br />(mg)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Vitamin <br />A<br />(carotene-mcg)  </th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Vitamin <br />B1<br />(mg)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Vitamin <br />B2<br />(mg)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Vitamin <br />B3<br />(mg)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Vitamin <br />B6<br />(mg)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Vitamin <br />C<br />(mg)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Vitamin <br />E </th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Iron<br />(mg)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Calcium <br />(mg)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Zinc<br />(mg)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Phosphorous <br />(mg)</th>
                                    <th style="border-right:solid 0px #bbbbbb; width:80px; text-align: center; padding: 10px 4px; vertical-align: top;  border-bottom:0px;">Sugar</th>
                          </tr>                          
                              <tr>
                                <td style=" padding: 8px 4px; width:60px; border-top:0px;">
                               	  <input type="text" name="txtQuantity" id="txtQuantity" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px; width:70px; border-top:0px;">
                                	<input type="text" name="txtEnergy" id="txtEnergy" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px; width:80px; border-top:0px;">
                                	<input type="text" name="txtCarbohydrate" id="txtCarbohydrate" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px; width:80px; border-top:0px;">
                                	<input type="text" name="txtProtein" id="txtProtein" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px; width:80px; border-top:0px;">
                                	<input type="text" name="txtTotalFat" id="txtTotalFat" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px; width:80px; border-top:0px;">
                                	<input type="text" name="txtFibre" id="txtFibre" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px; width:80px; border-top:0px;">
                                	<input type="text" name="txtSodium" id="txtSodium" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px; width:80px; border-top:0px;">
                                	<input type="text" name="txtPufa" id="txtPufa" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px; width:80px; border-top:0px;">
                                	<input type="text" name="txtMufa" id="txtMufa" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px; width:80px; border-top:0px;">
                                	<input type="text" name="txtTransfat" id="txtTransfat" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px; width:70px; border-top:0px;">
                                	<input type="text" name="txtPotassium" id="txtPotassium" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px; width:80px; border-top:0px;">
                                	<input type="text" name="txtVitaminA" id="txtVitaminA" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px;width:80px; border-top:0px;">
                                	<input type="text" name="txtVitaminB1" id="txtVitaminB1" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px;width:80px; border-top:0px;">
                                	<input type="text" name="txtVitaminB2" id="txtVitaminB2" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px;width:80px; border-top:0px;">
                                	<input type="text" name="txtVitaminB3" id="txtVitaminB3" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px;width:80px;  border-top:0px;">
                                	<input type="text" name="txtVitaminB6" id="txtVitaminB6" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px;width:80px;  border-top:0px;">
                                	<input type="text" name="txtVitaminC" id="txtVitaminC" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px;width:80px; border-top:0px;">
                                	<input type="text" name="txtVitaminE" id="txtVitaminE" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px;width:80px; border-top:0px;">
                                	<input type="text" name="txtIron" id="txtIron" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px;width:80px; border-top:0px;">
                                	<input type="text" name="txtCalcium" id="txtCalcium" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px;width:80px; border-top:0px;">
                                	<input type="text" name="txtZinc" id="txtZinc" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px;width:80px; border-top:0px;">
                                	<input type="text" name="txtPhosphorous" id="txtPhosphorous" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="border-right:solid 0px #bbbbbb; padding: 8px 4px; width:80px; border-top:0px;">
                                	<input type="text" name="txtSugar" id="txtSugar" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                              </tr>
                            </table>
                            
                            
                            <table border="1" cellspacing="0" cellpadding="0" style="margin-top:30px; text-align:center; font-size: 11px; border: solid 1px #bbbbbb; margin-left:-12px;" id="table2">
                              <tr>
                                <td colspan="23" style="text-align: left; vertical-align: top;">
                                	<table width="100%" border="0" cellpadding="0" cellspacing="0">
                                    	<tr style=" background-color:#e4fdf9; height:45px;">
                                        	<td style="width:120px; text-align: left; padding: 15px 0 10px 10px; vertical-align: top; border: solid 0px #0099FF; font-size: 12px; font-weight: bold;">
                                            	Key Ingredients 
                                            </td>
                                            <td style="padding: 12px 30px 8px 0px; text-align: left; width: 900px;">
                                            	<select id="ddlKeyIng1" name="ddlKeyIng1" style="width:300px;" onChange="javascript:return ChangeName()" data-rel="chosen">
                                        <option value="0">Select</option>
                                        <?php
                                            $query = "SELECT * FROM ".Raw." WHERE isdeleted = 0";
                                            $result = mysql_query($query);
                                            if($result != "") {
                                                $rowcount = mysql_num_rows($result);
                                                if($rowcount > 0) {
                                                    while($row = mysql_fetch_assoc($result)) {
                                                    $id = $row['id'];
                                                    $name = $row['ingredientname'];
                                        ?>
                                        <option value="<?php echo $name; ?>" <?php if ($keyingid == $id) { echo "selected"; } ?> ><?php echo $name; ?></option>
                                        <?php
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                    		</td>
                                            <td style="padding: 8px 5px 8px 0px; text-align: right;">
                                                <a href="#" class="active" style="font-size:15px; color:#22baa8"><i class="icon-remove-sign icon-large text-success text-active"></i></a>
                                    		</td>
                                        </tr>
                                    </table>
                                </td>
                          	  </tr>
                              <tr>
                                <th style="width:60px; text-align: center; padding: 10px 4px; vertical-align: top; font-family: Arial, Helvetica, sans-serif; font-size: 10px; border-bottom:0px;">Qty<br />(gm/ml)</th>
                                <th style="width:70px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Energy<br />(kcal)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Carbo<br />hydrate<br />(g)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Protein<br />(g)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Total Fat<br />(g)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Fibre<br />(g)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Sodium<br />(mg)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Pufa<br /></th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Mufa</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Transfat</th>
                                <th style="width:70px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Potassium<br />(mg)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Vitamin <br />A<br />(carotene-mcg)  </th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Vitamin <br />B1<br />(mg)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Vitamin <br />B2<br />(mg)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Vitamin <br />B3<br />(mg)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Vitamin <br />B6<br />(mg)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Vitamin <br />C<br />(mg)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Vitamin <br />E </th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Iron<br />(mg)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Calcium <br />(mg)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Zinc<br />(mg)</th>
                                <th style="width:80px; text-align: center; padding: 10px 4px; vertical-align: top; border-bottom:0px;">Phosphorous <br />(mg)</th>
                                    <th style="border-right:solid 0px #bbbbbb; width:80px; text-align: center; padding: 10px 4px; vertical-align: top;  border-bottom:0px;">Sugar</th>
                          </tr>                          
                              <tr>
                                <td style=" padding: 8px 4px; width:60px; border-top:0px;">
                               	  <input type="text" name="txtQuantity" id="txtQuantity" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px; width:70px; border-top:0px;">
                                	<input type="text" name="txtEnergy" id="txtEnergy" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px; width:80px; border-top:0px;">
                                	<input type="text" name="txtCarbohydrate" id="txtCarbohydrate" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px; width:80px; border-top:0px;">
                                	<input type="text" name="txtProtein" id="txtProtein" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px; width:80px; border-top:0px;">
                                	<input type="text" name="txtTotalFat" id="txtTotalFat" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px; width:80px; border-top:0px;">
                                	<input type="text" name="txtFibre" id="txtFibre" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px; width:80px; border-top:0px;">
                                	<input type="text" name="txtSodium" id="txtSodium" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px; width:80px; border-top:0px;">
                                	<input type="text" name="txtPufa" id="txtPufa" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px; width:80px; border-top:0px;">
                                	<input type="text" name="txtMufa" id="txtMufa" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px; width:80px; border-top:0px;">
                                	<input type="text" name="txtTransfat" id="txtTransfat" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px; width:70px; border-top:0px;">
                                	<input type="text" name="txtPotassium" id="txtPotassium" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px; width:80px; border-top:0px;">
                                	<input type="text" name="txtVitaminA" id="txtVitaminA" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px;width:80px; border-top:0px;">
                                	<input type="text" name="txtVitaminB1" id="txtVitaminB1" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px;width:80px; border-top:0px;">
                                	<input type="text" name="txtVitaminB2" id="txtVitaminB2" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px;width:80px; border-top:0px;">
                                	<input type="text" name="txtVitaminB3" id="txtVitaminB3" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px;width:80px;  border-top:0px;">
                                	<input type="text" name="txtVitaminB6" id="txtVitaminB6" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px;width:80px;  border-top:0px;">
                                	<input type="text" name="txtVitaminC" id="txtVitaminC" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px;width:80px; border-top:0px;">
                                	<input type="text" name="txtVitaminE" id="txtVitaminE" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px;width:80px; border-top:0px;">
                                	<input type="text" name="txtIron" id="txtIron" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px;width:80px; border-top:0px;">
                                	<input type="text" name="txtCalcium" id="txtCalcium" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px;width:80px; border-top:0px;">
                                	<input type="text" name="txtZinc" id="txtZinc" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="padding: 8px 4px;width:80px; border-top:0px;">
                                	<input type="text" name="txtPhosphorous" id="txtPhosphorous" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                                <td style="border-right:solid 0px #bbbbbb; padding: 8px 4px; width:80px; border-top:0px;">
                                	<input type="text" name="txtSugar" id="txtSugar" value="" style="width: 25px; text-align: left; padding: 0px 3px; font-size: 12px;" />                                </td>
                              </tr>
                            </table>
                            
                            
                            <div style="padding:25px 0;font-size:12px;">
                            	<b>Note :</b> If raw ingredient contains 67.5 gm, then formula will be used here as <strong>67.5 / 100 * 40 (quantity) = 27 gm </strong>in actual recipe.
                            </div>
                            
                            
                             <div style="text-align:right; margin:15px -10px 35px 0px;"> 
              	<input type="submit" id="btnSubmit" name="btnSubmit" value="Submit"  class="btn btn-primary" onClick="javascript:return Validate();" />
              </div>

   			</form>
          </div>
        </section>
        
      </div>
      
    </div>
    <?php include "includes/footer.inc.php"?>

  </section>
  
</section>
<!-- footer -->
<!-- / footer-->


</body>
</html>

