<?php include("../includes/common.inc.php"); ?>
<?php include("includes/links.inc.php"); ?>
<title>View </title>

	<style>
	.ui-autocomplete-loading {
		background: white url('<?php echo $strHostName?>/manage/images/ui-anim_basic_16x16.gif') right center no-repeat;
	}
	
	.newtable
	{
	 width:99%;
	 margin-bottom:5px;
	
	}
	.newtable td
	{
		border:solid 1px #eaedef;
	}
	</style>
    
    
<script type="text/javascript">

$(function() {

	 
$("#txtName").autocomplete({
	source:"search_autocomplete.php?type=recipe",
	minLength: 2,
	select: function( event, ui ) {
		if(ui.item.id=="0" || ui.item.id=="")
		{
			 
		}
		else
		{
			window.location.href="view_recipes.php?search="+ui.item.value;
		}
	}
	
});
	 
	
});




function Show(i)
{
	
	if (document.getElementById("aPlus1"+i).innerHTML=="+"){
		document.getElementById("trShow"+i).style.display='';	
		document.getElementById("aPlus1"+i).innerHTML="-";
		document.getElementById("aPlus"+i).innerHTML="<img src='images/minus.png'/>";
	} else {
		document.getElementById("trShow"+i).style.display='none';
		document.getElementById("aPlus1"+i).innerHTML="+";
		document.getElementById("aPlus"+i).innerHTML="<img src='images/plusicon.png'/>";
	}

}

</script>

</head>
<?php
$condition=""; $i="";  $QyertSting=""; $mode=""; $page="1";

	if(isset($_GET['mode'])) {
		if($converter->decode($_GET['mode']) == "trash") {
			$trash = true;
		} else {
			$trash = false;
		}
	} else {
		$trash = false;
	}
	if(isset($_GET['search']))
	{
		if($_GET['search']!="")
		{
			$serach=$_GET['search'];
			$condition=$condition." and name like '%$serach%'";

		}
	}
	
	if(isset($_GET['m'])) {
		$mode = $converter->decode($_GET['m']);
		
		if($mode == "trash") {
			if(isset($_GET['deleteid'])) {
				$id = $converter->decode($_GET['deleteid']);
				if(isset($_GET['qs'])) {
					if($_GET['qs'] != "") {
						$qs = $converter->decode($_GET['qs']);
					}
				}
				if($id != "") {
					$query = "UPDATE ".Recipe." SET isdeleted = 1 WHERE id = $id ";
					$result = mysql_query($query);
					AlertandRedirect('Clicked record is moved to trash successfully.', "".GetOnlyPageName()."?".$qs);
				}
			}
		} else if($mode == "delete") {
			if(isset($_GET['deleteid'])) {
				$id = $converter->decode($_GET['deleteid']);
				if(isset($_GET['qs'])) {
					if($_GET['qs'] != "") {
						$qs = $converter->decode($_GET['qs']);
					}
				}
				if($id != "") {
					$query = "DELETE FROM ".Recipe." WHERE id = $id ";
					$result = mysql_query($query);
					
					$query = "DELETE FROM ".Recipe_Det." WHERE parent_id = $id ";
					$result = mysql_query($query);

					AlertandRedirect('Clicked record is deleted successfully.', "".GetOnlyPageName()."?".$qs);
				}
			}
		} else if($mode == "Active") {
			if(isset($_GET['deleteid'])) {
				$id = $converter->decode($_GET['deleteid']);
				if(isset($_GET['qs'])) {
					if($_GET['qs'] != "") {
						$qs = $converter->decode($_GET['qs']);
					}
				}
				if($id != "") {
					$query = "UPDATE ".Recipe." SET isdeleted = 0 WHERE id = $id ";
					$result = mysql_query($query);
					AlertandRedirect('Clicked record is activated successfully.', "".GetOnlyPageName()."?".$qs);
				}
			}
		}
	}

	
	if($_SESSION['login_type']=="User")
	{
		$condition .= " and user_id = ".$_SESSION['login_id'];
	}
	
	$trash_count = $db->select("SELECT * FROM ".Recipe." WHERE isdeleted = 1".$condition ); 
	$trash_count = $db->row_count;
	
	$active_count = $db->select("SELECT * FROM ".Recipe." WHERE isdeleted = 0".$condition ); 
	$active_count = $db->row_count;
	
	
	if($trash == true) {
		$condition .= " and isdeleted = 1 ";
	} else {
		$condition .= " and isdeleted = 0 ";
	}
	
	
	
	
	
	$qty="0";$energy="0";$carbo="0";$protein="0";$total_fat="0";$fibre="0";$sodium="0";$pufa="0";$mufa="0";$transfat="0";
