function RetriveReocrds_Main(pageURL,dvName,pageno)
{
	var Mn_Type="";
	 
	if (pageno=="undefined" || pageno=="" || pageno=="0")
	{
		pageno=1;
	}
	//alert (pageURL);
	if (pageURL=="Doc_Consult")
	{
		pageURL=hostname+"/retrive_files/retrive_doc_consult.inc.php?page="+pageno;
	}
	if (pageURL=="Medication")
	{
		//alert (pageURL);
		pageURL=hostname+"/retrive_files/retrive_medication.inc.php?page="+pageno;
	}
	
	if (pageURL=="Allergies")
	{
		pageURL=hostname+"/retrive_files/retrive_allergies.inc.php?page="+pageno;
	}
	
	if (pageURL=="Hospitalization")
	{
		pageURL=hostname+"/retrive_files/retrive_hospitalization.inc.php?page="+pageno;
	}
	
	if (pageURL=="Immunization")
	{
		pageURL=hostname+"/retrive_files/retrive_immunization.inc.php?page="+pageno;
	}
	
	if (pageURL=="Health_Problems")
	{
		pageURL=hostname+"/retrive_files/retrive_health_problems.inc.php?page="+pageno;
	}
	
	if (pageURL=="Family_History")
	{
		pageURL=hostname+"/retrive_files/retrive_family_history.inc.php?page="+pageno;
	}
	
	if (pageURL=="Daily_Tracking")
	{
		pageURL=hostname+"/retrive_files/retrive_daily_tracking.inc.php?page="+pageno;
	}
	
	if (pageURL=="Blood_Pressure")
	{
		pageURL=hostname+"/retrive_files/retrive_blood_pressure.inc.php?page="+pageno;
	}
	
	if (pageURL=="Sugar_Profile")
	{
		pageURL=hostname+"/retrive_files/retrive_sugar_profile.inc.php?page="+pageno;
	}
	
	if (pageURL=="Life_Style")
	{
		pageURL=hostname+"/retrive_files/retrive_life_style.inc.php?page="+pageno;
	}
	
	if (pageURL=="Lipid_Profile")
	{
		pageURL=hostname+"/retrive_files/retrive_lipid_profile.inc.php?page="+pageno;
	}
	
	if (pageURL=="uploadFile")
	{
		pageURL=hostname+"/retrive_files/retrive_uploadfile.inc.php";
	}
	
	if (pageURL=="Inbox")
	{
		pageURL=hostname+"/retrive_files/retrive_compose.inc.php";
	}
	
	if (pageURL=="Radiology")
	{
		pageURL=hostname+"/retrive_files/retrive_upload_radiology_reports.inc.php";
	}
	
	if (pageURL=="CalorieDet")
	{
		pageURL=hostname+"/retrive_files/retrive_calorie_details.inc.php";
	}
	
	if (pageURL=="Doctor")
	{	
		//alert (document.getElementById("txtType").value);
		pageURL=hostname+"/retrive_files/retrive_doctor.inc.php?type="+document.getElementById("txtType").value;
	}
	if (pageURL=="Clerk")
	{	
		//alert (pageURL);
		pageURL=hostname+"/retrive_files/retrive_clerk.inc.php";
	}
	
	if (pageURL=="HospitalMaster")
	{
		pageURL=hostname+"/retrive_files/retrive_hospital.inc.php";
	}
	
	if (pageURL=="Doctor_Comment_Ins")
	{
		//alert (document.getElementById("txtPatientID").value);
		Mn_Type="Doctor_Comment_Ins";
		pageURL=hostname+"/retrive_files/retrive_doctor_comment.inc.php?patient_id="+document.getElementById("txtPatientID").value;
	}
	if (pageURL=="MD_Comment_Ins")
	{
		//alert (document.getElementById("txtPatientID").value);
		pageURL=hostname+"/retrive_files/retrive_md_comment.inc.php?patient_id="+document.getElementById("txtPatientID").value;
	}
	
	
	if (pageURL=="Diet_Plan")
	{
		Mn_Type=pageURL;
		//alert (document.getElementById("txtPatientId").value);
		pageURL=hostname+"/retrive_files/retrive_diet_plan.inc.php?patient_id="+document.getElementById("txtPatientId").value;
		//alert (pageURL);
	}
	
	if (pageURL=="MDAppointment")
	{
		//alert (pageURL);
		pageURL=hostname+"/retrive_files/retrive_md_appointment.inc.php";
	}
	
	if (pageURL=="Post_Comment")
	{
		//alert (document.getElementById("txtArticleId").value);
		pageURL=hostname+"/retrive_files/retrive_post_comment.inc.php?cid="+document.getElementById("txtArticleId").value;
	}
	
	if (pageURL=="User_Reviews")
	{
		//alert (document.getElementById("txtArticleId").value);
		pageURL=hostname+"/retrive_files/retrive_user_reviews.inc.php?cid="+document.getElementById("txtCommonID").value+"&userid="+document.getElementById("txtUserID").value;
	}

	
	
	if (window.XMLHttpRequest)
	{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
			document.getElementById(dvName).innerHTML = xmlhttp.responseText;
			//alert ( xmlhttp.responseText);
			 if (Mn_Type=="Doctor_Comment_Ins")
			{
				
				RetriveReocrds_Main('MD_Comment_Ins',"dvMDComments");
			}
			
			if (Mn_Type=="Diet_Plan")
			{
				
				Add_Diet_Food('1');
				//Add_Diet_Exercise('1');
			}
			
			
		}
	}
	
	xmlhttp.open("GET",pageURL,true);
	xmlhttp.send();
}




function RetriveReocrds_DailyTracking(type,dvName)
{
	var pageURL=type;
	
	if (pageURL=="Blood_Pressure")
	{
		pageURL=hostname+"/retrive_files/retrive_blood_pressure.inc.php";
	}
	
	if (pageURL=="Diastolic_blood")
	{
		pageURL=hostname+"/includes/diastolic_blood_chart.inc.php";
	}
	
	if (pageURL=="Sugar_Profile")
	{
		pageURL=hostname+"/retrive_files/retrive_sugar_profile.inc.php";
	}
	
	if (pageURL=="Life_Style")
	{
		pageURL=hostname+"/retrive_files/retrive_life_style.inc.php";
	}
	
	if (pageURL=="Lipid_Profile")
	{
		pageURL=hostname+"/retrive_files/retrive_lipid_profile.inc.php";
	}
	

	if (window.XMLHttpRequest)
	{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
			document.getElementById(dvName).innerHTML = xmlhttp.responseText;
			if (type=="Blood_Pressure")
			{
				//RetriveReocrds_DailyTracking('Diastolic_blood',"tabs1a");
				RetriveReocrds_DailyTracking('Sugar_Profile',"dvSugar_Profile");
			}
			else if (type=="Diastolic_blood")
			{
				RetriveReocrds_DailyTracking('Sugar_Profile',"dvSugar_Profile");
			}
			else if (type=="Sugar_Profile")
			{
				RetriveReocrds_DailyTracking('Life_Style',"dvLife_Style");
			}
			else if (type=="Life_Style")
			{
				RetriveReocrds_DailyTracking('Lipid_Profile',"dvLipid_Profile");

			}
		}
	}
	
	xmlhttp.open("GET",pageURL,true);
	xmlhttp.send();
}

function RetriveReocrds(type,dvName)
{
	var pageURL=type;
	if (pageURL=="Doc_Consult")
	{
		pageURL=hostname+"/retrive_files/retrive_doc_consult.inc.php";
	}
	if (pageURL=="Post_Comment")
	{
		//alert (document.getElementById("txtArticleId").value);
		pageURL=hostname+"/retrive_files/retrive_post_comment.inc.php?cid="+document.getElementById("txtArticleId").value;
	}
	
	if (pageURL=="Medication")
	{
		pageURL=hostname+"/retrive_files/retrive_medication.inc.php";
	}
	
	if (pageURL=="Allergies")
	{
		pageURL=hostname+"/retrive_files/retrive_allergies.inc.php";
	}
	
	if (pageURL=="Hospitalization")
	{
		pageURL=hostname+"/retrive_files/retrive_hospitalization.inc.php";
	}
	
	if (pageURL=="Immunization")
	{
		pageURL=hostname+"/retrive_files/retrive_immunization.inc.php";
	}
	
	if (pageURL=="Health_Problems")
	{
		pageURL=hostname+"/retrive_files/retrive_health_problems.inc.php";
	}
	
	if (pageURL=="Family_History")
	{
		pageURL=hostname+"/retrive_files/retrive_family_history.inc.php";
	}
	
	
	if (pageURL=="Blood_Pressure")
	{
		pageURL=hostname+"/retrive_files/retrive_blood_pressure.inc.php";
	}
	
	if (pageURL=="Sugar_Profile")
	{
		pageURL=hostname+"/retrive_files/retrive_sugar_profile.inc.php";
	}
	
	if (pageURL=="Life_Style")
	{
		pageURL=hostname+"/retrive_files/retrive_life_style.inc.php";
	}
	
	if (pageURL=="Lipid_Profile")
	{
		pageURL=hostname+"/retrive_files/retrive_lipid_profile.inc.php";
	}
	
	if (pageURL=="Inbox")
	{
		pageURL=hostname+"/retrive_files/retrive_compose.inc.php";
	}
	
	if (pageURL=="Radiology")
	{
		pageURL=hostname+"/retrive_files/retrive_upload_radiology_reports.inc.php";
	}
	
	if (pageURL=="CalorieDet")
	{
		pageURL=hostname+"/retrive_files/retrive_calorie_details.inc.php";
	}
	
	if (pageURL=="Doctor")
	{	
		//alert (document.getElementById("txtType").value);
		pageURL=hostname+"/retrive_files/retrive_doctor.inc.php?type="+document.getElementById("txtType").value;
	}
	
	if (pageURL=="HospitalMaster")
	{
		pageURL=hostname+"/retrive_files/retrive_hospital.inc.php";
	}
	
	if (pageURL=="Clerk")
	{
		pageURL=hostname+"/retrive_files/retrive_clerk.inc.php";
	}
	
	
	if (pageURL=="MDAppointment")
	{
		//alert (pageURL);
		pageURL=hostname+"/retrive_files/retrive_md_appointment.inc.php";
	}
	
	
	if (pageURL=="User_Reviews")
	{
		//alert (document.getElementById("txtArticleId").value);
		pageURL=hostname+"/retrive_files/retrive_user_reviews.inc.php?cid="+document.getElementById("txtCommonID").value+"&userid="+document.getElementById("txtUserID").value;
	}
	
	
	if (window.XMLHttpRequest)
	{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
			document.getElementById(dvName).innerHTML = xmlhttp.responseText;
			//alert (type);
			if (type=="Doc_Consult")
			{
				RetriveReocrds('Medication',"dvMedication");
			}
			else if (type=="Medication")
			{
				RetriveReocrds('Allergies',"dvAllergies");
			}
			else if (type=="Allergies")
			{
				RetriveReocrds('Hospitalization',"dvHospitalization");
			}
			else if (type=="Hospitalization")
			{
				RetriveReocrds('Immunization',"dvImmunization");
			}
			else if (type=="Immunization")
			{
				RetriveReocrds('Health_Problems',"dvHealth_Problems");
			}
			else if (type=="Health_Problems")
			{
				RetriveReocrds('Family_History',"dvFamily_History");
			}
			else if (type=="Family_History")
			{
				RetriveReocrds('Blood_Pressure',"dvBlood_Pressure");
			}
			else if (type=="Blood_Pressure")
			{
				RetriveReocrds('Sugar_Profile',"dvSugar_Profile");
			}
			else if (type=="Sugar_Profile")
			{
				RetriveReocrds('Life_Style',"dvLife_Style");
			}
			else if (type=="Life_Style")
			{
				RetriveReocrds('Lipid_Profile',"dvLipid_Profile");
			}
			
		}
	}
	
	xmlhttp.open("GET",pageURL,true);
	xmlhttp.send();
}
 function fileSelected() {
	var file = document.getElementById('fileToUpload').files[0];
	if (file) {
		var fileSize = 0;
		if (file.size > 1024 * 1024)
			fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';
		else
			fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';

		document.getElementById('fileName').innerHTML = 'Name: ' + file.name;
		document.getElementById('fileSize').innerHTML = 'Size: ' + fileSize;
		document.getElementById('fileType').innerHTML = 'Type: ' + file.type;
	}
}

function uploadFile() {
		
		
		var fd = new FormData(); //$('#form1').serialize(); //
		fd.append("fileToUpload", document.getElementById('flPhoto').files[0]);
	
		fd.append("cmb_Report_Day_Doc_pres", document.getElementById('cmb_Report_Day_Doc_pres').value);
		fd.append("cmb_Report_Month_Doc_pres", document.getElementById('cmb_Report_Month_Doc_pres').value);
		fd.append("cmb_Report_Year_Doc_pres", document.getElementById('cmb_Report_Year_Doc_pres').value);
		
		
		fd.append("cmb_Prescription_Reports_Doc_pres", document.getElementById('cmb_Prescription_Reports_Doc_pres').value);
		fd.append("txt_Test_Name", document.getElementById('txt_Test_Name').value);
		fd.append("txt_Lab_Name", document.getElementById('txt_Lab_Name').value);
		fd.append("txt_Random_ID", document.getElementById('txt_Random_ID').value);
		fd.append("txt_Health_Problem", document.getElementById('txt_Health_Problem').value);
		fd.append("txt_Type", document.getElementById('txt_Type').value);
		fd.append("txt_UploadID", document.getElementById('txt_UploadID').value);
		//	alert ("dfdf");	
		
		
		var RandomID=document.getElementById('txt_Random_ID').value;
		var Type=document.getElementById('txt_Type').value;
		
		
	if (RandomID=="" || RandomID=="0")
	{
			RandomID =document.getElementById("txt_Random_ID1").value;
	}
	else
	{
			document.getElementById("txt_Random_ID1").value=document.getElementById("txt_Random_ID").value;
	}
	
	///alert ("a"+RandomID);
		
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				console.log(xmlhttp.responseText);
				RetriveReocrds_Upload('dvUploadGallery', Type);
				setuploadate(Type);
			}
		}
		
		
		document.getElementById("txt_Test_Name" ).value="";
		document.getElementById("txt_Lab_Name" ).value="";
		document.getElementById("txt_Health_Problem" ).value="";
		document.getElementById("cmb_Report_Day_Doc_pres" ).value="0";
		document.getElementById("cmb_Report_Month_Doc_pres" ).value="0";
		document.getElementById("cmb_Report_Year_Doc_pres" ).value="0";
		document.getElementById("cmb_Prescription_Reports_Doc_pres" ).value="0";
		
//alert (document.getElementById('txt_Type').value);
		//xmlhttp.open("POST", hostname+"/includes/upload_files.inc.php?Type=Doc_Consult_Ins");
		xmlhttp.open("POST", hostname+"/includes/upload_files.inc.php?Type="+Type);
		xmlhttp.send(fd);
		//alert ("Record Saved Successfully.");
		
		
		
}
	
	
	function uploadFile_1(ID, RandomID) {
		var fd = new FormData(); //$('#form1').serialize(); //
		fd.append("fileToUpload", document.getElementById('flPhoto').files[0]);
		fd.append("cmb_Report_Day_Doc_pres", document.getElementById('cmb_Report_Day_Doc_pres').value);
		fd.append("cmb_Report_Month_Doc_pres", document.getElementById('cmb_Report_Month_Doc_pres').value);
		fd.append("cmb_Report_Year_Doc_pres", document.getElementById('cmb_Report_Year_Doc_pres').value);
		fd.append("cmb_Prescription_Reports_Doc_pres", document.getElementById('cmb_Prescription_Reports_Doc_pres').value);
		fd.append("txt_Test_Name", document.getElementById('txt_Test_Name').value);
		fd.append("txt_Lab_Name", document.getElementById('txt_Lab_Name').value);
		fd.append("txt_Random_ID", document.getElementById('txt_Random_ID').value);
		
		//var RandomID=document.getElementById('txt_Random_ID').value;
		
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				//alert(xmlhttp.responseText);
			}
		}
		
		xmlhttp.open("POST", hostname+"/includes/upload_files.inc.php?Type=Doc_Consult_Ins&ID="+ID);
		xmlhttp.send(fd);
			
		document.getElementById("ddl_Doc_Day" ).value="0";

		//alert("Record saved successfully.")
  
	}
		
function checkduplication(type, row)
{
		var day=0;
		var month=0;
		var year=0;
		var edit_id=0;
		var date=year+"-"+month+"-"+day;
		
		var message = "";
		if (type=="Doc_Consult")
		{
				day = $( "#ddl_Doc_Day" ).val();
				month = $( "#ddl_Doc_Month" ).val();
				year = $( "#ddl_Doc_Year" ).val();
				edit_id = $( "#txt_Doc_Consult_ID" ).val();
				date=year+"-"+month+"-"+day;
				if(document.getElementById("ddl_Doc_Day").value=="0" || document.getElementById("ddl_Doc_Month").value=="0" || document.getElementById("ddl_Doc_Year").value=="0")
				{
					alert ("Please select consultation date.");
					document.getElementById("ddl_Doc_Day").focus();
					return false;
				}
		}
		
		if (type=="Blood_Pressure")
		{
				day = $( "#cmb_DelTrack_Day" ).val();
				month = $( "#cmb_DelTrack_Month" ).val();
				year = $( "#cmb_DelTrack_Year" ).val();
				edit_id = $( "#txt_Blood_Pressure_ID" ).val();
				date=year+"-"+month+"-"+day;
				//alert (edit_id);
				
				if(document.getElementById("txt_DelTrack_BP").value=="")
				{
					alert ("Please enter valid blood pressure.");
					document.getElementById("txt_DelTrack_BP").focus();
					return false;
				}
				else 
				{
					//var iChars = "!@#$%^&*()+=-[]\\\';,./{}|\"0123456789";
					var bpvalue=document.getElementById("txt_DelTrack_BP").value;
					
					if (bpvalue.indexOf("/")<0) {
						alert ("Please enter valid blood pressure.");
						document.getElementById("txt_DelTrack_BP").focus();
						return false;
					}
					bpvalue = bpvalue.split('/');
					
					if(isNaN(bpvalue[0])==true)
					{
						alert ("Please enter valid blood pressure.");
						document.getElementById("txt_DelTrack_BP").focus();
						return false;
					}
					
					if(isNaN(bpvalue[1])==true)
					{
						alert ("Please enter valid blood pressure.");
						document.getElementById("txt_DelTrack_BP").focus();
						return false;
					}
					
					
					
				}
			
				
				
				if(document.getElementById("cmb_DelTrack_Day").value=="0" || document.getElementById("cmb_DelTrack_Month").value=="0" || document.getElementById("cmb_DelTrack_Year").value=="0")
				{
					alert ("Please select checked date.");
					document.getElementById("cmb_DelTrack_Day").focus();
					return false;
				}
	
		}
		
		
		
		if(day!="0" && month!="0" && year!="0") {
			
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
					//alert (message);
					message = message.split('###');
					if(message[1] == "true") {
							alert ("Duplicate date record exist.");
					}	
					else
					{
						
						if (type=="Doc_Consult")
						{
							Doc_Consult_Ins(row);
						}
						else if (type=="Blood_Pressure")
						{
							Blood_Pressure_Ins(row);
						}
						
					}
				}
			}
		
			xmlhttp.open("GET",hostname+"/includes/checkduplication.inc.php?type="+type+"&value="+date+"&edit_id="+edit_id, true);
			xmlhttp.send();
		}
		return false;
}



function Doc_Consult_Ins(row)
{
	
	//var current_date = document.getElementById("txtCurrentDate").value;
	
	
	if(document.getElementById("ddl_Doc_Day").value=="0" || document.getElementById("ddl_Doc_Month").value=="0" || document.getElementById("ddl_Doc_Year").value=="0")
	{
		alert ("Please select consultation date.");
		document.getElementById("ddl_Doc_Day").focus();
		return false;
	}
	
	var consult_day1 = document.getElementById("ddl_Doc_Day").value;
	var consult_month1 = document.getElementById("ddl_Doc_Month").value;
	var consult_year1 = document.getElementById("ddl_Doc_Year").value;
	
	//alert(consult_month1);
		
	//var consult_date=consult_year1+"-"+consult_month1+"-"+consult_day1;
	
    var current_date = new Date(); //Today Date
    var consult_date = new Date(consult_year1, consult_month1-1, consult_day1); 
	  
	//alert (consult_date);
	//alert (current_date);
	
	if(consult_date >= current_date)	
	{
		alert ("You cannot choose present or next date.");
		document.getElementById("ddl_Doc_Day").focus();	
		return false;
	}
	
	
	
	if(document.getElementById("ddl_Doc_Consulted").value=="0")
	{
		alert ("Please select consulted doctor.");
		document.getElementById("ddl_Doc_Consulted").focus();
		return false;
	}
	
	
	var td=$(row).parent();
	var consult_day = $( "#ddl_Doc_Day" ).val();
	var consult_month = $( "#ddl_Doc_Month" ).val();
	var consult_year = $( "#ddl_Doc_Year" ).val();
	var doctor_id= $( "#ddl_Doc_Consulted" ).val();
	var vital_record ="No";
	if ($("#vitalYes").is(':checked')==true)
	{
		vital_record ="Yes";		
	}
	var height = $( "#txt_Dc_Height" ).val();	
	var weight = $( "#txt_Dc_Weight" ).val();	
	var temperature = $( "#txt_Dc_Temperature" ).val();	
	var pulse = $( "#txt_Dc_Pulse" ).val();	
	var blood_pressure = $( "#txt_Dc_Blood_Pressure" ).val();	
	var breathing_rate = $( "#txt_Dc_Breathing_Rate" ).val();	
	var body_mass_index = $( "#txt_Dc_Body_Mass_index" ).val();	
	var resting_heart_rate = $( "#txt_Dc_Resting_Heart_Rate" ).val();	
	var notes = $( "#txt_Dc_Note" ).val();
	
	
		
	var store_diagnosed_cond ="No";
	if ($("#diag_cond_Yes").is(':checked')==true)
	{
		store_diagnosed_cond ="Yes";		
	}
	
	var health_problem = $( "#txt_Dc_Health_Problem" ).val();	
	var diagnosed_cond = $( "#cmb_Diagnosed_Condition" ).val();	

	var doc_consult_id = $( "#txt_Doc_Consult_ID" ).val();	
	var random_id = $( "#txt_Random_ID" ).val();	

	

	var url_param="consult_day="+consult_day+"&consult_month="+consult_month+"&consult_year="+consult_year+"&doctor_id="+doctor_id+"&vital_record="+vital_record;
	url_param=url_param+"&height="+height+"&weight="+weight+"&temperature="+temperature+"&pulse="+pulse+"&blood_pressure="+blood_pressure;
	url_param=url_param+"&breathing_rate="+breathing_rate+"&body_mass_index="+body_mass_index+"&resting_heart_rate="+resting_heart_rate;
	url_param=url_param+"&notes="+notes+"&store_diagnosed_cond="+store_diagnosed_cond+"&health_problem="+health_problem;
	url_param=url_param+"&diagnosed_cond="+diagnosed_cond+"&doc_consult_id="+doc_consult_id+"&random_id="+random_id+"&insert_type=Doc_Consult_Ins";


	//console.log(url_param);
	$.ajax( 
		{ 
			url: hostname+"/includes/add_records.inc.php?" + url_param,
		}
		)
	.done(function(data) {
			RetriveReocrds_Main('Doc_Consult','dvDocConsult');
			if (doc_consult_id=="" || doc_consult_id =="0")
			{
				AddCountInTabs('1','false','false');
			}
				
			//var json = data, obj = JSON.parse(json);
			//uploadFile(obj.message);
		}
	);


	document.getElementById("ddl_Doc_Day" ).value="0";
	document.getElementById("ddl_Doc_Month" ).value="0";
	document.getElementById("ddl_Doc_Year" ).value="0";
	document.getElementById("ddl_Doc_Consulted" ).value="0";
	document.getElementById("txt_Dc_Height" ).value="";	
	document.getElementById("txt_Dc_Weight" ).value="";	
	document.getElementById("txt_Dc_Temperature" ).value="";	
	document.getElementById("txt_Dc_Pulse" ).value="";	
	document.getElementById("txt_Dc_Blood_Pressure" ).value="";	
	document.getElementById("txt_Dc_Breathing_Rate" ).value="";	
	document.getElementById("txt_Dc_Body_Mass_index" ).value="";	
	document.getElementById("txt_Dc_Resting_Heart_Rate" ).value="";	
	document.getElementById("txt_Dc_Note" ).value="";	
	document.getElementById("txt_Dc_Health_Problem" ).value="";	
	document.getElementById("cmb_Diagnosed_Condition" ).value="0";	
	document.getElementById("txt_Doc_Consult_ID" ).value="";	
	$('#vitalYes').attr("checked", false);
	$('#vitalNo').attr("checked", "checked");
	$('#vitalNo').click();
	
	
	$('#diag_cond_Yes').attr("checked", false);
	$('#diag_cond_No').attr("checked", "checked");
	$('#diag_cond_No').click();
	
	
	document.getElementById("dvEdit" ).style.display="none";
	document.getElementById("dvUploadRep" ).style.display="none";
	document.getElementById("dvTotalReports").innerHTML="";
	
	var d = new Date();
	var n = d.getTime();


	
	document.getElementById("txt_Random_ID" ).value=n;	
	document.getElementById("dvUploadGallery").innerHTML="";
	
	//alert("Record saved successfully.");
	
}


