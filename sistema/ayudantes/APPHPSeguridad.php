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

class APPHPSeguridad {

//Seguridad
    
    //xss funciones de mitigacion
    function xsseguro($texto,$encoding='UTF-8'){
       return htmlspecialchars($texto,ENT_QUOTES | ENT_HTML401,$encoding);
    }
    function xecho($texto){
       echo xsseguro($texto);
    }
    /**
     * Elimina las etiquetas HTML
     * @param recibe texto como paramentro y lo filtra quitando etiquetas html
     * @return retorna texto filtrado
     */
    public function filtrarTexto($texto){
        return strip_tags($texto);
    }
    
     
    
    public function filtrarCaracteresEspeciales($texto){
        return htmlspecialchars($texto, ENT_QUOTES);
    }
    
    
    // Genracion de Cadenas Aleatorias
    function generarCadenaAleatoria($longitud = 10) {
        $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $longitudCaracteres = strlen($caracteres);
        $cadenaAleatoria = '';
        for ($i = 0; $i < $length; $i++) {
             $cadenaAleatoria .= $caracteres[rand(0, $longitudCaracteres - 1)];
        }
        return $cadenaAleatoria;
    }
    // encriptacion
    function cifrado($clave){
        $APi=sha1(md5($clave));
        return $clave=Ap_KEY_MD5.$APi;
    }
    // Protecion CSRF
    public function generoTokenDeFormulario($formulario) {
        $secreta =  AP_CSRF_SECRET.$this->generarCadenaAleatoria();
        $sid = session_id();
        $token = md5($secreta.$sid.$formulario);
        return $token;
    }
    
    public function verificoTokenDeFormulario($formulario, $token) {
        $secreta =  AP_CSRF_SECRET.$this->generarCadenaAleatoria();
        $sid = session_id();
        $correcta = md5($secreta.$sid.$formulario);
        return ($token == $correcta);
    }
    
    function obtenerDireccionIP(){
    if (!empty($_SERVER ['HTTP_CLIENT_IP'] ))
      $ip=$_SERVER ['HTTP_CLIENT_IP'];
    elseif (!empty($_SERVER ['HTTP_X_FORWARDED_FOR'] ))
      $ip=$_SERVER ['HTTP_X_FORWARDED_FOR'];
    else
      $ip=$_SERVER ['REMOTE_ADDR'];

    return $ip;
	}
	
    function restringirIp($ip){
        $ipCliente = $this->obtenerDireccionIP();

        if($ipCliente == $ip){
        return true;
        }
        else{
        header('location: http://www.tusitioweb/redireccion');
        exit;
        }
    }
	
	function restringirConjuntoIps($ips){
    $ipCliente = obtenerDireccionIP();

    if (in_array($ipCliente,$ips)){
        return true;
    }
    else{
        header('location: http://direccion_envio_salida');
        exit;
    }
	}
	
	function restringirRango(){
    $ipCliente = obtenerDireccionIP();

    if(substr($ipCliente, 0, 8 ) == "150.214."){
        return true;
    }
    else{
        header('location: http://direccion_envio_salida');
        exit;
    }
	}
        
        
    /**
 *
 * @strip injection chars from email headers
 *
 * @param string $string
 *
 * return string
 *
 */
function emailSeguro($cadena) {
     return  preg_replace( '((?:\n|\r|\t|%0A|%0D|%08|%09)+)i' , '', $cadena );
}

/*** example usage 
$from = "sender@example.com
Cc:victim@example.com";

if(strlen($from) < 100)
{
    $from = emailSeguro($from);
}***/
    
}