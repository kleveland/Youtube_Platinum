CREATE TABLE `Users` (
	`id` SMALLINT(5) unsigned NOT NULL AUTO_INCREMENT,
	`google_id` BIGINT(30) NOT NULL,
	`first` VARCHAR(30) NOT NULL,
	`last` VARCHAR(30) NOT NULL,
	`prof_img` VARCHAR(30) NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `Playlists` (
	`id` SMALLINT(5) unsigned NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(30) NOT NULL,
	`user_id` SMALLINT(5) unsigned NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE `Videos` (
	`id` SMALLINT(5) unsigned NOT NULL AUTO_INCREMENT,
	`url` VARCHAR(60) NOT NULL,
	`thumbnail` VARCHAR(60) NOT NULL,
	`playlist_id` SMALLINT(5) unsigned NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB;

ALTER IGNORE TABLE Users
ADD UNIQUE INDEX idx_users (username);

ALTER IGNORE TABLE Videos
ADD UNIQUE INDEX idx_videos (url);

ALTER IGNORE TABLE Playlists
ADD UNIQUE INDEX idx_playlists (name,user_id);
