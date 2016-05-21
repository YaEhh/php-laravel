-- ***********************************************************
-- Sequel Pro SQL dump
-- Version 4541
--
-- http://www.sequelpro.com/
-- https://github.com/sequelpro/sequelpro
--
-- Host: localhost (MySQL 5.7.12)
-- Database: blog
-- Generation Time: 2016-05-19 18:06:05 +0000
-- ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE=NO_AUTO_VALUE_ON_ZERO */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dump of table admins
-- ------------------------------------------------------------

DROP TABLE IF EXISTS admins;

CREATE TABLE admins (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  created_at timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  updated_at timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  remember_token varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  email varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  password varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE='InnoDB' DEFAULT CHARSET='utf8' COLLATE='utf8_unicode_ci';

LOCK TABLES admins WRITE;
/*!40000 ALTER TABLE admins DISABLE KEYS */;

INSERT INTO admins (id, created_at, updated_at, remember_token, email, password)
VALUES
	(1,2016-03-11 17:07:35,2016-03-31 17:48:04,1bJ1CpXBQwwuYA5V9Gtzg7LeitxlAYXlaBYALKxXdO5Pf8OT92JHkIAQdB8W,test@test.com,$2y$10$5KCjfnw.Ba4GNQJvw7yrVeYeH9It4SJyTyTj3XZZwthSlVBfWVy6O),
	(2,2016-05-14 18:31:27,2016-05-14 18:31:27,NULL,test@test.com,$2y$10$Kt1bAACpNY/lWuRVC.HsducnN67Y2SmYHfXeN7DcgJmC3JadhMOi2);

/*!40000 ALTER TABLE admins ENABLE KEYS */;
UNLOCK TABLES;


-- Dump of table categories
-- ------------------------------------------------------------

DROP TABLE IF EXISTS categories;

CREATE TABLE categories (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  created_at timestamp NOT NULL DEFAULT 0000-00-00 00:00:00,
  updated_at timestamp NOT NULL DEFAULT 0000-00-00 00:00:00,
  name varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES categories WRITE;
/*!40000 ALTER TABLE categories DISABLE KEYS */;

INSERT INTO categories (id, created_at, updated_at, name)
VALUES
	(2,2016-03-11 17:07:35,2016-05-18 19:19:10,Mexican),
	(59,2016-03-19 16:28:56,2016-05-18 19:18:58,Middle Eastern),
	(60,2016-05-04 18:26:20,2016-05-18 19:18:44,European),
	(61,2016-05-14 18:31:27,2016-05-18 19:18:28,Asain),
	(62,2016-05-14 18:31:27,2016-05-18 19:18:35,African),
	(64,2016-05-18 20:49:48,2016-05-18 20:49:48,South American);

/*!40000 ALTER TABLE categories ENABLE KEYS */;
UNLOCK TABLES;


-- Dump of table comments
-- ------------------------------------------------------------

DROP TABLE IF EXISTS comments;

CREATE TABLE comments (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  created_at timestamp NOT NULL DEFAULT 0000-00-00 00:00:00,
  updated_at timestamp NOT NULL DEFAULT 0000-00-00 00:00:00,
  body text COLLATE utf8_unicode_ci NOT NULL,
  user_id int(10) unsigned NOT NULL,
  post_id int(10) unsigned NOT NULL,
  PRIMARY KEY (id),
  KEY comments_user_id_foreign (user_id),
  KEY comments_post_id_foreign (post_id),
  CONSTRAINT comments_post_id_foreign FOREIGN KEY (post_id) REFERENCES posts (id),
  CONSTRAINT comments_user_id_foreign FOREIGN KEY (user_id) REFERENCES users (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES comments WRITE;
/*!40000 ALTER TABLE comments DISABLE KEYS */;

INSERT INTO comments (id, created_at, updated_at, body, user_id, post_id)
VALUES
	(181,2016-03-31 17:43:50,2016-03-31 17:43:50,first comment,1,1),
	(182,2016-03-31 17:46:44,2016-03-31 17:46:44,second comment,1,1),
	(183,2016-03-31 17:47:21,2016-03-31 17:47:21,third comment,1,1),
	(184,2016-03-31 17:47:24,2016-03-31 17:47:24,forth comment,1,1),
	(193,2016-05-18 21:14:29,2016-05-18 21:14:29,great dish,1,2),
	(194,2016-05-18 22:53:26,2016-05-18 22:53:26,make a comment,1,1),
	(195,2016-05-18 22:53:45,2016-05-18 22:53:45,make comment,1,1);

/*!40000 ALTER TABLE comments ENABLE KEYS */
UNLOCK TABLES;


-- Dump of table contact_messages
-- ------------------------------------------------------------

DROP TABLE IF EXISTS contact_messages;

CREATE TABLE contact_messages (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  created_at timestamp NOT NULL DEFAULT 0000-00-00 00:00:00,
  updated_at timestamp NOT NULL DEFAULT 0000-00-00 00:00:00,
  sender varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  email varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  subject varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  body text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES contact_messages WRITE;
/*!40000 ALTER TABLE contact_messages DISABLE KEYS */;

INSERT INTO contact_messages (id, created_at, updated_at, sender, email, subject, body)
VALUES
	(1,2016-03-21 20:17:58,2016-03-21 20:17:58,Sebi,seb@gmail.com,Test,This is just a test. Please don\t respond.);

/*!40000 ALTER TABLE contact_messages ENABLE KEYS */;
UNLOCK TABLES;


-- Dump of table migrations
-- ------------------------------------------------------------

DROP TABLE IF EXISTS migrations;

CREATE TABLE migrations (
  migration varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  batch int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES migrations WRITE;
/*!40000 ALTER TABLE migrations DISABLE KEYS */;

INSERT INTO migrations (migration, batch)
VALUES
	(2016_03_11_154403_create_posts_table,1),
	(2016_03_11_154429_create_categories_table,1),
	(2016_03_11_154451_create_contact_messages_table,1),
	(2016_03_11_154554_create_post_category_table,1),
	(2016_03_11_155331_create_admins_table,1),
	(2016_03_24_151044_create_users_table,2),
	(2016_03_28_203418_remove_user_id_from_posts,3),
	(2016_03_28_203801_create_comments_table,4),
	(2016_03_28_211547_add_post_id_to_comments,5),
	(2016_03_30_142631_change_columns_for_comments,6),
	(2016_03_30_145539_drop_comments_table,7),
	(2016_03_30_154817_drop_comments_table,8),
	(2016_03_30_155638_create_comments_table,9);

/*!40000 ALTER TABLE migrations ENABLE KEYS */;
UNLOCK TABLES;


-- Dump of table posts
-- ------------------------------------------------------------

DROP TABLE IF EXISTS posts;

CREATE TABLE posts (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  created_at timestamp NOT NULL DEFAULT 0000-00-00 00:00:00,
  updated_at timestamp NOT NULL DEFAULT 0000-00-00 00:00:00,
  title varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  author varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  body text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES posts WRITE;
/*!40000 ALTER TABLE posts DISABLE KEYS */;

INSERT INTO posts (id, created_at, updated_at, title, author, body)
VALUES
	(1,2016-03-14 19:12:10,2016-05-18 18:20:05,Traditional Spanish Paella,Sebastian,Nourishing, vibrant, and without pretension, paella has held a place of honor and practicality in Spanish homes for centuries. To round out this meal, choose a good Spanish red wine from the Rioja region, a crusty baguette, and a light salad.),
	(2,2016-03-14 19:16:03,2016-05-18 18:21:13,Sweet Polish Sausage,Sebi,\"This is an excellent way to prepare Polish sausage with no hint of greasiness to it!\"),
	(3,2016-03-14 19:17:57,2016-05-18 18:22:18,Japanese Noodle,Sebi,Udon\r\nWhile dried udon noodles are readily available in the West, I prefer the soft, yet chewy texture of frozen udon. This is really handy, especially when adding to nabe (hot pot dishes), as they are already fully cooked and don’t have to be simmered in separate water.),
	(7,2016-03-14 21:06:26,2016-05-18 18:23:21,Romanian Cremsnit,Sebastiano,    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.),
	(8,2016-03-21 18:38:46,2016-05-18 18:24:00,Shepherd\s Pie,Sebi,This Shepherd\s Pie is a layered casserole of beef, carrots, and potato.\" ... See how to make a shortcut shepherd’s pie with leftover beef. ... Watch a firehouse cook prepare beef stew and shepherd’s pie.),
	(9,2016-05-18 18:28:16,2016-05-18 18:28:16,Pizza,Sebastian, Our amazing pizza recipes help launch this classic dish into outer space with a variety of toppings; who doesn\t love a pizza? JamieOliver.com.),
	(10,2016-05-18 18:35:03,2016-05-18 18:35:03,Cheesy Potatoes,Sebastian, Watch our video on our cheesy potato recipe. Classic Cheesy Potatoes start with hash browns and sour cream and end with a crunchy cracker-crumb topping.);

/*!40000 ALTER TABLE posts ENABLE KEYS */;
UNLOCK TABLES;


-- Dump of table posts_categories
-- ------------------------------------------------------------

DROP TABLE IF EXISTS posts_categories;

CREATE TABLE posts_categories (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  created_at timestamp NOT NULL DEFAULT 0000-00-00 00:00:00,
  updated_at timestamp NOT NULL DEFAULT 0000-00-00 00:00:00,
  post_id int(11) NOT NULL,
  category_id int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES posts_categories WRITE;
/*!40000 ALTER TABLE posts_categories DISABLE KEYS */;

INSERT INTO posts_categories (id, created_at, updated_at, post_id, category_id)
VALUES
	(6,0000-00-00 00:00:00,0000-00-00 00:00:00,9,2),
	(7,0000-00-00 00:00:00,0000-00-00 00:00:00,9,3),
	(10,0000-00-00 00:00:00,0000-00-00 00:00:00,1,3),
	(11,0000-00-00 00:00:00,0000-00-00 00:00:00,7,3),
	(12,0000-00-00 00:00:00,0000-00-00 00:00:00,8,3),
	(13,0000-00-00 00:00:00,0000-00-00 00:00:00,11,3);

/*!40000 ALTER TABLE posts_categories ENABLE KEYS */;
UNLOCK TABLES;


-- Dump of table users
-- ------------------------------------------------------------

DROP TABLE IF EXISTS users;

CREATE TABLE users (
  id int(10) unsigned NOT NULL AUTO_INCREMENT,
  created_at timestamp NOT NULL DEFAULT 0000-00-00 00:00:00,
  updated_at timestamp NOT NULL DEFAULT 0000-00-00 00:00:00,
  remember_token varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  username varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  password varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES users WRITE;
/*!40000 ALTER TABLE users DISABLE KEYS */;

INSERT INTO users (id, created_at, updated_at, remember_token, username, password)
VALUES
	(1,2016-03-28 20:30:20,2016-03-28 20:30:20,NULL,sselea,$2y$10$UyNKuf7bRmvPpoNhvu4CY.c7o7Ydq/TzooFNPTnf1XlW7/1VJ.uPq);

/*!40000 ALTER TABLE users ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
