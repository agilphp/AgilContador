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
 * @package    root
 * @copyright  Copyright (c) 2006 - 2014 webcol.net (http://www.webcol.net/calima)
 * @license	https://github.com/webcol/Calima/blob/master/LICENSE	MIT
 * @version	##BETA 1.0##, ##2014 - 2015##
 * <http://www.AgilPhp.com>.
 */

require_once __DIR__.'/vendor/autoload.php';

use sistema\nucleo;
use sistema\ayudantes;
//use mvc\controladores;

//lenguaje

/*session_start();
$sesion=new sistema\nucleo\APSesion();
$sesion->iniciarSesion('_s', false);
header('Cache-control: private'); // IE 6 FIX
 */



/** AP directorio separador */
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
/** AP raiz del sitio */
defined('SITE_ROOT')? null: define('SITE_ROOT', realpath(dirname(__FILE__)).DS);
/** AP PATH del sitio */
defined('SITE_PATH') ? NULL : define ('SITE_PATH', realpath(dirname(__FILE__) . DS . '..' . DS) . DS);

/** AP definimos constante Ruta directa al nucleo de framework  */
define('RUTA_NUCLEO', SITE_ROOT . 'sistema'.DS.'nucleo' . DS);

# define para mvc erp

/** AP definimos constante  directa a la vista del framework  */
define('VIEW_PATH', SITE_ROOT . 'mvc'.DS.'vistas' . DS);
/** AP definimos constante  directa a los controladores del framework  */
define('CONTR_PATH', SITE_ROOT . 'mvc'.DS.'controladores' . DS);
/** AP definimos constante  directa a los modelos del framework  */
define('RUTA_MOD', SITE_ROOT . 'mvc'.DS.'modelos' . DS);

# define ruta a los stilos del public

/** AP definimos constante  directa a los css dentro del directorio public_ del framework  */
define('CSS_PATH', SITE_ROOT . 'public_'.DS.'css' . DS);
/** AP definimos constante  directa a los css dentro del directorio public_ del framework  */
define('IMG_PATH', SITE_ROOT . 'public_'.DS.'img' . DS);
/** AP definimos constante  directa a los js dentro del directorio public_ del framework  */
define('JS_PATH', SITE_ROOT . 'public_'.DS.'js' . DS);
/** AP definimos constante  directa a las librerias dentro  del framework  */
define('RUTA_LIBS', SITE_ROOT . 'sistema'.DS.'librerias' . DS);
/** AP definimos constante  directa a los ayudantes del framework  */
define('RUTA_AYUDANTES', SITE_ROOT . 'sistema'.DS.'ayudantes' . DS);

/** AP definimos constante  directa a los lenguajes del framework  */
define('RUTA_LENGUAJES', SITE_ROOT . 'sistema'.DS.'lenguajes' . DS);


//LENGUAJES
//En el directorio sistema lenguajes hay varios archivos php cada uno para crear las constantes en el idioma especifico
//luego por get capturamos la variable lan al inicio de la aplicacion asi: www.tuapp.com/?lang=de

$lang = 'es'; // por defecto el idioma para el app es español puede ser en, bt, de, zh
if(isSet($_GET['lang'])){
    $lang = $_GET['lang'];
}
//en caso de no cumplir la condicion el $lang va ser "es"

//valido que no este creada la sesion ò cookie de lang
if(!isSet($_SESSION['lang']) || !isSet($_COOKIE['lang'])){
	// register the session and set the cookie
	$_SESSION['lang'] = $lang;
	setcookie('lang', $lang, time() + (3600 * 24 * 30));
}

$lang_file = 'lang.'.$lang.'.php'; 

include_once RUTA_LENGUAJES . $lang_file;

//FIN LENGUAJES



#Firewall desactivado

/*define('PHP_FIREWALL_REQUEST_URI', strip_tags( $_SERVER['REQUEST_URI'] ) );
define('PHP_FIREWALL_ACTIVATION', true );
if ( is_file( @dirname(__FILE__).'RUTA_LIBS'.DS.'php-firewall'.DS.'firewall.php' ) )
	include_once( @dirname(__FILE__).'RUTA_LIBS'.DS.'php-firewall'.DS.'firewall.php' );*/

# Cargamos la autocarga dinamica y configuraciones
//require_once RUTA_NUCLEO . 'AP_Autocarga.php';
require_once RUTA_NUCLEO . 'APConfiguracion.php';

try{
   
    nucleo\APBootstrap::actuar(new nucleo\APSolicitud);
    //APBootstrap::actuar(new APSolicitud);
   
} catch (Exception $e) {
    echo $e->getMessage();
}

/*try{
  APBootstrap::actuar(new AP_Solicitud);
}
catch(Exception $e){
   
}*/
