<?php include 'includes/common.inc.php'?>
<?php 
$strGetCatId="0";
if(isset($_GET['cid']))
	{
		$cid = $converter->decode($_GET['cid']);
	//	Alert($cid);
	}

	if(isset($_GET['cateid']))
	{
		//$cateid = $converter->decode($_GET['cateid']);
	/// Alert($cateid);
	}

		 $query_1 = "SELECT * FROM  ".Deal." where isactive=1 and isdeleted=0 and deal_id=".$cid;
			///echo $query_1;
			$result_1 = mysql_query($query_1);							
			if($result_1 != "") {	
				$rowcount  = mysql_num_rows($result_1);
				if($rowcount > 0) {
					while($row_1 = mysql_fetch_assoc($result_1)) {
						extract($row_1);
						$strGetCatId=$row_1['deal_category'];
					
		?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<meta name="description" content="<?php echo str_replace("\\","",$row_1['meta_description']);?>">

<meta name="keywords" content="<?php echo str_replace("\\","",$row_1['meta_keywords']);?>">


<title><?php echo str_replace("\\","",$row_1['meta_title']);?></title>

<meta property="og:title" content="<?php echo str_replace("\\","",$row_1['meta_title']);?>"/>
<meta property="og:description" content="<?php echo str_replace("\\","",$row_1['meta_description']);?>" />

<meta property="og:image" content="<?php echo $row_1['image_url'];?>" />


<?php }}} ?>

<?php include 'includes/page_links.inc.php'?>

<link href="style/main.css" rel="stylesheet" type="text/css">
<link href="style/reset.css" rel="stylesheet" type="text/css">
<link href="style/fonts.css" rel="stylesheet" type="text/css">
<script type="text/javascript" language="javascript" src="js/jquery-1.3.2.min.js"></script>
<link href="style/paging_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="js/scrolltopcontrol.js"></script>
<script type="text/javascript" src="gallery/jquery-1.8.3.min.js"></script>
<link rel="stylesheet" type="text/css" href="gallery/jquery.bxslider.css" media="all" />
<script type="text/javascript" src="gallery/jquery.bxslider.js"></script>
<link href="style/bhupali.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" href="css/example.css" type="text/css">
<link rel="stylesheet" href="css/dropkick.css" type="text/css">
<script src="js/jquery.dropkick-1.0.0.js" type="text/javascript"></script>
<script type="text/javascript">var switchTo5x=true;</script>
<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">stLight.options({publisher: "9b2a4203-4b19-4328-922d-0dc69b8164f3", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>


<script type="text/javascript" charset="utf-8">
	$(function () {
	  $('.existing_event').dropkick({
		change: function () {
		  $(this).change();
		}
	  });
	});
	
	
	
	
function GetCouponCode(couponid)
{
	//alert ("dfdf");
	document.getElementById("txtCoupnCode").value=couponid;
	var totalcpn = document.getElementById("txtTotalCpn").value;
	
	var cpnid=couponid;
	
	//alert (totalcpn);
	
	
		
			if (totalcpn == 0)
			{
				if(confirm ("Are you sure want to get this coupon?"))
				{	
					if(cpnid!= "" ) {
						//	document.getElementById("loading").style.display='';
							if (window.XMLHttpRequest)
							{// code for IE7+, Firefox, Chrome, Opera, Safari
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
									message = xmlhttp.responseText;
									///document.getElementById("DvDeals").innerHTML=message;
								}
								
							}
							
							//alert(hostname+"/includes/get_coupon.inc.php?value="+cpnid);
							xmlhttp.open("GET",hostname+"/includes/get_coupon.inc.php?value="+cpnid, true);
							xmlhttp.send();
							Popup.showModal('dvdeals-popup',null,null,{'screenColor':'#000','screenOpacity':.6});
							
							
						}
				}
				
				else
				{
					//
				}
				
			}
			else
			{
				alert ("Sorry! You have already got this coupon.");
			}
		
	
}

</script>
</head>
<body>

<?php include 'includes/top.php'?>
<section>
  <?php if ($doc_consult_count > 0 && $medication_count > 0 && $allergies_count > 0  && $hospitalization_count > 0 && $immunization_count > 0 && $health_problem_count > 0 && $family_history_count > 0 && $blood_pressure_count > 0 && $sugar_profile_count > 0 && $life_style_count > 0 && $lipid_profile_count > 0) { ?>
  <div class="dvFloat">
    <?php include "includes/dashboard_top.inc.php";?>
  </div>
  <?php } ?>
