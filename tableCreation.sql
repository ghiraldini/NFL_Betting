-- Create tables for NFL Playoff Pool --

-- DROP TABLE IF  EXIST
DROP TABLE IF EXISTS `players`;
DROP TABLE IF EXISTS `matches`;

-- CREATE TABLES
-- Create Players Table
CREATE TABLE players(
	pid int(11) NOT NULL AUTO_INCREMENT,
	fname varchar(255) NOT NULL,
	lname varchar(255) NOT NULL,
	wins varchar(255) NOT NULL,
	losses varchar(255) NOT NULL,
	ties varchar(255) NOT NULL,
	pct varchar(255) NOT NULL,
	gb varchar(255) NOT NULL,
	money varchar(255) NOT NULL,
	PRIMARY KEY (pid)
) ENGINE=InnoDB;


-- Create MigraineIntensity Table
CREATE TABLE matches(
 matchID int(11) NOT NULL AUTO_INCREMENT,
  int(11)  NOT NULL,
 PRIMARY KEY (MigraineIntensityID)
) ENGINE=InnoDB;

