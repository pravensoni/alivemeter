<?php include 'includes/common.inc.php'?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Alivemeter</title>
<?php include 'includes/links.php'?>
<script type="text/javascript"> $.noConflict();</script>
<link href="style/main.css" rel="stylesheet" type="text/css">
<script type="text/javascript"  language="javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript"  language="javascript" src="js/jquery.jcarousel.min.js"></script>
<script language="JavaScript" src="js/PopUp.js" type="text/javascript"></script>

<style type="text/css">
#dd_nav{
	list-style:none;	
	float:right;
	width:247px;
	position:absolute;
	z-index:1;
	margin-top:0px;
	margin-left: 433px;
	border:solid 0px red;line-height:20px;
	
}
#dd_nav li {
	float:left;
	margin-right:10px;
	position:relative;
}
#dd_nav a {
	display:block;
	padding: 0px 0px 0px 12px;
	color:#fff;
	text-decoration:none;
}
#dd_nav a:hover {
	color:#fff;
}
#dd_nav ul {
	list-style:none;
	position:absolute;
	left:-9999px;
}
#dd_nav ul li {
	padding-top:1px;
	float:none;
	padding-left:5px;
}
#dd_nav ul a {
	white-space:nowrap;
}
#dd_nav li:hover ul {
	left:0;
}
#dd_nav li:hover a {
	text-decoration:none;
}
#dd_nav li:hover ul a {
	text-decoration:none;
}
#dd_nav li:hover ul li a:hover {
/ background:#333;
}
</style>

<style type="text/css">
.hover {
	position:absolute;
	padding-left: 5px;
}
.tooltip { /* hide and position tooltip */
	background-image:url(images/nutritionist/popup_img.png);
	background-repeat:no-repeat;
	color: 000;
	opacity:0;
	position:absolute;
	-webkit-transition: opacity 0.5s;
	-moz-transition: opacity 0.5s;
	-ms-transition: opacity 0.5s;
	-o-transition: opacity 0.5s;
	transition: opacity 0.5s;
	width: 483px;
	height: 178px;
	z-index:1;
	margin: -100px 0px 0px 20px;
	padding: 19px 0px 0px 29px;
	text-align: left;
}
.hover:hover .tooltip { /* display tooltip on hover */
	opacity:1;
}
</style>
<link href="css/skin.css" rel="stylesheet" type="text/css"/>
<script>
	
	function GetSubTabs()
	{
	
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
					document.getElementById("divtab8").innerHTML = xmlhttp.responseText;
					
				}
			}
			
				xmlhttp.open("GET","sub_tabs.html",true);
				xmlhttp.send();
			
	
	}
</script>

<link rel="stylesheet" type="text/css" href="style/health_dashboard_tabcontent.css" />
<script type="text/javascript" src="js/tabcontent.js"></script>
<link href="style/reset.css" rel="stylesheet" type="text/css">
<link href="style/fonts.css" rel="stylesheet" type="text/css">
<link href="style/bhupali.css" rel="stylesheet" type="text/css">
<link href="style/bxslider.css" rel="stylesheet" type="text/css">
<link href="style/paging_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" language="javascript" src="js/scrolltopcontrol.js"></script>
<link href="style/bhupali.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link href="style/jupiter.css" rel="stylesheet" type="text/css">
<link href="style/calendar.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/cal.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$(".trigger").click(function(){
$(".panel").toggle("fast");
$(this).toggleClass("active");
return false;
});
});
</script>
<style>
b {
	font-weight:bold
}
</style>
<script type="text/javascript">
jQuery(document).ready(function () {
	
	$('input.one').simpleDatepicker({ startdate: 1900, enddate: 2050 });
	$('input.two').simpleDatepicker({ startdate: 2008, enddate: 2012 });
	$('input.three').simpleDatepicker({ chosendate: '9/9/2010', startdate: '6/10/2008', enddate: '7/20/2011' });
	$('input.four').simpleDatepicker({ x: 45, y: 3 });
});
</script>
<script>
	
	function GetSubTabs()
	{
	
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
					document.getElementById("divtab8").innerHTML = xmlhttp.responseText;
					
				}
			}
			
				xmlhttp.open("GET","sub_tabs.html",true);
				xmlhttp.send();
			
	
	}
</script>

<link rel="stylesheet" href="css/example.css" type="text/css">
<link rel="stylesheet" href="css/dropkick.css" type="text/css">
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/jquery.dropkick-1.0.0.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8">
	$(function () {
	  $('.existing_event').dropkick({
		change: function () {
		  $(this).change();
		}
	  });
	});
</script>

</head>
<body>
<?php include 'includes/top.php'?>

