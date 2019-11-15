<?php

/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license. For more information, see
 * @category   
 * @package    sistema/ayudantes
 * @copyright  Copyright (c) 2006 - 2014 webcol.net (http://www.webcol.net/calima)
 * @license	https://github.com/webcol/Calima/blob/master/LICENSE	MIT
 * @version	##BETA 1.0##, ##2014 - 2015##
 * <http://www.AgilPhp.com>.
 */

namespace sistema\ayudantes;



class APPHPAyuda {
    
    
    private $_sesion;
    //Email
    
    public function __construct() {
        //parent::__construct();
    
    $this->_sesion=new \sistema\nucleo\APSesion();
    }
    public function enviarCorreo($para, $titulo= 'Asunto', $mensaje= 'cuerpo del correo'){
        return mail($para, $titulo, $mensaje);
    }
    
    
     // filtros Email
    
    function filtroEmail($email)
    {
        if (!filter_input(INPUT_POST, $email, FILTER_VALIDATE_EMAIL)){
            echo "E-Mail no es valido";
        }
        else
        {
            echo "E-Mail es valido";
        }
        
    }
    
    //cadenas
    
    function rangoTexto($texto, $inicio, $cantidad)
    {        
        return $limite= substr($texto, $inicio, $cantidad);         
    }
    
    //Redirecionar
    
    function Redireccion($url, $permanent = false){
        header('Location: ' . $url, true, $permanent ? 301 : 302);
        exit();
    }
    
    function redireccionUrl($url){
        $url=Ap_BASE_URL.$url;
        header('Location: ' . $url);
        exit();
    }
    
    function redireccionUrlMsj($controlador){
        $this->_sesion->iniciarSesion('_s', false);
        $_SESSION[error_ingreso]='Error en el intento de ingreso';
        $controlador=Ap_BASE_URL.$controlador;
        header('Location: ' . $controlador);
        exit();
    }
    
    function redireccion_($url, $statusCode = 303){
        header('Location: ' . $url, true, $statusCode);
        die();
    }
    
    function redirect($controller,$method = "index",$args = array())
    {
        global $core; /* Guess Obviously */
        $location = $core->Ap_BASE_URL . "/" . $controller . "/" . $method . "/" . implode("/",$args);
        /*
            * Use @header to redirect the page:
        */
        header("Location: " . $location);
        exit;
    }
    
    
    
    //texto
    public function filtrarEntero($int){
        
       return filter_var($int, FILTER_VALIDATE_INT);
       
    }
    
   
}
