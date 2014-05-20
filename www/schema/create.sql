CREATE DATABASE IF NOT EXISTS shop_rating;
USE shop_rating;

CREATE TABLE IF NOT EXISTS `shops`(
	`id` INT NOT NULL AUTO_INCREMENT COMMENT 'shop id',
	`name` VARCHAR(30) NOT NULL COMMENT 'shop name',
	`siteUrl` VARCHAR(30) NOT NULL,
	`description` TEXT COMMENT 'some description',
	`logo` INT COMMENT 'foreign key to images table',
	PRIMARY KEY (`id`)
)ENGINE=MyISAM
DEFAULT CHARACTER SET `utf8`
COLLATE utf8_general_ci,
COMMENT 'stores shops data';

CREATE TABLE IF NOT EXISTS `commentType`(
	`id` INT NOT NULL AUTO_INCREMENT COMMENT 'commentType id',
	`name` VARCHAR(30) NOT NULL COMMENT 'type of comment',
	PRIMARY KEY (`id`)
)ENGINE=MyISAM
DEFAULT CHARACTER SET `utf8`
COLLATE utf8_general_ci,
COMMENT 'stores type of comments data, like positive, negative, etc.';

CREATE TABLE IF NOT EXISTS `operationType`(
	`id` INT NOT NULL AUTO_INCREMENT COMMENT 'operationType id',
	`name` VARCHAR(30) NOT NULL COMMENT 'type of operationType',
	PRIMARY KEY (`id`)
)ENGINE=MyISAM
DEFAULT CHARACTER SET `utf8`
COLLATE utf8_general_ci,
COMMENT 'stores type of operation, like buying, repairing, etc.';

CREATE TABLE IF NOT EXISTS `images`(
	`id` INT NOT NULL AUTO_INCREMENT COMMENT 'image id',
	`name` VARCHAR(30) NOT NULL COMMENT 'image name',
	`type` VARCHAR(30) NOT NULL COMMENT 'image type, like png, gif, etc.',
	`width` INT NOT NULL,
	`heihgt` INT NOT NULL,
	PRIMARY KEY (`id`)
)ENGINE=MyISAM
DEFAULT CHARACTER SET `utf8`
COLLATE utf8_general_ci,
COMMENT 'stores shops data';

CREATE TABLE IF NOT EXISTS `comments`(
	`id` INT NOT NULL AUTO_INCREMENT COMMENT 'image id',
	`dateComment` VARCHAR(30) NOT NULL COMMENT 'image name',
	`userName` VARCHAR(30) NOT NULL COMMENT 'image type, like png, gif, etc.',
	`description` TEXT NOT NULL,
	`lasts` VARCHAR(30) NOT NULL,
	`commentType` INT NOT NULL COMMENT 'foreign key to commentType table',
	`operationType` INT NOT NULL COMMENT 'foreign key to operationType table',
	`shopId` INT NOT NULL COMMENT 'foreign key to shops table',
	`rating` ENUM('1','2','3','4','5') NOT NULL DEFAULT '3',
	PRIMARY KEY (`id`)
)ENGINE=MyISAM
DEFAULT CHARACTER SET `utf8`
COLLATE utf8_general_ci,
COMMENT 'stores shops data';

CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50),
    role VARCHAR(20),
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
)ENGINE=MyISAM
DEFAULT CHARACTER SET `utf8`
COLLATE utf8_bin,
COMMENT 'stores shops data';

-- *** alternative table for users and groups ***

-- CREATE TABLE users (
--     id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
--     username VARCHAR(50),
--     password VARCHAR(50),
--     role VARCHAR(20),
--     created DATETIME DEFAULT NULL,
--     modified DATETIME DEFAULT NULL
-- )ENGINE=MyISAM
-- DEFAULT CHARACTER SET `utf8`
-- COLLATE utf8_bin,
-- COMMENT 'stores shops data';

-- CREATE TABLE groups (
--     id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
--     groupname VARCHAR(50),
-- )ENGINE=MyISAM
-- DEFAULT CHARACTER SET `utf8`
-- COLLATE utf8_bin,
-- COMMENT 'stores shops data';

-- INSERT INTO groups (name,created,modified) VALUES ('admin', NOW(), NOW()),('subscribers', NOW(), NOW()), ('users', NOW(), NOW());
-- END ALTERNATIVE TABLES

INSERT INTO users (username, password, role, created, modified) VALUES ('admin', '$2a$10$3otKxeQ.UR5I9ICH8Ly4F.GOk4NBTbmPb', 'admin', NOW(), NOW());