<section>
  <div class="top_ou">
    <div class="top_in" style="border: solid 0px #000066;">
      <div class="top">
        <div class="cal_12">
          <div class="DvFloat" style="border-bottom: solid 1px #e4e4e4; margin:30px 0px 15px 0px;">
            <h1 class="f_red" style="text-align: left; font-size: 18px; font-weight:bold;  margin-bottom: 7px;">Patient Details</h1>
          </div>
          <div class="DvFloat">
            <div class="adviceonline_md">
              <div class="DvFloat">
                <div class="DvFloat">
                  <div class="photoareabg">
                    <div class="nutritionistphoto"> <img src="images/nutritionist_photo.png" alt="" title="" border="0"> </div>
                  </div>
                  <div class="nutritionistright">
                    <div class="DvFloat">
                      <div class="DvFloat f_grey" style="font-size: 18px;">Kumar Amit</div>
                      <div class="f_grey welcomedv">
                        <div class="DvFloat">
                          <div style="width: 25%; float: left;"><span style="font-weight: bold;">Sex:</span></div>
                          <div style="width: 25%; float: left;">Male</div>
                          <div style="width: 25%; float: left;"><span style="font-weight: bold;">Profession:</span></div>
                          <div style="width: 25%; float: left;">dsafs  fddfds</div>
                          <div style="width: 25%; float: left;"><span style="font-weight: bold;">Age:</span></div>
                          <div style="width: 25%; float: left;">26 years</div>
                          <div style="width: 25%; float: left;"><span style="font-weight: bold;">Company:</span></div>
                          <div style="width: 25%; float: left;">Accord Fintech Pvt Ltd</div>
                          <div style="width: 25%; float: left;"><span style="font-weight: bold;">Blood Group:</span></div>
                          <div style="width: 25%; float: left;">B+</div>
                          <div style="width: 25%; float: left;"><span style="font-weight: bold;">Designation: </span></div>
                          <div style="width: 25%; float: left;">Quality Analyst</div>
                          <div style="width: 25%; float: left;"><span style="font-weight: bold;">Height: </span></div>
                          <div style="width: 25%; float: left;">165</div>
                          <div style="width: 25%; float: left;"><span style="font-weight: bold;">Daily Travel Time: </span></div>
                          <div style="width: 25%; float: left;">5:5</div>
                          <div style="width: 25%; float: left;"><span style="font-weight: bold;">Weight: </span></div>
                          <div style="width: 25%; float: left;">65</div>
                          <div style="width: 25%; float: left;"><span style="font-weight: bold;">Travel Mode: </span></div>
                          <div style="width: 25%; float: left;">Public Transport</div>
                        </div>
                      </div>
                    </div>
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
<section>
  <div class="cal_full_size">
    <div class="cal_12 m_outo">
      <div class="dvFloat">
        <div class="dvWrapper">
          
          
          <div class="DvFloat" style="border-bottom: solid 1px #e4e4e4; margin:30px 0px 15px 0px">
            <h1 class="f_red" style="text-align: left; font-size: 18px; font-weight:bold;  margin-bottom: 7px;">Patient Query Details</h1>
          </div>
          <div style="width:100%; border:solid 0px red;">
            <div class="dvFloat formpadding1" style="padding-top:0px;">
              <div class="formlabel1">
                <div style="float: left; padding-left: 10px;">Query Type </div>
              </div>
              <div class="formcontrol21"> Fresh </div>
            </div>
            <div class="dvFloat formpadding1">
              <div class="formlabel1">
                <div style="float: left; padding-left: 10px;">Body Area <span class="redtxt">*</span></div>
              </div>
              <div class="formcontrol21">Abdomen & Pelvis</div>
            </div>
            <div class="dvFloat formpadding1">
              <div class="formlabel1">
                <div style="float: left; padding-left: 10px;">Complaint <span class="redtxt">*</span></div>
              </div>
              <div class="formcontrol21">This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus </div>
            </div>
            <div class="dvFloat formpadding1">
              <div class="formlabel1">
                <div style="float: left; padding-left: 10px;">Symptoms </div>
              </div>
              <div class="formcontrol21">Bleeding sore      Burning pain       Arm numbness       Bleeding mole or sore      Bone pain      
                Brittle, crumbly or ragged nail</div>
            </div>
            <div class="dvFloat formpadding1">
              <div class="formlabel1">
                <div style="float: left; padding-left: 10px;">How often you suffer from this Medical Problem ?<span class="redtxt">*</span> </div>
              </div>
              <div class="formcontrol21">Frequently</div>
            </div>
            <div class="dvFloat formpadding1">
              <div class="formlabel1">
                <div style="float: left; padding-left: 10px;">Last Ocurrency of Problem ?<span class="redtxt">*</span> </div>
              </div>
              <div class="formcontrol21">
                <div style="float:left; padding:0px 5px 0px 0px">26-Dec-2013</div>
              </div>
            </div>
            <div class="dvFloat formpadding1">
              <div class="formlabel1">
                <div style="float: left; padding-left: 10px;">Doctor Consulted of problem (if any?)<span class="redtxt">*</span> </div>
              </div>
              <div class="formcontrol21" style="float:left; text-align:left">
                <div style="float:left">True</div>
              </div>
            </div>
            <div class="dvFloat formpadding1">
              <div class="formlabel1">
                <div style="float: left; padding-left: 10px;">Doctor Name<span class="redtxt">*</span> </div>
              </div>
              <div class="formcontrol21">Sahana shetty</div>
            </div>
            <div class="dvFloat formpadding1">
              <div class="formlabel1">
                <div style="float: left; padding-left: 10px;">Doctor Comment<span class="redtxt">*</span> </div>
              </div>
              <div class="formcontrol21">Take the previous prescribed medicene on time</div>
            </div>
            <div class="dvFloat formpadding1">
              <div class="formlabel1">
                <div style="float: left; padding-left: 10px;">Attached report<span class="redtxt">*</span> </div>
              </div>
              <div class="formcontrol21">
                <div class="dvFloat"> <img src="images/action.jpg" alt="" align="absmiddle" />&nbsp;<b>16-Nov-2013:</b> Prescription<br>
                  <img src="images/action.jpg" alt="" align="absmiddle" />&nbsp;<b> 12-Nov-2013:</b> Lab<br>
                  <img src="images/action.jpg" alt="" align="absmiddle" />&nbsp;<b> 11-Nov-2013:</b> Prescription<br>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="DvFloat" style="border-bottom: solid 1px #e4e4e4;border-top: solid 0px #e4e4e4; margin:0px 0px 30px 0px">
          <h1 class="f_red" style="text-align: left; font-size: 18px; font-weight:bold;  margin: 7px;">Patient Complete Details</h1>
        </div>
        <div class="DvFloat" style="padding:0px 0px">
          <div class="health_dashboard_div_left">
            <div class="dvFloat">
              <div style="float:left; padding:0px 0px 10px 0px;"> <a href="health_dash_board_medication.html"><img src="images/nutritionist/medication.jpg" alt=""></a> </div>
            </div>
            <div class="dvFloat">
              <div style="float:left; padding:0px 0px 10px 0px;"> <a href="health_dash_board_hospitalization.html"><img src="images/nutritionist/hospitalization.jpg" alt=""></a> </div>
            </div>
            <div class="dvFloat">
              <div style="float:left; padding:0px 0px 10px 0px;"> <a href="health_dash_board_immunization.html"><img src="images/nutritionist/immunization.jpg" alt=""></a> </div>
            </div>
            <div class="dvFloat">
              <div style="float:left; padding:0px 0px 10px 0px;"> <a href="health_dash_board_health_problem.html"><img src="images/nutritionist/health_problems.jpg" alt=""></a> </div>
            </div>
            <div class="dvFloat">
              <div style="float:left; padding:0px 0px 10px 0px;"> <a href="health_dash_board_medication.html"><img src="images/nutritionist/daily_tracking_h.jpg" alt=""></a> </div>
            </div>
          </div>
          <div class="health_dashboard_div_right">
            <div class="DvFloat">
              <div class="DvFloat">
                <div class="DvFloat" style="padding-top:	0px;"> <span class="f_green" style="font-size: 18px; font-weight: bold;">Your Daily Report Card</span> </div>
                <div class="DvFloat" style="padding: 15px 0px; border-bottom: solid 1px #c5c5c5;">
                  <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width: 207px; background-color: #fff; padding: 10px 0px 5px 0px; text-align: center;">&nbsp;</td>
                      <td class="dailyreport_sep"></td>
                      <td style="width: 100px; background-color: #f0f0f0; border-top: solid 1px #666666; border-left: solid 1px #666666; border-right: solid 1px #666666; background-color: #656565; color: #FFFFFF; font-size: 11px; text-transform: uppercase; text-align: center;">Avg range</td>
                      <td class="dailyreport_sep"></td>
                      <td style="width: 100px; background-color: #f0f0f0; border-top: solid 1px #666666; border-left: solid 1px #666666; border-right: solid 1px #666666; background-color: #656565; color: #FFFFFF; font-size: 11px; text-transform: uppercase; text-align: center;">ACTUAL</td>
                      <td class="dailyreport_sep"></td>
                      <td style="width: 100px; background-color: #f0f0f0; border-top: solid 1px #666666; border-left: solid 1px #666666; border-right: solid 1px #666666; background-color: #656565; color: #FFFFFF; font-size: 11px; text-transform: uppercase; text-align: center;">Date Recorded</td>
                      <td class="dailyreport_sep"></td>
                      <td style="width: 240px; background-color: #fff;">&nbsp;</td>
                    </tr>
                    <tr>
                      <td class="nutri_dailyreport_box1"><img src="images/nutritionist/minus_icon.png" alt="" title="" border="0" style="border: solid 0px #000; padding-right: 10px;"><span class="f_grey" style="font-size: 13px;">Blood Pressure</span></td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box2">117</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box3"> 117 </td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box4" style="text-align: center; line-height: 14px;">117</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box5">
                      	<div style="width: 234px; height: 38px; float: left; background-image: url(images/nutritionist/grey_line.png); background-repeat: repeat-x; padding: 0px; border: solid 0px #000000;">
                                                                        	<div style="width: 129px; height: 22px; float: left; background-color: #f0f0f0; padding:8px 0px;">&nbsp;</div>
                                                                            <div style="width: 167px; float: left; height: 12px; background-color: #99cc00; margin: 13px 0px 0px 0px;
    position: absolute;"></div>
                                                                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="8" style="background-color: #FFFFFF; height: 4px;"></td>
                    </tr>
                    <tr>
                      <td class="nutri_dailyreport_box1"><img src="images/nutritionist/minus_icon.png" alt="" title="" border="0" style="border: solid 0px #000; padding-right: 10px;"><span class="f_grey" style="font-size: 13px;">Fasting Blood Sugar</span></td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box2">256</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box3">256</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box4" style="text-align: center; line-height: 14px;">256</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box5"><div style="width: 234px; height: 38px; float: left; background-image: url(images/nutritionist/grey_line.png); background-repeat: repeat-x; padding: 0px; border: solid 0px #000000;">
                                                                        	<div style="width: 114px; height: 22px; float: left; background-color: #f0f0f0; padding:8px 0px;">&nbsp;</div>
                                                                            <div style="width: 91px; float: left; height: 12px; background-color: #99cc00; margin: 13px 0px 0px 0px;
    position: absolute;"></div>
                                                                        </div></td>
                    </tr>
                    <tr>
                      <td colspan="8" style="background-color: #FFFFFF; height: 4px;"></td>
                    </tr>
                    <tr>
                      <td class="nutri_dailyreport_box1"><img src="images/nutritionist/minus_icon.png" alt="" title="" border="0" style="border: solid 0px #000; padding-right: 10px;"><span class="f_grey" style="font-size: 13px;">Blood Sugar After Meal (PPBS)</span></td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box2">110</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box3">110</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box4" style="text-align: center; line-height: 14px;">110</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box5"><div style="width: 234px; height: 38px; float: left; background-image: url(images/nutritionist/grey_line.png); background-repeat: repeat-x; padding: 0px; border: solid 0px #000000;"><div style="width: 140px; height: 22px; float: left; background-color: #f0f0f0; padding:8px 0px;">&nbsp;</div><div style="width: 151px; float: left; height: 12px; background-color: #99cc00; margin: 13px 0px 0px 0px; position: absolute;"></div></div></td>
                    </tr>
                    <tr>
                      <td colspan="8" style="background-color: #FFFFFF; height: 4px;"></td>
                    </tr>
                    <tr>
                      <td class="nutri_dailyreport_box1"><img src="images/nutritionist/minus_icon.png" alt="" title="" border="0" style="border: solid 0px #000; padding-right: 10px;"><span class="f_grey" style="font-size: 13px;">Random Blood Sugar</span></td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box2">235</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box3">235</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box4" style="text-align: center; line-height: 14px;">235</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box5"><div style="width: 234px; height: 38px; float: left; background-image: url(images/nutritionist/grey_line.png); background-repeat: repeat-x; padding: 0px; border: solid 0px #000000;">
                                                                        	<div style="width: 129px; height: 22px; float: left; background-color: #f0f0f0; padding:8px 0px;">&nbsp;</div>
                                                                            <div style="width: 123px; float: left; height: 12px; background-color: #99cc00; margin: 13px 0px 0px 0px;
    position: absolute;"></div>
                                                                        </div></td>
                    </tr>
                    <tr>
                      <td colspan="8" style="background-color: #FFFFFF; height: 4px;"></td>
                    </tr>
                    <tr>
                      <td class="nutri_dailyreport_box1"><img src="images/nutritionist/minus_icon.png" alt="" title="" border="0" style="border: solid 0px #000; padding-right: 10px;"><span class="f_grey" style="font-size: 13px;">Urine Blood Sugar </span></td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box2">689</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box3">689</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box4" style="text-align: center; line-height: 14px;">689 </td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box5"><div style="width: 234px; height: 38px; float: left; background-image: url(images/nutritionist/grey_line.png); background-repeat: repeat-x; padding: 0px; border: solid 0px #000000;">
                                                                        	<div style="width: 114px; height: 22px; float: left; background-color: #f0f0f0; padding:8px 0px;">&nbsp;</div>
                                                                            <div style="width: 146px; float: left; height: 12px; background-color: #99cc00; margin: 13px 0px 0px 0px;
    position: absolute;"></div>
                                                                        </div></td>
                    </tr>
                    <tr>
                      <td colspan="8" style="background-color: #FFFFFF; height: 4px;"></td>
                    </tr>
                    <tr>
                      <td class="nutri_dailyreport_box1"><img src="images/nutritionist/minus_icon.png" alt="" title="" border="0" style="border: solid 0px #000; padding-right: 10px;"><span class="f_grey" style="font-size: 13px;">Cholesterol </span></td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box2">987</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box3">987</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box4" style="text-align: center; line-height: 14px;">987 </td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box5"><div style="width: 234px; height: 38px; float: left; background-image: url(images/nutritionist/grey_line.png); background-repeat: repeat-x; padding: 0px; border: solid 0px #000000;">
                                                                        	<div style="width: 140px; height: 22px; float: left; background-color: #f0f0f0; padding:8px 0px;">&nbsp;</div>
                                                                            <div style="width: 97px; float: left; height: 12px; background-color: #99cc00; margin: 13px 0px 0px 0px;
    position: absolute;"></div>
                                                                        </div></td>
                    </tr>
                    <tr>
                      <td colspan="8" style="background-color: #FFFFFF; height: 4px;"></td>
                    </tr>
                    <tr>
                      <td class="nutri_dailyreport_box1"><img src="images/nutritionist/minus_icon.png" alt="" title="" border="0" style="border: solid 0px #000; padding-right: 10px;"><span class="f_grey" style="font-size: 13px;">Triglyceride</span></td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box2">563</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box3">563</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box4" style="text-align: center; line-height: 14px;">563 </td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box5"><div style="width: 234px; height: 38px; float: left; background-image: url(images/nutritionist/grey_line.png); background-repeat: repeat-x; padding: 0px; border: solid 0px #000000;">
                            <div style="width: 129px; height: 22px; float: left; background-color: #f0f0f0; padding:8px 0px;">&nbsp;</div>
                            <div style="width: 145px; float: left; height: 12px; background-color: #99cc00; margin: 13px 0px 0px 0px; position: absolute;"></div>
                        </div></td>
                    </tr>
                    <tr>
                      <td colspan="8" style="background-color: #FFFFFF; height: 4px;"></td>
                    </tr>
                    <tr>
                      <td class="nutri_dailyreport_box1"><img src="images/nutritionist/minus_icon.png" alt="" title="" border="0" style="border: solid 0px #000; padding-right: 10px;"><span class="f_grey" style="font-size: 13px;">HDL</span></td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box2">112</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box3">112</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box4" style="text-align: center; line-height: 14px;">112 </td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box5"><div style="width: 234px; height: 38px; float: left; background-image: url(images/nutritionist/grey_line.png); background-repeat: repeat-x; padding: 0px; border: solid 0px #000000;">
                            <div style="width: 114px; height: 22px; float: left; background-color: #f0f0f0; padding:8px 0px;">&nbsp;</div>
                            <div style="width: 81px; float: left; height: 12px; background-color: #99cc00; margin: 13px 0px 0px 0px; position: absolute;"></div>
                        </div></td>
                    </tr>
                    <tr>
                      <td colspan="8" style="background-color: #FFFFFF; height: 4px;"></td>
                    </tr>
                    <tr>
                      <td class="nutri_dailyreport_box1"><img src="images/nutritionist/minus_icon.png" alt="" title="" border="0" style="border: solid 0px #000; padding-right: 10px;"><span class="f_grey" style="font-size: 13px;">LDL</span></td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box2">1547</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box3">1547</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box4" style="text-align: center; line-height: 14px;">1547 </td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box5"><div style="width: 234px; height: 38px; float: left; background-image: url(images/nutritionist/grey_line.png); background-repeat: repeat-x; padding: 0px; border: solid 0px #000000;">
                            <div style="width: 140px; height: 22px; float: left; background-color: #f0f0f0; padding:8px 0px;">&nbsp;</div>
                            <div style="width: 144px; float: left; height: 12px; background-color: #99cc00; margin: 13px 0px 0px 0px; position: absolute;"></div>
                        </div></td>
                    </tr>
                    <tr>
                      <td colspan="8" style="background-color: #FFFFFF; height: 4px;"></td>
                    </tr>
                    <tr>
                      <td class="nutri_dailyreport_box1"><img src="images/nutritionist/minus_icon.png" alt="" title="" border="0" style="border: solid 0px #000; padding-right: 10px;"><span class="f_grey" style="font-size: 13px;">Cigerette</span></td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box2">58936</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box3">58936</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box4" style="text-align: center; line-height: 14px;">58936 </td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box5"><div style="width: 234px; height: 38px; float: left; background-image: url(images/nutritionist/grey_line.png); background-repeat: repeat-x; padding: 0px; border: solid 0px #000000;">
                            <div style="width: 129px; height: 22px; float: left; background-color: #f0f0f0; padding:8px 0px;">&nbsp;</div>
                            <div style="width: 107px; float: left; height: 12px; background-color: #99cc00; margin: 13px 0px 0px 0px; position: absolute;"></div>
                        </div></td>
                    </tr>
                    <tr>
                      <td colspan="8" style="background-color: #FFFFFF; height: 4px;"></td>
                    </tr>
                    <tr>
                      <td class="nutri_dailyreport_box1"><img src="images/nutritionist/minus_icon.png" alt="" title="" border="0" style="border: solid 0px #000; padding-right: 10px;"><span class="f_grey" style="font-size: 13px;">Beer</span></td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box2">89</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box3">89</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box4" style="text-align: center; line-height: 14px;">89 </td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box5"><div style="width: 234px; height: 38px; float: left; background-image: url(images/nutritionist/grey_line.png); background-repeat: repeat-x; padding: 0px; border: solid 0px #000000;">
                            <div style="width: 114px; height: 22px; float: left; background-color: #f0f0f0; padding:8px 0px;">&nbsp;</div>
                            <div style="width: 133px; float: left; height: 12px; background-color: #99cc00; margin: 13px 0px 0px 0px; position: absolute;"></div>
                        </div></td>
                    </tr>
                    <tr>
                      <td colspan="8" style="background-color: #FFFFFF; height: 4px;"></td>
                    </tr>
                    <tr>
                      <td class="nutri_dailyreport_box1"><img src="images/nutritionist/minus_icon.png" alt="" title="" border="0" style="border: solid 0px #000; padding-right: 10px;"><span class="f_grey" style="font-size: 13px;">Spirit</span></td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box2">0.12</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box3">0.12</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box4" style="text-align: center; line-height: 14px;">0.12</td>
                      <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box5"><div style="width: 234px; height: 38px; float: left; background-image: url(images/nutritionist/grey_line.png); background-repeat: repeat-x; padding: 0px; border: solid 0px #000000;">
                            <div style="width: 140px; height: 22px; float: left; background-color: #f0f0f0; padding:8px 0px;">&nbsp;</div>
                            <div style="width: 154px; float: left; height: 12px; background-color: #99cc00; margin: 13px 0px 0px 0px; position: absolute;"></div>
                        </div></td>
                    </tr>
                    <tr>
                      <td colspan="8" style="background-color: #FFFFFF; height: 4px;"></td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="DvFloat" style="padding-top: 20px;">
                <div class="DvFloat">
                  <div class="DvFloat">
                    <div style="width: 49%; float: left;"><span class="f_green" style="font-size: 18px; font-weight: bold;">Your Calorie Chart</span></div>
                    <!--<div style="width: 49%; float: left; text-align: right;"><img src="images/shair_icon.gif" alt="" title="" border="0" style="border: solid 0px #000000;"></div>-->
                  </div>
                  <div class="DvFloat" style="padding-bottom:0px;">
                    <div style="width: 61%; float: left; padding-top: 20px; border: solid 0px #000000;">
                      <div class="TabDv">
                        <div>
                          <ul id="tabstabs" class="shadetabs">
                            <li  class="selected"><a href="#" rel="tabs1" class="selected" >1 WEEK</a></li>
                            <li><a href="#" rel="tabs2"  >1 MONTH</a></li>
                            <li><a href="#" rel="tabs3">1 year</a></li>
                          </ul>
                        </div>
                        <div class="TabContentDetails">
                          <div id="tabs1" class="tabcontent">
                            <div style="width:760px; border:solid 0px red;" id="divtab8">
                              <div  style="width:755px; border:solid 0px red;margin-left:5px;">
                                <div class="DvFloat">
                                  <div class="DvFloat" style="padding: 15px 0px; border-bottom: solid 1px #c5c5c5;">
                                    <div class="DvFloat">
                                      <div style="width: 22px; float: left; height: 22px; background-image: url(images/prev_md_paging.png); background-repeat: no-repeat;"></div>
                                      <div style="width: 695px; float: left; text-align: center; font-size: 15px; font-weight: bold;" class="f_grey">27 Jan - 2 Feb 2014</div>
                                      <div style="width: 22px; float: left; height: 22px; background-image: url(images/next_md_paging.png); background-repeat: no-repeat;"></div>
                                    </div>
                                    <div class="DvFloat" style="padding-top: 5px;"> <img src="images/nutritionist/chart.jpg" alt="" title="" border="0"> </div>
                                  </div>
                                </div>
                              </div>
                              <div class="DvFloat" style="padding: 15px 0px; border-bottom: solid 1px #c5c5c5;">
                                <div class="DvFloat"> <span class="f_green" style="font-size: 18px; font-weight: bold;">Active Medication Status</span> </div>
                                <div class="DvFloat" style="padding-top: 10px;">
                                  <table width="100%" border="0" cellspacing="4" cellpadding="4">
                                    <tr>
                                      <td class="nutri_tdgreybg1">MEDICINE</td>
                                      <td class="nutri_tdgreybg2">Dosage</td>
                                      <td class="nutri_tdgreybg3">Duration<br>
                                        (IN A Day)</td>
                                      <td class="nutri_tdgreybg4">Health Problem </td>
                                      <td class="nutri_tdgreybg5">Intake<br>
                                        Reminder</td>
                                      <td  class="nutri_tdgreybg6">Purchase<br>
                                        Reminder</td>
                                    </tr>
                                    <tr>
                                      <td class="nutri_tdlightgreybg1">disprin</td>
                                      <td class="nutri_tdlightgreybg2">1</td>
                                      <td class="nutri_tdlightgreybg3">3</td>
                                      <td class="nutri_tdlightgreybg4">This is Photoshop's version  of Lorem </td>
                                      <td class="nutri_tdlightgreybg5">3</td>
                                      <td  class="nutri_tdlightgreybg6">3</td>
                                    </tr>
                                    <tr>
                                      <td class="nutri_tdlightgreybg1">Crocin Cough Syrup</td>
                                      <td class="nutri_tdlightgreybg2">1 spoon</td>
                                      <td class="nutri_tdlightgreybg3">4</td>
                                      <td class="nutri_tdlightgreybg4">This is Photoshop's version  of Lorem </td>
                                      <td class="nutri_tdlightgreybg5">4</td>
                                      <td  class="nutri_tdlightgreybg6">4</td>
                                    </tr>
                                  </table>
                                </div>
                              </div>
                              <div class="DvFloat" style="padding-top:20px"> <span class="f_green" style="font-size: 18px; font-weight: bold;">Medical reports  and Presscription </span> </div>
                              <div class="DvFloat">
                                <div class="TabDv">
                                  <div  style="padding:10px 0px;">
                                    <ul id="tabstabs1" class="shadetabs1">
                                      <li ><a href="#" rel="tabs1a"> Lab Reports </a></li>
                                      <li><a href="#" rel="tabs2b"> Radiology Reports</a></li>
                                      <li><a href="#" rel="tabs3b">Presscription</a></li>
                                    </ul>
                                  </div>
                                  <div class="TabContentDetails">
                                    <div id="tabs1a" class="tabcontent">
                                      <div class="DvFloat" style="padding:10px 0px">
                                        <table width="100%" border="0" cellspacing="4" cellpadding="4">
                                          <tr>
                                            <td style="width: 13%;" class="nutri_tdgreybg1">Report Date </td>
                                            <td style="width: 38%;" class="nutri_tdgreybg2">Test Name</td>
                                            <td style="width: 40%;" class="nutri_tdgreybg3">Health Problem </td>
                                            <td style="width: 10%;" class="nutri_tdgreybg4">actions </td>
                                          </tr>
                                          <tr>
                                            <td class="nutri_tdlightgreybg1">04-Mar-2010 </td>
                                            <td style="text-align: left; padding-left: 10px;" class="nutri_tdlightgreybg2">This is Photoshop's version</td>
                                            <td style="text-align: left; padding-left: 10px;" class="nutri_tdlightgreybg3">This is Photoshop's version  of Lorem </td>
                                            <td style="text-align: center;" class="nutri_tdlightgreybg4"><img src="images/nutritionist_action_icon.jpg" alt="" title="" border="0"></td>
                                          </tr>
                                          <tr>
                                            <td class="nutri_tdlightgreybg1">04-Mar-2010 </td>
                                            <td style="text-align: left; padding-left: 10px;" class="nutri_tdlightgreybg2">This is Photoshop's version</td>
                                            <td style="text-align: left; padding-left: 10px;" class="nutri_tdlightgreybg3">This is Photoshop's version  of Lorem </td>
                                            <td style="text-align: center;" class="nutri_tdlightgreybg4"><img src="images/nutritionist_action_icon.jpg" alt="" title="" border="0"></td>
                                          </tr>
                                        </table>
                                      </div>
                                    </div>
                                    <div id="tabs2b" class="tabcontent">
                                      <div  style="width:755px; border:solid 0px red;margin-left:5px;"></div>
                                    </div>
                                    <div id="tabs3b" class="tabcontent">
                                      <div  style="width:755px; border:solid 0px red;margin-left:5px;"></div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div id="tabs2" class="tabcontent"> tabs3 </div>
                          <div id="tabs3" class="tabcontent"> tabs3 </div>
                        </div>
                      </div>
                    </div>
                    <div style="width: 37%; float: right; text-align: right; padding-top: 12px;">
                      <div class="DvFloat">
                        <div style="width: 100px; float: left; padding-top: 6px;" class="f_black">Chose a report</div>
                        <div style="width: 190px; float: right; text-align: left; border: solid 0px #000000;" class="f_black">
                          <select  id="choseareport" name="choseareport" tabindex="1" class="existing_event" style="width: 130px;">
                            <option value="Select">Excercise Minutes</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
          <div class="DvFloat" style="border-bottom: solid 0px #e4e4e4;border-top: solid 0px #e4e4e4; margin:10px 0px 0px 0px">
          <h1 class="f_red" style="text-align: left; font-size: 18px; font-weight:bold;  margin: 7px;">Doctor Advice</h1>
        </div>
        <div class="DvFloat" style="margin-bottom:0px;">
          <table class="tablecont" cellpadding="2" cellspacing="1" width="100%" border="0">
            <tbody>
              
              <tr>
                <td class="dargery" style="width:150px;"> Sent On </td>
                <td class="dargreen" style="width:250px;"> Advice </td>
                <td class="dargreen" style="width:250px;"> Internal Doctor Advice </td>
              </tr>
              <tr>
                <td class="ligery" style="text-align:left;">26-Dec-2013 14:39:55</td>
                <td class="ligreen" style="text-align:left;"><div class="LongText">hi
                    
                    Take 
                    Painkiller
                    
                    Crocin
                    
                    Disprin </div></td>
                <td class="ligreen" style="text-align:left;"><div class="LongText">Na</div></td>
              </tr>
              <tr>
                <td class="ligery" style="text-align:left;">26-Dec-2013 14:41:01</td>
                <td class="ligreen" style="text-align:left;"><div class="LongText">md
                    
                    
                    Test mail
                    
                    **************End Of Mail*****************</div></td>
                <td class="ligreen" style="text-align:left;"><div class="LongText"> *****************NA*************************</div></td>
              </tr>
              <tr>
                <td class="ligery" style="text-align:left;">06-Feb-2014 10:33:16</td>
                <td class="ligreen" style="text-align:left;"><div class="LongText">test</div></td>
                <td class="ligreen" style="text-align:left;"><div class="LongText">test</div></td>
              </tr>
            </tbody>
          </table>
          
          
          
        </div>
        <div class="DvFloat" style="border-bottom: solid 0px #e4e4e4;border-top: solid 1px #e4e4e4; margin:10px 0px 0px 0px">
          <h1 class="f_red" style="text-align: left; font-size: 18px; font-weight:bold;  margin: 7px;">MD COMMENTS</h1>
        </div>
        <div class="DvFloat" style="margin-bottom:0px;">
          <div style="float:left; width:450px; border:solid 0px red;">
            <div class="DvFloat" style="padding:10px 0px"><b>Video Chat Date & Time </b></div>
            <div class="DvFloat" style="padding:10px 0px">
              <div class="dvFloat">
                      <div style="float:left; padding:0px 15px 15px 0px;">
                        <select id="calorie_cmb_Date" name="calorie_cmb_Date" tabindex="1" class="existing_event" style="width: 4px;">
                          <option value="DD">DD</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                          <option>6</option>
                          <option>7</option>
                          <option>8</option>
                          <option>9</option>
                          <option>10</option>
                          <option>11</option>
                          <option>12</option>
                          <option>13</option>
                          <option>14</option>
                          <option>15</option>
                          <option>16</option>
                          <option>17</option>
                          <option>18</option>
                          <option>19</option>
                          <option>20</option>
                          <option>21</option>
                          <option>22</option>
                          <option>23</option>
                          <option>24</option>
                          <option>25</option>
                          <option>26</option>
                          <option>27</option>
                          <option>28</option>
                          <option>29</option>
                          <option>30</option>
                          <option>31</option>
                        </select>
                      </div>
                      <div style="float:left; padding:0px 15px 15px 0px">
                        <select id="calorie_cmb_Month" name="calorie_cmb_Month" tabindex="1" class="existing_event" style="width:6px;">
                          <option value="MM">MM</option>
                          <option>1</option>
                          <option>2</option>
                          <option>3</option>
                          <option>4</option>
                          <option>5</option>
                          <option>6</option>
                          <option>7</option>
                          <option>8</option>
                          <option>9</option>
                          <option>10</option>
                          <option>11</option>
                          <option>12</option>
                        </select>
                      </div>
                      <div style="float:left; padding:0px 10px 15px 0px">
                        <select id="calorie_cmb_Year" name="calorie_cmb_Year" tabindex="1" class="existing_event" style="width: 15px;">
                          <option value="YYYY">YYYY</option>
                          <option>2006</option>
                          <option>2007</option>
                          <option>2008</option>
                          <option>2009</option>
                          <option>2014</option>
                          <option>2010</option>
                          <option>2011</option>
                          <option>2012</option>
                          <option>2013</option>
                          <option>2014</option>
                        </select>
                      </div>&nbsp;
                      <div style="float:left; padding:0px 10px 0px 0px">
                                <select id="chk_Daily_Frequency_HH_Morning" name="chk_Daily_Frequency_HH_Morning" tabindex="1" class="existing_event" style="width: 4px; opacity: 1;">
                                  <option value="HH">HH</option>
                                </select>
                              </div>
                              <div style="float:left; padding:0px 5px 0px 0px">
                                <select id="chk_Daily_Frequency_Min_Morning" name="chk_Daily_Frequency_Min_Morning" tabindex="1" class="existing_event" style="width: 5px; opacity: 1;">
                                  <option value="Min">Min</option>
                                </select>
                              </div>
                    </div>
            </div>
            <div class="DvFloat" style="padding:10px 0px"><b>Advice </b></div>
            <div class="DvFloat" style="padding:10px 0px">
              <textarea id="txt_Instruction_For_Medicine" name="txt_Doctor_Advice_MD"></textarea>
            </div>
            
             <div class="DvFloat">
            <div style=" width:165px; height:30px; float:left; padding-right:10px; padding-top:20px; padding-bottom: 20px;"><a style="cursor: pointer;" target="_parent" onClick="javascript:Popup.showModal('dvpopup-form_patient',null,null,{'screenColor':'#333333','screenOpacity':.6});" class="button4">SEND TO PATIENT</a></div></div>
          </div>
         
          <div style="float:left; width:480px; border:solid 0px red;">
            
           <div class="DvFloat">
            <div style=" width:170px; height:100px; float:left;padding-right:10px;"></div></div>
            <div class="DvFloat" style="padding:10px 0px"><b> For Internal Advice </b></div>
            <div class="DvFloat" style="padding:10px 0px">
              <textarea id="txt_Instruction_For_Medicine" name="txt_Internal_Doctor_Advice_patient"></textarea>
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
   <?php include 'includes/bottom.php'?>





