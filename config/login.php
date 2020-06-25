<?php
include("config.php");
   session_start();
  if(isset($_POST['login']))
  {
     $myusername = mysqli_real_escape_string($db,$_POST['username']);
     $mypassword = mysqli_real_escape_string($db,$_POST['password']);
     $sql = "SELECT * FROM teacher_info WHERE userName = '$myusername' and password = '$mypassword'";
     $result = mysqli_query($db,$sql);
     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
     $count = mysqli_num_rows($result);
     if($count == 1) {
        $_SESSION['login_user'] = $myusername;
        $_SESSION['access']=$row['access'];
        if($row['access'] == "Teacher")
        {
          echo '<script type="text/javascript">'.
      'window.location.href="../panel/teachers_panel/student_attendence.php";'.
      '</script>';
      }
      elseif ($row['access'] == "Admin") {
        echo '<script type="text/javascript">'.
        'window.location.href="../panel/admins_panel/admin_dashboard.php";'.
        '</script>';
      }
    }
    else
    {
      echo '<script type="text/javascript">'.
      'window.alert("Sorry you made some mistake with your username or password :( ");'.
      'window.location.href="../index.html";'.
      '</script>';
     }
  }
?>