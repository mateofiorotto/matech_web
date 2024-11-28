-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2024 a las 03:52:42
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prog2_matech`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `nombre_url` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `nombre_url`) VALUES
(1, 'Procesador', 'procesador'),
(2, 'Tarjeta Gráfica', 'tarjeta_grafica'),
(3, 'Memoria RAM', 'memoria_ram'),
(5, 'Almacenamiento', 'almacenamiento'),
(6, 'Motherboard', 'motherboard'),
(7, 'Fuente de Alimentación', 'fuente_de_alimentacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componentes`
--

CREATE TABLE `componentes` (
  `id` int(10) UNSIGNED NOT NULL,
  `marca_id` int(10) UNSIGNED NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_lanzamiento` date NOT NULL,
  `imagen` varchar(256) NOT NULL,
  `dimensiones` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `componentes`
--

INSERT INTO `componentes` (`id`, `marca_id`, `categoria_id`, `nombre`, `precio`, `descripcion`, `fecha_lanzamiento`, `imagen`, `dimensiones`) VALUES
(1, 1, 1, 'AMD Ryzen 9 7950X', 699.99, 'Procesador de 16 núcleos y 32 hilos con arquitectura Zen 4. Este potente procesador es ideal para tareas de alto rendimiento, como la creación de contenido y el gaming. Con su arquitectura avanzada Zen 4, ofrece eficiencia energética y velocidades de procesamiento superiores, lo que lo convierte en una opción excelente para entusiastas de PC y profesionales que buscan un rendimiento insuperable en aplicaciones pesadas.', '2023-09-05', '1730589294.webp', '40 x 40 x 5 mm'),
(2, 2, 1, 'Intel Core i7-13700K', 409.99, 'Procesador de 16 núcleos y 24 hilos ideal para gaming y productividad. Este procesador combina un excelente rendimiento en tareas de gaming y productividad, ofreciendo una experiencia fluida en aplicaciones de múltiples hilos y juegos exigentes. Su arquitectura optimizada garantiza que puedas ejecutar varias aplicaciones simultáneamente sin comprometer el rendimiento.', '2023-10-01', '1730555207.webp', '37.5 x 37.5 x 5 mm'),
(3, 1, 1, 'AMD Ryzen 7 7800X', 499.99, 'Procesador de 8 núcleos y 16 hilos excelente para juegos. Ideal para gamers, este procesador ofrece un rendimiento excepcional en juegos y tareas creativas. Su diseño eficiente permite un mayor overclocking, lo que maximiza el rendimiento en aplicaciones intensivas y proporciona experiencias de juego más suaves.', '2023-10-15', '1730555245.webp', '40 x 40 x 5 mm'),
(4, 3, 2, 'NVIDIA GeForce RTX 4090', 1599.99, 'Tarjeta gráfica de gama alta con 24GB de VRAM para 4K. Diseñada para entusiastas de gráficos, esta tarjeta ofrece un rendimiento impresionante en juegos a 4K y aplicaciones de renderizado. Su arquitectura avanzada permite trazado de rayos en tiempo real, proporcionando imágenes de alta calidad y experiencias de juego envolventes.', '2023-11-30', '1730555327.webp', '313 x 138 x 61 mm'),
(5, 3, 2, 'NVIDIA GeForce RTX 4070 TI', 799.99, 'Tarjeta gráfica de gama media con 12GB de VRAM, ideal para 1440p. Esta GPU ofrece un gran equilibrio entre precio y rendimiento, permitiendo a los jugadores disfrutar de juegos en alta definición y con configuraciones gráficas elevadas. Su eficiencia energética la hace adecuada para largas sesiones de juego.', '2023-09-20', '1730555345.webp', '317 bx 140 x 60 mm'),
(6, 1, 2, 'AMD Radeon RX 7900 XTX', 1199.99, 'Tarjeta gráfica con 24GB de GDDR6X excelente para jugar. Esta tarjeta está diseñada para ofrecer un rendimiento excepcional en juegos a alta resolución, garantizando tasas de frames fluidas y detalles impresionantes. Con su tecnología avanzada, es ideal para gamers que buscan la mejor experiencia visual sin compromisos.', '2023-10-15', '1730555360.webp', '305 x 135 x 51 mm'),
(8, 5, 3, 'Corsair Vengeance 16GB (2x8GB) DDR4', 124.99, 'Kit de memoria RAM DDR4 con baja latencia para alto rendimiento. Ideal para gamers y usuarios de aplicaciones intensivas, esta memoria asegura un rendimiento estable y rápido. Su diseño eficiente permite un gran rendimiento en juegos y tareas de edición, mejorando la experiencia general del sistema.', '2023-07-10', '1730555471.webp', '133 x 30 x 8 mm'),
(11, 6, 3, 'Kingston Beast 16GB (2x8GB) DDR4 3200MHz', 44.99, 'Memoria RAM que ofrece una combinación perfecta de rendimiento y estilo. Con una velocidad de 3200MHz y latencia CL16, es ideal para mejorar la experiencia de juego y procesamiento intensivo en cualquier sistema compatible con DDR4. Incluye un disipador de calor de bajo perfil para una mayor eficiencia térmica y un diseño elegante para destacar en configuraciones con ventana.', '2022-01-15', '1730922310.webp', '135 x 34 x 7 mm'),
(12, 4, 3, 'G.Skill Ripjaws V 16GB (2x8GB) DDR4 3600MHz', 74.99, 'Memoria de alto rendimiento diseñada para ofrecer una experiencia de juego fluida y un rendimiento excepcional en tareas multitarea y edición de contenido. Con una velocidad de 3600MHz y latencia CL16, proporciona un ancho de banda superior para una mayor eficiencia en sistemas de alto rendimiento. El disipador de calor de perfil bajo y su diseño estilizado aseguran una excelente refrigeración y una estética moderna para tu PC.', '2020-08-12', '1730935586.webp', '133 x 40 x 7 mm'),
(13, 6, 3, 'Kingston Renegade 16GB (2x8GB) DDR5 6000MHz', 129.99, 'Memoria RAM DDR5 combina velocidad extrema y alta capacidad con una frecuencia de 6000MHz y latencia CL40. Diseñada para maximizar el rendimiento en juegos y aplicaciones exigentes, incluye un disipador de aluminio de alta eficiencia que mantiene la temperatura bajo control.', '2022-08-15', '1731165043.webp', '133 x 44 x 7 mm'),
(14, 4, 3, 'G.Skill Trident Z5 RGB 32GB (2x16GB) DDR5 6000MHz', 179.99, 'Memoria premium con una frecuencia de 6000MHz y latencia CL36, diseñada para profesionales y entusiastas del gaming. Ofrece una estética moderna con iluminación RGB personalizable, además de un rendimiento sobresaliente en tareas exigentes.', '2022-10-05', '1731165487.webp', '135 x 45 x 8 mm'),
(15, 5, 3, 'Corsair Dominator Platinum RGB 32GB (2x16GB) DDR5 6200MHz', 199.99, 'Memoria RAM DDR5 que lleva el rendimiento y diseño a otro nivel, con 6200MHz y latencia CL36. Su disipador avanzado y 12 LEDs RGB direccionables la convierten en una opción de alta gama para configuraciones gaming y creativas.', '2022-11-12', '1731165600.webp', '135 x 55 x 7 mm'),
(16, 1, 1, 'AMD Ryzen 9 7900X', 469.99, 'Procesador que ofrece 12 núcleos y 24 hilos con una velocidad base de 4.7 GHz, alcanzando hasta 5.6 GHz en modo turbo. Es ideal para tareas exigentes, como edición de video y gaming avanzado, ofreciendo excelente rendimiento multitarea y eficiencia energética.', '2022-09-27', '1731166193.webp', '40 x 40 x 4 mm'),
(17, 2, 1, 'Intel Core i9-12900K', 529.99, 'Procesador que cuenta con 16 núcleos (8 de rendimiento y 8 de eficiencia) y 24 hilos, con una frecuencia máxima de 5.2 GHz. Está diseñado para ofrecer un rendimiento sobresaliente tanto en gaming como en aplicaciones de productividad, con un enfoque en la eficiencia mononúcleo y multitarea.', '2021-11-04', '1731166738.webp', '45 x 37 x 4 mm'),
(18, 2, 1, 'Intel Core i5-13600K', 319.99, 'Procesador de gama media que incluye 14 núcleos (6 de rendimiento y 8 de eficiencia) y 20 hilos, con una frecuencia máxima de 5.1 GHz. Es una opción equilibrada para gaming en 2K y multitareas ligeras, siendo una gran elección para entusiastas que buscan un buen rendimiento a un precio accesible.', '2022-10-20', '1731166839.webp', '45 x 37 x 4 mm'),
(20, 3, 2, 'NVIDIA GeForce RTX 4080', 1199.99, 'Tarjeta gráfica que ofrece 16GB de memoria GDDR6X y un rendimiento impresionante en gaming y creación de contenido en 4K. Con tecnología DLSS 3 y trazado de rayos avanzado, esta tarjeta garantiza una experiencia fluida en juegos de última generación y aplicaciones profesionales.', '2022-11-16', '1731167928.webp', '312 x 132 x 55 mm'),
(21, 1, 2, 'AMD Radeon RX 6700 XT', 399.99, 'Tarjeta gráfica con 12GB de memoria GDDR6, la AMD Radeon RX 6700 XT es ideal para gaming en 2K, ofreciendo un buen balance entre rendimiento y eficiencia energética. Compatible con tecnologías como DirectX 12 Ultimate y FidelityFX, brinda una excelente calidad visual en títulos actuales.', '2021-01-18', '1731168212.webp', '295 x 130 x 45 mm'),
(22, 1, 2, 'AMD Radeon RX 7800 XT', 519.99, 'La AMD Radeon RX 7800 XT viene con 16GB de memoria GDDR6, ofreciendo un equilibrio entre rendimiento y eficiencia para gaming en 2K y 4K. Compatible con FidelityFX Super Resolution (FSR) para mejorar la calidad visual y los FPS, es una gran elección para jugadores que buscan calidad a un buen precio.', '2023-09-06', '1731168565.webp', '305 x 131 x 45 mm'),
(23, 6, 5, 'Kingston Renegade 1TB NVMe M.2', 99.99, 'SSD M.2 NVMe de alto rendimiento, con velocidades de lectura de hasta 7300 MB/s. Ideal para gaming y tareas intensivas de edición y renderizado, gracias a su velocidad extrema.', '2021-01-29', '1731178054.webp', '80 x 22 x 3 mm'),
(24, 6, 5, 'Kingston A400 1TB SSD SATA', 43.99, 'SSD SATA con velocidades de lectura de hasta 500 MB/s. Excelente para mejorar la velocidad de arranque y carga de aplicaciones sin necesidad de una inversión grande.', '2017-10-25', '1731178128.webp', '100 x 69.85 x 7 mm'),
(25, 9, 5, 'Adata XPG GAMMIX S70 1TB M.2 NVMe', 109.99, 'SSD M.2 NVMe de gama alta, con velocidades de lectura de hasta 7400 MB/s. Diseñado para jugadores y profesionales que necesitan un rendimiento extremo en aplicaciones exigentes.', '2021-05-12', '1731178303.webp', '80 x 22 x 3 mm'),
(26, 9, 5, 'Adata SU800 1TB SSD SATA', 49.99, 'SSD SATA con velocidades de lectura de hasta 560 MB/s. Proporciona un excelente equilibrio entre precio y rendimiento para usuarios que buscan un impulso en la velocidad de su sistema sin un costo elevado.', '2018-08-07', '1731178504.webp', '100 x 69 x 7 mm'),
(27, 11, 6, 'MSI MAG B550 TOMAHAWK WIFI', 149.99, 'Placa base ATX con chipset B550, compatible con procesadores AMD Ryzen de 3ª y 4ª generación. Incluye Wi-Fi 6, PCIe 4.0, y un diseño de refrigeración mejorado.', '2020-06-15', '1731179116.webp', '305 x 244 mm'),
(28, 10, 6, 'ASUS TUF Gaming Z690-Plus WiFi D4', 229.99, 'Motherboard ATX con chipset Z690 compatible con los procesadores Intel Core 12ª generación. Cuenta con soporte para memoria DDR4, PCIe 5.0, y tres ranuras M.2 para SSD de alto rendimiento. Además, tiene Wi-Fi 6 para una conectividad superior.', '2021-10-21', '1731179516.webp', '300 x 240 mm'),
(29, 8, 5, 'Seagate Barracuda 2TB HDD', 59.99, 'HDD de 7200 RPM, ideal para almacenamiento de gran capacidad con un rendimiento sólido para tareas generales, como almacenamiento de juegos, archivos multimedia y copias de seguridad.', '2020-09-15', '1731179576.webp', '147 x 101 x 20 mm'),
(30, 8, 5, 'Seagate Skyhawk 1TB HDD', 39.99, 'HDD de 5900 RPM, diseñado para vigilancia 24/7, ofreciendo almacenamiento confiable y eficiente para grabación de video y cámaras de seguridad.', '2019-06-17', '1731179648.webp', '147 x 101 x 26 mm'),
(31, 10, 6, 'ASUS ROG Strix X670E-F Gaming WiFi', 349.99, 'Motherboard ATX con chipset X670E y socket AM5, compatible con procesadores AMD Ryzen 7000 series. Ofrece soporte para memoria DDR5 y PCIe 5.0, lo que la convierte en una opción ideal para entusiastas del rendimiento. Viene equipada con cuatro ranuras M.2 para almacenamiento ultra rápido y Wi-Fi 6E para una conectividad avanzada.', '2022-09-27', '1731180884.webp', '300 x 240 mm'),
(32, 12, 6, 'Gigabyte Z690 AORUS ELITE AX', 259.99, 'Motherboard ATX con chipset Z690 para procesadores Intel Core 12ª generación. Cuenta con soporte para memoria DDR5, PCIe 5.0, y Wi-Fi 6E. Con tres ranuras M.2, esta placa base proporciona una excelente plataforma para gamers y usuarios que buscan alto rendimiento.', '2021-11-14', '1731181040.webp', '300 x 240 mm'),
(33, 11, 6, 'MSI MAG Z590 TOMAHAWK WIFI', 229.99, 'Motherboard ATX con chipset Z590 y soporte para procesadores Intel Core 10ª y 11ª generación. Ofrece opciones de overclocking para CPU y RAM, Wi-Fi 6 y dos ranuras M.2 para almacenamiento rápido. Es una excelente opción para gamers y usuarios exigentes que buscan un rendimiento sólido.', '2021-05-25', '1731181136.webp', '300 x 240 mm'),
(34, 12, 6, 'Gigabyte B560 AORUS PRO AX', 149.99, 'Motherboard ATX con chipset B560 compatible con procesadores Intel Core de 10ª y 11ª generación. Incluye soporte para memoria DDR4 de hasta 5333 MHz (OC), Wi-Fi 6 y dos ranuras M.2 con disipadores, ideal para configuraciones de rendimiento sólido sin un alto costo.', '2021-01-15', '1731181536.webp', '300 x 240 mm'),
(35, 5, 7, 'Corsair RM750', 119.99, 'Fuente de alimentación de alto rendimiento con certificación 80 Plus Gold, diseñada para sistemas de gama media a alta. La Corsair RM750 ofrece alta eficiencia energética y operación silenciosa, con cables totalmente modulares que facilitan una instalación ordenada.', '2021-02-01', '1731183591.webp', '160 x 150 x 86 mm'),
(36, 5, 7, 'Corsair RM850x', 139.99, 'Fuente de alimentación confiable y de alta potencia, ideal para sistemas de alto rendimiento. La RM850x ofrece eficiencia energética 80 Plus Gold y una operación silenciosa gracias a su ventilador de bajo ruido, con cables modulares para una gestión ordenada.', '2021-04-05', '1731183053.webp', '160 x 150 x 86 mm'),
(37, 9, 7, 'ADATA XPG Core Reactor 1000W', 179.99, 'Fuente de alimentación robusta para sistemas de alto rendimiento que requieren potencia adicional. Con certificación 80 Plus Gold y un diseño compacto, la XPG Core Reactor 1000W es perfecta para configuraciones de múltiples tarjetas gráficas y overclocking.', '2021-07-01', '1731183128.webp', '140 x 150 x 86 mm'),
(38, 10, 7, 'ASUS ROG Strix 750W Gold', 149.99, 'Fuente de alimentación de alta gama con componentes premium y un diseño robusto. La ROG Strix 750W cuenta con certificación 80 Plus Gold y tecnología de refrigeración avanzada, perfecta para sistemas de alto rendimiento y configuraciones de overclocking.', '2020-09-01', '1731183667.webp', '160 x 150 x 86 mm'),
(39, 12, 7, 'Gigabyte P750GM', 109.99, 'Fuente de alimentación compacta con certificación 80 Plus Gold, ideal para construcciones de PC eficientes. Sus cables modulares y su ventilador con control de temperatura inteligente ayudan a reducir el desorden y mejorar la refrigeración.', '2020-07-10', '1731183506.webp', '150 x 140 x 86 mm'),
(40, 11, 7, 'MSI MPG A750GF', 119.99, 'Fuente de alimentación de alto rendimiento diseñada para sistemas de gama alta, con certificación 80 Plus Gold que garantiza eficiencia energética. Cuenta con cables totalmente modulares para una gestión de cables limpia y componentes de alta calidad para asegurar estabilidad y durabilidad.', '2020-08-15', '1731183443.webp', '160 x 150 x 86 mm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `componentes_x_etiquetas`
--

CREATE TABLE `componentes_x_etiquetas` (
  `id` int(10) UNSIGNED NOT NULL,
  `componente_id` int(10) UNSIGNED NOT NULL,
  `etiqueta_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `componentes_x_etiquetas`
--

INSERT INTO `componentes_x_etiquetas` (`id`, `componente_id`, `etiqueta_id`) VALUES
(6, 3, 6),
(7, 3, 2),
(11, 3, 1),
(77, 12, 1),
(78, 12, 2),
(79, 12, 6),
(80, 12, 11),
(143, 18, 1),
(144, 18, 2),
(145, 18, 4),
(146, 18, 6),
(147, 18, 7),
(148, 2, 1),
(149, 2, 2),
(150, 2, 4),
(151, 2, 6),
(152, 2, 7),
(156, 16, 1),
(157, 16, 2),
(158, 16, 5),
(163, 13, 1),
(164, 13, 2),
(165, 13, 5),
(166, 13, 12),
(167, 13, 13),
(168, 14, 1),
(169, 14, 4),
(170, 14, 5),
(171, 14, 12),
(172, 14, 13),
(173, 15, 1),
(174, 15, 2),
(175, 15, 5),
(176, 15, 12),
(177, 15, 13),
(178, 5, 1),
(179, 5, 5),
(180, 5, 8),
(181, 6, 1),
(182, 6, 5),
(183, 6, 7),
(184, 6, 8),
(185, 4, 1),
(186, 4, 5),
(187, 4, 7),
(188, 4, 8),
(198, 20, 1),
(199, 20, 5),
(200, 20, 8),
(201, 21, 1),
(202, 21, 6),
(203, 21, 9),
(204, 22, 1),
(205, 22, 5),
(206, 22, 7),
(207, 22, 8),
(208, 23, 1),
(209, 23, 5),
(210, 23, 15),
(211, 23, 17),
(215, 25, 1),
(216, 25, 5),
(217, 25, 15),
(218, 25, 17),
(315, 26, 1),
(316, 26, 6),
(317, 26, 14),
(318, 26, 17),
(334, 31, 1),
(335, 31, 5),
(336, 31, 12),
(337, 31, 13),
(338, 31, 14),
(339, 31, 15),
(340, 31, 18),
(341, 31, 20),
(342, 31, 21),
(343, 31, 27),
(344, 32, 1),
(345, 32, 5),
(346, 32, 12),
(347, 32, 13),
(348, 32, 14),
(349, 32, 15),
(350, 32, 18),
(351, 32, 21),
(352, 32, 22),
(353, 32, 27),
(354, 27, 1),
(355, 27, 6),
(356, 27, 11),
(357, 27, 14),
(358, 27, 15),
(359, 27, 19),
(360, 27, 21),
(361, 27, 27),
(362, 28, 1),
(363, 28, 5),
(364, 28, 11),
(365, 28, 14),
(366, 28, 15),
(367, 28, 19),
(368, 28, 21),
(369, 28, 27),
(370, 33, 1),
(371, 33, 5),
(372, 33, 11),
(373, 33, 14),
(374, 33, 15),
(375, 33, 18),
(376, 33, 21),
(377, 33, 23),
(378, 33, 27),
(379, 34, 1),
(380, 34, 6),
(381, 34, 11),
(382, 34, 14),
(383, 34, 15),
(384, 34, 21),
(385, 34, 23),
(386, 34, 27),
(392, 36, 1),
(393, 36, 5),
(394, 36, 25),
(395, 36, 30),
(396, 36, 31),
(397, 37, 1),
(398, 37, 5),
(399, 37, 7),
(400, 37, 18),
(401, 37, 26),
(402, 37, 29),
(403, 37, 31),
(419, 40, 1),
(420, 40, 6),
(421, 40, 25),
(422, 40, 28),
(423, 40, 31),
(424, 39, 1),
(425, 39, 6),
(426, 39, 25),
(427, 39, 28),
(428, 39, 31),
(429, 35, 1),
(430, 35, 6),
(431, 35, 25),
(432, 35, 28),
(433, 35, 31),
(434, 38, 1),
(435, 38, 6),
(436, 38, 13),
(437, 38, 25),
(438, 38, 28),
(439, 38, 31),
(459, 17, 1),
(460, 17, 2),
(461, 17, 4),
(462, 17, 5),
(466, 30, 6),
(467, 30, 14),
(468, 30, 16),
(469, 24, 1),
(470, 24, 6),
(471, 24, 14),
(472, 24, 17),
(473, 11, 1),
(474, 11, 2),
(475, 11, 6),
(476, 11, 11),
(477, 11, 13),
(478, 8, 1),
(479, 8, 2),
(480, 8, 6),
(481, 8, 11),
(490, 29, 6),
(491, 29, 14),
(492, 29, 16),
(534, 1, 1),
(535, 1, 2),
(536, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(10) UNSIGNED NOT NULL,
  `usuario_id` int(10) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `importe` decimal(12,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `usuario_id`, `fecha`, `importe`) VALUES
(1, 3, '2024-11-21 00:12:00', 1909.96),
(2, 3, '2024-11-21 10:00:00', 409.99),
(3, 3, '2024-11-21 11:00:00', 499.99),
(4, 3, '2024-11-21 23:00:00', 74.99),
(5, 1, '2024-11-21 00:00:01', 409.99),
(6, 3, '2024-11-22 04:01:00', 1199.99),
(7, 4, '2024-11-22 02:00:00', 1023.97),
(8, 1, '2024-11-22 10:00:00', 1599.99),
(9, 1, '2024-11-22 02:00:00', 2044.97),
(11, 1, '2024-11-22 00:00:00', 409.99),
(12, 3, '2024-11-23 01:00:00', 699.99),
(13, 1, '2024-11-23 00:11:01', 699.99),
(14, 1, '2024-11-23 05:00:00', 2809.96),
(15, 1, '2024-11-23 00:20:00', 444.97),
(16, 1, '2024-11-23 22:03:00', 99.99),
(17, 1, '2024-11-23 02:03:41', 699.99),
(18, 1, '2024-11-23 01:05:50', 2399.97),
(19, 1, '2024-11-23 01:21:14', 694.96);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etiquetas`
--

CREATE TABLE `etiquetas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `nombre_url` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `etiquetas`
--

INSERT INTO `etiquetas` (`id`, `nombre`, `nombre_url`) VALUES
(1, 'Gaming', 'gaming'),
(2, 'Multitareas', 'multitareas'),
(4, 'Rendimiento mononúcleo', 'rendimiento_mononucleo'),
(5, 'Gama alta', 'gama_alta'),
(6, 'Gama media', 'gama_media'),
(7, 'Ultima generación', 'ultima_generacion'),
(8, '4K', '4k'),
(9, '2K', '2k'),
(11, 'DDR4', 'ddr4'),
(12, 'DDR5', 'ddr5'),
(13, 'RGB', 'rgb'),
(14, 'SATA', 'sata'),
(15, 'M.2', 'm2'),
(16, 'HDD', 'hdd'),
(17, 'SSD', 'ssd'),
(18, 'Overclock', 'overclock'),
(19, 'AM4', 'am4'),
(20, 'AM5', 'am5'),
(21, 'Wi-Fi', 'wi-fi'),
(22, 'LGA1700', 'lga1700'),
(23, 'LGA1200', 'lga1200'),
(25, '80 Plus Gold', '80_plus_gold'),
(26, '80 Plus Platinum', '80_plus_platinum'),
(27, 'ATX', 'atx'),
(28, '750W', '750w'),
(29, '1000W', '1000w'),
(30, '850W', '850w'),
(31, 'Modular', 'modular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_x_compra`
--

CREATE TABLE `item_x_compra` (
  `id` int(10) UNSIGNED NOT NULL,
  `compra_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `item_x_compra`
--

INSERT INTO `item_x_compra` (`id`, `compra_id`, `item_id`, `cantidad`) VALUES
(1, 1, 2, 1),
(2, 1, 3, 3),
(3, 2, 2, 1),
(4, 3, 3, 1),
(5, 4, 12, 1),
(6, 5, 2, 1),
(7, 6, 6, 1),
(8, 7, 24, 1),
(9, 7, 37, 1),
(10, 7, 5, 1),
(11, 8, 4, 1),
(12, 9, 5, 1),
(13, 9, 6, 1),
(14, 9, 11, 1),
(15, 11, 2, 1),
(16, 12, 1, 1),
(17, 13, 1, 1),
(18, 14, 2, 1),
(19, 14, 5, 3),
(20, 15, 11, 1),
(21, 15, 15, 2),
(22, 16, 23, 1),
(23, 17, 1, 1),
(24, 18, 5, 3),
(25, 19, 8, 1),
(26, 19, 31, 1),
(27, 19, 39, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(256) NOT NULL,
  `nombre_url` varchar(256) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fundacion` year(4) NOT NULL,
  `origen` varchar(256) NOT NULL,
  `imagen` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`, `nombre_url`, `descripcion`, `fundacion`, `origen`, `imagen`) VALUES
(1, 'AMD', 'amd', ' Advanced Micro Devices, Inc. (AMD) es una compañía estadounidense de semiconductores con sede en Santa Clara, California, que desarrolla procesadores de computación y productos tecnológicos similares de consumo. Sus productos principales incluyen microprocesadores, chipsets para placas base, circuitos integrados auxiliares, procesadores embebidos y procesadores gráficos para servidores, estaciones de trabajo, computadores personales y aplicaciones para sistemas embebidos.    ', '1969', 'Estados Unidos', '1730555519.webp'),
(2, 'Intel', 'intel', ' Intel Corporation es el mayor fabricante de circuitos integrados del mundo según su cifra de negocio anual. La tecnológica estadounidense es la creadora de la serie de procesadores x86, los procesadores más comúnmente encontrados en la mayoría de las computadoras personales. Intel fue fundada el 18 de julio de 1968 como Integrated Electronics Corporation (aunque un error común es el de que \"Intel\" viene de la palabra intelligence) por los pioneros en semiconductores Robert Noyce y Gordon Moore, y muchas veces asociados con la dirección ejecutiva y la visión de Andrew Grove. ', '1968', 'Estados Unidos', '1730555526.webp'),
(3, 'NVIDIA', 'nvidia', ' Nvidia Corporation es una empresa de software y hardware distribuidora de unidades de procesamiento de gráficos, interfaz de programación de aplicaciones para ciencia de datos y computación de alto rendimiento, así como unidades de sistema en chip para la computación móvil y el mercado automotriz. ', '1993', 'Estados Unidos', '1730555532.webp'),
(4, 'G.Skill', 'g_skill', ' G.SKILL International Enterprise es una empresa taiwanesa de fabricación de hardware informático. Los clientes objetivo de la compañía son los usuarios de computadoras con overclocking. Produce una variedad de productos de PC de gama alta y es mejor conocida por sus productos DRAM. ', '1989', 'Taiwán', '1730555538.webp'),
(5, 'Corsair', 'corsair', ' Corsair Gaming, Inc., comúnmente conocida como Corsair, es una empresa estadounidense de hardware de computadoras y periféricos con sede en Fremont, California. La compañía fue constituida en enero de 1994 y reconstituida en Delaware en 2007.2​ En enero de 2010 la compañía fue constituida otra vez en Delaware como \"Corsair Components, Inc.\". ', '1994', 'Estados Unidos', '1730555545.webp'),
(6, 'Kingston', 'kingston', ' Kingston Corporation es un fabricante estadounidense de productos de memorias de ordenadores. Está localizado en Technology Fountain Valley, California. Tiene departamentos de facturación y logísticos en el Reino Unido, Irlanda, Malasia, China y Taiwán.\r\n\r\nEs el mayor productor independiente de módulos de memoria DRAM, actualmente tiene más del 16% de la cuota de mercado. Y es el segundo mayor suministrador de memorias flash. ', '1987', 'Estados Unidos', '1730555551.webp'),
(8, 'Seagate', 'seagate', 'Seagate Technology es un importante fabricante estadounidense de discos duros, fundado en 1979 y con sede en Scotts Valley, California. La compañía está registrada en las Islas Caimán. Sus discos duros son usados en una variedad de computadoras, desde servidores, equipos de escritorio y portátiles hasta otros dispositivos de consumo como PVRs, la consola Xbox de Microsoft y la línea Creative Zen de reproductores de audio digital. Seagate fue el mayor fabricante de discos duros para computadora del mundo, lugar perdido a raíz de la compra de la división de almacenamiento de Hitachi, HGST por parte de Western Digital, y el fabricante independiente más antiguo que sigue en el negocio.', '1979', 'Estados Unidos', '1731177836.webp'),
(9, 'Adata', 'adata', 'ADATA Technology es una empresa taiwanesa fabricante de hardware, fundada en mayo de 2001 por Simón Chen. Su principal línea de productos consta de módulos DRAM, unidades de memorias USB y tarjetas de memoria de los formatos CompactFlash y Secure Digital. A la fecha ha explorado también otros mercados, como los de marcos digitales, unidades de estado sólido y ExpressCards.', '2001', 'Taiwán', '1731177898.webp'),
(10, 'ASUS', 'asus', 'ASUSTeK Computer, Inc. es una corporación multinacional de hardware, electrónica y robótica​ con sede en Taipéi, Taiwán, en el Distrito de Beitou. Sus productos incluyen la producción de tarjetas madre (placas base), tarjetas gráficas, dispositivos ópticos, productos multimedia, periféricos, computadoras portátiles, netbooks, de sobremesa, servidores, estaciones de trabajo, tablets, teléfonos móviles, equipos de red, monitores, proyectores, y soluciones de refrigeración para computadoras. La compañía también es un fabricante OEM que produce componentes para otras compañías.', '1989', 'Taiwán', '1731178854.webp'),
(11, 'MSI', 'msi', 'Micro-Star International, Co., Ltd. es una empresa tecnológica multinacional taiwanesa con sede en Nuevo Taipéi, Taiwán. Diseña, desarrolla y proporciona productos y servicios de la tecnología de la información, incluyendo equipo informático, computadoras portátiles, placas base, tarjetas gráficas, PCs todo-en-uno, servidores, computadoras industriales, periféricos de PC y productos de info-entertainment para automóviles. Es muy conocida en el mundo de los videojuegos y los eSports.', '1986', 'Taiwán', '1731179031.webp'),
(12, 'Gigabyte', 'gigabyte', 'GIGA-BYTE Technology Co., Ltd. es un fabricante y distribuidor taiwanés de hardware de computadora. El negocio principal de Gigabyte es placas base. Envió 4,8 millones de placas base en el primer trimestre de 2015, lo que le permitió convertirse en el proveedor líder de placas base.', '1986', 'Taiwán', '1731180777.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(256) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `nombre_completo` varchar(256) NOT NULL,
  `contrasena` varchar(256) NOT NULL,
  `telefono` int(20) UNSIGNED NOT NULL,
  `direccion` varchar(256) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `nombre_usuario`, `nombre_completo`, `contrasena`, `telefono`, `direccion`, `rol`) VALUES
(1, 'mateo.fiorotto@davinci.edu.ar', 'mateo_fiorotto', 'Mateo Fiorotto', '$2y$10$Zr/kYT8YXhMmD5hSezMnOup2qJy6fefEp1hER8sbLsUXwAaGUNFXq', 3446368572, 'Calle 123, Entre Ríos', 'superadmin'),
(2, 'jorge.perez@davinci.edu.ar', 'jorge_perez', 'Jorge Perez', '$2y$10$kM2ACnOhPzANh.5MBsGxNOk.nPT5Ertme3.rijSjXVsmbGXfDe8KW', 119102389, 'Calle Genérica, Buenos Aires', 'admin'),
(3, 'araceli.ortiz@gmail.com', 'araceliortiz', 'Araceli Ortiz', '$2y$10$A1zRPeKWKd60kv6Qf6AT4.CNw.yi0Gy32s/hIafzKtHh7IMJtRYym', 5330122, 'Hola 33, Tucumán', 'usuario'),
(4, 'lucasrodriguez@gmail.com', 'lucasrodriguez', 'Lucas Rodriguez', '$2y$10$5LK4Ejoyc4S46VqDV0nSMO0NZKnTgZiponHxV4E.mVf8..PweD7au', 341212456, 'Random 123, Bariloche', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `componentes`
--
ALTER TABLE `componentes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marca_id` (`marca_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `componentes_x_etiquetas`
--
ALTER TABLE `componentes_x_etiquetas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `componente_id` (`componente_id`),
  ADD KEY `etiqueta_id` (`etiqueta_id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`usuario_id`);

--
-- Indices de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `item_x_compra`
--
ALTER TABLE `item_x_compra`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compra_id` (`compra_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `componentes`
--
ALTER TABLE `componentes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `componentes_x_etiquetas`
--
ALTER TABLE `componentes_x_etiquetas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=548;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `etiquetas`
--
ALTER TABLE `etiquetas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `item_x_compra`
--
ALTER TABLE `item_x_compra`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `componentes`
--
ALTER TABLE `componentes`
  ADD CONSTRAINT `componentes_ibfk_1` FOREIGN KEY (`marca_id`) REFERENCES `marcas` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `componentes_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `componentes_x_etiquetas`
--
ALTER TABLE `componentes_x_etiquetas`
  ADD CONSTRAINT `componentes_x_etiquetas_ibfk_1` FOREIGN KEY (`etiqueta_id`) REFERENCES `etiquetas` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `componentes_x_etiquetas_ibfk_2` FOREIGN KEY (`componente_id`) REFERENCES `componentes` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `item_x_compra`
--
ALTER TABLE `item_x_compra`
  ADD CONSTRAINT `item_x_compra_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `componentes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `item_x_compra_ibfk_2` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
