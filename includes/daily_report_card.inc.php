<?php
$blood_pressure="";$blood_pressure1="";$blood_pressure2="";  $fasting_blood_sugar_range=""; $fasting_blood_sugar_range1=""; $fasting_blood_sugar_date="";
$post_parandial_range=""; $post_parandial_range1=""; $post_parandial_date="";  $random_blood_sugar_range=""; $random_blood_sugar_range1="";
$random_blood_sugar_date=""; $urine_blood_range=""; $urine_blood_range1=""; $urine_blood_date=""; $cholesterol_range=""; $cholesterol_range1=""; 
$cholesterol_date=""; $triglyceride_blood_sugar_range=""; $triglyceride_blood_sugar_range1=""; $triglyceride_blood_sugar_date="";
$triglyceride_blood_sugar_range=""; $triglyceride_blood_sugar_range1=""; $triglyceride_blood_sugar_date=""; $hdl_range=""; $hdl_range1="";
$hdl_date=""; $ldl_range=""; $ldl_range1=""; $ldl_date=""; $cigarette=""; $life_style_date=""; $beer=""; $spirit=""; 



if(isset($_SESSION['UserID']))
{
	$user_id=$_SESSION['UserID'];
}
$curdate=date('Y-m-d');

//Alert ($curdate);

$blood_pressure=GetValue("select blood_pressure_systolic as col from tbl_blood_pressure where user_id=".$user_id."  and del_track_date='".$curdate."' and isdeleted=0 order by blood_pressure_id desc limit 1", "col");

if($blood_pressure=="")
{
	$blood_pressure=GetValue("select blood_pressure_systolic as col from tbl_blood_pressure where user_id=".$user_id."   and isdeleted=0  order by del_track_date desc limit 1", "col");
}


$blood_pressure_d=GetValue("select blood_pressure_diatolic as col from tbl_blood_pressure where user_id=".$user_id."  and del_track_date='".$curdate."'  and isdeleted=0  order by blood_pressure_id desc limit 1", "col");


if($blood_pressure_d=="")
{
	$blood_pressure_d=GetValue("select blood_pressure_diatolic as col from tbl_blood_pressure where user_id=".$user_id."  and isdeleted=0   order by del_track_date desc limit 1", "col");
}



//$blood_pressure_Array=explode("/",$blood_pressure);
//$blood_pressure1=$blood_pressure_Array[0];
//$blood_pressure2=$blood_pressure_Array[1];

$blood_pressure1=$blood_pressure;
$blood_pressure2=$blood_pressure_d;


//$blood_pressure2=$blood_pressure_Array[1];[1];

//Alert ($curdate);
$blood_pressure_record_date=GetValue("select del_track_date as col from tbl_blood_pressure where user_id=".$user_id." and del_track_date='".$curdate."'  and isdeleted=0 ", "col");

if($blood_pressure_record_date=="")
{
	$blood_pressure_record_date=GetValue("select del_track_date as col from tbl_blood_pressure where user_id=".$user_id."  and isdeleted=0 order by del_track_date desc limit 1", "col");
	//Alert($blood_pressure_record_date);
	
	
}


// Fasting Blood Sugar Start

///$fasting_blood_sugar_date=GetValue("select fasting_blood_sugar_date as col from tbl_sugar_profile where user_id=".$user_id." and fasting_blood_sugar_date='".$curdate."'  and isdeleted=0 ", "col");



$fasting_blood_sugar_range=GetValue("select fasting_blood_sugar_range as col from tbl_sugar_profile where user_id=".$user_id."  and fasting_blood_sugar_date='".$curdate."'  and isdeleted=0 order by sugar_profile_id desc limit 1", "col");

if($fasting_blood_sugar_range=="")
{
	$fasting_blood_sugar_range=GetValue("select fasting_blood_sugar_range as col from tbl_sugar_profile where user_id=".$user_id."   and isdeleted=0 and fasting_blood_sugar_range<>'' order by fasting_blood_sugar_date desc limit 1", "col");
}






$fasting_blood_sugar_result=GetValue("select fasting_blood_sugar_result as col from tbl_sugar_profile where user_id=".$user_id."  and fasting_blood_sugar_date='".$curdate."'  and isdeleted=0 order by sugar_profile_id desc limit 1", "col");

if($fasting_blood_sugar_result=="")
{
	$fasting_blood_sugar_result=GetValue("select fasting_blood_sugar_result as col from tbl_sugar_profile where user_id=".$user_id."   and isdeleted=0 and fasting_blood_sugar_result <> '' order by fasting_blood_sugar_date desc limit 1", "col");
	
}

$fasting_blood_sugar_date=GetValue("select fasting_blood_sugar_date as col from tbl_sugar_profile where user_id=".$user_id."  and isdeleted=0 and fasting_blood_sugar_result=".$fasting_blood_sugar_result." order by fasting_blood_sugar_date desc limit 1", "col");





$fasting_blood_sugar_range1=GetValue("select fasting_blood_sugar_range1 as col from tbl_sugar_profile where user_id=".$user_id."  and fasting_blood_sugar_date='".$curdate."'  and isdeleted=0 order by sugar_profile_id desc limit 1", "col");

if($fasting_blood_sugar_range1=="")
{
	$fasting_blood_sugar_range1=GetValue("select fasting_blood_sugar_range1 as col from tbl_sugar_profile where user_id=".$user_id."  and isdeleted=0 and fasting_blood_sugar_range1<>''  order by fasting_blood_sugar_date desc limit 1", "col");
}





// Fasting Blood Sugar End





// post_parandial Start

//$post_parandial_date=GetValue("select post_parandial_date as col from tbl_sugar_profile where user_id=".$user_id." and post_parandial_date='".$curdate."'  and isdeleted=0 ", "col");


$post_parandial_range=GetValue("select post_parandial_range as col from tbl_sugar_profile where user_id=".$user_id."  and post_parandial_date='".$curdate."'  and isdeleted=0  order by sugar_profile_id desc limit 1", "col");

if($post_parandial_range=="")
{
	$post_parandial_range=GetValue("select post_parandial_range as col from tbl_sugar_profile where user_id=".$user_id."  and isdeleted=0 and post_parandial_range<>''  order by post_parandial_date desc limit 1", "col");
}

$post_parandial_result=GetValue("select post_parandial_result as col from tbl_sugar_profile where user_id=".$user_id."  and post_parandial_date='".$curdate."'  and isdeleted=0  order by sugar_profile_id desc limit 1", "col");

if($post_parandial_result=="")
{
	$post_parandial_result=GetValue("select post_parandial_result as col from tbl_sugar_profile where user_id=".$user_id."  and isdeleted=0  order by post_parandial_date desc limit 1", "col");
}


$post_parandial_date=GetValue("select post_parandial_date as col from tbl_sugar_profile where user_id=".$user_id."  and isdeleted=0 and post_parandial_result=".$post_parandial_result." order by post_parandial_date desc limit 1", "col");




$post_parandial_range1=GetValue("select post_parandial_range1 as col from tbl_sugar_profile where user_id=".$user_id."  and post_parandial_date='".$curdate."'  and isdeleted=0  order by sugar_profile_id desc limit 1", "col");

if($post_parandial_range1=="")
{
	$post_parandial_range1=GetValue("select post_parandial_range1 as col from tbl_sugar_profile where user_id=".$user_id."  and isdeleted=0 and post_parandial_range1<>'' order by post_parandial_date desc limit 1", "col");
}


// post_parandial End


// random_blood_sugar Start
///$random_blood_sugar_date=GetValue("select random_blood_sugar_date as col from tbl_sugar_profile where user_id=".$user_id." and random_blood_sugar_date='".$curdate."'  and isdeleted=0 ", "col");

$random_blood_sugar_range=GetValue("select random_blood_sugar_range as col from tbl_sugar_profile where user_id=".$user_id."  and random_blood_sugar_date='".$curdate."'  and isdeleted=0  order by sugar_profile_id desc limit 1", "col");

if($random_blood_sugar_range=="")
{
	$random_blood_sugar_range=GetValue("select random_blood_sugar_range as col from tbl_sugar_profile where user_id=".$user_id."  and isdeleted=0 and random_blood_sugar_range <> '' order by random_blood_sugar_date desc limit 1", "col");
}

$random_blood_sugar_result=GetValue("select random_blood_sugar_result as col from tbl_sugar_profile where user_id=".$user_id."  and random_blood_sugar_date='".$curdate."'  and isdeleted=0  order by sugar_profile_id desc limit 1", "col");

if($random_blood_sugar_result=="")
{
	$random_blood_sugar_result=GetValue("select random_blood_sugar_result as col from tbl_sugar_profile where user_id=".$user_id."  and isdeleted=0 and random_blood_sugar_result<> '' order by random_blood_sugar_date desc limit 1", "col");
}

$random_blood_sugar_date=GetValue("select random_blood_sugar_date as col from tbl_sugar_profile where user_id=".$user_id." and random_blood_sugar_date='".$curdate."'  and isdeleted=0 and random_blood_sugar_result=".$random_blood_sugar_result."", "col");



