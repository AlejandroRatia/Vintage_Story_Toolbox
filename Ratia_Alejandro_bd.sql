-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Servidor: db:3306
-- Tiempo de generación: 25-05-2026 a las 14:12:55
-- Versión del servidor: 8.0.46
-- Versión de PHP: 8.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Vintage_Story_Toolbox`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CRAFTING_RECIPE`
--

CREATE TABLE `CRAFTING_RECIPE` (
  `id` int NOT NULL,
  `item_id` int NOT NULL,
  `stations` json DEFAULT NULL,
  `available_materials` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `CRAFTING_RECIPE`
--

INSERT INTO `CRAFTING_RECIPE` (`id`, `item_id`, `stations`, `available_materials`) VALUES
(1, 157, '[\"Crucible\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(2, 46, '[\"Crafting Grid\"]', NULL),
(3, 38, '[\"Crafting Grid\"]', NULL),
(4, 37, '[\"Crafting Grid\"]', NULL),
(5, 43, '[\"Barrel\"]', NULL),
(6, 42, '[\"Barrel\"]', NULL),
(7, 41, '[\"Knife\"]', NULL),
(8, 58, '[\"Anvil\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(9, 59, '[\"Anvil\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(10, 61, '[\"Anvil\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(11, 70, '[\"Anvil\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(12, 65, '[\"Anvil\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(13, 55, '[\"Anvil\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(14, 75, '[\"Anvil\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(15, 71, '[\"Anvil\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(16, 62, '[\"Anvil\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(17, 53, '[\"Anvil\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(18, 81, '[\"Crafting Grid\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(19, 83, '[\"Crafting Grid\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(20, 88, '[\"Crafting Grid\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(21, 85, '[\"Crafting Grid\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(22, 93, '[\"Crafting Grid\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(23, 77, '[\"Crafting Grid\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(24, 82, '[\"Crafting Grid\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(25, 96, '[\"Crafting Grid\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(26, 121, '[\"Crafting Grid\"]', NULL),
(27, 122, '[\"Crafting Grid\"]', NULL),
(28, 124, '[\"Crafting Grid\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(29, 123, '[\"Crafting Grid\"]', '[\"iron\", \"meteoric_iron\", \"steel\"]'),
(30, 45, '[\"Loom\"]', NULL),
(31, 172, '[\"Crafting Grid\"]', NULL),
(32, 173, '[\"Crafting Grid\"]', NULL),
(33, 174, '[\"Crafting Grid\"]', NULL),
(34, 175, '[\"Crafting Grid\"]', NULL),
(35, 176, '[\"Crafting Grid\"]', NULL),
(36, 32, '[\"Pit Kiln\", \"Beehive Kiln\"]', NULL),
(37, 33, '[\"Pit Kiln\", \"Beehive Kiln\"]', NULL),
(38, 34, '[\"Pit Kiln\", \"Beehive Kiln\"]', NULL),
(39, 35, '[\"Pit Kiln\", \"Beehive Kiln\"]', NULL),
(40, 47, '[\"Kiln\"]', NULL),
(41, 48, '[\"Kiln\"]', NULL),
(42, 49, '[\"Kiln\"]', NULL),
(43, 177, '[\"Anvil\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(44, 52, '[\"Anvil\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(45, 54, '[\"Anvil\"]', '[\"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(46, 56, '[\"Anvil\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(47, 57, '[\"Anvil\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(48, 60, '[\"Anvil\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(49, 63, '[\"Anvil\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(50, 64, '[\"Anvil\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(51, 66, '[\"Anvil\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\"]'),
(52, 67, '[\"Anvil\"]', '[\"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(53, 68, '[\"Anvil\"]', '[\"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(54, 69, '[\"Anvil\"]', '[\"iron\", \"meteoric_iron\", \"steel\"]'),
(55, 72, '[\"Anvil\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(56, 73, '[\"Anvil\"]', '[\"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(57, 74, '[\"Anvil\"]', '[\"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(58, 76, '[\"Anvil\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(59, 50, '[\"Anvil\"]', '[\"iron\", \"meteoric_iron\", \"steel\"]'),
(60, 51, '[\"Anvil\"]', '[\"iron\", \"meteoric_iron\", \"steel\"]'),
(61, 78, '[\"Crafting Grid\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(62, 84, '[\"Crafting Grid\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(63, 86, '[\"Crafting Grid\"]', '[\"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(64, 90, '[\"Crafting Grid\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(65, 91, '[\"Crafting Grid\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(66, 92, '[\"Crafting Grid\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(67, 79, '[\"Crafting Grid\"]', NULL),
(68, 80, '[\"Crafting Grid\"]', NULL),
(69, 87, '[\"Crafting Grid\", \"Knife\"]', NULL),
(70, 89, '[\"Crafting Grid\"]', NULL),
(71, 94, '[\"Crafting Grid\"]', NULL),
(72, 105, '[\"Crafting Grid\", \"Knife\"]', NULL),
(73, 95, '[\"Crafting Grid\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(74, 104, '[\"Crafting Grid\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\"]'),
(75, 99, '[\"Crafting Grid\"]', NULL),
(76, 102, '[\"Crafting Grid\"]', NULL),
(77, 100, '[\"Crafting Grid\"]', NULL),
(78, 101, '[\"Crafting Grid\"]', NULL),
(79, 103, '[\"Crafting Grid\"]', NULL),
(80, 106, '[\"Crafting Grid\", \"Knife\"]', NULL),
(81, 116, '[\"Crafting Grid\", \"Knife\"]', NULL),
(82, 127, '[\"Crafting Grid\", \"Knife\"]', NULL),
(83, 179, '[\"Crafting Grid\"]', NULL),
(84, 180, '[\"Crafting Grid\"]', NULL),
(85, 181, '[\"Crafting Grid\"]', NULL),
(86, 107, '[\"Crafting Grid\"]', '[\"copper\", \"bismuth_bronze\", \"tin_bronze\", \"black_bronze\"]'),
(87, 117, '[\"Crafting Grid\"]', '[\"copper\", \"bismuth_bronze\", \"tin_bronze\", \"black_bronze\"]'),
(88, 128, '[\"Crafting Grid\"]', '[\"copper\", \"bismuth_bronze\", \"tin_bronze\", \"black_bronze\"]'),
(89, 108, '[\"Crafting Grid\"]', NULL),
(90, 118, '[\"Crafting Grid\"]', NULL),
(91, 129, '[\"Crafting Grid\"]', NULL),
(92, 133, '[\"Crafting Grid\"]', NULL),
(93, 111, '[\"Crafting Grid\"]', NULL),
(94, 132, '[\"Crafting Grid\"]', NULL),
(95, 109, '[\"Crafting Grid\"]', NULL),
(96, 119, '[\"Crafting Grid\"]', NULL),
(97, 130, '[\"Crafting Grid\"]', NULL),
(98, 110, '[\"Crafting Grid\"]', NULL),
(99, 120, '[\"Crafting Grid\"]', NULL),
(100, 131, '[\"Crafting Grid\"]', NULL),
(101, 112, '[\"Crafting Grid\"]', '[\"iron\", \"meteoric_iron\", \"steel\"]'),
(102, 134, '[\"Crafting Grid\"]', '[\"iron\", \"meteoric_iron\", \"steel\"]'),
(103, 113, '[\"Crafting Grid\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(104, 135, '[\"Crafting Grid\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(105, 182, '[\"Crafting Grid\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(106, 183, '[\"Crafting Grid\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(107, 184, '[\"Crafting Grid\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(108, 185, '[\"Crafting Grid\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(109, 186, '[\"Crafting Grid\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(110, 187, '[\"Crafting Grid\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(111, 138, '[\"Crafting Grid\", \"Hammer\", \"Chisel\", \"Saw\"]', NULL),
(112, 139, '[\"Crafting Grid\", \"Hammer\", \"Chisel\", \"Saw\"]', NULL),
(113, 140, '[\"Crafting Grid\"]', NULL),
(114, 141, '[\"Crafting Grid\", \"Hammer\", \"Chisel\"]', NULL),
(115, 142, '[\"Crafting Grid\"]', NULL),
(116, 143, '[\"Crafting Grid\", \"Hammer\", \"Chisel\", \"Saw\"]', NULL),
(117, 150, '[\"Crafting Grid\", \"Hammer\", \"Chisel\", \"Saw\"]', NULL),
(118, 152, '[\"Crafting Grid\", \"Hammer\", \"Chisel\"]', NULL),
(119, 145, '[\"Crafting Grid\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(120, 156, '[\"Crafting Grid\", \"Hammer\", \"Chisel\"]', NULL),
(121, 155, '[\"Crafting Grid\", \"Hammer\", \"Chisel\"]', NULL),
(122, 154, '[\"Crafting Grid\"]', NULL),
(123, 146, '[\"Crafting Grid\", \"Saw\"]', NULL),
(124, 148, '[\"Crafting Grid\", \"Hammer\", \"Chisel\"]', NULL),
(125, 147, '[\"Crafting Grid\", \"Hammer\", \"Chisel\"]', NULL),
(126, 149, '[\"Crafting Grid\", \"Hammer\"]', NULL),
(127, 144, '[\"Crafting Grid\", \"Hammer\", \"Chisel\"]', NULL),
(128, 151, '[\"Crafting Grid\", \"Hammer\", \"Chisel\"]', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ITEM`
--

CREATE TABLE `ITEM` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `isCraftable` tinyint(1) NOT NULL DEFAULT '1',
  `images` json DEFAULT NULL,
  `available_materials` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `ITEM`
--

INSERT INTO `ITEM` (`id`, `name`, `category`, `isCraftable`, `images`, `available_materials`) VALUES
(1, 'Amethyst', 'Umaterial', 0, '[\"Umaterials/Amethyst.png\"]', NULL),
(2, 'Bone', 'Umaterial', 0, '[\"Umaterials/Bone.png\"]', NULL),
(3, 'Bushmeat (Raw)', 'Umaterial', 0, '[\"Umaterials/Bushmeat-raw.png\"]', NULL),
(4, 'Clay (Blue)', 'Umaterial', 0, '[\"Umaterials/Clay-blue.png\"]', NULL),
(5, 'Clay (Fire)', 'Umaterial', 0, '[\"Umaterials/Clay-fire.png\"]', NULL),
(6, 'Clay (Red)', 'Umaterial', 0, '[\"Umaterials/Clay-red.png\"]', NULL),
(7, 'Clear Quartz', 'Umaterial', 0, '[\"Umaterials/Clear_quartz.png\"]', NULL),
(8, 'Fat', 'Umaterial', 0, '[\"Umaterials/Fat.png\"]', NULL),
(9, 'Feather', 'Umaterial', 0, '[\"Umaterials/Feather.png\"]', NULL),
(10, 'Flint', 'Umaterial', 0, '[\"Umaterials/Flint.png\"]', NULL),
(11, 'Temporal Gear', 'Umaterial', 0, '[\"Umaterials/Gear-temporal.png\"]', NULL),
(12, 'Granite Stone', 'Umaterial', 0, '[\"Umaterials/Granite_stone.png\"]', NULL),
(13, 'Cattail Tops', 'Umaterial', 0, '[\"Umaterials/Grid_Cattail_tops.png\"]', NULL),
(14, 'Dry Grass', 'Umaterial', 0, '[\"Umaterials/Grid_drygrass.png\"]', NULL),
(15, 'Firewood', 'Umaterial', 0, '[\"Umaterials/Grid_Firewood.png\"]', NULL),
(16, 'Flax Fibers', 'Umaterial', 0, '[\"Umaterials/Grid_Flax_fibers.png\"]', NULL),
(17, 'Raw Hide', 'Umaterial', 0, '[\"Umaterials/Grid_Raw_hide.png\"]', NULL),
(18, 'Stick', 'Umaterial', 0, '[\"Umaterials/Grid_Stick.png\"]', NULL),
(19, 'Bear Pelt (Black)', 'Umaterial', 0, '[\"Umaterials/Hide-pelt-bear-black-complete.png\"]', NULL),
(20, 'Raw Hide (Large)', 'Umaterial', 0, '[\"Umaterials/Hide-raw-large.png\"]', NULL),
(21, 'Honeycomb', 'Umaterial', 0, '[\"Umaterials/Honeycomb.png\"]', NULL),
(22, 'Oak Log', 'Umaterial', 0, '[\"Umaterials/Log-oak.png\"]', NULL),
(23, 'Metal Parts', 'Umaterial', 0, '[\"Umaterials/Metal-parts.png\"]', NULL),
(24, 'Olivine', 'Umaterial', 0, '[\"Umaterials/Olivine.png\"]', NULL),
(25, 'Papyrus Tops', 'Umaterial', 0, '[\"Umaterials/Papyrustops.png\"]', NULL),
(26, 'Quartz', 'Umaterial', 0, '[\"Umaterials/Quartz.png\"]', NULL),
(27, 'Resin', 'Umaterial', 0, '[\"Umaterials/Resin.png\"]', NULL),
(28, 'Rose Quartz', 'Umaterial', 0, '[\"Umaterials/Rosequartz.png\"]', NULL),
(29, 'Saltpeter', 'Umaterial', 0, '[\"Umaterials/Saltpeter.png\"]', NULL),
(30, 'Smoky Quartz', 'Umaterial', 0, '[\"Umaterials/Smokyquartz.png\"]', NULL),
(31, 'Beeswax', 'Pmaterial', 0, '[\"Pmaterials/Beeswax.png\"]', NULL),
(32, 'Burned Brick (Blue)', 'Pmaterial', 1, '[\"Pmaterials/Burnedbrick-blue.png\"]', NULL),
(33, 'Burned Brick (Brown)', 'Pmaterial', 1, '[\"Pmaterials/Burnedbrick-brown.png\"]', NULL),
(34, 'Burned Brick (Fire)', 'Pmaterial', 1, '[\"Pmaterials/Burnedbrick-fire.png\"]', NULL),
(35, 'Burned Brick (Red)', 'Pmaterial', 1, '[\"Pmaterials/Burnedbrick-red.png\"]', NULL),
(36, 'Charcoal', 'Pmaterial', 0, '[\"Pmaterials/Charcoal.png\"]', NULL),
(37, 'Flax Twine', 'Pmaterial', 1, '[\"Pmaterials/Flaxtwine.png\"]', NULL),
(38, 'Oak Board', 'Pmaterial', 1, '[\"Pmaterials/Grid_Oak_board.png\"]', NULL),
(39, 'Bear Pelt Body', 'Pmaterial', 0, '[\"Pmaterials/Hide-pelt-bear-black-body.png\"]', NULL),
(40, 'Pelt (Large)', 'Pmaterial', 0, '[\"Pmaterials/Hide-pelt-large.png\"]', NULL),
(41, 'Scraped Hide', 'Pmaterial', 1, '[\"Pmaterials/Hide-scraped-large.png\"]', NULL),
(42, 'Soaked Hide', 'Pmaterial', 1, '[\"Pmaterials/Hide-soaked-large.png\"]', NULL),
(43, 'Leather', 'Pmaterial', 1, '[\"Pmaterials/Leather.png\"]', NULL),
(44, 'Sturdy Leather', 'Pmaterial', 1, '[\"Pmaterials/Leather-sturdy-plain.png\"]', NULL),
(45, 'Linen', 'Pmaterial', 1, '[\"Pmaterials/Linen-normal-down.png\"]', NULL),
(46, 'Oak Planks', 'Pmaterial', 1, '[\"Pmaterials/Oak_planks.png\"]', NULL),
(47, 'Refractory Brick T1', 'Pmaterial', 1, '[\"Pmaterials/Refractorybrick-fired-tier1.png\"]', NULL),
(48, 'Refractory Brick T2', 'Pmaterial', 1, '[\"Pmaterials/Refractorybrick-fired-tier2.png\"]', NULL),
(49, 'Refractory Brick T3', 'Pmaterial', 1, '[\"Pmaterials/Refractorybrick-fired-tier3.png\"]', NULL),
(50, 'Anvil Part (Base)', 'Fmaterial', 1, '[\"Fmaterials/Anvilpart-base-iron.png\"]', '[\"iron\", \"meteoric_iron\", \"steel\"]'),
(51, 'Anvil Part (Top)', 'Fmaterial', 1, '[\"Fmaterials/Anvilpart-top-iron.png\"]', '[\"iron\", \"meteoric_iron\", \"steel\"]'),
(52, 'Arrowhead', 'Fmaterial', 1, '[\"Fmaterials/Arrowhead-copper.png\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(53, 'Falx Blade', 'Fmaterial', 1, '[\"Fmaterials/Bladehead-falx-copper.png\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(54, 'Helve Hammer Boss', 'Fmaterial', 1, '[\"Fmaterials/Boss-tinbronze.png\"]', '[\"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(55, 'Chisel Head', 'Fmaterial', 1, '[\"Fmaterials/Chisel-copper.png\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(56, 'Chute Section', 'Fmaterial', 1, '[\"Fmaterials/Chutesection-copper.png\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(57, 'Cleaver Blade', 'Fmaterial', 1, '[\"Fmaterials/Cleaver-copper.png\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(58, 'Axe Head', 'Fmaterial', 1, '[\"Fmaterials/Grid_Copper_axe_head.png\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(59, 'Hammer Head', 'Fmaterial', 1, '[\"Fmaterials/Grid_Copper_hammer_head.png\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(60, 'Hoe Head', 'Fmaterial', 1, '[\"Fmaterials/Grid_Copper_hoe_head.png\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(61, 'Pickaxe Head', 'Fmaterial', 1, '[\"Fmaterials/Grid_Copper_pickaxe_head.png\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(62, 'Metal Plate', 'Fmaterial', 1, '[\"Fmaterials/Grid_Copper_plate.png\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(63, 'Prospecting Pick Head', 'Fmaterial', 1, '[\"Fmaterials/Grid_Copper_prospecting_pick_head.png\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(64, 'Saw Blade', 'Fmaterial', 1, '[\"Fmaterials/Grid_Copper_saw_blade.png\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(65, 'Shovel Head', 'Fmaterial', 1, '[\"Fmaterials/Grid_Copper_shovel_head.png\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(66, 'Spear Head', 'Fmaterial', 1, '[\"Fmaterials/Grid_Copper_spear_head.png\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\"]'),
(67, 'Helve Hammer Head', 'Fmaterial', 1, '[\"Fmaterials/Grid_Tin_bronze_helve_hammer_head.png\"]', '[\"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(68, 'Hoop', 'Fmaterial', 1, '[\"Fmaterials/Hoop-tinbronze.png\"]', '[\"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(69, 'Iron Hatch Door', 'Fmaterial', 1, '[\"Fmaterials/Ironhatchdoor.png\"]', '[\"iron\", \"meteoric_iron\", \"steel\"]'),
(70, 'Knife Blade', 'Fmaterial', 1, '[\"Fmaterials/Knifeblade-copper.png\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(71, 'Metal Chain', 'Fmaterial', 1, '[\"Fmaterials/Metalchain-copper.png\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(72, 'Metal Scale', 'Fmaterial', 1, '[\"Fmaterials/Metalscale-copper.png\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(73, 'Padlock', 'Fmaterial', 1, '[\"Fmaterials/Padlock-tinbronze.png\"]', '[\"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(74, 'Pounder Cap', 'Fmaterial', 1, '[\"Fmaterials/Poundercap-tinbronze.png\"]', '[\"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(75, 'Shears Blade', 'Fmaterial', 1, '[\"Fmaterials/Shears-copper.png\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(76, 'Wrench', 'Fmaterial', 1, '[\"Fmaterials/Wrench-copper.png\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(77, 'Chisel', 'Tool', 1, '[\"tools/Chisel-copper.png\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(78, 'Cleaver', 'Tool', 1, '[\"tools/Cleaver-copper.png\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(79, 'Firestarter', 'Tool', 1, '[\"tools/Firestarter.png\"]', NULL),
(80, 'Bug Net', 'Tool', 1, '[\"tools/Grid_Bugnet.png\"]', NULL),
(81, 'Axe', 'Tool', 1, '[\"tools/Grid_Copper_Axe.png\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(82, 'Shears', 'Tool', 1, '[\"tools/Grid_Copper_shears.png\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(83, 'Hammer', 'Tool', 1, '[\"tools/Hammer-copper.png\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(84, 'Hoe', 'Tool', 1, '[\"tools/Hoe-copper.png\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(85, 'Knife', 'Tool', 1, '[\"tools/Knife-copper.png\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(86, 'Padlock', 'Tool', 1, '[\"tools/Padlock-tinbronze.png\"]', '[\"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(87, 'Wooden Pan', 'Tool', 1, '[\"tools/Pan-wooden.png\"]', NULL),
(88, 'Pickaxe', 'Tool', 1, '[\"tools/Pickaxe-copper.png\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(89, 'Plumb and Square', 'Tool', 1, '[\"tools/Plumb_and_Square.png\"]', NULL),
(90, 'Prospecting Pick', 'Tool', 1, '[\"tools/Prospectingpick-copper.png\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(91, 'Saw', 'Tool', 1, '[\"tools/Saw-copper.png\"]', '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(92, 'Scythe', 'Tool', 1, '[\"tools/Scythe-copper.png\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(93, 'Shovel', 'Tool', 1, '[\"tools/Shovel-copper.png\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(94, 'Sieve', 'Tool', 1, '[\"tools/Sieve-linen.png\"]', NULL),
(95, 'Arrow', 'Weapon', 1, '[\"weapons/Arrow-copper.png\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(96, 'Falx', 'Weapon', 1, '[\"weapons/Blade-falx-copper.png\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(97, 'Blackguard Blade', 'Weapon', 1, '[\"weapons/Blade-blackguard-iron.png\"]', NULL),
(98, 'Forlorn Blade', 'Weapon', 1, '[\"weapons/Blade-thrusting-forlorn.png\"]', NULL),
(99, 'Crude Bow', 'Weapon', 1, '[\"weapons/Bow_crude.png\"]', NULL),
(100, 'Long Bow', 'Weapon', 1, '[\"weapons/Bow-long.png\"]', NULL),
(101, 'Recurve Bow', 'Weapon', 1, '[\"weapons/Bow-recurve.png\"]', NULL),
(102, 'Simple Bow', 'Weapon', 1, '[\"weapons/Bow-simple.png\"]', NULL),
(103, 'Sling', 'Weapon', 1, '[\"weapons/Sling.png\"]', NULL),
(104, 'Spear', 'Weapon', 1, '[\"weapons/Spear-copper.png\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\"]'),
(105, 'Wooden Club', 'Weapon', 1, '[\"weapons/Woodenclub-normal.png\"]', NULL),
(106, 'Improvised Helmet', 'Armor', 1, '[\"armor/Armor-head-improvised-wood.png\"]', NULL),
(107, 'Lamellar Helmet', 'Armor', 1, '[\"armor/Armor-head-lamellar-copper.png\"]', '[\"copper\", \"bismuth_bronze\", \"tin_bronze\", \"black_bronze\"]'),
(108, 'Bear Hide Helmet', 'Armor', 1, '[\"armor/Armor-head-hide-bear-black.png\"]', NULL),
(109, 'Sewn Linen Helmet', 'Armor', 1, '[\"armor/Armor-head-sewn-linen.png\"]', NULL),
(110, 'Tailored Linen Helmet', 'Armor', 1, '[\"armor/Grid_Armor-head-tailored-plain-linen.png\"]', NULL),
(111, 'Leather Helmet', 'Armor', 1, '[\"armor/Grid_leather_helmet.png\"]', NULL),
(112, 'Brigandine Helmet', 'Armor', 1, '[\"armor/Armor-head-brigandine-steel.png\"]', '[\"iron\", \"meteoric_iron\", \"steel\"]'),
(113, 'Chain Helmet', 'Armor', 1, '[\"armor/Armor-head-chain-steel.png\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(114, 'Blackguard Helmet', 'Armor', 1, '[\"armor/Armor-head-antique-blackguard-pristine.png\"]', NULL),
(115, 'Forlorn Helmet', 'Armor', 1, '[\"armor/Armor-head-antique-forlorn-pristine.png\"]', NULL),
(116, 'Improvised Armor', 'Armor', 1, '[\"armor/Armor-body-improvised-wood.png\"]', NULL),
(117, 'Lamellar Armor', 'Armor', 1, '[\"armor/Armor-body-lamellar-copper.png\"]', '[\"copper\", \"bismuth_bronze\", \"tin_bronze\", \"black_bronze\"]'),
(118, 'Bear Hide Armor', 'Armor', 1, '[\"armor/Armor-body-hide-bear-black.png\"]', NULL),
(119, 'Sewn Linen Armor', 'Armor', 1, '[\"armor/Armor-body-sewn-linen.png\"]', NULL),
(120, 'Tailored Linen Armor', 'Armor', 1, '[\"armor/Grid_Armor-body-tailored-plain-linen.png\"]', NULL),
(121, 'Leather Jerkin', 'Armor', 1, '[\"armor/Grid_body_leather_jerkin.png\"]', NULL),
(122, 'Leather Body Armor', 'Armor', 1, '[\"armor/Grid_leather_body_armor.png\"]', NULL),
(123, 'Brigandine Armor', 'Armor', 1, '[\"armor/Armor-body-brigandine-steel.png\"]', '[\"iron\", \"meteoric_iron\", \"steel\"]'),
(124, 'Chain Armor', 'Armor', 1, '[\"armor/Armor-body-chain-steel.png\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(125, 'Blackguard Armor', 'Armor', 1, '[\"armor/Armor-body-antique-blackguard-pristine.png\"]', NULL),
(126, 'Forlorn Armor', 'Armor', 1, '[\"armor/Armor-body-antique-forlorn-pristine.png\"]', NULL),
(127, 'Improvised Leggings', 'Armor', 1, '[\"armor/Armor-legs-lamellar-copper.png\"]', NULL),
(128, 'Lamellar Leggings', 'Armor', 1, '[\"armor/Armor-legs-lamellar-copper.png\"]', '[\"copper\", \"bismuth_bronze\", \"tin_bronze\", \"black_bronze\"]'),
(129, 'Bear Hide Leggings', 'Armor', 1, '[\"armor/Armor-legs-hide-bear-black.png\"]', NULL),
(130, 'Sewn Linen Leggings', 'Armor', 1, '[\"armor/Armor-legs-sewn-linen.png\"]', NULL),
(131, 'Tailored Linen Leggings', 'Armor', 1, '[\"armor/Grid_Armor-legs-tailored-plain-linen.png\"]', NULL),
(132, 'Leather Leg Armor', 'Armor', 1, '[\"armor/Grid_leather_leg_armor.png\"]', NULL),
(133, 'Leather Leg Jerkin', 'Armor', 1, '[\"armor/Grid_leg_leather_jerkin.png\"]', NULL),
(134, 'Brigandine Leggings', 'Armor', 1, '[\"armor/Armor-legs-brigandine-steel.png\"]', '[\"iron\", \"meteoric_iron\", \"steel\"]'),
(135, 'Chain Leggings', 'Armor', 1, '[\"armor/Armor-legs-chain-steel.png\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(136, 'Blackguard Leggings', 'Armor', 1, '[\"armor/Armor-legs-antique-blackguard-pristine.png\"]', NULL),
(137, 'Forlorn Leggings', 'Armor', 1, '[\"armor/Armor-legs-antique-forlorn-pristine.png\"]', NULL),
(138, 'Large Gear Section', 'Mechanical', 1, '[\"mechanical/200px-Grid_large_gear_section.png\"]', NULL),
(139, 'Angled Gears', 'Mechanical', 1, '[\"mechanical/Angled_Gears.png\"]', NULL),
(140, 'Straight Chute', 'Mechanical', 1, '[\"mechanical/Chute-straight.png\"]', NULL),
(141, 'Brake', 'Mechanical', 1, '[\"mechanical/Grid_Brake.png\"]', NULL),
(142, 'Chute', 'Mechanical', 1, '[\"mechanical/Grid_chute.png\"]', NULL),
(143, 'Clutch', 'Mechanical', 1, '[\"mechanical/Grid_Clutch.png\"]', NULL),
(144, 'Helve Hammer Base', 'Mechanical', 1, '[\"mechanical/Grid_Helve_hammer_base.png\"]', NULL),
(145, 'Hopper', 'Mechanical', 1, '[\"mechanical/Grid_hopper.png\"]', NULL),
(146, 'Pulverizer Frame', 'Mechanical', 1, '[\"mechanical/Grid_Pulverizer_Frame.png\"]', NULL),
(147, 'Pulverizer Pounder', 'Mechanical', 1, '[\"mechanical/Grid_Pulverizer_Pounder.png\"]', NULL),
(148, 'Pulverizer Toggle', 'Mechanical', 1, '[\"mechanical/Grid_Pulverizer_Toggle.png\"]', NULL),
(149, 'Tin Bronze Helve Hammer', 'Mechanical', 1, '[\"mechanical/Grid_Tin_bronze_helve_hammer.png\"]', NULL),
(150, 'Transmission', 'Mechanical', 1, '[\"mechanical/Grid_Transmission.png\"]', NULL),
(151, 'Wooden Toggle', 'Mechanical', 1, '[\"mechanical/Grid_wooden_toggle.png\"]', NULL),
(152, 'Large Gear', 'Mechanical', 1, '[\"mechanical/Largegear.png\"]', NULL),
(153, 'Quern', 'Mechanical', 1, '[\"mechanical/Quern-granite.png\"]', NULL),
(154, 'Sail', 'Mechanical', 1, '[\"mechanical/Sail.png\"]', NULL),
(155, 'Windmill Rotor', 'Mechanical', 1, '[\"mechanical/Windmill_Rotor.png\"]', NULL),
(156, 'Wooden Axle', 'Mechanical', 1, '[\"mechanical/Wooden_Axle.png\"]', NULL),
(157, 'Ingot', 'Metal', 1, '[\"metals/ingots/Ingot-copper.png\"]', '[\"copper\", \"gold\", \"silver\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(158, 'Ore Nugget', 'Metal', 0, '[\"metals/nuggets/Nugget-malachite.png\"]', '[\"copper\", \"gold\", \"silver\", \"bismuth\", \"lead\", \"tin\", \"zinc\", \"nickel\", \"iron\"]'),
(159, 'Rope', 'Umaterial', 0, NULL, NULL),
(160, 'Nails and Strips', 'Umaterial', 0, NULL, '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(161, 'Cloth', 'Pmaterial', 0, NULL, NULL),
(162, 'Pelt (Small)', 'Umaterial', 0, NULL, NULL),
(163, 'Pelt (Medium)', 'Umaterial', 0, NULL, NULL),
(164, 'Dry Long Bowstave', 'Umaterial', 0, NULL, NULL),
(165, 'Dry Recurve Bowstave', 'Umaterial', 0, NULL, NULL),
(166, 'Sewing Kit', 'Tool', 0, NULL, NULL),
(167, 'Crushed Quartz', 'Umaterial', 0, NULL, NULL),
(168, 'Crushed Bauxite', 'Umaterial', 0, NULL, NULL),
(169, 'Crushed Olivine', 'Umaterial', 0, NULL, NULL),
(170, 'Crushed Ilmenite', 'Umaterial', 0, NULL, NULL),
(171, 'Powdered Calcined Flint', 'Umaterial', 0, NULL, NULL),
(172, 'Fire Clay', 'Pmaterial', 1, NULL, NULL),
(173, 'Clay Brick (Blue)', 'Pmaterial', 1, NULL, NULL),
(174, 'Clay Brick (Brown)', 'Pmaterial', 1, NULL, NULL),
(175, 'Clay Brick (Fire)', 'Pmaterial', 1, NULL, NULL),
(176, 'Clay Brick (Red)', 'Pmaterial', 1, NULL, NULL),
(177, 'Lamellae', 'Fmaterial', 1, NULL, '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(178, 'Bear Pelt Head', 'Umaterial', 0, NULL, NULL),
(179, 'Lamellar Helmet (Wood)', 'Armor', 1, NULL, NULL),
(180, 'Lamellar Armor (Wood)', 'Armor', 1, NULL, NULL),
(181, 'Lamellar Leggings (Wood)', 'Armor', 1, NULL, NULL),
(182, 'Scale Helmet', 'Armor', 1, NULL, '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(183, 'Scale Armor', 'Armor', 1, NULL, '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(184, 'Scale Leggings', 'Armor', 1, NULL, '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(185, 'Plate Helmet', 'Armor', 1, NULL, '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(186, 'Plate Armor', 'Armor', 1, NULL, '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]'),
(187, 'Plate Leggings', 'Armor', 1, NULL, '[\"copper\", \"tin_bronze\", \"bismuth_bronze\", \"black_bronze\", \"iron\", \"meteoric_iron\", \"steel\"]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `METAL`
--

CREATE TABLE `METAL` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `melting_point` float NOT NULL,
  `is_alloy` tinyint(1) NOT NULL DEFAULT '0',
  `composition` json DEFAULT NULL,
  `ingot_image` varchar(255) DEFAULT NULL,
  `nugget_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `METAL`
--

INSERT INTO `METAL` (`id`, `name`, `melting_point`, `is_alloy`, `composition`, `ingot_image`, `nugget_image`) VALUES
(1, 'Copper', 1084, 0, '{\"Copper\": 100}', 'metals/ingots/Ingot-copper.png', 'metals/nuggets/Metalbit-copper.png'),
(2, 'Gold', 1063, 0, '{\"Gold\": 100}', 'metals/ingots/Ingot-gold.png', 'metals/nuggets/Metalbit-gold.png'),
(3, 'Silver', 961, 0, '{\"Silver\": 100}', 'metals/ingots/Ingot-silver.png', 'metals/nuggets/Metalbit-silver.png'),
(4, 'Bismuth', 271, 0, '{\"Bismuth\": 100}', 'metals/ingots/Ingot-bismuth.png', 'metals/nuggets/Metalbit-bismuth.png'),
(5, 'Lead', 327, 0, '{\"Lead\": 100}', 'metals/ingots/Ingot-lead.png', 'metals/nuggets/Metalbit-lead.png'),
(6, 'Tin', 232, 0, '{\"Tin\": 100}', 'metals/ingots/Ingot-tin.png', 'metals/nuggets/Metalbit-tin.png'),
(7, 'Zinc', 419, 0, '{\"Zinc\": 100}', 'metals/ingots/Ingot-zinc.png', 'metals/nuggets/Metalbit-zinc.png'),
(8, 'Nickel', 1325, 0, '{\"Nickel\": 100}', 'metals/ingots/Ingot-nickel.png', 'metals/nuggets/Metalbit-nickel.png'),
(9, 'Iron', 1482, 0, NULL, 'metals/ingots/Ingot-iron.png', 'metals/nuggets/Metalbit-iron.png'),
(10, 'Meteoric Iron', 1476, 0, NULL, 'metals/ingots/Ingot-meteoriciron.png', 'metals/nuggets/Metalbit-meteoriciron.png'),
(11, 'Steel', 1502, 0, NULL, 'metals/ingots/Ingot-steel.png', 'metals/nuggets/Metalbit-steel.png'),
(12, 'Tin Bronze', 950, 1, '{\"Tin\": [8, 12], \"Copper\": [88, 92]}', 'metals/ingots/Ingot-tinbronze.png', 'metals/nuggets/Metalbit-tinbronze.png'),
(13, 'Bismuth Bronze', 850, 1, '{\"Zinc\": [20, 30], \"Copper\": [50, 70], \"Bismuth\": [10, 20]}', 'metals/ingots/Ingot-bismuthbronze.png', 'metals/nuggets/Metalbit-bismuthbronze.png'),
(14, 'Black Bronze', 1020, 1, '{\"Gold\": [8, 16], \"Copper\": [68, 84], \"Silver\": [8, 16]}', 'metals/ingots/Ingot-blackbronze.png', 'metals/nuggets/Metalbit-blackbronze.png'),
(15, 'Brass', 920, 1, '{\"Zinc\": [30, 40], \"Copper\": [60, 70]}', 'metals/ingots/Ingot-brass.png', 'metals/nuggets/Metalbit-brass.png'),
(16, 'Lead Solder', 327, 1, '{\"Tin\": [45, 55], \"Lead\": [45, 55]}', 'metals/ingots/Grid_Leadsolder_Ingot.png', 'metals/nuggets/Metalbit-leadsolder.png'),
(17, 'Molybdochalkos', 902, 1, '{\"Lead\": [88, 92], \"Copper\": [8, 12]}', 'metals/ingots/Ingot-molybdochalkos.png', 'metals/nuggets/Metalbit-molybdochalkos.png'),
(18, 'Silver Solder', 758, 1, '{\"Tin\": [50, 60], \"Silver\": [40, 50]}', 'metals/ingots/Ingot-silversolder.png', 'metals/nuggets/Metalbit-silversolder.png'),
(19, 'Electrum', 1010, 1, '{\"Gold\": [40, 60], \"Silver\": [40, 60]}', 'metals/ingots/Ingot-electrum.png', 'metals/nuggets/Metalbit-electrum.png'),
(20, 'Cupronickel', 1171, 1, '{\"Copper\": [65, 75], \"Nickel\": [25, 35]}', 'metals/ingots/Ingot-cupronickel.png', 'metals/nuggets/Metalbit-cupronickel.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `RECIPE_COMPONENT`
--

CREATE TABLE `RECIPE_COMPONENT` (
  `id` int NOT NULL,
  `recipe_id` int NOT NULL,
  `item_id` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `RECIPE_COMPONENT`
--

INSERT INTO `RECIPE_COMPONENT` (`id`, `recipe_id`, `item_id`, `quantity`) VALUES
(1, 1, 158, 20),
(2, 2, 22, 1),
(3, 3, 46, 2),
(4, 4, 16, 3),
(5, 5, 41, 1),
(6, 6, 17, 1),
(7, 7, 42, 1),
(8, 8, 157, 1),
(9, 9, 157, 1),
(10, 10, 157, 1),
(11, 11, 157, 1),
(12, 12, 157, 1),
(13, 13, 157, 1),
(14, 14, 157, 1),
(15, 15, 157, 2),
(16, 16, 157, 2),
(17, 17, 157, 3),
(18, 18, 58, 1),
(19, 18, 18, 1),
(20, 19, 59, 1),
(21, 19, 18, 1),
(22, 20, 61, 1),
(23, 20, 18, 1),
(24, 21, 70, 1),
(25, 21, 18, 1),
(26, 22, 65, 1),
(27, 22, 18, 1),
(28, 23, 55, 1),
(29, 23, 18, 1),
(30, 24, 75, 2),
(31, 25, 53, 1),
(32, 25, 18, 1),
(33, 26, 43, 14),
(34, 27, 43, 16),
(35, 27, 37, 1),
(36, 28, 71, 11),
(37, 28, 121, 1),
(38, 29, 62, 7),
(39, 29, 121, 1),
(40, 30, 16, 4),
(41, 31, 4, 8),
(42, 31, 171, 1),
(43, 32, 4, 4),
(44, 33, 6, 4),
(45, 34, 5, 4),
(46, 35, 6, 4),
(47, 36, 173, 4),
(48, 37, 174, 4),
(49, 38, 175, 4),
(50, 39, 176, 4),
(51, 40, 172, 2),
(52, 40, 167, 1),
(53, 40, 168, 1),
(54, 41, 47, 1),
(55, 41, 169, 1),
(56, 42, 48, 1),
(57, 42, 170, 1),
(58, 43, 157, 1),
(59, 44, 157, 1),
(60, 45, 157, 1),
(61, 46, 157, 1),
(62, 47, 157, 1),
(63, 48, 157, 1),
(64, 49, 157, 1),
(65, 50, 157, 1),
(66, 51, 157, 1),
(67, 52, 157, 2),
(68, 53, 157, 1),
(69, 54, 157, 4),
(70, 55, 157, 2),
(71, 56, 157, 1),
(72, 57, 157, 1),
(73, 58, 157, 1),
(74, 59, 157, 5),
(75, 60, 157, 5),
(76, 61, 57, 1),
(77, 61, 18, 1),
(78, 62, 60, 1),
(79, 62, 18, 2),
(80, 63, 73, 1),
(81, 64, 63, 1),
(82, 64, 18, 1),
(83, 65, 64, 1),
(84, 65, 18, 1),
(85, 66, 53, 1),
(86, 66, 18, 2),
(87, 67, 18, 2),
(88, 67, 14, 1),
(89, 68, 18, 2),
(90, 68, 160, 1),
(91, 68, 161, 1),
(92, 69, 22, 1),
(93, 70, 18, 2),
(94, 70, 37, 1),
(95, 70, 12, 1),
(96, 71, 37, 5),
(97, 71, 38, 4),
(98, 72, 22, 1),
(99, 73, 52, 1),
(100, 73, 18, 1),
(101, 73, 9, 1),
(102, 74, 66, 1),
(103, 74, 18, 2),
(104, 75, 18, 3),
(105, 75, 159, 3),
(106, 76, 18, 3),
(107, 76, 37, 3),
(108, 77, 37, 3),
(109, 77, 164, 1),
(110, 77, 8, 2),
(111, 77, 43, 1),
(112, 78, 165, 1),
(113, 78, 3, 2),
(114, 78, 2, 2),
(115, 78, 43, 1),
(116, 78, 37, 3),
(117, 79, 159, 1),
(118, 79, 162, 1),
(119, 80, 15, 4),
(120, 80, 14, 3),
(121, 80, 159, 1),
(122, 81, 15, 6),
(123, 81, 14, 4),
(124, 81, 159, 1),
(125, 82, 15, 3),
(126, 82, 14, 2),
(127, 82, 159, 1),
(128, 83, 15, 5),
(129, 83, 163, 1),
(130, 83, 27, 1),
(131, 84, 15, 14),
(132, 84, 40, 1),
(133, 84, 27, 1),
(134, 85, 15, 10),
(135, 85, 40, 1),
(136, 85, 27, 1),
(137, 86, 177, 3),
(138, 86, 162, 1),
(139, 87, 177, 11),
(140, 87, 40, 1),
(141, 88, 177, 5),
(142, 88, 40, 1),
(143, 89, 178, 1),
(144, 89, 2, 2),
(145, 89, 159, 1),
(146, 90, 39, 1),
(147, 90, 2, 8),
(148, 90, 159, 8),
(149, 91, 40, 1),
(150, 91, 2, 4),
(151, 91, 159, 3),
(152, 92, 43, 8),
(153, 93, 43, 10),
(154, 94, 43, 14),
(155, 94, 37, 1),
(156, 95, 45, 3),
(157, 95, 37, 2),
(158, 96, 45, 11),
(159, 97, 45, 5),
(160, 97, 37, 2),
(161, 98, 161, 2),
(162, 98, 37, 2),
(163, 98, 166, 1),
(164, 99, 161, 10),
(165, 99, 166, 1),
(166, 100, 161, 4),
(167, 100, 37, 2),
(168, 100, 166, 1),
(169, 101, 62, 2),
(170, 101, 43, 4),
(171, 102, 62, 4),
(172, 102, 133, 1),
(173, 103, 71, 3),
(174, 104, 71, 6),
(175, 104, 121, 1),
(176, 105, 113, 1),
(177, 105, 72, 2),
(178, 106, 124, 1),
(179, 106, 72, 8),
(180, 107, 135, 1),
(181, 107, 72, 2),
(182, 108, 113, 1),
(183, 108, 62, 3),
(184, 108, 43, 2),
(185, 109, 124, 1),
(186, 109, 62, 8),
(187, 110, 135, 1),
(188, 110, 62, 5),
(189, 111, 38, 5),
(190, 111, 27, 2),
(191, 111, 18, 12),
(192, 112, 18, 2),
(193, 112, 27, 1),
(194, 112, 22, 1),
(195, 112, 8, 1),
(196, 113, 56, 2),
(197, 114, 22, 1),
(198, 114, 156, 1),
(199, 114, 27, 2),
(200, 115, 56, 2),
(201, 116, 38, 8),
(202, 116, 22, 1),
(203, 116, 18, 8),
(204, 116, 27, 2),
(205, 116, 8, 2),
(206, 117, 139, 2),
(207, 117, 38, 8),
(208, 117, 27, 2),
(209, 117, 8, 1),
(210, 118, 138, 4),
(211, 118, 38, 24),
(212, 118, 156, 1),
(213, 119, 62, 3),
(214, 120, 22, 1),
(215, 120, 8, 1),
(216, 121, 22, 2),
(217, 121, 27, 1),
(218, 121, 8, 1),
(219, 122, 18, 6),
(220, 122, 45, 4),
(221, 123, 12, 1),
(222, 123, 38, 42),
(223, 124, 156, 1),
(224, 124, 62, 1),
(225, 125, 22, 3),
(226, 126, 67, 1),
(227, 126, 38, 8),
(228, 127, 38, 3),
(229, 127, 27, 1),
(230, 128, 38, 8),
(231, 128, 156, 1),
(232, 128, 27, 4),
(233, 128, 8, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `CRAFTING_RECIPE`
--
ALTER TABLE `CRAFTING_RECIPE`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indices de la tabla `ITEM`
--
ALTER TABLE `ITEM`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `METAL`
--
ALTER TABLE `METAL`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `RECIPE_COMPONENT`
--
ALTER TABLE `RECIPE_COMPONENT`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recipe_id` (`recipe_id`),
  ADD KEY `item_id` (`item_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `CRAFTING_RECIPE`
--
ALTER TABLE `CRAFTING_RECIPE`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT de la tabla `ITEM`
--
ALTER TABLE `ITEM`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT de la tabla `METAL`
--
ALTER TABLE `METAL`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `RECIPE_COMPONENT`
--
ALTER TABLE `RECIPE_COMPONENT`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=234;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `CRAFTING_RECIPE`
--
ALTER TABLE `CRAFTING_RECIPE`
  ADD CONSTRAINT `CRAFTING_RECIPE_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `ITEM` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `RECIPE_COMPONENT`
--
ALTER TABLE `RECIPE_COMPONENT`
  ADD CONSTRAINT `RECIPE_COMPONENT_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `CRAFTING_RECIPE` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `RECIPE_COMPONENT_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `ITEM` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
