var monthNames = [ "Jan", "Feb", "Mar", "Apr", "May", "Jun",
    "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ];
function GetChart(datsJson,HighChartRenderID)
{
   var Cat = [];
   var CatValue = [];
   var CatValue1 = [];

//alert(datsJson);
//alert(HighChartRenderID);

//console.log(datsJson);

   if (datsJson.trim()=="")
   {
	   return false;
   }
   datsJson = datsJson.split('###');
  // console.log(datsJson);
  // alert(datsJson);
   
   datsJson1 = datsJson[0].split('/');
   datsJson2 = datsJson[1].split('/');
   datsJson3 = datsJson[2].split('/');
	
	for (var i in datsJson1) {
		if (i !="contains")
		{
			Cat.push(datsJson1[i].trim());
		}
		else
		{
				Cat.push(datsJson1[i]);
		}
	}


	

	for (var m in datsJson2) {
		if (!isNaN(parseFloat(datsJson2[m])))
		{
			CatValue.push(parseFloat(datsJson2[m]));
		}
	}

	for (var b in datsJson3) {
		if (!isNaN(parseFloat(datsJson3[b])))
		{
			CatValue1.push(parseFloat(datsJson3[b]));
		}
	}


	//alert(Cat);
	//alert(CatValue);

	 

	$(function () {
        $(HighChartRenderID).highcharts({
			chart: { height:'315',width:'736', zoomType: 'xy'},
			title:'',
			
            xAxis: {
				text: 'Date',
                categories: Cat,
				gridLineWidth: 1,
	            gridLineColor: (Highcharts.theme && Highcharts.theme.background2) || '#ebebeb',
            },
            yAxis: {
			    title: {
                    text: 'Min'
                },
            },
			 plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
			
             series: [{
                name: 'Date',
                data: CatValue,
				type: 'column',
				yAxis: 0,
				showInLegend: true,
				color:'#9aca04',
            },
			
			]
        });
    });
	/*{
                name: '',
                data: CatValue1,
				type: 'spline',
				dashStyle: 'shortdot',
				yAxis: 0,
				showInLegend: true,
				color:'#000000',
				marker: {
					enabled: true
				},
            }*/
}
	 

function addDays(theDate, days) {
    return new Date(theDate.getTime() + days*24*60*60*1000);
}
function GetChartDetails(menu,type)
{
	var pageURL="";
	var fromdate;
	var todate;

	var fromdate1;
	var todate1;
	
	var daysCal="0";

	if (menu=="curr_wgt_result")
	{
		 
		fromdate=new Date(document.getElementById("txtcurr_wgt_resultFromDate").value);
		todate=new Date(document.getElementById("txtcurr_wgt_resultToDate").value);;
		daysCal=document.getElementById("txtWeekDays").value;
		 

		if (type=="Prev")
		{
			 fromdate = addDays(fromdate,-6);
			 todate = addDays(fromdate, 6);
	
			
		}
		else if (type=="Next")
		{		
			 fromdate = addDays(fromdate,6);
			 todate = addDays(fromdate, 6);
		}
		else
		{
			fromdate=new Date();
			todate = new Date(addDays(fromdate, 6));
		}
	
		document.getElementById("txtcurr_wgt_resultFromDate").value=fromdate;
		document.getElementById("txtcurr_wgt_resultToDate").value=todate;		
		
		 
		fromdate1=fromdate.getDate()+" "+monthNames[fromdate.getMonth()]+" "+fromdate.getFullYear();
		todate1=todate.getDate()+" "+monthNames[todate.getMonth()]+" "+todate.getFullYear();

		document.getElementById("dvcurr_wgt_resultMonthYearCaption").innerHTML=fromdate1+" - "+ todate1;

		fromdate1=fromdate.getFullYear()+"/"+(fromdate.getMonth()+1)+"/"+fromdate.getDate();;
		todate1=todate.getFullYear()+"/"+(todate.getMonth()+1)+"/"+todate.getDate();;
		
		
		 
		pageURL=hostname+"/includes/measurement.inc.php?fromdate="+fromdate1+"&todate="+todate1+"&type="+menu+"&rowCount="+daysCal;
		
	}

	if (menu=="curr_wgt_resultMonth")
	{
		 
		fromdate=new Date(document.getElementById("txtcurr_wgt_resultFromDateMonth").value);
		todate=new Date(document.getElementById("txtcurr_wgt_resultToDateMonth").value);;
		daysCal=document.getElementById("txtWeekDaysMonth").value;
		 

		if (type=="Prev")
		{
			 //fromdate = addDays(fromdate,-30);
			 //todate = addDays(fromdate, 30);
			fromdate = new Date(fromdate.getFullYear(), fromdate.getMonth()-1, 1);
			todate = new Date(fromdate.getFullYear(), fromdate.getMonth()+1, 0);
			
		}
		else if (type=="Next")
		{		
			// fromdate = addDays(fromdate,30);
			// todate = addDays(fromdate, 30);

			fromdate = new Date(todate.getFullYear(), todate.getMonth(), 1);
			todate = new Date(fromdate.getFullYear(), fromdate.getMonth()+1, 0);
			
		}
		else
		{
			//fromdate=new Date();
			//todate = new Date(addDays(fromdate, 30));

			fromdate = new Date(fromdate.getFullYear(), fromdate.getMonth(), 1);
			todate = new Date(fromdate.getFullYear(), fromdate.getMonth()+1, 0);
		}
	
		document.getElementById("txtcurr_wgt_resultFromDateMonth").value=fromdate;
		document.getElementById("txtcurr_wgt_resultToDateMonth").value=todate;		
		
		 
		fromdate1=fromdate.getDate()+" "+monthNames[fromdate.getMonth()]+" "+fromdate.getFullYear();
		todate1=todate.getDate()+" "+monthNames[todate.getMonth()]+" "+todate.getFullYear();

		document.getElementById("dvcurr_wgt_resultMonthYearCaptionMonth").innerHTML=fromdate1+" - "+ todate1;

		fromdate1=fromdate.getFullYear()+"/"+(fromdate.getMonth()+1)+"/"+fromdate.getDate();;
		todate1=todate.getFullYear()+"/"+(todate.getMonth()+1)+"/"+todate.getDate();;

		daysCal= (todate - fromdate) / (1000 * 60 * 60 * 24);
		 
		pageURL=hostname+"/includes/measurement.inc.php?fromdate="+fromdate1+"&todate="+todate1+"&type="+menu+"&rowCount="+daysCal;
		
	}

	if (menu=="curr_wgt_resultYearly")
	{
		 
		fromdate=new Date(document.getElementById("txtcurr_wgt_resultFromDateYearly").value);
		todate=new Date(document.getElementById("txtcurr_wgt_resultToDateYearly").value);;
		daysCal=document.getElementById("txtWeekDaysYearly").value;
		 

		/*if (type=="Prev")
		{
			 fromdate = addDays(fromdate,-365);
			 todate = addDays(fromdate, 365);
	
			
		}
		else if (type=="Next")
		{		
			 fromdate = addDays(fromdate,365);
			 todate = addDays(fromdate, 365);
		}
		else
		{
			fromdate=new Date();
			todate = new Date(addDays(fromdate, 365));
		}*/


		if (type=="Prev")
		{
			 //fromdate = addDays(fromdate,-30);
			 //todate = addDays(fromdate, 30);
			//fromdate = new Date(fromdate.getFullYear()-1, fromdate.getMonth(), 1);
			//todate = new Date(fromdate.getFullYear()+1, fromdate.getMonth(), 1);

			fromdate = new Date(fromdate.getFullYear()-1,0, 1);
			todate = new Date(fromdate.getFullYear(), fromdate.getMonth()+12, 0);
			
		}
		else if (type=="Next")
		{		
			// fromdate = addDays(fromdate,30);
			// todate = addDays(fromdate, 30);

			//fromdate = new Date(todate.getFullYear(), todate.getMonth(), 1);
			//todate = new Date(fromdate.getFullYear()+1, fromdate.getMonth(), 1);

			fromdate = new Date(fromdate.getFullYear()+1,0, 1);
			todate = new Date(fromdate.getFullYear(), fromdate.getMonth()+12, 0);
			
		}
		else
		{
			//fromdate=new Date();
			//todate = new Date(addDays(fromdate, 30));

			fromdate = new Date(fromdate.getFullYear(),0, 1);
			todate = new Date(fromdate.getFullYear(), fromdate.getMonth()+12, 0);
		}
	
		document.getElementById("txtcurr_wgt_resultFromDateYearly").value=fromdate;
		document.getElementById("txtcurr_wgt_resultToDateYearly").value=todate;		
		
		 
		fromdate1=fromdate.getDate()+" "+monthNames[fromdate.getMonth()]+" "+fromdate.getFullYear();
		todate1=todate.getDate()+" "+monthNames[todate.getMonth()]+" "+todate.getFullYear();

		document.getElementById("dvcurr_wgt_resultMonthYearCaptionYearly").innerHTML=fromdate1+" - "+ todate1;

		fromdate1=fromdate.getFullYear()+"/"+(fromdate.getMonth()+1)+"/"+fromdate.getDate();;
		todate1=todate.getFullYear()+"/"+(todate.getMonth()+1)+"/"+todate.getDate();;
		
		daysCal= (todate - fromdate) / (1000 * 60 * 60 * 24); 


		pageURL=hostname+"/includes/measurement.inc.php?fromdate="+fromdate1+"&todate="+todate1+"&type="+menu+"&rowCount="+daysCal;
		
	}






	if (menu=="curr_waist_result")
	{
		 
		fromdate=new Date(document.getElementById("txtcurr_waist_resultFromDate").value);
		todate=new Date(document.getElementById("txtcurr_waist_resultToDate").value);;
		daysCal=document.getElementById("txtWeekDayscurr_waist_result").value;
		 

		if (type=="Prev")
		{
			 fromdate = addDays(fromdate,-6);
			 todate = addDays(fromdate, 6);
	
			
		}
		else if (type=="Next")
		{		
			 fromdate = addDays(fromdate,6);
			 todate = addDays(fromdate, 6);
		}
		else
		{
			fromdate=new Date();
			todate = new Date(addDays(fromdate, 6));
		}
	
		document.getElementById("txtcurr_waist_resultFromDate").value=fromdate;
		document.getElementById("txtcurr_waist_resultToDate").value=todate;		
		
		 
		fromdate1=fromdate.getDate()+" "+monthNames[fromdate.getMonth()]+" "+fromdate.getFullYear();
		todate1=todate.getDate()+" "+monthNames[todate.getMonth()]+" "+todate.getFullYear();

		document.getElementById("dvcurr_waist_resultMonthYearCaption").innerHTML=fromdate1+" - "+ todate1;

		fromdate1=fromdate.getFullYear()+"/"+(fromdate.getMonth()+1)+"/"+fromdate.getDate();;
		todate1=todate.getFullYear()+"/"+(todate.getMonth()+1)+"/"+todate.getDate();;
		
		 
		pageURL=hostname+"/includes/measurement.inc.php?fromdate="+fromdate1+"&todate="+todate1+"&type="+menu+"&rowCount="+daysCal;
		
	}


	if (menu=="curr_waist_resultMonth")
	{
		 
		fromdate=new Date(document.getElementById("txtcurr_waist_resultFromDateMonth").value);
		todate=new Date(document.getElementById("txtcurr_waist_resultToDateMonth").value);;
		daysCal=document.getElementById("txtWeekDaysMonth").value;
		 

		/*if (type=="Prev")
		{
			 fromdate = addDays(fromdate,-30);
			 todate = addDays(fromdate, 30);
	
			
		}
		else if (type=="Next")
		{		
			 fromdate = addDays(fromdate,30);
			 todate = addDays(fromdate, 30);
		}
		else
		{
			fromdate=new Date();
			todate = new Date(addDays(fromdate, 30));
		}*/


		if (type=="Prev")
		{
			 //fromdate = addDays(fromdate,-30);
			 //todate = addDays(fromdate, 30);
			fromdate = new Date(fromdate.getFullYear(), fromdate.getMonth()-1, 1);
			todate = new Date(fromdate.getFullYear(), fromdate.getMonth()+1, 0);
			
		}
		else if (type=="Next")
		{		
			// fromdate = addDays(fromdate,30);
			// todate = addDays(fromdate, 30);

			fromdate = new Date(todate.getFullYear(), todate.getMonth(), 1);
			todate = new Date(fromdate.getFullYear(), fromdate.getMonth()+1, 0);
			
		}
		else
		{
			//fromdate=new Date();
			//todate = new Date(addDays(fromdate, 30));

			fromdate = new Date(fromdate.getFullYear(), fromdate.getMonth(), 1);
			todate = new Date(fromdate.getFullYear(), fromdate.getMonth()+1, 0);
		}
	
		document.getElementById("txtcurr_waist_resultFromDateMonth").value=fromdate;
		document.getElementById("txtcurr_waist_resultToDateMonth").value=todate;		
		
		 
		fromdate1=fromdate.getDate()+" "+monthNames[fromdate.getMonth()]+" "+fromdate.getFullYear();
		todate1=todate.getDate()+" "+monthNames[todate.getMonth()]+" "+todate.getFullYear();

		document.getElementById("dvcurr_waist_resultMonthYearCaptionMonth").innerHTML=fromdate1+" - "+ todate1;

		fromdate1=fromdate.getFullYear()+"/"+(fromdate.getMonth()+1)+"/"+fromdate.getDate();;
		todate1=todate.getFullYear()+"/"+(todate.getMonth()+1)+"/"+todate.getDate();;
		
		daysCal= (todate - fromdate) / (1000 * 60 * 60 * 24);
		pageURL=hostname+"/includes/measurement.inc.php?fromdate="+fromdate1+"&todate="+todate1+"&type="+menu+"&rowCount="+daysCal;
		
	}

	if (menu=="curr_waist_resultYearly")
	{
		 
		fromdate=new Date(document.getElementById("txtcurr_waist_resultFromDateYearly").value);
		todate=new Date(document.getElementById("txtcurr_waist_resultToDateYearly").value);;
		daysCal=document.getElementById("txtWeekDaysYearly").value;
		 

		/*if (type=="Prev")
		{
			 fromdate = addDays(fromdate,-365);
			 todate = addDays(fromdate, 365);
	
			
		}
		else if (type=="Next")
		{		
			 fromdate = addDays(fromdate,365);
			 todate = addDays(fromdate, 365);
		}
		else
		{
			fromdate=new Date();
			todate = new Date(addDays(fromdate, 365));
		}
	
		document.getElementById("txtcurr_waist_resultFromDateYearly").value=fromdate;
		document.getElementById("txtcurr_waist_resultToDateYearly").value=todate;		
		
		 
		fromdate1=fromdate.getDate()+" "+monthNames[fromdate.getMonth()]+" "+fromdate.getFullYear();
		todate1=todate.getDate()+" "+monthNames[todate.getMonth()]+" "+todate.getFullYear();

		document.getElementById("dvcurr_waist_resultMonthYearCaptionYearly").innerHTML=fromdate1+" - "+ todate1;

		fromdate1=fromdate.getFullYear()+"/"+(fromdate.getMonth()+1)+"/"+fromdate.getDate();;
		todate1=todate.getFullYear()+"/"+(todate.getMonth()+1)+"/"+todate.getDate();;*/
		
		 /*if (type=="Prev")
		{
			 fromdate = addDays(fromdate,-365);
			 todate = addDays(fromdate, 365);
	
			
		}
		else if (type=="Next")
		{		
			 fromdate = addDays(fromdate,365);
			 todate = addDays(fromdate, 365);
		}
		else
		{
			fromdate=new Date();
			todate = new Date(addDays(fromdate, 365));
		}*/


		if (type=="Prev")
		{
			 //fromdate = addDays(fromdate,-30);
			 //todate = addDays(fromdate, 30);
			//fromdate = new Date(fromdate.getFullYear()-1, fromdate.getMonth(), 1);
			//todate = new Date(fromdate.getFullYear()+1, fromdate.getMonth(), 1);

			fromdate = new Date(fromdate.getFullYear()-1,0, 1);
			todate = new Date(fromdate.getFullYear(), fromdate.getMonth()+12, 0);
			
		}
		else if (type=="Next")
		{		
			// fromdate = addDays(fromdate,30);
			// todate = addDays(fromdate, 30);

			//fromdate = new Date(todate.getFullYear(), todate.getMonth(), 1);
			//todate = new Date(fromdate.getFullYear()+1, fromdate.getMonth(), 1);

			fromdate = new Date(fromdate.getFullYear()+1,0, 1);
			todate = new Date(fromdate.getFullYear(), fromdate.getMonth()+12, 0);
			
		}
		else
		{
			//fromdate=new Date();
			//todate = new Date(addDays(fromdate, 30));

			fromdate = new Date(fromdate.getFullYear(),0, 1);
			todate = new Date(fromdate.getFullYear(), fromdate.getMonth()+12, 0);
		}
	
		document.getElementById("txtcurr_waist_resultFromDateYearly").value=fromdate;
		document.getElementById("txtcurr_waist_resultToDateYearly").value=todate;		
		
		 
		fromdate1=fromdate.getDate()+" "+monthNames[fromdate.getMonth()]+" "+fromdate.getFullYear();
		todate1=todate.getDate()+" "+monthNames[todate.getMonth()]+" "+todate.getFullYear();

		document.getElementById("dvcurr_waist_resultMonthYearCaptionYearly").innerHTML=fromdate1+" - "+ todate1;

		fromdate1=fromdate.getFullYear()+"/"+(fromdate.getMonth()+1)+"/"+fromdate.getDate();;
		todate1=todate.getFullYear()+"/"+(todate.getMonth()+1)+"/"+todate.getDate();;
		
		daysCal= (todate - fromdate) / (1000 * 60 * 60 * 24); 
		pageURL=hostname+"/includes/measurement.inc.php?fromdate="+fromdate1+"&todate="+todate1+"&type="+menu+"&rowCount="+daysCal;
		
	}


	if (menu=="curr_hips_result")
	{
		 
		fromdate=new Date(document.getElementById("txtcurr_hips_resultFromDate").value);
		todate=new Date(document.getElementById("txtcurr_hips_resultToDate").value);;
		daysCal=document.getElementById("txtWeekDayscurr_hips_result").value;
		 

		if (type=="Prev")
		{
			 fromdate = addDays(fromdate,-6);
			 todate = addDays(fromdate, 6);
	
			
		}
		else if (type=="Next")
		{		
			 fromdate = addDays(fromdate,6);
			 todate = addDays(fromdate, 6);
		}
		else
		{
			fromdate=new Date();
			todate = new Date(addDays(fromdate, 6));
		}
	
		document.getElementById("txtcurr_hips_resultFromDate").value=fromdate;
		document.getElementById("txtcurr_hips_resultToDate").value=todate;		
		
		 
		fromdate1=fromdate.getDate()+" "+monthNames[fromdate.getMonth()]+" "+fromdate.getFullYear();
		todate1=todate.getDate()+" "+monthNames[todate.getMonth()]+" "+todate.getFullYear();

		document.getElementById("dvcurr_hips_resultMonthYearCaption").innerHTML=fromdate1+" - "+ todate1;

		fromdate1=fromdate.getFullYear()+"/"+(fromdate.getMonth()+1)+"/"+fromdate.getDate();;
		todate1=todate.getFullYear()+"/"+(todate.getMonth()+1)+"/"+todate.getDate();;
		
		 
		pageURL=hostname+"/includes/measurement.inc.php?fromdate="+fromdate1+"&todate="+todate1+"&type="+menu+"&rowCount="+daysCal;
		
	}


	if (menu=="curr_hips_resultMonth")
	{
		 
		fromdate=new Date(document.getElementById("txtcurr_hips_resultFromDateMonth").value);
		todate=new Date(document.getElementById("txtcurr_hips_resultToDateMonth").value);;
		daysCal=document.getElementById("txtWeekDaysMonth").value;
		 

		/*if (type=="Prev")
		{
			 fromdate = addDays(fromdate,-30);
			 todate = addDays(fromdate, 30);
	
			
		}
		else if (type=="Next")
		{		
			 fromdate = addDays(fromdate,30);
			 todate = addDays(fromdate, 30);
		}
		else
		{
			fromdate=new Date();
			todate = new Date(addDays(fromdate, 30));
		}*/


		if (type=="Prev")
		{
			 //fromdate = addDays(fromdate,-30);
			 //todate = addDays(fromdate, 30);
			fromdate = new Date(fromdate.getFullYear(), fromdate.getMonth()-1, 1);
			todate = new Date(fromdate.getFullYear(), fromdate.getMonth()+1, 0);
			
		}
		else if (type=="Next")
		{		
			// fromdate = addDays(fromdate,30);
			// todate = addDays(fromdate, 30);

			fromdate = new Date(todate.getFullYear(), todate.getMonth(), 1);
			todate = new Date(fromdate.getFullYear(), fromdate.getMonth()+1, 0);
			
		}
		else
		{
			//fromdate=new Date();
			//todate = new Date(addDays(fromdate, 30));

			fromdate = new Date(fromdate.getFullYear(), fromdate.getMonth(), 1);
			todate = new Date(fromdate.getFullYear(), fromdate.getMonth()+1, 0);
		}
	
		document.getElementById("txtcurr_hips_resultFromDateMonth").value=fromdate;
		document.getElementById("txtcurr_hips_resultToDateMonth").value=todate;		
		
		 
		fromdate1=fromdate.getDate()+" "+monthNames[fromdate.getMonth()]+" "+fromdate.getFullYear();
		todate1=todate.getDate()+" "+monthNames[todate.getMonth()]+" "+todate.getFullYear();

		document.getElementById("dvcurr_hips_resultMonthYearCaptionMonth").innerHTML=fromdate1+" - "+ todate1;

		fromdate1=fromdate.getFullYear()+"/"+(fromdate.getMonth()+1)+"/"+fromdate.getDate();;
		todate1=todate.getFullYear()+"/"+(todate.getMonth()+1)+"/"+todate.getDate();;
		
		daysCal= (todate - fromdate) / (1000 * 60 * 60 * 24);
		pageURL=hostname+"/includes/measurement.inc.php?fromdate="+fromdate1+"&todate="+todate1+"&type="+menu+"&rowCount="+daysCal;
		
	}

	if (menu=="curr_hips_resultYearly")
	{
		 
		fromdate=new Date(document.getElementById("txtcurr_hips_resultFromDateYearly").value);
		todate=new Date(document.getElementById("txtcurr_hips_resultToDateYearly").value);;
		daysCal=document.getElementById("txtWeekDaysYearly").value;
		 

		/*if (type=="Prev")
		{
			 fromdate = addDays(fromdate,-365);
			 todate = addDays(fromdate, 365);
	
			
		}
		else if (type=="Next")
		{		
			 fromdate = addDays(fromdate,365);
			 todate = addDays(fromdate, 365);
		}
		else
		{
			fromdate=new Date();
			todate = new Date(addDays(fromdate, 365));
		}
	
		document.getElementById("txtcurr_hips_resultFromDateYearly").value=fromdate;
		document.getElementById("txtcurr_hips_resultToDateYearly").value=todate;		
		
		 
		fromdate1=fromdate.getDate()+" "+monthNames[fromdate.getMonth()]+" "+fromdate.getFullYear();
		todate1=todate.getDate()+" "+monthNames[todate.getMonth()]+" "+todate.getFullYear();

		document.getElementById("dvcurr_hips_resultMonthYearCaptionYearly").innerHTML=fromdate1+" - "+ todate1;

		fromdate1=fromdate.getFullYear()+"/"+(fromdate.getMonth()+1)+"/"+fromdate.getDate();;
		todate1=todate.getFullYear()+"/"+(todate.getMonth()+1)+"/"+todate.getDate();;*/
		
		 /*if (type=="Prev")
		{
			 fromdate = addDays(fromdate,-365);
			 todate = addDays(fromdate, 365);
	
			
		}
		else if (type=="Next")
		{		
			 fromdate = addDays(fromdate,365);
			 todate = addDays(fromdate, 365);
		}
		else
		{
			fromdate=new Date();
			todate = new Date(addDays(fromdate, 365));
		}*/


		if (type=="Prev")
		{
			 //fromdate = addDays(fromdate,-30);
			 //todate = addDays(fromdate, 30);
			//fromdate = new Date(fromdate.getFullYear()-1, fromdate.getMonth(), 1);
			//todate = new Date(fromdate.getFullYear()+1, fromdate.getMonth(), 1);

			fromdate = new Date(fromdate.getFullYear()-1,0, 1);
			todate = new Date(fromdate.getFullYear(), fromdate.getMonth()+12, 0);
			
		}
		else if (type=="Next")
		{		
			// fromdate = addDays(fromdate,30);
			// todate = addDays(fromdate, 30);

			//fromdate = new Date(todate.getFullYear(), todate.getMonth(), 1);
			//todate = new Date(fromdate.getFullYear()+1, fromdate.getMonth(), 1);

			fromdate = new Date(fromdate.getFullYear()+1,0, 1);
			todate = new Date(fromdate.getFullYear(), fromdate.getMonth()+12, 0);
			
		}
		else
		{
			//fromdate=new Date();
			//todate = new Date(addDays(fromdate, 30));

			fromdate = new Date(fromdate.getFullYear(),0, 1);
			todate = new Date(fromdate.getFullYear(), fromdate.getMonth()+12, 0);
		}
	
		document.getElementById("txtcurr_hips_resultFromDateYearly").value=fromdate;
		document.getElementById("txtcurr_hips_resultToDateYearly").value=todate;		
		
		 
		fromdate1=fromdate.getDate()+" "+monthNames[fromdate.getMonth()]+" "+fromdate.getFullYear();
		todate1=todate.getDate()+" "+monthNames[todate.getMonth()]+" "+todate.getFullYear();

		document.getElementById("dvcurr_hips_resultMonthYearCaptionYearly").innerHTML=fromdate1+" - "+ todate1;

		fromdate1=fromdate.getFullYear()+"/"+(fromdate.getMonth()+1)+"/"+fromdate.getDate();;
		todate1=todate.getFullYear()+"/"+(todate.getMonth()+1)+"/"+todate.getDate();;
		
		daysCal= (todate - fromdate) / (1000 * 60 * 60 * 24); 
		pageURL=hostname+"/includes/measurement.inc.php?fromdate="+fromdate1+"&todate="+todate1+"&type="+menu+"&rowCount="+daysCal;
		
	}


	if (menu=="curr_arms_result")
	{
		 
		fromdate=new Date(document.getElementById("txtcurr_arms_resultFromDate").value);
		todate=new Date(document.getElementById("txtcurr_arms_resultToDate").value);;
		daysCal=document.getElementById("txtWeekDayscurr_arms_result").value;
		 

		if (type=="Prev")
		{
			 fromdate = addDays(fromdate,-6);
			 todate = addDays(fromdate, 6);
	
			
		}
		else if (type=="Next")
		{		
			 fromdate = addDays(fromdate,6);
			 todate = addDays(fromdate, 6);
		}
		else
		{
			fromdate=new Date();
			todate = new Date(addDays(fromdate, 6));
		}
	
		document.getElementById("txtcurr_arms_resultFromDate").value=fromdate;
		document.getElementById("txtcurr_arms_resultToDate").value=todate;		
		
		 
		fromdate1=fromdate.getDate()+" "+monthNames[fromdate.getMonth()]+" "+fromdate.getFullYear();
		todate1=todate.getDate()+" "+monthNames[todate.getMonth()]+" "+todate.getFullYear();

		document.getElementById("dvcurr_arms_resultMonthYearCaption").innerHTML=fromdate1+" - "+ todate1;

		fromdate1=fromdate.getFullYear()+"/"+(fromdate.getMonth()+1)+"/"+fromdate.getDate();;
		todate1=todate.getFullYear()+"/"+(todate.getMonth()+1)+"/"+todate.getDate();;
		
		 
		pageURL=hostname+"/includes/measurement.inc.php?fromdate="+fromdate1+"&todate="+todate1+"&type="+menu+"&rowCount="+daysCal;
		
	}


	if (menu=="curr_arms_resultMonth")
	{
		 
		fromdate=new Date(document.getElementById("txtcurr_arms_resultFromDateMonth").value);
		todate=new Date(document.getElementById("txtcurr_arms_resultToDateMonth").value);;
		daysCal=document.getElementById("txtWeekDaysMonth").value;
		 

		/*if (type=="Prev")
		{
			 fromdate = addDays(fromdate,-30);
			 todate = addDays(fromdate, 30);
	
			
		}
		else if (type=="Next")
		{		
			 fromdate = addDays(fromdate,30);
			 todate = addDays(fromdate, 30);
		}
		else
		{
			fromdate=new Date();
			todate = new Date(addDays(fromdate, 30));
		}*/


		if (type=="Prev")
		{
			 //fromdate = addDays(fromdate,-30);
			 //todate = addDays(fromdate, 30);
			fromdate = new Date(fromdate.getFullYear(), fromdate.getMonth()-1, 1);
			todate = new Date(fromdate.getFullYear(), fromdate.getMonth()+1, 0);
			
		}
		else if (type=="Next")
		{		
			// fromdate = addDays(fromdate,30);
			// todate = addDays(fromdate, 30);

			fromdate = new Date(todate.getFullYear(), todate.getMonth(), 1);
			todate = new Date(fromdate.getFullYear(), fromdate.getMonth()+1, 0);
			
		}
		else
		{
			//fromdate=new Date();
			//todate = new Date(addDays(fromdate, 30));

			fromdate = new Date(fromdate.getFullYear(), fromdate.getMonth(), 1);
			todate = new Date(fromdate.getFullYear(), fromdate.getMonth()+1, 0);
		}
	
		document.getElementById("txtcurr_arms_resultFromDateMonth").value=fromdate;
		document.getElementById("txtcurr_arms_resultToDateMonth").value=todate;		
		
		 
		fromdate1=fromdate.getDate()+" "+monthNames[fromdate.getMonth()]+" "+fromdate.getFullYear();
		todate1=todate.getDate()+" "+monthNames[todate.getMonth()]+" "+todate.getFullYear();

		document.getElementById("dvcurr_arms_resultMonthYearCaptionMonth").innerHTML=fromdate1+" - "+ todate1;

		fromdate1=fromdate.getFullYear()+"/"+(fromdate.getMonth()+1)+"/"+fromdate.getDate();;
		todate1=todate.getFullYear()+"/"+(todate.getMonth()+1)+"/"+todate.getDate();;
		
		daysCal= (todate - fromdate) / (1000 * 60 * 60 * 24);
		pageURL=hostname+"/includes/measurement.inc.php?fromdate="+fromdate1+"&todate="+todate1+"&type="+menu+"&rowCount="+daysCal;
		
	}

	if (menu=="curr_arms_resultYearly")
	{
		 
		fromdate=new Date(document.getElementById("txtcurr_arms_resultFromDateYearly").value);
		todate=new Date(document.getElementById("txtcurr_arms_resultToDateYearly").value);;
		daysCal=document.getElementById("txtWeekDaysYearly").value;
		 

		/*if (type=="Prev")
		{
			 fromdate = addDays(fromdate,-365);
			 todate = addDays(fromdate, 365);
	
			
		}
		else if (type=="Next")
		{		
			 fromdate = addDays(fromdate,365);
			 todate = addDays(fromdate, 365);
		}
		else
		{
			fromdate=new Date();
			todate = new Date(addDays(fromdate, 365));
		}
	
		document.getElementById("txtcurr_arms_resultFromDateYearly").value=fromdate;
		document.getElementById("txtcurr_arms_resultToDateYearly").value=todate;		
		
		 
		fromdate1=fromdate.getDate()+" "+monthNames[fromdate.getMonth()]+" "+fromdate.getFullYear();
		todate1=todate.getDate()+" "+monthNames[todate.getMonth()]+" "+todate.getFullYear();

		document.getElementById("dvcurr_arms_resultMonthYearCaptionYearly").innerHTML=fromdate1+" - "+ todate1;

		fromdate1=fromdate.getFullYear()+"/"+(fromdate.getMonth()+1)+"/"+fromdate.getDate();;
		todate1=todate.getFullYear()+"/"+(todate.getMonth()+1)+"/"+todate.getDate();;*/
		
		 /*if (type=="Prev")
		{
			 fromdate = addDays(fromdate,-365);
			 todate = addDays(fromdate, 365);
	
			
		}
		else if (type=="Next")
		{		
			 fromdate = addDays(fromdate,365);
			 todate = addDays(fromdate, 365);
		}
		else
		{
			fromdate=new Date();
			todate = new Date(addDays(fromdate, 365));
		}*/


		if (type=="Prev")
		{
			 //fromdate = addDays(fromdate,-30);
			 //todate = addDays(fromdate, 30);
			//fromdate = new Date(fromdate.getFullYear()-1, fromdate.getMonth(), 1);
			//todate = new Date(fromdate.getFullYear()+1, fromdate.getMonth(), 1);

			fromdate = new Date(fromdate.getFullYear()-1,0, 1);
			todate = new Date(fromdate.getFullYear(), fromdate.getMonth()+12, 0);
			
		}
		else if (type=="Next")
		{		
			// fromdate = addDays(fromdate,30);
			// todate = addDays(fromdate, 30);

			//fromdate = new Date(todate.getFullYear(), todate.getMonth(), 1);
			//todate = new Date(fromdate.getFullYear()+1, fromdate.getMonth(), 1);

			fromdate = new Date(fromdate.getFullYear()+1,0, 1);
			todate = new Date(fromdate.getFullYear(), fromdate.getMonth()+12, 0);
			
		}
		else
		{
			//fromdate=new Date();
			//todate = new Date(addDays(fromdate, 30));

			fromdate = new Date(fromdate.getFullYear(),0, 1);
			todate = new Date(fromdate.getFullYear(), fromdate.getMonth()+12, 0);
		}
	
		document.getElementById("txtcurr_arms_resultFromDateYearly").value=fromdate;
		document.getElementById("txtcurr_arms_resultToDateYearly").value=todate;		
		
		 
		fromdate1=fromdate.getDate()+" "+monthNames[fromdate.getMonth()]+" "+fromdate.getFullYear();
		todate1=todate.getDate()+" "+monthNames[todate.getMonth()]+" "+todate.getFullYear();

		document.getElementById("dvcurr_arms_resultMonthYearCaptionYearly").innerHTML=fromdate1+" - "+ todate1;

		fromdate1=fromdate.getFullYear()+"/"+(fromdate.getMonth()+1)+"/"+fromdate.getDate();;
		todate1=todate.getFullYear()+"/"+(todate.getMonth()+1)+"/"+todate.getDate();;
		
		daysCal= (todate - fromdate) / (1000 * 60 * 60 * 24); 
		pageURL=hostname+"/includes/measurement.inc.php?fromdate="+fromdate1+"&todate="+todate1+"&type="+menu+"&rowCount="+daysCal;
		
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
			
			if (xmlhttp.responseText.trim()=="")
		   {
				if (menu=="curr_wgt_result")
				{
				   document.getElementById("curr_wgt_result_Chart").innerHTML="";
				   return false;
				}
				 
				if (menu=="curr_wgt_resultMonth")
				{
				   document.getElementById("curr_wgt_result_ChartMonth").innerHTML="";
				   return false;
				}

				if (menu=="curr_wgt_resultYearly")
				{
				   document.getElementById("curr_wgt_result_ChartYearly").innerHTML="";
				   return false;
				}


				if (menu=="curr_waist_result")
				{
				   document.getElementById("curr_waist_result_Chart").innerHTML="";
				   return false;
				}
				 
				if (menu=="curr_waist_resultMonth")
				{
				   document.getElementById("curr_waist_result_ChartMonth").innerHTML="";
				   return false;
				}

				if (menu=="curr_waist_resultYearly")
				{
				   document.getElementById("curr_waist_result_ChartYearly").innerHTML="";
				   return false;
				}

				if (menu=="curr_hips_result")
				{
				   document.getElementById("curr_hips_result_Chart").innerHTML="";
				   return false;
				}
				 
				if (menu=="curr_hips_resultMonth")
				{
				   document.getElementById("curr_hips_result_ChartMonth").innerHTML="";
				   return false;
				}

				if (menu=="curr_hips_resultYearly")
				{
				   document.getElementById("curr_hips_result_ChartYearly").innerHTML="";
				   return false;
				}

				if (menu=="curr_arms_result")
				{
				   document.getElementById("curr_arms_result_Chart").innerHTML="";
				   return false;
				}
				 
				if (menu=="curr_arms_resultMonth")
				{
				   document.getElementById("curr_arms_result_ChartMonth").innerHTML="";
				   return false;
				}

				if (menu=="curr_arms_resultYearly")
				{
				   document.getElementById("curr_arms_result_ChartYearly").innerHTML="";
				   return false;
				}

				
		   }
			if (menu=="curr_wgt_result")
			{
			   GetChart(xmlhttp.responseText,'#curr_wgt_result_Chart')
			   if (type=="")
				{
				   GetChartDetails('curr_wgt_resultMonth','')
				}
			   
			}
			if (menu=="curr_wgt_resultMonth")
			{
			   GetChart(xmlhttp.responseText,'#curr_wgt_result_ChartMonth')
			   GetChartDetails('curr_wgt_resultYearly','')
			}

			 if (menu=="curr_wgt_resultYearly")
			{
			   GetChart(xmlhttp.responseText,'#curr_wgt_result_ChartYearly')


				if (type=="")
				{
					GetChartDetails('curr_waist_result','')
				}
			}

			if (menu=="curr_waist_result")
			{
			   GetChart(xmlhttp.responseText,'#curr_waist_result_Chart')
			   GetChartDetails('curr_waist_resultMonth','')
			}
			if (menu=="curr_waist_resultMonth")
			{
			   GetChart(xmlhttp.responseText,'#curr_waist_result_ChartMonth')
			   GetChartDetails('curr_waist_resultYearly','')
			}

			 if (menu=="curr_waist_resultYearly")
			{
			   GetChart(xmlhttp.responseText,'#curr_waist_result_ChartYearly')
				if (type=="")
				{
					GetChartDetails('curr_hips_result','')
				}
			}
			
			if (menu=="curr_hips_result")
			{
			 
			   GetChart(xmlhttp.responseText,'#curr_hips_result_Chart')
			   GetChartDetails('curr_hips_resultMonth','')
			}
			if (menu=="curr_hips_resultMonth")
			{
			   GetChart(xmlhttp.responseText,'#curr_hips_result_ChartMonth')
			   GetChartDetails('curr_hips_resultYearly','')
			}

			 if (menu=="curr_hips_resultYearly")
			{
			   GetChart(xmlhttp.responseText,'#curr_hips_result_ChartYearly')
				 if (type=="")
				{
					 GetChartDetails('curr_arms_result','')
				}
			  
			   //RetriveReocrds_DailyTracking('Sugar_Profile','dvSugar_Profile');

			} 


			if (menu=="curr_arms_result")
			{
			   GetChart(xmlhttp.responseText,'#curr_arms_result_Chart')
			   GetChartDetails('curr_arms_resultMonth','')
			}
			if (menu=="curr_arms_resultMonth")
			{
			   GetChart(xmlhttp.responseText,'#curr_arms_result_ChartMonth')
			   GetChartDetails('curr_arms_resultYearly','')
			}

			 if (menu=="curr_arms_resultYearly")
			{
			   GetChart(xmlhttp.responseText,'#curr_arms_result_ChartYearly')
			   //RetriveReocrds_DailyTracking('Sugar_Profile','dvSugar_Profile');
				RetriveReocrds('CalorieDet','dvCalorieDet');
			} 
		}
	}
	
	xmlhttp.open("GET",pageURL,true);
	xmlhttp.send();
}