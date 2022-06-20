-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-06-2022 a las 07:28:22
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `exogamesdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(10) NOT NULL,
  `idUsuario` int(10) NOT NULL,
  `idProducto` int(10) NOT NULL,
  `cantidad` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `imagen` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `imagen`) VALUES
(1, 'consola', 'consola.png'),
(2, 'videojuego', 'videojuego.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle`
--

CREATE TABLE `detalle` (
  `id` int(10) NOT NULL,
  `idPedido` int(10) NOT NULL,
  `idUsuario` int(10) NOT NULL,
  `idProducto` int(10) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `precio` int(10) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `id` int(10) NOT NULL,
  `idUsuario` int(10) NOT NULL,
  `codigoPostal` varchar(45) NOT NULL,
  `pais` varchar(45) NOT NULL,
  `localidad` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `id` int(10) NOT NULL,
  `idProducto` int(10) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`id`, `idProducto`, `imagen`) VALUES
(51, 134, '62afea2b4695d.webp'),
(52, 134, '62afea2b477f2.jpg'),
(53, 135, '62afeba5cbe14.png'),
(54, 135, '62afeba5cdb45.jpg'),
(55, 136, '62afec8436b9b.png'),
(56, 137, '62afed7404013.webp'),
(57, 137, '62afed7405c95.jpeg'),
(58, 138, '62afee31c0c0b.jpg'),
(59, 138, '62afee31c1b52.jpg'),
(60, 139, '62afef06ca99f.webp'),
(61, 140, '62afefb713aa7.jpg'),
(62, 141, '62aff07f45385.webp'),
(63, 141, '62aff07f4764c.jpg'),
(64, 142, '62aff1147cca3.webp'),
(65, 143, '62aff1cd4edf1.jpg'),
(66, 144, '62aff29f8f46a.jpg'),
(67, 144, '62aff29f905f5.jpg'),
(68, 145, '62aff38bb4c1e.jpg'),
(69, 145, '62aff38bb6327.jpg'),
(70, 146, '62aff4407fb47.jpeg'),
(72, 150, '62aff587aa68b.webp'),
(73, 150, '62aff587ab63e.jpg'),
(74, 151, '62aff668c3fef.jpg'),
(75, 151, '62aff668c534e.jpg'),
(76, 152, '62aff6ed5e7d2.jpg'),
(77, 152, '62aff6ed6510e.jpg'),
(78, 154, '62aff7f26466b.jpg'),
(79, 154, '62aff7f2656c7.jpg'),
(80, 155, '62aff8a3ed736.webp'),
(81, 155, '62aff8a3ee777.jpg'),
(82, 158, '62affa3a0dfde.png'),
(83, 159, '62affab1e3299.webp'),
(84, 159, '62affab1e4245.jpeg'),
(85, 160, '62affb521ae14.png'),
(86, 163, '62affd1688ec0.png'),
(87, 165, '62affe7b908c9.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensaje`
--

CREATE TABLE `mensaje` (
  `id` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `asunto` longtext NOT NULL,
  `telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensaje`
--

INSERT INTO `mensaje` (`id`, `nombre`, `email`, `asunto`, `telefono`) VALUES
(1, 'Ruben Garcia Diaz-Maroto', 'rub1999g@gmail.com', 'Prueba', '658506568'),
(3, 'Ruben Garcia Diaz-Maroto', 'rub1999g@gmail.com', 'sdasaddassda', '22222'),
(4, 'laura', 'laura@gmail.com', 'éspaña', '2133231'),
(5, 'dani', 'dani@dani.com', 'mensaje de prueba', '12312322'),
(6, 'assda', 'rub1999g@gmail.com', 'sa', '21231213'),
(7, 'a', 'sadds@sa.com', 'sad', 'sasad'),
(8, 'sadas', 'rub1999g@gmail.com', 'swwdw', '12312322'),
(9, 'sadas', 'rub1999g@gmail.com', 'swwdwss', '12312322'),
(10, 'laura', 'laura@gmail.com', 'dfsfsdf', '12312322'),
(11, 'Garcia Diaz-Maroto', 'rub1999g@gmail.com', 'dsadsdasdsa', '222222');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_06_10_082944_create_password_resets_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(10) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `contenido` longtext NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `autor`, `categoria`, `fecha`, `contenido`, `imagen`) VALUES
(1, 'España se cuela en el nuevo tráiler de Pokémon Escarlata y Púrpura', 'POR EVA DUNCAN', 'Juegos', '2022-06-03', 'Pokémon Escarlata y Púrpura saldrá a la venta este noviembre. Su tráiler más reciente nos ha dado a conocer varios diseños nuevos de inspiración castiza y unos escenarios que más de uno reconocerá.', '62a6478a0412c.webp'),
(2, 'Las 10 cosas más esperadas en Zelda: Breath of the Wild 2, según Reddit', 'NINTENDO', 'Juegos', '2022-05-14', 'Con el recopilatorio que tenéis abajo, podéis conocer las 10 peticiones más repetidas entre los fans para este título. Han sido listadas por parte de ScreenRant e incluyen opiniones compartidas por los jugadores en Reddit.\r\n\r\nSerían las siguientes solicitudes:\r\n\r\nUn nuevo castillo de Hyrule que explorar\r\nNuevas misiones secundarias tan interesantes como las del primer juego\r\nUna historia más lineal\r\nMás ciudades y poblados para explorar\r\nNuevos paisajes que contemplar\r\nMás tipos de enemigos\r\nNuevas recompensas e incentivos\r\nNuevas mazmorras\r\nUna alternativa a las semillas Kolog\r\nGancho de agarre y más herramientas', '1655064780.jpg'),
(3, '¿Qué posibilidades existen de que GTA 6 sea anunciado en 2022?', 'Ángel Morán Santiago', 'Juegos', '2022-06-12', 'GTA 6 está en desarrollo. Esto no debería pillarnos de sorpresa, aunque Rockstar no lo confirmó hasta hace unos meses. ¿Cómo será esta nueva entrega? ¿Estará a la altura de GTA 5?\r\n\r\nLo cierto es que apenas sabemos nada sobre GTA 6. Con el lanzamiento de GTA The Trilogy se rumoreó que ya estaba circulando la primera imagen, e incluso se dijo que se incluiría alguna pista en las versiones next-gen de GTA V.\r\n\r\nNi siquiera sabemos cuándo se lanzará GTA 6, aunque desde Take-Two (editora de Rockstar) fijan su llegada a las tiendas en el año fiscal 2025 (entre el 31 de marzo de 2024 y el 1 de abril de 2025).\r\n\r\nSi las previsiones de Take-Two están en lo cierto, nos toca tirar de hemeroteca para deducir cuándo se anunciará GTA 6. Y quizá te lleves una grata sorpresa...', '1655064913.jpg'),
(9, 'Xtralife ofrece más stock de PS5 hoy mismo: así es como puedes intentar comprar una', 'Claudio Torres', 'Consolas', '2022-06-08', 'En el subtítulo iba a decir \"nueva consola de Sony\", pero es que ya ha pasado más de un año y medio desde que salió PS5. Y es una locura que tantísimo tiempo después, que estamos hablando de más de 18 meses, todavía siga siendo tan difícil hacerse con una consola de nueva generación (y esto también se aplica a Xbox Series X, aunque en este post me vaya a centrar en PlayStation 5).\r\nEntre que hay poco stock y que sigue habiendo muchísima gente que está buscando hacerse con la consola, es normal que sea noticia cada vez que una tienda abra reservas. Porque sí, aunque PS5 lleve ya un buen tiempo en el mercado, todavía no se compra, sino que se reserva para que te la envíen cuando las tiendas la reciban. Hoy os quiero hablar de Xtralife, una de las tiendas de videojuegos más conocidas en España que va a abrir reservas hoy mismo.', '62a6794c88314.webp'),
(10, 'God of War Ragnarök: el viaje de Kratos y Atreus llegará finalmente en 2022', 'Juan Sanmartin', 'Juegos', '2022-06-10', 'Las dudas acerca del lanzamiento de God of War Ragnarok han sobrevolado desde la última vez que lo pudimos ver en acción. El anuncio del remake de The Last of Us, junto con el cambio de fecha de la obra en la base de datos de PSN parecían señalar a una llegada en 2023.\r\n\r\nSin embargo, parece que Kratos y Atreus llegarán a tiempo en 2022. Tal y como informan desde Bloomberg, Sony tiene prevista su llegada para el mes de noviembre y se espera que se anuncie la fecha definitiva para finales de este mes de junio.\r\nEsta misma semana nos llegaba la noticia de que God of War Ragnarök se iría hasta 2023, pero esta última información lo contradice. Lo cierto es que recientemente también pudimos ver cómo el sistema de clasificación surcoreano mostraba el título de Santa Monica en sus registros.\r\n\r\nNormalmente, ésta se trata de una señal inequívoca de que el desarrollo de un juego va en buen camino y de que la fecha para su llegada no está demasiado lejos. Por ahora, debemos conformarnos con los nuevos detalles de accesibilidad que tendrá la que será última entrega ambientada en Midgard.', '1655077384.webp'),
(11, '¿Death Stranding 2 en el Summer Game Fest?', 'Javier Escribano', 'Juegos', '2022-06-01', 'Death Stranding 2 podría ser uno de los anuncios sorpresa del Summer Game Fest: el director Hideo Kojima y el presentador Geoff Keighley se han reunido esta semana...\r\n\r\nHace dos semanas, Norman Reedus sorprendió confirmando, casi de forma casual, que Death Stranding 2 era real y ya estaba trabajando en él. Sus palabras, en una revista que nada tiene que ver con los videojuegos, no dejaban mucho lugar a dudas.\r\n\r\nPor si quedaban dudas, el director Hideo Kojima respondió a Reedus \"indirectamente\", mostrándole su bate de béisbol matazombies \"indirectamente\".\r\n\r\nAhora la pregunta es qué forma puede tomar un nuevo Death Stranding... y cuándo se anunciará. La respuesta podría estar a la vuelta de la esquina, porque un tuit de la asistenta personal de Hideo Kojima sugiere que se anunciará en el Summer Game Fest.', '1655077507.webp'),
(12, 'SPIDER-MAN Marvel\'s Spider-Man llega a PC', 'Marcos Yasif', 'Juegos', '2022-06-03', 'El trepamuros de Marvel se une así a otros videojuegos de PlayStation como Horizon: Zero Dawn, God of War y, aún sin fecha confirmada aunque filtrada en un documento de Epic Games Store, Uncharted: Colección Legado de ladrones, en llegar a PC. En concreto lo hará el 12 de agosto, quedando para otoño la adaptación Marvel\'s Spider-Man: Miles Morales dando así a los jugadores de ordenador la oportunidad de disfrutar de la saga al completo. Queda por ver qué primicia tendrá Marvel\'s Spider-Man 2.\r\nEste anuncio cogió por sorpresa al público de PC, más convencido con el anuncio de Returnal para PC tras aparecer su marca en SteamDB hace pocos días. En redes sociales también fue protagonista Bloodborne por su ausencia, dejando a la comunidad de \"PC Gamers\" sin la posibilidad de disfrutar de la excelente obra de FromSoftware.', '62a8eaf2a1b2b.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('ajf6532@gmail.com', '$2y$10$hOZim6ZQ0RSO7.XY6g41n.kYETOP/Iq.ky97BkAKy9T/3kHkORvU2', '2022-06-18 19:00:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(10) NOT NULL,
  `idUsuario` int(10) NOT NULL,
  `idSegunda` int(10) DEFAULT NULL,
  `codigo` varchar(255) NOT NULL,
  `fecha` date NOT NULL,
  `preciototal` decimal(50,2) NOT NULL,
  `cantidad` int(10) NOT NULL,
  `idDireccion` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` longtext NOT NULL,
  `valoracion` int(5) DEFAULT 0,
  `idCategoria` int(10) DEFAULT NULL,
  `fecha` date NOT NULL,
  `genero` varchar(45) DEFAULT NULL,
  `precio` decimal(6,2) NOT NULL,
  `imagen` varchar(45) NOT NULL,
  `comentario` varchar(255) DEFAULT NULL,
  `stock` int(10) NOT NULL,
  `disponibilidad` varchar(45) NOT NULL,
  `demo` varchar(255) DEFAULT NULL,
  `trailer` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `valoracion`, `idCategoria`, `fecha`, `genero`, `precio`, `imagen`, `comentario`, `stock`, `disponibilidad`, `demo`, `trailer`) VALUES
(134, 'Dragon Ball Z  Supersonic Warriors', 'Versión Dragon Ball Z: Supersonic Warriors para Gameboy Advance. Elige a tu personaje favorito de Dragon Ball Z y demuestra que eres un gran luchador. ¡Vence a tus adversarios en una pelea a muerte! Podrás luchar tanto en la tierra como en el aire. ¡Buena suerte!', NULL, 2, '2004-08-20', 'Accion', '22.00', '62afea2b45393.webp', 'Muy buen juego', 6, 'DISPONIBLE', '<iframe src=\"https://www.retrogames.cc/embed/28096-dragon-ball-z-supersonic-warriors-k-projectg.html\" width=\"600\" height=\"450\" frameborder=\"no\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\" scrolling=\"no\"></iframe>', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/tBjXje7uoRs\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(135, 'Pokemon Platinum', 'Pokémon Platino (Pokémon Platinum en inglés, ポケットモンスター プラチナ Pocket Monsters Platinum en japonés) es la reedición del dúo Pokémon Diamante y Pokémon Perla. También llamado \"Pokémon Edición Platino\". Pocos días después de su lanzamiento en Japón se vendieron alrededor de un millón de copias, convirtiéndose en el juego más rápidamente vendido de la historia para Nintendo DS1.', 5, 2, '2008-02-13', 'RPG', '35.00', '62afeba5caa24.jpg', 'Buen RPG', 10, 'DISPONIBLE', '<iframe src=\"https://www.retrogames.cc/embed/43044-pokemon-platinum-version-usa-rev-1.html\" width=\"600\" height=\"450\" frameborder=\"no\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\" scrolling=\"no\"></iframe>', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/YNumsTbyfHQ\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(136, 'Super Smash Bros', 'El juego pertenece al género de lucha, siendo también un crossover de diversos y variados personajes de diversas franquicias de Nintendo, siendo estas las series de Mario, Donkey Kong, The Legend of Zelda, Kirby, Yoshi\'s Island, Star Fox, Pokémon, Metroid, F-Zero y EarthBound. En las partidas juegan de 2 a 4 personajes, ya sean controlados por personas o por la propia consola (CPU), y compitiendo en un escenario abierto', 4, 2, '1999-01-21', 'Accion', '39.00', '62afec84355e3.webp', 'Buen juego', 7, 'DISPONIBLE', '<iframe src=\"https://www.retrogames.cc/embed/32859-super-smash-bros-europe-en-fr-de.html\" width=\"600\" height=\"450\" frameborder=\"no\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\" scrolling=\"no\"></iframe>', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/K783SDTBKmg\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(137, 'Inazuma Eleven', 'Inazuma Eleven es un videojuego de rol y deportes desarrollado y publicado por Level-5. Fue lanzado para la consola Nintendo DS el 22 de agosto de 2008 en Japón y el 28 de enero de 2011 en Europa, distribuido por Nintendo.​', 3, 2, '2009-08-22', 'Deporte', '14.00', '62afed7402ce2.jpg', 'Maginifica sleccion', 11, 'DISPONIBLE', '<iframe src=\"https://www.retrogames.cc/embed/41543-inazuma-eleven-europe.html\" width=\"600\" height=\"450\" frameborder=\"no\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\" scrolling=\"no\"></iframe>', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/VS_DIGP8HIM\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(138, 'Sonic The Hedgehog', 'Sonic Triple Trouble es un videojuego desarrollado por Aspect y distribuido por Sega en 1994 para la portátil Sega Game Gear protagonizado por Sonic el Erizo y su compañero Tails. Este es el único juego de la saga Sonic para la Game Gear que tiene un modo contrarreloj.', 2, 2, '1994-11-18', NULL, '9.00', '62afee31bf671.jpg', 'Buen juego', 10, 'DISPONIBLE', '<iframe src=\"https://www.retrogames.cc/embed/31355-sonic-the-hedgehog-triple-trouble-usa-europe.html\" width=\"600\" height=\"450\" frameborder=\"no\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\" scrolling=\"no\"></iframe>', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/uTF9ZXnO74Q\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(139, 'Pacman Nes', 'Pac Man es un videojuego arcade creado por el diseñador de videojuegos Toru Iwatani de la empresa Namco, y distribuido por Midway Games al mercado estadounidense a principios de los años 1980. Desde que Pac-Man fue lanzado el 22 de mayo de 1980, ​ fue un éxito', 4, 2, '1980-05-22', 'Multijugador', '17.00', '62afef06c945e.webp', 'Bueno', 7, 'DISPONIBLE', '<iframe src=\"https://www.retrogames.cc/embed/26817-classic-nes-pacman-u-hyperion.html\" width=\"600\" height=\"450\" frameborder=\"no\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\" scrolling=\"no\"></iframe>', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/zoh7Ac3sKFk\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(140, 'Dragon Ball GT Final Bout', 'Dragon Ball Final Bout, conocido en América del Norte como Dragon Ball GT: Final Bout, es un videojuego del género de lucha en 3D, basado en el universo de Dragon Ball, para PlayStation en 1997. Es el primer juego de Dragon Ball que tiene gráficos completamente poligonales.', 2, 2, '1997-02-01', 'Lucha', '20.00', '62afefb711aab.webp', 'Buen juego de peleas', 12, 'DISPONIBLE', '<iframe src=\"https://www.retrogames.cc/embed/40092-dragon-ball-gt-final-bout.html\" width=\"600\" height=\"450\" frameborder=\"no\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\" scrolling=\"no\"></iframe>', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/MixioAoo75k\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(141, 'FIFA 2002', 'FIFA Football 2002, conocido en Norte América como, FIFA Soccer 2002 y en el resto del mundo como FIFA 2002 o FIFA 02, es un videojuego de fútbol publicado el 29 de octubre de 2001 producido por Electronic Arts y editado por EA Sports. FIFA 2002 es el noveno juego de la serie.', 4, 2, '2002-10-29', 'Deporte', '9.00', '62aff07f43c30.jpg', 'Buen juego', 5, 'DISPONIBLE', '<iframe src=\"https://www.retrogames.cc/embed/41778-fifa-2002.html\" width=\"600\" height=\"450\" frameborder=\"no\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\" scrolling=\"no\"></iframe>', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/YziDXL9YCLg\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(142, 'Marvel vs Capcom', 'Marvel vs. Capcom: Clash of Super Heroes, o simplemente conocido como \"Marvel Vs. Capcom\" o \"MVC\", es el tercer videojuego en la serie de crossovers entre las compañías Marvel Comics y Capcom lanzado a principios de 1998.', 5, 2, '1998-01-23', 'Lucha', '7.00', '62aff1147b51c.webp', 'Bueno', 22, 'DISPONIBLE', '<iframe src=\"https://www.retrogames.cc/embed/9123-marvel-vs-capcom-clash-of-super-heroes-980123-usa.html\" width=\"600\" height=\"450\" frameborder=\"no\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\" scrolling=\"no\"></iframe>', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/jW8DtSaewZs\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(143, 'Bomberman 93', 'Bomberman \'93 es un videojuego de la serie de Bomberman lanzado para la TurboGrafx-16 en 1992 en Japón, siendo su lanzamiento a Norteamérica en 1993. El juego fue relanzado para la Consola Virtual de la Wii y la de Wii U, con su capacidad multijugadora intacta en Europa, Norteamérica y Australia.', 3, 2, '1993-12-11', 'Accion', '5.00', '62aff1cd4d0e5.jpg', 'Buen juego', 10, 'DISPONIBLE', '<iframe src=\"https://www.retrogames.cc/embed/31733-bomberman-93-usa.html\" width=\"600\" height=\"450\" frameborder=\"no\" allowfullscreen=\"true\" webkitallowfullscreen=\"true\" mozallowfullscreen=\"true\" scrolling=\"no\"></iframe>', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/fuUiAJsNitc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(144, 'Elden Ring PS5', 'Elden Ring es un videojuego de rol de acción desarrollado por FromSoftware y publicado por Bandai Namco Entertainment. El videojuego surge de una colaboración entre el director y diseñador Hidetaka Miyazaki y el novelista de fantasía George R. R. Martin', 5, 2, '2022-02-25', 'Rol', '65.00', '62aff29f8d8d1.png', 'Bueno', 10, 'DISPONIBLE', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/XJen7Lz7K9U\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(145, 'Marvel\'s Spider-Man 2', 'Marvel\'s Spider-Man 2 es un videojuego de acción y aventura protagonizado por el trepamuros creado por Stan Lee y Steve Ditko, Peter Parker. Aún por presentar, esta producción firmada por Insomniac Games en exclusiva para PlayStation seguirá profundizando en la historia del superhéroe arácnido, presentando a nuevos villanos de la Casa de las Ideas así como a sus aliados, todo con Nueva York como un personaje más con vida propia en el videojuego.', 1, 2, '2023-01-13', 'Accion', '65.00', '62aff39dd96c2.jpg', 'Bueno', 20, 'DISPONIBLE', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/4rKFkLeRF3Q\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(146, 'FIFA 22', 'FIFA 22 es un videojuego desarrollado por EA Vancouver y EA Romania, siendo publicado por EA Sports. Está disponible para PlayStation 4, PlayStation 5, Xbox Series X/S, Xbox One, Microsoft Windows, Google Stadia y Nintendo Switch.', 3, 2, '2021-09-27', 'Deporte', '45.00', '62aff4407e25b.webp', 'Bueno', 7, 'DISPONIBLE', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/vLj-27T-SEQ\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(147, 'Just Dance 2022', 'Just Dance 2022 es el décimo tercer juego de la serie Just Dance, desarrollada por Ubisoft. Se estrenó el 4 de noviembre de 2021. Fue anunciado oficialmente el 12 de junio de 2021 en la conferencia de prensa de Ubisoft en la E3 2021', 4, 2, '2021-11-04', 'Baile', '50.00', '62aff49fca48e.webp', 'Bueno', 10, 'DISPONIBLE', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/tfYfRXxA6Wg\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(150, 'One Piece World Seeker', 'One Piece: World Seeker es un videojuego de acción y aventuras basado en la serie de manga y anime One Piece. Desarrollado por Ganbarion y publicado por Bandai Namco Entertainment, el juego es el primer videojuego de la franquicia que presenta un entorno de mundo abierto', 4, 2, '2019-03-14', 'Aventura', '15.00', '62aff587a8eb6.jpg', 'Bueno', 20, 'DISPONIBLE', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/CRF4XJxfheI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(151, 'Hollow Knight', 'El videojuego cuenta la historia del Caballero, en su búsqueda para descubrir los secretos del largamente abandonado reino de Hallownest, cuyas profundidades atraen a los aventureros y valientes con la promesa de tesoros o la respuesta a misterios antiguos.', 5, 2, '2017-02-24', 'Metroidvania', '14.00', '62aff668c23a3.jpg', 'bueno', 10, 'DISPONIBLE', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/UAO2urG23S4\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(152, 'Nintendo Switch Sports', 'Nintendo Switch Sports es un videojuego de simulación de deportes desarrollado y publicado por Nintendo para Nintendo Switch. Es la última entrada en la serie de juegos de Wii, a pesar de no tener \"Wii\" en su título. El juego fue lanzado el 29 de abril de 2022', 3, 2, '2022-04-29', 'Deporte', '49.00', '62aff6ed5b17c.jpg', 'bueno', 10, 'DISPONIBLE', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/9n1on5gffYg\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(153, 'Leyendas Pokemon: Arceus', 'Leyendas Pokémon: Arceus es un videojuego de rol de acción desarrollado por Game Freak y publicado por The Pokémon Company y Nintendo para Nintendo Switch. Es parte de la octava generación de la serie de videojuegos Pokémon. Se trata de una precuela de los títulos Pokémon diamante y Pokémon perla, publicados en 2006.', 2, 2, '2022-01-28', 'Rol', '45.00', '62aff775bb48a.jpg', 'bueno', 10, 'DISPONIBLE', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/9RbjFjYgNNg\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(154, 'Mario Strikers', 'Mario Strikers: Battle League, conocido en Europa y Australia como Mario Strikers: Battle League Football, es un videojuego de fútbol desarrollado por Next Level Games en conjunto con Nintendo EPD y publicado por Nintendo para Nintendo Switch. Su lanzamiento fue el 10 de junio de 2022 a nivel mundial.', 4, 2, '2022-06-10', 'Deporte', '60.00', '62aff7f262dd6.jpg', 'bueno', 10, 'DISPONIBLE', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/rqUrAehzTNQ\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(155, 'Dragon Ball Kakarot', 'Dragon Ball Z: Kakarot es un videojuego de rol de acción, desarrollado por CyberConnect2 y publicado por Bandai Namco Entertainment.​ Basado en la franquicia de Dragon Ball, se lanzó para Microsoft Windows, PlayStation 4 y Xbox One.​​​ Se confirmó la participación del creador de la franquicia, Akira Toriyama.', 5, 2, '2020-01-16', 'Lucha', '47.00', '62aff8a3ebd9f.webp', 'bueno', 7, 'DISPONIBLE', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/D3toyk1VdgY\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(156, 'PS5', 'PlayStation 5: Jugar no tiene límites. Experimenta cargas superrápidas gracias a una unidad de estado sólido (SSD) de alta velocidad, una inmersión más profunda con retroalimentación háptica, gatillos adaptables y audio 3D, además de una nueva generación de increíbles juegos de PlayStation .', 5, 1, '2021-11-19', NULL, '500.00', '62aff9265a2da.webp', 'No disponible', 4, 'DISPONIBLE', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/RkC0l4iekYo\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(157, 'PS4', 'Una PS4 renovada y más pequeña. Disfruta de colores increíblemente vivos y brillantes con asombrosos gráficos HDR. Organiza tus juegos y aplicaciones y comparte todo con tus amigos a través de una nueva interfaz intuitiva. Guarda tus juegos, aplicaciones, capturas de pantalla y vídeos en el disco duro de 1TB de capacidad. Lo mejor de la televisión, el cine y mucho más desde tus aplicaciones de entretenimiento preferidas.', 4, 1, '2013-11-15', NULL, '281.00', '62aff9acb0fe4.png', 'buena', 10, 'DISPONIBLE', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/yJFQ2TUHbU0\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(158, 'Nintendo Switch', 'Nintendo Switch se transforma para adaptarse a tu situación y te permite jugar a los títulos que quieras aunque no tengas mucho tiempo.\r\n\r\nEs una nueva era en la que no tienes que adaptar tu vida a los videojuegos: ahora es la consola la que se adapta a tu vida.\r\n\r\n¡Disfruta de tus juegos cuando quieras, donde quieras y como quieras!', 5, 1, '2017-03-03', NULL, '300.00', '62affa3a0c04b.png', 'buena', 20, 'DISPONIBLE', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/f5uik5fgIaI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(159, 'Steam Deck', 'La Steam Deck es una videoconsola portátil desarrollada por Valve Corporation. Su lanzamiento estuvo inicialmente programado para diciembre de 2021, aunque posteriormente fue anunciado para febrero de 2022, debido a la falta de material para la producción.', 5, 1, '2022-02-25', NULL, '600.00', '62affab1e1b35.png', 'buena', 4, 'DISPONIBLE', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/AvokyBOYe8Y\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(160, 'Xbox Series', 'Xbox Series X y Xbox Series S (colectivamente, Xbox Series X|S), es una línea de videoconsolas de sobremesa desarrolladas por Microsoft y la cuarta generación de la familia de consolas Xbox. La familia de consolas, conocida colectivamente como \"Project Scarlett\"1​ y revelada por primera vez en el E3 2019, incluye la Xbox Series X de gama alta, revelada en The Game Awards 2019 y cuyo nombre en código es \"Project Anaconda\"', 3, 1, '2020-11-10', NULL, '660.00', '62affb521901e.png', 'buena', 10, 'DISPONIBLE', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/0tUqIHwHDEc\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(161, 'Nintendo 3DS', 'Pantalla 3D Ver cómo mundos maravillosos en 3D ganan vida en la palma de tu mano es una experiencia que tendrás que ver por ti mismo para poder apreciarla en toda su profundidad. La gran pantalla superior de Nintendo 3DS hace uso de las más recientes tecnologías para crear un efecto 3D vívido y convincente sin que tengas que ponerte gafas especiales.', 4, 1, '2011-02-26', NULL, '140.00', '62affbf5bc32a.webp', 'buena', 10, 'DISPONIBLE', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/K65f9-eMBaQ\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(162, 'PSVITA', 'Descubre la revolución del entretenimiento portátil con un dispositivo que cabe en la palma de la mano y cuenta con funciones vanguardistas, juegos y conectividad 3G, entre otros. Mantente siempre conectado a tu vida, amigos y juegos de PlayStation con el modelo 3G de PS Vita.', 2, 1, '2012-12-17', NULL, '159.00', '62affc6e76c8a.png', 'Buena', 10, 'DISPONIBLE', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/C6l-JJprV_E\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(163, 'DS', 'Las dos pantallas LCD de Nintendo DS, retroiluminadas y de gran nitidez, ofrecen un nuevo enfoque en lo que a videojuegos se refiere. Las posibilidades son infinitas: una pantalla se puede utilizar para mostrar la acción principal, mientras que la otra puede representar un mapa, el inventario o un punto de vista secundario. ¡O ambas pantallas se pueden utilizar para mostrar gigantescos monstruos al mismo tiempo!', 5, 1, '2004-11-21', NULL, '110.00', '62affd1687071.png', 'Buena', 10, 'DISPONIBLE', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/aYGjsaLlojA\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(164, 'WII', 'Desde su lanzamiento, recibió premios por la innovación de su controlador y la tecnología que incorpora en el sistema de juego. Al notar el éxito de Wii a nivel internacional, algunos desarrolladores third-party se disculparon con Nintendo por haber lanzado juegos de baja calidad y no haber sido optimistas con el sistema en sus orígenes.16', 4, 1, '2007-12-09', NULL, '89.00', '62affdd3442d3.png', 'Me gusta', 6, 'DISPONIBLE', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/mCufArSg-SQ\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>'),
(165, 'PSX', 'PlayStation es la primera videoconsola de Sony, y la primera de dicha compañía en ser diseñada por Ken Kutaragi, y es una videoconsola de sobremesa de 32 bits lanzada por Sony Computer Entertainment el 3 de diciembre de 1994 en Japón.', 3, 1, '1994-12-03', NULL, '95.00', '62affe7b8f151.png', 'Muy Buena', 20, 'DISPONIBLE', NULL, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/YTYnNZRJscQ\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `segunda_mano`
--

CREATE TABLE `segunda_mano` (
  `id` int(10) NOT NULL,
  `idUsuario` int(10) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` longtext DEFAULT NULL,
  `comentario` longtext DEFAULT NULL,
  `valoracion` tinyint(4) DEFAULT NULL,
  `idCategoria` int(5) NOT NULL,
  `precio` int(10) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `dni` varchar(47) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellidos` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` varchar(45) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `fecha` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `dni`, `nombre`, `apellidos`, `telefono`, `email`, `password`, `rol`, `remember_token`, `imagen`, `fecha`) VALUES
(9, NULL, 'admin', 'admin', '12345678', 'admin@admin.com', '$2y$10$DTAvt0TJG7ptGo4IpJsi/OXusRbykVd9I0C9eDeqo2TEp20lGSntS', 'admin', 'U6jOBxac6Q2aTsXCdkalIsSPtDmuVuWKzYJssoue31pAuSnKq3YtdcRZmaEj', NULL, ''),
(21, NULL, 'aj', 'aj', NULL, 'ajf6532@gmail.com', '$2y$10$EM/3x2aZr9rpKx.yOLiyIeQLUJJn/.TlHmWMTJgXf1aUtvhG6F2Gy', 'cliente', NULL, NULL, ''),
(22, NULL, 'cliente', 'cliente', '123123123', 'cliente@gmail.com', '$2y$10$mCW4aGYMUAslxLu9ra4dmuZyEsKh/zAUSUkbT1QPRbvn9suUIY8cu', 'cliente', NULL, '1655701407.webp', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idProducto_carrito` (`idProducto`) USING BTREE,
  ADD KEY `fk_idUsuario_carrito` (`idUsuario`) USING BTREE;

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idPedido_detalles` (`idPedido`),
  ADD KEY `fk_idProducto_detalles` (`idProducto`),
  ADD KEY `fk_idUsuario_detalles` (`idUsuario`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idUsuario_direccion` (`idUsuario`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idProducto_idx` (`idProducto`);

--
-- Indices de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idUsuario_idx` (`idUsuario`),
  ADD KEY `fk_idDireccion_pedidos` (`idDireccion`),
  ADD KEY `fk_idSegunda_pedido` (`idSegunda`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idCategoria_idx` (`idCategoria`);

--
-- Indices de la tabla `segunda_mano`
--
ALTER TABLE `segunda_mano`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_idCategoria_segunda` (`idCategoria`),
  ADD KEY `fk_idUsuario_segunda` (`idUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni_UNIQUE` (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle`
--
ALTER TABLE `detalle`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de la tabla `mensaje`
--
ALTER TABLE `mensaje`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT de la tabla `segunda_mano`
--
ALTER TABLE `segunda_mano`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `fk_idProducto_detalle` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idUsuario_detalle` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle`
--
ALTER TABLE `detalle`
  ADD CONSTRAINT `fk_idPedido_detalles` FOREIGN KEY (`idPedido`) REFERENCES `pedidos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_idProducto_detalles` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idUsuario_detalles` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `fk_idUsuario_direccion` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `fk_idProducto_imagen` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_idDireccion_pedidos` FOREIGN KEY (`idDireccion`) REFERENCES `direccion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idSegunda_pedido` FOREIGN KEY (`idSegunda`) REFERENCES `segunda_mano` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_idUsuario_pedido` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_idCategoria_producto` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `segunda_mano`
--
ALTER TABLE `segunda_mano`
  ADD CONSTRAINT `fk_idCategoria_segunda` FOREIGN KEY (`idCategoria`) REFERENCES `categorias` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_idUsuario_segunda` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
