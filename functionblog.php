<?php
if (!class_exists("connection")) {
  include("conexion.php");
}
//variables POST
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : "";
$metodo = isset($_POST['metodo']) ? $_POST['metodo'] : "";

$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : "";
$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : "";
//filtro




class blog extends connection
{


  public function blogSelect()
  {
    //consulta todos los empleados
    $sql = mysqli_query($this->open(), "SELECT IdProveedor,NombreCompania, Telefono,Direccion FROM blog;");
?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">


              <div class="card-header">
                <h3 class="card-title">Tabla de productos</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Nombre</th>
                      <th>Telefono</th>
                      <th>Dirección</th>
                      <th>Modificar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($sql)) {
                      echo "<tr>";
                      $blogid = $row[0];
                      echo "<td>" .  $blogid . "</td>";
                      echo "<td>" . $row[1] . "</td>";
                      echo "<td>" . $row[2] . "</td>";
                      echo "<td>" . $row[3] . "</td>";
                    ?>
                      <!-- Button trigger modal -->
                      <td><button type="button" class="btn btn-primary note-icon-pencil" data-toggle="modal" data-target="#exampleModal" onclick="blogSelectOne('<?php echo $blogid ?>'); blogEditar();  return false"></button></td>
                      <!-- <button class="note-icon-pencil" ></button> -->
                      <td><button class="btn btn-danger  note-icon-trash" onclick="blogDelete('<?php echo $blogid ?>');  return false"></button></td>
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
  public function blogDelete($codigo)
  {
    //registra los datos del empleados
    $sql = "DELETE FROM blog where idproveedor='$codigo';";
    if (mysqli_query($this->open(), $sql)) {
    } else {
    }
    $this->blogSelect();
  }
  public function blogInsert($nombre, $telefono, $direccion)
  {
    //registra los datos del blog
    $sql = "INSERT INTO blog (nombrecompania,telefono,direccion) VALUES ('$nombre','$telefono','$direccion')";
    mysqli_query($this->open(), $sql) or die('Error. ' . mysqli_error($sql));
    $this->blogSelect();
  }
  public function blogSelectOne($codigo)
  {
    //registra los datos del empleados
    $sql = mysqli_query($this->open(), "SELECT * from blog where idproveedor ='$codigo'");
    $r = mysqli_fetch_assoc($sql);
    $codigo = $r["IdProveedor"];
    $nombre = $r["NombreCompania"];
    $telefono = $r["Telefono"];
    $direccion = $r["Direccion"];
    echo "<script>
      blog.codigo.value='$codigo';
      blog.nombre.value='$nombre';
      blog.telefono.value='$telefono';
      blog.direccion.value='$direccion';
      </script>";
    $this->blogSelect();
  }
  public function blogUpdate($codigo, $nombre, $telefono, $direccion)
  {
    $sql = "UPDATE blog set nombrecompania='$nombre',telefono='$telefono' ,direccion='$direccion'where idproveedor='$codigo'";
    mysqli_query($this->open(), $sql) or die('Error. ' . mysqli_error($sql));
    echo "<script>	
    blog.codigo.value='$codigo';
    blog.nombre.value='$nombre';
    blog.telefono.value='$telefono';
    blog.direccion.value='$direccion';
        </script>";
    $this->blogSelect();
  }
}

$blog = new blog();
if ($metodo == "delete") {
  $blog->blogDelete($codigo);
} elseif ($metodo == "insert") {
  $blog->blogInsert($nombre, $telefono, $direccion);
} elseif ($metodo == "select") {
  $blog->blogSelectOne($codigo);
} elseif ($metodo == "update") {
  $blog->blogUpdate($codigo, $nombre, $telefono, $direccion);
}