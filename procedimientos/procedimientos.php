<?php
require_once '../conexion/conexion.php';

class procedimientos
{
    public $conexion;
    public $resultado;

    public function conectar()
    {
        $obj = new conexion();
        $this->conexion = new mysqli($obj->getServer(), $obj->getUser(), $obj->getPass(),$obj->getDb());
        $this->conexion->set_charset("UTF8");
        if ($this->conexion->connect_error) {
            $this->conexion->connect_error;
        }
    }
    public function importarBD()
    {
        $obj = new conexion();
        $this->conexion = new mysqli($obj->getServer(), $obj->getUser(), $obj->getPass());
        $this->conexion->set_charset("UTF8");
        if ($this->conexion->connect_error) {
            $this->conexion->connect_error;
        }
    }
    public function consultas($query)
    {
        $this->resultado = $this->conexion->query($query);
    }
    public function multiConsultas($query)
    {
        $this->resultado = $this->conexion->multi_query($query);
    }

    public function consultasPreparadas($query)
    {
        return $this->resultado = $this->conexion->prepare($query);
    }

    public function devolverFilas()
    {
        return $this->resultado->fetch_array();
    }

    public function filasAfectadas()
    {
        return $this->conexion->affected_rows;
    }

    public function errores()
    {
        return $this->conexion->error;
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