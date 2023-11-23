<?php
require '../../database/conn.php';
// require '../../header/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
   echo "<pre>";
   print_r($_FILES);
   echo "</pre>";
   exit();
    $filesize=$_FILES['img']['size'];
    $filetmp = $_FILES['img']['tmp_name'];
    $filename = $_FILES['img']['name'];
    $title = $_POST['title'];
    $text = $_POST['text'];
$allowded = array('jpg','png','jpeg');
$path = pathinfo($filename);
$ext = $path["extension"];
if (!in_array($ext,$allowded)) {
    echo "Error";
}

if($filesize > 780540) {
    echo "File 2mb dan kop";   
}else {
    
    
    
    
    $sql = 'INSERT INTO base (title,text,img) VALUES (:title,:text,:img)';
    $sql = $conn->prepare($sql);
    $sql->execute([
        'title'=>$title,
        'text'=>$text,
        'img'=>$filename
    ]);
    move_uploaded_file($filetmp,"../upload/".$filename);
}
// header('location:index.php');
}else{
    echo "error";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="background-color: yellow;">
<div class="container mt-3">
    <div class="row">
        <div class="col-4"></div>
        <div class="col-4">
            <form action="" method="post" enctype="multipart/form-data"> 
                <input type="text" name="title" placeholder="Title" id=""><br>
                <input type="text" name="text" placeholder="Text" id=""><br>
                <input type="file" name="img" id="">
                <input type="submit" value="Ok">
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>