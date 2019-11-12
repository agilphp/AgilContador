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

class APPHPCache {
	/**
	 * Configuracion
	 *
	 * @access public
	 */
	public static $configuracion = array(
		'cache_dir' => 'cache',
		// por defecto el tiempo expira en  *minutos*
		'expires' => 180,
	);
	
	public static function configurar($clave, $valor = null) {
		if( is_array($clave) ) {
			foreach ($clave as $config_name => $config_value) {
				self::$configuracion[$config_name] = $config_value;
			}
		} else {
			self::$configuracion[$clave] = $valor;
		}
	}
	/**
	 * obtiene la ruta del archivo asociado a la clave.
	 *
	 * @access public
	 * @param string $clave
	 * @return string el nombre del archivo php
	 */
	public static function obtenerRuta($clave) {
		return static::$configuracion['cache_path'] . '/' . md5($clave) . '.php';
	}
	/**
	 * obtiene los datos asociados a la clave
	 *
	 * @access public
	 * @param string $clave	 
	 */
	public static function obtener($clave, $raw = false, $tiempo_personalizado = null) {
		if( ! self::file_expired($archivo = self::obtenerRuta($clave), $tiempo_personalizado)) {
			$contenido = file_get_contents($archivo);
			return $raw ? $contenido : unserialize($contenido);
		}
		return null;
	}
	/**
	 * Envia el contenido dentro de la cache
	 *
	 * @access public
	 * @param string $clave
	 * @param mixed $content the the content you want to store
	 * @param bool $raw whether if you want to store raw data or not. If it is true, $content *must* be a string
	 *        It can be useful for static html caching.
	 * @return bool whether if the operation was successful or not
	 */
	public static function enviar($clave, $contenido, $raw = false) {
		return @file_put_contents(self::obtenerRuta($clave), $raw ? $contenido : serialize($contenido)) !== false;
	}
	/**
	 * Delete data from cache
	 *
	 * @access public
	 * @param string $clave
	 * @return bool true if the data was removed successfully
	 */
	public static function eliminar($clave) {
		if( ! file_exists($archivo = self::obtenerRuta($clave)) ) {
			return true;
		}
		return @unlink($archivo);
	}
	/**
	 * limpia la cache
	 *
	 * @access public
	 * @return bool always true
	 */
	public static function limpiar() {
		$cache_files = glob(self::$configuracion['cache_path'] . '/*.php', GLOB_NOSORT);
		foreach ($cache_files as $archivo) {
			@unlink($archivo);
		}
		return true;
	}
	/**
	 * Check if a file has expired or not.
	 *
	 * @access public
	 * @param $archivo the rout to the file
	 * @param int $fecha the number of minutes it was set to expire
	 * @return bool if the file has expired or not
	 */
	public static function file_expired($archivo, $fecha = null) {
		if( ! file_exists($archivo) ) {
			return true;
		}
		return (time() > (filemtime($archivo) + 60 * ($fecha ? $fecha : self::$configuracion['expires'])));
	}
}
