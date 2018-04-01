   <div class="container">
     <div class="row">
       <div class="col-lg-10">
   <?php
   // Had the account been locked out since last login?
   if( $_SESSION['Flogin'] >= $_SESSION['TFlogin'] ) {
       echo "<p><em>Warning</em>: Brute Force may have been tried over you account.</p>";
       echo "<p>Number of login attempts: <em>".$_SESSION['Flogin']."</em>.<br />Last login attempt was at: <em>".$_SESSION['Llogin']."</em>.</p>";
   }
   // Reset bad login count
   $data = $conn->prepare( 'UPDATE user_entries SET FailedLogin = "0" WHERE Name = (:user) LIMIT 1;' );
   $data->bindParam( ':user', $user, PDO::PARAM_STR );
   $data->execute();
   ?>
    </div>
  </div>
</div>
