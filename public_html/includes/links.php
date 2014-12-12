<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">


<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>

<link href="<?php echo $strHostName;?>/style/main.css" rel="stylesheet" type="text/css">
<link href="<?php echo $strHostName;?>/style/reset.css" rel="stylesheet" type="text/css">
<link href="<?php echo $strHostName;?>/style/fonts.css" rel="stylesheet" type="text/css">
<link href="<?php echo $strHostName;?>/style/bxslider1.css" rel="stylesheet" type="text/css">
<link href="<?php echo $strHostName;?>/style/jupiter.css" rel="stylesheet" type="text/css">
<link href="<?php echo $strHostName;?>/css/main_new.css" rel="stylesheet" type="text/css">
<link type="text/css" rel="stylesheet" href="<?php echo $strHostName;?>/css/style.css" />
<link href="<?php echo $strHostName;?>/style/bhupali.css" rel="stylesheet" type="text/css">
<link href="<?php echo $strHostName;?>/style/paging_md.css" rel="stylesheet" type="text/css" />


<style>

input[type="text"] 
{
	color:#666666;
}

input[type="text"]:focus
{
	color:#666666;
}

textarea, textarea:focus, select, select:focus
{
	color:#666666;
}


</style>

<script type="text/javascript" src="<?php echo $strHostName;?>/js/calorie_tabcontent.js"></script>
<script language="JavaScript" src="<?php echo $strHostName;?>/js/PopUp.js" type="text/javascript"></script>
<script language="JavaScript" src="<?php echo $strHostName;?>/js/common.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript" src="<?php echo $strHostName;?>/js/counter_check.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo $strHostName;?>/js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="<?php echo $strHostName;?>/lib/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" language="javascript" src="<?php echo $strHostName;?>/js/scrolltopcontrol.js"></script>

