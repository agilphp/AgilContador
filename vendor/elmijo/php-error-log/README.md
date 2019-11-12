PHP Error Log
=============

[![Build Status](https://travis-ci.org/ElMijo/php-error-log.svg)](https://travis-ci.org/ElMijo/php-error-log) [![Coverage Status](https://coveralls.io/repos/ElMijo/php-error-log/badge.svg)](https://coveralls.io/r/ElMijo/php-error-log) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ElMijo/php-error-log/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/ElMijo/php-error-log/?branch=master)

Una pequeña libreria para manejar los logs de tu aplicación de forma simple.. rapida.. y directa!!. En lineas lo que se hizo fue crear una capa de abstracción entre el programador y la función **error_log()** de PHP.

## Entonces.. ¿Que tiene de especial?

* La gran ventaja es que puedes escribir logs de las tres formas posibles usando **error_log()** con una sola función solo cambiando los parametros.
* **SIEMPRE!!** va ha escribir el log, a menos que el mensaje sea *empty*.

## Guia Rapida

### Instalación
Lo podemos hacer a travéz de [composer](https://getcomposer.org/doc/00-intro.md):
```json
"require":{
  ...
  "elmijo/php-error-log": "2.0"
  ...
}
```
### Uso Rapido
```php
require '../vendor/autoload.php';

$logger = new PHPTools\PHPErrorLog\PHPErrorLog();

$logger->write('probando...');

```

## ¿Cuantas maneras de escribir logs tengo disponibles?

> **erro_log** te permite escribir o manejar los logs de tres maneras, como lo son: en el archivo error.log por defecto, enviandola por correo electronico o escribiendo los en un archivo definido por el usuario

## Conociendo a la función magica..

Esta libreria esta compuesta por una unica clase, la cual contiene un metodo *pulic static* llamado ***write***, el cual nos sirve para manejar los logs en cualquiera de las formas posibles.

* Descripción: Función para escribir logs
* Parametros:
  * message: *string* **(requerida)** Cadena de texto con el mensaje.
  * type: *integer* **(opcional,default 3)** Nivel del error con el que queremos etiquetar el log, acepta valores del 0 - 7.
  * destination: *string* **(opcional)** puede ser una lista de correos electronicos o un path absoluto del archivo donde queremos que se escriban los logs.
  * headers: *array* **(opcional)** Arreglo asociativo con las cabeceras adicionales que deseamos agregar al correo electronico, este parametro solo tendra valides si vamos a enviar el log por email.
* Return : **TRUE** si se realizo la operación o **FALSE** en caso contrario.

### Nivel del error

La clase provee al desarrollador de 8 constantes para facilitar el uso de este parametro

| constatnte    | valor | texto     |
| ------------- |:-----:| ---------:|
| PEL_EMERGENCY | 0     | emergency |
| PEL_ALERT     | 1     | alert     |
| PEL_CRITICAL  | 2     | critical  |
| PEL_ERROR     | 3     | error     |
| PEL_WARNING   | 4     | warning   |
| PEL_NOTICE    | 5     | notice    |
| PEL_INFO      | 6     | info      |
| PEL_DEBUG     | 7     | debug     |


### Cabeceras Adicionales(SMTP)

**error_log()** utiliza la funcion **mail()** cuando se pasa un email como destinatario del log, eso quiere decir que las mismas cabeceras que podemos definir en **mail()** al momento de enviar un correo las vamos a poder definir el la función **error_log()**. Sin embargo, **PHPLorError** solo soportara una pequeña lista de cabeceras y aqui se la presentamos:

* **From**: Es el mas **IMPORTANTE** de todos!!, ya que sin el **NO SE ENVIARA EL CORREO**.
* **Subject**: Asunto del correo.
* **Reply-To**: Correo al cual ira la respuesta del usuario.
* **Content-type**: el tipo de contenido por defecto es *text/plain charset=iso-8859-1*.
* **Cc**: Enviar una copia a otro correo.
* **Bcc**: Enviar una copia oculta a otro correo.
* **Return-Path**: correo al cual van a llegar los errores de envio.

**NOTA**: La cabecera **To** es agregada automaticamente por **PHPErrorLog** y cualquier otra cabecera que se pase sera eliminada.

### Enviando Logs al archivo por defecto
```php
$logger->write('PHPErrorLog: probando... logs');

$logger->write('MiSistema: probando... logs\n\t\notra forma de hacer logs');
```

### Enviando Logs por Email

Para poder enviar email es necesario que tengamos instalado y configurado un servidor de correo en nuestra maquina o en la maquina donde se ejecutara nuestra aplicación, si utilizan LINUX :+1: les recomiendo este [link](https://github.com/ElMijo/php-error-log/edit/master/README.md)

```php
$headers = array(
  'From'    => 'usuario@dominio.com',
  'Subject' => 'Probando PHPErrorLog',
  'Cc'      => 'otrocorreo@dominio.com'
);

$logger->write('probando...',PEL_CRITICAL,"Jerry Anselmi <jerry.anselmi@gmail.com>,Pedro Perez <pperez@dominio.com>,fulano@dominio.com",$headers);
```
#### Email con contenido HTML
```php
$headers = array(
  'Content-type' => 'text/html; charset=iso-8859-1',
  'From'         => 'usuario@dominio.com',
  'Subject'      => 'Probando PHPErrorLog',
  'Cc'           => 'otrocorreo@dominio.com'
);

$logger->write('<h1>PHPErrorLog</h1><br><p>probando...</p>',PEL_WARNING,"Jerry Anselmi <jerry.anselmi@gmail.com>,Pedro Perez <pperez@dominio.com>,fulano@dominio.com",$headers);
```

### Enviando Logs a un Archivo Definifo por el Usuario
```php
$logger->write('probando...',PEL_ERROR,realpath('dev.log'));
```
```php
$logger->write('probando...',PEL_DEBUG,'/ruta/absoluta/del/dev.log');
```

## Posibles impedimentos paraescribir el log

* El mensaje es *empty*
* No se agrego la cabecera **From** en caso de que se desee enviar por correo
* Que no se tengan permisos de escritura en caso d eque el usuario defina el log, sin embargo el log se va a escribir en el archvio default

### El tema de los permisos

En caso de que definamos el archivo log, tenemos que asignarle a apache como dueño del mismo o darle permisos de escritura

* opción 1: sudo chown www-data:www-data /ruta/absoluta/del/dev.log
* opción 2: sudo chmod 0766 /ruta/absoluta/del/dev.log