</section>

<?php

if(isset($_SESSION['UserID'])){$user_id=$_SESSION['UserID'];}



$cateid="0";  $cid="0";

if(isset($_GET['cid']))
{
	$cid=$converter->decode($_GET['cid']);
}
$totalcpn=GetValue("select Count(*) as col from ".Get_Coupon."  where coupon_id=".$cid." and user_id=".$user_id."", "col");


//if(isset($_GET['cateid']))
//{
	//$cateid=$converter->decode($_GET['cateid']);
	
	$catname=GetValue("select deal_cat_name as col from tbl_deal_category where deal_cat_id=".$strGetCatId, "col");
//}



	   $query = "SELECT * FROM ".Deal." WHERE deal_id=".$cid;
		//echo $query;
		$result = mysql_query($query);
		if($result != "") {
			$rowcount = mysql_num_rows($result);
			if($rowcount > 0) {
				while($row = mysql_fetch_assoc($result)) {
					extract($row);
					$image=$row['image'];
					$title=$row['title'];
						$locality=GetValue("select location_name as col from ".Location." where location_id=".$locality, "col");
						$city=GetValue("select city_name as col from ".City." where city_id=".$city, "col");	
				}}}	
       ?>
       
       

<section>
  <div class="top_ou">
    <div class="top_in">
      <div class="top">
        <div class="b_crumb"><a href="<?php echo $strHostName;?>/index.php">Home ></a> <a href="<?php echo $strHostName;?>/deals.php">Deals ></a> <?php echo $catname;?></div>
        <h1 class="f_red">deals</h1>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="cal_full_size gray_bg">
    <div class="cal_12 m_outo">
      <div class="row_01" style="padding:0;background: #f0f0f0; display:none;">
        <div class="search_deals" style="width:257px; border: solid 0px #336699;">
          <label style="padding-top:5px; float:left; width: 50px;">State</label>
          <label style="position:absolute; z-index:1; border: solid 0px #996600; width: 172px;">
          <select name="state_search" id="state_search" tabindex="1"  class="existing_event" style="width: 120px;">
            <option value="0">Select</option>
            <option value="1">Maharashtra</option>
               <option value="1">Maharashtra</option>
                  <option value="1">Maharashtra</option>
          </select>
          </label>
        </div>
        <div class="search_deals" style="width:245px;">
          <label style="padding-top:5px; float:left; width: 50px;">City</label>
           <label style="position:absolute; z-index:1">
          <select name="city_search" id="city_search" tabindex="1"  class="existing_event" style="width: 120px;">
            <option value="0">Select</option>
            <option value="1">Maharashtra</option>
          </select>
          </label>
        </div>
        <div class="search_deals" style="width:270px;">
          <label style="padding-top:5px; float:left">Locality</label>
        <label style="position:absolute; z-index:1">
          <select name="search_locality" id="search_locality" tabindex="1"  class="existing_event" style="width: 120px;">
            <option value="0">Select</option>
            <option value="1">Maharashtra</option>
          </select>
          </label>
        </div>
        <div class="search_deals" style="width:90px; margin-left: 55px;"><a href="#" class=" button1">Search</a></div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="cal_full_size gray_bg">
  <div class="cal_12 m_outo">
    <div class="cal_12">
      <div class="deals_menu" style="margin-bottom: 5px; border:solid 0px red; width: 1000px; display:none;">
        <ul>
          <?php 
				$query = "SELECT * FROM ".Deal_Category." WHERE deal_cat_id <> 0";
				//echo $query;
				$result = mysql_query($query);
				if($result != "") {
				$rowcount = mysql_num_rows($result);
				if($rowcount > 0) {
					while($row = mysql_fetch_assoc($result)) {
						extract($row);
						$cat_count=GetValue("select Count(*) as col from ".Deal." where deal_category=".$row['deal_cat_id'], "col");		
						
					
			?>
          	<li class="" id="dealcat<?php echo $row['deal_cat_id'];?>" style="border: solid 0px #0066FF; width: 240px;">
            	
                <?php if($row['deal_cat_id']=="1") { ?>
                <a class="home" style="cursor:pointer;" onClick="javascript:GetDeals('<?php echo $row['deal_cat_id'];?>')"><?php echo $row['deal_cat_name'];?><span>(<?php echo $cat_count;?>)</span>
                 </a>
                <?php } else if($row['deal_cat_id']=="2") { ?>
                 <a class="fitness" style="cursor:pointer;" onClick="javascript:GetDeals('<?php echo $row['deal_cat_id'];?>')"><?php echo $row['deal_cat_name'];?><span>(<?php echo $cat_count;?>)</span>
                 </a>
                  <?php } else if($row['deal_cat_id']=="3") { ?>
                 <a class="health" style="cursor:pointer;" onClick="javascript:GetDeals('<?php echo $row['deal_cat_id'];?>')"><?php echo $row['deal_cat_name'];?><span>(<?php echo $cat_count;?>)</span>
                 </a>
                  <?php } else if($row['deal_cat_id']=="4") { ?>
                 <a class="diagnostic" style="cursor:pointer; width:170px; padding:3px 0px 3px 60px" onClick="javascript:GetDeals('<?php echo $row['deal_cat_id'];?>')"><?php echo $row['deal_cat_name'];?><span>(<?php echo $cat_count;?>)</span>
                 </a>
                <?php } ?>
            
             
             
             </li>
         <?php }}} ?> 
        </ul>
      </div>
      </div>
      </div>
      </div>
      
      <div class="cal_12 m_outo">
    <div class="cal_12">
    	<div class="wd1000 m_t m_b" style="padding-top: 20px;">
        <div class="dealshead">
          <div class="ldv">
            <div class="wd1000 f_l">
              <div class="boxd"> <i><?php echo $offer; ?>
                <span style="font-size: 12px;"></span></i>
                <div class="boxd_in">
                  <div class="wd1000 f_l imgs"><img  alt="<?php echo $detail_img_title;?>" title="<?php echo $detail_img_title;?>" src="<?php echo $strHostName;?>/top_stories/<?php echo $detail_img;?>" border="" width="374" height="202"></div>
                  <div class="wd1000 f_l shadow"><img src="<?php echo $strHostName;?>/images/deals/deals_details_shadow.png" alt="" title="" border="0" ></div>
                </div>
              </div>
            </div>
          </div>
          <div class="middv">
            <div class="f_red" style="border: solid 0px #006699; width: 50%; float: left;">
              <p style="font-weight: bold; font-size: 24px;"><?php echo str_replace("''","'",$vendor);?></p> 
            </div>
            <div class="rdv" style="border: solid 0px #006699; width: 49%; float: left; text-align: right; z-index:9999; position:relative;">
            	<img src="<?php echo $strHostName;?>/images/share_btn.png" alt="" title="">
								  <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $strHostName;?>/deals/<?php echo $_GET['url_code'];?>/<?php echo $_GET['cid'];?>" target="_blank"><img src="<?php echo $strHostName;?>/images/facebook_btn.png" alt="" title=""></a>

								 <a href="https://twitter.com/intent/tweet?text=<?php echo $meta_description." via @alivemeter";?>&url=%2F&original_referer=http%3A%2F%2Fwww.alivemeter.com%2F" target="_blank"><img src="<?php echo $strHostName;?>/images/twitter_btn.png" alt="" title=""></a>
            
            </div> 

           <div class="DvFloat">
              <p class="p1" style="font-size: 13px;"><?php echo $locality; ?>, <?php echo $city; ?></p>
              <p class="p1" style="font-size: 13px;"><?php echo str_replace("''","'",$title);?></p>
                  <p class="p1" style="font-size: 13px; text-align: justify; font-family: 'myriad_web_proregular';"><?php echo str_replace("''","'",$description);?></p>
            </div>
            <div class="DvFloat">
              <div class="rated">
                <div class="rtd"><span class="WebRupee">Rs.</span><?php echo $cut_price; ?></div>
                <div class="rtd_final"><span class="WebRupee">Rs.</span><?php echo $actual_price; ?></div>
              </div>
            </div>
            <div class="DvFloat">
            
            <input type="hidden" name="txtTotalCpn" id="txtTotalCpn" value="<?php echo $totalcpn;?>" />
             <div class="cupd_btn">
             			
                        <?php if(isset($_SESSION['UserID'])) { ?>
							<a style="cursor: pointer; padding: 3px 9px 3px 7px;" class="buttoncupondeals" target="_parent" onClick="javascript:GetCouponCode('<?php echo $deal_id;?>');">Get Coupon <span></span></a>
                        <?php } else { ?>
                        	<a class="buttoncupondeals" onClick="javascript: alert('You must login to get this coupon.');" style="cursor:pointer; text-decoration:none; padding-left:10px;">Get Coupon <span></span></a>
                        <?php } ?>
                        </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</section>
