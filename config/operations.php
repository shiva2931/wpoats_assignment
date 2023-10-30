<?php
include_once("config.php");
$action= $_GET['action'];

if($action == 'insert'){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  // also add isset submit
        $sub_name = $_POST['sub_name'];
        $tagline = $_POST['tagline'];
        $descrption =$_POST['descrption'];
        $created_date=date('Y-m-d h:i:s');

        $sub_image =$_FILES["sub_image"]["name"];
        $tempname = $_FILES["sub_image"]["tmp_name"];
        $folder = "../images/" . $sub_image;
 
        $icon_image = $_FILES["icon_image"]["name"];
        $folder1 = "../images/" . $icon_image;

        $result = mysqli_query($con, "INSERT INTO subject(sub_name,tagline,descrption,icon,image,created_date) VALUE('$sub_name','$tagline','$descrption','$icon_image','$sub_image','$created_date')");
        move_uploaded_file($_FILES["icon_image"]["tmp_name"], $folder1);
        if (move_uploaded_file($tempname, $folder)) {
            $response['data'] = 'success';
            $response['msg'] = 'Subject Added Successfully !';
        }
        else {
            $response['data'] = 'error';
            $response['msg'] = 'Failed to add Subject.';
        }
        echo json_encode($response);
    }
}

if($action == 'get'){
    $id = $_POST['sub_id'];
    $result = mysqli_query($con, "SELECT * FROM `subject` WHERE id=$id");
    $response=mysqli_fetch_array($result);
    echo json_encode($response);
}

if($action == 'update'){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  // also add isset submit
        $sub_id = $_POST['sub_id'];
        $sub_name = $_POST['sub_name'];
        $tagline = $_POST['tagline'];
        $descrption =$_POST['descrption'];
        $created_date=date('Y-m-d h:i:s');

        $sub_image =$_FILES["sub_image"]["name"];
        $tempname = $_FILES["sub_image"]["tmp_name"];
        $folder = "../images/" . $sub_image;
 
        $icon_image = $_FILES["icon_image"]["name"];
        $folder1 = "../images/" . $icon_image;
        $query='';
         if($sub_image!=''){
            $query .= ", image='$sub_image'";
            move_uploaded_file($tempname, $folder);
         }
         if($icon_image!=''){
            $query .= ", icon='$icon_image'";
            move_uploaded_file($_FILES["icon_image"]["tmp_name"], $folder1);
         }
        $result = mysqli_query($con, "UPDATE `subject` SET sub_name='$sub_name', tagline='$tagline',descrption='$descrption' $query WHERE id='$sub_id'");
        if($result) {
            $response['data'] = 'success';
            $response['msg'] = 'Subject Updated Successfully !';
        }
        else {
            $response['data'] = 'error';
            $response['msg'] = 'Failed to update Subject.';
        }
        echo json_encode($response);
    }
}

if($action == 'delete'){
    if ($_SERVER["REQUEST_METHOD"] == "POST") {  // also add isset submit
        $id = $_POST['sub_delete_id'];
        $result = mysqli_query($con, "UPDATE `subject` SET status=0 WHERE id=$id");
        if ($result) {
            $response['data'] = 'success';
            $response['msg'] = 'Subject Deleted Successfully !';
        }
        else {
            $response['data'] = 'error';
            $response['msg'] = 'Failed to Delete Subject.';
        }
        echo json_encode($response);
    }
}
?>