<?php include("common.inc.php"); ?><?php
Alert ("ab".$_SESSION['UserID']);
	
?>
<?php
$mailsid=0; $type=""; $condition="";$folderid="";$foldername="";$UserID1="0";$table_name="";$fieldname="";

Alert ("abc".$_SESSION['UserID']);

if(isset($_GET['type'])){$type=$_GET['type'];}
if(isset($_GET['mailsid'])){$mailsid=$_GET['mailsid'];}

Alert ("abcd".$_SESSION['UserID']);
if(isset($_GET['folderid'])){$folderid =$converter->decode($_GET['folderid']);}


Alert ("abcde".$_SESSION['UserID']);

$mailsid =substr($mailsid ,2);
$mailsid = explode(",", $mailsid);




foreach($mailsid as $mailid) {
	$mail_type=explode("@@@", $mailid);
	$mail_id=$mail_type[0];
	$mail_type=$mail_type[1];
	
	//echo $mail_id.",".$mail_type."<br/>";
	if($mail_type=="Doctor")
	{
		$table_name=Compose;
		$fieldname="mail_id";
	}
	else if($mail_type=="Nutritionist")
	{
		$table_name=Nutritionist;
		$fieldname="mail_id"	;
	}
	else if($mail_type=="Doctor_Reply")
	{
		$table_name=Doc_Comment;
		$fieldname="comment_id";
	}
	else if($mail_type=="MD_Reply")
	{
		$table_name=MD_Comment;
		$fieldname="comment_id";
	}
	else if($mail_type=="Nutritionist_Reply")
	{
		$table_name=Nut_Comment;
		if($type=="User")
		{
			$fieldname="comment_id";
		}
		else
		{
			$fieldname="compose_id";
		}
	}
	
	
	if($type=="User")
	{
		$data = array(
		 'folderid'=>$folderid,
		);
	}
	else
	{
		$data = array(
		 'folder_nut_id'=>$folderid,
		);
	}
	$id = $db->update_array($table_name,$data, $fieldname." = ".$mail_id);

	
}




?>

<?php
Alert ($_SESSION['UserID']);
	
?>