function Medication_Ins(row)
{
	
	
	if(document.getElementById("txt_MD_Medicine").value=="")
	{
		alert ("Please enter medicine.");
		document.getElementById("txt_MD_Medicine").focus();
		return false;
	}
	
	if(document.getElementById("txt_MD_Dosage").value=="")
	{
		alert ("Please enter dosage.");
		document.getElementById("txt_MD_Dosage").focus();
		return false;
	}
	
	if(document.getElementById("txt_MD_Duration").value=="")
	{
		alert ("Please enter duration.");
		document.getElementById("txt_MD_Duration").focus();
		return false;
	}
	
	
	
	if(document.getElementById("txt_MD_Health_Problem").value=="")
	{
		alert ("Please enter your health problem.");
		document.getElementById("txt_MD_Health_Problem").focus();
		return false;
	}
	
	
	

	var td=$(row).parent();
	
	var medicine = $( "#txt_MD_Medicine" ).val();
	var dosage = $( "#txt_MD_Dosage" ).val();
	var duration = $( "#txt_MD_Duration" ).val();
	var health_problem = $( "#txt_MD_Health_Problem" ).val();	
	var notes = $( "#txt_MD_Instruction_For_Medicine" ).val();	
	var start_date = $( "#cmb_MD_Intake_Reminder_Start_Date" ).val();	
	var start_month = $( "#cmb_MD_Intake_Reminder_Start_Month" ).val();	
	var end_date = $( "#cmb_MD_Intake_Reminder_End_Date" ).val();	
	var end_month = $( "#cmb_MD_Intake_Reminder_End_Month" ).val();	
	
	var feq_mor_hour = $( "#Chk_MD_Daily_Frequency_HH_Morning" ).val();	
	var feq_mor_min = $( "#Chk_MD_Daily_Frequency_Min_Morning" ).val();	

	var feq_af_hour = $( "#Chk_MD_Daily_Frequency_HH_Afternoon" ).val();	
	var feq_af_min = $( "#Chk_MD_Daily_Frequency_Min_Afternoon" ).val();	
	
	var feq_eve_hour = $( "#Chk_MD_Daily_Frequency_HH_Evening" ).val();	
	var feq_eve_min = $( "#Chk_MD_Daily_Frequency_Min_Evening" ).val();	
	
	var feq_ngt_hour = $( "#Chk_MD_Daily_Frequency_HH_Night" ).val();	
	var feq_ngt_min = $( "#Chk_MD_Daily_Frequency_Min_Night" ).val();
	var purchase_day = $( "#cmb_MD_Purchase_Reminder_Date" ).val();
	var purchase_month = $( "#cmb_MD_Purchase_Reminder_Month" ).val();
	
	//var intake_reminder = $( "#Chk_MD_Setup_Intake_Reminder" ).val();
//	var purchase_reminder = $( "#Chk_MD_Setup_Purchase_Reminder" ).val();
	//var alert_mobile = $( "#Chk_MD_Purchase_alert_Mobile" ).val();
	//var alert_email = $( "#Chk_MD_Purchase_alert_Email" ).val();

	var alert_mobile ="Off";
	if ($("#Chk_MD_Purchase_alert_Mobile").is(':checked')==true)
	{
		alert_mobile ="on";		
	}
	
	var alert_email ="Off";
	if ($("#Chk_MD_Purchase_alert_Email").is(':checked')==true)
	{
		alert_email ="on";		
	}
	
	
	

	var track_machine ="No";
	if ($("#MedicineYes").is(':checked')==true)
	{
		track_machine ="Yes";		
	}
	
	
	var daily_freq_morng ="Off";
	if ($("#Chk_MD_Daily_Frequency_Morning").is(':checked')==true)
	{
		daily_freq_morng ="on";		
	}
	
	var daily_freq_after ="Off";
	if ($("#Chk_MD_Daily_Frequency_Afternoon").is(':checked')==true)
	{
		daily_freq_after ="on";		
	}
	
	var daily_freq_even ="Off";
	if ($("#Chk_MD_Daily_Frequency_Evening").is(':checked')==true)
	{
		daily_freq_even ="on";		
	}
	
	var daily_freq_ngt ="Off";
	if ($("#Chk_MD_Daily_Frequency_Night").is(':checked')==true)
	{
		daily_freq_ngt ="on";		
	}
	
	
	var intake_reminder ="Off";
	if ($("#Chk_MD_Setup_Intake_Reminder").is(':checked')==true)
	{
		intake_reminder ="on";		
	}
	
	
	var purchase_reminder ="Off";
	if ($("#Chk_MD_Setup_Purchase_Reminder").is(':checked')==true)
	{
		purchase_reminder ="on";		
	}
	
	
	var follow_prescription ="No";
	if ($("#PreYes").is(':checked')==true)
	{
		follow_prescription ="Yes";		
	}
	
	var medication_id = $( "#txt_MD_medication_id" ).val();	
	document.getElementById("dvEditMedi" ).style.display="none";

	var url_param="medicine="+medicine+"&dosage="+dosage+"&duration="+duration+"&track_machine="+track_machine+"&follow_prescription="+follow_prescription;
	url_param=url_param+"&health_problem="+health_problem+"&notes="+notes+"&start_date="+start_date+"&end_date="+end_date+"&start_month="+start_month+"&end_month="+end_month+"&daily_freq_morng="+daily_freq_morng;
	url_param=url_param+"&feq_mor_hour="+feq_mor_hour+"&feq_mor_min="+feq_mor_min+"&daily_freq_after="+daily_freq_after;
	url_param=url_param+"&feq_af_hour="+feq_af_hour+"&feq_af_min="+feq_af_min+"&daily_freq_even="+daily_freq_even+"&feq_eve_hour="+feq_eve_hour+"&feq_eve_min="+feq_eve_min+"&daily_freq_ngt="+daily_freq_ngt;
	url_param=url_param+"&purchase_day="+purchase_day+"&purchase_month="+purchase_month+"&purchase_reminder="+purchase_reminder+"&alert_mobile="+alert_mobile+"&alert_email="+alert_email;
	url_param=url_param+"&feq_ngt_hour="+feq_ngt_hour+"&intake_reminder="+intake_reminder+"&feq_ngt_min="+feq_ngt_min+"&medication_id="+medication_id+"&insert_type=Medication_Ins";


	console.log (url_param);
	$.ajax( 
		{ 
			url: hostname+"/includes/add_records.inc.php?" + url_param,
		}
		)
	.done(function(data) {
			RetriveReocrds_Main('Medication','dvMedication');
			if (medication_id=="" || medication_id =="0")
			{
				AddCountInTabs('2','false','false');
			}
			
			//var json = data, obj = JSON.parse(json);
			//uploadFile(obj.message);
		}
	);



	
	document.getElementById("txt_MD_Medicine" ).value="";
	document.getElementById("txt_MD_Dosage" ).value="";
	document.getElementById("txt_MD_Duration" ).value="";
	document.getElementById("txt_MD_Health_Problem" ).value="";	
	document.getElementById("txt_MD_Instruction_For_Medicine" ).value="";	
	document.getElementById("cmb_MD_Intake_Reminder_Start_Date" ).value="0";	
	document.getElementById("cmb_MD_Intake_Reminder_End_Date" ).value="0";	
	document.getElementById("Chk_MD_Daily_Frequency_Morning" ).checked=false;		
	document.getElementById("Chk_MD_Daily_Frequency_HH_Morning" ).checked=false;	
	document.getElementById("Chk_MD_Daily_Frequency_Min_Morning" ).checked=false;	
	document.getElementById("Chk_MD_Daily_Frequency_Afternoon" ).checked=false;		
	document.getElementById("Chk_MD_Daily_Frequency_HH_Afternoon" ).checked=false;		
	document.getElementById("Chk_MD_Daily_Frequency_Min_Afternoon" ).checked=false;	
	document.getElementById("Chk_MD_Daily_Frequency_Evening" ).checked=false;		
	document.getElementById("Chk_MD_Daily_Frequency_HH_Evening" ).checked=false;	
	document.getElementById("Chk_MD_Daily_Frequency_Min_Evening" ).checked=false;	
	document.getElementById("Chk_MD_Daily_Frequency_Night" ).checked=false;	
	document.getElementById("Chk_MD_Daily_Frequency_HH_Night" ).checked=false;		
	document.getElementById("Chk_MD_Daily_Frequency_Min_Night" ).checked=false;	
	document.getElementById("cmb_MD_Purchase_Reminder_Date" ).value="0";	
	document.getElementById("cmb_MD_Purchase_Reminder_Month" ).value="0";	
	document.getElementById("Chk_MD_Setup_Intake_Reminder" ).checked=false;	
	document.getElementById("Chk_MD_Setup_Purchase_Reminder" ).checked=false;	
	document.getElementById("Chk_MD_Purchase_alert_Mobile" ).checked=false;	
	document.getElementById("Chk_MD_Purchase_alert_Email" ).checked=false;	
	document.getElementById("txt_MD_medication_id" ).value="";
	
	
	$('#MedicineYes').attr("checked", false);
	$('#MedicineNo').attr("checked", "checked");
	$('#MedicineNo').click();
	
	$('#PreYes').attr("checked", false);
	$('#PreNo').attr("checked", "checked");
	$('#PreNo').click();
	
	
	Purchase_Reminder_Show_Hide();
	Daily_Frequency_enabledisable();
	Intake_Reminder_Show_Hide();

	

	//alert("Record saved successfully.");
	
}


function Doc_Consult_Delete_By_Id(id,deleted_id)
{

	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_doc_consult_"+deleted_id).style.display='none';
				 AddCountInTabs('1','false','true');
				 
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Doc_Consult_Ins&cid="+id,true);
		xmlhttp.send();
	}
	
}

function ShowReports(id)
{
	//alert (id);
	
	if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 //alert(message);
				 if(id!=""){
					 document.getElementById("dvTotalReports").innerHTML=message;
					 document.getElementById("dvTotalReports1").innerHTML=message;
				 }
				 else
				 {
					  
				 }
			}
		}

		xmlhttp.open("GET",hostname+"/includes/show_reports.inc.php?cid="+id,true);
		xmlhttp.send();
}

function ChangeEditImage(eid,type)
{

	var imgs=document.getElementsByTagName("a");
	var imgname="";
	
	for(var i=0;i <imgs.length;i++)
	{
		imgname=imgs[i].id;
		
		if (imgname.substr(0,8)=="editbtn_")
		{
			document.getElementById(imgname).style.display="";
			
		}
		if (imgname.substr(0,11)=="rededitbtn_")
		{
			
			document.getElementById(imgname).style.display="none";
		}
		
	}
	
	
	document.getElementById("rededitbtn_"+type+eid).style.display="";
	document.getElementById("editbtn_"+type+eid).style.display="none";
}

function Doc_Consult_Retrive_By_Id(id, eid)
{
	var message="";
	var day="";
	var Type="Doc_Consult";
	if (window.XMLHttpRequest)
	{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
			 message = JSON.parse(xmlhttp.responseText);
			 data = {"records":message};
			 for (var i = 0; i < data.records.length; ++i) {
				 day=data.records[i].consult_day;
					
					ChangeEditImage(eid,'dc');

				 	document.getElementById("ddl_Doc_Day" ).value=data.records[i].consult_day;
					document.getElementById("ddl_Doc_Month" ).value=data.records[i].consult_month;
					document.getElementById("ddl_Doc_Year" ).value=data.records[i].consult_year;
					document.getElementById("ddl_Doc_Consulted" ).value=data.records[i].doctor_id;
					document.getElementById("txt_Dc_Height" ).value=data.records[i].height;	
					document.getElementById("txt_Dc_Weight" ).value=data.records[i].weight;	
					document.getElementById("txt_Dc_Temperature" ).value=data.records[i].temperature;	
					document.getElementById("txt_Dc_Pulse" ).value=data.records[i].pulse;	
					document.getElementById("txt_Dc_Blood_Pressure" ).value=data.records[i].blood_pressure;	
					document.getElementById("txt_Dc_Breathing_Rate" ).value=data.records[i].breathing_rate;	
					document.getElementById("txt_Dc_Body_Mass_index" ).value=data.records[i].body_mass_index;	
					document.getElementById("txt_Dc_Resting_Heart_Rate" ).value=data.records[i].resting_heart_rate;	
					document.getElementById("txt_Dc_Note" ).value=data.records[i].notes;	
					document.getElementById("txt_Dc_Health_Problem" ).value=data.records[i].health_problem;	
					document.getElementById("cmb_Diagnosed_Condition" ).value=data.records[i].diagnosed_cond;	
					document.getElementById("txt_Doc_Consult_ID" ).value=data.records[i].doc_consult_id;	
					document.getElementById("txt_Random_ID" ).value=data.records[i].doc_consult_id;	
					document.getElementById("dvEdit").style.display="";
					
				
					
					
					
					document.getElementById("dvUploadRep" ).style.display="";
					if(document.getElementById("dvDocNA")!=null)
					{
						document.getElementById("dvDocNA" ).style.display="none";	
					}
					
					if(document.getElementById("dvDocNA1")!=null)
					{
						document.getElementById("dvDocNA1" ).style.display="none";	
					}
					
				
					
					
				   if (data.records[i].store_diagnosed_cond=="Yes" )
				   {
						document.getElementById("diag_cond_Yes" ).checked=true
						show3();
				   }
				   else
				   {
						document.getElementById("diag_cond_No" ).checked=true
						show4();
				   }
					
				   if (data.records[i].vital_record=="Yes")
				   {
						document.getElementById("vitalYes" ).checked=true
						show1();
				   }
				   else
				   {
						document.getElementById("vitalNo" ).checked=true
						show2();
				   }
				  
				 // ShowReports(id);
				  

			 }
			 
			document.getElementById("txt_Random_ID" ).value=document.getElementById("txt_Doc_Consult_ID" ).value;
			 RetriveReocrds_Upload("dvUploadGallery", Type);
			// ShowReports(id);
			

		}
	}
	xmlhttp.open("GET",hostname+"/retrive_files/retrive_reocrds.inc.php?insert_type=Doc_Consult_Ins&cid="+id,true);
	xmlhttp.send();

	
}



function Medication_Delete_By_Id(id,deleted_id)
{

	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 //alert(message);
				 document.getElementById("tr_medication_"+deleted_id).style.display='none';
				 AddCountInTabs('2','false','true');
			}
		}

		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Medication_Ins&cid="+id,true);
		xmlhttp.send();
	}
	
}
function Medication_Retrive_By_Id(id, eid)
{
	
	showmform();
	var message="";
	var day="";
	if (window.XMLHttpRequest)
	{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
			 message = JSON.parse(xmlhttp.responseText);
			 data = {"records":message};
			 for (var i = 0; i < data.records.length; ++i) {
				 day=data.records[i].consult_day;

					ChangeEditImage(eid,'md');
					
				 	document.getElementById("txt_MD_Medicine" ).value=data.records[i].medicine;
					document.getElementById("txt_MD_Dosage" ).value=data.records[i].dosage;
					document.getElementById("txt_MD_Duration" ).value=data.records[i].duration;
					document.getElementById("txt_MD_Health_Problem" ).value=data.records[i].health_problem;	
					document.getElementById("txt_MD_Instruction_For_Medicine" ).value=data.records[i].notes;	
					document.getElementById("cmb_MD_Intake_Reminder_Start_Date" ).value=data.records[i].start_day;	
					document.getElementById("cmb_MD_Intake_Reminder_End_Date" ).value=data.records[i].end_day;	
					document.getElementById("cmb_MD_Intake_Reminder_Start_Month" ).value=data.records[i].start_month;	
					document.getElementById("cmb_MD_Intake_Reminder_End_Month" ).value=data.records[i].end_month;	
					document.getElementById("Chk_MD_Daily_Frequency_HH_Morning" ).value=data.records[i].feq_mor_hour;	
					document.getElementById("Chk_MD_Daily_Frequency_Min_Morning" ).value=data.records[i].feq_mor_min;	
					document.getElementById("Chk_MD_Daily_Frequency_HH_Afternoon" ).value=data.records[i].feq_af_hour;	
					document.getElementById("Chk_MD_Daily_Frequency_Min_Afternoon" ).value=data.records[i].feq_af_min;	
					document.getElementById("Chk_MD_Daily_Frequency_HH_Evening" ).value=data.records[i].feq_eve_hour;	
					document.getElementById("Chk_MD_Daily_Frequency_Min_Evening" ).value=data.records[i].feq_eve_min;	
					document.getElementById("Chk_MD_Daily_Frequency_HH_Night" ).value=data.records[i].feq_ngt_hour;	
					document.getElementById("Chk_MD_Daily_Frequency_Min_Night" ).value=data.records[i].feq_ngt_min;	
					document.getElementById("cmb_MD_Purchase_Reminder_Date" ).value=data.records[i].purchase_day;	
					document.getElementById("cmb_MD_Purchase_Reminder_Month" ).value=data.records[i].purchase_month;	
					document.getElementById("txt_MD_medication_id" ).value=data.records[i].medication_id;	
					document.getElementById("dvEditMedi" ).style.display="";
					//document.getElementById("rededitbtnmedi"+eid).style.display="";
					///document.getElementById("editbtnmedi"+eid).style.display="none";
					
					if(document.getElementById("dvMediNA" )==null)
					{
						document.getElementById("dvMediNA" ).style.display="none";	
					}
					
					if(document.getElementById("dvMediNA1" )==null)
					{
						document.getElementById("dvMediNA1" ).style.display="none";	
					}
					
					
					
				
				   if (data.records[i].intake_reminder=="on" )
				   {
						document.getElementById("Chk_MD_Setup_Intake_Reminder" ).checked=true
						Intake_Reminder_Show_Hide();
				   }

				   if (data.records[i].purchase_reminder=="on" )
				   {
						document.getElementById("Chk_MD_Setup_Purchase_Reminder" ).checked=true
						Purchase_Reminder_Show_Hide();
	
	 
				   }

				   if (data.records[i].alert_email=="on" )
				   {
						document.getElementById("Chk_MD_Purchase_alert_Email" ).checked=true
						Intake_Reminder_Show_Hide();
				   }

				   if (data.records[i].alert_mobile=="on" )
				   {
						document.getElementById("Chk_MD_Purchase_alert_Mobile" ).checked=true
						Intake_Reminder_Show_Hide();
				   }


					if (data.records[i].daily_freq_morng=="on" )
				   {
						document.getElementById("Chk_MD_Daily_Frequency_Morning" ).checked=true
						Intake_Reminder_Show_Hide();
				   }

				    if (data.records[i].daily_freq_after=="on" )
				   {
						document.getElementById("Chk_MD_Daily_Frequency_Afternoon" ).checked=true
						
				   }

				     if (data.records[i].daily_freq_even=="on" )
				   {
						document.getElementById("Chk_MD_Daily_Frequency_Evening" ).checked=true
						
				   }

				    if (data.records[i].daily_freq_ngt=="on" )
				   {
						document.getElementById("Chk_MD_Daily_Frequency_Night" ).checked=true
						
				   }

				   
				 
					if (data.records[i].follow_prescription=="Yes")
				   {
						document.getElementById("PreYes" ).checked=true
					
				   }
				  
				  
			
					if (data.records[i].track_machine=="Yes" )
				   {
						document.getElementById("MedicineYes" ).checked=true
						//show3();
				   }
				   else
				   {
						document.getElementById("MedicineNo" ).checked=true
						//show4();
				   }
				   
				   				   


				   Daily_Frequency_enabledisable();

			 }
			 
			  
			

		}
	}
	xmlhttp.open("GET",hostname+"/retrive_files/retrive_reocrds.inc.php?insert_type=Medication_Ins&cid="+id,true);
	xmlhttp.send();
}




function Allergies_Ins(row)
{
	
	if(document.getElementById("txt_AL_Allergicto").value=="")
	{
		alert ("You are allergic to?");
		document.getElementById("txt_AL_Allergicto").focus();
		return false;
	}
	
	if(document.getElementById("txt_AL_Allergic_Reaction").value=="")
	{
		alert ("Please enter allergic reaction.");
		document.getElementById("txt_AL_Allergic_Reaction").focus();
		return false;
	}
	
	if(document.getElementById("txt_AL_Allergic_Status").value=="0")
	{
		alert ("Please select allergic status.");
		document.getElementById("txt_AL_Allergic_Status").focus();
		return false;
	}
	
	
	if(document.getElementById("txt_AL_Allergic_Day").value=="0" || document.getElementById("txt_AL_Allergic_Month").value=="0" || document.getElementById("txt_AL_Allergic_Year").value=="0")
	{
		alert ("Please select last observed date.");
		document.getElementById("txt_AL_Allergic_Day").focus();
		return false;
	}
	
	if(document.getElementById("txt_AL_Doctor_Consulted").value=="0")
	{
		alert ("Please select consulted doctor.");
		document.getElementById("txt_AL_Doctor_Consulted").focus();
		return false;
	}
	
	

	var td=$(row).parent();
	var allergies_id = $( "#txt_Allergies_ID" ).val();
	var allergic_to = $( "#txt_AL_Allergicto" ).val();
	var reaction = $( "#txt_AL_Allergic_Reaction" ).val();
	var status = $( "#txt_AL_Allergic_Status" ).val();
	var doctor_id= $( "#txt_AL_Doctor_Consulted" ).val();
	var last_observe_day = $( "#txt_AL_Allergic_Day" ).val();	
	var last_observe_month = $( "#txt_AL_Allergic_Month" ).val();	
	var last_observe_year = $( "#txt_AL_Allergic_Year" ).val();	
	var consult_day = $( "#txt_AL_Allergic_ConsultationDay" ).val();	
	var consult_month = $( "#txt_AL_Allergic_ConsultationMonth" ).val();	
	var consult_year = $( "#txt_AL_Allergic_ConsultationYear" ).val();	
	var random_id = $( "#txt_Random_ID" ).val();	
	
	
	var current_date = new Date(); //Today Date
    var allergy_date = new Date(consult_year, consult_month-1, consult_day);
	var last_observed_date = new Date(last_observe_year, last_observe_month-1, last_observe_day);
	  
	  
	if(last_observed_date >= current_date)
	{
		alert ("You cannot choose present or next date.");
		document.getElementById("txt_AL_Allergic_Day").focus();	
		return false;
	}
	
	if(allergy_date >= current_date)
	{
		alert ("You cannot choose present or next date.");
		document.getElementById("txt_AL_Allergic_ConsultationDay").focus();	
		return false;
	}

	var url_param="allergies_id="+allergies_id+"&allergic_to="+allergic_to+"&reaction="+reaction+"&status="+status+"&doctor_id="+doctor_id;
	url_param=url_param+"&last_observe_day="+last_observe_day+"&last_observe_month="+last_observe_month+"&last_observe_year="+last_observe_year+"&consult_day="+consult_day+"&consult_month="+consult_month+"&consult_year="+consult_year+"&random_id="+random_id+"&insert_type=Allergies_Ins";


	
	$.ajax( 
		{ 
			url: hostname+"/includes/add_records.inc.php?" + url_param,
		}
		)
	.done(function(data) {
			RetriveReocrds_Main('Allergies','dvAllergies');
			if (allergies_id=="" || allergies_id =="0")
			{
				AddCountInTabs('3','false','false');
			}
			//var json = data, obj = JSON.parse(json);
			//uploadFile(obj.message);
		}
	);


	document.getElementById("txt_Allergies_ID" ).value="";
	document.getElementById("txt_AL_Allergicto" ).value="";
	document.getElementById("txt_AL_Allergic_Reaction" ).value="";
	document.getElementById("txt_AL_Allergic_Status" ).value="";
	document.getElementById("txt_AL_Doctor_Consulted" ).value="0";	
	document.getElementById("txt_AL_Allergic_Day" ).value="0";	
	document.getElementById("txt_AL_Allergic_Month" ).value="0";	
	document.getElementById("txt_AL_Allergic_Year" ).value="0";	
	document.getElementById("txt_AL_Allergic_ConsultationDay" ).value="0";	
	document.getElementById("txt_AL_Allergic_ConsultationMonth" ).value="0";	
	document.getElementById("txt_AL_Allergic_ConsultationYear" ).value="0";	
	document.getElementById("dvEditAll" ).style.display="none";

	var d = new Date();
	var n = d.getTime();
	document.getElementById("txt_Random_ID" ).value=n;	
	document.getElementById("dvUploadGallery").innerHTML="";
	
	//alert("Record saved successfully.");
	
}



