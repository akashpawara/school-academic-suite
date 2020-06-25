<?php
include('../../config/session.php');
if(isset($_POST['push_marks']))
{
    $date=date("Y-m-d");
    $math=$_POST['maths'];
    $sci=$_POST['science'];
    $examType=$_POST['examType'];
    $term=$_POST['term'];
    $year=$_POST['year'];
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
    foreach($_POST['english'] as $id=>$eng)
    {
        $sql3="SELECT * from student_info WHERE sID='$id'";
        $result3=mysqli_query($db,$sql3);
        $row3=mysqli_fetch_assoc($result3);
        $studentName=$row3['studentName'];
        $classID=$row3['classID'];
        $sql5="SELECT * from class_info WHERE classID='$classID'";
        $result5=mysqli_query($db,$sql5);
        $row5=mysqli_fetch_assoc($result5);
        $standard=$row5['standard'];
        $division=$row5['division'];
        $hash=uuid();
        $sql4 = "INSERT INTO institute_student_marks". "(sID,studentName,english,maths,science,examType,term,year,hash,standard,division,classID)". "VALUES('$id','$studentName','$eng','$math[$id]','$sci[$id]','$examType','$term','$year','$hash','$standard','$division','$classID')";
        $result4 = mysqli_query($db, $sql4);
        if($result4)
        {
            $newhash=$hash."\n";
            $file = '../../vanashing_log/vanashing_student_marks.txt';
            file_put_contents($file, $newhash, FILE_APPEND | LOCK_EX);
        }
    }  
        echo '<script type="text/javascript">'.
        'window.alert("Marks record have been successfully Added!! :)");'.
        'window.location.href="student_attendence.php";'.
        '</script>';
    
    }
?>