<?php include 'includes/common.inc.php'?>
<!DOCTYPE HTML>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Alivemeter | Refer A Friend | Online Healthcare</title>
<meta name="description" content="Help your friends enjoy Alivemeter benefits like online doctor and nutritionist consultations, health advice, etc.">
<meta name="keywords" content="register for health advice, healthcare online, health app, doctor and nutritionist online, best health advice">
<?php include 'includes/links.php'?>
<link href="style/main.css" rel="stylesheet" type="text/css">
<link href="style/reset.css" rel="stylesheet" type="text/css">
<link href="style/fonts.css" rel="stylesheet" type="text/css">
<link href="style/bxslider.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/scrolltopcontrol.js"></script>
<link href="style/bhupali.css" rel="stylesheet" type="text/css">
<script language="javascript" type="text/javascript">
function Validation() {
	
	if (document.getElementById("txtName1").value == "" ) {
		alert("Enter Proper Name!");
		document.getElementById("txtName1").focus();
		return false;
	}
	
	if(document.getElementById("txtEmail1").value == "") {
		alert("Please Enter Email...");
		document.getElementById("txtEmail1").focus();
		return false;
	}
	
	for (var i=1;i < 10 ;i ++ ){

		 if(document.getElementById("txtName"+i).value == "" && document.getElementById("txtEmail"+i).value != "")  {
			alert("Please Enter Name..");
			document.getElementById("txtName"+i).focus();
			return false;
		}
	
		if(document.getElementById("txtEmail"+i).value == "" && document.getElementById("txtName"+i).value != "")  {
			alert("Please Enter Email..");
			document.getElementById("txtEmail"+i).focus();
			return false;
		}
	
		if(document.getElementById("txtName"+i).value != "" && document.getElementById("txtEmail"+i).value != "")  {
			var tempEmail = document.getElementById("txtEmail"+i).value;
			var exclude = /[^@\-\.\w]|^[_@\.\-]|[\._\-]{2}|[@\.]{2}|(@)[^@]*\1/;
			var check = /@[\w\-]+\./;
			var checkend = /\.[a-zA-Z]{2,3}$/;
				if (document.getElementById("txtEmail"+i).value != "") {
				if (tempEmail.search(exclude) != -1 || tempEmail.search(check) == -1 || tempEmail.search(checkend) == -1) {
					alert("Invalid E-mail Address?");
					document.getElementById("txtEmail"+i).focus();
					return false;
				}
			}
		
		
		}
	
	}
	
}
</script>
</head>