function Allergies_Delete_By_Id(id,deleted_id)
{

	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_allergies_"+deleted_id).style.display='none';
				  AddCountInTabs('3','false','true');
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Allergies_Ins&cid="+id,true);
		xmlhttp.send();
	}
	
}



function Allergies_Retrive_By_Id(id, eid)
{	
	showaform();
	var message="";
	var day="";
	var Type="Allergies";
	if (window.XMLHttpRequest)
	{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
			 message = JSON.parse(xmlhttp.responseText);
			 data = {"records":message};
			 for (var i = 0; i < data.records.length; ++i) {
				 day=data.records[i].consult_day;


				document.getElementById("txt_Allergies_ID" ).value=data.records[i].allergies_id;
				document.getElementById("txt_AL_Allergicto" ).value=data.records[i].allergic_to;
				document.getElementById("txt_AL_Allergic_Reaction" ).value=data.records[i].reaction;
				document.getElementById("txt_AL_Allergic_Status" ).value=data.records[i].status;
				document.getElementById("txt_AL_Doctor_Consulted" ).value=data.records[i].doctor_id;
				document.getElementById("txt_AL_Allergic_Day" ).value=data.records[i].last_observe_day;	
				document.getElementById("txt_AL_Allergic_Month" ).value=data.records[i].last_observe_month;
				document.getElementById("txt_AL_Allergic_Year" ).value=data.records[i].last_observe_year;
				document.getElementById("txt_AL_Allergic_ConsultationDay" ).value=data.records[i].consult_day;
				document.getElementById("txt_AL_Allergic_ConsultationMonth" ).value=data.records[i].consult_month;
				document.getElementById("txt_AL_Allergic_ConsultationYear" ).value=data.records[i].consult_year;
				document.getElementById("dvEditAll" ).style.display="";
				document.getElementById("rededitbtnall"+eid).style.display="";
				document.getElementById("editbtnall"+eid).style.display="none";
				
				document.getElementById("dvUploadRep1" ).style.display="";
				if(document.getElementById("dvAllNA" )==null)
				{
					document.getElementById("dvAllNA" ).style.display="none";
				}
				
				if(document.getElementById("dvAllNA1" )==null)
				{
					document.getElementById("dvAllNA1" ).style.display="none";
				}
				
				
			 }
			 
			document.getElementById("txt_Random_ID" ).value=document.getElementById("txt_Allergies_ID" ).value;
			RetriveReocrds_Upload("dvUploadGallery", Type);
			

		}
	}
	xmlhttp.open("GET",hostname+"/retrive_files/retrive_reocrds.inc.php?insert_type=Allergies_Ins&cid="+id,true);
	xmlhttp.send();
}






function Immunization_Ins(row)
{

	if(document.getElementById("txt_immunization_Name").value=="")
	{
		alert ("Please enter immunization name.");
		document.getElementById("txt_immunization_Name").focus();
		return false;
	}
	
	if(document.getElementById("txt_immunization_Date").value=="0" || document.getElementById("txt_immunization_Month").value=="0" || document.getElementById("txt_immunization_Year").value=="0")
	{
		alert ("Please select immunization date.");
		document.getElementById("txt_immunization_Date").focus();
		return false;
	}
	
	var immu_day = document.getElementById("txt_immunization_Date").value;
	var immu_month = document.getElementById("txt_immunization_Month").value;
	var immu_year = document.getElementById("txt_immunization_Year").value;
	
	var current_date = new Date(); //Today Date
    var immu_date = new Date(immu_year, immu_month-1, immu_day); 
	  
	//alert (consult_date);
	//alert (current_date);
	
	/*if(immu_date >= current_date)
	{
		alert ("You cannot choose present or next date.");
		document.getElementById("txt_immunization_Date").focus();	
		return false;
	}*/
	
	var td=$(row).parent();
	var immunization_id = $( "#txt_Immnunization_ID" ).val();
	var immunization_name = $( "#txt_immunization_Name" ).val();
	var administered_day = $( "#txt_immunization_Date" ).val();	
	var administered_month = $( "#txt_immunization_Month" ).val();	
	var administered_year = $( "#txt_immunization_Year" ).val();	
	var reminder_day = $( "#txt_immunization_Date1" ).val();	
	var reminder_month = $( "#txt_immunization_Month1" ).val();	
	var reminder_year = $( "#txt_immunization_Year1" ).val();	
	var immunization_hour = $( "#txt_immunization_hour" ).val();	
	var immunization_min = $( "#txt_immunization_Min" ).val();	


	/////alert (reminder_day);
		
	var url_param="immunization_id="+immunization_id+"&immunization_name="+immunization_name+"&administered_day="+administered_day+"&administered_month="+administered_month+"&administered_year="+administered_year+"&reminder_day="+reminder_day+"&reminder_month="+reminder_month+"&reminder_year="+reminder_year+"&immunization_hour="+immunization_hour+"&immunization_min="+immunization_min+"&insert_type=Immunization_Ins";

	console.log(url_param);
	$.ajax( 
		{ 
			url: hostname+"/includes/add_records.inc.php?" + url_param,
		}
		)
	.done(function(data) {
			RetriveReocrds_Main('Immunization','dvImmunization');
			if (immunization_id=="" || immunization_id =="0")
			{
				AddCountInTabs('5','false','false');
			}
			//var json = data, obj = JSON.parse(json);
			//uploadFile(obj.message);
		}
	);

	document.getElementById("txt_Immnunization_ID" ).value="";
	document.getElementById("txt_immunization_Name" ).value="";
	document.getElementById("txt_immunization_Date" ).value="0";
	document.getElementById("txt_immunization_Month" ).value="0";
	document.getElementById("txt_immunization_Year" ).value="0";
	document.getElementById("txt_immunization_Date1" ).value="0";	
	document.getElementById("txt_immunization_Month1" ).value="0";	
	document.getElementById("txt_immunization_Year1" ).value="0";	
	document.getElementById("txt_immunization_hour" ).value="0";	
	document.getElementById("txt_immunization_Min" ).value="0";	
	document.getElementById("dvEditImmu" ).style.display="none";

	//alert("Record saved successfully.");
	
}



function Immunization_Delete_By_Id(id,deleted_id)
{

	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 //alert(message);
				 document.getElementById("tr_immunization_"+deleted_id).style.display='none';
				 AddCountInTabs('5','false','true');
			}
		}
		//alert(hostname+"/includes/delete_reocrds.inc.php?insert_type=Immunization&cid="+id);
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Immunization_Ins&cid="+id,true);
		xmlhttp.send();
	}
	
}



function Immunization_Retrive_By_Id(id, eid)
{

	showiform();
	var message="";
	var day="";
	if (window.XMLHttpRequest)
	{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
			 message = JSON.parse(xmlhttp.responseText);
			 data = {"records":message};
			 for (var i = 0; i < data.records.length; ++i) {
				 day=data.records[i].consult_day;


				document.getElementById("txt_Immnunization_ID" ).value=data.records[i].immunization_id;
				document.getElementById("txt_immunization_Name" ).value=data.records[i].immunization_name;
				document.getElementById("txt_immunization_Date" ).value=data.records[i].administered_day;
				document.getElementById("txt_immunization_Month" ).value=data.records[i].administered_month;
				document.getElementById("txt_immunization_Year" ).value=data.records[i].administered_year;
				document.getElementById("txt_immunization_Date1" ).value=data.records[i].reminder_day;
				document.getElementById("txt_immunization_Month1" ).value=data.records[i].reminder_month;	
				document.getElementById("txt_immunization_Year1" ).value=data.records[i].reminder_year;
				document.getElementById("txt_immunization_hour" ).value=data.records[i].immunization_hour;
				document.getElementById("txt_immunization_Min" ).value=data.records[i].immunization_min;;	
		 		document.getElementById("dvEditImmu" ).style.display="";
				document.getElementById("rededitbtnimmu"+eid).style.display="";
				document.getElementById("editbtnimmu"+eid).style.display="none";
				document.getElementById("dvImmuNA" ).style.display="none";
				document.getElementById("dvImmuNA1" ).style.display="none";
				
			 }
			 
			  
			

		}
	}
	xmlhttp.open("GET",hostname+"/retrive_files/retrive_reocrds.inc.php?insert_type=Immunization_Ins&cid="+id,true);
	xmlhttp.send();
}




function Hospital_Ins(row)
{

	if(document.getElementById("cmb_Hospitalization_Date").value=="0" || document.getElementById("cmb_Hospitalization_Month").value=="0" || document.getElementById("cmb_Hospitalization_Year").value=="0")
	{
		alert ("Please select hospitalization date.");
		document.getElementById("cmb_Hospitalization_Date").focus();
		return false;
	}
	
	if(document.getElementById("txt_Hospitalization_Hospital_Name").value=="")
	{
		alert ("Please enter hospitalization name.");
		document.getElementById("txt_Hospitalization_Hospital_Name").focus();
		return false;
	}
	
	if(document.getElementById("ddl_Doc_Consulted_hospital").value=="0")
	{
		alert ("Please select consulted doctor.");
		document.getElementById("ddl_Doc_Consulted_hospital").focus();
		return false;
	}
	
	if(document.getElementById("txt_Hospitalization_Reason_of_Admission").value=="")
	{
		alert ("Please enter reason of admission.");
		document.getElementById("txt_Hospitalization_Reason_of_Admission").focus();
		return false;
	}
	
	if(document.getElementById("cmb_Hospitalization_Discharge_Date").value=="0" || document.getElementById("cmb_Hospitalization_Discharge_Month").value=="0" || document.getElementById("cmb_Hospitalization_Discharge_Year").value=="0")
	{
		alert ("Please select discharge date.");
		document.getElementById("cmb_Hospitalization_Discharge_Date").focus();
		return false;
	}
	
	
	
	var td=$(row).parent();
	var hospital_id = $( "#txt_hospital_id" ).val();
	var hospital_day = $( "#cmb_Hospitalization_Date" ).val();
	var hospital_month = $( "#cmb_Hospitalization_Month" ).val();
	var hospital_year = $( "#cmb_Hospitalization_Year" ).val();
	var hospital_name=$( "#txt_Hospitalization_Hospital_Name" ).val();
	var doctor_id= $("#ddl_Doc_Consulted_hospital" ).val();	

	var admission_reason = $( "#txt_Hospitalization_Reason_of_Admission" ).val();	
	var diagnosis = $( "#txt_Hospitalization_Diagnosis" ).val();	
	var discharge_day = $( "#cmb_Hospitalization_Discharge_Date" ).val();	
	var discharge_month = $( "#cmb_Hospitalization_Discharge_Month" ).val();	
	var discharge_year = $( "#cmb_Hospitalization_Discharge_Year" ).val();	
	var diagnosis_summary = $( "#txt_Hospitalization_Diagnosis_Summary" ).val();	
	var doctor_instruction = $( "#txt_Hospitalization_Doctor_Instruction" ).val();	
	var next_day = $( "#cmb_Hospitalization_Next_Visit_Date" ).val();	
	var next_month = $( "#cmb_Hospitalization_Next_Visit_Month" ).val();		
	var next_year = $( "#cmb_Hospitalization_Next_Visit_Year" ).val();	
	var reminder_day = $( "#cmb_Hospitalization_Reminder_Date" ).val();	
	var reminder_month = $( "#cmb_Hospitalization_Reminder_Date_Month" ).val();	
	var reminder_year = $( "#cmb_Hospitalization_Reminder_Date_Year" ).val();	

	var current_date = new Date(); //Today Date
    var hospitalization_date = new Date(hospital_year, hospital_month-1, hospital_day); 
	var discharge_date = new Date(discharge_year, discharge_month-1, discharge_day); 
  	var next_visit_date = new Date(next_year, next_month-1, next_day); 
	var reminder_date = new Date(reminder_year, reminder_month-1, reminder_day); 
	//alert(current_date);
	
	//alert(next_visit_date);
	

	
	if(hospitalization_date >= current_date)
	{
		alert ("You cannot choose present or next date.");
		document.getElementById("cmb_Hospitalization_Date").focus();	
		return false;
	}
	
	if(discharge_date >= current_date)
	{
		alert ("You cannot choose present or next date.");
		document.getElementById("cmb_Hospitalization_Discharge_Date").focus();	
		return false;
	}

	
	/*if(document.getElementById("cmb_Hospitalization_Discharge_Date").value!="0" || document.getElementById("cmb_Hospitalization_Discharge_Month").value!="0" || document.getElementById("cmb_Hospitalization_Discharge_Year").value!="0")
		if(next_visit_date <= current_date)
		{
			alert ("Next Visit date should be greater than today date.");
			document.getElementById("cmb_Hospitalization_Next_Visit_Date").focus();	
			return false;
		}
	

	if(reminder_date <= current_date)
	{
		alert ("Reminder date should be greater than today date.");
		document.getElementById("cmb_Hospitalization_Reminder_Date").focus();	
		return false;
	}
*/


	var url_param="hospital_day="+hospital_day+"&hospital_month="+hospital_month+"&hospital_year="+hospital_year+"&doctor_id="+doctor_id;
	url_param=url_param+"&admission_reason="+admission_reason+"&hospital_name="+hospital_name+"&diagnosis="+diagnosis+"&next_year="+next_year;
	url_param=url_param+"&discharge_day="+discharge_day+"&discharge_month="+discharge_month+"&discharge_year="+discharge_year;
	url_param=url_param+"&diagnosis_summary="+diagnosis_summary+"&doctor_instruction="+doctor_instruction+"&next_day="+next_day;
	url_param=url_param+"&reminder_day="+reminder_day+"&reminder_month="+reminder_month+"&reminder_year="+reminder_year;
	url_param=url_param+"&next_month="+next_month+"&hospital_id="+hospital_id+"&insert_type=Hospital_Ins";


	$.ajax( 
		{ 
			url: hostname+"/includes/add_records.inc.php?" + url_param,
		}
		)
	.done(function(data) {
			RetriveReocrds_Main('Hospitalization','dvHospitalization');
			if (hospital_id=="" || hospital_id =="0")
			{
				//AddCountInTabs('4','false','false');
			}
			//var json = data, obj = JSON.parse(json);
			//uploadFile(obj.message);
		}
	);

	document.getElementById("txt_hospital_id" ).value="";
	document.getElementById("cmb_Hospitalization_Date" ).value="0";
	document.getElementById("cmb_Hospitalization_Month" ).value="0";
	document.getElementById("cmb_Hospitalization_Year" ).value="0";
	document.getElementById("txt_Hospitalization_Hospital_Name" ).value="";
	document.getElementById("ddl_Doc_Consulted_hospital" ).value="0";	
	document.getElementById("txt_Hospitalization_Reason_of_Admission" ).value="";	
	document.getElementById("txt_Hospitalization_Diagnosis" ).value="";	
	document.getElementById("cmb_Hospitalization_Discharge_Date" ).value="0";	
	document.getElementById("cmb_Hospitalization_Discharge_Month" ).value="0";	
	document.getElementById("cmb_Hospitalization_Discharge_Year" ).value="0";	
	document.getElementById("txt_Hospitalization_Diagnosis_Summary" ).value="";	
	document.getElementById("txt_Dc_Resting_Heart_Rate" ).value="";	
	document.getElementById("txt_Hospitalization_Doctor_Instruction" ).value="";	
	document.getElementById("cmb_Hospitalization_Next_Visit_Date" ).value="0";	
	document.getElementById("cmb_Hospitalization_Next_Visit_Month" ).value="0";	
	document.getElementById("cmb_Hospitalization_Next_Visit_Year" ).value="0";	
	document.getElementById("cmb_Hospitalization_Next_Visit_Date" ).value="0";	
	document.getElementById("cmb_Hospitalization_Reminder_Date" ).value="0";
	document.getElementById("cmb_Hospitalization_Reminder_Date_Month" ).value="0";	
	document.getElementById("cmb_Hospitalization_Reminder_Date_Year" ).value="0";	
	document.getElementById("dvEditHosp" ).style.display="none";
	
	//alert("Record saved successfully.");
	
}



function Hospital_Delete_By_Id(id,deleted_id)
{

	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 //alert(message);
				 document.getElementById("tr_hospital_"+deleted_id).style.display='none';
				  AddCountInTabs('4','false','true');
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Hospital_Ins&cid="+id,true);
		xmlhttp.send();
	}
	
}
function Hospital_Retrive_By_Id(id, eid)
{
	//ViewHosp("Show", eid);
	
	var message="";
	var day="";
	if (window.XMLHttpRequest)
	{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
			 message = JSON.parse(xmlhttp.responseText);
			 data = {"records":message};
			 for (var i = 0; i < data.records.length; ++i) {
				 day=data.records[i].consult_day;


	
					 document.getElementById("txt_hospital_id" ).value=data.records[i].hospital_id;
					  document.getElementById("cmb_Hospitalization_Date" ).value=data.records[i].hospital_day;
					  document.getElementById("cmb_Hospitalization_Month" ).value=data.records[i].hospital_month;
					  document.getElementById("cmb_Hospitalization_Year" ).value=data.records[i].hospital_year;
					 document.getElementById("txt_Hospitalization_Hospital_Name" ).value=data.records[i].hospital_name;
					 document.getElementById("ddl_Doc_Consulted_hospital" ).value=data.records[i].doctor_id;	
					  document.getElementById("txt_Hospitalization_Reason_of_Admission" ).value=data.records[i].admission_reason;	
					  document.getElementById("txt_Hospitalization_Diagnosis" ).value=data.records[i].diagnosis;	
					  document.getElementById("cmb_Hospitalization_Discharge_Date" ).value=data.records[i].discharge_day;	
					 document.getElementById("cmb_Hospitalization_Discharge_Month" ).value=data.records[i].discharge_month ;	
					 document.getElementById("cmb_Hospitalization_Discharge_Year" ).value=data.records[i].discharge_year ;	
					 document.getElementById("txt_Hospitalization_Diagnosis_Summary" ).value=data.records[i].diagnosis_summary ;	
					 document.getElementById("txt_Hospitalization_Doctor_Instruction" ).value=data.records[i].doctor_instruction ;	
					 document.getElementById("cmb_Hospitalization_Next_Visit_Date" ).value=data.records[i].next_day ;	
					 document.getElementById("cmb_Hospitalization_Next_Visit_Month" ).value=data.records[i].next_month ;		
					 document.getElementById("cmb_Hospitalization_Next_Visit_Year" ).value=data.records[i].next_year ;	
					 document.getElementById("cmb_Hospitalization_Reminder_Date" ).value=data.records[i].reminder_day ;	
					 document.getElementById("cmb_Hospitalization_Reminder_Date_Month" ).value=data.records[i].reminder_month ;	
					 document.getElementById("cmb_Hospitalization_Reminder_Date_Year" ).value=data.records[i].reminder_year ;	
					 document.getElementById("dvEditHosp" ).style.display="";
				     document.getElementById("rededitbtnhosp"+eid).style.display="";
					 document.getElementById("editbtnhosp"+eid).style.display="none";
					document.getElementById("dvHospNA" ).style.display="none";
					document.getElementById("dvHospNA1" ).style.display="none";
			 }
			 
			  
			

		}
	}
	xmlhttp.open("GET",hostname+"/retrive_files/retrive_reocrds.inc.php?insert_type=Hospital_Ins&cid="+id,true);
	xmlhttp.send();
}




function Family_History_Ins(row)
{

	
	if(document.getElementById("txt_FamilyHistory_Relation").value=="0")
	{
		alert ("Please select relation.");
		document.getElementById("txt_FamilyHistory_Relation").focus();
		return false;
	}
	
	if(document.getElementById("txt_FamilyHistory_MedicalCondition").value=="")
	{
		alert ("Please enter your medical condition.");
		document.getElementById("txt_FamilyHistory_MedicalCondition").focus();
		return false;
	}
	
	
	var td=$(row).parent();
	var family_history_id = $( "#txt_Family_History_ID" ).val();
	var relation_id = $( "#txt_FamilyHistory_Relation" ).val();
	var medical_condition = $( "#txt_FamilyHistory_MedicalCondition" ).val();
	var death_cause = $( "#txt_FamilyHistory_CauseDeath" ).val();
	

	var url_param="family_history_id="+family_history_id+"&relation_id="+relation_id+"&medical_condition="+medical_condition+"&death_cause="+death_cause+"&insert_type=Family_History_Ins";

	$.ajax( 
		{ 
			url: hostname+"/includes/add_records.inc.php?" + url_param,
		}
		)
	.done(function(data) {
			RetriveReocrds_Main('Family_History','dvFamily_History');
			if (family_history_id=="" || family_history_id =="0")
			{
				AddCountInTabs('7','false','false');
			}
			//var json = data, obj = JSON.parse(json);
			//uploadFile(obj.message);
		}
	);


	document.getElementById("txt_Family_History_ID" ).value="";
	document.getElementById("txt_FamilyHistory_Relation" ).value="0";
	document.getElementById("txt_FamilyHistory_MedicalCondition" ).value="";
	document.getElementById("txt_FamilyHistory_CauseDeath" ).value="";
	document.getElementById("dvEditFamily" ).style.display="none";


	//alert("Record saved successfully.");
	
}



function Family_History_Delete_By_Id(id,deleted_id)
{

	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_family_history_"+deleted_id).style.display='none';
				  AddCountInTabs('7','false','true');
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Family_History_Ins&cid="+id,true);
		xmlhttp.send();
	}
	
}


