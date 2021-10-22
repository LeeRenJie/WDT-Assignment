<?php
session_start();
echo("<script>alert('Successfully Logged out')</script>");
echo("<script>window.location = '../frontend/public/pages/shared/login.php'</script>");
session_unset();
session_destroy();
?>