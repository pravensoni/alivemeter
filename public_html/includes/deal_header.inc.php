
<script>
jQuery(document).ready(function() {
	jQuery('.bxslider').bxSlider({
	  pagerCustom: '.bx-pager',
	  auto:true,
	  pause:7000
	});
	  });
</script>
<div class="slider-bg">
            <div class="container">          
              <ul class="bxslider">
                <?php 
					$i=0;
					$i=$i+1;
				   $query = "SELECT * FROM ".Deal." WHERE deal_id <> 0 order by sortby desc limit 5";
					//echo $query;
					$result = mysql_query($query);
					if($result != "") {
						$rowcount = mysql_num_rows($result);
						if($rowcount > 0) {
							while($row = mysql_fetch_assoc($result)) {
								extract($row);
								$locality=GetValue("select location_name as col from ".Location." where location_id=".$locality, "col");
								$city=GetValue("select city_name as col from ".City." where city_id=".$city, "col");	
									
				   ?>
                  
                <li>
                	

                  <div>
                   <div class="offerdiv"> <?php echo $offer;?> <span style="font-size: 18px;"></span></div>
              
                  	<div  style="background-image: url(images/deals_leftsite_arrow.png); background-position: right top; background-repeat: no-repeat; width: 15px; height: 333px; z-index: 999999; position: absolute; float: right; border: solid 0px #990000; margin-left: 569px;"></div>
                    <div class="bx-content_Left"> <img  alt="<?php echo $row['main_img_title'];?>"  title="<?php echo $row['main_img_title'];?>"  src="<?php echo $strHostName;?>/top_stories/<?php echo $row['main_img'];?>" style="width:584px; height:333px; z-index: -1; position:relative;" /></div>
                    <div class="bx-content_Right">
                      <div class="bx-content_text">
                        <div class="dvFloat" style="border:solid 0px red; height:220px;">
                        <h1 style="float:left; width:100%;"><?php echo truncate($vendor,20); ?> </h1>
                        <h2 style="float:left; width:100%;"><?php echo $locality; ?>, <?php echo $city; ?></h2>
                        <p style="width:100%; float:left;"><?php echo $title; ?></p>
                        <p><span style="font-size:25px;"><span style="text-decoration:line-through"><span class="WebRupee">Rs.</span><?php echo $cut_price; ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:#009999"><span class="WebRupee">Rs.</span><?php echo $actual_price; ?></span></span></p>
                        <p style="padding-top:15px"><a href="<?php echo $strHostName;?>/deals_detailspage.php?cid=<?php echo $converter->encode($row['deal_id']);?>&cateid=<?php echo $converter->encode($row['deal_category']);?>" class="buttoncuponnoarrow" style="height:25px; width:102px; text-align: center;">Get Coupon</a></p>
                      </div>
                      
                         <div class="dvFloat" style="border:solid 0px green; height:50px;">
                       
                        <p style="padding-top:40px; display:none;"><img src="images/shair_icon.gif" border="0" usemap="#Map" style="width:141px;height:22px;text-align:right; float:right">
                        
                        
                        
                        
                        
                          <map name="Map">
                            <area shape="rect" coords="59,1,74,23" href="#">
                            <area shape="rect" coords="78,1,97,26" href="#">
                            <area shape="rect" coords="102,1,119,29" href="#">
                            <area shape="rect" coords="122,2,151,37" href="#">
                          </map>
                        </p>
                      </div>
                      </div>
                    </div>
                  </div>
                </li>
                
              <?php 
			  	$i=$i+1;
			  }}} ?>
              </ul>
              
              
              <div class="bx-pager">
                <ul>
                  <?php 
				  	$i=0;
					$i=$i+1;
				   $query1= "SELECT * FROM ".Deal." WHERE deal_id <> 0 order by sortby desc limit 5";
					//echo $query;
					$result1 = mysql_query($query1);
					if($result1 != "") {
						$rowcount1 = mysql_num_rows($result1);
						//Alert($rowcount1);
						if($rowcount1 > 0) {
							while($row1 = mysql_fetch_assoc($result1)) {
								extract($row1);
								$vendor=$row1['vendor'];
								$offer1=$row1['offer'];
								//Alert($title1);
				   ?>
                   

                  <li> <a data-slide-index="<?php echo $i-1;?>" style="cursor:pointer;">
                    <div style="margin-top:35px; border-right: <?php if($i==5) { echo "solid 0px #b1b1b1";} else { echo "solid 1px #b1b1b1";}?>; font-weight: normal;"><span style="font-weight: bold;"><?php echo truncate($vendor,20); ?> </span><br /><span style="font-weight:normal;"><?php echo $offer; ?></span><br>
                      </div>
                    </a> </li>
                  <?php 
				  	$i=$i+1;
				  }}} ?>
                </ul>
              </div>
            </div>
          </div>