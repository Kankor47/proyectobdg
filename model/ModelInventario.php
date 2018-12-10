<?php

include_once 'Database.php';
include_once 'Inventario.php';

class ModelInventario {

    public function getInventario() {

        $pdo = Database::connect();
        $sql = "select C.id_coche,T.tip_desc,C.descripcion_coche,C.fecha_adquisicion, M.descripcion_dano,M.fecha_ing,M.fecha_salida,M.estado from tbl_coche C join tbl_mantenimiento M on C.id_coche=M.id_coche join tbl_tipo T on C.id_tipo=T.id_tipo";
        $resultado = $pdo->query($sql);
        $listado = array();
        foreach ($resultado as $res) {
            $inventario = new Inventario();
            $inventario->setId($res['id_coche']);
            $inventario->setTipo($res['tip_desc']);
            $inventario->setDescripcion($res['descripcion_coche']);
            $inventario->setAdquisicion($res['fecha_adquisicion']);
            $inventario->setDano($res['descripcion_dano']);
            $inventario->setIngreso($res['fecha_ing']);
            $inventario->setSalida($res['fecha_salida']);
            $inventario->setEstado($res['estado']);
            array_push($listado, $inventario);
        }
        Database::disconnect();
        return $listado;
    }

}
