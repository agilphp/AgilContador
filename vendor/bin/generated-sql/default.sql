
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- menu
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu`
(
    `id` INTEGER(5) NOT NULL,
    `menu` VARCHAR(50) NOT NULL,
    `url` VARCHAR(120) NOT NULL
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- sesion_usuario
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sesion_usuario`;

CREATE TABLE `sesion_usuario`
(
    `id_sesion` BIGINT NOT NULL AUTO_INCREMENT,
    `id_usuario` INTEGER(10) NOT NULL,
    `fecha_sesion` VARCHAR(20) NOT NULL,
    PRIMARY KEY (`id_sesion`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- sesiones
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `sesiones`;

CREATE TABLE `sesiones`
(
    `id` CHAR(128) NOT NULL,
    `set_time` CHAR(10) NOT NULL,
    `data` TEXT NOT NULL,
    `session_key` CHAR(128) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tblcliente
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tblcliente`;

CREATE TABLE `tblcliente`
(
    `clienteId` BIGINT NOT NULL AUTO_INCREMENT,
    `codigo` VARCHAR(50) NOT NULL,
    `nombre` VARCHAR(300) NOT NULL,
    `direccion` VARCHAR(150) NOT NULL,
    `telefono` VARCHAR(150) NOT NULL,
    `ciudadId` INTEGER(10) NOT NULL,
    PRIMARY KEY (`clienteId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tblegreso
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tblegreso`;

CREATE TABLE `tblegreso`
(
    `egresoId` BIGINT NOT NULL AUTO_INCREMENT,
    `numero` INTEGER,
    `fecha` DATETIME,
    `comentario` TEXT,
    PRIMARY KEY (`egresoId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tblegresodetalle
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tblegresodetalle`;

CREATE TABLE `tblegresodetalle`
(
    `egresoDetalleId` BIGINT NOT NULL AUTO_INCREMENT,
    `egresoId` BIGINT,
    `productoId` BIGINT,
    `cantidad` DECIMAL(10,2),
    `TblEgreso_egresoId` BIGINT NOT NULL,
    `TblProductos_productoId` BIGINT NOT NULL,
    PRIMARY KEY (`egresoDetalleId`),
    INDEX `fk_TblEgresoDetalle_TblEgreso1_idx` (`TblEgreso_egresoId`),
    INDEX `fk_TblEgresoDetalle_TblProductos1_idx` (`TblProductos_productoId`),
    CONSTRAINT `fk_TblEgresoDetalle_TblEgreso1`
        FOREIGN KEY (`TblEgreso_egresoId`)
        REFERENCES `tblegreso` (`egresoId`),
    CONSTRAINT `fk_TblEgresoDetalle_TblProductos1`
        FOREIGN KEY (`TblProductos_productoId`)
        REFERENCES `tblproductos` (`productoId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tblfactura
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tblfactura`;

CREATE TABLE `tblfactura`
(
    `facturaId` BIGINT NOT NULL AUTO_INCREMENT,
    `numero` BIGINT NOT NULL,
    `clienteId` BIGINT NOT NULL,
    `fecha` DATETIME NOT NULL,
    `tblcliente_clienteId` BIGINT NOT NULL,
    PRIMARY KEY (`facturaId`),
    INDEX `fk_tblfactura_tblcliente_idx` (`tblcliente_clienteId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tblfacturadetalle
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tblfacturadetalle`;

CREATE TABLE `tblfacturadetalle`
(
    `facturaDetalleId` BIGINT NOT NULL AUTO_INCREMENT,
    `facturaId` BIGINT,
    `productoId` BIGINT,
    `cantidad` DECIMAL(10,2),
    `precio` DECIMAL(10,2),
    `tblfactura_facturaId` BIGINT NOT NULL,
    `TblProductos_productoId` BIGINT NOT NULL,
    PRIMARY KEY (`facturaDetalleId`),
    INDEX `fk_TblFacturaDetalle_tblfactura1_idx` (`tblfactura_facturaId`),
    INDEX `fk_TblFacturaDetalle_TblProductos1_idx` (`TblProductos_productoId`),
    CONSTRAINT `fk_TblFacturaDetalle_TblProductos1`
        FOREIGN KEY (`TblProductos_productoId`)
        REFERENCES `tblproductos` (`productoId`),
    CONSTRAINT `fk_TblFacturaDetalle_tblfactura1`
        FOREIGN KEY (`tblfactura_facturaId`)
        REFERENCES `tblfactura` (`facturaId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tblingreso
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tblingreso`;

CREATE TABLE `tblingreso`
(
    `ingresoId` BIGINT NOT NULL,
    `numero` INTEGER,
    `fecha` DATETIME,
    `comentario` TEXT,
    PRIMARY KEY (`ingresoId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tblingresodetalle
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tblingresodetalle`;

CREATE TABLE `tblingresodetalle`
(
    `ingresoDetalleId` BIGINT NOT NULL,
    `ingresoId` BIGINT,
    `productoId` BIGINT,
    `cantidad` DECIMAL(10,2),
    `TblProductos_productoId` BIGINT NOT NULL,
    `TblIngreso_ingresoId` BIGINT NOT NULL,
    PRIMARY KEY (`ingresoDetalleId`),
    INDEX `fk_TblIngresoDetalle_TblProductos1_idx` (`TblProductos_productoId`),
    INDEX `fk_TblIngresoDetalle_TblIngreso1_idx` (`TblIngreso_ingresoId`),
    CONSTRAINT `fk_TblIngresoDetalle_TblIngreso1`
        FOREIGN KEY (`TblIngreso_ingresoId`)
        REFERENCES `tblingreso` (`ingresoId`),
    CONSTRAINT `fk_TblIngresoDetalle_TblProductos1`
        FOREIGN KEY (`TblProductos_productoId`)
        REFERENCES `tblproductos` (`productoId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tbllinea
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tbllinea`;

CREATE TABLE `tbllinea`
(
    `LineaId` INTEGER(5) NOT NULL AUTO_INCREMENT,
    `codigo` VARCHAR(45),
    `nombre` VARCHAR(45),
    PRIMARY KEY (`LineaId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tblproductocosto
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tblproductocosto`;

CREATE TABLE `tblproductocosto`
(
    `productoPrecioId` BIGINT NOT NULL AUTO_INCREMENT,
    `productoId` BIGINT,
    `costo` DECIMAL(10,2),
    `fecha` DATETIME,
    `TblProductos_productoId` BIGINT NOT NULL,
    PRIMARY KEY (`productoPrecioId`),
    INDEX `fk_TblProductoPrecio_TblProductos1_idx` (`TblProductos_productoId`),
    CONSTRAINT `fk_TblProductoPrecio_TblProductos10`
        FOREIGN KEY (`TblProductos_productoId`)
        REFERENCES `tblproductos` (`productoId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tblproductoprecio
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tblproductoprecio`;

CREATE TABLE `tblproductoprecio`
(
    `productoPrecioId` BIGINT NOT NULL AUTO_INCREMENT,
    `productoId` BIGINT,
    `precio` DECIMAL(10,2),
    `fecha` DATETIME,
    `TblProductos_productoId` BIGINT NOT NULL,
    PRIMARY KEY (`productoPrecioId`),
    INDEX `fk_TblProductoPrecio_TblProductos1_idx` (`TblProductos_productoId`),
    CONSTRAINT `fk_TblProductoPrecio_TblProductos1`
        FOREIGN KEY (`TblProductos_productoId`)
        REFERENCES `tblproductos` (`productoId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tblproductos
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tblproductos`;

CREATE TABLE `tblproductos`
(
    `productoId` BIGINT NOT NULL AUTO_INCREMENT,
    `codigo` VARCHAR(45),
    `nombre` VARCHAR(250),
    `lineaId` INTEGER(5),
    `TblLinea_LineaId` INTEGER(5) NOT NULL,
    PRIMARY KEY (`productoId`),
    INDEX `fk_TblProductos_TblLinea1_idx` (`TblLinea_LineaId`),
    CONSTRAINT `fk_TblProductos_TblLinea1`
        FOREIGN KEY (`TblLinea_LineaId`)
        REFERENCES `tbllinea` (`LineaId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- usuarios
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios`
(
    `id_usuario` INTEGER(10) NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `nivel` CHAR NOT NULL,
    `clave` VARCHAR(60) NOT NULL,
    PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