function Family_History_Retrive_By_Id(id, eid)
{
	var message="";
	var day="";
	if (window.XMLHttpRequest)
	{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
			 message = JSON.parse(xmlhttp.responseText);
			 data = {"records":message};
			 for (var i = 0; i < data.records.length; ++i) {
				 day=data.records[i].consult_day;


				 document.getElementById("txt_Family_History_ID" ).value=data.records[i].family_history_id;
				 document.getElementById("txt_FamilyHistory_Relation" ).value=data.records[i].relation_id;
				 document.getElementById("txt_FamilyHistory_MedicalCondition" ).value=data.records[i].medical_condition;
				 document.getElementById("txt_FamilyHistory_CauseDeath" ).value=data.records[i].death_cause;
				 document.getElementById("dvEditFamily" ).style.display="";
		 		 document.getElementById("rededitbtnfamily"+eid).style.display="";
				 document.getElementById("editbtnfamily"+eid).style.display="none";
				 document.getElementById("dvFamilyNA" ).style.display="none";
				 document.getElementById("dvFamilyNA1" ).style.display="none";
			 }
			 
			  
			

		}
	}
	xmlhttp.open("GET",hostname+"/retrive_files/retrive_reocrds.inc.php?insert_type=Family_History_Ins&cid="+id,true);
	xmlhttp.send();
}







function Blood_Pressure_Ins(row)
{

	if(document.getElementById("cmb_DelTrack_Day").value=="0" || document.getElementById("cmb_DelTrack_Month").value=="0" || document.getElementById("cmb_DelTrack_Year").value=="0")
	{
		alert ("Please select checked date.");
		document.getElementById("cmb_DelTrack_Day").focus();
		return false;
	}
	
	var td=$(row).parent();
	var blood_pressure_id = $( "#txt_Blood_Pressure_ID" ).val();
	var blood_pressure_systolic = $( "#txt_DelTrack_BP" ).val();
	var del_track_unit = $( "#txt_DelTrack_Unit" ).val();
	var del_track_day = $( "#cmb_DelTrack_Day" ).val();
	var del_track_month = $( "#cmb_DelTrack_Month" ).val();
	var del_track_year = $( "#cmb_DelTrack_Year" ).val();
	
	

	var url_param="blood_pressure_id="+blood_pressure_id+"&blood_pressure_systolic="+blood_pressure_systolic+"&del_track_unit="+del_track_unit+"&del_track_day="+del_track_day+"&del_track_month="+del_track_month+"&del_track_year="+del_track_year+"&insert_type=Blood_Pressure_Ins";

	console.log(url_param);
	$.ajax( 
		{ 
			url: hostname+"/includes/add_records.inc.php?" + url_param,
			
		}
		)
	.done(function(data) {
			RetriveReocrds_Main('Blood_Pressure','dvBlood_Pressure');
			if (blood_pressure_id=="" || blood_pressure_id =="0")
			{
				AddCountInTabs('8','false','false');
			}
			//var json = data, obj = JSON.parse(json);
			//uploadFile(obj.message);
		}
	);


	document.getElementById("txt_Blood_Pressure_ID" ).value="";
	document.getElementById("txt_DelTrack_BP" ).value="";
	document.getElementById("txt_DelTrack_Unit" ).value="";
	document.getElementById("cmb_DelTrack_Day" ).value="";
	document.getElementById("cmb_DelTrack_Month" ).value="";
	document.getElementById("cmb_DelTrack_Year" ).value="";
	document.getElementById("dvEditBP" ).style.display="none";


	//alert("Record saved successfully.");
	
}



function Blood_Pressure_Delete_By_Id(id,deleted_id)
{

	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_blood_pressure_"+deleted_id).style.display='none';
				  AddCountInTabs('8','false','true');
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Blood_Pressure_Ins&cid="+id,true);
		xmlhttp.send();
	}
	
}


function Blood_Pressure_Retrive_By_Id(id, eid)
{
	var message="";
	var day="";
	//alert (document.getElementById("txt_DelTrack_BP" ).value);
	if (window.XMLHttpRequest)
	{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
			 message = JSON.parse(xmlhttp.responseText);
			 data = {"records":message};
			 for (var i = 0; i < data.records.length; ++i) {
				 day=data.records[i].consult_day;
				   //
				
				 document.getElementById("txt_Blood_Pressure_ID" ).value=data.records[i].blood_pressure_id;
				 document.getElementById("txt_DelTrack_BP" ).value=data.records[i].blood_pressure_systolic+"/"+data.records[i].blood_pressure_diatolic;
				 document.getElementById("txt_DelTrack_Unit" ).value=data.records[i].del_track_unit;
				 document.getElementById("cmb_DelTrack_Day" ).value=data.records[i].del_track_day;
				 document.getElementById("cmb_DelTrack_Month" ).value=data.records[i].del_track_month;
		 		 document.getElementById("cmb_DelTrack_Year" ).value=data.records[i].del_track_year;
				 document.getElementById("dvEditBP" ).style.display="";
				 document.getElementById("rededitbtnBP"+eid).style.display="";
				 document.getElementById("editbtnBP"+eid).style.display="none";
				 document.getElementById("dvBPNA" ).style.display="none";
				 document.getElementById("dvBPNA1" ).style.display="none";
			 }
			 
			  
			

		}
	}
	xmlhttp.open("GET",hostname+"/retrive_files/retrive_reocrds.inc.php?insert_type=Blood_Pressure_Ins&cid="+id,true);
	xmlhttp.send();
}







function Life_Style_Ins(row)
{

	if(document.getElementById("txt_LSSleep").value=="")
	{
		alert ("Please enter your sleep rate.");
		document.getElementById("txt_LSSleep").focus();
		return false;
	}
	
	if(document.getElementById("txt_LSPhysicalStress").value=="0")
	{
		alert ("Please enter your physical stress.");
		document.getElementById("txt_LSPhysicalStress").focus();
		return false;
	}
	
	
	if(document.getElementById("txt_LSPhysicalStress").value!="NA")
	{
		if(document.getElementById("txt_LSPhysicalStresstxt").value=="")
		{
			alert ("Please enter your physical stress in detail.");
			document.getElementById("txt_LSPhysicalStresstxt").focus();
			return false;
		}	
	}
	
	
	
	
	
	if(document.getElementById("txt_LSMentalStress").value=="0")
	{
		alert ("Please enter your mental stress.");
		document.getElementById("txt_LSMentalStress").focus();
		return false;
	}
	
	
	
	
	if(document.getElementById("txt_LSMentalStress").value!="NA")
	{
		if(document.getElementById("txt_LSMentalStresstxt").value=="")
		{
			alert ("Please enter your mental stress in detail.");
			document.getElementById("txt_LSMentalStresstxt").focus();
			return false;
		}
	}
	
	
	
	
	var td=$(row).parent();
	var life_style_id = $( "#txt_Life_Style_ID" ).val();
	var spirit = $( "#txt_LSSpirit" ).val();
	var beer = $( "#txt_LSBeer" ).val();
	var cigarette = $( "#txt_LSCigarette" ).val();
	var life_style_sleep = $( "#txt_LSSleep" ).val();
	var physical_stress = $( "#txt_LSPhysicalStress" ).val();
	var physical_stress_details = $( "#txt_LSPhysicalStresstxt" ).val();
	var mental_stress = $( "#txt_LSMentalStress" ).val();
	var mental_stress_details = $( "#txt_LSMentalStresstxt" ).val();
	var life_style_day = $( "#Date_LS_Day" ).val();
	var life_style_month = $( "#Date_LS_Month" ).val();
	var life_style_year = $( "#Date_LS_Year" ).val();
	

	var url_param="life_style_id="+life_style_id+"&spirit="+spirit+"&beer="+beer+"&cigarette="+cigarette+"&life_style_sleep="+life_style_sleep+"&physical_stress="+physical_stress+"&physical_stress_details="+physical_stress_details+"&mental_stress="+mental_stress+"&mental_stress_details="+mental_stress_details+"&life_style_day="+life_style_day+"&life_style_month="+life_style_month+"&life_style_year="+life_style_year+"&insert_type=Life_Style_Ins";

	$.ajax( 
		{ 
			url: hostname+"/includes/add_records.inc.php?" + url_param,
		}
		)
	.done(function(data) {
			RetriveReocrds_Main('Life_Style','dvLife_Style');
			if (life_style_id=="" || life_style_id =="0")
			{
				//AddCountInTabs('1','false','false');
			}
			//var json = data, obj = JSON.parse(json);
			//uploadFile(obj.message);
		}
	);



	document.getElementById("txt_Life_Style_ID" ).value="";
	document.getElementById("txt_LSSpirit" ).value="";
	document.getElementById("txt_LSBeer" ).value="";
	document.getElementById("txt_LSCigarette" ).value="";
	document.getElementById("txt_LSSleep" ).value="";
	document.getElementById("txt_LSPhysicalStress" ).value="";
	document.getElementById("txt_LSPhysicalStresstxt" ).value="";
	document.getElementById("txt_LSMentalStress" ).value="";
	document.getElementById("txt_LSMentalStresstxt" ).value="";
	document.getElementById("Date_LS_Day" ).value="";
	document.getElementById("Date_LS_Month" ).value="";
	document.getElementById("Date_LS_Year" ).value="";
	document.getElementById("dvEditLife" ).style.display="none";

	//alert("Record saved successfully.");
	
}



function Life_Style_Delete_By_Id(id,deleted_id)
{

	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_life_style_"+deleted_id).style.display='none';
				 // AddCountInTabs('1','false','true');
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Life_Style_Ins&cid="+id,true);
		xmlhttp.send();
	}
	
}


function Life_Style_Retrive_By_Id(id, eid)
{
	var message="";
	var day="";
	if (window.XMLHttpRequest)
	{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
			 message = JSON.parse(xmlhttp.responseText);
			 data = {"records":message};
			 for (var i = 0; i < data.records.length; ++i) {
				 day=data.records[i].consult_day;

				
				document.getElementById("txt_Life_Style_ID" ).value=data.records[i].life_style_id;
				document.getElementById("txt_LSSpirit" ).value=data.records[i].spirit;
				document.getElementById("txt_LSBeer" ).value=data.records[i].beer;
				document.getElementById("txt_LSCigarette" ).value=data.records[i].cigarette;
				document.getElementById("txt_LSSleep" ).value=data.records[i].life_style_sleep;
				document.getElementById("txt_LSPhysicalStress" ).value=data.records[i].physical_stress;
				document.getElementById("txt_LSPhysicalStresstxt" ).value=data.records[i].physical_stress_details;
				document.getElementById("txt_LSMentalStress" ).value=data.records[i].mental_stress;
				document.getElementById("txt_LSMentalStresstxt" ).value=data.records[i].mental_stress_details;
				document.getElementById("Date_LS_Day" ).value=data.records[i].life_style_day;
				document.getElementById("Date_LS_Month" ).value=data.records[i].life_style_month;
				document.getElementById("Date_LS_Year" ).value=data.records[i].life_style_year;
				document.getElementById("dvEditLife" ).style.display="";
				document.getElementById("rededitbtnLife"+eid).style.display="";
				document.getElementById("editbtnLife"+eid).style.display="none";
				document.getElementById("dvLifeStyleNA" ).style.display="none";
				document.getElementById("dvLifeStyleNA1" ).style.display="none";
			 }
			 
			  
			

		}
	}
	xmlhttp.open("GET",hostname+"/retrive_files/retrive_reocrds.inc.php?insert_type=Life_Style_Ins&cid="+id,true);
	xmlhttp.send();
}

$(document).ready(function() {
	var url_param="insert_type=Health_Problem_Ins";
	// process the form
	$('#frmHelathProblem').submit(function(event) {
		 event.preventDefault();
		 var formData = new FormData($("#frmHelathProblem"));
		 $.ajax({
			type: 'POST',
			url :hostname+"/includes/add_records.inc.php?" + url_param,
			 data    : $(this).serialize(),
			 dataType 	: 'json',
			
		  })
		.done(function(data) {
			console.log(data); 
			var HID=document.getElementById("txt_Health_Problem_ID" ).value;
			if (HID=="" || HID =="0")
			{
				AddCountInTabs('6','false','false');
			}
			document.getElementById("txt_Health_Problem_ID" ).value="";
			document.getElementById("cardiacProblemsYes" ).checked=false;
			document.getElementById("cardiacProblemsNo" ).checked=true;
			document.getElementById("EyerelatedProblemsYes" ).checked=false;
			document.getElementById("EyerelatedProblemsNo" ).checked=true;
			document.getElementById("FaceProblemsYes" ).checked=false;
			document.getElementById("FaceProblemsNo" ).checked=true;
			document.getElementById("BloodcirculationYes" ).checked=false;
			document.getElementById("BloodcirculationNo" ).checked=true;
			document.getElementById("FaceskinProblemsYes" ).checked=false;
			document.getElementById("FaceskinProblemsNo" ).checked=true;
			document.getElementById("DigestiveProblemsYes" ).checked=false;
			document.getElementById("DigestiveProblemsNo" ).checked=true;
			document.getElementById("JointpainsProblemsYes" ).checked=false;
			document.getElementById("JointpainsProblemsNo" ).checked=true;
			document.getElementById("ConstipationProblemsYes" ).checked=false;
			document.getElementById("ConstipationProblemsNo" ).checked=true;
			document.getElementById("OtherProblemsYes" ).checked=false;
			document.getElementById("OtherProblemsNo" ).checked=true;
			show20();show22();show6();show8();show10();show12();show14();show16();show18();
			for (i=1;i<54 ;i++ )
			{
				document.getElementById("txt_HP_Problem_"+i ).value="";
				document.getElementById("ddl_HP_Problem_Day"+i ).value="0";
				document.getElementById("ddl_HP_Problem_Month"+i ).value="0";
				document.getElementById("ddl_HP_Problem_Year"+i ).value="0";
				document.getElementById("ddl_HP_Problem_Consulted"+i ).value="0";
			}
			RetriveReocrds_Main("Health_Problems","dvHealth_Problems")
			
			//alert("Record Saved Successfully.");
		})
		.fail(function(data) {
			// show any errors
			// best to remove for production
			//console.log(data);
			alert("fail");
		});
	});

});




function Sugar_Profile_Ins(row)
{

	
	
	var td=$(row).parent();
	var sugar_profile_id = $( "#txt_Sugar_Profile_ID" ).val();
	var fasting_blood_sugar_day = $( "#DT_FBS_Date" ).val();
	var fasting_blood_sugar_month = $( "#DT_FBS_Month" ).val();
	var fasting_blood_sugar_year = $( "#DT_FBS_Year" ).val();
	var post_parandial_day = $( "#DT_PPBS_Date" ).val();
	var post_parandial_month= $( "#DT_PPBS_Month" ).val();
	var post_parandial_year = $( "#DT_PPBS_Year" ).val();	
	var urine_blood_day = $( "#DT_UBS_Date" ).val();	
	var urine_blood_month = $( "#DT_UBS_Month" ).val();	
	var urine_blood_year = $( "#DT_UBS_Year" ).val();	
	var random_blood_sugar_day = $( "#DT_RBS_Date" ).val();	
	var random_blood_sugar_month = $( "#DT_RBS_Month" ).val();	
	var random_blood_sugar_year = $( "#DT_RBS_Year" ).val();	
	var fasting_blood_sugar_result = $( "#txt_Result_FBS" ).val();	
	var post_parandial_result = $( "#txt_Result_PPBS" ).val();	
	var urine_blood_result = $( "#txt_Result_UBS" ).val();	
	var random_blood_sugar_result = $( "#txt_Result_RBS" ).val();	
	var fasting_blood_sugar_range = $( "#txt_Range_FBS" ).val();	
	var fasting_blood_sugar_range1 = $( "#txt_Range_FBS1" ).val();	
	var post_parandial_range = $( "#txt_Range_PPBS" ).val();	
	var post_parandial_range1 = $( "#txt_Range_PPBS1" ).val();	
	var urine_blood_range = $( "#txt_Range_UBS" ).val();	
	var urine_blood_range1 = $( "#txt_Range_UBS1" ).val();		
	var random_blood_sugar_range = $( "#txt_Range_RBS" ).val();	
	var random_blood_sugar_range1 = $( "#txt_Range_RBS1" ).val();
	var fasting_blood_sugar_unit = $( "#txt_Unit_FBS" ).val();	
	var post_parandial_unit = $( "#txt_Unit_PPBS" ).val();	
	var urine_blood_unit = $( "#txt_Unit_UBS" ).val();	
	var random_blood_sugar_unit = $( "#txt_Unit_RBS" ).val();	

	
	var url_param="sugar_profile_id="+sugar_profile_id+"&fasting_blood_sugar_day="+fasting_blood_sugar_day+"&fasting_blood_sugar_month="+fasting_blood_sugar_month+"&fasting_blood_sugar_year="+fasting_blood_sugar_year+"&post_parandial_day="+post_parandial_day;
	url_param=url_param+"&post_parandial_month="+post_parandial_month+"&post_parandial_year="+post_parandial_year+"&urine_blood_day="+urine_blood_day+"&urine_blood_month="+urine_blood_month+"&urine_blood_year="+urine_blood_year+"&random_blood_sugar_day="+random_blood_sugar_day+"&random_blood_sugar_month="+random_blood_sugar_month+"&random_blood_sugar_year="+random_blood_sugar_year+"&fasting_blood_sugar_result="+fasting_blood_sugar_result+"&post_parandial_result="+post_parandial_result+"&urine_blood_result="+urine_blood_result+"&random_blood_sugar_result="+random_blood_sugar_result+"&fasting_blood_sugar_range="+fasting_blood_sugar_range+"&fasting_blood_sugar_range1="+fasting_blood_sugar_range1+"&post_parandial_range="+post_parandial_range+"&post_parandial_range1="+post_parandial_range1+"&urine_blood_range="+urine_blood_range+"&urine_blood_range1="+urine_blood_range1+"&random_blood_sugar_range="+random_blood_sugar_range+"&random_blood_sugar_range1="+random_blood_sugar_range1+"&fasting_blood_sugar_unit="+fasting_blood_sugar_unit+"&post_parandial_unit="+post_parandial_unit+"&urine_blood_unit="+urine_blood_unit+"&random_blood_sugar_unit="+random_blood_sugar_unit+"&insert_type=Sugar_Profile_Ins";
	
//	alert ("dfd");

console.log(url_param);
	$.ajax( 
		{ 
			url: hostname+"/includes/add_records.inc.php?" + url_param,
			
		}
		)
	.done(function(data) {
			   
			
			RetriveReocrds_Main('Sugar_Profile','dvSugar_Profile');
			if (sugar_profile_id=="" || sugar_profile_id =="0")
			{
				AddCountInTabs('9','false','false');
			}
			//var json = data, obj = JSON.parse(json);
			//uploadFile(obj.message);
		}
	);
	
	document.getElementById("txt_Sugar_Profile_ID" ).value="";
	document.getElementById("DT_FBS_Date" ).value="0";
	document.getElementById("DT_FBS_Month" ).value="0";
	document.getElementById("DT_FBS_Year" ).value="0";
	document.getElementById("DT_PPBS_Date" ).value="0";
	document.getElementById("DT_PPBS_Month" ).value="0";
	document.getElementById("DT_PPBS_Year" ).value="0";	
	document.getElementById("DT_UBS_Date" ).value="0";	
	document.getElementById("DT_UBS_Month" ).value="0";	
	document.getElementById("DT_UBS_Year" ).value="0";	
	document.getElementById("DT_RBS_Date" ).value="0";	
	document.getElementById("DT_RBS_Month" ).value="0";	
	document.getElementById("DT_RBS_Year" ).value="0";	
	document.getElementById("txt_Result_FBS" ).value="";	
	document.getElementById("txt_Result_PPBS" ).value="";	
	document.getElementById("txt_Result_UBS" ).value="";	
	document.getElementById("txt_Result_RBS" ).value="";	
	document.getElementById("txt_Range_FBS" ).value="";	
	document.getElementById("txt_Range_FBS1" ).value="";	
	document.getElementById("txt_Range_PPBS" ).value="";	
	document.getElementById("txt_Range_PPBS1" ).value="";	
	document.getElementById("txt_Range_UBS" ).value="";	
	document.getElementById("txt_Range_UBS1" ).value="";		
	document.getElementById("txt_Range_RBS" ).value="";	
	document.getElementById("txt_Range_RBS1" ).value="";
	document.getElementById("txt_Unit_FBS" ).value="";	
	document.getElementById("txt_Unit_PPBS" ).value="";	
	document.getElementById("txt_Unit_UBS" ).value="";	
	document.getElementById("txt_Unit_RBS" ).value="";	
	document.getElementById("dvEditSugar" ).style.display="none";
	//alert("Record saved successfully.");
	
}



function Sugar_Profile_Delete_By_Id(id,deleted_id)
{

	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_sugar_profile_"+deleted_id).style.display='none';
				 AddCountInTabs('9','false','true');
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Sugar_Profile_Ins&cid="+id,true);
		xmlhttp.send();
	}
	
}



function Sugar_Profile_Retrive_By_Id(id, eid)
{
	var message="";
	var day="";
	if (window.XMLHttpRequest)
	{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
			 message = JSON.parse(xmlhttp.responseText);
			 data = {"records":message};
			 for (var i = 0; i < data.records.length; ++i) {
				 day=data.records[i].consult_day;


				document.getElementById("txt_Sugar_Profile_ID" ).value=data.records[i].sugar_profile_id;
				document.getElementById("DT_FBS_Date" ).value=data.records[i].fasting_blood_sugar_day;
				document.getElementById("DT_FBS_Month" ).value=data.records[i].fasting_blood_sugar_month;
				document.getElementById("DT_FBS_Year" ).value=data.records[i].fasting_blood_sugar_year;
				document.getElementById("DT_PPBS_Date" ).value=data.records[i].post_parandial_day;
				document.getElementById("DT_PPBS_Month" ).value=data.records[i].post_parandial_month;
				document.getElementById("DT_PPBS_Year" ).value=data.records[i].post_parandial_year;	
				document.getElementById("DT_UBS_Date" ).value=data.records[i].urine_blood_day;	
				document.getElementById("DT_UBS_Month" ).value=data.records[i].urine_blood_month;	
				document.getElementById("DT_UBS_Year" ).value=data.records[i].urine_blood_year;	
				document.getElementById("DT_RBS_Date" ).value=data.records[i].random_blood_sugar_day;	
				document.getElementById("DT_RBS_Month" ).value=data.records[i].random_blood_sugar_month;	
				document.getElementById("DT_RBS_Year" ).value=data.records[i].random_blood_sugar_year;	
				document.getElementById("txt_Result_FBS" ).value=data.records[i].fasting_blood_sugar_result;	
				document.getElementById("txt_Result_PPBS" ).value=data.records[i].post_parandial_result;	
				document.getElementById("txt_Result_UBS" ).value=data.records[i].urine_blood_result;	
				document.getElementById("txt_Result_RBS" ).value=data.records[i].random_blood_sugar_result;	
				document.getElementById("txt_Range_FBS" ).value=data.records[i].fasting_blood_sugar_range;		
				document.getElementById("txt_Range_FBS1" ).value=data.records[i].fasting_blood_sugar_range1;		
				document.getElementById("txt_Range_PPBS" ).value=data.records[i].post_parandial_range;		
				document.getElementById("txt_Range_PPBS1" ).value=data.records[i].post_parandial_range1;		
				document.getElementById("txt_Range_UBS" ).value=data.records[i].urine_blood_range;		
				document.getElementById("txt_Range_UBS1" ).value=data.records[i].urine_blood_range1;			
				document.getElementById("txt_Range_RBS" ).value=data.records[i].random_blood_sugar_range;		
				document.getElementById("txt_Range_RBS1" ).value=data.records[i].random_blood_sugar_range1;	
				document.getElementById("txt_Unit_FBS" ).value=data.records[i].fasting_blood_sugar_unit;		
				document.getElementById("txt_Unit_PPBS" ).value=data.records[i].post_parandial_unit;		
				document.getElementById("txt_Unit_UBS" ).value=data.records[i].urine_blood_unit;		
				document.getElementById("txt_Unit_RBS" ).value=data.records[i].random_blood_sugar_unit;		
				document.getElementById("dvEditSugar" ).style.display="";
				document.getElementById("rededitbtnSugar"+eid).style.display="";
				document.getElementById("editbtnSugar"+eid).style.display="none"; 
				document.getElementById("dvSugarProfileNA" ).style.display="none";
				document.getElementById("dvSugarProfileNA1" ).style.display="none";
			 }
			 
			  
			

		}
	}
	xmlhttp.open("GET",hostname+"/retrive_files/retrive_reocrds.inc.php?insert_type=Sugar_Profile_Ins&cid="+id,true);
	xmlhttp.send();
}





