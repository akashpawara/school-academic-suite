<?php
include('../../config/session.php');
if(isset($_POST['push_attendance']))
{
    function uuid()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }
    $date=date("Y-m-d");
    $teacherName=$_POST['teacherName'];
    $isPresent=$_POST['isPresent'];
    $sql="SELECT * from teacher_info where teacherName='$teacherName'";
    $result=mysqli_query($db,$sql);    
    $row = mysqli_fetch_assoc($result);
    $id=$row['tID'];
    $sql2 = "INSERT INTO teacher_attendance". "(tTimeStamp,tID,tIsPresent)". "VALUES('$date','$id','$isPresent')";
    $result2 = mysqli_query($db, $sql2);
    $hash = uuid();
    $sql3 = "INSERT INTO institute_teacher_details". "(tTimeStamp,tID,tIsPresent,teacherName,hash)". "VALUES('$date','$id','$isPresent','$teacherName','$hash')";
    $result3 = mysqli_query($db, $sql3);
    if($result3)
    {   
        $newhash=$hash."\n";
        echo '<script type="text/javascript">'.
        'window.alert("Attendance record have been successfully traped in our world!! :)");'.
        'window.location.href="admin_dashboard.php";'.
        '</script>';
            $file = '../../vanashing_log/vanashing_teacher_details.txt';
            file_put_contents($file, $newhash, FILE_APPEND | LOCK_EX);  
    }
}
?>