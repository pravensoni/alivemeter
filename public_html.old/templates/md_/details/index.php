<script type="text/javascript" src="<?php echo $strHostName?>/js/health_steup_insert_retrive.js"></script>
<script type="text/javascript" src="<?php echo $strHostName;?>/lib/jquery-1.10.1.min.js"></script>
<?php
	//$id=$converter->encode("18");
	//echo $id;
	
if(isset($_GET['patient_id'])){
	$patient_id=$converter->decode($_GET['patient_id']);
	$_SESSION['UserID']=$patient_id;
}
else
{
	$patient_id=0;
}


if(isset($_GET['query_id'])){
	$query_id=$converter->decode($_GET['query_id']);
}
else
{
	$query_id=0;
}

	
?>
<div id="divShowHideForm">
  <section>
  <div class="top_ou">
    <div class="top_in">
      <div class="top">
        <?php include "includes/patient_details.inc.php";?>
        <div class="DvFloat" style="border-bottom: solid 1px #e4e4e4;border-top: solid 0px #e4e4e4; margin:0px 0px 30px 0px">
          <h1 class="f_red" style="text-align: left; font-size: 18px; font-weight:bold;  margin: 7px;">Patient Complete Details</h1>
        </div>
        
        <iframe src="<?php echo $strHostName?>/page.php?dir=health/dashboard&patient_id=<?php echo $patient_id;?>" frameborder="0" scrollbars="0" style="width:1020px; height:800px;"></iframe>
              
	   <?php include "view_files/doctor_comment.inc.php";?>
     </div>
    </div>
  </div>
</div>
</div>
</div>
</section>
</div>
<script type="text/javascript">
var countries15=new ddtabcontent("tabstabs15");
countries15.setpersist(true);
countries15.setselectedClassTarget("link"); //"link" or "linkparent"
countries15.init();

var countries16=new ddtabcontent("calorie_tab");
countries16.setpersist(true);
countries16.setselectedClassTarget("link"); //"link" or "linkparent"
countries16.init();


var countries=new ddtabcontent("tabstabs");
countries.setpersist(true);
countries.setselectedClassTarget("link"); //"link" or "linkparent"
countries.init();

var countries1=new ddtabcontent("tabstabs1");
countries1.setpersist(true);
countries1.setselectedClassTarget("link"); //"link" or "linkparent"
countries1.init();


var countriesa=new ddtabcontent("tabstabsa");
countriesa.setpersist(true);
countriesa.setselectedClassTarget("link"); //"link" or "linkparent"
countriesa.init();

var countries1a=new ddtabcontent("tabstabs1a");
countries1a.setpersist(true);
countries1a.setselectedClassTarget("link"); //"link" or "linkparent"
countries1a.init();

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

var countries3=new ddtabcontent("tabstabs3");
countries3.setpersist(true);
countries3.setselectedClassTarget("link"); //"link" or "linkparent"
countries3.init();


var countries4=new ddtabcontent("tabstabs4");
countries4.setpersist(true);
countries4.setselectedClassTarget("link"); //"link" or "linkparent"
countries4.init();


var countries5=new ddtabcontent("tabstabs5");
countries5.setpersist(true);
countries5.setselectedClassTarget("link"); //"link" or "linkparent"
countries5.init();


var countries6=new ddtabcontent("tabstabs6");
countries6.setpersist(true);
countries6.setselectedClassTarget("link"); //"link" or "linkparent"
countries6.init();


var countries7=new ddtabcontent("tabstabs7");
countries7.setpersist(true);
countries7.setselectedClassTarget("link"); //"link" or "linkparent"
countries7.init();



var countries8=new ddtabcontent("tabstabs8");
countries8.setpersist(true);
countries8.setselectedClassTarget("link"); //"link" or "linkparent"
countries8.init();



var countries9=new ddtabcontent("tabstabs9");
countries9.setpersist(true);
countries9.setselectedClassTarget("link"); //"link" or "linkparent"
countries9.init();



var countries10=new ddtabcontent("tabstabs10");
countries10.setpersist(true);
countries10.setselectedClassTarget("link"); //"link" or "linkparent"
countries10.init();

var countries11=new ddtabcontent("tabstabs11");
countries11.setpersist(true);
countries11.setselectedClassTarget("link"); //"link" or "linkparent"
countries11.init();


var countries12=new ddtabcontent("tabstabs12");
countries12.setpersist(true);
countries12.setselectedClassTarget("link"); //"link" or "linkparent"
countries12.init();


var countries13=new ddtabcontent("tabstabs13");
countries13.setpersist(true);
countries13.setselectedClassTarget("link"); //"link" or "linkparent"
countries13.init();


var countries14=new ddtabcontent("tabstabs14");
countries14.setpersist(true);
countries14.setselectedClassTarget("link"); //"link" or "linkparent"
countries14.init();
</script>
<script>RetriveReocrds_Main('Doctor_Comment_Ins','dvDocComments');</script>