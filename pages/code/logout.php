<?php
  if(isset($_POST['clear_session']))
  {
      session_start();
      session_unset();
      session_destroy();
      header("Location: ../login.php");
  }
?>
