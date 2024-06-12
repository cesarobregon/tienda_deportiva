<?php
class Camisetas extends Conexion{

    public function ingresar(Camiseta $par){
        $ok = false;
        try {
            $consulta = $this->prepare('INSERT INTO productos '
                . ' (id, descripcion,precio,foto,id_categoria,activo) '
                . 'VALUES(NULL,:DESCRIPCION,:PRECIO,:FOTO,:ID_CATEGORIA,:ACTIVO)');

            $descripcion = $par->getDescripcion();
            $precio = $par->getPrecio();
            $foto = $par->getFoto();
            $id_categoria = $par->getId_categoria();
            $activo = $par->getEstado();

            $consulta->bindParam(":DESCRIPCION", $descripcion, PDO::PARAM_STR);
            $consulta->bindParam(":PRECIO", $precio, PDO::PARAM_INT);
            $consulta->bindParam(":FOTO", $foto, PDO::PARAM_STR);
            $consulta->bindParam(":ID_CATEGORIA", $id_categoria, PDO::PARAM_INT);
            $consulta->bindParam(":ACTIVO", $activo, PDO::PARAM_INT);

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

    public function editar(Camiseta $par){
        $ok = false;
        try {
            $id = $par->getId();
            $consulta = $this->prepare('UPDATE `productos` SET `descripcion` = :DESCRIPCION, `precio` = :PRECIO,
            `id_categoria` = :ID_CATEGORIA, `activo` = :ACTIVO WHERE `camisetas`.`id` = '.$id.';');

            $descripcion = $par->getDescripcion();
            $precio = $par->getPrecio();
            $id_categoria = $par->getId_categoria();
            $activo = $par->getEstado();

            $consulta->bindParam(":DESCRIPCION", $descripcion, PDO::PARAM_STR);
            $consulta->bindParam(":PRECIO", $precio, PDO::PARAM_INT);
            $consulta->bindParam(":ID_CATEGORIA", $id_categoria, PDO::PARAM_INT);
            $consulta->bindParam(":ACTIVO", $activo, PDO::PARAM_INT);

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

    public function eliminar(Camiseta $par){
        $ok = false;
        try {
            $this->exec('DELETE FROM productos WHERE ID=' . $par->getId());
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
            $ob = new Camiseta();
            $ob->setId($value['id']);
            $ob->setDescripcion($value['descripcion']);
            $ob->setPrecio($value['precio']);
            $ob->setFoto($value['foto']);
            $ob->setId_categoria($value['id_categoria']);
            $ob->setEstado($value['activo']);
            $retorno[] = $ob;
        }
        return $retorno;
    }

    //metodo que recibe un id y lo busca en la base de datos, en caso de encontrarlo se retorna el objeto Camisete
    //que tenga ese id, sino se retorna un nuevo objeto Camiseta 
    public function obtener(int $par){
        $camisetas = $this->listar("SELECT * FROM productos WHERE id=" . $par . " LIMIT 1");
        if (sizeof($camisetas) > 0) {
            $camiseta = $camisetas[0];
        } else {
            $camiseta = new Camiseta();
        }
        return $camiseta;
    }
}