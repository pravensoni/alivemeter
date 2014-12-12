// JavaScript Document


function Add_Post_Comment(row)
{
	//alert ("dfdf");
	var td=$(row).parent();
	var user_id = $( "#txtUserId" ).val();
	var article_id = $( "#txtArticleId" ).val();
	var type = $( "#txtCommentType" ).val();
	var comment = $( "#txtPostComments" ).val();
	comment = comment.replace(/\r?\n/g, '<br />');
		comment = comment.replace('\\', '');
	var reward_point = $( "#txtRewardPoints" ).val();
	var post_comment_id = $( "#txtPostCommentId" ).val();
	
	
	if(document.getElementById("txtPostComments").value=="")
	{
		alert ("Please enter to reply.");
		document.getElementById("txtPostComments").focus();
		return false;
	}
	
	
	var url_param="user_id="+user_id+"&article_id="+article_id+"&type="+type+"&comment="+comment+"&post_comment_id="+post_comment_id+"&reward_point="+reward_point+"&insert_type=PostComment";
		
		//alert (url_param);
		console.log(url_param);
		$.ajax( 
			{ 
				url: hostname+"/includes/add_records.inc.php?" + url_param,
			}
			)
		.done(function(data) {
				RetriveReocrds_Main('Post_Comment','dvPostComments');
				CmtCount=document.getElementById("DvComment").innerHTML;
				//alert(CmtCount);
				CmtCount1=parseInt(CmtCount) + 1;
			//	alert(CmtCount1);
				document.getElementById("DvComment").innerHTML=CmtCount1;
			}
		);
	
	
	//	alert ("Mail sent Successfully.");
		document.getElementById("txtPostComments" ).value="";
	
	//	redirectURL(hostname+"/page_doctor.php?dir=nutritionist/details&patient_id="+Repatientid+"&compose_id="+compose_id+"&parent_id="+parent_id);

}




function Add_User_Reviews(row)
{
	//alert ("dfdf");
	
	var td=$(row).parent();
	var user_id = $( "#txtUserID" ).val();
	var common_id = $( "#txtCommonID" ).val();
	var common_type = $( "#txtCommonType" ).val();
	var comment = $( "#txtUserReviews" ).val();
	   comment = comment.replace(/\r?\n/g, '<br />');
		comment = comment.replace('\\', '');
	var user_review_id = $( "#txtUserReviewsID" ).val();
	var mail_id = $( "#txtReviewMailID" ).val();
	
	
	if(document.getElementById("txtUserReviews").value=="")
	{
		alert ("Please enter to reply.");
		document.getElementById("txtUserReviews").focus();
		return false;
	}
	
	
	var url_param="user_id="+user_id+"&common_id="+common_id+"&common_type="+common_type+"&comment="+comment+"&user_review_id="+user_review_id+"&mail_id="+mail_id+"&insert_type=User_Reviews";
		
		//alert (url_param);
		console.log(url_param);
		$.ajax( 
			{ 
				url: hostname+"/includes/add_records.inc.php?" + url_param,
			}
			)
		.done(function(data) {
				document.getElementById("divUserReviews" ).style.display="none";
				RetriveReocrds_Main('User_Reviews','dvUserReviews');
				
				//CmtCount=document.getElementById("DvComment").innerHTML;
				//alert(CmtCount);
			//	CmtCount1=parseInt(CmtCount) + 1;
			//	alert(CmtCount1);
				//document.getElementById("DvComment").innerHTML=CmtCount1;
			}
		);
	
	
	    alert ("Your reply sent successfully.");
		document.getElementById("txtUserReviews" ).value="";
		
	
	//	redirectURL(hostname+"/page_doctor.php?dir=nutritionist/details&patient_id="+Repatientid+"&compose_id="+compose_id+"&parent_id="+parent_id);

}



function getdropdown(cityid,location_id) {
		var obj = document.getElementById("ddlState");		
		if(obj.value != "" ) {
		//	document.getElementById("loader").style.display='';
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
					document.getElementById("dvCity").innerHTML=message;
					document.getElementById("txtState").value=obj.value;
					//document.getElementById("loader").style.display='none';
					
					Retrive_Location(location_id);
					
				}
			}
			xmlhttp.open("GET",hostname+"/includes/getdropdown.inc.php?tbl=City&value="+obj.value+"&selID="+cityid+"&location_id="+location_id, true);
			xmlhttp.send();
			
			
		}
	}	
	
	
	function LocationDisplay(){
		//ShowStateCity();
		var obj = document.getElementById("ddlLocation");
		var obj1 = document.getElementById("cmbCity");
		if(obj1.value == "9999" ) {
			obj.value= "9999";
		}
		
		
		document.getElementById("txtLocation").value=obj.value;
		//var obj1 = document.getElementById("ddlState");
		GetDeals('1');
		
	}
	
	function Retrive_Location(location_id)
	{
		var obj = document.getElementById("cmbCity");
		document.getElementById("txtCity").value=obj.value;
		//var obj1 = document.getElementById("ddlState");
		if(obj.value == "" ) {
			//document.getElementById("txtCity").style.display='';
		}else
		{
			//document.getElementById("txtCity").style.display='none';
		}
		
		var message = "";
		if(obj.value != "" ) {
			//document.getElementById("loader2").style.display='';
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
					
					document.getElementById("dvLocation").innerHTML=message ;
					
				///	document.getElementById("loader2").style.display='none';
					
					LocationDisplay();
				}
			}
			xmlhttp.open("GET",hostname+"/includes/getdropdown.inc.php?tbl=Location&value="+obj.value+"&selID="+location_id, true);
		
			xmlhttp.send();
		}
	}
			
			
			
			

