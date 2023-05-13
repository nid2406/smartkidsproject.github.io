<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>RoboAnalyzer</title>
<link href="common/style.css" rel="stylesheet" type="text/css" />
<link href="common/style-formate.css" rel="stylesheet" type="text/css" />
<script src="common/jsScript.js"></script>
<?php 
date_default_timezone_set ("Asia/Calcutta");
  
$userName =$_POST['userName'];
$userEmailId =$_POST['userEmailId'];
$userQuery =$_POST['userQuery'];

include("global.inc.php");

$errors=0;
$error="The following errors occurred while processing your form input.";
pt_register('POST','userName');
pt_register('POST','userEmailId');
pt_register('POST','userQuery');

if($errors==1) echo $error;
else
{
	$where_form_is="http//www.roboanalyzer.com".($HTTP_SERVER_VARS["HTTPS"]=="on"?"s":"")."://".$SERVER_NAME.strrev(strstr(strrev($PHP_SELF),"/"));
	// Useful if you need today's date: 
	$today = Time(); 
	$date = date("d-m-Y"); 
	
	$message="
		Query Form
	
		Name : ".$userName."
		Email Id : ".$userEmailId."
		Query : ".$userQuery."
		 
		These Information are stored in the RoboAnalyzer Database also.";
	$message = stripslashes($message);
		
	mail("query@roboanalyzer.com","Website Form Reply ",$message,"From: ".$userEmailId."");

	$message1="Thanks ".$userName.",

We appreciate your interest in RoboAnalyzer and believe we can work together towards reaching higher horizons.

We have saved your details in our database for processing your queries. One of our executives shall get back to you at the earliest and discuss your issue.

We are totally committed to our quality practices and are working hard to provide you with more innovative and efficient solutions to transform your business.

Regards,

RoboAnalyzer Team";
	$message1 = stripslashes($message1);
		
	mail($userEmailId,"Acknowledgement from RoboAnalyzer",$message1,"From: query@roboanalyzer.com");
		
	$link_id = mysql_connect("localhost","roboanal_robo","robo");
	if (!$link_id)
		die("Connection with Database failed");
	if (!mysql_select_db("roboanal_robo"))
		die("no such database");
	else
	{
		$querydb = "SELECT COUNT(*) FROM `queryform`";
		$resultPre = mysql_db_query("roboanal_robo",$querydb);
		if (!$resultPre) 
			die("Invalid query");
		$row = mysql_fetch_row($resultPre);	
		$result = $row[0];
		$sno = $result + 1;
		
		mysql_query("INSERT INTO `queryform` ( `Sno` , `Name` , `EmailId` , `Date` , `Query`) VALUES ('".$sno."' , '" .$userName."' , '".$userEmailId."' , '".$date."' , '".$userQuery."' )");

	}
	mysql_close($link_id);
}
?>
</head>
<body>
<div id="header"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td align="left" valign="top" background="images/header-back.jpg" style="padding-left:20px; padding-top:11px; padding-bottom:6px;"><img src="images/logo.jpg" width="265" height="57" border="0" /></td>
      </tr>
      <tr>
        <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" background="images/manu.jpg">
          <tr>
            <td width="24%" height="28" align="center" valign="middle">&nbsp;</td>
            <td width="1" align="center" valign="middle"><img src="images/menu-line.jpg" width="1" height="28" /></td>
            <td width="15%" align="center" valign="middle" class="main-menu"><input name="home" type="button" class="main-menu" value="Home" style="border:none; text-align:center; background:url(images/manu.jpg); height:28px; width:100%; text-align:center;" onclick="window.open('index.html' , '_self');" onmouseover="set_mouse_pointer(this);" onmouseout="this.style.color='#000000';"/></td>
            <td width="1" align="center" valign="middle"><img src="images/menu-line.jpg" width="1" height="28" /></td>
            <td width="15%" align="center" valign="middle" class="main-menu"><input name="aboutus" type="button" class="main-menu" value="About Us" style="border:none; text-align:center; background:url(images/manu.jpg); height:28px; width:100%; text-align:center;" onclick="window.open('about.html' , '_self');" onmouseover="set_mouse_pointer(this);" onmouseout="this.style.color='#000000';"/></td>
            <td width="1" align="center" valign="middle"><img src="images/menu-line.jpg" width="1" height="28" /></td>
            <td width="15%" align="center" valign="middle" class="main-menu"><input name="software" type="button" class="main-menu" value="Software" style="border:none; text-align:center; background:url(images/manu.jpg); height:28px; width:100%; text-align:center;" onclick="window.open('software.html' , '_self');" onmouseover="set_mouse_pointer(this);" onmouseout="this.style.color='#000000';"/></td>
            <td width="1" align="center" valign="middle"><img src="images/menu-line.jpg" width="1" height="28" /></td>
            <td width="15%" align="center" valign="middle" class="main-menu"><input name="questionnaire" type="button" class="main-menu" value="Questionnaire" style="border:none; text-align:center; background:url(images/manu.jpg); height:28px; width:100%; text-align:center;" onclick="window.open('questionnaire.html' , '_self');" onmouseover="set_mouse_pointer(this);" onmouseout="this.style.color='#000000';"/></td>
            <td width="1" align="center" valign="middle"><img src="images/menu-line.jpg" width="1" height="28" /></td>
            <td width="15%" align="center" valign="middle" class="main-menu">Contact Us</td>
          </tr>
        </table></td>
      </tr>
	  </table></div>
