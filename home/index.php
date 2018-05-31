<?php
  require "../main-layout/header.php";
  if(isset($_COOKIE['SSID']))
  {
   require "../main-layout/sub_header.php";
   $posts = $db->select($conn);
 ?>
 <!-- The Main Part Begins Here !! -->
 <br/>
 <div class="container">
  <div class="row">
    <div class="container col-lg-9">
      <?php foreach($posts as $post){ ?>
      <div class="row text-light bg-dark">
        <div class="col-lg-12">
          <h5 class="text-danger"><?php echo $post->post_title;?></h5>
          <?php echo $post->post_content;?>
          <br/>
          <h6>Author : <?php echo $post->username;?></h6>
        </div>
      </div>
      <br/>
    <?php } ?>
    </div>
    <div class="col-lg-1">
    </div>
    <div class="container col-lg-2 text-light bg-dark">
      <div class="row">
          <h5 class="text-danger"> Categories </h5>
      </div>
      <div class="row">
          <ul>
            <li>Security</li>
            <li>Hacker</li>
          </ul>
      </div>
    </div>
  </div>
</div>
 <?php
  }
  else {
    header("Location:../login/login.php");
  }
  require "../main-layout/footer.php";
  ?>
