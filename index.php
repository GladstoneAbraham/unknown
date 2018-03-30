<?php
  require "header.php";
  if(isset($_COOKIE['SSID']))
  {
 ?>
 <!-- The Main Part Begins Here !! -->
 <div class="container">
   <br/>
  <div class="row">
    <div class="col-lg-5 text-dark bg-light">
      My First Post:<br/>
        Hello, this is the first post i have posted on this page since i started developping from the scratch.
    </div>
    <div class="col-lg-2 bg-secondary">
    </div>
    <div class="col-lg-5 text-dark bg-light">
      Second Post:<br/>
        This maybe the second time to post this but both are just for testing .. :)
      </div>
  </div>
</div>
 <?php
  }
  require "footer.php";
  ?>
