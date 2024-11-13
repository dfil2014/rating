-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 03 2021 г., 18:44
-- Версия сервера: 5.7.19
-- Версия PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `rat`
--

-- --------------------------------------------------------

--
-- Структура таблицы `criterion`
--

DROP TABLE IF EXISTS `criterion`;
CREATE TABLE IF NOT EXISTS `criterion` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) NOT NULL,
  `theme_id` int(50) NOT NULL,
  `criterion` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `theme_id` (`theme_id`),
  KEY `UID` (`UID`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `criterion`
--

INSERT INTO `criterion` (`ID`, `UID`, `theme_id`, `criterion`) VALUES
(20, 2, 4, 'Краткий и понятной текст'),
(21, 2, 4, 'Присутствие заголовков'),
(22, 2, 4, 'Информативность'),
(24, 2, 4, 'Наглядность и наличие иллюстраций'),
(25, 2, 4, 'Оригинальность'),
(26, 2, 4, 'Слайды выполнены самостоятельно'),
(27, 2, 4, 'Слайды выполнены в едином стиле'),
(28, 2, 5, 'название занятия, характеристика занятия; '),
(29, 2, 5, 'практическое назначение; '),
(30, 2, 5, 'набор инструментов, используемых для создания заня'),
(31, 2, 5, 'самоанализ результатов работы.'),
(32, 2, 5, 'время защиты в промежутке 4:30-5:00 минут.'),
(33, 2, 5, 'Оформление презентации'),
(34, 2, 5, 'Оригинальность'),
(35, 2, 6, 'Ясная, чёткая речь'),
(36, 2, 6, 'Присутствие иллюстраций'),
(37, 2, 6, 'Содержание привлекает внимание'),
(38, 2, 6, 'Полностью охвачена тема'),
(39, 2, 6, 'Выступление всех участников'),
(40, 2, 7, 'Ясная, чёткая речь'),
(41, 2, 7, 'Присутствие иллюстраций'),
(42, 2, 7, 'Содержание привлекает внимание'),
(43, 2, 7, 'Полностью охвачена тема'),
(44, 2, 7, 'Выступление всех участников'),
(45, 2, 8, 'Определение «Компьютерное рабочее место»'),
(46, 2, 8, 'Определение «Эргономика»'),
(47, 2, 8, 'Ответ на вопрос: «Взаимосвязь эргономики с компьют'),
(48, 2, 8, 'Требования к организации компьютерного рабочего ме'),
(49, 2, 8, 'Определение «Переферийное устройство»'),
(50, 2, 8, 'Устройства ввода'),
(51, 2, 8, 'Устройства вывода'),
(52, 2, 8, 'Устройства хранения данных'),
(53, 2, 8, 'Устройства обмена данными'),
(54, 2, 8, 'Фотографии переферийных устройств'),
(55, 2, 8, 'Подробный отчёт о соответствии домашнего рабочего '),
(56, 2, 9, 'Определение «Компьютерное рабочее место»'),
(57, 2, 9, 'Определение «Эргономика»'),
(58, 2, 9, 'Ответ на вопрос: «Взаимосвязь эргономики с компьют'),
(59, 2, 9, 'Требования к организации компьютерного рабочего ме'),
(60, 2, 9, 'Определение «Переферийное устройство»'),
(61, 2, 9, 'Устройства ввода'),
(62, 2, 9, 'Устройства вывода'),
(63, 2, 9, 'Устройства хранения данных'),
(64, 2, 9, 'Устройства обмена данными'),
(65, 2, 9, 'Фотографии переферийных устройств'),
(66, 2, 9, 'Подробный отчёт о соответствии домашнего рабочего '),
(67, 2, 10, 'Определение «Компьютерное рабочее место»'),
(68, 2, 10, 'Определение «Эргономика»'),
(69, 2, 10, 'Ответ на вопрос: «Взаимосвязь эргономики с компьют'),
(70, 2, 10, 'Требования к организации компьютерного рабочего ме'),
(71, 2, 10, 'Определение «Переферийное устройство»'),
(72, 2, 10, 'Устройства ввода'),
(73, 2, 10, 'Устройства вывода'),
(74, 2, 10, 'Устройства хранения данных'),
(75, 2, 10, 'Устройства обмена данными'),
(76, 2, 10, 'Фотографии переферийных устройств'),
(77, 2, 10, 'Подробный отчёт о соответствии домашнего рабочего ');

-- --------------------------------------------------------

--
-- Структура таблицы `expert`
--

DROP TABLE IF EXISTS `expert`;
CREATE TABLE IF NOT EXISTS `expert` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `pass` int(6) NOT NULL,
  `UID` int(11) NOT NULL,
  `theme_id` int(50) NOT NULL,
  `expert` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `theme_id` (`theme_id`),
  KEY `UID` (`UID`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `expert`
--

INSERT INTO `expert` (`ID`, `pass`, `UID`, `theme_id`, `expert`) VALUES
(26, 132339, 2, 4, 'Лукоянова'),
(27, 686109, 2, 4, 'Маркова'),
(28, 919120, 2, 4, 'Петренко'),
(29, 86307, 2, 4, 'Попова'),
(30, 648359, 2, 4, 'Пушкина'),
(31, 659525, 2, 4, 'Сергеева'),
(32, 746343, 2, 4, 'Смогулова'),
(33, 313944, 2, 4, 'Степаненко'),
(34, 857888, 2, 4, 'Федянина'),
(35, 465716, 2, 4, 'Филатова'),
(36, 629257, 2, 4, 'Чайникова'),
(37, 121790, 2, 4, 'Шишкина'),
(38, 896729, 2, 4, 'Шушкова'),
(39, 351499, 2, 5, 'Хасанова Ю.'),
(40, 926848, 2, 5, 'Ожиганова А.'),
(41, 687517, 2, 5, 'Охотникова Д.'),
(42, 83028, 2, 5, 'Бельтюкова Е.'),
(43, 504272, 2, 5, 'Липина Е.'),
(44, 498291, 2, 5, 'Печникова П.'),
(46, 677345, 2, 5, 'Тест'),
(47, 128398, 2, 5, 'Рогозина А.'),
(48, 193265, 2, 5, 'Макарова Я.'),
(49, 186708, 2, 6, 'Эксперт 1'),
(51, 625699, 2, 7, 'Эксперт 1'),
(52, 733369, 2, 7, 'Эксперт 2'),
(53, 317183, 2, 8, 'Эксперт 1'),
(54, 23265, 2, 9, 'Эксперт 1'),
(55, 508409, 2, 10, 'Эксперт 1');

-- --------------------------------------------------------

--
-- Структура таблицы `name`
--

DROP TABLE IF EXISTS `name`;
CREATE TABLE IF NOT EXISTS `name` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) NOT NULL,
  `theme_id` int(50) NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`),
  KEY `ID_2` (`ID`),
  KEY `UID` (`UID`),
  KEY `theme_id` (`theme_id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `name`
--

INSERT INTO `name` (`ID`, `UID`, `theme_id`, `name`) VALUES
(14, 2, 4, '1'),
(15, 2, 4, '2'),
(16, 2, 4, '3'),
(17, 2, 4, '4'),
(18, 2, 4, '5'),
(19, 2, 4, '6'),
(20, 2, 4, '7'),
(21, 2, 4, '8'),
(22, 2, 5, 'Хасанова и Ю., Ожиганова А.'),
(23, 2, 5, 'Охотникова Д., Бельтюкова Е.'),
(24, 2, 5, 'Липина Е.'),
(25, 2, 5, 'Печникова П., Макарова Я.'),
(26, 2, 5, 'Рогозина А.'),
(27, 2, 6, 'Правила работы за компьютером'),
(28, 2, 6, 'Праавильная рабочая поза'),
(29, 2, 6, 'Организация компьютерного рабочего места'),
(30, 2, 6, 'Упражнения для снятия усталости'),
(31, 2, 7, '1'),
(32, 2, 7, '2'),
(33, 2, 7, '3'),
(34, 2, 7, '4'),
(35, 2, 8, 'Зайцева'),
(36, 2, 8, 'Кулакова'),
(37, 2, 8, 'Михайлова'),
(38, 2, 8, 'Мурина'),
(39, 2, 8, 'Николаев'),
(40, 2, 8, 'Никонов'),
(41, 2, 8, 'Павлов'),
(42, 2, 8, 'Попова'),
(43, 2, 8, 'Пересада'),
(44, 2, 8, 'Сергеева Анжелика'),
(45, 2, 8, 'Сергеева Марина'),
(46, 2, 8, 'Чугунова'),
(47, 2, 8, 'Шалашова'),
(48, 2, 9, 'Куркова Ксения'),
(49, 2, 9, 'Лалетина Яна'),
(50, 2, 9, 'Никитина Юлия'),
(51, 2, 9, 'Подьячева Диана'),
(52, 2, 9, 'Поздеева Арина'),
(53, 2, 9, 'Решетникова Екатерина'),
(54, 2, 9, 'Румянцева Мрагарита'),
(55, 2, 9, 'Русских Анастасия'),
(56, 2, 9, 'Сагдиева Расиля'),
(57, 2, 9, 'Скурихина Виктория'),
(58, 2, 9, 'Соловьёва Ирина'),
(59, 2, 9, 'Чернова Ангелина'),
(60, 2, 9, 'Чернышева Вероника'),
(61, 2, 10, 'Обухова'),
(62, 2, 10, 'Петрушкин'),
(63, 2, 10, 'Прокопьев'),
(64, 2, 10, 'Пудов'),
(65, 2, 10, 'Рябова'),
(66, 2, 10, 'Тарасов'),
(67, 2, 10, 'Тихонов'),
(68, 2, 10, 'Урекьян'),
(69, 2, 10, 'Фёдоров'),
(70, 2, 10, 'Халикова'),
(71, 2, 10, 'Цветкова'),
(72, 2, 10, 'Чернов'),
(73, 2, 10, 'Якушев');

-- --------------------------------------------------------

--
-- Структура таблицы `rating`
--

DROP TABLE IF EXISTS `rating`;
CREATE TABLE IF NOT EXISTS `rating` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) NOT NULL,
  `theme_id` int(50) NOT NULL,
  `expert` int(11) NOT NULL,
  `name_id` int(11) NOT NULL,
  `criterion` int(11) NOT NULL,
  `score` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `criterion` (`criterion`),
  KEY `name_id` (`name_id`),
  KEY `expert` (`expert`),
  KEY `UID` (`UID`),
  KEY `theme_id` (`theme_id`)
) ENGINE=InnoDB AUTO_INCREMENT=485 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `rating`
--

