<?php
if (!class_exists("connection")) {
  include("conexion.php");
}
//variables POST
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : "";
$metodo = isset($_POST['metodo']) ? $_POST['metodo'] : "";

$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
$detalle = isset($_POST['detalle']) ? $_POST['detalle'] : "";
//comprobamos si hay una foto o no



class categoria extends connection
{


  public function categoriaSelect()
  {

    $sql = mysqli_query($this->open(), "SELECT * from categoria;");
?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">


              <div class="card-header">
                <h3 class="card-title">Tabla de categoria</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Descripción</th>
                      <th>Detalle</th>
                      <th>Modificar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($sql)) {
                      echo "<tr>";
                      $categoriaid = $row[0];
                      echo "<td>" . $row[0] . "</td>";
                      echo "<td>" . $row[1] . "</td>";
                      echo "<td>" . $row[2] . "</td>";
                    ?>
                      <!-- Button trigger modal -->
                      <td><button type="button" class="btn btn-primary note-icon-pencil" data-toggle="modal" data-target="#exampleModal" onclick="categoriaSelectOne('<?php echo $categoriaid ?>'); categoriaEditar();  return false"></button>
                      </td>
                      <!-- <button class="note-icon-pencil" ></button> -->
                      <td><button class="btn btn-danger note-icon-trash" onclick="categoriaDelete('<?php echo $categoriaid ?>');  return false"></button></td>
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
  public function categoriaDelete($codigo)
  {
    //registra los datos del empleados
    $sql = "DELETE FROM categoria where cod_categoria='$codigo';";
    if (mysqli_query($this->open(), $sql)) {
    } else {
    }
    $this->categoriaSelect();
  }
  public function categoriaInsert($descripcion,$detalle)
  {
    //registra los datos del categoria
    $sql = "INSERT INTO categoria (descripcion,detalle) VALUES ('$descripcion','$detalle')";

    if (mysqli_query($this->open(), $sql)) {
      echo "<script> alert('Registrado Correctamente') </script>";
    } else {
      echo "<script> alert('Error de Registro')";
    }

    $this->categoriaSelect();
  }
  public function categoriaSelectOne($codigo)
  {
    $sql = mysqli_query($this->open(), "SELECT * from categoria where cod_categoria ='$codigo'");
    $r = mysqli_fetch_assoc($sql);
    $codigo = $r["cod_categoria"];
    $descripcion = $r["descripcion"];
    $detalle = $r["detalle"];
    echo "<script>
      categoria.codigo.value='$codigo';
      categoria.descripcion.value='$descripcion';
      categoria.detalle.value='$detalle';
      </script>";
    $this->categoriaSelect();
  }
  public function categoriaUpdate($codigo, $descripcion,$detalle)
  {

      $sql = "UPDATE categoria set descripcion='$descripcion',detalle='$detalle' where cod_categoria='$codigo'";
 
    if (mysqli_query($this->open(), $sql)) {
      echo "<script> alert('Modificado Correctamente') </script>";
      echo "<script>	
    categoria.codigo.value='$codigo';
    categoria.descripcion.value='$descripcion';
    categoria.detalle.value='$detalle';
   </script>";
    } else {
      echo "<script> alert('Error al modificar')";
    }
    
    $this->categoriaSelect();
  }
}

$categoria = new categoria();
if ($metodo == "delete") {
  $categoria->categoriaDelete($codigo);
} elseif ($metodo == "insert") {
  $categoria->categoriaInsert($descripcion,$detalle);
} elseif ($metodo == "select") {
  $categoria->categoriaSelectOne($codigo);
} elseif ($metodo == "update") {
  $categoria->categoriaUpdate($codigo, $descripcion,$detalle);
}
