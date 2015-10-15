#
# SQL Export
# Created by Querious (996)
# Created: September 3, 2015 at 4:23:29 PM EDT
# Encoding: Unicode (UTF-8)
#


CREATE DATABASE IF NOT EXISTS `users` DEFAULT CHARACTER SET latin1 DEFAULT COLLATE latin1_swedish_ci;

go;

USE 'users';
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(40) NOT NULL,
  `userLevel` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;




SET @PREVIOUS_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS;
SET FOREIGN_KEY_CHECKS = 0;


LOCK TABLES `users` WRITE;
ALTER TABLE `users` DISABLE KEYS;
INSERT INTO `users` (`id`, `email`, `userLevel`) VALUES
	(1,'pat@me.com','A'),
	(2,'linda@me.com','M');
	(3,'test@test.com','M');
ALTER TABLE `users` ENABLE KEYS;
UNLOCK TABLES;




SET FOREIGN_KEY_CHECKS = @PREVIOUS_FOREIGN_KEY_CHECKS;

-- create the users and grant priveleges to those users
GRANT SELECT, INSERT, DELETE, UPDATE
ON my_guitar_shop1.*
TO mgs_user@localhost
IDENTIFIED BY 'pa55word';



