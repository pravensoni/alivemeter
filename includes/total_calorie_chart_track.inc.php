<?php include 'common.inc.php'?>
<?php
$user_id="0";
$page=1;$page_count=10;$newpagenumber="2";$retrive_Array=array();$get_array=array();$type="";
$fromdate=date('Y-m-d');$todate=date('Y-m-d');$rowCount="7";
/*Extra*/
$date_array=array();$fromdateEx_array=array();
$iStartAddDateLoop=1;
$iExistingAddDate=1;
/*Extra*/
if(isset($_SESSION['UserID']))
{
	$user_id=$_SESSION['UserID'];
}

if(isset($_GET['type']))
{
	$type=$_GET['type'];
}

if(isset($_GET['fromdate']))
{
	$fromdate=$_GET['fromdate'];
}

if(isset($_GET['todate']))
{
	$todate=$_GET['todate'];
}

if(isset($_GET['page'])){
	$page=$_GET['page'];
}
else
{
	$page=1;
}

if(isset($_GET['rowCount'])){
	$rowCount=$_GET['rowCount'];
	if($rowCount> 300)
	{
		$rowCount=12;
	}
	else if($rowCount> 10)
	{
		$rowCount=$rowCount-1;
	}
}
else
{
	$rowCount=1;
}



$fromdate=date('Y-m-d',strtotime($fromdate));
$todate=date('Y-m-d',strtotime($todate));


/*Extra*/
$dlTrakingCheckDate="";
$isAlreadyExisits="0";
if($type=="calorie_resultYearly")
{
	$fromdate_array=date('Y')."-01-01";
	$fromdate_array=date('M',strtotime($fromdate_array));
	$rowCount=$rowCount-1;
}
else
{
	$fromdate_array=date('d-M',strtotime($fromdate));
}



for($i=1;$i < ($rowCount+2);$i++)
{							
	
	
	$date_array[$i]=$fromdate_array;
	
	if($type=="calorie_result" )
	{	
		$fromdate_array = strtotime("+1 day", strtotime($fromdate_array));
		$fromdate_array = date('d-M',$fromdate_array);
	}
	if($type=="calorie_resultMonth")
	{	
		$fromdate_array = strtotime("+1 day", strtotime($fromdate_array));
		$fromdate_array = date('d-M',$fromdate_array);
	}
	if($type=="calorie_resultYearly")
	{		
		$fromdate_array = strtotime("+1 Month", strtotime($fromdate_array));
		$fromdate_array = date('M',$fromdate_array);
	}
	
}
 

 
/*Extra*/ 


if($type=="calorie_resultYearly")
{
	$retrive_Array=$get_retrive->Get_Calorie_Chart_Yearly($rowCount,$user_id,$fromdate,$todate);
	
}
else 
{
	
	$retrive_Array=$get_retrive->Get_Calorie_Chart($rowCount,$user_id,$fromdate,$todate);	
}


$Result="0";
$Result1="0";
$Result2="0";
$Result3="0";
$Result4="0";
$calorie_result="0";
$remaining="0";
		
