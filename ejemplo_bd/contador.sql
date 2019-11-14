-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema agilcontador
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema agilcontador
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `agilcontador` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci ;
USE `agilcontador` ;

-- -----------------------------------------------------
-- Table `agilcontador`.`sesiones`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agilcontador`.`sesiones` (
  `id` CHAR(128) NOT NULL,
  `set_time` CHAR(10) NOT NULL,
  `data` TEXT NOT NULL,
  `session_key` CHAR(128) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `agilcontador`.`tblcategoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agilcontador`.`tblcategoria` (
  `LineaId` INT(5) NOT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(45) NULL DEFAULT NULL,
  `nombre` VARCHAR(45) NULL DEFAULT NULL,
  `descripcion` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`LineaId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `agilcontador`.`tblcliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agilcontador`.`tblcliente` (
  `clienteId` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(50) NOT NULL,
  `nombre` VARCHAR(300) NOT NULL,
  `direccion` VARCHAR(150) NOT NULL,
  `telefono` VARCHAR(150) NOT NULL,
  `ciudadId` INT(10) NOT NULL,
  PRIMARY KEY (`clienteId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `agilcontador`.`tblconfiguracion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agilcontador`.`tblconfiguracion` (
  `configuracionId` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `nombreEmpresa` VARCHAR(250) NULL DEFAULT NULL,
  `nit` VARCHAR(45) NULL DEFAULT NULL,
  `direccion` VARCHAR(250) NULL DEFAULT NULL,
  `ciudadId` BIGINT(20) NULL DEFAULT NULL,
  `telefono` VARCHAR(15) NULL DEFAULT NULL,
  `actividadEconomica` VARCHAR(5) NULL DEFAULT NULL,
  `regimen` VARCHAR(250) NULL DEFAULT NULL,
  `resolucion` VARCHAR(45) NULL DEFAULT NULL,
  PRIMARY KEY (`configuracionId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `agilcontador`.`tblegreso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agilcontador`.`tblegreso` (
  `egresoId` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `numero` INT(11) NULL DEFAULT NULL,
  `fecha` DATETIME NULL DEFAULT NULL,
  `comentario` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`egresoId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `agilcontador`.`tblproductos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agilcontador`.`tblproductos` (
  `productoId` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `codigo` VARCHAR(45) NULL DEFAULT NULL,
  `nombre` VARCHAR(250) NULL DEFAULT NULL,
  `lineaId` INT(5) NULL DEFAULT NULL,
  PRIMARY KEY (`productoId`),
  INDEX `fk_tblproductos_tbllinea1_idx` (`lineaId` ASC) VISIBLE,
  CONSTRAINT `fk_tblproductos_tbllinea1`
    FOREIGN KEY (`lineaId`)
    REFERENCES `agilcontador`.`tblcategoria` (`LineaId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `agilcontador`.`tblegresodetalle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agilcontador`.`tblegresodetalle` (
  `egresoDetalleId` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `egresoId` BIGINT(20) NULL DEFAULT NULL,
  `productoId` BIGINT(20) NULL DEFAULT NULL,
  `cantidad` DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (`egresoDetalleId`),
  INDEX `fk_tblegresodetalle_tblproductos1_idx` (`productoId` ASC) VISIBLE,
  INDEX `fk_tblegresodetalle_tblegreso1_idx` (`egresoId` ASC) VISIBLE,
  CONSTRAINT `fk_tblegresodetalle_tblegreso1`
    FOREIGN KEY (`egresoId`)
    REFERENCES `agilcontador`.`tblegreso` (`egresoId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblegresodetalle_tblproductos1`
    FOREIGN KEY (`productoId`)
    REFERENCES `agilcontador`.`tblproductos` (`productoId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `agilcontador`.`tblmetodopago`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agilcontador`.`tblmetodopago` (
  `metodopagoId` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NULL DEFAULT NULL,
  `detalle` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`metodopagoId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `agilcontador`.`tblmenu`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agilcontador`.`tblmenu` (
  `menuId` INT(5) NOT NULL AUTO_INCREMENT,
  `menu` VARCHAR(50) NOT NULL,
  `url` VARCHAR(120) NOT NULL,
  `estado` CHAR(1) NULL DEFAULT NULL,
  PRIMARY KEY (`menuId`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `agilcontador`.`tblrol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agilcontador`.`tblrol` (
  `rolId` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NULL DEFAULT NULL,
  `estado` CHAR(1) NULL DEFAULT NULL,
  `fecha` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`rolId`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `agilcontador`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agilcontador`.`usuarios` (
  `id_usuario` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `nivel` CHAR(1) NOT NULL,
  `clave` VARCHAR(60) NOT NULL,
  `rolId` INT(11) NOT NULL,
  `menuId` INT(5) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  INDEX `fk_usuarios_tblrol1_idx` (`rolId` ASC) VISIBLE,
  INDEX `fk_usuarios_tblmenu1_idx` (`menuId` ASC) VISIBLE,
  CONSTRAINT `fk_usuarios_tblmenu1`
    FOREIGN KEY (`menuId`)
    REFERENCES `agilcontador`.`tblmenu` (`menuId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuarios_tblrol1`
    FOREIGN KEY (`rolId`)
    REFERENCES `agilcontador`.`tblrol` (`rolId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `agilcontador`.`tblfactura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agilcontador`.`tblfactura` (
  `facturaId` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `numero` BIGINT(20) NOT NULL,
  `clienteId` BIGINT(20) NOT NULL,
  `fecha` DATETIME NOT NULL,
  `estado` CHAR(1) NULL DEFAULT '1',
  `usuarioId` BIGINT(20) NULL DEFAULT NULL,
  `totatPagado` INT(11) NULL DEFAULT NULL,
  `metodoPagoId` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`facturaId`),
  INDEX `fk_tblfactura_tblcliente1_idx` (`clienteId` ASC) VISIBLE,
  INDEX `fk_tblfactura_usuarios1_idx` (`usuarioId` ASC) VISIBLE,
  INDEX `fk_tblfactura_tblmetodopago1_idx` (`metodoPagoId` ASC) VISIBLE,
  CONSTRAINT `fk_tblfactura_tblcliente1`
    FOREIGN KEY (`clienteId`)
    REFERENCES `agilcontador`.`tblcliente` (`clienteId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblfactura_tblmetodopago1`
    FOREIGN KEY (`metodoPagoId`)
    REFERENCES `agilcontador`.`tblmetodopago` (`metodopagoId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblfactura_usuarios1`
    FOREIGN KEY (`usuarioId`)
    REFERENCES `agilcontador`.`usuarios` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `agilcontador`.`tblfacturadetalle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agilcontador`.`tblfacturadetalle` (
  `facturaDetalleId` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `facturaId` BIGINT(20) NULL DEFAULT NULL,
  `productoId` BIGINT(20) NULL DEFAULT NULL,
  `cantidad` DECIMAL(10,2) NULL DEFAULT NULL,
  `precio` DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (`facturaDetalleId`),
  INDEX `fk_tblfacturadetalle_tblfactura1_idx` (`facturaId` ASC) VISIBLE,
  INDEX `fk_tblfacturadetalle_tblproductos1_idx` (`productoId` ASC) VISIBLE,
  CONSTRAINT `fk_tblfacturadetalle_tblfactura1`
    FOREIGN KEY (`facturaId`)
    REFERENCES `agilcontador`.`tblfactura` (`facturaId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblfacturadetalle_tblproductos1`
    FOREIGN KEY (`productoId`)
    REFERENCES `agilcontador`.`tblproductos` (`productoId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `agilcontador`.`tblingreso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agilcontador`.`tblingreso` (
  `ingresoId` BIGINT(20) NOT NULL,
  `numero` INT(11) NULL DEFAULT NULL,
  `fecha` DATETIME NULL DEFAULT NULL,
  `comentario` TEXT NULL DEFAULT NULL,
  PRIMARY KEY (`ingresoId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `agilcontador`.`tblingresodetalle`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agilcontador`.`tblingresodetalle` (
  `ingresoDetalleId` BIGINT(20) NOT NULL,
  `ingresoId` BIGINT(20) NULL DEFAULT NULL,
  `productoId` BIGINT(20) NULL DEFAULT NULL,
  `cantidad` DECIMAL(10,2) NULL DEFAULT NULL,
  PRIMARY KEY (`ingresoDetalleId`),
  INDEX `fk_tblingresodetalle_tblingreso1_idx` (`ingresoId` ASC) VISIBLE,
  INDEX `fk_tblingresodetalle_tblproductos1_idx` (`productoId` ASC) VISIBLE,
  CONSTRAINT `fk_tblingresodetalle_tblingreso1`
    FOREIGN KEY (`ingresoId`)
    REFERENCES `agilcontador`.`tblingreso` (`ingresoId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblingresodetalle_tblproductos1`
    FOREIGN KEY (`productoId`)
    REFERENCES `agilcontador`.`tblproductos` (`productoId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `agilcontador`.`tblitens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agilcontador`.`tblitens` (
  `menuItensId` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `item` VARCHAR(45) NULL DEFAULT NULL,
  `estado` CHAR(1) NULL DEFAULT '1',
  `padre` CHAR(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`menuItensId`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `agilcontador`.`tblproductocosto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agilcontador`.`tblproductocosto` (
  `productoPrecioId` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `productoId` BIGINT(20) NULL DEFAULT NULL,
  `costo` DECIMAL(10,2) NULL DEFAULT NULL,
  `fecha` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`productoPrecioId`),
  INDEX `fk_tblproductocosto_tblproductos1_idx` (`productoId` ASC) VISIBLE,
  CONSTRAINT `fk_tblproductocosto_tblproductos1`
    FOREIGN KEY (`productoId`)
    REFERENCES `agilcontador`.`tblproductos` (`productoId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `agilcontador`.`tblproductoprecio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agilcontador`.`tblproductoprecio` (
  `productoPrecioId` BIGINT(20) NOT NULL AUTO_INCREMENT,
  `productoId` BIGINT(20) NULL DEFAULT NULL,
  `precio` DECIMAL(10,2) NULL DEFAULT NULL,
  `fecha` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`productoPrecioId`),
  INDEX `fk_tblproductoprecio_tblproductos1_idx` (`productoId` ASC) VISIBLE,
  CONSTRAINT `fk_tblproductoprecio_tblproductos1`
    FOREIGN KEY (`productoId`)
    REFERENCES `agilcontador`.`tblproductos` (`productoId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


-- -----------------------------------------------------
-- Table `agilcontador`.`tblmenu_has_tblitens`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agilcontador`.`tblmenu_has_tblitens` (
  `tblmenu_menuId` INT(5) NOT NULL,
  `tblitens_menuItensId` BIGINT(20) NOT NULL,
  PRIMARY KEY (`tblmenu_menuId`, `tblitens_menuItensId`),
  INDEX `fk_tblmenu_has_tblitens_tblitens1_idx` (`tblitens_menuItensId` ASC) VISIBLE,
  INDEX `fk_tblmenu_has_tblitens_tblmenu1_idx` (`tblmenu_menuId` ASC) VISIBLE,
  CONSTRAINT `fk_tblmenu_has_tblitens_tblmenu1`
    FOREIGN KEY (`tblmenu_menuId`)
    REFERENCES `agilcontador`.`tblmenu` (`menuId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tblmenu_has_tblitens_tblitens1`
    FOREIGN KEY (`tblitens_menuItensId`)
    REFERENCES `agilcontador`.`tblitens` (`menuItensId`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_spanish2_ci;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
