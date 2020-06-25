<?php
   include('config.php');
   session_start();
   $user_check = $_SESSION['login_user'];
   $ses_sql = mysqli_query($db,"select * from teacher_info where userName = '$user_check' ");
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['userName'];
   if(!isset($_SESSION['login_user'])){
      header("location:../index.html");
   }
   $_SESSION['access']=$row['access'];
   if($row['access'] != "Teacher")
   {
       header("../index.html");
   }
   elseif($row['access'] != "Admin")
   {
       header("../index.html");
   }
?>
