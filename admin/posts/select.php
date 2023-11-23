<?php
require '../../database/conn.php';
$sql = 'SELECT * FROM base';
$sql = $conn->prepare($sql);
$sql -> execute();
$posts = $sql->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container">
<div class="card" style="width: 55rem;">                                            
<?php foreach ($posts as $post) :?>
  <img src="../upload/<?=$post['img']?>" class="card-img-top" alt="...">
  <div class="card-body">
  <a href="single_post.php?id=<?= $post['id']?>">
    <h5 class="card-title"><?= $post['title']?></h5>
    </a>
    <p class="card-text"><?= $post['text']?></p>
    <h4><a href="update.php?id=<?= $post['id']?>">Edit</a></h4>
      <h4><a href="delete.php?id=<?= $post['id']?>">Delete</a></h4>
  </div>
  <?php endforeach;?>
</div>


</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>