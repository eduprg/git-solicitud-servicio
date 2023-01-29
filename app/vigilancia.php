<?php 
session_start();
include('header.php');
include 'Servicio.php';
$servicio = new Servicio();
$servicio->checkLoggedIn();
?>
<title>Unidad de vigilancia comunitaria</title>
<script src="js/servicio.js"></script>
<link href="css/style.css" rel="stylesheet">
<?php include('container.php');?>
<div class="container">		
<h2 class="title">Unidad de vigilancia comunitaria</h2>
<?php include('menu.php');?>			  
<table id="data-table" class="table table-condensed table-striped">
<thead>
  <tr>
    <th width="7%">No.</th>
    <th width="15%">Fecha Creación</th>
    <th width="35%">Vigilancia</th>
    <th width="35%">Nota</th>
    <th width="15%">Estado</th>
    <th width="3%"></th>
    <th width="3%"></th>
    <th width="3%"></th>
  </tr>
</thead>
<?php		
$invoiceList = $servicio->getInvoiceList();
foreach($invoiceList as $Detalle){
    $invoiceDate = date("d/M/Y, H:i:s", strtotime($Detalle["date"]));
    echo '
      <tr>
        <td>'.$Detalle["order_id"].'</td>
        <td>'.$invoiceDate.'</td>
        <td>'.$Detalle["receiver_name"].'</td>
         <td>'.$Detalle["note"].'</td>
        <td>'.$Detalle["order_stado"].'</td>
        <td><a href="print_servicio.php?invoice_id='.$Detalle["order_id"].'" title="Imprimir"><div class="btn btn-primary"><span class="glyphicon glyphicon-print"></span></div></a></td>
        
        <td><a href="#" id="'.$Detalle["order_id"].'" class="deleteVigilancia"  title="Borrar"><div class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></div></a></td>
      </tr>
    ';
}       
?>
</table>	
</div>	
<?php include('footer.php');?>