<?php
$refer_id=""; $id=""; $name=""; $email=""; $user_id="";$date=""; $isdeleted="0"; $isactive="1"; 
?>
	<?php
		if(isset($_GET['cid'])) {
			$id = $converter->decode($_GET['cid']);
		
		}
		
		 
		 
	if(isset($_POST['btnSubmit'])) {
		
	$date = date('Y-m-d');

		if(isset($_SESSION['UserID']))
		{
			$user_id=$_SESSION['UserID'];
			$user_name=$_SESSION['UserName'];
		}
		else
		{
			$user_id="0";
		}
		
				
		$isdeleted = 0;
		$isactive = 1;
		
		for($i=1;$i <10;$i++){

				$name=mysql_real_escape_string($_POST['txtName'.$i]);
				$email=mysql_real_escape_string($_POST['txtEmail'.$i]);
				
				
				
				$randomno=rand();
				
				$data = array(
				'name' => $name,
				'email' => $email,
				'user_id'=>$user_id,
				'date'=>$date,
				'isdeleted' => $isdeleted,
				'isactive'=>1,
				'randomno'=>$randomno,
				);
				
			if($name!=""){
				$id = $db->insert_array(Refer_Friend, $data);
				//Alert($name);
				
				$fuser_id=$converter->encode($user_id);
				$to = $email;
				$email=$converter->encode($email);
				$randomno=$converter->encode($randomno);
				$from = "Alivemeter";
				$strSubject = "Alivemeter Account Registration from your friend ".$user_name;
				
				$string=$string."<table width='780px' border='0' cellpadding='0' cellspacing='0'>";
				$string=$string."<tr>";
				$string=$string."<td style='border: solid 12px #4ec8c8;'>";
				$string=$string."<table width='757px' border='0' cellpadding='0' cellspacing='0'>";
				$string=$string."<tr>";
				$string=$string."<td style='background-color: #FFF; height: 70px; border-bottom: solid 2px #4ec8c8;'>";
				$string=$string."<table width='757px' border='0' cellpadding='0' cellspacing='0'>";
				$string=$string."<tr>";
				$string=$string."<td style='padding-left: 17px; width: 159px; padding-bottom: 5px;'>";
				$string=$string."<a href='http://www.alivemeter.com/' target='_blank' style='color: #666666; text-decoration: underline;'><img src='http://www.alivemeter.com/images/brandnew.png' alt='' title='' border='0' /></a>";
				$string=$string."</td>";
				$string=$string."<td style='padding-right: 20px; padding-top: 10px; text-align: right; display: none;'>";
				$string=$string."<a href='https://www.facebook.com/pages/Alivemeter/687872857994981' target='_blank' style='color: #666666; text-decoration: underline;'><img src='http://www.alivemeter.com/images/socialmedia/facebook.png' alt='' title='' border='0' /></a>&nbsp;<a href='https://twitter.com/@alivemeter' target='_blank' style='color: #666666; text-decoration: underline;'><img src='http://www.alivemeter.com/images/socialmedia/twitter.png' alt='' title='' border='0' /></a>&nbsp;";
				$string=$string."</td>";
				$string=$string."</tr>";
				$string=$string."</table>";
				$string=$string."</td>";
				$string=$string."</tr>";
				$string=$string."<tr>";
				$string=$string."<td style='background-color: #f0f0f0;'>";
				
				$string=$string."<table width='757px' border='0' cellpadding='0' cellspacing='0'>";
				$string=$string."<tr>";
				$string=$string."<td style='padding: 20px 11px 10px 11px; text-align: justify; margin: 0px;'>";
				$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #99cc00; font-weight: bold; line-height: 20px; margin: 0px;'>Dear ".$name.",</p>";
				$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; padding-top: 10px; margin: 0px;'>
				".$user_name." wants you to try Alivemeter! Alivemeter is your gateway to taking your health in your hands. Alivemeter.com is not about good health tips online. It&rsquo;s about easing your health related anxieties by consulting with the best specialist doctors (MD) and nutritionist, get valued opinions and then taking curative and preventive actions towards a healthier you. Briefly, here&rsquo;s what you get:
				</p>"; 
				
				$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; padding-top: 10px; margin: 0px;'>
				&bull; Connect on video chat.</p>";   
				
				$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; padding-top: 5px; margin: 0px;'>
				&bull; Ask unlimited queries.</p>";   
				
				$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; padding-top: 5px; margin: 0px;'>
				&bull; Achieve your weight and calorie goal with a personal nutritionist.</p>";   
				
				$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; padding-top: 5px; margin: 0px;'>
				&bull; Maintain your entire family health records.</p>";   
				
				$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; padding-top: 5px; margin: 0px;'>
				&bull; Get second opinions.</p>";  
				
				$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; padding-top: 5px; margin: 0px;'>
				&bull; Avail of hospital partnerships.</p>";  
				
				
				$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; padding-top: 15px; margin: 0px;'>
				Get started here:</p>";                         
				
				$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; padding-top: 10px; margin: 0px;'><a href='http://www.alivemeter.com/page.php?dir=registration/sign_up&user_id=".$fuser_id."&email=".$email."&randomno=".$randomno."'>http://www.alivemeter.com/page.php?dir=registration/sign_up&user_id=".$fuser_id."&email=".$email."&randomno=".$randomno."</a></p>";  
				
			                 
				$string=$string."</td>";
				$string=$string."</tr>";
				$string=$string."<tr>";
				$string=$string."<td style='padding: 25px 11px 25px 11px; text-align: left; margin: 0px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; vertical-align: top;'>";
				$string=$string."<span style='color: #666666; font-weight: bold; font-size: 13px;'>- The Alivemeter Team</span><br />";
				
				$string=$string."</td>";
				$string=$string."</tr>";
				$string=$string."</table>";
				$string=$string."</td>";
				$string=$string."</tr>";
				$string=$string."</table>";
				$string=$string."</td>";
				$string=$string."</tr>";
				$string=$string."</table>"; 
				
				$strBody=$string;
				
				
				SendEmail("Alivemeter Team", "support@alivemeter.com", $to, $strSubject, $strBody);
				

			}
				
		} 
		AlertandRedirect('Mail sent successfully. As soon as your friend registers on our site, rewards points will get credited to your profile.', 'index.php');
		
		
}
?>
<body>
<?php include 'includes/top.php'?>
<section>
  <div class="top_ou">
    <div class="top_in">
      <div class="top">
        <div class="b_crumb"><a href="index.php">Home></a> Refer a friend</div>
        
        <div class="cal_12" style="text-align: justify; line-height: 20px;">
         
                 