$random_blood_sugar_range1=GetValue("select random_blood_sugar_range1 as col from tbl_sugar_profile where user_id=".$user_id."  and random_blood_sugar_date='".$curdate."'  and isdeleted=0  order by sugar_profile_id desc limit 1", "col");

if($random_blood_sugar_range1=="")
{
	$random_blood_sugar_range1=GetValue("select random_blood_sugar_range1 as col from tbl_sugar_profile where user_id=".$user_id."   and isdeleted=0 and random_blood_sugar_range1<>'' order by random_blood_sugar_date desc limit 1", "col");
}

// random_blood_sugar End

// urine_blood Start
///$urine_blood_date=GetValue("select urine_blood_date as col from tbl_sugar_profile where user_id=".$user_id." and urine_blood_date='".$curdate."'  and isdeleted=0 ", "col");




$urine_blood_range=GetValue("select urine_blood_range as col from tbl_sugar_profile where user_id=".$user_id."  and urine_blood_date='".$curdate."'  and isdeleted=0  order by sugar_profile_id desc limit 1", "col");

if($urine_blood_range=="")
{
	$urine_blood_range=GetValue("select urine_blood_range as col from tbl_sugar_profile where user_id=".$user_id."  and isdeleted=0 and urine_blood_range <> '' order by urine_blood_date desc limit 1", "col");
}

$urine_blood_result=GetValue("select urine_blood_result as col from tbl_sugar_profile where user_id=".$user_id."  and urine_blood_date='".$curdate."'  and isdeleted=0  order by sugar_profile_id desc limit 1", "col");

if($urine_blood_result=="")
{
	$urine_blood_result=GetValue("select urine_blood_result as col from tbl_sugar_profile where user_id=".$user_id."  and isdeleted=0  order by urine_blood_date desc limit 1", "col");
}


$urine_blood_date=GetValue("select urine_blood_date as col from tbl_sugar_profile where user_id=".$user_id."  and isdeleted=0 and urine_blood_result=".$urine_blood_result." order by urine_blood_date desc limit 1", "col");



$urine_blood_range1=GetValue("select urine_blood_range1 as col from tbl_sugar_profile where user_id=".$user_id."  and urine_blood_date='".$curdate."'  and isdeleted=0  order by sugar_profile_id desc limit 1", "col");

if($urine_blood_range1=="")
{
	$urine_blood_range1=GetValue("select urine_blood_range1 as col from tbl_sugar_profile where user_id=".$user_id."   and isdeleted=0  order by urine_blood_date desc limit 1", "col");
}

// urine_blood End

// cholesterol Start
///$cholesterol_date=GetValue("select cholesterol_date as col from tbl_lipid_profile where user_id=".$user_id." and cholesterol_date='".$curdate."'  and isdeleted=0 ", "col");



$cholesterol_range=GetValue("select cholesterol_result as col from tbl_lipid_profile where user_id=".$user_id."  and cholesterol_date='".$curdate."'  and isdeleted=0 limit 1", "col");
//$cholesterol_range=40;
if($cholesterol_range=="")
{
	$cholesterol_range=GetValue("select cholesterol_result as col from tbl_lipid_profile where user_id=".$user_id."  and isdeleted=0 and cholesterol_result<>'' order by cholesterol_date desc limit 1", "col");
}


$cholesterol_date=GetValue("select cholesterol_date as col from tbl_lipid_profile where user_id=".$user_id."  and isdeleted=0 and cholesterol_result=".$cholesterol_range." order by cholesterol_date desc limit 1", "col");




// cholesterol End

///$triglyceride_blood_sugar_date=GetValue("select triglyceride_blood_sugar_date as col from tbl_lipid_profile where user_id=".$user_id." and triglyceride_blood_sugar_date='".$curdate."'  and isdeleted=0 ", "col");


$triglyceride_blood_sugar_range=GetValue("select triglyceride_blood_sugar_result as col from tbl_lipid_profile where user_id=".$user_id."  and triglyceride_blood_sugar_date='".$curdate."' and isdeleted=0  limit 1", "col");

if($triglyceride_blood_sugar_range=="")
{
	$triglyceride_blood_sugar_range=GetValue("select triglyceride_blood_sugar_result as col from tbl_lipid_profile where user_id=".$user_id."  and isdeleted=0 and  triglyceride_blood_sugar_result<>'' order by triglyceride_blood_sugar_date desc limit 1", "col");
}

$triglyceride_blood_sugar_date=GetValue("select triglyceride_blood_sugar_date as col from tbl_lipid_profile where user_id=".$user_id." and isdeleted=0 and triglyceride_blood_sugar_result=".$triglyceride_blood_sugar_range." order by triglyceride_blood_sugar_date desc limit 1", "col");




$hdl_range=GetValue("select hdl_result as col from tbl_lipid_profile where user_id=".$user_id."  and hdl_date='".$curdate."'  and isdeleted=0  limit 1", "col");

if($hdl_range=="")
{
	$hdl_range=GetValue("select hdl_result as col from tbl_lipid_profile where user_id=".$user_id."  and isdeleted=0 and hdl_result<>'' order by hdl_date desc limit 1", "col");
}


$hdl_date=GetValue("select hdl_date as col from tbl_lipid_profile where user_id=".$user_id."  and isdeleted=0 and hdl_result=".$hdl_range." order by hdl_date desc limit 1", "col");




$ldl_range=GetValue("select ldl_result as col from tbl_lipid_profile where user_id=".$user_id."  and isdeleted=0  and ldl_date='".$curdate."' limit 1", "col");

if($ldl_range=="")
{
	$ldl_range=GetValue("select ldl_result as col from tbl_lipid_profile where user_id=".$user_id."  and isdeleted=0 and ldl_result<>'' order by ldl_date desc limit 1", "col");
}


$ldl_date=GetValue("select ldl_date as col from tbl_lipid_profile where user_id=".$user_id."  and isdeleted=0 and ldl_result=".$ldl_range." order by ldl_date desc limit 1", "col");


///$life_style_date=GetValue("select life_style_date as col from tbl_life_style where user_id=".$user_id."  and isdeleted=0 and life_style_date='".$curdate."'", "col");


$cigarette=GetValue("select cigarette as col from tbl_life_style where user_id=".$user_id."  and isdeleted=0  and life_style_date='".$curdate."'  order by life_style_id desc  limit 1", "col");

if($cigarette=="")
{
	$cigarette=GetValue("select cigarette as col from tbl_life_style where user_id=".$user_id."  and isdeleted=0 and cigarette <> '' order by life_style_date desc limit 1", "col");
}

$cig_date=GetValue("select life_style_date as col from tbl_life_style where user_id=".$user_id."  and isdeleted=0 and cigarette=".$cigarette." order by life_style_date desc limit 1", "col");




$beer=GetValue("select beer as col from tbl_life_style where user_id=".$user_id."  and isdeleted=0  and life_style_date='".$curdate."' order by life_style_id desc limit 1", "col");

if($beer=="" || $beer=="0")
{
	$beer=GetValue("select beer as col from tbl_life_style where user_id=".$user_id."  and isdeleted=0 and beer <> '' order by life_style_date desc limit 1", "col");
	
}
$beer_date=GetValue("select life_style_date as col from tbl_life_style where user_id=".$user_id."  and isdeleted=0 and beer=".$beer." order by life_style_date desc limit 1", "col");

///Alert ($beer);

$spirit=GetValue("select spirit as col from tbl_life_style where user_id=".$user_id."  and isdeleted=0  and life_style_date='".$curdate."' order by life_style_id desc limit 1", "col");

if($spirit=="")
{
	$spirit=GetValue("select spirit as col from tbl_life_style where user_id=".$user_id."   and isdeleted=0 and spirit <> '' order by life_style_date desc limit 1", "col");
}


$spirit_date=GetValue("select life_style_date as col from tbl_life_style where user_id=".$user_id."  and isdeleted=0 and spirit=".$spirit." order by life_style_date desc limit 1", "col");


$spirit_goal=GetValue("select spirit_goal as col from tbl_life_style where user_id=".$user_id." order by life_style_id desc limit 1", "col");
$beer_goal=GetValue("select beer_goal as col from tbl_life_style where user_id=".$user_id." order by life_style_id desc limit 1", "col");
$cigarette_goal=GetValue("select cigarette_goal as col from tbl_life_style where user_id=".$user_id." order by life_style_id desc limit 1", "col");
$life_style_sleep_goal=GetValue("select life_style_sleep_goal as col from tbl_life_style where user_id=".$user_id." order by life_style_id desc limit 1", "col");  
				

$cigarette_Array=explode("/",$cigarette);
$cigarette1=$cigarette_Array[0];
$cigarette2=0;
if(isset($cigarette_Array[1]))
{
	$cigarette2=$cigarette_Array[1];
}

$beer_Array=explode("/",$beer);
$beer=$beer_Array[0];
$beer2=0;
if(isset($beer_Array[1]))
{
	$beer2=$beer_Array[1];
}

$spirit_Array=explode("/",$spirit);
$spirit=$spirit_Array[0];
$spirit2=0;
if(isset($spirit_Array[1]))
{
	$spirit2=$spirit_Array[1];
}


