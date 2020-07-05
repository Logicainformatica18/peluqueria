<?php
if (!class_exists("session")) {
	class session
	{
		public function session_inicio()
		{
			return session_start();
		}
	}

	$session = new session();
	$session->session_inicio();
}
if (!class_exists("connection")) {
	include("conexion.php");
}
//variables POST
$dni = isset($_POST['dni']) ? $_POST['dni'] : "";
$codigo = isset($_POST['codigo']) ? $_POST['codigo'] : "";
$cargo = isset($_POST['cargo']) ? $_POST['cargo'] : "";
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
$paterno = isset($_POST['paterno']) ? $_POST['paterno'] : "";
$materno = isset($_POST['materno']) ? $_POST['materno'] : "";
$celular = isset($_POST['celular']) ? $_POST['celular'] : "";
$criterio = isset($_POST['criterio']) ? $_POST['criterio'] : "";
$foto = isset($_FILES['foto']['tmp_name']) ? $_FILES['foto']['tmp_name'] : "";
$email = isset($_POST['email']) ? $_POST['email'] : "";
$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : "";
if ($sexo == "") {
	$sexo = "M";
}
$login = isset($_POST['login']) ? $_POST['login'] : "";
$password = isset($_POST['password']) ? $_POST['password'] : "";
$metodo = isset($_POST['metodo']) ? $_POST['metodo'] : "";
/// CAMBIAR CONTRASEÑA

////////////////////////////////////////////////////////////////////
$new_password          = isset($_POST['new_password']) ? $_POST['new_password'] : "";
$repetir_password  = isset($_POST['repetir_password']) ? $_POST['repetir_password'] : "";
// CAMBIAR CONTRASEÑA

//FILTRO
$criterio1 = isset($_POST['criterio1']) ? $_POST['criterio1'] : "";

//FILTRO


//comprobamos si hay una foto o no
if ($foto != "") {
	//Convertimos la información de la imagen en binario para insertarla en la BBDD
	$foto = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
}

//FECHA
$dia = isset($_POST['Dia']) ? $_POST['Dia'] : "";
$mes = isset($_POST['Mes']) ? $_POST['Mes'] : "";
$año = isset($_POST['Año']) ? $_POST['Año'] : "";
//FECHA