function Lipid_Profile_Ins(row)
{

	
	
	
	
	var td=$(row).parent();
	var lipid_profile_id = $( "#txt_Lipid_Profile_ID" ).val();
	var triglyceride_blood_sugar_day = $( "#Lipid_Triglyceride_Date" ).val();
	var triglyceride_blood_sugar_month = $( "#Lipid_Triglyceride_Month" ).val();
	var triglyceride_blood_sugar_year = $( "#Lipid_Triglyceride_Year" ).val();
	var ldl_day = $( "#lipid_LDL_Date" ).val();
	var ldl_month= $( "#lipid_LDL_Month" ).val();
	var ldl_year = $( "#lipid_LDL_Year" ).val();	
	var hdl_day = $( "#lipid_HDL_Date" ).val();	
	var hdl_month = $( "#lipid_HDL_Month" ).val();	
	var hdl_year = $( "#lipid_HDL_Year" ).val();	
	var cholesterol_day = $( "#lipid_Cholesterol_Date" ).val();	
	var cholesterol_month = $( "#lipid_Cholesterol_Month" ).val();	
	var cholesterol_year = $( "#lipid_Cholesterol_Year" ).val();	
	var triglyceride_blood_sugar_result = $( "#txt_Result_Triglyceride" ).val();	
	var ldl_result = $( "#txt_Result_LDL" ).val();	
	var hdl_result = $( "#txt_Result_HDL" ).val();	
	var cholesterol_result = $( "#txt_Result_Cholesterol" ).val();	
	var triglyceride_blood_sugar_range = $( "#txt_Range_Triglyceride" ).val();	
	var triglyceride_blood_sugar_range1 = $( "#txt_Range_Triglyceride1" ).val();	
	var ldl_range = $( "#txt_Range_LDL" ).val();	
	var ldl_range1 = $( "#txt_Range_LDL1" ).val();	
	var hdl_range = $( "#txt_Range_HDL" ).val();	
	var hdl_range1 = $( "#txt_Range_HDL1" ).val();		
	var cholesterol_range = $( "#txt_Range_Cholesterol" ).val();	
	var cholesterol_range1 = $( "#txt_Range_Cholesterol1" ).val();
	var triglyceride_blood_sugar_unit = $( "#txt_Unit_Triglyceride" ).val();	
	var ldl_unit = $( "#txt_Unit_LDL" ).val();	
	var hdl_unit = $( "#txt_Unit_HDL" ).val();	
	var cholesterol_unit = $( "#txt_Unit_Cholesterol" ).val();	


	var url_param="lipid_profile_id="+lipid_profile_id+"&triglyceride_blood_sugar_day="+triglyceride_blood_sugar_day+"&triglyceride_blood_sugar_month="+triglyceride_blood_sugar_month+"&triglyceride_blood_sugar_year="+triglyceride_blood_sugar_year+"&ldl_day="+ldl_day;
	url_param=url_param+"&ldl_month="+ldl_month+"&ldl_year="+ldl_year+"&hdl_day="+hdl_day+"&hdl_month="+hdl_month+"&hdl_year="+hdl_year+"&cholesterol_day="+cholesterol_day+"&cholesterol_month="+cholesterol_month+"&cholesterol_year="+cholesterol_year+"&triglyceride_blood_sugar_result="+triglyceride_blood_sugar_result+"&ldl_result="+ldl_result+"&hdl_result="+hdl_result+"&cholesterol_result="+cholesterol_result+"&triglyceride_blood_sugar_range="+triglyceride_blood_sugar_range+"&triglyceride_blood_sugar_range1="+triglyceride_blood_sugar_range1+"&ldl_range="+ldl_range+"&ldl_range1="+ldl_range1+"&hdl_range="+hdl_range+"&hdl_range1="+hdl_range1+"&cholesterol_range="+cholesterol_range+"&cholesterol_range1="+cholesterol_range1+"&triglyceride_blood_sugar_unit="+triglyceride_blood_sugar_unit+"&ldl_unit="+ldl_unit+"&hdl_unit="+hdl_unit+"&cholesterol_unit="+cholesterol_unit+"&insert_type=Lipid_Profile_Ins";


	$.ajax( 
		{ 
			url: hostname+"/includes/add_records.inc.php?" + url_param,
		}
		)
	.done(function(data) {
			RetriveReocrds_Main('Lipid_Profile','dvLipid_Profile');
			if (lipid_profile_id=="" || lipid_profile_id =="0")
			{
				AddCountInTabs('10','false','false');
			}
			//var json = data, obj = JSON.parse(json);
			//uploadFile(obj.message);
		}
	);
	
	document.getElementById("txt_Lipid_Profile_ID" ).value="";
	document.getElementById("Lipid_Triglyceride_Date" ).value="0";
	document.getElementById("Lipid_Triglyceride_Month" ).value="0";
	document.getElementById("Lipid_Triglyceride_Year" ).value="0";
	document.getElementById("lipid_LDL_Date" ).value="0";
	document.getElementById("lipid_LDL_Month" ).value="0";
	document.getElementById("lipid_LDL_Year" ).value="0";	
	document.getElementById("lipid_HDL_Date" ).value="0";	
	document.getElementById("lipid_HDL_Month" ).value="0";	
	document.getElementById("lipid_HDL_Year" ).value="0";	
	document.getElementById("lipid_Cholesterol_Date" ).value="0";	
	document.getElementById("lipid_Cholesterol_Month" ).value="0";	
	document.getElementById("lipid_Cholesterol_Year" ).value="0";	
	document.getElementById("txt_Result_Triglyceride" ).value="";	
	document.getElementById("txt_Result_LDL" ).value="";	
	document.getElementById("txt_Result_HDL" ).value="";	
	document.getElementById("txt_Result_Cholesterol" ).value="";	
	document.getElementById("txt_Range_Triglyceride" ).value="";	
	document.getElementById("txt_Range_Triglyceride1" ).value="";	
	document.getElementById("txt_Range_LDL" ).value="";	
	document.getElementById("txt_Range_LDL1" ).value="";	
	document.getElementById("txt_Range_HDL" ).value="";	
	document.getElementById("txt_Range_HDL1" ).value="";		
	document.getElementById("txt_Range_Cholesterol" ).value="";	
	document.getElementById("txt_Range_Cholesterol1" ).value="";
	document.getElementById("txt_Unit_Triglyceride" ).value="";	
	document.getElementById("txt_Unit_LDL" ).value="";	
	document.getElementById("txt_Unit_HDL" ).value="";	
	document.getElementById("txt_Unit_Cholesterol" ).value="";	
	document.getElementById("dvEditLipid" ).style.display="none";
//	alert("Record saved successfully.");
	
}



function Lipid_Profile_Delete_By_Id(id,deleted_id)
{

	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_lipid_profile_"+deleted_id).style.display='none';
				 AddCountInTabs('10','false','true');
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Lipid_Profile_Ins&cid="+id,true);
		xmlhttp.send();
	}
	
}



function Lipid_Profile_Retrive_By_Id(id, date_cur, eid)
{

	var message="";
	var day="";
	if (window.XMLHttpRequest)
	{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
			 message = JSON.parse(xmlhttp.responseText);
			 data = {"records":message};
			 for (var i = 0; i < data.records.length; ++i) {
				 day=data.records[i].consult_day;


				document.getElementById("txt_Lipid_Profile_ID" ).value=data.records[i].lipid_profile_id;
				document.getElementById("Lipid_Triglyceride_Date" ).value=data.records[i].triglyceride_blood_sugar_day;
				document.getElementById("Lipid_Triglyceride_Month" ).value=data.records[i].triglyceride_blood_sugar_month;
				document.getElementById("Lipid_Triglyceride_Year" ).value=data.records[i].triglyceride_blood_sugar_year;
				document.getElementById("lipid_LDL_Date" ).value=data.records[i].ldl_day;
				document.getElementById("lipid_LDL_Month" ).value=data.records[i].ldl_month;
				document.getElementById("lipid_LDL_Year" ).value=data.records[i].ldl_year;	
				document.getElementById("lipid_HDL_Date" ).value=data.records[i].hdl_day;	
				document.getElementById("lipid_HDL_Month" ).value=data.records[i].hdl_month;	
				document.getElementById("lipid_HDL_Year" ).value=data.records[i].hdl_year;	
				document.getElementById("lipid_Cholesterol_Date" ).value=data.records[i].cholesterol_day;	
				document.getElementById("lipid_Cholesterol_Month" ).value=data.records[i].cholesterol_month;	
				document.getElementById("lipid_Cholesterol_Year" ).value=data.records[i].cholesterol_year;	
				document.getElementById("txt_Result_Triglyceride" ).value=data.records[i].triglyceride_blood_sugar_result;	
				document.getElementById("txt_Result_LDL" ).value=data.records[i].ldl_result;	
				document.getElementById("txt_Result_HDL" ).value=data.records[i].hdl_result;	
				document.getElementById("txt_Result_Cholesterol" ).value=data.records[i].cholesterol_result;	
				document.getElementById("txt_Range_Triglyceride" ).value=data.records[i].triglyceride_blood_sugar_range;		
				document.getElementById("txt_Range_Triglyceride1" ).value=data.records[i].triglyceride_blood_sugar_range1;		
				document.getElementById("txt_Range_LDL" ).value=data.records[i].ldl_range;		
				document.getElementById("txt_Range_LDL1" ).value=data.records[i].ldl_range1;		
				document.getElementById("txt_Range_HDL" ).value=data.records[i].hdl_range;		
				document.getElementById("txt_Range_HDL1" ).value=data.records[i].hdl_range1;			
				document.getElementById("txt_Range_Cholesterol" ).value=data.records[i].cholesterol_range;		
				document.getElementById("txt_Range_Cholesterol1" ).value=data.records[i].cholesterol_range1;	
				document.getElementById("txt_Unit_Triglyceride" ).value=data.records[i].triglyceride_blood_sugar_unit;		
				document.getElementById("txt_Unit_LDL" ).value=data.records[i].ldl_unit;		
				document.getElementById("txt_Unit_HDL" ).value=data.records[i].hdl_unit;		
				document.getElementById("txt_Unit_Cholesterol" ).value=data.records[i].cholesterol_unit;		
				document.getElementById("dvEditLipid" ).style.display="";
				document.getElementById("rededitbtnLipid"+eid).style.display="";
				document.getElementById("editbtnLipid"+eid).style.display="none";
				
				document.getElementById("dvLipidProfileNA" ).style.display="none";
				document.getElementById("dvLipidProfileNA1" ).style.display="none";
				 
			 }
			 
			  
			

		}
	}
	
	xmlhttp.open("GET",hostname+"/retrive_files/retrive_reocrds.inc.php?insert_type=Lipid_Profile_Ins&cid="+id+"&date_cur="+date_cur,true);
	xmlhttp.send();
}

function Health_Problem_Delete_By_Id(id,deleted_id)
{

	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_Health_Problem_"+deleted_id).style.display='none';
				  AddCountInTabs('6','false','true');
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Health_Problem_Ins&cid="+id,true);
		xmlhttp.send();
	}
	
}
function Health_Problem_Retrive_By_Id(id)
{
	var message="";
	var day="";
	if (window.XMLHttpRequest)
	{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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

			
			 message = JSON.parse(xmlhttp.responseText);
			 data = {"records":message};
			 for (var i = 0; i < data.records.length; ++i) {
				 
				 	
				   document.getElementById("txt_Health_Problem_ID" ).value=data.records[i].health_problem_id;	
				    if (data.records[i].cardiac_problem=="Yes")
				   {
						document.getElementById("cardiacProblemsYes" ).checked=true
						show19();
				   }
				    if (data.records[i].eye_problem=="Yes")
				   {
						document.getElementById("EyerelatedProblemsYes" ).checked=true
						show21();
				   }
				    if (data.records[i].kidney_problem=="Yes")
				   {
						document.getElementById("FaceProblemsYes" ).checked=true
						show5();
				   }
				    if (data.records[i].circulation_problem=="Yes")
				   {
						document.getElementById("BloodcirculationYes" ).checked=true
						show7();
				   }
				    if (data.records[i].skin_problem=="Yes")
				   {
						document.getElementById("FaceskinProblemsYes" ).checked=true
						show9();
				   }
				    if (data.records[i].digestive_problem=="Yes")
				   {
						document.getElementById("DigestiveProblemsYes" ).checked=true
						show11();
				   }
				    if (data.records[i].joint_problem=="Yes")
				   {
						document.getElementById("JointpainsProblemsYes" ).checked=true
						show13();
				   }
				    if (data.records[i].constipation_problem=="Yes")
				   {
						document.getElementById("ConstipationProblemsYes" ).checked=true
						show15();
				   }
				    if (data.records[i].other_problem=="Yes")
				   {
						document.getElementById("OtherProblemsYes" ).checked=true
						show17();
				   }

				   
				 Health_Problem_Details_Retrive_By_Id(id);

			 }
			 
			  
			

		}
	}
	xmlhttp.open("GET",hostname+"/retrive_files/retrive_reocrds.inc.php?insert_type=Health_Problem_Ins&cid="+id,true);
	xmlhttp.send();
}

function Health_Problem_Details_Retrive_By_Id(id)
{
	var message="";
	var day="";
	if (window.XMLHttpRequest)
	{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
			 message = JSON.parse(xmlhttp.responseText);
			 data = {"records":message};
			 var a=1;b=6;c=12;d=18;e=24;f=30;g=36;h=42;j=48;
			 for (var i = 0; i < data.records.length; ++i) {
				   if (data.records[i].problem_type=="Cardiac"){SetData_Helth_Problem(a,data,i); a=a+1; }
				   if (data.records[i].problem_type=="Eye"){SetData_Helth_Problem(b,data,i); b=b+1; }
				   if (data.records[i].problem_type=="Kidney"){SetData_Helth_Problem(c,data,i); c=c+1; }
				   if (data.records[i].problem_type=="Circulation"){SetData_Helth_Problem(d,data,i); d=d+1; }
				   if (data.records[i].problem_type=="Skin"){SetData_Helth_Problem(e,data,i); e=e+1; }
				   if (data.records[i].problem_type=="Digestive"){SetData_Helth_Problem(f,data,i); f=f+1; }
				   if (data.records[i].problem_type=="JointPaints"){SetData_Helth_Problem(g,data,i); g=g+1; }
				   if (data.records[i].problem_type=="Constipation"){SetData_Helth_Problem(h,data,i); h=h+1; }
				   if (data.records[i].problem_type=="Other"){SetData_Helth_Problem(j,data,i);  j=j+1;}
			  }
			 
			  
			

		}
	}
	xmlhttp.open("GET",hostname+"/retrive_files/retrive_reocrds.inc.php?insert_type=Health_Problem_Ins_Det&cid="+id,true);
	xmlhttp.send();
}


function SetData_Helth_Problem(iNumber,data,i)
{
	document.getElementById("txt_HP_Problem_"+iNumber).value=data.records[i].problem;
   document.getElementById("ddl_HP_Problem_Day"+iNumber).value=data.records[i].diag_day;
   document.getElementById("ddl_HP_Problem_Month"+iNumber).value=data.records[i].diag_month;
   document.getElementById("ddl_HP_Problem_Year"+iNumber).value=data.records[i].diag_year;
   document.getElementById("ddl_HP_Problem_Consulted"+iNumber).value=data.records[i].doctor_id;
}

function SetFileClick()
{
	document.getElementById("flPhoto").click();
}

function ShowFile()
{
	if (document.getElementById("flPhoto").value!="")
	{
		document.getElementById("dvViewFile").style.display='';
		document.getElementById("aViewFile").href=document.getElementById("flPhoto").value;
	}
	else
	{
		document.getElementById("dvViewFile").style.display='none';
	}
	
}


function ShowFileName()
{
	if (document.getElementById("flPhoto").value!="")
	{
		document.getElementById("dvViewFile").style.display='';
		var path = document.getElementById("flPhoto").value;
		var pos =path.lastIndexOf( path.charAt( path.indexOf(":")+1) );
		
		var filename = path.substring( pos+1);
		

		document.getElementById("aViewFile").innerHTML=filename;
	}
	else
	{
		document.getElementById("dvViewFile").style.display='none';
	}
	
}


function UploadGallery_Delete_By_Id(id,deleted_id)
{

	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_upload_gallery_"+deleted_id).style.display='none';
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=uploadFile&cid="+id,true);
		xmlhttp.send();
	}
	
}



function UploadGallery_Retrive_By_Id(id)
{
	//alert (id);
	var message="";
	if (window.XMLHttpRequest)
	{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
			message = JSON.parse(xmlhttp.responseText);
			 data = {"records":message};
			 data.records.length=1;
			alert(data.records.length);
			 for (var i = 0; i < data.records.length; ++i) {
				///day=data.records[i].report_day;
				document.getElementById("cmb_Report_Day_Doc_pres" ).value=data.records[i].report_day;
				document.getElementById("cmb_Report_Month_Doc_pres" ).value=data.records[i].report_month;	
				document.getElementById("cmb_Report_Year_Doc_pres" ).value=data.records[i].report_year;
				document.getElementById("cmb_Prescription_Reports_Doc_pres" ).value=data.records[i].report_type;
				document.getElementById("txt_Test_Name" ).value=data.records[i].test_name;
				document.getElementById("txt_Lab_Name" ).value=data.records[i].lab_name;
				document.getElementById("txt_Health_Problem" ).value=data.records[i].health_problem;
				document.getElementById("txt_Random_ID" ).value=data.records[i].parent_id;
				document.getElementById("txt_UploadID" ).value=data.records[i].id;
				
			 }
		}
	}
	xmlhttp.open("GET",hostname+"/retrive_files/retrive_reocrds.inc.php?insert_type=uploadFile&cid="+id,true);
	xmlhttp.send();
}


function RetriveReocrds_Upload(dvName,Type)
{
	
	document.getElementById("txt_Type").value=Type;
	var RandomID =document.getElementById("txt_Random_ID").value;
	
	if (RandomID=="" || RandomID=="0")
	{
			RandomID =document.getElementById("txt_Random_ID1").value;
	}
	else
	{
			document.getElementById("txt_Random_ID1").value=document.getElementById("txt_Random_ID").value;
	}
	
	///alert (RandomID);
	
	if (window.XMLHttpRequest)
	{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
			id=RandomID;
			//alert(id);
			document.getElementById(dvName).innerHTML = xmlhttp.responseText;
			ShowReports(id);
		}
	}

	xmlhttp.open("GET",hostname+"/retrive_files/retrive_uploadfile.inc.php?insert_type=uploadFile&randomid="+RandomID+"&type="+Type,true);
	xmlhttp.send();
	
	
	
}


function ChooseFollowUpValue(rowno)
{
	
	document.getElementById("txtQueryIDFinal").value=document.getElementById("txtQueryID"+rowno).value;
	
	
	document.getElementById("txtQueryNo").value=rowno;
}


