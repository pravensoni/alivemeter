<?php include 'includes/common.inc.php'?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Alivemeter</title>
<?php include 'includes/links.php'?>
<link rel="stylesheet" type="text/css" href="style/inbox_tabcontent.css" />
<script type="text/javascript" src="js/calorie_tabcontent.js"></script>
<link href="style/main.css" rel="stylesheet" type="text/css">
<link href="style/reset.css" rel="stylesheet" type="text/css">
<link href="style/fonts.css" rel="stylesheet" type="text/css">
<link href="style/bxslider.css" rel="stylesheet" type="text/css">
<link href="style/jupiter.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/lightbox.css" type="text/css" />
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
	background:#0;
}
#dd_nav1 {
	list-style:none;
	font-weight:normal;
	border:solid 0px red;
	float:right;
	width:90px;
	position:absolute;
	z-index:1;
	margin-top:0px;
}
#dd_nav1 li {
	float:left;
	position:relative;
}
#dd_nav1 a {
	display:block;
	padding: 0px 0px 0px 12px;
	color:#fff;
	background-color:#666666;
	text-decoration:none;
}
#dd_nav1 a:hover {
	color:#fff;
}
#dd_nav1 ul {
	list-style:none;
	position:absolute;
	left:-9999px;
}
#dd_nav1 ul li {
	padding-top:1px;
	float:none;
	padding-left:5px;
}
#dd_nav1 ul a {
	white-space:nowrap;
}
#dd_nav1 li:hover ul {
	left:0;
}
#dd_nav1 li:hover a {
	text-decoration:none;
}
#dd_nav1 li:hover ul a {
	text-decoration:none;
}
#dd_nav1 li:hover ul li a:hover {
}
#dd_nav2 {
	list-style:none;
	font-weight:normal;
	border:solid 0px red;
	float:right;
	width:100px;
	position:absolute;
	z-index:1;
}
#dd_nav2 li {
	float:left;
	position:relative;
}
#dd_nav2 a {
	display:block;
	padding: 6px 5px;
	color:#fff;
	text-decoration:none;
}
#dd_nav2 a:hover {
	color:#fff;
}
#dd_nav2 ul {
	list-style:none;
	position:absolute;
	left:-9999px;
}
#dd_nav2 ul li {
	float:none;
}
#dd_nav2 ul a {
	white-space:nowrap;
}
#dd_nav2 li:hover ul {
	left:0;
}
#dd_nav2 li:hover a {
	text-decoration:none;
}
#dd_nav2 li:hover ul a {
	text-decoration:none;
}
#dd_nav2 li:hover ul li a:hover {
}
</style>
<script language="JavaScript" src="js/PopUp.js" type="text/javascript"></script>
<script type="text/javascript">
var count = "500";

function limiter()
{
var tex = document.myform.comment.value;
var len = tex.length;
var limit = count-len;

if(len > count)
{
        tex = tex.substring(0,count);
        document.myform.comment.value =tex;
        return false;
}

document.myform.limit.value =limit;
}
</script>
<script type="text/javascript">
var count = "125";

function limiter1()
{
var tex = document.myform1.comment.value;
var len = tex.length;
var limit = count-len;

if(len > count)
{
        tex = tex.substring(0,count);
        document.myform.comment.value =tex;
        return false;
}

document.myform1.limit.value =limit;
}
</script>
<!--<script type="text/javascript" src="lib/jquery-1.10.1.min.js"></script>-->
<script type="text/javascript" src="lib/jquery.mousewheel-3.0.6.pack.js"></script>
<link type="text/css" rel="stylesheet" href="css/style.css" />
<link href="style/bhupali.css" rel="stylesheet" type="text/css">
<link href="style/paging_md.css" rel="stylesheet" type="text/css" />

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

<script>
	function Pres_Report_Show_Hide()
	{
		 document.getElementById("dvPres_Report_Show_Hide1").style.display="";
		 document.getElementById("dvPres_Report_Show_Hide").style.display="none";
		if(document.getElementById("cmb_Inbox_Query_Type").value ==1){
			
			document.getElementById("dvPres_Report_Show_Hide").style.display="";
			document.getElementById("dvPres_Report_Show_Hide1").style.display="none";
			
		}
		else if(document.getElementById("cmb_Inbox_Query_Type").value ==2){
			
		document.getElementById("dvPres_Report_Show_Hide").style.display="none";
			document.getElementById("dvPres_Report_Show_Hide1").style.display="";
			
		}
		 
	}
	
