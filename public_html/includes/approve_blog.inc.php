<?php include("common.inc.php"); ?>
<?php
$cmtid=0;  $condition="";
$created_date=date('Y-m-d h:i:s'); 

if(isset($_GET['cmtid'])){$cmtid=$_GET['cmtid'];}


if(isset($_GET['type'])){$type=$_GET['type'];}


if($type=="Approve")
{
	$query = "update ".Blog." set approved=1 where blog_id in (".$cmtid.")";
	mysql_query($query);

	if($cmtid != "" || $cmtid!=0) {

		$article_ids = explode(",", $cmtid);
			foreach($article_ids as $article_id) {
				$user_id=GetValue("select user_id as col from ".Blog." where blog_id =$article_id", "col");
				
				
				$rowcount=GetValue("select count(*) as col from ".Blog." a where blog_id=$article_id and user_id=".$user_id." and  blog_id in (select common_id from tbl_total_reward_points b where a.blog_id=b.common_id and b.type='Blog')", "col");
				
				
				
				 
				if ($article_id > 0) {
						////Alert($rowcount);
						if ($rowcount <= 0) {
							$reward_point="10";
							
							$data1 = array(
								'user_id'=> $user_id,
								'type'=>'Blog',
								'reward_points'=>$reward_point,
								'common_id'=>$article_id,
								'created_date'=>$created_date,
								'isactive'=>1,
								'isdeleted'=>0,
								
							);
							$blog_id =$db->insert_array(Total_Reward_Points, $data1);
						}
						
						$query_p = "select * from  tbl_users where user_id=".$user_id;
						 $result_p = mysql_query($query_p);
							if ($result_p != "") {
								$rowcount_p = mysql_num_rows($result_p);
								if ($rowcount_p > 0) {	
										while($row_p = mysql_fetch_assoc($result_p)) {
										
										
										$string="";
										$to = $row_p['user_email'];
										$strSubject="Thank you for blog.";
										
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
										$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #99cc00; font-weight: bold; line-height: 20px; margin: 0px;'>Dear ".$row_p['name'].",</p>";
										$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; padding-top: 10px; margin: 0px;'>Thank you for taking time and expressing your views in our blog section. We are happy to inform you that our editorial team liked your content. We will publish the blog in our top stories section with your credits. The rewards points will get credited to your profile.</p>";                         
										$string=$string."<p style='font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 13px; color: #666666; line-height: 20px; padding-top: 10px; margin: 0px;'>Keep writing and expressing yourself. We are waiting for your next.</p>";          
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
										
								}
							}
						}

						

						
					
				}
				
				
			}
	}

}
else
{
	$query = "update ".Blog." set approved=0 where blog_id in (".$cmtid.")";
	mysql_query($query);

	if($cmtid != "" || $cmtid!=0) {

		$article_ids = explode(",", $cmtid);
			foreach($article_ids as $article_id) {
				if ($article_id > 0) {
					$user_id=GetValue("select user_id as col from ".Blog." where blog_id =$article_id", "col");
					$query = "delete FROM tbl_total_reward_points WHERE type='Blog' and common_id = ".$article_id." and user_id=".$user_id;
					//echo $query;
					$result = mysql_query($query);
				}
				
				
			}
	}
}
//echo $query;

?>