<form class="form-horizontal" method="post" enctype="multipart/form-data"  onSubmit="javascript:return Validation();">
	<div  style="width:99%; border:solid 0px red;">
                 <div class="dvFloat formpadding1" style="padding-top:20px">
                    <div class="formlabel1">
                      <label class="formlabel1" style="padding-left:0px; padding-bottom:15px;">
                      	 <h2 class="Tab_Title">Refer A Friend</h2>
                     </label>
                    </div>
                    <div class="formcontrol2"> &nbsp; </div>
                  </div>
                   <div class="dvFloat" style="padding:20px 0;">
                  If you like us - share it and invite your friends to register on the site. What more, you can invite as many of your friends and once they get registered via the link e-mailed to their mail ID your earn 100 points for each registration. The points can be redeemed on our store.
                  </div>
                  <div class="dvFloat formpadding1">
                  <div class="dvFloat" style="padding-left:200px; ">
                  
                    	<?php for($i=1 ; $i<=10 ;$i++){ ?>
                    
                    <div class="formcontrol2" style="padding-top:3px;">
                      <input type="text" name="txtName<?php echo $i?>" id="txtName<?php echo $i?>" value=""  placeholder="Name" style="margin-right:20px;"/>
                      <input type="text" name="txtEmail<?php echo $i?>" id="txtEmail<?php echo $i?>" value=""  placeholder="Email"/>
                    </div>
                    
                    <?php } ?>
                    
                     
                   </div>
                     </div>
                   
                  <div class="dvFloat formpadding1"  style="padding:10px 0px 25px 0px">
                    <div class="formlabel1"> &nbsp; </div>
                    <div class="formcontrol2" >
                    	
                    	
                      <div style=" width:84px; height:30px; float:left;padding-left:200px;"> 
                      	 <?php if(isset($_SESSION['UserID'])) { ?>
                         	<input type="submit" id="btnSubmit" name="btnSubmit" value="Submit" class="button4" style="cursor:pointer"/>
                         <?php } else { ?>
                         	<a onClick="javascript: alert('Please login to refer a friend.');" class="button4" style="cursor:pointer">Submit</a>
                         <?php } ?>
                      </div>
                     	  
                   </div>
         </div>
         </div>        
                 	
               
</form>
  </div>
      </div>
    </div>
  </div>
</section>

<?php include 'includes/bottom.php'?>
<script type="text/javascript" src="js/jQuery.1.8.2.js"></script> 
<script type="text/javascript" src="js/jquery.bxslider.min.js"></script> 
<script type="text/javascript" src="js/custom.js"></script>

<script type="text/javascript" src="js/jquery.form-2.4.0.min.js"></script>
<script type="text/javascript" src="js/jqeasy.dropdown.min.js"></script>
</body>
</html>
