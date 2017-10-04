--
-- Скрипт сгенерирован Devart dbForge Studio for MySQL, Версия 7.2.78.0
-- Домашняя страница продукта: http://www.devart.com/ru/dbforge/mysql/studio
-- Дата скрипта: 04.10.2017 12:54:03
-- Версия сервера: 5.7.17
-- Версия клиента: 4.1
--


-- 
-- Отключение внешних ключей
-- 
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;

-- 
-- Установить режим SQL (SQL mode)
-- 
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- 
-- Установка кодировки, с использованием которой клиент будет посылать запросы на сервер
--
SET NAMES 'utf8';

-- 
-- Установка базы данных по умолчанию
--
USE redir_url;

--
-- Описание для таблицы counter
--
DROP TABLE IF EXISTS counter;
CREATE TABLE counter (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  Counter INT(11) NOT NULL,
  PRIMARY KEY (ID)
)
ENGINE = INNODB
AUTO_INCREMENT = 2
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

--
-- Описание для таблицы links
--
DROP TABLE IF EXISTS links;
CREATE TABLE links (
  ID INT(11) NOT NULL AUTO_INCREMENT,
  NewLink VARCHAR(255) DEFAULT NULL,
  Link VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (ID)
)
ENGINE = INNODB
AUTO_INCREMENT = 1
CHARACTER SET utf8
COLLATE utf8_general_ci
ROW_FORMAT = DYNAMIC;

-- 
-- Вывод данных для таблицы counter
--
INSERT INTO counter VALUES
(1, 1000000000);

-- 
-- Вывод данных для таблицы links
--

-- Таблица redir_url.links не содержит данных

-- 
-- Восстановить предыдущий режим SQL (SQL mode)
-- 
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;

-- 
-- Включение внешних ключей
-- 
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;