<div id="dvpopup-form_patient" style="text-align: center; width: 780px;position:absoulte; margin:15px auto;  margin-left:25%; display:none ">
  <table cellpadding="0" cellspacing="0" border="0" width="400px" align="center">
    <tr>
      <td style="text-align:right; border:solid 0px red; float:right"><div style="margin: 5px 0px 0px -23px; position: absolute; text-align:right"> <a href="javascript:Popup.hide('dvpopup-form_patient');" target="_parent" style="text-decoration: none; color: #fff;"> <img src="images/close.png" alt="" title="" border="0" /> </a> </div></td>
    </tr>
    <tr>
      <td valign="top" align="center" style="padding: 10px 10px 10px 10px;"><div class="DvFloat">
          <div class="dvWhitePopup_Box">
            <table cellpadding="0" cellspacing="0" style="width:90%; border:solid 0px #000000">
              <tr>
                <td colspan="4" style="padding-bottom:15px;padding-left:20px;text-align:center"><h2 class="Tab_Title" style="color:#333333"> Your Comments have been sent to Patient </h2></td>
              </tr>
              <tr>
                <td  style="text-align:center; padding:0px 10px;vertical-align:middle"><div style=" width:250px; height:20px; float:left;padding-right:10px; font-size:13px;"> <a href="adviceonline_md_01.html" class="button" style="font-size:13px; line-height:25px">Click here to get queries</a></div>
                  <div style=" width:180px; height:30px; float:left;padding-right:10px;"> <a href="adviceonline_md_03.html" class="button2" style="font-size:13px;" >view old queries</a></div>
                  <div style=" width:100px; height:30px; float:left;padding-right:10px;"> <a href="doctor_01.html" class="button2" style="font-size:13px;">cancel</a></div></td>
              </tr>
            </table>
          </div>
        </div></td>
    </tr>
  </table>
