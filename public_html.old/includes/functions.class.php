 <?php
	class function_class {
		var $db;
		var $get_retrive;
		var $get_calorie;
		
		function function_class() {
			// class constructor.  Initializations here.
			$this->db = new db_class;
			$this->get_retrive = new get_retrive_class;
			$this->get_calorie = new calorie_calc;
			
	   	}
		
		function f_Add_NA_Insert($data_values,$id)
		{
			$f_receive_message="";

				 
				$user_id=$data_values["user_id"];
				$not_applicable=$data_values["not_applicable"];
				$type=$data_values["type"];
				$isactive=1;
				$isdeleted=0;
				
				$createdate=date('d-m-Y H:i:s');				
				$updatedate=date('d-m-Y H:i:s');

			
				$data = array(
					'not_applicable' => "NA",
					'type' => $type,
					'user_id' => $user_id,
					'isactive' => $isactive,
					'isdeleted' => $isdeleted,
					'updatedate' => $updatedate,
					'updatedby' => $user_id,
				);
				
				
				
				if($id == "" || $id==0) {
					$id =$this->db->insert_array(Users_NA, $data);
				
					$data = array(
						'createdby' => $user_id,
						'createdate' => $createdate,
					);
					$rows =$this->db->update_array(Users_NA, $data, "id = $id");

					$f_receive_message="insert record";
					if (!$user_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Users_NA, $data, "id = $user_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
			    return $f_receive_message."###".$user_id;
		}

		function f_Add_register_step_1($data_values,$id)
	    {
				$f_receive_message="";

				$user_id=$id;
				$name=$data_values["name"];
				$lastname=$data_values["lastname"];
				$password=$data_values["password"];
				$registration_date=$data_values["registration_date"];
				$registration_type=$data_values["registration_type"];
				$dob_day=$data_values["dob_day"];
				$dob_month=$data_values["dob_month"];
				$dob_year=$data_values["dob_year"];
				$marital_status=$data_values["marital_status"];
				$height=$data_values["height"];
				$height_type=$data_values["height_type"];
				$weight=$data_values["weight"];	
				$blood_group=$data_values["blood_group"];
				$p_std_code=$data_values["p_std_code"];
				$p_area=$data_values["p_area"];
				$phone=$data_values["phone"];
				$m_std_code=$data_values["m_std_code"];
				$mobile=$data_values["mobile"];
				$user_email=$data_values["user_email"];
				$adhar_card_no=$data_values["adhar_card_no"];
				$pancard=$data_values["pancard"];
				$address1=$data_values["address1"];
				$address2=$data_values["address2"];
				$landmark=$data_values["landmark"];
				$pincode=$data_values["pincode"];
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				$imgPhoto=$data_values["imgPhoto"];
				$gender=$data_values["gender"];
				

				$update_times=GetValue("select update_times as col from ".Users." where property_id=".$id, "col");		
				if($update_times==""){$update_times=0;}
				$createdate=date('d-m-Y H:i:s');				
				$updatedate=date('d-m-Y H:i:s');

				if(!isset($_SESSION['User_ID']))
				{
					$updatedby="0";
				}
				
				$data = array(
					'name' => $name,
					'lastname' => $lastname,
					'password' => $password,
					'gender'=>$gender,
					'dob'=>$dob_year."/".$dob_month."/".$dob_day,
					'registration_date' => $createdate,
					'registration_type' => $registration_type,
					'dob_day' => $dob_day,
					'dob_month' => $dob_month,
					'dob_year' => $dob_year,
					'marital_status' => $marital_status,
					'height' => $height,
					'height_type' => $height_type,
					'weight' => $weight,
					'blood_group' => $blood_group,
					'p_std_code' => $p_std_code,
					'p_area' => $p_area,
					'phone' => $phone,
					'm_std_code' => $m_std_code,
					'mobile' => $mobile,
					'user_email' => $user_email,
					'adhar_card_no' => $adhar_card_no,
					'pancard' => $pancard,
					'address1' => $address1,
					'address2' => $address2,
					'landmark' => $landmark,
					'pincode' => $pincode,
					'isactive' => $isactive,
					'isdeleted'=>$isdeleted,
					'image1'=>$imgPhoto,
					'updatedby' => $updatedby,
					'updatedate' => $updatedate,
					'update_times' => $update_times,
					'isdeleted'=>$isdeleted,
					
				);
				
				
			
				if($id == "" || $id==0) {
					$user_id =$this->db->insert_array(Users, $data);
				
					$data = array(
						'createdby' => $user_id,
						'createdate' => $createdate,
						'user_id' => $user_id,
						//'user_profile_id' => $user_id*33,
						'verification'=>$user_id*33,
					);
					$rows =$this->db->update_array(Users, $data, "user_id = $user_id");
					
					
					
					

					$f_receive_message="insert record";
					if (!$user_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Users, $data, "user_id = $user_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				 return $f_receive_message."###".$user_id;
	    }
		


	function f_Add_register_step_1_Short($data_values,$id)
	    {
				$f_receive_message="";

				$user_id=$id;
				$name=$data_values["name"];
				$lastname=$data_values["lastname"];
				$user_type=$data_values["user_type"];
				$registration_date=$data_values["registration_date"];
				$registration_type=$data_values["registration_type"];
				$mobile=$data_values["mobile"];
				$password=$data_values["password"];
				$gender=$data_values["gender"];
				$user_email=$data_values["user_email"];
				$random=$data_values["random"];
				$user_profile_id=$data_values["user_profile_id"];
				$refer_by=$data_values["refer_by"];
				
				
				$createdate=date('d-m-Y H:i:s');				
				$updatedate=date('d-m-Y H:i:s');

				if(!isset($_SESSION['User_ID']))
				{
					$updatedby="0";
				}
				
				

				$data = array(
					'name' => $name,
					'lastname' => $lastname,
					'user_type' => 'Free',
					'password'=>$password,
					'gender'=>$gender,
					'registration_date' => $createdate,
					'registration_type' => $registration_type,
					'mobile' => $mobile,
					'user_email' => $user_email,
					'isactive' =>0,
					'isdeleted'=>0,
					'updatedby' => $updatedby,
					'updatedate' => $updatedate,
					'user_profile_id' => $user_profile_id,
					
				);
				
				
			
				if($id == "" || $id==0) {
					$user_id =$this->db->insert_array(Users, $data);
				
					$data1 = array(
						'parentid' => $user_id,
						'name' => 'Inbox',
						'isdeleted' => 0,
						
					);
					$rows =$this->db->insert_array(Folder, $data1);
					
					
					$data2 = array(
						'parentid' => $user_id,
						'name' => 'sent',
						'isdeleted' => 0,
						
					);
					$rows =$this->db->insert_array(Folder, $data2);
					
					
					$data3 = array(
						'parentid' => $user_id,
						'name' => 'trash',
						'isdeleted' => 0,
						
					);
					$rows =$this->db->insert_array(Folder, $data3);
					
					
					
					$data4 = array(
						'user_id' => $user_id,
						'dataid' => '1',
						'date' => $createdate,
						
					);
					$rows =$this->db->insert_array(Customized_Data, $data4);
					
					
					$data5 = array(
						'user_id' => $user_id,
						'dataid' => '2',
						'date' => $createdate,
						
					);
					$rows =$this->db->insert_array(Customized_Data, $data5);
					
					
					
					$data6 = array(
						'user_id' => $user_id,
						'dataid' => '3',
						'date' => $createdate,
						
					);
					$rows =$this->db->insert_array(Customized_Data, $data6);
					
					
					
					$data7 = array(
						'user_id' => $user_id,
						'dataid' => '4',
						'date' => $createdate,
						
					);
					$rows =$this->db->insert_array(Customized_Data, $data7);
					
					$data8 = array(
						'user_id'=> $user_id,
						'type'=>'BP',
						'created_date'=>$createdate,
						'ishide'=>1,
						
					);
					$rows =$this->db->insert_array(Daily_Report_ShowHide, $data8);
					
					
					$data9 = array(
						'user_id'=> $user_id,
						'type'=>'FB',
						'created_date'=>$createdate,
						'ishide'=>1,
						
					);
					$rows =$this->db->insert_array(Daily_Report_ShowHide, $data9);
					
					
					$data10 = array(
						'user_id'=> $user_id,
						'type'=>'PPBS',
						'created_date'=>$createdate,
						'ishide'=>1,
						
					);
					$rows =$this->db->insert_array(Daily_Report_ShowHide, $data10);
					
					
					
					$data11 = array(
						'user_id'=> $user_id,
						'type'=>'RBS',
						'created_date'=>$createdate,
						'ishide'=>1,
						
					);
					$rows =$this->db->insert_array(Daily_Report_ShowHide, $data11);
					
					
					$data12 = array(
						'user_id'=> $user_id,
						'type'=>'UBS',
						'created_date'=>$createdate,
						'ishide'=>1,
						
					);
					$rows =$this->db->insert_array(Daily_Report_ShowHide, $data12);
					
					
					$data13 = array(
						'user_id'=> $user_id,
						'type'=>'Cholesterol',
						'created_date'=>$createdate,
						'ishide'=>0,
						
					);
					$rows =$this->db->insert_array(Daily_Report_ShowHide, $data13);
					
					
					$data14 = array(
						'user_id'=> $user_id,
						'type'=>'Cigarette',
						'created_date'=>$createdate,
						'ishide'=>0,
						
					);
					$rows =$this->db->insert_array(Daily_Report_ShowHide, $data14);
					
					
					
					$data15 = array(
						'user_id'=> $user_id,
						'type'=>'Triglyceride',
						'created_date'=>$createdate,
						'ishide'=>0,
						
					);
					$rows =$this->db->insert_array(Daily_Report_ShowHide, $data15);
					
					
					$data16 = array(
						'user_id'=> $user_id,
						'type'=>'HDL',
						'created_date'=>$createdate,
						'ishide'=>0,
						
					);
					$rows =$this->db->insert_array(Daily_Report_ShowHide, $data16);
					
					
					
					$data17 = array(
						'user_id'=> $user_id,
						'type'=>'LDL',
						'created_date'=>$createdate,
						'ishide'=>0,
						
					);
					$rows =$this->db->insert_array(Daily_Report_ShowHide, $data17);
					
					
					
					$data18 = array(
						'user_id'=> $user_id,
						'type'=>'Beer',
						'created_date'=>$createdate,
						'ishide'=>0,
						
					);
					$rows =$this->db->insert_array(Daily_Report_ShowHide, $data18);
					
					
					$data19 = array(
						'user_id'=> $user_id,
						'type'=>'Spirit',
						'created_date'=>$createdate,
						'ishide'=>0,
						
					);
					$rows =$this->db->insert_array(Daily_Report_ShowHide, $data19);
					
					
					
					$data = array(
						'createdby' => $user_id,
						'createdate' => $createdate,
						'user_id' => $user_id,
						//'user_profile_id' => $user_id*33,
						'random' => $random,
						'refer_by' => $refer_by,
						'verification'=>$user_id*33,
					);
					$rows =$this->db->update_array(Users, $data, "user_id = $user_id");

					$f_receive_message="insert record";
					if (!$user_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Users, $data, "user_id = $user_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				 return $f_receive_message."###".$user_id;
	    }
		

		function f_Add_register_step_2($data_values,$id)
	    {
				$f_receive_message="";

				$user_id=$id;
				$earning_member=$data_values["earning_member"];
				$profession_id=$data_values["profession_id"];
				$company_name=$data_values["company_name"];
				$designation=$data_values["designation"];
				$travel_mode=$data_values["travel_mode"];
				$daily_travel_time_h=$data_values["daily_travel_time_h"];
				$daily_travel_time_m=$data_values["daily_travel_time_m"];
				//$age_of_retirement=$data_values["age_of_retirement"];
				//$life_expectancy=$data_values["life_expectancy"];
			

				
				$data = array(
					'earning_member' => $earning_member,
					'profession_id' => $profession_id,
					'company_name' => $company_name,
					'designation' => $designation,
					'travel_mode' => $travel_mode,
					'daily_travel_time_h' => $daily_travel_time_h,
					'daily_travel_time_m' => $daily_travel_time_m,
					//'age_of_retirement' => $age_of_retirement,
					//'life_expectancy' => $life_expectancy,
				);
				
				$rows =$this->db->update_array(Users, $data, "user_id = $user_id");
				$f_receive_message="update record";
				if (!$rows) {
					$this->db->print_last_error(false);
					$f_receive_message="Error";
				} 
				
				
			  return $f_receive_message."###".$user_id;
	    }


		
		function f_Add_register_step_3($data_values,$id)
	    {
				$f_receive_message="";

				$user_id=$id;
				$name=$data_values["name"];
				$lastname=$data_values["lastname"];
				$password=$data_values["password"];
				$user_profile_id=$data_values["user_profile_id"];
				$registration_date=$data_values["registration_date"];
				$registration_type=$data_values["registration_type"];
				$dob_day=$data_values["dob_day"];
				$dob_month=$data_values["dob_month"];
				$dob_year=$data_values["dob_year"];
				$marital_status=$data_values["marital_status"];
				$height=$data_values["height"];
				$height_type=$data_values["height_type"];
				$weight=$data_values["weight"];
				$blood_group=$data_values["blood_group"];
				$p_std_code=$data_values["p_std_code"];
				$p_area=$data_values["p_area"];
				$phone=$data_values["phone"];
				$m_std_code=$data_values["m_std_code"];
				$mobile=$data_values["mobile"];
				$user_email=$data_values["user_email"];
				$adhar_card_no=$data_values["adhar_card_no"];
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				$imgPhoto=$data_values["imgPhoto"];
				$gender=$data_values["gender"];
				$earning_member=$data_values["earning_member"];
				$profession_id=$data_values["profession_id"];
				$company_name=$data_values["company_name"];
				$designation=$data_values["designation"];
				$travel_mode=$data_values["travel_mode"];
				$daily_travel_time_h=$data_values["daily_travel_time_h"];
				$daily_travel_time_m=$data_values["daily_travel_time_m"];
				//$age_of_retirement=$data_values["age_of_retirement"];
				//$life_expectancy=$data_values["life_expectancy"];
				$accountholder=$data_values["accountholder"];
				$pid=$data_values["pid"];
				
				

				$update_times=GetValue("select update_times as col from ".Users." where property_id=".$id, "col");		
				if($update_times==""){$update_times=0;}
				$createdate=date('d-m-Y H:i:s');				
				$updatedate=date('d-m-Y H:i:s');

				if(!isset($_SESSION['User_ID']))
				{
					$updatedby="0";
				}

				$data = array(
					'name' => $name,
					'lastname' => $lastname,
					'user_profile_id' => $user_profile_id,
					'password' => $password,
					'gender'=>$gender,
					'dob'=>$dob_year."/".$dob_day."/".$dob_month,
					'registration_date' => $createdate,
					'registration_type' => $registration_type,
					'dob_day' => $dob_day,
					'dob_month' => $dob_month,
					'dob_year' => $dob_year,
					'marital_status' => $marital_status,
					'height' => $height,
					'height_type' => $height_type,
					'weight' => $weight,
					'blood_group' => $blood_group,
					'p_std_code' => $p_std_code,
					'p_area' => $p_area,
					'phone' => $phone,
					'm_std_code' => $m_std_code,
					'mobile' => $mobile,
					'user_email' => $user_email,
					'adhar_card_no' => $adhar_card_no,
					'isactive' => $isactive,
					'isdeleted'=>$isdeleted,
					'image1'=>$imgPhoto,
					'updatedby' => $updatedby,
					'updatedate' => $updatedate,
					'update_times' => $update_times,
					'isdeleted'=>$isdeleted,
					'earning_member' => $earning_member,
					'profession_id' => $profession_id,
					'company_name' => $company_name,
					'designation' => $designation,
					'travel_mode' => $travel_mode,
					'accountholder' => $accountholder,
					'daily_travel_time_h' => $daily_travel_time_h,
					'daily_travel_time_m' => $daily_travel_time_m,
					//'age_of_retirement' => $age_of_retirement,
					//'life_expectancy' => $life_expectancy,
					'parent_id'=>$pid,
					 
				);
				
				
			
				if($id == "" || $id==0) {
					$user_id =$this->db->insert_array(Users, $data);
					
					
					$data1 = array(
						'parentid' => $user_id,
						'name' => 'Inbox',
						'isdeleted' => 0,
						
					);
					$rows =$this->db->insert_array(Folder, $data1);
					
					
					$data2 = array(
						'parentid' => $user_id,
						'name' => 'sent',
						'isdeleted' => 0,
						
					);
					$rows =$this->db->insert_array(Folder, $data2);
					
					
					$data3 = array(
						'parentid' => $user_id,
						'name' => 'trash',
						'isdeleted' => 0,
						
					);
					$rows =$this->db->insert_array(Folder, $data3);
					
					
					$data4 = array(
						'user_id' => $user_id,
						'dataid' => '1',
						'date' => $createdate,
						
					);
					$rows =$this->db->insert_array(Customized_Data, $data4);
					
					
					$data5 = array(
						'user_id' => $user_id,
						'dataid' => '2',
						'date' => $createdate,
						
					);
					$rows =$this->db->insert_array(Customized_Data, $data5);
					
					
					
					$data6 = array(
						'user_id' => $user_id,
						'dataid' => '3',
						'date' => $createdate,
						
					);
					$rows =$this->db->insert_array(Customized_Data, $data6);
					
					
					
					$data7 = array(
						'user_id' => $user_id,
						'dataid' => '4',
						'date' => $createdate,
						
					);
					$rows =$this->db->insert_array(Customized_Data, $data7);
					
					
					
					$data = array(
						'createdby' => $user_id,
						'createdate' => $createdate,
						'user_id' => $user_id,
					);
					$rows =$this->db->update_array(Users, $data, "user_id = $user_id");

					$f_receive_message="insert record";
					if (!$user_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Users, $data, "user_id = $user_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				
				/*$nutritionist_id=GetValue("select doctor_id as col from tbl_doctor where type='Nutritionist' and user_count < 25 order by user_count limit 1", "col");
				
				
				$data2=array(
					'nutritionist_id'=>$nutritionist_id,
					'user_id'=>$user_id,
				);
				
				$nut_id=$this->db->insert_array(Nutritionist_Main, $data2);*/
				
				
				 return $f_receive_message."###".$user_id;
	    }
		
		


		function f_Add_Hospital_Insert($data_values,$id)
	    {
				$f_receive_message="";

				$hospital_id=$id;
				$user_id=$data_values["user_id"];
				$hospital_name=$data_values["hospital_name"];
				$hospital_date=$data_values["hospital_date"];
				$hospital_day=$data_values["hospital_day"];
				$hospital_month=$data_values["hospital_month"];
				$hospital_year=$data_values["hospital_year"];
				$doctor_id=$data_values["doctor_id"];
				$admission_reason=$data_values["admission_reason"];
				$diagnosis=$data_values["diagnosis"];
				$next_year=$data_values["next_year"];
				$discharge_date=$data_values["discharge_date"];
				$discharge_day=$data_values["discharge_day"];
				$discharge_month=$data_values["discharge_month"];
				$discharge_year=$data_values["discharge_year"];
				$diagnosis_summary=$data_values["diagnosis_summary"];
				$doctor_instruction=$data_values["doctor_instruction"];			
				$next_date=$data_values["next_date"];
				$next_day=$data_values["next_day"];
				$next_month=$data_values["next_month"];
				$reminder_date=$data_values["reminder_date"];
				$reminder_day=$data_values["reminder_day"];
				$reminder_month=$data_values["reminder_month"];
				$reminder_year=$data_values["reminder_year"];
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				
				

				
				$created_date=date('d-m-Y H:i:s');				
				$updated_date=date('d-m-Y H:i:s');


				$data = array(
					'user_id' => $user_id,
					'hospital_date'=>$hospital_date,
					'hospital_name'=>$hospital_name,
					'hospital_day'=>$hospital_day,
					'hospital_month'=>$hospital_month,
					'hospital_year'=>$hospital_year,
					'doctor_id' => $doctor_id,
					'admission_reason' => $admission_reason,
					'diagnosis' => $diagnosis,
					'next_year' => $next_year,
					'discharge_date' => $discharge_date,
					'discharge_day' => $discharge_day,
					'discharge_month' => $discharge_month,
					'discharge_year' => $discharge_year,
					'diagnosis_summary' => $diagnosis_summary,
					'doctor_instruction' => $doctor_instruction,			
					'next_date' => $next_date,
					'next_day' => $next_day,
					'next_month' => $next_month,
					'reminder_date' => $reminder_date,
					'reminder_day' => $reminder_day,
					'reminder_month' => $reminder_month,
					'reminder_year' => $reminder_year,
					'created_by' => $user_id,
					'created_date' => $created_date,
					'updated_date' => $updated_date,
					'updated_by'=>$user_id,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					
				);
				
				
			
				if($hospital_id == "" || $hospital_id==0) {
					$hospital_id =$this->db->insert_array(Hospital, $data);
					$data = array(
						'created_by' => $user_id,
						'created_date' => $created_date,
						'user_id' => $user_id,
					);
					$rows =$this->db->update_array(Hospital, $data, "hospital_id = $hospital_id");

					$data1 = array(
						'user_id'=> $user_id,
						'type'=>'Hospitalization',
						'reward_points'=>1,
						'common_id'=>$mail_id,
						'created_date'=>$created_date,
						'isactive'=>1,
						'isdeleted'=>0,
						
					);
					$user_review_id =$this->db->insert_array(Total_Reward_Points, $data1);	
				
					$f_receive_message="insert record";
					if (!$user_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Hospital, $data, "hospital_id = $hospital_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				 return $f_receive_message."###".$hospital_id;
	    }
		
		
		
		function f_Add_Doc_Consult_Insert($data_values,$id)
	    {
				$f_receive_message="";

				$doc_consult_id=$id;
				
				$random_id=$data_values["random_id"];
				$user_id=$data_values["user_id"];
				$consult_date=$data_values["consult_date"];
				$consult_day=$data_values["consult_day"];
				$consult_month=$data_values["consult_month"];
				$consult_year=$data_values["consult_year"];
				$doctor_id=$data_values["doctor_id"];
				$vital_record=$data_values["vital_record"];
				$height=$data_values["height"];
				$weight=$data_values["weight"];
				$temperature=$data_values["temperature"];
				$pulse=$data_values["pulse"];
				$blood_pressure=$data_values["blood_pressure"];
				$breathing_rate=$data_values["breathing_rate"];
				$body_mass_index=$data_values["body_mass_index"];
				$resting_heart_rate=$data_values["resting_heart_rate"];
				$notes=$data_values["notes"];
				$store_diagnosed_cond=$data_values["store_diagnosed_cond"];
				$health_problem=$data_values["health_problem"];
				$diagnosed_cond=$data_values["diagnosed_cond"];
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				
				

				//$update_times=GetValue("select update_times as col from ".Users." where property_id=".$id, "col");		
				//if($update_times==""){$update_times=0;}
				$created_date=date('d-m-Y H:i:s');				
				$updated_date=date('d-m-Y H:i:s');


				$data = array(
					'user_id' => $user_id,
					'consult_date'=>$consult_date,
					'consult_day'=>$consult_day,
					'consult_month'=>$consult_month,
					'consult_year'=>$consult_year,
					'doctor_id' => $doctor_id,
					'vital_record' => $vital_record,
					'height' => $height,
					'weight' => $weight,
					'temperature' => $temperature,
					'pulse' => $pulse,
					'blood_pressure' => $blood_pressure,
					'breathing_rate' => $breathing_rate,
					'body_mass_index' => $body_mass_index,
					'resting_heart_rate' => $resting_heart_rate,
					'notes' => $notes,
					'store_diagnosed_cond' => $store_diagnosed_cond,
					'health_problem' => $health_problem,
					'diagnosed_cond' => $diagnosed_cond,
					'created_by' => $user_id,
					'created_date' => $created_date,
					'updated_date' => $updated_date,
					'updated_by'=>$user_id,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					
				);
				
				
			
				if($doc_consult_id == "" || $doc_consult_id==0) {
					$doc_consult_id =$this->db->insert_array(Doctor_Consult, $data);
					$data = array(
						'created_by' => $user_id,
						'created_date' => $created_date,
						'user_id' => $user_id,
					);
					
					$rows =$this->db->update_array(Doctor_Consult, $data, "doc_consult_id = $doc_consult_id");

					$data1 = array(
						'user_id'=> $user_id,
						'type'=>'Doc_Consult',
						'reward_points'=>1,
						'common_id'=>$doc_consult_id,
						'created_date'=>$created_date,
						'isactive'=>1,
						'isdeleted'=>0,
						
					);
					$trp_id =$this->db->insert_array(Total_Reward_Points, $data1);		
					
			

					$data = array(
						'parent_id' => $doc_consult_id,
						
					);
					$rows =$this->db->update_array("tbl_doc_consult_gallery", $data, "parent_id = $random_id and type='Doc_Consult'");

					$f_receive_message="insert record";
					if (!$user_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Doctor_Consult, $data, "doc_consult_id = $doc_consult_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				 return $f_receive_message."###".$doc_consult_id;
	    }
		
		
		
		
		function f_Add_Medication_Insert($data_values,$id)
	    {
				$f_receive_message="";

				$medication_id=$id;
				$user_id=$data_values["user_id"];
				$medicine=$data_values["medicine"];
				$dosage=$data_values["dosage"];
				$duration=$data_values["duration"];
				$track_machine=$data_values["track_machine"];
				$follow_prescription=$data_values["follow_prescription"];
				$health_problem=$data_values["health_problem"];
				$notes=$data_values["notes"];
				$start_date=$data_values["start_date"];
				$end_date=$data_values["end_date"];
				$start_month=$data_values["start_month"];
				$end_month=$data_values["end_month"];
				$daily_freq_morng=$data_values["daily_freq_morng"];
				$feq_mor_hour=$data_values["feq_mor_hour"];
				$feq_mor_min=$data_values["feq_mor_min"];
				$daily_freq_after=$data_values["daily_freq_after"];
				$feq_af_hour=$data_values["feq_af_hour"];
				$feq_af_min=$data_values["feq_af_min"];
				$daily_freq_even=$data_values["daily_freq_even"];
				$feq_eve_hour=$data_values["feq_eve_hour"];
				$feq_eve_min=$data_values["feq_eve_min"];
				$daily_freq_ngt=$data_values["daily_freq_ngt"];
				$feq_ngt_hour=$data_values["feq_ngt_hour"];
				$feq_ngt_min=$data_values["feq_ngt_min"];
				$purchase_day=$data_values["purchase_day"];
				$purchase_month=$data_values["purchase_month"];
				$purchase_reminder=$data_values["purchase_reminder"];
				$intake_reminder=$data_values["intake_reminder"];
				$alert_mobile=$data_values["alert_mobile"];
				$alert_email=$data_values["alert_email"];
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				
				

				//$update_times=GetValue("select update_times as col from ".Users." where property_id=".$id, "col");		
				//if($update_times==""){$update_times=0;}
				$created_date=date('d-m-Y H:i:s');				
				$updated_date=date('d-m-Y H:i:s');


				$data = array(
					'user_id' => $user_id,
					'medicine' => $medicine,
					'dosage'=>$dosage,
					'duration'=>$duration,
					'track_machine'=>$track_machine,
					'follow_prescription'=>$follow_prescription,
					'health_problem' => $health_problem,
					'notes' => $notes,
					'start_day' => $start_date,
					'start_month' => $start_month,
					'end_day' => $end_date,
					'end_month' => $end_month,
					'start_date' =>"2014-".$start_month."-".$start_date,
					'end_date' =>"2014-".$end_month."-".$end_date,
					'daily_freq_morng' => $daily_freq_morng,
					'feq_mor_hour' => $feq_mor_hour,
					'feq_mor_min' => $feq_mor_min,
					'daily_freq_after' => $daily_freq_after,
					'feq_af_hour' => $feq_af_hour,
					'feq_af_min' => $feq_af_min,
					'daily_freq_even' => $daily_freq_even,
					'feq_eve_hour' => $feq_eve_hour,
					'feq_eve_min' => $feq_eve_min,
					'daily_freq_ngt' => $daily_freq_ngt,
					'feq_ngt_hour' => $feq_ngt_hour,
					'feq_ngt_min' => $feq_ngt_min,
					'purchase_day' => $purchase_day,
					'purchase_month' => $purchase_month,
					'purchase_reminder' => $purchase_reminder,
					'intake_reminder' => $intake_reminder,
					'alert_mobile' => $alert_mobile,
					'alert_email' => $alert_email,
					'created_by' => $user_id,
					'created_date' => $created_date,
					'updated_date' => $updated_date,
					'updated_by'=>$user_id,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					
				);
				
				
			//Alert ($medication_id);
				if($medication_id == "" || $medication_id==0) {
					$medication_id =$this->db->insert_array(Medication, $data);
					$data = array(
						'created_by' => $user_id,
						'created_date' => $created_date,
						'user_id' => $user_id,
						
					);
					$rows =$this->db->update_array(Medication, $data, "medication_id = $medication_id");

					$data1 = array(
						'user_id'=> $user_id,
						'type'=>'Medication',
						'reward_points'=>1,
						'common_id'=>$medication_id,
						'created_date'=>$created_date,
						'isactive'=>1,
						'isdeleted'=>0,
						
					);
					$trp_id =$this->db->insert_array(Total_Reward_Points, $data1);	
					
					$f_receive_message="insert record";
					if (!$user_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Medication, $data, "medication_id = $medication_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				 return $f_receive_message."###".$medication_id;
	    }
		
		
		
		function f_Add_Allergies_Insert($data_values,$id)
	    {
				$f_receive_message="";

				$allergies_id=$id;
				$random_id=$data_values["random_id"];
				$user_id=$data_values["user_id"];
				$allergic_to=$data_values["allergic_to"];
				$reaction=$data_values["reaction"];
				$status=$data_values["status"];
				$last_observe_date=$data_values["last_observe_date"];
				$last_observe_day=$data_values["last_observe_day"];
				$last_observe_month=$data_values["last_observe_month"];
				$last_observe_year=$data_values["last_observe_year"];
				$consult_date=$data_values["consult_date"];
				$consult_day=$data_values["consult_day"];
				$consult_month=$data_values["consult_month"];
				$consult_year=$data_values["consult_year"];
				$doctor_id=$data_values["doctor_id"];
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				
				

				//$update_times=GetValue("select update_times as col from ".Users." where property_id=".$id, "col");		
				//if($update_times==""){$update_times=0;}
				$created_date=date('d-m-Y H:i:s');				
				$updated_date=date('d-m-Y H:i:s');


				$data = array(
					'user_id' => $user_id,
					'allergic_to' => $allergic_to,
					'reaction' => $reaction,
					'status' => $status,
					'last_observe_date'=>$last_observe_date,
					'last_observe_day'=>$last_observe_day,
					'last_observe_month'=>$last_observe_month,
					'last_observe_year'=>$last_observe_year,
					'consult_date'=>$consult_date,
					'consult_day'=>$consult_day,
					'consult_month'=>$consult_month,
					'consult_year'=>$consult_year,
					'doctor_id' => $doctor_id,
					'created_by' => $user_id,
					'created_date' => $created_date,
					'updated_date' => $updated_date,
					'updated_by'=>$user_id,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					
				);
				
				
			
				if($allergies_id == "" || $allergies_id==0) {
					$allergies_id =$this->db->insert_array(Allergies, $data);
					$data = array(
						'created_by' => $user_id,
						'created_date' => $created_date,
						'user_id' => $user_id,
					);
					
					
					$rows =$this->db->update_array(Allergies, $data, "allergies_id = $allergies_id");
					
					
					$data1 = array(
						'user_id'=> $user_id,
						'type'=>'Allergies',
						'reward_points'=>1,
						'common_id'=>$allergies_id,
						'created_date'=>$created_date,
						'isactive'=>1,
						'isdeleted'=>0,
						
					);
					$trp_id =$this->db->insert_array(Total_Reward_Points, $data1);	
					
					
					$data = array(
						'parent_id' => $allergies_id,
						
					);
					$rows =$this->db->update_array("tbl_doc_consult_gallery", $data, "parent_id = $random_id and type='Allergies'");

					$f_receive_message="insert record";
					if (!$user_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Allergies, $data, "allergies_id = $allergies_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				 return $f_receive_message."###".$allergies_id;
	    }
		
		
		
		function f_Add_Immunization_Insert($data_values,$id)
	    {
				$f_receive_message="";

				$immunization_id=$id;
				$user_id=$data_values["user_id"];
				$immunization_name=$data_values["immunization_name"];
				$administered_date=$data_values["administered_date"];
				$administered_day=$data_values["administered_day"];
				$administered_month=$data_values["administered_month"];
				$administered_year=$data_values["administered_year"];
				$reminder_date=$data_values["reminder_date"];
				$reminder_day=$data_values["reminder_day"];
				$reminder_month=$data_values["reminder_month"];
				$reminder_year=$data_values["reminder_year"];
				$immunization_hour=$data_values["immunization_hour"];
				$immunization_min=$data_values["immunization_min"];
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				
				

				//$update_times=GetValue("select update_times as col from ".Users." where property_id=".$id, "col");		
				//if($update_times==""){$update_times=0;}
				$created_date=date('d-m-Y H:i:s');				
				$updated_date=date('d-m-Y H:i:s');


				$data = array(
					'user_id' => $user_id,
					'immunization_name'=>$immunization_name,
					'administered_date'=>$administered_date,
					'administered_day'=>$administered_day,
					'administered_month'=>$administered_month,
					'administered_year'=>$administered_year,
					'reminder_date' => $reminder_date,
					'reminder_day' => $reminder_day,
					'reminder_month' => $reminder_month,
					'reminder_year' => $reminder_year,
					'immunization_hour' => $immunization_hour,
					'immunization_min' => $immunization_min,	
					'created_by' => $user_id,
					'created_date' => $created_date,
					'updated_date' => $updated_date,
					'updated_by'=>$user_id,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					
				);
				
				
			
				if($immunization_id == "" || $immunization_id==0) {
					$immunization_id =$this->db->insert_array(Immunization, $data);
					$data = array(
						'created_by' => $user_id,
						'created_date' => $created_date,
						'user_id' => $user_id,
					);
					
					$rows =$this->db->update_array(Immunization, $data, "immunization_id = $immunization_id");
					
					
					$data1 = array(
						'user_id'=> $user_id,
						'type'=>'Immunization',
						'reward_points'=>1,
						'common_id'=>$immunization_id,
						'created_date'=>$created_date,
						'isactive'=>1,
						'isdeleted'=>0,
						
					);
					$trp_id =$this->db->insert_array(Total_Reward_Points, $data1);	
					

					$f_receive_message="insert record";
					if (!$user_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Immunization, $data, "immunization_id = $immunization_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				 return $f_receive_message."###".$immunization_id;
	    }
		
		
		
		function f_Add_Family_History_Insert($data_values,$id)
	    {
				$f_receive_message="";

				$family_history_id=$id;
				$user_id=$data_values["user_id"];
				$relation_id=$data_values["relation_id"];
				$medical_condition=$data_values["medical_condition"];
				$death_cause=$data_values["death_cause"];
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				
				$created_date=date('d-m-Y H:i:s');				
				$updated_date=date('d-m-Y H:i:s');


				$data = array(
					'user_id' => $user_id,
					'relation_id' => $relation_id,
					'medical_condition' => $medical_condition,
					'death_cause' => $death_cause,
					'created_by' => $user_id,
					'created_date' => $created_date,
					'updated_date' => $updated_date,
					'updated_by'=>$user_id,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					
				);
				
				
			
				if($family_history_id == "" || $family_history_id==0) {
					$family_history_id =$this->db->insert_array(Family_History, $data);
					$data = array(
						'created_by' => $user_id,
						'created_date' => $created_date,
						'user_id' => $user_id,
					);
					
					$rows =$this->db->update_array(Family_History, $data, "family_history_id = $family_history_id");
					
					
					$data1 = array(
						'user_id'=> $user_id,
						'type'=>'Family_History',
						'reward_points'=>1,
						'common_id'=>$family_history_id,
						'created_date'=>$created_date,
						'isactive'=>1,
						'isdeleted'=>0,
						
					);
					$trp_id =$this->db->insert_array(Total_Reward_Points, $data1);	
					
					

					$f_receive_message="insert record";
					if (!$user_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Family_History, $data, "family_history_id = $family_history_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				 return $f_receive_message."###".$family_history_id;
	    }
		
		
		
		function f_Add_Blood_Pressure_Insert($data_values,$id)
	    {
				$f_receive_message="";
				$blood_pressure_id=$id;
				$blood_pressure_diatolic="0";
				$user_id=$data_values["user_id"];
			
				$blood_pressure_systolic1= explode("/",$data_values['blood_pressure_systolic']);
				   if(isset($blood_pressure_systolic1['0']))
				   {
						   $blood_pressure_systolic=$blood_pressure_systolic1['0'];
						   
						   
				   }
				   if(isset($blood_pressure_systolic1['1']))
				   {
						   $blood_pressure_diatolic=$blood_pressure_systolic1['1'];
				   }
	   
	   			$del_track_unit=$data_values["del_track_unit"];
				$del_track_date=$data_values["del_track_date"];
				$del_track_day=$data_values["del_track_day"];
				$del_track_month=$data_values["del_track_month"];
				$del_track_year=$data_values["del_track_year"];
				
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				
				$created_date=date('d-m-Y H:i:s');				
				$updated_date=date('d-m-Y H:i:s');


				$data = array(
					'user_id' => $user_id,
					'blood_pressure_systolic' => $blood_pressure_systolic,
					'blood_pressure_diatolic' => $blood_pressure_diatolic,
					'del_track_unit' => $del_track_unit,
					'del_track_date' => $del_track_date,
					'del_track_day' => $del_track_day,
					'del_track_month' => $del_track_month,
					'del_track_year' => $del_track_year,
					'created_by' => $user_id,
					'created_date' => $created_date,
					'updated_date' => $updated_date,
					'updated_by'=>$user_id,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					
				);
				
				
			
				if($blood_pressure_id == "" || $blood_pressure_id==0) {
					
					$query="delete from tbl_blood_pressure where user_id=".$user_id." and del_track_date='".$del_track_date."'";
					$result = mysql_query($query);
					
					if($blood_pressure_systolic!="")	{
					
						$blood_pressure_id =$this->db->insert_array(Blood_Pressure, $data);
						$data = array(
							'created_by' => $user_id,
							'created_date' => $created_date,
							'user_id' => $user_id,
						);
						
						$rows =$this->db->update_array(Blood_Pressure, $data, "blood_pressure_id = $blood_pressure_id");
						
						
						$data1 = array(
							'user_id'=> $user_id,
							'type'=>'Blood_Pressure',
							'reward_points'=>1,
							'common_id'=>$blood_pressure_id,
							'created_date'=>$created_date,
							'isactive'=>1,
							'isdeleted'=>0,
							
						);
						$trp_id =$this->db->insert_array(Total_Reward_Points, $data1);	
						

						$f_receive_message="insert record";
						if (!$user_id) { 
							$this->db->print_last_error(false);
							$f_receive_message="Error";
						} 
					}
				} else {
					$rows =$this->db->update_array(Blood_Pressure, $data, "blood_pressure_id = $blood_pressure_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				 return $f_receive_message."###".$blood_pressure_id;
	    }
		
		
		function f_Add_Life_Style_Insert($data_values,$id)
	    {
				$f_receive_message="";

				$life_style_id=$id;
				$user_id=$data_values["user_id"];
				
				$spirit=$data_values["spirit"];
				$beer=$data_values["beer"];
				$cigarette=$data_values["cigarette"];
				$life_style_sleep=$data_values["life_style_sleep"];
				
				$spirit_goal=$data_values["spirit_goal"];
				$beer_goal=$data_values["beer_goal"];
				$cigarette_goal=$data_values["cigarette_goal"];
				$life_style_sleep_goal=$data_values["life_style_sleep_goal"];
				
				
				$physical_stress=$data_values["physical_stress"];
				$physical_stress_details=$data_values["physical_stress_details"];
				$mental_stress=$data_values["mental_stress"];
				$mental_stress_details=$data_values["mental_stress_details"];
				$life_style_date=$data_values["life_style_date"];
				$life_style_day=$data_values["life_style_day"];
				$life_style_month=$data_values["life_style_month"];
				$life_style_year=$data_values["life_style_year"];
				
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				
				$created_date=date('d-m-Y H:i:s');				
				$updated_date=date('d-m-Y H:i:s');


				$data = array(
					'user_id' => $user_id,
					'spirit' => $spirit,
					'beer' => $beer,
					'cigarette' => $cigarette,
					'life_style_sleep' => $life_style_sleep,
					'spirit_goal' => $spirit_goal,
					'beer_goal' => $beer_goal,
					'cigarette_goal' => $cigarette_goal,
					'life_style_sleep_goal' => $life_style_sleep_goal,
					'physical_stress' => $physical_stress,
					'physical_stress_details' => $physical_stress_details,
					'mental_stress' => $mental_stress,
					'mental_stress_details' => $mental_stress_details,
					'life_style_day' => $life_style_day,
					'life_style_month' => $life_style_month,
					'life_style_year' => $life_style_year,
					'life_style_date' => $life_style_date,
					'created_by' => $user_id,
					'created_date' => $created_date,
					'updated_date' => $updated_date,
					'updated_by'=>$user_id,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					
				);
				
				
			
				if($life_style_id == "" || $life_style_id==0) {
					
					$query="delete from tbl_life_style where user_id=".$user_id." and life_style_date='".$life_style_date."'";
					$result = mysql_query($query);
					
					if($spirit!="" || $beer!="" || $cigarette!="" || $life_style_sleep!="")	{
					
						$life_style_id =$this->db->insert_array(Life_Style, $data);
						$data = array(
							'created_by' => $user_id,
							'created_date' => $created_date,
							'user_id' => $user_id,
						);
						
						$rows =$this->db->update_array(Life_Style, $data, "life_style_id = $life_style_id");
						
						
						$data1 = array(
							'user_id'=> $user_id,
							'type'=>'Life_Style',
							'reward_points'=>1,
							'common_id'=>$life_style_id,
							'created_date'=>$created_date,
							'isactive'=>1,
							'isdeleted'=>0,
							
						);
						$trp_id =$this->db->insert_array(Total_Reward_Points, $data1);	
						

						$f_receive_message="insert record";
						if (!$user_id) { 
							$this->db->print_last_error(false);
							$f_receive_message="Error";
						}
					}
				} else {
					$rows =$this->db->update_array(Life_Style, $data, "life_style_id = $life_style_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				 return $f_receive_message."###".$life_style_id;
	    }
		
		
		
		function f_Add_Sugar_Profile_Insert($data_values,$id)
		{
				$f_receive_message="";

				$sugar_profile_id=$id;
				$user_id=$data_values["user_id"];
				
				$fasting_blood_sugar_date=$data_values["fasting_blood_sugar_date"];
				$fasting_blood_sugar_day=$data_values["fasting_blood_sugar_day"];
				$fasting_blood_sugar_month=$data_values["fasting_blood_sugar_month"];
				$fasting_blood_sugar_year=$data_values["fasting_blood_sugar_year"];
				$fasting_blood_sugar_result=$data_values["fasting_blood_sugar_result"];
				$fasting_blood_sugar_range=$data_values["fasting_blood_sugar_range"];
				$fasting_blood_sugar_range1=$data_values["fasting_blood_sugar_range1"];
				$fasting_blood_sugar_unit=$data_values["fasting_blood_sugar_unit"];
				
				$post_parandial_date=$data_values["post_parandial_date"];
				$post_parandial_day=$data_values["post_parandial_day"];
				$post_parandial_month=$data_values["post_parandial_month"];
				$post_parandial_year=$data_values["post_parandial_year"];
				$post_parandial_result=$data_values["post_parandial_result"];
				$post_parandial_range=$data_values["post_parandial_range"];
				$post_parandial_range1=$data_values["post_parandial_range1"];
				$post_parandial_unit=$data_values["post_parandial_unit"];
				
				
				$urine_blood_date=$data_values["urine_blood_date"];
				$urine_blood_day=$data_values["urine_blood_day"];
				$urine_blood_month=$data_values["urine_blood_month"];
				$urine_blood_year=$data_values["urine_blood_year"];
				$urine_blood_result=$data_values["urine_blood_result"];
				$urine_blood_range=$data_values["urine_blood_range"];
				$urine_blood_range1=$data_values["urine_blood_range1"];
				$urine_blood_unit=$data_values["urine_blood_unit"];
				
				
				$random_blood_sugar_date=$data_values["random_blood_sugar_date"];
				$random_blood_sugar_day=$data_values["random_blood_sugar_day"];
				$random_blood_sugar_month=$data_values["random_blood_sugar_month"];
				$random_blood_sugar_year=$data_values["random_blood_sugar_year"];
				$random_blood_sugar_result=$data_values["random_blood_sugar_result"];
				$random_blood_sugar_range=$data_values["random_blood_sugar_range"];
				$random_blood_sugar_range1=$data_values["random_blood_sugar_range1"];
				$random_blood_sugar_unit=$data_values["random_blood_sugar_unit"];
				
				
				
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				
				$created_date=date('d-m-Y H:i:s');				
				$updated_date=date('d-m-Y H:i:s');


				$data = array(
					'user_id' => $user_id,
					'fasting_blood_sugar_date'=>$fasting_blood_sugar_date,
					'fasting_blood_sugar_day'=>$fasting_blood_sugar_day,
					'fasting_blood_sugar_month'=>$fasting_blood_sugar_month,
					'fasting_blood_sugar_year'=>$fasting_blood_sugar_year,
					'fasting_blood_sugar_result'=>$fasting_blood_sugar_result,
					'fasting_blood_sugar_range'=>$fasting_blood_sugar_range,
					'fasting_blood_sugar_range1'=>$fasting_blood_sugar_range1,
					'fasting_blood_sugar_unit'=>$fasting_blood_sugar_unit,
					'post_parandial_date'=>$post_parandial_date,
					'post_parandial_day'=>$post_parandial_day,
					'post_parandial_month'=>$post_parandial_month,
					'post_parandial_year'=>$post_parandial_year,
					'post_parandial_result'=>$post_parandial_result,
					'post_parandial_range'=>$post_parandial_range,
					'post_parandial_range1'=>$post_parandial_range1,
					'post_parandial_unit'=>$post_parandial_unit,
					'urine_blood_date'=>$urine_blood_date,
					'urine_blood_day'=>$urine_blood_day,
					'urine_blood_month'=>$urine_blood_month,
					'urine_blood_year'=>$urine_blood_year,
					'urine_blood_result'=>$urine_blood_result,
					'urine_blood_range'=>$urine_blood_range,
					'urine_blood_range1'=>$urine_blood_range1,
					'urine_blood_unit'=>$urine_blood_unit,
					'random_blood_sugar_date'=>$random_blood_sugar_date,
					'random_blood_sugar_day'=>$random_blood_sugar_day,
					'random_blood_sugar_month'=>$random_blood_sugar_month,
					'random_blood_sugar_year'=>$random_blood_sugar_year,
					'random_blood_sugar_result'=>$random_blood_sugar_result,
					'random_blood_sugar_range'=>$random_blood_sugar_range,
					'random_blood_sugar_range1'=>$random_blood_sugar_range1,
					'random_blood_sugar_unit'=>$random_blood_sugar_unit,					
					'created_by' => $user_id,
					'created_date' => $created_date,
					'updated_date' => $updated_date,
					'updated_by'=>$user_id,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					
				);
				
				
			
				if($sugar_profile_id == "" || $sugar_profile_id==0) {
					$sugar_profile_id =$this->db->insert_array(Sugar_Profile, $data);
					$data = array(
						'created_by' => $user_id,
						'created_date' => $created_date,
						'user_id' => $user_id,
					);
					
					$rows =$this->db->update_array(Sugar_Profile, $data, "sugar_profile_id = $sugar_profile_id");
					
					$data1 = array(
						'user_id'=> $user_id,
						'type'=>'Sugar_Profile',
						'reward_points'=>1,
						'common_id'=>$sugar_profile_id,
						'created_date'=>$created_date,
						'isactive'=>1,
						'isdeleted'=>0,
						
					);
					$trp_id =$this->db->insert_array(Total_Reward_Points, $data1);	
					

					$f_receive_message="insert record";
					if (!$user_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Sugar_Profile, $data, "sugar_profile_id = $sugar_profile_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				 return $f_receive_message."###".$sugar_profile_id;
	    }
		
		
		function f_Add_Lipid_Profile_Insert($data_values,$id)
	    {
				$f_receive_message="";

				$lipid_profile_id=$id;
				$user_id=$data_values["user_id"];
				
				$triglyceride_blood_sugar_date=$data_values["triglyceride_blood_sugar_date"];
				$triglyceride_blood_sugar_day=$data_values["triglyceride_blood_sugar_day"];
				$triglyceride_blood_sugar_month=$data_values["triglyceride_blood_sugar_month"];
				$triglyceride_blood_sugar_year=$data_values["triglyceride_blood_sugar_year"];
				$triglyceride_blood_sugar_result=$data_values["triglyceride_blood_sugar_result"];
				$triglyceride_blood_sugar_range=$data_values["triglyceride_blood_sugar_range"];
				$triglyceride_blood_sugar_range1=$data_values["triglyceride_blood_sugar_range1"];
				$triglyceride_blood_sugar_unit=$data_values["triglyceride_blood_sugar_unit"];
				
				$ldl_date=$data_values["ldl_date"];
				$ldl_day=$data_values["ldl_day"];
				$ldl_month=$data_values["ldl_month"];
				$ldl_year=$data_values["ldl_year"];
				$ldl_result=$data_values["ldl_result"];
				$ldl_range=$data_values["ldl_range"];
				$ldl_range1=$data_values["ldl_range1"];
				$ldl_unit=$data_values["ldl_unit"];
				
				
				$hdl_date=$data_values["hdl_date"];
				$hdl_day=$data_values["hdl_day"];
				$hdl_month=$data_values["hdl_month"];
				$hdl_year=$data_values["hdl_year"];
				$hdl_result=$data_values["hdl_result"];
				$hdl_range=$data_values["hdl_range"];
				$hdl_range1=$data_values["hdl_range1"];
				$hdl_unit=$data_values["hdl_unit"];
				
				
				$cholesterol_date=$data_values["cholesterol_date"];
				$cholesterol_day=$data_values["cholesterol_day"];
				$cholesterol_month=$data_values["cholesterol_month"];
				$cholesterol_year=$data_values["cholesterol_year"];
				$cholesterol_result=$data_values["cholesterol_result"];
				$cholesterol_range=$data_values["cholesterol_range"];
				$cholesterol_range1=$data_values["cholesterol_range1"];
				$cholesterol_unit=$data_values["cholesterol_unit"];
				
				
				
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				
				$created_date=date('d-m-Y H:i:s');				
				$updated_date=date('d-m-Y H:i:s');


				$data = array(
					'user_id' => $user_id,
					'triglyceride_blood_sugar_date'=>$triglyceride_blood_sugar_date,
					'triglyceride_blood_sugar_day'=>$triglyceride_blood_sugar_day,
					'triglyceride_blood_sugar_month'=>$triglyceride_blood_sugar_month,
					'triglyceride_blood_sugar_year'=>$triglyceride_blood_sugar_year,
					'triglyceride_blood_sugar_result'=>$triglyceride_blood_sugar_result,
					'triglyceride_blood_sugar_range'=>$triglyceride_blood_sugar_range,
					'triglyceride_blood_sugar_range1'=>$triglyceride_blood_sugar_range1,
					'triglyceride_blood_sugar_unit'=>$triglyceride_blood_sugar_unit,
					'ldl_date'=>$ldl_date,
					'ldl_day'=>$ldl_day,
					'ldl_month'=>$ldl_month,
					'ldl_year'=>$ldl_year,
					'ldl_result'=>$ldl_result,
					'ldl_range'=>$ldl_range,
					'ldl_range1'=>$ldl_range1,
					'ldl_unit'=>$ldl_unit,
					'hdl_date'=>$hdl_date,
					'hdl_day'=>$hdl_day,
					'hdl_month'=>$hdl_month,
					'hdl_year'=>$hdl_year,
					'hdl_result'=>$hdl_result,
					'hdl_range'=>$hdl_range,
					'hdl_range1'=>$hdl_range1,
					'hdl_unit'=>$hdl_unit,
					'cholesterol_date'=>$cholesterol_date,
					'cholesterol_day'=>$cholesterol_day,
					'cholesterol_month'=>$cholesterol_month,
					'cholesterol_year'=>$cholesterol_year,
					'cholesterol_result'=>$cholesterol_result,
					'cholesterol_range'=>$cholesterol_range,
					'cholesterol_range1'=>$cholesterol_range1,
					'cholesterol_unit'=>$cholesterol_unit,					
					'created_by' => $user_id,
					'created_date' => $created_date,
					'updated_date' => $updated_date,
					'updated_by'=>$user_id,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					
				);
				
				
			
				if($lipid_profile_id == "" || $lipid_profile_id==0) {
					$lipid_profile_id =$this->db->insert_array(Lipid_Profile, $data);
					$data = array(
						'created_by' => $user_id,
						'created_date' => $created_date,
						'user_id' => $user_id,
					);
					
					$rows =$this->db->update_array(Lipid_Profile, $data, "lipid_profile_id = $lipid_profile_id");
					
					
					$data1 = array(
						'user_id'=> $user_id,
						'type'=>'Lipid_Profile',
						'reward_points'=>1,
						'common_id'=>$lipid_profile_id,
						'created_date'=>$created_date,
						'isactive'=>1,
						'isdeleted'=>0,
						
					);
					$trp_id =$this->db->insert_array(Total_Reward_Points, $data1);	
					

					$f_receive_message="insert record";
					if (!$user_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Lipid_Profile, $data, "lipid_profile_id = $lipid_profile_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				 return $f_receive_message."###".$lipid_profile_id;
	    }

		function f_Add_Health_Problem_Insert($data_values,$id)
	    {
				$f_receive_message="";

				$health_problem_id=$id;
			
				
				$user_id =$data_values["user_id"];
				$cardiac_problem =$data_values["cardiac_problem"];
				$eye_problem =$data_values["eye_problem"];
				$kidney_problem =$data_values["kidney_problem"];
				$circulation_problem =$data_values["circulation_problem"];
				$skin_problem =$data_values["skin_problem"];
				$digestive_problem =$data_values["digestive_problem"];
				$joint_problem =$data_values["joint_problem"];
				$constipation_problem =$data_values["constipation_problem"];
				$other_problem =$data_values["other_problem"];
				$isactive=$data_values["isactive"];
				$isdeleted =$data_values["isdeleted"];
				
				$created_date=date('d-m-Y H:i:s');				
				$updated_date=date('d-m-Y H:i:s');


				$data = array(
					'user_id' => $user_id,
					'cardiac_problem' => $cardiac_problem,
					'eye_problem' => $eye_problem,
					'kidney_problem' => $kidney_problem,
					'circulation_problem' => $circulation_problem,
					'skin_problem' => $skin_problem,
					'digestive_problem' => $digestive_problem,
					'joint_problem' => $joint_problem,
					'constipation_problem' => $constipation_problem,
					'other_problem' => $other_problem,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					'created_by' => $user_id,
					'created_date' => $created_date,
					'updated_date' => $updated_date,
					'updated_by'=>$user_id,
								
				);
				
				
			
				if($health_problem_id == "" || $health_problem_id==0) {
					$health_problem_id =$this->db->insert_array(Health_Problem, $data);
					
					$data = array(
						'created_by' => $user_id,
						'created_date' => $created_date,
						'user_id' => $user_id,
					);
					
					$rows =$this->db->update_array(Health_Problem, $data, "health_problem_id = $health_problem_id");
					
					$data1 = array(
						'user_id'=> $user_id,
						'type'=>'Health_Problem',
						'reward_points'=>1,
						'common_id'=>$health_problem_id,
						'created_date'=>$created_date,
						'isactive'=>1,
						'isdeleted'=>0,
						
					);
					$trp_id =$this->db->insert_array(Total_Reward_Points, $data1);	
					
					
					
					$f_receive_message="insert record";

					

					if (!$health_problem_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Health_Problem, $data, "health_problem_id = $health_problem_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				 $query = "Delete from  ".Health_Problem_Details."  where parent_id=".$health_problem_id;
				 mysql_query($query); 

				 return $f_receive_message."###".$health_problem_id;
	    }
		
		function f_Add_Health_Problem_Detail_Insert($data_values,$id)
	    {
				$f_receive_message="";

				$health_problem_id=$id;			
				
				$user_id =$data_values["user_id"];
				$problem =$data_values["problem"];
				$diag_day =$data_values["diag_day"];
				$diag_month =$data_values["diag_month"];
				$diag_year =$data_values["diag_year"];
				$diag_date =$data_values["diag_date"];
				$doctor_id =$data_values["doctor_id"];
				$problem_type =$data_values["problem_type"];
				$parent_id=$data_values["parent_id"];
				
				$data = array(
					'user_id' => $user_id,
					'problem' => $problem,
					'diag_day' => $diag_day,
					'diag_month' => $diag_month,
					'diag_year' => $diag_year,
					'diag_date' => $diag_date,
					'doctor_id' => $doctor_id,
					'parent_id' => $parent_id,
					'problem_type'=>$problem_type,
				);

				$health_problem_id =$this->db->insert_array(Health_Problem_Details, $data);
				return $f_receive_message."###".$health_problem_id;
	    }
		
		
		
		
		function f_Add_Mails($data_values,$id)
	    {
				$f_receive_message="";

				$mail_id=$id;
				
				$user_id=$data_values["user_id"];
				
				///$query=$data_values["query"];
				$queryid=$data_values["queryid"];
				
				///$query_comp=$data_values["query_comp"];
				
				
				
				if($queryid=="undefined")
				{
					$queryid="0";
				}
				
				$last_occurrency_date=$data_values["last_occurrency_date"];
				$last_occurrency_day=$data_values["last_occurrency_day"];
				$last_occurrency_month=$data_values["last_occurrency_month"];
				$last_occurrency_year=$data_values["last_occurrency_year"];
				$doctor_id=$data_values["doctor_id"];
				$query_type=$data_values["query_type"];
				
				$complaint=$data_values["complaint"];
				$subject=$data_values["subject"];
				$symptoms=$data_values["symptoms"];
				$body_area=$data_values["body_area"];
				
				$suffer_from=$data_values["suffer_from"];
				$doctor_consulted=$data_values["doctor_consulted"];
				$doc_comment=$data_values["doc_comment"];
				$video_query_requirement=$data_values["video_query_requirement"];
				$upload_report=$data_values["upload_report"];
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				
				
				$prescription_report=$data_values["prescription_report"];
				$lab_test_report=$data_values["lab_test_report"];
				$radiology_report=$data_values["radiology_report"];
				$prescription_type=$data_values["prescription_type"];
				$lab_test_type=$data_values["lab_test_type"];
				$radiology_type=$data_values["radiology_type"];
				////$upload_report=$data_values["upload_report"];
				
				$folderid=GetValue("select id as col from tbl_folder where parentid=".$user_id." and name='sent'","col");
				
				
				
				$created_date=date('d-m-Y H:i:s');				
				$updated_date=date('d-m-Y H:i:s');


				$data = array(
					'user_id' => $user_id,
					'followup_id' => $queryid,
					'complaint' => $complaint,
					'subject'=>$subject,
					'last_occurrency_date'=>$last_occurrency_date,
					'last_occurrency_day'=>$last_occurrency_day,
					'last_occurrency_month'=>$last_occurrency_month,
					'last_occurrency_year'=>$last_occurrency_year,
					'doctor_id' => $doctor_id,
					'query_type' => $query_type,
					'body_area' => $body_area,
					'symptoms' => $symptoms,
					'suffer_from' => $suffer_from,
					'doctor_consulted' => $doctor_consulted,
					'doc_comment' => $doc_comment,
					'video_query_requirement' => $video_query_requirement,
					'created_by' => $user_id,
					'created_date' => $created_date,
					'updated_date' => $updated_date,
					'updated_by'=>$user_id,
					'status'=>'sent',
					'folderid'=>$folderid,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					'mail_type' => 'Doctor',
					'accept' => '2',
					//'mail_type' => 'Main',
				);
				
				
			  
				if($mail_id == "" || $mail_id==0) {
					$mail_id =$this->db->insert_array(Compose, $data);
					$data = array(
						'created_by' => $user_id,
						'created_date' => $created_date,
						'user_id' => $user_id,
					);
					$rows =$this->db->update_array(Compose, $data, "mail_id = $mail_id");
				
					
					
					
					
					
					
					$data = array(
						'user_id' => $user_id,
						'parent_mail_id' => $mail_id,
						'query_type' => $query_type,
						'prescription_report' => ''.$prescription_report.'',
						'lab_test_report' => ''.$lab_test_report.'',
						'radiology_report' => ''.$radiology_report.'',
						'created_by' => $user_id,
						'created_date' => $created_date,
						'updated_date' => $updated_date,
						'updated_by'=>$user_id,
						'isactive'=>$isactive,
						'isdeleted' => $isdeleted,
						
					);
					$mail_id_1 =$this->db->insert_array(Medical_History, $data);
					
					
					$data_1 = array(
						'user_id' => $user_id,
						'parent_mail_id' => $mail_id,
						'complaint' => $complaint,
						'query' => $query_type,
						'queryid' => $queryid,
						'doc_comment' => $doc_comment,
						'video_query_requirement' => $video_query_requirement,
						'upload_report' => $upload_report,
						'created_by' => $user_id,
						'created_date' => $created_date,
						'updated_date' => $updated_date,
						'updated_by'=>$user_id,
						'isactive'=>$isactive,
						'isdeleted'=>$isdeleted,
						
					);
					$mail_id_2 =$this->db->insert_array(Upload_Compose, $data_1);
					
					
				$hospital_doc_id=GetValue("select hospital_id as col from tbl_user_hospital where user_id=".$user_id."", "col");
				if($hospital_doc_id=="" || $hospital_doc_id=="0")
				{
					$hospital_doc_id="3";
				}
				
				$user_name=GetValue("select name as col from tbl_users where user_id=".$user_id, "col");
					
				$query_p = "SELECT * FROM tbl_doctor WHERE hospital_name=".$hospital_doc_id." and type='Doctor' and isdeleted=0";
				$result_p = mysql_query($query_p);
				if ($result_p != "") {
					$rowcount_p = mysql_num_rows($result_p);
					if ($rowcount_p > 0) {	
							while($row_p = mysql_fetch_assoc($result_p)) {

						$messageText="Dear ".$row_p['doctor_name'].", You have received an email query from Alivemeter user. Please look into the query. The Alivemeter Team.";
						$time=date('h:i:s');
						
						/*$url = "http://59.162.167.52/api/MessageCompose";
						
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_POSTFIELDS, 'admin=renish.paul@bloomtel.in&user=pinaki@alivemeter.com:ALIVEM&senderID=ALIVEM&receipientno='.$row_p['contact'].'&msgtxt='.$messageText.'&state=4');
						curl_setopt($ch, CURLOPT_POST, 1);
						curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						$result = curl_exec($ch);
						*/
					
						$string="";
						$to = $row_p['email'];
						$strSubject="Alivemeter � You have a mail";
						
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
						$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #99cc00; font-weight: bold; line-height: 20px; margin: 0px;'>Dear ".$row_p['doctor_name'].",</p>";
						$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; padding-top: 10px; margin: 0px;'>You have received an email query from Alivemeter user. Please look into the query</p>";                         
						
						$string=$string."</td>";
						$string=$string."</tr>";
						$string=$string."<tr>";
						$string=$string."<td style='padding: 5px 11px 0px 11px; text-align: justify; margin: 0px;'>";
						$string=$string."<table width='100%' border='0' cellspacing='0' cellpadding='0'>";
						$string=$string."<tr>";
						$string=$string."</tr>";
						$string=$string."</table>";
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
						
			 /// echo $strBody;
		
					///	 SendEmail("Alivemeter Team", "support@alivemeter.com", $to, $strSubject, $strBody);

					}}} 
				
					
					
					
					
					if($query_type=="1") {
							if($mail_id != "" || $mail_id!=0) {
								$query = "SELECT * FROM tbl_total_reward_points WHERE user_id=".$user_id." and type='Inbox'";
								$result = mysql_query($query);
								if ($result != "") {
									$rowcount = mysql_num_rows($result);
									if ($rowcount > 0) {
										return false;
									}
									else
									{
										$reward_point="5";
									}
								}
							
							
							$data1 = array(
									'user_id'=> $user_id,
									'type'=>'Inbox',
									'reward_points'=>$reward_point,
									'common_id'=>$mail_id,
									'created_date'=>$created_date,
									'isactive'=>1,
									'isdeleted'=>0,
									
								);
								$user_review_id =$this->db->insert_array(Total_Reward_Points, $data1);		
							}
					}
					$f_receive_message="insert record";
					if (!$user_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Compose, $data, "mail_id = $mail_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				 return $f_receive_message."###".$mail_id;
	    }
		
		
		
		function f_Add_Nutritionist($data_values,$id)
	    {
				$f_receive_message="";

				$mail_id=$id;
				
				$user_id=$data_values["user_id"];
				$subject=$data_values["subject"];
				$message=$data_values["message"];
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				$folderid=$data_values["folderid"];
				$folder_nut_id=$data_values["folder_nut_id"];
				$nutrition_id=$data_values["nutrition_id"];
				$status=$data_values["status"];
				$created_date=date('d-m-Y H:i:s');				
				$updated_date=date('d-m-Y H:i:s');
			

				$data = array(
					'user_id' => $user_id,
					'subject' => $subject,
					'message' => $message,
					'created_by' => $user_id,
					'created_date' => $created_date,
					'updated_date' => $updated_date,
					'updated_by'=>$user_id,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					'mail_type' => 'Nutritionist',
					'folderid' => $folderid,
					'folder_nut_id'=>$folder_nut_id,
					'nutrition_id'=>$nutrition_id,
					'status'=>$status,
					
				);
				
				
			
				if($mail_id == "" || $mail_id==0) {
					$mail_id =$this->db->insert_array(Nutritionist, $data);
					$data = array(
						'created_by' => $user_id,
						'created_date' => $created_date,
						'user_id' => $user_id,
					);
					$rows =$this->db->update_array(Nutritionist, $data, "mail_id = $mail_id");
					
					$f_receive_message="insert record";
					if (!$user_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Nutritionist, $data, "mail_id = $mail_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				$user_name=GetValue("select name as col from tbl_users where user_id=".$user_id, "col");
				
				
				
				
				
				
				$query_p = "SELECT * FROM tbl_doctor WHERE doctor_id=".$nutrition_id." and type='Nutritionist' and isdeleted=0";
				$result_p = mysql_query($query_p);
				if ($result_p != "") {
					$rowcount_p = mysql_num_rows($result_p);
					if ($rowcount_p > 0) {	
							while($row_p = mysql_fetch_assoc($result_p)) {

						$messageText="Dear ".$row_p['doctor_name'].", You have received an email query from Alivemeter user. Please look into the query. The Alivemeter Team";
				$time=date('h:i:s');
				
				
				
				$url = "http://59.162.167.52/api/MessageCompose";
				
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_POSTFIELDS, 'admin=renish.paul@bloomtel.in&user=pinaki@alivemeter.com:ALIVEM&senderID=ALIVEM&receipientno='.$row_p['contact'].'&msgtxt='.$messageText.'&state=4');
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				$result = curl_exec($ch);
				
						
						$string="";
						$to = $row_p['email'];
						
						$strSubject="You have a mail";
						
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
						$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #99cc00; font-weight: bold; line-height: 20px; margin: 0px;'>Dear ".$row_p['doctor_name'].",</p>";
						$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; padding-top: 10px; margin: 0px;'>You have received an email query from Alivemeter user. Please look into the query.</p>";                         
						
						$string=$string."</td>";
						$string=$string."</tr>";
						$string=$string."<tr>";
						$string=$string."<td style='padding: 5px 11px 0px 11px; text-align: justify; margin: 0px;'>";
						$string=$string."<table width='100%' border='0' cellspacing='0' cellpadding='0'>";
						$string=$string."<tr>";
						$string=$string."</tr>";
						$string=$string."</table>";
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
						
			 /// echo $strBody;
		
						SendEmail("Alivemeter Team", "support@alivemeter.com", $to, $strSubject, $strBody);

						
						
					}}} 
				
				
				
				 return $f_receive_message."###".$mail_id;
	    }
		
		
		function f_Add_Calorie($data_values,$id)
	    {
				$f_receive_message="";

				$calorie_id=$id;
				
				$user_id=$data_values["user_id"];
				$dob=$data_values["dob"];
				$age = floor((time() - strtotime($dob))/31556926);
				
				
				$curr_wgt=$data_values["curr_wgt"];
				$goal_wgt=$data_values["goal_wgt"];
				$target_goal=$data_values["target_goal"];
				$curr_height=$data_values["curr_height"];
				$cur_height_type=$data_values["cur_height_type"];
				$gender=$data_values["gender"];
				$dob_day=$data_values["dob_day"];
				$dob_month=$data_values["dob_month"];
				$dob_year=$data_values["dob_year"];
				$daily_activity=$data_values["daily_activity"];
				$plan_week=$data_values["plan_week"];
				$plan_hour=$data_values["plan_hour"];
				$current_waist=$data_values["current_waist"];
				$current_hips=$data_values["current_hips"];
				$current_arm=$data_values["current_arm"];
				$goal_waist=$data_values["goal_waist"];
				$goal_hips=$data_values["goal_hips"];
				$goal_arms=$data_values["goal_arms"];
				$ismain=$data_values["ismain"];
				
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				
				$created_date=date('d-m-Y H:i:s');				
				$updated_date=date('d-m-Y H:i:s');

				
				
				$data = array(
					'user_id' => $user_id,
					'curr_wgt' => $curr_wgt,
					'goal_wgt' => $goal_wgt,
					'target_goal' => $target_goal,
					'curr_height' => $curr_height,
					'cur_height_type' => $cur_height_type,
					'gender' => $gender,
					'age' => $age,
					'dob_day' => $dob_day,
					'dob_month' => $dob_month,
					'dob_year' => $dob_year,
					'daily_activity' => $daily_activity,
					'plan_week' => $plan_week,
					'plan_hour' => $plan_hour,
					'created_by' => $user_id,
					'created_date' => $created_date,
					'updated_date' => $updated_date,
					'updated_by'=>$user_id,
					'dob'=>$dob,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					
				);
				
				
			
				if($calorie_id == "" || $calorie_id==0) {
					$calorie_id =$this->db->insert_array(Calorie, $data);
					$calorie_id_1=0;
					$data = array(
						'created_by' => $user_id,
						'created_date' => $created_date,
						'user_id' => $user_id,
					);
					$rows =$this->db->update_array(Calorie, $data, "calorie_id = $calorie_id");
					
					
					
					$f_receive_message="insert record";
					if (!$user_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Calorie, $data, "calorie_id = $calorie_id");
					$calorie_id_1=$calorie_id;
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				
				$data1 = array(
						'current_waist' => $current_waist,
						'current_hips' => $current_hips,
						'current_arm' => $current_arm,
						'goal_waist' => $goal_waist,
						'goal_hips' => $goal_hips,
						'goal_arms' => $goal_arms,
						'weight_date' => $created_date,
						'waist_date' => $created_date,
						'arms_date' => $created_date,
						'hips_date' => $created_date,
						'created_date' => $created_date,
						'updated_date' => $updated_date,
						'user_id' => $user_id,
						'parent_id' => $calorie_id,
						'isactive'=>$isactive,
						'isdeleted' => $isdeleted,
						'ismain' => $ismain,
					);
					
					if($calorie_id_1 == "" || $calorie_id_1==0) 
					{
						$calorie_id =$this->db->insert_array("tbl_calorie_det", $data1);
					} 
					else
					{
						$rows =$this->db->update_array("tbl_calorie_det", $data1, "ismain = 1");
					}
					
				
				$this->f_Get_Calories($user_id);
				
				return $f_receive_message."###".$calorie_id;
				 
				
				 
	    }
		
		
		function f_Get_Calories($user_id)
		{
			
			
			if(isset($_SESSION['UserID']))
			{
				$user_id=$_SESSION['UserID'];
			}
			else
			{
				$user_id="0";
			}

		
	
			$query = "SELECT * from ".Calorie." where isactive=1 and isdeleted=0 and user_id=$user_id order by sort desc limit 1";
			$result = mysql_query($query);
			if($result != "") {
				$rowcount  = mysql_num_rows($result);
				if($rowcount > 0) {
					while($row = mysql_fetch_assoc($result)) {
						extract($row);
						 
						$Curr_Weight=$row['curr_wgt'];
						$goal_wgt=$row['goal_wgt'];
						$target_goal=$row['target_goal'];
						$Curr_Height=$row['curr_height'];
						$Curr_Height_Type=$row['cur_height_type'];
						$gender=$row['gender'];
						$age=$row['age'];
						$Activity_Level=$row['daily_activity'];
						$Hors_Day=$row['plan_week'];
						$Workout_Miunt=$row['plan_hour'];
						$Age=$row['age'];
						$Gender=$row['gender'];
						$calorie_id=$row['calorie_id'];
					}
			
					 
					$data = array(
						'curr_wgt' => $Curr_Weight,
						'goal_wgt' => $goal_wgt,
						'target_goal' => $target_goal,
						'curr_height' => $Curr_Height,
						'cur_height_type' => $Curr_Height_Type,
						'daily_activity' => $Activity_Level,
						'plan_week' => $Hors_Day,
						'plan_hour' => $Workout_Miunt,
						'age' => $Age,
						'gender' => $Gender,
					);
					
					$data_return=$this->get_calorie->calculation_calories($data, $calorie_id);
					
					$kg_type=$data_return["kg_type"];
					
					$Net_Calories_Consumed_Per_Day=$data_return["Net_Calories_Consumed_Per_Day"];
					$Net_Calories_Consumed_Per_Day_Act=$data_return["Net_Calories_Consumed_Per_Day"];


					
					$last_word_end = strlen($Net_Calories_Consumed_Per_Day_Act) - 1;
					$last_word_end = substr($Net_Calories_Consumed_Per_Day_Act,$last_word_end, 1);
					
					if($last_word_end  > 0)
					{
						$last_word_end =10-$last_word_end;
						
						$Net_Calories_Consumed_Per_Day_Act=$Net_Calories_Consumed_Per_Day_Act+$last_word_end;
					}

					$Crab_Grams=$data_return["Crab_Grams"];
					$Fat_Grams=$data_return["Fat_Grams"];
					$Protein_Grams=$data_return["Protein_Grams"];
					$Net_Calories_Consumed=$data_return["Net_Calories_Consumed"];
					$Calorie_per_day=$data_return["Calorie_per_day"];
					$Burned_Calories=$data_return["Burned_Calories"];
					$ProectWeight_Loss=$data_return["ProectWeight_Loss"];
					$bmr=$data_return["bmr"];
					$Net_Calories_Consumed1=$data_return["Net_Calories_Consumed1"];
					$Net_Calories_Consumed_diet=$data_return["Net_Calories_Consumed_diet"];
					$acutal_deficit=$data_return["acutal_deficit"];
					$projected_weight_loss_1=$data_return["projected_weight_loss_1"];

					$calorie_count = $this->db->select("SELECT * FROM tbl_calorie_consumed where user_id=$user_id"); 
					$calorie_count = $this->db->row_count;
					
					$calorieid=GetValue("select calorie_id as col from tbl_calorie_consumed where user_id=".$user_id, "col");
					$data = array(
									'calorie_consumed_day' => $Net_Calories_Consumed_Per_Day_Act,
									'carbs' => $Crab_Grams,
									'fat' => $Fat_Grams,
									'protein' => $Protein_Grams,
									'Net_Calories_Consumed1'=>$Net_Calories_Consumed1,
									'Net_Calories_Consumed_diet'=>$Net_Calories_Consumed_diet,
									'net_calorie_consumed' => $Net_Calories_Consumed,
									'daily_calorie' => $Calorie_per_day,
									'projected_weight_loss' => $ProectWeight_Loss,
									'calories_burned' => $Burned_Calories,
									'workouts' => $Hors_Day,
									'minutes' => $Workout_Miunt,
									'user_id' => $user_id,
									'bmr'=>$bmr,
									'act_calorie_consumed_day' => $Net_Calories_Consumed_Per_Day,
									'acutal_deficit' => $acutal_deficit,
									'projected_weight_loss_1'=>$projected_weight_loss_1,
									'kg_type'=>$kg_type,
									
								);
					if ($calorieid<=0) {
							
								
						$calorieid = $this->db->insert_array(Calorie_Consumed, $data);
					}			
					else
					{
						$rows =$this->db->update_array(Calorie_Consumed, $data, "calorie_id = $calorieid");
					}			
								
				}
			}

		}
		
		
		function f_Add_Calorie_Det($data_values,$id)
	    {
				$f_receive_message="";

				$cadetid=$id;
				
				$user_id=$data_values["user_id"];
				
				$weight_date=$data_values["weight_date"];
				$waist_date=$data_values["waist_date"];
				$arms_date=$data_values["arms_date"];
				$hips_date=$data_values["hips_date"];
				
				$curr_weight=$data_values["curr_wgt"];
				$current_waist=$data_values["current_waist"];
				$current_hips=$data_values["current_hips"];
				$current_arm=$data_values["current_arm"];
				
				$ismain=$data_values["ismain"];
				
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				
				$created_date=date('d-m-Y H:i:s');				
				$updated_date=date('d-m-Y H:i:s');


				$data = array(
					'curr_wgt' => $curr_weight,
					'current_waist' => $current_waist,
					'current_hips' => $current_hips,
					'current_arm' => $current_arm,
					'weight_date' => $weight_date,
					'waist_date' => $waist_date,
					'arms_date' => $arms_date,
					'hips_date' => $hips_date,
					'created_date' => $created_date,
					'updated_date' => $updated_date,
					'user_id' => $user_id,
					'parent_id' => 0,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					'ismain' => $ismain,
					
				);
				
				
			
				if($cadetid == "" || $cadetid==0) {
					$cadetid =$this->db->insert_array(Calorie_Det, $data);
					$data = array(
						'created_by' => $user_id,
						'created_date' => $created_date,
						'user_id' => $user_id,
					);
					$rows =$this->db->update_array(Calorie_Det, $data, "id = $cadetid");
					
					
					
					$f_receive_message="insert record";
					if (!$user_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Calorie_Det, $data, "id = $cadetid");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				return $f_receive_message."###".$cadetid;
	    }
		
		
		function f_Add_Doctor($data_values,$id)
	    {
				$f_receive_message="";

				$doctor_id=$id;
				
				$user_id=$data_values["user_id"];
				$user_type=$data_values["user_type"];
				
				$doctor_name=$data_values["doctor_name"];
				$user_count=$data_values["user_count"];
				$password=$data_values["password"];
				$hospital_name=$data_values["hospital_name"];
				$hospital_address=$data_values["hospital_address"];
				$hospital_city=$data_values["hospital_city"];
				$hospital_area=$data_values["hospital_area"];
				$specialization=$data_values["specialization"];
				$contact=$data_values["contact"];
				$type=$data_values["type"];
				$email=$data_values["email"];
				
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				
				
				$created_date=date('d-m-Y H:i:s');				
				$updated_date=date('d-m-Y H:i:s');
				$parent_id=GetValue("select parent_id as col from tbl_users where user_id=".$user_id, "col");
				if($parent_id==0)
				{
					$parent_id=$user_id;
				}	
				

				$data = array(
					'doctor_name' => $doctor_name,
					'hospital_name' => $hospital_name,
					'hospital_address' => $hospital_address,
					'hospital_city' => $hospital_city,
					'hospital_area' => $hospital_area,
					'specialization' => $specialization,
					'contact' => $contact,
					'type' => $type,
					'email' => $email,
					'created_date' => $created_date,
					'updated_date' => $updated_date,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					'user_id' => $user_id,
					'user_type' => $user_type,
					'parent_id' => $parent_id,
					'password' => $password,
					'user_count' =>$user_count,
					
				);
				
				
			
				if($doctor_id == "" || $doctor_id==0) {
					$doctor_id =$this->db->insert_array(Doctor, $data);
					$data = array(
						'created_by' => $user_id,
						'created_date' => $created_date,
						
					);
					$rows =$this->db->update_array(Doctor, $data, "doctor_id = $doctor_id");
					
					
					
					$f_receive_message="insert record";
					if (!$user_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Doctor, $data, "doctor_id = $doctor_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				
				if($type=="Nutritionist")
				{
					$data1 = array(
						'parentid' => $doctor_id,
						'name' => 'Inbox',
						'isdeleted' => 0,
						'type' => 'Nutritionist',
						
					);
					$rows =$this->db->insert_array(Nut_Folder, $data1);
					
					
					$data2 = array(
						'parentid' => $doctor_id,
						'name' => 'sent',
						'isdeleted' => 0,
						'type' => 'Nutritionist',
						
					);
					$rows =$this->db->insert_array(Nut_Folder, $data2);
					
					
					$data3 = array(
						'parentid' => $doctor_id,
						'name' => 'trash',
						'isdeleted' => 0,
						'type' => 'Nutritionist',
						
					);
					$rows =$this->db->insert_array(Nut_Folder, $data3);
				}
				
				
				if($user_type=="Admin")
				{
				
				$messageText="Dear ".$doctor_name.", Welcome to Alivemeter. We have emailed your login details. For assistance call me directly @ 9870048181. Tanushri, founder Alivemeter";
				$time=date('h:i:s');
				
				
				
				$url = "http://59.162.167.52/api/MessageCompose";
				
				$ch = curl_init();
				curl_setopt($ch, CURLOPT_URL, $url);
				curl_setopt($ch, CURLOPT_POSTFIELDS, 'admin=renish.paul@bloomtel.in&user=pinaki@alivemeter.com:ALIVEM&senderID=ALIVEM&receipientno='.$contact.'&msgtxt='.$messageText.'&state=4');
				curl_setopt($ch, CURLOPT_POST, 1);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				$result = curl_exec($ch);
				
				
						if($type=="Doctor" || $type=="MD")
						{
							$doctype="doctor";
						}
						else
						{
							$doctype="nutritionist";
						}
						
						$string="";
						$to = $email;
						$strSubject="Your Registration From Alivemeter";
						
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
						$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #99cc00; font-weight: bold; line-height: 20px; margin: 0px;'>Dear ".$doctor_name.",</p>";
						$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; padding-top: 10px; margin: 0px;'>We welcome you to Alivemeter family. It is YOUR platform and we would want to hear from you on how to better the services for further engagement and better interaction between patient and ".$doctype.". </p>";
						$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; padding-top: 10px; margin: 0px;'>Your login details.</p>"; 
						$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; padding-top: 10px; margin: 0px;'>Username : ".$email."</p>"; 
						$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; padding-top: 10px; margin: 0px;'>Password :  ".$password."</p>";                         
						$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; padding-top: 10px; margin: 0px;'>Login process: </p>";
						$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; padding-top: 10px; margin: 0px;'> - Login to <a href='https://www.alivemeter.com' target='_blank'>www.alivemeter.com</a> which will open the homepage, on the footnote which is the bottom of the webpage  </p>";
						$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; padding-top: 10px; margin: 0px;'> - Click <a href='http://www.alivemeter.com/page_doctor.php?dir=".strtolower($type)."/login' target='_blank'>http://www.alivemeter.com/page_doctor.php?dir=".strtolower($type)."/login</a> link which will open the login detail page and enter the details as provided above.</p>";
						$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; padding-top: 10px; margin: 0px;'> - Please change password from the top right corner dropdown.</p>";
						$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; padding-top: 10px; margin: 0px;'> Please feel free to directly write or call me:</p>";
						$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; padding-top: 10px; margin: 0px;'> Email: tanushri@alivemeter.com | Mob: 9870048181</p>";
						
						$string=$string."</td>";
						$string=$string."</tr>";
						$string=$string."<tr>";
						$string=$string."<td style='padding: 5px 11px 0px 11px; text-align: justify; margin: 0px;'>";
						$string=$string."<table width='100%' border='0' cellspacing='0' cellpadding='0'>";
						$string=$string."<tr>";
						$string=$string."</tr>";
						$string=$string."</table>";
						$string=$string."</td>";
						$string=$string."</tr>";
						$string=$string."<tr>";
						$string=$string."<td style='padding: 25px 11px 25px 11px; text-align: left; margin: 0px; font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; vertical-align: top;'>";
						$string=$string."<span style='color: #666666; font-weight: bold; font-size: 13px;'> - Founder Alivemeter</span><br />";
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
						
			 /// echo $strBody;
		
						SendEmail("Alivemeter Team", "support@alivemeter.com", $to, $strSubject, $strBody);

					
					
				}
				
				
				return $f_receive_message."###".$doctor_id;
	    }
		
		function f_Add_Hospital_Master($data_values,$id)
	    {
				$f_receive_message="";

				$hospital_id=$id;
				
				$user_id=$data_values["user_id"];
				
				$hospital_name=$data_values["hospital_name"];
				$hospital_address=$data_values["hospital_address"];
				$hospital_address1=$data_values["hospital_address1"];
				$hospital_address2=$data_values["hospital_address2"];
				$hospital_address3=$data_values["hospital_address3"];
				$contact=$data_values["contact"];
				$email=$data_values["email"];
				$contact_person=$data_values["contact_person"];
				$contact_person_contact=$data_values["contact_person_contact"];
				$contact_person_mail=$data_values["contact_person_mail"];
				
				
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				
				$created_date=date('d-m-Y H:i:s');				
				$updated_date=date('d-m-Y H:i:s');


				$data = array(
					'user_id' => $user_id,
					'hospital_name' => $hospital_name,
					'hospital_address' => $hospital_address,
					'hospital_address1' => $hospital_address1,
					'hospital_address2' => $hospital_address2,
					'hospital_address3' => $hospital_address3,
					'contact' => $contact,
					'email' => $email,
					'contact_person' => $contact_person,
					'contact_person_contact' => $contact_person_contact,
					'contact_person_mail' => $contact_person_mail,
					'created_date' => $created_date,
					'updated_date' => $updated_date,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					
				);
				
				
			
				if($hospital_id == "" || $hospital_id==0) {
					$hospital_id =$this->db->insert_array(Hospital_Master, $data);
					$data = array(
						'created_by' => $user_id,
						'created_date' => $created_date,
						'user_id' => $user_id,
					);
					$rows =$this->db->update_array(Hospital_Master, $data, "hospital_id = $hospital_id");
					
					
					
					$f_receive_message="insert record";
					if (!$user_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Hospital_Master, $data, "hospital_id = $hospital_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				return $f_receive_message."###".$hospital_id;
	    }
		
		
		
		function f_Add_Common_Doctor($data_values,$id)
	    {
				$f_receive_message="";

				$doctor_id=$id;
				
				$user_id=$data_values["user_id"];
				$user_type=$data_values["user_type"];
				
				$doctor_name=$data_values["doctor_name"];
				$hospital_name=$data_values["hospital_name"];
				$specialization=$data_values["specialization"];
				$contact=$data_values["contact"];
				$email=$data_values["email"];
				
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				
				$created_date=date('d-m-Y H:i:s');				
				$updated_date=date('d-m-Y H:i:s');

				$parent_id=GetValue("select parent_id as col from tbl_users where user_id=".$user_id, "col");
				if($parent_id==0)
				{
					$parent_id=$user_id;
				}
				$password=rand();
				
				$data = array(
					'doctor_name' => $doctor_name,
					'parent_id' => $parent_id,
					'user_id' => $user_id,
					'user_type' => $user_type,
					'hospital_name' => $hospital_name,
					'specialization' => $specialization,
					'contact' => $contact,
					'type' =>'Doctor',
					'email' => $email,
					'password' => $password,
					'created_date' => $created_date,
					'updated_date' => $updated_date,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					
				);
				
				
			
				if($doctor_id == "" || $doctor_id==0) {
					$doctor_id =$this->db->insert_array(Doctor, $data);
					$data = array(
						'created_by' => $user_id,
						'created_date' => $created_date,
						
						
					);
					$rows =$this->db->update_array(Doctor, $data, "doctor_id = $doctor_id");
					
					
					
					$f_receive_message="insert record";
					if (!$user_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Doctor, $data, "doctor_id = $doctor_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				return $f_receive_message."###".$doctor_id;
	    }	
		
		
		function f_Add_Daily_Sugar_Profile_Insert($data_values,$id)
	    {
				$f_receive_message="";

				$sugar_profile_id=$id;
				$user_id=$data_values["user_id"];
				
				$fasting_blood_sugar_date=$data_values["fasting_blood_sugar_date"];
				$fasting_blood_sugar_day=$data_values["fasting_blood_sugar_day"];
				$fasting_blood_sugar_month=$data_values["fasting_blood_sugar_month"];
				$fasting_blood_sugar_year=$data_values["fasting_blood_sugar_year"];
				$fasting_blood_sugar_result=$data_values["fasting_blood_sugar_result"];
				
				$post_parandial_date=$data_values["post_parandial_date"];
				$post_parandial_day=$data_values["post_parandial_day"];
				$post_parandial_month=$data_values["post_parandial_month"];
				$post_parandial_year=$data_values["post_parandial_year"];
				$post_parandial_result=$data_values["post_parandial_result"];
							
				$urine_blood_date=$data_values["urine_blood_date"];
				$urine_blood_day=$data_values["urine_blood_day"];
				$urine_blood_month=$data_values["urine_blood_month"];
				$urine_blood_year=$data_values["urine_blood_year"];
				$urine_blood_result=$data_values["urine_blood_result"];
				
				$random_blood_sugar_date=$data_values["random_blood_sugar_date"];
				$random_blood_sugar_day=$data_values["random_blood_sugar_day"];
				$random_blood_sugar_month=$data_values["random_blood_sugar_month"];
				$random_blood_sugar_year=$data_values["random_blood_sugar_year"];
				$random_blood_sugar_result=$data_values["random_blood_sugar_result"];								
				
				
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				
				$created_date=date('d-m-Y H:i:s');				
				$updated_date=date('d-m-Y H:i:s');


				$data = array(
					'user_id' => $user_id,
					'fasting_blood_sugar_date'=>$fasting_blood_sugar_date,
					'fasting_blood_sugar_day'=>$fasting_blood_sugar_day,
					'fasting_blood_sugar_month'=>$fasting_blood_sugar_month,
					'fasting_blood_sugar_year'=>$fasting_blood_sugar_year,
					'fasting_blood_sugar_result'=>$fasting_blood_sugar_result,
					'post_parandial_date'=>$post_parandial_date,
					'post_parandial_day'=>$post_parandial_day,
					'post_parandial_month'=>$post_parandial_month,
					'post_parandial_year'=>$post_parandial_year,
					'post_parandial_result'=>$post_parandial_result,
					'urine_blood_date'=>$urine_blood_date,
					'urine_blood_day'=>$urine_blood_day,
					'urine_blood_month'=>$urine_blood_month,
					'urine_blood_year'=>$urine_blood_year,
					'urine_blood_result'=>$urine_blood_result,
					'random_blood_sugar_date'=>$random_blood_sugar_date,
					'random_blood_sugar_day'=>$random_blood_sugar_day,
					'random_blood_sugar_month'=>$random_blood_sugar_month,
					'random_blood_sugar_year'=>$random_blood_sugar_year,
					'random_blood_sugar_result'=>$random_blood_sugar_result,
					'created_by' => $user_id,
					'created_date' => $created_date,
					'updated_date' => $updated_date,
					'updated_by'=>$user_id,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					
				);
				
				
			
				if($sugar_profile_id == "" || $sugar_profile_id==0) {
					
					$query="delete from tbl_sugar_profile where user_id=".$user_id." and fasting_blood_sugar_date='".$fasting_blood_sugar_date."'";
					$result = mysql_query($query);
					
					if($fasting_blood_sugar_result!="" || $post_parandial_result!="" || $urine_blood_result!=""  || $random_blood_sugar_result!=""){
					$sugar_profile_id =$this->db->insert_array(Sugar_Profile, $data);
						$data = array(
							'created_by' => $user_id,
							'created_date' => $created_date,
							'user_id' => $user_id,
						);
						
						
						$rows =$this->db->update_array(Sugar_Profile, $data, "sugar_profile_id = $sugar_profile_id");
						
						
						$data1 = array(
							'user_id'=> $user_id,
							'type'=>'Sugar_Profile',
							'reward_points'=>1,
							'common_id'=>$sugar_profile_id,
							'created_date'=>$created_date,
							'isactive'=>1,
							'isdeleted'=>0,
							
						);
						$trp_id =$this->db->insert_array(Total_Reward_Points, $data1);	
						

						$f_receive_message="insert record";
						if (!$user_id) { 
							$this->db->print_last_error(false);
							$f_receive_message="Error";
						}
					}
				} else {
					$rows =$this->db->update_array(Sugar_Profile, $data, "sugar_profile_id = $sugar_profile_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				 return $f_receive_message."###".$sugar_profile_id;
	    }
			
			
	   function f_Add_Daily_PB_Sugar_Profile_Insert($data_values,$id)
		{
				$f_receive_message="";

				$sugar_profile_id=$id;
				$user_id=$data_values["user_id"];
				
				
				$post_parandial_date=$data_values["post_parandial_date"];
				$post_parandial_day=$data_values["post_parandial_day"];
				$post_parandial_month=$data_values["post_parandial_month"];
				$post_parandial_year=$data_values["post_parandial_year"];
				$post_parandial_result=$data_values["post_parandial_result"];
				
				
				/*$urine_blood_date=$data_values["urine_blood_date"];
				$urine_blood_day=$data_values["urine_blood_day"];
				$urine_blood_month=$data_values["urine_blood_month"];
				$urine_blood_year=$data_values["urine_blood_year"];
				$urine_blood_result=$data_values["urine_blood_result"];
				$urine_blood_range=$data_values["urine_blood_range"];
				$urine_blood_range1=$data_values["urine_blood_range1"];
				$urine_blood_unit=$data_values["urine_blood_unit"];
				
				
				$random_blood_sugar_date=$data_values["random_blood_sugar_date"];
				$random_blood_sugar_day=$data_values["random_blood_sugar_day"];
				$random_blood_sugar_month=$data_values["random_blood_sugar_month"];
				$random_blood_sugar_year=$data_values["random_blood_sugar_year"];
				$random_blood_sugar_result=$data_values["random_blood_sugar_result"];
				$random_blood_sugar_range=$data_values["random_blood_sugar_range"];
				$random_blood_sugar_range1=$data_values["random_blood_sugar_range1"];
				$random_blood_sugar_unit=$data_values["random_blood_sugar_unit"];*/
				
				
				
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				
				$created_date=date('d-m-Y H:i:s');				
				$updated_date=date('d-m-Y H:i:s');


				$data = array(
					'user_id' => $user_id,
					'post_parandial_date'=>$post_parandial_date,
					'post_parandial_day'=>$post_parandial_day,
					'post_parandial_month'=>$post_parandial_month,
					'post_parandial_year'=>$post_parandial_year,
					'post_parandial_result'=>$post_parandial_result,
					/*'urine_blood_date'=>$urine_blood_date,
					'urine_blood_day'=>$urine_blood_day,
					'urine_blood_month'=>$urine_blood_month,
					'urine_blood_year'=>$urine_blood_year,
					'urine_blood_result'=>$urine_blood_result,
					'urine_blood_range'=>$urine_blood_range,
					'urine_blood_range1'=>$urine_blood_range1,
					'urine_blood_unit'=>$urine_blood_unit,
					'random_blood_sugar_date'=>$random_blood_sugar_date,
					'random_blood_sugar_day'=>$random_blood_sugar_day,
					'random_blood_sugar_month'=>$random_blood_sugar_month,
					'random_blood_sugar_year'=>$random_blood_sugar_year,
					'random_blood_sugar_result'=>$random_blood_sugar_result,
					'random_blood_sugar_range'=>$random_blood_sugar_range,
					'random_blood_sugar_range1'=>$random_blood_sugar_range1,
					'random_blood_sugar_unit'=>$random_blood_sugar_unit,	*/				
					'created_by' => $user_id,
					'created_date' => $created_date,
					'updated_date' => $updated_date,
					'updated_by'=>$user_id,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					
				);
				
				
			
				if($sugar_profile_id == "" || $sugar_profile_id==0) {
					$sugar_profile_id =$this->db->insert_array(Sugar_Profile, $data);
					$data = array(
						'created_by' => $user_id,
						'created_date' => $created_date,
						'user_id' => $user_id,
					);
					
					$rows =$this->db->update_array(Sugar_Profile, $data, "sugar_profile_id = $sugar_profile_id");
					
					
					$data1 = array(
						'user_id'=> $user_id,
						'type'=>'Sugar_Profile',
						'reward_points'=>1,
						'common_id'=>$sugar_profile_id,
						'created_date'=>$created_date,
						'isactive'=>1,
						'isdeleted'=>0,
						
					);
					$trp_id =$this->db->insert_array(Total_Reward_Points, $data1);	
					

					$f_receive_message="insert record";
					if (!$user_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Sugar_Profile, $data, "sugar_profile_id = $sugar_profile_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				 return $f_receive_message."###".$sugar_profile_id;
	    }
		
		
		function f_Add_Patient($data_values,$id)
	    {
				$f_receive_message="";

				$accept_id=$id;
				
				$patient_id=$data_values["patient_id"];
				$doctor_id=$data_values["doctor_id"];
				$compose_id=$data_values["compose_id"];
				$type=$data_values["type"];
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				$isaccepted=$data_values["isaccepted"];
				
				$accepted_date=date('d-m-Y H:i:s');				
				
				$data = array(
					'doctor_id' => $doctor_id,
					'patient_id' => $patient_id,
					'compose_id' => $compose_id,
					'type' => $type,
					'isactive'=>1,
					'isdeleted' => 0,
					'accepted_date' => $accepted_date,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					'isaccepted'=> $isaccepted,
					
				);
				
				if($accept_id == "" || $accept_id==0) {
					$accept_id =$this->db->insert_array(Patients, $data);
					$data = array(
						'accepted_date' => $accepted_date,
						
					);
					$rows =$this->db->update_array(Patients, $data, "accept_id = $accept_id");
					
					
					
					$f_receive_message="insert record";
					if (!$accept_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Patients, $data, "accept_id = $accept_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				return $f_receive_message."###".$accept_id;
	    }
		
		
		
		function f_Add_Measurment($data_values,$id)
	    {
				$f_receive_message="";

				$cadetid=$id;
				
				$user_id=$data_values["user_id"];
				
				$weight_date=$data_values["weight_date"];
				$waist_date=$data_values["waist_date"];
				$arms_date=$data_values["arms_date"];
				$hips_date=$data_values["hips_date"];
				
				$curr_wgt=$data_values["curr_wgt"];
				$current_waist=$data_values["current_waist"];
				$current_hips=$data_values["current_hips"];
				$current_arm=$data_values["current_arm"];
				
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				
				$created_date=date('d-m-Y H:i:s');				
				$updated_date=date('d-m-Y H:i:s');


				$data = array(
					'curr_wgt' => $curr_wgt,
					'current_waist' => $current_waist,
					'current_hips' => $current_hips,
					'current_arm' => $current_arm,
					'weight_date' => $weight_date,
					'waist_date' => $waist_date,
					'arms_date' => $arms_date,
					'hips_date' => $hips_date,
					'created_date' => $created_date,
					'updated_date' => $updated_date,
					'user_id' => $user_id,
					'parent_id' => 0,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					'ismain' => 0,
					
				);
				
				
				
				
				if($cadetid == "" || $cadetid==0) {
					$query="delete from tbl_calorie_det where user_id=".$user_id." and weight_date='".$weight_date."'";
					$result = mysql_query($query);
					
					if($curr_wgt!="" || $current_waist!="" || $current_hips!=""  || $current_arm!=""){

						$cadetid =$this->db->insert_array(Calorie_Det, $data);
						$data = array(
							'created_by' => $user_id,
							'created_date' => $created_date,
							'user_id' => $user_id,
						);
						$rows =$this->db->update_array(Calorie_Det, $data, "id = $cadetid");
						
						
						
						$f_receive_message="insert record";
						if (!$user_id) { 
							$this->db->print_last_error(false);
							$f_receive_message="Error";
						} 
					}
				} else {
					$rows =$this->db->update_array(Calorie_Det, $data, "id = $cadetid");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				return $f_receive_message."###".$cadetid;
	    }
		
		
		
		function f_Add_Water($data_values,$id)
	    {
				$f_receive_message="";

				$waterid=$id;
				
				$user_id=$data_values["user_id"];
				
				$date=$data_values["date"];
			
				$no_of_glass=$data_values["no_of_glass"];
				
				$data = array(
						'user_id' => $user_id,
						'no_of_glass' => $no_of_glass,
						'type' => 'Water',
						'date' => $date,
					
				);
				
				

				if($waterid == "" || $waterid==0) {

					$query="delete from ".Water." where user_id=".$user_id." and date='".$date."'";
					$result = mysql_query($query);
					if($no_of_glass!="")
					{
						$waterid =$this->db->insert_array(Water, $data);
					
					
						$f_receive_message="insert record";
						if (!$user_id) { 
							$this->db->print_last_error(false);
							$f_receive_message="Error";
						} 
					}
				} else {
					$rows =$this->db->update_array(Water, $data, "id = $waterid");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				return $f_receive_message."###".$waterid;
	    }
		
		
		
		function f_Add_Doctor_Comment($data_values,$id)
	    {
				$f_receive_message="";

				$comment_id=$id;
				
				$patient_id=$data_values["patient_id"];
				$doctor_id=$data_values["doctor_id"];
				$doctor_advice=$data_values["doctor_advice"];
				$doctor_internal_advice=$data_values["doctor_internal_advice"];
				$type=$data_values["type"];
				$md_id=$data_values["md_id"];
				$compose_id=$data_values["compose_id"];
				$accept_id=$data_values["accept_id"];
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				$folderid=$data_values["folderid"];
				
				$doc_name=$data_values["doc_name"];
				$specialization=$data_values["specialization"];
				$hosp_name=$data_values["hosp_name"];
				$licenceno=$data_values["licenceno"];
				
				$created_date=date('d-m-Y H:i:s');				
				
				$data = array(
					'patient_id' => $patient_id,
					'doctor_id' => $doctor_id,
					'doctor_advice' => $doctor_advice,
					'doctor_internal_advice' => $doctor_internal_advice,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					'created_date' => $created_date,
					'md_id' => $md_id,
					'compose_id' => $compose_id,
					'accept_id' => $accept_id,
					'type' => $type,
					'doc_name' => $doc_name,
					'specialization' => $specialization,
					'hosp_name' => $hosp_name,
					'licenceno' => $licenceno,
					'folderid' => $folderid,
				);
				
				
			
				if($comment_id == "" || $comment_id==0) {
					$comment_id =$this->db->insert_array(Doc_Comment, $data);
					
					
					
					$rows =$this->db->update_array(Doc_Comment, $data, "comment_id = $comment_id");
					
					if($md_id!="" || $md_id!="0")
					{
						$md_name=GetValue("select doctor_name as col from tbl_doctor where doctor_id=".$md_id." and type='MD'","col");
						$md_mail=GetValue("select email as col from tbl_doctor where doctor_id=".$md_id." and type='MD'","col");
						$md_contact=GetValue("select contact as col from tbl_doctor where doctor_id=".$md_id." and type='MD'","col");
						
						$doc_name=GetValue("select doctor_name as col from tbl_doctor where doctor_id=".$doctor_id." and type='Doctor'","col");
						
						
						 $messageText="Dear ".$md_name.", You have received an email query from Alivemeter user. Please look into the query. The Alivemeter Team.";
						$time=date('h:i:s');
						
						
						
						/*$url = "http://59.162.167.52/api/MessageCompose";
						
						$ch = curl_init();
						curl_setopt($ch, CURLOPT_URL, $url);
						curl_setopt($ch, CURLOPT_POSTFIELDS, 'admin=renish.paul@bloomtel.in&user=pinaki@alivemeter.com:ALIVEM&senderID=ALIVEM&receipientno='.$md_contact.'&msgtxt='.$messageText.'&state=4');
						curl_setopt($ch, CURLOPT_POST, 1);
						curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
						curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
						$result = curl_exec($ch);*/
						
						
											
						$string="";
						$to = $md_mail;
						$strSubject="Alivemeter � You have a mail";
						
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
						$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #99cc00; font-weight: bold; line-height: 20px; margin: 0px;'>Dear ".$md_name.",</p>";
						$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; padding-top: 10px; margin: 0px;'>You have received an email query from Alivemeter user. Please look into the query.</p>";                         
						
						$string=$string."</td>";
						$string=$string."</tr>";
						$string=$string."<tr>";
						$string=$string."<td style='padding: 5px 11px 0px 11px; text-align: justify; margin: 0px;'>";
						$string=$string."<table width='100%' border='0' cellspacing='0' cellpadding='0'>";
						$string=$string."<tr>";
						$string=$string."</tr>";
						$string=$string."</table>";
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
						
			 /// echo $strBody;
		
					///  SendEmail("Alivemeter Team", "support@alivemeter.com", $to, $strSubject, $strBody);
					}
					
					
					$f_receive_message="insert record";
					if (!$comment_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Doc_Comment, $data, "comment_id = $comment_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				
				
				
				
				
				
				return $f_receive_message."###".$comment_id;
	    }
		
		
		function f_Add_MD_Comment($data_values,$id)
	    {
				$f_receive_message="";

				$comment_id=$id;
				
				$rejected=$data_values["rejected"];
				$patient_id=$data_values["patient_id"];
				$ref_doctor_id=$data_values["ref_doctor_id"];
				$md_advice=$data_values["md_advice"];
				$md_internal_advice=$data_values["md_internal_advice"];
				$type=$data_values["type"];
				$md_id=$data_values["md_id"];
				$compose_id=$data_values["compose_id"];
				$accept_id=$data_values["accept_id"];
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				$video_query=$data_values["video_query"];
				
				$app_date=$data_values["app_date"];
				$app_day=$data_values["app_day"];
				$app_month=$data_values["app_month"];
				$app_year=$data_values["app_year"];
				$time_from=$data_values["time_from"];
				$time_to=$data_values["time_to"];
				$time_slot=$data_values["time_slot"];
				
				$hospital_id=$data_values["hospital_id"];
				$hospital_name=$data_values["hospital_name"];
				$doc_comment_id=$data_values["doc_comment_id"];
				$folderid=$data_values["folderid"];
				
				$created_date=date('d-m-Y H:i:s');				
				
				$data = array(
					'patient_id' => $patient_id,
					'ref_doctor_id' => $ref_doctor_id,
					'md_advice' => $md_advice,
					'md_internal_advice' => $md_internal_advice,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					'created_date' => $created_date,
					'md_id' => $md_id,
					'compose_id' => $compose_id,
					'accept_id' => $accept_id,
					'type' => $type,
					'rejected' => $rejected,
					'app_date' => $app_date,
					'app_day' => $app_day,
					'app_month' => $app_month,
					'app_year' => $app_year,
					'time_from' => $time_from,
					'time_to' => $time_to,
					'time_slot' => $time_slot,
					'doc_comment_id' => $doc_comment_id,
					'folderid' => $folderid,
				);
				
				
			
				if($comment_id == "" || $comment_id==0) {
					$comment_id =$this->db->insert_array(MD_Comment, $data);
					$rows =$this->db->update_array(MD_Comment, $data, "comment_id = $comment_id");
					if($rejected=="0" && $video_query=="1")
					{
						$data = array(	
							'created_type' => 'MD',
							'hospital_id' => $hospital_id,
							'compose_id' => $compose_id,
							'accept_id' => $accept_id,
							'patient_id' => $patient_id,
							'md_id' => $md_id,
							'created_by' => $md_id,
							'updated_by' => $md_id,
							'app_name' => $md_advice,
							'app_date' => $app_date,
							'app_day' => $app_day,
							'app_month' => $app_month,
							'app_year' => $app_year,
							'time_from' => $time_from,
							'time_to' => $time_to,
							'time_slot' => $time_slot,
							'other_app' => 'Video_Query',
							'notes' => $md_advice,
							'other_hospital_name' => $hospital_name,
							'isdeleted' => $isdeleted,
						);	
						
						$comment_id =$this->db->insert_array(Md_Appoint, $data);
					}
					
					$f_receive_message="insert record";
					if (!$comment_id) { 
						$this->db->print_last_error(false);
					$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(MD_Comment, $data, "comment_id = $comment_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				return $f_receive_message."###".$comment_id;
	    }
		
		function f_Add_Diet_Plan($data_values,$id)
	    {
				$f_receive_message="";

				$diet_plan_id=$id;
				
				$patient_id=$data_values["patient_id"];
				$nutritionist_id=$data_values["nutritionist_id"];
				$selected_date=$data_values["selected_date"];
				$note=$data_values["note"];
				$message=$data_values["message"];
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				
				$created_date=date('d-m-Y');				
				
				$data = array(
					'patient_id' => $patient_id,
					'nutritionist_id' => $nutritionist_id,
					'selected_date' => $selected_date,
					'note' => $note,
					'message' => $message,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					'created_date' => $created_date,
				);
				
				
			
				if($diet_plan_id == "" || $diet_plan_id==0) {
					$diet_plan_id =$this->db->insert_array(Diet_Plan, $data);
					$rows =$this->db->update_array(Diet_Plan, $data, "id = $diet_plan_id");
					
					
					
					$f_receive_message="insert record";
					if (!$diet_plan_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Diet_Plan, $data, "id = $diet_plan_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				
				$data1 = array(
					'diet_plan_id' => $diet_plan_id,
					
				);
				
				$rows =$this->db->update_array(Diet_Food, $data1, "selected_date='".date('Y-m-d',strtotime($selected_date))."' and patient_id=".$patient_id." and nutritionist_id=".$nutritionist_id);
				
				
				$data2 = array(
					'diet_plan_id' => $diet_plan_id,
					
				);
				
				$rows =$this->db->update_array(Diet_Exercise, $data2, "selected_date='".date('Y-m-d',strtotime($selected_date))."' and patient_id=".$patient_id." and nutritionist_id=".$nutritionist_id);
				
				$user_name=GetValue("select name as col from tbl_users where user_id=".$patient_id, "col");
				$user_email=GetValue("select user_email as col from tbl_users where user_id=".$patient_id, "col");
				$doctor_name=GetValue("select doctor_name as col from tbl_doctor where user_id=".$doctor_id, "col");
				$doctor_email=GetValue("select email as col from tbl_doctor where user_id=".$doctor_id, "col");

				
				//$this->Send_Diet_Plan($diet_plan_id,$selected_date,$message,$user_email,$user_name);
				//$this->Send_Diet_Plan($diet_plan_id,$selected_date,$message,$doctor_email,$doctor_name);

				return $f_receive_message."###".$diet_plan_id;
	    }
			

		function Send_Diet_Plan($diet_plan_id,$selected_date,$message,$user_email,$user_name)
	   {
				
				$string="";

						
						$to = $user_email;
						$strSubject="Diet Plan Deatils of  ".$selected_date." ".$user_email." ".$user_name;
						
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
						$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #99cc00; font-weight: bold; line-height: 20px; margin: 0px;'>Hello ".$user_name.",</p>";
						$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; padding-top: 10px; margin: 0px;'>Please check diet plan details.</p>";                         
						
						$string=$string."</td>";
						$string=$string."</tr>";



 $string=$string."<tr><td style='padding:10px;'><div  style='border-bottom: solid 1px #cccccc; font-size: 14px; text-align: left;width:100%;float:left;color:#656565'> <span style='font-weight: bold;'>Sent on :</span> ".date('d-M-Y',strtotime($selected_date))."</div>
              <div  style='color:#656565;border-bottom: solid 1px #cccccc; font-size: 14px; text-align: left; padding-bottom: 5px; padding-top:10px;;width:100%;float:left;'>
                <div style='width:100%;float:left;'>
                  <div style='color:#7ba400;font-weight: bold; font-size: 14px; padding-bottom: 15px;width:100%;float:left;'>Food</div>
                  <div style='width:100%;float:left;'>
                    <div  style='color:#656565;font-weight: bold; width:150px;float:left;'>Time</div>
                    <div  style='color:#656565;font-weight: bold; width:180px;float:left;'>Food</div>
                    <div   style='color:#656565;font-weight: bold;float:left;width:150px;'>Portion</div>
                    <div   style='color:#656565;font-weight: bold;float:left;width:100px;'>Quantity</div>
                    <div   style='color:#656565;font-weight: bold;float:left;width:100px;'>Calories</div>
                  </div>";

						$query = 'SELECT * FROM  '.Diet_Food.' where isactive=1 and isdeleted=0 and diet_plan_id='.$diet_plan_id.' order by type,time';
						 
							$result = mysql_query($query);							
							if($result != '') {	
								$rowcount  = mysql_num_rows($result);
								if($rowcount > 0) {
									while($row = mysql_fetch_assoc($result)) {
										extract($row);
										$time=$row['time'];
										$qty=$row['qty'];
										$type=$row['type'];
										$receipe_id=$row['receipe_id'];
										$total_cal=$row['total_cal'];
										$portion=$row['portion'];
										$receipe_name=GetValue('select name as col from tbl_recipe where id='.$receipe_id, 'col');
							//Alert ($get_array['md_id']);
						 
                 $string=$string." <div style='padding-top: 15px;width:100%;float:left;'>
                    <div  style=' color:#656565;width:150px;float:left;'>
                      <div style='width:100%;float:left;'>
                        <div style='float:left; padding:0px 5px 0px 0px'>".$time." - ". $type." </div>
                      
                      </div>
                    </div>
                    <div  style='color:#656565;width:150px;float:left;'> ". $receipe_name." </div>
                    <div   style='color:#656565;width:180px;float:left;padding-left:20px;'> ". $portion." </div>
                    <div   style='color:#656565;width:100px;float:left;'> ". $qty." </div>
                    <div  style='color:#656565;width:100px;float:left;'> ". $total_cal." </div>
                  </div>";
				}}}
                  
                   $string=$string." <div  style='padding-top:25px;width:100%;float:left;'>
                    
                    <div style='color:#656565;width:600px; text-align:right;float:left;'> Total Consumed Calories : </div>
                    <div style='color:#656565;float:left;width:100px;'> ". 
						$total_day_cal=GetValue('select sum(total_cal) as col from tbl_diet_food_plan where diet_plan_id='.$diet_plan_id, 'col')." 
                        cal</div>
                  </div>
                  
                  
                </div>
              </div>
              <div style='color:#656565;border-bottom: solid 0px #cccccc; font-size: 14px; text-align: left; padding-top: 18px;width:100%;float:left;'>
                <div style='width:100%;float:left;'>
                  <div  style='color:#7ba400;font-weight: bold; font-size: 14px; padding-bottom: 15px;width:100%;float:left;'>Exercise</div>
                  <div style='width:100%;float:left;'>
                    <div  style='color:#656565;font-weight: bold; width:160px;float:left'>Time</div>
                    <div style='color:#656565;font-weight: bold; width:266px;float:left'>Exercise</div>
                    <div style='color:#656565;font-weight: bold; width:100px;float:left'>Total Mins</div>
                    <div  style='color:#656565;font-weight: bold; width:100px;float:left'>Calories</div>
                    <div  style='color:#656565;font-weight: bold; width:80px;float:left; display:none;'>Duration</div>
                  </div>";

                    
				   $total_cal_exe_1='';
						$query = 'SELECT * FROM  '.Diet_Exercise.' where isactive=1 and isdeleted=0 and diet_plan_id='.$diet_plan_id.' order by time_period';
						//echo $query;
							$result = mysql_query($query);							
							if($result != '') {	
								$rowcount  = mysql_num_rows($result);
								if($rowcount > 0) {
									while($row = mysql_fetch_assoc($result)) {
										extract($row);
										$time=$row['time'];
										$time_period=$row['time_period'];
										$duration=$row['duration'];
										$cal=$row['cal'];
										$min=$row['min'];
										if($cal=='')
										{
											$cal='0';
										}
										
										$total_cal_exe=($cal*$min);
										$exercise_id=$row['exercise_id'];
										$total_cal_exe_1=$total_cal_exe_1+$total_cal_exe;
										$exercise_name=GetValue('select name as col from tbl_exercise where id='.$exercise_id, 'col');
						
                  $string=$string."<div style='padding-top: 15px;width:100%;float:left;'>
                    <div  style='color:#656565;float:left;width:160px;'>
                      <div style='width:100%;float:left;'>
                        <div style='float:left; padding:0px 5px 0px 0px'> ". $time_period."</div>
                       
                      </div>
                    </div>
                    <div  style='color:#656565;width:250px;float:left'>  ". $exercise_name." </div>
                    <div ' style=' color:#656565;text-align: center; width:90px;float:left'>
                      <div style='width:100%;float:left;'> ". $min."</div>
                    </div>
                    <div c style='color:#656565;text-align: center; width:100px;float:left'>
                      <div style='width:100%;float:left;'> ". $total_cal_exe."</div>
                    </div>
                    <div style=' color:#656565;text-align: center; width:80px; display:none;float:left'>
                      <div style='width:100%;float:left;'> ". $duration."</div>
                    </div>
                  </div>";
				}}} 
                  $string=$string." <div style='padding-top:15px;width:100%;float:left;'>
                    
                    <div style='color:#656565;'> &nbsp; </div>
                    <div  style='color:#656565;width:610px;float:left;text-align:right;'> Total Burnt Calories : </div>
                    <div  style='color:#656565;float:left;width:100px;'> ". 
						$total_cal_exe_1." 
                        cal</div>
                  </div> 
                </div>
              </div>
               <div style='color:#656565;border:solid 0px red; text-align:left; padding:10px 0; font-weight:normal;width:100%;float:left;'>
            	<span style='color:#7ba400;'>Message :</span> ". str_replace('\\','',$message)."
            </div>";




						$string=$string."</td></tr><tr>";
						$string=$string."<td style='padding: 5px 11px 0px 11px; text-align: justify; margin: 0px;'>";
						$string=$string."<table width='100%' border='0' cellspacing='0' cellpadding='0'>";
						$string=$string."<tr>";
						$string=$string."</tr>";
						$string=$string."</table>";
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
						
					//echo $strBody;
					//exit;
					$to="madhu@jupiterindia.com";
					SendEmail("Alivemeter Team", "support@alivemeter.com", $to, $strSubject, $strBody);
	   }
			
			
		function f_Add_Clerk($data_values,$id)
	    {
				$f_receive_message="";

				$clerk_id=$id;
				
				$user_id=$data_values["user_id"];
				$user_type=$data_values["user_type"];
				
				$clerk_name=$data_values["clerk_name"];
				$hospital_name=$data_values["hospital_name"];
				$contact=$data_values["contact"];
				$email=$data_values["email"];
				
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				
				$created_date=date('d-m-Y H:i:s');				
				$updated_date=date('d-m-Y H:i:s');
					
				$password=rand();

				$data = array(
					'clerk_name' => $clerk_name,
					'type' => 'Clerk',
					'hospital_name' => $hospital_name,
					'contact' => $contact,
					'email' => $email,
					'created_date' => $created_date,
					'updated_date' => $updated_date,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					'user_id' => $user_id,
					'user_type' => $user_type,
					'password' => $password,
				);
				
				
			
				if($clerk_id == "" || $clerk_id==0) {
					$clerk_id =$this->db->insert_array(Clerk, $data);
					$data = array(
						'created_by' => $user_id,
						'created_date' => $created_date,
						
					);
					$rows =$this->db->update_array(Clerk, $data, "clerk_id = $clerk_id");
					
					
					
					$f_receive_message="insert record";
					if (!$user_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Clerk, $data, "clerk_id = $clerk_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				return $f_receive_message."###".$clerk_id;
	    }
		
		
		function f_Add_Nut_Comment($data_values,$id)
	    {
				$f_receive_message="";

				$comment_id=$id;
				
				$patient_id=$data_values["patient_id"];
				$nutritionist_id=$data_values["nutritionist_id"];
				$compose_id=$data_values["compose_id"];
				$comment=$data_values["comment"];
				$accept_id=$data_values["accept_id"];
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				$folderid=$data_values["folderid"];
				$folder_nut_id=$data_values["folder_nut_id"];
				$subject=$data_values["subject"];
				$created_date=date('d-m-Y H:i:s');				
				
				$data = array(
					'patient_id' => $patient_id,
					'nutritionist_id' => $nutritionist_id,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					'created_date' => $created_date,
					'comment' => $comment,
					'compose_id' => $compose_id,
					'accept_id' => 0,
					'type' => "Nutritionist",
					'status' => "sent",
					'folderid'=>$folderid,
					'folder_nut_id'=>$folder_nut_id,
					'subject'=>$subject,
					
				);
				
				
			
				if($comment_id == "" || $comment_id==0) {
					$comment_id =$this->db->insert_array(Nut_Comment, $data);
					$rows =$this->db->update_array(Nut_Comment, $data, "comment_id = $comment_id");
					
					
					
					$f_receive_message="insert record";
					if (!$comment_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Nut_Comment, $data, "comment_id = $comment_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				return $f_receive_message."###".$comment_id;
	    }
		
		
		
		function f_Add_Cal_Comment($data_values,$id)
	    {
				$f_receive_message="";

				$comment_id=$id;
				
				$patient_id=$data_values["patient_id"];
				$nutritionist_id=$data_values["nutritionist_id"];
				$comment=$data_values["comment"];
				
				$cons_comment=$data_values["cons_comment"];
				$physical_comment=$data_values["physical_comment"];
				$size_comment=$data_values["size_comment"];
				
				$record_date=$data_values["record_date"];
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				
				$created_date=date('d-m-Y H:i:s');				
				
				$data = array(
					'patient_id' => $patient_id,
					'nutritionist_id' => $nutritionist_id,
					'record_date' => $record_date,
					'comment' => $comment,
					'cons_comment' => $cons_comment,
					'physical_comment' => $physical_comment,
					'size_comment' => $size_comment,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					
				);
				
				
			
				if($comment_id == "" || $comment_id==0) {
					$comment_id =$this->db->insert_array(Nut_Cal_Comm, $data);
					$data = array(
						'created_date' => $created_date,
						
					);
					$rows =$this->db->update_array(Nut_Cal_Comm, $data, "comment_id = $comment_id");
					
					$f_receive_message="insert record";
					if (!$comment_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Nut_Cal_Comm, $data, "comment_id = $comment_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				return $f_receive_message."###".$comment_id;
	    }
		
		
		
		function f_Add_User_Reviews($data_values,$id)
	    {
				$f_receive_message="";

				$user_review_id=$id;
				
				$user_id=$data_values["user_id"];
				$comment=$data_values["comment"];
				
				$common_id=$data_values["common_id"];
				$common_type=$data_values["common_type"];
				$user_review_id=$data_values["user_review_id"];
				
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				$mail_id=$data_values["mail_id"];
				
				
				$created_date=date('d-m-Y H:i:s');				
				
				$data = array(
					'user_id' => $user_id,
					'common_id' => $common_id,
					'common_type' => $common_type,
					'comment' => $comment,
					'created_date' => $created_date,
					'isactive'=>$isactive,
					'isdeleted' => $isdeleted,
					'mail_id' => $mail_id,
					'approved' => 1,
				);
				
				
			
				if($user_review_id == "" || $user_review_id==0) {
					$user_review_id =$this->db->insert_array(User_Reviews, $data);
					$data = array(
						'created_date' => $created_date,
						
					);
					$rows =$this->db->update_array(User_Reviews, $data, "user_review_id = $user_review_id");
					
					$user_name=GetValue("select name as col from tbl_users where user_id=".$user_id, "col");
					
					$query_p = "SELECT * FROM tbl_doctor WHERE doctor_id=".$common_id." and isdeleted=0";
				$result_p = mysql_query($query_p);
				if ($result_p != "") {
					$rowcount_p = mysql_num_rows($result_p);
					if ($rowcount_p > 0) {	
							while($row_p = mysql_fetch_assoc($result_p)) {

						$string="";
						$to = $row_p['email'];
						$strSubject="Reviews from ".$user_name;
						
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
						$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #99cc00; font-weight: bold; line-height: 20px; margin: 0px;'>Hello ".$row_p['doctor_name'].",</p>";
						$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; padding-top: 10px; margin: 0px;'>There is new review from ".$user_name.".<br><br>Please check your alivemeter login.</p>";                         
						
						$string=$string."</td>";
						$string=$string."</tr>";
						$string=$string."<tr>";
						$string=$string."<td style='padding: 5px 11px 0px 11px; text-align: justify; margin: 0px;'>";
						$string=$string."<table width='100%' border='0' cellspacing='0' cellpadding='0'>";
						$string=$string."<tr>";
						$string=$string."</tr>";
						$string=$string."</table>";
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
						
			 /// echo $strBody;
		
						SendEmail("Alivemeter Team", "support@alivemeter.com", $to, $strSubject, $strBody);

					}}} 
					
					
					
					
					/*if($user_review_id != "" || $user_review_id!=0) {
						$query = "SELECT * FROM tbl_total_reward_points WHERE user_id=".$user_id." and type='User_Reviews'";
						$result = mysql_query($query);
						if ($result != "") {
							$rowcount = mysql_num_rows($result);
							if ($rowcount > 0) {
								return false;
							}
							else
							{
								$reward_point="5";
							}
						}
					
					
					$data1 = array(
							'user_id'=> $user_id,
							'type'=>'User_Reviews',
							'reward_points'=>$reward_point,
							'common_id'=>$mail_id,
							'created_date'=>$created_date,
							'isactive'=>1,
							'isdeleted'=>0,
							
						);
						$user_review_id =$this->db->insert_array(Total_Reward_Points, $data1);		
					}
					*/
					
					
					$f_receive_message="insert record";
					if (!$user_review_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(User_Reviews, $data, "user_review_id = $user_review_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				return $f_receive_message."###".$user_review_id;
	    }
		
		
		function f_Add_Post_Comment($data_values,$id)
	    {
				$f_receive_message="";

				$post_comment_id=$id;
				
				$user_id=$data_values["user_id"];
				$article_id=$data_values["article_id"];
				$type=$data_values["type"];
				
				$comment=$data_values["comment"];
				$isactive=$data_values["isactive"];
				$isdeleted=$data_values["isdeleted"];
				
				
				
				$created_date=date('d-m-Y H:i:s');				
				
				
				if($post_comment_id == "" || $post_comment_id==0) {
					$query = "SELECT * FROM " . Post_Comment . " WHERE user_id=".$user_id." and article_id=".$article_id;
					$result = mysql_query($query);
					if ($result != "") {
						$rowcount = mysql_num_rows($result);
						if ($rowcount > 0) {
								$reward_point="0";
						}
						else
						{
							$reward_point="5";
						}
					}
				}
				
				
				$data = array(
						'user_id' => $user_id,
						'article_id' => $article_id,
						'type' => $type,
						'comment' => $comment,
						'reward_point' => $reward_point,
						'isactive' => $isactive,
						'isdeleted' => $isdeleted,
						'approved' => 0,
					
				);
					
			
				if($post_comment_id == "" || $post_comment_id==0) {
					$post_comment_id =$this->db->insert_array(Post_Comment, $data);
					$data = array(
						'created_date' => $created_date,
						
					);
					$rows =$this->db->update_array(Post_Comment, $data, "post_comment_id = $post_comment_id");
					
					
					
					$f_receive_message="insert record";
					if (!$post_comment_id) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				} else {
					$rows =$this->db->update_array(Post_Comment, $data, "post_comment_id = $post_comment_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				return $f_receive_message."###".$post_comment_id;
	    }
		
		
		
			
		function f_Add_MD_Appointment($data_values,$id)
	    {
				$f_receive_message="";

				$app_id=$id;
				
				//Alert ($app_id);
				
				$hospital_id=$data_values["hospital_id"];
				$patient_id=$data_values["patient_id"];
				$compose_id=$data_values["compose_id"];
				$accept_id=$data_values["accept_id"];
				$md_id=$data_values["md_id"];
				$created_by=$data_values["created_by"];
				$created_type=$data_values["created_type"];
				$app_name=$data_values["app_name"];
				$app_date=$data_values["app_date"];
				$app_day=$data_values["app_day"];
				$app_month=$data_values["app_month"];
				$app_year=$data_values["app_year"];
				$time_from=$data_values["time_from"];
				$time_to=$data_values["time_to"];
				$time_slot=$data_values["time_slot"];
				$other_app=$data_values["other_app"];
				$notes=$data_values["notes"];
				$other_hospital_name=$data_values["other_hospital_name"];
				$isdeleted=$data_values["isdeleted"];
				
				$doc_comment_id=$data_values["doc_comment_id"];
				$folderid=$data_values["folderid"];
				$videolink=$data_values["videolink"];
				
				$created_date=date('d-m-Y H:i:s');				
				$updated_date=date('d-m-Y H:i:s');
				
				$isactive="1";
				$isdeleted="0";
				
				
				$data = array(
					'created_type' => $created_type,
					'hospital_id' => $hospital_id,
					'md_id' => $md_id,
					'patient_id' => $patient_id,
					'compose_id' => $compose_id,
					'doc_comment_id' => $doc_comment_id,
					'folderid' => $folderid,
					'accept_id' => $accept_id,
					'created_by' => $created_by,
					'app_name' => $app_name,
					'app_date' => $app_date,
					'app_day' => $app_day,
					'app_month' => $app_month,
					'app_year' => $app_year,
					'time_from' => $time_from,
					'time_to' => $time_to,
					'time_slot' => $time_slot,
					'other_app' => $other_app,
					'notes' => $notes,
					'other_hospital_name' => $other_hospital_name,
					'isdeleted' => $isdeleted,
					'videolink' => $videolink,
				);
				
				
			
				if($app_id == "" || $app_id==0) {
					$app_id =$this->db->insert_array(Md_Appoint, $data);
					
					$data = array(
						'created_by' => $created_by,
						'updated_by' => $created_by,
						'created_type' => $created_type,
						
					);
					$rows =$this->db->update_array(Md_Appoint, $data, "app_id = $app_id");
					
					$ref_doctor_id=GetValue("select doctor_id as col from tbl_doctor_comment where md_id=".$md_id, "col");
					
					if($other_app=="Video_Query")
					{
						$data = array(
							'patient_id' => $patient_id,
							'ref_doctor_id' => $ref_doctor_id,
							'md_advice' => $app_name,
							'md_internal_advice' => $notes,
							'isactive'=>$isactive,
							'isdeleted' => $isdeleted,
							'created_date' => $created_date,
							'md_id' => $md_id,
							'type' => 'Patient',
							'rejected' => "0",
							'app_date' => $app_date,
							'app_day' => $app_day,
							'app_month' => $app_month,
							'app_year' => $app_year,
							'time_from' => $time_from,
							'time_to' => $time_to,
							'time_slot' => $time_slot,
							'compose_id' => $compose_id,
							'accept_id' => $accept_id,
							
						);
					
						$app_id =$this->db->insert_array(MD_Comment, $data);
					}
					
					
					$f_receive_message="insert record";
					if (!$created_by) { 
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
					
				} else {
					$rows =$this->db->update_array(Md_Appoint, $data, "app_id = $app_id");
					$f_receive_message="update record";
					if (!$rows) {
						$this->db->print_last_error(false);
						$f_receive_message="Error";
					} 
				}	
				
				return $f_receive_message."###".$app_id;
	    }
			
	}
	
	
	
?>