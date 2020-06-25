<?php
include('../../config/session.php');
function uuid(){
    return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        mt_rand(0, 0xffff), mt_rand(0, 0xffff),
        mt_rand(0, 0xffff),
        mt_rand(0, 0x0fff) | 0x4000,
        mt_rand(0, 0x3fff) | 0x8000,
        mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    );
}
if(isset($_POST['push_attendence'])){
    $date=date("Y-m-d");
    foreach($_POST['is'] as $id=>$is){
        $sql3="SELECT * from student_info where sID='$id'";
        $result3=mysqli_query($db,$sql3);
        $row3 = mysqli_fetch_assoc($result3);
        $student_name=$row3['studentName'];
        $classID=$row3['classID'];
        $sql4="SELECT * from class_info where classID='$classID'";
        $result4=mysqli_query($db,$sql4);
        $row4=mysqli_fetch_assoc($result4);
        $standard=$row4['standard'];
        $division=$row4['division'];
        $hash=uuid();

        $sql2 = "INSERT INTO student_attendance". "(sTimeStamp,sID,sIsPresent)". "VALUES('$date','$id','$is')";
        $result = mysqli_query($db, $sql2);

        $sql9="INSERT INTO institute_student_attendance"."(sIsPresent,sID,studentName,sTimeStamp,classID,division,standard,hash)"."VALUES('$is','$id','$student_name','$date','$classID','$division','$standard','$hash')";
        $result9=mysqli_query($db, $sql9);
        if($result9){
            $newhash=$hash."\n";    
            $file = '../../vanashing_log/vanashing_student_attendance.txt';
            // $file2 = 'E://sih node/isSent-Kangaroo-UI-master/logging_student_attendance.txt';
            file_put_contents($file, $newhash, FILE_APPEND | LOCK_EX);
            // file_put_contents($file2, $newhash, FILE_APPEND | LOCK_EX);
        }
    }    
    echo '<script type="text/javascript">'.
    'window.alert("Attendance record have been successfully Added!! :)");'.
    'window.location.href="student_attendence.php";'.
    '</script>'; 
}
?>