</div>
<div id="dvpopup-form1" style="text-align: center; width: 780px;position:absoulte; margin:15px auto;  margin-left:25%; display:none ">
  <table cellpadding="0" cellspacing="0" border="0" width="400px" align="center">
    <tr>
      <td style="text-align:right; border:solid 0px red; float:right"><div style="margin: 5px 0px 0px -23px; position: absolute; text-align:right"> <a href="javascript:Popup.hide('dvpopup-form1');" target="_parent" style="text-decoration: none; color: #fff;"> <img src="images/close.png" alt="" title="" border="0" /> </a> </div></td>
    </tr>
    <tr>
      <td valign="top" align="center" style="padding: 10px 10px 10px 10px;"><div class="DvFloat">
          <div class="dvWhitePopup_Box">
            <table cellpadding="0" cellspacing="0" style="width:90%; border:solid 0px #000000">
              <tr>
                <td colspan="4" style="padding-bottom:15px;padding-left:20px;text-align:center"><h2 class="Tab_Title" style="color:#333333"> Your Comments have been sent to MD </h2></td>
              </tr>
              <tr>
                <td  style="text-align:center; padding:0px 10px;vertical-align:middle"><div style=" width:250px; height:20px; float:left;padding-right:10px; font-size:13px;"> <a href="adviceonline_md.html" class="button" style="font-size:13px; line-height:25px">Click here to get queries</a></div>
                  <div style=" width:180px; height:30px; float:left;padding-right:10px;"> <a href="adviceonline_md_03.html" class="button2" style="font-size:13px;" >view old queries</a></div>
                  <div style=" width:100px; height:30px; float:left;padding-right:10px;"> <a href="adviceonline_md_01.html" class="button2" style="font-size:13px;">cancel</a></div></td>
              </tr>
            </table>
          </div>
        </div></td>
    </tr>
  </table>
</div>

<script type="text/javascript" src="js/jquery.form-2.4.0.min.js"></script>
<script type="text/javascript" src="js/jqeasy.dropdown.min.js"></script>
</body>
</html>
