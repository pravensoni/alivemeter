<?php
if(!isset($_SESSION['UserMDID']))
{
	Alertandredirect("Sorry! Session is expired.", 'index.php');
}
?>
<section>
  <div class="top_ou">
    <div class="top_in">
      <div class="top">
        <div class="cal_12" style="padding-top: 45px; padding-bottom:60px;">
            <div class="cal_12" style="border: solid 0px #0066CC;">
            	<div class="adviceonline_md">
                 <h1 class="f_red" style="text-align: left; font-size: 20px; margin-bottom: 7px; text-transform:uppercase; display:none;">Doctor Comments</h1>
                	  <div class="DvFloat">
                    

<?php
	$page=1;$page_count=5;$newpagenumber="2";$retrive_Array=array();$get_array=array(); $dvCurrentComment="";
	if(isset($_GET['page'])){
		$page=$_GET['page'];
	}
	else
	{
		$page=1;
	}
	if(isset($_SESSION['UserDocID']))
	{
		$user_id=$_SESSION['UserDocID'];
	}
	else
	{
		$user_id=0;
	}
	
	if(isset($_GET['patient_id'])) 
	{	
		$patient_id=$converter->decode($_GET['patient_id']);
	}
	///	Alert($patient_id);
	$retrive_Array=$get_retrive->GetDocComments($page_count,$patient_id,$user_id);
	$nume=$get_retrive->GetDocComments_Count($patient_id);
	
	///Alert ($nume);
	if($nume !="0")
	{
		$newpagenumber=($nume/$page_count);
		if($newpagenumber==""){$newpagenumber="0";}else{$newpagenumber=$newpagenumber+1;}
		$newpagenumber=round($newpagenumber);
		if($page > $newpagenumber)
		{
			$newpagenumber=1;
		}
		else
		{
			$newpagenumber="";
		}
	}
	$pagingLink = getPagingLinkBackEndFrontEnd($nume,$page_count,'dir=md/doctor_comments&patient_id='.$_GET['patient_id'].'',$newpagenumber,$strHostName."/page_doctor.php");
		
	if($_SESSION['UserType']=="Doctor")
	{
		$doctor_id=$_SESSION['UserDocID'];
		$mdcmtcount=GetValue("select count(*) as col from ".MD_Comment." where patient_id=".$patient_id." and ref_doctor_id=".$doctor_id,"col");
		$doccmtcount=GetValue("select count(*) as col from ".Doc_Comment." where patient_id=".$patient_id." and doctor_id=".$doctor_id,"col");
		//Alert ($mdcmtcount);
	}
	else if($_SESSION['UserType']=="MD")
	{
	 	$doctor_id=$_SESSION['UserMDID'];
		$mdcmtcount=GetValue("select count(*) as col from ".MD_Comment." where patient_id=".$patient_id." and md_id=".$doctor_id,"col");
		$doccmtcount=GetValue("select count(*) as col from ".Doc_Comment." where patient_id=".$patient_id." and md_id=".$doctor_id,"col");
	}
	

?>
<?php if($doccmtcount > 0) { ?>
<center>
 <div class="dvFloat" style="padding:10px 0 0 0; font-weight:bold; font-size:15px; border-bottom:solid  1px #e4e4e4;">
 	 
</div>
  <div class="DvFloat" style="border-bottom: solid 0px #e4e4e4;border-top: solid 0px #e4e4e4; margin:10px 0px 0px 0px">
    <h1 class="f_red" style="text-align: left; font-size: 18px; font-weight:bold;  margin: 7px;">
      <?php if($_SESSION['UserType']=="Doctor") 
	  {
	  	echo "My comments";
	  }
	  else
	  {
	  	echo "doctor&rsquo;s comments";
	  }
	  ?>
	 </h1>
  </div>
  <div class="DvFloat" style="margin-bottom:30px;">
    <table class="tablecont" cellpadding="2" cellspacing="1" width="100%" border="0">
      <tbody>
        <tr>
          <td class="dargery" style="width:150px;"> Sent On </td>
          <td class="dargreen" style="width:250px;"> Doctor Name </td>
          <td class="dargreen" style="width:250px;"> Advice </td>
          <td class="dargreen" style="width:250px;"> Internal Doctor Advice </td>
          <td class="dargreen" style="width:250px;"> Refer To MD </td>
        </tr>
        <?php  while($get_array = mysql_fetch_array( $retrive_Array )){
			$md_name=""; 
			if($get_array['md_id']>0){
				$md_name=GetValue("select doctor_name as col from tbl_doctor where doctor_id=".$get_array['md_id'], "col");
			}
			if($md_name=="" || $md_name=="0")
			{
				$md_name="-";
			}
			$complaint=GetValue("select complaint as col from tbl_compose where mail_id=".$get_array['compose_id'],"col");
			$complaint_date=GetValue("select created_date as col from tbl_compose where mail_id=".$get_array['compose_id'],"col");
			$dvCurrentComment=$get_array['doctor_advice'];
			
		//	echo $dvCurrentComment;
		?>
        <tr>
          <td class="ligery" style="text-align:left;"><?php echo date('d-M-Y h:i:s',strtotime($get_array['created_date']))?></td>
          <td class="ligreen" style="text-align:left;">
          			<div class="LongText">
						<a href="#" class="tooltip">
                            <?php echo $get_array['doc_name']?>
                            <span>
                                <img class="callout" src="<?php echo $strHostName;?>/images/callout.gif" style="top:35px;"/>
                                 
                                 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="line-height:20px;">
                                  <tr>
                                    <td style="font-size:12px;">Specialization</td>
                                    <td style="text-align:center; width:10%;">:</td>
                                    <td style="font-size:12px;"><?php echo $get_array['specialization'];?></td>
                                  </tr>
                                  <tr>
                                    <td style="font-size:12px;">Hospital Name</td>
                                    <td style="text-align:center; width:10%">:</td>
                                    <td style="font-size:12px;"><?php echo $get_array['hosp_name'];?></td>
                                  </tr>
                                  <tr>
                                    <td style="font-size:12px;">Licence No.</td>
                                    <td style="text-align:center; width:10%">:</td>
                                    <td style="font-size:12px;"><?php echo $get_array['licenceno'];?></td>
                                  </tr>
                                </table>
							</span>
                        </a>
					
					
					</div>
          </td>
          <td class="ligreen" style="text-align:left;"><div class="LongText">
		  		<?php echo $get_array['doctor_advice']?>
                          
                        
                        
                        
		 </div></td>
          <td class="ligreen" style="text-align:left;"><div class="LongText">
		  	<a href="#" class="tooltip">
                            <?php echo $get_array['doctor_internal_advice']?>
                            <span>
                                <img class="callout" src="<?php echo $strHostName;?>/images/callout.gif"  style="top:35px;"/>
                                 
                                 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="line-height:20px;">
                                  <tr>
                                   <td style="font-size:12px;"><?php echo date('d-M-Y h:i:s',strtotime($complaint_date))?></td>
                                  </tr>
                                  <tr>
                                   <td style="font-size:12px;"><?php echo $complaint;?></td>
                                  </tr>
                                 
                                </table>
							</span>
                        </a>
                        
                        
		 </div></td>
          <td class="ligreen" style="text-align:left;"><div class="LongText"><?php echo $md_name;?></div></td>
        </tr>
        <?php  } ?>
          <?php if ($nume > 5) { ?>
        <tr>
          <td colspan="6" style="display:''; text-align:center; padding:10px 0;"><?php echo $pagingLink ?> </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</center>
<?php } ?>

                      </div>
                      
                   
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