$months="0"; $res_100="100"; $res_70="70";
while($get_array = mysql_fetch_array( $retrive_Array )){
	//$blood_pressure_systolic= explode("/",$get_array['blood_pressure_systolic']);
	

	//$calorie_result= $get_array['calorie_consumed'];
	
	
	
	/*Extra Dates*/
			for($iAddDate=$iStartAddDateLoop;$iAddDate < ($rowCount+2);$iAddDate++)
			{

				//Alert($date_array[$iAddDate]);
				//Alert($dlTrakingCheckDate);
				
				if($type=="calorie_resultYearly")
				{	
					$dlTrakingCheckDate=date('M',strtotime($get_array['AvgMY']));
					
				}
				else
				{
					$dlTrakingCheckDate=date('d-M',strtotime($get_array['date']));		
				}	
				if($date_array[$iAddDate]==$dlTrakingCheckDate)
				{
					//Alert("Match");
					$iStartAddDateLoop=$iStartAddDateLoop+1;
					break;
				}
				else
				{

					//Alert($date_array[$iAddDate]);
					$iStartAddDateLoop=$iStartAddDateLoop+1;
					if($iExistingAddDate!="1")
					{
						if($date_array[$iAddDate]==$fromdateEx_array[$iExistingAddDate])
						{
							$iStartAddDateLoop=$iStartAddDateLoop+2;
							break;
						}
					}
					if($type=="calorie_result")
					{
						$months=$months."/".date('d-M',strtotime($date_array[$iAddDate]));		
						$Result=$Result."/0";
				$Result1=$Result1."/0";
				$Result2=$Result2."/0";
					}
					else if ($type=="calorie_resultMonth")
					{
						$months=$months."/".date('d',strtotime($date_array[$iAddDate]));	
						$Result=$Result."/0";
				$Result1=$Result1."/0";
				$Result2=$Result2."/0";
					}	
					else if ($type=="calorie_resultYearly")
					{
						$months=$months."/".date('M',strtotime($date_array[$iAddDate]));	
						$Result=$Result."/0";
				$Result1=$Result1."/0";
				$Result2=$Result2."/0";
					}
					
					
				}
			}

		 /*Extra Dates*/
	
	
	
	if($type=="calorie_result")
	{
		$calorie_result=$get_array['cal_consumed'];
		$calorie_result= number_format($calorie_result,0);
		$calorie_result= str_replace(",","",$calorie_result);
		
		$cal_burned=$get_array['cal_burned'];
		 $cal_burned= number_format($cal_burned,0);
		 $cal_burned= str_replace(",","",$cal_burned);
		 
		if($cal_burned==""  || $cal_burned ==null){$cal_burned=0;}
		$remaining=$calorie_result-$Result;
		if($remaining<0){$remaining="0";}
		$months=$months."/".date('d-M',strtotime($get_array['date']));
		$Result=$Result."/".$calorie_result;
		$Result1=$Result1."/".$cal_burned;
		$Result2=$Result2."/".$remaining;
		
	}

	if($type=="calorie_resultMonth")
	{
		$calorie_result=$get_array['cal_consumed']; 
		 $calorie_result= number_format($calorie_result,0);
		 $calorie_result= str_replace(",","",$calorie_result);
		 
		$cal_burned=$get_array['cal_burned'];
		 $cal_burned= number_format($cal_burned,0);
		  $cal_burned= str_replace(",","",$cal_burned);
		 
		 
		if($cal_burned==""  || $cal_burned ==null){$cal_burned=0;}
		$remaining=$calorie_result-$Result;
		if($remaining<0){$remaining="0";}
		$months=$months."/".date('d',strtotime($get_array['date']));
		$fromdateEx_array[$iExistingAddDate]=date('d',strtotime($get_array['date']));
		$Result=$Result."/".$calorie_result;
		$Result1=$Result1."/".$cal_burned;
		$Result2=$Result2."/".$remaining;
		

	}
	
	if($type=="calorie_resultYearly")
	{
	
		$calorie_result=$get_array['cal_consumed'];
		 $calorie_result= number_format($calorie_result,0);
		  $calorie_result= str_replace(",","",$calorie_result);
		 
		$cal_burned=$get_array['cal_burned'];
		 $cal_burned= number_format($cal_burned,0);
		  $cal_burned= str_replace(",","",$cal_burned);
		 
		if($cal_burned==""  || $cal_burned ==null){$cal_burned=0;}
		$remaining=$calorie_result-$Result;
		if($remaining<0){$remaining="0";}
		$months=$months."/".date('M',strtotime($get_array['AvgMY']));
		$fromdateEx_array[$iExistingAddDate]=date('M',strtotime($get_array['AvgMY']));
		
		$Result=$Result."/".$calorie_result;
		$Result1=$Result1."/".$cal_burned;
		$Result2=$Result2."/".$remaining;
		
	}

	
	
 }
 
/*Extra*/


	if($iStartAddDateLoop < $rowCount+2)
	{
		for($iAddDate=$iStartAddDateLoop;$iAddDate < ($rowCount+2);$iAddDate++)
		{
			 if($type=="calorie_result")
			{
				$months=$months."/".date('d-M',strtotime($date_array[$iAddDate]));		
				$Result=$Result."/0";
				$Result1=$Result1."/0";
				$Result2=$Result2."/0";
			}
			else if ($type=="calorie_resultMonth")
			{
				$months=$months."/".date('d',strtotime($date_array[$iAddDate]));	
				$Result=$Result."/0";
				$Result1=$Result1."/0";
				$Result2=$Result2."/0";
			}	
			else if ($type=="calorie_resultYearly")
			{
				$months=$months."/".date('M',strtotime($date_array[$iAddDate]));	
				$Result=$Result."/0";
				$Result1=$Result1."/0";
				$Result2=$Result2."/0";
			}
			
		}
	}
//}
/*Extra*/
if($months!="0" && $Result!="0")
{
	$months=substr($months,2);
	$Result=substr($Result,2);
	$Result1=substr($Result1,2);
	$Result2=substr($Result2,2);
	
	
	echo $months."###".$Result."###".$Result1."###".$Result2;
}


else
{
	
	 if(isset($_GET['fromdate']))
	{
		$fromdate=$_GET['fromdate'];
	}
	if($type=="curr_wgt_resultYearly" || $type=="curr_waist_resultYearly"  || $type=="curr_hips_resultYearly" || $type=="curr_arms_resultYearly"){
		$fromdate=date('Y')."-01-01";
		$fromdate=date('M',strtotime($fromdate));
		//$rowCount=$rowCount-1;
	}
	else
	{
		$fromdate=date('d-M',strtotime($fromdate));
	}
	

	
	$fromdate=date('Y-m-d',strtotime($fromdate));
	for($i=1;$i < ($rowCount+2);$i++)
	{								
		$Result=$Result."/0";
		if($type=="calorie_result"){
			$months=$months."/".date('d-M',strtotime($fromdate));
			$fromdate = strtotime("+1 day", strtotime($fromdate));
		}
		if($type=="calorie_resultMonth" ){
			$months=$months."/".date('d',strtotime($fromdate));
			$fromdate = strtotime("+1 day", strtotime($fromdate));
		}
		if($type=="calorie_resultYearly" ){
			$months=$months."/".date('M',strtotime($fromdate));
			$fromdate = strtotime("+1 Month", strtotime($fromdate));
		}
		//$fromdate = strtotime("+1 day", strtotime($fromdate));

		$fromdate = date('d-m-Y',$fromdate);
	 
	}
	$months=substr($months,2);
	$Result=substr($Result,2);
	$Result1=substr($Result1,2);
	$Result2=substr($Result2,2);
		
	 
	
	
echo $months."###".$Result."###".$Result1."###".$Result2;

	 
}
	
	

?>
