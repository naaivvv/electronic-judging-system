<?php
include('dbcon.php');
//Start session
 session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || ($_SESSION['id'] == '')) { ?>
  	<script>
								window.location = 'index.php';
							</script><?php
    exit();
}

$session_id=$_SESSION['id'];

$session_access=$_SESSION['useraccess'];

$tabname="";

if($session_access=="Organizer")
{
$user_query = $conn->query("select * from organizer where organizer_id = '$session_id'");
$user_row = $user_query->fetch();

}
else
{
$session_userid=$_SESSION['userid'];
$user_query = $conn->query("select * from organizer where organizer_id = '$session_id'");
$user_row = $user_query->fetch();


$tab_query = $conn->query("select * from organizer where organizer_id = '$session_userid'");
$tab_row = $tab_query->fetch();
$tabname = $tab_row['fname']." ".$tab_row['mname']." ".$tab_row['lname'] ;    
}



$name = $user_row['fname']." ".$user_row['mname']." ".$user_row['lname'] ;



$check_pass = $user_row['password'];
$pnum = $user_row['pnum'];
$email = $user_row['email'];



// Predefined values
$default_company_name = "Default Company Name";
$default_company_address = "Default Company Address";
$default_company_logo = "70493-lorem-ipsum.jpg";
$default_company_telephone = "123-456-7890";
$default_company_email = "default@example.com";
$default_company_website = "www.default.com";

// Check for empty values and assign predefined values if necessary
$company_name = !empty($user_row['company_name']) ? $user_row['company_name'] : $default_company_name;
$company_address = !empty($user_row['company_address']) ? $user_row['company_address'] : $default_company_address;
$company_logo = !empty($user_row['company_logo']) ? $user_row['company_logo'] : $default_company_logo;
$company_telephone = !empty($user_row['company_telephone']) ? $user_row['company_telephone'] : $default_company_telephone;
$company_email = !empty($user_row['company_email']) ? $user_row['company_email'] : $default_company_email;
$company_website = !empty($user_row['company_website']) ? $user_row['company_website'] : $default_company_website;
 

?>