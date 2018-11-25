<?php require 'Views/modal/modal_Receta.php'; ?>

<div class="container" style="overflow: auto; width: 1131px; height: 500px;"><br>

 <?php 
 if (isset($_GET['action'])) {
 	if ($_GET['action']== 'okReceta') {
 	     echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Exitos!! </strong> El Plato Fue Agregado Satifactoriamente al sistema.
          </div>
        </center>';
 	}
 }

  if (isset($_GET['action'])) {
 	if ($_GET['action']== 'borrarReceta') {
 	     echo '<center><div class="alert alert-danger alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Exitos!! </strong> El Plato Fue Borrado Satifactoriamente Del Sistema.
          </div>
        </center>';
 	}
 }
if (isset($_GET['action'])) {
  if ($_GET['action']== 'okEditReceta') {
       echo '<center><div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <strong>Exitos!! </strong> Se Actualizo El Plato Satifactoriamente En El sistema.
          </div>
        </center>';
  }
 }
  ?>
<form method="POST">
 <div class="row">
	<div class="col-lg-8">
 <ol class="breadcrumb">
   <li class="breadcrumb-item active"><i class="fa fa-list"> </i> Lista De Platos</li>
 </ol>
	</div>
		<div class="col-lg-4">
		  <div class="alert alert-success" role="alert">
		  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#receta" data-whatever="@mdo">
		<i class="fa fa-plus"> </i> Registrar Nuevo Insumo
		  </button>
		</div>
   	  </div> 
   	<div class="col-md-8 text-center">
   	  	
	 <table class="table table-bordered table-hover dt-responsive" id="tablaProductos" >
	 	<thead class="bg-primary">
	 	<tr>
        <td class="td" align="center">Receta</td>
        <td class="td" align="center">Medida (Kg)</td>
	 	<td class="td" align="center">ID Productos</td>
        <td class="td" align="center">Id Insumos</td>
	 	</tr>
	 	</thead>

	 	<tbody>

	 		<?php
	 		     require_once "conexion.php";
	 		     $idProductos = $_GET['idProductos'];
	 		     $query = "SELECT * FROM receta WHERE Productos_idProductos = '$idProductos'";
	 		     $consulta1 = $mysqli->query($query);

	 		     while($fila = $consulta1 ->fetch_array(MYSQLI_ASSOC)){
	 		     	echo "<tr>
	 		     	         <td>".$fila['idReceta']."</td>
	 		     	         <td>".$fila['medida']."</td>
	 		     	         <td>".$fila['Productos_idProductos']."</td>
	 		     	         <td>".$fila['Insumos_idInsumos']."</td>
	 		     	      <tr>";
	 		     }
	 		?>
	 	</tbody>

<tr>
        <td class="td" align="center">ID Plato</td>
        <td class="td" align="center">Nombre</td>
        <td class="td" align="center">Costo</td>
        <td class="td" align="center">Descripcion</td>
        <td class="td" align="center">Categoria</td>
        <td class="td" align="center">Editar/Eliminar</td>
        <td class="td" align="center">Receta (Mostrar Receta/Agregar Insumo)</td>
      </tr>
</table>
   <br>
    </div>
    	

  </div>
</div>

 <?php 
     $platos = new PlatosController();
     $platos->getRecetaController();
     $platos->deletePlatosController();
    ?>