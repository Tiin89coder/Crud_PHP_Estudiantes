<?php
if (!empty($_POST)){
          $txt_id = utf8_decode($_POST["txt_id"]);  
          $txt_carne = utf8_decode($_POST["txt_carne"]);
          $txt_nombres = utf8_decode($_POST["txt_nombres"]);
          $txt_apeillidos = utf8_decode($_POST["txt_apeillidos"]);
          $txt_direccion = utf8_decode($_POST["txt_direccion"]);
          $txt_telefono = utf8_decode($_POST["txt_telefono"]);
          $txt_correo_electronico = utf8_decode($_POST["txt_correo_electronico"]);
          $drop_tipo_sangre = utf8_decode($_POST["drop_tipo_sangre"]);
          $txt_fecha_nacimiento = utf8_decode($_POST["txt_fecha_nacimiento"]);

          $sql = "";

          if (isset($_POST["btn_Agregar"])){
              $sql ="INSERT INTO estudiantes(carne,nombres,apeillidos,direccion,telefono,correo_electronico,id_tipo_sangre,fecha_nacimiento) VALUES('". $txt_carne ."','". $txt_nombres ."','". $txt_apeillidos ."','". $txt_direccion ."','". $txt_telefono ."','". $txt_correo_electronico ."',". $drop_tipo_sangre .",'". $txt_fecha_nacimiento ."');";
          }
          if (isset($_POST["btn_Modificar"])){
            $sql ="update estudiantes set carne='". $txt_carne ."',nombres='". $txt_nombres ."',apeillidos='". $txt_apeillidos ."',direccion='". $txt_direccion ."',telefono='". $txt_telefono ."',correo_electronico='". $txt_correo_electronico ."',id_tipo_sangre=". $drop_tipo_sangre ."',fecha_nacimiento='". $txt_fecha_nacimiento ." where id_estudiantes = ". $txt_id .";";
        }
          if(isset($_POST["btn_Eliminar"])){
              $sql ="delete from estudiantes where id_estudiantes =". $txt_id ." ;";
          }
              include("datos_conexion.php");
                  $db_conexion=mysqli_connect($db_host,$db_usr,$db_pass,$db_nombre);
                 
                  if ($db_conexion->query($sql)===true){
                      $db_conexion->close();

                      header("Location: /estudiantesumg_php");
                  }else{
                      echo"Error" . $sql . "<br>" .$db_conexion->close();  
                  }
      }
       
    ?>