function AppAccept(answer)
{
	//alert ("dfdf");
	
	var user_id = $( "#txtUserID" ).val();
	var common_id = $( "#txtCommonID" ).val();
	var mail_id = $( "#txtVideoMailID" ).val();
	var md_id = $( "#txtMDAppID" ).val();
	
	if(answer=="1")
	{
		
			
			answer="1";
			
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
					document.getElementById("DvAcceptApp" ).style.display="none";
					document.getElementById("dvRejectext").style.display="none";
					document.getElementById("dvAcceptext").style.display="";
					
				}
			}
			
		///  alert (hostname+"/includes/accept_app.inc.php?user_id="+user_id+"&common_id="+common_id+"&mail_id="+mail_id+"&answer="+answer+"&md_id="+md_id);
			xmlhttp.open("GET",hostname+"/includes/accept_app.inc.php?user_id="+user_id+"&common_id="+common_id+"&mail_id="+mail_id+"&answer="+answer+"&md_id="+md_id, true);
			xmlhttp.send();
			alert ("Your appointment is accepted successfully.");	
			
		
	}
	
	else if(answer=="0")
	{
		
			
			answer="0";
			
			if (window.XMLHttpRequest)
			{// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp = new XMLHttpRequest();
			}
			else
			{
				// code for IE6, IE5
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
				{
					message = xmlhttp.responseText;
					document.getElementById("DvAcceptApp" ).style.display="none";
					document.getElementById("dvRejectext").style.display="";
					document.getElementById("dvAcceptext").style.display="none";
				}
			}
			
			//alert (hostname+"/includes/accept_app.inc.php?user_id="+user_id+"&common_id="+common_id+"&mail_id="+mail_id+"&answer="+answer);
			xmlhttp.open("GET",hostname+"/includes/accept_app.inc.php?user_id="+user_id+"&common_id="+common_id+"&mail_id="+mail_id+"&answer="+answer, true);
			xmlhttp.send();
			alert ("Your appointment is rejected successfully.");	
			
		
	}
	
		
	


}







