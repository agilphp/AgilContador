PHP Cliente Address
===================

[![Build Status](https://travis-ci.org/ElMijo/php-cliente-addr.svg?branch=master)](https://travis-ci.org/ElMijo/php-cliente-addr) [![Coverage Status](https://coveralls.io/repos/ElMijo/php-cliente-addr/badge.svg)](https://coveralls.io/r/ElMijo/php-cliente-addr) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/ElMijo/php-cliente-addr/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/ElMijo/php-cliente-addr/?branch=master)

Una pequeña clase para obtener la IP y el HostName del cliente

> **Nota:** No se esta descubriendo el agua tibia.. solo unifique en un solo metodo las propuestas e investigaciones de muchas personas incluyendo las mias.


Instalación
-----------
Lo podemos hacer a travéz de [composer](https://getcomposer.org/doc/00-intro.md):
```json
    "require": {
        ...
        "elmijo/php-cliente-addr": "2.0"
        ...
    }
```

Ejemplo
-------

Asi debemos usar la clase:

#### 1.- Incluir la libreria

```php
use PHPTools\PHPClientAddr\PHPClientAddr;
```

#### 2.- Obtener los valores

```php
$address = new PHPClientAddr();
echo $address->ip;
echo $address->hostname;
```