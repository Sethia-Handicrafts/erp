<?php
//before we store information of our member, we need to start first the session
	/*session_save_path('/opt/alt/php74/var/lib/php/session');
    ini_set('session.gc_probability', 1);
	*/
	//
	//$base_url="http://192.168.1.78/sethia-handicrafts-erp/";
	//$base_url="http://localhost/sethia-handicrafts-erp/";
	$base_url="https://sethiahandicrafts.in/";

	session_start();
	//create a new function to check if the session variable member_id is on set
	function logged_in() {
		return isset($_SESSION['uid']);
	}
	//this function if session member is not set then it will be redirected to index.php
	function confirm_logged_in() {
		if (!logged_in()) {?>
			<script type="text/javascript">
				window.location = "web/login.php";
			</script>
		<?php
		}
	}
?>