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
 * <http://www.calimaframework.com>.
 */
/*
 * require('Cf_Sesion.php');
 * $sesion=new Cf_Sesion();
 * Set to true if using https
 * $sesion->iniciarSesion('_s',false);
 
 * $_SESSION['something']='A value.';
 * echo$_SESSION['something'];
 */
namespace sistema\nucleo;
class APSesion
{   
    
    private $host       = AP_BD_HOST;
    private $usuario    = AP_BD_USUARIO;
    private $clave      = AP_BD_CLAVE;
    private $bdnombre   = AP_BD_NOMBRE;
    private $bdchar     = AP_BD_CHAR;
    private $bdconector = AP_BD_CONECTOR;
    
   public function __construct() {
      // session_regenerate_id(true);
         // set our custom session functions.
      session_set_save_handler(array($this, 'abrir'), array($this, 'cerrar'), array($this, 'leer'), array($this, 'escribir'), array($this, 'destruir'), array($this, 'gc'));
      // This line prevents unexpected effects when using objects as save handlers.
      register_shutdown_function('session_write_close');      
   }   
  /* public function __destruct() {
      session_regenerate_id(false);
   }*/
      function iniciarSesion($session_name, $secure) {
      // Make sure the session cookie is not accessable via javascript.
      $httpunico = true;

      // Hash algorithm to use for the sessionid. (use hash_algos() to get a list of available hashes.)
      $sesion_hash = 'sha512';

      // Check if hash is available
      if (in_array($sesion_hash, hash_algos())) {
        // Set the has function.
        ini_set('session.hash_function', $sesion_hash);
      }
      // How many bits per character of the hash.
      // The possible values are '4' (0-9, a-f), '5' (0-9, a-v), and '6' (0-9, a-z, A-Z, "-", ",").
      ini_set('session.hash_bits_per_character', 5);

      // Force the session to only use cookies, not URL variables.
      ini_set('session.use_only_cookies', 1);

      // Get session cookie parameters 
      $cookieParams = session_get_cookie_params(); 
      // Set the parameters
      session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httpunico); 
      // Change the session name 
      session_name($session_name);
      // Now we cat start the session
      session_start();
      ob_start();
     
      // This line regenerates the session and delete the old one. 
      // It also generates a new encryption key in the database. 
       //session_regenerate_id(false);
   }

// ingrese la informacion de conexion a su base de datos, debe ser igual a la que esta en CFConfiguracion.php
   function abrir() {
   $host = $this->host;
   $user = $this->usuario;
   $pass = $this->clave;
   $name = $this->bdnombre;
   
   $mysqli = new \mysqli($host, $user, $pass, $name);
   $this->db = $mysqli;
   return true;
   }

   function cerrar() {
      $this->db->close();
      return true;
   }


   function leer($id) {
      if(!isset($this->read_stmt)) {
      $this->read_stmt = $this->db->prepare("SELECT data FROM sesiones WHERE id = ? LIMIT 1");
   }
   $this->read_stmt->bind_param('s', $id);
   $this->read_stmt->execute();
   $this->read_stmt->store_result();
   $this->read_stmt->bind_result($data);
   $this->read_stmt->fetch();
   $key = $this->getkey($id);
   $data = $this->decrypt($data, $key);
   return $data;
   }





   function escribir($id, $data) {
      // Get unique key
   $key = $this->getkey($id);
   // Encrypt the data
   $data = $this->encrypt($data, $key);
 
   $time = time();
   if(!isset($this->w_stmt)) {
      $this->w_stmt = $this->db->prepare("REPLACE INTO sesiones (id, set_time, data, session_key) VALUES (?, ?, ?, ?)");
   }
 
   $this->w_stmt->bind_param('siss', $id, $time, $data, $key);
   $this->w_stmt->execute();
   return true;
   }

   function destruir($id) {
      if(!isset($this->delete_stmt)) {
      $this->delete_stmt = $this->db->prepare("DELETE FROM sesiones WHERE id = ?");
   }
   $this->delete_stmt->bind_param('s', $id);
   $this->delete_stmt->execute();
   return true;
   }

   function gc($max) {
      if(!isset($this->gc_stmt)) {
      $this->gc_stmt = $this->db->prepare("DELETE FROM sesiones WHERE set_time < ?");
   }
   $old = time() - $max;
   $this->gc_stmt->bind_param('s', $old);
   $this->gc_stmt->execute();
   return true;
   }

   private function getkey($id) {
           
      
      if(!isset($this->key_stmt)) {
      $this->key_stmt = $this->db->prepare("SELECT session_key FROM sesiones WHERE id = ? LIMIT 1");
   }
   $this->key_stmt->bind_param('s', $id);
   $this->key_stmt->execute();
   $this->key_stmt->store_result();
   if($this->key_stmt->num_rows == 1) { 
      $this->key_stmt->bind_result($key);
      $this->key_stmt->fetch();
      return $key;
   } else {
      $random_key = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
      return $random_key;
   }
   }

   private function encrypt($data, $key) {
      $salt = 'cH!swe!retReGu7W6bEDRup7usuDUh9THeD2CHeGE*ewr4n39=E@rAsp7c-Ph@pH';
      $key = substr(hash('sha256', $salt.$key.$salt), 0, 32);
      $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
      $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
      $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $data, MCRYPT_MODE_ECB, $iv));
      return $encrypted;
   }
   private function decrypt($data, $key) {
      $salt = 'cH!swe!retReGu7W6bEDRup7usuDUh9THeD2CHeGE*ewr4n39=E@rAsp7c-Ph@pH';
      $key = substr(hash('sha256', $salt.$key.$salt), 0, 32);
      $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
      $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
      $decrypted = mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($data), MCRYPT_MODE_ECB, $iv);
      return $decrypted;
   }
    
}

//estructura para bd

/*

CREATE TABLE IF NOT EXISTS `sesion` (
  `id` char(128) NOT NULL,
  `set_time` char(10) NOT NULL,
  `data` text NOT NULL,
  `session_key` char(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

*/
