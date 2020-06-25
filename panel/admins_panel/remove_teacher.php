<?php
include('../../config/session.php');
if (isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql = "DELETE FROM teacher_info WHERE tID='$id' ";
 $result = mysqli_query( $db, $sql );
 if($result)
 {
 header("Location: administration.php");
 }
 else{
     echo "ERROR!";
 }
}
else {
  echo "ERROR!";
}
?>