//BUSQUEDA INTELIGENTE
$criterio3 = isset($_POST['criterio3']) ? $_POST['criterio3'] : "";
//
class person extends connection
{
	public $dni;
	public $nombre;
	public $paterno;
	public $materno;
	public $dia;
	public $mes;
	public $año;
	public $fec_nac;
	public $sexo;
	public $foto;
	public $celular;
	public $email;
	public $password;
	public $cargo = "";
	public function __construct($person)
	{
		$this->person = $person;
	}
	public function personSelect()
	{
		//consulta todos los person
		$sql = mysqli_query($this->open(), "SELECT p.dni ,p.paterno,p.materno,p.nombre,p.foto,p.celular,c.nombre as cargo,p.email,p.sexo 
		from person p inner join cargo c on p.cargoid=c.cargoid;  ");
?>
		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="card">


							<div class="card-header">
								<h3 class="card-title">Tabla de person</h3>
							</div>
							<!-- /.card-header -->
							<div class="card-body">
								<table id="example1" class="table table-bordered table-striped table-responsive">
									<thead>
										<tr>
											<th>Dni</th>
											<th>Paterno</th>
											<th>Materno</th>
											<th>Nombres</th>
											<th>Celular</th>
											<th>Foto</th>
											<th>Cargo</th>

											<th>Modificar</th>
											<th>Eliminar</th>
										</tr>
									</thead>
									<tbody>
										<?php
										while ($row = mysqli_fetch_array($sql)) {
											echo "<tr>";
											$personid = $row[0];
											echo "<td>" .  $row[0] . "</td>";
											echo "<td>" .  $row[1] . "</td>";
											echo "<td>" . $row[2] . "</td>";
											echo "<td>" . $row[3] . "</td>";
											echo "<td>" . $row[5] . "</td>";
											// decodificar base 64
											$foto = base64_encode($row[4]);
											if ($foto == "") {
												echo "<td >No Disponible</td>";
											} else {
												echo "<td ><img src='data:image/jpeg;base64,$foto' width='100'height='100'></td>";
											}

											echo "<td>" . $row[6] . "</td>";

										?>
											<!-- Button trigger modal -->
											<td><button type="button" class="btn btn-primary note-icon-pencil" data-toggle="modal" data-target="#exampleModal" onclick="personSelectOne('<?php echo $personid ?>'); personEditar();  return false"></button>
											</td>
											<!-- <button class="note-icon-pencil" ></button> -->
											<td><button class="btn btn-danger note-icon-trash" onclick="personDelete('<?php echo $personid ?>');  return false"></button></td>
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
	public function personInsert($dni, $person, $paterno, $materno, $nombre, $celular, $dia, $mes, $año, $foto, $email, $sexo)
	{
		if ($dia < 10) {
			$dia = "0" . $dia;
		}
		if ($mes < 10) {
			$mes = "0" . $mes;
		}
		//VALIDAR FECHA
		if ($dia < 1 || $mes < 1) {
			echo "<script type='text/javascript'> alert('Elija correctamente su Fecha de cumpleaños');</script>";
			$this->personSelect();
			exit;
		}
		//VALIDAR FECHA
		$fec_nac =    $año . "-" . $mes . "-" . $dia;
		//registra los datos del person
		$sql = "INSERT INTO person (dni,personid,paterno,materno,nombre,celular,fec_nac,foto,fec_reg,fec_mod,password,email,sexo,discriminator) VALUES ('$dni','$person','$paterno', '$materno', '$nombre','$celular','$fec_nac','$foto',now(),now(),'$dni','$email','$sexo','')";
		mysqli_query($this->open(), $sql) or die("<script>alert('Error de Registro'); </script> ");
		$this->personSelect();
	}
	public function personDelete($codigo)
	{
		//registra los datos del person
		$sql = "DELETE FROM person where dni ='$codigo'";
		mysqli_query($this->open(), $sql) or die('Error. ' . mysqli_error($sql));
		$this->personSelect();
	}
	public function personSelectOne($codigo)
	{
		//registra los datos del person
		$sql = mysqli_query($this->open(), "SELECT p.dni ,p.paterno,p.materno,p.nombre,p.foto,p.celular,p.email,p.sexo, c.cargoid as cargo,day(p.fec_nac)as dia,month(p.fec_nac)as mes,year(p.fec_nac)as anio from person p inner join cargo c on p.cargoid=c.cargoid  where dni ='$codigo'");
		$r = mysqli_fetch_assoc($sql);
		$codigo = $r["dni"];
		$paterno = $r["paterno"];
		$materno = $r["materno"];
		$nombre = $r["nombre"];
		$celular = $r["celular"];
		$foto = base64_encode($r["foto"]);
		$person = $r["person"];
		$dia = $r["dia"];
		$mes = $r["mes"];
		$año = $r["anio"];
		$email = $r["email"];
		$sexo = $r["sexo"];
		if ($sexo == 'M') {
			echo "<script>person.sexo.checked=false;</script>";
		} else {
			echo "<script>person.sexo.checked=true;</script>";
		}
		echo "<script>
		person.codigo.value='$codigo';
		person.dni.value='$codigo';
		person.paterno.value='$paterno';
		person.materno.value='$materno';
		person.nombre.value='$nombre';
		person.celular.value='$celular';
		person.person.value='$person';
		person.Dia.value='$dia';
		person.Mes.value='$mes';
		person.Año.value='$año';
		person.email.value='$email';
		document.getElementById('fotografia').src='data:image/jpeg;base64,$foto';
		</script>";
		$this->personSelect();
	}
	public function personPerfil($codigo)
	{
		//registra los datos del person
		$sql = mysqli_query($this->open(), "SELECT p.dni ,p.paterno,p.materno,p.nombre,p.foto,p.celular,p.email,p.sexo,p.fec_nac, c.cargoid, c.nombre as cargo,day(p.fec_nac)as dia,month(p.fec_nac)as mes,year(p.fec_nac)as anio from person p inner join cargo c on p.cargoid=c.cargoid  where dni ='$codigo'");

		$r = mysqli_fetch_assoc($sql);

		$foto = base64_encode($r["foto"]);
		if ($foto == "" && $r["sexo"]=="M") {
			$foto= " <img src='dist/img/hombre.jpg' class='profile-user-img img-fluid img-circle'alt='User Image'>";
		} 
		elseif($foto == "" && $r["sexo"]=="F") {
			$foto=" <img src='dist/img/mujer.jpg' class='profile-user-img img-fluid img-circle'alt='User Image'>";
		}
			
		else {
			$foto= "<img src='data:image/jpeg;base64,$foto' class='profile-user-img img-fluid img-circle'>";
		}



		$this->dni = $r["dni"];
		$this->paterno = $r["paterno"];
		$this->materno = $r["materno"];
		$this->nombre = $r["nombre"];
		$this->foto =$foto;
		$this->celular = $r["celular"];
		$this->email = $r["email"];
		$this->sexo = $r["sexo"];
		$this->cargo = $r["cargo"];
		$this->fec_nac = $r["fec_nac"];
		$this->dia=$r["dia"];
		$this->mes=$r["mes"];
		$this->año=$r["anio"];

	}


	public function personFiltro($criterio1)
	{
		//consulta todos los person
		$s = "SELECT p.dni ,p.paterno,p.materno,p.nombre,p.foto,p.celular,c.nombre,p.email,p.sexo as person from person p inner join person c on p.personid=c.personid where c.personid like '$criterio1';  ";
		$sql = mysqli_query($this->open(), $s);

		echo "
		<table class='striped responsive-table'>
		  <tr>
			<th>Dni</th>
			<th>Paterno</th>
			<th>Materno</th>
			<th>Nombre</th>
			<th>Celular</th>
			<th height='100'>Foto</th>
			<th>person</th>
			<th>Email</th>
			<th>Opción</th>
			<th>Opción</th>
		  </tr>";
		while ($row = mysqli_fetch_array($sql)) {
			echo "<tr>";
			$cod_person = $row[0];
			echo "<td>" .  $row[0] . "</td>";
			echo "<td>" .  $row[1] . "</td>";
			echo "<td>" . $row[2] . "</td>";
			echo "<td>" . $row[3] . "</td>";
			echo "<td>" . $row[5] . "</td>";
			// decodificar base 64
			$foto = base64_encode($row[4]);
			if ($foto == "") {
				echo "<td height='100'>No Disponible</td>";
			} else {
				echo "<td height='100'><img src='data:image/jpeg;base64,$foto' width='100'height='100'></td>";
			}

			echo "<td>" . $row[6] . "</td>";
			echo "<td>" . $row[7] . "</td>";
		?>
			<!-- Modal Trigger -->
			<td><a class="waves-effect waves-light btn modal-trigger blue" href="" onclick="personSelectOne('<?php echo $cod_person ?>'); Cancelar();  return false">Seleccionar</a></td>
			<td><a class="waves-effect waves-light btn red" href="" onclick="personDelete('<?php echo $cod_person ?>'); return false">Eliminar</a></td>
<?php
			echo "</tr>";
		}

		echo "</table>";
	}

	public function personUpdate($codigo, $person, $paterno, $materno, $nombre, $celular, $dia, $mes, $año, $foto, $email, $sexo)
	{
		//VALIDAR FECHA
		if ($dia < 1 || $mes < 1) {
			echo "<script type='text/javascript'> alert('Elija correctamente su Fecha de cumpleaños');</script>";
			exit;
		}
		//VALIDAR FECHA
		$fec_nac =    $año . "-" . $mes . "-" . $dia;
		//si no hay ninguna foto eso quiere decir que no actualizaremos el campo foto
		// ya que si lo dejamos, la anterior foto lo eliminara si el valor es nulo
		if ($foto == "") {
			$sql = "UPDATE person SET paterno='$paterno',materno='$materno',nombre='$nombre',celular='$celular',fec_nac='$fec_nac',email='$email',sexo='$sexo' where dni='$codigo'";
			echo $sql;
		} else {
			$sql = "UPDATE person SET paterno='$paterno',materno='$materno',nombre='$nombre',celular='$celular',fec_nac='$fec_nac',foto='$foto',email='$email',sexo='$sexo' where dni='$codigo'";
		}
		mysqli_query($this->open(), $sql) or die('Error. ' . mysqli_error($sql));
		echo "<script>	
		person.codigo.value='$codigo';
		person.dni.value='$codigo';
		person.paterno.value='$paterno';
		person.materno.value='$materno';
		person.nombre.value='$nombre';
		person.celular.value='$celular';
		person.person.value='$person';
		person.Dia.value='$dia';
		person.Mes.value='$mes';
		person.Año.value='$año';
		person.email.value='$email';
			
			</script>";
		$this->personSelect();
	}
	public function personUpdatePerfil($codigo, $celular, $dia, $mes, $año, $foto)
	{
		//VALIDAR FECHA
		if ($dia < 1 || $mes < 1) {
			echo "<script type='text/javascript'> alert('Elija correctamente su Fecha de cumpleaños');</script>";
			exit;
		}
		//VALIDAR FECHA
		$fec_nac =    $año . "-" . $mes . "-" . $dia;
		//si no hay ninguna foto eso quiere decir que no actualizaremos el campo foto
		// ya que si lo dejamos, la anterior foto lo eliminara si el valor es nulo
		if ($foto == "") {
			$sql = "UPDATE person SET celular='$celular',fec_nac='$fec_nac'where dni='$codigo'";
		} else {
			$sql = "UPDATE person SET celular='$celular',fec_nac='$fec_nac',foto='$foto' where dni='$codigo'";
		}
		

		if(mysqli_query($this->open(), $sql)){
			echo "<script> alert('Guardado Correctamente'); window.location.href='admin.php';    </script>";
		}
		else{
			echo "<script> alert('Error al guardar los cambios'); </script>";
		}

	
	}
	public function personLogin($email, $password)
	{
		//	
		// Consulta enviada a la base de datos
		$query = "SELECT dni,email ,password from person   WHERE  email  = '$email' and password='$password';";
		$result = mysqli_query($this->open(), $query);
		// Que la Variable $row mantenga el resultado de la consulta
		$r = mysqli_fetch_assoc($result);
		if ($r["email"] != "" || $r["password"] != "") {
			//comprobar el person de usuario
			$_SESSION["login"] = $r["dni"];
			$_SESSION["email"] = $r["email"];
			$_SESSION["password"] = $r["password"];
			//$_SESSION["person"] = $r["person"];
			$_SESSION['loggedin'] = true;
			echo "<script> window.location.href='admin.php';</script>";
		} else {
			echo "<script>alert(' Usuario o Contraseña Incorrecta');</script>";
		}
	}
	public function personValidar()
	{
		if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
		} else {
			echo "<script>  alert('Logueese primero');	window.location.href='login.php';</script> ";
			exit;
		}
	}
	public function personChangePassword($password, $new_password, $repetir_password)
	{

		$dni = $_SESSION["login"];
		$password_sesion = $_SESSION["password"];

		if ($password == $password_sesion) {
			if ($new_password == $repetir_password && strlen($password) > 3) {
				$query = "UPDATE person SET password = '$new_password' WHERE  dni  ='$dni';";
				if (mysqli_query($this->open(), $query)) {
					$_SESSION['password'] = $new_password;
					echo "<script type='text/javascript'>alert('Contraseña ha cambiado');</script>";
					//include "enviar_email/cambiar_password.php";
				} else {
					echo "<script type='text/javascript'>alert('Error de cambio de contraseña');</script>";
				}
			} else {
				echo "<script>alert('error de repetir password  o el tamaño de contraseña es muy corto');</script>";
			}
		} else {
			echo "<script type='text/javascript'>alert('Contraseña Incorrecta');</script>";
		}
	}

	public function personSearch2($criterio3)
	{
		echo "<script>
$(document).ready(function() {
	$('input.autocomplete').autocomplete({
		data: {
			'Apple': null,
			'Microsoft': null,
			'Google': 'https://placehold.it/250x250',";
		$query_alumno = mysqli_query(
			$this->open(),
			"SELECT p.dni ,p.paterno,p.materno,p.nombre,p.foto,p.celular,c.nombre,p.email,p.sexo as person
				 from person p inner join person c on p.personid=c.personid where concat(p.paterno,' ',p.materno,' ',p.nombre) like '%$criterio3%' and c.nombre like 'docente' ;"
		);
		while ($rrr = mysqli_fetch_array($query_alumno)) {
			echo "'" . $rrr[0] .
				" " . $rrr[1] .
				" " . $rrr[2] .
				" " . $rrr[3] .
				" " .
				"' : null,";
		}
		echo "ultimo: null

		},
	});
});</script>";
	}
	public function personValidarSesion()
	{
		$login = isset($_SESSION['loggedin']) ? $_SESSION['loggedin'] : "";
		//$password=	isset($_SESSION['alumno_clave'])? $_SESSION['alumno_clave']:"";
		// Consulta enviada a la base de datos
		if ($login == true) {

			echo "<script type='text/javascript'>window.location='admin.php';</script>";
		}
	}
}

$person = new person("");
//verificamos el metodo recibido
if ($metodo == "insert") {
	$person->personInsert($dni, $cargo, $paterno, $materno, $nombre, $celular, $dia, $mes, $año, $foto, $email, $sexo);
} elseif ($metodo == "delete") {
	$person->personDelete($codigo);
} elseif ($metodo == "select") {
	$person->personSelectOne($codigo);
} elseif ($metodo == "update") {
	$person->personUpdate($codigo, $cargo, $paterno, $materno, $nombre, $celular, $dia, $mes, $año, $foto, $email, $sexo);
	
}
elseif ($metodo == "updateperfil") {
	$person->personUpdatePerfil($codigo, $celular, $dia, $mes, $año, $foto, $email);
	
}
 elseif ($metodo == "login") {
	$person->personLogin($email, $password);
} elseif ($metodo == "changePassword") {

	$person->personChangePassword($password, $new_password, $repetir_password);
} elseif ($metodo == "filtro") {

	$person->personFiltro($criterio1);
} elseif ($metodo == "search2") {

	$person->personSearch2($criterio3);
}
