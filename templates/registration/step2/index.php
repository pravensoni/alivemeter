<?php
if(!isset($_SESSION['UserID']))
{
	Alertandredirect("Sorry! Session is expired.", 'index.php');
}

?>
<script src="<?php echo $strHostName?>/js/step2_validation.js" type="text/javascript"></script>
<script>
	function enabledisable()
	{
	 
		if(document.getElementById("Chk_Earn_MemberN").checked==true){
			document.getElementById("txt_Company_name").disabled=true;
			document.getElementById("txt_Designation").disabled=true;
			document.getElementById("txt_Travel_Mode").disabled=true;
			document.getElementById("cmb_Travel_hour").disabled=true;
			document.getElementById("cmb_Travel_Min").disabled=true;
			document.getElementById("cmb_Profession").disabled=true;
			document.getElementById("divEnable").style.opacity="0.4";
			document.getElementById("DvProfession").style.display="none";
			document.getElementById("DvErrorProfession").style.display="none";
			document.getElementById("DvCompany").style.display="none";
			document.getElementById("DvErrorCompany").style.display="none";
			
		}
		else 
		{
			document.getElementById("txt_Company_name").disabled=false;
			document.getElementById("txt_Designation").disabled=false;
			document.getElementById("txt_Travel_Mode").disabled=false;
			document.getElementById("cmb_Travel_hour").disabled=false;
			document.getElementById("cmb_Travel_Min").disabled=false;
			document.getElementById("cmb_Profession").disabled=false;
			document.getElementById("divEnable").style.opacity="1.0";
			
			reistration_step2_validation(submit);
			return;
		}
	}
</script>

<?php
	
	$edit_id="0";$earning_member="0";$profession_id="0";$company_name="";$designation="";$travel_mode="";
	$age_of_retirement="";$life_expectancy=""; $daily_travel_time_h="HH";$daily_travel_time_m="Min";$dob_year="0"; $iHour="";
		
		
	
			
	if(isset($_GET['cid'])) {
		$edit_id = $converter->decode($_GET['cid']);
	}
	
	if(isset($_GET['mode'])) {
		$mode = $converter->decode($_GET['mode']);
	}
	else
	{
		$mode="";
	}
	
	//Alert ($mode);
	

	if(isset($_POST['btnSubmitSetup2']))
	{	
	
		//Alert ("dfd");
		if(isset($_POST['Chk_Earn_Member']))
		{
			$earning_member= trim(str_replace("'", "''", $_POST['Chk_Earn_Member']));
		}
		
		//Alert ($earning_member);
		
		if(isset($_POST['cmb_Profession']))
		{
			$profession_id= trim(str_replace("'", "''", $_POST['cmb_Profession']));
		}
		
		if(isset($_POST['txt_Company_name']))
		{
			$company_name= trim(str_replace("'", "''", $_POST['txt_Company_name']));
		}
		
		if(isset($_POST['txt_Designation']))
		{
			$designation= trim(str_replace("'", "''", $_POST['txt_Designation']));
		}
		if(isset($_POST['txt_Travel_Mode']))
		{
			$travel_mode= trim(str_replace("'", "''", $_POST['txt_Travel_Mode']));
		}
		if(isset($_POST['cmb_Travel_hour']))
		{
			$daily_travel_time_h= trim(str_replace("'", "''", $_POST['cmb_Travel_hour']));
			
		}
		if(isset($_POST['cmb_Travel_Min']))
		{
			$daily_travel_time_m= trim(str_replace("'", "''", $_POST['cmb_Travel_Min']));
		}
		
		
		
	//Alert ($profession_id);
				
			
		$data = array(
			'earning_member' => $earning_member,
			'profession_id' => $profession_id,
			'company_name' => $company_name,
			'designation' => $designation,
			'travel_mode' => $travel_mode,
			'daily_travel_time_h' => $daily_travel_time_h,
			'daily_travel_time_m' => $daily_travel_time_m,
			
		);
		 
	
		 
	    $recevied_message=$function->f_Add_register_step_2($data,$edit_id);
		$recevied_message_1  = explode("###", $recevied_message);
		
		
		
		
		if($recevied_message_1[0]!="")
		{
			if($mode=="Edit")
			{
				//Redirect($strHostName."/page.php?dir=health/setup");	
					if ($doc_consult_count > 0 && $medication_count > 0 && $allergies_count > 0  && $hospitalization_count > 0 && $immunization_count > 0 && $health_problem_count > 0 && $family_history_count > 0 && $blood_pressure_count > 0 && $sugar_profile_count > 0 && $life_style_count > 0 && $lipid_profile_count > 0)
					{
							Redirect($strHostName."/page.php?dir=calories/setup1");
					}
					else
					{
							Redirect($strHostName."/page.php?dir=health/setup");
						
					}
			}
			else {
			Redirect($strHostName."/page.php?dir=registration/step3&record=".$converter->encode($recevied_message_1[0])."&menu_type=".$converter->encode("step1")."&pid=".$converter->encode($recevied_message_1[1]));
			}
			
		}
		
		else
	    {
			Alert("Some error is occured");
	    }
	}
	else
	{
		$query = "SELECT * FROM ".Users." WHERE user_id = $edit_id";
		//echo $query;
		$result = mysql_query($query);
		if($result != "") {
			$rowcount = mysql_num_rows($result);
			if($rowcount > 0) {
				while($row = mysql_fetch_assoc($result)) {
					extract($row);		
					$professionid=$row['profession_id'];	
					//$earning_member=1;				
					//Alert ($profession_id);
					$daily_travel_time_h=$row['daily_travel_time_h'];
					if($daily_travel_time_h=="")
					{
						$daily_travel_time_h="HH";
					}
					
				}
			}
		}
	}
	