?>
	<script type="text/javascript">
	$(function () {
        $('#BloodPressure_Chart').highcharts({
            chart: {type: 'bar',height:'38',margin: 0,backgroundColor:'transparent',},
			title:{text:''},
            xAxis: {labels: {enabled: true},title: {enabled: true,}},
            yAxis: {gridLineWidth: 0,min: 0,title: {text: '',align: ''},labels: {overflow: 'justify'}},
           plotOptions: {bar: {pointWidth:12,dataLabels: {enabled: true},  enableMouseTracking: false}},   
            series: [{showInLegend: false,color: '#99cc00',data: [<?php echo $blood_pressure1?>, <?php echo $blood_pressure2?>]}]
        });
    });
	$('.highcharts-legend text').each(function(index, element) {
		$(element).hover(function() {
			chart.tooltip.refresh(chart.series[0].data[index]);
		},function() {
			chart.tooltip.hide();
		})
	});
	$(function () {
        $('#Fasting_blood_sugar_range').highcharts({
            chart: {type: 'bar',height:'38',margin: 0,backgroundColor:'transparent',},
			title:{text:''},
            xAxis: {labels: {enabled: true},title: {enabled: true,}},
            yAxis: {gridLineWidth: 0,min: 0,title: {text: '',align: 'high'},labels: {overflow: 'justify'}},
            plotOptions: {bar: {pointWidth:12,dataLabels: {enabled: true},  enableMouseTracking: false}},      
            series: [{showInLegend: false,color: '#99cc00',
			data: [<?php echo $fasting_blood_sugar_result?>]}]
        });
    });

	$(function () {
        $('#BloodPressure_AfterMeal').highcharts({
            chart: {type: 'bar',height:'38',margin: 0,backgroundColor:'transparent',},
			title:{text:''},
            xAxis: {labels: {enabled: true},title: {enabled: true,}},
            yAxis: {gridLineWidth: 0,min: 0,title: {text: '',align: 'high'},labels: {overflow: 'justify'}},
           plotOptions: {bar: {pointWidth:12,dataLabels: {enabled: true},  enableMouseTracking: false}},   
            series: [{showInLegend: false,color: '#99cc00',data: [<?php echo $post_parandial_result?>]}]
        });
    });


	$(function () {
        $('#Random_blood_sugar_range').highcharts({
            chart: {type: 'bar',height:'38',margin: 0,backgroundColor:'transparent',},
			title:{text:''},
            xAxis: {labels: {enabled: true},title: {enabled: true,}},
            yAxis: {gridLineWidth: 0,min: 0,title: {text: 'Population (millions)',align: 'high'},labels: {overflow: 'justify'}},
           plotOptions: {bar: {pointWidth:12,dataLabels: {enabled: true},  enableMouseTracking: false}},            
            series: [{showInLegend: false,color: '#99cc00',data: [<?php echo $random_blood_sugar_result?>]}]
        });
    });

	$(function () {
        $('#urine_blood_range').highcharts({
            chart: {type: 'bar',height:'38',margin: 0,backgroundColor:'transparent',},
			title:{text:''},
            xAxis: {labels: {enabled: true},title: {enabled: true,}},
            yAxis: {gridLineWidth: 0,min: 0,title: {text: 'Population (millions)',align: 'high'},labels: {overflow: 'justify'}},
            plotOptions: {bar: {pointWidth:12,dataLabels: {enabled: true},  enableMouseTracking: false}},         
            series: [{showInLegend: false,color: '#99cc00',data: [<?php echo $urine_blood_result?>]}]
        });
    });

	$(function () {
        $('#cholesterol_range').highcharts({
            chart: {type: 'bar',height:'38',margin: 0,backgroundColor:'transparent',},
			title:{text:''},
            xAxis: {labels: {enabled: true},title: {enabled: true,}},
            yAxis: {gridLineWidth: 0,min: 0,title: {text: 'Population (millions)',align: 'high'},labels: {overflow: 'justify'}},
            plotOptions: {bar: {pointWidth:12,dataLabels: {enabled: true},  enableMouseTracking: false}},     
            series: [{showInLegend: false,color: '#99cc00',data: [<?php echo $cholesterol_range?>]}]
        });
    });

	$(function () {
        $('#Triglyceride_blood_sugar_range').highcharts({
            chart: {type: 'bar',height:'38',margin: 0,backgroundColor:'transparent',},
			title:{text:''},
            xAxis: {labels: {enabled: true},title: {enabled: true,}},
            yAxis: {gridLineWidth: 0,min: 0,title: {text: 'Population (millions)',align: 'high'},labels: {overflow: 'justify'}},
            plotOptions: {bar: {pointWidth:12,dataLabels: {enabled: true},  enableMouseTracking: false}},          
            series: [{showInLegend: false,color: '#99cc00',data: [<?php echo $triglyceride_blood_sugar_range?>]}]
        });
    });

	
	$(function () {
        $('#Hdl_range').highcharts({
            chart: {type: 'bar',height:'38',margin: 0,backgroundColor:'transparent',},
			title:{text:''},
            xAxis: {labels: {enabled: true},title: {enabled: true,}},
            yAxis: {gridLineWidth: 0,min: 0,title: {text: 'Population (millions)',align: 'high'},labels: {overflow: 'justify'}},
            plotOptions: {bar: {pointWidth:12,dataLabels: {enabled: true},  enableMouseTracking: false}},           
            series: [{showInLegend: false,color: '#99cc00',data: [<?php echo $hdl_range?>]}]
        });
    });

	$(function () {
        $('#ldl_range').highcharts({
            chart: {type: 'bar',height:'38',margin: 0,backgroundColor:'transparent',},
			title:{text:''},
            xAxis: {labels: {enabled: true},title: {enabled: true,}},
            yAxis: {gridLineWidth: 0,min: 0,title: {text: 'Population (millions)',align: 'high'},labels: {overflow: 'justify'}},
           plotOptions: {bar: {pointWidth:12,dataLabels: {enabled: true},  enableMouseTracking: false}},   
            series: [{showInLegend: false,color: '#99cc00',data: [<?php echo $ldl_range?>]}]
        });
    });

	$(function () {
        $('#Cigarette').highcharts({
            chart: {type: 'bar',height:'38',margin: 0,backgroundColor:'transparent',},
			title:{text:''},
            xAxis: {labels: {enabled: true},title: {enabled: true,}},
            yAxis: {gridLineWidth: 0,min: 0,title: {text: 'Population (millions)',align: 'high'},labels: {overflow: 'justify'}},
            plotOptions: {bar: {pointWidth:12,dataLabels: {enabled: true},  enableMouseTracking: false}},       
            series: [{showInLegend: false,color: '#99cc00',data: [<?php echo $cigarette1?>]}]
        });
    });
	

	$(function () {
        $('#Beer').highcharts({
            chart: {type: 'bar',height:'38',margin: 0,backgroundColor:'transparent',},
			title:{text:''},
            xAxis: {labels: {enabled: true},title: {enabled: true,}},
            yAxis: {gridLineWidth: 0,min: 0,title: {text: 'Population (millions)',align: 'high'},labels: {overflow: 'justify'}},
           plotOptions: {bar: {pointWidth:12,dataLabels: {enabled: true},  enableMouseTracking: false}},            
            series: [{showInLegend: false,color: '#99cc00',data: [<?php echo $beer?>]}]
        });
    });

	$(function () {
        $('#Spirit').highcharts({
            chart: {type: 'bar',height:'38',margin: 0,backgroundColor:'transparent',},
			title:{text:''},
            xAxis: {labels: {enabled: true},title: {enabled: true,}},
            yAxis: {gridLineWidth: 0,min: 0,title: {text: 'Population (millions)',align: 'high'},labels: {overflow: 'justify'}},
            plotOptions: {bar: {pointWidth:12,dataLabels: {enabled: true},  enableMouseTracking: false}},           
            series: [{showInLegend: false,color: '#99cc00',data: [<?php echo $spirit?>]}]
        });
    });
 
    
</script>
<script type="text/javascript">