<section>
  <div class="cal_full_size gray_bg m_b">
    <div class="cal_12 m_outo">
      <div class="dealsdetail">
        <div class="hdlmbox">
          <div class="f_red titlefont">Highlights</div>
          
           <?php if($highlights!="") { ?>
              <div class="width" style="line-height: 17px;">
                	<!--<span class="f_red">&bull;</span>&nbsp; --> <span class=""><?php echo str_replace("''","'",$highlights);?> </span>
           	  </div>
           <?php } ?>
           
           
           <?php if($highlights1!="") { ?>
              <div class="width" style="line-height: 17px;">
                	<!--<span class="f_red">&bull;</span>&nbsp; --> <span class=""><?php echo str_replace("''","'",$highlights1);?></span>
           	  </div>
           <?php } ?>
           
           
           <?php if($highlights2!="") { ?>
              <div class="width" style="line-height: 17px;">
                	<!--<span class="f_red">&bull;</span>&nbsp; --> <span class=""><?php echo str_replace("''","'",$highlights2);?> </span>
           	  </div>
           <?php } ?>
           
           
           
            <?php if($highlights3!="") { ?>
              <div class="width" style="line-height: 17px;">
                	<!--<span class="f_red">&bull;</span>&nbsp; --> <span class=""><?php echo str_replace("''","'",$highlights3);?> </span>
           	  </div>
           <?php } ?>
           
             <?php if($highlights4!="") { ?>
              <div class="width" style="line-height: 17px;">
                	<!--<span class="f_red">&bull;</span>&nbsp; --> <span class=""><?php echo str_replace("''","'",$highlights4);?> </span>
           	  </div>
           <?php } ?>
           
           
           
             <?php if($highlights5!="") { ?>
              <div class="width" style="line-height: 17px;">
                	<!--<span class="f_red">&bull;</span>&nbsp; --> <span class=""><?php echo str_replace("''","'",$highlights5);?> </span>
           	  </div>
           <?php } ?>
           
           
            <?php if($highlights6!="") { ?>
              <div class="width" style="line-height: 17px;">
                	<!--<span class="f_red">&bull;</span>&nbsp; --> <span class=""><?php echo str_replace("''","'",$highlights6);?> </span>
           	  </div>
           <?php } ?>
           
           
           
             <?php if($highlights7!="") { ?>
              <div class="width" style="line-height: 17px;">
                	<!--<span class="f_red">&bull;</span>&nbsp; --> <span class=""><?php echo str_replace("''","'",$highlights7);?> </span>
           	  </div>
           <?php } ?>
           
           
           <?php if($highlights8!="") { ?>
              <div class="width" style="line-height: 17px;">
                	<!--<span class="f_red">&bull;</span>&nbsp; --> <span class=""><?php echo str_replace("''","'",$highlights8);?></span>
           	  </div>
           <?php } ?>
           
           
           <?php if($highlights9!="") { ?>
              <div class="width" style="line-height: 17px;">
                	<!--<span class="f_red">&bull;</span>&nbsp; --> <span class=""><?php echo str_replace("''","'",$highlights9);?> </span>
           	  </div>
           <?php } ?>
           
           
            <?php if($highlights=="" && $highlights1=="" && $highlights2=="" && $highlights3=="" && $highlights4=="" && $highlights5=="" && $highlights6=="" && $highlights7=="" && $highlights8=="" && $highlights9=="") { ?>
              <div class="width" style="line-height: 17px;">
                	<span class="f_red">
                    		There are no highlights !	
                    </span>
           	  </div>
           <?php } ?>
           
           
        </div>
        <div class="hdlmbox">
          <div class="f_red titlefont">Deal Terms</div>
          
            <?php if($deal_terms!="") { ?>
              <div class="width" style="line-height: 17px;">
                	<!--<span class="f_red">&bull;</span>&nbsp; --> <span class=""><?php echo str_replace("''","'",$deal_terms);?> </span>
           	  </div>
           <?php } ?>
           
           <?php if($deal_terms1!="") { ?>
              <div class="width" style="line-height: 17px;">
                	<!--<span class="f_red">&bull;</span>&nbsp; --> <span class=""><?php echo str_replace("''","'",$deal_terms1);?></span>
           	  </div>
           <?php } ?>
           
           
           <?php if($deal_terms2!="") { ?>
              <div class="width" style="line-height: 17px;">
                	<!--<span class="f_red">&bull;</span>&nbsp; --> <span class=""><?php echo str_replace("''","'",$deal_terms2);?> </span>
           	  </div>
           <?php } ?>
           
            <?php if($deal_terms3!="") { ?>
              <div class="width" style="line-height: 17px;">
                	<!--<span class="f_red">&bull;</span>&nbsp; --> <span class=""><?php echo str_replace("''","'",$deal_terms3);?> </span>
           	  </div>
           <?php } ?>
           
           
            <?php if($deal_terms4!="") { ?>
              <div class="width" style="line-height: 17px;">
                	<!--<span class="f_red">&bull;</span>&nbsp; --> <span class=""><?php echo str_replace("'","'",$deal_terms4);?> </span>
           	  </div>
           <?php } ?>
           
           
            <?php if($deal_terms5!="") { ?>
              <div class="width" style="line-height: 17px;">
                	<!--<span class="f_red">&bull;</span>&nbsp; --> <span class=""><?php echo str_replace("''","'",$deal_terms5);?> </span>
           	  </div>
           <?php } ?>
           
            <?php if($deal_terms6!="") { ?>
              <div class="width" style="line-height: 17px;">
                	<!--<span class="f_red">&bull;</span>&nbsp; --> <span class="f_darkblack"><?php echo str_replace("''","'",$deal_terms6);?> </span>
           	  </div>
           <?php } ?>
           
              <?php if($deal_terms7!="") { ?>
              <div class="width" style="line-height: 17px;">
                	<!--<span class="f_red">&bull;</span>&nbsp; --> <span class=""><?php echo str_replace("''","'",$deal_terms7);?></span>
           	  </div>
           <?php } ?>
           
           
           <?php if($deal_terms8!="") { ?>
              <div class="width" style="line-height: 17px;">
                	<!--<span class="f_red">&bull;</span>&nbsp; --> <span class=""><?php echo str_replace("''","'",$deal_terms8);?> </span>
           	  </div>
           <?php } ?>
           
           
             <?php if($deal_terms9!="") { ?>
              <div class="width" style="line-height: 17px;">
                	<!--<span class="f_red">&bull;</span>&nbsp; --> <span class=""><?php echo str_replace("''","'",$deal_terms9);?> </span>
           	  </div>
           <?php } ?>
           
            <?php if($deal_terms=="" && $deal_terms1=="" && $deal_terms2=="" && $deal_terms3=="" && $deal_terms4=="" && $deal_terms5=="" && $deal_terms6=="" && $deal_terms7=="" && $deal_terms8=="" && $deal_terms9=="") { ?>
              <div class="width" style="line-height: 17px;">
                	<span class="f_red">
                    		There is no deal term !	
                    </span>
           	  </div>
           <?php } ?>
           
      
          
        
        </div>
       
        <div class="hdlmbox">
          <div class="f_red titlefont">Location</div>
          
          
            <?php if($location!="") { ?>
              <div class="width" style="line-height: 17px;">
                	 <span class=""><?php echo str_replace("''","'",$location);?> </span>
           	  </div>
           <?php } ?>
           
           
             <?php if($location1!="") { ?>
              <div class="width" style="line-height: 17px;">
                	 <span class=""><?php echo str_replace("''","'",$location1);?> </span>
           	  </div>
           <?php } ?>
           
             <?php if($location2!="") { ?>
              <div class="width" style="line-height: 17px;">
                	 <span class=""><?php echo str_replace("''","'",$location2);?></span>
           	  </div>
           <?php } ?>
           
             <?php if($location3!="") { ?>
              <div class="width" style="line-height: 17px;">
                	 <span class=""><?php echo str_replace("''","'",$location3);?> </span>
           	  </div>
           <?php } ?>
           
             <?php if($location4!="") { ?>
              <div class="width" style="line-height: 17px;">
                	 <span class=""><?php echo str_replace("''","'",$location4);?> </span>
           	  </div>
           <?php } ?>
           
             <?php if($location5!="") { ?>
              <div class="width" style="line-height: 17px;">
                	 <span class=""><?php echo str_replace("''","'",$location5);?> </span>
           	  </div>
           <?php } ?>
             <?php if($location6!="") { ?>
              <div class="width" style="line-height: 17px;">
                	 <span class=""><?php echo str_replace("''","'",$location6);?> </span>
           	  </div>
           <?php } ?>
            
           
            <?php if($location=="" && $location1=="" && $location2=="" && $location3=="" && $location4=="" && $location5=="" && $location6=="") { ?>
              <div class="width" style="line-height: 17px;">
                	<span class="f_red">
                    		There is no location available!	
                    </span>
           	  </div>
           <?php } ?>
           
           
          
        </div>
        <div class="hdlmbox" style="margin-bottom:15px;">
          <div class="f_red titlefont">Map</div>
          <div class="width" style="width:263px; height:163px;"><?php echo str_replace("''","'",$map);?> <?php echo $map; ?></div>
        </div>
      </div>
    </div>
  </div>