?>
<section>
  <div class="banner_o1">
    <div class="dvFloat">
      <div class="dvWrapper">
        <div style="float:left; padding:35px 0px 35px 35px"> <span  class="Get_Started">Get started!</span><span class="Fill_details">&nbsp;&nbsp;Please fill in your details below.</span> </div>
      </div>
    </div>
    <?php include "includes/register_steps.inc.php";?>
  </div>
</section>
<section>
  <div class="cal_full_size gray_bg">
    <div class="cal_12 m_outo">
      <div class="dvFloat">
        <div class="dvWrapper">
          <div style="padding:60px 0px 35px 0px">
            <div style="margin:0px auto; width:500px; border:solid 0px red;">
			 <form class="form-horizontal" method="post" id="frmRegStep1" name="frmRegStep1" enctype="multipart/form-data"  onSubmit="javascript:return reistration_step2_validation('1');">
              <div class="ali_div_right_step1">
               <div class="dvFloat formpadding" style="padding:0px;">
                  <div class="formlabel">
                    <label class="formlabel">Earning Member  </label>
                  </div>
                  <div class="formcontrol" style="text-align:left">
                    <input type="radio" name="Chk_Earn_Member" id="Chk_Earn_MemberY" value="2" onClick="javascript:enabledisable()" <?php if($earning_member==2) { echo "checked";} else { echo "checked";}?> />Yes &nbsp;&nbsp;&nbsp;
       				<input type="radio" name="Chk_Earn_Member" id="Chk_Earn_MemberN" value="1" onClick="javascript:enabledisable()" <?php if($earning_member==1) { echo "checked";}?> />No            
                    
                  </div>
                </div>
                <div class="dvFloat" id="divEnable">
                    <div class="dvFloat formpadding">
                      <div class="formlabel">
                        <label class="formlabel">Profession <span class="redtxt">*</span></label>
                      </div>
                      <div class="formcontrol">
                        
                       <select  id="cmb_Profession" name="cmb_Profession"  tabindex="1" class="existing_event" style="width: 192px;"   disabled="disabled">
                       <option value="0"  selected="selected">Select</option>    
                        <?php 
						$query = "SELECT * FROM ".Profession." WHERE profession_id <> 0 and isdeleted=0 and isactive=1 order by profession_name";
						//echo $query;
						$result = mysql_query($query);
						if($result != "") {
							$rowcount = mysql_num_rows($result);
							if($rowcount > 0) {
								while($row = mysql_fetch_assoc($result)) {
									extract($row);	
										$proid=$row['profession_id'];
						 ?>
                        	<option value="<?php echo $proid;?>" <?php if($professionid==$proid) { echo "selected"; }?> ><?php echo $profession_name;?></option>
                        <?php }}} ?>
                        </select>
                         <div id="DvProfession" class="tickclass" style="display:none"><img src="<?php echo $strHostName; ?>/images/tick.png" alt="" title="" border="0" style="vertical-align:middle"/></div>
                          <div id="DvErrorProfession" class="warning" style="display:none">Please choose profession.</div>
                      </div>
                    </div>
                    <div class="dvFloat formpadding">
                      <div class="formlabel">
                        <label class="formlabel">Company Name <span class="redtxt">*</span></label>
                      </div>
                      <div class="formcontrol">
                        <input type="text" name="txt_Company_name" id="txt_Company_name" value="<?php echo $company_name?>"  />
                         <div id="DvCompany" class="tickclass" style="display:none"><img src="<?php echo $strHostName; ?>/images/tick.png" alt="" title="" border="0" style="vertical-align:middle"/></div>
                         <div id="DvErrorCompany" class="warning" style="display:none">Please enter company name.</div>
                      </div>
                    </div>
                    <div class="dvFloat formpadding">
                      <div class="formlabel">
                        <label class="formlabel">Designation</label>
                      </div>
                      <div class="formcontrol">
                        <input type="text" name="txt_Designation" id="txt_Designation" value="<?php echo $designation?>" />
                      </div>
                    </div>
                    <div class="dvFloat formpadding">
                      <div class="formlabel">
                        <label class="formlabel">Travel Mode</label>
                      </div>
                      <div class="formcontrol">
                        <input type="text" name="txt_Travel_Mode" id="txt_Travel_Mode" value="<?php echo $travel_mode?>" />
                      </div>
                    </div>
                    <div class="dvFloat formpadding">
                      <div class="formlabel">
                        <label class="formlabel">Daily Travel Time</label>
                      </div>
                      <div class="formcontrol">
                        <div style="float:left; padding:0px 15px 0px 0px">
                            
                        
                            <select name="cmb_Travel_hour" id="cmb_Travel_hour"  tabindex="1" class="existing_event" style="width: 4px;">
                                <option value="0" selected>HH</option>
								    
								  
                                 
                                    <option value="0" <?php if("0"==$daily_travel_time_h){echo "selected";}?> >0</option>
                                     <option value="1" <?php if("1"==$daily_travel_time_h){echo "selected";}?> >1</option>
                                      <option value="2" <?php if("2"==$daily_travel_time_h){echo "selected";}?> >2</option>
                                       <option value="3" <?php if("3"==$daily_travel_time_h){echo "selected";}?> >3</option>
                                        <option value="4" <?php if("4"==$daily_travel_time_h){echo "selected";}?> >4</option>
                                         <option value="5" <?php if("5"==$daily_travel_time_h){echo "selected";}?> >5</option>
                                          <option value="6" <?php if("6"==$daily_travel_time_h){echo "selected";}?> >6</option>
                                           <option value="7" <?php if("7"==$daily_travel_time_h){echo "selected";}?> >7</option>
                                            <option value="8" <?php if("8"==$daily_travel_time_h){echo "selected";}?> >8<option>
                                             <option value="9" <?php if("9"==$daily_travel_time_h){echo "selected";}?> >9</option>
                                              <option value="10" <?php if("10"==$daily_travel_time_h){echo "selected";}?> >10</option>
                                               <option value="11" <?php if("11"==$daily_travel_time_h){echo "selected";}?> >11</option>
                                                <option value="12" <?php if("12"==$daily_travel_time_h){echo "selected";}?> >12</option>
                                                 <option value="13" <?php if("13"==$daily_travel_time_h){echo "selected";}?> >13</option>
                                                  <option value="14" <?php if("14"==$daily_travel_time_h){echo "selected";}?> >14</option>
                                                   <option value="15" <?php if("15"==$daily_travel_time_h){echo "selected";}?> >15</option>
                                                    <option value="16" <?php if("16"==$daily_travel_time_h){echo "selected";}?> >16</option>
                                                     <option value="17" <?php if("17"==$daily_travel_time_h){echo "selected";}?> >17</option>
                                                      <option value="18" <?php if("18"==$daily_travel_time_h){echo "selected";}?> >18</option>
                                                       <option value="19" <?php if("19"==$daily_travel_time_h){echo "selected";}?> >19</option>
                                                        <option value="20" <?php if("21"==$daily_travel_time_h){echo "selected";}?> >20</option>
                                                         <option value="21" <?php if("22"==$daily_travel_time_h){echo "selected";}?> >21</option>
                                                          <option value="22" <?php if("23"==$daily_travel_time_h){echo "selected";}?> >22</option>
                                                           <option value="23" <?php if("24"==$daily_travel_time_h){echo "selected";}?> >23</option>
                               
                            </select>
                          
                        </div>
                        <div style="float:left; padding:0px 15px 0px 0px">
                          <select name="cmb_Travel_Min" id="cmb_Travel_Min" tabindex="1" class="existing_event" style="width: 4px;">
                            
                                 <option value="Min" <?php if("Min"==$daily_travel_time_m){echo "selected";}?> >Min</option>
                                    <option value="0" <?php if("0"==$daily_travel_time_m){echo "selected";}?> >0</option>
                                    <option value="15" <?php if("15"==$daily_travel_time_m){echo "selected";}?> >15</option>
                                    <option value="30" <?php if("30"==$daily_travel_time_m){echo "selected";}?> >30</option>
                                    <option value="45" <?php if("45"==$daily_travel_time_m){echo "selected";}?> >45</option>
                                   
                                
                          </select>
                        </div>
                       
                      </div>
                    </div>
                    
                    <div class="dvFloat formpadding" style="display:none;">
                      <div class="formlabel">
                        <label class="formlabel">Age of Retirement <span class="redtxt">*</span></label>
                      </div>
                      <div class="formcontrol">
                        <input type="text" name="tx_tAge_of_Retirement" id="tx_tAge_of_Retirement" value=<?php echo $age_of_retirement?>""  /><div style="padding:10px 0px 0px 10px; float:left;color: #a8a8a8;">years
                         <div id="DvAgeRet" class="tickclass" style="display:none"><img src="<?php echo $strHostName; ?>/images/tick.png" alt="" title="" border="0" style="vertical-align:middle"/></div>
                         <div id="DvErrorAgeRet" class="warning" style="display:none">Please enter Age of Retirement.</div>
                        </div>
                      </div>
                    </div>
                    <div class="dvFloat formpadding"  style="display:none;">
                      <div class="formlabel">
                        <label class="formlabel">Life Expectancy <span class="redtxt">*</span></label>
                      </div>
                      <div class="formcontrol">
                        <input type="text" name="txt_Life_Expectancy" id="txt_Life_Expectancy" value="<?php echo $life_expectancy?>" /><div style="padding:10px 0px 0px 10px; float:left; color: #a8a8a8;">years
                         <div id="DvLife" class="tickclass" style="display:none"><img src="<?php echo $strHostName; ?>/images/tick.png" alt="" title="" border="0" style="vertical-align:middle"/></div>
                         <div id="DvErrorLife" class="warning" style="display:none">Please enter Life Expectancy.</div>
                        
                        </div>
                      </div>
                    </div>
                
                </div>
                <div class="dvFloat formpadding">
                  <div class="formlabel"> &nbsp;</div>
                  <div class="formcontrol">
                  	<a href="<?php echo $strHostName?>/page.php?dir=registration/step1&record=<?php echo $_GET['record']?>&cid=<?php echo $_GET['cid']?>&menu_type=<?php echo $_GET['menu_type']?>" class="button2" style="margin-top:0px; float:left; width:60px; border:solid 0px red;">Back</a>
                    
                     <input type="submit" class="button1" id="btnSubmitSetup2" name="btnSubmitSetup2" value="Next" style="float:left; margin-right:8px; margin-left: 5px;"/>
                    <a href="<?php echo $strHostName;?>/page.php?dir=health/setup" class="button1" id="btnSkip" name="btnSkip" style="width:40px; margin-left:100px; text-align:center; margin-top:2px; display:none;">Skip</a>
                  </div>
                </div>
                <div class="dvFloat formpadding">
                  <div class="formlabel"> &nbsp; </div>
                                   <div class="formcontrol"><div style="float:left; text-align:left;width:180px;border:solid 0px red; margin-bottom:50px;"><span class="redtxt">*</span> Compulsory field</div></div>
                </div>
              </div>
			  </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
	enabledisable();
</script>

<style>
.dk_options_inner
{
	height:110px;
	overflow: auto;
	position: relative;
}
</style>