function ShowMinus(type)
{
	
	
	if(type=="BP"){
		document.getElementById('BPMinus').style.display = 'none'; 
		document.getElementById('BPPlus').style.display = '';
		DefaultShow('BP','0'); 
	}
	
	if(type=="FB"){
		document.getElementById('FBMinus').style.display = 'none'; 
		document.getElementById('FBPlus').style.display = ''; 
		DefaultShow('FB','0'); 
	}
	
	if(type=="PPBS"){
		document.getElementById('PPBSMinus').style.display = 'none'; 
		document.getElementById('PPBSPlus').style.display = ''; 
		DefaultShow('PPBS','0'); 
	}
	
	if(type=="RBS"){
		document.getElementById('RBSMinus').style.display = 'none'; 
		document.getElementById('RBSPlus').style.display = ''; 
		DefaultShow('RBS','0'); 
	}
	
	if(type=="UBS"){
		document.getElementById('UBSMinus').style.display = 'none'; 
		document.getElementById('UBSPlus').style.display = ''; 
		DefaultShow('UBS','0'); 
	}
	
	if(type=="Cholesterol"){
		document.getElementById('CholesterolMinus').style.display = 'none'; 
		document.getElementById('CholesterolPlus').style.display = '';
		DefaultShow('Cholesterol','0');  
	}
	
	if(type=="Triglyceride"){
		document.getElementById('TriglycerideMinus').style.display = 'none'; 
		document.getElementById('TriglyceridePlus').style.display = ''; 
		DefaultShow('Triglyceride','0');
	}
	
	
	
	
	if(type=="HDL"){
		document.getElementById('HDLMinus').style.display = 'none'; 
		document.getElementById('HDLPlus').style.display = ''; 
		DefaultShow('HDL','0');
	}
	
	
	if(type=="LDL"){
		document.getElementById('LDLMinus').style.display = 'none'; 
		document.getElementById('LDLPlus').style.display = ''; 
		DefaultShow('LDL','0');
	}
	
	if(type=="Cigarette"){
		document.getElementById('CigaretteMinus').style.display = 'none'; 
		document.getElementById('CigarettePlus').style.display = ''; 
		DefaultShow('Cigarette','0');
	}
	
	if(type=="Beer"){
		document.getElementById('BeerMinus').style.display = 'none'; 
		document.getElementById('BeerPlus').style.display = ''; 
		DefaultShow('Beer','0');
	}
	
	if(type=="Spirit"){
		document.getElementById('SpiritMinus').style.display = 'none'; 
		document.getElementById('SpiritPlus').style.display = '';
		DefaultShow('Spirit','0'); 
	}
	
	
}
function ShowPlus(type)
{
	
	if(type=="BP"){
		document.getElementById('BPMinus').style.display = ''; 
		document.getElementById('BPPlus').style.display = 'none'; 
		DefaultShow('BP','1');
	}
	
	if(type=="FB"){
		document.getElementById('FBMinus').style.display = ''; 
		document.getElementById('FBPlus').style.display = 'none'; 
		DefaultShow('FB','1');
	}
	
	if(type=="PPBS"){
		document.getElementById('PPBSMinus').style.display = ''; 
		document.getElementById('PPBSPlus').style.display = 'none'; 
		DefaultShow('PPBS','1');
	}
	
	if(type=="RBS"){
		document.getElementById('RBSMinus').style.display = ''; 
		document.getElementById('RBSPlus').style.display = 'none'; 
		DefaultShow('RBS','1');
	}
	
	if(type=="UBS"){
		document.getElementById('UBSMinus').style.display = ''; 
		document.getElementById('UBSPlus').style.display = 'none'; 
		DefaultShow('UBS','1');
	}
	if(type=="Cholesterol"){
		document.getElementById('CholesterolMinus').style.display = ''; 
		document.getElementById('CholesterolPlus').style.display = 'none'; 
		DefaultShow('Cholesterol','1');
	}
	
	if(type=="Triglyceride"){
		document.getElementById('TriglycerideMinus').style.display = ''; 
		document.getElementById('TriglyceridePlus').style.display = 'none'; 
		DefaultShow('Triglyceride','1');
	}
	
	
	if(type=="Triglyceride"){
		document.getElementById('TriglycerideMinus').style.display = ''; 
		document.getElementById('TriglyceridePlus').style.display = 'none'; 
	}
	
	if(type=="HDL"){
		document.getElementById('HDLMinus').style.display = ''; 
		document.getElementById('HDLPlus').style.display = 'none'; 
		DefaultShow('HDL','1');
	}
	
	
	if(type=="LDL"){
		document.getElementById('LDLMinus').style.display = ''; 
		document.getElementById('LDLPlus').style.display = 'none'; 
		DefaultShow('LDL','1');
	}
	
	if(type=="Cigarette"){
		document.getElementById('CigaretteMinus').style.display = ''; 
		document.getElementById('CigarettePlus').style.display = 'none'; 
		DefaultShow('Cigarette','1');
	}
	
	if(type=="Beer"){
		document.getElementById('BeerMinus').style.display = ''; 
		document.getElementById('BeerPlus').style.display = 'none'; 
		DefaultShow('Beer','1');
	}
	
	if(type=="Spirit"){
		document.getElementById('SpiritMinus').style.display = ''; 
		document.getElementById('SpiritPlus').style.display = 'none'; 
		DefaultShow('Spirit','1');
	}
	
}

function DefaultShow(type, show)
{
	
	
	if(type != "" ) {
		//document.getElementById("dvLoader").style.display='';
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
					message = message.split("###");
					
					//message = message.replace("true###", 'true');
					////alert (message[0].trim());
					
					if(message[0].trim()=="true") {
					
					
					///  alert (message[6]);
					  
					  
						if(message[2]=="1")
						{
							document.getElementById("BPPlus").style.display="none";
							document.getElementById("BPMinus").style.display="";
						}
						else
						{
							document.getElementById("BPPlus").style.display="";
							document.getElementById("BPMinus").style.display="none";
						}
						
						if(message[4]=="1")
						{
							document.getElementById("FBPlus").style.display="none";
							document.getElementById("FBMinus").style.display="";
						}
						else
						{
							document.getElementById("FBPlus").style.display="";
							document.getElementById("FBMinus").style.display="none";
						}
					
					
						if(message[6]=="1")
						{
							document.getElementById("PPBSPlus").style.display="none";
							document.getElementById("PPBSMinus").style.display="";
						}
						else
						{
							document.getElementById("PPBSPlus").style.display="";
							document.getElementById("PPBSMinus").style.display="none";
						}
						
						
						if(message[8]=="1")
						{
							document.getElementById("RBSPlus").style.display="none";
							document.getElementById("RBSMinus").style.display="";
						}
						else
						{
							document.getElementById("RBSPlus").style.display="";
							document.getElementById("RBSMinus").style.display="none";
						}
						
						
						if(message[10]=="1")
						{
							document.getElementById("UBSPlus").style.display="none";
							document.getElementById("UBSMinus").style.display="";
						}
						else
						{
							document.getElementById("UBSPlus").style.display="";
							document.getElementById("UBSMinus").style.display="none";
						}
						
						
						if(message[12]=="1")
						{
							document.getElementById("CholesterolPlus").style.display="none";
							document.getElementById("CholesterolMinus").style.display="";
						}
						else
						{
							document.getElementById("CholesterolPlus").style.display="";
							document.getElementById("CholesterolMinus").style.display="none";
						}
						
						
						if(message[14]=="1")
						{
							document.getElementById("TriglyceridePlus").style.display="none";
							document.getElementById("TriglycerideMinus").style.display="";
						}
						else
						{
							document.getElementById("TriglyceridePlus").style.display="";
							document.getElementById("TriglycerideMinus").style.display="none";
						}
						
						
						
						if(message[16]=="1")
						{
							document.getElementById("HDLPlus").style.display="none";
							document.getElementById("HDLMinus").style.display="";
						}
						else
						{
							document.getElementById("HDLPlus").style.display="";
							document.getElementById("HDLMinus").style.display="none";
						}
						
						
						if(message[18]=="1")
						{
							document.getElementById("LDLPlus").style.display="none";
							document.getElementById("LDLMinus").style.display="";
						}
						else
						{
							document.getElementById("LDLPlus").style.display="";
							document.getElementById("LDLMinus").style.display="none";
						}
						
						
						if(message[20]=="1")
						{
							document.getElementById("CigarettePlus").style.display="none";
							document.getElementById("CigaretteMinus").style.display="";
						}
						else
						{
							document.getElementById("CigarettePlus").style.display="";
							document.getElementById("CigaretteMinus").style.display="none";
						}
						
						if(message[22]=="1")
						{
							document.getElementById("BeerPlus").style.display="none";
							document.getElementById("BeerMinus").style.display="";
						}
						else
						{
							document.getElementById("BeerPlus").style.display="";
							document.getElementById("BeerMinus").style.display="none";
						}
						
						
						if(message[24]=="1")
						{
							document.getElementById("SpiritPlus").style.display="none";
							document.getElementById("SpiritMinus").style.display="";
						}
						else
						{
							document.getElementById("SpiritPlus").style.display="";
							document.getElementById("SpiritMinus").style.display="none";
						}
					
					
					
					}
						GetChartDetails('exce_calorie_result','');
				}
		}
		
		xmlhttp.open("GET",hostname+"/includes/default_show_daily_report_card.inc.php?type="+type+"&show="+show, true);
		xmlhttp.send();
	}
 }	


</script>
<?php
$dob=GetValue("select dob as col from  tbl_users where user_id=".$_SESSION['UserID']."","col");
$age=floor((time() - strtotime($dob))/31556926);

$ishide=GetValue("select ishide as col from tbl_daily_report_show_hide where ishide=1 and user_id=".$user_id." order by id desc", "col");

?>

