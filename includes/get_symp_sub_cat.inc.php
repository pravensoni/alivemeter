<?php include 'common.inc.php'?>
<?php include 'links.php'?>
<link rel="stylesheet" type="text/css" href="<?php echo $strHostName?>/style/inbox_tabcontent.css" />
<?php
	$MainType=$_GET['MainType']/121;
	$MainTypeID=$_GET['MainTypeID']/121;
	
	$MainTypeName=GetValue("select sub_cat_name as col from tbl_symp_sub_categroy where sub_cat_id=".$MainType,"col");
	$strCatName="";
?>
<table cellpadding="0" cellspacing="0" style="width:100%;">
  <tr>
	<td style="font-size:13px;" colspan="2">
		<div class="dvFloat" style="padding:10px 15px; background-color:#666; color:#FFFFFF">Symptoms of <?php echo $MainTypeName?></div>
    </td>
  </tr>
  <tr>
	<td style="width:50%; vertical-align:top; text-align:left">
	<ul class="symtoms1" >
		<?php 
		
		
		$strGenderType="";
		$query = "SELECT * FROM ".Users." WHERE user_id=".$_SESSION['UserID'];
		//echo $query;
		$rows = $db->select($query);
		//Alert ($db->row_count);
		if($db->row_count > 0) {
			while($row = $db->get_row($rows, 'MYSQL_ASSOC')) {
			
				$strAge=floor((time() - strtotime( $row['dob']))/31556926);
				if($strAge < 18)
				{
					$strGenderType="C";
				}
				else
				{
					if( $row['gender']=="Male")
					{
						$strGenderType="M";
					}
					else
					{
						$strGenderType="F";
					}
				}
				
		 }}
		
		
		if($strGenderType=="F")
		{
			$strGenderType="2";
		}
		
		if($strGenderType=="M")
		{
			$strGenderType="1";
		}
		
		
		if($strGenderType=="C")
		{
			$strGenderType="0";
		}
		
		$query="SELECT a.* FROM tbl_symptom a WHERE a.symptom_id <> 0 and a.isactive=1 and a.sub_cat_id=".$MainType." and cat_id=".$MainTypeID." and a.gender_type like '%".$strGenderType."%' order by a.symptom_name";
		///$query = "SELECT a.*,b.sub_cat_name FROM tbl_symptom a inner join tbl_symp_sub_categroy b on b.sub_cat_id=a.sub_cat_id  WHERE a.symptom_id <> 0 and a.isactive=1 and a.cat_id=".$MainType;
	//echo $query;
		$result = mysql_query($query);
		if($result != "") {
			$rowcount = mysql_num_rows($result);
			if($rowcount > 0) {
				while($row = mysql_fetch_assoc($result)) {
					extract($row);		
		 ?>
			
			<li id="l_symp_name_<?php echo $row['symptom_id']*121;?>"><a style="cursor:pointer" id="symp_name_<?php echo $row['symptom_id']*121;?>" onclick="javascript:AddSymptom(this)"><?php echo $row['symptom_name'];?></a></li>
		   
		<?php }}} ?>
	  </ul>
	 </td>
	
  </tr>
</table>