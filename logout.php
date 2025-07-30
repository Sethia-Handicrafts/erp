<?php
//session_save_path('/opt/alt/php74/var/lib/php/session');
  //  ini_set('session.gc_probability', 1);
session_start();

// 2. Unset all the session variables
unset($_SESSION['uid']);	
unset($_SESSION['uname']); 		
unset($_SESSION['ucompany']);

?>
<script type="text/javascript">
    alert("Successfully logout!") ;
    window.location = "index.php";
</script>
