-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-09-2023 a las 00:06:02
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `roblequemado`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atracciones`
--

CREATE TABLE `atracciones` (
  `id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `foto_chica` text NOT NULL,
  `foto_grande` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `atracciones`
--

INSERT INTO `atracciones` (`id`, `titulo`, `descripcion`, `foto_chica`, `foto_grande`, `fecha`) VALUES
(1, 'Salto Los Pellines', 'El Salto Los Pellines es una hermosa cascada ubicada en Las Trancas. Esta cascada se caracteriza por su impresionante caída de agua rodeada de exuberante vegetación, creando un entorno natural impresionante y sereno. Es un lugar popular para disfrutar de la belleza de la naturaleza y relajarse en un entorno tranquilo en la Región del Ñuble, Chile.', 'vistas/img/atracciones/salto1.jpg', 'vistas/img/atracciones/salto2.jpg', '2023-09-07 03:32:44'),
(2, 'Cueva de Los Pincheira', 'La Cueva de los Pincheira en Chillán es una formación natural subterránea que se cree que fue utilizada como escondite por el famoso bandido Pincheira en el siglo XIX. Esta cueva es un lugar histórico y turístico que ofrece una experiencia única para explorar su interior y aprender sobre la historia de los forajidos en Chile.', 'vistas/img/atracciones/pincheira1.jpg', 'vistas/img/atracciones/pincheira2.png', '2023-09-07 03:33:55'),
(3, 'Nevados de Chillán', 'Los Nevados de Chillán son un destacado complejo volcánico y centro de esquí ubicado en la Región del Ñuble. Estos nevados ofrecen impresionantes paisajes montañosos, con hermosas cumbres nevadas y bosques de Araucaria. Además de ser un lugar popular para deportes de invierno, como el esquí y el snowboard, también atrae a los amantes de la naturaleza con sus aguas termales naturales y la posibilidad de explorar sus alrededores en cualquier estación del año.', 'vistas/img/atracciones/nevados1.jpg', 'vistas/img/atracciones/nevados2.jpg', '2023-09-07 03:34:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `img` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `banner`
--

INSERT INTO `banner` (`id`, `img`, `fecha`) VALUES
(1, 'vistas/img/banner/banner01.jpg', '2023-09-07 02:50:26'),
(2, 'vistas/img/banner/banner02.jpg', '2023-09-07 02:50:26'),
(3, 'vistas/img/banner/banner03.jpg', '2023-09-07 02:50:26'),
(4, 'vistas/img/banner/banner04.jpg', '2023-09-07 02:50:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabanas`
--

CREATE TABLE `cabanas` (
  `id` int(11) NOT NULL,
  `tipo` text NOT NULL,
  `descripcion` text NOT NULL,
  `incluye` text NOT NULL,
  `img` text NOT NULL,
  `precio_baja` int(11) NOT NULL,
  `precio_alta` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `cabanas`
--

INSERT INTO `cabanas` (`id`, `tipo`, `descripcion`, `incluye`, `img`, `precio_baja`, `precio_alta`, `ruta`, `fecha`) VALUES
(1, 'Para 6 personas', 'Disfruta en familia de nuestras cabañas', '[{\"item\": \"Cama 2 plazas y dos literas\", \"icono\": \"fas fa-bed\"}, {\"item\": \"TV con cable\", \"icono\": \"fas fa-tv\"},	 {\"item\": \"Agua caliente\", \"icono\": \"fas fa-water\"}, {\"item\": \"Wifi\", \"icono\": \"fas fa-wifi\"}, {\"item\": \"Sala de estar\", \"icono\": \"fas fa-couch\"}]', 'vistas/img/cabanas/cabana6/cabana.jpg', 75000, 90000, 'cabana-6-personas', '2023-09-12 03:26:16'),
(2, 'Para 2 personas', 'Escápate a la naturaleza en pareja', '[{\"item\": \"Cama matrimonial 2plazas\", \"icono\": \"fas fa-bed\"}, {\"item\": \"TV con cable\", \"icono\": \"fas fa-tv\"},	 {\"item\": \"Agua caliente\", \"icono\": \"fas fa-water\"}, {\"item\": \"Wifi\", \"icono\": \"fas fa-wifi\"}, {\"item\": \"Sala de estar\", \"icono\": \"fas fa-couch\"}]', 'vistas/img/cabanas/cabana2/cabana.jpg', 50000, 75000, 'cabana-2-personas', '2023-09-12 03:26:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_cabanas`
--

CREATE TABLE `info_cabanas` (
  `id_c` int(11) NOT NULL,
  `tipo_c` int(11) NOT NULL,
  `descripcion_c` text NOT NULL,
  `galeria` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `info_cabanas`
--

INSERT INTO `info_cabanas` (`id_c`, `tipo_c`, `descripcion_c`, `galeria`, `fecha`) VALUES
(1, 1, 'Cabañas de 50m² para un máximo de 6 personas. Cada cabaña cuenta con: calefacción a Ieña, parrilla individual, cocina full equipada (microondas, horno, refrigerador, tostador, hervidor, cubiertos, loza, implementos de limpieza, etc.), TV Mundo Pacífico y ropa de cama. Además, entregamos papel higiénico, jabón de manos y lavaloza. <br><br>  Espacios disponibles por cabaña: 1 habitación matrimonial, 1 habitación con dos literas, 1 baño privado, cocina, living-comedor y estacionamiento techado. <br><br> Los horarios son los siguientes: El check-in desde las 03:00 pm y El check-out hasta las 11:00 am. Además, existe la posibilidad de acceder a una extensión de check-out (sujeto a disponibilidad). <br><br>  Adicionalmente, contamos con acceso a piscina (temporada de verano) y tinajas de madera para baños de agua calientes. Éstas últimas, son ideales para relajarse y se encuentran a temperaturas que rodean los 30 y 40 grados. Son las favoritas de los pasajeros que visitan el lugar y tienen un costo adicional por hora (grupo de máximo 6 personas). <br><br>', '[\"vistas/img/cabanas/cabana6/cabana.jpg\",\"vistas/img/cabanas/cabana6/cabana02.jpg\",\"vistas/img/cabanas/cabana6/cabana03.jpg\",\"vistas/img/cabanas/cabana6/cabana04.jpg\",\"vistas/img/cabanas/cabana6/cabana05.jpg\"]', '2023-09-12 03:39:24'),
(2, 2, 'Cabaña de 32m² para máximo 2 personas. Cuenta con: calefacción a leña, parrilla individual, cocina full equipada (microondas, horno, refrigerador, tostador, hervidor, cubiertos, loza, implementos de limpieza, etc.), TV Mundo Pacífico y ropa de cama. Además, entregamos papel higiénico, jabón de manos y lavaloza. <br><br>\n\nEspacios disponibles por cabaña: 1 habitación matrimonial, 1 baño privado, cocina equipada, living-comedor y estacionamiento techado. <br><br>\nLos horarios son los siguientes: El check-in desde las 03:00 pm y El check-out hasta las 11:00 am. Además, existe la posibilidad de acceder a una extensión de check-out (sujeto a disponibilidad). <br><br>\n\nAdicionalmente, contamos con acceso a piscina (temporada de verano) y tinajas de madera para baños de agua calientes. Éstas últimas, son ideales para relajarse y se encuentran a temperaturas que rodean los 30 y 40 grados. Son las favoritas de los pasajeros que visitan el lugar y tienen un costo adicional por hora (grupo de máximo 6 personas). <br><br>', '[\"vistas/img/cabanas/cabana2/cabana.jpg\",\"vistas/img/cabanas/cabana2/cabana02.jpg\",\"vistas/img/cabanas/cabana2/cabana03.jpg\",\"vistas/img/cabanas/cabana2/cabana04.jpg\"]', '2023-09-14 02:02:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `tipo` text NOT NULL,
  `img` text NOT NULL,
  `precio_alta` int(11) NOT NULL,
  `precio_baja` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id_reserva` int(11) NOT NULL,
  `id_cabanas` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `pago_reserva` int(11) NOT NULL,
  `numero_transaccion` text NOT NULL,
  `codigo_reserva` text NOT NULL,
  `descripcion_reserva` text NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `fecha_reserva` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id_reserva`, `id_cabanas`, `id_usuario`, `pago_reserva`, `numero_transaccion`, `codigo_reserva`, `descripcion_reserva`, `fecha_ingreso`, `fecha_salida`, `fecha_reserva`) VALUES
(1, 1, 1, 150000, '516563258', '2342FSDF43', 'Cabaña para 6 personas - 2 noches', '2023-09-03', '2023-09-05', '2023-09-07 19:27:47'),
(2, 1, 1, 250000, '134SDfs45', '566ASFGE4CX', 'Cabaña 6 personas - 3 noches', '2023-09-10', '2023-09-12', '2023-09-07 19:27:54'),
(3, 2, 2, 150000, '1555411358F', '3R4F23H5', 'Cabana 2 personas - 3 noches', '2023-09-10', '2023-09-13', '2023-09-07 19:30:49'),
(4, 1, 1, 150000, '1314729152', '2Z2ETVBTK', 'Cabaña Para 6 personas', '2023-09-24', '2023-09-26', '2023-09-09 20:49:36'),
(5, 2, 1, 50000, '1314727482', 'I09ITUZQJ', 'Cabaña Para 2 personas', '2023-09-13', '2023-09-14', '2023-09-09 21:03:30'),
(6, 2, 1, 50000, '1314729318', 'HYM4HBSOO', 'Cabaña Para 2 personas', '2023-09-27', '2023-09-28', '2023-09-09 21:09:50'),
(7, 2, 1, 50000, '1314728458', 'TILHQ1O2L', 'Cabaña Para 2 personas', '2023-09-21', '2023-09-22', '2023-09-09 23:22:07'),
(9, 2, 16, 150000, '12456354', 'FSDF42F26', 'Cabaña para 2 personas', '2023-09-26', '2023-09-28', '2023-09-14 01:59:20'),
(10, 1, 16, 275000, '1324564', 'KGH95MV7S4', 'Cabaña para 6 personas', '2023-09-14', '2023-09-16', '2023-09-14 02:22:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_u` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `telefono` int(11) NOT NULL,
  `modo` text NOT NULL,
  `verificacion` int(11) NOT NULL,
  `email_encriptado` text NOT NULL,
  `foto` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_u`, `nombre`, `apellido`, `password`, `email`, `telefono`, `modo`, `verificacion`, `email_encriptado`, `foto`, `fecha`) VALUES
(16, 'Belen', 'Isamitt', '$2a$07$asxx54ahjppf45sd87a5au7n90B34E1DKjnbuoGG.jU3ZlQf.6lU.', 'bisamitt@gmail.com', 962173988, 'directo', 1, '39b427198f5e065c64a9a2fb3f0b0cef', 'https://www.tuasesordemoda.com/wp-content/uploads/2022/11/corte-de-pelo-olivia-wilde-cara-cuadrada.jpeg', '2023-09-12 01:09:54');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atracciones`
--
ALTER TABLE `atracciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cabanas`
--
ALTER TABLE `cabanas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `info_cabanas`
--
ALTER TABLE `info_cabanas`
  ADD PRIMARY KEY (`id_c`);

--
-- Indices de la tabla `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id_reserva`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_u`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `atracciones`
--
ALTER TABLE `atracciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cabanas`
--
ALTER TABLE `cabanas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `info_cabanas`
--
ALTER TABLE `info_cabanas`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id_reserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_u` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
