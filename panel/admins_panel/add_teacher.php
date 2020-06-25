<?php
include('../../config/session.php');
if(isset($_POST['enroll']))
{
    $id=uniqid();
    $name=$_POST['name'];
    $email=$_POST['email'];
    $user=$_POST['username'];
    $password=$_POST['password'];
    $access=$_POST['role'];
    $test_profile = $_FILES['profile_pic']['name'];
    $target_dir = "image/";
    $target_file = $target_dir . basename($_FILES["profile_pic"]['name']);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extensions_arr = array("jpg","jpeg","png","gif");
    if( in_array($imageFileType,$extensions_arr) )
    {
        $image_base64 = base64_encode(file_get_contents($_FILES['profile_pic']['tmp_name']) );
        $profile_pic = 'data:image/'.$imageFileType.';base64,'.$image_base64;
        $sql = "INSERT INTO teacher_info". "(tID,teacherName,profilePic,email,userName,password,access)". "VALUES('$id','$name','$profile_pic','$email','$user','$password','$access')";
        $result = mysqli_query( $db, $sql );
        if( $result )
        {
            echo '<script>alert("Teacher is succesfully registered :)")</script>';
            header('location:administration.php');
        }
        else
        {
            echo '<script>alert("There seems to be an issue, Please try again!")</script>';
            header('location:administration.php');
        }
    }
}
?>