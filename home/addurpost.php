<?php
require_once "../main-layout/header.php";
if(!isset($_COOKIE['SSID']))
  header('Location:../home/index.php');
if (isset($_POST['post'])) {
  $title = $_POST['ptitle'];
  $post = $_POST['pcontent'];
  $user = $_SESSION['user_name'];
  if($db->insert_post($title,$post,1,1,$user,1,$conn))
  {
    echo "Your Post has been Posted";
  }
  else {
    echo "An Error has occured while posting, retry after sometime..";
  }
}
if (isset($_POST['draft'])) {
  $title = $_POST['ptitle'];
  $post = $_POST['pcontent'];
  if($db->insert_post($title,$post,1,1,$user,0,$conn))
  {
    echo "Your Post has been Drafted";
  }
  else {
    echo "An Error has occured while drafting, retry after sometime..";
  }
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
      <input class="form-control" type="text" name="ptitle" required/>
    </div>
    <div class="col-lg-6">
    </div>
  </div>
  <br/>
  <div class="container">
    <div class="row">
        <textarea class="form-control" rows="10" autocomplete="no" name="pcontent" max-length="10000"></textarea>
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
<?php require '../main-layout/footer.php';?>
