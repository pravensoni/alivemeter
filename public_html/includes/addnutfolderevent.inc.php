<?php include("common.inc.php");?>

<?php 

//$memid=4;
$mailid=0;
if(isset($_GET['mailsid'])) {
	$mailid = ($_GET['mailsid']);
	//Alert ($type);
}

$parentid=$_SESSION['UserNutID'];

?>

<form name="formsel" id="formsel" method="post">
<table cellpadding="0" border="0" width="410px" align="center" style="background-color: #FFFFFF; border-radius:5px; font-size:15px; color:#a6a6a6; padding:0 15px 15px 15px;">
        <tr>
                <td align="center" style="padding: 0px 37px 10px 350px">
                    <div style="margin: 20px 0px 0px -12px; position: absolute;">
                        <a href="javascript:Popup.hide('dvAdd1');" target="_parent" style="text-decoration: none; color: #fff;">
                            <img src="images/close.png" alt="" title="" border="0" />
                        </a>
                    </div>
                </td>
            </tr>
        
         
         
        <tr>
            <td style="padding:5px 5px 15px 15px; border-top: solid 0px #cccccc; border-bottom: solid 0px #cccccc;" valign="top">
            	<p style="padding:5px 0; margin:0px; color:#000;">Create a new folder</p>
                <input type="text" name="foldername" id="foldername" value="" style="width:280px; height:33px; margin:0 5px 0 0;"><br /><br />
				<input type="hidden" name="parentidhidd" id="parentidhidd" value="<?php echo $_SESSION['UserNutID']?>" style="width:280px; height:33px; margin:0 5px 0 0;"	
                <input type="button" name="btnSubmitCreate" onclick="javascript:AddFolder()" id="btnSubmit" class="button4" value="Add" style="margin-top:22px; width:20%; border:solid 0px red; float:left; margin-right:5px;" >
               
                <input type="submit" name="btnSubmitSave" id="btnSubmitSave" value="Save" onclick="javascript:return ValidateFolder();" style="width:20%; float:left; margin-top:22px;" class="button4"/>
                
                <a href="javascript:Popup.hide('dvAdd1');" style="text-decoration: none; color: #fff;"><input type="button" name="btnSubmitCancel" id="btnSubmitCancel" value="Cancel" class="button4" style="width:28%; float:left; margin-left:5px; margin-top:22px"/></a>
                
                
            </td>
        </tr>
        
         <tr>
            <td style="padding:5px 15px;" valign="top">
            	
            </td>
        </tr>
        
        
    </table></form>

