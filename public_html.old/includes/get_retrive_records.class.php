<?php
class  get_retrive_class {
	var $db;
	function get_retrive_class() {
		$this->db = new db_class;
	}

	function getReceipe($user_id,$type,$date)
	{
		$query = "SELECT b.name as receipe_name,b.portion,SUM(a.qty) as qunty,sum(a.energy) as cal FROM tbl_daily_food a inner join tbl_recipe b on a.receipe_id=b.id  WHERE a.type='$type' and a.user_id=$user_id and a.date='$date' group by a.receipe_id";
		//echo $query;
		$rows  = mysql_query($query); 
		return $rows;
	}
	
	function GetCalCounter($user_id, $paging)
	{
		
		$query = "SELECT distinct DATE_FORMAT(a.date,'%Y-%m-%d') as date FROM v_cal_counter a where a.user_id=$user_id and DATE_FORMAT(a.date,'%Y-%m-%d') not in (select DATE_FORMAT(record_date,'%Y-%m-%d')  from tbl_nutritionist_cal_comm where patient_id=$user_id  ) order by date desc,type";
		
	//echo $query;
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	}
	
	
	function GetCalCounter_Count($user_id)
	{
		
		$query = "SELECT Count(*) as col FROM v_cal_counter a where a.user_id=$user_id and DATE_FORMAT(a.date,'%Y-%m-%d') not in (select DATE_FORMAT(record_date,'%Y-%m-%d')  from tbl_nutritionist_cal_comm where patient_id=$user_id  ) order by date desc,type";
		//echo $query;
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}
	
	function GetCalCounter_Nut($user_id)
	{
		
		$query = "SELECT record_date as date,comment from tbl_nutritionist_cal_comm a where a.patient_id=$user_id";
		//echo $query;
		$rows  = mysql_query($query); 
		return $rows;
	}
	
	
	

	function GetCalCounter_Date($user_id,$date)
	{
		
		$query = "SELECT * FROM v_cal_counter where user_id=$user_id and date='$date' order by date desc,type";
	  	//echo $query;
		$rows  = mysql_query($query); 
		return $rows;
	}



	function Get_Md_Video_App($user_id,$type,$date)
	{
		
		$query = "SELECT *,other_hospital_name as Hospital_Name,(select b.name from tbl_users b where a.patient_id=b.user_id) as Paitent_Name FROM ".Md_Appoint." a where md_id=$user_id and other_app='$type' and app_date='$date' and isdeleted=0 ";
		///echo $query;
		$rows  = mysql_query($query); 
		return $rows;
	}