function Compose_Ins(row)
{
	if(document.getElementById("cmb_Inbox_Query_Type").value=="0")
		{
			alert ("Please select query type.");
			document.getElementById("cmb_Inbox_Query_Type").focus();
			return false;
		}
		
		
	if(document.getElementById("cmb_Inbox_Query_Type").value=="1")
	{
		if(document.getElementById("cmb_Inbox_Body_Area").value=="0")
		{
			alert ("Please select body area.");
			document.getElementById("cmb_Inbox_Body_Area").focus();
			return false;
		}
		if(document.getElementById("txt_Inbox_Message").value=="")
		{
			alert ("Please enter complaint.");
			document.getElementById("txt_Inbox_Message").focus();
			return false;
		}
		
		if(document.getElementById("txt_Inbox_Symptoms").value=="")
		{
			alert ("Please enter symptoms.");
			document.getElementById("txt_Inbox_Symptoms").focus();
			return false;
		}
		
		if(document.getElementById("txt_Inbox_suffer_Medical_Problem").value=="")
		{
			alert ("How often you suffer from this Medical Problem?");
			document.getElementById("txt_Inbox_suffer_Medical_Problem").focus();
			return false;
		}
		
		if(document.getElementById("txt_Inbox_suffer_Medical_Problem").value=="")
		{
			alert ("How often you suffer from this Medical Problem?");
			document.getElementById("txt_Inbox_suffer_Medical_Problem").focus();
			return false;
		}
		
		
	
	}
	
	
	var td=$(row).parent();
	var query_type = $( "#cmb_Inbox_Query_Type" ).val();
	var status = $( "#txtStatus" ).val();
	
	if(query_type=="1")
	{
		var body_area = $( "#cmb_Inbox_Body_Area" ).val();
		var complaint = $( "#txt_Inbox_Message").val();
		var suffer_from = $( "#txt_Inbox_suffer_Medical_Problem" ).val();
		var last_occurrency_day= $( "#cmb_Day" ).val();
		var last_occurrency_month = $( "#cmb_Month" ).val();	
		var last_occurrency_year = $( "#cmb_Year" ).val();	
		var doctor_id = $( "#ddl_Doc_Consulted" ).val();	
		var doc_comment = $( "#cmb_Inbox_Doctor_Comment" ).val();
		var upload_report = $( "#flPhoto" ).val();	
		var symptoms = $( "#txt_Inbox_Symptoms" ).val();	
		
		var doctor_consulted ="No";
		if ($("#Consulted_of_problem").is(':checked')==true)
		{
			doctor_consulted ="Yes";		
		}
		
		
		var video_query_requirement ="No";
		if ($("#Inbox_Video_Query").is(':checked')==true)
		{
			video_query_requirement ="Yes";		
		}
		var prescription_report = $( "#totalreports" ).val();	
		var lab_test_report = $( "#totallabreports" ).val();	
		var radiology_report = $( "#totalradreports" ).val();	
		
		var prescription_type = $( "#txtPrescription" ).val();	
		var lab_test_type = $( "#txtLabReport" ).val();	
		var radiology_type = $( "#txtRadiology" ).val();	
		var queryid="0";
	}
	
	else if(query_type=="2")
	{
		
		//var queryno = $( "#cbFollowup" ).val();	
		
		//alert (queryno);
		
		var queryid = $( "#txtQueryIDFinal").val();	
		
		if(queryid=="")
		{
			queryid="0";
		}
		
	    var queryno=$( "#txtQueryNo").val();
		
		if ($("#cbFollowup").is(':checked')==true)
		{
			queryno=$( "#txtQueryNo").val();
		}
	   
		
		//alert (queryno);
		
		var complaint = $( "#cmb_Inbox_User_Query").val();
		var body_area= $( "#txtQueryBodyArea"+queryno).val();
		var suffer_from= $( "#txtQuerySuffer"+queryno).val();
		var last_occurrency_day=$( "#txtQueryLday"+queryno).val();
		var last_occurrency_month =$( "#txtQueryLMonth"+queryno).val();
		var last_occurrency_year=$( "#txtQueryLYear"+queryno).val();
		
		var doctor_id=$( "#txtQueryDId"+queryno).val();
		var doc_comment=$( "#txtQueryDCom"+queryno).val();
		
		var doctor_consulted =$( "#txtQueryDConsult"+queryno).val();
		var upload_report = $( "#flPhoto" ).val();	
		var symptoms =$( "#txtQuerySym"+queryno).val();
		
		var video_query_requirement ="No";
		if ($("#Inbox_Video_Query").is(':checked')==true)
		{
			video_query_requirement ="Yes";		
		}
		var prescription_report = $( "#totalreports" ).val();	
		var lab_test_report = $( "#totallabreports" ).val();	
		var radiology_report = $( "#totalradreports" ).val();	
		
		var prescription_type = $( "#txtPrescription" ).val();	
		var lab_test_type = $( "#txtLabReport" ).val();	
		var radiology_type = $( "#txtRadiology" ).val();
		
	
		
	}
	
	
	
	
	var query_comp = $( "#txtQueryComplaint"+queryno).val();		
	var query_bodyarea = $( "#txtQueryBodyArea"+queryno).val();		
	var query_sym = $( "#txtQuerySym"+queryno).val();	

	var mail_id = $( "#txtMailID" ).val();	
	
	
	//var url_param="query_type="+query_type+"&body_area="+body_area+"&suffer_from="+suffer_from+"&doctor_id="+doctor_id+"&last_occurrency_day="+last_occurrency_day+"&last_occurrency_month="+last_occurrency_month+"&last_occurrency_year="+last_occurrency_year+"&doc_comment="+doc_comment+"&doctor_consulted="+doctor_consulted+"&video_query_requirement="+video_query_requirement+"&mail_id="+mail_id+"&complaint="+complaint+"&upload_report="+upload_report+"&query="+query+"&status="+status+"&queryid="+queryid+"&prescription_report="+prescription_report+"&lab_test_report="+lab_test_report+"&radiology_report="+radiology_report+"&prescription_type="+prescription_type+"&lab_test_type="+lab_test_type+"&radiology_type="+radiology_type+"&symptoms="+symptoms+"&query_comp="+query_comp+"&query_bodyarea="+query_bodyarea+"&query_sym="+query_sym+"&insert_type=Compose_Ins";
	
	var url_param="query_type="+query_type+"&body_area="+body_area+"&suffer_from="+suffer_from+"&doctor_id="+doctor_id+"&last_occurrency_day="+last_occurrency_day+"&last_occurrency_month="+last_occurrency_month+"&last_occurrency_year="+last_occurrency_year+"&doc_comment="+doc_comment+"&doctor_consulted="+doctor_consulted+"&video_query_requirement="+video_query_requirement+"&mail_id="+mail_id+"&complaint="+complaint+"&upload_report="+upload_report+"&status="+status+"&queryid="+queryid+"&prescription_report="+prescription_report+"&lab_test_report="+lab_test_report+"&radiology_report="+radiology_report+"&prescription_type="+prescription_type+"&lab_test_type="+lab_test_type+"&radiology_type="+radiology_type+"&symptoms="+symptoms+"&insert_type=Compose_Ins";
	
	///alert (url_param);

	console.log(url_param);
	$.ajax( { 
		url: hostname+"/includes/add_records.inc.php?" + url_param,
		success: function(result) {
			//console.log( $(result) );
		}	
	} );

	document.getElementById("cmb_Day" ).value="0";
	document.getElementById("cmb_Month" ).value="0";
	document.getElementById("cmb_Year" ).value="0";
	document.getElementById("ddl_Doc_Consulted" ).value="0";
	document.getElementById("cmb_Inbox_Query_Type" ).value="0";	
	document.getElementById("cmb_Inbox_Body_Area" ).value="";	
	document.getElementById("txt_Inbox_suffer_Medical_Problem" ).value="";	
	document.getElementById("ddl_Doc_Consulted" ).value="0";	
	document.getElementById("cmb_Inbox_Doctor_Comment" ).value="";	
	document.getElementById("Inbox_Video_Query" ).value="";	
	document.getElementById("txtMailID" ).value="";	
	document.getElementById("txt_Inbox_Message" ).value="";	
	document.getElementById("tbPrescription" ).style.display="none";	

	//RetriveReocrds_Main('Compose_Ins','dvCompose');
	alert("Mail sent successfully.");
	redirectURL(hostname+"/page.php?dir=inbox/compose_doctor");
	
}



function Nutritionist_Ins(row)
{
	var td=$(row).parent();
	var subject = $( "#txt_Inbox_Subject" ).val();
	var mail_id = $( "#txtSubjectID" ).val();	
	var message = $( "#txt_Inbox_Message" ).val();	
	
	var url_param="status=Inbox&subject="+subject+"&mail_id="+mail_id+"&message="+message+"&insert_type=Nutritionist_Ins";
	
	///alert (url_param);

	console.log(url_param);
	$.ajax( { 
		url: hostname+"/includes/add_records.inc.php?" + url_param,
		success: function(result) {
			//console.log( $(result) );
		}	
	} );

	document.getElementById("txt_Inbox_Subject" ).value="";	
	document.getElementById("txtSubjectID" ).value="";	
	document.getElementById("txt_Inbox_Message" ).value="";	

	//RetriveReocrds_Main('Compose_Ins','dvCompose');
	alert("Mail sent successfully.");
	redirectURL(hostname+"/page.php?dir=inbox/compose_nutritionist");
	
}


function Calorie_Ins(row)
{
	
	if(document.getElementById("calorie_txt_Goal_Weight").value=="")
	{
		alert ("Please enter your goal weight.");
		document.getElementById("calorie_txt_Goal_Weight").focus();
		return false;
	}
	
	if(document.getElementById("calorie_cmb_goal").value=="0")
	{
		alert ("Please select what is your goal?");
		document.getElementById("calorie_cmb_goal").focus();
		return false;
	}
	
	
	if(document.getElementById("txtDailyActivity").value=="")
	{
		alert ("How would you describe your normal daily activities?");
		//document.getElementById("DvActivites").style.border="1px solid red";
		return false;
	}
	
	if(document.getElementById("calorie_cmb_Year_day_sitting").value=="0")
	{
		alert ("How many workouts a week do you plan on exercising");
		document.getElementById("calorie_cmb_Year_day_sitting").focus();
		return false;
	}
	
	if(document.getElementById("txt_plan_hour").value=="")
	{
		alert ("How many minutes per workout a week do you plan on exercising?");
		document.getElementById("txt_plan_hour").focus();
		return false;
	}
	
	
	var td=$(row).parent();
	var curr_wgt = $( "#calorie_txt_Current_Weight" ).val();
	var goal_wgt = $( "#calorie_txt_Goal_Weight" ).val();	
	var target_goal = $( "#calorie_cmb_goal" ).val();	
	var curr_height = $( "#calorie_txt_Height" ).val();	
	var dob_day = $( "#calorie_cmb_Day" ).val();	
	var dob_month = $( "#calorie_cmb_Month" ).val();	
	var dob_year = $( "#calorie_cmb_Year" ).val();	
	var daily_activity = $( "#txtDailyActivity" ).val();	
	var plan_week = $( "#calorie_cmb_Year_day_sitting" ).val();	
	var plan_hour = $( "#txt_plan_hour" ).val();	
	var current_waist = $( "#calorie_txt_Current_Waist" ).val();	
	var current_hips = $( "#calorie_txt_Current_Hips" ).val();	
	var current_arm = $( "#calorie_txt_Current_Arms" ).val();	
	var goal_waist = $( "#calorie_txt_Goal_Waist" ).val();	
	var goal_hips = $( "#calorie_txt_Goal_Hips" ).val();	
	var goal_arms = $( "#calorie_txt_Goal_Arms" ).val();	
	
	


	var cur_height_type ="FT";
	if ($("#txtHeightTypeCM").is(':checked')==true)
	{
		cur_height_type ="CM";		
	}
	
	//alert(cur_height_type);
	
	var gender ="Male";	

	if ($("#calorie_Gender_F").is(':checked')==true)
	{
		gender ="Female";	
	}

	//alert(gender);
	 
	var calorie_id = $( "#txtCalorie" ).val();	
	var ismain = $( "#txtIsMain" ).val();	
	
	
	
	var url_param="curr_wgt="+curr_wgt+"&goal_wgt="+goal_wgt+"&target_goal="+target_goal+"&curr_height="+curr_height+"&cur_height_type="+cur_height_type+"&gender="+gender+"&dob_day="+dob_day+"&dob_month="+dob_month+"&dob_year="+dob_year+"&daily_activity="+daily_activity+"&plan_week="+plan_week+"&plan_hour="+plan_hour+"&current_waist="+current_waist+"&current_hips="+current_hips+"&current_arm="+current_arm+"&goal_waist="+goal_waist+"&goal_hips="+goal_hips+"&goal_arms="+goal_arms+"&plan_week="+plan_week+"&ismain="+ismain+"&calorie_id="+calorie_id+"&insert_type=Calorie_Ins";
	
	///alert (url_param);

	console.log(url_param);

	$.ajax( 
		{ 
			url: hostname+"/includes/add_records.inc.php?" + url_param,
		}
		)
	.done(function(data) {
			redirectURL(hostname+"/page.php?dir=calories/setup2");
			//var json = data, obj = JSON.parse(json);
			//uploadFile(obj.message);
		}
	);


	/*$.ajax( { 
		url: hostname+"/includes/add_records.inc.php?" + url_param,
		success: function(result) {
			//alert (result);
			console.log( $(result) );
		}	
	} );

	/*document.getElementById("calorie_txt_Current_Weight" ).value="";	
	document.getElementById("calorie_txt_Goal_Weight" ).value="";	
	document.getElementById("calorie_txt_Height" ).value="";
	document.getElementById("calorie_cmb_goal" ).value="";
	document.getElementById("txtHeightType" ).value="";
	document.getElementById("calorie_txt_Height" ).value="";
	document.getElementById("calorie_Gender" ).value="0";
	document.getElementById("calorie_cmb_Day" ).value="0";
	document.getElementById("calorie_cmb_Month" ).value="0";
	document.getElementById("calorie_cmb_Year" ).value="0";
	document.getElementById("txtDailyActivity" ).value="";
	document.getElementById("calorie_cmb_Year_day_sitting" ).value="0";
	document.getElementById("txt_plan_hour" ).value="";
	document.getElementById("calorie_txt_Current_Waist" ).value="";
	document.getElementById("calorie_txt_Current_Hips" ).value="";
	document.getElementById("calorie_txt_Current_Arms" ).value="";
	document.getElementById("calorie_txt_Goal_Waist" ).value="";
	document.getElementById("calorie_txt_Goal_Hips" ).value="";
	document.getElementById("calorie_txt_Goal_Arms" ).value="";*/

	//RetriveReocrds_Main('Compose_Ins','dvCompose');
	//alert("Record saved successfully.");
	//redirectURL(hostname+"/page.php?dir=calories/setup2");
}





function Calorie_Delete_By_Id(id,deleted_id)
{

	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_calorie"+deleted_id).style.display='none';
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Calorie_Ins&cid="+id,true);
		xmlhttp.send();
	}
	
}
function Calorie_Retrive_By_Id(id)
{
	var message="";
	var day="";
	//var Type="Calorie";
	if (window.XMLHttpRequest)
	{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
			 message = JSON.parse(xmlhttp.responseText);
			 data = {"records":message};
			 for (var i = 0; i < data.records.length; ++i) {
				 day=data.records[i].consult_day;

					
					document.getElementById("calorie_txt_Current_Weight" ).value=data.records[i].curr_wgt;
					document.getElementById("calorie_txt_Goal_Weight" ).value=data.records[i].goal_wgt;	
					document.getElementById("calorie_txt_Height" ).value=data.records[i].curr_height;
					document.getElementById("calorie_cmb_goal" ).value=data.records[i].target_goal;
					document.getElementById("txtHeightType" ).value=data.records[i].cur_height_type;
					document.getElementById("calorie_Gender" ).value=data.records[i].gender;
					document.getElementById("calorie_cmb_Day" ).value=data.records[i].dob_day;
					document.getElementById("calorie_cmb_Month" ).value=data.records[i].dob_month;
					document.getElementById("calorie_cmb_Year" ).value=data.records[i].dob_year;
					document.getElementById("txtDailyActivity" ).value=data.records[i].daily_activity;
					document.getElementById("calorie_cmb_Year_day_sitting" ).value=data.records[i].plan_week;
					document.getElementById("txt_plan_hour" ).value=data.records[i].plan_hour;
				 	
					document.getElementById("calorie_txt_Current_Waist" ).value=data.records[i].current_waist;
					document.getElementById("calorie_txt_Current_Hips" ).value=data.records[i].current_hips;
					document.getElementById("calorie_txt_Current_Arms" ).value=data.records[i].current_arm;
					document.getElementById("calorie_txt_Goal_Waist" ).value=data.records[i].goal_waist;
					document.getElementById("calorie_txt_Goal_Hips" ).value=data.records[i].goal_hips;
					document.getElementById("calorie_txt_Goal_Arms" ).value=data.records[i].goal_arms;
			 }
	
		}
	}
	xmlhttp.open("GET",hostname+"/retrive_files/retrive_reocrds.inc.php?insert_type=Calorie_Ins&cid="+id,true);
	xmlhttp.send();
}



function Radiology_Retrive_By_Id(id)
{
	
	var message="";
	var day="";
	if (window.XMLHttpRequest)
	{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
			
			 message = JSON.parse(xmlhttp.responseText);
			 data = {"records":message};
			
			 for (var i = 0; i < data.records.length; ++i) {
				day=data.records[i].report_day;

			 
				document.getElementById("cmb_Report_Day_Doc_pres" ).value=data.records[i].report_day;
				document.getElementById("cmb_Report_Month_Doc_pres" ).value=data.records[i].report_month;	
				document.getElementById("cmb_Report_Year_Doc_pres" ).value=data.records[i].report_year;
				document.getElementById("cmb_Prescription_Reports_Doc_pres" ).value=data.records[i].report_type;
				document.getElementById("txt_Test_Name" ).value=data.records[i].test_name;
				document.getElementById("txt_Lab_Name" ).value=data.records[i].lab_name;
				document.getElementById("txt_Health_Problem" ).value=data.records[i].health_problem;
				document.getElementById("txt_Random_ID" ).value=data.records[i].parent_id;
				document.getElementById("txt_UploadID" ).value=data.records[i].id;
				
			 }
		}
	}
	xmlhttp.open("GET",hostname+"/retrive_files/retrive_reocrds.inc.php?insert_type=Radiology&cid="+id,true);
	xmlhttp.send();
}

function Calorie_Details_Ins(row)
{
	var td=$(row).parent();
	
	var current_weight_day = $( "#Weight_Day" ).val();	
	var current_weight_month = $( "#Weight_Month" ).val();	
	var current_weight_year = $( "#Weight_Year" ).val();
	var curr_wgt = $( "#txtWeightResult" ).val();
	
	var current_waist_day = $( "#Waist_Day" ).val();	
	var current_waist_month = $( "#Waist_Month" ).val();	
	var current_waist_year = $( "#Waist_Year" ).val();
	var current_waist = $( "#txtWaistResult" ).val();
	
	var current_hips_day = $( "#Hips_Day" ).val();	
	var current_hips_month = $( "#Hips_Month" ).val();	
	var current_hips_year = $( "#Hips_Year" ).val();
	var current_hips = $( "#txtHipsResult" ).val();
	
	var current_arms_day = $( "#Arms_Day" ).val();	
	var current_arms_month = $( "#Arms_Month" ).val();	
	var current_arms_year = $( "#Arms_Year" ).val();
	var current_arm = $( "#txtArmsResult" ).val();
	
	var ismain = $( "#txtMainID" ).val();	
	var cadetid = $( "#txtCalorieDetID" ).val();
	
	
	var url_param="current_weight_day="+current_weight_day+"&current_weight_month="+current_weight_month+"&current_weight_year="+current_weight_year+"&curr_wgt="+curr_wgt+"&current_waist_day="+current_waist_day+"&current_waist_month="+current_waist_month+"&current_waist_year="+current_waist_year+"&current_waist="+current_waist+"&current_hips="+current_hips+"&current_hips_day="+current_hips_day+"&current_hips_month="+current_hips_month+"&current_hips_year="+current_hips_year+"&current_arms_day="+current_arms_day+"&ismain="+ismain+"&current_arms_month="+current_arms_month+"&current_arms_year="+current_arms_year+"&current_arm="+current_arm+"&cadetid="+cadetid+"&ismain="+ismain+"&insert_type=Calorie_Details_Ins";
	
	///alert (url_param);

	console.log(url_param);
	$.ajax( { 
		url: hostname+"/includes/add_records.inc.php?" + url_param,
		success: function(result) {
			//console.log( $(result) );
		}	
	} );

	
	
	document.getElementById("Weight_Day" ).value="";	
	document.getElementById("Weight_Month" ).value="";	
	document.getElementById("Weight_Year" ).value="";
	document.getElementById("Waist_Day" ).value="";
	document.getElementById("Waist_Month" ).value="";
	document.getElementById("Waist_Year" ).value="";
	document.getElementById("Hips_Day" ).value="0";
	document.getElementById("Hips_Month" ).value="0";
	document.getElementById("Hips_Year" ).value="0";
	document.getElementById("Arms_Day" ).value="0";
	document.getElementById("Arms_Month" ).value="";
	document.getElementById("Arms_Year" ).value="0";
	document.getElementById("txtWeightResult" ).value="";
	document.getElementById("txtWaistResult" ).value="";
	document.getElementById("txtHipsResult" ).value="";
	document.getElementById("txtArmsResult" ).value="";


	RetriveReocrds_Main('CalorieDet','dvCalorieDet');
	//alert("Record saved successfully.");
	///redirectURL(hostname+"/page.php?dir=calories/setup2");
}


function Calorie_Details_Delete_By_Id(id,deleted_id)
{

	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_calorie_det_"+deleted_id).style.display='none';
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Calorie_Details_Ins&cid="+id,true);
		xmlhttp.send();
	}
	
}
function Calorie_Details_Retrive_By_Id(id)
{
	var message="";
	var day="";
	//var Type="Calorie";
	if (window.XMLHttpRequest)
	{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
			 message = JSON.parse(xmlhttp.responseText);
			 data = {"records":message};
			 for (var i = 0; i < data.records.length; ++i) {
					
					var weight_date=data.records[i].weight_date;
					var waist_date=data.records[i].waist_date;
					var arms_date=data.records[i].arms_date;
					var hips_date=data.records[i].hips_date;

					var dt = new Date(weight_date);
					document.getElementById("Weight_Day" ).value=dt.getDate();
					document.getElementById("Weight_Month" ).value=dt.getMonth();
					document.getElementById("Weight_Year" ).value=dt.getFullYear();
					
					dt = new Date(waist_date);
					document.getElementById("Waist_Day" ).value=dt.getDate();
					document.getElementById("Waist_Month" ).value=dt.getMonth();
					document.getElementById("Waist_Year" ).value=dt.getFullYear();
					
					dt = new Date(hips_date);
					document.getElementById("Hips_Day" ).value=dt.getDate();
					document.getElementById("Hips_Month" ).value=dt.getMonth();
					document.getElementById("Hips_Year" ).value=dt.getFullYear();
					
					dt = new Date(arms_date);
					document.getElementById("Arms_Day" ).value=dt.getDate();
					document.getElementById("Arms_Month" ).value=dt.getMonth();
					document.getElementById("Arms_Year" ).value=dt.getFullYear();
					

					document.getElementById("txtWeightResult" ).value=data.records[i].curr_wgt;
					document.getElementById("txtWaistResult" ).value=data.records[i].current_waist;
					document.getElementById("txtHipsResult" ).value=data.records[i].current_hips;
					document.getElementById("txtArmsResult" ).value=data.records[i].current_arm;
					document.getElementById("txtCalorieDetID" ).value=data.records[i].id;
					
			}
	
		}
	}
	xmlhttp.open("GET",hostname+"/retrive_files/retrive_reocrds.inc.php?insert_type=Calorie_Details_Ins&cid="+id,true);
	xmlhttp.send();
}

function Profession_Delete_By_Id(id,deleted_id)
{
   // alert (id);
	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_profession_"+deleted_id).style.display='none';
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Profession&cid="+id,true);
		xmlhttp.send();
	}
	
}
function Top_Story_Delete_By_Id(id,deleted_id)
{
   // alert (id);
	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_top_story_"+deleted_id).style.display='none';
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Top_Story&cid="+id,true);
		xmlhttp.send();
	}
	
}

function Relation_Delete_By_Id(id,deleted_id)
{
  //  alert (id);
	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 //alert(message);
				 document.getElementById("tr_relation_"+deleted_id).style.display='none';
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Relation&cid="+id,true);
		xmlhttp.send();
	}
	
}

function BP_Delete_By_Id(id,deleted_id)
{
  //  alert (id);
	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 //alert(message);
				 document.getElementById("tr_bp_"+deleted_id).style.display='none';
			}
		}
		alert(hostname+"/includes/delete_reocrds.inc.php?insert_type=BP_Range&cid="+id);
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=BP_Range&cid="+id,true);
		xmlhttp.send();
	}
	
}

function Dignosed_Conditions_Delete_By_Id(id,deleted_id)
{
    //alert (id);
	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_dignosed_conditions_"+deleted_id).style.display='none';
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Dignosed_Conditions&cid="+id,true);
		xmlhttp.send();
	}
	
}

function Allergy_Delete_By_Id(id,deleted_id)
{
    //alert (id);
	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_allergy_"+deleted_id).style.display='none';
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Allergy&cid="+id,true);
		xmlhttp.send();
	}
	
}


function Doctor_Ins(row)
{
	
	
	if(document.getElementById("txtName").value=="")
	{
		alert ("Please enter Doctor Name.");
		document.getElementById("txtName").focus();
		return false;
	}
	
	if(document.getElementById("txtHospital").value=="0")
	{
		alert ("Please enter Hospital or Clinic Name.");
		document.getElementById("txtHospital").focus();
		return false;
	}
	
	
	
	if(document.getElementById("txtSpecialization").value=="0")
	{
		alert ("Please enter specialization.");
		document.getElementById("txtSpecialization").focus();
		return false;
	}
	
	
	if(document.getElementById("txtContact").value=="")
	{
		alert ("Please enter contact no.");
		document.getElementById("txtContact").focus();
		return false;
	}
	
	
	if(document.getElementById("txtEmail").value=="")
	{
		alert ("Please enter Email ID.");
		document.getElementById("txtEmail").focus();
		return false;
	}
	
	var td=$(row).parent();
	
	var doctor_name = $( "#txtName" ).val();
	var hospital_name = $( "#txtHospital" ).val();
	var hospital_address = $( "#txtHospitalAddress" ).val();
	var hospital_city = $( "#txtHospitalCity" ).val();
	var hospital_area = $( "#txtHospitalArea" ).val();
	var specialization= $( "#txtSpecialization" ).val();
	var contact = $( "#txtContact" ).val();	
	var email = $( "#txtEmail" ).val();	
	var type = $( "#txtType" ).val();	
	var doctor_id = $( "#txtDoctorID" ).val();	

	var url_param="doctor_name="+doctor_name+"&hospital_name="+hospital_name+"&hospital_address="+hospital_address+"&hospital_city="+hospital_city+"&hospital_area="+hospital_area+"&specialization="+specialization+"&contact="+contact+"&email="+email+"&doctor_id="+doctor_id+"&type="+type+"&insert_type=Doctor_Ins";


	console.log(url_param);
	
	
	$.ajax( 
		{ 
			url: hostname+"/includes/add_records.inc.php?" + url_param,
		}
		)
	.done(function(data) {
			RetriveReocrds_Main('Doctor','dvDoctor');
			redirectURL(window.location.href);
		}
	);

	document.getElementById("txtName" ).value="";
	document.getElementById("txtType" ).value="";
	document.getElementById("txtHospital" ).value="";
	document.getElementById("txtHospitalAddress" ).value="";
	document.getElementById("txtHospitalCity" ).value="";
	document.getElementById("txtHospitalArea" ).value="";
	document.getElementById("txtSpecialization" ).value="";
	document.getElementById("txtContact" ).value="";	
	document.getElementById("txtEmail" ).value="";	
	document.getElementById("txtDoctorID" ).value="";	
	
	
	//RetriveReocrds_Main('Doctor','dvDoctor');
	//redirectURL(window.location.href);
	//alert("Record saved successfully.");
	
}

