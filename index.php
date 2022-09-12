<!doctype html>
<html lang="es">
<head>
  <title>Página en PHP</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.0-beta1 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>
<body>
    <h1>Formulario Estudiantes</h1>
    <div class="container">
<form class="d-flex" action="crud_estudiantes.php" method="post">
    <div class="col">
    <div class="mb-3">
            <label for="lbl_id" class="form-label"><b>Id</b></label>
            <input type="txt" name="txt_id" id="txt_id" class="form-control" value="0" readonly>          
        </div>
        <div class="mb-3">
            <label for="lbl_carne" class="form-label"><b>Carne</b></label>
            <input type="txt" name="txt_carne" id="txt_carne" class="form-control" placeholder="Carne: Codigo_Carrera/Año/Codigo_Alumno" required>          
        </div>
        <div class="mb-3">
            <label for="lbl_nombres" class="form-label"><b>Nombres</b></label>
            <input type="txt" name="txt_nombres" id="txt_nombres" class="form-control" placeholder="Nombres: Nombre 1 Nombre 2" required>            
        </div>
        <div class="mb-3">
            <label for="lbl_apeillidos" class="form-label"><b>Apellidos</b></label>
            <input type="txt" name="txt_apeillidos" id="txt_apeillidos" class="form-control" placeholder="Apellidos: Apellido 1 Apellido 2" required>            
        </div>
        <div class="mb-3">
            <label for="lbl_direccion" class="form-label"><b>Direccion</b></label>
            <input type="txt" name="txt_direccion" id="txt_direccion" class="form-control" placeholder="Direccion: Numero de Casa/Avenida/Zona " required>            
        </div>
        <div class="mb-3">
            <label for="lbl_telefono" class="form-label"><b>Telefono</b></label>
            <input type="number" name="txt_telefono" id="txt_telefono" class="form-control" placeholder="Telefono: ######## " required>            
        </div>
        <div class="mb-3">
            <label for="lbl_correo_electronico" class="form-label"><b>Correo Electronico</b></label>
            <input type="txt" name="txt_correo_electronico" id="txt_correo_electronico" class="form-control" placeholder="Correo Electronico" required>            
        </div>
        <div class="mb-3">
          <label for="lbl_tipo_sangre" class="form-label"><b>Tipo Sangre</b></label>
          <select class="form-select" name="drop_tipo_sangre" id="drop_tipo_sangre">
            <option value=0>--- Tipo Sangre ---</option>
            <?php
            include("datos_conexion.php");
            $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
            $db_conexion ->real_query("select id_tipo_sangre as id,sangre from tipos_sangre;");
            $resultado = $db_conexion->use_result();
            while($fila = $resultado->fetch_assoc()){
                echo"<option value=". $fila['id'] .">". $fila['sangre'] ."</option>";
            }
            $db_conexion ->close();
            ?>
          </select>
        </div>
        <div class="mb-3">
            <label for="lbl_fecha_nacimiento" class="form-label"><b>fecha_nacimiento</b></label>
            <input type="date" name="txt_fecha_nacimiento" id="txt_fecha_nacimiento" class="form-control" placeholder="fecha_nacimiento" required>            
        </div>        
        <div class="mb-3">     
            <input type="submit" name="btn_Agregar" id="btn_Agregar" class="btn btn-primary" value="Agregar">     
            <input type="submit" name="btn_Modificar" id="btn_Modificar" class="btn btn-success" value="Modificar">   
            <input type="submit" name="btn_Eliminar" id="btn_Eliminar" class="btn btn-danger" value="Eliminar">     
        </div>
    </div>
</form>
<table class="table table-striped table-inverse table-responsive">
    <thead class="thead-inverse">
      <tr>
        <th>carne</th>
        <th>nombres</th>
        <th>apellidos</th>
        <th>direccion</th>
        <th>telefono</th>
        <th>correo_electronico</th>
        <th>id_tipo_sangre</th>
        <th>fecha_nacimiento</th>
      </tr>
      </thead>
      <tbody id="tbl_estudiantes" >  
            <?php
            include("datos_conexion.php");
            $db_conexion = mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
            $db_conexion ->real_query("select e.id_estudiantes as id,e.carne,e.nombres,e.apellidos,e.direccion,e.telefono,e.correo_electronico,id_tipo_sangre,e.fecha_nacimiento,e.id_tipo_sangre FROM estudiantes as e inner join tipos_sangre as t on e.id_tipo_sangre = t.id_tipo_sangre;");
            $resultado = $db_conexion->use_result();
            while($fila = $resultado->fetch_assoc()){
                echo"<tr data-id=". $fila['id'] ." data-ids=". $fila['id_tipo_sangre'] .">";
                echo"<td>". $fila['carne'] ."</td>";
                echo"<td>". $fila['nombres'] ."</td>";
                echo"<td>". $fila['apeillidos'] ."</td>";
                echo"<td>". $fila['direccion'] ."</td>";
                echo"<td>". $fila['telefono'] ."</td>";
                echo"<td>". $fila['correo_electronico'] ."</td>";
                echo"<td>". $fila['sangre'] ."</td>";
                echo"<td>". $fila['fecha_nacimiento'] ."</td>";
                echo"</tr>";
            }
            $db_conexion ->close();
            ?>

     </table>
</div>
    </div>

  <!-- Bootstrap JavaScript Libraries -->
  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
    integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js"
    integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" 
  integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
  <script type="text/javascript"></script>
  <script>
      $("#tbl_estudiantes").on('click','tr td',function (e) {
        var target,id,ids,carne,nombres,apeillidos,direccion,telefono,correo_electronico,fecha_nacimiento;
        target = $(event.target);
        id = target.parent().data('id');
        ids = target.parent().data('ids');
        carne = target.parent('tr').find("td").eq(0).html();
        nombres = target.parent('tr').find("td").eq(1).html();
        apeillidos = target.parent('tr').find("td").eq(2).html();
        direccion = target.parent('tr').find("td").eq(3).html();
        telefono = target.parent('tr').find("td").eq(4).html();
        correo_electronico = target.parent('tr').find("td").eq(5).html();
        fecha_nacimiento = target.parent('tr').find("td").eq(7).html();
        $("#txt_id").val(id);
        $("#txt_carne").val(carne);
        $("#txt_nombres").val(nombres);
        $("#txt_apeillidos").val(apeillidos);
        $("#txt_direccion").val(direccion);
        $("#txt_telefono").val(telefono);
        $("#txt_correo_electronico").val(correo_electronico);
        $("#drop_tipo_sangre").val(ids);
        $("#txt_fecha_nacimiento").val(fecha_nacimiento);
        
    });
  </script>  
  </body>
</html>