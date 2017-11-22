<?php
include "dbConnect.php";

$maxLength=50000000000;
$fileExt=substr($_FILES["file"]["name"],-4,4);
$fileName=rand(0,99999999).$fileExt;
$fileSrc="files/".$fileName;
if($_FILES["file"]["size"]>$maxLength){
    echo "File is more 500kb";
}else {
    $f=$_FILES["file"]["type"];
    if($f=="image/jpeg"||$f=="image/png"||$f=="image/gif"||$f=="text/plain"||$f=="application/pdf"){
        if(is_uploaded_file($_FILES["file"]["tmp_name"])){
            $move=move_uploaded_file($_FILES["file"]["tmp_name"],$fileSrc);
            if($move){
                echo "<b>$fileName</b> uploaded success!<br>";
                $query1="INSERT INTO cover_image (cover_url)VALUES('$fileSrc')";
                mysqli_query($connect,$query1);
                $query="SELECT * FROM $table ";
                $res=mysqli_query($connect,$query);
                
            }else {echo"File cannot move";}
        }
    }else {
        echo "Format is wrong!!!";
    }
}
?>
