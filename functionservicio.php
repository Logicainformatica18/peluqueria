<?php
if (!class_exists("connection")) {
  include("conexion.php");
}
//variables POST
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : "";
$metodo = isset($_POST['metodo']) ? $_POST['metodo'] : "";

$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
$detalle = isset($_POST['detalle']) ? $_POST['detalle'] : "";
$foto = isset($_FILES['foto']['tmp_name']) ? $_FILES['foto']['tmp_name'] : "";
//comprobamos si hay una foto o no
if ($foto != "") {
  //Convertimos la información de la imagen en binario para insertarla en la BBDD
  $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
}
//filtro




class servicio extends connection
{


  public function servicioSelect()
  {

    $sql = mysqli_query($this->open(), "SELECT * from servicio;");
?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">


              <div class="card-header">
                <h3 class="card-title">Tabla de servicio</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Descripción</th>
                      <th>Foto</th>
                      <th>Detalle</th>
                      <th>Modificar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($sql)) {
                      echo "<tr>";
                      $servicioid = $row[0];
                      echo "<td>" . $row[0] . "</td>";
                      echo "<td>" . $row[1] . "</td>";
                  
                      // decodificar base 64
                      $foto = base64_encode($row[3]);
                      if ($foto == "") {
                        echo "<td height='50'>No Disponible</td>";
                      } else {
                        echo "<td height='50'><img src='data:image/jpeg;base64,$foto' width='50'height='50'></td>";
                      }
                      echo "<td>" . $row[2] . "</td>";
                    ?>
                      <!-- Button trigger modal -->
                      <td><button type="button" class="btn btn-primary note-icon-pencil" data-toggle="modal" data-target="#exampleModal" onclick="servicioSelectOne('<?php echo $servicioid ?>'); servicioEditar();  return false"></button>
                      </td>
                      <!-- <button class="note-icon-pencil" ></button> -->
                      <td><button class="btn btn-danger note-icon-trash" onclick="servicioDelete('<?php echo $servicioid ?>');  return false"></button></td>
                    <?php
                      echo "</tr>";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->


  <?php
  
  }
  public function servicioDelete($codigo)
  {
    //registra los datos del empleados
    $sql = "DELETE FROM servicio where cod_servicio='$codigo';";
    if (mysqli_query($this->open(), $sql)) {
    } else {
    }
    $this->servicioSelect();
  }
  public function servicioInsert($descripcion, $foto,$detalle)
  {
    //registra los datos del servicio
    $sql = "INSERT INTO servicio (descripcion,foto,detalle) VALUES ('$descripcion','$foto','$detalle')";

    if (mysqli_query($this->open(), $sql)) {
      echo "<script> alert('Registrado Correctamente') </script>";
    } else {
      echo "<script> alert('Error de Registro')";
    }

    $this->servicioSelect();
  }
  public function servicioSelectOne($codigo)
  {
    $sql = mysqli_query($this->open(), "SELECT * from servicio where cod_servicio ='$codigo'");
    $r = mysqli_fetch_assoc($sql);
    $codigo = $r["cod_servicio"];
    $descripcion = $r["descripcion"];
    $foto = base64_encode($r["foto"]);
    $detalle = $r["detalle"];
    echo "<script>
      servicio.codigo.value='$codigo';
      servicio.descripcion.value='$descripcion';
      servicio.detalle.value='$detalle';
      document.getElementById('fotografia').src='data:image/jpeg;base64,$foto';
      </script>";
    $this->servicioSelect();
  }
  public function servicioUpdate($codigo, $descripcion, $foto,$detalle)
  {
    //si no hay ninguna foto eso quiere decir que no actualizaremos el campo foto
    // ya que si lo dejamos, la anterior foto lo eliminara si el valor es nulo
    if ($foto == "") {
      $sql = "UPDATE servicio set descripcion='$descripcion',detalle='$detalle' where cod_servicio='$codigo'";
    } else {
      $sql = "UPDATE servicio set descripcion='$descripcion',foto='$foto',detalle='$detalle' where cod_servicio='$codigo'";
    }
    if (mysqli_query($this->open(), $sql)) {
      echo "<script> alert('Modificado Correctamente') </script>";
    } else {
      echo "<script> alert('Error al modificar')";
    }
    echo "<script>	
    servicio.codigo.value='$codigo';
    servicio.descripcion.value='$descripcion';
    servicio.detalle.value='$detalle';
  	document.getElementById('fotografia').src= document.getElementById('foto_subida').src
   </script>";
    $this->servicioSelect();
  }


  public function servicioSelect2()
  {
    $sql = mysqli_query($this->open(), "SELECT * from servicio;");
    echo "<div class='row'>";
    while ($row = mysqli_fetch_array($sql)) {
      $descripcion=$row[1];
      $detalle=$row[3];
      // decodificar base 64
      $foto = base64_encode($row[2]);

     
      echo "<div class='col-mb-6 col-lg-3 col-sm-12 '> 
              <div class='card'><a href='#seccion'>";
      if ($foto == "") {
        echo "No disponible";
      } else {
        echo "<img src='data:image/jpeg;base64,$foto'class='card-img-top border'>";
            }
            echo "<p></p><h5 class='card-title'>$descripcion</h5>
      <p class='card-text text-black'>$detalle.</p>
    </div>
    </div></a>
   ";
    }
  ?>

</div>
<?php

  }
}

$servicio = new servicio();
if ($metodo == "delete") {
  $servicio->servicioDelete($codigo);
} elseif ($metodo == "insert") {
  $servicio->servicioInsert($descripcion, $foto,$detalle);
} elseif ($metodo == "select") {
  $servicio->servicioSelectOne($codigo);
} elseif ($metodo == "update") {
  $servicio->servicioUpdate($codigo, $descripcion, $foto,$detalle);
}
