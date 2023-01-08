-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Дек 07 2022 г., 18:35
-- Версия сервера: 10.4.18-MariaDB
-- Версия PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `student_portal`
--

-- --------------------------------------------------------

--
-- Структура таблицы `agzalar`
--

CREATE TABLE `agzalar` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fakulteti` text NOT NULL,
  `hunari` text NOT NULL,
  `kursy` int(11) NOT NULL,
  `suraty` text NOT NULL,
  `derejesi` varchar(255) NOT NULL,
  `topary` int(11) NOT NULL,
  `berlen_derejesi` int(11) NOT NULL,
  `gosan_soz_sany` int(11) NOT NULL,
  `baly` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `agzalar`
--


-- --------------------------------------------------------

--
-- Структура таблицы `fakultetler`
--

CREATE TABLE `fakultetler` (
  `id` int(11) NOT NULL,
  `fakultet` text NOT NULL,
  `mugallym_sany` int(11) NOT NULL,
  `talyp_sany` int(11) NOT NULL,
  `tazelik_sany` int(11) NOT NULL,
  `bildiris_sany` int(11) NOT NULL,
  `soz_sany` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `fakultetler`
--

INSERT INTO `fakultetler` (`id`, `fakultet`, `mugallym_sany`, `talyp_sany`, `tazelik_sany`, `bildiris_sany`, `soz_sany`) VALUES
(1, 'kompýuter ylymlary we maglumat tehnologiýalary', 0, 0, 0, 0, 0),
(2, 'himiki we nanotehnologiýalar', 0, 0, 0, 0, 0),
(3, 'biotehnologiýalar we ekologiýa', 0, 0, 0, 0, 0),
(4, 'innowasiýalaryň ykdysadyýeti', 0, 0, 0, 0, 0),
(5, 'kiberfiziki ulgamalar', 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `hunarler`
--

CREATE TABLE `hunarler` (
  `id` int(11) NOT NULL,
  `hunar_ady` text NOT NULL,
  `fakultet_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `hunarler`
--

INSERT INTO `hunarler` (`id`, `hunar_ady`, `fakultet_id`) VALUES
(1, 'informatika we hasaplaýyş tehnikasy ', 1),
(2, 'maglumat ulgamlary we tehnologiýalary', 1),
(3, 'sanly infrastruktura we kiberhowpsuzlyk ', 1),
(4, 'mobil we tor inžiniring', 1),
(5, 'animasiýa we grafika dizaýny', 1),
(6, 'emeli aň we ekspert ulgamlary', 1),
(7, 'amaly matematika we informatika', 1),
(8, 'Kartografiýa we geoinformatika', 1),
(9, 'himiki tehnologiýa', 2),
(10, 'himiki inžiniring', 2),
(11, 'materiallary öwrenmek we täze materiallaryň tehnologiýasy', 2),
(12, 'nanomateriallar', 2),
(13, 'mikrobiologiýa', 3),
(14, 'biotehnologiýa', 3),
(15, 'öýjük we molekulýar biologiýa', 3),
(16, 'genetika we bioinžiniring', 3),
(17, 'ekologiýa we tebigatdan peýdalanmak', 3),
(18, 'Işgärleri dolandyryş', 4),
(19, ' Innowasion ydysadyýet', 4),
(20, 'Innowasion menejment we halkara işewürligi', 4),
(21, 'Kompýuter lingwistikasy', 4),
(22, 'Tehnologiýa işewürligi', 4),
(23, 'Filologiýa', 4),
(24, 'Sanly ykdysadyýetiň tehnologiýasy', 5),
(25, 'Elektronika we nanoelektronika', 5),
(26, 'Biolukmançylyk elektronikasy', 5),
(27, 'Maglumatlary goramagyň tehniki serişdeleri', 5),
(28, 'Awtomatlaşdyrmak we dolandyrmak', 5),
(29, 'Häzirkizaman tehnologiýalaryň fizikasy', 5),
(30, ' Mehatronika we robot tehnikasy', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `news_name` varchar(255) NOT NULL,
  `news_img` varchar(255) NOT NULL,
  `news_text` text NOT NULL,
  `news_added_date` date NOT NULL,
  `news_view_count` int(11) NOT NULL,
  `degisli_fakulteti` text NOT NULL,
  `mugallym_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `news`
--


-- --------------------------------------------------------

--
-- Структура таблицы `news_view`
--

CREATE TABLE `news_view` (
  `id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `news_view`
--

-- --------------------------------------------------------

--
-- Структура таблицы `postlar`
--

CREATE TABLE `postlar` (
  `id` int(11) NOT NULL,
  `post_name` varchar(255) NOT NULL,
  `post_img` varchar(255) NOT NULL,
  `post_text` text NOT NULL,
  `post_date` date NOT NULL,
  `post_view_count` int(11) NOT NULL,
  `degisli_fakulteti` text NOT NULL,
  `mugallym_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `postlar`
--


-- --------------------------------------------------------

--
-- Структура таблицы `post_view`
--

CREATE TABLE `post_view` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `post_view`
--

-- --------------------------------------------------------

--
-- Структура таблицы `vocabulary`
--

CREATE TABLE `vocabulary` (
  `id` int(11) NOT NULL,
  `english` varchar(255) NOT NULL,
  `turkmen` varchar(255) NOT NULL,
  `definition` text NOT NULL,
  `tassyklananmy` varchar(25) NOT NULL,
  `degisli_fakulteti` text NOT NULL,
  `soz_gosanyn_topary` int(11) NOT NULL,
  `soz_gosan_id` int(11) NOT NULL,
  `gorlen_sany` int(11) NOT NULL,
  `halanyp_ulanylyan_sany` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `vocabulary`
--


-- --------------------------------------------------------

--
-- Структура таблицы `vocabulary_like`
--

CREATE TABLE `vocabulary_like` (
  `id` int(11) NOT NULL,
  `vocabulary_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `vocabulary_like`
--

-- --------------------------------------------------------

--
-- Структура таблицы `vocabulary_seen`
--

CREATE TABLE `vocabulary_seen` (
  `id` int(11) NOT NULL,
  `vocabulary_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `vocabulary_seen`
--

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `agzalar`
--
ALTER TABLE `agzalar`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `fakultetler`
--
ALTER TABLE `fakultetler`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `hunarler`
--
ALTER TABLE `hunarler`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news_view`
--
ALTER TABLE `news_view`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `postlar`
--
ALTER TABLE `postlar`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `post_view`
--
ALTER TABLE `post_view`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vocabulary`
--
ALTER TABLE `vocabulary`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vocabulary_like`
--
ALTER TABLE `vocabulary_like`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `vocabulary_seen`
--
ALTER TABLE `vocabulary_seen`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
