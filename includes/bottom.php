<footer>
  <div>
    <div class="bor_2colour"></div>
  </div>
  <div class="r_1 wd1000" style="margin-top:10px; border: solid 0px #003333;">
    <div class="f_nav f_l">
      <ul>
      	<div style="width: 191px; float: left; border: solid 0px #FF66CC;">
            <ul><li><a href="<?php echo $strHostName;?>/index.php">Home</a></li>
            <li><a href="<?php echo $strHostName;?>/aboutus.php">About Us</a></li>
            <li><a href="<?php echo $strHostName;?>/how_it_works.php#hwfaq">FAQs</a></li>
            <li><a href="<?php echo $strHostName;?>/refer_a_friend.php">Get friends to subscribe</a></li>
        </ul>
        </div>
        <div style="width: 191px; float: left; border: solid 0px #FF66CC;">
        <ul>          
          <li><a href="<?php echo $strHostName;?>/page_doctor.php?dir=doctor/login">Doctor Login</a></li>          
          <li><a href="<?php echo $strHostName;?>/page_doctor.php?dir=md/login">MD Login</a></li>          
          <li><a href="<?php echo $strHostName;?>/page_doctor.php?dir=nutritionist/login">Nutritionist Login</a></li>
          <li><a href="<?php echo $strHostName;?>/page_doctor.php?dir=clerk/login">Staff Login</a></li>
          </ul>
        </div>
        <div style="width: 191px; float: left; border: solid 0px #FF66CC;">
         <ul> 
         <li><a href="<?php echo $strHostName;?>/reward_points_deals.php">Store</a></li>
          <li><a href="<?php echo $strHostName;?>/careers.php">Careers</a></li>
          <li><a href="<?php echo $strHostName;?>/write_a_blog.php">Write a blog</a></li>
          <li><a href="<?php echo $strHostName;?>/likedus.php">Liked Us</a></li>
        </ul>
        </div>
        <div style="width: 191px; float: left; border: solid 0px #FF66CC;">
          <li><a href="<?php echo $strHostName;?>/disclaimer.php">Disclaimer</a></li>
          <li><a href="<?php echo $strHostName;?>/privacy_policy.php">Privacy Policy</a></li>
          <!--<li><a href="#">Become a Ambassador</a></li>-->
          <li><a href="<?php echo $strHostName;?>/terms_conditions.php">Terms & Conditions</a></li>
          <li>&nbsp;</li>
        </div>
      </ul>
    </div>
    
    <div style="width: 195px; float: left; border: solid 0px #0033CC;">
    <div class="help_no f_l">
      <h3 style="font-size: 16px;">Need Help? Let's talk</h3>
      <ul>
        <li  style="display:none;"><span class="phone"></span>1800 336 9987</li>
        <!--<li><a href="mailto:support@alivemeter.com" target="_blank"><img src="images/supportmail.jpg" alt="" title="" border="0" /></a></li>-->
        <li><span class="email"></span>support@alivemeter.com</li>
        <li style="display:none;"><span class="chat"></span><a href="#">Live Chat Support</a></li>
      </ul>
    </div>
    <div class="f_follow f_l">
      	<h3 style="font-size: 16px;">Follow Us</h3>
      	<a href="https://www.facebook.com/pages/Alivemeter/687872857994981" target="_blank" class="faceBook"> face book</a> <a href="https://twitter.com/@alivemeter" target="_blank" class="tweet">tweet</a> <!--<a href="#" class="google">google</a> <a href="#" class="blog">blog</a> <a href="#" class="you">youtube</a>-->
      </div>
      </div>
    <div class="cb ft_border"></div>
    <div class="copy_r">
      <div class="copy">Copyright &copy; 2014 Alivemeter</div>
      <div class="secure" style="text-align:right; float:right;"> <span id="siteseal"><script type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=shoZuYiuiKMLb9fSGFHb6XqEnhqHER8oB6wHCJRZKFJslAn25ATZ2RIFn"></script></span> </div>
    </div>
  </div>
</footer>
<?php if(isset($_GET['dir'])){?>
<?php if(($strWebsitePageName!="index.php") && ($strWebsitePageName!="deals.php") && $_GET['dir']!="health/setup" && $_GET['dir']!="calories/setup3"  && $_GET['dir']!="calendar/daily_tracking" && $_GET['dir']!="doctor/client" && $_GET['dir']!="doctor/details" && $_GET['dir']!="md/client" && $_GET['dir']!="md/details" && $_GET['dir']!="nutritionist/client_details" && $_GET['dir']!="nutritionist/details" && $_GET['dir']!="inbox/view_mails"){?>
<script type="text/javascript" src="js/jquery.form-2.4.0.min.js"></script>
<script type="text/javascript" src="js/jqeasy.dropdown.min.js"></script>
<script type="text/javascript" src="js/jQuery.1.8.2.js"></script>
<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript"> $.noConflict();</script>
<?php }} ?>
<?php if(isset($_GET['dir'])){?>
<?php if($_GET['dir']=="calories/setup3"  || $_GET['dir']=="calendar/daily_tracking" || $_GET['dir']=="nutritionist/details"){?>
<!--<script type="text/javascript" src="<?php echo $strHostName;?>/js/jquery.form-2.4.0.min.js"></script>
<script type="text/javascript" src="<?php echo $strHostName;?>/js/jqeasy.dropdown.min.js"></script>-->
<script type="text/javascript">

var countries=new ddtabcontent("tabstabs");
countries.setpersist(true);
countries.setselectedClassTarget("link"); //"link" or "linkparent"
countries.init();

var countries1=new ddtabcontent("calorie_tab");
countries1.setpersist(true);
countries1.setselectedClassTarget("link"); //"link" or "linkparent"
countries1.init();

countries.expandit(0)
countries1.expandit(0)

//SetFrameHeight();

</script>
<?php } ?>
<?php if($_GET['dir']=="calories/setup4"){?>
<script type="text/javascript" src="<?php echo $strHostName;?>/js/jquery.form-2.4.0.min.js"></script>
<script type="text/javascript" src="<?php echo $strHostName;?>/js/jqeasy.dropdown.min.js"></script>
<script type="text/javascript">

var countries2=new ddtabcontent("tabstabs10");
countries2.setpersist(true);
countries2.setselectedClassTarget("link"); //"link" or "linkparent"
countries2.init();
 

</script>

<?php } ?>
<?php } ?>
<?php mysql_close(); ?>