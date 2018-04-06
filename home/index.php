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
          <h5 class="text-danger">DESCRIPTION</h5>
          <p style="color:white;font-size:25px;font-family:Consolas;text-align: center;"><strong>"WE SERVE IN THE DARK TO BRING LIGHT"</strong></p> <br>
          <p style="font-size:18px;fon-family:Times;">Yes, Hackers and security experts...WELCOME you all..!!<br>
          Not to hack our site ...!!hahaaah but to suggest us and to develop our skills...!!<br>
          As of today we are the social engineers to bring out and reveal the evil things ...!!<br>
          It's very happy for us to connect you people together...!!<br>
          Use this for only good things...!!<br>
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
