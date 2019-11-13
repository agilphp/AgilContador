<?php
class usuarioModelo extends sistema\nucleo\APModelo
{
    
    function ValidarUsuario($email,$password){          //  Consulta Mysql para buscar en la tabla Usuario aquellos usuarios que coincidan con el mail y password ingresados en pantalla de login
        $query = $this->db->where('Usuario',$email);  //  La consulta se efectúa mediante Active Record. Una manera alternativa, y en lenguaje más sencillo, de generar las consultas Sql.
        $query = $this->db->where('Password',$password);
        $query = $this->db->get('Usuarios');
        return $query->row();    //  Devolvemos al controlador la fila que coincide con la búsqueda. (FALSE en caso que no existir coincidencias)
    }
    
    public function insertarUsuario($id_usuario, $nombre,  $email, $clave){
        
        $post=$this->_bd->consulta('INSERT INTO comentarios (id_usuario, nombre, email, clave) VALUES (:id_usuario, :nombre, :email, :clave)');
        $post=$this->_bd->enlace(':id_usuario', $id_usuariio);
        $post=$this->_bd->enlace(':nombre',$nombre);
        $post=$this->_bd->enlace(':email', $email);
        $post=$this->_bd->enlace(':clave', $clave);
        $post=$this->_bd->ejecucion();
        return $post=$this->_bd->resultset();
        
    }
    
     public function seleccionUsuario($email, $clave){
        //echo DB_HOST;
        
        //$datosQuery="select usuario, email, nivel from usuarios where usuario = :usuario";
        $gsent=$this->_bd->consulta('select id_usuario, nombre, email, nivel, rolId, menuId from usuarios where email = :email and clave = :clave');
        $gsent=$this->_bd->enlace(':email', $email);
        $gsent=$this->_bd->enlace(':clave', $clave);
        //$gsent=$this->_bd->ejecucion();
        $row = $gsent=$this->_bd->single();
        return  $row;
       
    }  
    
    public function insertarRegistro($nombre,  $email, $nivel, $clave){
        
        $post=$this->_bd->consulta('INSERT INTO usuarios (nombre, email, nivel, clave) VALUES (:nombre, :email, :nivel, :clave)');
        
        $post=$this->_bd->enlace(':nombre',$nombre);
        $post=$this->_bd->enlace(':email', $email);
        $post=$this->_bd->enlace(':nivel', $nivel);
        $post=$this->_bd->enlace(':clave', $clave);
        $post=$this->_bd->ejecucion();
        //return $post=$this->_bd->contarFilas();
        
    }
}