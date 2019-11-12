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

class APBasedatos 
{
    
    private $host       = AP_BD_HOST;
    private $usuario    = AP_BD_USUARIO;
    private $clave      = AP_BD_CLAVE;
    private $bdnombre   = AP_BD_NOMBRE;
    private $bdchar     = AP_BD_CHAR;
    private $bdconector = AP_BD_CONECTOR;
    private $stmt;
    private $dbh;
    private $error;
    protected $db;

    public function __construct() {
        // definimos el dsn
        $dns = $this->bdconector . ':host=' . $this->host . ';dbname=' . $this->bdnombre;

        // Opciones para PDO

        $options = array(
            \PDO::ATTR_PERSISTENT => true,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        );


        // creamos una instancia de PDO
        try {
            $this->dbh = new \PDO($dns, $this->usuario, $this->clave, $options);
        }
        // Catch algunos errores
        catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }

    public function consulta($query) {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function enlace($param, $value, $type = null) {//bind
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = \PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = \PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = \PDO::PARAM_NULL;
                    break;
                default:
                    $type = \PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type); //bindValue de PDO php
    }

    public function ejecucion() {
        return $this->stmt->execute();
    }

    public function resultset() {
        $this->ejecucion();
        return $this->stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function primeraColumna() {
        $this->ejecucion();
        return $this->stmt->fetchColumn();
    }

    public function PrimerRegistro() {
        $this->ejecucion();
        return $this->stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function contarFilas() {
        return $this->stmt->rowCount();
    }

    public function lastInsertId() {
        return $this->dbh->lastInsertId();
    }

    public function beginTransaction() {
        return $this->dbh->beginTransaction();
    }

    public function endTransaction() {
        return $this->dbh->commit();
    }

    public function cancelTransaction() {
        return $this->dbh->rollBack();
    }

    public function debugDumpParams() {
        return $this->stmt->debugDumpParams();
    }

    public function single() {
        $this->ejecucion();
        return $this->stmt->fetch(\PDO::FETCH_ASSOC);
    }

}