$(document).ready(function() {
	
	
	
	// process the form
	$('#frmBloodPressure').submit(function(event) {
		 var url_param="insert_type=Daily_Blood_Pressure";								   
		 event.preventDefault();
		 var formData = new FormData($("#frmBloodPressure"));
		 var flag="0";
		///	alert ("right");
		for (var i=1;i < 8 ; i++ ){
				if(document.getElementById("txtBloood_Pressure"+i).value!="")
				{
					flag="1";
					
				}
			
		}
		
		/*if(flag=="0")
				{
					
					alert ("Please enter valid blood pressure 1.");
				///	document.getElementById("txtBloood_Pressure"+i).focus();
					return false;
				}
		*/
		for (var i=1;i < 8 ; i++ ){
		// alert (i);
		//	alert (document.getElementById("txtBloood_Pressure"+i).value);
			
			
				//if(document.getElementById("txtBloood_Pressure"+i).value=="")
				//{
					//alert ("Please enter valid blood pressure 1.");
				///	document.getElementById("txtBloood_Pressure"+i).focus();
					//return false;
				//}
				//else 
				if(document.getElementById("txtBloood_Pressure"+i).value!="") 
				{
					//var iChars = "!@#$%^&*()+=-[]\\\';,./{}|\"0123456789";
					var bpvalue=document.getElementById("txtBloood_Pressure"+i).value;
					
					//alert (bpvalue);
					if (bpvalue.indexOf("/")<0) {
						alert ("Please enter valid blood pressure .");
						document.getElementById("txtBloood_Pressure"+i).focus();
						return false;
					}
					bpvalue = bpvalue.split('/');
					
					if(isNaN(bpvalue[0])==true)
					{
						alert ("Please enter valid blood pressure.");
						document.getElementById("txtBloood_Pressure"+i).focus();
						return false;
					}
					
					if(isNaN(bpvalue[1])==true)
					{
						alert ("Please enter valid blood pressure.");
						document.getElementById("txtBloood_Pressure"+i).focus();
						return false;
					}
					
				}

			}
				
			 $.ajax({
				type: 'POST',
				url :hostname+"/includes/add_records.inc.php?" + url_param,
				 data    : $(this).serialize(),
				 dataType 	: 'json',
				
			  })
			.done(function(data) {
				console.log(data); 
				if(data[1]!="")
				{
					alert("Record Saved Successfully.");
				}
			})
			.fail(function(data) {
				// show any errors
				// best to remove for production
				console.log(data);
				///("No Records Added.");
				return false;
			});
	});
	
	
	$('#frmFastingBlood').submit(function(event) {
		 var url_param="insert_type=Fasting_Blood_Sugar";								   
		 
		 
		 event.preventDefault();
		 var formData = new FormData($("#frmFastingBlood"));
		 
		 var flag="0";
		 
		 for (var i=1;i < 8 ; i++ ){
			if(document.getElementById("txtFasting_Blood_Sugar"+i).value!="" || document.getElementById("txtPPBS"+i).value!="" || document.getElementById("txtUB"+i).value!="" || document.getElementById("txtRandom_Blood_Sugar"+i).value!="")
			{
				flag="1";
			}
			
		}
		
		/*if(flag=="0")
		{
			
			alert ("Please enter sugar profile.");
		///	document.getElementById("txtBloood_Pressure"+i).focus();
			return false;
		}*/
		
		
		 
		 $.ajax({
			 type: 'POST',
			 url :hostname+"/includes/add_records.inc.php?" + url_param,
			 data    : $(this).serialize(),
			 dataType 	: 'json',
			
		  })
		.done(function(data) {
			console.log(data); 
		///	alert (data);
			if(data[1]!="")
			{
				alert("Record Saved Successfully.");
			}
		})
		.fail(function(data) {
			// show any errors
			// best to remove for production
			console.log(data);
			//alert("fail");
		});
	});
	
	
	$('#frmLifeStyle').submit(function(event) {
		 var url_param="insert_type=Life_Style";								   
		 event.preventDefault();
		 var formData = new FormData($("#frmLifeStyle"));
		 
		 var flag="0";
		 
		 for (var i=1;i < 8 ; i++ ){
			if(document.getElementById("txtSpirit"+i).value!="" || document.getElementById("txtBeer"+i).value!="" || document.getElementById("txtCigarette"+i).value!="" || document.getElementById("txtSleep"+i).value!="")
			{
				flag="1";
			}
			
		}
		
		/*if(flag=="0")
		{
			
			alert ("Please enter life style record.");
		///	document.getElementById("txtBloood_Pressure"+i).focus();
			return false;
		}*/
		
		
		 $.ajax({
			type: 'POST',
			url :hostname+"/includes/add_records.inc.php?" + url_param,
			 data    : $(this).serialize(),
			 dataType 	: 'json',
			
		  })
		.done(function(data) {
			console.log(data); 
		 	if(data!="")
			{
				alert("Record Saved Successfully.");
			}
		})
		.fail(function(data) {
			// show any errors
			// best to remove for production
			console.log(data);
			///alert("fail");
		});
	});
	
	
	$('#frmWater').submit(function(event) {
		 var url_param="insert_type=Water";								   
		 event.preventDefault();
		 var formData = new FormData($("#frmWater"));
		 
		  var flag="0";
		 
		 for (var i=1;i < 8 ; i++ ){
			if(document.getElementById("txtWater"+i).value!="")
			{
				flag="1";
			}
			
		}
		
		/*if(flag=="0")
		{
			
			alert ("Please enter no. of glasses of water.");
		///	document.getElementById("txtBloood_Pressure"+i).focus();
			return false;
		}*/
		
		
		
		 $.ajax({
			type: 'POST',
			url :hostname+"/includes/add_records.inc.php?" + url_param,
			 data    : $(this).serialize(),
			 dataType 	: 'json',
			
		  })
		.done(function(data) {
			console.log(data); 
		 	if(data!="")
			{
				alert("Record Saved Successfully.");
			}
		})
		.fail(function(data) {
			// show any errors
			// best to remove for production
			console.log(data);
			///alert("fail");
		});
	});
	
	$('#frmMeasurement').submit(function(event) {
		 var url_param="insert_type=Measurement";								   
		 event.preventDefault();
		 var formData = new FormData($("#frmMeasurement"));
		 
		 
		 var flag="0";
		 
		 for (var i=1;i < 8 ; i++ ){
			if(document.getElementById("txtCurrWgt"+i).value!="" || document.getElementById("txtCurrWaist"+i).value!="" || document.getElementById("txtCurrHips"+i).value!="" || document.getElementById("txtCurrArms"+i).value!="")
			{
				flag="1";
			}
			
		}
		
		/*if(flag=="0")
		{
			
			alert ("Please enter measurements.");
		///	document.getElementById("txtBloood_Pressure"+i).focus();
			return false;
		}*/
		
		
		///  alert (url_param);
		  
		 $.ajax({
			type: 'POST',
			url :hostname+"/includes/add_records.inc.php?" + url_param,
			 data    : $(this).serialize(),
			 dataType 	: 'json',
			
		  })
		 
		/// alert("Record Saved Successfully.");
		.done(function(data) {
			console.log(data); 
			if(data!="")
			{
				alert("Record Saved Successfully.");
			}
			
		})
		.fail(function(data) {
			// show any errors
			// best to remove for production
			console.log(data);
			///alert("fail");
		});
		
	});
	
});
