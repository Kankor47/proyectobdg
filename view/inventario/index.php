<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8"> 
        <title>Registro</title>
        <link rel="stylesheet" type="text/css" href="../css/fontawesome-all.css">
        <script src="../js/jquery-2.1.4.js"></script>
        <script src="../js/bootstrap-table.js"></script>
        <link href="../css/bootstrap-table.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../css/inventario.css">
        <script type="text/javascript" src="../js/validaciones.js"></script>
          <link rel="stylesheet" href="../css/jquery.dataTables.min.css">
        <script src="../js/jquery-3.3.1.min.js"></script>
        <script src="../js/jquery.dataTables.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../css/menuToggle.css">

          <script>
            $(document).ready(function () {
                $('#tablaCli').DataTable();
            });
        </script>
    </head>
    <body onload="openSideMenu()">

        <div id="contenedor"> 

            <div id="cuerpo"> 
                <div id="lateral">


                    <nav class="navbar">
                        <span class="open-slide">
                            <a href="#" onclick="openSideMenu()" >
                                <svg width="30" height="30">
                                <path d="M0,2 20,2" stroke="#777777" stroke-width="2"/>
                                <path d="M0,6 20,6" stroke="#777777" stroke-width="2"/>
                                <path d="M0,10 20,10" stroke="#777777" stroke-width="2"/>
                            </a>
                        </span>


                    </nav>
                    <div id="side-menu" class="side-nav">
                        <a href="#" class="btn_close" onclick="closeSideMenu()">  
                            <svg width="30" height="12">
                            <path d="M0,2 20,2" stroke="#fff" stroke-width="2"/>
                            <path d="M0,6 20,6" stroke="#fff" stroke-width="2"/>
                            <path d="M0,10 20,10" stroke="#fff" stroke-width="2"/>
                        </a>

                        <a href="#" > <i class="fa fa-home" aria-hidden="true"></i> Inicio</a>

                        <a href="../empleado/index.php" > <i class="fas fa-clipboard-check"></i> Registros</a>
                        <li>
                            <ul><a href="../empleado/index.php" ><i class="ico_inicio fas fa-user-tie" aria-hidden="true"></i> Empleados</a></ul>
                            <ul><a href="../usuario/index.php" ><i class="ico_inicio fa fa-user" aria-hidden="true"></i> Usuarios</a></ul>
                            <ul><a href="../cliente/index.php" ><i class="ico_inicio fas fa-user-tag" aria-hidden="true"></i> Clientes</a></ul>
                            <ul><a href="../coche/index.php" ><i class="ico_inicio fas fa-bus" aria-hidden="true"></i> Coches</a></ul>
                            <ul><a href="../categoria/index.php" ><i class="ico_inicio fas fa-tags" aria-hidden="true"></i> Categorias</a></ul>
                        </li>
                        <a href="../alquiler/index.php"><i class="fas fa-stopwatch" aria-hidden="true"></i> Alquiler</a>
                        <a href="../inventario/index.php"><i class="fas fa-clipboard-list" aria-hidden="true"></i> Inventario</a>
                        <a href="../mantenimiento/index.php"><i class="fas fa-toolbox" aria-hidden="true"></i> Mantenimiento</a>
                        <a href="../reportes/index.php"><i class=" fas fa-chart-line" aria-hidden="true"></i> Reportes</a>
                    </div>

                    <script>
                        function openSideMenu()
                        {
                            document.getElementById('side-menu').style.width = '200px';
                            document.getElementById('principal').style.marginLeft = '200px';
                        }
                        function closeSideMenu()
                        {
                            document.getElementById('side-menu').style.width = '0px';
                            document.getElementById('principal').style.marginLeft = '0px';
                        }
                    </script>

                </div>
                <div id="principal"> 
                    <section class="titulo_menu">
                        <p>CYCLO AVENTURA</p>
                        <h1>INVENTARIO</h1>       
                    </section>

                    <div id="contenedor">
                        <div id="lateral2">




                        </div>
                        <div id="principal2">
                            
                            <form action="../../controller/controller.php">

                                <section class="datosTabla">

                                       <table data-toggle="table" id="tablaCli" class="display"> 
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>TIPO</th>
                                            <th>DESCRIPCIÓN</th>
                                            <th>FECHA DE ADQUISICIÓN</th>
                                            <th>DAÑO</th>
                                            <th>FECHA DE INGRESO A TALLER</th>
                                            <th>FECHA DE SALIDA DE TALLER</th>
                                             <th>ESTADO</th>
                                         

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include '../../model/Inventario.php';

                                        if (isset($_SESSION['lista_inventario'])) {

                                            $registro = unserialize($_SESSION['lista_inventario']);

                                            foreach ($registro as $dato) {
                                                echo "<tr>";
                                                echo "<td>" . $dato->getId() . "</td>";
                                                echo "<td>" . $dato->getTipo() . "</td>";
                                                echo "<td>" . $dato->getDescripcion() . "</td>";
                                                echo "<td>" . $dato->getAdquisicion() . "</td>";
                                                echo "<td>" . $dato->getDano() . "</td>";
                                                echo "<td>" . $dato->getIngreso() . "</td>";
                                                echo "<td>" . $dato->getSalida() . "</td>";
                                                echo "<td>" . $dato->getEstado() . "</td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            
                                        }
                                        ?>

                                    </tbody>
                                </table>

                                </section>

                            </form>

                          
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </body>
</html>
