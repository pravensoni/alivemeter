<?php
	//$id=$converter->encode("18");
	//echo $id;
	
if(isset($_GET['patient_id'])){
	$patient_id=$converter->decode($_GET['patient_id']);
	/// for setting sesstion for user in iframe
	$_SESSION['UserID']=$patient_id;
	
}
else
{
	$patient_id=0;
}


//Alert ($_SESSION['UserID']);

if(isset($_GET['compose_id'])){
	$compose_id=$converter->decode($_GET['compose_id']);
	$docmd_cmt_compose_id=$converter->decode($_GET['compose_id']);
	$accept_id = GetValue("SELECT accept_id as col FROM  ".Patients." where compose_id=".$compose_id, "col");
	$query_type_id = GetValue("SELECT query_type as col FROM  ".Compose." where user_id=".$patient_id." and mail_id=".$compose_id, "col");
	///Alert ($query_type_id);
	
}
else
{
	$compose_id=0;
	$accept_id=0;
}

//Alert ($compose_id);
$parent_new_id="0";
$strGetVideoQueryParameter="No";
//Alert ($strGetVideoQueryParameter);
?>
<div class="cal_12" style="padding-top: 45px; padding-bottom: 20px; float:left;">
          <div class="DvFloat" style="border-top: solid 0px #990033">
          	<div class="adviceonline_md">
                <?php
			$query = "SELECT * FROM  ".Users." where isactive=1 and isdeleted=0 and registration_type='Main' and user_id=$patient_id";
			//echo $query;
			$result = mysql_query($query);							
			if($result != "") {	
				$rowcount  = mysql_num_rows($result);
				if($rowcount > 0) {
					while($row = mysql_fetch_assoc($result)) {
						extract($row);
			?> 
                <div class="photoareabg">
                        <div class="nutritionistphoto"> <img src="<?php echo $strHostName;?>/profile_pic/<?php echo $row['image1'];?>" alt="" title="" border="0" style="width:101px; height:101px;"> </div>
                      </div>
                
               
                       <div class="nutritionistright">
                            <div class="DvFloat">
                              <div class="DvFloat f_grey" style="font-size: 18px;"><?php echo $row['name'];?></div>
                              <div class="f_grey welcomedv" style="border:solid 0px red; width:800px;">
                                <div class="DvFloat">
                                   <div style="float:left; width:65%;"><table width="100%" border="0" cellspacing="0" cellpadding="5" style="line-height:25px;">
                                      <tr>
                                      	<td style="font-weight:bold;">Sex:</td>
                                        <td><?php echo $row['gender'];?></td>
                                        <td style="font-weight:bold;">Company:</td>
                                        <td><?php echo $row['company_name'];?></td>
                                       
                                      </tr>
                                      <tr>
                                      	<td style="font-weight:bold;">Height:</td>
                                        <td><?php echo $row['height'];?> <?php echo $row['height_type'];?></td>
                                        <td style="font-weight:bold;">Weight:</td>
                                        <td><?php echo $row['weight'];?> Kg.</td>
                                      </tr>
                                      <tr>
                                      	<td style="font-weight:bold;">Age:</td>
                                        <td><?php $age = floor((time() - strtotime($row["dob"]))/31556926); echo $age; ?></td>
                                        <td style="font-weight:bold;">Designation:</td>
                                        <td><?php echo $row['designation'];?></td>
                                        
                                      </tr>
                                      <tr>
                                        
                                        <td style="font-weight:bold;">Profession:</td>
                                        <td><?php echo 
										$profession_name=GetValue("select profession_name as col from tbl_profession where profession_id=".$row['profession_id'], "col");?></td>
                                        <td style="font-weight:bold;">Travel Mode:</td>
                                        <td><?php echo $row['travel_mode'];?></td>
                                        
                                      
                                      </tr>
                                      <tr>
                                      	<td style="font-weight:bold; width:140px;">Daily Travel Time:</td>
                                        <td><?php if($row['daily_travel_time_h']!="HH"){ echo $row['daily_travel_time_h'];} else {echo "0";}?>  Hr : 
										<?php if($row['daily_travel_time_m']!="Min"){ echo $row['daily_travel_time_m'];} else {echo "0";}?> Mins</td>
                                        
                                        <td style="font-weight:bold; width:120px;">Blood Group:</td>
                                        <td><?php echo $row['blood_group'];?></td>
                                      </tr>
                                      
                                    </table></div>
                                   <?php if($_SESSION['UserType']=="Nutritionist") { ?>
	                                   <div style="float:right; width:20%; margin-top:-20px;">
                                   		<h1 class="f_red" style="text-align: left; font-size: 18px;  margin-bottom: 7px; border-bottom: solid 1px #c5c5c5; padding-bottom:5px;">Align Members</h1>
                                          <ul>
										  <?php 
										  	if(isset($_GET['parent_id']))
											{
												$parent_new_id=$converter->decode($_GET['parent_id']);
											}
											//Alert ($parent_new_id);
											//Alert ($patient_id);
										 ?>
                                          
                                        <?php
											$query_p = "SELECT * FROM  ".Users." where isactive=1 and isdeleted=0 and registration_type='Main' and (parent_id=".$parent_new_id." or user_id=".$parent_new_id.")";
										    //echo $query_p;
											$result_p = mysql_query($query_p);							
											if($result_p != "") {	
												$rowcount  = mysql_num_rows($result_p);
												if($rowcount > 0) {
													while($row_p = mysql_fetch_assoc($result_p)) {
														extract($row_p);
														$main_pid=$row_p['parent_id'];
														//Alert ($main_pid);
											?> 
                                               <li>
                                                  <div class="dvFloat">
                                                    <div style="float:left; width:20%;"><img src="<?php echo $strHostName;?>/profile_pic/<?php echo $row_p['image1'];?>" alt="" style="width:20px; height:20px;"/></div>
                                                    <div style="float:left;width:80%">
                                                    	<?php if($patient_id==$row_p['user_id']) { ?>
                                                        <a style="color:#339900; font-weight:bold;">  
                                                        <?php } else { ?>
                                                        <a href="<?php echo $strHostName;?>/page_doctor.php?dir=nutritionist/details&patient_id=<?php echo $converter->encode($row_p['user_id'])?>&compose_id=<?php echo $_GET['compose_id']?>&parent_id=<?php echo $converter->encode($parent_new_id);?>">
                                                        <?php } ?>
																<?php echo $row_p['name'];?>
                                                                <?php if ($main_pid=="0" || $main_pid!=$parent_new_id) { ?>
                                                                	<span style="color:red;"> (<?php echo "Main";?>)</span>
																<?php } ?>
                                                        </a>
                                                    </div>
                                                    </div>
                                                </li>
                                             <?php }}} ?>
                                           </ul>
                                   </div> 
                                   <?php } ?>
                                </div>
                              </div>
                            </div>
                          </div>
            <?php }}} ?>       
            </div>
          </div>
          
          <?php if($_SESSION['UserType']!="Nutritionist") { ?>
          <div class="DvFloat" style="border-bottom: solid 1px #e4e4e4; margin:15px 0px 15px 0px">
            <h1 class="f_red" style="text-align: left; font-size: 18px; font-weight:bold;  margin-bottom: 7px;">Patient Query Details</h1>
          </div>
          <?php
			$query_p = "SELECT * FROM  ".Compose." where isactive=1 and isdeleted=0 and user_id=$patient_id and mail_id=$compose_id";
			//echo $query_p;
			$result_p = mysql_query($query_p);							
			if($result_p != "") {	
				$rowcount  = mysql_num_rows($result_p);
				if($rowcount > 0) {
					while($row_p = mysql_fetch_assoc($result_p)) {
						extract($row_p);
						$strGetVideoQueryParameter=$row_p['video_query_requirement'];
						
						$previous_complaint=GetValue("select complaint as col from tbl_compose where mail_id=".$row_p['followup_id']." order by mail_id desc", "col");
						$previous_date=GetValue("select created_date as col from tbl_compose where mail_id=".$row_p['followup_id']." order by mail_id desc", "col");
						$previous_doc_comment=GetValue("select doctor_advice as col from tbl_doctor_comment where compose_id=".$row_p['followup_id']."  order by comment_id desc", "col");
						if($previous_doc_comment=="")
						{
							$previous_doc_comment="";
						}
						
						
						$previous_md_comment=GetValue("select md_advice as col from tbl_md_comment where compose_id=".$row_p['followup_id']."  order by comment_id desc", "col");
						if($previous_md_comment=="")
						{
							$previous_md_comment="";
						}
						
						
						$previous_md_internal_comment=GetValue("select md_internal_advice as col from tbl_md_comment where compose_id=".$row_p['followup_id']."  order by comment_id desc", "col");
						if($previous_md_internal_comment=="")
						{
							$previous_md_internal_comment="";
						}
						
						
						$prev_doctor_name=GetValue("select doc_name as col from tbl_doctor_comment where compose_id=".$row_p['followup_id'], "col");
						$prev_md_id=GetValue("select md_id as col from tbl_md_comment where compose_id=".$row_p['followup_id'], "col");
						$prev_md_name=GetValue("select doctor_name as col from tbl_doctor where doctor_id=".$prev_md_id, "col");
						
						
						$previous_doc_internal_comment=GetValue("select doctor_internal_advice as col from tbl_doctor_comment where compose_id=".$row_p['followup_id']."  order by compose_id desc", "col");
						
						
						
						
						
						
						$current_complaint=GetValue("select complaint as col from tbl_compose where mail_id=".$row_p['mail_id'], "col");
						if($current_complaint=="")
						{
							$current_complaint="--";
						}
						
						$current_date=GetValue("select created_date as col from tbl_compose where mail_id=".$row_p['mail_id'], "col");
						$current_doc_comment=GetValue("select doctor_advice as col from tbl_doctor_comment where comment_id=".$row_p['mail_id']." order by compose_id desc limit 1", "col");
						if($current_doc_comment=="")
						{
							$current_doc_comment="--";
						}
						
						$current_doctor_name=GetValue("select doc_name as col from tbl_doctor_comment where compose_id=".$row_p['mail_id']."  order by compose_id desc", "col");
						if($current_doctor_name=="")
						{
							$current_doctor_name="--";
						}
						$current_doc_internal_comment=GetValue("select doctor_internal_advice as col from tbl_doctor_comment where compose_id=".$row_p['mail_id']."  order by compose_id desc", "col");
						if($current_doc_internal_comment=="")
						{
							$current_doc_internal_comment="--";
						}
						
						
						
						
						
			?>
          <div style="width:100%; border:solid 0px red;">
            <div class="dvFloat formpadding1" style="padding-top:0px;">
              <div class="formlabel1">
                <div style="padding-left: 10px; float: left;">Query Type </div>
              </div>
              <div class="formcontrol21" style="padding-top: 7px;">
			  		<?php 
						if($row_p['query_type']==1)
						{
							echo "Fresh";
						} else
						{
							echo "Follow Up";
						}
						
					?>	
					
              </div>
            </div>
            <?php if ($row_p['video_query_requirement']=="Yes") { ?>
            <div class="dvFloat formpadding1" style="padding-top:0px;">
              <div class="formlabel1">
                <div style="padding-left: 10px; float: left;">Video Query </div>
              </div>
              <div class="formcontrol21" style="padding-top: 7px;">
			  		
	                        <div style="width:500px; float: left; border:solid 0px green; text-align:left; margin-top:0px; font-size:12px; color:red;"> 
                                <img src="<?php echo $strHostName;?>/images/video_icon.jpg" style="width:25px; float:left; margin-top:-5px;" align="top"/>&nbsp;&nbsp; (This patient need video query.)
                                &nbsp;&nbsp;&nbsp;&nbsp;
                             <?php /*?> <?php if($_SESSION['UserType']=="MD") { ?>
                                <span style="font-size:12px; font-weight:bold;"><a href="<?php echo $strHostName;?>/page_doctor.php?dir=md/timings" target="_blank" style="color:#009999; text-decoration:underline; line-height:18px;">View Visit Timings</a></span>
                              <?php } ?>  <?php */?>
                          </div>
						
	                      
                               
                       
                        
                        
					
              </div>
            </div>
            <?php } ?>
            <div class="dvFloat formpadding1">
              <div class="formlabel1">
                <div style="padding-left: 10px; float: left;">Body Area</div>
              </div>
              <div class="formcontrol21" style="padding-top: 7px;"><?php echo $row_p['body_area'];?></div>
            </div>
            <div class="dvFloat formpadding1" >
					<div class="formlabel1">
						<div style="padding-left: 10px; float: left;">Subject </div>
					</div>
					 <div class="formcontrol21" style="padding-top: 7px;"><?php echo str_replace("\\","",$row_p['subject']);?></div>
                </div>
            <div class="dvFloat formpadding1">
              <div class="formlabel1">
                <div style="padding-left: 10px; float: left;">Complaint</div>
              </div>
              <div class="formcontrol21" style="padding-top: 7px;"><?php echo str_replace("\\","",$row_p['complaint']);?></div>
            </div>
            <div class="dvFloat formpadding1">
              <div class="formlabel1">
                <div style="padding-left: 10px; float: left;">Symptoms </div>
              </div>
              <div class="formcontrol21" style="padding-top: 7px;">
              	 <?php
					$strSymName="0";
										
								$strCheckCatName="";
									$strCheckSubCatName="";		
								 $itableCount="0";	
							$query_s = "SELECT symptom_name,cat_id, sub_cat_id FROM  tbl_symptom where isactive=1 and isdeleted=0 and symptom_id in (".$row_p['symptoms'].") order by cat_id, sub_cat_id,symptom_name ";
							//echo $query_s;
							  $iSymCount=0;
							$result_s = mysql_query($query_s);							
							if($result_s != "") {	
								$rowcount_s  = mysql_num_rows($result_s);
								if($rowcount_s > 0) {
									while($row_s = mysql_fetch_assoc($result_s)) {
									
											 $strSymName=$row_s['symptom_name'];
													$strCat=$row_s['cat_id'];
													$strCatName=GetValue("select cat_name as col from tbl_symp_categroy where cat_id=".$strCat,"col");
													$strSubCat=$row_s['sub_cat_id'];
													$strSubCat=GetValue("select sub_cat_name as col from tbl_symp_sub_categroy where sub_cat_id=".$strSubCat,"col");
										?>
                                        
                                        
                                        <?php  if($itableCount==0) { ?>
                                                 
                                                
                                                <?php } ?>
                                                
                                                <?php if($strCheckCatName!=$strCatName){ ?>
                                               </td></tr>
											    <table border="0" cellspacing="0" cellpadding="0" style="width:97%; border:solid 1px #666666; float:left; margin-right:8px; margin-bottom:10px;">
	                                                
													<?php $strCheckCatName=$strCatName; $itableCount=$itableCount+1;?>  
                                                	<tr style="background:#999999; color:#fff; padding:5px;">
														 <td style="padding:5px; height:20px;"><?php echo $strCatName?></td>
                                                    </tr> 
                                                <?php } ?>
                                                <?php if($strCheckSubCatName!=$strSubCat){?>
	                                                <?php $strCheckSubCatName=$strSubCat?>
                                                  </table><table  border="0" cellspacing="0" cellpadding="0" style="width:48%; border:solid 1px #666666; float:left; margin-right:8px; margin-bottom:10px;">
                                                	<tr style="background:#f1f1f1;">
														 <td style="padding:5px; height:20px; font-weight:bold;"><?php echo $strSubCat?></td>
                                                    </tr>  	<tr>
                                                  
                                                   <td style="padding:2px 5px;" id="tdSymtp<?php echo $iSymCount?>"><?php  $iSymCount= $iSymCount+1;?>
                                                   
                                                <?php } ?>
                                                 <?php echo $strSymName.",";?>
								<?php }}}?></td></tr></table>
              		
               
              </div>
            </div>
            <div class="dvFloat formpadding1">
              <div class="formlabel1">
                <div style="padding-left: 10px; float: left;">How often you suffer from this Medical Problem ?</div>
              </div>
              <div class="formcontrol21" style="padding-top: 7px;"><?php echo $row_p['suffer_from'];?></div>
            </div>
            <div class="dvFloat formpadding1">
              <div class="formlabel1">
                <div style="padding-left: 10px; float: left;">Last Ocurrency of Problem ?</div>
              </div>
              <div class="formcontrol21" style="padding-top: 7px;">
                <div style="float:left; padding:0px 5px 0px 0px"><?php 
					if($row_p['last_occurrency_date']=="1999-11-30 00:00:00")
					{
						echo "--";
					}
					else
					{
						echo date('d-M-Y',strtotime($row_p['last_occurrency_date']));
					}
				 ?></div>
              </div>
            </div>
          <?php if($row_p['doctor_consulted']=="Yes") { ?>
            <div class="dvFloat formpadding1">
              <div class="formlabel1">
                <div style="padding-left: 10px; float: left;">Doctor Consulted of problem (if any?)</div>
              </div>
              <div class="formcontrol21" style="text-align:left; padding-top: 7px;">
                <div style="float:left"><?php echo $row_p['doctor_consulted'];?></div>
              </div>
            </div>
            <div class="dvFloat formpadding1">
              <div class="formlabel1">
                <div style="padding-left: 10px; float: left;">Doctor Name</div>
              </div>
              <div class="formcontrol21" style="padding-top: 7px;"><?php echo $doctor_name=GetValue("select doctor_name as col from tbl_doctor where doctor_id=".$row_p['doctor_id'], "col");?></div>
            </div>
            <div class="dvFloat formpadding1">
              <div class="formlabel1">
                <div style="padding-left: 10px; float: left;">Doctor Comment</div>
              </div>
              <div class="formcontrol21" style="padding-top: 7px;"><?php echo str_replace("\\","",$row_p['doc_comment']);?></div>
            </div>
            
            <?php } ?>
            <div class="dvFloat formpadding1">
              <div class="formlabel1">
                <div style="padding-left: 10px; float: left;">Attached report</div>
              </div> 
              <div class="formcontrol21" style="padding-top: 7px;">
                <div class="dvFloat"> 
                	<?php
					$query_r = "SELECT * FROM  tbl_medical_history where isactive=1 and isdeleted=0 and user_id=$patient_id and parent_mail_id=$compose_id";
			 		/// echo $query_r;
					$result_r = mysql_query($query_r);							
					if($result_r != "") {	
						$rowcount  = mysql_num_rows($result_r);
						if($rowcount > 0) {
							while($row_r = mysql_fetch_assoc($result_r)) {
								extract($row_r);
					?>
                    	<?php if($row_r['prescription_report']!="") { ?>
	                      
						  <?php
								$query_p = "SELECT * FROM tbl_doc_consult_gallery where userid=$patient_id and report_type=1 and id in (".$row_r['prescription_report'].")";
						 		///  echo $query_p;
								$result_p = mysql_query($query_p);							
								if($result_p != "") {	
									$rowcount  = mysql_num_rows($result_p);
									if($rowcount > 0) {
										while($row_p = mysql_fetch_assoc($result_p)) {
											extract($row_p);
											$pre_report=$row_p['file_path'];
											$pre_report_date=$row_p['report_date'];
											$health_prob=$row_p['health_problem'];
								?>
                           <a href="<?php echo $strHostName;?>/uploads/<?php echo $pre_report;?>" target="_blank"> <img src="images/action.jpg" alt="" align="absmiddle" />&nbsp;</a>   <?php echo date('d-M-Y',strtotime($pre_report_date)); ?> - <?php echo $health_prob;?> - Prescription<br>
                            
                            <?php }}} ?>
                            
                        <?php } ?>
                        
                   		<?php if($row_r['lab_test_report']!="") { ?>
							 <?php
								$query_l = "SELECT * FROM tbl_doc_consult_gallery where userid=$patient_id and report_type=2 and id in (".$row_r['lab_test_report'].")";
						 		$result_l = mysql_query($query_l);							
								if($result_l != "") {	
									$rowcount  = mysql_num_rows($result_l);
									if($rowcount > 0) {
										while($row_l = mysql_fetch_assoc($result_l)) {
											extract($row_l);
											$lab_report=$row_l['file_path'];
											$lab_report_date=$row_l['report_date'];
											$health_prob=$row_l['health_problem'];
								?>
                            
                           	<a href="<?php echo $strHostName;?>/uploads/<?php echo $lab_report;?>" target="_blank">  <img src="images/action.jpg" alt="" align="absmiddle" />&nbsp;</a><?php echo date('d-M-Y',strtotime($lab_report_date)); ?> - <?php echo $health_prob;?> - Lab Report<br>
                      
                       <?php }}} ?>
                       <?php } ?>
                    
                        <?php if($row_r['radiology_report']!="") { ?>
	                       <?php
								$query_ra = "SELECT * FROM tbl_doc_consult_gallery where userid=$patient_id and report_type=3 and id in (".$row_r['radiology_report'].")";
						 		$result_ra = mysql_query($query_ra);							
								if($result_ra != "") {	
									$rowcount  = mysql_num_rows($result_ra);
									if($rowcount > 0) {
										while($row_ra = mysql_fetch_assoc($result_ra)) {
											extract($row_ra);
											$rad_report=$row_ra['file_path'];
											$rad_report_date=$row_ra['report_date'];
											$health_prob=$row_ra['health_problem'];
								?>
                            <a href="<?php echo $strHostName;?>/uploads/<?php echo $rad_report;?>" target="_blank"><img src="images/action.jpg" alt="" align="absmiddle" />&nbsp;</a><?php echo date('d-M-Y',strtotime($rad_report_date)); ?> - <?php echo $health_prob;?> - Radiology Report<br />
                        <?php } ?>
                        <?php }}} ?>
          			<?php }}} ?>
                    
                    
                    
                    
                    
                   <?php /*?><?php
					$query_r = "SELECT * FROM  tbl_upload_compose where  user_id=$patient_id and parent_mail_id=$compose_id";
					
					$result_r = mysql_query($query_r);							
					if($result_r != "") {	
						$rowcount  = mysql_num_rows($result_r);
						if($rowcount > 0) {
							while($row_r = mysql_fetch_assoc($result_r)) {
								extract($row_r);
					?>
                    	
	                      <?php 
						  $pre_report=$row_r['upload_report'];
						  $pre_report_date=$row_r['created_date'];
							//	echo "select file_path as col from tbl_doc_consult_gallery where id in (".$row_r['prescription_report'].")";
						//	Alert ($pre_report_date);
						?> 
                        
                           <a href="<?php echo $strHostName;?>/uploads/<?php echo $pre_report;?>" target="_blank"> <img src="images/action.jpg" alt="" align="absmiddle" />&nbsp;</a>   <?php echo date('d-M-Y',strtotime($pre_report_date)); ?> - Other Report <br>
                            
                            
                            
                       
          			<?php }}} ?><?php */?>
                </div>
                
                <div class="dvFloat"> 
                            <?php
                $query_rr = "SELECT * FROM  tbl_medical_history where isactive=1 and isdeleted=0 and history_id in (select followup_id from tbl_compose where mail_id=".$compose_id.")";
                         //  echo $query_rr;
                            $result_rr = mysql_query($query_rr);							
                            if($result_rr != "") {	
                                $rowcount  = mysql_num_rows($result_rr);
                                if($rowcount > 0) {
                                    while($row_rr = mysql_fetch_assoc($result_rr)) {
                                        extract($row_rr);
                            ?>
                                <?php if($row_rr['prescription_report']!="") { ?>
	                      
						  <?php
								$query_p = "SELECT * FROM tbl_doc_consult_gallery where userid=$patient_id and report_type=1 and id in (".$row_rr['prescription_report'].")";
						 		///  echo $query_p;
								$result_p = mysql_query($query_p);							
								if($result_p != "") {	
									$rowcount  = mysql_num_rows($result_p);
									if($rowcount > 0) {
										while($row_p = mysql_fetch_assoc($result_p)) {
											extract($row_p);
											$pre_report=$row_p['file_path'];
											$pre_report_date=$row_p['report_date'];
											$health_prob=$row_p['health_problem'];
								?>
                           <a href="<?php echo $strHostName;?>/uploads/<?php echo $pre_report;?>" target="_blank"> <img src="images/action.jpg" alt="" align="absmiddle" />&nbsp;</a>   <?php echo date('d-M-Y',strtotime($pre_report_date)); ?> - <?php echo $health_prob;?> - Prescription<br>
                            
                            <?php }}} ?>
                            
                        <?php } ?>
                        
                   		<?php if($row_rr['lab_test_report']!="") { ?>
							 <?php
								$query_l = "SELECT * FROM tbl_doc_consult_gallery where userid=$patient_id and report_type=2 and id in (".$row_rr['lab_test_report'].")";
						 		$result_l = mysql_query($query_l);							
								if($result_l != "") {	
									$rowcount  = mysql_num_rows($result_l);
									if($rowcount > 0) {
										while($row_l = mysql_fetch_assoc($result_l)) {
											extract($row_l);
											$lab_report=$row_l['file_path'];
											$lab_report_date=$row_l['report_date'];
											$health_prob=$row_l['health_problem'];
								?>
                            
                           	<a href="<?php echo $strHostName;?>/uploads/<?php echo $lab_report;?>" target="_blank">  <img src="images/action.jpg" alt="" align="absmiddle" />&nbsp;</a><?php echo date('d-M-Y',strtotime($lab_report_date)); ?> - <?php echo $health_prob;?> - Lab Report<br>
                      
                       <?php }}} ?>
                       <?php } ?>
                    
                        <?php if($row_rr['radiology_report']!="") { ?>
	                       <?php
								$query_ra = "SELECT * FROM tbl_doc_consult_gallery where userid=$patient_id and report_type=3 and id in (".$row_rr['radiology_report'].")";
						 		$result_ra = mysql_query($query_ra);							
								if($result_ra != "") {	
									$rowcount  = mysql_num_rows($result_ra);
									if($rowcount > 0) {
										while($row_ra = mysql_fetch_assoc($result_ra)) {
											extract($row_ra);
											$rad_report=$row_ra['file_path'];
											$rad_report_date=$row_ra['report_date'];
											$health_prob=$row_ra['health_problem'];
								?>
                            <a href="<?php echo $strHostName;?>/uploads/<?php echo $rad_report;?>" target="_blank"><img src="images/action.jpg" alt="" align="absmiddle" />&nbsp;</a><?php echo date('d-M-Y',strtotime($rad_report_date)); ?> - <?php echo $health_prob;?> - Radiology Report<br />
                        <?php } ?>
                        <?php }}} ?>
                            <?php }}} ?>
                        </div>
                
                
                
                
                
              </div>
            </div>
            <div class="dvFloat formpadding1" style="display:'';">
        <div class="formlabel1">
        <div style="padding-left: 10px; float: left;">Additional Medical Reports</div>
        </div>
         <div class="formcontrol21" style="padding-top: 7px;">
        <div style=" width:480px; height:30px; float:left;padding-right:10px;"> 
            <?php
					$query_r = "SELECT * FROM  tbl_upload_compose where isactive=1 and isdeleted=0 and parent_mail_id=".$compose_id;
					// echo $query_r;
					$result_r = mysql_query($query_r);							
					if($result_r != "") {	
						$rowcount  = mysql_num_rows($result_r);
						if($rowcount > 0) {
							while($row_r = mysql_fetch_assoc($result_r)) {
								extract($row_r);
					?>
                      <?php if($row_r['upload_report']!="") { ?>
                     <a href="<?php echo $strHostName;?>/uploads/<?php echo $row_r['upload_report'];?>" target="_blank"> <img src="images/action.jpg" alt="" align="absmiddle" />&nbsp;</a>   <?php echo date('d-M-Y',strtotime($row_r['created_date'])); ?>
                     <?php } else { ?>
                     	--
                     <?php } ?>
                    <?php }}} ?>
        </div>
        </div>
        </div>
             
           
           <?php if ($query_type_id=="2") { ?>      
             <div class="dvFloat" style="margin-top:15px; display:none;">
             	
                  <div class="dvFloat" style="padding:10px 0 0 0; font-weight:bold; font-size:15px; border-bottom:solid  1px #e4e4e4;">
                         <h1 class="f_red" style="text-align: left; font-size: 18px; font-weight:bold;  margin: 7px;"> Latest Query Details</h1>
                    </div>


					<div class="dvFloat" style="padding:10px 0; font-weight:bold; font-size:15px;">Doctor Comments</div>
             	<table class="tablecont" cellpadding="2" cellspacing="1" width="100%" border="0" style="border:solid 0px red;">
                  <tbody>
                    <tr>
                      <td class="dargery" style="width:150px;"> Sent On </td>
                      <td class="dargreen" style="width:250px;"> Complaint </td>
                      <td class="dargreen" style="width:250px;"> Doctor Name </td>
                      <td class="dargreen" style="width:250px;"> Advice </td>
                      <td class="dargreen" style="width:250px;"> Internal Doctor Advice </td>
                      
                    </tr>
                 
                    <tr>
         					 <td class="ligery"><?php echo $previous_date;?></td>
                             <td class="ligreen" style="text-align:left;"><?php echo truncate($previous_complaint,150);?></td>
                             <td class="ligreen" style="text-align:center;"><?php echo $prev_doctor_name;?></td>
                             <td class="ligreen" style="text-align:left;"><?php echo $previous_doc_comment;?></td>
                             <td class="ligreen" style="text-align:left;"><?php echo $previous_doc_internal_comment;?></td>
                          
                     </tr>
                  	  
        		</tbody>
                </table>
                   
                   
                 <div class="dvFloat" style="margin-top:15px;">
             	 <div class="dvFloat" style="padding:10px 0; font-weight:bold; font-size:15px;">MD Comments</div>
             	<table class="tablecont" cellpadding="2" cellspacing="1" width="100%" border="0" style="border:solid 0px red;">
                  <tbody>
                    <tr>
                      <td class="dargery" style="width:150px;"> Sent On </td>
                      <td class="dargreen" style="width:250px;"> Complaint </td>
                      <td class="dargreen" style="width:250px;"> Doctor Name </td>
                       <td class="dargreen" style="width:250px;"> MD Name </td>
                      <td class="dargreen" style="width:250px;"> Advice </td>
                      <td class="dargreen" style="width:250px;"> Internal Doctor Advice </td>
                      
                    </tr>
                  
                    <tr>
         					 <td class="ligery"><?php echo $previous_date;?></td>
                             <td class="ligreen" style="text-align:left;"><?php echo truncate($previous_complaint,150);?></td>
                             <td class="ligreen" style="text-align:center;"><?php echo $prev_doctor_name;?></td>
                              <td class="ligreen" style="text-align:center;"><?php echo $prev_md_name;?></td>
                             <td class="ligreen" style="text-align:left;"><?php echo $previous_md_comment;?></td>
                             <td class="ligreen" style="text-align:left;"><?php echo $previous_md_internal_comment;?> </td>
                          
                     </tr>
                  
        		</tbody>
                </table>
             </div>  
                    
                    
             	
             </div>    
            
            <?php } ?>
                 
           <div class="dvFloat" style="margin-top:15px;">
             	 <div class="dvFloat" style="padding:10px 0 0 0; font-weight:bold; font-size:15px; border-bottom:solid  1px #e4e4e4;">
                         <h1 class="f_red" style="text-align: left; font-size: 18px; font-weight:bold;  margin: 7px;"> Last Query Details</h1>
                    </div>
                 <div class="dvFloat" style="padding:10px 0; font-weight:bold; font-size:15px;">Doctor Comments</div>
             	<table class="tablecont" cellpadding="2" cellspacing="1" width="100%" border="0" style="border:solid 0px red;">
                  <tbody>
                    <tr>
                      <td class="dargery" style="width:150px;"> Sent On </td>
                      <td class="dargreen" style="width:250px;"> Complaint </td>
                      <td class="dargreen" style="width:250px;"> Doctor Name </td>
                      <td class="dargreen" style="width:250px;"> Advice </td>
                      <td class="dargreen" style="width:250px;"> Internal Doctor Advice </td>
                      
                    </tr>
                   <?php
						if ($query_type_id=="2") {
							$docmd_cmt_compose_id=GetValue("select mail_id as col from tbl_compose where followup_id=".$row_p['followup_id']." and mail_id< ".$row_p['mail_id']." order by mail_id desc limit 0,1", "col");
							
							///echo "select mail_id as col from tbl_compose where followup_id=".$row_p['followup_id']." and mail_id<> ".$row_p['mail_id']." order by mail_id desc limit 0,1";
							
							
							if($docmd_cmt_compose_id=="" || $docmd_cmt_compose_id=="0")
							{
								$docmd_cmt_compose_id=$row_p['followup_id'];
							}
							///echo "select mail_id from tbl_compose where followup_id=".$row_p['followup_id']." and mail_id<> ".$row_p['mail_id']." order by mail_id desc limit 0,1";
							
							//$query_dc = "SELECT * FROM  tbl_doctor_comment where isactive=1 and isdeleted=0 and compose_id=".$fid." order by comment_id desc limit 1";
						}		
						
						if($docmd_cmt_compose_id==$row_p['mail_id'])
						{
							$query_dc = "SELECT * FROM  tbl_doctor_comment where isactive=1 and isdeleted=0 and compose_id=0 order by comment_id desc limit 1";
						}
						else{
								$query_dc = "SELECT * FROM  tbl_doctor_comment where isactive=1 and isdeleted=0 and compose_id=".$docmd_cmt_compose_id. " order by comment_id desc limit 1";
						}
					 	
						
						
					/// 	 echo $query_dc;
							$result_dc = mysql_query($query_dc);							
							if($result_dc != "") {	
								$rowcount_dc  = mysql_num_rows($result_dc);
								if($rowcount_dc> 0) {
									while($row_dc = mysql_fetch_assoc($result_dc)) {
									$pre_complaint=GetValue("select complaint as col from tbl_compose where mail_id=".$docmd_cmt_compose_id, "col");
										
						?>
                    <tr>
         					 <td class="ligery"><?php echo $row_dc['created_date'];?></td>
                             <td class="ligreen" style="text-align:left;"><?php echo truncate($pre_complaint,150);?></td>
                             <td class="ligreen" style="text-align:center;"><?php echo str_replace("\\","",$row_dc['doc_name']);?></td>
                             <td class="ligreen" style="text-align:left;"><?php echo str_replace("\\","",$row_dc['doctor_advice']);?></td>
                             <td class="ligreen" style="text-align:left;"><?php echo str_replace("\\","",$row_dc['doctor_internal_advice']);?></td>
                          
                     </tr>
                  	
					 <?php
											}
										} else {
								?>
					  <tr>
						<td colspan="5" style="color: red; text-align:center; padding:10px 0; font-size:12px;">Sorry! No doctor comments are available for this query! </td>
					  </tr>
					  <?php
										}
									}
								?>    
        		</tbody>
                </table>
             </div>
             
             
             <div class="dvFloat" style="margin-top:15px;">
             	 <div class="dvFloat" style="padding:10px 0; font-weight:bold; font-size:15px;">MD Comments</div>
             	<table class="tablecont" cellpadding="2" cellspacing="1" width="100%" border="0" style="border:solid 0px red;">
                  <tbody>
                    <tr>
                      <td class="dargery" style="width:150px;"> Sent On </td>
                      <td class="dargreen" style="width:250px;"> Complaint </td>
                      <td class="dargreen" style="width:250px;"> Doctor Name </td>
                       <td class="dargreen" style="width:250px;"> MD Name </td>
                      <td class="dargreen" style="width:250px;"> Advice </td>
                      <td class="dargreen" style="width:250px;"> Internal Doctor Advice </td>
                      
                    </tr>
                   <?php
						
						
						if ($query_type_id=="2") {
							$docmd_cmt_compose_id=GetValue("select mail_id as col from tbl_compose where followup_id=".$row_p['followup_id']." and mail_id< ".$row_p['mail_id']." order by mail_id desc limit 0,1", "col");
							
							///echo "select mail_id as col from tbl_compose where followup_id=".$row_p['followup_id']." and mail_id<> ".$row_p['mail_id']." order by mail_id desc limit 0,1";
							
							
							if($docmd_cmt_compose_id=="" || $docmd_cmt_compose_id=="0")
							{
								$docmd_cmt_compose_id=$row_p['followup_id'];
							}
							///echo "select mail_id from tbl_compose where followup_id=".$row_p['followup_id']." and mail_id<> ".$row_p['mail_id']." order by mail_id desc limit 0,1";
							
							//$query_dc = "SELECT * FROM  tbl_doctor_comment where isactive=1 and isdeleted=0 and compose_id=".$fid." order by comment_id desc limit 1";
						}		
						
						if($docmd_cmt_compose_id==$row_p['mail_id'])
						{
							$query_dc_1 = "SELECT * FROM  tbl_md_comment where isactive=1 and isdeleted=0 and compose_id=0 order by created_date desc limit 1";
						}
						else{
								$query_dc_1 = "SELECT * FROM  tbl_md_comment where isactive=1 and isdeleted=0 and compose_id=".$docmd_cmt_compose_id. " order by created_date desc limit 1";
						}
						
						
						
								
						/// echo $query_dc_1;
							$result_dc_1 = mysql_query($query_dc_1);							
							if($result_dc_1 != "") {	
								$rowcount_dc_1  = mysql_num_rows($result_dc_1);
								if($rowcount_dc_1> 0) {
									while($row_dc_1 = mysql_fetch_assoc($result_dc_1)) {
									$doc_name=GetValue("select doctor_name as col from tbl_doctor where doctor_id=".$row_dc_1['ref_doctor_id'], "col");
									$md_doc_name=GetValue("select doctor_name as col from tbl_doctor where doctor_id=".$row_dc_1['md_id'], "col");
									$pre_complaint=GetValue("select complaint as col from tbl_compose where mail_id=".$docmd_cmt_compose_id, "col");	
						?>
                    <tr>
         					 <td class="ligery"><?php echo $row_dc_1['created_date'];?></td>
                             <td class="ligreen" style="text-align:left;"><?php echo truncate($pre_complaint,150);?></td>
                             <td class="ligreen" style="text-align:center;"><?php echo str_replace("\\","",$doc_name);?></td>
                              <td class="ligreen" style="text-align:center;"><?php echo str_replace("\\","",$md_doc_name);?></td>
                             <td class="ligreen" style="text-align:left;"><?php echo str_replace("\\","",$row_dc_1['md_advice']);?></td>
                             <td class="ligreen" style="text-align:left;"><?php echo str_replace("\\","",$row_dc_1['md_internal_advice']);?> </td>
                          
                     </tr>
                  	
					 <?php
											}
										} else {
								?>
					  <tr>
						<td colspan="6" style="color: red; border-right:0px solid #bbbbbb; text-align:center; padding:10px 0; font-size:12px;">Sorry! No MD comments are available for this query! </td>
					  </tr>
					  <?php
										}
									}
								?>    
        		</tbody>
                </table>
             </div>    
            
            
          </div>
          <?php }}} ?>
          
          <?php } ?>
          
        </div>