	function GetDoctor($paging,$record_id,$type='')
	{
		
		if(isset($_SESSION['UserID'])){
			$user_id=$_SESSION['UserID'];
		}
		else
		{
			$user_id=0;
		}
		$condition=""; $condition1="";
		if($record_id > 0)
		{
			$condition1=$condition1." and doctor_id=".$record_id;
		}
		
		$parent_id=GetValue("select parent_id as col from tbl_users where user_id=".$user_id, "col");
		if($parent_id==0)
		{
			$parent_id=$user_id;
		}
		$condition=$condition." and type='".$type."'";
		
		$query = "SELECT * FROM  ".Doctor." where isactive=1 and isdeleted=0 ".$condition." ".$condition1." and parent_id=".$parent_id." order by doctor_name";
	
		//echo $query;
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 
	 
	 
	 function GetMD()
	{
		
		$query = "SELECT * FROM  ".Doctor." where isactive=1 and isdeleted=0 and type='MD' order by doctor_name";
		
	/// echo $query;
		$rows  = mysql_query($query); 
		return $rows;
	} 
	
	function GetMDLimit()
	{
		
		$query = "SELECT * FROM  ".Doctor." where isactive=1 and isdeleted=0 and type='MD' order by doctor_id desc limit 1";
		
	/// echo $query;
		$rows  = mysql_query($query); 
		return $rows;
	} 
	
	function GetFolders($user_id)
	{
		
		$query = "SELECT * FROM  ".Folder." where parentid=$user_id and name <> 'inbox' and name <> 'Sent' and name <> 'Trash' and isdeleted=0 order by name";
		//echo $query;
		$rows  = mysql_query($query); 
		return $rows;
	} 
	
	function GetNutFolders($user_id)
	{
		$query = "SELECT * FROM  ".Nut_Folder." where parentid=$user_id and name <> 'inbox' and name <> 'Sent' and name <> 'Trash' order by name";
		$rows  = mysql_query($query); 
		return $rows;
	} 
	
	function Get_Records_Rows_Count($sql)
	{
		$nume=  $this->db->select_row_count($sql);
		return $nume;
	}
	
	function Get_Records_Count($sql)
	{
		$nume=  GetValue($sql,"col");
		return $nume;
	}



	function Get_Doctor_Count()
	{
		$condition="";
		if(isset($_GET['type']))
		{
			$type = $_GET['type'];
			$condition=$condition." and type=".$type;
		}
		
		$query = "SELECT Count(*) as  col FROM  ".Doctor." where isactive=1 and isdeleted=0 ".$condition."";
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}
	
 

	function Get_Doctor_Consultation_Count($user_id)
	{
		$query = "SELECT Count(*) as col FROM  ".Doctor_Consult." a  where isactive=1 and isdeleted=0 and user_id=$user_id ";
		$nume=$this->Get_Records_Count($query);
		return $nume; 
	} 
	
	
	function Get_Doctor_Consultation($paging,$record_id,$user_id)
	{
		
		$condition="";
		if($record_id > 0)
		{
			$condition=$condition." and doc_consult_id=".$record_id;
		}

		$query = "SELECT *,(select b.doctor_name from ".Doctor." b where a.doctor_id=b.doctor_id) as doctor_name,
		(select b.cond_name from ".Condition_Problem." b where a.diagnosed_cond=b.cond_id) as cond_name FROM  ".Doctor_Consult." a  where isactive=1 and isdeleted=0 and user_id=$user_id ".$condition." order by consult_date desc";
		
		//echo $query;
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 


	
	function Get_Hospital_Consultation($paging,$record_id,$user_id)
	{
		
		$condition="";
		if($record_id > 0)
		{
			$condition=$condition." and hospital_id=".$record_id;
		}

		$query = "SELECT *,(select b.doctor_name from ".Doctor." b where a.doctor_id=b.doctor_id) as doctor_name FROM  ".Hospital." a  where isactive=1 and isdeleted=0 and user_id=$user_id ".$condition." order by hospital_date desc";
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 
	
	function Get_Hospital_Consultation_Count($user_id)
	{
		$query = "SELECT Count(*) as  col FROM  ".Hospital." where isactive=1 and isdeleted=0 and user_id=$user_id";
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}
	
	
	function Get_Medication($paging,$record_id,$user_id)
	{
		
		$condition="";
		if($record_id > 0)
		{
			$condition=$condition." and medication_id=".$record_id;
		}

		$query = "SELECT * FROM  ".Medication." where isactive=1 and isdeleted=0 and user_id=$user_id ".$condition." order by created_date desc";
	//	echo $query;
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		//echo $rows;
		return $rows;
	} 
	
	
	
	function Get_Post_Comment_UnApp($cid)
	{
		
		$query = "SELECT * FROM  ".Post_Comment." where isactive=1 and isdeleted=0 and article_id=$cid and approved=0";
	//	echo $query;
		$rows  = mysql_query($query); 
		//echo $rows;
		return $rows;
	} 
	
	function Get_Post_Comment_App($cid)
	{
		
		$query = "SELECT * FROM  ".Post_Comment." where isactive=1 and isdeleted=0 and article_id=$cid and approved=1 order by created_date desc";
	//	echo $query;
		$rows  = mysql_query($query); 
		//echo $rows;
		return $rows;
	} 
	
	function Get_My_Post_Comment_App($cid, $user_id)
	{
		
		$query = "SELECT * FROM  ".Post_Comment." where isactive=1 and isdeleted=0 and article_id=$cid and approved=0 and user_id=$user_id order by created_date desc";
	//	echo $query;
		$rows  = mysql_query($query); 
		//echo $rows;
		return $rows;
	} 
	
	function Get_User_Reviews($mail_id, $userid)
	{
		
		$query = "SELECT * FROM  ".User_Reviews." where isactive=1 and isdeleted=0 and user_id=$userid and approved=1 and mail_id=$mail_id order by created_date desc";
		/// echo $query;
		$rows  = mysql_query($query); 
		//echo $rows;
		return $rows;
	} 
	
	
	function Get_Doctor_Reviews()
	{
		if(isset($_SESSION['UserMDID']))
		{
			$user_id=$_SESSION['UserMDID'];
		}
		
		else if(isset($_SESSION['UserDocID']))
		{
			$user_id=$_SESSION['UserDocID'];
		}
		else if(isset($_SESSION['UserNutID']))
		{
			$user_id=$_SESSION['UserNutID'];
		}
		else
		{
			$user_id=0;
		}
		
		$query = "SELECT * FROM  ".User_Reviews." where isactive=1 and isdeleted=0 and common_id=$user_id and approved=1 order by created_date desc";
	//	echo $query;
		$rows  = mysql_query($query); 
		//echo $rows;
		return $rows;
	} 
	
	
	function Get_Doctor_Reviews_Count($user_id)
	{
		if(isset($_SESSION['UserMDID']))
		{
			$user_id=$_SESSION['UserMDID'];
		}
		
		else if(isset($_SESSION['UserDocID']))
		{
			$user_id=$_SESSION['UserDocID'];
		}
		else if(isset($_SESSION['UserNutID']))
		{
			$user_id=$_SESSION['UserNutID'];
		}
		else
		{
			$user_id=0;
		}
		$query = "SELECT Count(*) as  col ".User_Reviews." where isactive=1 and isdeleted=0 and common_id=$user_id and approved=1 order by created_date desc";
		$nume=$this->Get_Records_Count($query);
	//	echo $nume;
		return $nume;
	}


	
	
	function Get_Un_User_Reviews()
	{
		
		$query = "SELECT * FROM  ".User_Reviews." where isactive=1 and isdeleted=0 and approved=0 order by created_date desc";
	//	echo $query;
		$rows  = mysql_query($query); 
		//echo $rows;
		return $rows;
	} 
	
	function Get_App_User_Reviews()
	{
		
		$query = "SELECT * FROM  ".User_Reviews." where isactive=1 and isdeleted=0 and approved=1";
	//	echo $query;
		$rows  = mysql_query($query); 
		//echo $rows;
		return $rows;
	} 
	
	
	
	
	function Get_Medication_Count($user_id)
	{
		$query = "SELECT Count(*) as  col FROM  ".Medication." where isactive=1 and isdeleted=0  and user_id=$user_id";
		$nume=$this->Get_Records_Count($query);
	//	echo $nume;
		return $nume;
	}



	function Get_Allergies($paging,$record_id,$user_id)
	{
		
		$condition="";
		if($record_id > 0)
		{
			$condition=$condition." and allergies_id=".$record_id;
		}

		$query = "SELECT * FROM  ".Allergies." where isactive=1 and isdeleted=0 and user_id=$user_id ".$condition." order by last_observe_date desc";
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 
	
	function Get_Allergies_Count($user_id)
	{
		$query = "SELECT Count(*) as  col FROM  ".Allergies." where isactive=1 and isdeleted=0  and user_id=$user_id";
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}

	function Get_Immunization($paging,$record_id,$user_id)
	{
		
		$condition="";
		if($record_id > 0)
		{
			$condition=$condition." and immunization_id=".$record_id;
		}

		$query = "SELECT * FROM  ".Immunization." where isactive=1 and isdeleted=0 and user_id=$user_id ".$condition." order by administered_date desc";
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 
	
	function Get_Immunization_Count($user_id)
	{
		$query = "SELECT Count(*) as  col FROM  ".Immunization." where isactive=1 and isdeleted=0 and user_id=$user_id";
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}
	
	
	
	function Get_Family_History($paging,$record_id,$user_id)
	{
		
		$condition="";
		if($record_id > 0)
		{
			$condition=$condition." and family_history_id=".$record_id;
		}

		$query = "SELECT * FROM  ".Family_History." where isactive=1 and isdeleted=0 and user_id=$user_id ".$condition." order by created_date desc";
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 
	
	function Get_Family_History_Count($user_id)
	{
		$query = "SELECT Count(*) as  col FROM  ".Family_History." where isactive=1 and isdeleted=0 and user_id=$user_id";
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}





	function Get_Blood_Pressure($paging,$record_id,$user_id)
	{
		
		$condition="";
		if($record_id > 0)
		{
			$condition=$condition." and blood_pressure_id=".$record_id;
		}

		$query = "SELECT * FROM  ".Blood_Pressure." where isactive=1 and isdeleted=0 and user_id=$user_id ".$condition." order by del_track_date desc";
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 

	function Get_Blood_Pressure_Chart($rowcount,$user_id,$fromdate='',$todate='')
	{
		
		$condition="";
		

		if($fromdate !="" && $todate!="" )
		{
			$condition=$condition." and del_track_date between '".$fromdate."' and '".$todate."'";
		}

		$query = "SELECT * FROM  ".Blood_Pressure." where isactive=1 and isdeleted=0 and user_id=$user_id ".$condition." order by del_track_date limit 0,".$rowcount;
		$rows  = mysql_query($query); 
		return $rows;
	} 

	function Get_Measurement_Chart_Yearly($rowcount,$user_id,$fromdate='',$todate='')
		{

			$condition="";


			if($fromdate !="" && $todate!="" )
			{
			$condition=$condition." and weight_date between '".$fromdate."' and '".$todate."'";
			}

			$query = "SELECT avg(curr_wgt) as curr_wgt,DATE_FORMAT( weight_date, '%M-%Y' ) AS AvgMY,
			avg(current_waist) as current_waist,avg(current_hips) as current_hips,avg(current_arm) as current_arm FROM ".Calorie_Det." where isactive=1 and isdeleted=0 and user_id=$user_id ".$condition." Group by DATE_FORMAT( weight_date, '%m-%Y' ) limit 0,".$rowcount;

			$rows = mysql_query($query);
			return $rows;
		}


		function Get_Measurement_Chart($rowcount,$user_id,$fromdate='',$todate='')
		{

			$condition="";


			if($fromdate !="" && $todate!="" )
			{
			$condition=$condition." and weight_date between '".$fromdate."' and '".$todate."'";
			}

			$query = "SELECT * FROM ".Calorie_Det." where isactive=1 and isdeleted=0 and user_id=$user_id ".$condition." limit 0,".$rowcount;
			$rows = mysql_query($query);
		return $rows;
		} 

	function Get_Blood_Pressure_Chart_Yearly($rowcount,$user_id,$fromdate='',$todate='')
	{
		
		$condition="";
		

		if($fromdate !="" && $todate!="" )
		{
			$condition=$condition." and del_track_date between '".$fromdate."' and '".$todate."'";
		}

		$query = "SELECT  avg(nullif(blood_pressure_systolic,0)) as blood_pressure_systolic,DATE_FORMAT( del_track_date,  '%M-%Y' ) AS AvgMY,
		avg(nullif(blood_pressure_diatolic,0)) as blood_pressure_diatolic FROM  ".Blood_Pressure." where isactive=1 and isdeleted=0 and user_id=$user_id ".$condition." Group by DATE_FORMAT( del_track_date,  '%m-%Y' )  limit 0,".$rowcount;

		$rows  = mysql_query($query); 
		return $rows;
	} 
	

	function Get_Sugar_Pressure_Chart($rowcount,$user_id,$fromdate='',$todate='')
	{
		
		$condition="";
		

		if($fromdate !="" && $todate!="" )
		{
			$condition=$condition." and fasting_blood_sugar_date between '".$fromdate."' and '".$todate."'";
		}

		$query = "SELECT * FROM  ".Sugar_Profile." where isactive=1 and isdeleted=0 and user_id=$user_id ".$condition." order by fasting_blood_sugar_date limit 0,".$rowcount;
		$rows  = mysql_query($query); 
		return $rows;
	} 


	function Get_Sugar_Pressure_Chart_Yearly($rowcount,$user_id,$fromdate='',$todate='')
	{
		
		$condition="";
		

		if($fromdate !="" && $todate!="" )
		{
			$condition=$condition." and fasting_blood_sugar_date between '".$fromdate."' and '".$todate."'";
		}

		$query = "SELECT avg(nullif(fasting_blood_sugar_result,0)) as fasting_blood_sugar_result,DATE_FORMAT( fasting_blood_sugar_date,  '%M-%Y' ) AS AvgMY,
		avg(nullif(post_parandial_result,0)) as post_parandial_result,avg(nullif(urine_blood_result,0)) as urine_blood_result,avg(nullif(random_blood_sugar_result,0)) as random_blood_sugar_result FROM  ".Sugar_Profile." where isactive=1 and isdeleted=0 and user_id=$user_id ".$condition." Group by DATE_FORMAT( fasting_blood_sugar_date,  '%m-%Y' ) order by DATE_FORMAT( fasting_blood_sugar_date,  '%m-%Y' )  limit 0,".$rowcount;

		$rows  = mysql_query($query); 
		return $rows;
	} 
	
	function Get_Lipd_Pressure_Chart($rowcount,$user_id,$fromdate='',$todate='')
	{
		
		$condition="";
		

		if($fromdate !="" && $todate!="" )
		{
			$condition=$condition." and triglyceride_blood_sugar_date between '".$fromdate."' and '".$todate."'";
		}

		$query = "SELECT * FROM  ".Lipid_Profile." where isactive=1 and isdeleted=0 and user_id=$user_id ".$condition." order by triglyceride_blood_sugar_date limit 0,".$rowcount;
		$rows  = mysql_query($query); 
		return $rows;
	} 


	function Get_Lipd_Pressure_Chart_Yearly($rowcount,$user_id,$fromdate='',$todate='')
	{
		
		$condition="";
		

		if($fromdate !="" && $todate!="" )
		{
			$condition=$condition." and triglyceride_blood_sugar_date between '".$fromdate."' and '".$todate."'";
		}

		$query = "SELECT  avg(nullif(cholesterol_result,0)) as cholesterol_result,DATE_FORMAT( triglyceride_blood_sugar_date,  '%M-%Y' ) AS AvgMY,
		avg(nullif(triglyceride_blood_sugar_result,0)) as triglyceride_blood_sugar_result,avg(nullif(ldl_result,0)) as ldl_result,avg(nullif(hdl_result,0)) as hdl_result FROM  ".Lipid_Profile." where isactive=1 and isdeleted=0 and user_id=$user_id ".$condition." Group by 
		DATE_FORMAT( triglyceride_blood_sugar_date,  '%m-%Y' )  limit 0,".$rowcount;

		$rows  = mysql_query($query); 
		return $rows;
	} 

	function Get_Life_Pressure_Chart($rowcount,$user_id,$fromdate='',$todate='')
	{
		
		$condition="";
		

		if($fromdate !="" && $todate!="" )
		{
			$condition=$condition." and life_style_date between '".$fromdate."' and '".$todate."'";
		}

		$query = "SELECT * FROM  ".Life_Style." where isactive=1 and isdeleted=0 and user_id=$user_id ".$condition." order by life_style_date limit 0,".$rowcount;
		$rows  = mysql_query($query); 
		return $rows;
	} 


	function Get_Life_Pressure_Chart_Yearly($rowcount,$user_id,$fromdate='',$todate='')
	{
		
		$condition="";
		

		if($fromdate !="" && $todate!="" )
		{
			$condition=$condition." and life_style_date between '".$fromdate."' and '".$todate."'";
		}

		$query = "SELECT  avg(nullif(spirit,0)) as spirit,DATE_FORMAT( life_style_date,  '%M-%Y' ) AS AvgMY,
		avg(nullif(beer,0)) as beer,avg(nullif(cigarette,0)) as cigarette,avg(nullif(life_style_sleep,0)) as life_style_sleep FROM  ".Life_Style." where isactive=1 and isdeleted=0  and user_id=$user_id ".$condition." Group by 
		DATE_FORMAT( life_style_date,  '%m-%Y' )  limit 0,".$rowcount;

		$rows  = mysql_query($query); 
		return $rows;
	} 

	function Get_Calorie_Chart($rowcount,$user_id,$fromdate='',$todate='')
	{
		
		$condition="";
		

		if($fromdate !="" && $todate!="" )
		{
			$condition=$condition." and date between '".$fromdate."' and '".$todate."'";
		}

		/*$query = "SELECT sum(qty*energy) as calorie_consumed, date FROM  ".Food."   where  user_id=$user_id ".$condition."  union all
		SELECT sum(min) as min, date FROM  ".Exercise." where  user_id=$user_id ".$condition." group by date order by date";*/

		$query="SELECT date, user_id, MAX( CASE WHEN TYPE =  'Food' THEN calor END ) AS cal_consumed, MAX( 
		CASE WHEN TYPE =  'Exc' THEN calor END ) AS cal_burned FROM vfoodexercise
 where  user_id=$user_id ".$condition." GROUP BY DATE,user_id  order by date";
	
	//echo $query;

		$rows  = mysql_query($query); 
		return $rows;
	} 
	
	
	function Get_Calorie_Chart_Yearly($rowcount,$user_id,$fromdate='',$todate='')
	{
		
		$condition="";
		

		if($fromdate !="" && $todate!="" )
		{
			$condition=$condition." and date between '".$fromdate."' and '".$todate."'";
		}

		 
		$query="SELECT DATE_FORMAT( life_style_date,  '%M-%Y' ) AS AvgMY, user_id, avg( CASE WHEN TYPE =  'Food' THEN calor END ) AS cal_consumed, avg( 
		CASE WHEN TYPE =  'Exc' THEN calor END ) AS cal_burned FROM vfoodexercise
 where  user_id=$user_id ".$condition." GROUP BY DATE_FORMAT( date,  '%m-%Y' )  order by date";
			
	 

		//// echo $query;
		$rows  = mysql_query($query); 
		return $rows;
	} 





	function Get_Calorie_Exce_Chart($rowcount,$user_id,$fromdate='',$todate='')
	{
		
		$condition="";
		

		if($fromdate !="" && $todate!="" )
		{
			$condition=$condition." and date between '".$fromdate."' and '".$todate."'";
		}

		$query = "SELECT sum(min) as min, date FROM  ".Exercise."   where  user_id=$user_id ".$condition." group by date order by date ";
	
	// echo $query;

		$rows  = mysql_query($query); 
		return $rows;
	} 
	
	
	function Get_Calorie_Exce_Chart_Yearly($rowcount,$user_id,$fromdate='',$todate='')
	{
		
		$condition="";
		

		if($fromdate !="" && $todate!="" )
		{
			$condition=$condition." and date between '".$fromdate."' and '".$todate."'";
		}

		/*$query = "SELECT  avg(min) as min,DATE_FORMAT( date,  '%M-%Y' ) AS AvgMY
		 FROM  ".Exercise." where user_id=$user_id ".$condition." Group by 
		DATE_FORMAT( date,  '%m-%Y' ) order by DATE_FORMAT( date,  '%m-%Y' ) limit 0,".$rowcount;*/
		

		$query = "SELECT avg(`dailymin`) as min, `dailyAvgMY` as AvgMY FROM (SELECT sum(min) as dailymin, DATE_FORMAT( date, '%M-%Y'  ) AS dailyAvgMY, date FROM ".Exercise." where user_id=$user_id ".$condition." Group by DATE_FORMAT( date, '%d-%m-%Y' )) AS Nested_Tbl_Exercise Group By AvgMy order By DATE_FORMAT(date, '%m-%y') limit 0,".$rowcount;



	//echo $query;

		//$query = "SELECT  avg(min) as min,DATE_FORMAT( date,  '%M-%Y' ) AS AvgMY FROM  ".Exercise." where user_id=$user_id ".$condition." Group by DATE_FORMAT( date,  '%m-%Y' )  limit 0,".$rowcount;

		// echo $query;
		$rows  = mysql_query($query); 
		return $rows;
	} 

	

	function Get_Calorie_Exce_Chart__1($rowcount,$user_id,$fromdate='',$todate='')
	{
		
		$condition="";
		

		if($fromdate !="" && $todate!="" )
		{
			$condition=$condition." and date between '".$fromdate."' and '".$todate."'";
		}

		$query = "SELECT *,min as exce_calorie,(select b.name from tbl_exercise b where b.id=a.exercise_id limit 1) as ExcName,(select b.color from tbl_exercise b where b.id=a.exercise_id limit 1) as exce_color FROM  ".Exercise." a where  user_id=$user_id ".$condition." order by date,exercise_id ";
	
		//echo $query;
		//$query = "SELECT *,min as exce_calorie FROM  ".Exercise." where  user_id=$user_id ".$condition." order by date,exercise_id limit 0,".$rowcount;
		/*$query = "SELECT
				ci.date,
				GROUP_CONCAT(ci.exercise_id) as exercise_ids,
				GROUP_CONCAT(ci.min) as mins
			FROM(
				SELECT
					date,
					exercise_id,
					min,
					@num := if(@group = date, @num + 1, 1) as row_number,
					@group := date as dummy                
				FROM    tbl_daily_exercise
				GROUP BY date , exercise_id,min
				
			) as ci
			GROUP BY ci.date ";*/

		$rows  = mysql_query($query); 
		return $rows;
	} 


	function Get_Calorie_Exce_Chart_Yearly_1($rowcount,$user_id,$fromdate='',$todate='')
	{
		
		$condition="";
		

		if($fromdate !="" && $todate!="" )
		{
			$condition=$condition." and date between '".$fromdate."' and '".$todate."'";
		}

		$query = "SELECT  avg(min) as exce_calorie,DATE_FORMAT( date,  '%M-%Y' ) AS AvgMY
		 FROM  ".Exercise." where user_id=$user_id ".$condition." Group by 
		DATE_FORMAT( date,  '%m-%Y' ) order by DATE_FORMAT( date,  '%m-%Y' ) limit 0,".$rowcount;

		$rows  = mysql_query($query); 
		return $rows;
	} 

	function Get_Blood_Pressure_Count($user_id)
	{
		$query = "SELECT Count(*) as  col FROM  ".Blood_Pressure." where isactive=1 and isdeleted=0 and user_id=$user_id";
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}



	function Get_Life_Style($paging,$record_id,$user_id)
	{
		
		$condition="";
		if($record_id > 0)
		{
			$condition=$condition." and life_style_id=".$record_id;
		}

		$query = "SELECT * FROM  ".Life_Style." where isactive=1 and isdeleted=0 and user_id=$user_id ".$condition." order by life_style_date desc";
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 
	
	function Get_Life_Style_Count($user_id)
	{
		$query = "SELECT Count(*) as  col FROM  ".Life_Style." where isactive=1 and isdeleted=0 and user_id=$user_id";
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}
	
	
	function Get_Sugar_Profile($paging,$record_id,$user_id)
	{
		
		$condition="";
		if($record_id > 0)
		{
			$condition=$condition." and sugar_profile_id=".$record_id;
		}

		$query = "SELECT * FROM  ".Sugar_Profile." where isactive=1 and isdeleted=0 and user_id=$user_id ".$condition." order by fasting_blood_sugar_date desc";
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 
	
	function Get_Sugar_Profile_Count($user_id)
	{
		$query = "SELECT Count(*) as  col FROM  ".Sugar_Profile." where isactive=1 and isdeleted=0 and user_id=$user_id";
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}
	
	
	
	function Get_Lipid_Profile($paging,$record_id,$user_id,$date_cur='')
	{
		
		$condition="";
		if($record_id > 0)
		{
			$condition=$condition." and lipid_profile_id=".$record_id;
		}
		
		if($date_cur!="")
		{
			$condition=$condition." and hdl_date='".$date_cur."'";
		}
		
		
		
		
		
		$query = "SELECT * FROM  ".Lipid_Profile." where isactive=1 and isdeleted=0 and user_id=$user_id ".$condition." order by triglyceride_blood_sugar_date desc";
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 
	
	function Get_Lipid_Profile_Count($user_id)
	{
		$query = "SELECT Count(*) as  col FROM  ".Lipid_Profile." where isactive=1 and isdeleted=0 and user_id=$user_id";
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}


	function Get_uploadFile($paging,$record_id,$randomid, $type)
	{
		
		$condition="";
		if($record_id > 0)
		{
			$condition=$condition." and id=".$record_id;
		}

		$query = "SELECT * FROM  ".Doc_Consult_Gallery." where isactive=1 and isdelete=0 and parent_id=$randomid and type='$type' ".$condition." order by id desc";
	///echo $query;
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 
	
	function Get_uploadFile_Count($randomid, $type)
	{
		$randomid=""; $type="";
		$query = "SELECT Count(*) as  col FROM  ".Doc_Consult_Gallery." where isactive=1 and isdelete=0 and parent_id=$randomid and type='$type'";
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}
	
	
	function Get_Lab_Report($record_id, $paging)
	{
		
		$condition="";
		if($record_id > 0)
		{
			$condition=$condition." and id=".$record_id;
		}
		
		if(isset($_SESSION['UserID'])){
		$user_id=$_SESSION['UserID'];
		}
		else
		{
			$user_id=0;
		}

		$query = "SELECT * FROM  ".Doc_Consult_Gallery." where isactive=1 and isdelete=0 and userid=$user_id and report_type=2  ".$condition." order by id desc";
		//echo $query;
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;	
	} 
	
	function Get_Lab_Report_Count($randomid, $type)
	{
		$randomid=""; $type="";
		if(isset($_SESSION['UserID'])){
		$user_id=$_SESSION['UserID'];
		}
		else
		{
			$user_id=0;
		}
		$query = "SELECT Count(*) as  col FROM  ".Doc_Consult_Gallery." where isactive=1 and isdelete=0 and userid=$user_id and report_type=2";
	///	echo $query;
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}
	
	
	function Get_Radiology_Report($paging,$record_id,$randomid, $type)
	{
		
		$condition="";
		if($record_id > 0)
		{
			$condition=$condition." and id=".$record_id;
		}
		
		if(isset($_SESSION['UserID'])){
		$user_id=$_SESSION['UserID'];
		}
		else
		{
			$user_id=0;
		}

		$query = "SELECT * FROM  ".Doc_Consult_Gallery." where isactive=1 and isdelete=0 and userid=$user_id and report_type=3 ".$condition." order by id desc";
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;	
	} 
	
	function Get_Radiology_Report_Count($randomid, $type)
	{
		$randomid=""; $type="";
		if(isset($_SESSION['UserID'])){
		$user_id=$_SESSION['UserID'];
		}
		else
		{
			$user_id=0;
		}


		$query = "SELECT Count(*) as  col FROM  ".Doc_Consult_Gallery." where isactive=1 and isdelete=0 and userid=$user_id and report_type=3";
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}
	
	
	function Get_Prescription($record_id,$paging)
	{
		
		$condition="";
		if($record_id > 0)
		{
			$condition=$condition." and id=".$record_id;
		}
		
		if(isset($_SESSION['UserID'])){
		$user_id=$_SESSION['UserID'];
		}
		else
		{
			$user_id=0;
		}

		$query = "SELECT * FROM  ".Doc_Consult_Gallery." where isactive=1 and isdelete=0 and userid=$user_id and report_type=1 ".$condition." order by id desc";
		///$query = "SELECT *,(select b.doctor_name from ".Doctor." b where a.doctor_id=b.doctor_id) as doctor_name,
		//(select b.cond_name from ".Condition_Problem." b where a.diagnosed_cond=b.cond_id) as cond_name FROM  ".Doctor_Consult." a  where isactive=1 and isdeleted=0 and user_id=$user_id order by consult_date desc";
		
		///echo $query;
		//$query = "SELECT * FROM  ".Doc_Consult_Gallery." where isactive=1 and isdelete=0 and userid=$user_id and report_type=1  ".$condition." order by id desc";
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;	
	} 
	
	function Get_Prescription_Count()
	{
		$randomid=""; $type="";
		if(isset($_SESSION['UserID'])){
		$user_id=$_SESSION['UserID'];
		}
		else
		{
			$user_id=0;
		}


	$query = "SELECT Count(*) as  col FROM  tbl_doc_consult_gallery where isactive=1 and isdelete=0 and report_type=1 and userid=$user_id ";
	////$query = "SELECT Count(*),(select b.doctor_name from ".Doctor." b where a.doctor_id=b.doctor_id) as doctor_name,
		
	
		//$query = "SELECT Count(*) as  col FROM  ".Doc_Consult_Gallery." where isactive=1 and isdelete=0 and parent_id=$randomid and type='$type' and report_type=1";
	
			////echo $query;
		$nume=$this->Get_Records_Count($query);
		
		///echo $nume;
		return $nume;
	}

	
	

	function Delete_Records($insert_type,$record_id)
	{
		if ($insert_type=="Doc_Consult_Ins")
		{
			 $query = "Update  ".Doctor_Consult." set isactive=0 , isdeleted=1 where doc_consult_id=".$record_id;
			 mysql_query($query); 
		}

		if ($insert_type=="Hospital_Ins")
		{
			 $query = "Update  ".Hospital." set isactive=0 , isdeleted=1 where hospital_id=".$record_id;
			 mysql_query($query); 
		}


		if ($insert_type=="Medication_Ins")
		{
			 $query = "Update  ".Medication." set isactive=0 , isdeleted=1 where medication_id=".$record_id;
			 mysql_query($query); 
		}
		
		
		if ($insert_type=="Allergies_Ins")
		{
			 $query = "Update  ".Allergies." set isactive=0 , isdeleted=1 where allergies_id=".$record_id;
			 mysql_query($query); 
		}
		
		
		if ($insert_type=="Immunization_Ins")
		{
			 $query = "Update  ".Immunization." set isactive=0 , isdeleted=1 where immunization_id=".$record_id;
			 mysql_query($query); 
		}
		
		if ($insert_type=="Family_History_Ins")
		{
			 $query = "Update  ".Family_History." set isactive=0 , isdeleted=1 where family_history_id=".$record_id;
			 mysql_query($query); 
		}
		
		if ($insert_type=="Blood_Pressure_Ins")
		{
			 $query = "Update  ".Blood_Pressure." set isactive=0 , isdeleted=1 where blood_pressure_id=".$record_id;
			 mysql_query($query); 
		}
		
		if ($insert_type=="Life_Style_Ins")
		{
			 $query = "Update  ".Life_Style." set isactive=0 , isdeleted=1 where life_style_id=".$record_id;
			 mysql_query($query); 
		}
		
		if ($insert_type=="Sugar_Profile_Ins")
		{
			 $query = "Update  ".Sugar_Profile." set isactive=0 , isdeleted=1 where sugar_profile_id=".$record_id;
			 mysql_query($query); 
		}
		
		if ($insert_type=="Lipid_Profile_Ins")
		{
			 $query = "Update  ".Lipid_Profile." set isactive=0 , isdeleted=1 where lipid_profile_id=".$record_id;
			 mysql_query($query); 
		}
		
		if ($insert_type=="Health_Problem_Ins")
		{
			 $query = "Update  ".Health_Problem." set isactive=0 , isdeleted=1 where health_problem_id=".$record_id;
			 mysql_query($query); 
		}
		
		if ($insert_type=="uploadFile")
		{
			 $query = "Update  ".Doc_Consult_Gallery." set isactive=0 , isdelete=1 where id=".$record_id;
			 mysql_query($query); 
		}
		
		if ($insert_type=="Compose_Ins")
		{
			 if(isset($_GET['cid'])){$record_id=$_GET['cid'];}
			 $query = "Update ".Compose." set isactive=0, isdeleted=1 where mail_id in (".$record_id.")";
			// echo $query;
			 mysql_query($query); 
		}
		
		if ($insert_type=="Nut_Mails")
		{
			 if(isset($_GET['cid'])){$record_id=$_GET['cid'];}
			 $query = "Update ".Nutritionist." set status='trash' where mail_id in (".$record_id.")";
			 //echo $query;
			 mysql_query($query); 
		}
		
		if ($insert_type=="Nut_Sent_Mails")
		{
			 if(isset($_GET['cid'])){$record_id=$_GET['cid'];}
			 $query = "Update ".Nut_Comment." set status='trash' where compose_id in (".$record_id.")";
			 //echo $query;
			 mysql_query($query); 
		}
		
		if ($insert_type=="Profession")
		{
			 if(isset($_GET['cid'])){$record_id=$_GET['cid'];}
			 $query = "Update ".Profession." set isactive=0, isdeleted=1 where profession_id=".$record_id;
			 //echo $query;
			 mysql_query($query); 
		}
		
		if ($insert_type=="Relation")
		{
			 if(isset($_GET['cid'])){$record_id=$_GET['cid'];}
			 $query = "Update ".Relation." set isactive=0, isdeleted=1 where relation_id=".$record_id;
			 //echo $query;
			 mysql_query($query); 
		}
		
		
		if ($insert_type=="Dignosed_Conditions")
		{
			 if(isset($_GET['cid'])){$record_id=$_GET['cid'];}
			 $query = "Update ".Dignosed_Conditions." set isactive=0, isdeleted=1 where cond_id=".$record_id;
			 //echo $query;
			 mysql_query($query); 
		}
		
		if ($insert_type=="Allergy")
		{
			 if(isset($_GET['cid'])){$record_id=$_GET['cid'];}
			 $query = "Update ".Allergy." set isactive=0, isdeleted=1 where allergy_id=".$record_id;
			 //echo $query;
			 mysql_query($query); 
		}
		
		if ($insert_type=="Specialization")
		{
			 if(isset($_GET['cid'])){$record_id=$_GET['cid'];}
			 $query = "Update ".Specialization." set isactive=0, isdeleted=1 where specialization_id=".$record_id;
			 //echo $query;
			 mysql_query($query); 
		}
		
		if ($insert_type=="Doctor")
		{
			 $query = "Update ".Doctor." set isactive=0, isdeleted=1 where doctor_id=".$record_id;
			 //echo $query;
			 mysql_query($query); 
		}
		
		if ($insert_type=="Hospital_Master")
		{
			 $query = "Update ".Hospital_Master." set isactive=0, isdeleted=1 where hospital_id=".$record_id;
			 //echo $query;
			 mysql_query($query); 
		}
		
		
		if ($insert_type=="Food")
		{
			 $query = "delete from ".Food." where id=".$record_id;
			 //echo $query;
			 mysql_query($query); 
		}
		
		if ($insert_type=="Exercise")
		{
			 $query = "delete from ".Exercise." where id=".$record_id;
			 //echo $query;
			 mysql_query($query); 
		}
		if ($insert_type=="Pincode")
		{
			 $query = "delete from ".Pincode." where id=".$record_id;
			 //echo $query;
			 mysql_query($query); 
		}
		if ($insert_type=="Exercises")
		{
			 $query = "delete from ".Exercises." where id=".$record_id;
			 //echo $query;
			 mysql_query($query); 
		}
		
		if ($insert_type=="Cat_Top_Story")
		{
			 $query = "delete from tbl_category where category_id=".$record_id;
			 //echo $query;
			 mysql_query($query); 
		}
		
		if ($insert_type=="BP_Range")
		{
			 $query = "delete from tbl_bp_age_master where id=".$record_id;
			 echo $query;
			 mysql_query($query); 
		}
		
		if ($insert_type=="Top_Story")
		{
			 $query = "delete from tbl_cover_story where cover_story_id=".$record_id;
			 //echo $query;
			 mysql_query($query); 
		}
		
		if ($insert_type=="Deal")
		{
			 $query = "delete from tbl_deal where deal_id=".$record_id;
			 //echo $query;
			 mysql_query($query); 
		}
		if ($insert_type=="Deal_Category")
		{
			 $query = "delete from tbl_deal_category where deal_cat_id=".$record_id;
			 //echo $query;
			 mysql_query($query); 
		}
		if ($insert_type=="Reward_Points")
		{
			 $query = "delete from tbl_reward_points where reward_points_id=".$record_id;
			 //echo $query;
			 mysql_query($query); 
		}

		if ($insert_type=="Exercise_Diet")
		{
			 $query = "delete from ".Diet_Exercise." where id=".$record_id;
			 //echo $query;
			 mysql_query($query); 
		}

		if ($insert_type=="Food_Diet")
		{
			 $query = "delete from ".Diet_Food." where id=".$record_id;
			 //echo $query;
			 mysql_query($query); 
		}


		if ($insert_type=="Post_Comment_Admin")
		{
			 $query = "delete from ".Post_Comment." where post_comment_id=".$record_id;
			 //echo $query;
			 mysql_query($query); 
		}
		
		
		if ($insert_type=="Family_Member")
		{
			 $query = "delete from ".Users." where user_id=".$record_id;
			 //echo $query;
			 mysql_query($query); 
		}
		
		



		if ($insert_type=="Symptom")
		{
			 if(isset($_GET['cid'])){$record_id=$_GET['cid'];}
			 $query = "delete from ".Symptom." where symptom_id=".$record_id;
			 //echo $query;
			 mysql_query($query); 
		}

		if ($insert_type=="Symptom_Cat")
		{
			 if(isset($_GET['cid'])){$record_id=$_GET['cid'];}
			 $query = "delete from ".Symptom_Cat." where cat_id=".$record_id;
			 //echo $query;
			 mysql_query($query); 
		}
		

		if ($insert_type=="Symptom_Sub_Cat")
		{
			 if(isset($_GET['cid'])){$record_id=$_GET['cid'];}
			 $query = "delete from ".Symptom_Sub_Cat." where sub_cat_id=".$record_id;
			 mysql_query($query); 
		}
		
		if ($insert_type=="Diet_Plan_Remove")
		{
			//  if(isset($_GET['cid'])){$record_id=$_GET['cid'];}
			//Alert($record_id);
			 $query = "delete from ".Diet_Plan." where id=".$record_id;
			 mysql_query($query);
			 
			 $query_f = "delete from ".Diet_Food." where diet_plan_id=".$record_id;
			 mysql_query($query_f);
			 
			 $query_e = "delete from ".Diet_Exercise." where diet_plan_id=".$record_id;
			 mysql_query($query_e);
			 //echo  $query_e ;
			 
		}
		
		if ($insert_type=="Clerk_Ins")
		{
			 $query = "delete from ".Clerk." where clerk_id=".$record_id;
			 mysql_query($query);
		}
		
		if ($insert_type=="MD_App")
		{
			 $query = "delete from ".Md_Appoint." where app_id=".$record_id;
			 mysql_query($query);
		}
		
		

		return true;
	}	



	
	function Get_Health_Problem($paging,$record_id,$user_id)
	{
		
		$condition="";
		if($record_id > 0)
		{
			$condition=$condition." and health_problem_id=".$record_id;
		}

		$query = "SELECT * FROM  ".Health_Problem." a  where isactive=1 and isdeleted=0 and user_id=$user_id ".$condition." order by health_problem_id desc";
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 
	
	function Get_Health_Problem_Count($user_id)
	{
		$query = "SELECT Count(*) as  col FROM  ".Health_Problem." where isactive=1 and isdeleted=0 and user_id=$user_id";
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}
	
	function Get_Health_Problem_Detail($paging,$record_id)
	{
		
		$condition="";
		if($record_id > 0)
		{
			$condition=$condition." and parent_id=".$record_id;
		}

		$query = "SELECT * FROM  ".Health_Problem_Details." a  where detail_id <> 0 ".$condition." order by problem_type";
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 
	
	function GetMails_Count($folderid,$user_id)
	{
		$condition="";
		

		$query = "SELECT mail_id as  col from tbl_compose where user_id=$user_id and folderid=$folderid  and isdeleted=0 and isactive=1
		union all	
		select mail_id as  col  from  tbl_compose_nutritionist where user_id=$user_id and folderid=$folderid  and isdeleted=0 and isactive=1 
		union  all
		select comment_id as  col from  tbl_doctor_comment where patient_id=$user_id and folderid=$folderid and type='Patient' and isdeleted=0
		union all
		select comment_id as  col  from  tbl_md_comment where patient_id=$user_id and folderid=$folderid and rejected=0 and isdeleted=0
		union all
		select comment_id as mail_id from  tbl_nutritionist_comments where patient_id=$user_id and folderid=$folderid  and isdeleted=0
		
		";
		
		$nume=$this->Get_Records_Rows_Count($query);
		return $nume; 
	}
	function GetMails($paging, $record_id,$folderid,$user_id)
	{
		$condition="";
		if($record_id > 0)
		{
			$condition=$condition." and mail_id=".$record_id;
		}

		$query = "SELECT mail_id, subject,  query_type, followup_query, doctor_id, created_date, mail_type FROM tbl_compose where user_id=$user_id and folderid=$folderid  and isactive=1 and isdeleted=0
		union all	
		select mail_id, subject as subject,  '' as query_type, '' as followup_query, nutrition_id as doctor_id, created_date,  mail_type from  tbl_compose_nutritionist where user_id=$user_id and folderid=$folderid and isactive=1 and isdeleted=0
		union  all
		select comment_id as mail_id, 'Reply From Doctor' as complaint,  '' as query_type, '' as followup_query,  doctor_id, created_date,  'Doctor_Reply' as mail_type from  tbl_doctor_comment where patient_id=$user_id and folderid=$folderid and type='Patient' and isdeleted=0
		union all
		select comment_id as mail_id, 'Reply From MD' as complaint,  '' as query_type, '' as followup_query, md_id as  doctor_id, created_date,  'MD_Reply' as mail_type from  tbl_md_comment where patient_id=$user_id and folderid=$folderid  and isdeleted=0 and rejected=0
		union all
		select comment_id as mail_id, 'Reply From Nutritionist' as complaint,  '' as query_type, '' as followup_query, nutritionist_id as  doctor_id, created_date,  'Nutritionist_Reply' as mail_type from  tbl_nutritionist_comments where patient_id=$user_id and folderid=$folderid  and isdeleted=0
		order by created_date desc";
		
	//echo $query; 
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 	


	function GetMails_NutCount($folderid,$user_id)
	{
		$condition="";
		

		$query = "
		select mail_id as  col  from  tbl_compose_nutritionist where nutrition_id=$user_id and folder_nut_id=$folderid  and isdeleted=0 and isactive=1 
		union all
		select comment_id as mail_id from  tbl_nutritionist_comments where nutritionist_id=$user_id and folder_nut_id=$folderid   and isdeleted=0 and isactive=1 
		
		";

		//echo $query;
		
		$nume=$this->Get_Records_Rows_Count($query);
		return $nume; 
	}
	function GetNutMails($paging, $record_id,$folderid,$user_id)
	{
		$condition="";
		if($record_id > 0)
		{
			$condition=$condition." and mail_id=".$record_id;
		}

		$query = "
		select mail_id, subject as complaint,  '' as query_type, '' as followup_query, nutrition_id as doctor_id, created_date,user_id,  mail_type from  tbl_compose_nutritionist where nutrition_id=$user_id and folder_nut_id=$folderid and isactive=1  and isdeleted=0 
		union all
		select comment_id as mail_id, subject  as complaint,  '' as query_type, '' as followup_query, nutritionist_id as  doctor_id, created_date, patient_id as user_id, 'Nutritionist_Reply' as mail_type from  tbl_nutritionist_comments where nutritionist_id=$user_id and folder_nut_id=$folderid   and isdeleted=0 and isactive=1 		
		order by created_date desc";
		
	///	echo $query; 
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 	

	function GetMails_old($paging, $record_id)
	{
		if(isset($_SESSION['UserID'])){
		$user_id=$_SESSION['UserID'];
		}
		else
		{
			$user_id=0;
		}
		
		if(isset($_GET['status']))
		{
			$status=$_GET['status'];
		}
		else
		{
			$status="";
		}
		$condition="";
		if($record_id > 0)
		{
			$condition=$condition." and mail_id=".$record_id;
		}

		$query = "SELECT mail_id, complaint,  query_type, followup_query, doctor_id, created_date, mail_type FROM tbl_compose union all select mail_id, subject as complaint,  '', '', '', created_date,  mail_type from  tbl_compose_nutritionist where user_id=$user_id and status='$status' and isdeleted=0 and isactive=1 order by created_date desc";
		
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 	
	
	
	function GeNutMails($paging, $record_id)
	{
		if(isset($_GET['status']))
		{
			$status=$_GET['status'];
		}
		else
		{
			$status="";
		}
		$query = "SELECT * FROM  ".Nutritionist." where isdeleted=0 and isactive=1 and status='$status' order by created_date desc";
		//echo $query;
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 	
	
	function GeNutMails_Count()
	{
		$query = "SELECT Count(*) as  col FROM  ".Nutritionist." where isactive=1 and isdeleted=0";
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}
	
	
	function GetMails_Count_()
	{
		$query = "SELECT Count(*) as  col FROM  ".Compose." where isactive=1 and isdeleted=0";
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}
	
	
	function Get_Calorie_Count()
	{
		$query = "SELECT Count(*) as  col FROM  ".Calorie." where isactive=1 and isdeleted=0";
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}
	
	function Get_Calorie($record_id,$user_id)
	{
		
		$condition="";
		if($record_id > 0)
		{
			$condition=$condition." and calorie_id=".$record_id;
		}

		$query = "SELECT * from ".Calorie." where isactive=1 and isdeleted=0 and user_id=$user_id order by sort desc limit 1";
		$rows  = mysql_query($query); 
		return $rows;
	} 
	
	
	
	function GeSentMails($paging, $record_id)
	{
		if(isset($_SESSION['UserID'])){
		$user_id=$_SESSION['UserID'];
		}
		else
		{
			$user_id=0;
		}
		
		
		$condition="";
		if($record_id > 0)
		{
			$condition=$condition." and mail_id=".$record_id;
		}
	
		if(isset($_GET['status']))
		{
			$status=$_GET['status'];
		}
		else
		{
			$status="";
		}
	
		
		
		$query = "SELECT mail_id, complaint, status, query_type, followup_query, doctor_id, created_date FROM tbl_compose union all select mail_id, subject as complaint, status, '', '', '', created_date from  tbl_compose_nutritionist where user_id=$user_id and status='$status' and isdeleted=0 and isactive=1 order by mail_id desc";
		//echo $query;
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 	
	
	
	function Get_Calorie_Details($record_id,$user_id)	
	{
		
		$condition="";
		if($record_id > 0)
		{
			$condition=$condition." and id=".$record_id;
		}

		$query = "SELECT * from ".Calorie_Det." where isactive=1 and isdeleted=0 and user_id=$user_id ".$condition;
		$rows  = mysql_query($query); 
		return $rows;
	} 
	
	function Get_Calorie_Details_Count()
	{
		if(isset($_SESSION['UserID'])){
		$user_id=$_SESSION['UserID'];
		}
		else
		{
			$user_id=0;
		}
		
		$query = "SELECT Count(*) as  col FROM  ".Calorie_Det." where isactive=1 and isdeleted=0 and user_id=$user_id";
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}
	
	
	
	function GetFamilyMembersTop()
	{
		if(isset($_SESSION['UserID'])){
		$user_id=$_SESSION['UserID'];
		}
		else
		{
			$user_id=0;
		}
		
//		$query = "SELECT * FROM  ".Users." where parent_id=$user_id order by name";
      //  $query = "SELECT * FROM  ".Users." where parent_id=$user_id or (user_id=$user_id and earning_member=2) order by user_id";
	    $query = "SELECT * FROM  ".Users." where parent_id=$user_id order by user_id";
		////echo $query;


		$rows  = mysql_query($query); 
		return $rows;
	} 
	
	
	function GetFamilyMembers()
	{
		if(isset($_SESSION['UserID'])){
		$user_id=$_SESSION['UserID'];
		}
		else
		{
			$user_id=0;
		}
		
//		$query = "SELECT * FROM  ".Users." where parent_id=$user_id order by name";
      //  $query = "SELECT * FROM  ".Users." where parent_id=$user_id or (user_id=$user_id and earning_member=2) order by user_id";
	    $query = "SELECT * FROM  ".Users." where parent_id=$user_id or (user_id=$user_id ) order by user_id";
		////echo $query;


		$rows  = mysql_query($query); 
		return $rows;
	} 
	
	
	function GetClients()
	{
	
		$query = "SELECT * FROM  ".Compose." where isactive=1 and isdeleted=0 and mail_type='Doctor' and  mail_id not in (select compose_id from tbl_patients ) order by created_date desc";
		 
		//echo $query;
		$rows  = mysql_query($query); 
		return $rows;
	} 
	
	
	
	function GetClients_Count()
	{
		if(isset($_SESSION['UserMDID'])){
		$user_id=$_SESSION['UserMDID'];
		}
		else
		{
			$user_id=0;
		}
		
		$query = "SELECT Count(*) as col FROM  ".Compose." where isactive=1 and isdeleted=0 and mail_type='Doctor' and  mail_id not in (select compose_id from tbl_patients )";
		//echo $query;
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}
	
	
	function GetMDClients()
	{
		if(isset($_SESSION['UserMDID'])){
		$user_id=$_SESSION['UserMDID'];
		}
		else
		{
			$user_id=0;
		}
		
		//$query = "SELECT * FROM  ".Doc_Comment." a where isactive=1 and isdeleted=0 and type='MD' and  md_id=$user_id and  compose_id not in (select compose_id from tbl_md_comment )";
		
		$query="SELECT a.* FROM tbl_doctor_comment a WHERE isactive=1 AND isdeleted=0 AND TYPE='MD' AND md_id =$user_id AND a.comment_id NOT IN (SELECT tbl_md_comment.doc_comment_id FROM tbl_md_comment WHERE tbl_md_comment.md_id =$user_id ) order by a.created_date desc";
		///echo $query;
		$rows  = mysql_query($query); 
		return $rows;
	} 
	
	function GetMDClients_Count()
	{
		if(isset($_SESSION['UserMDID'])){
		$user_id=$_SESSION['UserMDID'];
		}
		else
		{
			$user_id=0;
		}
		
		$query = "SELECT Count(*) as  col from ".Doc_Comment." a where isactive=1 and isdeleted=0 and type='MD' and  md_id=$user_id and  compose_id not in (select compose_id from tbl_md_comment where md_id=$user_id)";
		// echo $query;
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}
	
	function GetProfession()
	{
		$query = "SELECT * FROM  ".Profession." where isactive=1 and isdeleted=0 order by profession_name";
		$rows  = mysql_query($query); 
		return $rows;
	} 
	
	
	function GetPostComment()
	{
		$query = "SELECT * FROM  ".Post_Comment." where isactive=1 and isdeleted=0 and approved=1 order by created_date desc";
		$rows  = mysql_query($query); 
		return $rows;
	} 
	
	
	function GetPostCommentUnapproved()
	{
		$query = "SELECT * FROM  ".Post_Comment." where isactive=1 and isdeleted=0 and approved=0";
		$rows  = mysql_query($query); 
		return $rows;
	} 
	
	
	
	function GetCoverStory($paging)
	{
		$query = "SELECT * FROM  ".Top_Story." where isactive=1 and isdeleted=0 order by sortby";
		//echo $query;
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 
	
	
	function GetCoverStoryCount()
	{
		
		$query = "SELECT Count(*) as  col FROM  ".Top_Story." where isactive=1 and isdeleted=0 order by sortby";
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}
	
	
	function GetCategory()
	{
		$query = "SELECT * FROM  ".Category." where isactive=1 and isdeleted=0 order by category_name";
		$rows  = mysql_query($query); 
		return $rows;
	}
	function GetDeal()
	{
		$query = "SELECT * FROM  ".Deal." where isactive=1 and isdeleted=0 order by deal_id desc";
		//echo $query;
		$rows  = mysql_query($query); 
		return $rows;
	}
	function GetDealCategory()
	{
		$query = "SELECT * FROM  ".Deal_Category." where isactive=1 and isdeleted=0 order by deal_cat_name";
		$rows  = mysql_query($query); 
		return $rows;
	} 
	function GetExercise()
	{
		$query = "SELECT * FROM  ".Exercises." where isactive=1 and isdeleted=0 order by name";
		//echo $query;
		$rows  = mysql_query($query); 
		return $rows;
	} 
	function GetPincode()
	{
		$query = "SELECT * FROM  ".Pincode." where isactive=1 and isdeleted=0 order by hospital_name";
		//echo $query;
		$rows  = mysql_query($query); 
		return $rows;
	} 
	function GetRewardPoints()
	{
		$query = "SELECT * FROM  ".Reward_Points." where isactive=1 and isdeleted=0 order by reward_points_id";
		$rows  = mysql_query($query); 
		return $rows;
	} 
	function GetTop_Story()
	{
		$query = "SELECT * FROM  ".Top_Story." where isactive=1 and isdeleted=0 order by cover_story_id";
		$rows  = mysql_query($query); 
		return $rows;
	} 
	
	function GetBeWithUs()
	{
		$query = "SELECT * FROM  ".Be_With_Us." where isactive=1 and isdeleted=0  and approved=1";
		$rows  = mysql_query($query); 
		return $rows;
	}
	
	
	function GetBeWithUsUnapproved()
	{
		$query = "SELECT * FROM  ".Be_With_Us." where isactive=1 and isdeleted=0  and approved=0 order by created_date desc";
	///	echo $query;
		$rows  = mysql_query($query); 
		return $rows;
	}
	
	
	function GetBlog()
	{
		$query = "SELECT * FROM  ".Blog." where isactive=1 and isdeleted=0  and approved=1";
		$rows  = mysql_query($query); 
		return $rows;
	}
	
	function GetBlogUnapproved()
	{
		$query = "SELECT * FROM  ".Blog." where isactive=1 and isdeleted=0  and approved=0 order by created_date desc";
		$rows  = mysql_query($query); 
		return $rows;
	}
	
	
	function GetRelation()
	{
		$query = "SELECT * FROM  ".Relation." where isactive=1 and isdeleted=0 order by relation_name";
		$rows  = mysql_query($query); 
		return $rows;
	} 
	function GetBlood_Pressure_Range()
	{
		$query = "SELECT * FROM  ".Bp_Age_Masters." where isactive=1 and isdeleted=0 order by min_age";
		$rows  = mysql_query($query); 
		return $rows;
	} 
	function GetDignosedConditions()
	{
		
		$query = "SELECT * FROM  ".Dignosed_Conditions." where isactive=1 and isdeleted=0 order by cond_name";
		$rows  = mysql_query($query); 
		return $rows;
	} 
	
	function GetAllergy()
	{
		
		$query = "SELECT * FROM  ".Allergy." where isactive=1 and isdeleted=0 order by allergy_name";
		$rows  = mysql_query($query); 
		return $rows;
	} 
	
	function GetSpecialization()
	{
		
		$query = "SELECT * FROM  ".Specialization." where isactive=1 and isdeleted=0 order by specialization_name";
		$rows  = mysql_query($query); 
		return $rows;
	} 

	function GetSymptom()
	{
		
		$query = "SELECT * FROM  ".Symptom." where isactive=1 and isdeleted=0 order by Symptom_name";
		$rows  = mysql_query($query); 
		return $rows;
	} 
	
	function GetSymptomCat()
	{
		
		$query = "SELECT * FROM  ".Symptom_Cat." where isactive=1 and isdeleted=0 order by cat_name";
		$rows  = mysql_query($query); 
		return $rows;
	} 

	function GetSymptomSubCat()
	{
		
		$query = "SELECT * FROM  ".Symptom_Sub_Cat." where isactive=1 and isdeleted=0 order by sub_cat_name";
		$rows  = mysql_query($query); 
		return $rows;
	} 

	
	
	function GetHospitalMaster($paging,$record_id)
	{
		
		$condition=""; $condition1="";
		if($record_id > 0)
		{
			$condition1=$condition1." and hospital_id=".$record_id;
		}
		
			
		$query = "SELECT * FROM  ".Hospital_Master." where isactive=1 and isdeleted=0 ".$condition." order by hospital_name";
		//echo $query;
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 
	
	
	 
	
	function Get_HospitalMaster_Count()
	{
		
		$query = "SELECT Count(*) as  col FROM  ".Hospital_Master." where isactive=1 and isdeleted=0";
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}
	
	function GetUsers($paging)
	{
		
		$query = "SELECT * FROM  ".Users." where isactive=1 and isdeleted=0 and parent_id=0 and registration_type='Main' order by user_id desc";
		//echo $query;
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	}
	

		
	function GetUsers_Count()
	{
		$query = "SELECT Count(*) as  col FROM  ".Users." where isactive=1 and isdeleted=0 and parent_id=0 and registration_type='Main'";
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}		
	
	function GetDocComments($paging,$patient_id,$user_id)
	{
		
		$condition="";
		if($patient_id > 0)
		{
			$condition=$condition." and patient_id=".$patient_id;
		}
			
		if($user_id > 0)
		{
			//$condition=$condition." and doctor_id=".$user_id;
		}
		
		$query = "SELECT * FROM  ".Doc_Comment." where isactive=1 and isdeleted=0 ".$condition." order by created_date desc";
		//// echo $query;
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 
	
	function GetDocComments_Count($patient_id)
	{
		$query = "SELECT Count(*) as  col FROM  ".Doc_Comment." where isactive=1 and isdeleted=0 and patient_id=".$patient_id;
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}


	function GetDocMDComments($paging,$patient_id,$user_id)
	{
		
		$condition="";
		
		if($patient_id > 0)
		{
			$condition=$condition." and patient_id=".$patient_id;
		}
			
		if($user_id > 0)
		{
			//$condition=$condition." and doctor_id=".$user_id;
		}
		
		$query = "SELECT * FROM  ".MD_Comment." where isactive=1 and isdeleted=0 ".$condition."  order by created_date desc";
		//echo $query;
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 
	
	function GetDocMDComments_Count()
	{
		$query = "SELECT Count(*) as  col FROM  ".MD_Comment." where isactive=1 and isdeleted=0";
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}


	function GetMyMDComments_Count($md_id)
	{
		$query = "SELECT Count(*) as  col FROM  ".MD_Comment." where isactive=1   and md_id=$md_id and isdeleted=0";
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}
	
	function GetOtherMDComments_Count($md_id)
	{
		$query = "SELECT Count(*) as  col FROM  ".MD_Comment." where isactive=1   and md_id<>$md_id and isdeleted=0";
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}
	
	
	function GetMyMDComments($paging,$patient_id,$md_id)
	{
		$condition="";
		
		if($patient_id > 0)
		{
			$condition=$condition." and patient_id=".$patient_id;
		}
			
		if($md_id > 0)
		{
			//$condition=$condition." and doctor_id=".$user_id;
		}
		
		$query = "SELECT * FROM  ".MD_Comment." where isactive=1 and isdeleted=0 ".$condition." and md_id=$md_id order by comment_id desc";
		//echo $query;
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 
	
	
	function GetOtherMDComments($paging,$patient_id,$md_id)
	{
		$condition="";
		
		if($patient_id > 0)
		{
			$condition=$condition." and patient_id=".$patient_id;
		}
			
		if($md_id > 0)
		{
			//$condition=$condition." and doctor_id=".$user_id;
		}
		
		$query = "SELECT * FROM  ".MD_Comment." where isactive=1 and isdeleted=0 ".$condition." and md_id<>$md_id order by comment_id desc";
		//echo $query;
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 
	
	function RetriveUserInboxID($user_id)
	{
		return GetValue("select id as col from ".Folder." where parentid=".$user_id." and name='inbox'","col");
	}

	function RetriveUserSentID($user_id)
	{
		return GetValue("select id as col from ".Folder." where parentid=".$user_id." and name='sent'","col");
	}

	function RetriveUserTrashID($user_id)
	{
		return GetValue("select id as col from ".Folder." where parentid=".$user_id." and name='trash'","col");
	}

	function RetriveNutInboxID($user_id)
	{
		return GetValue("select id as col from ".Nut_Folder." where parentid=".$user_id." and name='inbox'","col");
	}

	function RetriveNutSentID($user_id)
	{
		return GetValue("select id as col from ".Nut_Folder." where parentid=".$user_id." and name='sent'","col");
	}

	function RetriveNutTrashID($user_id)
	{
		return GetValue("select id as col from ".Nut_Folder." where parentid=".$user_id." and name='trash'","col");
	}
	
	function GetOldQueries()
	{
		if(isset($_SESSION['UserDocID'])){
		$user_id=$_SESSION['UserDocID'];
		}
		else
		{
			$user_id=0;
		}
		
		$query = "SELECT a.*, (select comment_id from tbl_doctor_comment b where a.accept_id=b.accept_id limit 1) as comment_id FROM   tbl_patients a where isactive=1 and isdeleted=0 and doctor_id=$user_id and isaccepted=1 and compose_id in (select mail_id from tbl_compose b where b.mail_id=a.compose_id) order by accepted_date desc";
		//echo $query;
		$rows  = mysql_query($query); 
		return $rows;
	} 
		
		
	function GetRejectedQueries()
	{
		if(isset($_SESSION['UserDocID'])){
		$user_id=$_SESSION['UserDocID'];
		}
		else
		{
			$user_id=0;
		}
		
	///$query = "SELECT distinct compose_id, patient_id, accept_id, (select b.comment_id from  tbl_md_comment b where a.patient_id=b.patient_id and a.compose_id=b.compose_id order by b.comment_id desc limit 1) as comment_id from tbl_md_comment a where ref_doctor_id=$user_id and rejected=1 order by created_date desc";
	
	
	
	$query = "SELECT mail_id as compose_id, user_id as patient_id, accept as rejected from tbl_compose where isdeleted=0 and isactive=1 and accept=0 and mail_id in (select compose_id from tbl_md_comment where ref_doctor_id=$user_id)
		union all	
		select compose_id as compose_id, patient_id as patient_id, rejected as rejected from  tbl_md_comment where ref_doctor_id=$user_id and isdeleted=0 and isactive=1 and rejected=1";
	
	
	//	echo $query;
		$rows  = mysql_query($query); 
		return $rows;
	} 
	
	
	function GetRejectedQueriesDocCount()
	{
		if(isset($_SESSION['UserDocID'])){
		$user_id=$_SESSION['UserDocID'];
		}
		else
		{
			$user_id=0;
		}
		
		//$query = "SELECT Count(*) as col from tbl_md_comment where md_id=$user_id and rejected=1 order by created_date desc";
		
		$query = "SELECT mail_id as compose_id, user_id as patient_id, accept as rejected from tbl_compose where isdeleted=0 and isactive=1 and accept=0 and mail_id in (select compose_id from tbl_md_comment where ref_doctor_id=$user_id)
		union all	
		select compose_id as compose_id, patient_id as patient_id, rejected as rejected from  tbl_md_comment where ref_doctor_id=$user_id and isdeleted=0 and isactive=1 and rejected=1";
		
		///echo $query;
		$nume=$this->Get_Records_Rows_Count($query);
		return $nume; 
	} 
			
			
			
		
	function GetRejectedQueriesMD()
	{
		if(isset($_SESSION['UserMDID'])){
		$user_id=$_SESSION['UserMDID'];
		}
		else
		{
			$user_id=0;
		}
		
	
		///$query = "SELECT distinct a.compose_id, a.patient_id, a.accept_id, (select b.comment_id from  tbl_md_comment b where a.patient_id=b.patient_id and a.compose_id=b.compose_id order by b.comment_id desc limit 1) as comment_id from tbl_md_comment a inner join tbl_compose c on a.compose_id=c.mail_id where a.md_id=$user_id and (c.accept=0 or a.rejected=1) order by a.created_date desc";
		
		///$query = "SELECT distinct compose_id, patient_id, accept_id, (select b.comment_id from  tbl_md_comment b where a.patient_id=b.patient_id and a.compose_id=b.compose_id order by b.comment_id desc limit 1) as comment_id from tbl_md_comment a where md_id=$user_id and rejected=1 order by created_date desc";
		
		$query = "SELECT mail_id as compose_id, user_id as patient_id, accept as rejected from tbl_compose where isdeleted=0 and isactive=1 and accept=0 and mail_id in (select compose_id from tbl_md_comment where md_id=$user_id)
		union all	
		select compose_id as compose_id, patient_id as patient_id, rejected as rejected from  tbl_md_comment where md_id=$user_id and isdeleted=0 and isactive=1 and rejected=1";
		
		///echo $query;
		$rows  = mysql_query($query); 
		return $rows;
	} 
	
	
	function GetRejectedQueriesMDCount()
	{
		if(isset($_SESSION['UserMDID'])){
		$user_id=$_SESSION['UserMDID'];
		}
		else
		{
			$user_id=0;
		}
		
		//$query = "SELECT Count(*) as col from tbl_md_comment where md_id=$user_id and rejected=1 order by created_date desc";
		
		$query = "SELECT mail_id as compose_id, user_id as patient_id, accept as rejected from tbl_compose where isdeleted=0 and isactive=1 and accept=0 and mail_id in (select compose_id from tbl_md_comment where md_id=$user_id)
		union all	
		select compose_id as compose_id, patient_id as patient_id, rejected as rejected from  tbl_md_comment where md_id=$user_id and isdeleted=0 and isactive=1 and rejected=1";
		
		$nume=$this->Get_Records_Rows_Count($query);
		return $nume; 
		
		
	} 
			
			
	function GetOldMDQueries()
	{
		if(isset($_SESSION['UserMDID'])){
		$user_id=$_SESSION['UserMDID'];
		}
		else
		{
			$user_id=0;
		}
		
		//$query = "SELECT a.*, (select comment_id from tbl_md_comment b where a.accept_id=b.accept_id) as comment_id FROM   tbl_patients a where isactive=1 and isdeleted=0 and doctor_id=$user_id and isaccepted=1 order by comment_id, accepted_date";
		//$query = "SELECT distinct * from tbl_md_comment where md_id=$user_id order by created_date";
		$query = "SELECT distinct compose_id, patient_id, (select b.comment_id from  tbl_md_comment b where a.patient_id=b.patient_id and a.compose_id=b.compose_id order by b.comment_id desc limit 1) as comment_id from tbl_md_comment a where md_id=$user_id order by created_date desc";
		
	//	echo $query;
		$rows  = mysql_query($query); 
		return $rows;
	} 
	
	
	function GetNutPatients($paging, $cond)
	{
		if(isset($_SESSION['UserNutID'])){
		$user_id=$_SESSION['UserNutID'];
		}
		else
		{
			$user_id=0;
		}
		
		//$query = "SELECT a.*, (select comment_id from tbl_md_comment b where a.accept_id=b.accept_id) as comment_id FROM   tbl_patients a where isactive=1 and isdeleted=0 and doctor_id=$user_id and isaccepted=1 order by comment_id, accepted_date";
	
		$query = "SELECT * FROM  ".Users." a where isactive=1 and isdeleted=0 and parent_id=0 and user_id in (select user_id from  tbl_nutritionist_main where nutritionist_id=$user_id) ".$cond."";
		//$query = "SELECT * FROM  ".Users." a where isactive=1 and isdeleted=0 and parent_id=0 and  user_id in (select user_id from tbl_compose_nutritionist )";
		//echo $query;
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 
	
	function GetNutPatients_Count($cond)
	{
		if(isset($_SESSION['UserNutID'])){
		$user_id=$_SESSION['UserNutID'];
		}
		else
		{
			$user_id=0;
		}
		
		//$query = "SELECT Count(*) as  col FROM  ".Users." a where isactive=1 and isdeleted=0 and parent_id=0 and  user_id in (select patient_id from tbl_nutrionist_patients )";
		$query = "SELECT Count(*) as  col FROM  ".Users." a where isactive=1 and isdeleted=0 and parent_id=0 and  user_id in (select user_id from tbl_nutritionist_main where nutritionist_id=$user_id) ".$cond."";
		//echo $query;
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}
	
	
	function GetNutPatientsMem_Count($cond)
	{
		if(isset($_SESSION['UserNutID'])){
		$user_id=$_SESSION['UserNutID'];
		}
		else
		{
			$user_id=0;
		}
		
		//$query = "SELECT Count(*) as  col FROM  ".Users." a where isactive=1 and isdeleted=0 and parent_id=0 and  user_id in (select patient_id from tbl_nutrionist_patients )";
		$query = "SELECT Count(*) as  col FROM  ".Users."  where isactive=1 and isdeleted=0 and parent_id in (select user_id from tbl_nutritionist_main where nutritionist_id=$user_id) ".$cond."";
		///echo $query;
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}


	
	
	function GetDietPlan($paging,$patient_id,$nutritionist_id)
	{
		
		$condition="";
		
		if($patient_id > 0)
		{
			$condition=$condition." and patient_id=".$patient_id;
		}
			
		if($nutritionist_id > 0)
		{
			$condition=$condition." and nutritionist_id=".$nutritionist_id;
		}
		
		$query = "SELECT * FROM  ".Diet_Plan." where isactive=1 and isdeleted=0 ".$condition." order by id desc";
		//echo $query;
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 
		
	function GetDietPlan_Count()
	{
		$query = "SELECT Count(*) as  col FROM  ".Diet_Plan." where isactive=1 and isdeleted=0";
		$nume=$this->Get_Records_Count($query);
		return $nume;
	}


	
	function GetClerk($paging,$record_id)
	{
		
		$condition=""; $condition1="";
		if($record_id > 0)
		{
			$condition1=$condition1." and clerk_id=".$record_id;
		}
		
			
		$query = "SELECT * FROM  ".Clerk." where isactive=1 and isdeleted=0";
		//echo $query;
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 

	
	function GetNutSentMails($paging, $record_id)
	{
		if(isset($_SESSION['UserNutID'])){
		$nutritionist_id=$_SESSION['UserNutID'];
		}
		else
		{
			$nutritionist_id=0;
		}
		
		if(isset($_GET['status']))
		{
			$status=$_GET['status'];
		}
		else
		{
			$status="";
		}
		$condition="";
		if($record_id > 0)
		{
			$condition=$condition." and mail_id=".$record_id;
		}

		
		$query = "SELECT * FROM  ".Nut_Comment." where nutritionist_id=$nutritionist_id and status='$status' ".$condition." and isdeleted=0 and isactive=1 order by comment_id desc";
		//echo $query;
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 	
			

	function GetMDApp($paging,$record_id,$user_doc_id)
	{
		
		$condition="";
		if($record_id > 0)
		{
			$condition=$condition." and app_id=".$record_id;
		}

		if(isset($_SESSION['UserClerkID']))
		{
			$query = "SELECT * FROM  ".Md_Appoint." where isdeleted=0 ".$condition." and hospital_id=3 order by app_id desc";
		}
		else if(isset($_SESSION['UserMDID']))
		{
			$query = "SELECT * FROM  ".Md_Appoint." where isdeleted=0 ".$condition." and created_by=$user_doc_id order by app_id desc";
		}
	//	echo $query;
		$rows  = mysql_query(getPagingQuery($query, $paging)); 
		return $rows;
	} 	
		
	function GetMDApp_Count($user_id)
	{
		if(isset($_SESSION['UserMDID']))
		{
			$user_id=$_SESSION['UserMDID'];
		}
		$query = "SELECT Count(*) as  col FROM  ".Md_Appoint." where isdeleted=0 and md_id=".$user_id;
		//echo $query;
		$nume=$this->Get_Records_Count($query);
		return $nume;
		
	}	
	

	
	function GetComMails($record_id,$type,$user_id)
	{
	
		$query = "SELECT * FROM  ".Compose." where isactive=1 and isdeleted=0 and mail_type='$type' and mail_id=$record_id";
	//	echo $query;
		$rows  = mysql_query($query); 
		return $rows;
	} 
	
	
	function ViewCoupons()
	{
		$query = "SELECT * FROM  ".Get_Coupon." where isactive=1 and isdeleted=0 order by created_date desc";
		//echo $query;
		$rows  = mysql_query($query); 
		return $rows;
	}
	
	
	function ViewFriends()
	{
		$query = "SELECT * FROM  ".Refer_Friend." where isactive=1 and isdeleted=0 order by date desc";
		//echo $query;
		$rows  = mysql_query($query); 
		return $rows;
	}

	
	function ViewReedemPoints()
	{
		$query = "SELECT distinct user_id FROM  ".Total_Reward_Points." where isactive=1 and isdeleted=0 order by created_date desc";
	//	echo $query;
		$rows  = mysql_query($query); 
		return $rows;
	}





}
?>


