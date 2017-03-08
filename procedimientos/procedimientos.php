<?php

/**
 * Created by PhpStorm.
 * User: 2daw10
 * Date: 23/02/2017
 * Time: 8:58
 */
require '../conexion/conexion.php';
class procedimientos
{
    private $conexion;
    private $resultado;

    public function conectar()
    {
        $obj = new conexion();
        $this->conexion = new mysqli($obj->getServer(), $obj->getUser(), $obj->getPass(), $obj->getDb());
        $this->conexion->set_charset("UTF8");
        if ($this->conexion->connect_error) {
            $this->conexion->connect_error;
        }
    }

    public function consultas($query)
    {
        $this->resultado = $this->conexion->query($query);
    }

    public function consultasPreparadas($query)
    {
        return $this->conexion->prepare($query);
    }

    public function devolverFilas()
    {
        return $this->resultado->fetch_array();
    }

    public function filasAfectadas()
    {
        $this->conexion->affected_rows;
    }

    public function errores()
    {
        $this->conexion->error;
    }

    public function cerrarConexion()
    {
        return $this->conexion->close();
    }

    public function ultimoId()
    {
        return $this->conexion->insert_id;
    }

    public function numFilas()
    {
        return $this->resultado->num_rows;
    }
}