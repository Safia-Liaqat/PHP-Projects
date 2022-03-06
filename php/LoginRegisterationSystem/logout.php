<?php
session_start();
// Destroying All Sessions
$destroy=session_destroy();
if($destroy)
{
// Redirecting To Home Page
header("Location: login.php");
}
?>