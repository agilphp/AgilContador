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
 * @package    sistema/nucleo
 * @copyright  Copyright (c) 2006 - 2014 webcol.net (http://www.webcol.net/calima)
 * @license	https://github.com/webcol/Calima/blob/master/LICENSE	MIT
 * @version	##BETA 1.0##, ##2014 - 2015##
 * <http://www.AgilPhp.com>.
 */


//verificamos la version de php en tu servidor web o local
if (version_compare(PHP_VERSION, '5.3.20', '<'))
{
	die('Su Hosting tiene una version < a PHP 5.3.20 debes actualizar para esta version de Calima. su version actual de PHP es: '.PHP_VERSION);
}

//Cargamos los Espacios de nombres para el nucleo y los ayudantes
//Utilizamos un alias
use sistema\nucleo as Sisnuc;
use sistema\ayudantes as Sisayu;
//use PHPTool



class indexControlador extends Sisnuc\APControlador
{
    private $_exc;
    private $_ayuda;
    private $_seg;
    private $_sesion;
    private $_logger;
    
    public function __construct() {
        parent::__construct();
       
        $this->_ayuda= new Sisayu\APPHPAyuda;
        //$this->cargaAyudante('APPHPAyuda');
		//$this->cargaAyudante('APPHPSeguridad');
        $this->_seg= new Sisayu\APPHPSeguridad;
        //https://packagist.org/packages/elmijo/php-error-log
        $this->_logger = new PHPTools\PHPErrorLog\PHPErrorLog();
        
        $this->_sesion=new Sisnuc\APSesion();
         
    }
    
    public function index()
    { 
        // Se verifica que en el archivo de configuracion.php la constante AP_CONFIG_INICIO==true
        //Si esta en True se lanza el instalador de AP
        $this->_sesion->iniciarSesion('_s', false);
        $this->_logger->write('Se inicia la Aplicacion Index...',PEL_ERROR,realpath('log/dev.log'));
        if(Ap_CONFIG_INICIO==true){
            
            $this->_vista->titulo = 'AgilPhp';
            $this->_vista->imprimirVista('index', 'index');
            
            
        }elseif (Ap_CONFIG_INICIO=='false') {
            
            $this->_vista->titulo = 'AgilPhp';
            $this->_vista->imprimirVista('index', 'instalador');
            //$this->_sesion->iniciarSesion('_s', false);
        }
    } 
}
