<script type="text/javascript" src="<?php echo $strHostName?>/js/health_steup_validation.js"></script>
<script type="text/javascript" src="<?php echo $strHostName?>/js/health_steup_insert_retrive.js"></script>
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
 <script src="<?php echo $strHostName?>/js/highcharts.js"></script>
  <script src="<?php echo $strHostName?>/js/daily_track_charts.js"></script>
<?php include "includes/dashboard_top.inc.php";?>
<section>
  <div class="cal_full_size">
    <div class="cal_12 m_outo">
        <?php include "includes/dashboard_links.inc.php";?>
      <div class="dvFloat">
        <div class="dvWrapper">
          <div style=" padding:0px 0px 35px 0px">
               <?php include "includes/dashboard_left.inc.php";?>
                <div class="health_dashboard_div_right" style="width: 804px;">
              <?php include "includes/dashboard_sublinks.inc.php";?>
              <div style="padding:0px 5px 20px 5px;">
                <div class="DvFloat" style="padding:10px 5px 0px 5px;">
                  <h1 class="f_red" style="text-align: left; font-size: 16px; margin-bottom: 7px;">daily tracking</h1>
                </div>
              </div>
              <div class="TabDv">
                <div>
                  <ul id="tabstabs" class="shadetabs">
                    <li  class="selected"><a rel="tabs1" class="selected" >Blood Pressure</a></li>
                    <li><a   href="<?php echo $strHostName?>/page.php?dir=daily_tracking/sugar_profile">Sugar Profile</a></li>
                    <li><a href="<?php echo $strHostName?>/page.php?dir=daily_tracking/lipid_profile">Lipid Profile</a></li>
                    <li><a href="<?php echo $strHostName?>/page.php?dir=daily_tracking/lifestyle">Lifestyle</a></li>
                  </ul>
                </div>
                <div class="TabContentDetails">
                  <div id="tabs1" class="tabcontent">
                    <div style="width:760px; border:solid 0px red;" id="divtab8">
                      <div style="padding:20px 5px 20px 5px;">
                        <div class="DvFloat">
                          <div style="width: 49%; float: left;padding-left:70px;"><span class="f_grey" style="font-size: 15px; ">Diastolic Record</span></div>
                        </div>
                      </div>
                      <div class="DvFloat">
                        <div class="TabDv">
							<div  style="padding:0px 0px 0px 70px;">
								<ul id="tabstabs1" class="shadetabs1">
								  <li ><a href="#" rel="tabs1a"> 1 WEEK </a></li>
								  <li><a href="#" rel="tabs2b">1 MONTH</a></li>
								  <li><a href="#" rel="tabs3b">1 year</a></li>
								</ul>
								</div>
								<div class="TabContentDetails">
								<div id="tabs1a" class="tabcontent">
								
								<?php
									$fromdate = date('Y-M-d');									
									$todate = strtotime("+6 day", strtotime($fromdate));
									$fromdate = date('Y-M-d',strtotime($fromdate));
									$todate = date('Y-M-d',$todate);
								?>
								<input type="hidden" id="txtDiastolicFromDate" name="txtDiastolicFromDate" value="<?php echo $fromdate?>"/>
								<input type="hidden" id="txtDiastolicToDate" name="txtDiastolicToDate" value="<?php echo $todate?>"/>
								<input type="hidden" id="txtWeekDays" name="txtWeekDays" value="6"/>

								<div  style="width:755px; border:solid 0px red;">
										<div class="DvFloat">
											  <div class="DvFloat" style="padding: 15px 0px; border-bottom: solid 1px #c5c5c5;">
												<div class="DvFloat">
												   <div style="width: 22px; float: left; height: 22px;">
														<a style="cursor:pointer;" onclick="javascript:GetChartDetails('diastolic','Prev')">
															<img src="<?php echo $strHostName?>/images/prev_md_paging.png" />
														</a>
													</div>

													 <div style="width: 695px; float: left; text-align: center; font-size: 15px; font-weight: bold;" class="f_grey" id="dvDiastolicMonthYearCaption"><?php echo $fromdate." - " . $todate ?></div>
													
													<div style="width: 22px; float: left; height: 22px;">
														<a style="cursor:pointer;" onclick="javascript:GetChartDetails('diastolic','Next')">
															<img src="<?php echo $strHostName?>/images/next_md_paging.png" />
														</a>
													</div>
												</div>
												<div class="DvFloat" style="padding-top: 5px;"  id="Diastolic_Chart"> 
												&nbsp;
												</div>
											  </div>
										</div>
								  </div>
								</div>
								<div id="tabs2b" class="tabcontent">
								  <?php
									$fromdate = date('Y-M-d');									
									$todate = strtotime("+30 day", strtotime($fromdate));
									$fromdate = date('Y-M-d',strtotime($fromdate));
									$todate = date('Y-M-d',$todate);
								?>
								<input type="hidden" id="txtDiastolicFromDateMonth" name="txtDiastolicFromDateMonth" value="<?php echo $fromdate?>"/>
								<input type="hidden" id="txtDiastolicToDateMonth" name="txtDiastolicToDateMonth" value="<?php echo $todate?>"/>
								<input type="hidden" id="txtWeekDaysMonth" name="txtWeekDaysMonth" value="30"/>

								<div  style="width:755px; border:solid 0px red;">
										<div class="DvFloat">
											  <div class="DvFloat" style="padding: 15px 0px; border-bottom: solid 1px #c5c5c5;">
												<div class="DvFloat">
												   <div style="width: 22px; float: left; height: 22px;">
														<a style="cursor:pointer;" onclick="javascript:GetChartDetails('diastolicMonth','Prev')">
															<img src="<?php echo $strHostName?>/images/prev_md_paging.png" />
														</a>
													</div>

													 <div style="width: 695px; float: left; text-align: center; font-size: 15px; font-weight: bold;" class="f_grey" id="dvDiastolicMonthYearCaptionMonth">&nbsp;</div>
													
													<div style="width: 22px; float: left; height: 22px;">
														<a style="cursor:pointer;" onclick="javascript:GetChartDetails('diastolicMonth','Next')">
															<img src="<?php echo $strHostName?>/images/next_md_paging.png" />
														</a>
													</div>
												</div>
												<div class="DvFloat" style="padding-top: 5px;"  id="Diastolic_ChartMonth"> 
												&nbsp;
												</div>
											  </div>
										</div>
								  </div>
								</div>
								<div id="tabs3b" class="tabcontent">
										<?php
											$fromdate = date('Y-M-d');									
											$todate = strtotime("+365 day", strtotime($fromdate));
											$fromdate = date('Y-M-d',strtotime($fromdate));
											$todate = date('Y-M-d',$todate);
										?>
										<input type="hidden" id="txtDiastolicFromDateYearly" name="txtDiastolicFromDateYearly" value="<?php echo $fromdate?>"/>
										<input type="hidden" id="txtDiastolicToDateYearly" name="txtDiastolicToDateYearly" value="<?php echo $todate?>"/>
										<input type="hidden" id="txtWeekDaysYearly" name="txtWeekDaysYearly" value="365"/>

										<div  style="width:755px; border:solid 0px red;">
												<div class="DvFloat">
													  <div class="DvFloat" style="padding: 15px 0px; border-bottom: solid 1px #c5c5c5;">
														<div class="DvFloat">
														   <div style="width: 22px; float: left; height: 22px;">
																<a style="cursor:pointer;" onclick="javascript:GetChartDetails('diastolicYearly','Prev')">
																	<img src="<?php echo $strHostName?>/images/prev_md_paging.png" />
																</a>
															</div>

															 <div style="width: 695px; float: left; text-align: center; font-size: 15px; font-weight: bold;" class="f_grey" id="dvDiastolicMonthYearCaptionYearly">&nbsp;</div>
															
															<div style="width: 22px; float: left; height: 22px;">
																<a style="cursor:pointer;" onclick="javascript:GetChartDetails('diastolicYearly','Next')">
																	<img src="<?php echo $strHostName?>/images/next_md_paging.png" />
																</a>
															</div>
														</div>
														<div class="DvFloat" style="padding-top: 5px;"  id="Diastolic_ChartYearly"> 
														&nbsp;
														</div>
													  </div>
												</div>
										  </div>
								</div>
							</div>
                        </div>
                      </div>
                      <div style="padding:0px 5px 20px 5px;">
                        <div class="DvFloat" style="padding:20px 5px 0px 0px;">
                          <div style="width: 49%; float: left;padding-left:70px;"><span class="f_grey" style="font-size: 15px; ">Systolic Record</span></div>
                        </div>
                      </div>
                      <div class="DvFloat">
                        <div class="TabDv">
                          <div  style="padding:0px 0px 0px 70px;">
                            <ul id="tabstabs2" class="shadetabs2">
                              <li ><a href="#" rel="tabs1a1"> 1 WEEK </a></li>
                              <li><a href="#" rel="tabs2b1">1 MONTH</a></li>
                              <li><a href="#" rel="tabs3c1">1 year</a></li>
                            </ul>
                          </div>
                          <div class="TabContentDetails2">
                             <div id="tabs1a1" class="tabcontent">
								
								<?php
									$fromdate = date('Y-M-d');									
									$todate = strtotime("+6 day", strtotime($fromdate));
									$fromdate = date('Y-M-d',strtotime($fromdate));
									$todate = date('Y-M-d',$todate);
								?>
								<input type="hidden" id="txtSystolicFromDate" name="txtSystolicFromDate" value="<?php echo $fromdate?>"/>
								<input type="hidden" id="txtSystolicToDate" name="txtSystolicToDate" value="<?php echo $todate?>"/>
								<input type="hidden" id="txtWeekDaysSystolic" name="txtWeekDaysSystolic" value="6"/>

								<div  style="width:755px; border:solid 0px red;">
										<div class="DvFloat">
											  <div class="DvFloat" style="padding: 15px 0px; border-bottom: solid 1px #c5c5c5;">
												<div class="DvFloat">
												   <div style="width: 22px; float: left; height: 22px;">
														<a style="cursor:pointer;" onclick="javascript:GetChartDetails('systolic','Prev')">
															<img src="<?php echo $strHostName?>/images/prev_md_paging.png" />
														</a>
													</div>

													 <div style="width: 695px; float: left; text-align: center; font-size: 15px; font-weight: bold;" class="f_grey" id="dvSystolicMonthYearCaption"><?php echo $fromdate." - " . $todate ?></div>
													
													<div style="width: 22px; float: left; height: 22px;">
														<a style="cursor:pointer;" onclick="javascript:GetChartDetails('systolic','Next')">
															<img src="<?php echo $strHostName?>/images/next_md_paging.png" />
														</a>
													</div>
												</div>
												<div class="DvFloat" style="padding-top: 5px;"  id="Systolic_Chart"> 
												&nbsp;
												</div>
											  </div>
										</div>
								  </div>
								</div>
								<div id="tabs2b1" class="tabcontent">
								  <?php
									$fromdate = date('Y-M-d');									
									$todate = strtotime("+30 day", strtotime($fromdate));
									$fromdate = date('Y-M-d',strtotime($fromdate));
									$todate = date('Y-M-d',$todate);
								?>
								<input type="hidden" id="txtSystolicFromDateMonth" name="txtSystolicFromDateMonth" value="<?php echo $fromdate?>"/>
								<input type="hidden" id="txtSystolicToDateMonth" name="txtSystolicToDateMonth" value="<?php echo $todate?>"/>
								<input type="hidden" id="txtWeekDaysMonthSystolic" name="txtWeekDaysMonthSystolic" value="30"/>

								<div  style="width:755px; border:solid 0px red;">
										<div class="DvFloat">
											  <div class="DvFloat" style="padding: 15px 0px; border-bottom: solid 1px #c5c5c5;">
												<div class="DvFloat">
												   <div style="width: 22px; float: left; height: 22px;">
														<a style="cursor:pointer;" onclick="javascript:GetChartDetails('systolicMonth','Prev')">
															<img src="<?php echo $strHostName?>/images/prev_md_paging.png" />
														</a>
													</div>

													 <div style="width: 695px; float: left; text-align: center; font-size: 15px; font-weight: bold;" class="f_grey" id="dvSystolicMonthYearCaptionMonth">&nbsp;</div>
													
													<div style="width: 22px; float: left; height: 22px;">
														<a style="cursor:pointer;" onclick="javascript:GetChartDetails('systolicMonth','Next')">
															<img src="<?php echo $strHostName?>/images/next_md_paging.png" />
														</a>
													</div>
												</div>
												<div class="DvFloat" style="padding-top: 5px;"  id="Systolic_ChartMonth"> 
												&nbsp;
												</div>
											  </div>
										</div>
								  </div>
								</div>
								<div id="tabs3c1" class="tabcontent">
										<?php
											$fromdate = date('Y-M-d');									
											$todate = strtotime("+365 day", strtotime($fromdate));
											$fromdate = date('Y-M-d',strtotime($fromdate));
											$todate = date('Y-M-d',$todate);
										?>
										<input type="hidden" id="txtSystolicFromDateYearly" name="txtSystolicFromDateYearly" value="<?php echo $fromdate?>"/>
										<input type="hidden" id="txtSystolicToDateYearly" name="txtSystolicToDateYearly" value="<?php echo $todate?>"/>
										<input type="hidden" id="txtWeekDaysYearlySystolic" name="txtWeekDaysYearlySystolic" value="365"/>

										<div  style="width:755px; border:solid 0px red;">
												<div class="DvFloat">
													  <div class="DvFloat" style="padding: 15px 0px; border-bottom: solid 1px #c5c5c5;">
														<div class="DvFloat">
														   <div style="width: 22px; float: left; height: 22px;">
																<a style="cursor:pointer;" onclick="javascript:GetChartDetails('systolicYearly','Prev')">
																	<img src="<?php echo $strHostName?>/images/prev_md_paging.png" />
																</a>
															</div>

															 <div style="width: 695px; float: left; text-align: center; font-size: 15px; font-weight: bold;" class="f_grey" id="dvSystolicMonthYearCaptionYearly">&nbsp;</div>
															
															<div style="width: 22px; float: left; height: 22px;">
																<a style="cursor:pointer;" onclick="javascript:GetChartDetails('systolicYearly','Next')">
																	<img src="<?php echo $strHostName?>/images/next_md_paging.png" />
																</a>
															</div>
														</div>
														<div class="DvFloat" style="padding-top: 5px;"  id="Systolic_ChartYearly"> 
															&nbsp;
														</div>
													  </div>
												</div>
										  </div>
								</div>
							</div>
                          </div>
                        </div>
                      </div>
                      <div class="dvFloat"  style="display:<?php if($_SESSION['UserType']!="Doctor"  && $_SESSION['UserType']!="MD" && $_SESSION['UserType']!="Nutritionist"){ echo "";} else { echo "none"; } ?>"> 
                   <?php include "view_files/blood_pressure.inc.php";?>
                   </div>
                  </div>
                  <div id="tabs2" class="tabcontent">
                     madhu
                  </div>
                  <div id="tabs3" class="tabcontent">
                    madhu1
                  </div>
                  <div id="tabs4" class="tabcontent">
					madhu2
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

 


<script type="text/javascript">

 


var countries=new ddtabcontent("tabstabs");
countries.setpersist(true);
countries.setselectedClassTarget("link"); //"link" or "linkparent"
countries.init();

var countries1=new ddtabcontent("tabstabs1");
countries1.setpersist(true);
countries1.setselectedClassTarget("link"); //"link" or "linkparent"
countries1.init();



var countries2=new ddtabcontent("tabstabs2");
countries2.setpersist(true);
countries2.setselectedClassTarget("link"); //"link" or "linkparent"
countries2.init();

var countriesa=new ddtabcontent("tabstabsa");
countriesa.setpersist(true);
countriesa.setselectedClassTarget("link"); //"link" or "linkparent"
countriesa.init();




</script>

<script>//RetriveReocrds_DailyTracking('Blood_Pressure','dvBlood_Pressure');

GetChartDetails('diastolic','');
</script>
<script>
/*Pres_Report_Show_Hide();
Intake_Reminder_Show_Hide();
Purchase_Reminder_Show_Hide();
Daily_Frequency_enabledisable();*/
</script>