function Doctor_Retrive_By_Id(id)
{
	var message="";
	var day="";
	var type=document.getElementById("txtType").value;
	
	
	
	if (window.XMLHttpRequest)
	{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
			 message = JSON.parse(xmlhttp.responseText);
			 data = {"records":message};
			 for (var i = 0; i < data.records.length; ++i) {
				// day=data.records[i].consult_day;
					
					document.getElementById("txtName" ).value=data.records[i].doctor_name;
					document.getElementById("txtHospital" ).value=data.records[i].hospital_name;
					document.getElementById("txtHospitalAddress" ).value=data.records[i].hospital_address;
					document.getElementById("txtSpecialization" ).value=data.records[i].specialization;
					document.getElementById("txtContact" ).value=data.records[i].contact;
					document.getElementById("txtEmail" ).value=data.records[i].email;
					document.getElementById("txtHospitalCity" ).value=data.records[i].hospital_city;
					document.getElementById("txtHospitalArea" ).value=data.records[i].hospital_area;
					document.getElementById("txtType" ).value=data.records[i].type;
					document.getElementById("txtDoctorID" ).value=data.records[i].doctor_id;
					
			}
	
		}
	}
	
	//alert(hostname+"/retrive_files/retrive_reocrds.inc.php?insert_type=Doctor_Ins&cid="+id+"&type="+type);
	xmlhttp.open("GET",hostname+"/retrive_files/retrive_reocrds.inc.php?insert_type=Doctor_Ins&cid="+id+"&type="+type,true);
	xmlhttp.send();
}


function Doctor_Delete_By_Id(id,deleted_id)
{
    //alert (id);
	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_doctor_"+deleted_id).style.display='none';
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Doctor&cid="+id,true);
		xmlhttp.send();
	}
	
}



function Hospital_Master(row)
{
	
	
	if(document.getElementById("txtHospitalName").value=="")
	{
		alert ("Please enter Hospital Name.");
		document.getElementById("txtHospitalName").focus();
		return false;
	}
	
	var td=$(row).parent();
	
	var hospital_name = $( "#txtHospitalName" ).val();
	var hospital_address1 = $( "#txtHospitalAddress1" ).val();
	var hospital_address2 = $( "#txtHospitalAddress2" ).val();
	var hospital_address3 = $( "#txtHospitalAddress3" ).val();
	var contact = $( "#txtContact" ).val();	
	var email = $( "#txtEmail" ).val();	
	var contact_person = $( "#txtContactPersonName" ).val();	
	var contact_person_contact = $( "#txtContactPersonContact" ).val();	
	var contact_person_mail = $( "#txtContactPersonEmail" ).val();	
	var hospital_id = $( "#txtHospitalID" ).val();	

	var url_param="hospital_name="+hospital_name+"&hospital_address1="+hospital_address1+"&hospital_address2="+hospital_address2+"&hospital_address3="+hospital_address3+"&contact="+contact+"&email="+email+"&contact_person="+contact_person+"&contact_person_contact="+contact_person_contact+"&contact_person_mail="+contact_person_mail+"&hospital_id="+hospital_id+"&insert_type=Hospital_Master";


	console.log(url_param);
	$.ajax( { 
				url: hostname+"/includes/add_records.inc.php?" + url_param,
				success: function(result) {
					//console.log( $(result) );
				}	
	} );

	document.getElementById("txtHospitalName" ).value="";
	document.getElementById("txtHospitalAddress1" ).value="";
	document.getElementById("txtHospitalAddress2" ).value="";
	document.getElementById("txtHospitalAddress3" ).value="";
//	document.getElementById("txtSpecialization" ).value="";
	document.getElementById("txtContact" ).value="";	
	document.getElementById("txtEmail" ).value="";	
	document.getElementById("txtContactPersonName" ).value="";	
	document.getElementById("txtContactPersonContact" ).value="";	
	document.getElementById("txtContactPersonEmail" ).value="";	
	document.getElementById("txtHospitalID" ).value="";	
	
	document.getElementById("dvEdit" ).style.display="none";
	
	

	RetriveReocrds_Main('HospitalMaster','dvHospitalMaster');

	//alert("Record saved successfully.");
	
}


function Hospital_Master_Retrive_By_Id(id, eid)
{
	var message="";
	var day="";
	
	if (window.XMLHttpRequest)
	{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
			 message = JSON.parse(xmlhttp.responseText);
			 data = {"records":message};
			 for (var i = 0; i < data.records.length; ++i) {
				// day=data.records[i].consult_day;

					document.getElementById("txtHospitalName" ).value=data.records[i].hospital_name;
					document.getElementById("txtHospitalAddress1" ).value=data.records[i].hospital_address1;
					document.getElementById("txtHospitalAddress2" ).value=data.records[i].hospital_address2;
					document.getElementById("txtHospitalAddress3" ).value=data.records[i].hospital_address3;
					document.getElementById("txtContact" ).value=data.records[i].contact;
					document.getElementById("txtEmail" ).value=data.records[i].email;
					document.getElementById("txtContactPersonName" ).value=data.records[i].contact_person;
					document.getElementById("txtContactPersonContact" ).value=data.records[i].contact_person_contact;
					document.getElementById("txtContactPersonEmail" ).value=data.records[i].contact_person_mail;
					document.getElementById("txtHospitalID" ).value=data.records[i].hospital_id;
					
					document.getElementById("dvEdit").style.display="";
					document.getElementById("rededitbtn"+eid).style.display="";
					document.getElementById("editbtn"+eid).style.display="none";
					
			
			}
	
		}
	}
	xmlhttp.open("GET",hostname+"/retrive_files/retrive_reocrds.inc.php?insert_type=Hospital_Master&cid="+id,true);
	xmlhttp.send();
}


function Hospital_Master_Delete_By_Id(id,deleted_id)
{
    //alert (id);
	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_hospital_master_"+deleted_id).style.display='none';
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Hospital_Master&cid="+id,true);
		xmlhttp.send();
	}
	
}



function Specialization_Delete_By_Id(id,deleted_id)
{
    //alert (id);
	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_specialization_"+deleted_id).style.display='none';
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Specialization&cid="+id,true);
		xmlhttp.send();
	}
	
}

function Symptom_Delete_By_Id(id,deleted_id)
{
    //alert (id);
	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_symptom"+deleted_id).style.display='none';
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Symptom&cid="+id,true);
		xmlhttp.send();
	}
	
}


function Symptom_Cat_Delete_By_Id(id,deleted_id)
{
	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_symptom_cat_"+deleted_id).style.display='none';
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Symptom_Cat&cid="+id,true);
		xmlhttp.send();
	}
}


function Symptom_Sub_Cat_Delete_By_Id(id,deleted_id)
{
	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_symptom_sub_cat_"+deleted_id).style.display='none';
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Symptom_Sub_Cat&cid="+id,true);
		xmlhttp.send();
	}
}

function RetriveDropdownDoctor_old()
{
    //alert (id);
	var  txtCommonDoctorID=document.getElementById("txtCommonDoctorID").value;
			
		var  txtCommonDoctorType=document.getElementById("txtCommonDoctorType").value;
		
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				// alert(message);
				 
				 document.getElementById(txtCommonDoctorID).innerHTML=message;
			}
		}
		xmlhttp.open("GET",hostname+"/includes/get_common_doctor.inc.php?name="+ txtCommonDoctorType,true);
		xmlhttp.send();
	
	
}

function RetriveDropdownDoctor()
{
    //alert (id);
	
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				// alert(message);
				 if(document.getElementById("ddl_Doc_Consulted")!=null)
				 {
				 	document.getElementById("ddl_Doc_Consulted").innerHTML=message;
				 }
				 if(document.getElementById("txt_AL_Doctor_Consulted")!=null)
				 {
				 	document.getElementById("txt_AL_Doctor_Consulted").innerHTML=message;
				 }
				 if(document.getElementById("ddl_Doc_Consulted_hospital")!=null)
				 {
				 	document.getElementById("ddl_Doc_Consulted_hospital").innerHTML=message;
				 }
				 
			}
		}
		xmlhttp.open("GET",hostname+"/includes/get_common_doctor.inc.php?name="+ txtCommonDoctorType,true);
		xmlhttp.send();
	
	
}




function Common_Doctor_Ins(row, close_box)
{
	if(document.getElementById("txtName").value=="")
	{
		alert ("Please enter Doctor Name.");
		document.getElementById("txtName").focus();
		return false;
	}
	
	
	var td=$(row).parent();
	
	var doctor_name = $( "#txtName" ).val();
	var doctor_last_name = $( "#txtLastName" ).val();
	var hospital_name = $( "#txtHospital" ).val();
	var specialization= $( "#txtSpecialization" ).val();
	var contact = $( "#txtContact" ).val();	
	var email = $( "#txtEmail" ).val();	
	var doctor_id = $( "#txtDoctorID" ).val();	

	var url_param="doctor_name="+doctor_name+"&doctor_last_name="+doctor_last_name+"&hospital_name="+hospital_name+"&specialization="+specialization+"&contact="+contact+"&email="+email+"&doctor_id="+doctor_id+"&insert_type=Common_Doctor_Ins";


	$.ajax( 
		{ 
			url: hostname+"/includes/add_records.inc.php?" + url_param,
		}
		)
	.done(function(data) {
			RetriveDropdownDoctor();
			//var json = data, obj = JSON.parse(json);
			//uploadFile(obj.message);
		}
	);



	document.getElementById("txtName" ).value="";
	document.getElementById("txtLastName" ).value="";
	document.getElementById("txtHospital" ).value="";
	document.getElementById("txtSpecialization" ).value="";
	document.getElementById("txtContact" ).value="";	
	document.getElementById("txtEmail" ).value="";	
	document.getElementById("txtDoctorID" ).value="";	
	

	if(close_box=="1")
	{
		showCancel();	
	}
	
	//RetriveReocrds_Main('Doctor','dvDoctor');

	//alert("Record saved successfully.");
	//document.getElementByClassName('frmclickhere').style.display = 'none'; 
}





function Food_Delete_By_Id(id,deleted_id)
{

	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_food_"+deleted_id).style.display='none';
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Food&cid="+id,true);
		xmlhttp.send();
	}
	
}


function Exercise_Delete_By_Id(id,deleted_id)
{

	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_exercise_"+deleted_id).style.display='none';
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Exercise&cid="+id,true);
		xmlhttp.send();
	}
	
}


function Diet_Exercise_Delete_By_Id(id,deleted_id)
{
	var dietexercisetotal=document.getElementById("txtDietExeTotal").value;
	
	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_diet_exercise_"+deleted_id).style.display='none';
				// alert(dietfoodtotal);
				 dietexercisetotal=parseFloat(dietexercisetotal);
				 dietexercisetotal=dietexercisetotal-1;
				// alert(dietfoodtotal);
				 document.getElementById("txtDietExeTotal").value=dietexercisetotal;
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Exercise_Diet&cid="+id,true);
		xmlhttp.send();
	}
	
}



function Diet_Food_Delete_By_Id(id,deleted_id)
{

	var dietfoodtotal=document.getElementById("txtDietNutTotal").value;
	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_diet_food_"+deleted_id).style.display='none';
				 Retrive_Total_Cal();
				 //alert(dietfoodtotal);
				 dietfoodtotal=parseFloat(dietfoodtotal);
				 dietfoodtotal=dietfoodtotal-1;
				// alert(dietfoodtotal);
				 document.getElementById("txtDietNutTotal").value=dietfoodtotal;
				 
			}
		}	
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Food_Diet&cid="+id,true);
		xmlhttp.send();
	}
	
}


function setsugardate()
{
		fbday = $( "#DT_FBS_Date" ).val();
		ppbsday = $( "#DT_PPBS_Date" ).val();
		ubday = $( "#DT_UBS_Date" ).val();
		rbday = $( "#DT_RBS_Date" ).val();
		
		fbmonth = $( "#DT_FBS_Month" ).val();
		ppbsmonth = $( "#DT_PPBS_Month" ).val();
		ubmonth = $( "#DT_UBS_Month" ).val();
		rbmonth = $( "#DT_RBS_Month" ).val();
		
		
		fbyear = $( "#DT_FBS_Year" ).val();
		ppbsyear = $( "#DT_PPBS_Year" ).val();
		ubyear = $( "#DT_UBS_Year" ).val();
		rbyear = $( "#DT_RBS_Year" ).val();
				
			
		
		
		if(fbday!="0")
		{
			document.getElementById('DT_PPBS_Date').value = document.getElementById('DT_FBS_Date').value;
			document.getElementById('DT_UBS_Date').value = document.getElementById('DT_FBS_Date').value;
			document.getElementById('DT_RBS_Date').value = document.getElementById('DT_FBS_Date').value;
		}
		if(ppbsday!="0")
		{
			document.getElementById('DT_FBS_Date').value = document.getElementById('DT_PPBS_Date').value;
			document.getElementById('DT_UBS_Date').value = document.getElementById('DT_PPBS_Date').value;
			document.getElementById('DT_RBS_Date').value = document.getElementById('DT_PPBS_Date').value;
		}
		if(ubday!="0")
		{
			document.getElementById('DT_FBS_Date').value = document.getElementById('DT_UBS_Date').value;
			document.getElementById('DT_RBS_Date').value = document.getElementById('DT_UBS_Date').value;
			document.getElementById('DT_PPBS_Date').value = document.getElementById('DT_UBS_Date').value;
		}
		if(rbday!="0")
		{
			document.getElementById('DT_FBS_Date').value = document.getElementById('DT_RBS_Date').value;
			document.getElementById('DT_UBS_Date').value = document.getElementById('DT_RBS_Date').value;
			document.getElementById('DT_PPBS_Date').value = document.getElementById('DT_RBS_Date').value;
		}
		
}


function checkduplicationprofile(type, row)
{
		var day=0;
		var month=0;
		var year=0;
		var edit_id=0;
		var date=year+"-"+month+"-"+day;
		
		//alert (message);
		
		var message = "";
		if (type=="Sugar_Profile")
		{
				day = $( "#DT_FBS_Date" ).val();
				month = $( "#DT_FBS_Month" ).val();
				year = $( "#DT_FBS_Year" ).val();
				edit_id = $( "#txt_Sugar_Profile_ID" ).val();
				date=year+"-"+month+"-"+day;
				
				fbday = $( "#DT_FBS_Date" ).val();
				ppbsday = $( "#DT_PPBS_Date" ).val();
				ubday = $( "#DT_UBS_Date" ).val();
				rbday = $( "#DT_RBS_Date" ).val();
				
				fbmonth = $( "#DT_FBS_Month" ).val();
				ppbsmonth = $( "#DT_PPBS_Month" ).val();
				ubmonth = $( "#DT_UBS_Month" ).val();
				rbmonth = $( "#DT_RBS_Month" ).val();
				
				
				fbyear = $( "#DT_FBS_Year" ).val();
				ppbsyear = $( "#DT_PPBS_Year" ).val();
				ubyear = $( "#DT_UBS_Year" ).val();
				rbyear = $( "#DT_RBS_Year" ).val();
				
				
	
			
				
		}
		
		
		if(day!="0" && month!="0" && year!="0") {
			
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
					//alert (message);
					message = message.split('###');
					if(message[1] == "true") {
						alert ("Duplicate date record exist.");
					}	
					else
					{
						if (type=="Sugar_Profile")
						{
							Sugar_Profile_Ins(row);
						}
					}
				}
			}
			xmlhttp.open("GET",hostname+"/includes/checkduplication.inc.php?type="+type+"&value="+date+"&edit_id="+edit_id, true);
			xmlhttp.send();
		}
		return false;
}



function Patient_Ins(row)
{
	
	var td=$(row).parent();
	
	var patient_id = $( "#txtClientID"+row).val();
	var doctor_id = $( "#txtDoctorID"+row).val();
	var accept_id = $( "#txtAcceptID"+row).val();	
	var compose_id = $( "#txtComposeID"+row).val();	
	var type = $( "#txtType"+row).val();	

	var url_param="patient_id="+patient_id+"&doctor_id="+doctor_id+"&accept_id="+accept_id+"&compose_id="+compose_id+"&type="+type+"&insert_type=Patient_Ins";

	console.log(url_param);
	$.ajax( 
		{ 
			url: hostname+"/includes/add_records.inc.php?" + url_param,
		}
		)
	.done(function(data) {
				
			
			var json = data; var obj = JSON.parse(json);
		
			
			//alert (data);
			if(obj.message=="recordexist")
			{
				alert ("Sorry! This patient has been attended!");
			}
			else
			{
				ShowPatients("Show", row);
				
			}
		}
	);
	
	
	


	//RetriveReocrds_Main('Doctor','dvDoctor');

//	alert("This patient is accepted.");
	
}




function setuploadate(Type)
{
	//var Type=document.getElementById('txt_Type').value;
	
	//alert(Type);
	if(Type=="Doc_Consult")
	{
		var doc_day = document.getElementById('ddl_Doc_Day').value;
		var doc_month = document.getElementById('ddl_Doc_Month').value;
		var doc_year = document.getElementById('ddl_Doc_Year').value;
	}
	
	else if(Type=="Allergy")
	{
		var doc_day = document.getElementById('txt_AL_Allergic_ConsultationDay').value;
		var doc_month = document.getElementById('txt_AL_Allergic_ConsultationMonth').value;
		var doc_year = document.getElementById('txt_AL_Allergic_ConsultationYear').value;
	}
	
	
	document.getElementById('cmb_Report_Day_Doc_pres').value=doc_day;
	document.getElementById('cmb_Report_Month_Doc_pres').value=doc_month;
	document.getElementById('cmb_Report_Year_Doc_pres').value=doc_year;
	
	//alert (document.getElementById('cmb_Report_Year_Doc_pres').value);
	//alert (doc_day);

}


function SetCommentType(type)
{
	document.getElementById('txtType').value=type;	
	
	
	if (type=="MD")
	{
		document.getElementById("dvSentPatient").style.opacity = "0.4";
		document.getElementById("txtAdvicePatient").disabled = true; 
		document.getElementById("txtInternalAdvicePatient").disabled = true; 
		//document.getElementById("SendPatientBtn").onclick= ""; 
		
		
		document.getElementById("txtMDInternalAdvicePatient").disabled = false; 
		document.getElementById("ddl_MD_Doctor").disabled = false; 
		document.getElementById("dvReferMD").style.opacity = "1";
		
		
		document.getElementById("txtInternalAdvicePatient").value = ""; 
		document.getElementById("txtAdvicePatient").value = ""; 
		
	}
	
	else if (type=="Patient")
	{
		document.getElementById("dvReferMD").style.opacity = "0.4";
		document.getElementById("txtMDInternalAdvicePatient").disabled = true; 
		document.getElementById("ddl_MD_Doctor").disabled = true; 
		//document.getElementById("SendPatientBtn").onclick= ""; 
		
		document.getElementById("dvSentPatient").style.opacity = "1";
		document.getElementById("txtAdvicePatient").disabled = false; 
		document.getElementById("txtInternalAdvicePatient").disabled = false; 
		
		document.getElementById("txtMDInternalAdvicePatient").value = ""; 
		document.getElementById("ddl_MD_Doctor").value = ""; 
	}
	
	
}


function Doctor_Comment(row)
{
	
	var td=$(row).parent();
	var patient_id = $( "#txtPatientID" ).val();
	var doctor_id = $( "#txtDoctorID" ).val();
	var comment_id = $( "#txtCommentID" ).val();
	var accept_id = $( "#txtAcceptID" ).val();
	var compose_id = $( "#txtComposeID" ).val();
	
	var doc_name = $( "#txtDoctorName" ).val();
	var specialization = $( "#txtSpecialization" ).val();
	var hosp_name = $( "#txtHospital" ).val();
	var licenceno = $( "#txtLicenceNo" ).val();
	
	var type = $( "#txtType" ).val();
	var md_id = $( "#ddl_MD_Doctor" ).val();
	
	if(type=="")
	{
		alert ("Please select query type");
		return false;
	}
	
	
	if (type=="MD")
	{
		if(md_id=="0")	
		{
			alert("Please select MD.");
			return false;
		}
		
	}
	
	
	/*if (type=="MD")
	{
		if ($("#txtMDAdvicePatient" ).val()=="")
		{
			alert("Please enter advice");
			$("#txtMDAdvicePatient" ).focus();
			return false;
		}
	}*/
	
	
	if (type=="Patient")
	{
		if ($("#txtAdvicePatient" ).val()=="")
		{
			alert("Please enter advice");
			$("#txtAdvicePatient" ).focus();
			return false;
		}
	}
	
	
	if (type=="MD")
	{
		var doctor_advice = $( "#txtMDAdvicePatient" ).val();	
		var doctor_internal_advice = $( "#txtMDInternalAdvicePatient" ).val();	
	}
	else
	{
		var doctor_advice = $( "#txtAdvicePatient" ).val();	
		var doctor_internal_advice = $( "#txtInternalAdvicePatient" ).val();	
	
	}

	
	if(confirm("Are you sure do you want to send details?"))
	{
		
		document.getElementById("dvLoader").style.display='';
		
		var url_param="patient_id="+patient_id+"&doctor_id="+doctor_id+"&doctor_advice="+doctor_advice+"&type="+type+"&md_id="+md_id+"&doctor_internal_advice="+doctor_internal_advice+"&comment_id="+comment_id+"&compose_id="+compose_id+"&accept_id="+accept_id+"&doc_name="+doc_name+"&specialization="+specialization+"&hosp_name="+hosp_name+"&licenceno="+licenceno+"&insert_type=Doctor_Comment_Ins";
		
		//alert (url_param);
	
		console.log(url_param);
		$.ajax( 
			{ 
				url: hostname+"/includes/add_records.inc.php?" + url_param,
			}
			)
		.done(function(data) {
				
				RetriveReocrds_Main('Doctor_Comment_Ins','dvDocComments');
				document.getElementById("dvLoader").style.display='none';
				document.getElementById("dvNext" ).style.display="";
				//var json = data, obj = JSON.parse(json);
				//uploadFile(obj.message);
			}
		);
	
		document.getElementById("txtInternalAdvicePatient" ).value="";
		document.getElementById("txtAdvicePatient" ).value="";
		document.getElementById("txtMDInternalAdvicePatient" ).value="";
		document.getElementById("txtMDAdvicePatient" ).value="";
		document.getElementById("txtCommentID" ).value="";
		document.getElementById("txtDoctorName" ).value="";
		document.getElementById("txtSpecialization" ).value="";
		document.getElementById("txtHospital" ).value="";
		document.getElementById("txtLicenceNo" ).value="";
		document.getElementById("trQuery" ).style.display="none";
		
	}

}


