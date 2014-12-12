<?php include 'includes/common.inc.php'?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Alivemeter | Track Health Online | Health Advice</title>
<meta name="description" content="Alivemeter is an all-round online health tool – check symptoms, refer doctors and nutritionists, and do much more.">
<meta name="keywords" content="medical history online, health advice online, track health, doctors online, symptom check online, track calories, nutritionist online">
<?php include 'includes/links.php'?>

<script type="text/javascript">
function ShowMember(type)
{
	if(type="Show")
	{
		document.getElementById("DvPlusMember").style.display="";
	}
	else
	{
		document.getElementById("DvPlusMember").style.display="none";
	}
}
</script>
</head>
<body>
<?php include 'includes/top.php'?>
<section>

 <?php if(isset($_SESSION['UserID'])) { ?> 
  <div class="dvFloat">
    <?php include "includes/dashboard_top.inc.php";?>
  </div>
  <?php } ?>
  
  
  
</section>
<section>
  <div class="top_ou">
    <div class="top_in">
      <div class="top">
        <div class="b_crumb"><a href="<?php echo $strHostName;?>/index.php">Home></a> Health</div>
        <h1><span class="f_green"> Health</span></h1>
        <div style=" text-align:center">Healthcare related costs and complexities can easily derail your family’s financial plans. It is important you take charge of your health. <br>From exercising right to portion control, we will help you break a lifetime of bad habits.</div>
        <div class="cal_12">
          <div class="top_banner_health">
            <ul class="health_slider">
              <li>
                <p class="img"><img src="<?php echo $strHostName;?>/images/health/01.png" width="244" height="266" alt="Being Prepared is The New Normal" title="Being Prepared is The New Normal"></p>
                <h3 class="f_red">Being Prepared is The New Normal</h3>
                <p class="details">Healthcare costs are increasing at an alarming rate; saving is not enough anymore. Smart planning and investments are the need-of-the-hour. It’s time you secure your health and that of your loved ones.</p>
              </li>
              
              <li>
                <p class="img"><img src="<?php echo $strHostName;?>/images/health/02.png" width="265" height="266" alt="3 Hours Per Week – Seems Doable?" title="3 Hours Per Week – Seems Doable?"></p>
                <h3 class="f_red">3 Hours Per Week – Seems Doable?</h3>
                <p class="details">150 minutes per week to a healthier you. That’s right! Exercising just about 150 minutes every week is enough to improve your overall health. And what’s more, you can reduce the risks of obesity-related lifestyle diseases. Do you have 3 hours?</p>
              </li>
              
              <li>
                <p class="img"><img src="<?php echo $strHostName;?>/images/health/03.png" width="244" height="266" alt="It’s Never Too Late" title="It’s Never Too Late"></p>
                <h3 class="f_red">It’s Never Too Late</h3>
                <p class="details">Your heart is more lenient than you may think. <br>You have the power to control and even reverse the effects of heart disease, if you let go of harmful habits and embrace a healthier lifestyle. And, the earlier you do it, the better it is for your heart and health.</p>
              </li>
              
              <li>
                <p class="img"><img src="<?php echo $strHostName;?>/images/health/04.png" width="265" height="266" alt="Lifestyle Change or Lifestyle Diseases?" title="Lifestyle Change or Lifestyle Diseases?"></p>
                <h3 class="f_red">Lifestyle Change or Lifestyle Diseases?</h3>
                <p class="details">It’s no news that our sedentary lifestyle has invited a host of lifestyle diseases. One unhealthy habit or a seemingly harmless craving can put your life in danger. Simple lifestyle change can alter your course towards healthier living. You willing to make that change?</p>
              </li>
              
              <li>
                <p class="img"><img src="<?php echo $strHostName;?>/images/health/05.png" width="380" height="266" alt="Measure to Manage" title="Measure to Manage"></p>
                <h3 class="f_red">Measure to Manage</h3>
                <p class="details">Here is a simple mantra that can help you secure your health – Measure to Manage! From reading food labels to evaluating health insurance, each measure you take can help you proactively manage your health.
