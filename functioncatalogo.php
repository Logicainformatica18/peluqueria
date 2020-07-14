<?php
if (!class_exists("connection")) {
  include("conexion.php");
}
//variables POST
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : "";
$metodo = isset($_POST['metodo']) ? $_POST['metodo'] : "";
$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : "";
$servicio = isset($_POST['servicio']) ? $_POST['servicio'] : "";
$genero = isset($_POST['genero']) ? $_POST['genero'] : "";
$categoria = isset($_POST['categoria']) ? $_POST['categoria'] : "";
$foto = isset($_FILES['foto']['tmp_name']) ? $_FILES['foto']['tmp_name'] : "";
//comprobamos si hay una foto o no
if ($foto != "") {
  //Convertimos la información de la imagen en binario para insertarla en la BBDD
  $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
}
$precio = isset($_POST['precio']) ? $_POST['precio'] : "";
$detalle = isset($_POST['detalle']) ? $_POST['detalle'] : "";
//comprobamos si hay una foto o no
if ($foto != "") {
  //Convertimos la información de la imagen en binario para insertarla en la BBDD
  $foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
}
//filtro




class catalogo extends connection
{
    public function catalogoSelect()
    {
        $sql = mysqli_query($this->open(), "SELECT ca.cod_catalogo,ca.descripcion,ca.precio,ca.foto, g.descripcion as genero,s.descripcion as servicio,c.descripcion as categoria,ca.detalle
    from catalogo ca inner join genero g inner join categoria c inner join servicio s on ca.cod_genero = g.cod_genero and
    ca.cod_servicio=s.cod_servicio and ca.cod_categoria=c.cod_categoria order by ca.cod_catalogo desc;"); ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">


              <div class="card-header">
                <h3 class="card-title">Tabla de catalogo</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped table-responsive">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Descripción</th>
                      <th>Precio</th>
                      <th>Foto</th>
                      <th>Genero</th>
                      <th>Servicio</th>
                      <th>Categoria</th>
                      <th>Detalle</th>
                      <th>Modificar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($sql)) {
                        echo "<tr>";
                        $catalogoid = $row[0];
                        echo "<td>" . $row[0] . "</td>";
                        echo "<td>" . $row[1] . "</td>";
                        echo "<td>" . $row[2] . "</td>";
                        // decodificar base 64
                        $foto = base64_encode($row[3]);
                        if ($foto == "") {
                            echo "<td height='50'>No Disponible</td>";
                        } else {
                            echo "<td height='50'><img src='data:image/jpeg;base64,$foto' width='50'height='50'></td>";
                        }
                        echo "<td>" . $row[4] . "</td>";
                        echo "<td>" . $row[5] . "</td>";
                        echo "<td>" . $row[6] . "</td>";
                        echo "<td>" .substr($row[7], 0, 20) . "...</td>"; ?>
                      <!-- Button trigger modal -->
                      <td><button type="button" class="btn btn-primary note-icon-pencil" data-toggle="modal" data-target="#exampleModal" onclick="catalogoSelectOne('<?php echo $catalogoid ?>'); catalogoEditar();  return false"></button>
                      </td>
                      <!-- <button class="note-icon-pencil" ></button> -->
                      <td><button class="btn btn-danger note-icon-trash" onclick="catalogoDelete('<?php echo $catalogoid ?>');  return false"></button></td>
                    <?php
                      echo "</tr>";
                    } ?>
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
    public function catalogoDelete($codigo)
    {
        //registra los datos del empleados
        $sql = "DELETE FROM catalogo where cod_catalogo='$codigo';";
        if (mysqli_query($this->open(), $sql)) {
        } else {
        }
        $this->catalogoSelect();
    }
    public function catalogoInsert($genero, $servicio, $categoria, $descripcion, $detalle, $foto, $precio)
    {
        //registra los datos del catalogo
        $sql = "INSERT INTO catalogo (cod_genero,cod_servicio,cod_categoria,descripcion,detalle,foto,precio)
     VALUES ('$genero','$servicio','$categoria','$descripcion','$detalle','$foto','$precio')";

        if (mysqli_query($this->open(), $sql)) {
            echo "<script> alert('Registrado Correctamente') </script>";
        } else {
            echo "<script> alert('Error de Registro')";
        }

        $this->catalogoSelect();
    }
    public function catalogoSelectOne($codigo)
    {
        $sql = mysqli_query($this->open(), "SELECT ca.cod_catalogo,ca.descripcion,ca.precio,ca.foto, g.cod_genero as genero,s.cod_servicio as servicio,c.cod_categoria as categoria,ca.detalle
    from catalogo ca inner join genero g inner join categoria c inner join servicio s on ca.cod_genero = g.cod_genero and
    ca.cod_servicio=s.cod_servicio and ca.cod_categoria=c.cod_categoria where cod_catalogo ='$codigo'");
        $r = mysqli_fetch_assoc($sql);
        $codigo = $r["cod_catalogo"];
        $descripcion = $r["descripcion"];
        $precio = $r["precio"];
        $foto = base64_encode($r["foto"]);
        $genero = $r["genero"];
        $servicio = $r["servicio"];
        $categoria = $r["categoria"];
        $descripcion = $r["descripcion"];
    
        $detalle = $r["detalle"];
        echo "<script>
      catalogo.codigo.value='$codigo';
      catalogo.descripcion.value='$descripcion';
      catalogo.precio.value='$precio';
      catalogo.genero.value='$genero';
   catalogo.fotografia.src='data:image/jpeg;base64,$foto';
      catalogo.servicio.value='$servicio';
      catalogo.categoria.value='$categoria';
      catalogo.detalle.value='$detalle';
      </script>";
        $this->catalogoSelect();
    }
    public function catalogoUpdate($codigo, $genero, $servicio, $categoria, $descripcion, $detalle, $foto, $precio)
    {
        if ($foto == "") {
            $sql = "UPDATE catalogo set cod_genero='$genero',cod_servicio='$servicio',cod_categoria='$categoria'
      ,descripcion='$descripcion',detalle='$detalle',precio='$precio' where cod_catalogo='$codigo'";
        } else {
            $sql = "UPDATE catalogo set cod_genero='$genero',cod_servicio='$servicio',cod_categoria='$categoria'
       ,descripcion='$descripcion',detalle='$detalle',foto='$foto',precio='$precio' where cod_catalogo='$codigo'";
        }
 
 
        if (mysqli_query($this->open(), $sql)) {
            echo "<script> alert('Modificado Correctamente') </script>";
            echo "<script>
      catalogo.codigo.value='$codigo';
      catalogo.descripcion.value='$descripcion';
      catalogo.precio.value='$precio';
      catalogo.genero.value='$genero';
   catalogo.fotografia.src='data:image/jpeg;base64,$foto';
      catalogo.servicio.value='$servicio';
      catalogo.categoria.value='$categoria';
      catalogo.detalle.value='$detalle';
      </script>";
        } else {
            echo "<script> alert('Error al modificar')";
        }
   
      
        $this->catalogoSelect();
    }
    public function catalogoSelectPublico($genero)
    {
        $sql = mysqli_query($this->open(), "SELECT c.descripcion,c.detalle,c.foto FROM catalogo c inner join genero g 
        on c.cod_genero=g.cod_genero where g.descripcion like '$genero';");
        echo "<div class='row'>";
        while ($row = mysqli_fetch_array($sql)) {
            $descripcion=$row[0];
            $detalle=$row[1];
            // decodificar base 64
            $foto = base64_encode($row[2]);

     
            echo "<div class='col-mb-6 col-lg-3 col-sm-12'> 
              <div class='card'><a href='#seccion'>";
            echo "<p></p><h5 class='card-title'>$descripcion</h5>
              <p class='card-text text-black'>$detalle.</p>";
            if ($foto == "") {
                echo "No disponible";
            } else {
                echo "<img src='data:image/jpeg;base64,$foto'class='card-img-top border' height='200px'>";
            }
            echo "
    </div>
    </div></a>
   ";
        }
        ?>

        </div>
        <?php
    }
}
$catalogo = new catalogo();
if ($metodo == "delete") {
  $catalogo->catalogoDelete($codigo);
} elseif ($metodo == "insert") {
  $catalogo->catalogoInsert($genero,$servicio,$categoria,$descripcion,$detalle,$foto,$precio);
} elseif ($metodo == "select") {
  $catalogo->catalogoSelectOne($codigo);
} elseif ($metodo == "update") {
  $catalogo->catalogoUpdate($codigo,$genero,$servicio,$categoria,$descripcion,$detalle,$foto,$precio);
}
