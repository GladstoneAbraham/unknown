<?php
  require "../main-layout/header.php";
  if(isset($_COOKIE['SSID']))
  {
   require "../main-layout/sub_header.php";
 ?>
 <!-- The Main Part Begins Here !! -->
 <br/>
 <div class="container">
  <div class="row">
    <div class="container col-lg-9">
      <div class="row text-light bg-dark">
        <div class="col-lg-12">
          <h5 class="text-danger">My First Post:</h5>
          Hello, this is the first post i have posted on this page since i started developing from the scratch.
          Hello, this is the first post i have posted on this page since i started developing from the scratch.
          Hello, this is the first post i have posted on this page since i started developing from the scratch.
          Hello, this is the first post i have posted on this page since i started developing from the scratch.
          Hello, this is the first post i have posted on this page since i started developing from the scratch.
          Hello, this is the first post i have posted on this page since i started developing from the scratch.
        </div>
      </div>
      <br/>
      <div class="row text-light bg-dark">
        <div class="col-lg-12">
          <h5 class="text-danger">Second Post:</h5>
          This maybe the second time to post this but both are just for testing .. :)
        </div>
      </div>
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