</p>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="cal_full_size gray_bg m_b">
    <div class="cal_12 m_outo">
      <h2 class="f_red tx_cent hed"><span class="bold">Step 1:</span> Get Your Free Alivemeter Access </h2>
      <div class="row_01 tx_cent">They say the first step is always the most difficult one. However, with Alivemeter, every step is easy and logical! When you register with us, you get access to our intuitive and user-friendly dashboard, which allows you to update your health related information about you and your family (Four members family). At first, you may have to take out a bit of time; you might even skip a day or two. But slowly, its easy-to-use interface and real time changes will start to bring positive changes in your life. After all, all it takes is just 10 minutes of your daily routine that ensures the rest of your time is in your control.</div>
      <div class="row_01" style="padding-bottom:0">
        <div class="free_hed">
          <h4 class="f_red">Records</h4>
          <?php if(isset($_SESSION['UserID'])) { ?>
          	<a>FREE</a>
          	<?php } else { ?><a href="<?php echo $strHostName;?>/page.php?dir=registration/step1">FREE</a>
          <?php } ?>
          </div>
        
        <div class="cal_12 f_l">
          <div class="heal_icon2"></div>
          <div class="heal_det1">
            <p class="f_green">HEALTH</p>
            <p style="padding-top: 8px;">Update your entire family medical history and test records. View the records anytime anywhere.</p>
          </div>
        </div>
      </div>
      <div class="row_01" style="padding-bottom:0">
        <div class="free_hed">
          <h4 class="f_red">TRACKING</h4>
          <a href="<?php echo $strHostName;?>/page.php?dir=registration/step1">FREE</a></div>
        <div class="cal_12">
          <div class="heal_icon4"></div>
          <div class="heal_det1">
            <p class="f_green">HEALTH</p>
            <p style="padding-top: 8px;">Set priorities and track your calories, blood sugar levels, alcohol and cigarette consumption; daily, weekly and monthly. Get free Lifestyle Assessment Report by your nutritionist. The assessment will provide personalized information on the effect of lifestyle factors on your health. </p>
          </div>
        </div>
      </div>
      <div class="row_01" style="padding-bottom:0">
        <div class="free_hed">
          <h4 class="f_red">REMINDER & NOTIFICATION</h4>
         <a href="<?php echo $strHostName;?>/page.php?dir=registration/step1">FREE</a></div>
        
        <div class="cal_12">
          <div class="heal_icon6"></div>
          <div class="heal_det1">
            <p class="f_green">HEALTH</p>
            <p style="padding-top: 8px;">Set medicine intake and purchase reminders. Get immunization and doctor visit notification.
 </p>
          </div>
        </div>
      </div>
      
      <div class="row_01" style="padding-bottom: 25px;">
        <div class="free_hed">
          <h4 class="f_red">TAKE IT ALL WITH YOU</h4>
          <a href="<?php echo $strHostName;?>/page.php?dir=registration/step1">FREE</a></div>
        <div class="t_icon" style="margin-left:40px"><img src="<?php echo $strHostName;?>/images/h_01.gif" width="80" height="81" alt="REMINDER &amp; NOTIFICATION" title="REMINDER &amp; NOTIFICATION"></div>
        <div class="t_icon"><img src="<?php echo $strHostName;?>/images/h_02.gif" width="88" height="88" alt="REMINDER &amp; NOTIFICATION" title="REMINDER &amp; NOTIFICATION"></div>
        <div class="t_icon"><img src="<?php echo $strHostName;?>/images/h_03.gif" width="80" height="81" alt="REMINDER &amp; NOTIFICATION" title="REMINDER &amp; NOTIFICATION"></div>
        <div class="t_icon"><img src="<?php echo $strHostName;?>/images/h_04.gif" width="89" height="89" alt="REMINDER &amp; NOTIFICATION" title="REMINDER &amp; NOTIFICATION"></div>
        <div class="t_icon" style="margin-right:0"><img src="images/h_05.gif" width="88" height="88" alt="REMINDER &amp; NOTIFICATION" title="REMINDER &amp; NOTIFICATION"></div>
        <div class="tx_cent m_b">Having access to your entire family health records on-the-go is way more fun. Right?</div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="cal_12 m_outo">
    <div class="cal_12">
      <h2 class="f_red tx_cent hed"><a name="step_2" style="color: #009999;"><span class="bold">Step 2:</span> Upgrade To Reach Your Health<!-- and Financial--> Independence!</a></h2>
      <div class="tx_cent">Just like crash diets have been known to not work, except you end up piling the pounds again, crash money diets also do not work. What can work, are simple, consistent changes in lifestyle that you can easily follow which slowly becomes a part of your daily routine. Becoming a <!--premium member at AdviceOnline--> Alivemeter plus member is one such step. Soon, we will become a part of your 24-hour schedule. It is easy to manage your life when you have experts around you!</div>
      <h2 class="t18 f_red tx_cent hed">Reach specialized doctors at the click of a button with</h2>
      <div class="m_outo" style="width:318px"><img src="<?php echo $strHostName;?>/images/alivremeter_plus.png" width="318" height="88" alt="Alivemeter plus" title="Alivemeter plus"></div>
      <div class="row_01 m_t border_b">
        <div class="cal_6_12 f_l">
          <div class="a_plus_box"> <img src="<?php echo $strHostName;?>/images/key_icon.jpg" width="164" height="110" alt="Unlimited access" title="Unlimited access" class="m_outo d_block p_b">
            <h4 class="alive_plus">Unlimited access </h4>
            <div class="tx_cent">We do not fall sick by choice so why set limit or charge per query. At Alivemeter we have no restrictions on number of queries asked. All your health query reaches the medical officers (qualified MBBS) attached to our panel of hospitals<!-- closest to your residence-->.  Basis the medical condition/ emergency/ request the medical officer replies to your query or escalates to relevant specialist medical practitioner at no additional cost. </div>
          </div>
        </div>
        <div class="cal_6_12 f_l ">
          <div class="a_plus_box f_r"> <img src="<?php echo $strHostName;?>/images/video_icon.jpg" width="109" height="109" alt="Video Query" title="Video Query" class="m_outo d_block p_b">
            <h4 class="alive_plus">Video Query </h4>
            <div class="tx_cent">One can request for a video interaction to explain your medical condition also our doctors proactively ask for a video interaction to better understand your problem. Video interactions are referred exclusively to specialist medical practitioners. The medical officers does the preliminary screening of video requests and escalates to relevant specialist.</div>
          </div>
        </div>
      </div>
      <h2 class="t18 f_red tx_cent hed">Interact with your personal nutritionist on the go with </h2>
      <div class="m_outo" style="width:318px"><img src="<?php echo $strHostName;?>/images/alivremeter_plus.png" width="318" height="88" alt="Alivemeter plus" title="Alivemeter plus"></div>
      <div class="row_01 m_t border_b">
        <div class="cal_6_12 f_l">
          <div class="a_plus_box"> <img src="<?php echo $strHostName;?>/images/diet_chart_icon.jpg" width="88" height="90" alt="Personalized diet chart" title="Personalized diet chart" class="m_outo d_block p_b" style="padding-top:40px">
            <h4 class="alive_plus">Personalized diet chart</h4>
            <div class="tx_cent">It is not about the one time diet chart. Here it is a continuous process of daily tracking of calorie consumption. We understand the fast paced life and the demands of changing lifestyle which takes a toll on your eating habits.  Our diet chart is not a one time document but an on-going consultative and practical approach to daily diet as per every individual. </div>
          </div>
        </div>
        <div class="cal_6_12 f_l ">
          <div class="a_plus_box f_r"> <img src="<?php echo $strHostName;?>/images/Track_icon.jpg" width="125" height="127" alt="Track Progress" title="Track Progress" class="m_outo d_block p_b">
            <h4 class="alive_plus">Track Progress</h4>
            <div class="tx_cent">You do not wait for your next appointment to know your progress. Any time any where you can reach out to your nutritionist as well you will find us proactive with our updates and regular notifications keeping you in the right track. </div>
          </div>
        </div>
      </div>
      
      <h2 class="t18 f_red tx_cent hed">Get rewarded by engaging on your site as </h2>
      <div class="m_outo" style="width:318px"><img src="<?php echo $strHostName;?>/images/alivremeter_plus.png" width="318" height="88" alt="Alivemeter plus"></div>
      <div class="row_01 m_t">
        <div class="cal_6_12 f_l">
          <div class="a_plus_box"> <img src="<?php echo $strHostName;?>/images/deal_icon.jpg" width="116" height="122" alt="Exclusive Deals" title="Exclusive Deals" class="m_outo d_block p_b">
            <h4 class="alive_plus">Exclusive Deals </h4>
            <div class="tx_cent">Our deals section with hyper local deals covering health and wellness will periodically bring exclusive offers for our Alivemeter plus
 <!--premium--> members.</div>
          </div>
        </div>
        <div class="cal_6_12 f_l ">
          <div class="a_plus_box f_r"> <img src="<?php echo $strHostName;?>/images/Reward_icon.jpg" width="156" height="102" alt="Reward Points" title="Reward Points" class="m_outo d_block p_b" style="padding-top:18px">
            <h4 class="alive_plus">Reward Points</h4>
            <div class="tx_cent">It is easy to earn points on our site, <!--click to know more. R-->redeem points at the store as alivemeterplus members. Keep visiting the reward points and store section for exclusive offers. </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<section>
  <div class="cal_full_size gray_bg m_b">
    <div class="cal_12 m_outo">
      <h2 class="f_red tx_cent hed" style=" margin:30px">Ready to get started?</h2>
      <div class="cal_6_12 f_l" style=" border-right:1px dashed #999">
        <div class="a_plus_box">
          <h4 style="font-size:18px; text-align:right; color:#009999">Begin your journey</h4>
          <p class="tx_right" style="padding-top: 10px;">Register for free and see how our intuitive tools become a part of <br>
            your daily routine </p>
          <div style="margin-top:40px"><a href="<?php echo $strHostName;?>/page.php?dir=registration/step1" class="buttongrey" style="width:205px; float:right">Become a free member<span></span></a></div>
        </div>
      </div>
      <div class="cal_6_12 f_l">
        <div class="a_plus_box f_r">
          <h4 style="font-size:18px; text-align:left; color:#009999" > Decide what you want</h4>
          <p style="padding-top: 10px;">Get a professional by your side and see how much progress you can make in a span of 12 months. As <!--both--> health <!--and wealth -->requires long term disciplined approach, we have a<!-- single annual package of Rs. XXXX--> designed our packages to suite your need. Check our packages.</p>
          <div style="margin-top:15px"><a style="cursor:pointer;" onClick="javascript:ShowMember('Show')"><img src="images/alivremeter_plus_small1.png" alt="" title="" border="0"></a></div>
        </div>
      </div>
      <div class="cb" style="height:40px"></div>
    </div>
  </div>