</script>
</head>
<body>
<?php include 'includes/top.php'?>
<section>
  <div class="top_ou">
    <div class="top_in">
      <div class="cal_12">
        <div class="DvFloat" style="padding-top: 2px;">
          <div class="health_greenbg_title"> <span style="text-align: center; text-transform: uppercase; font-size: 21px;" class="f_dgreen">Health</span> </div>
          <div class="wealth_bluebg_title"> <span style="text-align: center; text-transform: uppercase; font-size: 21px;" class="f_blue">Wealth</span> </div>
          <div class="hw_whitebg_title">
              <div class="contact_green_icon"><a href="inbox_1.html"  style="border:solid 0xp red;"><img src="images/contact_greenblue_icon.png" alt="" title="" border="0"></a></div>
              <div class="contact_blue_icon"><img src="images/contact_video_icon.png" alt="" title="" border="0"></div>
              <div class="contact_bell_icon"><img src="images/contact_bell_icon.png" alt="" title="" border="0"></div>
              <div class="small_red_bg">2</div>
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
          <div style="float:left; padding:25px 0px 0px 0px; border:solid 0px red;">
            
            <div class="adviceonline_md">
              <div class="Inbox_td_left">
                <table cellpadding="0" cellspacing="0" style="width:100%">
                  <tr>
                    <td style="text-align:left; width:10%;padding:20px 10px 0px 0px"><img src="images/inbox_mail.jpg" alt="" align="absmiddle" /></td>
                    <td style="text-align:left; width:70%; vertical-align:middle">Inbox &nbsp; (2) </td>
                    <td style="text-align:left; width:10%; vertical-align:middle ">&nbsp;</td>
                  </tr>
                  <tr>
                    <td style="text-align:left; width:10%;padding:5px 0px"><img src="images/health_icon.jpg" alt="" align="absmiddle" /></td>
                    <td style="text-align:left; width:70%;vertical-align:middle; color:#7ca500">Health &nbsp; (1)</td>
                    <td style="text-align:left; width:10%;vertical-align:middle ">&nbsp;</td>
                  </tr>
                  <tr>
                    <td style="text-align:left; width:10%;padding:5px 0px"><img src="images/wealth_icon.jpg" alt="" align="absmiddle" /></td>
                    <td style="text-align:left; width:70%;vertical-align:middle; color:#009999">Wealth &nbsp; (1)</td>
                    <td style="text-align:left; width:10%;vertical-align:middle ">&nbsp;</td>
                  </tr>
                  <tr>
                    <td style="text-align:left; width:10%;padding:5px 0px"><img src="images/sent_item_icon.jpg" alt="" align="absmiddle" /></td>
                    <td style="text-align:left; width:70%;vertical-align:middle">Sent Items </td>
                    <td style="text-align:left; width:10%;vertical-align:middle "></td>
                  </tr>
                  <tr>
                    <td style="text-align:left; width:10%;padding:5px 0px"><img src="images/trash_icon.jpg" alt="" align="absmiddle" /></td>
                    <td style="text-align:left; width:7570;vertical-align:middle">Trash</td>
                    <td style="text-align:left; width:10%;vertical-align:middle "></td>
                  </tr>
                  <tr>
                    <td style="text-align:left; width:10%;padding:5px 0px"><img src="images/folder_icon.jpg" alt="" align="absmiddle" /></td>
                    <td style="text-align:left; width:70%;vertical-align:middle">My Folders</td>
                    <td style="text-align:left; width:10%;vertical-align:middle "></td>
                  </tr>
                  <tr>
                    <td style="text-align:left; width:10%;padding:5px 0px"></td>
                    <td style="text-align:left; width:70%;vertical-align:middle"><ul style="list-style-type:square; line-height:30px;">
                        <li>sdfdsf</li>
                        <li>sdfdsf</li>
                        <li>sdfdsf</li>
                        <li>sdfdsf</li>
                      </ul></td>
                    <td style="text-align:left; width:10%;vertical-align:middle "></td>
                  </tr>
                </table>
              </div>
              <div class="Inbox_td_right"><div class="dvFloat">
                    <h2 class="Tab_Title" style="color:#7ca500;padding:0px; margin:0px">ASK QUERIES - Doctor</h2>
                  </div>
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td class="Inboxbg1" style="padding-top:0px;vertical-align:top; text-align:center; width:2%"><!--<input type="checkbox" id="chkMainTick" value="" />-->
                      &nbsp;</td>
                    <td class="Inboxbg2" colspan="2" style="text-align:left	"><!--<table width="00%" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td style="padding:0px 5px;vertical-align:top; text-align:left;"><div style="float:left; background-color:#666666; color:#FFFFFF; padding:5px 15px"> <a href="register_step1.html"  style="text-align:center; font-size:14px;text-transform:none;font-family: 'myriad_web_proregular'; color:#FFFFFF">Delete</a></div></td>
                          <td style="padding:0px 5px; vertical-align:top">&nbsp;<!--<div style="float:left; width:90px; border:solid 0px red;">
                              <div style="float:left; width:90px; border:solid 0px red;">
                                <ul id="dd_nav1">
                                  <li> <a href="#" style="background-color:#666666; font-weight:normal; padding:5px 10px; width:70px"> Move to&nbsp;<span class="ar">&#9660;</span> </a>
                                    <ul style="width: 90px; background-color: #666;line-height:25px">
                                      <li style="border-bottom: solid 0px #aac457;"><a href="#">Spam</a></li>
                                      <li style="border-bottom: solid 0px #aac457;"><a href="#">Trash</a></li>
                                      <li style="border-bottom: solid 0px #aac457;"><a href="#">Sent</a></li>
                                    </ul>
                                  </li>
                                </ul>
                              </div>
                            </div></td>
                          <td style="padding:0px 5px; vertical-align:top"><div style=" float:left; background-color:#666666; padding:5px 10px;width:90px;"> <a href="register_step1.html" style="text-align:center; font-size:14px;text-transform:none;font-family: 'myriad_web_proregular'; color:#FFFFFF">Create Folder</a></div></td>
                        </tr>
                      </table>-->
                      &nbsp;</td>
                    <td class="Inboxbg4" style="vertical-align:top; text-align:right"><div style="float:right; width:87px; border:solid 0px red; text-align:right">
                        <ul id="dd_nav2">
                          <li> <a href="#" style="background-color:#c02c3e; font-weight:normal;"><img src="images/compose_mail_icon.jpg" alt="" style="float:left" />&nbsp;Compose&nbsp;<span class="ar">&#9660;</span> </a>
                            <ul style="width: 97px;line-height:15px">
                              <li style="background-color: #99cc00; text-align:center"><a  target="_parent" onClick="javascript:Popup.showModal('dvpopup-form',null,null,{'screenColor':'#333333','screenOpacity':.6});" style="color:#FFFFFF;cursor: pointer;">Health </a></li>
                              <li style="background-color: #009999; text-align:center"><a href="#" style="color:#FFF;cursor: pointer;">Wealth</a></li>
                            </ul>
                          </li>
                        </ul>
                      </div></td>
                  </tr>
                </table>
                <div class="DvFloat">
                
                  <div  style="width:100%; border:solid 0px red;padding-top:10px;">
                    <div class="dvFloat formpadding1">
                      <div class="formlabel1">
                        <div style="padding-left: 10px; float: left;">Query Type <span class="redtxt">*</span></div>
                      </div>
                      <div class="formcontrol21">
                        <select  id="cmb_Inbox_Query_Type" name="cmb_Inbox_Query_Type" tabindex="1" onChange="javascript:Pres_Report_Show_Hide();" class="existing_event" style="width: 150px;">
                          <option value="0">Fresh</option>
                          <option value="1">Follow Up</option>
                        </select>
                      </div>
                    </div>
                    <div class="dvFloat" id="dvPres_Report_Show_Hide1">
                        <div class="dvFloat formpadding1">
                          <div class="formlabel1">
                            <div style="padding-left: 10px; float: left;">Body Area <span class="redtxt">*</span></div>
                          </div>
                          <div class="formcontrol21">
                            <select id="cmb_Inbox_Body_Area" name="cmb_Inbox_Body_Area" tabindex="1" class="existing_event" style="width: 150px;">
                              <option value="Select">Select</option>
                              <option value="Abdomen &amp; Pelvis">Abdomen &amp; Pelvis</option>
                              <option value="Arms &amp; Hands">Arms &amp; Hands</option>
                              <option value="Behavioral &amp; Mental">Behavioral &amp; Mental</option>
                              <option value="Chest &amp; Back">Chest &amp; Back</option>
                              <option value="Common Symptoms">Common Symptoms</option>
                              <option value="Ear, Nose &amp; Throat">Ear, Nose &amp; Throat</option>
                              <option value="Eyes">Eyes</option>
                              <option value="General Symptoms">General Symptoms</option>
                              <option value="Head &amp; Neck">Head &amp; Neck</option>
                              <option value="Legs &amp; Feet">Legs &amp; Feet</option>
                            </select>
                          </div>
                        </div>
                        <div class="dvFloat formpadding1">
                          <div class="formlabel1">
                            <div style="padding-left: 10px; float: left;">Complaint <span class="redtxt">*</span></div>
                          </div>
                          <div class="formcontrol21">
                            <form name="myform" METHOD=POST>
                              <textarea  name=comment onKeyUp="limiter()" id="txt_Inbox_Message"></textarea>
                              <br>
                              <div style="float:left; width:90px;text-align:left;padding:10px 0px 0px 5px; border:solid 0px red;">Character left:</div>
                              <div style="float:left; width:45px; border:solid 0px red;padding:7px 0px 0px 0px">
                                <script type="text/javascript">
               document.write("<input  style='border:solid 0px red; padding:0px;background-color:#fff;text-shadow:0px; width:50px;float:right;box-shadow: inset 0 0 0px 0px #d2d2d2;' type=text name=limit  readonly value="+count+">");
             </script>
                              </div>
                            </form>
                          </div>
                        </div>
                        <div class="dvFloat formpadding1">
                          <div class="formlabel1">
                            <div style="padding-left: 10px; float: left;">Symptoms<span class="redtxt">*</span></div>
                          </div>
                          <div class="formcontrol21">
                            <input type="text" name="txt_Inbox_Symptoms" id="txt_Inbox_Symptoms" value="" style="width:190px;">
                            &nbsp;<a style="cursor: pointer;color: #7ca500;" target="_parent" onClick="javascript:Popup.showModal('dvpopup-form3',null,null,{'screenColor':'#333333','screenOpacity':.6});"><img  src="images/pick_possible_symtoms.png" alt="" /></a> </div>
                        </div>
                        <div class="dvFloat formpadding1">
                          <div class="formlabel1">
                            <div style="padding-left: 10px; float: left;">How often you suffer from this Medical Problem ?<span class="redtxt">*</span></div>
                          </div>
                          <div class="formcontrol21">
                            <input type="text" name="txt_Inbox_suffer_Medical_Problem" id="txt_Inbox_suffer_Medical_Problem" value="">
                          </div>
                        </div>
                        <div class="dvFloat formpadding1">
                          <div class="formlabel1">
                            <div style="padding-left: 10px; float: left;">Last Ocurrency of Problem ?<span class="redtxt">*</span></div>
                          </div>
                          <div class="formcontrol21">
                            <div style="float:left; padding:0px 14px 0px 0px; border: solid 0px #006633;">
                              <select name="cmb_Date" id="cmb_Date" class="existing_event" tabindex="1" style="width: 4px;">
                                <option value="0" selected="selected">DD</option>
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
                            <div style="float:left; padding:0px 13px 0px 0px">
                              <select id="cmb_Month" name="cmb_Month" tabindex="1" title="" class="existing_event" style="width: 6px;">
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
                            <div style="float:left; padding:0px 0px 0px 0px">
                              <select name="cmb_Year" id="cmb_Year"  title="" tabindex="1" class="existing_event" style="width: 15px;">
                                <option value="YYYY">YYYY&nbsp;&nbsp;</option>
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
                            </div>
                          </div>
                        </div>
                        <div class="dvFloat formpadding1">
                          <div class="formlabel1">
                            <div style="padding-left: 10px; float: left;">Doctor Consulted of problem (if any?)<span class="redtxt">*</span></div>
                          </div>
                          <div class="formcontrol21" style="float:left; text-align:left">
                            <div style="float:left">
                              <input type="radio" id="Yes" name="Consulted_of_problem" value="Yes" >
                              <label for="Yes">Yes</label>
                              &nbsp;&nbsp;
                              <input type="radio" id="No" name="Consulted_of_problem" value="No"  checked>
                              <label for="No">No</label>
                              &nbsp;&nbsp; </div>
                          </div>
                        </div>
                        <div class="dvFloat formpadding1">
                          <div class="formlabel1">
                            <div style="padding-left: 10px; float: left;">Doctor Name<span class="redtxt">*</span></div>
                          </div>
                          <div class="formcontrol21">
                            <select  id="cmb_Inbox_Doctor_Name" name="cmb_Inbox_Doctor_Name" tabindex="1" class="existing_event" style="width: 180px;">
                              <option value="Select">Select</option>
                            </select>
                            <div class="div_input_text" style="font-size: 12px; text-align:left">Did not find your doctor in list<br>
                              <span style="text-decoration: underline;"><a href="" class="btnclickhere">Click  here</a></span> to Add One 
                            <div id="frmclickhere">
                            	<form method="post" id="signup" action="">
                                	<div style="border-bottom: solid 2px #d4d4d4; background-color: #f7f8f3; padding: 12px 11px; float: left; width: 95%; font-size: 14px; font-weight: bold;">
                                    	Add Doctor
                                    </div>
                                    <div class="clickhere_dv">
                                    	<div class="clickhere_left">First Name</div>
                                        <div class="clickhere_right"><input id="firstname" name="firstname" value="" type="text" style="width: 150px;" /></div>
                                    </div>
                                    <div class="clickhere_dv">
                                    	<div class="clickhere_left">Last Name</div>
                                        <div class="clickhere_right"><input id="lastname" name="lastname" value="" type="text" style="width: 150px;" /></div>
                                    </div>
                                    <div class="clickhere_dv">
                                    	<div class="clickhere_left">Clinic/Hospital</div>
                                        <div class="clickhere_right"><input id="clinic_hospital" name="clinic_hospital" value="" type="text" style="width: 150px;" /></div>
                                    </div>
                                    <div class="clickhere_dv">
                                    	<div class="clickhere_left">Specialization</div>
                                        <div class="clickhere_right"><input id="specialization" name="specialization" value="" type="text" style="width: 150px;" /></div>
                                    </div>
                                    <div class="clickhere_dv">
                                    	<div class="clickhere_left">Phone</div>
                                        <div class="clickhere_right"><input id="phone" name="phone" value="" type="text" style="width: 150px;" /></div>
                                    </div>
                                    <div class="clickhere_dv">
                                    	<div class="clickhere_left">Email Address</div>
                                        <div class="clickhere_right"><input id="emailaddress" name="emailaddress" value="" type="text" style="width: 150px;" /></div>
                                    </div>
                                    
                                    <div class="clickhere_dv" style="border-bottom: solid 0px #d4d4d4;">
                                    	<div class="clickhere_left">&nbsp;</div>
                                        <div class="clickhere_right">
                                        	<div style="width: 100%; float: left; padding-top: 5px;">
                                        <div style="width: 42%; float: left; border: solid 0px #003300; padding-left: 2px; text-align: left;">
                                            <input id="saveclickbtn" value="Save" type="submit" />
                                        </div>
                                        <div style="width: 47%; float: right; border: solid 0px #990033; padding-right: 8px;">
                                            <input id="cancleclickbtn" value="Cancel" type="submit" />
                                        </div>
                                    </div>
                                        </div>
                                    </div>

                                </form>
                            </div></div>
                          </div>
                        </div>
                        <div class="dvFloat formpadding1">
                          <div class="formlabel1">
                            <div style="padding-left: 10px; float: left;">Doctor Comment<span class="redtxt">*</span></div>
                          </div>
                          <div class="formcontrol21">
                            <textarea id="cmb_Inbox_Doctor_Comment" name="cmb_Inbox_Doctor_Comment"></textarea>
                          </div>
                        </div>
                        <div class="dvFloat formpadding1">
                          <div class="formlabel1">
                            <div style="padding-left: 10px; float: left;">Search Medical History<span class="redtxt">*</span></div>
                          </div>
                          <div class="formcontrol21">
                            <div style=" width:114px; height:30px; float:left;padding-right:10px; font-size:13px;"> <a href="#" class="button2" style="font-size:13px;">PRESCRIPTION</a></div>
                            <div style=" width:100px; height:30px; float:left;padding-right:10px;"> <a href="#" class="button2" style="font-size:13px;" >LAB TEST</a></div>
                            <div style=" width:100px; height:30px; float:left;padding-right:10px;"> <a href="#" class="button2" style="font-size:13px;">RADIOLOGY</a></div>
                          </div>
                        </div>
                        <div class="dvFloat formpadding1">
                          <div class="formlabel1">
                            <div style="padding-left: 10px; float: left;">Additional Medical Reports<span class="redtxt">*</span></div>
                          </div>
                          <div class="formcontrol21">
                            <div style=" width:80px; height:30px; float:left;padding-right:10px;"> <a href="#" class="button2" style="font-size:13px;" >UPLOAD</a></div>
                          </div>
                        </div>
                        <div class="dvFloat formpadding1">
                          <div class="formlabel1">
                            <div style="padding-left: 10px; float: left;">Do You Require Video Query<span class="redtxt">*</span></div>
                          </div>
                          <div class="formcontrol21" style="float:left; text-align:left">
                            <div style="float:left">
                              <input type="radio" id="Yes" name="Inbox_Video_Query" value="Yes" >
                              <label for="Yes">Yes</label>
                              &nbsp;&nbsp;
                              <input type="radio" id="No" name="Inbox_Video_Query" value="No"  checked>
                              <label for="No">No</label>
                              &nbsp;&nbsp; </div>
                          </div>
                        </div>
                        <div class="dvFloat formpadding1"  style="padding:10px 0px 25px 0px">
                          <div class="formlabel1"> &nbsp; </div>
                          <div class="formcontrol21">
                            <div style=" width:90px; height:30px; float:left;padding-right:10px;"> <a href="#" class="button4">SUBMIT</a></div>
                            <div style=" width:90px; height:30px; float:left;padding-right:10px;"> <a href="#" class="button2">CANCEL</a></div>
                          </div>
                        </div>
                    </div>
                    <div class="dvFloat" style="display: none;" id="dvPres_Report_Show_Hide">
                    <div class="dvFloat formpadding1">
                      <table cellpadding="0" cellspacing="0"  style="width:100%" >
                          <tr>
                            <td class="tbl_head" ></td>
                            <td class="tbl_head">Query Date</td>
                            <td class="tbl_head">Complaint</td>
                            <td class="tbl_head">Symptom</td>
                            <td class="tbl_head">Doctor&rsquo;s Advice</td>
                          </tr>
                          <tr>
                            <td class="tdborder" style="padding: 10px 0px 10px 20px;"><input type="radio" id="Yes" name="healthproblem_labresults" value="Yes"></td>
                            <td class="tdborder" style="padding: 10px 0px 10px 20px;">26-Dec-2013</td>
                            <td class="tdborder" style="padding: 10px 0px 10px 20px;">Accute Stomach Pain</td>
                            <td class="tdborder" style="padding: 10px 0px 10px 20px;">Purple eyelids,Purple eyelids,...</td>
                            <td class="tdborder" style="padding: 10px 0px 10px 20px;">Take the previous prescribed m...</td>
                          </tr>
                          <tr>
                            <td style="padding: 10px 0px 10px 20px;"><input type="radio" id="Yes" name="healthproblem_labresults" value="Yes"></td>
                            <td style="padding: 10px 0px 10px 20px;">26-Dec-2013</td>
                            <td style="padding: 10px 0px 10px 20px;">pain in hands</td>
                            <td style="padding: 10px 0px 10px 20px;">scratching,Purple eyelids,Purp...</td>
                            <td style="padding: 10px 0px 10px 20px;"></td>
                          </tr>
                        </table>
                    </div>                                        
                    <div class="dvFloat formpadding1">
                      <div class="formlabel1">

                        <div style="padding-left: 10px; float: left;">User Query<span class="redtxt">*</span></div>
                      </div>
                      <div class="formcontrol21">
                        <textarea id="cmb_Inbox_User_Query" name="cmb_Inbox_User_Query"></textarea>
                      </div>
                    </div>
                    <div class="dvFloat formpadding1">
                      <div class="formlabel1">
                        <div style="padding-left: 10px; float: left;">Search Medical History<span class="redtxt">*</span></div>
                      </div>
                      <div class="formcontrol21">
                        <div style=" width:114px; height:30px; float:left;padding-right:10px; font-size:13px;"> <a href="#" class="button2" style="font-size:13px;">PRESCRIPTION</a></div>
                        <div style=" width:100px; height:30px; float:left;padding-right:10px;"> <a href="#" class="button2" style="font-size:13px;" >LAB TEST</a></div>
                        <div style=" width:100px; height:30px; float:left;padding-right:10px;"> <a href="#" class="button2" style="font-size:13px;">RADIOLOGY</a></div>
                      </div>
                    </div>
                    <div class="dvFloat formpadding1">
                      <div class="formlabel1">
                        <div style="padding-left: 10px; float: left;">Additional Medical Reports<span class="redtxt">*</span></div>
                      </div>
                      <div class="formcontrol21">
                        <div style=" width:80px; height:30px; float:left;padding-right:10px;"> <a href="#" class="button2" style="font-size:13px;" >UPLOAD</a></div>
                      </div>
                    </div>
                    <div class="dvFloat formpadding1">
                      <div class="formlabel1">
                        <div style="padding-left: 10px; float: left;">Do You Require Video Query<span class="redtxt">*</span></div>
                      </div>
                      <div class="formcontrol21" style="float:left; text-align:left">
                        <div style="float:left">
                          <input type="radio" id="Yes" name="Inbox_Video_Query" value="Yes" >
                          <label for="Yes">Yes</label>
                          &nbsp;&nbsp;
                          <input type="radio" id="No" name="Inbox_Video_Query" value="No"  checked>
                          <label for="No">No</label>
                          &nbsp;&nbsp; </div>
                      </div>
                    </div>
                    <div class="dvFloat formpadding1"  style="padding:10px 0px 25px 0px">
                      <div class="formlabel1"> &nbsp; </div>
                      <div class="formcontrol21">
                        <div style=" width:90px; height:30px; float:left;padding-right:10px;"> <a href="#" class="button4">SUBMIT</a></div>
                        <div style=" width:90px; height:30px; float:left;padding-right:10px;"> <a href="#" class="button2">CANCEL</a></div>
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
<?php include 'includes/bottom.php'?>
<div id="dvpopup-form" style="text-align: center; width: 780px;position:absoulte; margin:15px auto; display:none; margin-left:25%">
  <table cellpadding="0" cellspacing="0" border="0" width="400px" align="center">
    <tr>
      <td style="text-align:right; border:solid 0px red; float:right"><div style="margin: 5px 0px 0px -23px; position: absolute; text-align:right"> <a href="javascript:Popup.hide('dvpopup-form');" target="_parent" style="text-decoration: none; color: #fff;"> <img src="images/close.png" alt="" title="" border="0" /> </a> </div></td>
    </tr>
    <tr>
      <td valign="top" align="center" style="padding: 10px 10px 10px 10px;"><div class="DvFloat">
          <div class="dvWhitePopup_Box">
            <table cellpadding="0" cellspacing="0" style="width:90%; border:solid 0px #000000">
              <tr>
                <td colspan="4" style="padding-bottom:15px;padding-left:20px;text-align:center"><h2 class="Tab_Title" style="color:#333333"> Whom do you want to ask query? </h2></td>
              </tr>
              <tr>
                <td  style="text-align:center; padding:0px 10px;vertical-align:middle"><a href="inbox_ask_queries_doctor.html"><img src="images/doctor_box.png" alt="" align="absmiddle" /></a></td>
                <td  style="text-align:center; padding:0px 10px;vertical-align:middle"><a href="inbox_ask_queries_nutritionist.html"><img src="images/nutritionist_box.png" alt="" align="absmiddle" /></a> </td>
              </tr>
            </table>
          </div>
        </div></td>
    </tr>
  </table>
