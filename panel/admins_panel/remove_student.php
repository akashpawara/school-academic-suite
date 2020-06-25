<?php
include('../../config/session.php');
if (isset($_GET['id']))
{
$id = $_GET['id'];
$sql = "DELETE FROM student_info WHERE sID='$id' ";
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