<?php $strWebsitePageName=GetOnlyPageName();?>
<?php if(isset($_GET['dir'])){?>
<?php  if($_GET['dir']=="inbox/compose_doctor"  ||  $_GET['dir']=="inbox/compose_nutritionist" ||  $_GET['dir']=="md/appointment" ||  $_GET['dir']=="health/prescription" || $_GET['dir']=="inbox/detailed_mail"  || $_GET['dir']=="inbox/view_mails" || $_GET['dir']=="master/doctor/add"  || $_GET['dir']=="master/clerk/add" ) {?>
<script src="<?php echo $strHostName;?>/js/jquery.min.js" type="text/javascript"></script>
<?php } ?>
 <?php  if($_GET['dir']=="registration/step1" || $_GET['dir']=="registration/step2" || $_GET['dir']=="registration/step3"  || $_GET['dir']=="calories/setup1" || $_GET['dir']=="health/medication"|| $_GET['dir']=="health/hospitalization"|| $_GET['dir']=="health/immunization"|| $_GET['dir']=="health/health_problems"|| $_GET['dir']=="health/daily_tracking"|| $_GET['dir']=="health/allergies" || $_GET['dir']=="health/family_history") {?>
	<link rel="stylesheet" href="<?php echo $strHostName;?>/css/example.css" type="text/css">
	<link rel="stylesheet" href="<?php echo $strHostName;?>/css/dropkick.css" type="text/css">
    
	
	<script src="<?php echo $strHostName;?>/js/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo $strHostName;?>/js/jquery.dropkick-1.0.0.js" type="text/javascript"></script>

	<script type="text/javascript" charset="utf-8">
		$(function () {
		  $('.existing_event').dropkick({
			change: function () {
			  $(this).change();
			}
		  });
		});
	</script>
	<?php } ?>
	<?php  if($_GET['dir']=="health/setup" ||  $_GET['dir']=="health/daily_tracking" || $_GET['dir']=="health/dashboard"  ||  $_GET['dir']=="daily_tracking/sugar_profile"  || $_GET['dir']=="daily_tracking/lipid_profile" || $_GET['dir']=="daily_tracking/lifestyle") {
	
	?>
		<link rel="stylesheet" type="text/css" href="<?php echo $strHostName;?>/style/tabcontent.css" />
		<script type="text/javascript" src="<?php echo $strHostName;?>/js/tabcontent.js"></script>
		<link rel="stylesheet" href="<?php echo $strHostName;?>/style/lightbox.css" type="text/css" />
		<script type="text/javascript" src="<?php echo $strHostName;?>/lib/jquery-1.10.1.min.js"></script>
		<script type="text/javascript" src="<?php echo $strHostName;?>/lib/jquery.mousewheel-3.0.6.pack.js"></script>
		<script type="text/javascript" src="<?php echo $strHostName;?>/source/jquery.fancybox.js?v=2.1.5"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo $strHostName;?>/source/jquery.fancybox.css?v=2.1.5" media="screen" />
		<link rel="stylesheet" type="text/css" href="<?php echo $strHostName;?>/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
		<script type="text/javascript" src="<?php echo $strHostName;?>/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
		
            
           
	<?php } ?>
	<?php  if($_GET['dir']=="calories/setup1" ) {?>
	<link rel="stylesheet" type="text/css" href="<?php echo $strHostName;?>/style/calorie_tabcontent.css" />
	<script type="text/javascript" src="<?php echo $strHostName;?>/js/calorie_tabcontent.js"></script>
	<?php } ?>

	<?php  if($_GET['dir']=="calories/setup4" ) {?>
        <link rel="stylesheet" type="text/css" href="<?php echo $strHostName;?>/style/calorie_tabcontent1.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $strHostName;?>/style/health_dashboard_tabcontent.css" />
		<script type="text/javascript" src="<?php echo $strHostName;?>/js/calorie_tabcontent.js"></script>
	<?php } ?>
    
    	<?php  if($_GET['dir']=="calendar/daily_tracking" ) {?>
        <link rel="stylesheet" type="text/css" href="<?php echo $strHostName;?>/style/calorie_tabcontent1.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo $strHostName;?>/style/health_dashboard_tabcontent.css" />
		 <link rel="stylesheet" type="text/css" href="<?php echo $strHostName;?>/style/tabcontent.css" />
	<script type="text/javascript" src="<?php echo $strHostName;?>/js/calorie_tabcontent.js"></script>
	<link href="<?php echo $strHostName;?>/css/skin.css" rel="stylesheet" type="text/css"/>

	<?php } ?>
    
    <?php  if($_GET['dir']=="nutritionist/details") {?>
     <link rel="stylesheet" type="text/css" href="<?php echo $strHostName;?>/style/health_dashboard_tabcontent.css" />
     <script type="text/javascript" src="<?php echo $strHostName;?>/js/calorie_tabcontent.js"></script>
	 <link href="<?php echo $strHostName;?>/css/skin.css" rel="stylesheet" type="text/css"/>

	<?php } ?>


	<?php  if($_GET['dir']=="calories/setup3") {?>
				
		<!--<script type="text/javascript" src="<?php echo $strHostName;?>/lib/jquery-1.10.1.min.js"></script>
		<script type="text/javascript" src="<?php echo $strHostName;?>/lib/jquery.mousewheel-3.0.6.pack.js"></script>
		<script type="text/javascript" src="<?php echo $strHostName;?>/source/jquery.fancybox.js?v=2.1.5"></script>


			
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
		</script>-->

 
	<style type="text/css">
	.mypetsA { /*header of demos*/
		

		
	width:675px;
		color: #666666;
		font-weight:bold; background:#f0f0f0 url(images/calorie_setup/brkfast_side_arrow.png) no-repeat; background-position:99% 50%; border:solid 0px red; height:45px; z-index:1000;
		position:relative;
	}
	.openpet {
		
		color:#666;background:#f0f0f0 url(images/calorie_setup/brkfast_arrow.png) no-repeat; background-position:99% 50%; border:solid 0px red; height:45px; z-index:1000;
	}
	.thepetA {

		color:#666666;
		padding:5px 0px;
	}
	</style>
	<link rel="stylesheet" type="text/css" href="style/calorie_tabcontent1.css" />


	<!--	<script type="text/javascript">
		$(document).ready(function(){
		$(".trigger").click(function(){
		$(".panel").toggle("fast");
		$(this).toggleClass("active");
		return false;
		});
		});
		</script>-->
		
		

	<?php } ?>

<?php } ?>


 		<?php if(isset($_GET['dir'])){?>	
			<?php if($_GET['dir']=="health/daily_tracking" || $_GET['dir']=="health/lab_report" || $_GET['dir']=="health/radiology_report" || $_GET['dir']=="health/prescription" || $_GET['dir']=="health/dashboard" ||  $_GET['dir']=="daily_tracking/sugar_profile" || $_GET['dir']=="daily_tracking/lipid_profile" || $_GET['dir']=="daily_tracking/lifestyle" ) { ?>
		   <link rel="stylesheet" type="text/css" href="<?php echo $strHostName;?>/style/health_dashboard_tabcontent.css" />
			<?php } ?>
       <?php } ?>
            
<script>
var $countries_selection_tab;
</script>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-56312118-1', 'auto');
  ga('send', 'pageview');

</script>