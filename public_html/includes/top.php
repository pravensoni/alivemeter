<?php 	$strhome=""; $strhealth=""; $strtopstories=""; $strdeals=""; $strrewardpoints="";

///Alert ($strHostName);	
	
	$strPageName=GetPageName();
	
///	Alert ($strPageName);
	
 	if ($strPageName=="~index.php"){
	 	$strhome="class='selected'";
	 }
	 
	 if ($strPageName=="~health.php"){
	 	$strhealth="class='selected'";
	 }
	
	 if ($strPageName=="~top_stories.php"){
	 	$strtopstories="class='selected'";
	 }
	 
	 
	 
	 if ($strPageName=="~deals.php"){
	 	$strdeals="class='selected'";
	 }
	 
	
	 if ($strPageName=="~reward_points.php"){
	 	$strrewardpoints="class='selected'";
	 }
	 
	 	
?>


<?php 
$user_email=""; $password=""; $update_times="";

if(isset($_POST['btnSignIn'])) {
		$user_email = str_replace("'", "''", $_POST['txtLoginUserName']);
		$password = str_replace("'", "''", $_POST['txtLoginPassword']);
		$password=$converter->encode($password);
		$query = "SELECT * FROM ".Users." WHERE user_profile_id = '$user_email' and password = '$password'";
		//echo $query;
		$rows = $db->select($query);
		//Alert ($db->row_count);
	
		
		
		if($db->row_count > 0) {
			while($row = $db->get_row($rows, 'MYSQL_ASSOC')) {
			
				$loginisactive= $row['isactive'];
				if($loginisactive=="0") {
					$randomno = rand(0, 9999);
							AlertandRedirect("Please fill necessary requirements to proceed further.", $strHostName."/page.php?dir=registration/step1&record=".$converter->encode("insert record")."&menu_type=".$converter->encode("step1")."&cid=".$converter->encode($row['user_id'])."&user_id=".$converter->encode("0")."&email=".$converter->encode($row['user_email'])."&randomno=".$converter->encode($randomno));
							return;
					}
				$_SESSION['UserID'] = $row['user_id'];
				$_SESSION['UserName'] = $row['name'];
				$_SESSION['UserType'] = $row['registration_type'];
				$_SESSION['UserEmail'] = $row['user_email'];
				
				####################__USER TRACK [START]__#######################
				if($update_times=="")
				{
					$update_times="0";
				}
				
				$data = array(
					'user_id' => $_SESSION['UserID'],
					'user_type' => $_SESSION['UserType'],
					'update_times' => $update_times + 1,
					'time'=> date("d-M-Y h:i"),
				);
				$trackId = $db->insert_array("tbl_user_track", $data);
				####################__USER TRACK [ENDS]__#######################
				
				$active_count = $db->select("SELECT * FROM  ".Users." where parent_id=".$_SESSION['UserID']." order by name"); 
				$active_count = $db->row_count;
				
				//$doc_consult_count = $db->select("SELECT * FROM  tbl_doc_consult where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0"); 
				//$doc_consult_count = $db->row_count;
				
				
				//doc_consult 
				$doc_consult_count =GetValue("select Count(*)  as col from tbl_doc_consult  where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 ","col");
				$doc_consult_count_na=GetValue("select Count(*) as col from tbl_user_not_applicable where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 and type='Doc_Consult'","col");
				$doc_consult_count=$doc_consult_count+	$doc_consult_count_na;
			
				
				//medication 
			$medication_count =GetValue("select Count(*)  as col from tbl_medication  where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 ","col");
				$medication_count_na=GetValue("select Count(*) as col from tbl_user_not_applicable where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 and type='Medication'","col");
				$medication_count=$medication_count+$medication_count_na;


				//allergies 
				$allergies_count =GetValue("select Count(*)  as col from tbl_allergies  where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 ","col");
				$allergies_count_na=GetValue("select Count(*) as col from tbl_user_not_applicable where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 and type='Allergies'","col");
				$allergies_count=$allergies_count+$allergies_count_na;
				
				
				//hospitalization 
				$hospitalization_count =GetValue("select Count(*)  as col from tbl_hospital  where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 ","col");
				$hospitalization_count_na=GetValue("select Count(*) as col from tbl_user_not_applicable where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 and type='Hospitalization'","col");
				$hospitalization_count=$hospitalization_count+$hospitalization_count_na;
				
				
				
				//immunization 
				$immunization_count =GetValue("select Count(*)  as col from tbl_immunization  where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 ","col");
				$immunization_count_na=GetValue("select Count(*) as col from tbl_user_not_applicable where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 and type='Immunization'","col");
				$immunization_count=$immunization_count+$immunization_count_na;
				
				//immunization 
				$immunization_count =GetValue("select Count(*)  as col from tbl_immunization  where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 ","col");
				$immunization_count_na=GetValue("select Count(*) as col from tbl_user_not_applicable where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 and type='Immunization'","col");
				$immunization_count=$immunization_count+$immunization_count_na;
				
				
				//Health_Problems 
				$health_problem_count =GetValue("select Count(*)  as col from tbl_health_problem  where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 ","col");
				$health_problem_count_na=GetValue("select Count(*) as col from tbl_user_not_applicable where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 and type='Health_Problems'","col");
				$health_problem_count=$health_problem_count+$health_problem_count_na;
				
				
				//Family_History 
				$family_history_count =GetValue("select Count(*)  as col from tbl_family_history  where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 ","col");
				$family_history_count_na=GetValue("select Count(*) as col from tbl_user_not_applicable where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 and type='Family_History'","col");
				$family_history_count=$family_history_count+$family_history_count_na;
			
				
				//Blood_Pressure 
				$blood_pressure_count =GetValue("select Count(*)  as col from tbl_blood_pressure  where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 ","col");
				$blood_pressure_count_na=GetValue("select Count(*) as col from tbl_user_not_applicable where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 and type='Blood_Pressure'","col");
				$blood_pressure_count=$blood_pressure_count+$blood_pressure_count_na;
			
			
				//sugar_profile 
				$sugar_profile_count =GetValue("select Count(*)  as col from tbl_sugar_profile where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 ","col");
				$sugar_profile_count_na=GetValue("select Count(*) as col from tbl_user_not_applicable where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 and type='Sugar_Profile'","col");
				$sugar_profile_count=$sugar_profile_count+$sugar_profile_count_na;
				
			
				//Life_Style 
				$life_style_count =GetValue("select Count(*)  as col from tbl_life_style where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 ","col");
				$life_style_count_na=GetValue("select Count(*) as col from tbl_user_not_applicable where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 and type='Life_Style'","col");
				$life_style_count=$life_style_count+$life_style_count_na;
				
				
				
				//Lipid_Profile 
				$lipid_profile_count =GetValue("select Count(*)  as col from tbl_lipid_profile where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 ","col");
				$lipid_profile_count_na=GetValue("select Count(*) as col from tbl_user_not_applicable where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 and type='Lipid_Profile'","col");
				$lipid_profile_count=$lipid_profile_count+$lipid_profile_count_na;
				
				
				
				$earning_member=GetValue("select earning_member as col from tbl_users where user_id=".$_SESSION['UserID'],"col");
				
				$parentidtotal=GetValue("select Count(parent_id) as col from tbl_users where parent_id=".$_SESSION['UserID'],"col");
				
				
				if($_SESSION['UserType']=="Admin") {
					Redirect($strHostName."/home.php");
					return;
				}
				else if($_SESSION['UserType']=="Clerk") 
				{
					Redirect($strHostName."/clerk_admin.php");
					return;
				}
				else
				{
					
					if ($doc_consult_count > 0 && $medication_count > 0 && $allergies_count > 0  && $hospitalization_count > 0 && $immunization_count > 0 && $health_problem_count > 0 && $family_history_count > 0 && $blood_pressure_count > 0 && $sugar_profile_count > 0 && $life_style_count > 0 && $lipid_profile_count > 0)
					{
							Redirect($strHostName."/page.php?dir=health/dashboard");
							return;
					}
					else if ($earning_member=="" || $earning_member=="0")
					{
							Redirect($strHostName."/page.php?dir=registration/step2&record=".$converter->encode("insert record")."&menu_type=".$converter->encode("step1")."&cid=".$converter->encode($row['user_id']));
							return;
						
					}
					else if ($parentidtotal=="0" || $parentidtotal=="")
					{
							
							Redirect($strHostName."/page.php?dir=health/setup");
							//Redirect($strHostName."/page.php?dir=registration/step3&record=".$converter->encode("insert record")."&menu_type=".$converter->encode("step1")."");
							return;
					}
					else
					{
							Redirect($strHostName."/page.php?dir=health/setup");
							return;
					}
						
				}
				
			}			
		} 
		else {
			AlertandRedirect("Login failed. Invalid Username or Password.", "index.php");
		}
	}

