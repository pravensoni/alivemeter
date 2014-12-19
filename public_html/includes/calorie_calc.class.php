<?php
	class calorie_calc {
		var $db;
		
		function calorie_calc() {
			// class constructor.  Initializations here.
			$this->db = new db_class;
	   	}
		
		
		function convert_to_cm($feet, $inches = 0) {			
			$inches = ($feet * 12) + $inches;
			return (int) round($inches / 0.393701);
		}


		function convert_to_inches($cm) {
			$inches = round($cm * 0.393701);
			$result = array('ft' => intval($inches / 12),'in' => $inches % 12);
			return $result;
		}
		
		function get_age($birth_date){
			 return floor((time() - strtotime($birth_date))/31556926);
		 }
		function calculation_calories($data_values,$id)
	    {
			$calorie_id=$id;
			$Curr_Weight=$data_values["curr_wgt"];
			$Your_Gold=$data_values["target_goal"];
			$kg_type="loss";
			$Curr_Height_Type=$data_values["cur_height_type"];
			$Curr_Height_1=$data_values["curr_height"];
			
			$Age=$data_values["age"];
			$Gender=$data_values["gender"];
			$Activity_Level=$data_values["daily_activity"];
			$Hors_Day=$data_values["plan_week"];
			$Workout_Miunt=$data_values["plan_hour"];
			
			


		//$Age = $this->get_age($data_values["dob"]);
		


			
			//$Your_Gold="5775";
			//$Curr_Weight="65";
			//$Curr_Height_Type="FT";
			//$Curr_Height_1="5.5";
			
			$Curr_Height=$Curr_Height_1;

			if($Curr_Height_Type=="FT")
			{	
				$Curr_Height2=explode(".",$Curr_Height_1);	
				
				if(isset($Curr_Height2[0]) && isset($Curr_Height2[1]))
				{
					$Curr_Height2[1]=str_replace("0","",$Curr_Height2[1]);
				 	$Curr_Height= $this->convert_to_cm($Curr_Height2[0],$Curr_Height2[1]);
				}
				else
				{
					$Curr_Height= $this->convert_to_cm($Curr_Height2[0],0);
				}
			}


			//$Age="34";
			//$Activity_Level="1.35";	
			$Daily_Calorie="0";
			//$Gender="Male";
			$Maintaince="0";
			//$Calorie_per_day="850";
			$Net_Calories_Consumed="0";
			$Net_Calories_Consumed1="0";
			$Net_Calories_Consumed_diet="0";
			//$Hors_Day="3";
			//$Workout_Miunt="60";
			
			if($Gender=="Male")
			{
				$Daily_Calorie=((9.99*$Curr_Weight)+(6.25*$Curr_Height)-(4.92*$Age)+5);
				$Daily_Calorie=round($Daily_Calorie);
			}
			if($Gender=="Female")
			{
				$Daily_Calorie=((9.99*$Curr_Weight)+(6.25*$Curr_Height)-(4.92*$Age)-161);
				$Daily_Calorie=round($Daily_Calorie);
			}
			
			$bmr=$Daily_Calorie;

		
			if($Your_Gold=="5775")
			{
				$Calorie_per_day="850";
			}
			else if($Your_Gold=="7700")
			{
				$Calorie_per_day="1100";
			}
			else if($Your_Gold=="3850")
			{
				$Calorie_per_day="550";
			}
			else if($Your_Gold=="1925")
			{
				$Calorie_per_day="275";
			}
			

			if($Your_Gold=="57751")
			{
				$Calorie_per_day="850";
				$kg_type="gain";
			}
			else if($Your_Gold=="77001")
			{
				$Calorie_per_day="1100";
				$kg_type="gain";
			}
			else if($Your_Gold=="38501")
			{
				$Calorie_per_day="550";
				$kg_type="gain";
			}
			else if($Your_Gold=="19251")
			{
				$Calorie_per_day="275";
				$kg_type="gain";
			}
						


			if($Your_Gold=="11000")
			{
				$Calorie_per_day="0";
				$kg_type="maintain";
			}
			//echo $Daily_Calorie."<br/>";

			$Maintaince=$Daily_Calorie*$Activity_Level;
			$Maintaince=round($Maintaince);	
			

			//Alert($Maintaince);
			$Net_Calories_Consumed_Per_Day=$Maintaince;

			//Alert($Gender);
			//Alert($Curr_Weight);
			//Alert($Age);
			//Alert($Activity_Level);
			if($kg_type=="loss")
			{
					$Net_Calories_Consumed=$Maintaince-$Calorie_per_day;
			}
				else 
			{
					$Net_Calories_Consumed=$Maintaince+$Calorie_per_day;
			}

			$Net_Calories_Consumed1=$Net_Calories_Consumed;

			$acutal_deficit="0";
			$projected_weight_loss_1="0";
			$Net_Calories_Consumed_Per_Day_Act="0";
			if($Net_Calories_Consumed < 1200)
			{
				$Net_Calories_Consumed=1200;
				//$Net_Calories_Consumed1= $Maintaince-1200;

				$Net_Calories_Consumed_Per_Day_Act=$Net_Calories_Consumed_Per_Day;
				$last_word_end = strlen($Net_Calories_Consumed_Per_Day_Act) - 1;
				$last_word_end = substr($Net_Calories_Consumed_Per_Day_Act,$last_word_end, 1);
				
				if($last_word_end  > 0)
				{
					$last_word_end =10-$last_word_end;
					
					$Net_Calories_Consumed_Per_Day_Act=$Net_Calories_Consumed_Per_Day_Act+$last_word_end;
				}

				
				if($kg_type=="loss")
				{
					$Net_Calories_Consumed_diet= $Maintaince-1200;
					$acutal_deficit=$Net_Calories_Consumed_Per_Day_Act-1200;
				}
				else 
				{
					$Net_Calories_Consumed_diet= $Maintaince+1200;
					$acutal_deficit=$Net_Calories_Consumed_Per_Day_Act+1200;
				}

				
			}
			else
			{
				if($kg_type=="loss")
				{	
					$acutal_deficit=$Calorie_per_day;
				}
				else  
				{
					$acutal_deficit=$Net_Calories_Consumed_Per_Day_Act-$Calorie_per_day;

				}
			}

			//echo $Net_Calories_Consumed1."<br/>";


			$ProectWeight_Loss=($Calorie_per_day*7)/7700;

			$ProectWeight_Loss=$ProectWeight_Loss*1000;

			$ProectWeight_Loss=round($ProectWeight_Loss);


			$projected_weight_loss_1=($acutal_deficit*7)/7700;

			$projected_weight_loss_1=$projected_weight_loss_1*1000;

			$projected_weight_loss_1=round($projected_weight_loss_1);

			//echo $ProectWeight_Loss."<br/>";


			$Enter_Caloric_Godl=$Net_Calories_Consumed;$Fat="30";$Crabs="50";$Protein="20";

			$Fat_Calories=($Fat/100)*$Enter_Caloric_Godl;

			$Crab_Calories=($Crabs/100)*$Enter_Caloric_Godl;

			$Protein_Calories=($Protein/100)*$Enter_Caloric_Godl;

			$Fat_Calories=round($Fat_Calories);$Crab_Calories=round($Crab_Calories);$Protein_Calories=round($Protein_Calories);


			$Fat_Grams=$Fat_Calories/9;

			$Crab_Grams=$Crab_Calories/4;

			$Protein_Grams=$Protein_Calories/4;

			$Fat_Grams=round($Fat_Grams);$Crab_Grams=round($Crab_Grams);$Protein_Grams=round($Protein_Grams);


			$Burned_Calories=($Curr_Weight*4.63*($Hors_Day*$Workout_Miunt)/60);
			 
			///Alert ($Net_Calories_Consumed_Per_Day);
			
			 
			$data_return = array(
				'Net_Calories_Consumed_Per_Day' => $Net_Calories_Consumed_Per_Day,
				'Net_Calories_Consumed1'=>$Net_Calories_Consumed1,
				'Net_Calories_Consumed_diet'=>$Net_Calories_Consumed_diet,
				'Crab_Grams' => $Crab_Grams,
				'Fat_Grams' => $Fat_Grams,
				'Protein_Grams' => $Protein_Grams,
				'Net_Calories_Consumed' => $Net_Calories_Consumed,
				'Calorie_per_day' => $Calorie_per_day,
				'ProectWeight_Loss' => $ProectWeight_Loss,
				'Burned_Calories' => $Burned_Calories,
				'bmr'=>$bmr,
				'projected_weight_loss_1'=>$projected_weight_loss_1,
				'acutal_deficit'=>$acutal_deficit,
				'kg_type'=>$kg_type,
			);
			return $data_return;
	    }


		

	}
?>

