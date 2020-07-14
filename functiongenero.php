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




class genero extends connection
{


  public function generoSelect()
  {

    $sql = mysqli_query($this->open(), "SELECT * from genero;");
?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">


              <div class="card-header">
                <h3 class="card-title">Tabla de genero</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-responsive">
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
                      $generoid = $row[0];
                      echo "<td>" . $row[0] . "</td>";
                      echo "<td>" . $row[1] . "</td>";

                      // decodificar base 64
                      $foto = base64_encode($row[2]);
                      if ($foto == "") {
                        echo "<td height='50'>No Disponible</td>";
                      } else {
                        echo "<td height='50'><img src='data:image/jpeg;base64,$foto' width='50'height='50'></td>";
                      }
                      echo "<td>" . $row[3] . "</td>";
                    ?>
                      <!-- Button trigger modal -->
                      <td><button type="button" class="btn btn-primary note-icon-pencil" data-toggle="modal" data-target="#exampleModal" onclick="generoSelectOne('<?php echo $generoid ?>'); generoEditar();  return false"></button>
                      </td>
                      <!-- <button class="note-icon-pencil" ></button> -->
                      <td><button class="btn btn-danger note-icon-trash" onclick="generoDelete('<?php echo $generoid ?>');  return false"></button></td>
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
  public function generoDelete($codigo)
  {
    //registra los datos del empleados
    $sql = "DELETE FROM genero where cod_genero='$codigo';";
    if (mysqli_query($this->open(), $sql)) {
    } else {
    }
    $this->generoSelect();
  }
  public function generoInsert($descripcion, $foto, $detalle)
  {
    //registra los datos del genero
    $sql = "INSERT INTO genero (descripcion,foto,detalle) VALUES ('$descripcion','$foto','$detalle')";

    if (mysqli_query($this->open(), $sql)) {
      echo "<script> alert('Registrado Correctamente') </script>";
    } else {
      echo "<script> alert('Error de Registro')";
    }

    $this->generoSelect();
  }
  public function generoSelectOne($codigo)
  {
    $sql = mysqli_query($this->open(), "SELECT * from genero where cod_genero ='$codigo'");
    $r = mysqli_fetch_assoc($sql);
    $codigo = $r["cod_genero"];
    $descripcion = $r["descripcion"];
    $foto = base64_encode($r["foto"]);
    $detalle = $r["detalle"];
    echo "<script>
      genero.codigo.value='$codigo';
      genero.descripcion.value='$descripcion';
      genero.detalle.value='$detalle';
      document.getElementById('fotografia').src='data:image/jpeg;base64,$foto';
      </script>";
    $this->generoSelect();
  }
  public function generoUpdate($codigo, $descripcion, $foto, $detalle)
  {
    //si no hay ninguna foto eso quiere decir que no actualizaremos el campo foto
    // ya que si lo dejamos, la anterior foto lo eliminara si el valor es nulo
    if ($foto == "") {
      $sql = "UPDATE genero set descripcion='$descripcion',detalle='$detalle' where cod_genero='$codigo'";
    } else {
      $sql = "UPDATE genero set descripcion='$descripcion',foto='$foto',detalle='$detalle' where cod_genero='$codigo'";
    }
    if (mysqli_query($this->open(), $sql)) {
      echo "<script> alert('Modificado Correctamente') </script>";
      echo "<script>	
      genero.codigo.value='$codigo';
      genero.descripcion.value='$descripcion';
      genero.detalle.value='$detalle';
      document.getElementById('fotografia').src= document.getElementById('foto_subida').src
     </script>";
    } else {
      echo "<script> alert('Error al modificar')";
    }

    $this->generoSelect();
  }


  public function generoSelect2()
  {
    $sql = mysqli_query($this->open(), "SELECT * from genero;");

    echo "<div class='row'>";
    while ($row = mysqli_fetch_array($sql)) {
      $descripcion = $row[1];
      $detalle = $row[3];
      // decodificar base 64
      $foto = base64_encode($row[2]);

      echo "
      <div class='card text-black col-lg-4 col-md-6 '><p></p> ";
?>
 
      <a href='#'onclick="elegirGenero('<?php echo $descripcion?>');">
      <?php
 echo "     <h5 class='card-title'>$descripcion</h5>";
      
      if ($foto == "") {
        echo "No disponible";
      } else {
        echo "<img src='data:image/jpeg;base64,$foto'class='card-img-top' height='230'>";
      }
    echo "<div class='card'>
       
        <p class='card-text text-black'>$detalle.</p>
      </div>
      </a>
      </div>
     
      ";
    }
  ?>

    </div>

<?php

  }
}

$genero = new genero();
if ($metodo == "delete") {
  $genero->generoDelete($codigo);
} elseif ($metodo == "insert") {
  $genero->generoInsert($descripcion, $foto, $detalle);
} elseif ($metodo == "select") {
  $genero->generoSelectOne($codigo);
} elseif ($metodo == "update") {
  $genero->generoUpdate($codigo, $descripcion, $foto, $detalle);
}