</div>
<div id="dvpopup-form3" style="text-align: center; width: 100%;position:absoulte;margin:0px; margin-top:15px;  display:none">
  <table cellpadding="0" cellspacing="0" border="0" width="100%" align="center">
    <tr>
      <td style="text-align:right; border:solid 0px red; float:right"><div style="margin: 5px 0px 0px -23px; position: absolute; text-align:right"> <a href="javascript:Popup.hide('dvpopup-form3');" target="_parent" style="text-decoration: none; color: #fff;"> <img src="images/close.png" alt="" title="" border="0" /> </a> </div></td>
    </tr>
    <tr>
      <td valign="top" align="center" style="padding: 10px 10px 30px 10px;background-color:#FFFFFF"><div  style="width:100%; border:solid 0px red;">
          <div class="dvFloat formpadding">
            <div class="formlabel1">
              <label class="formlabel1">
              <h2 class="Tab_Title" style="color:#000000; text-transform:none">What are the symptoms?</h2>
              </label>
            </div>
            <div class="formcontrol21"> &nbsp; </div>
          </div>
          <div class="dvFloat formpadding" style="padding-top:30px"></div>
          <div class="dvInbox_left"><img src="images/symtoms.jpg" alt="" /></div>
          <div class="dvInbox_middle">
            <div class="TabDv" style="margin:0 auto; width:390px;">
              <div  style="padding:0px 0px;">
                <ul id="calorie_tab" class="calorie_tab">
                  <li class="selected"><a href="#" rel="tabs1" >Common Symptoms</a></li>
                  <li><a href="#" rel="tabs2"  >General Symptoms</a></li>
                  <li><a href="#" rel="tabs3"> Behavioral & Mental Health Symptoms</a></li>
                </ul>
              </div>
              <div class="calorieTabContentDetails">
                <div id="tabs1" class="calorie_tabcontent">
                  <div style="width:415px; border:solid 0px red;overflow-x:hidden;hidden;background-color:#f0f0f0; height:400px;">
                    <table cellpadding="0" cellspacing="0" style="width:100%;">
                      <tr>
                        <td style="font-weight:bold; font-size:13px;padding:15px 0px 5px 10px" colspan="2">General Symptoms for Adult Male </td>
                      </tr>
                      <tr>
                        <td style="width:50%; vertical-align:top; text-align:left"><ul class="symtoms1" >
                            <li>Chills or hot flashes</li>
                            <li>Chills, aches, and flu-like symptoms</li>
                            <li>Clumsiness</li>
                            <li>Cravings for non-nutritional items</li>
                            <li>Daytime sleepiness</li>
                            <li>Dehydration</li>
                            <li>Delayed ability to push up on arms, </li>
                            <li>sit up alone, or crawl</li>
                            <li>Delayed growth</li>
                            <li>Delayed puberty</li>
                            <li>Delayed reaction time</li>
                            <li>Delayed sexual development</li>
                            <li>Delayed speech and language</li>
                            <li>Developmental delays</li>
                            <li>Difficulty being understood</li>
                            <li>Disorganized</li>
                            <li>Early puberty</li>
                            <li>Easy bleeding and bruising</li>
                            <li>Erectile dysfunction</li>
                          </ul></td>
                        <td style="width:50%; vertical-align:top; text-align:left"><ul class="symtoms1" >
                            <li>Chills or hot flashes</li>
                            <li>Chills, aches, and flu-like symptoms</li>
                            <li>Clumsiness</li>
                            <li>Cravings for non-nutritional items</li>
                            <li>Daytime sleepiness</li>
                            <li>Dehydration</li>
                            <li>Delayed ability to push up on arms, </li>
                            <li>sit up alone, or crawl</li>
                            <li>Delayed growth</li>
                            <li>Delayed puberty</li>
                            <li>Delayed reaction time</li>
                            <li>Delayed sexual development</li>
                            <li>Delayed speech and language</li>
                            <li>Developmental delays</li>
                            <li>Difficulty being understood</li>
                            <li>Disorganized</li>
                            <li>Early puberty</li>
                            <li>Easy bleeding and bruising</li>
                            <li>Erectile dysfunction</li>
                          </ul></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div id="tabs2" class="calorie_tabcontent">
                  <div style="width:415px; border:solid 0px red;overflow:scroll;background-color:#f0f0f0; height:400px;">General Symptoms</div>
                </div>
                <div id="tabs3" class="calorie_tabcontent">
                  <div style="width:415px; border:solid 0px red;overflow:scroll;background-color:#f0f0f0; height:400px;">Behavioral & Mental Health Symptoms</div>
                </div>
              </div>
            </div>
          </div>
          <div class="dvInbox_middle1">
            <table cellpadding="0" cellspacing="0" style="width:100%">
              <tr>
                <td style="vertical-align:middle;text-align:center;padding-top:200px;"><img src="images/inbox_symptoms_right_arrow.jpg" alt="" /></td>
              </tr>
            </table>
          </div>
          <div class="dvInbox_right">
            <div style="background-color:#f0f0f0; width:250px; height:405px; ">
              <div class="dvFloat" style="padding:10px 0px; background-color:#666; color:#FFFFFF"> My Selection </div>
              <div class="dvFloat">
                <div style="background-color:#f0f0f0; width:250px; height:405px; overflow-x:hidden;">
                  <table cellpadding="0" cellspacing="0" style="width:100%;">
                    <tr>
                      <td style="text-align:center;padding:5px 5px 0px 5px"><img src="images/minus.jpg" alt="" /></td>
                      <td> Fever </td>
                    </tr>
                    <tr>
                      <td style="text-align:center;padding:5px 5px 0px 5px"><img src="images/minus.jpg" alt="" /></td>
                      <td> Fussiness or irritability </td>
                    </tr>
                    <tr>
                      <td style="text-align:center;padding:5px 5px 0px 5px"><img src="images/minus.jpg" alt="" /></td>
                      <td> Headache </td>
                    </tr>
                    <tr>
                      <td style="text-align:center;padding:5px 5px 0px 5px"><img src="images/minus.jpg" alt="" /></td>
                      <td> Fatigue </td>
                    </tr>
                    <tr>
                      <td style="text-align:center;padding:5px 5px 0px 5px"><img src="images/minus.jpg" alt="" /></td>
                      <td> Feeding problems </td>
                    </tr>
                    <tr>
                      <td style="text-align:center;padding:5px 5px 0px 5px"><img src="images/minus.jpg" alt="" /></td>
                      <td> Feeling ill or malaise </td>
                    </tr>
                    <tr>
                      <td style="text-align:center;padding:5px 5px 0px 5px"><img src="images/minus.jpg" alt="" /></td>
                      <td> Fever </td>
                    </tr>
                    <tr>
                      <td style="text-align:center;padding:5px 5px 0px 5px"><img src="images/minus.jpg" alt="" /></td>
                      <td> Floppy muscles </td>
                    </tr>
                    <tr>
                      <td style="text-align:center;padding:5px 5px 0px 5px"><img src="images/minus.jpg" alt="" /></td>
                      <td> Food cravings </td>
                    </tr>
                    <tr>
                      <td style="text-align:center;padding:5px 5px 0px 5px"><img src="images/minus.jpg" alt="" /></td>
                      <td> Freezing in one posture </td>
                    </tr>
                    <tr>
                      <td style="text-align:center;padding:5px 5px 0px 5px"><img src="images/minus.jpg" alt="" /></td>
                      <td> Frequent falls </td>
                    </tr>
                    <tr>
                      <td style="text-align:center;padding:5px 5px 0px 5px"><img src="images/minus.jpg" alt="" /></td>
                      <td> Frequent infections </td>
                    </tr>
                    <tr>
                      <td style="text-align:center;padding:5px 5px 0px 5px"><img src="images/minus.jpg" alt="" /></td>
                      <td> Frequent or severe infections </td>
                    </tr>
                    <tr>
                      <td style="text-align:center;padding:5px 5px 0px 5px"><img src="images/minus.jpg" alt="" /></td>
                      <td> Fussiness or irritability </td>
                    </tr>
                    <tr>
                      <td style="text-align:center;padding:5px 5px 0px 5px"><img src="images/minus.jpg" alt="" /></td>
                      <td> Gradual loss of height </td>
                    </tr>
                    <tr>
                      <td style="text-align:center;padding:5px 5px 0px 5px"><img src="images/minus.jpg" alt="" /></td>
                      <td> Hard to awaken </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div></td>
    </tr>
  </table>
</div>

<script type="text/javascript" src="js/jquery.form-2.4.0.min.js"></script>
<script type="text/javascript" src="js/jqeasy.dropdown.min.js"></script>
<script type="text/javascript" src="js/jQuery.1.8.2.js"></script>
<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="js/custom1.js"></script>
<script>
	Pres_Report_Show_Hide();
    Intake_Reminder_Show_Hide();
	Purchase_Reminder_Show_Hide();
	Daily_Frequency_enabledisable();
    </script>
<script type="text/javascript">

var countries=new ddtabcontent("calorie_tab");
countries.setpersist(true);
countries.setselectedClassTarget("link"); 
countries.init();


</script>
<script type="text/javascript"> $.noConflict();</script>
<script>
	Pres_Report_Show_Hide();
</script>

</body>
</html>
