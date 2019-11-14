<?php


class usuarioControlador extends \sistema\nucleo\APControlador
{
    private $_ayuda;
    private $_seg;
    private $_sesion;    
    public function __construct() {
        parent::__construct();
               
        // cargamos la clase ayudantes para usar sus metodos de ayuda       
        $this->_ayuda= new sistema\ayudantes\APPHPAyuda;        
        $this->_seg= new sistema\ayudantes\APPHPSeguridad;
        $this->_sesion=new sistema\nucleo\APSesion();       
    }    
    
    public function index(){   
        
        $this->_vista->titulo = 'AgilControlador Login';
        $this->_vista->error = 'AgilControlador Login';
        $this->_vista->imprimirVista('index', 'usuario');
    }  
    
    public function registro(){ 
        $this->_vista->titulo = 'AgilPhp registro';
        $this->_vista->imprimirVista('registro', 'usuario');
        
    }
    
    public function crearRegistro(){
        $datas = $this->cargaModelo('usuario');    
        if(isset($_POST['nombre'])){
        $nombre=$_POST['nombre'];
        $email=$_POST['email'];
        $usuario=$_POST['nombre'];
         $clave=$this->_seg->cifrado($this->_seg->filtrarTexto($_POST['clave']));
        
         $datas->insertarRegistro(
                     $this->_seg->filtrarTexto($_POST['nombre']),
                     $this->_seg->filtrarTexto($_POST['email']),
                     '1',
                     $clave
                    );
                $this->_ayuda->redireccionUrl('usuario');       
        }
        else{
            $this->_ayuda->redireccionUrl('usuario/registro');
        }
    }
    
    public function valida(){
        if(isset($_POST['usuario'])){
        $usuario=$_POST['usuario'];
        $clave=$this->_seg->cifrado($this->_seg->filtrarTexto($_POST['clave']));        
        $datosUser = $this->cargaModelo('usuario');
        $valida=$datosUser->seleccionUsuario($usuario, $clave); 
        if(isset($valida)){    
            $this->_sesion->iniciarSesion('_s', Ap_SESION_PARAMETRO_SEGURO);
            $_SESSION['usuario']=$usuario;             
            $_SESSION['id_usuario']=$valida['id_usuario'];            
           echo $_SESSION['nivel']=$valida['nivel']; 
             $_SESSION['roll']=$valida['rolId'];
             $_SESSION['menu']=$valida['menuId'];         
             $this->_ayuda->redireccionUrl('dashboard/index');         
        }
       $this->_ayuda->redireccionUrl('usuario');
        
        }
    }
    
     public function cerrarSesion(){
        $this->_sesion->iniciarSesion('_s', Ap_SESION_PARAMETRO_SEGURO);
        session_destroy();
        $this->_sesion->destruir('usuario');
        $this->_ayuda->redireccionUrl('usuario');
        
    }
}