</section>
<section>
<div class="cal_12 m_outo">
  <div class="cal_12">
    <div class="dealsdetail">
      <div class="titlefont f_red">The Fine Print</div>
      <div class="DvFloat" style="font-family: 'myriad_web_proregular';">
      	<?php if($fine_prints!="") { ?>
                <div class="DvFloat" style="padding: 10px 0px; text-align: justify; font-family: 'myriad_web_proregular';"> 
                	<p style="font-family: 'myriad_web_proregular';"><?php echo str_replace("''","'",$fine_prints);?></p>
                </div>
         <?php } else { ?>
          		<div class="DvFloat" style="padding: 10px 0px; text-align: justify;"> 
                	<span class="f_red">There is no fine print available!</span>
                </div>
         <?php } ?>
		 
		 
      </div>
    </div>
  </div>
</div>
</div>
</div>
<?php include 'includes/last_view_deal.inc.php'?>
<?php include 'includes/like_deal.inc.php'?>
<div class="cal_12 m_t" style="border: solid 0px #996633;margin-bottom:20px;"></div>
<?php include 'includes/bottom.php'?>

<div id="dvdeals-popup" style="text-align: center; width: 94%; display: none;position:absoulte;;margin-top:230px; margin-left:450px;">

        
        
        <table cellpadding="0" cellspacing="0" border="0" width="486px" align="center">
            <tr>
                <td align="center" style="padding: 10px 37px 10px 350px">
                    <input type="hidden" name="txtCoupnCode" id="txtCoupnCode" value="" />
                    <input type="hidden" name="txtUserID" id="txtUserID" value="<?php echo $_SESSION['UserID']?>" />
                </td>
            </tr>
            
            

            <tr>
                <td valign="top" align="center" style="padding: 0px;">
                    <div class="DvFloat">
                    	<div style="float: left; background-image: url(images/trans-bg.png); background-repeat: repeat; border: solid 0px #FF0000; padding: 10px;">
                        	<div style="width: 457px; float: left; background-color: #FFFFFF; padding: 7px; text-align: center;">
                            	<div class="DvFloat">
                                	<div style="margin: 0px 0px 0px 430px; position: absolute; text-align: right;">
                                    	<a href="javascript:Popup.hide('dvdeals-popup'); redirectURL(window.location.href);" target="_parent" style="text-decoration: none; color: #fff;">
                                        	<img src="images/close_red.png" alt="" title="" border="0" />
                                        </a>
                                    </div>
                                </div>
                                <div class="DvFloat" style="padding: 35px 0px 0px 0px; text-align: center;">
                                	<img src="images/loading_image.jpg" alt="" title="" border="0">
                                </div>
                                <div class="DvFloat" style="padding: 20px 0px 43px 0px; text-align: center;">
                                	<span class="f_darkblack">Your Coupon code has been sent to your registered email id</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
  </div>

<script type="text/javascript" src="js/jquery.form-2.4.0.min.js"></script>
<script type="text/javascript" src="js/jqeasy.dropdown.min.js"></script>

<script type="text/javascript" src="js/jQuery.1.8.2.js"></script>
<script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="js/custom1.js"></script>
<script type="text/javascript"> $.noConflict();</script>

</body>
</html>