//Alert ($_SESSION['UserType']);

?>

<?php


 if(isset($_SESSION['UserID']))
 {
	$user_id=$_SESSION['UserID'];
 }
 else
 {
	$user_id=0;
 }
	


	if(isset($_SESSION['UserID']))
	{
		$active_count = $db->select("SELECT * FROM  ".Users." where parent_id=$user_id order by name"); 
		$active_count = $db->row_count;
		
		$family_mem_count = GetValue("SELECT Count(*) as col FROM  ".Users." where parent_id=$user_id order by name", "col"); 
		
		//$doc_consult_count = $db->select("SELECT * FROM  tbl_doc_consult where user_id=$user_id and isactive=1 and isdeleted=0"); 
		//$doc_consult_count = $db->row_count;
		
		$doc_consult_count =GetValue("select Count(*)  as col from tbl_doc_consult  where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 ","col");

		$doc_consult_count_na=GetValue("select Count(*)  as col from tbl_user_not_applicable where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 and type='Doc_Consult'","col");

		$doc_consult_count=$doc_consult_count+	$doc_consult_count_na;


		//medication 
				$medication_count =GetValue("select Count(*)  as col from tbl_medication  where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 ","col");
				$medication_count_na=GetValue("select Count(*) as col from tbl_user_not_applicable where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 and type='Medication'","col");
				$medication_count=$medication_count+$medication_count_na;


				//allergies 
				$allergies_count =GetValue("select Count(*)  as col from tbl_allergies  where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 ","col");
				$allergies_count_na=GetValue("select Count(*) as col from tbl_user_not_applicable where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 and type='Allergies'","col");
				$allergies_count=$allergies_count+$allergies_count_na;
				
				
				//hospitalization 
				$hospitalization_count =GetValue("select Count(*)  as col from tbl_hospital  where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 ","col");
				$hospitalization_count_na=GetValue("select Count(*) as col from tbl_user_not_applicable where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 and type='Hospitalization'","col");
				$hospitalization_count=$hospitalization_count+$hospitalization_count_na;
				
				
				
				//immunization 
				$immunization_count =GetValue("select Count(*)  as col from tbl_immunization  where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 ","col");
				$immunization_count_na=GetValue("select Count(*) as col from tbl_user_not_applicable where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 and type='Immunization'","col");
				$immunization_count=$immunization_count+$immunization_count_na;
				
				//immunization 
				$immunization_count =GetValue("select Count(*)  as col from tbl_immunization  where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 ","col");
				$immunization_count_na=GetValue("select Count(*) as col from tbl_user_not_applicable where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 and type='Immunization'","col");
				$immunization_count=$immunization_count+$immunization_count_na;
				
				
				//Health_Problems 
				$health_problem_count =GetValue("select Count(*)  as col from tbl_health_problem  where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 ","col");
				$health_problem_count_na=GetValue("select Count(*) as col from tbl_user_not_applicable where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 and type='Health_Problems'","col");
				$health_problem_count=$health_problem_count+$health_problem_count_na;
				
				
				//Family_History 
				$family_history_count =GetValue("select Count(*)  as col from tbl_family_history  where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 ","col");
				$family_history_count_na=GetValue("select Count(*) as col from tbl_user_not_applicable where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 and type='Family_History'","col");
				$family_history_count=$family_history_count+$family_history_count_na;
			
				
				//Blood_Pressure 
				$blood_pressure_count =GetValue("select Count(*)  as col from tbl_blood_pressure  where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 ","col");
				$blood_pressure_count_na=GetValue("select Count(*) as col from tbl_user_not_applicable where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 and type='Blood_Pressure'","col");
				$blood_pressure_count=$blood_pressure_count+$blood_pressure_count_na;
			
			
				//sugar_profile 
				$sugar_profile_count =GetValue("select Count(*)  as col from tbl_sugar_profile where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 ","col");
				$sugar_profile_count_na=GetValue("select Count(*) as col from tbl_user_not_applicable where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 and type='Sugar_Profile'","col");
				$sugar_profile_count=$sugar_profile_count+$sugar_profile_count_na;
				
			
				//Life_Style 
				$life_style_count =GetValue("select Count(*)  as col from tbl_life_style where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 ","col");
				$life_style_count_na=GetValue("select Count(*) as col from tbl_user_not_applicable where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 and type='Life_Style'","col");
				$life_style_count=$life_style_count+$life_style_count_na;
				
				
				
				//Lipid_Profile 
				$lipid_profile_count =GetValue("select Count(*)  as col from tbl_lipid_profile where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 ","col");
				$lipid_profile_count_na=GetValue("select Count(*) as col from tbl_user_not_applicable where user_id=".$_SESSION['UserID']." and isactive=1 and isdeleted=0 and type='Lipid_Profile'","col");
				$lipid_profile_count=$lipid_profile_count+$lipid_profile_count_na;
				
		
		$parent_id=GetValue("select parent_id as col from tbl_users where user_id=".$user_id,"col");
		//Alert ($parent_id);
		$earning_member=GetValue("select earning_member as col from tbl_users where user_id=".$user_id,"col");
		$parentidtotal=GetValue("select Count(parent_id) as col from tbl_users where parent_id=".$_SESSION['UserID'],"col");
		
	//Alert ($parentidtotal);
	}
