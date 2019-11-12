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

class APVista
{
    private $_controlador;
    
    public function __construct(APSolicitud $peticion) {
        $this->_controlador = $peticion->getControlador();
    }
    
    public function imprimirVista($vista, $item = false)
    {            
            
        $ver_ruta = VIEW_PATH . $this->_controlador . DS . $vista . '.phtml';
        
        if(is_readable($ver_ruta)){
            include_once SITE_ROOT . 'mvc/vistas' . DS . ADICIONALES_VISTA . DS . 'encabezado.php';
            include_once $ver_ruta;
            include_once SITE_ROOT . 'mvc/vistas' . DS . ADICIONALES_VISTA . DS . 'pie_de_pagina.php';
        } 
        else {
            
            header('Location: '.  Ap_BASE_URL.'error/index'.'?error='.'vista' );
            
        }
    }
}