$potassium="0";$vt_a="0";$vt_b1="0";$vt_b2="0";$vt_b3="0";$vt_b6="0";$vt_c="0";$vt_e="0";$iron="0";$calcium="0";
$zinc="0";$phosphorous="0";$sugar="0";
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
		<h4><strong><i class="icon-food"></i>&nbsp; View Recipes</strong></h4>
    </div>
    <div class="row">
      <div class="col-sm-12">
        <section class="panel">
          <div class="panel-body">
          <label class="" style="border:solid 0px red; width:100%; margin-bottom:10px;"> 
          	<div style="float:left; width:50%;">
             <a href="<?php echo GetOnlyPageName(); ?>" class="active"><i class="icon-edit icon-large text-success text-active"></i>
             Active&nbsp;&nbsp;<?php echo $active_count; ?></a>&nbsp;&nbsp;
               <?php if($_SESSION['login_type']!="User"){?>
              <a href="?mode=<?php echo $converter->encode("trash") ?>" class="active"><i class="icon-trash icon-large text-success text-active"></i>Trash&nbsp;&nbsp;<?php echo $trash_count; ?></a>
			  <?php } ?>
          </div>
          <div style="float:left; width:50%; text-align:right;">
			 <a href="add_recipe.php" class="btn btn-info btn-white btn-xs" style="width:150px;">Add Recipe</a>
			
            </div>
          </label>
          <table id="dlListing" style="border-bottom:solid 1px #ddd; border-top:0px; text-align:right; width:100%; margin-bottom:25px;">
							<tr>
								
								<td style="padding-bottom:15px;">
                                Search Name :
									 <input type="text" id="txtName" name="txtName" value="" style="width:200px; margin-left:5px; border:solid 1px #ddd; border-radius:5px; padding:3px 0;"/>
								</td>
								

							</tr>
							
						</table>
            <div class="table-responsive">
             <table class="table table-striped b-t text-small">
                                                  <thead>
                                                      <tr>
                                                       <?php
							
							
							if($trash == true) {
								$pagingLink = getPagingLinkBackEnd($trash_count, 10, $QyertSting);
								$totalPagesDropDown    = ceil($trash_count / 10);
								//Alert($totalPagesDropDown );
							}
							else
							{
								
								if(isset($_GET['mode'])){$mode=$_GET['mode'];}
								$pagingLink = getPagingLinkBackEnd($active_count, 10, $QyertSting."&mode=".$mode);
								$totalPagesDropDown    = ceil($active_count / 10);
							}

 
								
						?>
                                                           <th style="padding:10px; width:25px; border:0px;">&nbsp;</th>
                                                           <th style="padding:10px; width:200px;">Name</th>
														    <th style="padding:10px;">Key Ingredients</th>
                                                          <?php if($_SESSION['login_type']!="User"){?>
															<th style="padding:10px; width:200px; text-align:center;">Created By</th>
															<th style="padding:10px; width:200px; text-align:center;">Approved By</th>
														   <?php } ?>
														   <th style="padding:10px; width:100px; text-align:center;">Approved</th>
														
																<th style="padding:10px; border-right:solid 0px #bbbbbb; 
																text-align:center; width:50px;">Actions</th>
														   
                                                      </tr>
                                                  </thead>  
                                                    <?php
														$query = "SELECT *,(select name from tbl_adminlogin b where a.user_id=b.id limit 1) as created_name,(select name from tbl_adminlogin b where a.approved_by=b.id limit 1) as approve_name FROM ".Recipe." a WHERE id <> 0 ".$condition." ORDER BY id desc";
														$result = mysql_query(getPagingQuery($query, 10));
														
														if($result != "") {
															$nume = mysql_num_rows($result);
														} else {
															$nume = 0;
														}
														
														
														if($result != "") {
															$rowcount  = mysql_num_rows($result);
															if($rowcount > 0) {
																while($row = mysql_fetch_assoc($result)) {
																$strValue="";
																	
													?>
                                                    <tr style="border-bottom: dotted 0px #b9d1fd; background-color: <?php echo $bg; ?>;">
                                                        <td>
															<a href="#" id="aPlus1<?php echo $i?>" onClick="javascript:Show('<?php echo $i?>');" style="font-size:18px;font-weight:bold; display:none;">+</a>
                                                            
                                                            <a href="#" id="aPlus<?php echo $i?>" onClick="javascript:Show('<?php echo $i?>');" style="font-size:18px;font-weight:bold;"><img src='images/plusicon.png'/></a>
														</td>
                                                        <td style="padding:10px;"><?php echo $row['name']?></td>
                                                      <td style="padding:10px;">
														<?php $query1 = "SELECT id,key_id,qty, energy as energy, carbo as carbo, protein as protein,  total_fat as total_fat, fibre as fibre, sodium as sodium, pufa as pufa, mufa as mufa, transfat as transfat, potassium as potassium, vt_a as vt_a, vt_b1 as vt_b1, vt_b2 as vt_b2, vt_b3 as vt_b3, vt_b6 as vt_b6, vt_c as vt_c, vt_e as vt_e, iron as iron, calcium as calcium, zinc as zinc,  phosphorous as phosphorous,  sugar as sugar FROM ".Recipe_Det." WHERE id <> 0 and parent_id=".$row['id']." group by id, key_id order by id";
														
														//echo $query1;
														$result1 = mysql_query($query1);
														if($result1 != "") {
															$rowcount1  = mysql_num_rows($result1);
															if($rowcount1 > 0) {
																while($row1 = mysql_fetch_assoc($result1)) {?>
															<?php 
																$qty=$qty+$row1['qty'];
																$energy=$energy+$row1['energy'];
																$carbo=$carbo+$row1['carbo'];
																$protein=$protein+$row1['protein'];
																$total_fat=$total_fat+$row1['total_fat'];
																$fibre=$fibre+$row1['fibre'];
																$sodium=$sodium+$row1['sodium'];
																$pufa=$pufa+$row1['pufa'];
																$mufa=$mufa+$row1['mufa'];
																$transfat=$transfat+$row1['transfat'];
																$potassium=$potassium+$row1['potassium'];
																$vt_a=$vt_a+$row1['vt_a'];
																$vt_b1=$vt_b1+$row1['vt_b1'];
																$vt_b2=$vt_b2+$row1['vt_b2'];
																$vt_b3=$vt_b3+$row1['vt_b3'];
																$vt_b6=$vt_b6+$row1['vt_b6'];
																$vt_c=$vt_c+$row1['vt_c'];
																$vt_e=$vt_e+$row1['vt_e'];
																$iron=$iron+$row1['iron'];
																$calcium=$calcium+$row1['calcium'];
																$zinc=$zinc+$row1['zinc'];
																$phosphorous=$phosphorous+$row1['phosphorous'];
																$sugar=$sugar+$row1['sugar'];
															
															
															 ?>		
															<?php $strValue=$strValue.",".$common->RetriveIngredians($row1['key_id']);?>
															<?php }}}?>

															<?php if($strValue!=""){
																$strValue=substr($strValue,1);
															} echo $strValue;?>
															
														</td>
														<?php if($_SESSION['login_type']!="User"){?>
															<td style="text-align:center"><?php echo $row['created_name'] ?></td>
															<td style="text-align:center"><?php echo $row['approve_name'] ?></td>
														<?php } ?>
														<td style="text-align:center;"><?php if($row['approved']=="1"){echo "Yes";}else {echo "No";} ?></td>
														
                                                         <td style="border-right:solid 0px #bbbbbb; text-align:center;">
                                                     <a class="editbtn" href="add_recipe.php?cid=<?php echo $converter->encode($row['id']); ?>" title="Edit"><i class="icon-edit icon-white"></i></a>
                                                       <?php if($_SESSION['login_type']!="User"){?>
                                                       <?php if($trash == true) { ?>
                                            <a class="restore" href="javascript:activeRecord('<?php echo GetOnlyPageName(); ?><?php echo $querystring; ?>&m=<?php echo $converter->encode('Active'); ?>&deleteid=<?php echo $converter->encode($row['id']); ?>');"  title="Restore"><i class="icon-zoom-in icon-white"></i></a>&nbsp;
                                            
                                            <a class="deletebtn" href="javascript:deleteRecord('<?php echo GetOnlyPageName(); ?><?php echo $querystring; ?>&m=<?php echo $converter->encode('delete'); ?>&deleteid=<?php echo $converter->encode($row['id']); ?>');"  title="Delete"><i class="icon-remove-sign"></i></a>
											<?php } else { ?>
                                            <a class="deletebtn" href="javascript:MoveToTrash('<?php echo GetOnlyPageName(); ?><?php echo $querystring; ?>&m=<?php echo $converter->encode('trash'); ?>&deleteid=<?php echo $converter->encode($row['id']); ?>');"  title="Delete"><i class="icon-remove-sign"></i></a>
                                            <?php } ?>
                                            
                                            <?php } ?>
                                                    </td>
													
                                                    </tr>
													<tr id="trShow<?php echo $i?>" style="display:none;">
													<td colspan="7" style="border:solid 0px red; padding:0px;">
													 <table cellpadding="0" cellspacing="0" border="0"   class="newtable">
	 	<tr>
        	<td colspan="23" style="padding:15px;"><b>Message by Moderator :</b> <?php echo $row['message'];?></td>
        </tr>
     
		<tr>
		    <td style="padding:8px; background-color:#e4fdf9;">Qty</td>
			<td style="padding:8px; background-color:#e4fdf9;">Energy</td>
			<td style="padding:8px; background-color:#e4fdf9;">Carbo</td>
			<td style="padding:8px; background-color:#e4fdf9;">Protein</td>
			<td style="padding:8px; background-color:#e4fdf9;">Total Fat</td>
			<td style="padding:8px; background-color:#e4fdf9;">Fibre</td>
			<td style="padding:8px; background-color:#e4fdf9;">Sodium</td>
			<td style="padding:8px; background-color:#e4fdf9;">Pufa<br /></td>
			<td style="padding:8px; background-color:#e4fdf9;">Mufa</td>
			<td style="padding:8px; background-color:#e4fdf9;">Transfat</td>
			<td style="padding:8px; background-color:#e4fdf9;">Potassium</td>
			<td style="padding:8px; background-color:#e4fdf9;">VT A</td>
			<td style="padding:8px; background-color:#e4fdf9;">VT B1</td>
			<td style="padding:8px; background-color:#e4fdf9;">VT B2</td>
			<td style="padding:8px; background-color:#e4fdf9;">VT B3</td>
			<td style="padding:8px; background-color:#e4fdf9;">VT B6</td>
			<td style="padding:8px; background-color:#e4fdf9;">VT C</td>
			<td style="padding:8px; background-color:#e4fdf9;">VT E </td>
			<td style="padding:8px; background-color:#e4fdf9;">Iron</td>
			<td style="padding:8px; background-color:#e4fdf9;">Calcium </td>
			<td style="padding:8px; background-color:#e4fdf9;">Zinc</td>
			<td style="padding:8px; background-color:#e4fdf9;">Phosphorous</td>
			<td style="padding:8px; background-color:#e4fdf9;">Sugar</td>
		 
		</tr>
        <tr>
		 
			<td style="padding:8px; text-align:center;"><?php echo $qty?></td>
           <td style="padding:8px; text-align:center;"><?php echo $energy?></td>
			<td style="padding:8px; text-align:center;"><?php echo $carbo?></td>
			<td style="padding:8px; text-align:center;"><?php echo $protein?></td>
			<td style="padding:8px; text-align:center;"><?php echo $total_fat?></td>
			<td style="padding:8px; text-align:center;"><?php echo $fibre?></td>
			<td style="padding:8px; text-align:center;"><?php echo $sodium?></td>
			<td style="padding:8px; text-align:center;"><?php echo $pufa?></td>
			<td style="padding:8px; text-align:center;"><?php echo $mufa?></td>
			<td style="padding:8px; text-align:center;"><?php echo $transfat?></td>
			<td style="padding:8px; text-align:center;"><?php echo $potassium?></td>
			<td style="padding:8px; text-align:center;"><?php echo $vt_a?></td>
			<td style="padding:8px; text-align:center;"><?php echo $vt_b1?></td>
			<td style="padding:8px; text-align:center;"><?php echo $vt_b2?></td>
			<td style="padding:8px; text-align:center;"><?php echo $vt_b3?></td>
			<td style="padding:8px; text-align:center;"><?php echo $vt_b6?></td>
			<td style="padding:8px; text-align:center;"><?php echo $vt_c?></td>
            <td style="padding:8px; text-align:center;"><?php echo $vt_e?></td>
			<td style="padding:8px; text-align:center;"><?php echo $iron?></td>
			<td style="padding:8px; text-align:center;"><?php echo $calcium?></td>
			<td style="padding:8px; text-align:center;"><?php echo $zinc?> </td>
			<td style="padding:8px; text-align:center;"><?php echo $phosphorous?></td>
			<td style="padding:8px; text-align:center;"><?php echo $sugar?></td>
			
		 
		</tr>
	 
	</table>
				
													</td>
												</tr>
                                                
													<?php

															$i=$i+1;

                                                                }
                                                            } else {
                                                    ?>
                                                    <tr>
                                                        <td colspan="6" style="color: red;">Sorry! List of Recipes is empty.</td>
                                                    </tr>
                                                    <?php
                                                            }
                                                        }
                                                    ?>
                                                </table>
            
            <div class="row" style="border:solid 0px red; text-align:center; margin:25px 0;">
            	 
                <div class="text-center" style="border:solid 0px green; width:15%; float:left;"> 
                
                <small class="text-muted inline m-t-small m-b-small">showing <?php if($trash==true){?>
									  <?php echo ($nume*$page) ?> of <?php echo  $trash_count?>
								  <?php } else { ?>
										<?php echo ($nume*$page) ?> of <?php echo  $active_count?>
								  <?php } ?> items</small> </div>
                <div style="width:80%; border:solid 0px yellow; float:left;">
                <ul class="pagination pagination-small m-t-none m-b-none">
                  <li> <?php echo $pagingLink ?></li>
                </ul>
              </div>
             </div>
          </div>
          </div>
        </section>
        
      </div>
      
    </div>
   
  </section>
   <?php include "includes/footer.inc.php"?>
</section>
<!-- footer -->

<!-- / footer -->





<script>
Show();
</script>



</body>
</html>
