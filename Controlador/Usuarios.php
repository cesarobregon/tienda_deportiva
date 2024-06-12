<?php

class Usuarios extends Conexion{

    public function ingresar(Usuario $par){
        $ok = false;
        try {
            $consulta = $this->prepare('INSERT INTO usuarios '
                . ' (id, usuario, nombre, apellido,clave) '
                . 'VALUES(NULL,:USUARIO,:NOMBRE,:APELLIDO,:CLAVE)');

            $usuario = $par->getUsuario();
            $nombre = $par->getNombre();
            $apellido = $par->getApellido();
            $clave = $par->getClave();

            $consulta->bindParam(":USUARIO", $usuario, PDO::PARAM_STR);
            $consulta->bindParam(":NOMBRE", $nombre, PDO::PARAM_STR);
            $consulta->bindParam(":APELLIDO", $apellido, PDO::PARAM_STR);
            $consulta->bindParam(":CLAVE", $clave, PDO::PARAM_STR);

            $consulta->execute();
            $ok = true;
        } catch (PDOException $pdoex) {
            echo 'Error:' . $pdoex->getMessage();
        } catch (Exception $ex) {
            echo 'Error:' . $ex->getMessage();
        } finally {
            return $ok;
        }
    }

    public function editar(Usuario $par){
        $ok = false;
        try {
            $id = $par->getId();
            $consulta = $this->prepare('UPDATE `usuarios` SET `usuario` = :USUARIO, `nombre` = :NOMBRE, `apellido` = :APELLIDO, `clave` = :CLAVE WHERE `usuarios`.`id` = '.$id.';');

            $usuario = $par->getUsuario();
            $nombre = $par->getNombre();
            $apellido = $par->getApellido();
            $clave = $par->getClave();

            $consulta->bindParam(":USUARIO", $usuario, PDO::PARAM_STR);
            $consulta->bindParam(":NOMBRE", $nombre, PDO::PARAM_STR);
            $consulta->bindParam(":APELLIDO", $apellido, PDO::PARAM_STR);
            $consulta->bindParam(":CLAVE", $clave, PDO::PARAM_STR);

            $consulta->execute();
            $ok = true;
        } catch (PDOException $pdoex) {
            echo 'Error:' . $pdoex->getMessage();
        } catch (Exception $ex) {
            echo 'Error:' . $ex->getMessage();
        } finally {
            return $ok;
        }
    }

    public function eliminar(Usuario $par){
        $ok = false;
        try {
            $this->exec('DELETE FROM usuarios WHERE ID=' . $par->getId());
            $ok = true;
        } catch (PDOException $pdoex) {
            echo 'Error:' . $pdoex->getMessage();
        } catch (Exception $ex) {
            echo 'Error:' . $ex->getMessage();
        } finally {
            return $ok;
        }
    }

    public function listar(string $query){
        $retorno = array();
        $datos = $this->query($query);
        foreach ($datos as $key => $value) {
            $ob = new Usuario();
            $ob->setId($value['id']);
            $ob->setUsuario($value['usuario']);
            $ob->setNombre($value['nombre']);
            $ob->setApellido($value['apellido']);
            $ob->setClave($value['clave']);
            $retorno[] = $ob;
        }
        return $retorno;
    }

    //metodo que recibe un id y lo busca en la base de datos, en caso de encontrarlo se retorna el objeto
    //que tenga ese id, sino se retorna un nuevo objeto 
    public function obtener(int $par){
        $usuarios = $this->listar("SELECT * FROM usuarios WHERE id=" . $par . " LIMIT 1");
        if (sizeof($usuarios) > 0) {
            $usuario = $usuarios[0];
        } else {
            $usuario = new Usuario();
        }
        return $usuario;
    }
}