?>


<?php

$strPageName=GetPageName(); $imgPhoto="";

$dir=""; $menus_sel=""; 
if(isset($_GET['dir']))
{
	$dir=$_GET['dir'];
}

//Alert($dir);

if(isset($_SESSION['UserID']))
{
$imgPhoto=GetValue("select image1 as col from tbl_users where user_id=".$_SESSION['UserID'], "col");
}
//Alert ($_SESSION['UserType']);
?>


<header>
  <div class="bor_2colour"></div>
  <div class="head">
  <!--<div style="width: 25px; position: fixed; top: 140px; right: 0px;z-index:1"><img src="images/search_icon.png" alt="" title="" border="0"></div>
    <div style="width: 25px; position: fixed; top: 175px; right: 0px;z-index:1"><img src="images/mail_icon.png" alt="" title="" border="0"></div>-->
    <div class="brand"><a href="index.php">Alive Meter - Health : Wealth : Happiness</a></div>
    <div class="n_o">
    
    
      <?php 
	  $familyheight="0";
	  //Alert ($common->GetUserType());
	 if($common->GetUserType() != "" && $common->GetUserType() != "Guest" &&  $common->GetUserType() != "Doctor" && $common->GetUserType() != "MD" && $common->GetUserType() != "Nutritionist" && $common->GetUserType() != "Clerk") { ?>
          <div class="l_o">
          <ul id="dd_nav" style="border:solid 0px red; z-index:99; position:relative;">
            
            <li>
                <a href="#" class="button_s"> <img src="<?php echo $strHostName;?>/profile_pic/<?php echo $imgPhoto?>" style="border:solid 0px red; float:left; width:20px; height:20px;" /><span class="txt"><?php echo $_SESSION['UserName']; ?></span> <span class="ar">&#9660;</span> </a>
                 
                     <ul style="width: 247px; background-color: #83a819;">
                         
                         <?php if($_SESSION['UserType']!="Admin") { ?>
                          <li style="border-bottom: solid 1px #aac457;"><a href="<?php echo $strHostName;?>/page.php?dir=registration/family_member">My Profile</a></li>
                          <li style="border-bottom: solid 1px #aac457; display:'';"><a href="<?php echo $strHostName;?>/page.php?dir=account/change_password">Change Password</a></li>
                         <?php if ($doc_consult_count > 0 && $medication_count > 0 && $allergies_count > 0  && $hospitalization_count > 0 && $immunization_count > 0 && $health_problem_count > 0 && $family_history_count > 0 && $blood_pressure_count > 0 && $sugar_profile_count > 0 && $life_style_count > 0 && $lipid_profile_count > 0) { ?>
                         	<li style="border-bottom: solid 1px #aac457;"><a href="<?php echo $strHostName;?>/page.php?dir=health/dashboard">My Dashboard</a></li> 
                          <?php } else { ?>
                          	<?php if ($earning_member!="" || $earning_member!="0") { ?>
                            <li style="border-bottom: solid 1px #aac457;"><a href="<?php echo $strHostName;?>/page.php?dir=health/setup">My Health Setup</a></li>
                            <?php } ?>
                          <?php } ?>
                        
                       <?php if($parent_id<=0) { ?>
                            <li style="border-bottom: solid 1px #aac457;"><a href="<?php echo $strHostName;?>/page.php?dir=registration/family_member">Align My Family</a></li>
                              <?php if($family_mem_count>0){ ?>
                            <li style="border-bottom: solid 0px #aac457; padding-bottom: 5px;" id="divFamilyHeight">
                              <div class="dvFloat">
                                <div style="float:left;width:89%; z-index:9999; position:relative;">
                                	<?php if($family_mem_count>=3){ ?>
                                		<a onclick="javascript:alert ('You cannot add more than 3 family members.');" style="color:#FFFFFF; cursor:pointer;">Added Family Member</a>
                                        <?php } else { ?>
                                        	
                                          
                                            <a href="<?php echo $strHostName;?>/page.php?dir=registration/step3&mode=<?php echo $converter->encode('Add');?>" style="color:#FFFFFF;">Added Family Member</a>
                                           
                                        <?php } ?>
                                        
                                </div>
                                <div style="float:left;width:10%; color:#aac457; text-align:center;"><?php echo $active_count; ?>/3</div>
                              </div>
                              <ul style="width:250px;padding:25px 0px 0px 0px; border-bottom: solid 0px #aac457;">
                                <?php $retrive_Array=$get_retrive->GetFamilyMembersTop()  ?>
                                    <?php while($get_array = mysql_fetch_array( $retrive_Array )){
										$familyheight=$familyheight+40;
										$email=$get_array['user_email'];
										$parent_email=GetValue("select user_email as col from tbl_users where user_id=".$get_array['parent_id'], "col");
										
										//Alert ($email);
									 ?>
                                <li>
                                  <div class="dvFloat">
                                    <div style="float:left; width:8%;"><img src="<?php echo $strHostName;?>/profile_pic/<?php echo $get_array['image1'];?>" alt="" style="width:20px; height:20px;"/></div>
                                    <div style="float:left;width:80%"><a href="<?php echo $strHostName;?>/page.php?dir=registration/step3&cid=<?php echo $converter->encode($get_array['user_id']);?>&record=<?php echo $converter->encode($get_array['user_id']);?>&mode=<?php echo $converter->encode('Edit');?>"><?php echo $get_array['name'];?></a></div>
                                    <div style="float:left;width:10%; text-align:center; padding-bottom: 0px;">
                                    	<?php if ($email==$parent_email) { ?> 
                                          <img src="images/unlock_img.jpg" alt="" style="margin-left:-5px;">
                                       <?php } else { ?>
                                       		 <img src="images/lock_img.jpg" alt="" style="border:solid 0px red;">
                                       <?php } ?>
                                    </div>
                                  </div>
                                </li>
                                 <?php } ?>
                                
                              </ul>
                          
                            </li>
                            <?php } ?>
                        <?php } ?>
                        <?php } ?>
                        <li style="border-top: solid 1px #aac457;padding-top:0px;margin-top:5px;"><a href="index.php?type=<?php echo $converter->encode("logout") ?>">Logout</a></li>
                    </ul>
                
            </li></ul>
             <div class="follow_smal"><a href="https://www.facebook.com/pages/Alivemeter/687872857994981" target="_blank"><span class="f"></span></a><a href="https://twitter.com/@alivemeter" target="_blank"><span class="t"></span></a><!--<span class="p"></span><span class="i"></span>--></div>
          </div>
         
	  <?php } else if($_SESSION['UserType']=="Doctor" || $_SESSION['UserType']=="MD"  || $_SESSION['UserType']=="Nutritionist" || $_SESSION['UserType']=="Clerk") { ?>
		 <div class="l_o">
          <ul id="dd_nav" style="border:solid 0px red; z-index:99; position:relative;">
            
            <li>
                <a href="#" class="button_s"> <span class="txt"><?php echo $_SESSION['UserDocName']; ?></span> <span class="ar">&#9660;</span> </a>
                 
                     <ul style="width: 247px; background-color: #83a819;">
                        
                        <li style="border-top: solid 1px #aac457;padding-top:0px;margin-top:5px; display:'';"><a href="<?php echo $strHostName;?>/page_doctor.php?dir=team/change_password">Change Password</a></li>
                       <?php  if($_SESSION['UserType']=="MD") { ?>
                        	<li style="border-top: solid 1px #aac457;padding-top:0px;margin-top:5px;"><a href="<?php echo $strHostName;?>/page_doctor.php?dir=md/timings">Video Query</a></li>
                        <?php } ?>
                        <li style="border-top: solid 1px #aac457;padding-top:0px;margin-top:5px;"><a href="index.php?type=<?php echo $converter->encode("logout") ?>">Logout</a></li>
                    </ul>
                
            </li></ul>
             <div class="follow_smal"><a href="https://www.facebook.com/pages/Alivemeter/687872857994981" target="_blank"><span class="f"></span></a><a href="https://twitter.com/@alivemeter" target="_blank"><span class="t"></span></a><!--<span class="p"></span><span class="i"></span>--></div>
          </div>
      <?php } else  { ?>
          <div class="l_o" style="border: solid 0px #006600;">
            <div class="sign green">
        
            <a href="<?php echo $strHostName;?>/page.php?dir=registration/sign_up" style="cursor:pointer;">SIGN UP </a>
            <a href="#" class="btnsignin" onClick="javascript:hidesignup();" >Sign In</a>
            
            
                <div id="frmsignin" style="display:none">
               
                <form class="form-horizontal" method="post" enctype="multipart/form-data" id="signup"  onSubmit="javascript:return LoginValidation()">
                <p id="puser" style="padding-top: 6px;">
                	<input id="txtLoginUserName" name="txtLoginUserName" value="<?php echo $user_email; ?>" title="username" type="text" style="width: 158px;" placeholder="Profile ID"/>
                </p>
                <p><br />
                	<input id="txtLoginPassword" name="txtLoginPassword" value="<?php echo $password; ?>" title="password" type="password" style="width: 158px;" placeholder="Password"/>
                </p>
                <div style="width: 100%; float: left; padding-top: 15px;">
                    <div style="width: 42%; float: left; border: solid 0px #003300;">
                        <p style="text-align: left; text-decoration: underline; width:250px; padding:0px;">
                        	<a href="<?php echo $strHostName;?>/page.php?dir=account/forgot_username" style="font-size:11px; text-decoration:underline; color:#666666; text-transform:none;">Forgot username</a><br>
                        	<a href="<?php echo $strHostName;?>/page.php?dir=account/forgot_password" style="font-size:11px; text-decoration:underline; color:#666666; text-transform:none;">Forgot password</a><br>
                        	</p>
                    </div>
                    <div style="width: 47%; float: left; border: solid 0px #990033; text-align:center;margin-right:5px; color: #FFFFFF;">
                        <div style="float:right;">
                            <input type="submit" id="btnSignIn" name="btnSignIn" style="cursor: pointer; padding: 6px 17px 6px 20px;" class="buttoncupon" value="Log In"/>
                            
                        </div>
                    </div>
                </div>
                </form>
                </div>
            </div>
            <div class="follow_smal"><a href="https://www.facebook.com/pages/Alivemeter/687872857994981" target="_blank"><span class="f"></span></a><a href="https://twitter.com/@alivemeter" target="_blank"><span class="t"></span></a><!--<span class="p"></span><span class="i"></span>--></div>
          </div>
      <?php } ?>
      
      
      <?php if($_SESSION['UserType']=="Admin") { ?>
	     <?php
		 	if(isset($_GET['type'])){
				$type=$converter->decode($_GET['type']);
			}
			else
			{
				$type="";
			}
		 ?>
         
          <div class="nav">
            <ul>
              <li><a href="<?php echo $strHostName;?>/page.php?dir=master/profession/add" <?php if($dir=="master/profession/add"){ echo "class='selected'";}?>>Master</a><span <?php if($dir=="master/profession/add"){ echo "class='selected'";}?>></span></li>
              <li><a href="<?php echo $strHostName;?>/page.php?dir=master/hospital/add" <?php if($dir=="master/hospital/add"){ echo "class='selected'";}?>>Hospital</a><span <?php if($dir=="master/hospital/add"){ echo "class='selected'";}?>></span></li>
              <li><a href="<?php echo $strHostName;?>/page.php?dir=master/doctor/add&type=<?php echo $converter->encode("Doctor"); ?>" <?php if($type=="Doctor"){ echo "class='selected'";}?>>Doctor</a><span <?php if($type=="Doctor"){ echo "class='selected'";}?>></span></li>
               <li><a href="<?php echo $strHostName;?>/page.php?dir=master/doctor/add&type=<?php echo $converter->encode("MD"); ?>" <?php if($type=="MD"){ echo "class='selected'";}?>>MD</a><span  <?php if($type=="MD"){ echo "class='selected'";}?>></span></li>
              <li><a href="<?php echo $strHostName;?>/page.php?dir=master/doctor/add&type=<?php echo $converter->encode("Nutritionist"); ?>" <?php if($type=="Nutritionist"){ echo "class='selected'";}?> >Nutritionist</a><span  <?php if($type=="Nutritionist"){ echo "class='selected'";}?>></span></li>
              <li><a href="<?php echo $strHostName;?>/page.php?dir=master/clerk/add" <?php if($dir=="master/clerk/add"){ echo "class='selected'";}?>>Clerk</a><span <?php if($dir=="master/clerk/add"){ echo "class='selected'";}?>></span></li>
              <li><a href="reward_points.php" <?php if($strPageName=="reward_points.php"){ echo "class='selected'";}?>>Reward Points</a><span <?php if($strPageName=="reward_points.php"){ echo "class='selected'";}?>></span></li>
            </ul>
      	  </div>
     <?php } else if($_SESSION['UserType']=="Doctor") {?>  
     	<div class="nav">
         <?php   $query_count=$get_retrive->GetRejectedQueriesDocCount();?>
            <ul> 
            	<li><a href="<?php echo $strHostName;?>/page_doctor.php?dir=doctor/profile" <?php if($dir=="doctor/profile"){ echo "class='selected'";}?>>Profile</a><span <?php if($dir=="doctor/profile"){ echo "class='selected'";}?>></span></li>
                <li><a href="<?php echo $strHostName;?>/page_doctor.php?dir=doctor/client" <?php if($dir=="doctor/client"){ echo "class='selected'";}?>>GET QUERIES</a><span <?php if($dir=="doctor/client"){ echo "class='selected'";}?>></span></li>
                <li style="display:none;"><a>VIDEO REQUEST</a><span></span></li>
                <li><a href="<?php echo $strHostName;?>/page_doctor.php?dir=doctor/old_queries" <?php if($dir=="doctor/old_queries"){ echo "class='selected'";}?>>OLD QUERIES</a><span <?php if($dir=="doctor/old_queries"){ echo "class='selected'";}?>></span></li>
                <li><a href="<?php echo $strHostName;?>/page_doctor.php?dir=doctor/rejected_queries" <?php if($dir=="doctor/rejected_queries"){ echo "class='selected'";}?>>REJECTED QUERIES (<?php echo $query_count;?>)</a><span <?php if($dir=="doctor/rejected_queries"){ echo "class='selected'";}?>></span></li>
                <li><a href="<?php echo $strHostName;?>/page_doctor.php?dir=doctor/user_reviews" <?php if($dir=="doctor/user_reviews"){ echo "class='selected'";}?>>User Reviews</a><span <?php if($dir=="doctor/user_reviews"){ echo "class='selected'";}?>></span></li> 
            </ul>
      </div>
       <?php } else if($_SESSION['UserType']=="MD") {?>  
     	<div class="nav">
           <?php   $query_count=$get_retrive->GetRejectedQueriesMDCount();?>
            <ul> 
            	<li><a href="<?php echo $strHostName;?>/page_doctor.php?dir=md/profile" <?php if($dir=="md/profile"){ echo "class='selected'";}?>>Profile</a><span <?php if($dir=="md/profile"){ echo "class='selected'";}?>></span></li>
                 <li><a href="<?php echo $strHostName;?>/page_doctor.php?dir=md/client" <?php if($dir=="md/client"){ echo "class='selected'";}?>>GET QUERIES</a><span <?php if($dir=="md/client"){ echo "class='selected'";}?>></span></li>
              
                <li><a href="<?php echo $strHostName;?>/page_doctor.php?dir=md/old_queries" <?php if($dir=="md/old_queries"){ echo "class='selected'";}?>>OLD QUERIES</a><span <?php if($dir=="md/old_queries"){ echo "class='selected'";}?>></span></li>
                 <li><a href="<?php echo $strHostName;?>/page_doctor.php?dir=md/rejected_queries" <?php if($dir=="md/rejected_queries"){ echo "class='selected'";}?>>REJECTED QUERIES (<?php echo $query_count;?>)</a><span <?php if($dir=="md/rejected_queries"){ echo "class='selected'";}?>></span></li>
                  <li><a href="<?php echo $strHostName;?>/page_doctor.php?dir=md/appointment" <?php if($dir=="md/appointment"){ echo "class='selected'";}?>>MD Appointment</a><span  <?php if($dir=="md/appointment"){ echo "class='selected'";}?>></span></li>
                   <li><a href="<?php echo $strHostName;?>/page_doctor.php?dir=md/user_reviews" <?php if($dir=="md/user_reviews"){ echo "class='selected'";}?>>Reviews</a><span <?php if($dir=="md/user_reviews"){ echo "class='selected'";}?>></span></li>
            </ul>
      </div>
      <?php } else if($_SESSION['UserType']=="Nutritionist") {?>  
		  <?php
			$inbox_id=$get_retrive->RetriveNutInboxID($_SESSION['UserNutID']);
		  ?>
   		  <div class="nav">
            <ul>
              <li><a href="<?php echo $strHostName;?>/page_doctor.php?dir=nutritionist/profile" <?php if($dir=="nutritionist/profile"){ echo "class='selected'";}?>>Home</a><span <?php if($dir=="nutritionist/profile"){ echo "class='selected'";}?>></span></li>
              <li><a href="<?php echo $strHostName;?>/page_doctor.php?dir=nutritionist/client_details" <?php if($dir=="nutritionist/client_details"){ echo "class='selected'";}?>>Client Profile</a><span <?php if($dir=="nutritionist/client_details"){ echo "class='selected'";}?>></span></li>
             <li><a href="<?php echo $strHostName;?>/page_doctor.php?dir=nutritionist/inbox&status=inbox&folderid=<?php echo $converter->encode($inbox_id)?>" <?php if($dir=="nutritionist/inbox"){ echo "class='selected'";}?>>inbox</a><span <?php if($dir=="nutritionist/inbox"){ echo "class='selected'";}?>></span></li>
              <li style="display: none;"><a href="#">Write Story</a><span></span></li>
              <li><a href="<?php echo $strHostName;?>/page_doctor.php?dir=nutritionist/user_reviews" <?php if($dir=="nutritionist/user_reviews"){ echo "class='selected'";}?>> User Reviews</a><span <?php if($dir=="nutritionist/user_reviews"){ echo "class='selected'";}?>></span></li>
            </ul>
      	 </div>
      <?php } else if($_SESSION['UserType']=="Clerk") {?>  
          <div class="nav">
                <ul>
                    <li><a href="<?php echo $strHostName;?>/patients_delayed.php" <?php if($strPageName=="patients_delayed.php" || $strPageName=="patients_delayed_md.php" || $strPageName=="patients_doctor.php"  || $strPageName=="patients_md.php"){ echo "class='selected'";}?>>Home</a><span  <?php if($strPageName=="patients_delayed.php" || $strPageName=="patients_delayed_md.php" || $strPageName=="patients_doctor.php"  || $strPageName=="patients_md.php"){ echo "class='selected'";}?>></span></li>
                    <li><a href="<?php echo $strHostName;?>/page_doctor.php?dir=clerk/profile" <?php if($dir=="clerk/profile"){ echo "class='selected'";}?>>Profile</a><span <?php if($dir=="clerk/profile"){ echo "class='selected'";}?>></span></li>
                    <li><a href="<?php echo $strHostName;?>/page_doctor.php?dir=md/appointment" <?php if($dir=="md/appointment"){ echo "class='selected'";}?>>MD Appointment</a><span  <?php if($dir=="md/appointment"){ echo "class='selected'";}?>></span></li>
                </ul>
             </div>
      <?php } else { ?>
   		  <div class="nav">
            <ul>
            
            
              <li><a href="<?php echo $strHostName;?>/index.php" <?php echo $strhome ?>>Home</a><span <?php echo $strhome ?></span></li>
              <li><a href="<?php echo $strHostName;?>/health.php" <?php echo $strhealth ?>>Health</a><span <?php echo $strhealth ?></span></li>
              <li><a href="<?php echo $strHostName;?>/top_stories.php" <?php echo $strtopstories ?>>Top Stories</a><span <?php echo $strtopstories ?></span></li>
              
              <li><a href="<?php echo $strHostName;?>/deals.php" <?php echo $strdeals ?>>deals</a><span  <?php echo $strdeals ?></span></li>
              
             
              <li><a href="<?php echo $strHostName;?>/reward_points.php" <?php echo $strrewardpoints ?>>Reward Points</a><span  <?php echo $strrewardpoints ?></span></li>
            </ul>
      	 </div>
      <?php } ?>
      
      
    </div>
  </div>
</header>
<?php
if($familyheight==0)
{
	$familyheight="30";
}
?>

<script>
  	if(document.getElementById("divFamilyHeight")!=null) { 	
		document.getElementById("divFamilyHeight").style.height="<?php echo $familyheight;?>px";
	}
</script>

`