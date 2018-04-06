<?php
  require "../main-layout/header.php";
  require "../config/db_init.php";
  if(!isset($_COOKIE['SSID']))
    header('Location:../home/index.php');
  if (isset($_POST['post'])) {
    $title = preg_replace( "/[^a-zA-Z0-9_, :()#@!&*$+-]/", "", $_POST['ptitle'] );
    $post = preg_replace( "/[^a-zA-Z0-9_, :()#@!&*$+-]/", "", $_POST['pcontent'] );
    $stmt = $conn->prepare("Insert into user_post(Name,Title,Content,Time) values((:user),(:titles),(:post),CURRENT_TIME())");
    $ptitle = $_POST['ptitle'];
    $stmt->bindParam(':user',$_SESSION['user_name'],PDO::PARAM_STR);
    $stmt->bindParam(':titles',$ptitle,PDO::PARAM_STR);
    $stmt->bindParam(':post',$post,PDO::PARAM_STR);
    $stmt->execute();
    echo 'Post Added!!';
  }
?>
<div class = "jumbotron jumbotron-fluid bg-light">
  <div class="container">
   <h1 align="center">Add Your Posts</h1>
 </div>
</div>
<form class=" bg-secondary" action="" method="post">
<div class="form-group">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
      <h4> Post Title : </h4>
      <input class="form-control" type="text" name="ptitle" placeholder="Title" required/>
    </div>
    <div class="col-lg-6">
    </div>
  </div>
  <br/>
  <div class="container">
    <div class="row">
        <textarea class="form-control" rows="10" autocomplete="no" name="pcontent" placeholder="Feel free to type" max-length="10000"></textarea>
    </div>
  </div>
  <br/>
  <div class="container">
    <div class="row">
      <div class="col-lg-2">
      <input class="btn form-control" type="submit" name="post" value="Post" />
    </div>
    <div class="col-lg-2">
      <input class="btn form-control" type="submit" name="draft" value="Save As Draft"/>
    </div>
    <div class="col-lg-8">
    </div>
    </div>
  </div>
</div>
</form>
</div>
