<?php
include "head_admin.php";
?>
<div class="container">
    <form accept-charset="utf-8" id="person" method="POST" action="" enctype="multipart/form-data">
        <h2>Nuevo empleado</h2>
        <div class="row">
            <div class="col s12 l6">
                <input type="hidden" name="codigo">
                Elija un cargo:
                <select name="cargo" id="cargos"  class="form-control">
                    <?php
                    $con = new connection();
                    $sql = mysqli_query($con->open(), "SELECT * from cargo where nombre not like 'administrador'");
                    while ($row = mysqli_fetch_array($sql)) {
                        $cargoid = $row['Cargoid'];
                        $nombre = $row['Nombre'];
                        echo "<option value='$cargoid'>" .  $nombre . "</option>";
                    }

                    ?>
                </select>
                Dni<input name="dni" type="number" class="form-control">
                Paterno<input name="paterno" type="text"  class="form-control">
                Materno<input name="materno" type="text"  class="form-control">
                Nombres<input name="nombre" type="text"  class="form-control">
                Celular<input type="number" name="celular" class="form-control">
                Email<input type="text" name="email" class="form-control">
                Sexo
                <!-- Switch -->
                <div class="switch">
                    <label>
                        MASCULINO
                        <input type="radio" name="sexo" value="M" class="form-control">
                        FEMENINO
                        <input type="radio" name="sexo" value="F" class="form-control">
                    </label>
                </div>
                <br>
                Fecha de Nacimiento :
                <div class="row">
                    <div class="col s4">
                        <select name="Dia"  class="form-control">
                            <option>Dia</option>
                            <?php
                            for ($a = 1; $a <= 31; $a++) {
                                echo "<option value='$a'>" . $a . "</option>";
                            } ?>
                        </select>
                    </div>
                    <div class="col s4">
                        <select name="Mes"  class="form-control">
                            <option>Mes</option>
                            <?php
                            $mes = array("", "Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic");
                            for ($b = 1; $b <= 12; $b++) {
                                echo "<option value='$b'>" . $mes[$b] . "</option>";
                            } ?>
                        </select>
                    </div>
                    <div class="col s4">
                        <select name="Año"  class="form-control">
                            <option>Año</option>
                            <?php
                            $c = 2020;
                            while ($c >= 1905) {

                                echo "<option value='$c'>" . $c . "</option>";
                                $c = $c - 1;
                            }


                            ?>
                        </select>
                    </div>
                </div>

            </div>
            <div class="col s12 l6">
                <h5>Fotografía</h5>
                <img src="" width='400' id="fotografia">
            </div>
        </div>

        Subir Fotografía

        <div class="file-loading">

            <input id="input-b6" name="foto" type="file">

            <p></p>

            <input type="submit" value="Nuevo" class="btn red" onclick="personNuevo(); return false" />
            &nbsp;<input type="button" name="btn" value="Grabar" class="btn black"
                onclick="personInsert(); return false" />
            <input type="submit" value="Modificar" class="btn green" onclick="personUpdate(); return false" />

    </form>

    <p></p>
    <form action="" id="filtro">
        <h4><b>Filtro</b></h4>
        <div class="row">
            <div class="col s12 l6">
                <h5>Ordenar por Cargo</h5>
                <select name="criterio1"  class="form-control" onchange="personFiltro();">
                    <option value="%">Todos</option>
                    <?php
                    $con = new connection();
                    $sql = mysqli_query($con->open(), "SELECT cargoid,nombre from cargo");
                    while ($row = mysqli_fetch_array($sql)) {
                        $cargoid = $row[0];
                        $nombre = $row[1];
                        echo "<option value='$cargoid'>" .  $nombre . "</option>";
                    }

                    ?>
                </select>
            </div>
            <div class="col s12 l6">

            </div>
        </div>

    </form>

    <p></p>

    <div id="resultado"><?php

                        $person->personSelect();
                        ?></div>

</div>

<?php
include("footer_admin.php");
?>