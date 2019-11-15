
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

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
-- tblcategoria
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tblcategoria`;

CREATE TABLE `tblcategoria`
(
    `LineaId` INTEGER(5) NOT NULL AUTO_INCREMENT,
    `codigo` VARCHAR(45),
    `nombre` VARCHAR(45),
    `descripcion` TEXT,
    PRIMARY KEY (`LineaId`)
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
-- tblconfiguracion
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tblconfiguracion`;

CREATE TABLE `tblconfiguracion`
(
    `configuracionId` BIGINT NOT NULL AUTO_INCREMENT,
    `nombreEmpresa` VARCHAR(250),
    `nit` VARCHAR(45),
    `direccion` VARCHAR(250),
    `ciudadId` BIGINT,
    `telefono` VARCHAR(15),
    `actividadEconomica` VARCHAR(5),
    `regimen` VARCHAR(250),
    `resolucion` VARCHAR(45),
    PRIMARY KEY (`configuracionId`)
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
    PRIMARY KEY (`egresoDetalleId`),
    INDEX `fk_tblegresodetalle_tblproductos1_idx` (`productoId`),
    INDEX `fk_tblegresodetalle_tblegreso1_idx` (`egresoId`),
    CONSTRAINT `fk_tblegresodetalle_tblegreso1`
        FOREIGN KEY (`egresoId`)
        REFERENCES `tblegreso` (`egresoId`),
    CONSTRAINT `fk_tblegresodetalle_tblproductos1`
        FOREIGN KEY (`productoId`)
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
    `estado` CHAR DEFAULT '1',
    `usuarioId` BIGINT,
    `totatPagado` INTEGER,
    `metodoPagoId` INTEGER,
    PRIMARY KEY (`facturaId`),
    INDEX `fk_tblfactura_tblcliente1_idx` (`clienteId`),
    INDEX `fk_tblfactura_usuarios1_idx` (`usuarioId`),
    INDEX `fk_tblfactura_tblmetodopago1_idx` (`metodoPagoId`),
    CONSTRAINT `fk_tblfactura_tblcliente1`
        FOREIGN KEY (`clienteId`)
        REFERENCES `tblcliente` (`clienteId`),
    CONSTRAINT `fk_tblfactura_tblmetodopago1`
        FOREIGN KEY (`metodoPagoId`)
        REFERENCES `tblmetodopago` (`metodopagoId`),
    CONSTRAINT `fk_tblfactura_usuarios1`
        FOREIGN KEY (`usuarioId`)
        REFERENCES `usuarios` (`id_usuario`)
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
    PRIMARY KEY (`facturaDetalleId`),
    INDEX `fk_tblfacturadetalle_tblfactura1_idx` (`facturaId`),
    INDEX `fk_tblfacturadetalle_tblproductos1_idx` (`productoId`),
    CONSTRAINT `fk_tblfacturadetalle_tblfactura1`
        FOREIGN KEY (`facturaId`)
        REFERENCES `tblfactura` (`facturaId`),
    CONSTRAINT `fk_tblfacturadetalle_tblproductos1`
        FOREIGN KEY (`productoId`)
        REFERENCES `tblproductos` (`productoId`)
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
    PRIMARY KEY (`ingresoDetalleId`),
    INDEX `fk_tblingresodetalle_tblingreso1_idx` (`ingresoId`),
    INDEX `fk_tblingresodetalle_tblproductos1_idx` (`productoId`),
    CONSTRAINT `fk_tblingresodetalle_tblingreso1`
        FOREIGN KEY (`ingresoId`)
        REFERENCES `tblingreso` (`ingresoId`),
    CONSTRAINT `fk_tblingresodetalle_tblproductos1`
        FOREIGN KEY (`productoId`)
        REFERENCES `tblproductos` (`productoId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tblmenu
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tblmenu`;

CREATE TABLE `tblmenu`
(
    `menuId` INTEGER(5) NOT NULL AUTO_INCREMENT,
    `menu` VARCHAR(50) NOT NULL,
    `url` VARCHAR(120) NOT NULL,
    `estado` CHAR,
    PRIMARY KEY (`menuId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tblmenuitens
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tblmenuitens`;

CREATE TABLE `tblmenuitens`
(
    `menuItensId` BIGINT NOT NULL AUTO_INCREMENT,
    `item` VARCHAR(45),
    `estado` CHAR DEFAULT '1',
    `activo` CHAR DEFAULT '0' NOT NULL,
    `padre` CHAR DEFAULT '0' NOT NULL,
    `menuId` INTEGER(5) NOT NULL,
    PRIMARY KEY (`menuItensId`),
    INDEX `fk_menuItens_tblmenu1_idx` (`menuId`),
    CONSTRAINT `fk_menuItens_tblmenu1`
        FOREIGN KEY (`menuId`)
        REFERENCES `tblmenu` (`menuId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tblmetodopago
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tblmetodopago`;

CREATE TABLE `tblmetodopago`
(
    `metodopagoId` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(100),
    `detalle` TEXT,
    PRIMARY KEY (`metodopagoId`)
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
    PRIMARY KEY (`productoPrecioId`),
    INDEX `fk_tblproductocosto_tblproductos1_idx` (`productoId`),
    CONSTRAINT `fk_tblproductocosto_tblproductos1`
        FOREIGN KEY (`productoId`)
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
    PRIMARY KEY (`productoPrecioId`),
    INDEX `fk_tblproductoprecio_tblproductos1_idx` (`productoId`),
    CONSTRAINT `fk_tblproductoprecio_tblproductos1`
        FOREIGN KEY (`productoId`)
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
    PRIMARY KEY (`productoId`),
    INDEX `fk_tblproductos_tbllinea1_idx` (`lineaId`),
    CONSTRAINT `fk_tblproductos_tbllinea1`
        FOREIGN KEY (`lineaId`)
        REFERENCES `tblcategoria` (`LineaId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- tblrol
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `tblrol`;

CREATE TABLE `tblrol`
(
    `rolId` INTEGER NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(100),
    `estado` CHAR,
    `fecha` DATETIME,
    PRIMARY KEY (`rolId`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- usuarios
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `usuarios`;

CREATE TABLE `usuarios`
(
    `id_usuario` BIGINT NOT NULL AUTO_INCREMENT,
    `nombre` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `nivel` CHAR NOT NULL,
    `clave` VARCHAR(60) NOT NULL,
    `rolId` INTEGER NOT NULL,
    `menuId` INTEGER(5) NOT NULL,
    PRIMARY KEY (`id_usuario`),
    INDEX `fk_usuarios_tblrol1_idx` (`rolId`),
    INDEX `fk_usuarios_tblmenu1_idx` (`menuId`),
    CONSTRAINT `fk_usuarios_tblmenu1`
        FOREIGN KEY (`menuId`)
        REFERENCES `tblmenu` (`menuId`),
    CONSTRAINT `fk_usuarios_tblrol1`
        FOREIGN KEY (`rolId`)
        REFERENCES `tblrol` (`rolId`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
