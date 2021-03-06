-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: database:3306
-- Время создания: Дек 27 2020 г., 10:32
-- Версия сервера: 5.7.31
-- Версия PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `music`
--
CREATE DATABASE IF NOT EXISTS `music` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `music`;

-- --------------------------------------------------------

--
-- Структура таблицы `albums`
--

CREATE TABLE `albums` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(250) NOT NULL,
  `id_artist` int(11) NOT NULL,
  `cover` varchar(250) NOT NULL,
  `rating` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `albums`
--

INSERT INTO `albums` (`id`, `title`, `id_artist`, `cover`, `rating`) VALUES
(1, 'Bohemian Rhapsody', 1, 'bohemian.jpg', 5),
(2, 'Californication', 2, 'californ.jpg', 5),
(3, 'Comatose', 3, 'comat.jpg', 4),
(4, 'Горизонт событий', 4, 'gorizont.jpg', 5),
(5, 'Graduation', 5, 'grad.jpg', 3),
(6, 'Honeymoon', 6, 'honeymoon.jpg', 4),
(7, 'Kids See Ghosts', 5, 'ksg.jpg', 5),
(8, 'Mania', 7, 'mania.jpg', 4),
(9, 'Smells Like Children', 8, 'slc_manson.jpg', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `artists`
--

CREATE TABLE `artists` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `artists`
--

INSERT INTO `artists` (`id`, `name`, `description`) VALUES
(1, 'Queen', 'Британская рок-группа, добившаяся широчайшей известности в середине 1970-х годов, и одна из наиболее успешных групп в истории рок-музыки. Средства массовой информации называют группу «культовой» и пишут, что она и по сей день имеет сотни миллионов поклонников. Группа выпустила пятнадцать студийных альбомов, пять концертных и многочисленные сборники. Восемнадцать хитов «Queen» занимали первые места в чартах разных стран. Каждый участник группы является автором как минимум одного хита, достигавшего вершины британского чарта. Концертные выступления группы также были признаны одними из самых ярких и значимых за всю историю рока.'),
(2, 'Red Hot Chili Peppers', 'Американская рок-группа, образованная в 1983 году в Калифорнии вокалистом Энтони Кидисом, басистом Майклом Бэлзари (больше известным как Фли), гитаристом Хиллелом Словаком и барабанщиком Джеком Айронсом. Обладает 7 премиями «Грэмми». Во всём мире проданы более 80 миллионов копий их альбомов. По версии VH1 «100 Greatest Artists of Hard Rock» заняли 30-е место. 14 апреля 2012 года группа была включена в Зал славы рок-н-ролла. Группа заняла третье место в символическом списке «Лучшие исполнители за 10 лет скробблинга» портала Last.fm.'),
(3, 'Skillet', 'Американская христианская рок-группа из города Мемфис, штат Теннесси, основанная в 1996 году. На данный момент группой выпущено десять студийных альбомов, четыре EP и два концертных альбома.'),
(4, 'Би-2', 'Белорусско-российская рок-группа, образованная в 1988 году в Бобруйске. Основатели и бессменные участники — Шура Би-2 (гитара, вокал) и Лёва Би-2 (основной вокал). В состав команды также входят Андрей Звонков (гитара), Макс Лакмус (бас-гитара), Борис Лифшиц (ударные, перкуссия) и Ян Николенко (бэк-вокал, клавишные, флейта, перкуссия). В 2017 году Би-2 завершили работу над десятым студийным альбомом «Горизонт событий».'),
(5, 'Kanye West', 'Ye, также известен как Ка́нье Ома́ри Уэ́ст — американский рэпер, музыкальный продюсер, композитор и дизайнер. Вырос в Чикаго, где с юных лет был связан с музыкой. В конце 1990-х — начале 2000-х он получил известность как продюсер, приняв участие в создании хитов для таких исполнителей, как Jay-Z, Ludacris, Талиб Квели и Алиша Киз. Бросив обучение в университете, чтобы сосредоточиться на музыке, он решил стать рэпером, выпустив дебютный альбом, The College Dropout, в 2004 году. За ним последовали альбомы Late Registration 2005 года, Graduation 2007 года, 808s & Heartbreak 2008 года, My Beautiful Dark Twisted Fantasy 2010 года, совместный с Jay-Z альбом Watch the Throne 2011 года, Yeezus 2013 года, The Life of Pablo 2016 года, ye 2018 года и Jesus is King 2019 года.'),
(6, 'Lana Del Rey', 'Американская певица, автор песен и поэтесса. Её музыка была отмечена критиками за кинематографический стиль, озабоченность трагическими отношениями и меланхолией, а также за отсылки к американской поп-культуре, в частности, 1950-х и 1960-х годов.'),
(7, 'Fall Out Boy', 'Американская рок-группа, основанная в 2001 году в городе Уилметт, Иллинойс. Группа состоит из Патрика Стампа (вокал, ритм-гитара), Пита Вентца (бас-гитара), Джо Тромана (гитара), Эндрю Хёрли (барабаны). Основателями коллектива считаются Джозеф Троман и Пит Вентц.'),
(8, 'Marilyn Manson', 'Американский рок-певец, композитор, актёр, поэт-песенник, художник и бывший музыкальный журналист, основатель и бессменный лидер рок-группы Marilyn Manson. Его сценический псевдоним сформирован из сложения имён двух американских знаковых фигур, а именно актрисы Мэрилин Монро и преступника Чарльза Мэнсона.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `artists`
--
ALTER TABLE `artists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
