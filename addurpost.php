<?php
  require "header.php"
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
      <input class="form-control" type="text" name="ptitle" />
    </div>
    <div class="col-lg-6">
    </div>
  </div>
  <br/>
  <div class="container">
    <div class="row">
        <input class="form-control" type="text" style="min-height:500px;"name="pcontent" max-length="10000"/>
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