</section>
<section>
  <div class="cal_12 m_outo">
   <div class="cal_12 m_t" style="border: solid 0px #996633; text-align:center; padding:20px 0; display:none;" id="DvPlusMember">
   		<?php if(isset($_SESSION['UserID'])) { ?><a><img src="images/header/banner09.png" alt="" border="0" usemap="#Map" title="">
<map name="Map"><area shape="rect" coords="601,226,743,264" href="#"></map></a>
<?php } else { ?>
                        <img src="images/header/banner09.png" alt="" usemap="#Map" title="" border="0"><?php } ?><map name="Map"><area shape="rect" coords="601,226,743,264" href="<?php echo $strHostName;?>/page.php?dir=registration/step1"></map>
    </div>
    <div class="cal_12 m_t" style="border: solid 0px #996633;margin-bottom:20px;">
        <div class="health_plandv" style="display: none;">
        	<h4 style="font-size:18px; text-align:left; color:#c02c3e; text-transform: uppercase;">MONTHLY PLAN</h4>
            <h4 class="alive_plus" style="text-align:left;">Rs. xxxxx</h4>
            <p style="padding: 10px 0px;">Get a professional by your side and see how much progress you can make in a span of 12 months. As both health and wealth requires long term disciplined approach, we have a single annual package of <br>
            Rs. XXXX </p>
            
            <div style="width:115px; height:30px; float:left;padding-right:10px;"> <a href="#" class="button4">JOIN NOW <span></span></a></div>
        </div>
        <div class="health_plandv" style="display: none;">
        	<h4 style="font-size:18px; text-align:left; color:#c02c3e; text-transform: uppercase;">MONTHLY PLAN</h4>
            <h4 class="alive_plus" style="text-align:left;">Rs. xxxxx</h4>
            <p style="padding: 10px 0px;">Get a professional by your side and see how much progress you can make in a span of 12 months. As both health and wealth requires long term disciplined approach, we have a single annual package of <br>
            Rs. XXXX </p>
            
            <div style="width:115px; height:30px; float:left;padding-right:10px;"> <a href="#" class="button4">JOIN NOW <span></span></a></div>
        </div>
        <div class="health_plandv" style="display: none;">
        	<h4 style="font-size:18px; text-align:left; color:#c02c3e; text-transform: uppercase;">MONTHLY PLAN</h4>
            <h4 class="alive_plus" style="text-align:left;">Rs. xxxxx</h4>
            <p style="padding: 10px 0px;">Get a professional by your side and see how much progress you can make in a span of 12 months. As both health and wealth requires long term disciplined approach, we have a single annual package of <br>
            Rs. XXXX </p>
            
            <div style="width:115px; height:30px; float:left;padding-right:10px;"> <a href="#" class="button4">JOIN NOW <span></span></a></div>
        </div>
    </div>
  </div>
</section>
<?php include 'includes/bottom.php'?>
<script type="text/javascript" src="<?php echo $strHostName;?>/js/jQuery.1.8.2.js"></script>
<script type="text/javascript" src="<?php echo $strHostName;?>/js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="<?php echo $strHostName;?>/js/custom1.js"></script>

<script type="text/javascript" src="<?php echo $strHostName;?>/js/jquery.form-2.4.0.min.js"></script>
<script type="text/javascript" src="<?php echo $strHostName;?>/js/jqeasy.dropdown.min.js"></script>
</body>
</html>
