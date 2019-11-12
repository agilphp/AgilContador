-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-11-2019 a las 16:56:09
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de datos: `agilcontador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `id` char(128) COLLATE utf8_spanish2_ci NOT NULL,
  `set_time` char(10) COLLATE utf8_spanish2_ci NOT NULL,
  `data` text COLLATE utf8_spanish2_ci NOT NULL,
  `session_key` char(128) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcategoria`
--

CREATE TABLE `tblcategoria` (
  `LineaId` int(5) NOT NULL,
  `codigo` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripcion` text COLLATE utf8_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcliente`
--

CREATE TABLE `tblcliente` (
  `clienteId` bigint(20) NOT NULL,
  `codigo` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre` varchar(300) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `ciudadId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblconfiguracion`
--

CREATE TABLE `tblconfiguracion` (
  `configuracionId` bigint(20) NOT NULL,
  `nombreEmpresa` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nit` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `direccion` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ciudadId` bigint(20) DEFAULT NULL,
  `telefono` varchar(15) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `actividadEconomica` varchar(5) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `regimen` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `resolucion` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblegreso`
--

CREATE TABLE `tblegreso` (
  `egresoId` bigint(20) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `comentario` text COLLATE utf8_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblegresodetalle`
--

CREATE TABLE `tblegresodetalle` (
  `egresoDetalleId` bigint(20) NOT NULL,
  `egresoId` bigint(20) DEFAULT NULL,
  `productoId` bigint(20) DEFAULT NULL,
  `cantidad` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblfactura`
--

CREATE TABLE `tblfactura` (
  `facturaId` bigint(20) NOT NULL,
  `numero` bigint(20) NOT NULL,
  `clienteId` bigint(20) NOT NULL,
  `fecha` datetime NOT NULL,
  `estado` char(1) COLLATE utf8_spanish2_ci DEFAULT '1',
  `usuarioId` bigint(20) DEFAULT NULL,
  `totatPagado` int(11) DEFAULT NULL,
  `metodoPagoId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblfacturadetalle`
--

CREATE TABLE `tblfacturadetalle` (
  `facturaDetalleId` bigint(20) NOT NULL,
  `facturaId` bigint(20) DEFAULT NULL,
  `productoId` bigint(20) DEFAULT NULL,
  `cantidad` decimal(10,2) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblingreso`
--

CREATE TABLE `tblingreso` (
  `ingresoId` bigint(20) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `comentario` text COLLATE utf8_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblingresodetalle`
--

CREATE TABLE `tblingresodetalle` (
  `ingresoDetalleId` bigint(20) NOT NULL,
  `ingresoId` bigint(20) DEFAULT NULL,
  `productoId` bigint(20) DEFAULT NULL,
  `cantidad` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmenu`
--

CREATE TABLE `tblmenu` (
  `menuId` int(5) NOT NULL,
  `menu` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `url` varchar(120) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` char(1) COLLATE utf8_spanish2_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tblmenu`
--

INSERT INTO `tblmenu` (`menuId`, `menu`, `url`, `estado`) VALUES
(2, 'Admin', '', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmenuitens`
--

CREATE TABLE `tblmenuitens` (
  `menuItensId` bigint(20) NOT NULL,
  `item` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` char(1) COLLATE utf8_spanish2_ci DEFAULT '1',
  `menuId` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblmetodopago`
--

CREATE TABLE `tblmetodopago` (
  `metodopagoId` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `detalle` text COLLATE utf8_spanish2_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproductocosto`
--

CREATE TABLE `tblproductocosto` (
  `productoPrecioId` bigint(20) NOT NULL,
  `productoId` bigint(20) DEFAULT NULL,
  `costo` decimal(10,2) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproductoprecio`
--

CREATE TABLE `tblproductoprecio` (
  `productoPrecioId` bigint(20) NOT NULL,
  `productoId` bigint(20) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproductos`
--

CREATE TABLE `tblproductos` (
  `productoId` bigint(20) NOT NULL,
  `codigo` varchar(45) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `nombre` varchar(250) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `lineaId` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblrol`
--

CREATE TABLE `tblrol` (
  `rolId` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estado` char(1) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tblrol`
--

INSERT INTO `tblrol` (`rolId`, `nombre`, `estado`, `fecha`) VALUES
(1, 'Admin', '1', '2019-11-12 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` bigint(20) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nivel` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  `clave` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `rolId` int(11) NOT NULL,
  `menuId` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `nivel`, `clave`, `rolId`, `menuId`) VALUES
(1, 'efrain', 'demo@agilcontador.php', '1', 'P0L1fe703d258c7ef5f50b71e06565a65aa07194907f', 1, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblcategoria`
--
ALTER TABLE `tblcategoria`
  ADD PRIMARY KEY (`LineaId`);

--
-- Indices de la tabla `tblcliente`
--
ALTER TABLE `tblcliente`
  ADD PRIMARY KEY (`clienteId`);

--
-- Indices de la tabla `tblconfiguracion`
--
ALTER TABLE `tblconfiguracion`
  ADD PRIMARY KEY (`configuracionId`);

--
-- Indices de la tabla `tblegreso`
--
ALTER TABLE `tblegreso`
  ADD PRIMARY KEY (`egresoId`);

--
-- Indices de la tabla `tblegresodetalle`
--
ALTER TABLE `tblegresodetalle`
  ADD PRIMARY KEY (`egresoDetalleId`),
  ADD KEY `fk_tblegresodetalle_tblproductos1_idx` (`productoId`),
  ADD KEY `fk_tblegresodetalle_tblegreso1_idx` (`egresoId`);

--
-- Indices de la tabla `tblfactura`
--
ALTER TABLE `tblfactura`
  ADD PRIMARY KEY (`facturaId`),
  ADD KEY `fk_tblfactura_tblcliente1_idx` (`clienteId`),
  ADD KEY `fk_tblfactura_usuarios1_idx` (`usuarioId`),
  ADD KEY `fk_tblfactura_tblmetodopago1_idx` (`metodoPagoId`);

--
-- Indices de la tabla `tblfacturadetalle`
--
ALTER TABLE `tblfacturadetalle`
  ADD PRIMARY KEY (`facturaDetalleId`),
  ADD KEY `fk_tblfacturadetalle_tblfactura1_idx` (`facturaId`),
  ADD KEY `fk_tblfacturadetalle_tblproductos1_idx` (`productoId`);

--
-- Indices de la tabla `tblingreso`
--
ALTER TABLE `tblingreso`
  ADD PRIMARY KEY (`ingresoId`);

--
-- Indices de la tabla `tblingresodetalle`
--
ALTER TABLE `tblingresodetalle`
  ADD PRIMARY KEY (`ingresoDetalleId`),
  ADD KEY `fk_tblingresodetalle_tblingreso1_idx` (`ingresoId`),
  ADD KEY `fk_tblingresodetalle_tblproductos1_idx` (`productoId`);

--
-- Indices de la tabla `tblmenu`
--
ALTER TABLE `tblmenu`
  ADD PRIMARY KEY (`menuId`);

--
-- Indices de la tabla `tblmenuitens`
--
ALTER TABLE `tblmenuitens`
  ADD PRIMARY KEY (`menuItensId`),
  ADD KEY `fk_menuItens_tblmenu1_idx` (`menuId`);

--
-- Indices de la tabla `tblmetodopago`
--
ALTER TABLE `tblmetodopago`
  ADD PRIMARY KEY (`metodopagoId`);

--
-- Indices de la tabla `tblproductocosto`
--
ALTER TABLE `tblproductocosto`
  ADD PRIMARY KEY (`productoPrecioId`),
  ADD KEY `fk_tblproductocosto_tblproductos1_idx` (`productoId`);

--
-- Indices de la tabla `tblproductoprecio`
--
ALTER TABLE `tblproductoprecio`
  ADD PRIMARY KEY (`productoPrecioId`),
  ADD KEY `fk_tblproductoprecio_tblproductos1_idx` (`productoId`);

--
-- Indices de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  ADD PRIMARY KEY (`productoId`),
  ADD KEY `fk_tblproductos_tbllinea1_idx` (`lineaId`);

--
-- Indices de la tabla `tblrol`
--
ALTER TABLE `tblrol`
  ADD PRIMARY KEY (`rolId`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_usuarios_tblrol1_idx` (`rolId`),
  ADD KEY `fk_usuarios_tblmenu1_idx` (`menuId`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tblcategoria`
--
ALTER TABLE `tblcategoria`
  MODIFY `LineaId` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tblcliente`
--
ALTER TABLE `tblcliente`
  MODIFY `clienteId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tblconfiguracion`
--
ALTER TABLE `tblconfiguracion`
  MODIFY `configuracionId` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tblegreso`
--
ALTER TABLE `tblegreso`
  MODIFY `egresoId` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tblegresodetalle`
--
ALTER TABLE `tblegresodetalle`
  MODIFY `egresoDetalleId` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tblfactura`
--
ALTER TABLE `tblfactura`
  MODIFY `facturaId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `tblfacturadetalle`
--
ALTER TABLE `tblfacturadetalle`
  MODIFY `facturaDetalleId` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tblmenu`
--
ALTER TABLE `tblmenu`
  MODIFY `menuId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tblmenuitens`
--
ALTER TABLE `tblmenuitens`
  MODIFY `menuItensId` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tblmetodopago`
--
ALTER TABLE `tblmetodopago`
  MODIFY `metodopagoId` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tblproductocosto`
--
ALTER TABLE `tblproductocosto`
  MODIFY `productoPrecioId` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tblproductoprecio`
--
ALTER TABLE `tblproductoprecio`
  MODIFY `productoPrecioId` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  MODIFY `productoId` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tblrol`
--
ALTER TABLE `tblrol`
  MODIFY `rolId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblegresodetalle`
--
ALTER TABLE `tblegresodetalle`
  ADD CONSTRAINT `fk_tblegresodetalle_tblegreso1` FOREIGN KEY (`egresoId`) REFERENCES `tblegreso` (`egresoId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblegresodetalle_tblproductos1` FOREIGN KEY (`productoId`) REFERENCES `tblproductos` (`productoId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblfactura`
--
ALTER TABLE `tblfactura`
  ADD CONSTRAINT `fk_tblfactura_tblcliente1` FOREIGN KEY (`clienteId`) REFERENCES `tblcliente` (`clienteId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblfactura_tblmetodopago1` FOREIGN KEY (`metodoPagoId`) REFERENCES `tblmetodopago` (`metodopagoId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblfactura_usuarios1` FOREIGN KEY (`usuarioId`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblfacturadetalle`
--
ALTER TABLE `tblfacturadetalle`
  ADD CONSTRAINT `fk_tblfacturadetalle_tblfactura1` FOREIGN KEY (`facturaId`) REFERENCES `tblfactura` (`facturaId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblfacturadetalle_tblproductos1` FOREIGN KEY (`productoId`) REFERENCES `tblproductos` (`productoId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblingresodetalle`
--
ALTER TABLE `tblingresodetalle`
  ADD CONSTRAINT `fk_tblingresodetalle_tblingreso1` FOREIGN KEY (`ingresoId`) REFERENCES `tblingreso` (`ingresoId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblingresodetalle_tblproductos1` FOREIGN KEY (`productoId`) REFERENCES `tblproductos` (`productoId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblmenuitens`
--
ALTER TABLE `tblmenuitens`
  ADD CONSTRAINT `fk_menuItens_tblmenu1` FOREIGN KEY (`menuId`) REFERENCES `tblmenu` (`menuId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblproductocosto`
--
ALTER TABLE `tblproductocosto`
  ADD CONSTRAINT `fk_tblproductocosto_tblproductos1` FOREIGN KEY (`productoId`) REFERENCES `tblproductos` (`productoId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblproductoprecio`
--
ALTER TABLE `tblproductoprecio`
  ADD CONSTRAINT `fk_tblproductoprecio_tblproductos1` FOREIGN KEY (`productoId`) REFERENCES `tblproductos` (`productoId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tblproductos`
--
ALTER TABLE `tblproductos`
  ADD CONSTRAINT `fk_tblproductos_tbllinea1` FOREIGN KEY (`lineaId`) REFERENCES `tblcategoria` (`LineaId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_tblmenu1` FOREIGN KEY (`menuId`) REFERENCES `tblmenu` (`menuId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_tblrol1` FOREIGN KEY (`rolId`) REFERENCES `tblrol` (`rolId`) ON DELETE NO ACTION ON UPDATE NO ACTION;
