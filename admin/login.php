<?php require_once('../config.php') ?>
<html lang="en" class="" style="height: auto;">
 <?php require_once('inc/header.php') ?>
<body class="hold-transition login-page">
</script>
<script>
    start_loader()
</script>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<style>
body {
    padding-top: 90px;
    background: url(../uploads/cover1.png) no-repeat center center fixed; 
    background-size: cover
}
.panel-login {
	border-color: #ccc;
	-webkit-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	-moz-box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
	box-shadow: 0px 2px 3px 0px rgba(0,0,0,0.2);
}
.panel-login>.panel-heading {
	color: #00415d;
	background-color: #fff;
	border-color: #fff;
	text-align:center;
}
.panel-login>.panel-heading a{
	text-decoration: none;
	color: #666;
	font-weight: bold;
	font-size: 15px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login>.panel-heading a.active{
	color: #00BFFF;
	font-size: 18px;
}
.panel-login>.panel-heading hr{
	margin-top: 10px;
	margin-bottom: 0px;
	clear: both;
	border: 0;
	height: 1px;
	background-image: -webkit-linear-gradient(left,rgba(0, 0, 0, 0),rgba(0, 0, 0, 0.15),rgba(0, 0, 0, 0));
	background-image: -moz-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -ms-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
	background-image: -o-linear-gradient(left,rgba(0,0,0,0),rgba(0,0,0,0.15),rgba(0,0,0,0));
}
.panel-login input[type="text"],.panel-login input[type="email"],.panel-login input[type="password"] {
	height: 45px;
	border: 1px solid #ddd;
	font-size: 16px;
	-webkit-transition: all 0.1s linear;
	-moz-transition: all 0.1s linear;
	transition: all 0.1s linear;
}
.panel-login input:hover,
.panel-login input:focus {
	outline:none;
	-webkit-box-shadow: none;
	-moz-box-shadow: none;
	box-shadow: none;
	border-color: #ccc;
}
.btn-login {
	background-color: #59B2E0;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #59B2E6;
}
.btn-login:hover,
.btn-login:focus {
	color: #fff;
	background-color: #53A3CD;
	border-color: #53A3CD;
}
.forgot-password {
	text-decoration: underline;
	color: #888;
}
.forgot-password:hover,
.forgot-password:focus {
	text-decoration: underline;
	color: #666;
}

.btn-register {
	background-color: #1CB94E;
	outline: none;
	color: #fff;
	font-size: 14px;
	height: auto;
	font-weight: normal;
	padding: 14px 0;
	text-transform: uppercase;
	border-color: #1CB94A;
}
.btn-register:hover,
.btn-register:focus {
	color: #fff;
	background-color: #1CA347;
	border-color: #1CA347;
}
</style>
<script>	
    $(function() {

$('#login-form-link').click(function(e) {
    $("#login-frm").delay(100).fadeIn(100);
     $("#register-form").fadeOut(100);
    $('#register-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
});
$('#register-form-link').click(function(e) {
    $("#register-form").delay(100).fadeIn(100);
     $("#login-frm").fadeOut(100);
    $('#login-form-link').removeClass('active');
    $(this).addClass('active');
    e.preventDefault();
});

});

</script>
<script type="text/javascript">
function AlertIt() {
  alert("Ha elfelejtette jelszavát kérem vegye fel a kapcsolatot a rendszergazdával az alábbi email címen: info@carware.hu!");
}
</script>


<!------ Include the above in your HEAD tag ---------->
<div class="header">
  <img src="../uploads/cover.png" class="rounded-circle px-5 py-5" alt="logo" />
</div>
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-sm-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-6">
								<a href="#" class="active" id="login-form-link">Bejelentkezés</a>
							</div>
							<div class="col-xs-6">
								<a href="#" id="register-form-link">Regisztráció</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-frm" action="" method="post" role="form" style="display: block;">
									<div class="form-group">
										<input type="text" name="username" id="username" class="form-control" placeholder="Felhasználónév" value="">
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" class="form-control" minlength="8" required placeholder="Jelszó">
									</div>
									<div class="form-group text-center">
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="login-submit" id="login-submit" class="form-control btn btn-login" value="Bejelentkezés">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<div class="text-center">
                                                <a href="javascript:AlertIt();">Elfelejtettem a jelszavam</a>
												</div>
												<a href="<?php echo base_url ?>">Vissza a weboldalra</a>
											</div>
										</div>
									</div>
								</form>
								<form id="register-form" action="" method="post" role="form" style="display: none;" name="form">
									<div class="form-group">
									<div id="msg"></div>
                                        <input type="hidden" name="id" value="<?= isset($meta['id']) ? $meta['id'] : '' ?>">
										<input type="text" name="lastname" id="lastname" class="form-control" placeholder="Vezetéknév" value="<?php echo isset($meta['lastname']) ? $meta['lastname']: '' ?>" required> 
									</div>
									<div class="form-group">
										<input type="text" name="firstname" id="firstname" class="form-control" placeholder="Keresztnév" value="<?php echo isset($meta['firstname']) ? $meta['firstname']: '' ?>"/>
									</div>
                                    <div class="form-group">
										<input type="text" name="username" id="username" class="form-control" placeholder="Felhasználónév" value="<?php echo isset($meta['username']) ? $meta['username']: '' ?>"/>
									</div>
									<div class="form-group">
										<input type="password" name="password" id="password" class="form-control" minlength="8" required placeholder="Password" value="" autocomplete="off">
									<div class="form-group">
										<input type="hidden" name="type" id="type" class="form-control" placeholder="type" value="<?php echo isset($meta['type']) ? $meta['type']: '3' ?>"/>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
											<input type="submit" name="register-submit" id="register-submit" class="form-control btn btn-register" value="Regisztrálás">
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
<script>
	$('#register-form').submit(function(e){
		e.preventDefault();
		start_loader()
		$.ajax({
			url:_base_url_+'classes/Users.php?f=save',
			data: new FormData($(this)[0]),
		    cache: false,
		    contentType: false,
		    processData: false,
		    method: 'POST',
		    type: 'POST',
			success:function(resp){
				if(resp ==1){
					$('#msg1').html('<div class="alert alert-danger">A regisztráció sikerült.</div>')
					location.href='./?page=user/list'
				}else{
					$('#msg2').html('<div class="alert alert-danger">Ez a felhasználónév már létezik.</div>')
					end_loader()
				}
			}
		})
	})
</script>


<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script>
  $(document).ready(function(){
    end_loader();
  })
</script>
</body>
</html>