<div class="DvFloat"> 
              <div class="DvFloat" style="padding-top: 20px;"> <span class="f_green" style="font-size: 18px; font-weight: bold;">Your Daily Report Card</span> </div>
              <div class="DvFloat" style="padding: 15px 0px; border-bottom: solid 1px #c5c5c5;">   
                <table width="100%" border="0" cellpadding="0" cellspacing="4">
                  <tr>
                    <td style="width: 207px; background-color: #fff; padding: 10px 0px 5px 0px; text-align: center;">&nbsp;</td>
                    <td class="dailyreport_sep"></td>
                    
                    <td style="width: 100px; background-color: #f0f0f0; border-top: solid 1px #666666; border-left: solid 1px #666666; border-right: solid 1px #666666; background-color: #656565; color: #FFFFFF; font-size: 11px; text-transform: uppercase; text-align: center; vertical-align: middle;">ACTUAL</td>
                    <td class="dailyreport_sep"></td>
                    <td style="width: 100px; background-color: #f0f0f0; border-top: solid 1px #666666; border-left: solid 1px #666666; border-right: solid 1px #666666; background-color: #656565; color: #FFFFFF; font-size: 11px; text-transform: uppercase; text-align: center; vertical-align: middle;">Avg range</td>
                    <td class="dailyreport_sep"></td>
                    <td style="width: 100px; background-color: #f0f0f0; border-top: solid 1px #666666; border-left: solid 1px #666666; border-right: solid 1px #666666; background-color: #656565; color: #FFFFFF; font-size: 11px; text-transform: uppercase; text-align: center; vertical-align: middle;">Date Recorded</td>
                    <td class="dailyreport_sep"></td>
                    <td style="width: 240px; background-color: #fff;">&nbsp;</td>
                  </tr>
                  <tr id="BPMinus" style="display:none;">
                    <td class="nutri_dailyreport_box1"><a onclick="javascript:ShowMinus('BP');" style="cursor:pointer;"><img src="<?php echo $strHostName;?>/images/nutritionist/minus_icon.png" alt="" title="" border="0" style="border: solid 0px #000; padding-right: 10px;"><span class="f_grey" style="font-size: 13px;">Blood Pressure</span></a></td>
                    <td class="dailyreport_sep"></td>
                      <td class="nutri_dailyreport_box3 report_card_hover" style="">
                      		  <a href="#" class="" style="border:solid 0px red; cursor:text;">
							<?php
									if($blood_pressure1=="" && $blood_pressure2=="")
									{
										echo "0";
									}
									else
									{
										echo $blood_pressure1."/" .$blood_pressure2;
									}
							?>
                            
                            
                            </a> 
                            <span style="margin-top:-55px;">
                           			 <img class="callout_hover" src="<?php echo $strHostName;?>/images/callout.gif" />
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="line-height:20px; font-size:11px;">
                                                    <tr>
                                                        <td style="border-bottom:solid 1px #00CC33; padding-bottom:5px;">Average Blood Pressure values (as per your age)</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:5px;">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr>
                                                                <td class="daily_mamvalues_dv">Minimum Values</td>
                                                                <td>&nbsp;</td>
                                                                <td class="daily_mamvalues_dv">Average Values</td>
                                                                <td>&nbsp;</td>
                                                                <td class="daily_mamvalues_dv">Maximum Values</td>
                                                              </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                     <?php
                                $query="SELECT * FROM " .Bp_Age_Masters. " WHERE min_age <= ".$age." and max_age>=".$age." order by min_age limit 1";
								///echo $query;
								   $result = mysql_query($query);
									  if($result != "") {
									    $rowcount = mysql_num_rows($result);
									      if($rowcount > 0) {
										     while($row = mysql_fetch_assoc($result)) {
											    extract($row);
								                 ?>
                                                     <tr>
                                                       <td style="padding-top:5px;">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                          <tr>
                                                            <td class="daily_ds_dv" >Diastolic<br /><?php echo $row['dia_min']?></td>
                                                            <td style="width: 1px;"></td>
                                                            <td class="daily_ds_dv" >Systolic<br /><?php echo $row['sys_min']?></td>
                                                            <td style="width: 1px;"></td>
                                                            <td class="daily_ds_dv" >Diastolic<br /><?php echo $row['dia_ave']?></td>
                                                            <td style="width: 1px;"></td>
                                                            <td class="daily_ds_dv" >Systolic<br /><?php echo $row['sys_ave']?></td>
                                                            <td style="width: 1px;"></td>
                                                            <td class="daily_ds_dv" >Diastolic<br /><?php echo $row['dia_max']?></td>
                                                            <td style="width: 1px;"></td>
                                                            <td class="daily_ds_dv" >Systolic<br /><?php echo $row['sys_max']?></td>
                                                          </tr>
                                                        </table>
                                                       </td>
                                                     </tr>
                                                     <?php }}} ?>
                                               </table>
                            </span>
                      </td>
                    <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box2" style="">
                    
                    		 <?php
                                $query_bp="SELECT * FROM " .Bp_Age_Masters. " WHERE min_age <= ".$age." and max_age>=".$age." order by min_age limit 1";
								//echo $query;
								   $result_bp = mysql_query($query_bp);
									  if($result_bp != "") {
									    $rowcount = mysql_num_rows($result_bp);
									      if($rowcount > 0) {
										     while($row_bp = mysql_fetch_assoc($result_bp)) {
											    extract($row_bp);
								?>
                                <?php echo $row_bp['dia_ave']?>/<?php echo $row_bp['sys_ave']?>
                                
								
						<?php }}} ?>	
                                
                                
                    </td>
                    <td class="dailyreport_sep" ></td>
                  
                    <td class="nutri_dailyreport_box4" style="text-align: center; line-height: 14px; ">
								<?php
									if($blood_pressure_record_date=="") {echo "0";}
									else {
										echo date('d-M-Y',strtotime($blood_pressure_record_date));
									}
								?>
								</td>
                    <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box5">
						<div style="width: 234px; height: 38px; float: left; background-image: url(<?php echo $strHostName;?>/images/nutritionist/grey_line.png); background-repeat: repeat; padding: 0px; border: solid 0px #000000;" id="BloodPressure_Chart">
                        
						 </div>
                         
                    </td>
                  </tr>
                  
                  <tr id="FBMinus" style="display:none;">
                    <td class="nutri_dailyreport_box1"><a onclick="javascript:ShowMinus('FB');" style="cursor:pointer;"><img src="<?php echo $strHostName;?>/images/nutritionist/minus_icon.png" alt="" title="" border="0" style="border: solid 0px #000; padding-right: 10px;"><span class="f_grey" style="font-size: 13px;">Fasting Blood Sugar</span></a></td>
                    <td class="dailyreport_sep"></td>
                     <td class="nutri_dailyreport_box3 report_card_hover">
                   				  <a href="#" class="" style="border:solid 0px red; cursor:text;">
								 <?php
									if($fasting_blood_sugar_result=="") {echo "0";}
									else {
										echo $fasting_blood_sugar_result ;
									}
								?>
                                </a> 
                                
                                <span>
                                <img class="callout_hover" src="<?php echo $strHostName;?>/images/callout.gif" />
                        
                                 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="line-height:20px;">
                                  		<tr>
                                        	<td style="border-bottom:solid 1px #00CC33;">Average Sugar values (Fasting Blood Sugar)</td>
                                        </tr>
                                        <tr>
                                        	<td style="padding-top:5px;">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td class="daily_mamvalues_dv">Normal Values <br /> 70 - 100 mg/dl</td>
                                                    <td>&nbsp;</td>
                                                    <td class="daily_mamvalues_dv">Early Diabetes <br /> 101 - 126 mg/dl</td>
                                                    <td>&nbsp;</td>
                                                    <td class="daily_mamvalues_dv">Established Diabetes <br /> &gt; 126 mg/dl</td>
                                                  </tr>
                                                </table>
                                            </td>
										</tr>
                                         
                                        
                                </table>
							</span>
                            
                           
                                
					 </td>
                     <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box2">70 to 100</td>
                    
                   
                    <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box4" style="text-align: center; line-height: 14px; ">
						<?php
									if($fasting_blood_sugar_date=="") {echo "0";}
									else {
										echo date('d-M-Y',strtotime($fasting_blood_sugar_date));
									}
								?>
					
					</td>
                    <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box5">
                          <div style="width: 234px; height: 38px; float: left; background-image: url(<?php echo $strHostName;?>/images/nutritionist/grey_line.png); background-repeat: repeat; padding: 0px; border: solid 0px #000000;" id="Fasting_blood_sugar_range"></div>
                      </td>
                  </tr>
                  
                  <tr id="PPBSMinus" style="display:none;">
                    <td class="nutri_dailyreport_box1"><a onclick="javascript:ShowMinus('PPBS');" style="cursor:pointer;"><img src="<?php echo $strHostName;?>/images/nutritionist/minus_icon.png" alt="" title="" border="0" style="border: solid 0px #000; padding-right: 10px;"><span class="f_grey" style="font-size: 13px;">Blood Sugar After Meal </span></a></td>
                    <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box3 report_card_hover" style="">
                     		 <a href="#" class="" style="border:solid 0px red; cursor:text;">	
								<?php
									if($post_parandial_result=="") {echo "0";}
									else {
										echo $post_parandial_result ;
									}
								?>
                             </a>   
                                
                                <span>
                                <img class="callout_hover" src="<?php echo $strHostName;?>/images/callout.gif" />
                                 
                                 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="line-height:20px;">
                                  		<tr>
                                        	<td style="border-bottom:solid 1px #00CC33;">Average Sugar values (after 2 hours of meal (PPBS))</td>
                                        </tr>
                                        <tr>
                                        	 <td style="padding-top:5px;">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td class="daily_mamvalues_dv">Normal Values <br />&lt; 140 mg/dl</td>
                                                    <td>&nbsp;</td>
                                                    <td class="daily_mamvalues_dv">Early Diabetes <br /> 140 - 200 mg/dl</td>
                                                    <td>&nbsp;</td>
                                                    <td class="daily_mamvalues_dv">Established Diabetes <br /> &gt; 200 mg/dl</td>
                                                  </tr>
                                                </table>
                                            </td>
										</tr>
                                         
                                        
                                </table>
							</span>
                            
                                </td>
                    <td class="dailyreport_sep"></td>
                     <td class="nutri_dailyreport_box2" style=""> 140 to 200 </td>
                    
                    <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box4" style="text-align: center; line-height: 14px; ">
						<?php
									if($post_parandial_date=="") {echo "0";}
									else {
										echo date('d-M-Y',strtotime($post_parandial_date));
									}
								?>
					</td>
                    <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box5">
                    
                      <div style="width: 234px; height: 38px; float: left; background-image: url(<?php echo $strHostName;?>/images/nutritionist/grey_line.png); background-repeat: repeat; padding: 0px; border: solid 0px #000000;" id="BloodPressure_AfterMeal"></div>
                      </td>
                  </tr>
                  
                  <tr id="RBSMinus" style="display:none;">
                    <td class="nutri_dailyreport_box1"><a onclick="javascript:ShowMinus('RBS');" style="cursor:pointer;"><img src="<?php echo $strHostName;?>/images/nutritionist/minus_icon.png" alt="" title="" border="0" style="border: solid 0px #000; padding-right: 10px;"><span class="f_grey" style="font-size: 13px;">Random Blood Sugar</span></a></td>
                   
                    <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box3" style="">
                  			<a href="#" class="" style="border:solid 0px red; cursor:text;">
                              <?php
									if($random_blood_sugar_result=="") {echo "0";}
									else {
										echo $random_blood_sugar_result;
									}
								?>
                              </a>
                                
                            
                              </td>
                    <td class="dailyreport_sep"></td>
                     <td class="nutri_dailyreport_box2" style="">-</td>
                    <td class="dailyreport_sep"></td>
                   
                    <td class="nutri_dailyreport_box4" style="text-align: center; line-height: 14px; ">
						<?php
									if($random_blood_sugar_date=="") {echo "0";}
									else {
										echo date('d-M-Y',strtotime($random_blood_sugar_date));
									}
								?>
					</td>
                    <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box5">
                        
                          <div style="width: 234px; height: 38px; float: left; background-image: url(<?php echo $strHostName;?>/images/nutritionist/grey_line.png); background-repeat: repeat; padding: 0px; border: solid 0px #000000;" id="Random_blood_sugar_range" ></div>
                      </td>
                  </tr>
                  
                  <tr id="UBSMinus" style="display:none;">
                    <td class="nutri_dailyreport_box1"><a onclick="javascript:ShowMinus('UBS');" style="cursor:pointer;"><img src="<?php echo $strHostName;?>/images/nutritionist/minus_icon.png" alt="" title="" border="0" style="border: solid 0px #000; padding-right: 10px;"><span class="f_grey" style="font-size: 13px;">Urine Blood Sugar </span></a></td>
                    <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box3 " style="">
                     			<a href="#" class="" style="border:solid 0px red; cursor:text;">
								<?php
									if($urine_blood_result=="") {echo "0";}
									else {
										echo $urine_blood_result;
									}
								?>
                                </a>
                                
                     </td>
                    <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box2" style="">-</td>
                    <td class="dailyreport_sep"></td>
                   
                    <td class="nutri_dailyreport_box4" style="text-align: center; line-height: 14px; ">
						<?php
									if($urine_blood_date=="") {echo "0";}
									else {
										echo date('d-M-Y',strtotime($urine_blood_date));
									}
								?>
					</td>
                    <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box5">
                    
                      <div style="width: 234px; height: 38px; float: left; background-image: url(<?php echo $strHostName;?>/images/nutritionist/grey_line.png); background-repeat: repeat; padding: 0px; border: solid 0px #000000;" id="urine_blood_range"></div>
                      </td>
                  </tr>
                  
                  <tr id="CholesterolMinus" style="display:none; margin-top:4px;">
                    <td class="nutri_dailyreport_box1"><a onclick="javascript:ShowMinus('Cholesterol');" style="cursor:pointer;"><img src="<?php echo $strHostName;?>/images/nutritionist/minus_icon.png" alt="" title="" border="0" style="border: solid 0px #000; padding-right: 10px;"><span class="f_grey" style="font-size: 13px;">Cholesterol </span></a></td>
                   
                   <td class="dailyreport_sep"></td> 
                   <td class="nutri_dailyreport_box3 report_card_hover" style="">
                   				<a href="#" class="" style="border:solid 0px red; cursor:text;">
								<?php
									if($cholesterol_range=="") {echo "0";}
									else {
										echo $cholesterol_range;
									}
								?>
                                </a>
                                <span>
                                <img class="callout_hover" src="<?php echo $strHostName;?>/images/callout.gif" />
                                 
                                 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="line-height:20px;">
                                  		<tr>
                                        	<td style="border-bottom:solid 1px #00CC33;">Average Average Total Cholesterol values </td>
                                        </tr>
                                        <tr>
                                        	<td style="padding-top:5px;">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td class="daily_mamvalues_dv">Desirable<br /> &lt; 200 mg/dl </td>
                                                    <td>&nbsp;</td>
                                                    <td class="daily_mamvalues_dv">Borderline <br />200 - 239 mg/dl</td>
                                                    <td>&nbsp;</td>
                                                    <td class="daily_mamvalues_dv">High <br />240 mg/dl </td>
                                                  </tr>
                                                </table>
                                            </td>
										</tr>
                                         
                                        
                                </table>
							</span>
                     </td>
                    
                    <td class="dailyreport_sep"></td>
                     <td class="nutri_dailyreport_box2" style=""> < 200</td>
                    <td class="dailyreport_sep"></td>
                   
                    <td class="nutri_dailyreport_box4" style="text-align: center; line-height: 14px; ">
						<?php
									if($cholesterol_date=="") {echo "0";}
									else {
										echo date('d-M-Y',strtotime($cholesterol_date));
									}
								?>
					</td>
                    <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box5">
                    	<div style="width: 234px; height: 38px; float: left; background-image: url(<?php echo $strHostName;?>/images/nutritionist/grey_line.png); background-repeat: repeat; padding: 0px; border: solid 0px #000000;" id="cholesterol_range"></div>
                    </td>
                  </tr>
                 
                  <tr id="TriglycerideMinus" style="display:none; margin-top:4px;">
                    <td class="nutri_dailyreport_box1"><a onclick="javascript:ShowMinus('Triglyceride');" style="cursor:pointer;"><img src="<?php echo $strHostName;?>/images/nutritionist/minus_icon.png" alt="" title="" border="0" style="border: solid 0px #000; padding-right: 10px;"><span class="f_grey" style="font-size: 13px;">Triglyceride</span></a></td>
                    <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box3 report_card_hover" style="">
                    <a href="#" class="" style="border:solid 0px red; cursor:text;">
                     		<?php
									if($triglyceride_blood_sugar_range=="") {echo "0";}
									else {
										echo $triglyceride_blood_sugar_range;
									}
								?>
                                </a>
                                <span>
                                <img class="callout_hover" src="<?php echo $strHostName;?>/images/callout.gif" />
                                 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="line-height:20px;">
                                  		<tr>
                                        	<td style="border-bottom:solid 1px #00CC33;">Average Total Triglyceride values </td>
                                        </tr>
                                        <tr>
                                        	<td style="padding-top:5px;">
                                                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                  <tr>
                                                    <td class="daily_mamvalues_dv">Desirable<br /> &lt; 150 mg/dl</td>
                                                    <td>&nbsp;</td>
                                                    <td class="daily_mamvalues_dv">Borderline <br />150 - 199 mg/dl</td>
                                                    <td>&nbsp;</td>
                                                    <td class="daily_mamvalues_dv">High <br /> 200 - 499 mg/dl </td>
                                                    <td>&nbsp;</td>
                                                    <td class="daily_mamvalues_dv">Very High <br /> &gt; 500 mg/dll </td>
                                                  </tr>
                                                </table>
                                            </td>
										</tr>
                                         
                                        
                                </table>
                                 
							</span>
                                </td>
                    <td class="dailyreport_sep"></td>
                     <td class="nutri_dailyreport_box2" style="">< 150</td>
                    <td class="dailyreport_sep"></td>
                                  
                   <td class="nutri_dailyreport_box4" style="text-align: center; line-height: 14px; ">
							<?php
									if($triglyceride_blood_sugar_date=="") {echo "0";}
									else {
										echo date('d-M-Y',strtotime($triglyceride_blood_sugar_date));
									}
								?>
					
					</td>
                    <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box5">
                    
                      <div style="width: 234px; height: 38px; float: left; background-image: url(<?php echo $strHostName;?>/images/nutritionist/grey_line.png); background-repeat: repeat; padding: 0px; border: solid 0px #000000;" id="Triglyceride_blood_sugar_range"></div>
                        </div>
                      </td>
                  </tr>
                  
                  <tr id="HDLMinus"  style="display:none; margin-top:4px;">
                    <td class="nutri_dailyreport_box1"><a onclick="javascript:ShowMinus('HDL');" style="cursor:pointer;"><img src="<?php echo $strHostName;?>/images/nutritionist/minus_icon.png" alt="" title="" border="0" style="border: solid 0px #000; padding-right: 10px;"><span class="f_grey" style="font-size: 13px;">HDL</span></a></td>
                    <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box3  report_card_hover"  style="">
                    <a href="#" class="" style="border:solid 0px red; cursor:text;">
                     <?php
									if($hdl_range=="") {echo "0";}
									else {
										echo $hdl_range;
									}
								?>
                                
                            <span style="margin-top:-55px; width:500px;">
                           			 <img class="callout_hover" src="<?php echo $strHostName;?>/images/callout.gif" />
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="line-height:20px; font-size:9px;">
                                                    <tr>
                                                        <td style="border-bottom:solid 1px #00CC33; padding-bottom:5px;">Average HDL values</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:5px;">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr>
                                                                <td  style="font-size:12px;" class="daily_mamvalues_dv">Low Level, Increased Risk</td>
                                                                <td>&nbsp;</td>
                                                                <td style="font-size:12px;" class="daily_mamvalues_dv">Avg. Level, Avg. Risk</td>
                                                                <td>&nbsp;</td>
                                                                <td  style="font-size:12px;" class="daily_mamvalues_dv">High Level, Less Than Avg.  Risk</td>
                                                              </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                       <td style="padding-top:5px;">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                          <tr>
                                                            <td style="font-size:12px;" class="daily_ds_dv" >Men<br />40 mg/dl</td>
                                                            <td style="width: 1px;"></td>
                                                            <td  style="font-size:12px;" class="daily_ds_dv" >Women<br />50 mg/dl</td>
                                                            <td  style="width: 1px;"></td>
                                                            <td style="font-size:12px;" class="daily_ds_dv" >Men<br />40 - 50 mg/dl</td>
                                                            <td style="width: 1px;"></td>
                                                            <td  style="font-size:12px;"class="daily_ds_dv" >Women<br />50 - 59 mg/dl</td>
                                                            <td style="width: 1px;"></td>
                                                            <td  style="font-size:12px;"class="daily_ds_dv" >Men<br />60 mg/dl</td>
                                                            <td style="width: 1px;"></td>
                                                            <td  style="font-size:12px;"class="daily_ds_dv" >Women<br />60 mg/dl</td>
                                                          </tr>
                                                        </table>
                                                       </td>
                                                       
                                                       
                                                    </tr>
                                                    
                                            </table>
                            </span>
                    </td>
                    <td class="dailyreport_sep"></td>
                     <td class="nutri_dailyreport_box2" style=""> > 60</td>
                    <td class="dailyreport_sep"></td>
                   
                    <td class="nutri_dailyreport_box4" style="text-align: center; line-height: 14px; ">
								<?php
									if($hdl_date=="") {echo "0";}
									else {
										echo date('d-M-Y',strtotime($hdl_date));
									}
								?>
					</td>
                    <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box5">
                        
                          <div style="width: 234px; height: 38px; float: left; background-image: url(<?php echo $strHostName;?>/images/nutritionist/grey_line.png); background-repeat: repeat; padding: 0px; border: solid 0px #000000;" id="Hdl_range"></div>
                        </div>
                      </td>
                  </tr>
                  
                  <tr id="LDLMinus"  style="display:none; margin-top:4px;">
                    <td class="nutri_dailyreport_box1"><a onclick="javascript:ShowMinus('LDL');" style="cursor:pointer;"><img src="<?php echo $strHostName;?>/images/nutritionist/minus_icon.png" alt="" title="" border="0" style="border: solid 0px #000; padding-right: 10px;"><span class="f_grey" style="font-size: 13px;">LDL</span></a></td>
                    <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box3 report_card_hover" style="">
                    <?php
									if($ldl_range=="") {echo "0";}
									else {
										echo $ldl_range;
									}
								?>
                         <span style="margin-top:-55px; width:500px;">
                           			 <img class="callout_hover" src="<?php echo $strHostName;?>/images/callout.gif" />
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="line-height:20px; font-size:9px;">
                                                    <tr>
                                                        <td style="border-bottom:solid 1px #00CC33; padding-bottom:5px;">Average LDL values </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:5px;">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr>
                                                                <td  style="font-size:12px;" class="daily_mamvalues_dv">Optimal Range <br /> &lt; 100 mg/dl</td>
                                                                <td>&nbsp;</td>
                                                                <td style="font-size:12px;" class="daily_mamvalues_dv">Near/ Above Optimal<br />100 - 129 mg/dl </td>
                                                                <td>&nbsp;</td>
                                                                <td>&nbsp; </td>
                                                              </tr>
                                                              <tr>
                                                                   <td style="padding-bottom:5px;"> </td>
                                                               </tr>
                                                              <tr >
                                                              
                                                                <td  style="font-size:12px; " class="daily_mamvalues_dv">Borderline High <br /> 130 - 159 mg/dl</td>
                                                                <td>&nbsp;</td>
                                                                <td style="font-size:12px;" class="daily_mamvalues_dv">High <br />160 - 189 mg/dl </td>
                                                                <td>&nbsp;</td>
                                                                <td style="font-size:12px;" class="daily_mamvalues_dv">Very High <br />&gt;190 mg/dl </td>
                                                              </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                     
                                                    
                                            </table>
                            </span>       
                                
                                
                    </td>
                    <td class="dailyreport_sep"></td>
                    
                    <td class="nutri_dailyreport_box2" style="">> 80</td>
                    <td class="dailyreport_sep"></td>
                    
                    <td class="nutri_dailyreport_box4" style="text-align: center; line-height: 14px; ">
								<?php
									if($ldl_date=="") {echo "0";}
									else {
										echo date('d-M-Y',strtotime($ldl_date));
									}
								?>
				</td>
                    <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box5">
                    <div style="width: 234px; height: 38px; float: left; background-image: url(<?php echo $strHostName;?>/images/nutritionist/grey_line.png); background-repeat: repeat; padding: 0px; border: solid 0px #000000;" id="ldl_range"></div>
                        </div>
                      </td>
                  </tr>
                 
                  <tr id="CigaretteMinus"  style="display:none; margin-top:4px;">
                    <td class="nutri_dailyreport_box1"><a onclick="javascript:ShowMinus('Cigarette');" style="cursor:pointer;"><img src="<?php echo $strHostName;?>/images/nutritionist/minus_icon.png" alt="" title="" border="0" style="border: solid 0px #000; padding-right: 10px;"><span class="f_grey" style="font-size: 13px;">Cigarette</span></a></td>
                    <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box3 report_card_hover"  style="">
                    <?php
									if($cigarette=="") {echo "0";}
									else {
										echo $cigarette;
									}
								?>
                                
                            <span style="margin-top:-55px; display:none;">
                           			 <img class="callout_hover" src="<?php echo $strHostName;?>/images/callout.gif" />
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="line-height:20px; font-size:11px;">
                                                    <tr>
                                                        <td style="border-bottom:solid 1px #00CC33; padding-bottom:5px;">Lifestyle Values - Cigarette (smoke per day)</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:5px;">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr>
                                                                <td class="daily_mamvalues_dv">Daily goal set by you</td>
                                                                <td>&nbsp;</td>
                                                                <td class="daily_mamvalues_dv">Actual as on today</td>
                                                                <td>&nbsp;</td>
                                                                <td >&nbsp;</td>
                                                              </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                       <td style="padding-top:5px;">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                          <tr>
                                                            
                                                            <td style="width: 75px;"></td>
                                                            <td class="daily_ds_dv" style="width: 15%;"><?php echo $cigarette_goal;?></td>
                                                            <td style="width: 25px;"></td>
                                                            <td style="width: 110px;"></td>
                                                            <td class="daily_ds_dv"  style="width: 15%;"><?php echo $cigarette;?></td>
                                                            <td style="width: 50px;"></td>
                                                            <td >&nbsp;</td>
                                                          </tr>
                                                        </table>
                                                       </td>
                                                       
                                                       
                                                    </tr>
                                                    
                                            </table>
                            </span>
                    </td>
                    <td class="dailyreport_sep"></td>
                     <td class="nutri_dailyreport_box2" style=""><?php echo $cigarette_goal;?></td>
                    <td class="dailyreport_sep"></td>
                   
                    <td class="nutri_dailyreport_box4" style="text-align: center; line-height: 14px; ">
								<?php
									if($cig_date=="") {echo "0";}
									else {
										echo date('d-M-Y',strtotime($cig_date));
									}
								?>
					</td>
                    <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box5">
                    	<div style="width: 234px; height: 38px; float: left; background-image: url(<?php echo $strHostName;?>/images/nutritionist/grey_line.png); background-repeat: repeat; padding: 0px; border: solid 0px #000000;" id="Cigarette"></div>
                    </td>
                  </tr>
                  
                  <tr id="BeerMinus"  style="display:none; margin-top:4px;">
                    <td class="nutri_dailyreport_box1"><a onclick="javascript:ShowMinus('Beer');" style="cursor:pointer;"><img src="<?php echo $strHostName;?>/images/nutritionist/minus_icon.png" alt="" title="" border="0" style="border: solid 0px #000; padding-right: 10px;"><span class="f_grey" style="font-size: 13px;">Beer</span></a></td>
                    <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box3 report_card_hover" style="">
                    
                    <?php
									if($beer=="") {echo "0";}
									else {
										echo $beer;
									}
								?>
                                <span style="margin-top:-55px; display:none;">
                           			 <img class="callout_hover" src="<?php echo $strHostName;?>/images/callout.gif" />
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="line-height:20px; font-size:11px;">
                                                    <tr>
                                                        <td style="border-bottom:solid 1px #00CC33; padding-bottom:5px;">Lifestyle Values - Beer (beer glasses per week)</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:5px;">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr>
                                                                <td class="daily_mamvalues_dv">Weekly goal set by you</td>
                                                                <td>&nbsp;</td>
                                                                <td class="daily_mamvalues_dv">Actual for the week <br />31 Aug 2014 - 7 Sept 2014</td>
                                                                <td>&nbsp;</td>
                                                                <td >&nbsp;</td>
                                                              </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                       <td style="padding-top:5px;">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                          <tr>
                                                            
                                                            <td style="width: 55px;"></td>
                                                            <td class="daily_ds_dv" style="width: 15%;"><?php echo $beer_goal;?> glasses</td>
                                                            <td style="width: 25px;"></td>
                                                            <td style="width: 120px;"></td>
                                                            <td class="daily_ds_dv"  style="width: 15%;"><?php echo $beer;?> glasses</td>
                                                            <td style="width: 50px;"></td>
                                                            <td >&nbsp;</td>
                                                          </tr>
                                                        </table>
                                                       </td>
                                                       
                                                       
                                                    </tr>
                                                    
                                            </table>
                            </span>
                                
                                </td>
                    <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box2" style=""><?php echo $beer_goal;?></td>
                    <td class="dailyreport_sep"></td>
                   
                    <td class="nutri_dailyreport_box4" style="text-align: center; line-height: 14px; ">
								<?php
									if($beer_date=="") {echo "0";}
									else {
										echo date('d-M-Y',strtotime($beer_date));
									}
								?>
					</td>
                    <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box5">
                    	<div style="width: 234px; height: 38px; float: left; background-image: url(<?php echo $strHostName;?>/images/nutritionist/grey_line.png); background-repeat: repeat; padding: 0px; border: solid 0px #000000;" id="Beer"></div>
                    </td>
                  </tr>
                  
                  <tr id="SpiritMinus"  style="display:none; margin-top:4px;">
                    <td class="nutri_dailyreport_box1"><a onclick="javascript:ShowMinus('Spirit');" style="cursor:pointer;"><img src="<?php echo $strHostName;?>/images/nutritionist/minus_icon.png" alt="" title="" border="0" style="border: solid 0px #000; padding-right: 10px;"><span class="f_grey" style="font-size: 13px;">Spirit</span></a></td>
                    <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box3 report_card_hover" style="">
                     <?php
									if($spirit=="") {echo "0";}
									else {
										echo $spirit;
									}
								?>
                                <span style="margin-top:-55px; display:none;">
                           			 <img class="callout_hover" src="<?php echo $strHostName;?>/images/callout.gif" />
                                  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="line-height:20px; font-size:11px;">
                                                    <tr>
                                                        <td style="border-bottom:solid 1px #00CC33; padding-bottom:5px;">Lifestyle Values - Alcohol (ml consumed per week)</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-top:5px;">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                              <tr>
                                                                <td class="daily_mamvalues_dv">Weekly goal set by you</td>
                                                                <td>&nbsp;</td>
                                                                <td class="daily_mamvalues_dv">Actual for the week <br />31 Aug 2014 - 7 Sept 2014</td>
                                                                <td>&nbsp;</td>
                                                                <td >&nbsp;</td>
                                                              </tr>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                     <tr>
                                                       <td style="padding-top:5px;">
                                                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                          <tr>
                                                            
                                                            <td style="width: 65px;"></td>
                                                            <td class="daily_ds_dv" style="width: 15%;"><?php echo $spirit_goal;?> ml</td>
                                                            <td style="width: 25px;"></td>
                                                            <td style="width: 110px;"></td>
                                                            <td class="daily_ds_dv"  style="width: 15%;"><?php echo $spirit;?> ml</td>
                                                            <td style="width: 50px;"></td>
                                                            <td >&nbsp;</td>
                                                          </tr>
                                                        </table>
                                                       </td>
                                                       
                                                       
                                                    </tr>
                                                    
                                            </table>
                            </span>
                                </td>
                    <td class="dailyreport_sep"></td>
                     <td class="nutri_dailyreport_box2" style=""><?php echo $spirit_goal;?></td>
                    <td class="dailyreport_sep"></td>
                    
                    <td class="nutri_dailyreport_box4" style="text-align: center; line-height: 14px; "><?php
									if($spirit_date=="") {echo "0";}
									else {
										echo date('d-M-Y',strtotime($spirit_date));
									}
								?></td>
                    <td class="dailyreport_sep"></td>
                    <td class="nutri_dailyreport_box5">
                    	<div style="width: 234px; height: 38px; float: left; background-image: url(<?php echo $strHostName;?>/images/nutritionist/grey_line.png); background-repeat: repeat; padding: 0px; border: solid 0px #000000;" id="Spirit"></div>
                    </td>
                  </tr>
                  
                  
                 <tr>
                         <td colspan="9" style="background-color: #FFFFFF; height: 4px; line-height:20px; padding-top:10px;">
                            	<span style="font-weight: bold;">Add to list:</span>&nbsp;&nbsp;
                                <span id="BPPlus" ><a onclick="javascript:ShowPlus('BP');" style="cursor:pointer; display:'';">&nbsp;<img src="<?php echo $strHostName;?>/images/nutritionist/plus_icon.png" alt="" title="" border="0"> Blood Pressure</a>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                <span id="FBPlus"><a onclick="javascript:ShowPlus('FB');" style="cursor:pointer; display:'';"><img src="<?php echo $strHostName;?>/images/nutritionist/plus_icon.png" alt="" title="" border="0"> Fasting Blood Sugar</a>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                <span id="PPBSPlus" ><a onclick="javascript:ShowPlus('PPBS');" style="cursor:pointer; display:'';"><img src="<?php echo $strHostName;?>/images/nutritionist/plus_icon.png" alt="" title="" border="0"> Blood Sugar After Meal (PPBS)</a>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                         		 <span id="RBSPlus"><a onclick="javascript:ShowPlus('RBS');" style="cursor:pointer; display:'';"><img src="<?php echo $strHostName;?>/images/nutritionist/plus_icon.png" alt="" title="" border="0"> Random Blood Sugar</a>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                <span id="UBSPlus" ><a onclick="javascript:ShowPlus('UBS');" style="cursor:pointer; display:'';"><img src="<?php echo $strHostName;?>/images/nutritionist/plus_icon.png" alt="" title="" border="0"> Urine Blood Sugar</a>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                <span id="CholesterolPlus"><a onclick="javascript:ShowPlus('Cholesterol');" style="cursor:pointer; display:'';"><img src="<?php echo $strHostName;?>/images/nutritionist/plus_icon.png" alt="" title="" border="0"> Cholesterol</a>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                              	<span id="TriglyceridePlus"><a onclick="javascript:ShowPlus('Triglyceride');" style="cursor:pointer; display:'';"><img src="<?php echo $strHostName;?>/images/nutritionist/plus_icon.png" alt="" title="" border="0"> Triglyceride</a>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                <span id="HDLPlus"><a onclick="javascript:ShowPlus('HDL');" style="cursor:pointer; display:'';"><img src="<?php echo $strHostName;?>/images/nutritionist/plus_icon.png" alt="" title="" border="0"> HDL</a>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                <span id="LDLPlus"><a onclick="javascript:ShowPlus('LDL');" style="cursor:pointer; display:'';"><img src="<?php echo $strHostName;?>/images/nutritionist/plus_icon.png" alt="" title="" border="0"> LDL</a>&nbsp;&nbsp;&nbsp;&nbsp;</span>
        						<span id="CigarettePlus"><a onclick="javascript:ShowPlus('Cigarette');" style="cursor:pointer; display:'';"><img src="<?php echo $strHostName;?>/images/nutritionist/plus_icon.png" alt="" title="" border="0"> Cigarette</a>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                <span id="BeerPlus"><a onclick="javascript:ShowPlus('Beer');" style="cursor:pointer; display:'';"><img src="<?php echo $strHostName;?>/images/nutritionist/plus_icon.png" alt="" title="" border="0"> Beer</a>&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                <span id="SpiritPlus"><a onclick="javascript:ShowPlus('Spirit');" style="cursor:pointer; display:'';"><img src="<?php echo $strHostName;?>/images/nutritionist/plus_icon.png" alt="" title="" border="0"> Spirit</a>&nbsp;&nbsp;&nbsp;&nbsp;</span>
					</td>
                    </tr>
                </table>
              </div>
            </div>




<script type="text/javascript">
DefaultShow();
</script>