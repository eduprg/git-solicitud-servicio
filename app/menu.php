<ul class="nav navbar-nav">
<li class="dropdown">
	<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Servicio
	<span class="caret"></span></button>
	<ul class="dropdown-menu">
		<li><a href="vigilancia.php">Lista</a></li>
		<li><a href="create.php">Crear</a></li>				  
	</ul>
</li>
<?php 
if($_SESSION['userid']) { ?>
	<li class="dropdown">
		<button class="btn btn-info dropdown-toggle" type="button" data-toggle="dropdown">Conectado: <?php echo $_SESSION['user']; ?>
		<span class="caret"></span></button>
		<ul class="dropdown-menu">
			<li><a href="#">Mi Cuenta</a></li>
			<li><a href="action.php?action=logout">Salir</a></li>		  
		</ul>
	</li>
<?php } ?>
</ul>
<br /><br /><br /><br />