<?php
include('../../config/session.php');
if(isset($_POST['enroll']))
{
    $id=uniqid();
    $name=$_POST['name'];
    $standard=$_POST['standard'];
    $division=$_POST['division'];
        $verify="SELECT classID from class_info where standard='$standard' and division='$division'";
        $getclasssid = mysqli_query($db,$verify);
        $classrow = mysqli_fetch_array($getclasssid,MYSQLI_ASSOC);
        $classID=$classrow['classID'];
        $sql = "INSERT INTO student_info". "(sID,studentName,classID)". "VALUES('$id','$name','$classID')";   
        $result = mysqli_query( $db, $sql );
       if( $result )
        {
            echo '<script>alert("Student is succesfully registered :)")</script>';
            header('location:administration.php');
        }
        else
        {
            echo '<script>alert("There seems to be an issue, Please try again!")</script>';
            header('location:administration.php');
        }
    
}
?>