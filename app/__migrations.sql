-- 17 nov, 2023 Migrations
ALTER TABLE `auth`
CHANGE `active` `active` int NOT NULL DEFAULT '0' AFTER `blocked`,
ADD `sec_email` varchar(256) NOT NULL;