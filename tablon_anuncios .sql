-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2017 a las 22:23:50
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tablon_anuncios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso_categorias`
--

CREATE TABLE `acceso_categorias` (
  `id_nivel` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `acceso_categorias`
--

INSERT INTO `acceso_categorias` (`id_nivel`, `id_categoria`) VALUES
(2, 1),
(2, 2),
(2, 10),
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(3, 6),
(3, 7),
(4, 1),
(4, 2),
(4, 3),
(4, 4),
(4, 5),
(4, 6),
(4, 7),
(5, 7),
(5, 8),
(5, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrativos`
--

CREATE TABLE `administrativos` (
  `mail` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `administrativos`
--

INSERT INTO `administrativos` (`mail`) VALUES
('gloria@gmail');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `mail` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cod_curso` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cod_jornada` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`mail`, `cod_curso`, `cod_jornada`) VALUES
('ana@gmail', '1DAM', 'A.M'),
('caroli', '1DAM', 'A.M'),
('john@gmail', '1DAM', 'A.M'),
('maria@gmail', '1ESO', 'A.M'),
('paco@gmail', '1DAM', 'A.M'),
('peter@gmail', '1DAM', 'P.M'),
('sandra', '1DAM', 'A.M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios`
--

CREATE TABLE `anuncios` (
  `id` int(11) NOT NULL,
  `mail` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `titulo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `autorizado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `anuncios`
--

INSERT INTO `anuncios` (`id`, `mail`, `titulo`, `descripcion`, `fecha_creacion`, `fecha_publicacion`, `autorizado`) VALUES
(1, 'gloria@gmail', 'dsfdsfds', 'dsfdsfds', '2017-06-19 15:25:02', '2017-06-19', 1),
(1, 'julia@gmail', 'dsfds', 'dsfds', '2017-06-02 13:27:25', '2017-06-02', 1),
(2, 'gloria@gmail', 'gfhgf', 'hgfhgf', '2017-06-19 15:27:42', '2017-06-19', 1),
(2, 'julia@gmail', 'dsfds', 'dsfds', '2017-06-02 13:31:41', '2017-06-02', 1),
(3, 'gloria@gmail', 'gfhgf', 'hgfhgf', '2017-06-19 15:30:24', '2017-06-19', 1),
(4, 'gloria@gmail', 'gfhgf', 'hgfhgf', '2017-06-19 15:31:48', '2017-06-19', 1),
(5, 'gloria@gmail', 'gfhgf', 'hgfhgf', '2017-06-19 15:33:55', '2017-06-19', 1),
(6, 'gloria@gmail', 'gfhgf', 'hgfhgf', '2017-06-19 15:35:04', '2017-06-19', 1),
(7, 'gloria@gmail', 'dsfdsf', 'dsfdsf', '2017-06-19 15:53:35', '2017-06-19', 1),
(8, 'carlos@gmail', 'SOY DE DEPARTAMENTOS', 'ASDASDASD', '2017-06-05 00:00:00', '2017-06-05', 1),
(8, 'gloria@gmail', 'dfgdfg', 'dfgdfg', '2017-06-19 16:01:31', '2017-06-19', 1),
(9, 'gloria@gmail', 'dfgdfg', 'dfgdfg', '2017-06-19 16:02:08', '2017-06-19', 1),
(10, 'gloria@gmail', 'sdfds', 'dsfds', '2017-06-19 16:03:02', '2017-06-19', 1),
(10, 'marcos@gmail', 'puedes verme soy de otro departamento', 'dsfdsfds', '2017-06-05 00:00:00', '2017-06-05', 1),
(11, 'gloria@gmail', 'dsfdsf', 'dsfdsf', '2017-06-19 16:11:09', '2017-06-19', 1),
(23, 'felipe@gmail', 'prueba intituto', 'dsfdsf', '2017-06-10 00:00:00', '2017-06-10', 1),
(25, 'marcos@gmail', 'prueba profesores', 'prueba profesores', '2017-06-12 00:00:00', '2017-06-12', 1),
(25, 'mateo@gmail', 'prueba profesores', 'prueba profesores', '2017-06-12 00:00:00', '2017-06-12', 1),
(25, 'paco@gmail', 'prueba alumno curso', 'dsfdsfa', '2017-06-08 00:00:00', '2017-06-08', 1),
(26, 'julia@gmail', 'zzz materia', 'aaa materia', '2017-06-09 00:00:00', '2017-06-09', 1),
(26, 'marcos@gmail', 'prueba materia', 'prueba materia', '2017-06-09 00:00:00', '2017-06-09', 1),
(26, 'maria@gmail', 'prueba materia', 'prueba materia', '2017-06-09 00:00:00', '2017-06-09', 1),
(26, 'paco@gmail', 'prueba materia', 'prueba materia', '2017-06-09 00:00:00', '2017-06-09', 1),
(26, 'peter@gmail', 'prueba materia', 'prueba materia', '2017-06-09 00:00:00', '2017-06-09', 1),
(35, 'peter@gmail', 'Prueba instituto', 'dsfdsfds', '2017-06-10 00:00:00', '2017-06-10', 1),
(616, 'carlos@gmail', 'prueba1', 'prueba1', '2017-05-19 00:00:00', '2017-05-19', 1),
(616, 'maria@gmail', 'NO ME PUEDES VER', 'NO ME PUEDES VER', '2017-05-22 00:00:00', '2017-05-22', 1),
(616, 'peter@gmail', 'prueba1', 'prueba1', '2017-05-19 00:00:00', '2017-05-19', 1),
(617, 'ana@gmail', 'ytry', 'trytr', '2017-05-22 10:18:39', '2017-05-30', 0),
(618, 'ana@gmail', 'dsfds', 'dsf', '2017-06-09 21:20:41', '2017-06-09', 0),
(619, 'ana@gmail', 'sdfds', 'dsfds', '2017-06-09 21:52:04', '2017-06-09', 0),
(619, 'carlos@gmail', 'dfgdf', 'dfgdf', '2017-05-22 10:23:24', '0000-00-00', 0),
(620, 'ana@gmail', 'dsfdsf', 'dsfds', '2017-06-09 21:54:17', '2017-06-09', 0),
(620, 'carlos@gmail', 'dsfds', 'dsfds', '2017-05-22 10:24:40', '0000-00-00', 0),
(621, 'ana@gmail', 'gfhgf', 'hgfh', '2017-06-09 21:57:17', '2017-06-09', 0),
(621, 'carlos@gmail', 'rtret', 'ertre', '2017-05-22 10:26:19', '0000-00-00', 0),
(622, 'ana@gmail', 'dsfdsf', 'dsf', '2017-06-09 22:03:10', '2017-06-09', 0),
(622, 'carlos@gmail', 'werwe', 'werwe', '2017-05-22 10:27:11', '0000-00-00', 0),
(623, 'ana@gmail', 'dfgdf', 'dfg', '2017-06-09 22:08:40', '2017-06-09', 0),
(623, 'carlos@gmail', 'dsfds', 'dsfds', '2017-05-22 10:27:57', '0000-00-00', 0),
(624, 'carlos@gmail', 'fgdf', 'dfgdf', '2017-05-22 10:45:45', '0000-00-00', 0),
(625, 'ana@gmail', 'hgjhg', 'jhgj', '2017-06-09 22:10:35', '2017-06-09', 0),
(625, 'carlos@gmail', 'fdgdf', 'dfg', '2017-05-22 10:46:42', '0000-00-00', 0),
(626, 'ana@gmail', 'hgjhg', 'hgjhg', '2017-06-09 22:13:06', '2017-06-09', 0),
(626, 'carlos@gmail', 'fdgf', 'dfgdf', '2017-05-22 10:47:45', '0000-00-00', 0),
(627, 'ana@gmail', 'dfgg', 'dfgfd', '2017-06-09 22:13:43', '2017-06-09', 0),
(628, 'ana@gmail', 'asdas', 'dasd', '2017-06-09 22:18:02', '2017-06-09', 0),
(628, 'carlos@gmail', 'dfgdf', 'dfgdf', '2017-05-29 14:03:39', '0000-00-00', 0),
(629, 'ana@gmail', 'asdas', 'dasd', '2017-06-09 22:18:50', '2017-06-09', 0),
(629, 'carlos@gmail', 'dsfdsf', 'dsfds', '2017-05-29 15:42:21', '0000-00-00', 0),
(630, 'ana@gmail', 'asdas', 'dasd', '2017-06-09 22:19:55', '2017-06-09', 0),
(630, 'carlos@gmail', 'dsfdsf', 'dsfds', '2017-05-29 15:43:52', '0000-00-00', 0),
(631, 'ana@gmail', 'tttt', 'tttttt', '2017-06-12 09:42:41', '2017-06-12', 0),
(631, 'carlos@gmail', 'ghdgf', 'gfhgf', '2017-05-29 15:47:12', '0000-00-00', 0),
(632, 'carlos@gmail', 'ghdgf', 'gfhgf', '2017-05-29 15:51:17', '0000-00-00', 0),
(633, 'carlos@gmail', 'dsfds', 'dsfdsa', '2017-05-29 16:03:41', '0000-00-00', 0),
(634, 'carlos@gmail', 'erwe', 'wer', '2017-05-29 16:05:50', '0000-00-00', 0),
(635, 'ana@gmail', 'dsfdsf', 'dsffgdf', '2017-06-10 07:50:38', '2017-06-10', 1),
(635, 'carlos@gmail', 'fdgdfs', 'fdgfd', '2017-05-29 16:27:34', '0000-00-00', 0),
(636, 'carlos@gmail', 'dsfds', 'dsfds', '2017-05-29 16:28:42', '0000-00-00', 0),
(637, 'carlos@gmail', 'sadas', 'asdas', '2017-05-29 16:29:40', '0000-00-00', 0),
(638, 'carlos@gmail', 'dsfds', 'dsfds', '2017-05-29 16:34:41', '0000-00-00', 0),
(639, 'carlos@gmail', 'fdsf', 'dsfds', '2017-05-29 16:35:37', '0000-00-00', 0),
(640, 'carlos@gmail', 'DFGDF', 'DFG', '2017-05-29 16:40:11', '0000-00-00', 0),
(641, 'carlos@gmail', 'DFGDF', 'DFG', '2017-05-29 16:40:17', '0000-00-00', 0),
(642, 'carlos@gmail', 'retre', 'ret', '2017-05-29 16:41:21', '0000-00-00', 0),
(643, 'ana@gmail', 'prueba 43', 'dfsfdsf', '2017-06-12 11:30:51', '2017-06-12', 0),
(643, 'carlos@gmail', 'fdgdfg', 'dfgdf', '2017-05-29 16:41:51', '0000-00-00', 0),
(644, 'ana@gmail', 'prueba44', 'dsfdsf', '2017-06-12 11:35:35', '2017-06-12', 0),
(644, 'carlos@gmail', 'fsdf', 'sdfasd', '2017-05-29 16:43:42', '0000-00-00', 0),
(645, 'ana@gmail', 'prueba46', 'cxvxcv', '2017-06-12 12:10:16', '2017-06-12', 0),
(645, 'carlos@gmail', 'fsdf', 'sdfasd', '2017-05-29 16:44:33', '0000-00-00', 0),
(646, 'ana@gmail', 'prueba 48', 'dsfdsfds', '2017-06-12 12:11:50', '2017-06-12', 0),
(646, 'carlos@gmail', 'asdsa', 'dasdas', '2017-05-30 06:58:03', '0000-00-00', 0),
(647, 'ana@gmail', 'prueba curso sab', 'DSFDS', '2017-06-17 09:24:44', '2017-06-17', 0),
(647, 'carlos@gmail', 'asdas', 'dasd', '2017-05-30 07:00:18', '0000-00-00', 0),
(648, 'ana@gmail', 'prueba materia sab', 'DSFDS', '2017-06-17 09:25:39', '2017-06-17', 0),
(648, 'carlos@gmail', 'dfdsf', 'dsfds', '2017-05-30 07:07:07', '0000-00-00', 0),
(649, 'ana@gmail', 'prueba materia sab', 'DSFDS', '2017-06-17 09:26:10', '2017-06-17', 0),
(649, 'carlos@gmail', '', '', '2017-05-30 07:07:39', '0000-00-00', 0),
(650, 'ana@gmail', 'prueba materia sab', 'DSFDS', '2017-06-17 09:26:23', '2017-06-17', 0),
(650, 'carlos@gmail', 'asdsa', 'asdas', '2017-05-30 07:20:54', '0000-00-00', 0),
(651, 'carlos@gmail', '', '', '2017-05-30 07:33:14', '2017-05-30', 1),
(653, 'ana@gmail', 'prueba instituto sab', 'DSFDS', '2017-06-17 09:41:44', '2017-06-17', 0),
(654, 'ana@gmail', 'gdfgdfsg', 'fdgdfg', '2017-06-18 11:12:18', '2017-06-18', 0),
(654, 'carlos@gmail', 'gfhgfh', 'gfhhgf', '2017-05-31 07:32:02', '2017-05-31', 1),
(655, 'ana@gmail', 'ghgf', 'gfhgf', '2017-06-18 11:39:24', '2017-06-18', 0),
(655, 'carlos@gmail', '', '', '2017-05-31 07:32:52', '2017-05-31', 1),
(656, 'ana@gmail', 'undefined', 'undefined', '2017-06-19 17:47:38', '2017-06-19', 0),
(657, 'ana@gmail', 'undefined', 'undefined', '2017-06-19 17:47:39', '2017-06-19', 0),
(658, 'ana@gmail', 'undefined', 'undefined', '2017-06-19 17:47:39', '2017-06-19', 0),
(659, 'ana@gmail', 'undefined', 'undefined', '2017-06-19 17:47:40', '2017-06-19', 0),
(660, 'ana@gmail', 'undefined', 'undefined', '2017-06-19 17:48:23', '2017-06-19', 0),
(660, 'carlos@gmail', 'ewrwe', 'werwe', '2017-05-31 07:42:39', '2017-05-31', 1),
(661, 'ana@gmail', 'undefined', 'undefined', '2017-06-19 17:49:14', '2017-06-19', 0),
(661, 'carlos@gmail', 'fgdfg', 'dfgdf', '2017-05-31 08:42:10', '2017-05-31', 1),
(662, 'ana@gmail', 'undefined', 'undefined', '2017-06-19 17:49:14', '2017-06-19', 0),
(662, 'carlos@gmail', '', '', '2017-05-31 08:47:27', '2017-05-31', 1),
(663, 'ana@gmail', 'undefined', 'undefined', '2017-06-19 17:49:14', '2017-06-19', 0),
(663, 'carlos@gmail', 'fdgdf', 'dfgdf', '2017-05-31 08:51:11', '2017-05-31', 1),
(664, 'ana@gmail', 'undefined', 'undefined', '2017-06-19 17:53:19', '2017-06-19', 0),
(664, 'carlos@gmail', 'fdgdf', 'gdfg', '2017-05-31 08:51:47', '2017-05-31', 1),
(665, 'ana@gmail', 'undefined', 'undefined', '2017-06-19 17:53:19', '2017-06-19', 0),
(665, 'carlos@gmail', 'fdgdf', 'dfgf', '2017-05-31 08:52:34', '2017-05-31', 1),
(666, 'ana@gmail', 'undefined', 'undefined', '2017-06-19 17:53:20', '2017-06-19', 0),
(666, 'carlos@gmail', '', '', '2017-05-31 08:53:38', '2017-05-31', 1),
(667, 'ana@gmail', 'undefined', 'undefined', '2017-06-19 17:56:02', '2017-06-19', 0),
(667, 'carlos@gmail', 'asdas', 'asdas', '2017-05-31 08:53:48', '2017-05-31', 1),
(668, 'ana@gmail', 'undefined', 'undefined', '2017-06-19 17:56:02', '2017-06-19', 0),
(668, 'carlos@gmail', 'DSFDSF', 'DSFDS', '2017-05-31 08:56:52', '2017-05-31', 1),
(669, 'ana@gmail', 'undefined', 'undefined', '2017-06-19 17:56:02', '2017-06-19', 0),
(669, 'carlos@gmail', 'dfgdf', 'dfgdf', '2017-05-31 08:57:47', '2017-05-31', 1),
(670, 'ana@gmail', 'undefined', 'undefined', '2017-06-19 17:56:02', '2017-06-19', 0),
(670, 'carlos@gmail', 'adssad', 'adas', '2017-05-31 08:58:38', '2017-05-31', 1),
(671, 'ana@gmail', 'undefined', 'undefined', '2017-06-19 17:57:19', '2017-06-19', 0),
(671, 'carlos@gmail', 'dfgdf', 'dfgdf', '2017-05-31 09:00:41', '2017-05-31', 1),
(672, 'ana@gmail', 'undefined', 'undefined', '2017-06-19 17:57:19', '2017-06-19', 0),
(672, 'carlos@gmail', 'dsfds', 'dsfds', '2017-05-31 09:03:10', '2017-05-31', 1),
(673, 'ana@gmail', 'undefined', 'undefined', '2017-06-19 17:57:19', '2017-06-19', 0),
(673, 'carlos@gmail', 'vcbvc', 'vcbvc', '2017-05-31 09:05:00', '2017-05-31', 1),
(674, 'ana@gmail', 'undefined', 'undefined', '2017-06-19 17:58:47', '2017-06-19', 0),
(674, 'carlos@gmail', 'fgdfg', 'dfgfd', '2017-05-31 09:05:40', '2017-05-31', 1),
(675, 'ana@gmail', 'undefined', 'undefined', '2017-06-19 17:58:47', '2017-06-19', 0),
(675, 'carlos@gmail', 'dsfds', 'fdasfd', '2017-05-31 09:06:08', '2017-05-31', 1),
(676, 'ana@gmail', 'undefined', 'undefined', '2017-06-19 17:58:48', '2017-06-19', 0),
(676, 'carlos@gmail', 'czxc', 'zxczx', '2017-05-31 09:12:46', '2017-05-31', 1),
(677, 'ana@gmail', 'undefined', 'undefined', '2017-06-19 17:58:48', '2017-06-19', 0),
(677, 'carlos@gmail', 'gdf', 'dfgdf', '2017-05-31 09:13:51', '2017-05-31', 1),
(678, 'ana@gmail', 'undefined', 'undefined', '2017-06-19 17:58:49', '2017-06-19', 0),
(678, 'carlos@gmail', 'dsfds', 'dsfds', '2017-05-31 09:20:00', '2017-05-31', 1),
(679, 'ana@gmail', 'undefined', 'undefined', '2017-06-19 17:58:49', '2017-06-19', 0),
(679, 'carlos@gmail', 'dsfds', 'dsfds', '2017-05-31 09:33:00', '2017-05-31', 1),
(680, 'ana@gmail', 'undefined', 'undefined', '2017-06-19 18:03:12', '2017-06-19', 0),
(680, 'carlos@gmail', 'dsfds', 'dsfds', '2017-05-31 09:33:47', '2017-05-31', 1),
(681, 'ana@gmail', 'undefined', 'undefined', '2017-06-19 18:19:03', '2017-06-19', 0),
(681, 'carlos@gmail', 'esto es de materia', 'dsgfdsfdsf', '2017-06-01 13:37:51', '2017-06-01', 1),
(682, 'carlos@gmail', 'xcasdsa', 'asdasdas', '2017-06-01 17:06:36', '2017-06-01', 1),
(683, 'carlos@gmail', 'ghgf', 'gfhgf', '2017-06-01 17:09:55', '2017-06-01', 1),
(684, 'carlos@gmail', 'dfgdf', 'dfgdf', '2017-06-01 17:11:10', '2017-06-01', 1),
(685, 'carlos@gmail', 'asdas', 'dasdas', '2017-06-01 17:19:00', '2017-06-01', 1),
(686, 'carlos@gmail', 'DSFDSF', 'SDFDSF', '2017-06-01 17:22:47', '2017-06-01', 1),
(687, 'carlos@gmail', 'ASDASD', 'SADAS', '2017-06-01 17:23:43', '2017-06-01', 1),
(688, 'carlos@gmail', 'FDGDFG', 'DFGFD', '2017-06-01 18:12:33', '2017-06-01', 1),
(689, 'carlos@gmail', 'FDGDFG', 'DFGFD', '2017-06-01 18:13:08', '2017-06-01', 1),
(690, 'carlos@gmail', 'FDGDFG', 'DFGFD', '2017-06-01 18:17:39', '2017-06-01', 1),
(691, 'carlos@gmail', 'A', 'DSFADSF', '2017-06-01 00:00:00', '2017-06-01', 1),
(692, 'carlos@gmail', '', '', '2017-06-02 11:58:33', '2017-06-02', 1),
(693, 'carlos@gmail', 'dsfds', 'dsfds', '2017-06-02 12:06:52', '2017-06-02', 1),
(694, 'carlos@gmail', 'dfdsf', 'dsfds', '2017-06-02 12:09:12', '2017-06-02', 1),
(695, 'carlos@gmail', 'dfdsf', 'dsfds', '2017-06-02 12:09:28', '2017-06-02', 1),
(696, 'carlos@gmail', 'dfdsf', 'dsfds', '2017-06-02 12:09:45', '2017-06-02', 1),
(696, 'julia@gmail', 'prueba departamento', 'asdasdasd', '2017-06-02 00:00:00', '2017-06-02', 1),
(697, 'carlos@gmail', '', '', '2017-06-02 20:23:11', '2017-06-02', 1),
(698, 'carlos@gmail', '', '', '2017-06-02 20:25:41', '2017-06-02', 1),
(699, 'carlos@gmail', 'DSFDSF', 'DSFDSF', '2017-06-02 20:27:38', '2017-06-02', 1),
(700, 'carlos@gmail', 'DSFDSF', 'DSFDSF', '2017-06-02 20:29:19', '2017-06-02', 1),
(701, 'carlos@gmail', 'DSFDSF', 'DSFDSF', '2017-06-02 20:29:21', '2017-06-02', 1),
(702, 'carlos@gmail', 'DSFDSF', 'DSFDSF', '2017-06-02 20:29:23', '2017-06-02', 1),
(703, 'carlos@gmail', '', '', '2017-06-02 20:34:08', '2017-06-02', 1),
(704, 'carlos@gmail', 'gdfhgfd', 'hgfhgfh', '2017-06-02 20:35:05', '2017-06-02', 1),
(705, 'carlos@gmail', '', '', '2017-06-02 20:45:23', '2017-06-02', 1),
(706, 'carlos@gmail', '', '', '2017-06-02 20:46:53', '2017-06-02', 1),
(707, 'carlos@gmail', 'treyt', 'trytr', '2017-06-03 10:42:00', '2017-06-03', 1),
(708, 'carlos@gmail', 'gfhgf', 'gfhgf', '2017-06-03 11:12:10', '2017-06-03', 1),
(708, 'felipe@gmail', 'no me puedes ver carlos', 'asddsfdsfds', '2017-06-03 00:00:00', '2017-06-03', 1),
(708, 'marcos@gmail', 'carlos tu si puedes verme', 'dsfdsfdsf', '2017-06-03 00:00:00', '2017-06-03', 1),
(709, 'carlos@gmail', 'ya esta en publicacioneas', 'dsfdsfdsf', '2017-06-03 00:00:00', '2017-06-03', 1),
(710, 'carlos@gmail', 'soy el mas nuevo', 'soy el mas nuevo', '2017-06-03 16:57:54', '2017-06-03', 1),
(711, 'carlos@gmail', 'dfgdf', 'dfgdf', '2017-06-04 14:31:45', '2017-06-04', 1),
(712, 'carlos@gmail', 'dfgd', 'fgdfg', '2017-06-04 14:34:49', '2017-06-04', 1),
(713, 'carlos@gmail', 'dsfds', 'dsf', '2017-06-04 14:35:21', '2017-06-04', 1),
(714, 'carlos@gmail', 'sdfds', 'dsfds', '2017-06-04 14:36:10', '2017-06-04', 1),
(716, 'carlos@gmail', 'DSFDS', 'DSF', '2017-06-04 14:45:13', '2017-06-04', 1),
(717, 'carlos@gmail', 'dsfds', 'dsf', '2017-06-04 15:34:32', '2017-06-04', 1),
(721, 'carlos@gmail', 'dsfds', 'dsfd', '2017-06-04 16:22:51', '2017-06-04', 1),
(724, 'carlos@gmail', 'fgf', 'fdg', '2017-06-04 16:27:27', '2017-06-04', 1),
(725, 'carlos@gmail', 'aaaaa', 'sdsfdsaf', '2017-06-04 17:35:21', '2017-06-04', 1),
(726, 'carlos@gmail', 'ZZZZZZ', 'ASDSADAS', '2017-06-04 17:53:15', '2017-06-04', 1),
(727, 'carlos@gmail', 'prueba de imagenes', 'prueba de imagenes', '2017-06-05 19:46:33', '2017-06-05', 1),
(728, 'carlos@gmail', 'prueba materia', 'dsfdsf', '2017-06-09 14:04:45', '2017-06-09', 1),
(729, 'carlos@gmail', 'PRUEBA PROFESOR', 'DASDFSFSD', '2017-06-12 20:28:22', '2017-06-12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios_imagenes`
--

CREATE TABLE `anuncios_imagenes` (
  `id_anuncio` int(11) NOT NULL,
  `mail_usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `anuncios_imagenes`
--

INSERT INTO `anuncios_imagenes` (`id_anuncio`, `mail_usuario`, `numero`, `nombre`) VALUES
(1, 'julia@gmail', 1, 'COLOMBIAatardecer_en_honor_a_sus_colores-59314b9f46eb3.jpg'),
(2, 'julia@gmail', 1, 'COLOMBIAatardecer_en_honor_a_sus_colores-59314c9ec50b9.jpg'),
(616, 'carlos@gmail', 1, 'gfhgf'),
(616, 'maria@gmail', 2, 'dsadasd'),
(643, 'ana@gmail', 1, 'crayola-593e5f390d5a7.jpg'),
(643, 'ana@gmail', 2, 'descarga-593e5f391d77a.jpg'),
(643, 'ana@gmail', 3, 'libros-593e5f396251a.jpg'),
(644, 'ana@gmail', 1, 'crayola-593e600e6d1b4.jpg'),
(644, 'ana@gmail', 2, 'descarga-593e600e81209.jpg'),
(644, 'ana@gmail', 3, 'libros-593e600ea969a.jpg'),
(645, 'carlos@gmail', 1, 'COLOMBIAatardecer_en_honor_a_sus_colores-592c33d226f33.jpg'),
(645, 'carlos@gmail', 2, 'dia2 (1) - copia-592c33d23da80.jpg'),
(645, 'carlos@gmail', 3, 'dia2 (1)-592c33d2610f0.jpg'),
(646, 'ana@gmail', 1, 'crayola-593e68e856cae.jpg'),
(646, 'ana@gmail', 2, 'descarga-593e68e85d240.jpg'),
(646, 'ana@gmail', 3, 'libros-593e68e86d02c.jpg'),
(647, 'ana@gmail', 1, 'COLOMBIAatardecer_en_honor_a_sus_colores-5944d93e47b92.jpg'),
(647, 'ana@gmail', 2, 'dia2 (1) - copia-5944d93e5044c.jpg'),
(647, 'ana@gmail', 3, 'dia2 (1)-5944d93e565f5.jpg'),
(648, 'ana@gmail', 1, 'COLOMBIAatardecer_en_honor_a_sus_colores-5944d97621324.jpg'),
(648, 'ana@gmail', 2, 'dia2 (1) - copia-5944d9762a3ae.jpg'),
(648, 'ana@gmail', 3, 'dia2 (1)-5944d97640343.jpg'),
(649, 'ana@gmail', 1, 'COLOMBIAatardecer_en_honor_a_sus_colores-5944d9943eab6.jpg'),
(649, 'ana@gmail', 2, 'dia2 (1) - copia-5944d99444878.jpg'),
(649, 'ana@gmail', 3, 'dia2 (1)-5944d99448ae1.jpg'),
(650, 'ana@gmail', 1, 'COLOMBIAatardecer_en_honor_a_sus_colores-5944d9a3bfcaf.jpg'),
(650, 'ana@gmail', 2, 'dia2 (1) - copia-5944d9a3c9509.jpg'),
(650, 'ana@gmail', 3, 'dia2 (1)-5944d9a3d5c44.jpg'),
(653, 'ana@gmail', 1, 'COLOMBIAatardecer_en_honor_a_sus_colores-5944dd3a2e6a0.jpg'),
(653, 'ana@gmail', 2, 'dia2 (1) - copia-5944dd3a4695e.jpg'),
(653, 'ana@gmail', 3, 'dia2 (1)-5944dd3a5ad9b.jpg'),
(654, 'ana@gmail', 1, 'crayola-5946429bed3c3.jpg'),
(687, 'carlos@gmail', 1, 'COLOMBIAatardecer_en_honor_a_sus_colores-59303180a1b99.jpg'),
(689, 'carlos@gmail', 1, 'COLOMBIAatardecer_en_honor_a_sus_colores-59303d1758a67.jpg'),
(690, 'carlos@gmail', 1, 'COLOMBIAatardecer_en_honor_a_sus_colores-59303e243de32.jpg'),
(694, 'carlos@gmail', 1, 'COLOMBIAatardecer_en_honor_a_sus_colores-59313949733cc.jpg'),
(696, 'carlos@gmail', 1, 'COLOMBIAatardecer_en_honor_a_sus_colores-5931396b3c49f.jpg'),
(726, 'carlos@gmail', 1, 'COLOMBIAatardecer_en_honor_a_sus_colores-59342ced6c3a0.jpg'),
(727, 'carlos@gmail', 1, 'COLOMBIAatardecer_en_honor_a_sus_colores-593598fb6c0ad.jpg'),
(727, 'carlos@gmail', 2, 'dia2 (1) - copia-593598fb7aef8.jpg'),
(727, 'carlos@gmail', 3, 'dia2 (1)-593598fb837b2.jpg'),
(729, 'carlos@gmail', 1, 'niños-593edd47a6dcd.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios_imagenes_publico`
--

CREATE TABLE `anuncios_imagenes_publico` (
  `id_anuncio` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `anuncios_imagenes_publico`
--

INSERT INTO `anuncios_imagenes_publico` (`id_anuncio`, `numero`, `nombre`) VALUES
(124, 1, 'crayola-594270ecd13f7.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios_otros`
--

CREATE TABLE `anuncios_otros` (
  `id_anuncio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios_pdf`
--

CREATE TABLE `anuncios_pdf` (
  `id_anuncio` int(11) NOT NULL,
  `mail_usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `anuncios_pdf`
--

INSERT INTO `anuncios_pdf` (`id_anuncio`, `mail_usuario`, `numero`, `nombre`) VALUES
(1, 'julia@gmail', 1, '40000632506-59314b9f89542.pdf'),
(2, 'julia@gmail', 1, '40000632506-59314c9ed23ac.pdf'),
(645, 'carlos@gmail', 0, '40000632506-592c33d2716ac.pdf'),
(645, 'carlos@gmail', 1, 'CERTIF_APROV_MOD_B-592c33d281498.pdf'),
(645, 'carlos@gmail', 2, 'justificacion_pedagogica_Guadajira-592c33d28f72b.pdf'),
(647, 'ana@gmail', 1, '40000632506-5944d93e64888.pdf'),
(647, 'ana@gmail', 2, 'justificacion_pedagogica_Guadajira-5944d93e69e7a.pdf'),
(647, 'ana@gmail', 3, 'Publicación1-5944d93e76d85.pdf'),
(648, 'ana@gmail', 1, '40000632506-5944d9766aee5.pdf'),
(648, 'ana@gmail', 2, 'justificacion_pedagogica_Guadajira-5944d97679178.pdf'),
(648, 'ana@gmail', 3, 'Publicación1-5944d9767f322.pdf'),
(649, 'ana@gmail', 1, '40000632506-5944d99454e34.pdf'),
(649, 'ana@gmail', 2, 'justificacion_pedagogica_Guadajira-5944d994630c7.pdf'),
(649, 'ana@gmail', 3, 'Publicación1-5944d99466f48.pdf'),
(650, 'ana@gmail', 1, '40000632506-5944d9a3e9c99.pdf'),
(650, 'ana@gmail', 2, 'justificacion_pedagogica_Guadajira-5944d9a405c2c.pdf'),
(650, 'ana@gmail', 3, 'Publicación1-5944d9a42447b.pdf'),
(653, 'ana@gmail', 1, '40000632506-5944dd3a71118.pdf'),
(653, 'ana@gmail', 2, 'justificacion_pedagogica_Guadajira-5944dd3a943a0.pdf'),
(653, 'ana@gmail', 3, 'Publicación1-5944dd3a9ef83.pdf'),
(654, 'ana@gmail', 1, 'justificacion_pedagogica_Guadajira-5946429c0f119.pdf'),
(688, 'carlos@gmail', 0, 'Publicación1-59303cf2d8120.pdf'),
(689, 'carlos@gmail', 0, 'Publicación1-59303d1760380.pdf'),
(690, 'carlos@gmail', 1, 'Publicación1-59303e244574c.pdf'),
(695, 'carlos@gmail', 1, '40000632506-59313959ad534.pdf'),
(696, 'carlos@gmail', 1, '40000632506-5931396b4a34b.pdf'),
(726, 'carlos@gmail', 1, '40000632506-59342ced74872.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios_pdf_publico`
--

CREATE TABLE `anuncios_pdf_publico` (
  `id_anuncio` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `anuncios_pdf_publico`
--

INSERT INTO `anuncios_pdf_publico` (`id_anuncio`, `numero`, `nombre`) VALUES
(123, 1, '17050225-59426f739644e.pdf'),
(124, 1, '17050225-594270ed03707.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anuncios_publico`
--

CREATE TABLE `anuncios_publico` (
  `id` int(11) NOT NULL,
  `mail` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_publicacion` date NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `anuncios_publico`
--

INSERT INTO `anuncios_publico` (`id`, `mail`, `id_categoria`, `titulo`, `descripcion`, `fecha_creacion`, `fecha_publicacion`, `visible`) VALUES
(1, 'gloria@gmail', 1, 'asdasd', 'sadsadsa', '2017-06-08 00:00:00', '2017-05-30', 1),
(2, 'gloria@gmail', 1, 'prueba portada', 'asdasd', '2017-06-14 12:48:37', '2017-06-14', 0),
(3, 'gloria@gmail', 1, 'dsfdsfds', 'dsfdsf', '2017-06-14 12:49:52', '2017-06-14', 0),
(4, 'gloria@gmail', 1, 'dsfdsfds', 'dsfdsf', '2017-06-14 12:58:06', '2017-06-14', 0),
(5, 'gloria@gmail', 1, 'dsfdsfds', 'dsfdsf', '2017-06-14 12:59:35', '2017-06-14', 0),
(6, 'gloria@gmail', 1, 'dsfdsfds', 'dsfdsf', '2017-06-14 13:00:08', '2017-06-14', 0),
(7, 'gloria@gmail', 1, 'dsfdsfds', 'dsfdsf', '2017-06-14 13:00:50', '2017-06-14', 0),
(8, 'gloria@gmail', 1, 'dsfdsfds', 'dsfdsf', '2017-06-14 13:02:17', '2017-06-14', 0),
(9, 'gloria@gmail', 1, 'dsfdsfds', 'dsfdsf', '2017-06-14 13:02:53', '2017-06-14', 0),
(10, 'gloria@gmail', 1, 'dsfdsfds', 'dsfdsf', '2017-06-14 13:03:47', '2017-06-14', 0),
(11, 'gloria@gmail', 1, 'dsfdsfds', 'dsfdsf', '2017-06-14 13:04:08', '2017-06-14', 0),
(12, 'gloria@gmail', 1, 'dsfdsfds', 'dsfdsf', '2017-06-14 13:04:13', '2017-06-14', 0),
(13, 'gloria@gmail', 1, 'prueba', 'publicacion', '2017-06-14 15:52:10', '2017-06-14', 0),
(14, 'gloria@gmail', 1, 'prueba', 'publicacion', '2017-06-14 15:52:46', '2017-06-14', 0),
(15, 'gloria@gmail', 1, 'prueba publicacion', 'dsfdsfas', '2017-06-14 15:53:45', '2017-06-14', 1),
(16, 'gloria@gmail', 1, 'prueba publicacion', 'dsfdsfas', '2017-06-14 15:54:56', '2017-06-14', 1),
(17, 'gloria@gmail', 1, 'dfgdf', 'dfg', '2017-06-14 22:40:39', '2017-06-14', 1),
(18, 'gloria@gmail', 1, 'dfgdf', 'dfg', '2017-06-14 22:41:17', '2017-06-14', 1),
(19, 'gloria@gmail', 1, 'dfgdf', 'dfg', '2017-06-14 22:42:39', '2017-06-14', 1),
(20, 'gloria@gmail', 2, 'dfgdf', 'dfg', '2017-06-14 22:44:34', '2017-06-14', 1),
(21, 'gloria@gmail', 2, 'Admisión de alumnos a ciclos formativos', 'Ya está disponible para su consulta la lista de alumnos admitidos a ciclos formativos. El plazo de presentación de solicitudes es desde hoy, miércoles14, hasta el 30 de junio”.\n\nLa lista de admitidos se puede consultar pinchando aquí.', '2017-06-15 06:53:24', '2017-06-15', 1),
(22, 'gloria@gmail', 2, 'Admisión de alumnos a ciclos formativos', 'Ya está disponible para su consulta la lista de alumnos admitidos a ciclos formativos. El plazo de presentación de solicitudes es desde hoy, miércoles14, hasta el 30 de junio”.\n\nLa lista de admitidos se puede consultar pinchando aquí.', '2017-06-15 06:53:41', '2017-06-15', 1),
(23, 'gloria@gmail', 2, 'Admisión de alumnos a ciclos formativos', 'Ya está disponible para su consulta la lista de alumnos admitidos a ciclos formativos. El plazo de presentación de solicitudes es desde hoy, miércoles14, hasta el 30 de junio”.\n\nLa lista de admitidos se puede consultar pinchando aquí.', '2017-06-15 07:13:49', '2017-06-15', 1),
(24, 'gloria@gmail', 2, 'Admisión de alumnos a ciclos formativos', 'Ya está disponible para su consulta la lista de alumnos admitidos a ciclos formativos. El plazo de presentación de solicitudes es desde hoy, miércoles14, hasta el 30 de junio”.\n\nLa lista de admitidos se puede consultar pinchando aquí.', '2017-06-15 07:14:06', '2017-06-15', 1),
(25, 'gloria@gmail', 2, 'Admisión de alumnos a ciclos formativos', 'Ya está disponible para su consulta la lista de alumnos admitidos a ciclos formativos. El plazo de presentación de solicitudes es desde hoy, miércoles14, hasta el 30 de junio”.\n\nLa lista de admitidos se puede consultar pinchando aquí.', '2017-06-15 07:22:06', '2017-06-15', 1),
(26, 'gloria@gmail', 2, 'gdfgdfg', 'dfgdfg', '2017-06-15 07:37:39', '2017-06-15', 1),
(27, 'gloria@gmail', 2, 'dsfdsf', 'dsfdsf', '2017-06-15 07:42:42', '2017-06-15', 1),
(28, 'gloria@gmail', 3, 'fdgdfg', 'dfgfdg', '2017-06-15 08:08:06', '2017-06-15', 1),
(29, 'gloria@gmail', 2, 'dsafdfs', 'dfdsf', '2017-06-15 08:09:34', '2017-06-15', 1),
(30, 'gloria@gmail', 2, 'dsafdfs', 'dfdsf', '2017-06-15 08:10:26', '2017-06-15', 1),
(31, 'gloria@gmail', 2, 'dsfds', 'dsf', '2017-06-15 08:10:55', '2017-06-15', 1),
(32, 'gloria@gmail', 2, 'fdgdfg', 'dfgdfg', '2017-06-15 08:11:35', '2017-06-15', 1),
(33, 'gloria@gmail', 2, 'dsfdsf', 'dsfds', '2017-06-15 08:31:33', '2017-06-15', 1),
(34, 'gloria@gmail', 2, 'dsfdsf', 'dsfds', '2017-06-15 08:32:25', '2017-06-15', 1),
(35, 'gloria@gmail', 2, 'dsfdsf', 'dsfds', '2017-06-15 08:40:17', '2017-06-15', 1),
(36, 'gloria@gmail', 2, 'dsfdsf', 'dsfds', '2017-06-15 08:41:58', '2017-06-15', 1),
(37, 'gloria@gmail', 2, 'dfdsf', 'dsfds', '2017-06-15 08:42:39', '2017-06-15', 1),
(38, 'gloria@gmail', 2, 'dfdsf', 'dsfds', '2017-06-15 08:42:53', '2017-06-15', 1),
(39, 'gloria@gmail', 2, 'dfdsf', 'dsfds', '2017-06-15 08:44:44', '2017-06-15', 1),
(40, 'gloria@gmail', 2, 'retret', 'retre', '2017-06-15 08:45:31', '2017-06-15', 1),
(41, 'gloria@gmail', 2, 'dsfdsf', 'dsfdsf', '2017-06-15 08:46:10', '2017-06-15', 1),
(42, 'gloria@gmail', 2, 'dsfdsf', 'dsaf', '2017-06-15 08:47:28', '2017-06-15', 1),
(43, 'gloria@gmail', 2, 'dsfdsf', 'dsaf', '2017-06-15 08:47:34', '2017-06-15', 1),
(44, 'gloria@gmail', 2, 'dfgdfg', 'dfgdf', '2017-06-15 08:49:41', '2017-06-15', 1),
(45, 'gloria@gmail', 2, 'retre', 'regreg', '2017-06-15 08:53:04', '2017-06-15', 1),
(46, 'gloria@gmail', 3, 'hgjhg', 'hgjhgj', '2017-06-15 08:54:26', '2017-06-15', 1),
(47, 'gloria@gmail', 2, 'gfhgfh', 'gfhgfh', '2017-06-15 08:55:32', '2017-06-15', 1),
(48, 'gloria@gmail', 2, 'sdfdsaf', 'dsfdsf', '2017-06-15 09:03:26', '2017-06-15', 1),
(49, 'gloria@gmail', 2, 'sdfdsaf', 'dsfdsf', '2017-06-15 09:03:36', '2017-06-15', 1),
(50, 'gloria@gmail', 1, 'dsfdsf', 'dsfdsf', '2017-06-15 09:05:38', '2017-06-15', 1),
(51, 'gloria@gmail', 2, 'dfgdfg', 'fdgdf', '2017-06-15 09:26:03', '2017-06-15', 1),
(52, 'gloria@gmail', 2, 'gfhgf', 'gfhgf', '2017-06-15 09:26:33', '2017-06-15', 1),
(53, 'gloria@gmail', 2, 'dsfdsf', 'dsfds', '2017-06-15 09:32:36', '2017-06-15', 1),
(54, 'gloria@gmail', 2, 'fdgdf', 'dfg', '2017-06-15 09:35:57', '2017-06-15', 1),
(55, 'gloria@gmail', 2, 'fdgdfg', 'dfgdf', '2017-06-15 09:36:36', '2017-06-15', 1),
(56, 'gloria@gmail', 2, 'dsf', 'dsfdsf', '2017-06-15 09:40:24', '2017-06-15', 1),
(57, 'gloria@gmail', 2, 'dsf', 'dsfdsf', '2017-06-15 09:40:38', '2017-06-15', 1),
(58, 'gloria@gmail', 2, 'fdgdf', 'dfgdfg', '2017-06-15 09:42:26', '2017-06-15', 1),
(59, 'gloria@gmail', 1, 'zxc', 'zxczxc', '2017-06-15 09:44:47', '2017-06-15', 1),
(60, 'gloria@gmail', 1, 'fdsfds', 'fdsfadsa', '2017-06-15 09:45:34', '2017-06-15', 1),
(61, 'gloria@gmail', 1, 'asdasd', 'sadasd', '2017-06-15 09:47:10', '2017-06-15', 1),
(62, 'gloria@gmail', 2, 'dsfds', 'dsf', '2017-06-15 09:51:20', '2017-06-15', 1),
(63, 'gloria@gmail', 2, 'dfgdf', 'dfgdfg', '2017-06-15 09:52:19', '2017-06-15', 1),
(64, 'gloria@gmail', 1, 'dfgdf', 'dgfgdf', '2017-06-15 09:53:50', '2017-06-15', 1),
(65, 'gloria@gmail', 1, 'dsfdsf', 'dsfdsf', '2017-06-15 09:56:31', '2017-06-15', 1),
(66, 'gloria@gmail', 2, 'dsfds', 'dsff', '2017-06-15 09:58:32', '2017-06-15', 1),
(67, 'gloria@gmail', 3, 'sdfsd', 'fdsaf', '2017-06-15 09:59:25', '2017-06-15', 1),
(68, 'gloria@gmail', 2, 'sdfds', 'fdsf', '2017-06-15 10:01:47', '2017-06-15', 1),
(69, 'gloria@gmail', 2, 'dfgdfg', 'dfgdfg', '2017-06-15 10:02:45', '2017-06-15', 1),
(70, 'gloria@gmail', 1, 'ewrwe', 'werwe', '2017-06-15 10:04:08', '2017-06-15', 1),
(71, 'gloria@gmail', 2, 'dsfds', 'fdsf', '2017-06-15 10:05:27', '2017-06-15', 1),
(72, 'gloria@gmail', 2, 'cxvcx', 'vxcv', '2017-06-15 10:06:56', '2017-06-15', 1),
(73, 'gloria@gmail', 2, 'cxvcx', 'vxcv', '2017-06-15 10:07:18', '2017-06-15', 1),
(74, 'gloria@gmail', 1, 'zxczx', 'czxc', '2017-06-15 10:07:31', '2017-06-15', 1),
(75, 'gloria@gmail', 2, 'dgffd', 'dfgdf', '2017-06-15 10:08:53', '2017-06-15', 1),
(76, 'gloria@gmail', 2, 'fdsfds', 'sdfds', '2017-06-15 10:10:02', '2017-06-15', 1),
(77, 'gloria@gmail', 2, 'dsfds', 'dsfds', '2017-06-15 10:11:08', '2017-06-15', 1),
(78, 'gloria@gmail', 2, 'sadas', 'asdas', '2017-06-15 10:11:39', '2017-06-15', 1),
(79, 'gloria@gmail', 2, 'dsfds', 'fdsaf', '2017-06-15 10:13:28', '2017-06-15', 1),
(80, 'gloria@gmail', 2, 'dsfdsf', 'dsfds', '2017-06-15 10:14:06', '2017-06-15', 1),
(81, 'gloria@gmail', 2, 'gfhgf', 'gfhgf', '2017-06-15 10:14:32', '2017-06-15', 1),
(82, 'gloria@gmail', 2, 'dsfds', 'dsfa', '2017-06-15 10:15:54', '2017-06-15', 1),
(83, 'gloria@gmail', 2, 'dsfds', 'dsfa', '2017-06-15 10:17:32', '2017-06-15', 1),
(84, 'gloria@gmail', 2, 'dsfds', 'dsfa', '2017-06-15 10:17:58', '2017-06-15', 1),
(85, 'gloria@gmail', 2, 'dsfds', 'dsfa', '2017-06-15 10:18:44', '2017-06-15', 1),
(86, 'gloria@gmail', 2, 'dsfds', 'dsfa', '2017-06-15 10:19:50', '2017-06-15', 1),
(87, 'gloria@gmail', 2, 'dsfds', 'dsfa', '2017-06-15 10:20:26', '2017-06-15', 1),
(88, 'gloria@gmail', 2, 'ret', 'retre', '2017-06-15 10:22:38', '2017-06-15', 1),
(89, 'gloria@gmail', 2, 'dsfds', 'dsfds', '2017-06-15 10:47:01', '2017-06-15', 1),
(90, 'gloria@gmail', 2, 'dsfds', 'dsfds', '2017-06-15 10:47:28', '2017-06-15', 1),
(91, 'gloria@gmail', 2, 'dsfds', 'dsfds', '2017-06-15 10:50:52', '2017-06-15', 1),
(92, 'gloria@gmail', 2, 'dsfds', 'dsfds', '2017-06-15 10:51:26', '2017-06-15', 1),
(93, 'gloria@gmail', 2, 'dsfds', 'dsfds', '2017-06-15 10:52:14', '2017-06-15', 1),
(94, 'gloria@gmail', 2, 'dsfds', 'dsfds', '2017-06-15 10:54:20', '2017-06-15', 1),
(95, 'gloria@gmail', 2, 'dsfds', 'dsfds', '2017-06-15 10:54:44', '2017-06-15', 1),
(96, 'gloria@gmail', 2, 'dsfds', 'dsfds', '2017-06-15 10:56:57', '2017-06-15', 1),
(97, 'gloria@gmail', 2, 'dsfds', 'dsfds', '2017-06-15 10:57:15', '2017-06-15', 1),
(98, 'gloria@gmail', 2, 'dsfds', 'dsfds', '2017-06-15 10:57:33', '2017-06-15', 1),
(99, 'gloria@gmail', 2, 'dsfds', 'dsfds', '2017-06-15 10:57:59', '2017-06-15', 1),
(100, 'gloria@gmail', 2, 'dsfds', 'dsfds', '2017-06-15 10:58:25', '2017-06-15', 1),
(101, 'gloria@gmail', 2, 'dsfds', 'dsfds', '2017-06-15 10:58:34', '2017-06-15', 1),
(102, 'gloria@gmail', 1, 'dsfdsf', 'dsfdsf', '2017-06-15 11:35:04', '2017-06-15', 1),
(103, 'gloria@gmail', 2, 'gfhgf', 'hgfhgf', '2017-06-15 11:35:36', '2017-06-15', 1),
(104, 'gloria@gmail', 1, 'dsfds', 'fdsf', '2017-06-15 11:40:31', '2017-06-15', 1),
(105, 'gloria@gmail', 1, 'dsfds', 'fdsf', '2017-06-15 11:40:51', '2017-06-15', 1),
(106, 'gloria@gmail', 1, 'dsfds', 'fdsf', '2017-06-15 11:41:01', '2017-06-15', 1),
(107, 'gloria@gmail', 2, 'dsfdsf', 'dsfdsf', '2017-06-15 11:42:19', '2017-06-15', 1),
(108, 'gloria@gmail', 2, 'dsfdsf', 'dsfdsf', '2017-06-15 11:42:37', '2017-06-15', 1),
(109, 'gloria@gmail', 2, 'dsfdsf', 'dsfdsf', '2017-06-15 13:04:11', '2017-06-15', 1),
(110, 'gloria@gmail', 2, 'dsfds', 'dsfds', '2017-06-15 13:06:55', '2017-06-15', 1),
(111, 'gloria@gmail', 2, 'dsfds', 'dsfds', '2017-06-15 13:08:26', '2017-06-15', 1),
(112, 'gloria@gmail', 2, 'dsfds', 'dsfds', '2017-06-15 13:11:03', '2017-06-15', 1),
(113, 'gloria@gmail', 2, 'dfgfd', 'dfg', '2017-06-15 13:11:21', '2017-06-15', 1),
(114, 'gloria@gmail', 2, 'dfgfd', 'dfg', '2017-06-15 13:15:20', '2017-06-15', 1),
(115, 'gloria@gmail', 2, 'dfgfd', 'dfg', '2017-06-15 13:19:02', '2017-06-15', 1),
(116, 'gloria@gmail', 2, 'asdas', 'dasd', '2017-06-15 13:19:24', '2017-06-15', 1),
(117, 'gloria@gmail', 2, 'asdas', 'dasd', '2017-06-15 13:19:56', '2017-06-15', 1),
(118, 'gloria@gmail', 2, 'asdas', 'dasd', '2017-06-15 13:20:30', '2017-06-15', 1),
(119, 'gloria@gmail', 2, 'asdas', 'dasd', '2017-06-15 13:21:30', '2017-06-15', 1),
(120, 'gloria@gmail', 2, 'asdas', 'dasd', '2017-06-15 13:23:01', '2017-06-15', 1),
(121, 'gloria@gmail', 2, 'asdas', 'dasd', '2017-06-15 13:26:13', '2017-06-15', 1),
(122, 'gloria@gmail', 2, 'asdas', 'dasd', '2017-06-15 13:26:38', '2017-06-15', 1),
(123, 'gloria@gmail', 2, 'asdas', 'dasd', '2017-06-15 13:28:50', '2017-06-15', 1),
(124, 'gloria@gmail', 2, 'asdas', 'dasd', '2017-06-15 13:35:07', '2017-06-15', 1),
(125, 'gloria@gmail', 1, 'lourdes', 'asdasd', '2017-06-16 21:54:22', '2017-06-16', 1),
(126, 'gloria@gmail', 1, 'fgdfg', 'dfgfd', '2017-06-18 18:54:23', '2017-06-18', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autorizaciones_alumnos`
--

CREATE TABLE `autorizaciones_alumnos` (
  `id_anuncio` int(11) NOT NULL,
  `mail_alumno` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `mail_profesor` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_autorizacion` datetime NOT NULL,
  `autorizado` tinyint(1) NOT NULL,
  `revisado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `autorizaciones_alumnos`
--

INSERT INTO `autorizaciones_alumnos` (`id_anuncio`, `mail_alumno`, `mail_profesor`, `fecha_autorizacion`, `autorizado`, `revisado`) VALUES
(25, 'paco@gmail', 'carlos@gmail', '2017-06-08 00:00:00', 0, 0),
(26, 'maria@gmail', 'carlos@gmail', '2017-06-09 00:00:00', 0, 0),
(26, 'paco@gmail', 'carlos@gmail', '2017-06-09 00:00:00', 0, 0),
(26, 'peter@gmail', 'carlos@gmail', '2017-06-09 00:00:00', 0, 0),
(35, 'peter@gmail', 'carlos@gmail', '2017-06-10 00:00:00', 0, 0),
(635, 'ana@gmail', 'carlos@gmail', '2017-06-10 00:00:00', 0, 0);

--
-- Disparadores `autorizaciones_alumnos`
--
DELIMITER $$
CREATE TRIGGER `actualizar_anuncio_alumnos` AFTER INSERT ON `autorizaciones_alumnos` FOR EACH ROW UPDATE anuncios SET
            autorizado = 1           
        WHERE
           id = new.id_anuncio AND mail=new.mail_alumno
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `vista` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `vista`) VALUES
(1, 'curso', 'alumnos,profesores'),
(2, 'materia', 'alumnos,profesores'),
(3, 'departamento', 'profesores'),
(4, 'todos los departamentos', 'profesores'),
(5, 'curso profesores', 'profesores'),
(6, 'profesores', 'profesores'),
(7, 'cursos', 'administrativos'),
(8, 'grupos', 'administrativos'),
(9, 'departamentos', 'administrativos'),
(10, 'instituto', 'todos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias_publicas`
--

CREATE TABLE `categorias_publicas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categorias_publicas`
--

INSERT INTO `categorias_publicas` (`id`, `nombre`) VALUES
(1, 'Portada'),
(2, 'Admisión'),
(3, 'Matricula');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clasificacion`
--

CREATE TABLE `clasificacion` (
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_curso` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `jornada` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clasificacion`
--

INSERT INTO `clasificacion` (`nombre`, `tipo_curso`, `jornada`) VALUES
('curso', 'dam1', 'am'),
('curso', 'dam1', 'jornada pm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `codigo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cod_grupo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`codigo`, `cod_grupo`, `nombre`) VALUES
('1DAM', 'DAM', 'Primero de DAM'),
('1DAW', 'DAW', '1 Primero de DAW'),
('1ESO', 'ESO', 'Primero ESO'),
('2DAM', 'DAM', 'Segundo de DAM'),
('2DAW', 'DAW', '2 Segundo de DAW');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `codigo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`codigo`, `nombre`) VALUES
('BIO', 'Biologia'),
('FisyQuim', 'Fisica y Quimica'),
('FOL', 'Formación y Orientación Laboral'),
('TECNO', 'Tecnología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `filtro_categoria`
--

CREATE TABLE `filtro_categoria` (
  `id_anuncio` int(11) NOT NULL,
  `mail_usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `num_subanuncios` int(11) NOT NULL,
  `nombre_subcategoria` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `filtro_categoria`
--

INSERT INTO `filtro_categoria` (`id_anuncio`, `mail_usuario`, `id_categoria`, `num_subanuncios`, `nombre_subcategoria`) VALUES
(1, 'julia@gmail', 3, 1, 'Biologia'),
(2, 'julia@gmail', 3, 2, 'Tecnología'),
(8, 'carlos@gmail', 4, 1, 'Formación y Orientación Laboral'),
(8, 'carlos@gmail', 4, 2, 'Biologia'),
(8, 'gloria@gmail', 8, 1, 'DAM'),
(8, 'gloria@gmail', 8, 2, 'DAW'),
(8, 'gloria@gmail', 8, 3, 'ESO'),
(9, 'gloria@gmail', 7, 1, '1DAM'),
(10, 'gloria@gmail', 9, 1, 'Fisica y Quimica'),
(10, 'marcos@gmail', 4, 1, 'Formación y Orientación Laboral'),
(11, 'gloria@gmail', 7, 1, '1DAM'),
(11, 'gloria@gmail', 7, 2, '2DAM'),
(11, 'gloria@gmail', 7, 3, '1DAW'),
(11, 'gloria@gmail', 7, 4, '2DAW'),
(11, 'gloria@gmail', 7, 5, '1ESO'),
(23, 'felipe@gmail', 7, 1, 'vespertino'),
(25, 'marcos@gmail', 6, 1, 'Mañana'),
(25, 'mateo@gmail', 6, 1, 'Vespertino'),
(25, 'paco@gmail', 1, 1, '1DAM'),
(26, 'julia@gmail', 2, 1, 'Biologia'),
(26, 'marcos@gmail', 2, 1, 'Formación y Orientación Laboral'),
(26, 'maria@gmail', 2, 1, 'Biologia'),
(26, 'paco@gmail', 2, 1, 'Bases de Datos'),
(26, 'peter@gmail', 2, 1, 'Bases de Datos'),
(35, 'peter@gmail', 7, 1, 'Mañana'),
(616, 'peter@gmail', 1, 1, '1DAM'),
(625, 'ana@gmail', 1, 1, '.AlumnosController::_getCursoAlumno(Session::get(M'),
(627, 'ana@gmail', 1, 1, '1DAM'),
(631, 'ana@gmail', 1, 1, '1DAM'),
(635, 'ana@gmail', 7, 1, 'Mañana'),
(635, 'ana@gmail', 7, 2, 'Vespertino'),
(646, 'ana@gmail', 2, 1, 'Bases de Datos'),
(646, 'ana@gmail', 2, 2, 'Entornos de Desarrollo'),
(646, 'ana@gmail', 2, 3, 'Formación y Orientación Laboral'),
(646, 'ana@gmail', 2, 4, 'Lenguajes de Marcas y Sistemas de Gestión de Información'),
(646, 'ana@gmail', 2, 5, 'Programación'),
(646, 'ana@gmail', 2, 6, 'Sistemas informáticos'),
(647, 'ana@gmail', 1, 1, '1DAM'),
(648, 'ana@gmail', 2, 1, 'Bases de Datos'),
(648, 'ana@gmail', 2, 2, 'Entornos de Desarrollo'),
(648, 'ana@gmail', 2, 3, 'Formación y Orientación Laboral'),
(648, 'ana@gmail', 2, 4, 'Lenguajes de Marcas y Sistemas de Gestión de Información'),
(648, 'ana@gmail', 2, 5, 'Programación'),
(648, 'ana@gmail', 2, 6, 'Sistemas informáticos'),
(649, 'ana@gmail', 2, 1, 'Bases de Datos'),
(649, 'ana@gmail', 2, 2, 'Entornos de Desarrollo'),
(649, 'ana@gmail', 2, 3, 'Formación y Orientación Laboral'),
(649, 'ana@gmail', 2, 4, 'Lenguajes de Marcas y Sistemas de Gestión de Información'),
(649, 'ana@gmail', 2, 5, 'Programación'),
(649, 'ana@gmail', 2, 6, 'Sistemas informáticos'),
(650, 'ana@gmail', 2, 1, 'Bases de Datos'),
(650, 'ana@gmail', 2, 2, 'Entornos de Desarrollo'),
(650, 'ana@gmail', 2, 3, 'Formación y Orientación Laboral'),
(650, 'ana@gmail', 2, 4, 'Lenguajes de Marcas y Sistemas de Gestión de Información'),
(650, 'ana@gmail', 2, 5, 'Programación'),
(650, 'ana@gmail', 2, 6, 'Sistemas informáticos'),
(654, 'ana@gmail', 10, 1, 'Vespertino'),
(655, 'ana@gmail', 1, 1, '1DAM'),
(656, 'ana@gmail', 1, 1, '1DAM'),
(657, 'ana@gmail', 1, 1, '1DAM'),
(658, 'ana@gmail', 1, 1, '1DAM'),
(659, 'ana@gmail', 1, 1, '1DAM'),
(660, 'ana@gmail', 1, 1, '1DAM'),
(661, 'ana@gmail', 1, 1, '1DAM'),
(662, 'ana@gmail', 1, 1, '1DAM'),
(663, 'ana@gmail', 1, 1, '1DAM'),
(664, 'ana@gmail', 1, 1, '1DAM'),
(665, 'ana@gmail', 1, 1, '1DAM'),
(666, 'ana@gmail', 1, 1, '1DAM'),
(667, 'ana@gmail', 1, 1, '1DAM'),
(668, 'ana@gmail', 1, 1, '1DAM'),
(669, 'ana@gmail', 1, 1, '1DAM'),
(670, 'ana@gmail', 1, 1, '1DAM'),
(671, 'ana@gmail', 1, 1, '1DAM'),
(672, 'ana@gmail', 1, 1, '1DAM'),
(673, 'ana@gmail', 1, 1, '1DAM'),
(674, 'ana@gmail', 2, 1, 'Bases de Datos'),
(674, 'ana@gmail', 2, 2, 'Entornos de Desarrollo'),
(674, 'ana@gmail', 2, 3, 'Formación y Orientación Laboral'),
(674, 'ana@gmail', 2, 4, 'Lenguajes de Marcas y Sistemas de Gestión de Información'),
(674, 'ana@gmail', 2, 5, 'Programación'),
(674, 'ana@gmail', 2, 6, 'Sistemas informáticos'),
(675, 'ana@gmail', 2, 1, 'Bases de Datos'),
(675, 'ana@gmail', 2, 2, 'Entornos de Desarrollo'),
(675, 'ana@gmail', 2, 3, 'Formación y Orientación Laboral'),
(675, 'ana@gmail', 2, 4, 'Lenguajes de Marcas y Sistemas de Gestión de Información'),
(675, 'ana@gmail', 2, 5, 'Programación'),
(675, 'ana@gmail', 2, 6, 'Sistemas informáticos'),
(676, 'ana@gmail', 2, 1, 'Bases de Datos'),
(676, 'ana@gmail', 2, 2, 'Entornos de Desarrollo'),
(676, 'ana@gmail', 2, 3, 'Formación y Orientación Laboral'),
(676, 'ana@gmail', 2, 4, 'Lenguajes de Marcas y Sistemas de Gestión de Información'),
(676, 'ana@gmail', 2, 5, 'Programación'),
(676, 'ana@gmail', 2, 6, 'Sistemas informáticos'),
(677, 'ana@gmail', 2, 1, 'Bases de Datos'),
(677, 'ana@gmail', 2, 2, 'Entornos de Desarrollo'),
(677, 'ana@gmail', 2, 3, 'Formación y Orientación Laboral'),
(677, 'ana@gmail', 2, 4, 'Lenguajes de Marcas y Sistemas de Gestión de Información'),
(677, 'ana@gmail', 2, 5, 'Programación'),
(677, 'ana@gmail', 2, 6, 'Sistemas informáticos'),
(678, 'ana@gmail', 2, 1, 'Bases de Datos'),
(678, 'ana@gmail', 2, 2, 'Entornos de Desarrollo'),
(678, 'ana@gmail', 2, 3, 'Formación y Orientación Laboral'),
(678, 'ana@gmail', 2, 4, 'Lenguajes de Marcas y Sistemas de Gestión de Información'),
(678, 'ana@gmail', 2, 5, 'Programación'),
(678, 'ana@gmail', 2, 6, 'Sistemas informáticos'),
(679, 'ana@gmail', 2, 1, 'Bases de Datos'),
(679, 'ana@gmail', 2, 2, 'Entornos de Desarrollo'),
(679, 'ana@gmail', 2, 3, 'Formación y Orientación Laboral'),
(679, 'ana@gmail', 2, 4, 'Lenguajes de Marcas y Sistemas de Gestión de Información'),
(679, 'ana@gmail', 2, 5, 'Programación'),
(679, 'ana@gmail', 2, 6, 'Sistemas informáticos'),
(680, 'ana@gmail', 1, 1, '1DAM'),
(680, 'carlos@gmail', 2, 1, 'Bases de Datos'),
(680, 'carlos@gmail', 2, 2, 'Biologia'),
(680, 'carlos@gmail', 2, 3, 'PRO'),
(681, 'ana@gmail', 1, 1, '1DAM'),
(681, 'carlos@gmail', 2, 1, 'B.D'),
(681, 'carlos@gmail', 2, 2, 'BIO'),
(689, 'carlos@gmail', 2, 1, 'Bases de Datos'),
(689, 'carlos@gmail', 2, 2, 'Biologia'),
(690, 'carlos@gmail', 2, 1, 'Programación'),
(690, 'carlos@gmail', 2, 2, 'Bases de Datos'),
(693, 'carlos@gmail', 3, 1, 'Biologia'),
(693, 'carlos@gmail', 3, 2, 'Tecnología'),
(694, 'carlos@gmail', 3, 1, 'Biologia'),
(694, 'carlos@gmail', 3, 2, 'Tecnología'),
(708, 'carlos@gmail', 5, 1, '1DAM'),
(708, 'carlos@gmail', 5, 2, '1DAW'),
(708, 'carlos@gmail', 5, 3, '1ESO'),
(708, 'felipe@gmail', 5, 1, '2DAW'),
(708, 'marcos@gmail', 5, 1, '1DAM'),
(709, 'carlos@gmail', 5, 1, '1ESO'),
(721, 'carlos@gmail', 1, 1, '1DAM'),
(721, 'carlos@gmail', 1, 2, '1DAW'),
(721, 'carlos@gmail', 1, 3, '1ESO'),
(724, 'carlos@gmail', 1, 1, '1DAM'),
(724, 'carlos@gmail', 1, 2, '1DAW'),
(724, 'carlos@gmail', 1, 3, '1ESO'),
(725, 'carlos@gmail', 1, 1, '1DAM'),
(725, 'carlos@gmail', 1, 2, '1DAW'),
(725, 'carlos@gmail', 1, 3, '1ESO'),
(726, 'carlos@gmail', 1, 1, '1ESO'),
(727, 'carlos@gmail', 1, 1, '1DAM'),
(727, 'carlos@gmail', 1, 2, '1DAW'),
(727, 'carlos@gmail', 1, 3, '1ESO'),
(728, 'carlos@gmail', 2, 1, 'Bases de Datos'),
(728, 'carlos@gmail', 2, 2, 'Biologia'),
(728, 'carlos@gmail', 2, 3, 'Programación'),
(729, 'carlos@gmail', 6, 1, 'Mañana'),
(729, 'carlos@gmail', 6, 2, 'Vespertino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `filtro_jornadas`
--

CREATE TABLE `filtro_jornadas` (
  `id_anuncio` int(11) NOT NULL,
  `mail_usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cod_jornada` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `filtro_jornadas`
--

INSERT INTO `filtro_jornadas` (`id_anuncio`, `mail_usuario`, `cod_jornada`) VALUES
(1, 'gloria@gmail', 'A.M'),
(1, 'julia@gmail', 'A.M'),
(2, 'gloria@gmail', 'A.M'),
(2, 'julia@gmail', 'A.M'),
(2, 'julia@gmail', 'P.M'),
(5, 'gloria@gmail', 'A.M'),
(6, 'gloria@gmail', 'A.M'),
(7, 'gloria@gmail', 'P.M'),
(8, 'carlos@gmail', 'A.M'),
(8, 'gloria@gmail', 'A.M'),
(9, 'gloria@gmail', 'A.M'),
(10, 'gloria@gmail', 'A.M'),
(10, 'marcos@gmail', 'A.M'),
(11, 'gloria@gmail', 'A.M'),
(23, 'felipe@gmail', 'P.M'),
(25, 'marcos@gmail', 'A.M'),
(25, 'mateo@gmail', 'P.M'),
(25, 'paco@gmail', 'A.M'),
(26, 'julia@gmail', 'A.M'),
(26, 'marcos@gmail', 'A.M'),
(26, 'maria@gmail', 'A.M'),
(26, 'paco@gmail', 'A.M'),
(26, 'peter@gmail', 'P.M'),
(35, 'peter@gmail', 'P.M'),
(616, 'carlos@gmail', 'A.M'),
(616, 'peter@gmail', 'P.M'),
(618, 'ana@gmail', 'A.M'),
(619, 'ana@gmail', 'A.M'),
(620, 'ana@gmail', 'A.M'),
(621, 'ana@gmail', 'A.M'),
(622, 'ana@gmail', 'A.M'),
(623, 'ana@gmail', 'A.M'),
(625, 'ana@gmail', 'A.M'),
(626, 'ana@gmail', 'A.M'),
(627, 'ana@gmail', 'A.M'),
(630, 'ana@gmail', 'A.M'),
(631, 'ana@gmail', 'A.M'),
(635, 'ana@gmail', 'A.M'),
(643, 'ana@gmail', 'A.M'),
(644, 'ana@gmail', 'A.M'),
(645, 'ana@gmail', 'A.M'),
(646, 'ana@gmail', 'A.M'),
(647, 'ana@gmail', 'A.M'),
(648, 'ana@gmail', 'A.M'),
(649, 'ana@gmail', 'A.M'),
(650, 'ana@gmail', 'A.M'),
(653, 'ana@gmail', 'A.M'),
(654, 'ana@gmail', 'A.M'),
(655, 'ana@gmail', 'A.M'),
(656, 'ana@gmail', 'A.M'),
(657, 'ana@gmail', 'A.M'),
(658, 'ana@gmail', 'A.M'),
(659, 'ana@gmail', 'A.M'),
(660, 'ana@gmail', 'A.M'),
(661, 'ana@gmail', 'A.M'),
(662, 'ana@gmail', 'A.M'),
(663, 'ana@gmail', 'A.M'),
(664, 'ana@gmail', 'A.M'),
(665, 'ana@gmail', 'A.M'),
(666, 'ana@gmail', 'A.M'),
(667, 'ana@gmail', 'A.M'),
(668, 'ana@gmail', 'A.M'),
(669, 'ana@gmail', 'A.M'),
(670, 'ana@gmail', 'A.M'),
(671, 'ana@gmail', 'A.M'),
(672, 'ana@gmail', 'A.M'),
(673, 'ana@gmail', 'A.M'),
(674, 'ana@gmail', 'A.M'),
(675, 'ana@gmail', 'A.M'),
(676, 'ana@gmail', 'A.M'),
(677, 'ana@gmail', 'A.M'),
(678, 'ana@gmail', 'A.M'),
(679, 'ana@gmail', 'A.M'),
(680, 'ana@gmail', 'A.M'),
(680, 'carlos@gmail', 'A.M'),
(681, 'ana@gmail', 'A.M'),
(681, 'carlos@gmail', 'A.M'),
(689, 'carlos@gmail', 'A.M'),
(690, 'carlos@gmail', 'A.M'),
(693, 'carlos@gmail', 'A.M'),
(694, 'carlos@gmail', 'A.M'),
(708, 'carlos@gmail', 'A.M'),
(708, 'felipe@gmail', 'A.M'),
(708, 'marcos@gmail', 'A.M'),
(709, 'carlos@gmail', 'A.M'),
(721, 'carlos@gmail', 'A.M'),
(724, 'carlos@gmail', 'A.M'),
(724, 'carlos@gmail', 'P.M'),
(725, 'carlos@gmail', 'A.M'),
(726, 'carlos@gmail', 'A.M'),
(727, 'carlos@gmail', 'A.M'),
(728, 'carlos@gmail', 'A.M'),
(729, 'carlos@gmail', 'A.M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `codigo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`codigo`, `nombre`) VALUES
('DAM', 'Desarrollo de Aplicaciones multiplataforma'),
('DAW', 'Desarrollo de Aplicaciones Web'),
('ESO', 'Enseñanza Secundaria Obligatoria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornadas`
--

CREATE TABLE `jornadas` (
  `codigo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `jornadas`
--

INSERT INTO `jornadas` (`codigo`, `nombre`) VALUES
('A.M', 'Mañana'),
('P.M', 'Vespertino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornadas_departamentos`
--

CREATE TABLE `jornadas_departamentos` (
  `cod_jornada` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cod_departamento` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `jornadas_departamentos`
--

INSERT INTO `jornadas_departamentos` (`cod_jornada`, `cod_departamento`) VALUES
('A.M', 'BIO'),
('A.M', 'FisyQuim'),
('A.M', 'FOL'),
('A.M', 'TECNO'),
('P.M', 'FOL'),
('P.M', 'TECNO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jornada_grupos`
--

CREATE TABLE `jornada_grupos` (
  `cod_jornada` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `cod_grupo` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `jornada_grupos`
--

INSERT INTO `jornada_grupos` (`cod_jornada`, `cod_grupo`) VALUES
('A.M', 'DAM'),
('A.M', 'DAW'),
('A.M', 'ESO'),
('P.M', 'DAM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `mail` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nivel` int(11) NOT NULL,
  `contrasena` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `codigo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`mail`, `nivel`, `contrasena`, `estado`, `codigo`) VALUES
('@gmail', 6, '1d64a68ca73c591df21e5ac8d7579b9aa100b86f', 1, 0),
('ana@gmail', 2, '1d64a68ca73c591df21e5ac8d7579b9aa100b86f', 1, 0),
('carlos@gmail', 4, '1d64a68ca73c591df21e5ac8d7579b9aa100b86f', 1, 0),
('gloria@gmail', 5, '1d64a68ca73c591df21e5ac8d7579b9aa100b86f', 1, 0),
('julia@gmail', 3, '1234', 1, 0),
('marcos@gmail', 3, '1234', 1, 0),
('maria@gmail', 2, '1234', 1, 0),
('mateo@gmail', 3, '1234', 1, 0),
('peter@gmail', 2, '1234', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `codigo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`codigo`, `nombre`) VALUES
('ACC', 'Acceso a Datos'),
('B.D', 'Bases de Datos'),
('BIO', 'Biologia'),
('DIW', 'Diseño de interfaces Web'),
('E.D', 'Entornos de Desarrollo'),
('E.I,E', 'Empreasa y orientacion laboral'),
('FOL', 'Formación y Orientación Laboral'),
('L.M.S.G.I', 'Lenguajes de Marcas y Sistemas de Gestión de Información'),
('P.S.P', 'Programación de Servicios y Procesos'),
('PRO', 'Programación'),
('Sis. Info', 'Sistemas informáticos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_cursos`
--

CREATE TABLE `materias_cursos` (
  `cod_materia` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cod_curso` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `materias_cursos`
--

INSERT INTO `materias_cursos` (`cod_materia`, `cod_curso`) VALUES
('ACC', '2DAM'),
('B.D', '1DAM'),
('B.D', '1DAW'),
('BIO', '1ESO'),
('DIW', '2DAW'),
('E.D', '1DAM'),
('FOL', '1DAM'),
('FOL', '1DAW'),
('L.M.S.G.I', '1DAM'),
('PRO', '1DAM'),
('PRO', '1DAW'),
('Sis. Info', '1DAM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias_profesores`
--

CREATE TABLE `materias_profesores` (
  `cod_materia` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `mail_profesor` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `materias_profesores`
--

INSERT INTO `materias_profesores` (`cod_materia`, `mail_profesor`) VALUES
('ACC', 'felipe@gmail'),
('B.D', 'carlos@gmail'),
('B.D', 'mateo@gmail'),
('BIO', 'carlos@gmail'),
('DIW', 'felipe@gmail'),
('E.D', 'julia@gmail'),
('FOL', 'marcos@gmail'),
('PRO', 'carlos@gmail');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `id` int(11) NOT NULL,
  `tipo` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`id`, `tipo`) VALUES
(6, 'admin'),
(5, 'administrativos'),
(2, 'alumnos'),
(3, 'profesores'),
(4, 'profesores_validadores'),
(1, 'publico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

CREATE TABLE `profesores` (
  `mail` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cod_jornada` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`mail`, `cod_jornada`) VALUES
('carlos@gmail', 'A.M'),
('felipe@gmail', 'A.M'),
('julia@gmail', 'A.M'),
('marcos@gmail', 'A.M'),
('mateo@gmail', 'P.M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores_departamento`
--

CREATE TABLE `profesores_departamento` (
  `mail_profesor` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `cod_departamento` varchar(10) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `profesores_departamento`
--

INSERT INTO `profesores_departamento` (`mail_profesor`, `cod_departamento`) VALUES
('carlos@gmail', 'BIO'),
('carlos@gmail', 'TECNO'),
('felipe@gmail', 'TECNO'),
('julia@gmail', 'TECNO'),
('marcos@gmail', 'FOL'),
('mateo@gmail', 'TECNO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE `publicaciones` (
  `id_anuncio` int(11) NOT NULL,
  `mail_usuario` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_publicacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id_anuncio`, `mail_usuario`, `fecha_publicacion`) VALUES
(1, 'julia@gmail', '2017-06-02'),
(2, 'julia@gmail', '2017-06-02'),
(8, 'carlos@gmail', '2017-06-05'),
(10, 'marcos@gmail', '2017-06-05'),
(11, 'gloria@gmail', '2017-06-19'),
(23, 'felipe@gmail', '2017-06-10'),
(25, 'marcos@gmail', '2017-06-12'),
(25, 'mateo@gmail', '2017-06-12'),
(25, 'paco@gmail', '2017-06-08'),
(26, 'julia@gmail', '2017-06-09'),
(26, 'marcos@gmail', '2017-06-09'),
(26, 'maria@gmail', '2017-06-09'),
(26, 'paco@gmail', '2017-06-09'),
(26, 'peter@gmail', '2017-06-09'),
(35, 'peter@gmail', '2017-06-10'),
(616, 'carlos@gmail', '2017-05-19'),
(616, 'maria@gmail', '2017-05-23'),
(616, 'peter@gmail', '2017-05-19'),
(635, 'ana@gmail', '2017-06-10'),
(651, 'carlos@gmail', '2017-05-30'),
(680, 'carlos@gmail', '2017-05-30'),
(681, 'carlos@gmail', '2017-06-01'),
(682, 'carlos@gmail', '2017-06-01'),
(683, 'carlos@gmail', '2017-06-01'),
(684, 'carlos@gmail', '2017-06-01'),
(685, 'carlos@gmail', '2017-06-01'),
(686, 'carlos@gmail', '2017-06-01'),
(687, 'carlos@gmail', '2017-06-01'),
(688, 'carlos@gmail', '2017-06-01'),
(689, 'carlos@gmail', '2017-06-01'),
(690, 'carlos@gmail', '2017-06-01'),
(691, 'carlos@gmail', '2017-06-01'),
(692, 'carlos@gmail', '2017-06-02'),
(693, 'carlos@gmail', '2017-06-02'),
(694, 'carlos@gmail', '2017-06-02'),
(695, 'carlos@gmail', '2017-06-02'),
(696, 'carlos@gmail', '2017-06-02'),
(696, 'julia@gmail', '2017-06-02'),
(697, 'carlos@gmail', '2017-06-02'),
(698, 'carlos@gmail', '2017-06-02'),
(699, 'carlos@gmail', '2017-06-02'),
(700, 'carlos@gmail', '2017-06-02'),
(701, 'carlos@gmail', '2017-06-02'),
(702, 'carlos@gmail', '2017-06-02'),
(703, 'carlos@gmail', '2017-06-02'),
(704, 'carlos@gmail', '2017-06-02'),
(705, 'carlos@gmail', '2017-06-02'),
(706, 'carlos@gmail', '2017-06-02'),
(707, 'carlos@gmail', '2017-06-03'),
(708, 'carlos@gmail', '2017-06-03'),
(708, 'felipe@gmail', '2017-06-03'),
(708, 'marcos@gmail', '2017-06-03'),
(709, 'carlos@gmail', '2017-06-03'),
(710, 'carlos@gmail', '2017-06-03'),
(711, 'carlos@gmail', '2017-06-04'),
(712, 'carlos@gmail', '2017-06-04'),
(713, 'carlos@gmail', '2017-06-04'),
(714, 'carlos@gmail', '2017-06-04'),
(716, 'carlos@gmail', '2017-06-04'),
(717, 'carlos@gmail', '2017-06-04'),
(721, 'carlos@gmail', '2017-06-04'),
(724, 'carlos@gmail', '2017-06-04'),
(725, 'carlos@gmail', '2017-06-04'),
(726, 'carlos@gmail', '2017-06-04'),
(727, 'carlos@gmail', '2017-06-05'),
(728, 'carlos@gmail', '2017-06-09'),
(729, 'carlos@gmail', '2017-06-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones_publico`
--

CREATE TABLE `publicaciones_publico` (
  `id_anuncio` int(11) NOT NULL,
  `fecha_publicacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `publicaciones_publico`
--

INSERT INTO `publicaciones_publico` (`id_anuncio`, `fecha_publicacion`) VALUES
(1, '2017-06-08'),
(16, '2017-06-14'),
(19, '2017-06-14'),
(20, '2017-06-14'),
(21, '2017-06-15'),
(22, '2017-06-15'),
(23, '2017-06-15'),
(24, '2017-06-15'),
(25, '2017-06-15'),
(26, '2017-06-15'),
(27, '2017-06-15'),
(28, '2017-06-15'),
(29, '2017-06-15'),
(30, '2017-06-15'),
(31, '2017-06-15'),
(32, '2017-06-15'),
(33, '2017-06-15'),
(34, '2017-06-15'),
(35, '2017-06-15'),
(36, '2017-06-15'),
(37, '2017-06-15'),
(38, '2017-06-15'),
(39, '2017-06-15'),
(40, '2017-06-15'),
(41, '2017-06-15'),
(42, '2017-06-15'),
(43, '2017-06-15'),
(44, '2017-06-15'),
(45, '2017-06-15'),
(46, '2017-06-15'),
(47, '2017-06-15'),
(48, '2017-06-15'),
(49, '2017-06-15'),
(50, '2017-06-15'),
(51, '2017-06-15'),
(52, '2017-06-15'),
(53, '2017-06-15'),
(54, '2017-06-15'),
(55, '2017-06-15'),
(56, '2017-06-15'),
(57, '2017-06-15'),
(58, '2017-06-15'),
(59, '2017-06-15'),
(60, '2017-06-15'),
(61, '2017-06-15'),
(62, '2017-06-15'),
(63, '2017-06-15'),
(64, '2017-06-15'),
(65, '2017-06-15'),
(66, '2017-06-15'),
(67, '2017-06-15'),
(68, '2017-06-15'),
(69, '2017-06-15'),
(70, '2017-06-15'),
(71, '2017-06-15'),
(72, '2017-06-15'),
(73, '2017-06-15'),
(74, '2017-06-15'),
(75, '2017-06-15'),
(76, '2017-06-15'),
(77, '2017-06-15'),
(78, '2017-06-15'),
(79, '2017-06-15'),
(80, '2017-06-15'),
(81, '2017-06-15'),
(82, '2017-06-15'),
(83, '2017-06-15'),
(84, '2017-06-15'),
(85, '2017-06-15'),
(86, '2017-06-15'),
(87, '2017-06-15'),
(88, '2017-06-15'),
(89, '2017-06-15'),
(90, '2017-06-15'),
(91, '2017-06-15'),
(92, '2017-06-15'),
(93, '2017-06-15'),
(94, '2017-06-15'),
(95, '2017-06-15'),
(96, '2017-06-15'),
(97, '2017-06-15'),
(98, '2017-06-15'),
(99, '2017-06-15'),
(100, '2017-06-15'),
(101, '2017-06-15'),
(102, '2017-06-15'),
(103, '2017-06-15'),
(104, '2017-06-15'),
(105, '2017-06-15'),
(106, '2017-06-15'),
(107, '2017-06-15'),
(108, '2017-06-15'),
(109, '2017-06-15'),
(110, '2017-06-15'),
(111, '2017-06-15'),
(112, '2017-06-15'),
(113, '2017-06-15'),
(114, '2017-06-15'),
(115, '2017-06-15'),
(116, '2017-06-15'),
(117, '2017-06-15'),
(118, '2017-06-15'),
(119, '2017-06-15'),
(120, '2017-06-15'),
(121, '2017-06-15'),
(122, '2017-06-15'),
(123, '2017-06-15'),
(124, '2017-06-15'),
(125, '2017-06-16'),
(126, '2017-06-18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `mail` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `nivel` int(11) NOT NULL,
  `identificacion` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `primer_apellido` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `segundo_apellido` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`mail`, `nivel`, `identificacion`, `nombre`, `primer_apellido`, `segundo_apellido`) VALUES
('@gmail', 6, '1234', 'admin', 'admin', 'admin'),
('ana@gmail', 2, '888888', 'ana maria', 'canseco', 'puerta'),
('carlos@gmail', 4, '11111111', 'carlos', 'arestegui', 'ramos'),
('caroli', 2, '9999999', 'dsfdsf', 'dsafads', 'dsf'),
('felipe@gmail', 3, '534564564', 'felipe', 'albarran', 'vargas'),
('gloria@gmail', 5, '546546568', 'Gloria ', 'martinez', 'ruiz'),
('john@gmail', 2, '9772647', 'john', 'edwar', 'arias'),
('julia@gmail', 3, '25153455', 'julia', 'fernandez', 'adam'),
('marcos@gmail', 3, '45646456', 'marcos', 'Jimenez ', 'Rios'),
('maria@gmail', 2, '454546544', 'maria', 'rodriguez', 'vazquez'),
('mateo@gmail', 3, '5646456', 'mateo', 'gonzalez', 'manrique'),
('paco@gmail', 2, '1546555', 'francisco', 'pernicas', 'ruiz'),
('peter@gmail', 2, '888888', 'roy', 'van', 'pels'),
('sandra', 2, '999999', 'dsafdsa', 'dsfdsf', 'dsfads');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso_categorias`
--
ALTER TABLE `acceso_categorias`
  ADD PRIMARY KEY (`id_nivel`,`id_categoria`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `administrativos`
--
ALTER TABLE `administrativos`
  ADD PRIMARY KEY (`mail`);

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`mail`),
  ADD KEY `cod_curso` (`cod_curso`),
  ADD KEY `cod_jornada` (`cod_jornada`);

--
-- Indices de la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD PRIMARY KEY (`id`,`mail`),
  ADD KEY `mail` (`mail`);

--
-- Indices de la tabla `anuncios_imagenes`
--
ALTER TABLE `anuncios_imagenes`
  ADD PRIMARY KEY (`id_anuncio`,`mail_usuario`,`numero`);

--
-- Indices de la tabla `anuncios_imagenes_publico`
--
ALTER TABLE `anuncios_imagenes_publico`
  ADD PRIMARY KEY (`id_anuncio`);

--
-- Indices de la tabla `anuncios_pdf`
--
ALTER TABLE `anuncios_pdf`
  ADD PRIMARY KEY (`id_anuncio`,`mail_usuario`,`numero`);

--
-- Indices de la tabla `anuncios_pdf_publico`
--
ALTER TABLE `anuncios_pdf_publico`
  ADD PRIMARY KEY (`id_anuncio`);

--
-- Indices de la tabla `anuncios_publico`
--
ALTER TABLE `anuncios_publico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mail` (`mail`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `autorizaciones_alumnos`
--
ALTER TABLE `autorizaciones_alumnos`
  ADD PRIMARY KEY (`id_anuncio`,`mail_alumno`),
  ADD KEY `mail_profesor` (`mail_profesor`) USING BTREE;

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias_publicas`
--
ALTER TABLE `categorias_publicas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `cod_grupo` (`cod_grupo`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `filtro_categoria`
--
ALTER TABLE `filtro_categoria`
  ADD PRIMARY KEY (`id_anuncio`,`mail_usuario`,`id_categoria`,`num_subanuncios`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `filtro_jornadas`
--
ALTER TABLE `filtro_jornadas`
  ADD PRIMARY KEY (`id_anuncio`,`mail_usuario`,`cod_jornada`),
  ADD KEY `id_jornada` (`cod_jornada`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `jornadas`
--
ALTER TABLE `jornadas`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `jornadas_departamentos`
--
ALTER TABLE `jornadas_departamentos`
  ADD PRIMARY KEY (`cod_jornada`,`cod_departamento`),
  ADD KEY `cod_departamento` (`cod_departamento`);

--
-- Indices de la tabla `jornada_grupos`
--
ALTER TABLE `jornada_grupos`
  ADD PRIMARY KEY (`cod_jornada`,`cod_grupo`),
  ADD KEY `cod_grupo` (`cod_grupo`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`mail`),
  ADD KEY `nivel` (`nivel`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `materias_cursos`
--
ALTER TABLE `materias_cursos`
  ADD PRIMARY KEY (`cod_materia`,`cod_curso`),
  ADD KEY `cod_curso` (`cod_curso`);

--
-- Indices de la tabla `materias_profesores`
--
ALTER TABLE `materias_profesores`
  ADD PRIMARY KEY (`cod_materia`,`mail_profesor`),
  ADD KEY `mail_profesor` (`mail_profesor`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo` (`tipo`) USING BTREE;

--
-- Indices de la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD PRIMARY KEY (`mail`,`cod_jornada`),
  ADD KEY `id_jornada` (`cod_jornada`) USING BTREE;

--
-- Indices de la tabla `profesores_departamento`
--
ALTER TABLE `profesores_departamento`
  ADD PRIMARY KEY (`mail_profesor`,`cod_departamento`),
  ADD KEY `cod_departamento` (`cod_departamento`);

--
-- Indices de la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`id_anuncio`,`mail_usuario`);

--
-- Indices de la tabla `publicaciones_publico`
--
ALTER TABLE `publicaciones_publico`
  ADD PRIMARY KEY (`id_anuncio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`mail`,`nivel`),
  ADD KEY `nivel` (`nivel`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anuncios_publico`
--
ALTER TABLE `anuncios_publico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `categorias_publicas`
--
ALTER TABLE `categorias_publicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acceso_categorias`
--
ALTER TABLE `acceso_categorias`
  ADD CONSTRAINT `acceso_categorias_ibfk_1` FOREIGN KEY (`id_nivel`) REFERENCES `nivel` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `acceso_categorias_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `administrativos`
--
ALTER TABLE `administrativos`
  ADD CONSTRAINT `administrativos_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `usuarios` (`mail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `usuarios` (`mail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumnos_ibfk_2` FOREIGN KEY (`cod_curso`) REFERENCES `cursos` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alumnos_ibfk_3` FOREIGN KEY (`cod_jornada`) REFERENCES `jornadas` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `anuncios`
--
ALTER TABLE `anuncios`
  ADD CONSTRAINT `anuncios_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `usuarios` (`mail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `anuncios_imagenes`
--
ALTER TABLE `anuncios_imagenes`
  ADD CONSTRAINT `anuncios_imagenes_ibfk_1` FOREIGN KEY (`id_anuncio`,`mail_usuario`) REFERENCES `anuncios` (`id`, `mail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `anuncios_imagenes_publico`
--
ALTER TABLE `anuncios_imagenes_publico`
  ADD CONSTRAINT `anuncios_imagenes_publico_ibfk_1` FOREIGN KEY (`id_anuncio`) REFERENCES `anuncios_publico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `anuncios_pdf`
--
ALTER TABLE `anuncios_pdf`
  ADD CONSTRAINT `anuncios_pdf_ibfk_1` FOREIGN KEY (`id_anuncio`,`mail_usuario`) REFERENCES `anuncios` (`id`, `mail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `anuncios_pdf_publico`
--
ALTER TABLE `anuncios_pdf_publico`
  ADD CONSTRAINT `anuncios_pdf_publico_ibfk_1` FOREIGN KEY (`id_anuncio`) REFERENCES `anuncios_publico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `anuncios_publico`
--
ALTER TABLE `anuncios_publico`
  ADD CONSTRAINT `anuncios_publico_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `administrativos` (`mail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `anuncios_publico_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias_publicas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `autorizaciones_alumnos`
--
ALTER TABLE `autorizaciones_alumnos`
  ADD CONSTRAINT `autorizaciones_alumnos_ibfk_1` FOREIGN KEY (`id_anuncio`,`mail_alumno`) REFERENCES `anuncios` (`id`, `mail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `autorizaciones_alumnos_ibfk_2` FOREIGN KEY (`mail_profesor`) REFERENCES `profesores` (`mail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `autorizaciones_alumnos_ibfk_3` FOREIGN KEY (`mail_profesor`) REFERENCES `profesores` (`mail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `cursos_ibfk_1` FOREIGN KEY (`cod_grupo`) REFERENCES `grupos` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `filtro_categoria`
--
ALTER TABLE `filtro_categoria`
  ADD CONSTRAINT `filtro_categoria_ibfk_1` FOREIGN KEY (`id_anuncio`,`mail_usuario`) REFERENCES `anuncios` (`id`, `mail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `filtro_categoria_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `filtro_jornadas`
--
ALTER TABLE `filtro_jornadas`
  ADD CONSTRAINT `filtro_jornadas_ibfk_1` FOREIGN KEY (`id_anuncio`,`mail_usuario`) REFERENCES `anuncios` (`id`, `mail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `filtro_jornadas_ibfk_2` FOREIGN KEY (`cod_jornada`) REFERENCES `jornadas` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `jornadas_departamentos`
--
ALTER TABLE `jornadas_departamentos`
  ADD CONSTRAINT `jornadas_departamentos_ibfk_1` FOREIGN KEY (`cod_jornada`) REFERENCES `jornadas` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jornadas_departamentos_ibfk_2` FOREIGN KEY (`cod_departamento`) REFERENCES `departamentos` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `jornada_grupos`
--
ALTER TABLE `jornada_grupos`
  ADD CONSTRAINT `jornada_grupos_ibfk_1` FOREIGN KEY (`cod_jornada`) REFERENCES `jornadas` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jornada_grupos_ibfk_2` FOREIGN KEY (`cod_grupo`) REFERENCES `grupos` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `login_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `usuarios` (`mail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `login_ibfk_2` FOREIGN KEY (`nivel`) REFERENCES `usuarios` (`nivel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materias_cursos`
--
ALTER TABLE `materias_cursos`
  ADD CONSTRAINT `materias_cursos_ibfk_1` FOREIGN KEY (`cod_materia`) REFERENCES `materias` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materias_cursos_ibfk_2` FOREIGN KEY (`cod_curso`) REFERENCES `cursos` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materias_profesores`
--
ALTER TABLE `materias_profesores`
  ADD CONSTRAINT `materias_profesores_ibfk_1` FOREIGN KEY (`cod_materia`) REFERENCES `materias` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `materias_profesores_ibfk_2` FOREIGN KEY (`mail_profesor`) REFERENCES `profesores` (`mail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD CONSTRAINT `profesores_ibfk_1` FOREIGN KEY (`mail`) REFERENCES `usuarios` (`mail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profesores_ibfk_2` FOREIGN KEY (`cod_jornada`) REFERENCES `jornadas` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `profesores_departamento`
--
ALTER TABLE `profesores_departamento`
  ADD CONSTRAINT `profesores_departamento_ibfk_1` FOREIGN KEY (`mail_profesor`) REFERENCES `profesores` (`mail`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profesores_departamento_ibfk_2` FOREIGN KEY (`cod_departamento`) REFERENCES `departamentos` (`codigo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`id_anuncio`,`mail_usuario`) REFERENCES `anuncios` (`id`, `mail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `publicaciones_publico`
--
ALTER TABLE `publicaciones_publico`
  ADD CONSTRAINT `publicaciones_publico_ibfk_1` FOREIGN KEY (`id_anuncio`) REFERENCES `anuncios_publico` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`nivel`) REFERENCES `nivel` (`id`);

DELIMITER $$
--
-- Eventos
--
CREATE DEFINER=`dwes`@`%` EVENT `crear_publicacion2` ON SCHEDULE EVERY 1 DAY STARTS '2016-10-01 00:00:00' ON COMPLETION PRESERVE ENABLE COMMENT 'Saves total number of sessions then clears the table each day' DO BEGIN
 INSERT INTO publicaciones(id_anuncio,mail_usuario,fecha_publicacion) SELECT * from (SELECT id,mail, fecha_publicacion FROM anuncios WHERE fecha_publicacion=CURDATE() AND autorizado=true) AS T WHERE NOT EXISTS(SELECT id,mail FROM publicaciones WHERE id_anuncio=id AND mail_usuario=mail);
      END$$

DELIMITER ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
