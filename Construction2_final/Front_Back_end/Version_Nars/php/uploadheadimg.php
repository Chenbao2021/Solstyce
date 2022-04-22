<?php
    $imgname = "logo2";
    $tmp = $_FILES['myfile']['tmp_name'];
    $filepath = '../images/';
    if(move_uploaded_file($tmp,$filepath.$imgname.".png")){
        echo "上传成功";
        header("Location:../pageAdmin.php");
    }else{
        echo "上传失败";
    }
?>
