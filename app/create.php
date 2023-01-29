<?php 
session_start();
include('header.php');
include 'Servicio.php';
$servicio = new Servicio();
$servicio->checkLoggedIn();
if(!empty($_POST['companyName']) && $_POST['companyName']) {	
	$servicio->saveServicio($_POST);
	header("Location:vigilancia.php");	
}
?>
<title>Vigilancia</title>
<script src="js/servicio.js"></script>
<link href="css/style.css" rel="stylesheet">
<?php include('container.php');?>
<div class="container content-servicio">
<form action="" id="servicio-form" method="post" class="servicio-form" role="form" novalidate> 
<div class="load-animate animated fadeInUp">
<div class="row">
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
    <h2 class="title">unidad de vigilancia comunitaria</h2>
    <?php include('menu.php');?>	
</div>		    		
</div>
<input id="currency" type="hidden" value="$">
<div class="row">
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
    <h3>De,</h3>
    <?php echo $_SESSION['user']; ?><br>	
    <?php echo $_SESSION['address']; ?><br>	
    <?php echo $_SESSION['mobile']; ?><br>
    <?php echo $_SESSION['email']; ?><br>	
</div>      		
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 pull-right">
    <h3>Para,</h3>
    <div class="form-group">
        <input type="text" class="form-control" name="companyName" id="companyName" placeholder="Nombre de Empresa" autocomplete="off">
    </div>
    <div class="form-group">
        <textarea class="form-control" rows="3" name="address" id="address" placeholder="Su dirección"></textarea>
    </div>
    
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <table class="table table-bordered table-hover" id="invoiceItem">	
        <tr>
            <th width="2%"><input id="checkAll" class="formcontrol" type="checkbox"></th>
            <th width="15%">No</th>
            <th width="38%">Nombre Servicio</th>
            <th width="15%">Dias</th>
            
        </tr>							
        <tr>
            <td><input class="itemRow" type="checkbox"></td>
            <td><input type="text" name="productCode[]" id="productCode_1" class="form-control" autocomplete="off"></td>
            <td><input type="text" name="productName[]" id="productName_1" class="form-control" autocomplete="off"></td>			
            <td><input type="number" name="quantity[]" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
           
        </tr>						
    </table>
</div>
</div>
<div class="row">
<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
    <button class="btn btn-danger delete" id="removeRows" type="button">- Borrar</button>
    <button class="btn btn-success" id="addRows" type="button">+ Agregar Más</button>
</div>
</div>
<div class="row">	
<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
    <h3>Notas: </h3>
    <div class="form-group">
        <textarea class="form-control txt" rows="5" name="notes" id="notes" placeholder="Notas"></textarea>
    </div>
    <br>
    <div class="form-group">
        <input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control" name="userId">
        <input data-loading-text="Guardando..." type="submit" name="invoice_btn" value="Guardar" class="btn btn-success submit_btn servicio-save-btm">						
    </div>
    
</div>

</div>
<div class="clearfix"></div>		      	
</div>
</form>			
</div>
</div>	
<?php include('footer.php');?>