<div id="mid-panel">
<table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
		  <td>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#94A707">
          <tr>
            <td width="195" height="261" align="center" valign="top" bgcolor="#CCDF55" style="padding-left:10px; padding-right:10px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="23" align="left" valign="bottom" class="left-menu-heading">Already a Member?</td>
              </tr>
              <tr>
                <td align="left" valign="top"><hr align="center" size="1" color="#839403" /></td>
              </tr>
              <tr>
                <td height="25" align="center" valign="middle"><input name="button1" type="button" class="left-menu-link" value="Member Login" style="border:none; text-align:center; background:url(images/left-button.jpg); height:24px; width:157px; text-align:left; padding-left:26px;"/></td>
              </tr>
              <tr>
                <td height="23" align="left" valign="bottom" class="left-menu-heading">Requirements</td>
              </tr>
              <tr>
                <td align="left" valign="top"><hr align="center" size="1" color="#839403" /></td>
              </tr>
              <tr>
                <td height="25" align="center" valign="middle"><input name="button1" type="button" class="left-menu-link" value="Software" style="border:none; text-align:center; background:url(images/left-button.jpg); height:24px; width:157px; text-align:left; padding-left:26px;"/></td>
              </tr>
              <tr>
                <td height="28" align="center" valign="bottom"><input name="button1" type="button" class="left-menu-link" value="Hardware" style="border:none; text-align:center; background:url(images/left-button.jpg); height:24px; width:157px; text-align:left; padding-left:26px;"/></td>
              </tr>
              <tr>
                <td height="23" align="left" valign="bottom" class="left-menu-heading">Online Support</td>
              </tr>
              <tr>
                <td align="left" valign="top"><hr align="center" size="1" color="#839403" /></td>
              </tr>
              <tr>
                <td height="25" align="center" valign="middle"><input name="button1" type="button" class="left-menu-link" value="Tutorial" style="border:none; text-align:center; background:url(images/left-button.jpg); height:24px; width:157px; text-align:left; padding-left:26px;"/></td>
              </tr>
              <tr>
                <td height="28" align="center" valign="bottom"><input name="button1" type="button" class="left-menu-link" value="Video Tutorial" style="border:none; text-align:center; background:url(images/left-button.jpg); height:24px; width:157px; text-align:left; padding-left:26px;"/></td>
              </tr>
              <tr>
                <td height="23" align="left" valign="bottom" class="left-menu-heading">Learn More</td>
              </tr>
              <tr>
                <td align="left" valign="top"><hr align="center" size="1" color="#839403" /></td>
              </tr>
              <tr>
                <td height="33" align="center" valign="top"><input name="button1" type="button" class="left-menu-link" value="Feature Highlights" style="border:none; text-align:center; background:url(images/left-button.jpg); height:24px; width:157px; text-align:left; padding-left:26px;"/></td>
              </tr>
            </table></td>
            <td rowspan="2" align="left" valign="top" bgcolor="#FFFFFF" style="padding-left:30px; padding-right:30px;"><table width="100%" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="50" colspan="2" align="left" valign="middle" class="heading">Thank You <?php echo $userName; ?></td>
                </tr>
              <tr>
                <td height="404" align="left" valign="top" class="main-text">We appreciate your interest in RoboAnalyzer and believe we can work together towards reaching higher horizons.<br />

We have saved your details in our database for processing your query. Our executives shall get back to you at the earliest and discuss your issue.<br />
We are totally committed to our quality practices and are working hard to provide you with more innovative and efficient solutions to transform your business.<br />
<br />
Regards,
<br />
RoboAnalyzer Team</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" valign="top" bgcolor="#CCDF55" style="padding-left:10px; padding-right:10px;">
			<form name="quickform" id="quickform" method="post"><table width="100%" height="153" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="23" colspan="2" align="left" valign="bottom" class="left-menu-heading">Quick Contact</td>
                </tr>
              <tr>
                <td align="left" valign="top" colspan="2"><hr align="center" size="1" color="#839403" /></td>
                </tr>
              <tr>
                <td width="36%" height="26" align="center" valign="middle" class="left-menu-link">Name</td>
                <td width="64%" align="left" valign="middle"><input name="userName" id="userName" type="text" size="16" onblur="validateTextBox()"/></td>
              </tr>
              <tr>
                <td height="26" align="center" valign="middle" class="left-menu-link">Email</td>
                <td height="30"><input name="userEmailId" id="userEmailId" type="text" size="16" onblur="validateTextBox()"/></td>
              </tr>
              <tr>
                <td height="26" align="center" valign="middle" class="left-menu-link">Query</td>
                <td height="30"><input name="userQuery" id="userQuery" type="text" size="16" onblur="validateTextBox()"/></td>
              </tr>
              <tr>
                <td height="24" align="center" valign="top">&nbsp;</td>
                <td height="24" align="center" valign="top"><input name="Submit" type="submit" class="send-button" value="Send" style="border:none; text-align:center; background:url(images/send-button.jpg); height:16px; width:44px;" onclick="return validateAll();"/>
                  &nbsp;&nbsp;&nbsp;<input name="Reset" type="reset" class="send-button" value="Clear" style="border:none; text-align:center; background:url(images/send-button.jpg); height:16px; width:44px;" onclick="return clearAll();"/></td>
              </tr>
              <tr>
                <td height="15" colspan="2" align="right" valign="top" style="padding-right:10px;">
				<div class="error_msg" id="errorMsg" style="display:none;"><img src='images/bullet.jpg' width='5' height='5'> Error Message</div></td>
              </tr>
            </table>
			</form></td>
          </tr>
        </table>
		</td>
		</tr>
		<tr>
        <td height="25" align="center" valign="middle" class="footer">Privacy Policy &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; Disclaimer &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; Terms of Use &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; FAQ &nbsp;&nbsp;&nbsp; | &nbsp;&nbsp;&nbsp; Contact Us</td>
      </tr>
    </table></div>
</body>
</html>
