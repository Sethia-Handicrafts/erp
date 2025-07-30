<!DOCTYPE html>
<?php include('../session.php');?>
<html lang="en">
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="https/lotus-admin-templatesmultipurposethemescom/images/favicon_5177394.ico">

    <title>Sethia Handicrafts ERP </title>
  
	<!-- Vendors Style-->
	<link rel="stylesheet" href="<?php echo $base_url;?>theme/css/vendors_css.css">
	  
	<!-- Style-->  
	<link rel="stylesheet" href="<?php echo $base_url;?>theme/css/style.css">
	<link rel="stylesheet" href="<?php echo $base_url;?>theme/css/skin_color.css">	

</head>
<body class="hold-transition theme-primary bg-gradient-primary">

	<div class="auth-2-outer row align-items-center h-p100 m-0" style="background:url(../images/bg.jpg); background-size: cover;   background-position: center; background-repeat: no-repeat;">
		<div class="auth-2 bg-white-10" style="background:rgba(0,0,0,0.5);">
		  <div class="auth-logo font-size-30" >
			<img src="../images/logo.jpg" height="100" width="auto">
			
		  </div>
		  <!-- /.login-logo -->
		  <div class="auth-body" >
			<p class="auth-msg text-white-50">Sign in to start your session</p>

			<?php 
			if(isset($_GET['status']))
			{echo "<div class='alert alert-danger'>Wrong Credential(s)</div>";}
			?>
			<form  method="post" class="form-element" action="../processlogin.php">
			  <div class="form-group has-feedback">
				<input type="text" name="uname" class="form-control text-white plc-white" placeholder="User Name" required>
				<span class="ion ion-email form-control-feedback text-white"></span>
			  </div>
			  <div class="form-group has-feedback">
				<input type="password" name="password" class="form-control text-white plc-white" placeholder="Password" required>
				<span class="ion ion-locked form-control-feedback text-white"></span>
			  </div>
			  <div class="row">
				<div class="col-6">
				  <div class="checkbox">
					<input type="checkbox" id="basic_checkbox_1">
					<label for="basic_checkbox_1" class="text-white">Remember Me</label>
				  </div>
				</div>
				<!-- /.col -->
				<div class="col-6">
				 <div class="fog-pwd">
					<a href="javascript:void(0)" class="text-white"><i class="ion ion-locked"></i> Forgot password?</a><br>
				  </div>
				</div>
				<!-- /.col -->
				<div class="col-12 text-center">
				  <button type="submit" name="btnlogin" class="btn btn-rounded mt-10 btn-success">SIGN IN</button>
				</div>
				<!-- /.col -->
			  </div>
			</form>

			<!-- /.social-auth-links -->


		  </div>
		</div>
	
	</div>
	
	<!-- Vendor JS -->
	<script src="js/vendors.min.js"></script>

</body>

</html>
