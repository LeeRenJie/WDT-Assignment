<?php
if(!isset($_SESSION)) {
  session_start();
}

if (!isset($_SESSION['session']))
{
  echo("<script>alert('Please login first')</script>");
  echo("<script>window.location = '../shared/login.php'</script>");
}
?>