function MD_Comment(row, rejected)
{
	
	var msg="";
	var td=$(row).parent();
	var patient_id = $( "#txtPatientID" ).val();
	var ref_doctor_id = $( "#txtDoctorID" ).val();
	var compose_id = $( "#txtComposeID" ).val();
	var comment_id = $( "#txtCommentID" ).val();
	var accept_id = $( "#txtAcceptID" ).val();
	
	var hospital_id = $( "#txtHospitalID" ).val();
	var hospital_name = $( "#txtHospitalName" ).val();
	var doc_comment_id = $( "#txtDoc_Comment_ID" ).val();
	
	var type = $( "#txtType" ).val();
	var md_id = $( "#txtMDID" ).val();
	var md_advice = $( "#txtAdvicePatient" ).val();	
	var md_internal_advice = $( "#txtInternalAdvicePatient" ).val();	
	
	var app_day = $( "#ddl_App_Day" ).val();	
	var app_month = $( "#ddl_App_Month" ).val();	
	var app_year = $( "#ddl_App_Year" ).val();	
	var time_from = $( "#ddl_App_From" ).val();	
	var time_to = $( "#ddl_App_To" ).val();	
	var video_query = $( "#txtVideoQuery" ).val();	
	
	if(video_query=="1" && rejected!="1")
	{
		if(document.getElementById("ddl_App_Day").value=="0" || document.getElementById("ddl_App_Month").value=="0" || document.getElementById("ddl_App_Year").value=="0")
		{
			alert ("Please select appointment date.");
			document.getElementById("ddl_App_Day").focus();
			return false;
		}
		
		
		if(document.getElementById("ddl_App_From").value=="0")
		{
			alert ("Please select appointment time.");
			document.getElementById("ddl_App_From").focus();
			return false;
		}
		
		if(document.getElementById("ddl_App_To").value=="0")
		{
			alert ("Please select appointment time.");
			document.getElementById("ddl_App_To").focus();
			return false;
		}
	
	
	}
	
	
	if(rejected=="0")
		{
			msg="Are you sure do you want to send details?";
			if ($("#txtAdvicePatient" ).val()=="")
			{
				alert("Please enter advice");
				$("#txtAdvicePatient" ).focus();
				return false;
			}
		}
		else
		{
			msg="Are you sure do you want to reject this patient?";
			if ($("#txtAdvicePatient" ).val()=="")
			{
				alert("Please enter reason.");
				$("#txtAdvicePatient" ).focus();
				return false;
			}
		}
	
	if(confirm(msg))
	{
		
		document.getElementById("dvLoader").style.display='';
		var url_param="patient_id="+patient_id+"&ref_doctor_id="+ref_doctor_id+"&md_advice="+md_advice+"&md_internal_advice="+md_internal_advice+"&type="+type+"&md_id="+md_id+"&comment_id="+comment_id+"&compose_id="+compose_id+"&accept_id="+accept_id+"&rejected="+rejected+"&app_day="+app_day+"&app_month="+app_month+"&app_year="+app_year+"&time_from="+time_from+"&time_to="+time_to+"&hospital_id="+hospital_id+"&hospital_name="+hospital_name+"&video_query="+video_query+"&doc_comment_id="+doc_comment_id+"&insert_type=MD_Comment_Ins";
		
		//alert (url_param);
	
	   console.log(url_param);
		$.ajax( 
			{ 
				url: hostname+"/includes/add_records.inc.php?" + url_param,
			}
			)
		.done(function(data) {
				
				RetriveReocrds_Main('MD_Comment_Ins','dvMDComments');
				document.getElementById("dvLoader").style.display='none';
				document.getElementById("dvNext" ).style.display="";
				//var json = data, obj = JSON.parse(json);
				//uploadFile(obj.message);
			}
		);
		document.getElementById("txtAdvicePatient" ).value="";
		document.getElementById("txtCommentID" ).value="";
		document.getElementById("trQuery" ).style.display="none";
		
	}
}



function Diet_Plan_Delete_By_Id(id,deleted_id)
{
	
	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_diet_plan_"+deleted_id).style.display='none';
				 redirectURL(window.location.href);
				
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Diet_Plan_Remove&cid="+id,true);
		xmlhttp.send();
	}
	
}


function Clerk_Ins(row)
{
	
	
	if(document.getElementById("txtClerkName").value=="")
	{
		alert ("Please enter Clerk Name.");
		document.getElementById("txtClerkName").focus();
		return false;
	}
	
	if(document.getElementById("txtClerkHospital").value=="")
	{
		alert ("Please select Hospital Name.");
		document.getElementById("txtClerkHospital").focus();
		return false;
	}
	
	
	if(document.getElementById("txtClerkContact").value=="")
	{
		alert ("Please enter contact no.");
		document.getElementById("txtClerkContact").focus();
		return false;
	}
	
	
	if(document.getElementById("txtClerkEmail").value=="")
	{
		alert ("Please enter Email ID.");
		document.getElementById("txtClerkEmail").focus();
		return false;
	}
	
	var td=$(row).parent();
	
	var clerk_name = $( "#txtClerkName" ).val();
	var hospital_name = $( "#txtClerkHospital" ).val();
	var contact = $( "#txtClerkContact" ).val();	
	var email = $( "#txtClerkEmail" ).val();	
	var clerk_id = $( "#txtClerkID" ).val();	

	var url_param="clerk_name="+clerk_name+"&hospital_name="+hospital_name+"&contact="+contact+"&email="+email+"&clerk_id="+clerk_id+"&insert_type=Clerk_Ins";


	console.log(url_param);
			$.ajax( 
				{ 
					url: hostname+"/includes/add_records.inc.php?" + url_param,
				}
				)
			.done(function(data) {
					
					RetriveReocrds_Main('Clerk','dvClerk');
					document.getElementById("dvLoader").style.display='none';
					//var json = data, obj = JSON.parse(json);
					//uploadFile(obj.message);
				}
			);

	document.getElementById("txtClerkName" ).value="";
	document.getElementById("txtClerkHospital" ).value="";
	document.getElementById("txtClerkContact" ).value="";
	document.getElementById("txtClerkEmail" ).value="";
	document.getElementById("txtClerkID" ).value="";	
	

	//alert("Record saved successfully.");
	
}



function Clerk_Retrive_By_Id(id)
{
	var message="";
	var day="";
	
	
	if (window.XMLHttpRequest)
	{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
			 message = JSON.parse(xmlhttp.responseText);
			 data = {"records":message};
			 for (var i = 0; i < data.records.length; ++i) {
				// day=data.records[i].consult_day;
					
					document.getElementById("txtClerkName" ).value=data.records[i].clerk_name;
					document.getElementById("txtClerkHospital" ).value=data.records[i].hospital_name;
					document.getElementById("txtClerkContact" ).value=data.records[i].contact;
					document.getElementById("txtClerkEmail" ).value=data.records[i].email;
					document.getElementById("txtClerkID" ).value=data.records[i].clerk_id;
					
			}
	
		}
	}
	xmlhttp.open("GET",hostname+"/retrive_files/retrive_reocrds.inc.php?insert_type=Clerk_Ins&cid="+id,true);
	xmlhttp.send();
}


function Clerk_Delete_By_Id(id,deleted_id)
{
    //alert (id);
	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_clerk_"+deleted_id).style.display='none';
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Clerk_Ins&cid="+id,true);
		xmlhttp.send();
	}
	
}


function SendReply(row)
{
	//alert ("dfdf");
	var td=$(row).parent();
	var patient_id = $( "#txtReplyTo" ).val();
	var nutritionist_id = $( "#txtNutritionistID" ).val();
	var comment_id = $( "#txtCommentID" ).val();
	var compose_id = $( "#txtComposeID" ).val();
	var comment = $( "#comment" ).val();
	var subject= $( "#txtSubject" ).val();	
	var new_folder_id= $( "#txtNewFolderID" ).val();	

	if(document.getElementById("comment").value=="")
	{
		alert ("Please enter to reply.");
		document.getElementById("comment").focus();
		return false;
	}
	
	
	var url_param="subject="+subject+"&patient_id="+patient_id+"&nutritionist_id="+nutritionist_id+"&comment_id="+comment_id+"&compose_id="+compose_id+"&comment="+comment+"&insert_type=SendReply";
		
		//alert (url_param);
		

		console.log(url_param);
		$.ajax( 
			{ 
				url: hostname+"/includes/add_records.inc.php?" + url_param,
			}
			)
		.done(function(data) {
				 alert ("Mail sent Successfully.");
				redirectURL(hostname+"/page_doctor.php?dir=nutritionist/view_mails&status=sent&folderid="+new_folder_id);
			}
		);

		 

}



function SendSuggestion(row)
{
	//alert ("dfdf");
	
	if(document.getElementById("txtNutSuggestion").value=="")
	{
		alert ("Please enter to reply.");
		document.getElementById("txtNutSuggestion").focus();
		return false;
	}
	
	
	
	var td=$(row).parent();
	var patient_id = $( "#txtReplyTo" ).val();
	var nutritionist_id = $( "#txtNutritionistID" ).val();
	var comment_id = $( "#txtCommentID" ).val();
	var compose_id = $( "#txtComposeID" ).val();
	var comment = $( "#txtNutSuggestion" ).val();

	//alert(comment);
	
	var url_param="patient_id="+patient_id+"&nutritionist_id="+nutritionist_id+"&comment_id="+comment_id+"&compose_id="+compose_id+"&comment="+comment+"&insert_type=SendReply";
		
		//alert (url_param);
	
		console.log(url_param);
			$.ajax( 
				{ 
					url: hostname+"/includes/add_records.inc.php?" + url_param,
				}
			
			);
		alert ("Suggestion sent Successfully.");
			
		document.getElementById("txtNutSuggestion" ).value="";
		
		redirectURL(window.location.href);
}




function Add_Comment(row)
{
	//alert ("dfdf");
	var td=$(row).parent();
	var patient_id = $( "#txtPatientId" ).val();
	var nutritionist_id = $( "#txtNutId" ).val();
	var comment_id = $( "#txtCommentID" ).val();
	var record_date = $( "#txtComDate" ).val();
	var comment = $( "#txtNutComment" ).val();
	
	var cons_comment = $( "#txtConsComment" ).val();
	var physical_comment = $( "#txtPhysicalActivityComment" ).val();
	var size_comment = $( "#txtSizeComment" ).val();
	
	var Repatientid = $( "#txtRePatientId" ).val();
	var compose_id = $( "#txtReComposeId" ).val();
	var parent_id = $( "#txtParentId" ).val();

	if(document.getElementById("txtNutComment").value=="")
	{
		alert ("Please enter to reply.");
		document.getElementById("txtNutComment").focus();
		return false;
	}
	
	
	var url_param="patient_id="+patient_id+"&nutritionist_id="+nutritionist_id+"&comment_id="+comment_id+"&record_date="+record_date+"&comment="+comment+"&cons_comment="+cons_comment+"&physical_comment="+physical_comment+"&size_comment="+size_comment+"&insert_type=SendComment";
		
		//alert (url_param);
	
		console.log(url_param);
			$.ajax( 
				{ 
					url: hostname+"/includes/add_records.inc.php?" + url_param,
					
				}
			
			);
		alert ("Mail sent Successfully.");
		document.getElementById("txtNutComment" ).value="";
		document.getElementById("txtConsComment" ).value="";
		document.getElementById("txtPhysicalActivityComment" ).value="";
		document.getElementById("txtSizeComment" ).value="";
		redirectURL(hostname+"/page_doctor.php?dir=nutritionist/details&patient_id="+Repatientid+"&compose_id="+compose_id+"&parent_id="+parent_id);

}






function MD_App(row)
{
	 var current_date = new Date(); //Today Date
	 
	//alert(current_date); 
	var h = current_date.getHours();
    var m = current_date.getMinutes();
    var s = current_date.getSeconds();
	
	var ampm = h >= 12;
 	h = h % 12;
  
  	var selected_hr=h+1;
	
	if(m > 0 && m < 15)
	{
		m=15;
	}
	else if(m > 15 && m < 30)
	{
		m=30;
	}
	else if(m > 30 && m < 45)
	{
		m=45;
	}
		else if(m > 45 && m < 60)
	{
		selected_hr=selected_hr+1;
		m=0;
	}
	
	//alert(m);
	//alert(selected_hr);

	
	
	if(document.getElementById("ddl_App_Other").value=="0")
	{
		alert ("Please select Appointment.");
		document.getElementById("ddl_App_Other").focus();
		return false;
	}
	
	
	if(document.getElementById("ddl_MD_Appointed").value=="0")
	{
		alert ("Please Select MD.");
		document.getElementById("ddl_MD_Appointed").focus();
		return false;
	}
	
	if(document.getElementById("ddl_App_Other").value=="Video_Query")
	{
		if(document.getElementById("txtHospital_ID").value=="0")
		{
			alert ("Please Choose Hospital Name.");
			document.getElementById("txtHospital_ID").focus();
			return false;
		}
	}


	if(document.getElementById("txtAppointment").value=="")
	{
		alert ("Please enter Appointment Name.");
		document.getElementById("txtAppointment").focus();
		return false;
	}
	
	if(document.getElementById("ddl_App_Day").value=="0" || document.getElementById("ddl_App_Month").value=="0" || document.getElementById("ddl_App_Year").value=="0")
	{
		alert ("Please select appointment date.");
		document.getElementById("ddl_App_Day").focus();
		return false;
	}
	
	 var md_date=document.getElementById("ddl_App_Day").value;
	 var md_month=document.getElementById("ddl_App_Month").value;
	 var md_year=document.getElementById("ddl_App_Year").value;
	 
	var hour = current_date.getHours();
    var minute = current_date.getMinutes();
	
	
	 var md_ap_date = new Date(md_year, md_month-1, md_date, hour, minute, s); 
	  
	
	var timeval = md_ap_date < current_date;
	var todayval = (md_ap_date!=current_date);
	
	//alert(md_ap_date);
	//alert(current_date);
	//alert(timeval);
	//alert(todayval);
	
	
	if(timeval==true || todayval==false)
	{
		alert ("You cannot choose past date.");
		document.getElementById("ddl_App_Day").focus();	
		return false;
	}
	

	
	
	var app_from=document.getElementById("ddl_App_From").value;
	var app_to=document.getElementById("ddl_App_To").value;
	
	current_time=selected_hr+"."+m;;
	//alert(current_time);
	
	if(document.getElementById("ddl_App_From").value=="0")
	{
		alert ("Please select appointment time.");
		document.getElementById("ddl_App_From").focus();
		return false;
	}
	
	if((app_from < selected_hr) && (current_date==md_ap_date))
	{
		alert("Please select one hour extra from current time.");
		document.getElementById("ddl_App_From").focus();
		return false;
	}
	
	if(document.getElementById("ddl_App_To").value=="0")
	{
		alert ("Please select appointment time.");
		document.getElementById("ddl_App_To").focus();
		return false;
	}
	
	
	
	if((app_to < app_from))
	{
		alert("Appointment time should be greater than from time.");
		document.getElementById("ddl_App_To").focus();
		return false;
	}
	
	
	if(document.getElementById("txtNotes").value=="")
	{
		alert ("Please enter notes.");
		document.getElementById("txtNotes").focus();
		return false;
	}
	
	var td=$(row).parent();
	
	var app_id = $( "#txt_AppointmentID" ).val();
	var hospital_id = $( "#txtHospital_ID" ).val();
	var md_id = $( "#ddl_MD_Appointed" ).val();	
	var app_name = $( "#txtAppointment" ).val();	
	var app_day = $( "#ddl_App_Day" ).val();	
	var app_month = $( "#ddl_App_Month" ).val();	
	var app_year = $( "#ddl_App_Year" ).val();	
	var time_from = $( "#ddl_App_From" ).val();	
	var time_to = $( "#ddl_App_To" ).val();	
	var other_app = $( "#ddl_App_Other" ).val();	
	var notes = $( "#txtNotes" ).val();	
	var created_by = $( "#txtCreatedBy" ).val();	
	var created_type = $( "#txtCreatedType" ).val();	
	var other_hospital_name = $( "#txtHospital_Name" ).val();
	var patient_id = $( "#txtNewPatientId" ).val();
	var compose_id = $( "#txtComposeId" ).val();
	var accept_id = $( "#txtAcceptId" ).val();

	//alert(compose_id);
	
	var url_param="app_id="+app_id+"&hospital_id="+hospital_id+"&md_id="+md_id+"&app_name="+app_name+"&app_day="+app_day+"&app_month="+app_month+"&app_year="+app_year+"&time_from="+time_from+"&time_to="+time_to+"&other_app="+other_app+"&notes="+notes+"&created_by="+created_by+"&created_type="+created_type+"&other_hospital_name="+other_hospital_name+"&patient_id="+patient_id+"&compose_id="+compose_id+"&accept_id="+accept_id+"&insert_type=MD_App";

	alert (url_param);

	console.log(url_param);
	$.ajax( 
		{ 
			url: hostname+"/includes/add_records.inc.php?" + url_param,
		}
		)
	.done(function(data) {
			RetriveReocrds_Main('MDAppointment','dvMDAppointment');
			//var json = data, obj = JSON.parse(json);
			//uploadFile(obj.message);
		}
	);

		
		
	document.getElementById("ddl_MD_Appointed" ).value="0";
	document.getElementById("txtAppointment" ).value="";
	document.getElementById("ddl_App_Day" ).value="0";
	document.getElementById("ddl_App_Month" ).value="0";
	document.getElementById("ddl_App_Year" ).value="0";	
	document.getElementById("ddl_App_From" ).value="0";	
	document.getElementById("ddl_App_To" ).value="0";	
	document.getElementById("ddl_App_Other" ).value="0";	
	document.getElementById("txtNotes" ).value="";	
	document.getElementById("dvMDPatients" ).style.display="none";	
	alert("Record saved successfully.");
	
}


function MD_App_Delete_By_Id(id,deleted_id)
{

	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				 alert(message);
				 document.getElementById("tr_md_appoint_"+deleted_id).style.display='none';
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=MD_App&cid="+id,true);
		xmlhttp.send();
	}
	
}
function MD_App_Retrive_By_Id(id, eid)
{
	var message="";
	var day="";
	if (window.XMLHttpRequest)
	{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
			 message = JSON.parse(xmlhttp.responseText);
			 data = {"records":message};
			 for (var i = 0; i < data.records.length; ++i) {
				 day=data.records[i].consult_day;


				 	document.getElementById("ddl_App_Day" ).value=data.records[i].app_day;
					document.getElementById("ddl_App_Month" ).value=data.records[i].app_month;
					document.getElementById("ddl_App_Year" ).value=data.records[i].app_year;
					document.getElementById("ddl_MD_Appointed" ).value=data.records[i].md_id;
					document.getElementById("txtAppointment" ).value=data.records[i].app_name;
					document.getElementById("ddl_App_From" ).value=data.records[i].time_from;
					document.getElementById("ddl_App_To" ).value=data.records[i].time_to;
					document.getElementById("ddl_App_Other" ).value=data.records[i].other_app;
					document.getElementById("txtNotes" ).value=data.records[i].notes;
					document.getElementById("txt_AppointmentID" ).value=data.records[i].app_id;
					
					document.getElementById("txtHospital_Name" ).value=data.records[i].other_hospital_name;
					
					if (document.getElementById("ddl_App_Other" ).value=="Video_Query")
					{
						document.getElementById("dvMDPatients" ).style.display="";	
						document.getElementById("txtPatients" ).style.display="none";	
						document.getElementById("txtPatients" ).value=data.records[i].patient_id;
						//document.getElementById("dvPatients").innerHTML=data.records[i].patient_id;
						FillDropDown();
						document.getElementById("cmbPatients" ).value=data.records[i].patient_id;
					}
					else
					{
						document.getElementById("dvMDPatients" ).style.display="none";	
						document.getElementById("txtPatients" ).style.display="";	
					}
					
					document.getElementById("dvMDSubmit").style.display="none";
					
					
					document.getElementById("dvEdit").style.display="";
					document.getElementById("rededitbtn"+eid).style.display="";
					document.getElementById("editbtn"+eid).style.display="none";

				  

			 }
			 
			// RetriveReocrds_Upload("dvUploadGallery",document.getElementById("txt_Doc_Consult_ID" ).value, Type)
			  
			

		}
	}
	xmlhttp.open("GET",hostname+"/retrive_files/retrive_reocrds.inc.php?insert_type=MD_App&cid="+id,true);
	xmlhttp.send();
}


function Cat_top_story_Delete_By_Id(id,deleted_id)
{
   // alert (id);
	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				// alert(message);
				 document.getElementById("tr_cat_ts_"+deleted_id).style.display='none';
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Cat_Top_Story&cid="+id,true);
		xmlhttp.send();
	}
	
}
function Be_With_Us_Delete_By_Id(id,deleted_id)
{
   // alert (id);
	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				// alert(message);
				 document.getElementById("tr_be_with_us_"+deleted_id).style.display='none';
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Be_With_Us&cid="+id,true);
		xmlhttp.send();
	}
	
}
function Blog_Delete_By_Id(id,deleted_id)
{
   // alert (id);
	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				// alert(message);
				 document.getElementById("tr_blog_"+deleted_id).style.display='none';
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Blog&cid="+id,true);
		xmlhttp.send();
	}
	
}
/*	function Deal_Delete_By_Id(id,deleted_id)
	{
	   // alert (id);
		if (confirm("Are you sure you want to delete this record ?"))
		{
			var message="";
			var day="";
			if (window.XMLHttpRequest)
			{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
					// alert(message);
					 document.getElementById("tr_deal_id_"+deleted_id).style.display='none';
				}
			}
			xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Deal&cid="+id,true);
			xmlhttp.send();
		}
		
	}
*/function Deal_Category_Delete_By_Id(id,deleted_id)
{
   // alert (id);
	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				// alert(message);
				 document.getElementById("tr_deal_cat_ts_"+deleted_id).style.display='none';
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Deal_Category&cid="+id,true);
		xmlhttp.send();
	}
	
}

function Deal_Delete_By_Id(id,deleted_id)
{
   // alert (id);
	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				// alert(message);
				 document.getElementById("tr_deal_id_"+deleted_id).style.display='none';
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Deal&cid="+id,true);
		xmlhttp.send();
	}
	
}
function Reward_Points_Delete_By_Id(id,deleted_id)
{
   // alert (id);
	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				// alert(message);
				 document.getElementById("tr_reward_points_id_"+deleted_id).style.display='none';
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Reward_Points&cid="+id,true);
		xmlhttp.send();
	}
	
}


function Comments_Delete_By_Id(id,deleted_id)
{
   // alert (id);
	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				// alert(message);
				 document.getElementById("tr_post_comment_"+deleted_id).style.display='none';
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Post_Comment_Admin&cid="+id,true);
		xmlhttp.send();
	}
	
}




function Post_Comment_Delete_By_Id(id,deleted_id)
{
   // alert (id);
	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				// alert(message);
				 document.getElementById("dv_Post_Comment_"+deleted_id).style.display='none';
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Post_Comment_Admin&cid="+id,true);
		xmlhttp.send();
	}
	
}



function Family_Member_Delete_By_Id(id,deleted_id)
{
   // alert (id);
	if (confirm("Are you sure you want to delete this record ?"))
	{
		var message="";
		var day="";
		if (window.XMLHttpRequest)
		{// for IE7+, Firefox, Chrome, Opera, Safaricodes
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
				// alert(message);
				 document.getElementById("dv_User_"+deleted_id).style.display='none';
				 var totalmemcount=document.getElementById("dvTotalMemCount").innerHTML;
				// alert(totalmemcount);
				 totalmemcount=totalmemcount-1;
				 document.getElementById("dvTotalMemCount").innerHTML=totalmemcount;
				 
			}
		}
		xmlhttp.open("GET",hostname+"/includes/delete_reocrds.inc.php?insert_type=Family_Member&cid="+id,true);
		xmlhttp.send();
	}
	
}




function ShowHideTabs(type)
{
	document.getElementById("ShowMDiv").style.display="none";
	//alert (type);
	if(type=="Show")
	{
		document.getElementById("ShowMDiv").style.display="";
		document.getElementById("ShowMedication").style.display="none";
		document.getElementById("HideMedication").style.display="";
	}
	else if(type=="Hide")
	{
		document.getElementById("ShowMDiv").style.display="none";
		document.getElementById("HideMedication").style.display="none";
		document.getElementById("ShowMedication").style.display="";
	}
}