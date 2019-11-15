<?php
use vendor\bin;
use propel\propel\Tblmenu;
use propel\propel\Base\TblmenuQuery;

class MenuModelo extends sistema\nucleo\APModelo
{
    
    public function registrarMenuM($nombre, $url, $estado){
        $menuSet = new Tblmenu();
		$menuSet->setMenu($nombre);
		$menuSet->setUrl($url);
		$menuSet->setEstado($estado);        
        $menuSet->save();
    }

    public function listarMenusM()
    {
       /* $menusGet = new Tblmenu();        
        $salidaMenus = $menusGet->toArray();
        return $salidaMenus; */
        $lMenu = TblmenuQuery::create()  
        ->limit(10)      
        ->find();
        return $lMenu;
       
    }

    public function listarMenusMPk($id)
    {       
        $lMenu = TblmenuQuery::create()
        ->findPk($id);
        return $lMenu;       
    }

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
}
    