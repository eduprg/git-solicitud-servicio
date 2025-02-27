<?php 
session_start();
include('header.php');
$loginError = '';
if (!empty($_POST['email']) && !empty($_POST['pwd'])) {
	include 'servicio.php';
	$servicio = new Servicio();
	$user = $servicio->loginUsers($_POST['email'], $_POST['pwd']); 
	if(!empty($user)) {
		$_SESSION['user'] = $user[0]['first_name']."".$user[0]['last_name'];
		$_SESSION['userid'] = $user[0]['id'];
		$_SESSION['email'] = $user[0]['email'];		
		$_SESSION['address'] = $user[0]['address'];
		$_SESSION['mobile'] = $user[0]['mobile'];
		header("Location:vigilancia.php");
	} else {
		$loginError = "Correo o Contraseña son incorrecta";
	}
}
?>
<title>Utpl</title>
<script src="js/servicio.js"></script>
<link href="css/style.css" rel="stylesheet">
<?php include('container.php');?>
<div class="row">	
  <div class="col-xs-6">
  
<div class="heading">
		<h2>Unidad de vigilancia comunitaria</h2>
	</div>
<div class="login-form">
<form action="" method="post">
    <h2 class="text-center">Iniciar Sesión</h2>  
<div class="form-group">
<?php if ($loginError ) { ?>
<div class="alert alert-warning"><?php echo $loginError; ?></div>
<?php } ?>
</div>         
<div class="form-group">
    <input name="email" id="email" type="email" class="form-control" placeholder="Email address" autofocus required>
</div>
<div class="form-group">
    <input type="password" class="form-control" name="pwd" placeholder="Password" required>
</div> 
<div class="form-group">
    <button type="submit" name="login" class="btn btn-primary" style="width: 100%;"> Ingresar </button>
</div>
<div class="clearfix">
<label class="pull-left checkbox-inline"><input type="checkbox"> Recordarme</label>
</div>        
</form>
</div>   

</div>
<div class="col-xs-6">-</div>	
</div>		
</div>
<?php include('footer.php');?>