INSERT INTO `rating` (`ID`, `UID`, `theme_id`, `expert`, `name_id`, `criterion`, `score`) VALUES
(1, 2, 4, 34, 14, 20, 2),
(2, 2, 4, 34, 14, 21, 2),
(3, 2, 4, 34, 14, 22, 2),
(4, 2, 4, 34, 14, 24, 1),
(5, 2, 4, 34, 14, 25, 1),
(6, 2, 4, 34, 14, 26, 2),
(7, 2, 4, 34, 14, 27, 2),
(8, 2, 4, 26, 14, 20, 3),
(9, 2, 4, 26, 14, 21, 3),
(10, 2, 4, 26, 14, 22, 3),
(11, 2, 4, 26, 14, 24, 2),
(12, 2, 4, 26, 14, 25, 1.5),
(13, 2, 4, 26, 14, 26, 0),
(14, 2, 4, 26, 14, 27, 3),
(15, 2, 4, 32, 14, 20, 2),
(16, 2, 4, 32, 14, 21, 2),
(17, 2, 4, 32, 14, 22, 2),
(18, 2, 4, 32, 14, 25, 2),
(19, 2, 4, 32, 14, 26, 2),
(20, 2, 4, 32, 14, 27, 2),
(21, 2, 4, 37, 14, 20, 2),
(22, 2, 4, 37, 14, 21, 2),
(23, 2, 4, 37, 14, 22, 2),
(24, 2, 4, 37, 14, 24, 2),
(25, 2, 4, 37, 14, 25, 0),
(26, 2, 4, 37, 14, 26, 1),
(27, 2, 4, 37, 14, 27, 2),
(28, 2, 4, 35, 14, 20, 3),
(29, 2, 4, 35, 14, 21, 3),
(30, 2, 4, 35, 14, 22, 3),
(31, 2, 4, 35, 14, 25, 1.5),
(32, 2, 4, 35, 14, 26, 0),
(33, 2, 4, 35, 14, 27, 3),
(34, 2, 4, 33, 14, 20, 1),
(35, 2, 4, 33, 14, 21, 2),
(36, 2, 4, 33, 14, 22, 1),
(37, 2, 4, 33, 14, 24, 0),
(38, 2, 4, 33, 14, 25, 1),
(39, 2, 4, 33, 14, 26, 1),
(40, 2, 4, 33, 14, 27, 1),
(41, 2, 4, 38, 14, 20, 1),
(42, 2, 4, 38, 14, 21, 2),
(43, 2, 4, 38, 14, 22, 2),
(44, 2, 4, 38, 14, 24, 1),
(45, 2, 4, 38, 14, 25, 1),
(46, 2, 4, 38, 14, 26, 2),
(47, 2, 4, 38, 14, 27, 2),
(48, 2, 4, 26, 15, 20, 1),
(49, 2, 4, 26, 15, 21, 2),
(50, 2, 4, 26, 15, 22, 1),
(51, 2, 4, 26, 15, 24, 1),
(52, 2, 4, 26, 15, 25, 0),
(53, 2, 4, 26, 15, 26, 0),
(54, 2, 4, 26, 15, 27, 1),
(55, 2, 4, 27, 14, 20, 2),
(56, 2, 4, 27, 14, 21, 2),
(57, 2, 4, 27, 14, 22, 2),
(58, 2, 4, 27, 14, 24, 2),
(59, 2, 4, 27, 14, 25, 2),
(60, 2, 4, 27, 14, 26, 2),
(61, 2, 4, 27, 14, 27, 2),
(62, 2, 4, 27, 15, 20, 2),
(63, 2, 4, 27, 15, 21, 2),
(64, 2, 4, 27, 15, 22, 2),
(65, 2, 4, 27, 15, 24, 2),
(66, 2, 4, 27, 15, 25, 1),
(67, 2, 4, 27, 15, 26, 0),
(68, 2, 4, 27, 15, 27, 0),
(69, 2, 4, 38, 15, 20, 2),
(70, 2, 4, 38, 15, 21, 2),
(71, 2, 4, 38, 15, 22, 2),
(72, 2, 4, 38, 15, 24, 2),
(73, 2, 4, 38, 15, 25, 2),
(74, 2, 4, 38, 15, 26, 1),
(75, 2, 4, 38, 15, 27, 0),
(76, 2, 4, 34, 15, 20, 2),
(77, 2, 4, 34, 15, 21, 2),
(78, 2, 4, 34, 15, 22, 2),
(79, 2, 4, 32, 15, 20, 2),
(80, 2, 4, 34, 15, 24, 2),
(81, 2, 4, 34, 15, 25, 1),
(82, 2, 4, 34, 15, 26, 0),
(83, 2, 4, 32, 15, 21, 2),
(84, 2, 4, 34, 15, 27, 0),
(85, 2, 4, 32, 15, 22, 2),
(86, 2, 4, 32, 15, 24, 2),
(87, 2, 4, 32, 15, 25, 0),
(88, 2, 4, 32, 15, 26, 0),
(89, 2, 4, 32, 15, 27, 0),
(90, 2, 4, 37, 15, 20, 1),
(91, 2, 4, 37, 15, 21, 2),
(92, 2, 4, 37, 15, 22, 2),
(93, 2, 4, 37, 15, 24, 1),
(94, 2, 4, 37, 15, 25, 0),
(95, 2, 4, 37, 15, 26, 0),
(96, 2, 4, 37, 15, 27, 1),
(97, 2, 4, 28, 15, 20, 2),
(98, 2, 4, 28, 15, 21, 2),
(99, 2, 4, 28, 15, 22, 2),
(100, 2, 4, 28, 15, 24, 2),
(101, 2, 4, 28, 15, 25, 2),
(102, 2, 4, 28, 15, 26, 0),
(103, 2, 4, 28, 15, 27, 2),
(104, 2, 4, 34, 16, 20, 2),
(105, 2, 4, 34, 16, 21, 2),
(106, 2, 4, 34, 16, 22, 2),
(107, 2, 4, 34, 16, 24, 2),
(108, 2, 4, 34, 16, 25, 2),
(109, 2, 4, 34, 16, 26, 2),
(110, 2, 4, 34, 16, 27, 2),
(111, 2, 4, 27, 16, 20, 1.8),
(112, 2, 4, 27, 16, 21, 2),
(113, 2, 4, 27, 16, 22, 1.8),
(114, 2, 4, 27, 16, 24, 2),
(115, 2, 4, 27, 16, 25, 2),
(116, 2, 4, 27, 16, 26, 2),
(117, 2, 4, 27, 16, 27, 2),
(118, 2, 4, 26, 16, 20, 1.8),
(119, 2, 4, 26, 16, 21, 2),
(120, 2, 4, 26, 16, 22, 1.8),
(121, 2, 4, 26, 16, 24, 2),
(122, 2, 4, 26, 16, 25, 2),
(123, 2, 4, 26, 16, 26, 2),
(124, 2, 4, 26, 16, 27, 2),
(125, 2, 4, 38, 16, 20, 1),
(126, 2, 4, 38, 16, 21, 2),
(127, 2, 4, 38, 16, 22, 2),
(128, 2, 4, 38, 16, 24, 2),
(129, 2, 4, 38, 16, 25, 2),
(130, 2, 4, 38, 16, 26, 1),
(131, 2, 4, 38, 16, 27, 2),
(132, 2, 4, 32, 16, 20, 1.5),
(133, 2, 4, 32, 16, 21, 2),
(134, 2, 4, 32, 16, 22, 2),
(135, 2, 4, 32, 16, 24, 1.5),
(136, 2, 4, 32, 16, 25, 1),
(137, 2, 4, 32, 16, 26, 1),
(138, 2, 4, 32, 16, 27, 2),
(139, 2, 4, 28, 16, 20, 2),
(140, 2, 4, 28, 16, 21, 1.5),
(141, 2, 4, 28, 16, 22, 2),
(142, 2, 4, 28, 16, 24, 1.5),
(143, 2, 4, 28, 16, 25, 2),
(144, 2, 4, 28, 16, 26, 1),
(145, 2, 4, 28, 16, 27, 2),
(146, 2, 4, 37, 16, 20, 1),
(147, 2, 4, 37, 16, 21, 1),
(148, 2, 4, 37, 16, 22, 2),
(149, 2, 4, 37, 16, 24, 1.5),
(150, 2, 4, 37, 16, 25, 0),
(151, 2, 4, 37, 16, 26, 2),
(152, 2, 4, 37, 16, 27, 2),
(153, 2, 4, 34, 17, 20, 2),
(154, 2, 4, 34, 17, 21, 2),
(155, 2, 4, 34, 17, 22, 2),
(156, 2, 4, 34, 17, 24, 1),
(157, 2, 4, 34, 17, 25, 2),
(158, 2, 4, 34, 17, 26, 2),
(159, 2, 4, 34, 17, 27, 2),
(160, 2, 4, 38, 17, 20, 1),
(161, 2, 4, 38, 17, 21, 2),
(162, 2, 4, 38, 17, 22, 2),
(163, 2, 4, 38, 17, 24, 2),
(164, 2, 4, 38, 17, 25, 2),
(165, 2, 4, 38, 17, 26, 2),
(166, 2, 4, 38, 17, 27, 2),
(167, 2, 4, 28, 17, 20, 2),
(168, 2, 4, 28, 17, 21, 1),
(169, 2, 4, 28, 17, 22, 2),
(170, 2, 4, 28, 17, 24, 1),
(171, 2, 4, 28, 17, 25, 1),
(172, 2, 4, 28, 17, 26, 2),
(173, 2, 4, 28, 17, 27, 2),
(174, 2, 4, 26, 17, 20, 2),
(175, 2, 4, 26, 17, 21, 2),
(176, 2, 4, 26, 17, 22, 2),
(177, 2, 4, 26, 17, 24, 1.5),
(178, 2, 4, 26, 17, 25, 1),
(179, 2, 4, 26, 17, 26, 1.5),
(180, 2, 4, 26, 17, 27, 2),
(181, 2, 4, 37, 17, 20, 2),
(182, 2, 4, 37, 17, 21, 2),
(183, 2, 4, 37, 17, 22, 2),
(184, 2, 4, 37, 17, 24, 1),
(185, 2, 4, 37, 17, 25, 0),
(186, 2, 4, 37, 17, 26, 2),
(187, 2, 4, 37, 17, 27, 2),
(188, 2, 4, 27, 17, 20, 1.5),
(189, 2, 4, 27, 17, 21, 2),
(190, 2, 4, 27, 17, 22, 1),
(191, 2, 4, 27, 17, 24, 1),
(192, 2, 4, 27, 17, 25, 2),
(193, 2, 4, 27, 17, 26, 2),
(194, 2, 4, 27, 17, 27, 2),
(195, 2, 4, 32, 17, 20, 1),
(196, 2, 4, 32, 17, 21, 2),
(197, 2, 4, 32, 17, 22, 2),
(198, 2, 4, 32, 17, 24, 1),
(199, 2, 4, 32, 17, 25, 2),
(200, 2, 4, 32, 17, 26, 2),
(201, 2, 4, 32, 17, 27, 2),
(202, 2, 4, 38, 18, 20, 1),
(203, 2, 4, 38, 18, 21, 0),
(204, 2, 4, 38, 18, 22, 2),
(205, 2, 4, 38, 18, 24, 2),
(206, 2, 4, 38, 18, 25, 2),
(207, 2, 4, 38, 18, 26, 2),
(208, 2, 4, 38, 18, 27, 2),
(209, 2, 4, 37, 18, 20, 1.5),
(210, 2, 4, 37, 18, 21, 1),
(211, 2, 4, 37, 18, 22, 2),
(212, 2, 4, 37, 18, 24, 2),
(213, 2, 4, 37, 18, 25, 0),
(214, 2, 4, 37, 18, 26, 2),
(215, 2, 4, 37, 18, 27, 2),
(216, 2, 4, 26, 18, 20, 1),
(217, 2, 4, 26, 18, 21, 0),
(218, 2, 4, 26, 18, 22, 0.5),
(219, 2, 4, 26, 18, 24, 0),
(220, 2, 4, 26, 18, 25, 1),
(221, 2, 4, 26, 18, 26, 0.5),
(222, 2, 4, 26, 18, 27, 0.5),
(223, 2, 4, 28, 18, 20, 2),
(224, 2, 4, 28, 18, 21, 1),
(225, 2, 4, 28, 18, 22, 2),
(226, 2, 4, 28, 18, 24, 2),
(227, 2, 4, 28, 18, 25, 2),
(228, 2, 4, 28, 18, 26, 2),
(229, 2, 4, 28, 18, 27, 2),
(230, 2, 4, 32, 18, 20, 2),
(231, 2, 4, 32, 18, 21, 1),
(232, 2, 4, 32, 18, 22, 2),
(233, 2, 4, 32, 18, 24, 2),
(234, 2, 4, 32, 18, 25, 1),
(235, 2, 4, 32, 18, 26, 2),
(236, 2, 4, 32, 18, 27, 2),
(237, 2, 4, 27, 18, 20, 2),
(238, 2, 4, 27, 18, 21, 2),
(239, 2, 4, 27, 18, 22, 2),
(240, 2, 4, 27, 18, 24, 2),
(241, 2, 4, 27, 18, 25, 2),
(242, 2, 4, 27, 18, 26, 2),
(243, 2, 4, 27, 18, 27, 2),
(244, 2, 4, 34, 18, 20, 2),
(245, 2, 4, 34, 18, 21, 1),
(246, 2, 4, 34, 18, 22, 2),
(247, 2, 4, 34, 18, 24, 2),
(248, 2, 4, 34, 18, 25, 1),
(249, 2, 4, 34, 18, 26, 2),
(250, 2, 4, 34, 18, 27, 2),
(251, 2, 4, 26, 19, 20, 2),
(252, 2, 4, 26, 19, 21, 2),
(253, 2, 4, 26, 19, 22, 2),
(254, 2, 4, 26, 19, 24, 1.5),
(255, 2, 4, 26, 19, 25, 1),
(256, 2, 4, 26, 19, 26, 2),
(257, 2, 4, 26, 19, 27, 2),
(258, 2, 4, 34, 19, 20, 2),
(259, 2, 4, 34, 19, 21, 2),
(260, 2, 4, 34, 19, 22, 2),
(261, 2, 4, 34, 19, 24, 2),
(262, 2, 4, 34, 19, 25, 2),
(263, 2, 4, 34, 19, 26, 2),
(264, 2, 4, 34, 19, 27, 2),
(265, 2, 4, 38, 19, 20, 2),
(266, 2, 4, 38, 19, 21, 2),
(267, 2, 4, 38, 19, 22, 2),
(268, 2, 4, 38, 19, 24, 2),
(269, 2, 4, 38, 19, 25, 2),
(270, 2, 4, 38, 19, 26, 2),
(271, 2, 4, 38, 19, 27, 2),
(272, 2, 4, 27, 19, 20, 2),
(273, 2, 4, 27, 19, 21, 2),
(274, 2, 4, 27, 19, 22, 1.5),
(275, 2, 4, 27, 19, 24, 2),
(276, 2, 4, 27, 19, 25, 1),
(277, 2, 4, 27, 19, 26, 2),
(278, 2, 4, 27, 19, 27, 2),
(279, 2, 4, 34, 20, 20, 2),
(280, 2, 4, 34, 20, 21, 2),
(281, 2, 4, 34, 20, 22, 2),
(282, 2, 4, 34, 20, 24, 1),
(283, 2, 4, 34, 20, 25, 2),
(284, 2, 4, 34, 20, 26, 2),
(285, 2, 4, 34, 20, 27, 2),
(286, 2, 4, 38, 20, 20, 1),
(287, 2, 4, 38, 20, 21, 2),
(288, 2, 4, 38, 20, 22, 2),
(289, 2, 4, 38, 20, 24, 2),
(290, 2, 4, 38, 20, 25, 2),
(291, 2, 4, 38, 20, 26, 2),
(292, 2, 4, 38, 20, 27, 2),
(293, 2, 4, 26, 20, 20, 2),
(294, 2, 4, 26, 20, 21, 2),
(295, 2, 4, 26, 20, 22, 2),
(296, 2, 4, 26, 20, 24, 2),
(297, 2, 4, 26, 20, 25, 1.5),
(298, 2, 4, 26, 20, 26, 2),
(299, 2, 4, 26, 20, 27, 2),
(300, 2, 4, 27, 20, 20, 2),
(301, 2, 4, 27, 20, 21, 2),
(302, 2, 4, 27, 20, 22, 2),
(303, 2, 4, 27, 20, 24, 1.8),
(304, 2, 4, 27, 20, 25, 2),
(305, 2, 4, 27, 20, 26, 2),
(306, 2, 4, 27, 20, 27, 2),
(307, 2, 4, 26, 21, 20, 2),
(308, 2, 4, 26, 21, 21, 2),
(309, 2, 4, 26, 21, 22, 2),
(310, 2, 4, 26, 21, 24, 2),
(311, 2, 4, 26, 21, 25, 2),
(312, 2, 4, 26, 21, 26, 2),
(313, 2, 4, 26, 21, 27, 2),
(314, 2, 4, 27, 21, 20, 2),
(315, 2, 4, 27, 21, 21, 2),
(316, 2, 4, 27, 21, 22, 2),
(317, 2, 4, 27, 21, 24, 2),
(318, 2, 4, 27, 21, 25, 2),
(319, 2, 4, 27, 21, 26, 2),
(320, 2, 4, 27, 21, 27, 2),
(321, 2, 4, 38, 21, 20, 1),
(322, 2, 4, 38, 21, 21, 2),
(323, 2, 4, 38, 21, 22, 2),
(324, 2, 4, 38, 21, 24, 2),
(325, 2, 4, 38, 21, 25, 2),
(326, 2, 4, 38, 21, 26, 1),
(327, 2, 4, 38, 21, 27, 2),
(328, 2, 4, 34, 21, 20, 2),
(329, 2, 4, 34, 21, 21, 2),
(330, 2, 4, 34, 21, 22, 2),
(331, 2, 4, 34, 21, 24, 2),
(332, 2, 4, 34, 21, 25, 2),
(333, 2, 4, 34, 21, 26, 2),
(334, 2, 4, 34, 21, 27, 2),
(335, 2, 5, 46, 24, 28, 1),
(336, 2, 5, 46, 24, 29, 0),
(337, 2, 5, 46, 24, 30, 0),
(338, 2, 5, 46, 24, 31, 0),
(339, 2, 5, 46, 24, 32, 0),
(340, 2, 5, 46, 24, 33, 0),
(341, 2, 5, 46, 24, 34, 0),
(342, 2, 5, 48, 23, 28, 2),
(343, 2, 5, 48, 23, 29, 2),
(344, 2, 5, 48, 23, 30, 2),
(345, 2, 5, 48, 23, 31, 2),
(346, 2, 5, 48, 23, 32, 2),
(347, 2, 5, 48, 23, 33, 2),
(348, 2, 5, 48, 23, 34, 2),
(349, 2, 5, 46, 23, 28, 2),
(350, 2, 5, 46, 23, 29, 2),
(351, 2, 5, 46, 23, 30, 2),
(352, 2, 5, 46, 23, 31, 0),
(353, 2, 5, 46, 23, 32, 0),
(354, 2, 5, 46, 23, 33, 1),
(355, 2, 5, 46, 23, 34, 0),
(356, 2, 5, 43, 23, 28, 2),
(357, 2, 5, 43, 23, 29, 2),
(358, 2, 5, 43, 23, 30, 1),
(359, 2, 5, 43, 23, 31, 0),
(360, 2, 5, 43, 23, 32, 2),
(361, 2, 5, 43, 23, 33, 1),
(362, 2, 5, 43, 23, 34, 1),
(363, 2, 5, 44, 23, 28, 2),
(364, 2, 5, 44, 23, 29, 2),
(365, 2, 5, 44, 23, 30, 2),
(366, 2, 5, 44, 23, 31, 2),
(367, 2, 5, 44, 23, 32, 2),
(368, 2, 5, 44, 23, 33, 1),
(369, 2, 5, 44, 23, 34, 2),
(370, 2, 5, 39, 23, 28, 2),
(371, 2, 5, 39, 23, 29, 2),
(372, 2, 5, 39, 23, 30, 2),
(373, 2, 5, 39, 23, 31, 0),
(374, 2, 5, 39, 23, 32, 0),
(375, 2, 5, 39, 23, 33, 2),
(376, 2, 5, 39, 23, 34, 2),
(377, 2, 5, 40, 23, 28, 2),
(378, 2, 5, 40, 23, 29, 2),
(379, 2, 5, 40, 23, 30, 2),
(380, 2, 5, 40, 23, 32, 2),
(381, 2, 5, 40, 23, 34, 2),
(382, 2, 5, 47, 23, 28, 2),
(383, 2, 5, 47, 23, 29, 1),
(384, 2, 5, 47, 23, 30, 2),
(385, 2, 5, 47, 23, 31, 0),
(386, 2, 5, 47, 23, 32, 2),
(387, 2, 5, 47, 23, 33, 1),
(388, 2, 5, 47, 23, 34, 1),
(389, 2, 5, 47, 22, 28, 2),
(390, 2, 5, 47, 22, 29, 2),
(391, 2, 5, 47, 22, 30, 1),
(392, 2, 5, 47, 22, 31, 0),
(393, 2, 5, 47, 22, 32, 2),
(394, 2, 5, 47, 22, 33, 2),
(395, 2, 5, 47, 22, 34, 1),
(396, 2, 5, 48, 22, 28, 2),
(397, 2, 5, 48, 22, 29, 2),
(398, 2, 5, 48, 22, 30, 2),
(399, 2, 5, 48, 22, 31, 2),
(400, 2, 5, 48, 22, 33, 2),
(401, 2, 5, 48, 22, 34, 2),
(402, 2, 5, 43, 22, 28, 2),
(403, 2, 5, 43, 22, 29, 2),
(404, 2, 5, 43, 22, 30, 1),
(405, 2, 5, 43, 22, 31, 0),
(406, 2, 5, 43, 22, 32, 2),
(407, 2, 5, 43, 22, 33, 1),
(408, 2, 5, 43, 22, 34, 1),
(409, 2, 5, 39, 22, 28, 0),
(410, 2, 5, 39, 22, 29, 0),
(411, 2, 5, 39, 22, 30, 0),
(412, 2, 5, 39, 22, 31, 0),
(413, 2, 5, 39, 22, 32, 0),
(414, 2, 5, 39, 22, 33, 0),
(415, 2, 5, 39, 22, 34, 0),
(416, 2, 5, 46, 22, 28, 2),
(417, 2, 5, 46, 22, 29, 2),
(418, 2, 5, 46, 22, 30, 2),
(419, 2, 5, 46, 22, 31, 0),
(420, 2, 5, 46, 22, 32, 0),
(421, 2, 5, 46, 22, 33, 2),
(422, 2, 5, 46, 22, 34, 1),
(423, 2, 5, 40, 23, 31, 0),
(424, 2, 5, 41, 22, 28, 2),
(425, 2, 5, 41, 22, 29, 2),
(426, 2, 5, 41, 22, 30, 2),
(427, 2, 5, 41, 22, 31, 0),
(428, 2, 5, 41, 22, 32, 0),
(429, 2, 5, 41, 22, 33, 2),
(430, 2, 5, 41, 22, 34, 2),
(431, 2, 5, 42, 22, 28, 2),
(432, 2, 5, 42, 22, 29, 2),
(433, 2, 5, 42, 22, 30, 0),
(434, 2, 5, 42, 22, 31, 0),
(435, 2, 5, 42, 22, 32, 0),
(436, 2, 5, 42, 22, 33, 2),
(437, 2, 5, 42, 22, 34, 2),
(438, 2, 5, 44, 22, 28, 2),
(439, 2, 5, 44, 22, 29, 2),
(440, 2, 5, 44, 22, 30, 2),
(441, 2, 5, 44, 22, 31, 2),
(442, 2, 5, 44, 22, 32, 2),
(443, 2, 5, 44, 22, 33, 2),
(444, 2, 5, 44, 22, 34, 2),
(445, 2, 6, 49, 27, 36, 2),
(446, 2, 6, 49, 27, 39, 2),
(447, 2, 6, 49, 27, 35, 1.8),
(448, 2, 6, 49, 27, 37, 1.9),
(449, 2, 6, 49, 27, 38, 1.8),
(450, 2, 6, 49, 28, 35, 1.8),
(451, 2, 6, 49, 28, 36, 2),
(452, 2, 6, 49, 28, 37, 2),
(453, 2, 6, 49, 28, 38, 2),
(454, 2, 6, 49, 28, 39, 2),
(455, 2, 6, 49, 30, 35, 1.8),
(456, 2, 6, 49, 30, 36, 1.8),
(457, 2, 6, 49, 30, 37, 2),
(458, 2, 6, 49, 30, 38, 2),
(459, 2, 6, 49, 30, 39, 2),
(460, 2, 6, 49, 29, 35, 1.7),
(461, 2, 6, 49, 29, 36, 1.8),
(462, 2, 6, 49, 29, 37, 1),
(463, 2, 6, 49, 29, 38, 1.8),
(464, 2, 6, 49, 29, 39, 2),
(465, 2, 7, 51, 31, 40, 2),
(466, 2, 7, 51, 31, 41, 1.8),
(467, 2, 7, 51, 31, 42, 2),
(468, 2, 7, 51, 31, 43, 1.8),
(469, 2, 7, 51, 31, 44, 2),
(470, 2, 7, 51, 32, 40, 1.8),
(471, 2, 7, 51, 32, 41, 2),
(472, 2, 7, 51, 32, 42, 2),
(473, 2, 7, 51, 32, 43, 2),
(474, 2, 7, 51, 32, 44, 2),
(475, 2, 7, 51, 33, 40, 1.7),
(476, 2, 7, 51, 33, 41, 1.8),
(477, 2, 7, 51, 33, 42, 2),
(478, 2, 7, 51, 33, 43, 2),
(479, 2, 7, 51, 33, 44, 2),
(480, 2, 7, 51, 34, 40, 1.9),
(481, 2, 7, 51, 34, 41, 2),
(482, 2, 7, 51, 34, 42, 2),
(483, 2, 7, 51, 34, 43, 2),
(484, 2, 7, 51, 34, 44, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `theme`
--

DROP TABLE IF EXISTS `theme`;
CREATE TABLE IF NOT EXISTS `theme` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) NOT NULL,
  `Theme` varchar(100) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `UID` (`UID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `theme`
--

INSERT INTO `theme` (`ID`, `UID`, `Theme`) VALUES
(4, 2, '1 д Техника безопасности'),
(5, 2, '3 Д Защита проектов'),
(6, 2, '1 Б Эргономика, безопасность'),
(7, 2, '1 г Эргономика, безопасность'),
(8, 2, '1 А Комплектация ПК'),
(9, 2, '1 Б Комплектация ПК'),
(10, 2, '1 Ф Комплектация ПК');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(25) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `salt` varchar(3) NOT NULL,
  `mail_reg` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `last_act` int(11) NOT NULL,
  `reg_date` int(11) NOT NULL,
  `online` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `name`, `surname`, `salt`, `mail_reg`, `mail`, `last_act`, `reg_date`, `online`) VALUES
(1, 'dfil2010', '88606e8554b8ae85ac400789edaa4710', 'Иван', 'Иванов', '823', 'dfil2010@mail.ru', 'dfil2010@mail.ru', 1612270621, 1580154007, 0),
(2, 'dfil2015', '88606e8554b8ae85ac400789edaa4710', 'Дмитрий', 'Филимонов', '823', 'dfil2010@mail.ru', 'dfil2010@mail.ru', 1612377589, 1599762453, 1612377589);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `criterion`
--
ALTER TABLE `criterion`
  ADD CONSTRAINT `criterion_ibfk_1` FOREIGN KEY (`theme_id`) REFERENCES `theme` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `criterion_ibfk_2` FOREIGN KEY (`UID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `expert`
--
ALTER TABLE `expert`
  ADD CONSTRAINT `expert_ibfk_1` FOREIGN KEY (`theme_id`) REFERENCES `theme` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `expert_ibfk_2` FOREIGN KEY (`UID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `name`
--
ALTER TABLE `name`
  ADD CONSTRAINT `name_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `name_ibfk_2` FOREIGN KEY (`theme_id`) REFERENCES `theme` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`name_id`) REFERENCES `name` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_4` FOREIGN KEY (`UID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_5` FOREIGN KEY (`theme_id`) REFERENCES `theme` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_6` FOREIGN KEY (`expert`) REFERENCES `expert` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rating_ibfk_7` FOREIGN KEY (`criterion`) REFERENCES `criterion` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `theme`
--
ALTER TABLE `theme`
  ADD CONSTRAINT `theme_ibfk_1` FOREIGN KEY (`UID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
