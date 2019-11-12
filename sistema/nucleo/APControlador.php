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

namespace sistema\nucleo;
use Exception;

abstract class APControlador
{
    protected $_vista;
    
    public function __construct() {
        $this->_vista = new APVista(new APSolicitud);
    }
    
    protected function cargaLib($libreria){
        $rutaLib = RUTA_LIBS . $libreria . '.php';
        if(is_readable($rutaLib)){
            require_once $rutaLib;
           //echo 'libreria cargada';
        }
        else {
            throw new Exception("houston tenemos un problema! al cargar libreria");
        }
    }
    
    protected function cargaModelo($modelo){
        $modelo=$modelo.'Modelo';
       $rutaMod = RUTA_MOD . $modelo . '.php';
        if(is_readable($rutaMod)){
            require_once $rutaMod;
            $modelo = new $modelo;
            return $modelo;
           //echo 'modelo cargado';
        }
        else {
            //echo $rutaMod;
            
            
            throw new Exception("houston tenemos un problema! al cargar el modelo");
            
        }
    }
    
    protected function cargaAyudante($ayudante){
       $rutaAyudante = RUTA_AYUDANTES . $ayudante . '.php';
        if(is_readable($rutaAyudante)){
            require_once $rutaAyudante;
           //echo 'libreria cargada';
        }
        else {
            throw new Exception("houston tenemos un problema! al cargar ayudante");
        }
    }
    
}
